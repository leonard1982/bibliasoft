<?php
class grid_terceros_todos_13122021_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden   = array();
   var $nmgp_botoes     = array();
   var $nm_btn_exist    = array();
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array();
   var $Cmps_ord_def    = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $NM_btn_run_show; 
   var $SC_seq_btn_run;
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $loatiende_Old;
   var $arg_sum_loatiende;
   var $Label_loatiende;
   var $sc_proc_quebra_loatiende;
   var $count_loatiende;
   var $facturas;
   var $sc_asigna_vendedor;
   var $documento;
   var $dv;
   var $nombres;
   var $direccion;
   var $idmuni;
   var $tel_cel;
   var $cliente;
   var $proveedor;
   var $empleado;
   var $si_nomina;
   var $idtercero;
   var $nacimiento;
   var $sexo;
   var $urlmail;
   var $fechault;
   var $saldo;
   var $afiliacion;
   var $regimen;
   var $tipo;
   var $observaciones;
   var $loatiende;
   var $contacto;
   var $credito;
   var $cupo;
   var $listaprecios;
   var $con_actual;
   var $efec_retencion;
   var $urlmail_1;
   var $nombre1;
   var $nombre2;
   var $apellido1;
   var $apellido2;
   var $sucur_cliente;
   var $representante;
   var $es_restaurante;
   var $dias_credito;
   var $dias_mora;
   var $cupo_vendedor;
   var $codigo_ter;
   var $es_cajero;
   var $autorizado;
   var $zona_clientes;
   var $clasificacion_clientes;
   var $creado;
   var $disponible;
   var $id_pedido_tmp;
   var $n_pedido_tmp;
   var $total_pedido_tmp;
   var $obs_pedido_tmp;
   var $vend_pedido_tmp;
   var $ciudad;
   var $codigo_postal;
   var $lenguaje;
   var $nombre_comercil;
   var $notificar;
   var $puc_auxiliar_deudores;
   var $puc_retefuente_ventas;
   var $puc_retefuente_servicios_clie;
   var $puc_auxiliar_proveedores;
   var $puc_retefuente_compras;
   var $puc_retefuente_servicios_prov;
   var $nube;
   var $tipo_documento;
   var $estado;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
      {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "grid_terceros_todos_13122021/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_terceros_todos_13122021_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
      }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pdf_res'])
       {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
       } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=3>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != 'print')
       { 
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("      <TD id=\"div_refin_search\" class=\"scGridRefinedSearchPadding\" valign='top'>\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $this->html_interativ_search();
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
           { 
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['refresh_interativ']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['refresh_interativ'] == "S") {
                   $this->Ini->Arr_result['setValue'][] = array('field' => 'div_refin_search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               }
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['refresh_interativ']);
               $tb_disp = (!empty($this->nm_grid_sem_reg) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_int_search']) ? 'none' : '';
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'TB_Interativ_Search', 'value' => $tb_disp);
           } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_int_search'] = false;
       $nm_saida->saida("      </TD>\r\n");
       $nm_saida->saida("      <TD class=\"scGridRefinedSearchMolduraResult\" valign='top'>\r\n");
       $nm_saida->saida("       <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       } 
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_terceros_todos_13122021'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       $display_tag_interativ = "none";
       $descr_refin = "";
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']))
       { 
           $display_tag_interativ = "";
           $descr_refin = "<div class='scGridFilterTagList'>";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search'] as $fil => $dados_fil) {
               foreach ($dados_fil['lab'] as $lab_fil => $opcs_fil) {
                   foreach ($opcs_fil as $iopc => $cada_opc) {
                       $descr_refin .= "<div class='scGridFilterTagListItem'>";
                       $descr_refin .= "<img align='absmiddle' style=\"cursor: pointer; float:right; padding-left: 5px;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" border=\"0\" onclick=\"nm_proc_int_search('clear_opc','" . $dados_fil['tp_obj'] . "','" . $lab_fil . "','" . $fil . "', 'id_int_search_" . $fil . "', '" . $fil . "', '" . $dados_fil['val_sel'][$iopc] . "##@@" . $cada_opc . "', 'S')\"/>";
                       $descr_refin .= "<span class='scGridFilterTagListItemLabel'>";
                       $descr_refin .= $lab_fil . "<br>";
                       if ($dados_fil['tp_obj'] == 'bw') {
                           $descr_refin .= $opcs_fil[0] . " <=> " . $opcs_fil[1];
                       }
                       else {
                           $descr_refin .= $cada_opc;
                       }
                       $descr_refin .= "</span></div>&nbsp;&nbsp;";
                       if ($dados_fil['tp_obj'] == 'bw') {
                           break;
                       }
                   }
               }
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bfilref_limpar", "nm_proc_int_clear_all();", "nm_proc_int_clear_all();", "app_int_search_all_cancel", "", "", "vertical-align: text-bottom;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $descr_refin .= $Cod_Btn; 
           $descr_refin .= "</div>";
       } 
       $nm_saida->saida("       <tr id=\"tr_descr_refin_search\" style=\"display:" . $display_tag_interativ . ";padding: 0px;text-align: left;\"><td><div id=\"div_descr_refin_search\"  class=\"scGridFilterTag\" style=\"text-align: left;\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav']) {
           $_SESSION['scriptcase']['saida_html'] = "";
       }
       if ($_SESSION['scriptcase']['proc_mobile']) {
           $nm_saida->saida("            <a onclick=\"refin_search_mobile();\" class='scGridFilterTagIconCol'><i class='icon_fa " . $this->Ini->scGridRefinedSearchCollapseFAIcon . "'></i></a>\r\n");
       }
       $nm_saida->saida("         " . $descr_refin . "\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav']) {
           $this->Ini->Arr_result['setValue'][] = array('field' => 'div_descr_refin_search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
           $this->Ini->Arr_result['setDisplay'][] = array('field' => 'tr_descr_refin_search', 'value' => $display_tag_interativ);
       }
       $nm_saida->saida("       </div></td></tr> \r\n");

       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['save_grid']))
       {
           $this->refresh_interativ_search();
       }
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['save_grid']);
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != 'print')
       { 
       $nm_saida->saida("       </table>\r\n");
       $nm_saida->saida("      </TD>\r\n");
       $nm_saida->saida("     </TR>\r\n");
       } 
       $nm_saida->saida("   </table>\r\n");
       $nm_saida->saida("  </TD>\r\n");
       $nm_saida->saida(" </TR>\r\n");
       if (strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
       { 
           $Gera_res = true;
       } 
       else 
       { 
           $Gera_res = false;
       } 
       if (strpos(" " . $this->Ini->SC_module_export, "chart") !== false)
       { 
           $Gera_graf = true;
       } 
       else 
       { 
           $Gera_graf = false;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_terceros_todos_13122021_grafico();
               $this->Graf->Db     = $this->Db;
               $this->Graf->Erro   = $this->Erro;
               $this->Graf->Ini    = $this->Ini;
               $this->Graf->Lookup = $this->Lookup;
               $this->Graf->monta_grafico();
               exit;
           }
           elseif ($Gera_res || $Gera_graf)
           {
               $this->Res->monta_html_ini_pdf();
               $this->Res->monta_resumo();
               $this->Res->monta_html_fim_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['graf_pdf'] == "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'] && $Gera_graf)
           {
               $this->grafico_pdf_flash();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "grid";
           } 
           elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && $Gera_graf)
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida, $NM_run_iframe,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_pdf']['label_group'] : "S";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_pdf']['all_cab'] : "N";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_pdf']['all_label'] : "N";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by")
   {
       if (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']) > 1)
       {
           $this->width_tabula_quebra  = (((count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']) - 1) * 13) + 3) . "px";
           $this->width_tabula_display = "''";
           $this->Tem_tab_vert = true;
       }
       else
       {
           $this->width_tabula_quebra  = "0px";
           $this->width_tabula_display = "none";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['mostra_edit'] = "N";
   }
   $this->sc_proc_quebra_loatiende = false;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_terceros_todos_13122021", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_2'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_2'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "on";
   $this->nmgp_botoes['back'] = "on";
   $this->nmgp_botoes['forward'] = "on";
   $this->nmgp_botoes['last'] = "on";
   $this->nmgp_botoes['filter'] = "on";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['xls'] = "on";
   $this->nmgp_botoes['xml'] = "on";
   $this->nmgp_botoes['json'] = "on";
   $this->nmgp_botoes['csv'] = "on";
   $this->nmgp_botoes['rtf'] = "on";
   $this->nmgp_botoes['word'] = "on";
   $this->nmgp_botoes['doc'] = "on";
   $this->nmgp_botoes['export'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['html'] = "on";
   $this->nmgp_botoes['goto'] = "on";
   $this->nmgp_botoes['qtline'] = "on";
   $this->nmgp_botoes['navpage'] = "on";
   $this->nmgp_botoes['rows'] = "on";
   $this->nmgp_botoes['summary'] = "on";
   $this->nmgp_botoes['new']    = "on";
   $this->nmgp_botoes['insert'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->nmgp_botoes['qsearch'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   $this->nmgp_botoes['gridsave'] = "on";
   $this->nmgp_botoes['gridsavesession'] = "on";
   $this->nmgp_botoes['reload'] = "on";
   $this->nmgp_botoes['btn_subir_a_nube'] = "on";
   $this->nmgp_botoes['btn_actualizar_nube'] = "on";
   $this->Cmps_ord_def['documento'] = " asc";
   $this->Cmps_ord_def['nombres'] = " asc";
   $this->Cmps_ord_def['direccion'] = " asc";
   $this->Cmps_ord_def['tel_cel'] = " asc";
   $this->Cmps_ord_def['nacimiento'] = " desc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
   { 
       $this->Proc_link_res            = true;
       $this->nmgp_botoes['filter']    = 'off';
       $this->nmgp_botoes['groupby']   = 'off';
       $this->nmgp_botoes['dynsearch'] = 'off';
       $this->nmgp_botoes['qsearch']   = 'off';
       $this->nmgp_botoes['gridsave']  = 'off';
       $this->nmgp_botoes['exit']      = 'off';
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->documento = $Busca_temp['documento']; 
       $tmp_pos = strpos($this->documento, "##@@");
       if ($tmp_pos !== false && !is_array($this->documento))
       {
           $this->documento = substr($this->documento, 0, $tmp_pos);
       }
       $documento_2 = $Busca_temp['documento_input_2']; 
       $this->documento_2 = $Busca_temp['documento_input_2']; 
       $this->nombres = $Busca_temp['nombres']; 
       $tmp_pos = strpos($this->nombres, "##@@");
       if ($tmp_pos !== false && !is_array($this->nombres))
       {
           $this->nombres = substr($this->nombres, 0, $tmp_pos);
       }
       $nombres_2 = $Busca_temp['nombres_input_2']; 
       $this->nombres_2 = $Busca_temp['nombres_input_2']; 
       $this->loatiende = $Busca_temp['loatiende']; 
       $tmp_pos = strpos($this->loatiende, "##@@");
       if ($tmp_pos !== false && !is_array($this->loatiende))
       {
           $this->loatiende = substr($this->loatiende, 0, $tmp_pos);
       }
       $this->estado = $Busca_temp['estado']; 
       $tmp_pos = strpos($this->estado, "##@@");
       if ($tmp_pos !== false && !is_array($this->estado))
       {
           $this->estado = substr($this->estado, 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "muda_qt_linhas";
   } 
       ob_start(); 
   $_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'on';
if (!isset($_SESSION['gnit'])) {$_SESSION['gnit'] = "";}
if (!isset($this->sc_temp_gnit)) {$this->sc_temp_gnit = (isset($_SESSION['gnit'])) ? $_SESSION['gnit'] : "";}
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
 ?>
<style>
.dn-expand-button{
	color:white !important;
}
</style>
<?php

if($this->sc_temp_gnube_activa == "SI")
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "on";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "on";;
}
else
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "off";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "off";;
}

$vso   = "escritorio";

if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
{  
	$vso = "escritorio";
}
else
{
	$vso = "nube";
}

if($this->sc_temp_gnit=="88261176-7" and $vso=="nube")
{
	$this->NM_cmp_hidden["si_nomina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']["si_nomina"] = "on"; }
}
else
{
	$this->NM_cmp_hidden["si_nomina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']["si_nomina"] = "off"; }
}
if (isset($this->sc_temp_gnube_activa)) {$_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
if (isset($this->sc_temp_gnit)) {$_SESSION['gnit'] = $this->sc_temp_gnit;}
$_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'off'; 
       $this->SC_Buf_onInit = ob_get_clean();; 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_terceros_todos_13122021'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_terceros_todos_13122021'];

           $this->nmgp_botoes['first']     = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['back']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['last']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['forward']   = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['summary']   = $tmpDashboardButtons['grid_summary']   ? 'on' : 'off';
           $this->nmgp_botoes['qsearch']   = $tmpDashboardButtons['grid_qsearch']   ? 'on' : 'off';
           $this->nmgp_botoes['dynsearch'] = $tmpDashboardButtons['grid_dynsearch'] ? 'on' : 'off';
           $this->nmgp_botoes['filter']    = $tmpDashboardButtons['grid_filter']    ? 'on' : 'off';
           $this->nmgp_botoes['sel_col']   = $tmpDashboardButtons['grid_sel_col']   ? 'on' : 'off';
           $this->nmgp_botoes['sort_col']  = $tmpDashboardButtons['grid_sort_col']  ? 'on' : 'off';
           $this->nmgp_botoes['goto']      = $tmpDashboardButtons['grid_goto']      ? 'on' : 'off';
           $this->nmgp_botoes['qtline']    = $tmpDashboardButtons['grid_lineqty']   ? 'on' : 'off';
           $this->nmgp_botoes['navpage']   = $tmpDashboardButtons['grid_navpage']   ? 'on' : 'off';
           $this->nmgp_botoes['pdf']       = $tmpDashboardButtons['grid_pdf']       ? 'on' : 'off';
           $this->nmgp_botoes['xls']       = $tmpDashboardButtons['grid_xls']       ? 'on' : 'off';
           $this->nmgp_botoes['xml']       = $tmpDashboardButtons['grid_xml']       ? 'on' : 'off';
           $this->nmgp_botoes['json']      = $tmpDashboardButtons['grid_json']      ? 'on' : 'off';
           $this->nmgp_botoes['csv']       = $tmpDashboardButtons['grid_csv']       ? 'on' : 'off';
           $this->nmgp_botoes['rtf']       = $tmpDashboardButtons['grid_rtf']       ? 'on' : 'off';
           $this->nmgp_botoes['word']      = $tmpDashboardButtons['grid_word']      ? 'on' : 'off';
           $this->nmgp_botoes['doc']       = $tmpDashboardButtons['grid_doc']       ? 'on' : 'off';
           $this->nmgp_botoes['print']     = $tmpDashboardButtons['grid_print']     ? 'on' : 'off';
           $this->nmgp_botoes['new']       = $tmpDashboardButtons['grid_new']       ? 'on' : 'off';
           $this->nmgp_botoes['img']       = $tmpDashboardButtons['img']            ? 'on' : 'off';
           $this->nmgp_botoes['html']      = $tmpDashboardButtons['html']           ? 'on' : 'off';
           $this->nmgp_botoes['reload']    = $tmpDashboardButtons['grid_reload']    ? 'on' : 'off';
       }
   }

   if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros']['insert'] != '')
   {
       $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['terceros']['insert'];
       $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros']['insert'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros']['update'] != '')
   {
       $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros']['update'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros']['delete'] != '')
   {
       $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros']['delete'];
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_sql_btn_run'] = array(); 
   $this->NM_btn_run_show = ($this->Ini->SC_Link_View || $this->grid_emb_form || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida']) ? false : true;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq']) 
   { 
      $this->nmgp_botoes['btn_subir_a_nube'] = "off";
      $this->nmgp_botoes['btn_actualizar_nube'] = "off";
   } 
   if ($this->nmgp_botoes['btn_subir_a_nube'] != "on" && $this->nmgp_botoes['btn_actualizar_nube'] != "on") 
   { 
      $this->NM_btn_run_show = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf") 
   { 
      $this->NM_btn_run_show = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_terceros_todos_13122021_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_terceros_todos_13122021_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] = 15;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']['idtercero'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select'] = array(); 
           $Free_sql_atual = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_sql'] as $cmp => $resto)
           {
               foreach ($resto as $cmp_sql => $ord)
               {
                   $Free_sql_atual[$cmp_sql] = 0;
               } 
           } 
           if (!isset($Free_sql_atual['idtercero']))
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']['idtercero'] = 'DESC'; 
           } 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']['idtercero'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra']['loatiende']["loatiende"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'] = array(); 
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_sql'] as $cmp_var => $resto)
           {
               foreach ($resto as $SC_Sql_col => $SC_Sql_order)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'][$cmp_var][$SC_Sql_col] = $SC_Sql_order;
               }
           }
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao']       = "igual" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->arg_sum_loatiende = "";
   $this->count_loatiende = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] == "all") 
   { 
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total']);
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['contr_array_resumo'] = "NAO";
       } 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start--; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by documento";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->force_toolbar = true;
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->documento = $this->rs_grid->fields[0] ;  
       $this->dv = $this->rs_grid->fields[1] ;  
       $this->dv = (string)$this->dv;
       $this->nombres = $this->rs_grid->fields[2] ;  
       $this->direccion = $this->rs_grid->fields[3] ;  
       $this->idmuni = $this->rs_grid->fields[4] ;  
       $this->idmuni = (string)$this->idmuni;
       $this->tel_cel = $this->rs_grid->fields[5] ;  
       $this->cliente = $this->rs_grid->fields[6] ;  
       $this->proveedor = $this->rs_grid->fields[7] ;  
       $this->empleado = $this->rs_grid->fields[8] ;  
       $this->si_nomina = $this->rs_grid->fields[9] ;  
       $this->idtercero = $this->rs_grid->fields[10] ;  
       $this->idtercero = (string)$this->idtercero;
       $this->nacimiento = $this->rs_grid->fields[11] ;  
       $this->sexo = $this->rs_grid->fields[12] ;  
       $this->urlmail = $this->rs_grid->fields[13] ;  
       $this->fechault = $this->rs_grid->fields[14] ;  
       $this->saldo = $this->rs_grid->fields[15] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->afiliacion = $this->rs_grid->fields[16] ;  
       $this->regimen = $this->rs_grid->fields[17] ;  
       $this->tipo = $this->rs_grid->fields[18] ;  
       $this->observaciones = $this->rs_grid->fields[19] ;  
       $this->loatiende = $this->rs_grid->fields[20] ;  
       $this->loatiende = (string)$this->loatiende;
       $this->contacto = $this->rs_grid->fields[21] ;  
       $this->credito = $this->rs_grid->fields[22] ;  
       $this->cupo = $this->rs_grid->fields[23] ;  
       $this->cupo = (string)$this->cupo;
       $this->listaprecios = $this->rs_grid->fields[24] ;  
       $this->listaprecios = (string)$this->listaprecios;
       $this->con_actual = $this->rs_grid->fields[25] ;  
       $this->efec_retencion = $this->rs_grid->fields[26] ;  
       $this->urlmail_1 = $this->rs_grid->fields[27] ;  
       $this->nombre1 = $this->rs_grid->fields[28] ;  
       $this->nombre2 = $this->rs_grid->fields[29] ;  
       $this->apellido1 = $this->rs_grid->fields[30] ;  
       $this->apellido2 = $this->rs_grid->fields[31] ;  
       $this->sucur_cliente = $this->rs_grid->fields[32] ;  
       $this->representante = $this->rs_grid->fields[33] ;  
       $this->es_restaurante = $this->rs_grid->fields[34] ;  
       $this->dias_credito = $this->rs_grid->fields[35] ;  
       $this->dias_credito = (string)$this->dias_credito;
       $this->dias_mora = $this->rs_grid->fields[36] ;  
       $this->dias_mora = (string)$this->dias_mora;
       $this->cupo_vendedor = $this->rs_grid->fields[37] ;  
       $this->cupo_vendedor =  str_replace(",", ".", $this->cupo_vendedor);
       $this->cupo_vendedor = (string)$this->cupo_vendedor;
       $this->codigo_ter = $this->rs_grid->fields[38] ;  
       $this->es_cajero = $this->rs_grid->fields[39] ;  
       $this->autorizado = $this->rs_grid->fields[40] ;  
       $this->zona_clientes = $this->rs_grid->fields[41] ;  
       $this->zona_clientes = (string)$this->zona_clientes;
       $this->clasificacion_clientes = $this->rs_grid->fields[42] ;  
       $this->clasificacion_clientes = (string)$this->clasificacion_clientes;
       $this->creado = $this->rs_grid->fields[43] ;  
       $this->disponible = $this->rs_grid->fields[44] ;  
       $this->id_pedido_tmp = $this->rs_grid->fields[45] ;  
       $this->id_pedido_tmp = (string)$this->id_pedido_tmp;
       $this->n_pedido_tmp = $this->rs_grid->fields[46] ;  
       $this->total_pedido_tmp = $this->rs_grid->fields[47] ;  
       $this->total_pedido_tmp =  str_replace(",", ".", $this->total_pedido_tmp);
       $this->total_pedido_tmp = (string)$this->total_pedido_tmp;
       $this->obs_pedido_tmp = $this->rs_grid->fields[48] ;  
       $this->vend_pedido_tmp = $this->rs_grid->fields[49] ;  
       $this->ciudad = $this->rs_grid->fields[50] ;  
       $this->codigo_postal = $this->rs_grid->fields[51] ;  
       $this->lenguaje = $this->rs_grid->fields[52] ;  
       $this->nombre_comercil = $this->rs_grid->fields[53] ;  
       $this->notificar = $this->rs_grid->fields[54] ;  
       $this->puc_auxiliar_deudores = $this->rs_grid->fields[55] ;  
       $this->puc_retefuente_ventas = $this->rs_grid->fields[56] ;  
       $this->puc_retefuente_servicios_clie = $this->rs_grid->fields[57] ;  
       $this->puc_auxiliar_proveedores = $this->rs_grid->fields[58] ;  
       $this->puc_retefuente_compras = $this->rs_grid->fields[59] ;  
       $this->puc_retefuente_servicios_prov = $this->rs_grid->fields[60] ;  
       $this->nube = $this->rs_grid->fields[61] ;  
       $this->tipo_documento = $this->rs_grid->fields[62] ;  
       $this->estado = $this->rs_grid->fields[63] ;  
       if (!isset($this->loatiende)) { $this->loatiende = ""; }
       $GLOBALS["idmuni"] = $this->rs_grid->fields[4] ;  
       $GLOBALS["idmuni"] = (string)$GLOBALS["idmuni"] ;
       $GLOBALS["loatiende"] = $this->rs_grid->fields[20] ;  
       $GLOBALS["loatiende"] = (string)$GLOBALS["loatiende"] ;
       $this->arg_sum_loatiende = ($this->loatiende == "") ? " is null " : " = " . $this->loatiende;
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->SC_sep_quebra = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor") 
       {
           $this->loatiende_Old = $this->loatiende ; 
           $this->quebra_loatiende_vendedor($this->loatiende) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by") 
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp] : $cmp;
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               $Cmp_Old    = $cmp . '_Old';
               $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
           }
           $sql_where = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               if (!empty($Format_tst))
               {
                   $tmp = $this->$cmp;
                   if (!empty($tmp))
                   {
                       $sql = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                   }
               }
               $cmp_qb     = $this->$cmp;
               $tmp        = "arg_sum_" . $cmp;
               $sql_where .= (!empty($sql_where)) ? " and " : "";
               $sql_where .= $sql . $this->$tmp;
               $tmp        = "quebra_" . $cmp . "_sc_free_group_by";
               $this->$tmp($cmp_qb, $sql_where, $cmp);
           }
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->documento = $this->rs_grid->fields[0] ;  
           $this->dv = $this->rs_grid->fields[1] ;  
           $this->nombres = $this->rs_grid->fields[2] ;  
           $this->direccion = $this->rs_grid->fields[3] ;  
           $this->idmuni = $this->rs_grid->fields[4] ;  
           $this->tel_cel = $this->rs_grid->fields[5] ;  
           $this->cliente = $this->rs_grid->fields[6] ;  
           $this->proveedor = $this->rs_grid->fields[7] ;  
           $this->empleado = $this->rs_grid->fields[8] ;  
           $this->si_nomina = $this->rs_grid->fields[9] ;  
           $this->idtercero = $this->rs_grid->fields[10] ;  
           $this->nacimiento = $this->rs_grid->fields[11] ;  
           $this->sexo = $this->rs_grid->fields[12] ;  
           $this->urlmail = $this->rs_grid->fields[13] ;  
           $this->fechault = $this->rs_grid->fields[14] ;  
           $this->saldo = $this->rs_grid->fields[15] ;  
           $this->afiliacion = $this->rs_grid->fields[16] ;  
           $this->regimen = $this->rs_grid->fields[17] ;  
           $this->tipo = $this->rs_grid->fields[18] ;  
           $this->observaciones = $this->rs_grid->fields[19] ;  
           $this->loatiende = $this->rs_grid->fields[20] ;  
           $this->contacto = $this->rs_grid->fields[21] ;  
           $this->credito = $this->rs_grid->fields[22] ;  
           $this->cupo = $this->rs_grid->fields[23] ;  
           $this->listaprecios = $this->rs_grid->fields[24] ;  
           $this->con_actual = $this->rs_grid->fields[25] ;  
           $this->efec_retencion = $this->rs_grid->fields[26] ;  
           $this->urlmail_1 = $this->rs_grid->fields[27] ;  
           $this->nombre1 = $this->rs_grid->fields[28] ;  
           $this->nombre2 = $this->rs_grid->fields[29] ;  
           $this->apellido1 = $this->rs_grid->fields[30] ;  
           $this->apellido2 = $this->rs_grid->fields[31] ;  
           $this->sucur_cliente = $this->rs_grid->fields[32] ;  
           $this->representante = $this->rs_grid->fields[33] ;  
           $this->es_restaurante = $this->rs_grid->fields[34] ;  
           $this->dias_credito = $this->rs_grid->fields[35] ;  
           $this->dias_mora = $this->rs_grid->fields[36] ;  
           $this->cupo_vendedor = $this->rs_grid->fields[37] ;  
           $this->codigo_ter = $this->rs_grid->fields[38] ;  
           $this->es_cajero = $this->rs_grid->fields[39] ;  
           $this->autorizado = $this->rs_grid->fields[40] ;  
           $this->zona_clientes = $this->rs_grid->fields[41] ;  
           $this->clasificacion_clientes = $this->rs_grid->fields[42] ;  
           $this->creado = $this->rs_grid->fields[43] ;  
           $this->disponible = $this->rs_grid->fields[44] ;  
           $this->id_pedido_tmp = $this->rs_grid->fields[45] ;  
           $this->n_pedido_tmp = $this->rs_grid->fields[46] ;  
           $this->total_pedido_tmp = $this->rs_grid->fields[47] ;  
           $this->obs_pedido_tmp = $this->rs_grid->fields[48] ;  
           $this->vend_pedido_tmp = $this->rs_grid->fields[49] ;  
           $this->ciudad = $this->rs_grid->fields[50] ;  
           $this->codigo_postal = $this->rs_grid->fields[51] ;  
           $this->lenguaje = $this->rs_grid->fields[52] ;  
           $this->nombre_comercil = $this->rs_grid->fields[53] ;  
           $this->notificar = $this->rs_grid->fields[54] ;  
           $this->puc_auxiliar_deudores = $this->rs_grid->fields[55] ;  
           $this->puc_retefuente_ventas = $this->rs_grid->fields[56] ;  
           $this->puc_retefuente_servicios_clie = $this->rs_grid->fields[57] ;  
           $this->puc_auxiliar_proveedores = $this->rs_grid->fields[58] ;  
           $this->puc_retefuente_compras = $this->rs_grid->fields[59] ;  
           $this->puc_retefuente_servicios_prov = $this->rs_grid->fields[60] ;  
           $this->nube = $this->rs_grid->fields[61] ;  
           $this->tipo_documento = $this->rs_grid->fields[62] ;  
           $this->estado = $this->rs_grid->fields[63] ;  
           if (!isset($this->loatiende)) { $this->loatiende = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_todos_13122021']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_todos_13122021']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Terceros :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                    <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no">
                    <meta name="mobile-web-app-capable" content="yes">
                    <meta name="apple-mobile-web-app-capable" content="yes">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <link rel="apple-touch-icon"   sizes="57x57" href="">
                    <link rel="apple-touch-icon"   sizes="60x60" href="">
                    <link rel="apple-touch-icon"   sizes="72x72" href="">
                    <link rel="apple-touch-icon"   sizes="76x76" href="">
                    <link rel="apple-touch-icon" sizes="114x114" href="">
                    <link rel="apple-touch-icon" sizes="120x120" href="">
                    <link rel="apple-touch-icon" sizes="144x144" href="">
                    <link rel="apple-touch-icon" sizes="152x152" href="">
                    <link rel="apple-touch-icon" sizes="180x180" href="">
                    <link rel="icon" type="image/png" sizes="192x192" href="">
                    <link rel="icon" type="image/png"   sizes="32x32" href="">
                    <link rel="icon" type="image/png"   sizes="96x96" href="">
                    <link rel="icon" type="image/png"   sizes="16x16" href="">
                    <meta name="msapplication-TileColor" content="#61678C">
                    <meta name="msapplication-TileImage" content="">
                    <meta name="theme-color" content="#61678C">
                    <meta name="apple-mobile-web-app-status-bar-style" content="#61678C">
                    <link rel="shortcut icon" href=""><?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php 
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
 ?> 
 <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
 <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pivot_charts']) : 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               grid_terceros_todos_13122021_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_terceros_todos_13122021_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_terceros_todos_13122021_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_terceros_todos_13122021_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_terceros_todos_13122021_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Terceros</TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
