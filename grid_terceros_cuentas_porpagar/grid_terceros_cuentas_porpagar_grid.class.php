<?php
class grid_terceros_cuentas_porpagar_grid
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
   var $NM_bg_tot;
   var $NM_bg_sub_tot;
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
   var $sum_valor_total;
   var $tercero_Old;
   var $arg_sum_tercero;
   var $Label_tercero;
   var $sc_proc_quebra_tercero;
   var $count_tercero;
   var $sum_tercero_valor_total;
   var $prefijo_Old;
   var $arg_sum_prefijo;
   var $Label_prefijo;
   var $sc_proc_quebra_prefijo;
   var $count_prefijo;
   var $sum_prefijo_valor_total;
   var $fecha_Old;
   var $arg_sum_fecha;
   var $Label_fecha;
   var $sc_proc_quebra_fecha;
   var $count_fecha;
   var $sum_fecha_valor_total;
   var $tipo_Old;
   var $arg_sum_tipo;
   var $Label_tipo;
   var $sc_proc_quebra_tipo;
   var $count_tipo;
   var $sum_tipo_valor_total;
   var $observaciones_Old;
   var $arg_sum_observaciones;
   var $Label_observaciones;
   var $sc_proc_quebra_observaciones;
   var $count_observaciones;
   var $sum_observaciones_valor_total;
   var $usuario_Old;
   var $arg_sum_usuario;
   var $Label_usuario;
   var $sc_proc_quebra_usuario;
   var $count_usuario;
   var $sum_usuario_valor_total;
   var $cod_cuenta_Old;
   var $arg_sum_cod_cuenta;
   var $Label_cod_cuenta;
   var $sc_proc_quebra_cod_cuenta;
   var $count_cod_cuenta;
   var $sum_cod_cuenta_valor_total;
   var $pagada_Old;
   var $arg_sum_pagada;
   var $Label_pagada;
   var $sc_proc_quebra_pagada;
   var $count_pagada;
   var $sum_pagada_valor_total;
   var $concepto_Old;
   var $arg_sum_concepto;
   var $Label_concepto;
   var $sc_proc_quebra_concepto;
   var $count_concepto;
   var $sum_concepto_valor_total;
   var $prefijo;
   var $numero;
   var $fecha;
   var $tercero;
   var $tipo;
   var $numero_documento;
   var $valor_total;
   var $saldo;
   var $usuario;
   var $cod_cuenta;
   var $pagada;
   var $asentada;
   var $idtercero_cuenta;
   var $ie;
   var $observaciones;
   var $abonos;
   var $ultimo_abono;
   var $fecha_uabono;
   var $creado;
   var $editado;
   var $automatico;
   var $tipo_tercero;
   var $concepto;
   var $look_ie;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
      {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "grid_terceros_cuentas_porpagar/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_terceros_cuentas_porpagar_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
      }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
       {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
       } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=3>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_terceros_cuentas_porpagar'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['save_grid']);
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_terceros_cuentas_porpagar_grafico();
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['graf_pdf'] == "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'] && $Gera_graf)
           {
               $this->grafico_pdf_flash();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "grid";
           } 
           elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $Gera_graf)
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'];
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_pdf']['label_group'] : "S";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_pdf']['all_cab'] : "N";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_pdf']['all_label'] : "N";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
   {
       if (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1)
       {
           $this->width_tabula_quebra  = (((count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) - 1) * 13) + 3) . "px";
           $this->width_tabula_display = "''";
           $this->Tem_tab_vert = true;
       }
       else
       {
           $this->width_tabula_quebra  = "0px";
           $this->width_tabula_display = "none";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta")
   {
       $this->width_tabula_quebra  = "16px";
       $this->width_tabula_display = "''";
       $this->Tem_tab_vert = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
   {
       $this->width_tabula_quebra  = "16px";
       $this->width_tabula_display = "''";
       $this->Tem_tab_vert = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['mostra_edit'] = "N";
   }
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_terceros_cuentas_porpagar", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_2'] = "on";
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
   $this->nmgp_botoes['gantt'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   $this->nmgp_botoes['gridsave'] = "on";
   $this->nmgp_botoes['gridsavesession'] = "on";
   $this->Cmps_ord_def['prefijo'] = " asc";
   $this->Cmps_ord_def['numero'] = " desc";
   $this->Cmps_ord_def['fecha'] = " desc";
   $this->Cmps_ord_def['tercero'] = " desc";
   $this->Cmps_ord_def['tipo'] = " asc";
   $this->Cmps_ord_def['numero_documento'] = " asc";
   $this->Cmps_ord_def['valor_total'] = " desc";
   $this->Cmps_ord_def['saldo'] = " desc";
   $this->Cmps_ord_def['usuario'] = " asc";
   $this->Cmps_ord_def['cod_cuenta'] = " asc";
   $this->Cmps_ord_def['pagada'] = " asc";
   $this->Cmps_ord_def['idtercero_cuenta'] = " desc";
   $this->Cmps_ord_def['ie'] = " asc";
   $this->Cmps_ord_def['observaciones'] = " asc";
   $this->Cmps_ord_def['abonos'] = " desc";
   $this->Cmps_ord_def['ultimo_abono'] = " asc";
   $this->Cmps_ord_def['fecha_uabono'] = " desc";
   $this->Cmps_ord_def['creado'] = " desc";
   $this->Cmps_ord_def['editado'] = " desc";
   $this->Cmps_ord_def['automatico'] = " asc";
   $this->Cmps_ord_def['tipo_tercero'] = " asc";
   $this->Cmps_ord_def['concepto'] = " desc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'])) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false && !is_array($this->prefijo))
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false && !is_array($this->numero))
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha))
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false && !is_array($this->tercero))
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false && !is_array($this->tipo))
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->concepto = $Busca_temp['concepto']; 
       $tmp_pos = strpos($this->concepto, "##@@");
       if ($tmp_pos !== false && !is_array($this->concepto))
       {
           $this->concepto = substr($this->concepto, 0, $tmp_pos);
       }
       $concepto_2 = $Busca_temp['concepto_input_2']; 
       $this->concepto_2 = $Busca_temp['concepto_input_2']; 
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false && !is_array($this->numero_documento))
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false && !is_array($this->usuario))
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false && !is_array($this->pagada))
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
       $this->asentada = $Busca_temp['asentada']; 
       $tmp_pos = strpos($this->asentada, "##@@");
       if ($tmp_pos !== false && !is_array($this->asentada))
       {
           $this->asentada = substr($this->asentada, 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "muda_qt_linhas";
   } 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_terceros_cuentas_porpagar'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_terceros_cuentas_porpagar'];

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

   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['insert'] != '')
   {
       $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['insert'];
       $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['insert'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['update'] != '')
   {
       $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['update'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['delete'] != '')
   {
       $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar']['delete'];
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_terceros_cuentas_porpagar_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf'] != "pdf")  
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_terceros_cuentas_porpagar_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] = 10;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $Free_sql_atual = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_sql'] as $cmp => $resto)
           {
               foreach ($resto as $cmp_sql => $ord)
               {
                   $Free_sql_atual[$cmp_sql] = 0;
               } 
           } 
           if (!isset($Free_sql_atual['fecha']))
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           } 
           $Free_sql_atual = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_sql'] as $cmp => $resto)
           {
               foreach ($resto as $cmp_sql => $ord)
               {
                   $Free_sql_atual[$cmp_sql] = 0;
               } 
           } 
           if (!isset($Free_sql_atual['numero']))
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           } 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['fecha'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']['numero'] = 'desc'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['tercero']["tercero"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_sql'] as $cmp_var => $resto)
           {
               foreach ($resto as $SC_Sql_col => $SC_Sql_order)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'][$cmp_var][$SC_Sql_col] = $SC_Sql_order;
               }
           }
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['usuario']["usuario"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['cod_cuenta']["cod_cuenta"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['tercero']["tercero"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['cod_cuenta']["cod_cuenta"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['fecha']["fecha"] = "desc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['cod_cuenta']["cod_cuenta"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']['concepto']["concepto"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao']       = "igual" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->sum_valor_total = 0;
   $this->arg_sum_tercero = "";
   $this->count_tercero = 0;
   $this->sum_tercero_valor_total = 0;
   $this->arg_sum_prefijo = "";
   $this->count_prefijo = 0;
   $this->sum_prefijo_valor_total = 0;
   $this->arg_sum_fecha = "";
   $this->count_fecha = 0;
   $this->sum_fecha_valor_total = 0;
   $this->arg_sum_tipo = "";
   $this->count_tipo = 0;
   $this->sum_tipo_valor_total = 0;
   $this->arg_sum_observaciones = "";
   $this->count_observaciones = 0;
   $this->sum_observaciones_valor_total = 0;
   $this->arg_sum_usuario = "";
   $this->count_usuario = 0;
   $this->sum_usuario_valor_total = 0;
   $this->arg_sum_cod_cuenta = "";
   $this->count_cod_cuenta = 0;
   $this->sum_cod_cuenta_valor_total = 0;
   $this->arg_sum_pagada = "";
   $this->count_pagada = 0;
   $this->sum_pagada_valor_total = 0;
   $this->arg_sum_concepto = "";
   $this->count_concepto = 0;
   $this->sum_concepto_valor_total = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] == "all") 
   { 
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total']);
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['contr_array_resumo'] = "NAO";
       } 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] > 0) 
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
       $nmgp_select = "SELECT prefijo, numero, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, str_replace (convert(char(10),fecha_uabono,102), '.', '-') + ' ' + convert(char(8),fecha_uabono,20), creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT prefijo, numero, fecha, tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, fecha_uabono, creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT prefijo, numero, convert(char(23),fecha,121), tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, convert(char(23),fecha_uabono,121), creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT prefijo, numero, fecha, tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, fecha_uabono, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(editado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT prefijo, numero, EXTEND(fecha, YEAR TO DAY), tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, EXTEND(fecha_uabono, YEAR TO DAY), creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT prefijo, numero, fecha, tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, fecha_uabono, creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
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
       $this->prefijo = $this->rs_grid->fields[0] ;  
       $this->numero = $this->rs_grid->fields[1] ;  
       $this->numero = (string)$this->numero;
       $this->fecha = $this->rs_grid->fields[2] ;  
       $this->tercero = $this->rs_grid->fields[3] ;  
       $this->tercero = (string)$this->tercero;
       $this->tipo = $this->rs_grid->fields[4] ;  
       $this->numero_documento = $this->rs_grid->fields[5] ;  
       $this->valor_total = $this->rs_grid->fields[6] ;  
       $this->valor_total =  str_replace(",", ".", $this->valor_total);
       $this->valor_total = (strpos(strtolower($this->valor_total), "e")) ? (float)$this->valor_total : $this->valor_total; 
       $this->valor_total = (string)$this->valor_total;
       $this->saldo = $this->rs_grid->fields[7] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->usuario = $this->rs_grid->fields[8] ;  
       $this->cod_cuenta = $this->rs_grid->fields[9] ;  
       $this->pagada = $this->rs_grid->fields[10] ;  
       $this->asentada = $this->rs_grid->fields[11] ;  
       $this->idtercero_cuenta = $this->rs_grid->fields[12] ;  
       $this->idtercero_cuenta = (string)$this->idtercero_cuenta;
       $this->ie = $this->rs_grid->fields[13] ;  
       $this->observaciones = $this->rs_grid->fields[14] ;  
       $this->abonos = $this->rs_grid->fields[15] ;  
       $this->abonos = (string)$this->abonos;
       $this->ultimo_abono = $this->rs_grid->fields[16] ;  
       $this->fecha_uabono = $this->rs_grid->fields[17] ;  
       $this->creado = $this->rs_grid->fields[18] ;  
       $this->editado = $this->rs_grid->fields[19] ;  
       $this->automatico = $this->rs_grid->fields[20] ;  
       $this->tipo_tercero = $this->rs_grid->fields[21] ;  
       $this->concepto = $this->rs_grid->fields[22] ;  
       $this->concepto = (string)$this->concepto;
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig']))
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
           {
               $this->$Cmp_clone = $this->$Cmp_orig;
           }
       }
       if (!isset($this->tercero)) { $this->tercero = ""; }
       if (!isset($this->prefijo)) { $this->prefijo = ""; }
       if (!isset($this->fecha)) { $this->fecha = ""; }
       if (!isset($this->tipo)) { $this->tipo = ""; }
       if (!isset($this->observaciones)) { $this->observaciones = ""; }
       if (!isset($this->usuario)) { $this->usuario = ""; }
       if (!isset($this->cod_cuenta)) { $this->cod_cuenta = ""; }
       if (!isset($this->pagada)) { $this->pagada = ""; }
       if (!isset($this->concepto)) { $this->concepto = ""; }
       $GLOBALS["tercero"] = $this->rs_grid->fields[3] ;  
       $GLOBALS["tercero"] = (string)$GLOBALS["tercero"] ;
       $GLOBALS["tipo"] = $this->rs_grid->fields[4] ;  
       $GLOBALS["usuario"] = $this->rs_grid->fields[8] ;  
       $GLOBALS["concepto"] = $this->rs_grid->fields[22] ;  
       $GLOBALS["concepto"] = (string)$GLOBALS["concepto"] ;
       $this->arg_sum_prefijo = " = " . $this->Db->qstr($this->prefijo);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
           {
               $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
               if ($Cmp_orig == "fecha")
               {
                   $Str_arg_sum = "arg_sum_" . $cmp_gb;
                   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                   $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->fecha, $Format_tst, "fecha");
               }
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
       {
           $Format_tst = $this->Ini->Get_Gb_date_format('fechaycuenta', 'fecha');
           $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
           $this->arg_sum_fecha = $this->Ini->Get_date_arg_sum($TP_Time . $this->fecha, $Format_tst, "fecha");
           if (empty($this->fecha))
           {
               $this->Tot->Sc_groupby_fecha = "fecha";
           }
           else
           {
               $this->Tot->Sc_groupby_fecha = $this->Ini->Get_sql_date_groupby("fecha", $Format_tst);
           }
       }
       if ($this->fecha == "")
       {
           $this->arg_sum_fecha = " is null";
       }
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
       {
           $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
       }
       $this->arg_sum_tercero = ($this->tercero == "") ? " is null " : " = " . $this->tercero;
       $this->arg_sum_tipo = " = " . $this->Db->qstr($this->tipo);
       $this->arg_sum_usuario = " = " . $this->Db->qstr($this->usuario);
       $this->arg_sum_cod_cuenta = " = " . $this->Db->qstr($this->cod_cuenta);
       $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
       $this->look_ie = $this->ie; 
       $this->Lookup->lookup_ie($this->look_ie); 
       $this->arg_sum_observaciones = " = " . $this->Db->qstr($this->observaciones);
       $this->arg_sum_concepto = ($this->concepto == "") ? " is null " : " = " . $this->concepto;
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->SC_sep_quebra = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO") 
       {
           $this->tercero_Old = $this->tercero ; 
           $this->quebra_tercero_TERCERO($this->tercero) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by") 
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp] : $cmp;
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               $Cmp_Old    = $cmp . '_Old';
               $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
           }
           $sql_where = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR") 
       {
           $this->usuario_Old = $this->usuario ; 
           $this->quebra_usuario_USUARIO_ASESOR($this->usuario) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta") 
       {
           $this->cod_cuenta_Old = $this->cod_cuenta ; 
           $this->quebra_cod_cuenta_cuenta($this->cod_cuenta) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta") 
       {
           $this->tercero_Old = $this->tercero ; 
           $this->quebra_tercero_tercero_cuenta($this->tercero) ; 
           $this->cod_cuenta_Old = $this->cod_cuenta ; 
           $this->quebra_cod_cuenta_tercero_cuenta($this->tercero, $this->cod_cuenta) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta") 
       {
           $Format_tst = $this->Ini->Get_Gb_date_format('fechaycuenta', 'fecha');
           $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
           $this->fecha_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fecha, $Format_tst); 
           $this->quebra_fecha_fechaycuenta($this->fecha) ; 
           $this->cod_cuenta_Old = $this->cod_cuenta ; 
           $this->quebra_cod_cuenta_fechaycuenta($this->fecha, $this->cod_cuenta) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto") 
       {
           $this->concepto_Old = $this->concepto ; 
           $this->quebra_concepto_concepto($this->concepto) ; 
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->prefijo = $this->rs_grid->fields[0] ;  
           $this->numero = $this->rs_grid->fields[1] ;  
           $this->fecha = $this->rs_grid->fields[2] ;  
           $this->tercero = $this->rs_grid->fields[3] ;  
           $this->tipo = $this->rs_grid->fields[4] ;  
           $this->numero_documento = $this->rs_grid->fields[5] ;  
           $this->valor_total = $this->rs_grid->fields[6] ;  
           $this->saldo = $this->rs_grid->fields[7] ;  
           $this->usuario = $this->rs_grid->fields[8] ;  
           $this->cod_cuenta = $this->rs_grid->fields[9] ;  
           $this->pagada = $this->rs_grid->fields[10] ;  
           $this->asentada = $this->rs_grid->fields[11] ;  
           $this->idtercero_cuenta = $this->rs_grid->fields[12] ;  
           $this->ie = $this->rs_grid->fields[13] ;  
           $this->observaciones = $this->rs_grid->fields[14] ;  
           $this->abonos = $this->rs_grid->fields[15] ;  
           $this->ultimo_abono = $this->rs_grid->fields[16] ;  
           $this->fecha_uabono = $this->rs_grid->fields[17] ;  
           $this->creado = $this->rs_grid->fields[18] ;  
           $this->editado = $this->rs_grid->fields[19] ;  
           $this->automatico = $this->rs_grid->fields[20] ;  
           $this->tipo_tercero = $this->rs_grid->fields[21] ;  
           $this->concepto = $this->rs_grid->fields[22] ;  
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig']))
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
               {
                   $this->$Cmp_clone = $this->$Cmp_orig;
               }
           }
           if (!isset($this->tercero)) { $this->tercero = ""; }
           if (!isset($this->prefijo)) { $this->prefijo = ""; }
           if (!isset($this->fecha)) { $this->fecha = ""; }
           if (!isset($this->tipo)) { $this->tipo = ""; }
           if (!isset($this->observaciones)) { $this->observaciones = ""; }
           if (!isset($this->usuario)) { $this->usuario = ""; }
           if (!isset($this->cod_cuenta)) { $this->cod_cuenta = ""; }
           if (!isset($this->pagada)) { $this->pagada = ""; }
           if (!isset($this->concepto)) { $this->concepto = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Documentos Tesorería :: PDF</TITLE>
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
                    <meta name="msapplication-TileColor" content="#3C4858">
                    <meta name="msapplication-TileImage" content="">
                    <meta name="theme-color" content="#3C4858">
                    <meta name="apple-mobile-web-app-status-bar-style" content="#3C4858">
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
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pivot_charts']) : 0;
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
               grid_terceros_cuentas_porpagar_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_terceros_cuentas_porpagar_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_terceros_cuentas_porpagar_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_terceros_cuentas_porpagar_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_terceros_cuentas_porpagar_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Documentos Tesorería</TITLE>\r\n");
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
$nm_saida->saida("                        <meta name=\"msapplication-TileColor\" content=\"#3C4858\" >\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileImage\" content=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"theme-color\" content=\"#3C4858\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#3C4858\">\r\n");
$nm_saida->saida("                        <link rel=\"shortcut icon\" href=\"\">\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'] && !$this->Ini->sc_export_ajax)
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
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_terceros_cuentas_porpagar_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_terceros_cuentas_porpagar_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_terceros_cuentas_porpagar_message.js\"></script>\r\n");
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid']) . ";\r\n");
           }
           $gridWidthCorrection = '';
           if (false !== strpos($this->Ini->grid_table_width, 'calc')) {
               $gridWidthCalc = substr($this->Ini->grid_table_width, strpos($this->Ini->grid_table_width, '(') + 1);
               $gridWidthCalc = substr($gridWidthCalc, 0, strpos($gridWidthCalc, ')'));
               $gridWidthParts = explode(' ', $gridWidthCalc);
               if (3 == count($gridWidthParts) && 'px' == substr($gridWidthParts[2], -2)) {
                   $gridWidthParts[2] = substr($gridWidthParts[2], 0, -2) / 2;
                   $gridWidthCorrection = $gridWidthParts[1] . ' ' . $gridWidthParts[2];
               }
           }
           $nm_saida->saida("  function scSetFixedHeaders() {\r\n");
           $nm_saida->saida("   var divScroll, gridHeaders, headerPlaceholder;\r\n");
           $nm_saida->saida("   gridHeaders = scGetHeaderRow();\r\n");
           $nm_saida->saida("   headerPlaceholder = $(\"#sc-id-fixedheaders-placeholder\");\r\n");
           $nm_saida->saida("   if (!gridHeaders) {\r\n");
           $nm_saida->saida("     headerPlaceholder.hide();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    scSetFixedHeadersContents(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("    scSetFixedHeadersSize(gridHeaders);\r\n");
           $nm_saida->saida("    scSetFixedHeadersPosition(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("    if (scIsHeaderVisible(gridHeaders)) {\r\n");
           $nm_saida->saida("     headerPlaceholder.hide();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    else {\r\n");
           $nm_saida->saida("     headerPlaceholder.show();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersPosition(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   if(gridHeaders)\r\n");
           $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       headerPlaceholder.css({\"top\": 0" . $gridWidthCorrection . ", \"left\": (Math.floor(gridHeaders.offset().left) - $(document).scrollLeft()" . $gridWidthCorrection . ") + \"px\"});\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scIsHeaderVisible(gridHeaders) {\r\n");
           $nm_saida->saida("   if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(gridHeaders); }\r\n");
           $nm_saida->saida("   return gridHeaders.offset().top > $(document).scrollTop();\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scGetHeaderRow() {\r\n");
           $nm_saida->saida("   var gridHeaders = $(\".sc-ui-grid-header-row-grid_terceros_cuentas_porpagar-1\"), headerDisplayed = true;\r\n");
           $nm_saida->saida("   if (!gridHeaders.length) {\r\n");
           $nm_saida->saida("    headerDisplayed = false;\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    if (!gridHeaders.filter(\":visible\").length) {\r\n");
           $nm_saida->saida("     headerDisplayed = false;\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   if (!headerDisplayed) {\r\n");
           $nm_saida->saida("    gridHeaders = $(\".sc-ui-grid-header-row\").filter(\":visible\");\r\n");
           $nm_saida->saida("    if (gridHeaders.length) {\r\n");
           $nm_saida->saida("     gridHeaders = $(gridHeaders[0]);\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    else {\r\n");
           $nm_saida->saida("     gridHeaders = false;\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   return gridHeaders;\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersContents(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   var i, htmlContent;\r\n");
           $nm_saida->saida("   htmlContent = \"<table id=\\\"sc-id-fixed-headers\\\" class=\\\"scGridTabela\\\">\";\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    htmlContent += \"<tr class=\\\"scGridLabel\\\" id=\\\"sc-id-fixed-headers-row-\" + i + \"\\\">\" + $(gridHeaders[i]).html() + \"</tr>\";\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   htmlContent += \"</table>\";\r\n");
           $nm_saida->saida("   headerPlaceholder.html(htmlContent);\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersSize(gridHeaders) {\r\n");
           $nm_saida->saida("   var i, j, headerColumns, gridColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;\r\n");
           $nm_saida->saida("   tableOriginal = document.getElementById(\"sc-ui-grid-body-84a64f01\");\r\n");
           $nm_saida->saida("   tableHeaders = document.getElementById(\"sc-id-fixed-headers\");\r\n");
           $nm_saida->saida("    tableWidth = $(tableOriginal).outerWidth();\r\n");
           $nm_saida->saida("   $(tableHeaders).css(\"width\", tableWidth);\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    headerColumns = $(\"#sc-id-fixed-headers-row-\" + i).find(\"td\");\r\n");
           $nm_saida->saida("    gridColumns = $(gridHeaders[i]).find(\"td\");\r\n");
           $nm_saida->saida("    for (j = 0; j < gridColumns.length; j++) {\r\n");
           $nm_saida->saida("     if (window.getComputedStyle(gridColumns[j])) {\r\n");
           $nm_saida->saida("      cellWidth = window.getComputedStyle(gridColumns[j]).width;\r\n");
           $nm_saida->saida("      cellHeight = window.getComputedStyle(gridColumns[j]).height;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("      cellWidth = $(gridColumns[j]).width() + \"px\";\r\n");
           $nm_saida->saida("      cellHeight = $(gridColumns[j]).height() + \"px\";\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $(headerColumns[j]).css({\r\n");
           $nm_saida->saida("      \"width\": cellWidth,\r\n");
           $nm_saida->saida("      \"height\": cellHeight\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
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
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ancor_save']);
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
           $nm_saida->saida("       url: \"grid_terceros_cuentas_porpagar_save_grid.php\",\r\n");
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
$nm_saida->saida("      url: \"grid_terceros_cuentas_porpagar_save_grid.php\",\r\n");
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
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_terceros_cuentas_porpagar_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
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
                   if (substr(trim($NM_line_css), 0, 12) == ".scGridTotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
                   if (substr(trim($NM_line_css), 0, 15) == ".scGridSubtotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_sub_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
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
                   if (substr(trim($NM_line_css), 0, 12) == ".scGridTotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
                   if (substr(trim($NM_line_css), 0, 15) == ".scGridSubtotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_sub_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
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
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_terceros_cuentas_porpagar_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['num_css'] . '.css');
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_terceros_cuentas_porpagar_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf'] != "pdf")
       {
           $nm_saida->saida("  .css_iframes   { margin-bottom: 0px; margin-left: 0px;  margin-right: 0px;  margin-top: 0px; }\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
       { 
           $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
       } 
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
  {
   $nm_saida->saida("      thead { display: table-header-group !important; }\r\n");
   $nm_saida->saida("      tfoot { display: table-row-group !important; }\r\n");
   $nm_saida->saida("      table td, table tr, td, tr, table { page-break-inside: avoid !important; }\r\n");
   $nm_saida->saida("      #summary_body > td { padding: 0px !important; }\r\n");
  }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_terceros_cuentas_porpagar_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print")) 
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
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Tercero", "tercero");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("PJ", "prefijo");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Usuario", "usuario");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Cuenta", "cod_cuenta");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Tercero", "tercero");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", "fecha");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Concepto", "concepto");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'])
       { 
           $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD  colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_A_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_A_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_E_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_E_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <td style=\"padding: 0px;  vertical-align: top;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\"><tr>\r\n");
           $nm_saida->saida("    <TD colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_AL_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_AL_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
        } 
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   {
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_terceros_cuentas_porpagar']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_terceros_cuentas_porpagar']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_terceros_cuentas_porpagar']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_terceros_cuentas_porpagar']) . "_";
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

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida']) ? "grid_terceros_cuentas_porpagar_" : "";
   $this->css_sep = " ";
   $this->css_prefijo_label = $compl_css_emb . "css_prefijo_label";
   $this->css_prefijo_grid_line = $compl_css_emb . "css_prefijo_grid_line";
   $this->css_numero_label = $compl_css_emb . "css_numero_label";
   $this->css_numero_grid_line = $compl_css_emb . "css_numero_grid_line";
   $this->css_fecha_label = $compl_css_emb . "css_fecha_label";
   $this->css_fecha_grid_line = $compl_css_emb . "css_fecha_grid_line";
   $this->css_tercero_label = $compl_css_emb . "css_tercero_label";
   $this->css_tercero_grid_line = $compl_css_emb . "css_tercero_grid_line";
   $this->css_tipo_label = $compl_css_emb . "css_tipo_label";
   $this->css_tipo_grid_line = $compl_css_emb . "css_tipo_grid_line";
   $this->css_numero_documento_label = $compl_css_emb . "css_numero_documento_label";
   $this->css_numero_documento_grid_line = $compl_css_emb . "css_numero_documento_grid_line";
   $this->css_valor_total_label = $compl_css_emb . "css_valor_total_label";
   $this->css_valor_total_grid_line = $compl_css_emb . "css_valor_total_grid_line";
   $this->css_saldo_label = $compl_css_emb . "css_saldo_label";
   $this->css_saldo_grid_line = $compl_css_emb . "css_saldo_grid_line";
   $this->css_usuario_label = $compl_css_emb . "css_usuario_label";
   $this->css_usuario_grid_line = $compl_css_emb . "css_usuario_grid_line";
   $this->css_cod_cuenta_label = $compl_css_emb . "css_cod_cuenta_label";
   $this->css_cod_cuenta_grid_line = $compl_css_emb . "css_cod_cuenta_grid_line";
   $this->css_pagada_label = $compl_css_emb . "css_pagada_label";
   $this->css_pagada_grid_line = $compl_css_emb . "css_pagada_grid_line";
   $this->css_asentada_label = $compl_css_emb . "css_asentada_label";
   $this->css_asentada_grid_line = $compl_css_emb . "css_asentada_grid_line";
   $this->css_idtercero_cuenta_label = $compl_css_emb . "css_idtercero_cuenta_label";
   $this->css_idtercero_cuenta_grid_line = $compl_css_emb . "css_idtercero_cuenta_grid_line";
   $this->css_ie_label = $compl_css_emb . "css_ie_label";
   $this->css_ie_grid_line = $compl_css_emb . "css_ie_grid_line";
   $this->css_observaciones_label = $compl_css_emb . "css_observaciones_label";
   $this->css_observaciones_grid_line = $compl_css_emb . "css_observaciones_grid_line";
   $this->css_abonos_label = $compl_css_emb . "css_abonos_label";
   $this->css_abonos_grid_line = $compl_css_emb . "css_abonos_grid_line";
   $this->css_ultimo_abono_label = $compl_css_emb . "css_ultimo_abono_label";
   $this->css_ultimo_abono_grid_line = $compl_css_emb . "css_ultimo_abono_grid_line";
   $this->css_fecha_uabono_label = $compl_css_emb . "css_fecha_uabono_label";
   $this->css_fecha_uabono_grid_line = $compl_css_emb . "css_fecha_uabono_grid_line";
   $this->css_creado_label = $compl_css_emb . "css_creado_label";
   $this->css_creado_grid_line = $compl_css_emb . "css_creado_grid_line";
   $this->css_editado_label = $compl_css_emb . "css_editado_label";
   $this->css_editado_grid_line = $compl_css_emb . "css_editado_grid_line";
   $this->css_automatico_label = $compl_css_emb . "css_automatico_label";
   $this->css_automatico_grid_line = $compl_css_emb . "css_automatico_grid_line";
   $this->css_tipo_tercero_label = $compl_css_emb . "css_tipo_tercero_label";
   $this->css_tipo_tercero_grid_line = $compl_css_emb . "css_tipo_tercero_grid_line";
   $this->css_concepto_label = $compl_css_emb . "css_concepto_label";
   $this->css_concepto_grid_line = $compl_css_emb . "css_concepto_grid_line";
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['cab']))
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cond_pesq'];
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
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cond_pesq'], 0, $trab_pos);
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sv_dt_head']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sv_dt_head'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sv_dt_head']['fix'] = $nm_data_fixa;
       $nm_refresch_cab_rod = true;
   } 
   else 
   { 
       $nm_refresch_cab_rod = false;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sv_dt_head'] as $ind => $val)
   {
       $tmp_var = "sc_data_cab" . $ind;
       if ($$tmp_var != $val)
       {
           $nm_refresch_cab_rod = true;
           break;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sv_dt_head']['fix'] != $nm_data_fixa)
   {
       $nm_refresch_cab_rod = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sv_dt_head']['fix'] = $nm_data_fixa;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" colspan=3 style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) 
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
       $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__briefcase2_document_32.png";
       $img_NM_CAB_LOGOTIPO = "scriptcase__NM__ico__NM__briefcase2_document_32.png";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img)
   {
       $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__briefcase2_document_32.png";
       $tmp_img_word = fopen($loc_img_word, "rb");
       $reg_img_word = fread($tmp_img_word, filesize($loc_img_word));
       fclose($tmp_img_word);
       $img_NM_CAB_LOGOTIPO = "data:image/jpeg;base64," . base64_encode($reg_img_word);
   }
   else
   {
       $img_NM_CAB_LOGOTIPO = $this->NM_raiz_img . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__briefcase2_document_32.png";
   }
   $nm_saida->saida("   <TABLE width=\"100%\" class=\"" . $this->css_scGridHeader . "\">\r\n");
   $nm_saida->saida("    <TR align=\"center\">\r\n");
   $nm_saida->saida("     <TD style=\"padding: 0px\">\r\n");
   $nm_saida->saida("      <TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\">\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" rowspan=\"3\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("             <IMG SRC=\"" . $img_NM_CAB_LOGOTIPO . "\" BORDER=\"0\"/>\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"left\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          Documentos Tesorería\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          " . $nm_data_fixa . "\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          " . $nm_cab_filtro . "\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("      </TABLE>\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_head', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
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
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_label'])
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
   $nm_saida->saida("    <TR id=\"tit_grid_terceros_cuentas_porpagar__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_terceros_cuentas_porpagar-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_concepto_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_concepto_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_concepto_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] == "S")) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_concepto_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_label'])
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
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_terceros_cuentas_porpagar_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cols_emb'] = count($Nm_temp) - 1;
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
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_prefijo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['prefijo'])) ? $this->New_label['prefijo'] : "PJ"; 
   if (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_prefijo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_prefijo_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'prefijo')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('prefijo')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_numero()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Numero"; 
   if (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_numero_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_numero_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'numero')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('numero')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_fecha()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
   if (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fecha_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fecha_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'fecha')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('fecha')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_tercero()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tercero'])) ? $this->New_label['tercero'] : "Tercero"; 
   if (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tercero_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tercero_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'tercero')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('tercero')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_tipo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
   if (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tipo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tipo_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'tipo')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('tipo')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_numero_documento()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['numero_documento'])) ? $this->New_label['numero_documento'] : "Documento"; 
   if (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_numero_documento_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_numero_documento_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'numero_documento')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('numero_documento')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_valor_total()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['valor_total'])) ? $this->New_label['valor_total'] : "Valor"; 
   if (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_valor_total_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_valor_total_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'valor_total')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('valor_total')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_saldo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
   if (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_saldo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_saldo_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'saldo')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('saldo')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_usuario()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['usuario'])) ? $this->New_label['usuario'] : "Usuario"; 
   if (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_usuario_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_usuario_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'usuario')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('usuario')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_cod_cuenta()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cuenta"; 
   if (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cod_cuenta_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cod_cuenta_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'cod_cuenta')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('cod_cuenta')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_pagada()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
   if (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_pagada_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_pagada_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'pagada')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('pagada')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_asentada()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
   if (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asentada_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asentada_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_idtercero_cuenta()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idtercero_cuenta'])) ? $this->New_label['idtercero_cuenta'] : "Idtercero Cuenta"; 
   if (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idtercero_cuenta_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idtercero_cuenta_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'idtercero_cuenta')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idtercero_cuenta')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_ie()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['ie'])) ? $this->New_label['ie'] : "IE"; 
   if (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_ie_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_ie_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'ie')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('ie')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_observaciones()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_observaciones_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'observaciones')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('observaciones')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_abonos()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['abonos'])) ? $this->New_label['abonos'] : "Abonos"; 
   if (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_abonos_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_abonos_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'abonos')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('abonos')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_ultimo_abono()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['ultimo_abono'])) ? $this->New_label['ultimo_abono'] : "Ultimo Abono"; 
   if (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_ultimo_abono_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_ultimo_abono_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'ultimo_abono')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('ultimo_abono')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_fecha_uabono()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['fecha_uabono'])) ? $this->New_label['fecha_uabono'] : "Fecha Uabono"; 
   if (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fecha_uabono_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fecha_uabono_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'fecha_uabono')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('fecha_uabono')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_creado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
   if (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_creado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_creado_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'creado')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('creado')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_editado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['editado'])) ? $this->New_label['editado'] : "Editado"; 
   if (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_editado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_editado_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'editado')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('editado')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_automatico()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['automatico'])) ? $this->New_label['automatico'] : "Automatico"; 
   if (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_automatico_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_automatico_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'automatico')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('automatico')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_tipo_tercero()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tipo_tercero'])) ? $this->New_label['tipo_tercero'] : "Tipo Tercero"; 
   if (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tipo_tercero_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tipo_tercero_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'tipo_tercero')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('tipo_tercero')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_concepto()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['concepto'])) ? $this->New_label['concepto'] : "Concepto"; 
   if (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_concepto_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_concepto_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_cmp'] == 'concepto')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('concepto')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ini_cor_grid']);
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
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['prefijo'])) ? $this->New_label['prefijo'] : "PJ"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['prefijo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Numero"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['numero'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['fecha'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tercero'])) ? $this->New_label['tercero'] : "Tercero"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['tercero'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['tipo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['numero_documento'])) ? $this->New_label['numero_documento'] : "Documento"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['numero_documento'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['valor_total'])) ? $this->New_label['valor_total'] : "Valor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['valor_total'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['saldo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['usuario'])) ? $this->New_label['usuario'] : "Usuario"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['usuario'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cuenta"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['cod_cuenta'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['pagada'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['asentada'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idtercero_cuenta'])) ? $this->New_label['idtercero_cuenta'] : "Idtercero Cuenta"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['idtercero_cuenta'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['ie'])) ? $this->New_label['ie'] : "IE"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['ie'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['observaciones'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['abonos'])) ? $this->New_label['abonos'] : "Abonos"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['abonos'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['ultimo_abono'])) ? $this->New_label['ultimo_abono'] : "Ultimo Abono"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['ultimo_abono'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fecha_uabono'])) ? $this->New_label['fecha_uabono'] : "Fecha Uabono"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['fecha_uabono'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['creado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['editado'])) ? $this->New_label['editado'] : "Editado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['editado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['automatico'])) ? $this->New_label['automatico'] : "Automatico"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['automatico'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tipo_tercero'])) ? $this->New_label['tipo_tercero'] : "Tipo Tercero"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['tipo_tercero'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['concepto'])) ? $this->New_label['concepto'] : "Concepto"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['labels']['concepto'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_terceros_cuentas_porpagar#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['cab_embutida'] != "S")
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
           { 
           $nm_saida->saida("    <TD >\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
           } 
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_A_grid_terceros_cuentas_porpagar', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_D_grid_terceros_cuentas_porpagar', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_E_grid_terceros_cuentas_porpagar', 'value' => 'NM_Blank_Page.htm');
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" &&
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
           { 
               $nm_saida->saida("</TABLE></TD>\r\n");
               $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("</TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    </TR>\r\n");
           } 
       $nm_saida->saida("</TABLE>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_terceros_cuentas_porpagar#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TD  colspan=3>\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
       } 
       $nm_id_aplicacao = " id=\"apl_grid_terceros_cuentas_porpagar#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf']) { 
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-84a64f01\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['TERCERO']['tercero'] = "S";
   $this->Break_pag_prt['TERCERO']['tercero'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['prefijo'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['prefijo'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['fecha'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['fecha'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['tercero'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['tercero'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['tipo'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['tipo'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['observaciones'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['observaciones'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['usuario'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['usuario'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['cod_cuenta'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['cod_cuenta'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['pagada'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['pagada'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['concepto'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['concepto'] = "N";
   $this->Break_pag_pdf['USUARIO_ASESOR']['usuario'] = "S";
   $this->Break_pag_prt['USUARIO_ASESOR']['usuario'] = "N";
   $this->Break_pag_pdf['cuenta']['cod_cuenta'] = "S";
   $this->Break_pag_prt['cuenta']['cod_cuenta'] = "N";
   $this->Break_pag_pdf['tercero_cuenta']['tercero'] = "S";
   $this->Break_pag_prt['tercero_cuenta']['tercero'] = "N";
   $this->Break_pag_pdf['tercero_cuenta']['cod_cuenta'] = "S";
   $this->Break_pag_prt['tercero_cuenta']['cod_cuenta'] = "N";
   $this->Break_pag_pdf['fechaycuenta']['fecha'] = "S";
   $this->Break_pag_prt['fechaycuenta']['fecha'] = "N";
   $this->Break_pag_pdf['fechaycuenta']['cod_cuenta'] = "S";
   $this->Break_pag_prt['fechaycuenta']['cod_cuenta'] = "N";
   $this->Break_pag_pdf['concepto']['concepto'] = "S";
   $this->Break_pag_prt['concepto']['concepto'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Config_Page_break_PDF'] = "N";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF'] = array();
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO") 
   { 
       if (isset($this->tercero))
       {
           $this->quebra_tercero_TERCERO_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   $this->SC_top       = array();
   $this->SC_bot       = array();
   $this->SC_bot[]     = "prefijo"; 
   $this->SC_top[]     = "prefijo"; 
   $this->SC_bot[]     = "fecha"; 
   $this->SC_top[]     = "fecha"; 
   $this->SC_bot[]     = "tercero"; 
   $this->SC_top[]     = "tercero"; 
   $this->SC_bot[]     = "tipo"; 
   $this->SC_top[]     = "tipo"; 
   $this->SC_bot[]     = "observaciones"; 
   $this->SC_top[]     = "observaciones"; 
   $this->SC_bot[]     = "usuario"; 
   $this->SC_top[]     = "usuario"; 
   $this->SC_bot[]     = "cod_cuenta"; 
   $this->SC_top[]     = "cod_cuenta"; 
   $this->SC_bot[]     = "pagada"; 
   $this->SC_top[]     = "pagada"; 
   $this->SC_bot[]     = "concepto"; 
   $this->SC_top[]     = "concepto"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       $Nivel_gb = 1;
       $this->Tab_Nv_tree = array();
       $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']);
       $this->Ult_qb_free = $this->Nivel_gbBot;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR") 
   { 
       if (isset($this->usuario))
       {
           $this->quebra_usuario_USUARIO_ASESOR_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta") 
   { 
       if (isset($this->cod_cuenta))
       {
           $this->quebra_cod_cuenta_cuenta_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta") 
   { 
       if (isset($this->tercero))
       {
           $this->quebra_tercero_tercero_cuenta_top(); 
       }
       if (isset($this->cod_cuenta))
       {
           $this->quebra_cod_cuenta_tercero_cuenta_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta") 
   { 
       if (isset($this->fecha))
       {
           $this->quebra_fecha_fechaycuenta_top(); 
       }
       if (isset($this->cod_cuenta))
       {
           $this->quebra_cod_cuenta_fechaycuenta_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto") 
   { 
       if (isset($this->concepto))
       {
           $this->quebra_concepto_concepto_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   } 
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && !$this->Ini->sc_export_ajax)
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
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_terceros_cuentas_porpagar_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->prefijo = $this->rs_grid->fields[0] ;  
          $this->numero = $this->rs_grid->fields[1] ;  
          $this->numero = (string)$this->numero;
          $this->fecha = $this->rs_grid->fields[2] ;  
          $this->tercero = $this->rs_grid->fields[3] ;  
          $this->tercero = (string)$this->tercero;
          $this->tipo = $this->rs_grid->fields[4] ;  
          $this->numero_documento = $this->rs_grid->fields[5] ;  
          $this->valor_total = $this->rs_grid->fields[6] ;  
          $this->valor_total =  str_replace(",", ".", $this->valor_total);
          $this->valor_total = (strpos(strtolower($this->valor_total), "e")) ? (float)$this->valor_total : $this->valor_total; 
          $this->valor_total = (string)$this->valor_total;
          $this->saldo = $this->rs_grid->fields[7] ;  
          $this->saldo =  str_replace(",", ".", $this->saldo);
          $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
          $this->saldo = (string)$this->saldo;
          $this->usuario = $this->rs_grid->fields[8] ;  
          $this->cod_cuenta = $this->rs_grid->fields[9] ;  
          $this->pagada = $this->rs_grid->fields[10] ;  
          $this->asentada = $this->rs_grid->fields[11] ;  
          $this->idtercero_cuenta = $this->rs_grid->fields[12] ;  
          $this->idtercero_cuenta = (string)$this->idtercero_cuenta;
          $this->ie = $this->rs_grid->fields[13] ;  
          $this->observaciones = $this->rs_grid->fields[14] ;  
          $this->abonos = $this->rs_grid->fields[15] ;  
          $this->abonos = (string)$this->abonos;
          $this->ultimo_abono = $this->rs_grid->fields[16] ;  
          $this->fecha_uabono = $this->rs_grid->fields[17] ;  
          $this->creado = $this->rs_grid->fields[18] ;  
          $this->editado = $this->rs_grid->fields[19] ;  
          $this->automatico = $this->rs_grid->fields[20] ;  
          $this->tipo_tercero = $this->rs_grid->fields[21] ;  
          $this->concepto = $this->rs_grid->fields[22] ;  
          $this->concepto = (string)$this->concepto;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
              {
                  $this->$Cmp_clone = $this->$Cmp_orig;
              }
          }
          if (!isset($this->tercero)) { $this->tercero = ""; }
          if (!isset($this->prefijo)) { $this->prefijo = ""; }
          if (!isset($this->fecha)) { $this->fecha = ""; }
          if (!isset($this->tipo)) { $this->tipo = ""; }
          if (!isset($this->observaciones)) { $this->observaciones = ""; }
          if (!isset($this->usuario)) { $this->usuario = ""; }
          if (!isset($this->cod_cuenta)) { $this->cod_cuenta = ""; }
          if (!isset($this->pagada)) { $this->pagada = ""; }
          if (!isset($this->concepto)) { $this->concepto = ""; }
          $GLOBALS["tercero"] = $this->rs_grid->fields[3] ;  
          $GLOBALS["tercero"] = (string)$GLOBALS["tercero"];
          $GLOBALS["tipo"] = $this->rs_grid->fields[4] ;  
          $GLOBALS["usuario"] = $this->rs_grid->fields[8] ;  
          $GLOBALS["concepto"] = $this->rs_grid->fields[22] ;  
          $GLOBALS["concepto"] = (string)$GLOBALS["concepto"];
          $this->arg_sum_prefijo = " = " . $this->Db->qstr($this->prefijo);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
              {
                   $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                   if ($Cmp_orig == "fecha")
                   {
                       $Str_arg_sum = "arg_sum_" . $cmp_gb;
                       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                       $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                       $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->fecha, $Format_tst, "fecha");
                   }
               }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
          {
               $Format_tst = $this->Ini->Get_Gb_date_format('fechaycuenta', 'fecha');
               $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->arg_sum_fecha = $this->Ini->Get_date_arg_sum($TP_Time . $this->fecha, $Format_tst, "fecha");
               if (empty($this->fecha))
               {
                   $this->Tot->Sc_groupby_fecha = "fecha";
               }
               else
               {
                   $this->Tot->Sc_groupby_fecha = $this->Ini->Get_sql_date_groupby("fecha", $Format_tst);
               }
          }
          if ($this->fecha == "")
          {
              $this->arg_sum_fecha = " is null";
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
          }
          $this->arg_sum_tercero = ($this->tercero == "") ? " is null " : " = " . $this->tercero;
          $this->arg_sum_tipo = " = " . $this->Db->qstr($this->tipo);
          $this->arg_sum_usuario = " = " . $this->Db->qstr($this->usuario);
          $this->arg_sum_cod_cuenta = " = " . $this->Db->qstr($this->cod_cuenta);
          $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
          $this->look_ie = $this->ie; 
          $this->Lookup->lookup_ie($this->look_ie); 
          $this->arg_sum_observaciones = " = " . $this->Db->qstr($this->observaciones);
          $this->arg_sum_concepto = ($this->concepto == "") ? " is null " : " = " . $this->concepto;
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final'] + 1; 
          $this->SC_sep_quebra = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
          if ($this->tercero !== $this->tercero_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO") 
          {  
              if (isset($this->tercero_Old))
              {
                 $this->quebra_tercero_TERCERO_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['tercero'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['tercero'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->tercero_Old = $this->tercero ; 
              $this->quebra_tercero_TERCERO($this->tercero) ; 
              if (isset($this->tercero_Old))
              {
                 $this->quebra_tercero_TERCERO_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp] : $cmp;
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
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
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
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
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
                  if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
                  elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF'][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']);
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
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          if ($this->usuario !== $this->usuario_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR") 
          {  
              if (isset($this->usuario_Old))
              {
                 $this->quebra_usuario_USUARIO_ASESOR_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['usuario'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['usuario'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->usuario_Old = $this->usuario ; 
              $this->quebra_usuario_USUARIO_ASESOR($this->usuario) ; 
              if (isset($this->usuario_Old))
              {
                 $this->quebra_usuario_USUARIO_ASESOR_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->cod_cuenta !== $this->cod_cuenta_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta") 
          {  
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_cuenta_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['cod_cuenta'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['cod_cuenta'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->cod_cuenta_Old = $this->cod_cuenta ; 
              $this->quebra_cod_cuenta_cuenta($this->cod_cuenta) ; 
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_cuenta_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->tercero !== $this->tercero_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta") 
          {  
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_tercero_cuenta_bot() ; 
              }
              if (isset($this->tercero_Old))
              {
                 $this->quebra_tercero_tercero_cuenta_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['tercero'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['tercero'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->cod_cuenta_Old = $this->cod_cuenta ; 
              $this->quebra_cod_cuenta_tercero_cuenta($this->tercero, $this->cod_cuenta) ; 
              $this->tercero_Old = $this->tercero ; 
              $this->quebra_tercero_tercero_cuenta($this->tercero) ; 
              if (isset($this->tercero_Old))
              {
                 $this->quebra_tercero_tercero_cuenta_top() ; 
              }
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_tercero_cuenta_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->cod_cuenta !== $this->cod_cuenta_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta") 
          {  
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_tercero_cuenta_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['cod_cuenta'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['cod_cuenta'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->cod_cuenta_Old = $this->cod_cuenta ; 
              $this->quebra_cod_cuenta_tercero_cuenta($this->tercero, $this->cod_cuenta) ; 
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_tercero_cuenta_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          $Format_tst = $this->Ini->Get_Gb_date_format('fechaycuenta', 'fecha');
          $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fecha, $Format_tst);
          if ($Cmp_tst != $this->fecha_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta") 
          {  
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_fechaycuenta_bot() ; 
              }
              if (isset($this->fecha_Old))
              {
                 $this->quebra_fecha_fechaycuenta_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['fecha'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['fecha'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->cod_cuenta_Old = $this->cod_cuenta ; 
              $this->quebra_cod_cuenta_fechaycuenta($this->fecha, $this->cod_cuenta) ; 
              $Format_tst = $this->Ini->Get_Gb_date_format('fechaycuenta', 'fecha');
              $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fecha_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fecha, $Format_tst);
              $this->quebra_fecha_fechaycuenta($this->fecha) ; 
              if (isset($this->fecha_Old))
              {
                 $this->quebra_fecha_fechaycuenta_top() ; 
              }
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_fechaycuenta_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->cod_cuenta !== $this->cod_cuenta_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta") 
          {  
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_fechaycuenta_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['cod_cuenta'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['cod_cuenta'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->cod_cuenta_Old = $this->cod_cuenta ; 
              $this->quebra_cod_cuenta_fechaycuenta($this->fecha, $this->cod_cuenta) ; 
              if (isset($this->cod_cuenta_Old))
              {
                 $this->quebra_cod_cuenta_fechaycuenta_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->concepto !== $this->concepto_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto") 
          {  
              if (isset($this->concepto_Old))
              {
                 $this->quebra_concepto_concepto_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby']]['concepto'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Page_break_PDF']['concepto'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->concepto_Old = $this->concepto ; 
              $this->quebra_concepto_concepto($this->concepto) ; 
              if (isset($this->concepto_Old))
              {
                 $this->quebra_concepto_concepto_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['contr_erro'] = 'on';
  
      $nm_select = "select np from conceptos_documentos where codigo='".$this->tipo  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNP = array();
      $this->vnp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vNP[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNP = false;
          $this->vNP_erro = $this->Db->ErrorMsg();
          $this->vnp = false;
          $this->vnp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vnp[0][0]))
{
	$vt = $this->vnp[0][0];
	if($vt=='-')
	{
		$this->pagada  = "";
	}
	else
	{
		if($this->pagada =='SI')
		{
			$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
		}
		if($this->pagada =='NO')
		{
			$this->NM_field_style["pagada"] = "background-color:#ffa0a3;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
		}
	}
}
if($this->asentada =='SI')
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->asentada =='NO')
{
	$this->NM_field_style["asentada"] = "background-color:#ffa0a3;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['contr_erro'] = 'off';
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
              { 
                 if ($this->pdf_all_label == "S" && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")) 
                 { } 
                 elseif ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['final']; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
              if ($temp == "fecha")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida("d/m/y");
                  } 
              }
              if ($temp == "fecha_uabono")
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
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_concepto_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_concepto_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['mostra_edit'] != "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_form_terceros_cuentas_porpagar']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_form_terceros_cuentas_porpagar'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"]) && $this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"] == "S")
              {
                  $Parms_Edt  = "idtercero_cuenta?#?" . str_replace('"', "@aspasd@", $this->idtercero_cuenta) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_cuentas_porpagar@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idtercero_cuenta?#?" . str_replace('"', "@aspasd@", $this->idtercero_cuenta) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_terceros_cuentas_porpagar', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_terceros_cuentas_porpagar', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\">" . $Link_Edit . "</td></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['mostra_edit'] == "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_form_terceros_cuentas_porpagar']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_form_terceros_cuentas_porpagar'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"]) && $this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"] == "S")
              {
                  $Parms_Edt  = "idtercero_cuenta?#?" . str_replace('"', "@aspasd@", $this->idtercero_cuenta) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_cuentas_porpagar@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idtercero_cuenta?#?" . str_replace('"', "@aspasd@", $this->idtercero_cuenta) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_terceros_cuentas_porpagar', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_terceros_cuentas_porpagar', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] == "S")) { 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"right\" valign=\"top\"   HEIGHT=\"0px\">" . $seq_det . "</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
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
       if (isset($this->tercero_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO")
       {
           $this->quebra_tercero_TERCERO_bot() ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']);
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
       if (isset($this->usuario_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR")
       {
           $this->quebra_usuario_USUARIO_ASESOR_bot() ; 
       }
       if (isset($this->cod_cuenta_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta")
       {
           $this->quebra_cod_cuenta_cuenta_bot() ; 
       }
       if (isset($this->cod_cuenta_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta")
       {
           $this->quebra_cod_cuenta_tercero_cuenta_bot() ; 
       }
       if (isset($this->tercero_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta")
       {
           $this->quebra_tercero_tercero_cuenta_bot() ; 
       }
       if (isset($this->cod_cuenta_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
       {
           $this->quebra_cod_cuenta_fechaycuenta_bot() ; 
       }
       if (isset($this->fecha_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
       {
           $this->quebra_fecha_fechaycuenta_bot() ; 
       }
       if (isset($this->concepto_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto")
       {
           $this->quebra_concepto_concepto_bot() ; 
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] . "_bot";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && empty($this->nm_grid_sem_reg) && 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
       $nm_saida->saida("</TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    </TABLE>\r\n");
           $nm_saida->saida("    </TD>\r\n");
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_prefijo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off") { 
          $conteudo = sc_strip_script($this->prefijo); 
          $conteudo_original = sc_strip_script($this->prefijo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'prefijo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'prefijo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_prefijo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_prefijo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_prefijo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_numero()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off") { 
          $conteudo = sc_strip_script($this->numero); 
          $conteudo_original = sc_strip_script($this->numero); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numero', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numero', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_numero_grid_line . "\"  style=\"" . $this->Css_Cmp['css_numero_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_numero_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_fecha()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->fecha)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fecha)); 
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
                   $conteudo = $this->nm_data->FormataSaida("d/m/y");
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fecha_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fecha_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_fecha_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tercero()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->tercero)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->tercero)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_tercero($conteudo , $this->tercero) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tercero', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tercero', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_tercero_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tercero_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tercero_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
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
          $this->Lookup->lookup_tipo($conteudo , $this->tipo) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
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
 function NM_grid_numero_documento()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off") { 
          $conteudo = sc_strip_script($this->numero_documento); 
          $conteudo_original = sc_strip_script($this->numero_documento); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numero_documento', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numero_documento', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_numero_documento_grid_line . "\"  style=\"" . $this->Css_Cmp['css_numero_documento_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_numero_documento_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_valor_total()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off") { 
          $nm_cor_num = ($this->valor_total < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->valor_total)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->valor_total)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valor_total', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valor_total', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_valor_total_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_valor_total_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_valor_total_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_saldo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off") { 
          $nm_cor_num = ($this->saldo < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->saldo)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->saldo)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'saldo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'saldo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_saldo_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_saldo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_saldo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_usuario()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off") { 
          $conteudo = sc_strip_script($this->usuario); 
          $conteudo_original = sc_strip_script($this->usuario); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_usuario($conteudo , $this->usuario) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'usuario', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'usuario', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_usuario_grid_line . "\"  style=\"" . $this->Css_Cmp['css_usuario_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_usuario_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_cod_cuenta()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off") { 
          $conteudo = sc_strip_script($this->cod_cuenta); 
          $conteudo_original = sc_strip_script($this->cod_cuenta); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cod_cuenta', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cod_cuenta', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cod_cuenta_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cod_cuenta_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_cod_cuenta_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_pagada()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off") { 
          $conteudo = sc_strip_script($this->pagada); 
          $conteudo_original = sc_strip_script($this->pagada); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pagada', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pagada', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_pagada = "";
          if (isset($this->NM_field_style["pagada"]) && !empty($this->NM_field_style["pagada"]))
          {
              $Style_pagada .= $this->NM_field_style["pagada"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_pagada_grid_line . "\"  style=\"" . $this->Css_Cmp['css_pagada_grid_line'] . $Style_pagada . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_pagada_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asentada()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off") { 
          $conteudo = sc_strip_script($this->asentada); 
          $conteudo_original = sc_strip_script($this->asentada); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'asentada', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'asentada', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_asentada = "";
          if (isset($this->NM_field_style["asentada"]) && !empty($this->NM_field_style["asentada"]))
          {
              $Style_asentada .= $this->NM_field_style["asentada"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asentada_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asentada_grid_line'] . $Style_asentada . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_asentada_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idtercero_cuenta()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idtercero_cuenta)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idtercero_cuenta)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idtercero_cuenta', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idtercero_cuenta', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idtercero_cuenta_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idtercero_cuenta_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idtercero_cuenta_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_ie()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off") { 
          $conteudo = trim(sc_strip_script($this->look_ie)); 
          $conteudo_original = trim(sc_strip_script($this->look_ie)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ie', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ie', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_ie_grid_line . "\"  style=\"" . $this->Css_Cmp['css_ie_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_ie_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
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
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'observaciones', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'observaciones', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_observaciones_grid_line . "\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_observaciones_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_abonos()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->abonos)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->abonos)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'abonos', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'abonos', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_abonos_grid_line . "\"  style=\"" . $this->Css_Cmp['css_abonos_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_abonos_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_ultimo_abono()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off") { 
          $conteudo = sc_strip_script($this->ultimo_abono); 
          $conteudo_original = sc_strip_script($this->ultimo_abono); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ultimo_abono', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ultimo_abono', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_ultimo_abono_grid_line . "\"  style=\"" . $this->Css_Cmp['css_ultimo_abono_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_ultimo_abono_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_fecha_uabono()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->fecha_uabono)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fecha_uabono)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fecha_uabono', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_uabono', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fecha_uabono_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fecha_uabono_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_fecha_uabono_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'creado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'creado', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
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
 function NM_grid_editado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->editado)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->editado)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'editado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'editado', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_editado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_editado_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_editado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_automatico()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off") { 
          $conteudo = sc_strip_script($this->automatico); 
          $conteudo_original = sc_strip_script($this->automatico); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'automatico', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'automatico', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_automatico_grid_line . "\"  style=\"" . $this->Css_Cmp['css_automatico_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_automatico_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tipo_tercero()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off") { 
          $conteudo = sc_strip_script($this->tipo_tercero); 
          $conteudo_original = sc_strip_script($this->tipo_tercero); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'tipo_tercero', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tipo_tercero', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_tipo_tercero_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tipo_tercero_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tipo_tercero_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_concepto()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->concepto)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->concepto)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_concepto($conteudo , $this->concepto) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'concepto', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'concepto', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_concepto_grid_line . "\"  style=\"" . $this->Css_Cmp['css_concepto_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_concepto_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 26;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_pdf'] == "pdf")
   {
       $this->NM_colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $this->NM_colspan--; 
       }
   } 
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
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
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['print_navigator'] == "Netscape")
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
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_tercero_TERCERO($tercero) 
 {
   global $tot_tercero;
   $this->sc_proc_quebra_tercero = true; 
   $this->Tot->quebra_tercero_TERCERO($tercero, $this->arg_sum_tercero);
   $conteudo = $tot_tercero[0] ;  
   $this->count_tercero = $tot_tercero[1];
   $this->sum_tercero_valor_total = $tot_tercero[2];
   $this->campos_quebra_tercero = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->tercero)); 
   $this->Lookup->lookup_TERCERO_tercero($conteudo , $this->tercero) ; 
   $this->campos_quebra_tercero[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tercero']))
   {
       $this->campos_quebra_tercero[0]['lab'] = $this->nmgp_label_quebras['tercero']; 
   }
   else
   {
   $this->campos_quebra_tercero[0]['lab'] = "Tercero"; 
   }
   $this->sc_proc_quebra_tercero = false; 
 } 
 function quebra_prefijo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_prefijo = true; 
   $this->Tot->quebra_prefijo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_prefijo = $$Var_name_gb;
   $conteudo = $tot_prefijo[0] ;  
   $this->count_prefijo = $tot_prefijo[1];
   $this->sum_prefijo_valor_total = $tot_prefijo[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->prefijo); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['prefijo']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['prefijo']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "PJ"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_prefijo = false; 
 } 
 function quebra_fecha_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_fecha = true; 
   $this->Tot->quebra_fecha_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_fecha = $$Var_name_gb;
   $conteudo = $tot_fecha[0] ;  
   $this->count_fecha = $tot_fecha[1];
   $this->sum_fecha_valor_total = $tot_fecha[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fecha)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fecha']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['fecha']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Fecha"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_fecha = false; 
 } 
 function quebra_tercero_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_tercero = true; 
   $this->Tot->quebra_tercero_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_tercero = $$Var_name_gb;
   $conteudo = $tot_tercero[0] ;  
   $this->count_tercero = $tot_tercero[1];
   $this->sum_tercero_valor_total = $tot_tercero[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->tercero)); 
   $this->Lookup->lookup_sc_free_group_by_tercero($conteudo , $this->tercero) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tercero']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['tercero']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Tercero"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_tercero = false; 
 } 
 function quebra_tipo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_tipo = true; 
   $this->Tot->quebra_tipo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_tipo = $$Var_name_gb;
   $conteudo = $tot_tipo[0] ;  
   $this->count_tipo = $tot_tipo[1];
   $this->sum_tipo_valor_total = $tot_tipo[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->tipo); 
   $this->Lookup->lookup_sc_free_group_by_tipo($conteudo , $this->tipo) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tipo']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['tipo']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Tipo"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_tipo = false; 
 } 
 function quebra_observaciones_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_observaciones = true; 
   $this->Tot->quebra_observaciones_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_observaciones = $$Var_name_gb;
   $conteudo = $tot_observaciones[0] ;  
   $this->count_observaciones = $tot_observaciones[1];
   $this->sum_observaciones_valor_total = $tot_observaciones[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->observaciones); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['observaciones']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['observaciones']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Observaciones"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_observaciones = false; 
 } 
 function quebra_usuario_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_usuario = true; 
   $this->Tot->quebra_usuario_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_usuario = $$Var_name_gb;
   $conteudo = $tot_usuario[0] ;  
   $this->count_usuario = $tot_usuario[1];
   $this->sum_usuario_valor_total = $tot_usuario[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->usuario); 
   $this->Lookup->lookup_sc_free_group_by_usuario($conteudo , $this->usuario) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['usuario']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['usuario']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Usuario"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_usuario = false; 
 } 
 function quebra_cod_cuenta_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_cod_cuenta = true; 
   $this->Tot->quebra_cod_cuenta_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_cod_cuenta = $$Var_name_gb;
   $conteudo = $tot_cod_cuenta[0] ;  
   $this->count_cod_cuenta = $tot_cod_cuenta[1];
   $this->sum_cod_cuenta_valor_total = $tot_cod_cuenta[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->cod_cuenta); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['cod_cuenta']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['cod_cuenta']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Cuenta"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_cod_cuenta = false; 
 } 
 function quebra_pagada_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_concepto = false;
   $this->sc_proc_quebra_pagada = true; 
   $this->Tot->quebra_pagada_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_pagada = $$Var_name_gb;
   $conteudo = $tot_pagada[0] ;  
   $this->count_pagada = $tot_pagada[1];
   $this->sum_pagada_valor_total = $tot_pagada[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->pagada); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['pagada']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['pagada']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Pagada"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_pagada = false; 
 } 
 function quebra_concepto_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_prefijo = false;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_tipo = false;
   $this->sc_proc_quebra_observaciones = false;
   $this->sc_proc_quebra_usuario = false;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_concepto = true; 
   $this->Tot->quebra_concepto_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_concepto = $$Var_name_gb;
   $conteudo = $tot_concepto[0] ;  
   $this->count_concepto = $tot_concepto[1];
   $this->sum_concepto_valor_total = $tot_concepto[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->concepto)); 
   $this->Lookup->lookup_sc_free_group_by_concepto($conteudo , $this->concepto) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['concepto']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['concepto']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Concepto"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_concepto = false; 
 } 
 function quebra_usuario_USUARIO_ASESOR($usuario) 
 {
   global $tot_usuario;
   $this->sc_proc_quebra_usuario = true; 
   $this->Tot->quebra_usuario_USUARIO_ASESOR($usuario, $this->arg_sum_usuario);
   $conteudo = $tot_usuario[0] ;  
   $this->count_usuario = $tot_usuario[1];
   $this->sum_usuario_valor_total = $tot_usuario[2];
   $this->campos_quebra_usuario = array(); 
   $conteudo = sc_strip_script($this->usuario); 
   $this->Lookup->lookup_USUARIO_ASESOR_usuario($conteudo , $this->usuario) ; 
   $this->campos_quebra_usuario[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['usuario']))
   {
       $this->campos_quebra_usuario[0]['lab'] = $this->nmgp_label_quebras['usuario']; 
   }
   else
   {
   $this->campos_quebra_usuario[0]['lab'] = "Usuario"; 
   }
   $this->sc_proc_quebra_usuario = false; 
 } 
 function quebra_cod_cuenta_cuenta($cod_cuenta) 
 {
   global $tot_cod_cuenta;
   $this->sc_proc_quebra_cod_cuenta = true; 
   $this->Tot->quebra_cod_cuenta_cuenta($cod_cuenta, $this->arg_sum_cod_cuenta);
   $conteudo = $tot_cod_cuenta[0] ;  
   $this->count_cod_cuenta = $tot_cod_cuenta[1];
   $this->sum_cod_cuenta_valor_total = $tot_cod_cuenta[2];
   $this->campos_quebra_cod_cuenta = array(); 
   $conteudo = sc_strip_script($this->cod_cuenta); 
   $this->campos_quebra_cod_cuenta[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['cod_cuenta']))
   {
       $this->campos_quebra_cod_cuenta[0]['lab'] = $this->nmgp_label_quebras['cod_cuenta']; 
   }
   else
   {
   $this->campos_quebra_cod_cuenta[0]['lab'] = "Cuenta"; 
   }
   $this->sc_proc_quebra_cod_cuenta = false; 
 } 
 function quebra_tercero_tercero_cuenta($tercero) 
 {
   global $tot_tercero;
   $this->sc_proc_quebra_cod_cuenta = false;
   $this->sc_proc_quebra_tercero = true; 
   $this->Tot->quebra_tercero_tercero_cuenta($tercero, $this->arg_sum_tercero);
   $conteudo = $tot_tercero[0] ;  
   $this->count_tercero = $tot_tercero[1];
   $this->sum_tercero_valor_total = $tot_tercero[2];
   $this->campos_quebra_tercero = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->tercero)); 
   $this->Lookup->lookup_tercero_cuenta_tercero($conteudo , $this->tercero) ; 
   $this->campos_quebra_tercero[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tercero']))
   {
       $this->campos_quebra_tercero[0]['lab'] = $this->nmgp_label_quebras['tercero']; 
   }
   else
   {
   $this->campos_quebra_tercero[0]['lab'] = "Tercero"; 
   }
   $this->sc_proc_quebra_tercero = false; 
 } 
 function quebra_cod_cuenta_tercero_cuenta($tercero, $cod_cuenta) 
 {
   global $tot_cod_cuenta;
   $this->sc_proc_quebra_tercero = false;
   $this->sc_proc_quebra_cod_cuenta = true; 
   $this->Tot->quebra_cod_cuenta_tercero_cuenta($tercero, $cod_cuenta, $this->arg_sum_tercero, $this->arg_sum_cod_cuenta);
   $conteudo = $tot_cod_cuenta[0] ;  
   $this->count_cod_cuenta = $tot_cod_cuenta[1];
   $this->sum_cod_cuenta_valor_total = $tot_cod_cuenta[2];
   $this->campos_quebra_cod_cuenta = array(); 
   $conteudo = sc_strip_script($this->cod_cuenta); 
   $this->campos_quebra_cod_cuenta[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['cod_cuenta']))
   {
       $this->campos_quebra_cod_cuenta[0]['lab'] = $this->nmgp_label_quebras['cod_cuenta']; 
   }
   else
   {
   $this->campos_quebra_cod_cuenta[0]['lab'] = "Cuenta"; 
   }
   $this->sc_proc_quebra_cod_cuenta = false; 
 } 
 function quebra_fecha_fechaycuenta($fecha) 
 {
   global $tot_fecha;
   $this->sc_proc_quebra_cod_cuenta = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fecha = true; 
   $this->Tot->quebra_fecha_fechaycuenta($fecha, $this->arg_sum_fecha);
   $conteudo = $tot_fecha[0] ;  
   $this->count_fecha = $tot_fecha[1];
   $this->sum_fecha_valor_total = $tot_fecha[2];
   $this->campos_quebra_fecha = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fecha)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('fechaycuenta', 'fecha');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fechaycuenta', 'fecha');
   $TP_Time    = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fecha[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fecha']))
   {
       $this->campos_quebra_fecha[0]['lab'] = $this->nmgp_label_quebras['fecha']; 
   }
   else
   {
   $this->campos_quebra_fecha[0]['lab'] = "Fecha"; 
   }
   $this->sc_proc_quebra_fecha = false; 
 } 
 function quebra_cod_cuenta_fechaycuenta($fecha, $cod_cuenta) 
 {
   global $tot_cod_cuenta;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_cod_cuenta = true; 
   $this->Tot->quebra_cod_cuenta_fechaycuenta($fecha, $cod_cuenta, $this->arg_sum_fecha, $this->arg_sum_cod_cuenta);
   $conteudo = $tot_cod_cuenta[0] ;  
   $this->count_cod_cuenta = $tot_cod_cuenta[1];
   $this->sum_cod_cuenta_valor_total = $tot_cod_cuenta[2];
   $this->campos_quebra_cod_cuenta = array(); 
   $conteudo = sc_strip_script($this->cod_cuenta); 
   $this->campos_quebra_cod_cuenta[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['cod_cuenta']))
   {
       $this->campos_quebra_cod_cuenta[0]['lab'] = $this->nmgp_label_quebras['cod_cuenta']; 
   }
   else
   {
   $this->campos_quebra_cod_cuenta[0]['lab'] = "Cuenta"; 
   }
   $this->sc_proc_quebra_cod_cuenta = false; 
 } 
 function quebra_concepto_concepto($concepto) 
 {
   global $tot_concepto;
   $this->sc_proc_quebra_concepto = true; 
   $this->Tot->quebra_concepto_concepto($concepto, $this->arg_sum_concepto);
   $conteudo = $tot_concepto[0] ;  
   $this->count_concepto = $tot_concepto[1];
   $this->sum_concepto_valor_total = $tot_concepto[2];
   $this->campos_quebra_concepto = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->concepto)); 
   $this->Lookup->lookup_concepto_concepto($conteudo , $this->concepto) ; 
   $this->campos_quebra_concepto[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['concepto']))
   {
       $this->campos_quebra_concepto[0]['lab'] = $this->nmgp_label_quebras['concepto']; 
   }
   else
   {
   $this->campos_quebra_concepto[0]['lab'] = "Concepto"; 
   }
   $this->sc_proc_quebra_concepto = false; 
 } 
 function quebra_tercero_TERCERO_top() 
 { global
          $tercero_ant_desc, 
          $nm_saida, $tot_tercero;
   $this->SC_tab_quebra = 0;
   $tercero_ant_desc = $this->campos_quebra_tercero[0]['cmp'];
   static $cont_quebra_tercero = 0; 
   $cont_quebra_tercero++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_tercero[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_tercero[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_tercero = "<table>"; 
   foreach ($this->campos_quebra_tercero as $cada_campo) 
   { 
       $this->Label_tercero .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_tercero .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_tercero .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_tercero .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_tercero .= "</tr>"; 
   } 
   $this->Label_tercero .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_tercero . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tercero_TERCERO_bot() 
 { global 
          $tercero_ant_desc, 
          $nm_saida, $tot_tercero;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $tercero_ant_desc = $this->campos_quebra_tercero[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_tercero[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_prefijo_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_prefijo = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['prefijo'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_prefijo = 0; 
   $cont_quebra_prefijo++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_prefijo[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_prefijo = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_prefijo .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_prefijo .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_prefijo .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_prefijo .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_prefijo .= "</tr>"; 
   } 
   $this->Label_prefijo .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_prefijo . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_prefijo_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_prefijo = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_prefijo[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_fecha_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_fecha = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['fecha'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_fecha = 0; 
   $cont_quebra_fecha++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_fecha[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_fecha = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_fecha .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_fecha .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_fecha .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_fecha .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_fecha .= "</tr>"; 
   } 
   $this->Label_fecha .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_fecha . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_fecha_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_fecha = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_fecha[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tercero_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_tercero = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['tercero'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_tercero = 0; 
   $cont_quebra_tercero++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H4 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H4></div>";
   }
   $conteudo = $tot_tercero[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_tercero = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_tercero .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_tercero .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_tercero .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_tercero .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_tercero .= "</tr>"; 
   } 
   $this->Label_tercero .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_tercero . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tercero_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_tercero = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_tercero[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tipo_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_tipo = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['tipo'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_tipo = 0; 
   $cont_quebra_tipo++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H5 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H5></div>";
   }
   $conteudo = $tot_tipo[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_tipo = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_tipo .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_tipo .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_tipo .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_tipo .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_tipo .= "</tr>"; 
   } 
   $this->Label_tipo .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_tipo . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tipo_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_tipo = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_tipo[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_observaciones_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_observaciones = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['observaciones'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_observaciones = 0; 
   $cont_quebra_observaciones++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H6 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H6></div>";
   }
   $conteudo = $tot_observaciones[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_observaciones = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_observaciones .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_observaciones .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_observaciones .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_observaciones .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_observaciones .= "</tr>"; 
   } 
   $this->Label_observaciones .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_observaciones . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_observaciones_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_observaciones = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_observaciones[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_usuario_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_usuario = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['usuario'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_usuario = 0; 
   $cont_quebra_usuario++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_usuario[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_usuario = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_usuario .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_usuario .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_usuario .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_usuario .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_usuario .= "</tr>"; 
   } 
   $this->Label_usuario .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_usuario . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_usuario_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_usuario = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_usuario[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_cod_cuenta = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['cod_cuenta'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_cod_cuenta = 0; 
   $cont_quebra_cod_cuenta++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_cod_cuenta[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_cod_cuenta = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_cod_cuenta .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_cod_cuenta .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_cod_cuenta .= "</tr>"; 
   } 
   $this->Label_cod_cuenta .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_cod_cuenta . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_cod_cuenta = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_cod_cuenta[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_pagada_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_pagada = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['pagada'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_pagada = 0; 
   $cont_quebra_pagada++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_pagada[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_pagada = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_pagada .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_pagada .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_pagada .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_pagada .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_pagada .= "</tr>"; 
   } 
   $this->Label_pagada .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_pagada . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_pagada_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_pagada = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_pagada[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_concepto_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_concepto = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['concepto'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_concepto = 0; 
   $cont_quebra_concepto++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_concepto[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_concepto = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_concepto .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_concepto .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_concepto .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_concepto .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_concepto .= "</tr>"; 
   } 
   $this->Label_concepto .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_concepto . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_concepto_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_concepto = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_concepto[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_usuario_USUARIO_ASESOR_top() 
 { global
          $usuario_ant_desc, 
          $nm_saida, $tot_usuario;
   $this->SC_tab_quebra = 0;
   $usuario_ant_desc = $this->campos_quebra_usuario[0]['cmp'];
   static $cont_quebra_usuario = 0; 
   $cont_quebra_usuario++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_usuario[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_usuario[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_usuario = "<table>"; 
   foreach ($this->campos_quebra_usuario as $cada_campo) 
   { 
       $this->Label_usuario .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_usuario .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_usuario .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_usuario .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_usuario .= "</tr>"; 
   } 
   $this->Label_usuario .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_usuario . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_usuario_USUARIO_ASESOR_bot() 
 { global 
          $usuario_ant_desc, 
          $nm_saida, $tot_usuario;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $usuario_ant_desc = $this->campos_quebra_usuario[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_usuario[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_cuenta_top() 
 { global
          $cod_cuenta_ant_desc, 
          $nm_saida, $tot_cod_cuenta;
   $this->SC_tab_quebra = 0;
   $cod_cuenta_ant_desc = $this->campos_quebra_cod_cuenta[0]['cmp'];
   static $cont_quebra_cod_cuenta = 0; 
   $cont_quebra_cod_cuenta++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_cod_cuenta[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_cod_cuenta[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_cod_cuenta = "<table>"; 
   foreach ($this->campos_quebra_cod_cuenta as $cada_campo) 
   { 
       $this->Label_cod_cuenta .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_cod_cuenta .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_cod_cuenta .= "</tr>"; 
   } 
   $this->Label_cod_cuenta .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_cod_cuenta . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_cuenta_bot() 
 { global 
          $cod_cuenta_ant_desc, 
          $nm_saida, $tot_cod_cuenta;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $cod_cuenta_ant_desc = $this->campos_quebra_cod_cuenta[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_cod_cuenta[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tercero_tercero_cuenta_top() 
 { global
          $tercero_ant_desc, 
          $nm_saida, $tot_tercero;
   $this->SC_tab_quebra = 0;
   $tercero_ant_desc = $this->campos_quebra_tercero[0]['cmp'];
   static $cont_quebra_tercero = 0; 
   $cont_quebra_tercero++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_tercero[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_tercero[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_tercero = "<table>"; 
   foreach ($this->campos_quebra_tercero as $cada_campo) 
   { 
       $this->Label_tercero .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_tercero .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_tercero .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_tercero .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_tercero .= "</tr>"; 
   } 
   $this->Label_tercero .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_tercero . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tercero_tercero_cuenta_bot() 
 { global 
          $tercero_ant_desc, 
          $nm_saida, $tot_tercero;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $tercero_ant_desc = $this->campos_quebra_tercero[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_tercero[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_tercero_cuenta_top() 
 { global
          $cod_cuenta_ant_desc, 
          $nm_saida, $tot_cod_cuenta;
   $this->SC_tab_quebra = 10;
   $cod_cuenta_ant_desc = $this->campos_quebra_cod_cuenta[0]['cmp'];
   static $cont_quebra_cod_cuenta = 0; 
   $cont_quebra_cod_cuenta++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_cod_cuenta[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_cod_cuenta[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_cod_cuenta = "<table>"; 
   foreach ($this->campos_quebra_cod_cuenta as $cada_campo) 
   { 
       $this->Label_cod_cuenta .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_cod_cuenta .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_cod_cuenta .= "</tr>"; 
   } 
   $this->Label_cod_cuenta .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_cod_cuenta . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_tercero_cuenta_bot() 
 { global 
          $cod_cuenta_ant_desc, 
          $nm_saida, $tot_cod_cuenta;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $cod_cuenta_ant_desc = $this->campos_quebra_cod_cuenta[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_cod_cuenta[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_fecha_fechaycuenta_top() 
 { global
          $fecha_ant_desc, 
          $nm_saida, $tot_fecha;
   $this->SC_tab_quebra = 0;
   $fecha_ant_desc = $this->campos_quebra_fecha[0]['cmp'];
   static $cont_quebra_fecha = 0; 
   $cont_quebra_fecha++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_fecha[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_fecha[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_fecha = "<table>"; 
   foreach ($this->campos_quebra_fecha as $cada_campo) 
   { 
       $this->Label_fecha .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_fecha .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_fecha .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_fecha .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_fecha .= "</tr>"; 
   } 
   $this->Label_fecha .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_fecha . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_fecha_fechaycuenta_bot() 
 { global 
          $fecha_ant_desc, 
          $nm_saida, $tot_fecha;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $fecha_ant_desc = $this->campos_quebra_fecha[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_fecha[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_fechaycuenta_top() 
 { global
          $cod_cuenta_ant_desc, 
          $nm_saida, $tot_cod_cuenta;
   $this->SC_tab_quebra = 10;
   $cod_cuenta_ant_desc = $this->campos_quebra_cod_cuenta[0]['cmp'];
   static $cont_quebra_cod_cuenta = 0; 
   $cont_quebra_cod_cuenta++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_cod_cuenta[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_cod_cuenta[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_cod_cuenta = "<table>"; 
   foreach ($this->campos_quebra_cod_cuenta as $cada_campo) 
   { 
       $this->Label_cod_cuenta .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_cod_cuenta .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_cod_cuenta .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_cod_cuenta .= "</tr>"; 
   } 
   $this->Label_cod_cuenta .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_cod_cuenta . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_cod_cuenta_fechaycuenta_bot() 
 { global 
          $cod_cuenta_ant_desc, 
          $nm_saida, $tot_cod_cuenta;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $cod_cuenta_ant_desc = $this->campos_quebra_cod_cuenta[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_cod_cuenta[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_concepto_concepto_top() 
 { global
          $concepto_ant_desc, 
          $nm_saida, $tot_concepto;
   $this->SC_tab_quebra = 0;
   $concepto_ant_desc = $this->campos_quebra_concepto[0]['cmp'];
   static $cont_quebra_concepto = 0; 
   $cont_quebra_concepto++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_concepto[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_concepto[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_concepto = "<table>"; 
   foreach ($this->campos_quebra_concepto as $cada_campo) 
   { 
       $this->Label_concepto .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'])
       {
           $this->Label_concepto .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_concepto .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_concepto .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_concepto .= "</tr>"; 
   } 
   $this->Label_concepto .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_concepto . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_concepto_concepto_bot() 
 { global 
          $concepto_ant_desc, 
          $nm_saida, $tot_concepto;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $concepto_ant_desc = $this->campos_quebra_concepto[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_concepto[2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_valor_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_TERCERO_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_TERCERO_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_TERCERO(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_sc_free_group_by_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_sc_free_group_by_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_sc_free_group_by(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_USUARIO_ASESOR_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_USUARIO_ASESOR_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_USUARIO_ASESOR(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_cuenta_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_cuenta_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_cuenta(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_tercero_cuenta_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_tercero_cuenta_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_tercero_cuenta(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_fechaycuenta_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_fechaycuenta_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_fechaycuenta(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral_concepto_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_concepto_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_concepto(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral__NM_SC__top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral__NM_SC__bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral__NM_SC_(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "prefijo" && (!isset($this->NM_cmp_hidden['prefijo']) || $this->NM_cmp_hidden['prefijo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero" && (!isset($this->NM_cmp_hidden['numero']) || $this->NM_cmp_hidden['numero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha" && (!isset($this->NM_cmp_hidden['fecha']) || $this->NM_cmp_hidden['fecha'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tercero" && (!isset($this->NM_cmp_hidden['tercero']) || $this->NM_cmp_hidden['tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo" && (!isset($this->NM_cmp_hidden['tipo']) || $this->NM_cmp_hidden['tipo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numero_documento" && (!isset($this->NM_cmp_hidden['numero_documento']) || $this->NM_cmp_hidden['numero_documento'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "valor_total" && (!isset($this->NM_cmp_hidden['valor_total']) || $this->NM_cmp_hidden['valor_total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_valor_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "saldo" && (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "usuario" && (!isset($this->NM_cmp_hidden['usuario']) || $this->NM_cmp_hidden['usuario'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cod_cuenta" && (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pagada" && (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden['idtercero_cuenta']) || $this->NM_cmp_hidden['idtercero_cuenta'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ie" && (!isset($this->NM_cmp_hidden['ie']) || $this->NM_cmp_hidden['ie'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "abonos" && (!isset($this->NM_cmp_hidden['abonos']) || $this->NM_cmp_hidden['abonos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ultimo_abono" && (!isset($this->NM_cmp_hidden['ultimo_abono']) || $this->NM_cmp_hidden['ultimo_abono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fecha_uabono" && (!isset($this->NM_cmp_hidden['fecha_uabono']) || $this->NM_cmp_hidden['fecha_uabono'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado" && (!isset($this->NM_cmp_hidden['creado']) || $this->NM_cmp_hidden['creado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "editado" && (!isset($this->NM_cmp_hidden['editado']) || $this->NM_cmp_hidden['editado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "automatico" && (!isset($this->NM_cmp_hidden['automatico']) || $this->NM_cmp_hidden['automatico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "tipo_tercero" && (!isset($this->NM_cmp_hidden['tipo_tercero']) || $this->NM_cmp_hidden['tipo_tercero'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "concepto" && (!isset($this->NM_cmp_hidden['concepto']) || $this->NM_cmp_hidden['concepto'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
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
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Groupby_hide']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
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
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=N&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_terceros_cuentas_porpagar&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
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
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"]) && $this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_cuentas_porpagar@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_terceros_cuentas_porpagar'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_terceros_cuentas_porpagar'); return false;;", "sc_b_new_top", "", "Nuevo Documento", "", "absmiddle", "N", "0px", $this->Ini->path_botoes, "", "Nuevo Documento", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'])) {
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
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
              $NM_btn = true;
      }
          if (is_file("grid_terceros_cuentas_porpagar_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_cuentas_porpagar_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('busca', '0', '');", "nm_gp_move('busca', '0', '');", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'];
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
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 1000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"1000\" " . $obj_sel . ">1000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 2000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"2000\" " . $obj_sel . ">2000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == 10000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10000\" " . $obj_sel . ">10000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
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
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['qt_lin_grid'];
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
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
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
          if (is_file("grid_terceros_cuentas_porpagar_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_cuentas_porpagar_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=N&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_terceros_cuentas_porpagar&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
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
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "" . $this->Ini->Nm_lang['lang_btns_settings'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_settings'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_pesq_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
           $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Groupby_hide']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Gb_Free_cmp']))
            { }
            else {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_res_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
                  $NM_Gbtn = true;
            }
          }
        }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
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
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("grid_terceros_cuentas_porpagar_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_cuentas_porpagar_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('busca', '0', '');", "nm_gp_move('busca', '0', '');", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"]) && $this->Ini->sc_lig_md5["form_terceros_cuentas_porpagar"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_cuentas_porpagar@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_terceros_cuentas_porpagar'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_form_terceros_cuentas_porpagar . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_terceros_cuentas_porpagar'); return false;;", "sc_b_new_top", "", "Nuevo Documento", "", "absmiddle", "N", "0px", $this->Ini->path_botoes, "", "Nuevo Documento", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print") 
      {
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("grid_terceros_cuentas_porpagar_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_terceros_cuentas_porpagar_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('prefijo', 'numero', 'cod_cuenta', 'fecha', 'tercero', 'tipo', 'concepto', 'numero_documento', 'observaciones', 'usuario'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
//--- 
//--- 
 function grafico_pdf()
 {
   global $nm_saida, $nm_lang;
   require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
   $this->Graf  = new grid_terceros_cuentas_porpagar_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pivot_charts']);
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       $prim_graf = ($this->Ini->SC_module_export == "chart") ? true : false;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['pivot_charts'] as $chart_index => $chart_data)
       {
           if (!$prim_graf)
           {
                   $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['proc_pdf_vert'])
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
               grid_terceros_cuentas_porpagar_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n", $this->Ini->Nm_lang, true);
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['this_chart_label'] = '';
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
           grid_terceros_cuentas_porpagar_pdf_progress_call(100 . "_#NM#_" . 90 . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['charts_html']}\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['chart_list']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['chart_list'] as $arr_chart)
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
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
   { 
        return;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" &&
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao_print'] != "print" && !$this->Print_All) 
   { 
      $nm_saida->saida("     <tr><td colspan=3  class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\"> \r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_B_grid_terceros_cuentas_porpagar\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_B_grid_terceros_cuentas_porpagar\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
      $nm_saida->saida("     </td></tr> \r\n");
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['embutida'])
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   $nm_saida->saida("  $(window).scroll(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  }).resize(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  });\r\n");
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_terceros_cuentas_porpagar', $(document).innerHeight())\",50);\r\n");
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
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_terceros_cuentas_porpagar\"/>\r\n");
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
   $nm_saida->saida("                     action=\"grid_terceros_cuentas_porpagar_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_terceros_cuentas_porpagar_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['ajax_nav'])
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
   $nm_saida->saida("          par_modal = '?&nmgp_outra_jan=true&nmgp_url_saida=modal&SC_lig_apl_orig=grid_terceros_cuentas_porpagar';\r\n");
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
   $nm_saida->saida("      if (pos == \"A\") {obj = document.getElementById('nmsc_iframe_liga_A_grid_terceros_cuentas_porpagar');} \r\n");
   $nm_saida->saida("      if (pos == \"B\") {obj = document.getElementById('nmsc_iframe_liga_B_grid_terceros_cuentas_porpagar');} \r\n");
   $nm_saida->saida("      if (pos == \"E\") {obj = document.getElementById('nmsc_iframe_liga_E_grid_terceros_cuentas_porpagar');} \r\n");
   $nm_saida->saida("      if (pos == \"D\") {obj = document.getElementById('nmsc_iframe_liga_D_grid_terceros_cuentas_porpagar');} \r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['grid_terceros_cuentas_porpagar_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_terceros_cuentas_porpagar@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("               document.Fprint.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_terceros_cuentas_porpagar/grid_terceros_cuentas_porpagar_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_terceros_cuentas_porpagar_export_ctrl.php\";\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_terceros_cuentas_porpagar']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campo_psq_ret'] . "\");\r\n");
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
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['js_apos_busca'] . "();\r\n");
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
   $nm_saida->saida("      document.F5.action = \"grid_terceros_cuentas_porpagar_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_terceros_cuentas_porpagar')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_terceros_cuentas_porpagar', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