$nm_saida->saida("                        <meta name=\"viewport\" content=\"minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no\">\r\n");
$nm_saida->saida("                        <meta name=\"mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileColor\" content=\"#61678C\" >\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileImage\" content=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"theme-color\" content=\"#61678C\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#61678C\">\r\n");
$nm_saida->saida("                        <link rel=\"shortcut icon\" href=\"\">\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
       $css_body = "margin-top:0px;margin-bottom:0px;";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'] && !$this->Ini->sc_export_ajax)
       { 
           $nm_saida->saida("   <form name=\"form_ajax_redir_1\" method=\"post\" style=\"display: none\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <form name=\"form_ajax_redir_2\" method=\"post\" style=\"display: none\"> \r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\">\r\n");
           $nm_saida->saida("   </form>\r\n");
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
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButton = \"" . $confirmButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButton = \"" . $cancelButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonText = \"" . $confirmButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonText = \"" . $cancelButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFA = \"" . $confirmButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFA = \"" . $cancelButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFAPos = \"" . $confirmButtonFAPos . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFAPos = \"" . $cancelButtonFAPos . "\";\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_terceros_todos_13122021_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_terceros_todos_13122021_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_terceros_todos_13122021_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_sweetalert.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/sweetalert2.all.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/polyfill.min.js\"></script>\r\n");
           $nm_saida->saida("<script type=\"text/javascript\" src=\"../_lib/lib/js/frameControl.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("      if (!window.Promise)\r\n");
           $nm_saida->saida("      {\r\n");
           $nm_saida->saida("          var head = document.getElementsByTagName('head')[0];\r\n");
           $nm_saida->saida("          var js = document.createElement(\"script\");\r\n");
           $nm_saida->saida("          js.src = \"../_lib/lib/js/bluebird.min.js\";\r\n");
           $nm_saida->saida("          head.appendChild(js);\r\n");
           $nm_saida->saida("      }\r\n");
           $nm_saida->saida("      $(\"#TB_iframeContent\").ready(function(){\r\n");
           $nm_saida->saida("         jQuery(document).bind('keydown.thickbox', function(e) {\r\n");
           $nm_saida->saida("            var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("            if (keyPressed == 27) { \r\n");
           $nm_saida->saida("                tb_remove();\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("         })\r\n");
           $nm_saida->saida("      })\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/css/ui.dropdownchecklist.standalone.css\" type=\"text/css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/js/ui.dropdownchecklist.js\"></script>\r\n");
           $nm_saida->saida("        <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("          var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("          var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("          var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("        </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput2.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/bluebird.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
           { 
               $nm_saida->saida("   function sc_session_redir(url_redir)\r\n");
               $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       if (typeof(sc_session_redir_mobile) === typeof(function(){})) { sc_session_redir_mobile(url_redir); }\r\n");
               $nm_saida->saida("       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           window.parent.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("       else\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.close();\r\n");
               $nm_saida->saida("               window.opener.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("           else\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.location = url_redir;\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("   }\r\n");
           }
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var Qsearch_ok = true;\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] != "on")
           {
               $nm_saida->saida("   Qsearch_ok = false;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid']) . ";\r\n");
           }
           $nm_saida->saida("  function SC_init_jquery(isScrollNav){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           $nm_saida->saida("     NM_btn_disable();\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     \$('#SC_fast_search_top').keyup(function(e) {\r\n");
               $nm_saida->saida("       scQuickSearchKeyUp('top', e);\r\n");
               $nm_saida->saida("     });\r\n");
           }
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#id_F0_bot').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").mouseup(function(event){\r\n");
           $nm_saida->saida("          event.preventDefault();\r\n");
           $nm_saida->saida("          if(event.target !== event.currentTarget) return;\r\n");
           $nm_saida->saida("          if($(this).find(\"a\").prop('href') != '')\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              $(this).find(\"a\").click();\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("          else\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              eval($(this).find(\"a\").prop('onclick'));\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ancor_save']);
           }
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     scQuickSearchKeyUp('top', null);\r\n");
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scQuickSearchSubmit_top() {\r\n");
           $nm_saida->saida("     document.F0_top.nmgp_opcao.value = 'fast_search';\r\n");
           $nm_saida->saida("     document.F0_top.submit();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchKeyUp(sPos, e) {\r\n");
           $nm_saida->saida("     if (null != e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("         if ('top' == sPos) nm_gp_submit_qsearch('top');\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       else\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#SC_fast_search_submit_top').show();\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_groupby_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnGroupByHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#sel_groupby_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridShow(origem, embbed, pos, format, tipo) {\r\n");
     if (!$_SESSION['scriptcase']['proc_mobile']) { 
           $nm_saida->saida("     if(format == 'simplified')\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("       if($(\"#id_save_grid_div_\" + pos).parent().hasClass('scBtnGrpText'))\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           id_parent_btn = $(\"#id_save_grid_div_\" + pos).closest('table').prev().attr('id');\r\n");
           $nm_saida->saida("           saveGrid = $(\"#id_div_save_grid_new_\" + pos).detach();\r\n");
           $nm_saida->saida("           $(\"#\" + id_parent_btn).append(saveGrid);\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       if(tipo == '')\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("         tipo = 'save';\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       if ($(\"#id_div_save_grid_new_\" + pos).css('display') != 'none') {\r\n");
               $nm_saida->saida("         $(\"#save_grid_\" + pos).removeClass(\"selected\");\r\n");
           $nm_saida->saida("         $(\"#id_div_save_grid_new_\" + pos).hide();\r\n");
               $nm_saida->saida("         return;\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("         if ($(\"#sc_id_save_grid_placeholder_\" + pos).css('display') != 'none') {\r\n");
               $nm_saida->saida("             $(\"#save_grid_\" + pos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("             scBtnSaveGridHide(pos);\r\n");
               $nm_saida->saida("             return;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("       }\r\n");
     }
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"POST\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: \"grid_terceros_todos_13122021_save_grid.php\",\r\n");
           $nm_saida->saida("       data: \"str_save_grid_option=\"+ tipo +\"&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . $this->Ini->sc_page . "&script_origem=\" + origem + \"&embbed_groupby=\" + embbed + \"&toolbar_pos=\" + pos + \"&format=\" + format\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("     if($(\"#id_div_save_grid_new_\" + pos).length > 0)\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("       str_width  = $(document).width();\r\n");
           $nm_saida->saida("       str_height = $(document).height();\r\n");
           $nm_saida->saida("       $(\"#id_div_save_grid_new_\" + pos).html(data);\r\n");
           $nm_saida->saida("       $(\"#id_div_save_grid_new_\" + pos).show();\r\n");
           $nm_saida->saida("       saveGridAdjustHeightWidth(pos, str_width, str_height);\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + pos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + pos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + pos).show();\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
$nm_saida->saida("function scBtnSaveGridSessionResponse(opcao, parm, pos)\r\n");
$nm_saida->saida("{\r\n");
$nm_saida->saida("    $.ajax({\r\n");
$nm_saida->saida("      type: \"POST\",\r\n");
$nm_saida->saida("      url: \"grid_terceros_todos_13122021_save_grid.php\",\r\n");
$nm_saida->saida("      data: \"ajax_ctrl=proc_ajax&script_case_init=" . $this->Ini->sc_page . "&Fsave_ok=\"+ opcao +\"&parm=\"+ parm +\"&toolbar_pos=\" + pos\r\n");
$nm_saida->saida("    })\r\n");
$nm_saida->saida("     .done(function(jsonReturn) {\r\n");
$nm_saida->saida("            var i, oResp;\r\n");
$nm_saida->saida("            Tst_integrid = jsonReturn.trim();\r\n");
$nm_saida->saida("            if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
$nm_saida->saida("             alert (jsonReturn);\r\n");
$nm_saida->saida("             return;\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            eval(\"oResp = \" + jsonReturn);\r\n");
$nm_saida->saida("            if (oResp[\"setHtml\"]) {\r\n");
$nm_saida->saida("                for (i = 0; i < oResp[\"setHtml\"].length; i++) {\r\n");
$nm_saida->saida("                    $(\"#\" + oResp[\"setHtml\"][i][\"field\"]).html(oResp[\"setHtml\"][i][\"value\"]);\r\n");
$nm_saida->saida("                }\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            if (oResp[\"setDisplay\"]) {\r\n");
$nm_saida->saida("                for (i = 0; i < oResp[\"setDisplay\"].length; i++) {\r\n");
$nm_saida->saida("                    $(\"#\" + oResp[\"setDisplay\"][i][\"field\"]).css(\"display\", oResp[\"setDisplay\"][i][\"value\"]);\r\n");
$nm_saida->saida("                }\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            if (oResp[\"Fsave_ok\"] && oResp[\"Fsave_ok\"] != '') {\r\n");
$nm_saida->saida("                  if(oResp[\"Fsave_ok\"] == 'save_conf_grid')\r\n");
$nm_saida->saida("                  {                    sweetAlertConfig = {\r\n");
$nm_saida->saida("                        customClass: {\r\n");
$nm_saida->saida("                            popup: 'scSweetAlertPopup',\r\n");
$nm_saida->saida("                            header: 'scSweetAlertHeader',\r\n");
$nm_saida->saida("                            content: 'scSweetAlertMessage',\r\n");
$nm_saida->saida("                            confirmButton: scSweetAlertConfirmButton,\r\n");
$nm_saida->saida("                            cancelButton: scSweetAlertCancelButton\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    };\r\n");
$nm_saida->saida("                    sweetAlertConfig['toast'] = true;\r\n");
$nm_saida->saida("                    sweetAlertConfig['showConfirmButton'] = false;\r\n");
$nm_saida->saida("                    sweetAlertConfig['showCancelButton'] = false;\r\n");
$nm_saida->saida("                    sweetAlertConfig['customClass']['popup'] = 'scToastPopup';\r\n");
$nm_saida->saida("                    sweetAlertConfig['customClass']['header'] = 'scToastHeader';\r\n");
$nm_saida->saida("                    sweetAlertConfig['customClass']['content'] = 'scToastMessage';\r\n");
$nm_saida->saida("                    sweetAlertConfig['timer'] = 3000;\r\n");
$nm_saida->saida("                    sweetAlertConfig[\"position\"] = \"\";\r\n");
$nm_saida->saida("                    sweetAlertConfig[\"text\"] = \"" . $this->Ini->Nm_lang['lang_othr_savegrid_save_msge'] . "\";\r\n");
$nm_saida->saida("                    Swal.fire(sweetAlertConfig);                  }\r\n");
$nm_saida->saida("                  else if(oResp[\"Fsave_ok\"] == 'select_conf_grid')\r\n");
$nm_saida->saida("                  {\r\n");
$nm_saida->saida("                      nm_gp_move('igual', '0');\r\n");
$nm_saida->saida("                  }\r\n");
$nm_saida->saida("                  else if(oResp[\"Fsave_ok\"] == 'default')\r\n");
$nm_saida->saida("                  {\r\n");
$nm_saida->saida("                      nm_gp_move('igual', '0');\r\n");
$nm_saida->saida("                  }\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            if (oResp[\"toolbar_pos\"] && oResp[\"toolbar_pos\"] != '') {\r\n");
$nm_saida->saida("                $('#sc_btgp_div_grid_session_' + oResp[\"toolbar_pos\"]).hide();\r\n");
$nm_saida->saida("                $('#save_grid_session_' + oResp[\"toolbar_pos\"]).removeClass('selected');\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("function scBtnSaveGridSessionSave(pos){\r\n");
$nm_saida->saida("    scBtnSaveGridSessionResponse('save_conf_grid', 'session', pos);\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("function scBtnSaveGridSessionLoad(pos){\r\n");
$nm_saida->saida("    scBtnSaveGridSessionResponse('select_conf_grid', 'session', pos);\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("function scBtnSaveGridSessionReset(pos){\r\n");
$nm_saida->saida("    scBtnSaveGridSessionResponse('default', 'session', pos);\r\n");
$nm_saida->saida("}\r\n");
           $nm_saida->saida("   function saveGridAdjustHeightWidth(pos, str_width, str_height) {\r\n");
           $nm_saida->saida("       if(($('#save_grid_' + pos).offset().top+($('#id_div_save_grid_new_' + pos).height() * 2)+10) >= str_height)\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#id_div_save_grid_new_' + pos).offset({top:($('#save_grid_' + pos).offset().top-($('#save_grid_' + pos).height()/2)-$('#id_div_save_grid_new_' + pos).height())});\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       if(($('#save_grid_' + pos).offset().left + $('#id_div_save_grid_new_' + pos).outerWidth() +10) >= str_width)\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#id_div_save_grid_new_' + pos).css('left', str_width - $('#id_div_save_grid_new_' + pos).outerWidth() - 50)\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_sel_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnSelCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#selcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("    var rs =$.ajax({\r\n");
$nm_saida->saida("                type: \"POST\",\r\n");
$nm_saida->saida("                url: 'index.php?script_case_init=" . $this->Ini->sc_page . "',\r\n");
$nm_saida->saida("                async: true,\r\n");
$nm_saida->saida("                data: 'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p='+ p + '&p_cache='+ p_cache,\r\n");
$nm_saida->saida("            }).done(function (rs) {\r\n");
$nm_saida->saida("                    if(rs.indexOf('</span>') != -1){\r\n");
$nm_saida->saida("                        rs = rs.substr(rs.indexOf('</span>')  + 7);\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                    if (rs != 0) {\r\n");
$nm_saida->saida("                        rs = rs.trim();\r\n");
$nm_saida->saida("                        rs_split = rs.split('_@@NM@@_');\r\n");
$nm_saida->saida("                        rs_orig = rs_split[0];\r\n");
$nm_saida->saida("                        rs = rs_split[1];\r\n");
$nm_saida->saida("                        if($('#id_sc_field_'+ field +'_'+i+'  > a > img').length != 0){\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', rs);\r\n");
$nm_saida->saida("                            var __tmp = $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else{\r\n");
$nm_saida->saida("                            if($('#id_sc_field_'+ field +'_'+i+' > a').length > 0 && ($('#id_sc_field_'+ field +'_'+i+' > a').attr('href')).indexOf('@SC_par@') != -1){\r\n");
$nm_saida->saida("                                var __file_doc = $('#id_sc_field_'+ field +'_'+i+' > a').attr('href').split('@SC_par@');\r\n");
$nm_saida->saida("                                var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href', __file_doc.join('@SC_par@') );\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                            else{\r\n");
$nm_saida->saida("                                if($('#id_sc_field_'+field+'_'+i+' > span > a').length > 0){\r\n");
$nm_saida->saida("                                    var __tmp = $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                                    if(__tmp[0].indexOf('nm_mostra_img') != -1){\r\n");
$nm_saida->saida("                                        __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                                    } else{\r\n");
$nm_saida->saida("                                        var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                                        var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                        ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                        __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                        __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                                        $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                        //__tmp[1] = \"'\"+rs_orig+\"')\";\r\n");
$nm_saida->saida("                                    }\r\n");
$nm_saida->saida("                                    $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                }\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_order_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnOrderCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#ordcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).addClass('selected');\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = '';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     }).mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup, bForce) {\r\n");
           $nm_saida->saida("     if (bForce || 'over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("       $('#sc_btgp_btn_' + sGroup).removeClass('selected');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_terceros_todos_13122021_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
           $this->NM_css_val_embed .= "win";
           $this->NM_css_ajx_embed .= "ult_set";
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\" />\r\n");
 } 
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_terceros_todos_13122021_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_terceros_todos_13122021_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf'] != "pdf")
       {
           $nm_saida->saida("  .css_iframes   { margin-bottom: 0px; margin-left: 0px;  margin-right: 0px;  margin-top: 0px; }\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
       { 
           $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
       } 
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
  {
   $nm_saida->saida("      thead { display: table-header-group !important; }\r\n");
   $nm_saida->saida("      tfoot { display: table-row-group !important; }\r\n");
   $nm_saida->saida("      table td, table tr, td, tr, table { page-break-inside: avoid !important; }\r\n");
   $nm_saida->saida("      #summary_body > td { padding: 0px !important; }\r\n");
  }
           $nm_saida->saida("  </style>\r\n");
       }
       if (!empty($this->SC_Buf_onInit))
       { 
       $nm_saida->saida("" . $this->SC_Buf_onInit . "\r\n");
       } 
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_terceros_todos_13122021_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] == "print")) 
       {
           if ($this->Print_All) 
           {
               $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           }
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"-webkit-print-color-adjust: exact;" . $css_body . "\">\r\n");
           $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" " . $this->Tab_width . ">\r\n");
           $nm_saida->saida("     <TR>\r\n");
           $nm_saida->saida("       <TD>\r\n");
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $nm_saida->saida("       </TD>\r\n");
           $nm_saida->saida("     </TR>\r\n");
           $nm_saida->saida("   </TABLE>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     $(\"#Bprint_print\").addClass(\"disabled\").prop(\"disabled\", true);\r\n");
           $nm_saida->saida("     $(function() {\r\n");
           $nm_saida->saida("         $(\"#Bprint_print\").removeClass(\"disabled\").prop(\"disabled\", false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     function prit_web_page()\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("        if ($(\"#Bprint_print\").prop(\"disabled\")) {\r\n");
           $nm_saida->saida("            return;\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
           $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
           $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
           $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
           $nm_saida->saida("        window.print();\r\n");
           $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("  </script>\r\n");
       }
       else
       {
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Vendedor", "loatiende");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Vendedor", "loatiende");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'])
       { 
           $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD  colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_A_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_A_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_E_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_E_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <td style=\"padding: 0px;  vertical-align: top;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\"><tr>\r\n");
           $nm_saida->saida("    <TD colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_AL_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_AL_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
        } 
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   {
       $this->arr_buttons = array_merge($this->arr_buttons, $this->Ini->arr_buttons_usr);
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_terceros_todos_13122021']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_terceros_todos_13122021']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_terceros_todos_13122021']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_terceros_todos_13122021']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage           = $compl_css . "scGridPage";
   $this->css_scGridPageLink       = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar        = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd    = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj      = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader         = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont     = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter         = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont     = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock          = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont      = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign     = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal          = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont      = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal       = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont   = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven      = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont  = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert  = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink  = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd       = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont   = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert   = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink   = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick     = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver      = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel          = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert      = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont      = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink      = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela         = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd       = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg        = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg    = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg   = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap    = "";
   $this->css_scAppDivMoldura      = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader       = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText   = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent      = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText  = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar      = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput = $compl_css . "scAppDivToolbarInput";

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida']) ? "grid_terceros_todos_13122021_" : "";
   $this->css_sep = " ";
   $this->css_documento_label = $compl_css_emb . "css_documento_label";
   $this->css_documento_grid_line = $compl_css_emb . "css_documento_grid_line";
   $this->css_dv_label = $compl_css_emb . "css_dv_label";
   $this->css_dv_grid_line = $compl_css_emb . "css_dv_grid_line";
   $this->css_nombres_label = $compl_css_emb . "css_nombres_label";
   $this->css_nombres_grid_line = $compl_css_emb . "css_nombres_grid_line";
   $this->css_direccion_label = $compl_css_emb . "css_direccion_label";
   $this->css_direccion_grid_line = $compl_css_emb . "css_direccion_grid_line";
   $this->css_idmuni_label = $compl_css_emb . "css_idmuni_label";
   $this->css_idmuni_grid_line = $compl_css_emb . "css_idmuni_grid_line";
   $this->css_tel_cel_label = $compl_css_emb . "css_tel_cel_label";
   $this->css_tel_cel_grid_line = $compl_css_emb . "css_tel_cel_grid_line";
   $this->css_cliente_label = $compl_css_emb . "css_cliente_label";
   $this->css_cliente_grid_line = $compl_css_emb . "css_cliente_grid_line";
   $this->css_proveedor_label = $compl_css_emb . "css_proveedor_label";
   $this->css_proveedor_grid_line = $compl_css_emb . "css_proveedor_grid_line";
   $this->css_empleado_label = $compl_css_emb . "css_empleado_label";
   $this->css_empleado_grid_line = $compl_css_emb . "css_empleado_grid_line";
   $this->css_si_nomina_label = $compl_css_emb . "css_si_nomina_label";
   $this->css_si_nomina_grid_line = $compl_css_emb . "css_si_nomina_grid_line";
   $this->css_idtercero_label = $compl_css_emb . "css_idtercero_label";
   $this->css_idtercero_grid_line = $compl_css_emb . "css_idtercero_grid_line";
   $this->css_nacimiento_label = $compl_css_emb . "css_nacimiento_label";
   $this->css_nacimiento_grid_line = $compl_css_emb . "css_nacimiento_grid_line";
   $this->css_sexo_label = $compl_css_emb . "css_sexo_label";
   $this->css_sexo_grid_line = $compl_css_emb . "css_sexo_grid_line";
   $this->css_urlmail_label = $compl_css_emb . "css_urlmail_label";
   $this->css_urlmail_grid_line = $compl_css_emb . "css_urlmail_grid_line";
   $this->css_fechault_label = $compl_css_emb . "css_fechault_label";
   $this->css_fechault_grid_line = $compl_css_emb . "css_fechault_grid_line";
   $this->css_saldo_label = $compl_css_emb . "css_saldo_label";
   $this->css_saldo_grid_line = $compl_css_emb . "css_saldo_grid_line";
   $this->css_afiliacion_label = $compl_css_emb . "css_afiliacion_label";
   $this->css_afiliacion_grid_line = $compl_css_emb . "css_afiliacion_grid_line";
   $this->css_regimen_label = $compl_css_emb . "css_regimen_label";
   $this->css_regimen_grid_line = $compl_css_emb . "css_regimen_grid_line";
   $this->css_tipo_label = $compl_css_emb . "css_tipo_label";
   $this->css_tipo_grid_line = $compl_css_emb . "css_tipo_grid_line";
   $this->css_observaciones_label = $compl_css_emb . "css_observaciones_label";
   $this->css_observaciones_grid_line = $compl_css_emb . "css_observaciones_grid_line";
   $this->css_loatiende_label = $compl_css_emb . "css_loatiende_label";
   $this->css_loatiende_grid_line = $compl_css_emb . "css_loatiende_grid_line";
   $this->css_contacto_label = $compl_css_emb . "css_contacto_label";
   $this->css_contacto_grid_line = $compl_css_emb . "css_contacto_grid_line";
   $this->css_credito_label = $compl_css_emb . "css_credito_label";
   $this->css_credito_grid_line = $compl_css_emb . "css_credito_grid_line";
   $this->css_cupo_label = $compl_css_emb . "css_cupo_label";
   $this->css_cupo_grid_line = $compl_css_emb . "css_cupo_grid_line";
   $this->css_listaprecios_label = $compl_css_emb . "css_listaprecios_label";
   $this->css_listaprecios_grid_line = $compl_css_emb . "css_listaprecios_grid_line";
   $this->css_con_actual_label = $compl_css_emb . "css_con_actual_label";
   $this->css_con_actual_grid_line = $compl_css_emb . "css_con_actual_grid_line";
   $this->css_efec_retencion_label = $compl_css_emb . "css_efec_retencion_label";
   $this->css_efec_retencion_grid_line = $compl_css_emb . "css_efec_retencion_grid_line";
   $this->css_urlmail_1_label = $compl_css_emb . "css_urlmail_1_label";
   $this->css_urlmail_1_grid_line = $compl_css_emb . "css_urlmail_1_grid_line";
   $this->css_nombre1_label = $compl_css_emb . "css_nombre1_label";
   $this->css_nombre1_grid_line = $compl_css_emb . "css_nombre1_grid_line";
   $this->css_nombre2_label = $compl_css_emb . "css_nombre2_label";
   $this->css_nombre2_grid_line = $compl_css_emb . "css_nombre2_grid_line";
   $this->css_apellido1_label = $compl_css_emb . "css_apellido1_label";
   $this->css_apellido1_grid_line = $compl_css_emb . "css_apellido1_grid_line";
   $this->css_apellido2_label = $compl_css_emb . "css_apellido2_label";
   $this->css_apellido2_grid_line = $compl_css_emb . "css_apellido2_grid_line";
   $this->css_sucur_cliente_label = $compl_css_emb . "css_sucur_cliente_label";
   $this->css_sucur_cliente_grid_line = $compl_css_emb . "css_sucur_cliente_grid_line";
   $this->css_representante_label = $compl_css_emb . "css_representante_label";
   $this->css_representante_grid_line = $compl_css_emb . "css_representante_grid_line";
   $this->css_es_restaurante_label = $compl_css_emb . "css_es_restaurante_label";
   $this->css_es_restaurante_grid_line = $compl_css_emb . "css_es_restaurante_grid_line";
   $this->css_dias_credito_label = $compl_css_emb . "css_dias_credito_label";
   $this->css_dias_credito_grid_line = $compl_css_emb . "css_dias_credito_grid_line";
   $this->css_dias_mora_label = $compl_css_emb . "css_dias_mora_label";
   $this->css_dias_mora_grid_line = $compl_css_emb . "css_dias_mora_grid_line";
   $this->css_cupo_vendedor_label = $compl_css_emb . "css_cupo_vendedor_label";
   $this->css_cupo_vendedor_grid_line = $compl_css_emb . "css_cupo_vendedor_grid_line";
   $this->css_codigo_ter_label = $compl_css_emb . "css_codigo_ter_label";
   $this->css_codigo_ter_grid_line = $compl_css_emb . "css_codigo_ter_grid_line";
   $this->css_es_cajero_label = $compl_css_emb . "css_es_cajero_label";
   $this->css_es_cajero_grid_line = $compl_css_emb . "css_es_cajero_grid_line";
   $this->css_autorizado_label = $compl_css_emb . "css_autorizado_label";
   $this->css_autorizado_grid_line = $compl_css_emb . "css_autorizado_grid_line";
   $this->css_zona_clientes_label = $compl_css_emb . "css_zona_clientes_label";
   $this->css_zona_clientes_grid_line = $compl_css_emb . "css_zona_clientes_grid_line";
   $this->css_clasificacion_clientes_label = $compl_css_emb . "css_clasificacion_clientes_label";
   $this->css_clasificacion_clientes_grid_line = $compl_css_emb . "css_clasificacion_clientes_grid_line";
   $this->css_creado_label = $compl_css_emb . "css_creado_label";
   $this->css_creado_grid_line = $compl_css_emb . "css_creado_grid_line";
   $this->css_disponible_label = $compl_css_emb . "css_disponible_label";
   $this->css_disponible_grid_line = $compl_css_emb . "css_disponible_grid_line";
   $this->css_id_pedido_tmp_label = $compl_css_emb . "css_id_pedido_tmp_label";
   $this->css_id_pedido_tmp_grid_line = $compl_css_emb . "css_id_pedido_tmp_grid_line";
   $this->css_n_pedido_tmp_label = $compl_css_emb . "css_n_pedido_tmp_label";
   $this->css_n_pedido_tmp_grid_line = $compl_css_emb . "css_n_pedido_tmp_grid_line";
   $this->css_total_pedido_tmp_label = $compl_css_emb . "css_total_pedido_tmp_label";
   $this->css_total_pedido_tmp_grid_line = $compl_css_emb . "css_total_pedido_tmp_grid_line";
   $this->css_obs_pedido_tmp_label = $compl_css_emb . "css_obs_pedido_tmp_label";
   $this->css_obs_pedido_tmp_grid_line = $compl_css_emb . "css_obs_pedido_tmp_grid_line";
   $this->css_vend_pedido_tmp_label = $compl_css_emb . "css_vend_pedido_tmp_label";
   $this->css_vend_pedido_tmp_grid_line = $compl_css_emb . "css_vend_pedido_tmp_grid_line";
   $this->css_ciudad_label = $compl_css_emb . "css_ciudad_label";
   $this->css_ciudad_grid_line = $compl_css_emb . "css_ciudad_grid_line";
   $this->css_codigo_postal_label = $compl_css_emb . "css_codigo_postal_label";
   $this->css_codigo_postal_grid_line = $compl_css_emb . "css_codigo_postal_grid_line";
   $this->css_lenguaje_label = $compl_css_emb . "css_lenguaje_label";
   $this->css_lenguaje_grid_line = $compl_css_emb . "css_lenguaje_grid_line";
   $this->css_nombre_comercil_label = $compl_css_emb . "css_nombre_comercil_label";
   $this->css_nombre_comercil_grid_line = $compl_css_emb . "css_nombre_comercil_grid_line";
   $this->css_notificar_label = $compl_css_emb . "css_notificar_label";
   $this->css_notificar_grid_line = $compl_css_emb . "css_notificar_grid_line";
   $this->css_puc_auxiliar_deudores_label = $compl_css_emb . "css_puc_auxiliar_deudores_label";
   $this->css_puc_auxiliar_deudores_grid_line = $compl_css_emb . "css_puc_auxiliar_deudores_grid_line";
   $this->css_puc_retefuente_ventas_label = $compl_css_emb . "css_puc_retefuente_ventas_label";
   $this->css_puc_retefuente_ventas_grid_line = $compl_css_emb . "css_puc_retefuente_ventas_grid_line";
   $this->css_puc_retefuente_servicios_clie_label = $compl_css_emb . "css_puc_retefuente_servicios_clie_label";
   $this->css_puc_retefuente_servicios_clie_grid_line = $compl_css_emb . "css_puc_retefuente_servicios_clie_grid_line";
   $this->css_puc_auxiliar_proveedores_label = $compl_css_emb . "css_puc_auxiliar_proveedores_label";
   $this->css_puc_auxiliar_proveedores_grid_line = $compl_css_emb . "css_puc_auxiliar_proveedores_grid_line";
   $this->css_puc_retefuente_compras_label = $compl_css_emb . "css_puc_retefuente_compras_label";
   $this->css_puc_retefuente_compras_grid_line = $compl_css_emb . "css_puc_retefuente_compras_grid_line";
   $this->css_puc_retefuente_servicios_prov_label = $compl_css_emb . "css_puc_retefuente_servicios_prov_label";
   $this->css_puc_retefuente_servicios_prov_grid_line = $compl_css_emb . "css_puc_retefuente_servicios_prov_grid_line";
   $this->css_nube_label = $compl_css_emb . "css_nube_label";
   $this->css_nube_grid_line = $compl_css_emb . "css_nube_grid_line";
   $this->css_tipo_documento_label = $compl_css_emb . "css_tipo_documento_label";
   $this->css_tipo_documento_grid_line = $compl_css_emb . "css_tipo_documento_grid_line";
   $this->css_estado_label = $compl_css_emb . "css_estado_label";
   $this->css_estado_grid_line = $compl_css_emb . "css_estado_grid_line";
   $this->css_facturas_label = $compl_css_emb . "css_facturas_label";
   $this->css_facturas_grid_line = $compl_css_emb . "css_facturas_grid_line";
   $this->css_sc_asigna_vendedor_label = $compl_css_emb . "css_sc_asigna_vendedor_label";
   $this->css_sc_asigna_vendedor_grid_line = $compl_css_emb . "css_sc_asigna_vendedor_grid_line";
 }  
 function cabecalho()
 {
     if($_SESSION['scriptcase']['proc_mobile'] && method_exists($this, 'cabecalho_mobile'))
     {
         $this->cabecalho_mobile();
     }
     else if(method_exists($this, 'cabecalho_normal'))
     {
         $this->cabecalho_normal();
     }
 }
// 
//----- 
 function cabecalho_normal()
 {
   global
          $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
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
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" colspan=3 style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert']) 
     {
         if($this->Tem_tab_vert)
         {
           $nm_saida->saida("   <TD colspan=\"2\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
         else{
           $nm_saida->saida("   <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
     }
     else{
           $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     }
   } 
   if ($this->Ini->Export_img_zip)
   {
       $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__groups_people_people_1715.png";
       $img_LIN1_COL3 = "usr__NM__bg__NM__groups_people_people_1715.png";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img)
   {
       $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__groups_people_people_1715.png";
       $tmp_img_word = fopen($loc_img_word, "rb");
       $reg_img_word = fread($tmp_img_word, filesize($loc_img_word));
       fclose($tmp_img_word);
       $img_LIN1_COL3 = "data:image/jpeg;base64," . base64_encode($reg_img_word);
   }
   else
   {
       $img_LIN1_COL3 = $this->NM_raiz_img . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__groups_people_people_1715.png";
   }
   $nm_saida->saida("<TABLE width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" cellpadding=\"0\" cellspacing=\"0\">\r\n");
   $nm_saida->saida("<TR align=\"center\">\r\n");
   $nm_saida->saida(" <TD colspan=\"3\">\r\n");
   $nm_saida->saida("     <table  style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n");
   $nm_saida->saida("       <tr valign=\"middle\">\r\n");
   $nm_saida->saida("         <td align=\"left\" ><span class=\"" . $this->css_scGridHeaderFont . "\"> Terceros </span></td>\r\n");
   $nm_saida->saida("         <td style=\"font-size: 5px\">&nbsp; &nbsp; </td>\r\n");
   $nm_saida->saida("         <td align=\"center\" ><span class=\"" . $this->css_scGridHeaderFont . "\"> " . $nm_cab_filtro . " </span></td>\r\n");
   $nm_saida->saida("         <td style=\"font-size: 5px\">&nbsp; &nbsp; </td>\r\n");
   $nm_saida->saida("         <td align=\"right\" ><span class=\"" . $this->css_scGridHeaderFont . "\">    <IMG SRC=\"" . $img_LIN1_COL3 . "\" BORDER=\"0\"/> &nbsp;&nbsp;</span></td>\r\n");
   $nm_saida->saida("         <td width=\"3px\" class=\"" . $this->css_scGridHeader . "\"></td>\r\n");
   $nm_saida->saida("       </tr>\r\n");
   $nm_saida->saida("     </table>\r\n");
   $nm_saida->saida(" </TD>\r\n");
   $nm_saida->saida("</TR>\r\n");
   $nm_saida->saida("<TR align=\"center\" >\r\n");
   $nm_saida->saida("  <TD height=\"5px\" class=\"" . $this->css_scGridHeader . "\"></TD>\r\n");
   $nm_saida->saida("  <TD height=\"1px\" class=\"" . $this->css_scGridHeader . "\"></TD>\r\n");
   $nm_saida->saida("  <TD height=\"1px\" class=\"" . $this->css_scGridHeader . "\"></TD>\r\n");
   $nm_saida->saida("</TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   $this->SC_contr_ck_grid = (!isset($this->SC_contr_ck_grid)) ? "''" : "none";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_grid_terceros_todos_13122021__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_terceros_todos_13122021-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sc_asigna_vendedor_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sc_asigna_vendedor_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($this->NM_btn_run_show) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sc_asigna_vendedor_label'] . "\" ><input type=checkbox id=\"NM_ck_run0\" name=\"NM_ck_grid[]\" value=\"0\" style=\"display:" . $this->SC_contr_ck_grid . "\" onClick=\"nm_marca_check_grid(this)\"></TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sc_asigna_vendedor_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $css_emb = "<style type=\"text/css\">";
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_terceros_todos_13122021_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_documento()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Cédula/Nit"; 
   if (!isset($this->NM_cmp_hidden['documento']) || $this->NM_cmp_hidden['documento'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_documento_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_documento_label'] . "\" NOWRAP WIDTH=\"100px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] == 'documento')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('documento')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_dv()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['dv'])) ? $this->New_label['dv'] : "DV"; 
   if (!isset($this->NM_cmp_hidden['dv']) || $this->NM_cmp_hidden['dv'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_dv_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_dv_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nombres()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nombres'])) ? $this->New_label['nombres'] : "Nombres"; 
   if (!isset($this->NM_cmp_hidden['nombres']) || $this->NM_cmp_hidden['nombres'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nombres_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nombres_label'] . "\" NOWRAP WIDTH=\"150px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] == 'nombres')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('nombres')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_direccion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Dirección"; 
   if (!isset($this->NM_cmp_hidden['direccion']) || $this->NM_cmp_hidden['direccion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_direccion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_direccion_label'] . "\" NOWRAP WIDTH=\"250px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] == 'direccion')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('direccion')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_idmuni()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idmuni'])) ? $this->New_label['idmuni'] : "Ciudad"; 
   if (!isset($this->NM_cmp_hidden['idmuni']) || $this->NM_cmp_hidden['idmuni'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idmuni_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idmuni_label'] . "\" NOWRAP WIDTH=\"80px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_tel_cel()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tel_cel'])) ? $this->New_label['tel_cel'] : "Tel. o celular"; 
   if (!isset($this->NM_cmp_hidden['tel_cel']) || $this->NM_cmp_hidden['tel_cel'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tel_cel_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tel_cel_label'] . "\" NOWRAP WIDTH=\"100px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] == 'tel_cel')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('tel_cel')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_cliente()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
   if (!isset($this->NM_cmp_hidden['cliente']) || $this->NM_cmp_hidden['cliente'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cliente_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cliente_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_proveedor()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['proveedor'])) ? $this->New_label['proveedor'] : "Proveedor"; 
   if (!isset($this->NM_cmp_hidden['proveedor']) || $this->NM_cmp_hidden['proveedor'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_proveedor_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_proveedor_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_empleado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
   if (!isset($this->NM_cmp_hidden['empleado']) || $this->NM_cmp_hidden['empleado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_empleado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_empleado_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_si_nomina()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['si_nomina'])) ? $this->New_label['si_nomina'] : "Nómina"; 
   if (!isset($this->NM_cmp_hidden['si_nomina']) || $this->NM_cmp_hidden['si_nomina'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_si_nomina_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_si_nomina_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_idtercero()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idtercero'])) ? $this->New_label['idtercero'] : "Idtercero"; 
   if (!isset($this->NM_cmp_hidden['idtercero']) || $this->NM_cmp_hidden['idtercero'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idtercero_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idtercero_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nacimiento()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nacimiento'])) ? $this->New_label['nacimiento'] : "Fec. Nacimiento"; 
   if (!isset($this->NM_cmp_hidden['nacimiento']) || $this->NM_cmp_hidden['nacimiento'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nacimiento_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nacimiento_label'] . "\" NOWRAP WIDTH=\"70px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_cmp'] == 'nacimiento')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('nacimiento')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_sexo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sexo'])) ? $this->New_label['sexo'] : "Género"; 
   if (!isset($this->NM_cmp_hidden['sexo']) || $this->NM_cmp_hidden['sexo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_sexo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sexo_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_urlmail()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['urlmail'])) ? $this->New_label['urlmail'] : "E-mail"; 
   if (!isset($this->NM_cmp_hidden['urlmail']) || $this->NM_cmp_hidden['urlmail'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_urlmail_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_urlmail_label'] . "\" NOWRAP WIDTH=\"150px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_fechault()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['fechault'])) ? $this->New_label['fechault'] : "Última comp."; 
   if (!isset($this->NM_cmp_hidden['fechault']) || $this->NM_cmp_hidden['fechault'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fechault_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fechault_label'] . "\" NOWRAP WIDTH=\"70px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_saldo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
   if (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_saldo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_saldo_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_afiliacion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['afiliacion'])) ? $this->New_label['afiliacion'] : "Cliente desde"; 
   if (!isset($this->NM_cmp_hidden['afiliacion']) || $this->NM_cmp_hidden['afiliacion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_afiliacion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_afiliacion_label'] . "\" NOWRAP WIDTH=\"70px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_regimen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['regimen'])) ? $this->New_label['regimen'] : "Regimen"; 
   if (!isset($this->NM_cmp_hidden['regimen']) || $this->NM_cmp_hidden['regimen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_regimen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_regimen_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_tipo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
   if (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tipo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tipo_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_observaciones()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_observaciones_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" NOWRAP WIDTH=\"100px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_loatiende()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['loatiende'])) ? $this->New_label['loatiende'] : "Vendedor"; 
   if (!isset($this->NM_cmp_hidden['loatiende']) || $this->NM_cmp_hidden['loatiende'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_loatiende_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_loatiende_label'] . "\" NOWRAP WIDTH=\"30px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_contacto()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['contacto'])) ? $this->New_label['contacto'] : "Contacto"; 
   if (!isset($this->NM_cmp_hidden['contacto']) || $this->NM_cmp_hidden['contacto'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_contacto_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_contacto_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_credito()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
   if (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_credito_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_credito_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_cupo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cupo'])) ? $this->New_label['cupo'] : "Cupo"; 
   if (!isset($this->NM_cmp_hidden['cupo']) || $this->NM_cmp_hidden['cupo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cupo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cupo_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_listaprecios()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['listaprecios'])) ? $this->New_label['listaprecios'] : "Listaprecios"; 
   if (!isset($this->NM_cmp_hidden['listaprecios']) || $this->NM_cmp_hidden['listaprecios'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_listaprecios_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_listaprecios_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_con_actual()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['con_actual'])) ? $this->New_label['con_actual'] : "Con Actual"; 
   if (!isset($this->NM_cmp_hidden['con_actual']) || $this->NM_cmp_hidden['con_actual'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_con_actual_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_con_actual_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_efec_retencion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['efec_retencion'])) ? $this->New_label['efec_retencion'] : "Efec Retencion"; 
   if (!isset($this->NM_cmp_hidden['efec_retencion']) || $this->NM_cmp_hidden['efec_retencion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_efec_retencion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_efec_retencion_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_urlmail_1()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['urlmail_1'])) ? $this->New_label['urlmail_1'] : "Urlmail"; 
   if (!isset($this->NM_cmp_hidden['urlmail_1']) || $this->NM_cmp_hidden['urlmail_1'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_urlmail_1_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_urlmail_1_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nombre1()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "Nombre 1"; 
   if (!isset($this->NM_cmp_hidden['nombre1']) || $this->NM_cmp_hidden['nombre1'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nombre1_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nombre1_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nombre2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "Nombre 2"; 
   if (!isset($this->NM_cmp_hidden['nombre2']) || $this->NM_cmp_hidden['nombre2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nombre2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nombre2_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_apellido1()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "Apellido 1"; 
   if (!isset($this->NM_cmp_hidden['apellido1']) || $this->NM_cmp_hidden['apellido1'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_apellido1_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_apellido1_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_apellido2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "Apellido 2"; 
   if (!isset($this->NM_cmp_hidden['apellido2']) || $this->NM_cmp_hidden['apellido2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_apellido2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_apellido2_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_sucur_cliente()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sucur_cliente'])) ? $this->New_label['sucur_cliente'] : "Sucur Cliente"; 
   if (!isset($this->NM_cmp_hidden['sucur_cliente']) || $this->NM_cmp_hidden['sucur_cliente'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_sucur_cliente_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sucur_cliente_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_representante()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['representante'])) ? $this->New_label['representante'] : "Representante"; 
   if (!isset($this->NM_cmp_hidden['representante']) || $this->NM_cmp_hidden['representante'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_representante_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_representante_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_es_restaurante()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['es_restaurante'])) ? $this->New_label['es_restaurante'] : "Es Restaurante"; 
   if (!isset($this->NM_cmp_hidden['es_restaurante']) || $this->NM_cmp_hidden['es_restaurante'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_es_restaurante_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_es_restaurante_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_dias_credito()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['dias_credito'])) ? $this->New_label['dias_credito'] : "Dias Credito"; 
   if (!isset($this->NM_cmp_hidden['dias_credito']) || $this->NM_cmp_hidden['dias_credito'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_dias_credito_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_dias_credito_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_dias_mora()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['dias_mora'])) ? $this->New_label['dias_mora'] : "Dias Mora"; 
   if (!isset($this->NM_cmp_hidden['dias_mora']) || $this->NM_cmp_hidden['dias_mora'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_dias_mora_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_dias_mora_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_cupo_vendedor()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cupo_vendedor'])) ? $this->New_label['cupo_vendedor'] : "Cupo Vendedor"; 
   if (!isset($this->NM_cmp_hidden['cupo_vendedor']) || $this->NM_cmp_hidden['cupo_vendedor'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cupo_vendedor_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cupo_vendedor_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_codigo_ter()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['codigo_ter'])) ? $this->New_label['codigo_ter'] : "Codigo Ter"; 
   if (!isset($this->NM_cmp_hidden['codigo_ter']) || $this->NM_cmp_hidden['codigo_ter'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_codigo_ter_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_codigo_ter_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_es_cajero()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['es_cajero'])) ? $this->New_label['es_cajero'] : "Es Cajero"; 
   if (!isset($this->NM_cmp_hidden['es_cajero']) || $this->NM_cmp_hidden['es_cajero'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_es_cajero_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_es_cajero_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_autorizado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['autorizado'])) ? $this->New_label['autorizado'] : "Autorizado"; 
   if (!isset($this->NM_cmp_hidden['autorizado']) || $this->NM_cmp_hidden['autorizado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_autorizado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_autorizado_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_zona_clientes()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['zona_clientes'])) ? $this->New_label['zona_clientes'] : "Zona Clientes"; 
   if (!isset($this->NM_cmp_hidden['zona_clientes']) || $this->NM_cmp_hidden['zona_clientes'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_zona_clientes_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_zona_clientes_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_clasificacion_clientes()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['clasificacion_clientes'])) ? $this->New_label['clasificacion_clientes'] : "Clasificacion Clientes"; 
   if (!isset($this->NM_cmp_hidden['clasificacion_clientes']) || $this->NM_cmp_hidden['clasificacion_clientes'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_clasificacion_clientes_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_clasificacion_clientes_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_creado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
   if (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_creado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_creado_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_disponible()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['disponible'])) ? $this->New_label['disponible'] : "Disponible"; 
   if (!isset($this->NM_cmp_hidden['disponible']) || $this->NM_cmp_hidden['disponible'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_disponible_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_disponible_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_id_pedido_tmp()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['id_pedido_tmp'])) ? $this->New_label['id_pedido_tmp'] : "Id Pedido Tmp"; 
   if (!isset($this->NM_cmp_hidden['id_pedido_tmp']) || $this->NM_cmp_hidden['id_pedido_tmp'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_id_pedido_tmp_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_id_pedido_tmp_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_n_pedido_tmp()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['n_pedido_tmp'])) ? $this->New_label['n_pedido_tmp'] : "N Pedido Tmp"; 
   if (!isset($this->NM_cmp_hidden['n_pedido_tmp']) || $this->NM_cmp_hidden['n_pedido_tmp'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_n_pedido_tmp_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_n_pedido_tmp_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_total_pedido_tmp()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['total_pedido_tmp'])) ? $this->New_label['total_pedido_tmp'] : "Total Pedido Tmp"; 
   if (!isset($this->NM_cmp_hidden['total_pedido_tmp']) || $this->NM_cmp_hidden['total_pedido_tmp'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_total_pedido_tmp_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_total_pedido_tmp_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_obs_pedido_tmp()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['obs_pedido_tmp'])) ? $this->New_label['obs_pedido_tmp'] : "Obs Pedido Tmp"; 
   if (!isset($this->NM_cmp_hidden['obs_pedido_tmp']) || $this->NM_cmp_hidden['obs_pedido_tmp'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_obs_pedido_tmp_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_obs_pedido_tmp_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_vend_pedido_tmp()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['vend_pedido_tmp'])) ? $this->New_label['vend_pedido_tmp'] : "Vend Pedido Tmp"; 
   if (!isset($this->NM_cmp_hidden['vend_pedido_tmp']) || $this->NM_cmp_hidden['vend_pedido_tmp'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_vend_pedido_tmp_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_vend_pedido_tmp_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_ciudad()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "Ciudad"; 
   if (!isset($this->NM_cmp_hidden['ciudad']) || $this->NM_cmp_hidden['ciudad'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_ciudad_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_ciudad_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_codigo_postal()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['codigo_postal'])) ? $this->New_label['codigo_postal'] : "Codigo Postal"; 
   if (!isset($this->NM_cmp_hidden['codigo_postal']) || $this->NM_cmp_hidden['codigo_postal'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_codigo_postal_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_codigo_postal_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_lenguaje()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['lenguaje'])) ? $this->New_label['lenguaje'] : "Lenguaje"; 
   if (!isset($this->NM_cmp_hidden['lenguaje']) || $this->NM_cmp_hidden['lenguaje'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_lenguaje_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_lenguaje_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nombre_comercil()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nombre_comercil'])) ? $this->New_label['nombre_comercil'] : "Nombre Comercil"; 
   if (!isset($this->NM_cmp_hidden['nombre_comercil']) || $this->NM_cmp_hidden['nombre_comercil'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nombre_comercil_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nombre_comercil_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_notificar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : "Notificar"; 
   if (!isset($this->NM_cmp_hidden['notificar']) || $this->NM_cmp_hidden['notificar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_notificar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_notificar_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_puc_auxiliar_deudores()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['puc_auxiliar_deudores'])) ? $this->New_label['puc_auxiliar_deudores'] : "Puc Auxiliar Deudores"; 
   if (!isset($this->NM_cmp_hidden['puc_auxiliar_deudores']) || $this->NM_cmp_hidden['puc_auxiliar_deudores'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_puc_auxiliar_deudores_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_puc_auxiliar_deudores_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_puc_retefuente_ventas()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['puc_retefuente_ventas'])) ? $this->New_label['puc_retefuente_ventas'] : "Puc Retefuente Ventas"; 
   if (!isset($this->NM_cmp_hidden['puc_retefuente_ventas']) || $this->NM_cmp_hidden['puc_retefuente_ventas'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_puc_retefuente_ventas_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_puc_retefuente_ventas_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_puc_retefuente_servicios_clie()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['puc_retefuente_servicios_clie'])) ? $this->New_label['puc_retefuente_servicios_clie'] : "Puc Retefuente Servicios Clie"; 
   if (!isset($this->NM_cmp_hidden['puc_retefuente_servicios_clie']) || $this->NM_cmp_hidden['puc_retefuente_servicios_clie'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_puc_retefuente_servicios_clie_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_puc_retefuente_servicios_clie_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_puc_auxiliar_proveedores()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['puc_auxiliar_proveedores'])) ? $this->New_label['puc_auxiliar_proveedores'] : "Puc Auxiliar Proveedores"; 
   if (!isset($this->NM_cmp_hidden['puc_auxiliar_proveedores']) || $this->NM_cmp_hidden['puc_auxiliar_proveedores'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_puc_auxiliar_proveedores_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_puc_auxiliar_proveedores_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_puc_retefuente_compras()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['puc_retefuente_compras'])) ? $this->New_label['puc_retefuente_compras'] : "Puc Retefuente Compras"; 
   if (!isset($this->NM_cmp_hidden['puc_retefuente_compras']) || $this->NM_cmp_hidden['puc_retefuente_compras'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_puc_retefuente_compras_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_puc_retefuente_compras_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_puc_retefuente_servicios_prov()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['puc_retefuente_servicios_prov'])) ? $this->New_label['puc_retefuente_servicios_prov'] : "Puc Retefuente Servicios Prov"; 
   if (!isset($this->NM_cmp_hidden['puc_retefuente_servicios_prov']) || $this->NM_cmp_hidden['puc_retefuente_servicios_prov'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_puc_retefuente_servicios_prov_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_puc_retefuente_servicios_prov_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nube()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nube'])) ? $this->New_label['nube'] : "Nube"; 
   if (!isset($this->NM_cmp_hidden['nube']) || $this->NM_cmp_hidden['nube'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nube_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nube_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_tipo_documento()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tipo_documento'])) ? $this->New_label['tipo_documento'] : "Tipo Documento"; 
   if (!isset($this->NM_cmp_hidden['tipo_documento']) || $this->NM_cmp_hidden['tipo_documento'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tipo_documento_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tipo_documento_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_estado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
   if (!isset($this->NM_cmp_hidden['estado']) || $this->NM_cmp_hidden['estado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_estado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_estado_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_facturas()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['facturas'])) ? $this->New_label['facturas'] : "Listar Cartera"; 
   if (!isset($this->NM_cmp_hidden['facturas']) || $this->NM_cmp_hidden['facturas'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_facturas_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_facturas_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_sc_asigna_vendedor()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['sc_asigna_vendedor'])) ? $this->New_label['sc_asigna_vendedor'] : "Lo Atiende"; 
   if (!isset($this->NM_cmp_hidden['sc_asigna_vendedor']) || $this->NM_cmp_hidden['sc_asigna_vendedor'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_sc_asigna_vendedor_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_sc_asigna_vendedor_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->SC_ancora = "";
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Cédula/Nit"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['documento'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['dv'])) ? $this->New_label['dv'] : "DV"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['dv'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nombres'])) ? $this->New_label['nombres'] : "Nombres"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['nombres'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Dirección"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['direccion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idmuni'])) ? $this->New_label['idmuni'] : "Ciudad"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['idmuni'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tel_cel'])) ? $this->New_label['tel_cel'] : "Tel. o celular"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['tel_cel'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['cliente'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['proveedor'])) ? $this->New_label['proveedor'] : "Proveedor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['proveedor'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['empleado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['si_nomina'])) ? $this->New_label['si_nomina'] : "Nómina"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['si_nomina'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idtercero'])) ? $this->New_label['idtercero'] : "Idtercero"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['idtercero'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nacimiento'])) ? $this->New_label['nacimiento'] : "Fec. Nacimiento"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['nacimiento'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sexo'])) ? $this->New_label['sexo'] : "Género"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['sexo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['urlmail'])) ? $this->New_label['urlmail'] : "E-mail"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['urlmail'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fechault'])) ? $this->New_label['fechault'] : "Última comp."; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['fechault'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['saldo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['afiliacion'])) ? $this->New_label['afiliacion'] : "Cliente desde"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['afiliacion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['regimen'])) ? $this->New_label['regimen'] : "Regimen"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['regimen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['tipo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['observaciones'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['loatiende'])) ? $this->New_label['loatiende'] : "Vendedor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['loatiende'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['contacto'])) ? $this->New_label['contacto'] : "Contacto"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['contacto'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['credito'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cupo'])) ? $this->New_label['cupo'] : "Cupo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['cupo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['listaprecios'])) ? $this->New_label['listaprecios'] : "Listaprecios"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['listaprecios'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['con_actual'])) ? $this->New_label['con_actual'] : "Con Actual"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['con_actual'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['efec_retencion'])) ? $this->New_label['efec_retencion'] : "Efec Retencion"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['efec_retencion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['urlmail_1'])) ? $this->New_label['urlmail_1'] : "Urlmail"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['urlmail_1'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "Nombre 1"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['nombre1'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "Nombre 2"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['nombre2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "Apellido 1"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['apellido1'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "Apellido 2"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['apellido2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sucur_cliente'])) ? $this->New_label['sucur_cliente'] : "Sucur Cliente"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['sucur_cliente'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['representante'])) ? $this->New_label['representante'] : "Representante"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['representante'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['es_restaurante'])) ? $this->New_label['es_restaurante'] : "Es Restaurante"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['es_restaurante'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['dias_credito'])) ? $this->New_label['dias_credito'] : "Dias Credito"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['dias_credito'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['dias_mora'])) ? $this->New_label['dias_mora'] : "Dias Mora"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['dias_mora'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cupo_vendedor'])) ? $this->New_label['cupo_vendedor'] : "Cupo Vendedor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['cupo_vendedor'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['codigo_ter'])) ? $this->New_label['codigo_ter'] : "Codigo Ter"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['codigo_ter'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['es_cajero'])) ? $this->New_label['es_cajero'] : "Es Cajero"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['es_cajero'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['autorizado'])) ? $this->New_label['autorizado'] : "Autorizado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['autorizado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['zona_clientes'])) ? $this->New_label['zona_clientes'] : "Zona Clientes"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['zona_clientes'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['clasificacion_clientes'])) ? $this->New_label['clasificacion_clientes'] : "Clasificacion Clientes"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['clasificacion_clientes'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['creado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['disponible'])) ? $this->New_label['disponible'] : "Disponible"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['disponible'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['id_pedido_tmp'])) ? $this->New_label['id_pedido_tmp'] : "Id Pedido Tmp"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['id_pedido_tmp'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['n_pedido_tmp'])) ? $this->New_label['n_pedido_tmp'] : "N Pedido Tmp"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['n_pedido_tmp'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['total_pedido_tmp'])) ? $this->New_label['total_pedido_tmp'] : "Total Pedido Tmp"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['total_pedido_tmp'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['obs_pedido_tmp'])) ? $this->New_label['obs_pedido_tmp'] : "Obs Pedido Tmp"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['obs_pedido_tmp'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['vend_pedido_tmp'])) ? $this->New_label['vend_pedido_tmp'] : "Vend Pedido Tmp"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['vend_pedido_tmp'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "Ciudad"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['ciudad'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['codigo_postal'])) ? $this->New_label['codigo_postal'] : "Codigo Postal"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['codigo_postal'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['lenguaje'])) ? $this->New_label['lenguaje'] : "Lenguaje"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['lenguaje'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nombre_comercil'])) ? $this->New_label['nombre_comercil'] : "Nombre Comercil"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['nombre_comercil'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : "Notificar"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['notificar'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['puc_auxiliar_deudores'])) ? $this->New_label['puc_auxiliar_deudores'] : "Puc Auxiliar Deudores"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['puc_auxiliar_deudores'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['puc_retefuente_ventas'])) ? $this->New_label['puc_retefuente_ventas'] : "Puc Retefuente Ventas"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['puc_retefuente_ventas'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['puc_retefuente_servicios_clie'])) ? $this->New_label['puc_retefuente_servicios_clie'] : "Puc Retefuente Servicios Clie"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['puc_retefuente_servicios_clie'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['puc_auxiliar_proveedores'])) ? $this->New_label['puc_auxiliar_proveedores'] : "Puc Auxiliar Proveedores"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['puc_auxiliar_proveedores'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['puc_retefuente_compras'])) ? $this->New_label['puc_retefuente_compras'] : "Puc Retefuente Compras"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['puc_retefuente_compras'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['puc_retefuente_servicios_prov'])) ? $this->New_label['puc_retefuente_servicios_prov'] : "Puc Retefuente Servicios Prov"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['puc_retefuente_servicios_prov'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nube'])) ? $this->New_label['nube'] : "Nube"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['nube'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tipo_documento'])) ? $this->New_label['tipo_documento'] : "Tipo Documento"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['tipo_documento'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['estado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['facturas'])) ? $this->New_label['facturas'] : "Listar Cartera"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['facturas'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['sc_asigna_vendedor'])) ? $this->New_label['sc_asigna_vendedor'] : "Lo Atiende"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['labels']['sc_asigna_vendedor'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['lig_edit'];
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_refresh'])
   {
       $this->refresh_interativ_search();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_refresh'] = false;
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->NM_btn_run_show = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_terceros_todos_13122021#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida(" <TR> \r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
           { 
           $nm_saida->saida("    <TD >\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
           } 
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_A_grid_terceros_todos_13122021', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_D_grid_terceros_todos_13122021', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_E_grid_terceros_todos_13122021', 'value' => 'NM_Blank_Page.htm');
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" &&
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
           { 
               $nm_saida->saida("</TABLE></TD>\r\n");
               $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("</TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    </TR>\r\n");
           } 
       $nm_saida->saida("</TABLE>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_terceros_todos_13122021#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TD  colspan=3>\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
       } 
       $nm_id_aplicacao = " id=\"apl_grid_terceros_todos_13122021#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
   if ($this->NM_btn_run_show)
   { 
       $nm_saida->saida("       <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("       <form name=\"FBtn_Run\" method=\"post\" action=\"./\" target=\"_self\">\r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"nmgp_opcao\" value=\"formphp\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"rec\" value=\"\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"nm_call_php\" value=\"\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"nm_run_opt_sel\" value=\"\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"> \r\n");
       $nm_saida->saida("       </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf']) { 
    if ($this->pdf_all_cab != "S") {
        $this->cabecalho();
    }
    $nm_saida->saida("              <thead>\r\n");
    if ($this->pdf_all_cab == "S") {
        $this->cabecalho();
    }
    if ($this->pdf_all_label == "S") {
        $this->label_grid();
    }
}
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-364bbb0f\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['vendedor']['loatiende'] = "S";
   $this->Break_pag_prt['vendedor']['loatiende'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['loatiende'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['loatiende'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Config_Page_break_PDF'] = "N";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Page_break_PDF'] = array();
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor") 
   { 
       if (isset($this->loatiende))
       {
           $this->quebra_loatiende_vendedor_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   $this->SC_top       = array();
   $this->SC_bot       = array();
   $this->SC_top[]     = "loatiende"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       $Nivel_gb = 1;
       $this->Tab_Nv_tree = array();
       $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']);
       $this->Ult_qb_free = $this->Nivel_gbBot;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
       {
           $this->Tab_Nv_tree[$cmp] = $Nivel_gb;
           $Nivel_gb++;
           if (in_array($cmp, $this->SC_top))
           {
               $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
               $this->$tmp($cmp);
           }
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $this->SC_seq_btn_run = 0;
   $ini_grid = true;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          //---------- Gauge ----------
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_terceros_todos_13122021_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->documento = $this->rs_grid->fields[0] ;  
          $this->dv = $this->rs_grid->fields[1] ;  
          $this->dv = (string)$this->dv;
          $this->nombres = $this->rs_grid->fields[2] ;  
          $this->direccion = $this->rs_grid->fields[3] ;  
          $this->idmuni = $this->rs_grid->fields[4] ;  
          $this->idmuni = (string)$this->idmuni;
          $this->tel_cel = $this->rs_grid->fields[5] ;  
          $this->cliente = $this->rs_grid->fields[6] ;  
          $this->proveedor = $this->rs_grid->fields[7] ;  
          $this->empleado = $this->rs_grid->fields[8] ;  
          $this->si_nomina = $this->rs_grid->fields[9] ;  
          $this->idtercero = $this->rs_grid->fields[10] ;  
          $this->idtercero = (string)$this->idtercero;
          $this->nacimiento = $this->rs_grid->fields[11] ;  
          $this->sexo = $this->rs_grid->fields[12] ;  
          $this->urlmail = $this->rs_grid->fields[13] ;  
          $this->fechault = $this->rs_grid->fields[14] ;  
          $this->saldo = $this->rs_grid->fields[15] ;  
          $this->saldo =  str_replace(",", ".", $this->saldo);
          $this->saldo = (string)$this->saldo;
          $this->afiliacion = $this->rs_grid->fields[16] ;  
          $this->regimen = $this->rs_grid->fields[17] ;  
          $this->tipo = $this->rs_grid->fields[18] ;  
          $this->observaciones = $this->rs_grid->fields[19] ;  
          $this->loatiende = $this->rs_grid->fields[20] ;  
          $this->loatiende = (string)$this->loatiende;
          $this->contacto = $this->rs_grid->fields[21] ;  
          $this->credito = $this->rs_grid->fields[22] ;  
          $this->cupo = $this->rs_grid->fields[23] ;  
          $this->cupo = (string)$this->cupo;
          $this->listaprecios = $this->rs_grid->fields[24] ;  
          $this->listaprecios = (string)$this->listaprecios;
          $this->con_actual = $this->rs_grid->fields[25] ;  
          $this->efec_retencion = $this->rs_grid->fields[26] ;  
          $this->urlmail_1 = $this->rs_grid->fields[27] ;  
          $this->nombre1 = $this->rs_grid->fields[28] ;  
          $this->nombre2 = $this->rs_grid->fields[29] ;  
          $this->apellido1 = $this->rs_grid->fields[30] ;  
          $this->apellido2 = $this->rs_grid->fields[31] ;  
          $this->sucur_cliente = $this->rs_grid->fields[32] ;  
          $this->representante = $this->rs_grid->fields[33] ;  
          $this->es_restaurante = $this->rs_grid->fields[34] ;  
          $this->dias_credito = $this->rs_grid->fields[35] ;  
          $this->dias_credito = (string)$this->dias_credito;
          $this->dias_mora = $this->rs_grid->fields[36] ;  
          $this->dias_mora = (string)$this->dias_mora;
          $this->cupo_vendedor = $this->rs_grid->fields[37] ;  
          $this->cupo_vendedor =  str_replace(",", ".", $this->cupo_vendedor);
          $this->cupo_vendedor = (string)$this->cupo_vendedor;
          $this->codigo_ter = $this->rs_grid->fields[38] ;  
          $this->es_cajero = $this->rs_grid->fields[39] ;  
          $this->autorizado = $this->rs_grid->fields[40] ;  
          $this->zona_clientes = $this->rs_grid->fields[41] ;  
          $this->zona_clientes = (string)$this->zona_clientes;
          $this->clasificacion_clientes = $this->rs_grid->fields[42] ;  
          $this->clasificacion_clientes = (string)$this->clasificacion_clientes;
          $this->creado = $this->rs_grid->fields[43] ;  
          $this->disponible = $this->rs_grid->fields[44] ;  
          $this->id_pedido_tmp = $this->rs_grid->fields[45] ;  
          $this->id_pedido_tmp = (string)$this->id_pedido_tmp;
          $this->n_pedido_tmp = $this->rs_grid->fields[46] ;  
          $this->total_pedido_tmp = $this->rs_grid->fields[47] ;  
          $this->total_pedido_tmp =  str_replace(",", ".", $this->total_pedido_tmp);
          $this->total_pedido_tmp = (string)$this->total_pedido_tmp;
          $this->obs_pedido_tmp = $this->rs_grid->fields[48] ;  
          $this->vend_pedido_tmp = $this->rs_grid->fields[49] ;  
          $this->ciudad = $this->rs_grid->fields[50] ;  
          $this->codigo_postal = $this->rs_grid->fields[51] ;  
          $this->lenguaje = $this->rs_grid->fields[52] ;  
          $this->nombre_comercil = $this->rs_grid->fields[53] ;  
          $this->notificar = $this->rs_grid->fields[54] ;  
          $this->puc_auxiliar_deudores = $this->rs_grid->fields[55] ;  
          $this->puc_retefuente_ventas = $this->rs_grid->fields[56] ;  
          $this->puc_retefuente_servicios_clie = $this->rs_grid->fields[57] ;  
          $this->puc_auxiliar_proveedores = $this->rs_grid->fields[58] ;  
          $this->puc_retefuente_compras = $this->rs_grid->fields[59] ;  
          $this->puc_retefuente_servicios_prov = $this->rs_grid->fields[60] ;  
          $this->nube = $this->rs_grid->fields[61] ;  
          $this->tipo_documento = $this->rs_grid->fields[62] ;  
          $this->estado = $this->rs_grid->fields[63] ;  
          if (!isset($this->loatiende)) { $this->loatiende = ""; }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
         {
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf")
          {
              $this->Res->nm_acum_res_unit($this->rs_grid);
          }
         }
          $GLOBALS["idmuni"] = $this->rs_grid->fields[4] ;  
          $GLOBALS["idmuni"] = (string)$GLOBALS["idmuni"];
          $GLOBALS["loatiende"] = $this->rs_grid->fields[20] ;  
          $GLOBALS["loatiende"] = (string)$GLOBALS["loatiende"];
          $this->arg_sum_loatiende = ($this->loatiende == "") ? " is null " : " = " . $this->loatiende;
          $this->SC_seq_page++; 
          if ($this->NM_btn_run_show)
          {
              $this->SC_seq_btn_run++;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_sql_btn_run'][$this->SC_seq_btn_run] = $this->rs_grid->fields;
          }
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final'] + 1; 
          if (!$ini_grid) {
              $this->SC_sep_quebra = true;
          }
          else {
              $ini_grid = false;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb']++;
          if ($this->loatiende !== $this->loatiende_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "vendedor") 
          {  
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby']]['loatiende'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Page_break_PDF']['loatiende'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->loatiende_Old = $this->loatiende ; 
              $this->quebra_loatiende_vendedor($this->loatiende) ; 
              if (isset($this->loatiende_Old))
              {
                 $this->quebra_loatiende_vendedor_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  if (!empty($Format_tst))
                  {
                      $temp = $this->$cmp;
                      if (!empty($temp))
                      {
                          $SC_arg_Sql[$cmp] = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                      }
                  }
                  $temp = $cmp . "_Old";
                  if ($SC_arg_Gby[$cmp] != $this->$temp || $gb_ok)
                  {
                      $SC_lst_Gby[] = $cmp;
                      $gb_ok = true;
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
              $Qb_page = true;
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_bot))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                      $this->$tmp($cmp);
                      $this->Nivel_gbBot--;
                  }
                  $sql_where = "";
                  $cmp_qb     = $this->$cmp;
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
                  {
                      $tmp        = "arg_sum_" . $Col_Gb;
                      $sql_where .= (!empty($sql_where)) ? " and " : "";
                      $sql_where .= $SC_arg_Sql[$Col_Gb] . $this->$tmp;
                      if ($Col_Gb == $cmp)
                      {
                          break;
                      }
                  }
                  $tmp  = "quebra_" . $cmp . "_sc_free_group_by";
                  $this->$tmp($cmp_qb, $sql_where, $cmp);
              }
              if (!empty($SC_lst_Gby))
              {
                  $cmp = $SC_lst_Gby[0];
                  if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby']][$cmp] == "S" && $Qb_page)
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
                  elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Page_break_PDF'][$cmp] == "S" && $Qb_page)
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
                  $Qb_page = false;
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']);
              ksort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_top))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
                      $this->$tmp($cmp);
                  }
              }
              if (!empty($SC_lst_Gby))
              {
                  $nm_houve_quebra = "S";
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'on';
 if($this->estado =="PENDIENTE")
{
	$this->NM_field_style["documento"] = "background-color:#33ff99;font-size:13px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$this->sc_asigna_vendedor   = "<select onchange='fAsignarVendedor(\"".$this->idtercero ."\",this.value);'>";
 
      $nm_select = "select idtercero,nombres from terceros where empleado='SI'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vVendedores = array();
      $this->vvendedores = array();
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
                        $this->vVendedores[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vvendedores[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vVendedores = false;
          $this->vVendedores_erro = $this->Db->ErrorMsg();
          $this->vvendedores = false;
          $this->vvendedores_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vvendedores[0][0]))
{
	for($i=0;$i<count($this->vvendedores );$i++)
	{
		if($this->loatiende ==$this->vvendedores[$i][0])
		{
			$this->sc_asigna_vendedor  .="<option value='".$this->vvendedores[$i][0]."' selected='selected'>".$this->vvendedores[$i][1]."</option>";
		}
		else
		{
			$this->sc_asigna_vendedor  .="<option value='".$this->vvendedores[$i][0]."'>".$this->vvendedores[$i][1]."</option>";
		}
	}
}
$this->sc_asigna_vendedor  .="</select>";
$_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'off';
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
              { 
                 if ($this->pdf_all_label == "S" && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_")) 
                 { } 
                 elseif ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
              if ($temp == "nacimiento")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
              if ($temp == "fechault")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
              if ($temp == "afiliacion")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"  style=\"page-break-inside: avoid;\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_sc_asigna_vendedor_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_sc_asigna_vendedor_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
 if ($this->NM_btn_run_show){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_sc_asigna_vendedor_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"> <input type=\"checkbox\" id=\"NM_ck_run" . $this->SC_seq_btn_run . "\" class=\"sc-ui-check-run\" name=\"NM_ck_grid[]\" value=\"" . NM_encode_input($this->SC_seq_btn_run) . "\" style=\"align:left;vertical-align:middle;font-weight:bold;\" /></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['mostra_edit'] != "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_terceros']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_terceros'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S")
              {
                  $Parms_Edt  = "idtercero?#?" . str_replace('"', "@aspasd@", $this->idtercero) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_todos_13122021@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idtercero?#?" . str_replace('"', "@aspasd@", $this->idtercero) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_terceros . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'terceros', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_terceros . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'terceros', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\">" . $Link_Edit . "</td></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['mostra_edit'] == "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_terceros']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_terceros'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S")
              {
                  $Parms_Edt  = "idtercero?#?" . str_replace('"', "@aspasd@", $this->idtercero) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_todos_13122021@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idtercero?#?" . str_replace('"', "@aspasd@", $this->idtercero) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_terceros . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'terceros', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_terceros . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'terceros', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr></tr></table></TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if ($this->rs_grid->EOF) 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']);
           krsort ($SC_lst_Gby);
           foreach ($SC_lst_Gby as $Ind => $cmp)
           {
               if (in_array($cmp, $this->SC_bot))
               {
                   $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                   $this->$tmp($cmp);
                   $this->Nivel_gbBot--;
               }
           }
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($this->NM_btn_run_show)
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && empty($this->nm_grid_sem_reg) && 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
       $nm_saida->saida("</TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    </TABLE>\r\n");
           $nm_saida->saida("    </TD>\r\n");
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_documento()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['documento']) || $this->NM_cmp_hidden['documento'] != "off") { 
          $conteudo = sc_strip_script($this->documento); 
          $conteudo_original = sc_strip_script($this->documento); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'documento', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'documento', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_documento = "";
          if (isset($this->NM_field_style["documento"]) && !empty($this->NM_field_style["documento"]))
          {
              $Style_documento .= $this->NM_field_style["documento"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_documento_grid_line . "\"  style=\"" . $this->Css_Cmp['css_documento_grid_line'] . $Style_documento . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_documento_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_dv()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['dv']) || $this->NM_cmp_hidden['dv'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->dv)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->dv)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dv', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dv', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_dv_grid_line . "\"  style=\"" . $this->Css_Cmp['css_dv_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_dv_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nombres()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nombres']) || $this->NM_cmp_hidden['nombres'] != "off") { 
          $conteudo = sc_strip_script($this->nombres); 
          $conteudo_original = sc_strip_script($this->nombres); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombres', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombres', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nombres_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nombres_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nombres_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_direccion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['direccion']) || $this->NM_cmp_hidden['direccion'] != "off") { 
          $conteudo = sc_strip_script($this->direccion); 
          $conteudo_original = sc_strip_script($this->direccion); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          if ($conteudo !== "&nbsp;") 
          { 
              $conteudo = sc_strtolower($conteudo); 
              $nm_temp  = explode(" ", $conteudo); 
              $conteudo = ""; 
              foreach ($nm_temp as $nm_cada_w) 
              { 
                 $Tmp       = sc_strtoupper(substr($nm_cada_w, 0, 1)); 
                 $conteudo .= $Tmp . substr($nm_cada_w, 1) . " "; 
              } 
              $conteudo = trim($conteudo); 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'direccion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_direccion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_direccion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_direccion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idmuni()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idmuni']) || $this->NM_cmp_hidden['idmuni'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idmuni)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idmuni)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_idmuni($conteudo , $this->idmuni) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idmuni', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idmuni', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idmuni_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idmuni_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idmuni_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tel_cel()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tel_cel']) || $this->NM_cmp_hidden['tel_cel'] != "off") { 
          $conteudo = sc_strip_script($this->tel_cel); 
          $conteudo_original = sc_strip_script($this->tel_cel); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          if ($conteudo !== "&nbsp;")    
          { 
              $this->nm_gera_mask($conteudo, "xxx xxx xx xx"); 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tel_cel', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tel_cel', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_tel_cel_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tel_cel_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tel_cel_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_cliente()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cliente']) || $this->NM_cmp_hidden['cliente'] != "off") { 
          $conteudo = sc_strip_script($this->cliente); 
          $conteudo_original = sc_strip_script($this->cliente); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cliente', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cliente', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cliente_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cliente_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_cliente_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_proveedor()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['proveedor']) || $this->NM_cmp_hidden['proveedor'] != "off") { 
          $conteudo = sc_strip_script($this->proveedor); 
          $conteudo_original = sc_strip_script($this->proveedor); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'proveedor', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'proveedor', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_proveedor_grid_line . "\"  style=\"" . $this->Css_Cmp['css_proveedor_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_proveedor_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_empleado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['empleado']) || $this->NM_cmp_hidden['empleado'] != "off") { 
          $conteudo = sc_strip_script($this->empleado); 
          $conteudo_original = sc_strip_script($this->empleado); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'empleado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'empleado', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_empleado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_empleado_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_empleado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_si_nomina()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['si_nomina']) || $this->NM_cmp_hidden['si_nomina'] != "off") { 
          $conteudo = sc_strip_script($this->si_nomina); 
          $conteudo_original = sc_strip_script($this->si_nomina); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'si_nomina', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'si_nomina', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_si_nomina_grid_line . "\"  style=\"" . $this->Css_Cmp['css_si_nomina_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_si_nomina_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idtercero()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idtercero']) || $this->NM_cmp_hidden['idtercero'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idtercero)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idtercero)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idtercero', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idtercero', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idtercero_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idtercero_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idtercero_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nacimiento()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nacimiento']) || $this->NM_cmp_hidden['nacimiento'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->nacimiento)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->nacimiento)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nacimiento', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nacimiento', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nacimiento_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nacimiento_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nacimiento_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_sexo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sexo']) || $this->NM_cmp_hidden['sexo'] != "off") { 
          $conteudo = sc_strip_script($this->sexo); 
          $conteudo_original = sc_strip_script($this->sexo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sexo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sexo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sexo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sexo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_sexo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_urlmail()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['urlmail']) || $this->NM_cmp_hidden['urlmail'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->urlmail)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->urlmail)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;")
          { 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'urlmail', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'urlmail', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = "<a href=\"mailto:$conteudo\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_urlmail_grid_line . "\">$str_tem_display</a>";  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'urlmail', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'urlmail', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_urlmail_grid_line . "\"  style=\"" . $this->Css_Cmp['css_urlmail_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_urlmail_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_fechault()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['fechault']) || $this->NM_cmp_hidden['fechault'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->fechault)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fechault)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fechault', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fechault', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fechault_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fechault_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_fechault_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_saldo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->saldo)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->saldo)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'saldo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'saldo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_saldo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_saldo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_saldo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_afiliacion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['afiliacion']) || $this->NM_cmp_hidden['afiliacion'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->afiliacion)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->afiliacion)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'afiliacion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'afiliacion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_afiliacion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_afiliacion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_afiliacion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_regimen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['regimen']) || $this->NM_cmp_hidden['regimen'] != "off") { 
          $conteudo = sc_strip_script($this->regimen); 
          $conteudo_original = sc_strip_script($this->regimen); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'regimen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'regimen', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_regimen_grid_line . "\"  style=\"" . $this->Css_Cmp['css_regimen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_regimen_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tipo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off") { 
          $conteudo = sc_strip_script($this->tipo); 
          $conteudo_original = sc_strip_script($this->tipo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_tipo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tipo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tipo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_observaciones()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
          $conteudo = sc_strip_script($this->observaciones); 
          $conteudo_original = sc_strip_script($this->observaciones); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          if ($conteudo !== "&nbsp;") 
          { 
              $conteudo = sc_strtoupper($conteudo); 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'observaciones', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'observaciones', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_observaciones_grid_line . "\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_observaciones_" . $this->SC_seq_page . "\">\r\n");
if (strlen($conteudo) > 20 && $conteudo != "&nbsp;") {
   $nm_saida->saida("" . sc_substr(strip_tags($conteudo), 0, 20) . nmButtonOutput($this->arr_buttons, "bqtd_bytes", "", "", "bobservaciones", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . str_replace('"', '&quot;', strip_tags($conteudo)) . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "") . "\r\n");
} else {
   $nm_saida->saida("$conteudo\r\n");
}
   $nm_saida->saida("</span></TD>\r\n");
      }
 }
 function NM_grid_loatiende()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['loatiende']) || $this->NM_cmp_hidden['loatiende'] != "off") { 
          $conteudo = sc_strip_script($this->loatiende); 
          $conteudo_original = sc_strip_script($this->loatiende); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_loatiende($conteudo , $this->loatiende) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'loatiende', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'loatiende', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_loatiende_grid_line . "\"  style=\"" . $this->Css_Cmp['css_loatiende_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_loatiende_" . $this->SC_seq_page . "\">\r\n");
if (strlen($conteudo) > 20 && $conteudo != "&nbsp;") {
   $nm_saida->saida("" . sc_substr(strip_tags($conteudo), 0, 20) . nmButtonOutput($this->arr_buttons, "bqtd_bytes", "", "", "bloatiende", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . str_replace('"', '&quot;', strip_tags($conteudo)) . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "") . "\r\n");
} else {
   $nm_saida->saida("$conteudo\r\n");
}
   $nm_saida->saida("</span></TD>\r\n");
      }
 }
 function NM_grid_contacto()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['contacto']) || $this->NM_cmp_hidden['contacto'] != "off") { 
          $conteudo = sc_strip_script($this->contacto); 
          $conteudo_original = sc_strip_script($this->contacto); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'contacto', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'contacto', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_contacto_grid_line . "\"  style=\"" . $this->Css_Cmp['css_contacto_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_contacto_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_credito()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off") { 
          $conteudo = sc_strip_script($this->credito); 
          $conteudo_original = sc_strip_script($this->credito); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'credito', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'credito', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_credito_grid_line . "\"  style=\"" . $this->Css_Cmp['css_credito_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_credito_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_cupo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cupo']) || $this->NM_cmp_hidden['cupo'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->cupo)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->cupo)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cupo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cupo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cupo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cupo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_cupo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_listaprecios()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['listaprecios']) || $this->NM_cmp_hidden['listaprecios'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->listaprecios)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->listaprecios)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'listaprecios', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'listaprecios', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_listaprecios_grid_line . "\"  style=\"" . $this->Css_Cmp['css_listaprecios_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_listaprecios_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_con_actual()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['con_actual']) || $this->NM_cmp_hidden['con_actual'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->con_actual)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->con_actual)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'con_actual', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'con_actual', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_con_actual_grid_line . "\"  style=\"" . $this->Css_Cmp['css_con_actual_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_con_actual_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_efec_retencion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['efec_retencion']) || $this->NM_cmp_hidden['efec_retencion'] != "off") { 
          $conteudo = sc_strip_script($this->efec_retencion); 
          $conteudo_original = sc_strip_script($this->efec_retencion); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'efec_retencion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'efec_retencion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_efec_retencion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_efec_retencion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_efec_retencion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_urlmail_1()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['urlmail_1']) || $this->NM_cmp_hidden['urlmail_1'] != "off") { 
          $conteudo = sc_strip_script($this->urlmail_1); 
          $conteudo_original = sc_strip_script($this->urlmail_1); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'urlmail_1', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'urlmail_1', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_urlmail_1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_urlmail_1_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_urlmail_1_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nombre1()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nombre1']) || $this->NM_cmp_hidden['nombre1'] != "off") { 
          $conteudo = sc_strip_script($this->nombre1); 
          $conteudo_original = sc_strip_script($this->nombre1); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre1', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre1', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nombre1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nombre1_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nombre1_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nombre2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nombre2']) || $this->NM_cmp_hidden['nombre2'] != "off") { 
          $conteudo = sc_strip_script($this->nombre2); 
          $conteudo_original = sc_strip_script($this->nombre2); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nombre2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nombre2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nombre2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_apellido1()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['apellido1']) || $this->NM_cmp_hidden['apellido1'] != "off") { 
          $conteudo = sc_strip_script($this->apellido1); 
          $conteudo_original = sc_strip_script($this->apellido1); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'apellido1', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'apellido1', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_apellido1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_apellido1_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_apellido1_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_apellido2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['apellido2']) || $this->NM_cmp_hidden['apellido2'] != "off") { 
          $conteudo = sc_strip_script($this->apellido2); 
          $conteudo_original = sc_strip_script($this->apellido2); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'apellido2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'apellido2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_apellido2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_apellido2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_apellido2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_sucur_cliente()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sucur_cliente']) || $this->NM_cmp_hidden['sucur_cliente'] != "off") { 
          $conteudo = sc_strip_script($this->sucur_cliente); 
          $conteudo_original = sc_strip_script($this->sucur_cliente); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sucur_cliente', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sucur_cliente', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sucur_cliente_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sucur_cliente_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_sucur_cliente_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_representante()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['representante']) || $this->NM_cmp_hidden['representante'] != "off") { 
          $conteudo = sc_strip_script($this->representante); 
          $conteudo_original = sc_strip_script($this->representante); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'representante', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'representante', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_representante_grid_line . "\"  style=\"" . $this->Css_Cmp['css_representante_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_representante_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_es_restaurante()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['es_restaurante']) || $this->NM_cmp_hidden['es_restaurante'] != "off") { 
          $conteudo = sc_strip_script($this->es_restaurante); 
          $conteudo_original = sc_strip_script($this->es_restaurante); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'es_restaurante', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'es_restaurante', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_es_restaurante_grid_line . "\"  style=\"" . $this->Css_Cmp['css_es_restaurante_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_es_restaurante_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_dias_credito()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['dias_credito']) || $this->NM_cmp_hidden['dias_credito'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->dias_credito)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->dias_credito)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dias_credito', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dias_credito', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_dias_credito_grid_line . "\"  style=\"" . $this->Css_Cmp['css_dias_credito_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_dias_credito_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_dias_mora()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['dias_mora']) || $this->NM_cmp_hidden['dias_mora'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->dias_mora)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->dias_mora)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'dias_mora', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'dias_mora', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_dias_mora_grid_line . "\"  style=\"" . $this->Css_Cmp['css_dias_mora_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_dias_mora_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_cupo_vendedor()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cupo_vendedor']) || $this->NM_cmp_hidden['cupo_vendedor'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->cupo_vendedor)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->cupo_vendedor)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cupo_vendedor', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cupo_vendedor', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cupo_vendedor_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cupo_vendedor_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_cupo_vendedor_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_codigo_ter()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['codigo_ter']) || $this->NM_cmp_hidden['codigo_ter'] != "off") { 
          $conteudo = sc_strip_script($this->codigo_ter); 
          $conteudo_original = sc_strip_script($this->codigo_ter); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codigo_ter', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codigo_ter', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_codigo_ter_grid_line . "\"  style=\"" . $this->Css_Cmp['css_codigo_ter_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_codigo_ter_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_es_cajero()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['es_cajero']) || $this->NM_cmp_hidden['es_cajero'] != "off") { 
          $conteudo = sc_strip_script($this->es_cajero); 
          $conteudo_original = sc_strip_script($this->es_cajero); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'es_cajero', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'es_cajero', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_es_cajero_grid_line . "\"  style=\"" . $this->Css_Cmp['css_es_cajero_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_es_cajero_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_autorizado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['autorizado']) || $this->NM_cmp_hidden['autorizado'] != "off") { 
          $conteudo = sc_strip_script($this->autorizado); 
          $conteudo_original = sc_strip_script($this->autorizado); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'autorizado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'autorizado', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_autorizado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_autorizado_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_autorizado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_zona_clientes()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['zona_clientes']) || $this->NM_cmp_hidden['zona_clientes'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->zona_clientes)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->zona_clientes)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'zona_clientes', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'zona_clientes', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_zona_clientes_grid_line . "\"  style=\"" . $this->Css_Cmp['css_zona_clientes_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_zona_clientes_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_clasificacion_clientes()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['clasificacion_clientes']) || $this->NM_cmp_hidden['clasificacion_clientes'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->clasificacion_clientes)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->clasificacion_clientes)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'clasificacion_clientes', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'clasificacion_clientes', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_clasificacion_clientes_grid_line . "\"  style=\"" . $this->Css_Cmp['css_clasificacion_clientes_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_clasificacion_clientes_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_creado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->creado)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->creado)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               if (substr($conteudo, 10, 1) == "-") 
               { 
                  $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
               } 
               if (substr($conteudo, 13, 1) == ".") 
               { 
                  $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
               } 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD HH:II:SS");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'creado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'creado', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_creado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_creado_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_creado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_disponible()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['disponible']) || $this->NM_cmp_hidden['disponible'] != "off") { 
          $conteudo = sc_strip_script($this->disponible); 
          $conteudo_original = sc_strip_script($this->disponible); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'disponible', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'disponible', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_disponible_grid_line . "\"  style=\"" . $this->Css_Cmp['css_disponible_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_disponible_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_id_pedido_tmp()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['id_pedido_tmp']) || $this->NM_cmp_hidden['id_pedido_tmp'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->id_pedido_tmp)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->id_pedido_tmp)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pedido_tmp', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pedido_tmp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_id_pedido_tmp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_id_pedido_tmp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_id_pedido_tmp_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_n_pedido_tmp()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['n_pedido_tmp']) || $this->NM_cmp_hidden['n_pedido_tmp'] != "off") { 
          $conteudo = sc_strip_script($this->n_pedido_tmp); 
          $conteudo_original = sc_strip_script($this->n_pedido_tmp); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'n_pedido_tmp', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'n_pedido_tmp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_n_pedido_tmp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_n_pedido_tmp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_n_pedido_tmp_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_total_pedido_tmp()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['total_pedido_tmp']) || $this->NM_cmp_hidden['total_pedido_tmp'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->total_pedido_tmp)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->total_pedido_tmp)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'total_pedido_tmp', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'total_pedido_tmp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_total_pedido_tmp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_total_pedido_tmp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_total_pedido_tmp_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_obs_pedido_tmp()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['obs_pedido_tmp']) || $this->NM_cmp_hidden['obs_pedido_tmp'] != "off") { 
          $conteudo = sc_strip_script($this->obs_pedido_tmp); 
          $conteudo_original = sc_strip_script($this->obs_pedido_tmp); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'obs_pedido_tmp', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'obs_pedido_tmp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_obs_pedido_tmp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_obs_pedido_tmp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_obs_pedido_tmp_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_vend_pedido_tmp()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['vend_pedido_tmp']) || $this->NM_cmp_hidden['vend_pedido_tmp'] != "off") { 
          $conteudo = sc_strip_script($this->vend_pedido_tmp); 
          $conteudo_original = sc_strip_script($this->vend_pedido_tmp); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'vend_pedido_tmp', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'vend_pedido_tmp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_vend_pedido_tmp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_vend_pedido_tmp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_vend_pedido_tmp_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_ciudad()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['ciudad']) || $this->NM_cmp_hidden['ciudad'] != "off") { 
          $conteudo = sc_strip_script($this->ciudad); 
          $conteudo_original = sc_strip_script($this->ciudad); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ciudad', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ciudad', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_ciudad_grid_line . "\"  style=\"" . $this->Css_Cmp['css_ciudad_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_ciudad_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_codigo_postal()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['codigo_postal']) || $this->NM_cmp_hidden['codigo_postal'] != "off") { 
          $conteudo = sc_strip_script($this->codigo_postal); 
          $conteudo_original = sc_strip_script($this->codigo_postal); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codigo_postal', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codigo_postal', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_codigo_postal_grid_line . "\"  style=\"" . $this->Css_Cmp['css_codigo_postal_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_codigo_postal_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_lenguaje()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['lenguaje']) || $this->NM_cmp_hidden['lenguaje'] != "off") { 
          $conteudo = sc_strip_script($this->lenguaje); 
          $conteudo_original = sc_strip_script($this->lenguaje); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'lenguaje', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'lenguaje', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_lenguaje_grid_line . "\"  style=\"" . $this->Css_Cmp['css_lenguaje_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_lenguaje_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nombre_comercil()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nombre_comercil']) || $this->NM_cmp_hidden['nombre_comercil'] != "off") { 
          $conteudo = sc_strip_script($this->nombre_comercil); 
          $conteudo_original = sc_strip_script($this->nombre_comercil); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nombre_comercil', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nombre_comercil', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nombre_comercil_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nombre_comercil_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nombre_comercil_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_notificar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['notificar']) || $this->NM_cmp_hidden['notificar'] != "off") { 
          $conteudo = sc_strip_script($this->notificar); 
          $conteudo_original = sc_strip_script($this->notificar); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'notificar', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'notificar', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_notificar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_notificar_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_notificar_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_puc_auxiliar_deudores()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['puc_auxiliar_deudores']) || $this->NM_cmp_hidden['puc_auxiliar_deudores'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->puc_auxiliar_deudores)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->puc_auxiliar_deudores)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'puc_auxiliar_deudores', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'puc_auxiliar_deudores', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_puc_auxiliar_deudores_grid_line . "\"  style=\"" . $this->Css_Cmp['css_puc_auxiliar_deudores_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_puc_auxiliar_deudores_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_puc_retefuente_ventas()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['puc_retefuente_ventas']) || $this->NM_cmp_hidden['puc_retefuente_ventas'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->puc_retefuente_ventas)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->puc_retefuente_ventas)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'puc_retefuente_ventas', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'puc_retefuente_ventas', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_puc_retefuente_ventas_grid_line . "\"  style=\"" . $this->Css_Cmp['css_puc_retefuente_ventas_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_puc_retefuente_ventas_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_puc_retefuente_servicios_clie()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['puc_retefuente_servicios_clie']) || $this->NM_cmp_hidden['puc_retefuente_servicios_clie'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->puc_retefuente_servicios_clie)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->puc_retefuente_servicios_clie)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'puc_retefuente_servicios_clie', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'puc_retefuente_servicios_clie', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_puc_retefuente_servicios_clie_grid_line . "\"  style=\"" . $this->Css_Cmp['css_puc_retefuente_servicios_clie_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_puc_retefuente_servicios_clie_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_puc_auxiliar_proveedores()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['puc_auxiliar_proveedores']) || $this->NM_cmp_hidden['puc_auxiliar_proveedores'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->puc_auxiliar_proveedores)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->puc_auxiliar_proveedores)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'puc_auxiliar_proveedores', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'puc_auxiliar_proveedores', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_puc_auxiliar_proveedores_grid_line . "\"  style=\"" . $this->Css_Cmp['css_puc_auxiliar_proveedores_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_puc_auxiliar_proveedores_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_puc_retefuente_compras()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['puc_retefuente_compras']) || $this->NM_cmp_hidden['puc_retefuente_compras'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->puc_retefuente_compras)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->puc_retefuente_compras)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'puc_retefuente_compras', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'puc_retefuente_compras', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_puc_retefuente_compras_grid_line . "\"  style=\"" . $this->Css_Cmp['css_puc_retefuente_compras_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_puc_retefuente_compras_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_puc_retefuente_servicios_prov()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['puc_retefuente_servicios_prov']) || $this->NM_cmp_hidden['puc_retefuente_servicios_prov'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->puc_retefuente_servicios_prov)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->puc_retefuente_servicios_prov)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'puc_retefuente_servicios_prov', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'puc_retefuente_servicios_prov', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_puc_retefuente_servicios_prov_grid_line . "\"  style=\"" . $this->Css_Cmp['css_puc_retefuente_servicios_prov_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_puc_retefuente_servicios_prov_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nube()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nube']) || $this->NM_cmp_hidden['nube'] != "off") { 
          $conteudo = sc_strip_script($this->nube); 
          $conteudo_original = sc_strip_script($this->nube); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nube', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nube', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nube_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nube_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nube_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tipo_documento()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tipo_documento']) || $this->NM_cmp_hidden['tipo_documento'] != "off") { 
          $conteudo = sc_strip_script($this->tipo_documento); 
          $conteudo_original = sc_strip_script($this->tipo_documento); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo_documento', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo_documento', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_tipo_documento_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tipo_documento_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tipo_documento_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_estado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['estado']) || $this->NM_cmp_hidden['estado'] != "off") { 
          $conteudo = sc_strip_script($this->estado); 
          $conteudo_original = sc_strip_script($this->estado); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'estado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'estado', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_estado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_estado_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_estado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_facturas()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['facturas']) || $this->NM_cmp_hidden['facturas'] != "off") { 
          $conteudo = $this->facturas; 
          $conteudo_original = $this->facturas; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__Banking_00017_A_icon-icons.com_59837.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__Banking_00017_A_icon-icons.com_59837.png";
                  $conteudo = "<img border=\"\" src=\"usr__NM__ico__NM__Banking_00017_A_icon-icons.com_59837.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__Banking_00017_A_icon-icons.com_59837.png";
                  $tmp_facturas = fopen($loc_img_word, "rb"); 
                  $reg_facturas = fread($tmp_facturas, filesize($loc_img_word)); 
                  fclose($tmp_facturas);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_facturas) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__Banking_00017_A_icon-icons.com_59837.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'facturas', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'facturas', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_facturas_grid_line . "\"  style=\"" . $this->Css_Cmp['css_facturas_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_facturas_@scinf_grid_cartera_cliente']) ? $this->Ini->sc_lig_target['C_@scinf_facturas_@scinf_grid_cartera_cliente'] : (isset($this->Ini->sc_lig_target['C_@scinf_facturas']) ? $this->Ini->sc_lig_target['C_@scinf_facturas'] : null);
       if (isset($this->Ini->sc_lig_md5["grid_cartera_cliente"]) && $this->Ini->sc_lig_md5["grid_cartera_cliente"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis*scinS*scoutpar_cliente*scin" . str_replace("'", "@aspass@", $this->idtercero) . "*scoutNMSC_inicial*scininicio*scoutNMSC_modal*scinok*scout";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_todos_13122021@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis*scinS*scoutpar_cliente*scin" . str_replace("'", "@aspass@", $this->idtercero) . "*scoutNMSC_inicial*scininicio*scoutNMSC_modal*scinok*scout";
       }
   $nm_saida->saida("<a id=\"id_sc_field_facturas_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_grid_cartera_cliente_cons . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : 'modal') . "', 'inicio', '400', '1200', '', 'grid_cartera_cliente', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_facturas_grid_line . "\" style=\"" . $this->Css_Cmp['css_facturas_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_facturas_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_sc_asigna_vendedor()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['sc_asigna_vendedor']) || $this->NM_cmp_hidden['sc_asigna_vendedor'] != "off") { 
          $conteudo = sc_strip_script($this->sc_asigna_vendedor); 
          $conteudo_original = sc_strip_script($this->sc_asigna_vendedor); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'sc_asigna_vendedor', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'sc_asigna_vendedor', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_sc_asigna_vendedor_grid_line . "\"  style=\"" . $this->Css_Cmp['css_sc_asigna_vendedor_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_sc_asigna_vendedor_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 68;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] || $this->NM_btn_run_show)
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_pdf'] == "pdf")
   {
       $this->NM_colspan--;
   } 
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
   {
       $this->NM_colspan--;
   }
 }
 function nm_quebra_pagina($nm_parms)
 {
    global $nm_saida;
    if ($this->nmgp_prim_pag_pdf && $nm_parms == "pagina")
    {
        $this->nmgp_prim_pag_pdf = false;
        return;
    }
    $this->Ini->nm_cont_lin++;
    if (($this->Ini->nm_limite_lin > 0 && $this->Ini->nm_cont_lin > $this->Ini->nm_limite_lin) || $nm_parms == "pagina" || $nm_parms == "resumo" || $nm_parms == "total")
    {
        $nm_saida->saida("</TABLE></TD></TR>\r\n");
        $this->Ini->nm_cont_lin = ($nm_parms == "pagina") ? 0 : 1;
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
            else
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" class=\"scGridBorder\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
        }
        else
        {
            $nm_saida->saida("</table><div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div><table width='100%' cellspacing=0 cellpadding=0>\r\n");
        }
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_loatiende_vendedor($loatiende) 
 {
   global $tot_loatiende;
   $this->sc_proc_quebra_loatiende = true; 
   $this->Tot->quebra_loatiende_vendedor($loatiende, $this->arg_sum_loatiende);
   $conteudo = $tot_loatiende[0] ;  
   $this->count_loatiende = $tot_loatiende[1];
   $this->campos_quebra_loatiende = array(); 
   $conteudo = sc_strip_script($this->loatiende); 
   $this->Lookup->lookup_vendedor_loatiende($conteudo , $this->loatiende) ; 
   $this->campos_quebra_loatiende[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['loatiende']))
   {
       $this->campos_quebra_loatiende[0]['lab'] = $this->nmgp_label_quebras['loatiende']; 
   }
   else
   {
   $this->campos_quebra_loatiende[0]['lab'] = "Vendedor"; 
   }
   $this->sc_proc_quebra_loatiende = false; 
 } 
 function quebra_loatiende_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_loatiende = true; 
   $this->Tot->quebra_loatiende_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_loatiende = $$Var_name_gb;
   $conteudo = $tot_loatiende[0] ;  
   $this->count_loatiende = $tot_loatiende[1];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->loatiende); 
   $this->Lookup->lookup_sc_free_group_by_loatiende($conteudo , $this->loatiende) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['loatiende']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['loatiende']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Vendedor"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_loatiende = false; 
 } 
 function quebra_loatiende_vendedor_top() 
 { global
          $loatiende_ant_desc, 
          $nm_saida, $tot_loatiende;
   $this->SC_tab_quebra = 0;
   $loatiende_ant_desc = $this->campos_quebra_loatiende[0]['cmp'];
   static $cont_quebra_loatiende = 0; 
   $cont_quebra_loatiende++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_loatiende[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_loatiende[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_loatiende = "<table>"; 
   foreach ($this->campos_quebra_loatiende as $cada_campo) 
   { 
       $this->Label_loatiende .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
       {
           $this->Label_loatiende .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_loatiende .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_loatiende .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_loatiende .= "</tr>"; 
   } 
   $this->Label_loatiende .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_loatiende . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_loatiende_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_loatiende = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['loatiende'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_loatiende = 0; 
   $cont_quebra_loatiende++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_loatiende[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_loatiende = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_loatiende .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'])
       {
           $this->Label_loatiende .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_loatiende .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_loatiende .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_loatiende .= "</tr>"; 
   } 
   $this->Label_loatiende .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_loatiende . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_vendedor_top() 
 {
   global $nm_saida; 
 }
 function quebra_geral_vendedor_bot() 
 {
 }
 function quebra_geral_sc_free_group_by_top() 
 {
   global $nm_saida; 
 }
 function quebra_geral_sc_free_group_by_bot() 
 {
 }
 function quebra_geral__NM_SC__top() 
 {
 }
 function quebra_geral__NM_SC__bot() 
 {
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
   function nmgp_barra_top_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"30\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '__Clear_Fast__'; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "Opciones", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "Opciones", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
          $nm_saida->saida("            <div id=\"div_ordcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_save_grid_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_terceros_todos_13122021&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_xls_res = "n";
          }
          $Xls_mod_export = "grid";
          if ($Tem_xls_res == "n")
          {
              $Xls_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xls_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xls'][] = "xls_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_xml_res = "n";
          }
          $Xml_mod_export = "grid";
          if ($Tem_xml_res == "n")
          {
              $Xml_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xml_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xml'][] = "xml_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_csv_res = "n";
          }
          $Csv_mod_export = "";
          if ($Tem_csv_res == "n")
          {
              $Csv_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_csv_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['csv'][] = "csv_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_rtf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['rtf'][] = "rtf_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_rtf_conf();", "nm_gp_rtf_conf();", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_1";
              $nm_saida->saida("          <img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "Buscar", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_subir_a_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_subir_a_nube'][] = "sc_btn_subir_a_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_subir_a_nube", "sc_btn_btn_subir_a_nube();", "sc_btn_btn_subir_a_nube();", "sc_btn_subir_a_nube_top", "", "Subir a la Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_actualizar_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_actualizar_nube'][] = "sc_btn_actualizar_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_actualizar_nube", "sc_btn_btn_actualizar_nube();", "sc_btn_btn_actualizar_nube();", "sc_btn_actualizar_nube_top", "", "Actualizar en la Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_todos_13122021@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_terceros . "', '$this->nm_location', '$Md5_Lig', '_self', 'terceros'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_terceros . "', '$this->nm_location', '$Md5_Lig', '_self', 'terceros'); return false;;", "sc_b_new_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
            }
          }
        }
          if (is_file("grid_terceros_todos_13122021_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_todos_13122021_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"sc_ind = document.getElementById('quant_linhas_f0_bot').selectedIndex; nm_gp_submit_ajax('muda_qt_linhas', document.getElementById('quant_linhas_f0_bot').options[sc_ind].value);\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 15) ? " selected" : "";
              $nm_saida->saida("           <option value=\"15\" " . $obj_sel . ">15</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 200) ? " selected" : "";
              $nm_saida->saida("           <option value=\"200\" " . $obj_sel . ">200</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 1000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"1000\" " . $obj_sel . ">1000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 2000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"2000\" " . $obj_sel . ">2000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
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
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_terceros_todos_13122021_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_todos_13122021_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"30\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '__Clear_Fast__'; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "Opciones", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "Opciones", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
          $nm_saida->saida("            <div id=\"div_ordcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_save_grid_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_terceros_todos_13122021&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_xls_res = "n";
          }
          $Xls_mod_export = "grid";
          if ($Tem_xls_res == "n")
          {
              $Xls_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xls_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xls'][] = "xls_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_xml_res = "n";
          }
          $Xml_mod_export = "grid";
          if ($Tem_xml_res == "n")
          {
              $Xml_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xml_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xml'][] = "xml_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_csv_res = "n";
          }
          $Csv_mod_export = "";
          if ($Tem_csv_res == "n")
          {
              $Csv_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_csv_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['csv'][] = "csv_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_rtf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['rtf'][] = "rtf_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_rtf_conf();", "nm_gp_rtf_conf();", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_2";
              $nm_saida->saida("          <img id=\"NM_sep_2\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "Buscar", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_subir_a_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_subir_a_nube'][] = "sc_btn_subir_a_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_subir_a_nube", "sc_btn_btn_subir_a_nube();", "sc_btn_btn_subir_a_nube();", "sc_btn_subir_a_nube_top", "", "Subir a la Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_actualizar_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_actualizar_nube'][] = "sc_btn_actualizar_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_actualizar_nube", "sc_btn_btn_actualizar_nube();", "sc_btn_btn_actualizar_nube();", "sc_btn_actualizar_nube_top", "", "Actualizar en la Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_todos_13122021@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_terceros . "', '$this->nm_location', '$Md5_Lig', '_self', 'terceros'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_terceros . "', '$this->nm_location', '$Md5_Lig', '_self', 'terceros'); return false;;", "sc_b_new_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
            }
          }
        }
          if (is_file("grid_terceros_todos_13122021_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_todos_13122021_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_psq'])
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_modal'])
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove()", "self.parent.tb_remove()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
        else
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"sc_ind = document.getElementById('quant_linhas_f0_bot').selectedIndex; nm_gp_submit_ajax('muda_qt_linhas', document.getElementById('quant_linhas_f0_bot').options[sc_ind].value);\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 15) ? " selected" : "";
              $nm_saida->saida("           <option value=\"15\" " . $obj_sel . ">15</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 200) ? " selected" : "";
              $nm_saida->saida("           <option value=\"200\" " . $obj_sel . ">200</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 1000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"1000\" " . $obj_sel . ">1000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == 2000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"2000\" " . $obj_sel . ">2000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
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
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_terceros_todos_13122021_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_todos_13122021_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_mobile();
           $this->nmgp_embbed_placeholder_top();
       }
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_normal();
           $this->nmgp_embbed_placeholder_top();
       }
   }
   function nmgp_barra_bot()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_mobile();
       }
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_normal();
       }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('documento', 'nombres'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
   function html_interativ_search()
   {
       global $nm_saida;
       $bol_refin_use_modal = true;
       if($_SESSION['scriptcase']['proc_mobile'])
       {
           $bol_refin_use_modal = false;
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label'] = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_sql']   = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['empleado'] = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : 'Empleado';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_sql']['empleado']   = "empleado";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['proveedor'] = (isset($this->New_label['proveedor'])) ? $this->New_label['proveedor'] : 'Proveedor';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_sql']['proveedor']   = "proveedor";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['cliente'] = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : 'Cliente';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_sql']['cliente']   = "cliente";
       $tb_disp = (empty($this->nm_grid_sem_reg)) ? '' : 'none';
       $nm_saida->saida("     <script>\r\n");
       $nm_saida->saida("         var Tab_obj_int_mult = {};\r\n");
       $nm_saida->saida("     </script>\r\n");
       $nm_saida->saida(" <table id=\"TB_Interativ_Search\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top; width: 100%; display:" . $tb_disp . ";\" valign=\"top\" cellspacing=0 cellpadding=0>\r\n");
       $nm_saida->saida("   <tr id=\"NM_Interativ_Search\">\r\n");
       $nm_saida->saida("   <td valign=\"top\"> \r\n");
       $nm_saida->saida("    <form id= \"id_Interat_search\" name=\"FInterat_search\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"nmgp_opcao\" value=\"interativ_search\"/> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"parm\" value=\"\"/> \r\n");
       $nm_saida->saida("    <div id='id_div_interativ_search' class='is-closed'>\r\n");
           $disp_btn_collapse = 'none'; 
           if('S' == 'S') 
           { 
               $disp_btn_collapse = ''; 
           } 
$nm_saida->saida("        <div id='app_int_search_toggle' class='scGridRefinedSearchCollapse' style='display: " . $disp_btn_collapse . "' onclick='nm_proc_int_search_toggle(false);'><i class='icon_fa " . $this->Ini->scGridRefinedSearchCollapseFAIcon . "'></i></div> \r\n");
       $nm_saida->saida("        <div id='id_div_interativ_search_content' class='scGridRefinedSearchMoldura' style='min-width:120px;'>\r\n");
       $nm_saida->saida("            <div id='id_div_interativ_search_fields'>\r\n");
       $lin_obj = $this->interativ_search_empleado($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_proveedor($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_cliente($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $nm_saida->saida("            </div>\r\n");
       $nm_saida->saida("        </div>\r\n");
       $nm_saida->saida("    </div>\r\n");
       $nm_saida->saida("    </form>\r\n");
       $nm_saida->saida("   </td>\r\n");
       $nm_saida->saida("   </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $this->JS_interativ_search();
       $nm_saida->saida(" <SCRIPT LANGUAGE=\"Javascript\" SRC=\"" . $this->Ini->path_js . "/nm_format_num.js\"></SCRIPT>\r\n");
   }
   function refresh_interativ_search()
   {
       $bol_refin_use_modal = true;
       if($_SESSION['scriptcase']['proc_mobile'])
       {
           $bol_refin_use_modal = false;
       }
       $array_fields = array();
       $array_fields[] = "empleado";
       $array_fields[] = "proveedor";
       $array_fields[] = "cliente";
       if(is_array($array_fields) && !empty($array_fields))
       {
           $arr_new = [];
           foreach($array_fields as $key => $str_field)
           {
               if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search'][$str_field]))
               {
                   unset($array_fields[ $key ]);
                   $arr_new[] = $str_field;
               }
           }
           $array_fields = array_merge($arr_new, $array_fields);
           $str_out = "";
           foreach($array_fields as $str_field)
           {
               $method = "interativ_search_" . $str_field;
               $str_out .= $this->$method($bol_refin_use_modal);
           }
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_div_interativ_search_fields', 'value' => NM_charset_to_utf8($str_out));
       }
   }
   function interativ_search_empleado($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']["empleado"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']["empleado"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_empleado\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('empleado')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_empleado\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_empleado\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['empleado'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_empleado\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','empleado', '', 'empleado', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $nm_comando = "select empleado, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY empleado". $Cmps_where;
       $nm_comando .= " order by empleado ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['empleado'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_empleado_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_empleado' class='multipleempleado' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('empleado', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('empleado', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = 0;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']['empleado'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']['empleado'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_empleado' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simpleempleado' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['empleado']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['empleado']) . "','empleado','id_int_search_empleado','empleado', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['empleado']) . "','empleado','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'empleado', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleempleado' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['empleado']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['empleado']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_empleado_" . md5($dados) . "\" name=\"int_search_empleado[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_empleado_". md5($dados) ."\" for=\"id_int_search_empleado_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_empleado' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_terceros_todos_13122021_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=empleado&tp_obj=tx&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('empleado');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_empleado' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('empleado');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_empleado\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('empleado', false);", "nm_mult_int_search('empleado', false);", "mult_int_search_empleado", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['empleado']) . "','empleado','id_int_search_empleado','empleado', '', 'N');", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['empleado']) . "','empleado','id_int_search_empleado','empleado', '', 'N');", "app_int_search_empleado", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('empleado');", "nm_single_int_search('empleado');", "single_int_search_empleado", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_proveedor($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']["proveedor"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']["proveedor"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_proveedor\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('proveedor')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_proveedor\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_proveedor\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['proveedor'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_proveedor\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','proveedor', '', 'proveedor', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $nm_comando = "select proveedor, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY proveedor". $Cmps_where;
       $nm_comando .= " order by proveedor ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['proveedor'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_proveedor_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_proveedor' class='multipleproveedor' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('proveedor', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('proveedor', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = 0;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']['proveedor'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']['proveedor'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_proveedor' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simpleproveedor' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['proveedor']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['proveedor']) . "','proveedor','id_int_search_proveedor','proveedor', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['proveedor']) . "','proveedor','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'proveedor', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleproveedor' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['proveedor']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['proveedor']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_proveedor_" . md5($dados) . "\" name=\"int_search_proveedor[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_proveedor_". md5($dados) ."\" for=\"id_int_search_proveedor_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_proveedor' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_terceros_todos_13122021_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=proveedor&tp_obj=tx&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('proveedor');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_proveedor' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('proveedor');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_proveedor\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('proveedor', false);", "nm_mult_int_search('proveedor', false);", "mult_int_search_proveedor", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['proveedor']) . "','proveedor','id_int_search_proveedor','proveedor', '', 'N');", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['proveedor']) . "','proveedor','id_int_search_proveedor','proveedor', '', 'N');", "app_int_search_proveedor", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('proveedor');", "nm_single_int_search('proveedor');", "single_int_search_proveedor", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_cliente($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']["cliente"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']["cliente"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_cliente\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('cliente')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_cliente\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_cliente\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['cliente'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_cliente\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','cliente', '', 'cliente', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $nm_comando = "select cliente, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY cliente". $Cmps_where;
       $nm_comando .= " order by cliente ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['cliente'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_cliente_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_cliente' class='multiplecliente' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('cliente', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('cliente', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = 0;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']['cliente'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_dados']['cliente'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_cliente' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simplecliente' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['cliente']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['cliente']) . "','cliente','id_int_search_cliente','cliente', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['cliente']) . "','cliente','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'cliente', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multiplecliente' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['cliente']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['interativ_search']['cliente']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_cliente_" . md5($dados) . "\" name=\"int_search_cliente[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_cliente_". md5($dados) ."\" for=\"id_int_search_cliente_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_cliente' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_terceros_todos_13122021_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=cliente&tp_obj=tx&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('cliente');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_cliente' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('cliente');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_cliente\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('cliente', false);", "nm_mult_int_search('cliente', false);", "mult_int_search_cliente", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['cliente']) . "','cliente','id_int_search_cliente','cliente', '', 'N');", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['int_search_label']['cliente']) . "','cliente','id_int_search_cliente','cliente', '', 'N');", "app_int_search_cliente", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('cliente');", "nm_single_int_search('cliente');", "single_int_search_cliente", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function JS_interativ_search()
   {
       global $nm_saida;
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     function toggleSeeMore(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if($('#id_see_less_'+obj_id).css('display') == 'none')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#id_see_more_list_'+obj_id).slideDown();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         else\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#id_see_more_list_'+obj_id).slideUp();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#id_see_less_'+obj_id).toggle();\r\n");
       $nm_saida->saida("         $('#id_see_more_'+obj_id).toggle();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var int_search_load_html = 'S';\r\n");
       $nm_saida->saida("     function nm_proc_int_search_all()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         int_search_load_html = 'N';\r\n");
       $nm_saida->saida("     if($( \"#id_slider_empleado\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_empleado').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_empleado[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_empleado').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','empleado', '', 'empleado', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_proveedor\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_proveedor').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_proveedor[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_proveedor').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','proveedor', '', 'proveedor', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("         int_search_load_html = 'S';\r\n");
       $nm_saida->saida("     if($( \"#id_slider_cliente\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_cliente').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_cliente[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_cliente').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','cliente', '', 'cliente', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_int_clear_all()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear_all','','','', '', '', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_int_search(tp_link, tp_obj, label, nam_db, val_obj, obj_id, val_atual, refresh)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         while (label.lastIndexOf(\"__sasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           label = label.replace(\"__sasp__\" , \"'\");\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         while (nam_db.lastIndexOf(\"__sasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           nam_db = nam_db.replace(\"__sasp__\" , \"'\");\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         while (label.lastIndexOf(\"__dasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           label = label.replace(\"__dasp__\" , '\"');\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         while (nam_db.lastIndexOf(\"__dasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           nam_db = nam_db.replace(\"__dasp__\" , '\"');\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         var out_int = nam_db + '__DL__' + label + '__DL__' + tp_obj + '__DL__';\r\n");
       $nm_saida->saida("         if (tp_link == 'clear_all')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += 'clear_interativ_all';\r\n");
       $nm_saida->saida("             Tab_obj_int_mult = {};\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'clear')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += 'clear_interativ';\r\n");
       $nm_saida->saida("             Tab_obj_int_mult[ obj_id ] = 'N';\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'clear_opc')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             result = int_search_get_checkbox(obj_id, val_atual);\r\n");
       $nm_saida->saida("             if (result != '') {\r\n");
       $nm_saida->saida("                 out_int += result;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else {\r\n");
       $nm_saida->saida("                 out_int += 'clear_interativ';\r\n");
       $nm_saida->saida("                 Tab_obj_int_mult[\"'\" + obj_id + \"'\"] = 'N';\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'link')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += val_obj;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'range')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += $('#id_slider_' + obj_id).slider('values')[0] + \"_VLS_\" + $('#id_slider_' + obj_id).slider('values')[1];\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'chbx' || tp_link == 'uncheck')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if(tp_link == 'uncheck')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 int_search_unset_checkbox(nam_db, val_atual, obj_id);\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 Tab_obj_int_mult[ obj_id ] = 'N';\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             result  = int_search_get_checkbox(obj_id, '');\r\n");
       $nm_saida->saida("             if(tp_link == 'chbx' && result == '')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 int_search_unset_checkbox(nam_db, val_atual, obj_id);\r\n");
       $nm_saida->saida("                 return;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             out_int += result;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[+]/g, \"__NM_PLUS__\");\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[&]/g, \"__NM_AMP__\");\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[%]/g, \"__NM_PRC__\");\r\n");
       $nm_saida->saida("         out_int  += '__DL__' + int_search_load_html;\r\n");
       $nm_saida->saida("         out_int  += '__DL__' + refresh;\r\n");
       $nm_saida->saida("         ajax_navigate('interativ_search', out_int);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var submit_checkbox = 'N';\r\n");
       $nm_saida->saida("     function nm_proc_check_parent_value(bol_checked, str_cmp, value_md5)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        $('#id_int_search_'+ str_cmp +'_' + value_md5).prop('checked', bol_checked);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_int_search_toggle()\r\n");
       $nm_saida->saida("    {\r\n");
       $nm_saida->saida("        if ($('#id_div_interativ_search').hasClass('is-closed')) {\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search_content').show();\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search').css('position', 'relative');\r\n");
       $nm_saida->saida("            $('#app_int_search_open').hide();\r\n");
       $nm_saida->saida("            $('#app_int_search_close').show();\r\n");
       $nm_saida->saida("        } else {\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search_content').hide();\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search').css('position', 'absolute');\r\n");
       $nm_saida->saida("            $('#app_int_search_open').show();\r\n");
       $nm_saida->saida("            $('#app_int_search_close').hide();\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        $('#id_div_interativ_search').toggleClass('is-closed');\r\n");
       $nm_saida->saida("    }\r\n");
       $nm_saida->saida("     function int_search_unset_checkbox(nam_db, val_atual, obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         var obj_check = eval(\"document.getElementsByName('int_search_\" + obj_id + \"[]')\");\r\n");
       $nm_saida->saida("         has_checked = false;\r\n");
       $nm_saida->saida("         for (i = 0; i < obj_check.length; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if(obj_check[i].checked && obj_check[i].value == val_atual)\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 obj_check[i].checked = false;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             if(obj_check[i].checked)\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 has_checked = true;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         //if doesnt have checked anymore, clear\r\n");
       $nm_saida->saida("         if(!has_checked)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             nm_proc_int_search('clear','','', nam_db, '', obj_id, '', 'S')\r\n");
       $nm_saida->saida("             return;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function int_search_get_checkbox(obj_id, val_out)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        $( \"input[name='int_search_\"+ obj_id +\"[]']:checked\" ).each(function(){\r\n");
       $nm_saida->saida("            if($(this).val() != val_out)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                val += $(this).val();\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        });\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_toggle_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if($('#id_expand_' + obj_id).css('display') != 'none')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             nm_expand_int_search(obj_id);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         else\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             nm_retracts_int_search(obj_id);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_expand_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if(submit_checkbox != 'S')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_int_mult[ obj_id ] && Tab_obj_int_mult[ obj_id ] == 'S') {\r\n");
       $nm_saida->saida("                 $('#app_int_search_' + obj_id).css('display','');\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 $('#app_int_search_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#id_tab_' + obj_id + '_link').css('display','');\r\n");
       $nm_saida->saida("         $('#id_toolbar_' + obj_id).show();\r\n");
       $nm_saida->saida("         $('#id_retract_' + obj_id).css('display','');\r\n");
       $nm_saida->saida("         $('#id_expand_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_retracts_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if(submit_checkbox != 'S')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#app_int_search_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#id_tab_' + obj_id + '_link').css('display','none');\r\n");
       $nm_saida->saida("         $('#id_toolbar_' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#id_retract_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("         $('#id_expand_' + obj_id).css('display','');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_mult_int_search(obj_id, bol_first)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('.simple' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('.multiple' + obj_id).show();\r\n");
       $nm_saida->saida("         $('#mult_int_search_' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#single_int_search_' + obj_id).show();\r\n");
       $nm_saida->saida("         if(submit_checkbox != 'S')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            $('#app_int_search_' + obj_id).show();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         Tab_obj_int_mult[ obj_id ] = 'S';\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_single_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('.simple' + obj_id).show();\r\n");
       $nm_saida->saida("         $('.multiple' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#mult_int_search_' + obj_id).show();\r\n");
       $nm_saida->saida("         $('#single_int_search_' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#app_int_search_' + obj_id).hide();\r\n");
       $nm_saida->saida("         Tab_obj_int_mult[ obj_id ] = 'N';\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("    function refinedSearchCheckUncheckAll(field_name, bol_value)\r\n");
       $nm_saida->saida("    {\r\n");
       $nm_saida->saida("        $(\"input[name='int_search_\"+ field_name +\"[]']\").prop('checked', bol_value);\r\n");
       $nm_saida->saida("        if (submit_checkbox == \"S\") {\r\n");
       $nm_saida->saida("            $('#app_int_search_' + field_name).click();\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("    }\r\n");
       $nm_saida->saida("     $( document ).ready(function() {\r\n");
       $nm_saida->saida("        adjustMobile();\r\n");
       $nm_saida->saida("    });\r\n");
       $nm_saida->saida("function adjustMobile()\r\n");
       $nm_saida->saida("{\r\n");
       $nm_saida->saida("}\r\n");
       $nm_saida->saida("</script>\r\n");
   }
//--- 
//--- 
 function grafico_pdf()
 {
   global $nm_saida, $nm_lang;
   require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
   $this->Graf  = new grid_terceros_todos_13122021_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pivot_charts']);
       $sChartLang  = isset($this->Ini->Nm_lang['lang_pdff_pcht']) ? $this->Ini->Nm_lang['lang_pdff_pcht'] : 'Generating chart';
       if (!NM_is_utf8($sChartLang))
       {
           $sChartLang = sc_convert_encoding($sChartLang, "UTF-8", $_SESSION['scriptcase']['charset']);
       }
       $bChartFP = false;
      if (!isset($this->progress_fp) || !$this->progress_fp)
      {
           $bChartFP           = true;
           $str_pbfile         = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
           $this->progress_fp  = fopen($str_pbfile, 'a');
           $this->progress_tot = 100;
           $this->progress_now = 90;
           $this->progress_res = 0;
      }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       $prim_graf = ($this->Ini->SC_module_export == "chart") ? true : false;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['pivot_charts'] as $chart_index => $chart_data)
       {
           if (!$prim_graf)
           {
                   $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['proc_pdf_vert'])
 { 
           $nm_saida->saida("<table style=\"width: 100%; page-break-inside: avoid !important;\" ><tr><td>\r\n");
 } else {
           $nm_saida->saida("<table><tr><td>\r\n");
 } 
           $tit_graf = $chart_data['title'];
           if ('' != $chart_data['subtitle'])
           {
               $tit_graf .= ' - ' . $chart_data['subtitle'];
           }
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $random_id = 'sc-id-h2-' . md5(session_id() . microtime() . rand(1, 1000));
           $nm_saida->saida("<b><h2 id=\"$random_id\">$tit_book_marks</h2></b>\r\n");
           if ($this->progress_fp)
           {
               grid_terceros_todos_13122021_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n", $this->Ini->Nm_lang, true);
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['this_chart_label'] = '';
           $this->Graf->monta_grafico($chart_index, 'pdf');
           $nm_saida->saida("</td></tr></table>\r\n");
       }
       if ($bChartFP)
       {
           $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
           if (!NM_is_utf8($lang_protect))
           {
               $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           grid_terceros_todos_13122021_pdf_progress_call(100 . "_#NM#_" . 90 . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['charts_html']}\r\n");
            $nm_saida->saida("</script>\r\n");
       }
   }
       $nm_saida->saida("</body>\r\n");
       $nm_saida->saida("</HTML>\r\n");
 }
//--- 
//--- 
 function grafico_pdf_flash()
 {
   global $nm_saida, $nm_lang;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['chart_list']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['chart_list'] as $arr_chart)
       {
           $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
       $nm_saida->saida("<b><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></b>\r\n");
           $nm_saida->saida("<table><tr><td>\r\n");
           $tit_graf       = $arr_chart[1];
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $nm_saida->saida("<b><h2>$tit_book_marks</h2></b>\r\n");
           $nm_saida->saida("<img src=\"" . $arr_chart[0] . ".png\"/>\r\n");
           $_SESSION['scriptcase']['sc_num_img']++;
           $nm_saida->saida("</td></tr></table>\r\n");
       }
   }
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</HTML>\r\n");
 }
//--- 
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
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
        return;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" &&
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao_print'] != "print" && !$this->Print_All) 
   { 
      $nm_saida->saida("     <tr><td colspan=3  class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\"> \r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_B_grid_terceros_todos_13122021\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_B_grid_terceros_todos_13122021\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
      $nm_saida->saida("     </td></tr> \r\n");
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
       $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
       $nm_saida->saida("     $('#div_" . $cada_id . "').addClass('disabled');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "");
       }
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      window.onload = function() {\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_terceros_todos_13122021', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      }\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_terceros_todos_13122021\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parm_acum\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_terceros_todos_13122021_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_terceros_todos_13122021_iframe_prt.php\" \r\n");
   $nm_saida->saida("                     target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"tp_print\" value=\"PC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"cor_print\" value=\"PB\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_print\" value=\"PC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"PB\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fexport\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tp_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tot_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_line\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_col\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_dados\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_label_csv\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_tag\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_format\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"AM\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_btn_subir_a_nube()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var checked_records, i;\r\n");
   $nm_saida->saida("       vls_check = \"\";\r\n");
   $nm_saida->saida("       checked_records = $(\".sc-ui-check-run\").filter(\":checked\");\r\n");
   $nm_saida->saida("       for (i = 0; i <= checked_records.length; i++)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           vls_check += (vls_check != \"\") ? \";\" : \"\";\r\n");
   $nm_saida->saida("           vls_check += $(checked_records[i]).val();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (vls_check == \"\" || vls_check == \"0\" || vls_check == \"undefined\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           scJs_alert (\"" . $this->Ini->Nm_lang['lang_othr_slct'] . "\");\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_run_opt_sel.value = vls_check;\r\n");
   $nm_saida->saida("       document.FBtn_Run.target = \"_self\";\r\n");
   $nm_saida->saida("       scJs_confirm('¿Desea subir a la Nube los terceros seleccionados?', sc_btn_btn_subir_a_nube_ok, sc_btn_btn_subir_a_nube_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_subir_a_nube_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"btn_subir_a_nube\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_subir_a_nube_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_btn_actualizar_nube()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var checked_records, i;\r\n");
   $nm_saida->saida("       vls_check = \"\";\r\n");
   $nm_saida->saida("       checked_records = $(\".sc-ui-check-run\").filter(\":checked\");\r\n");
   $nm_saida->saida("       for (i = 0; i <= checked_records.length; i++)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           vls_check += (vls_check != \"\") ? \";\" : \"\";\r\n");
   $nm_saida->saida("           vls_check += $(checked_records[i]).val();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (vls_check == \"\" || vls_check == \"0\" || vls_check == \"undefined\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           scJs_alert (\"" . $this->Ini->Nm_lang['lang_othr_slct'] . "\");\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_run_opt_sel.value = vls_check;\r\n");
   $nm_saida->saida("       document.FBtn_Run.target = \"_self\";\r\n");
   $nm_saida->saida("       scJs_confirm('¿Desea actualizar los terceros seleccionados?', sc_btn_btn_actualizar_nube_ok, sc_btn_btn_actualizar_nube_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_actualizar_nube_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"btn_actualizar_nube\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_actualizar_nube_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_marca_check_grid(obj_mark)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      $(\".sc-ui-check-run\").prop(\"checked\", $(obj_mark).prop(\"checked\"));\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var tem_hint;\r\n");
   $nm_saida->saida("   function nm_mostra_hint(nm_obj, nm_evt, nm_mens)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (nm_mens == \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       tem_hint = true;\r\n");
   $nm_saida->saida("       if (document.layers)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           theString=\"<DIV CLASS='ttip'>\" + nm_mens + \"</DIV>\";\r\n");
   $nm_saida->saida("           document.tooltip.document.write(theString);\r\n");
   $nm_saida->saida("           document.tooltip.document.close();\r\n");
   $nm_saida->saida("           document.tooltip.left = nm_evt.pageX + 14;\r\n");
   $nm_saida->saida("           document.tooltip.top = nm_evt.pageY + 2;\r\n");
   $nm_saida->saida("           document.tooltip.visibility = \"show\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if(document.getElementById)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("              nmdg_nav = navigator.appName;\r\n");
   $nm_saida->saida("              elm = document.getElementById(\"tooltip\");\r\n");
   $nm_saida->saida("              elml = nm_obj;\r\n");
   $nm_saida->saida("              elm.innerHTML = nm_mens;\r\n");
   $nm_saida->saida("              if (nmdg_nav == \"Netscape\")\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  elm.style.height = elml.style.height;\r\n");
   $nm_saida->saida("                  elm.style.top = nm_evt.pageY + 2 + 'px';\r\n");
   $nm_saida->saida("                  elm.style.left = nm_evt.pageX + 14 + 'px';\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("              else\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  elm.style.top = nm_evt.y + document.body.scrollTop + 10 + 'px';\r\n");
   $nm_saida->saida("                  elm.style.left = nm_evt.x + document.body.scrollLeft + 10 + 'px';\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("              elm.style.visibility = \"visible\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_apaga_hint()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (!tem_hint)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       tem_hint = false;\r\n");
   $nm_saida->saida("       if (document.layers)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.tooltip.visibility = \"hidden\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if(document.getElementById)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("              elm.style.visibility = \"hidden\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['ajax_nav'])
   {
       if ($this->Rec_ini == 0)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "ini");
       }
       else
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "");
       }
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_ini', 'value' => $this->Rec_ini);
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_fim', 'value' => $this->Rec_fim);
   }
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"rec\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_open_qsearch_div(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())\r\n");
   $nm_saida->saida("            {\r\n");
   $nm_saida->saida("                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});\r\n");
   $nm_saida->saida("            }\r\n");
   $nm_saida->saida("            nm_gp_open_qsearch_div_store_temp(pos);\r\n");
   $nm_saida->saida("            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        else\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        $('#id_qs_div_' + pos).toggle();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = \"\";\r\n");
   $nm_saida->saida("   function nm_gp_open_qsearch_div_store_temp(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        tmp_qs_arr_fields = [], tmp_qs_str_cond = \"\";\r\n");
   $nm_saida->saida("        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        else\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_cancel_qsearch_div_store_temp(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        $('#fast_search_f0_' + pos).val('');\r\n");
   $nm_saida->saida("        $(\"#fast_search_f0_\" + pos + \" option\").prop('selected', false);\r\n");
   $nm_saida->saida("        for(it=0; it<tmp_qs_arr_fields.length; it++)\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            $(\"#fast_search_f0_\" + pos + \" option[value='\"+ tmp_qs_arr_fields[it] +\"']\").prop('selected', true);\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        $(\"#fast_search_f0_\" + pos).change();\r\n");
   $nm_saida->saida("        tmp_qs_arr_fields = [];\r\n");
   $nm_saida->saida("        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);\r\n");
   $nm_saida->saida("        $('#cond_fast_search_f0_' + pos).change();\r\n");
   $nm_saida->saida("        tmp_qs_str_cond = \"\";\r\n");
   $nm_saida->saida("        nm_gp_open_qsearch_div(pos);\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_submit_qsearch(pos) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       var out_qsearch = \"\";\r\n");
   $nm_saida->saida("       var ver_ch = eval('change_fast_' + pos);\r\n");
   $nm_saida->saida("       if (document.getElementById('SC_fast_search_' + pos).value == '' && ver_ch == '')\r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           scJs_alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
   $nm_saida->saida("           document.getElementById('SC_fast_search_' + pos).focus();\r\n");
   $nm_saida->saida("           return false;\r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (document.getElementById('SC_fast_search_' + pos).value == '__Clear_Fast__')\r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.getElementById('SC_fast_search_' + pos).value = '';\r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       out_qsearch = $('#fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + $('#cond_fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('SC_fast_search_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[+]/g, \"__NM_PLUS__\");\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[&]/g, \"__NM_AMP__\");\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[%]/g, \"__NM_PRC__\");\r\n");
   $nm_saida->saida("       ajax_navigate('fast_search', out_qsearch); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      return ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit1(apl_lig, apl_saida, parms, target, apl_name) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      if (target != null) \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.target = target; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action               = apl_lig  ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_chave.value     = \"\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = \"edit_novo\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("         window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"ordem\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(parms, parm_acum, opc, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parm_acum.value = parm_acum ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      if (ancor != null) {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit4(apl_lig, apl_saida, parms, target, opc, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      if (\"dbifrm_widget\" == target.substr(0, 13)) {\r\n");
   $nm_saida->saida("          var targetIframe = $(parent.document).find(\"[name='\" + target + \"']\");\r\n");
   $nm_saida->saida("          apl_lig = parent.scIframeSCInit && parent.scIframeSCInit[target] ? addUrlParam(apl_lig, \"script_case_init\", parent.scIframeSCInit[target]) : apl_lig;\r\n");
   $nm_saida->saida("          targetIframe.attr(\"src\", apl_lig);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc == 'igual' || opc == 'novo') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = opc;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"igual\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value   = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value       = parms ;\r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("          window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit5(apl_lig, apl_saida, parms, target, opc, modal_h, modal_w, m_confirm, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      parms = parms.replace(/@percent@/g, \"%\"); \r\n");
   $nm_saida->saida("      if (m_confirm != null && m_confirm != '') \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          if (confirm(m_confirm))\r\n");
   $nm_saida->saida("          { }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("             return;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          if (target == '_blank') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open (apl_lig);\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.location = apl_lig;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (target == 'modal' || target == 'modal_rpdf') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          par_modal = '?&nmgp_outra_jan=true&nmgp_url_saida=modal&SC_lig_apl_orig=grid_terceros_todos_13122021';\r\n");
   $nm_saida->saida("          if (opc != null && opc != '') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              par_modal += '&nmgp_opcao=grid';\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          if (parms != null && parms != '') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              par_modal += '&nmgp_parms=' + parms;\r\n");
   $nm_saida->saida("          }\r\n");
   $Sc_parent = "";
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $Sc_parent = "parent.";
   }
   $nm_saida->saida("          if (target == 'modal') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("               " . $Sc_parent . "tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("               " . $Sc_parent . "tb_show('', apl_lig + par_modal + '&TB_iframe=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("          window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (\"dbifrm_widget\" == target.substr(0, 13)) {\r\n");
   $nm_saida->saida("          var targetIframe = $(parent.document).find(\"[name='\" + target + \"']\");\r\n");
   $nm_saida->saida("          apl_lig = parent.scIframeSCInit && parent.scIframeSCInit[target] ? addUrlParam(apl_lig, \"script_case_init\", parent.scIframeSCInit[target]) : apl_lig;\r\n");
   $nm_saida->saida("          targetIframe.attr(\"src\", apl_lig);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action = apl_lig;\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      document.F3.nmgp_outra_jan.value   = \"\" ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function addUrlParam(sUrl, sParam, sValue) {\r\n");
   $nm_saida->saida("           var baseUrl, urlParams = [], objParams = {}, tmp, i;\r\n");
   $nm_saida->saida("           tmp = sUrl.split(\"?\");\r\n");
   $nm_saida->saida("           baseUrl = tmp[0];\r\n");
   $nm_saida->saida("           if (tmp[1]) {\r\n");
   $nm_saida->saida("                   urlParams = tmp[1].split(\"&\");\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           for (i = 0; i < urlParams.length; i++) {\r\n");
   $nm_saida->saida("                   tmp = urlParams[i].split(\"=\");\r\n");
   $nm_saida->saida("                   objParams[ tmp[0] ] = tmp[1] ? tmp[1] : \"\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           objParams[sParam] = sValue;\r\n");
   $nm_saida->saida("           urlParams = [];\r\n");
   $nm_saida->saida("           for (tmp in objParams) {\r\n");
   $nm_saida->saida("                   urlParams.push(tmp + \"=\" + objParams[tmp]);\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           return baseUrl + \"?\" + urlParams.join(\"&\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_submit6(apl_lig, apl_saida, parms, target, pos, alt, larg, opc, modal_h, modal_w, m_confirm, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          if (target == '_blank') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open (apl_lig);\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.location = apl_lig;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (pos == \"A\") {obj = document.getElementById('nmsc_iframe_liga_A_grid_terceros_todos_13122021');} \r\n");
   $nm_saida->saida("      if (pos == \"B\") {obj = document.getElementById('nmsc_iframe_liga_B_grid_terceros_todos_13122021');} \r\n");
   $nm_saida->saida("      if (pos == \"E\") {obj = document.getElementById('nmsc_iframe_liga_E_grid_terceros_todos_13122021');} \r\n");
   $nm_saida->saida("      if (pos == \"D\") {obj = document.getElementById('nmsc_iframe_liga_D_grid_terceros_todos_13122021');} \r\n");
   $nm_saida->saida("      obj.style.height = (alt == parseInt(alt)) ? alt + 'px' : alt;\r\n");
   $nm_saida->saida("      obj.style.width  = (larg == parseInt(larg)) ? larg + 'px' : larg;\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_open_export(arq_export) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      window.location = arq_export;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"SC_null\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"xml\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   $nm_saida->saida("       }\r\n");
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['grid_terceros_todos_13122021_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_todos_13122021@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if ((x == 'igual' || x == 'edit') && NM_ancor_ult_lig != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("                ajax_save_ancor(\"F3\", NM_ancor_ult_lig);\r\n");
   $nm_saida->saida("                NM_ancor_ult_lig = \"\";\r\n");
   $nm_saida->saida("            } else {\r\n");
   $nm_saida->saida("                document.F3.submit() ;\r\n");
   $nm_saida->saida("            } \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fprint.tp_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_tipo_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           if (password != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.Fprint.target = '_self';\r\n");
   $nm_saida->saida("               document.Fprint.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           document.Fprint.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xls_conf(tp_xls, SC_module_export, password, tot_xls, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"csv\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_line.value = delim_line;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_col.value = delim_col;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_dados.value = delim_dados;\r\n");
   $nm_saida->saida("           document.Fexport.nm_label_csv.value = label_csv;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_todos_13122021/grid_terceros_todos_13122021_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_terceros_todos_13122021_export_ctrl.php\";\r\n");
   $nm_saida->saida("       document.Fexport.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var image = new Image();\r\n");
   $nm_saida->saida("       image.src = imagem;\r\n");
   $nm_saida->saida("       var viewer = new Viewer(image, {\r\n");
   $nm_saida->saida("           navbar: false,\r\n");
   $nm_saida->saida("           hidden: function () {\r\n");
   $nm_saida->saida("               viewer.destroy();\r\n");
   $nm_saida->saida("           },\r\n");
   $nm_saida->saida("       });\r\n");
   $nm_saida->saida("       viewer.show();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo2 + \"?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_terceros_todos_13122021']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (Obj_Form != Obj_Form1 && Obj_Form1)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form1.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"grid_terceros_todos_13122021_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_terceros_todos_13122021')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_terceros_todos_13122021', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
