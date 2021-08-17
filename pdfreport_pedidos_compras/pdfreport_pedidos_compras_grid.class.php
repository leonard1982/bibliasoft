<?php
class pdfreport_pedidos_compras_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $array_municipio = array();
   var $array_detallepedido_fl_colores = array();
   var $array_detallepedido_fl_tallas = array();
   var $array_detallepedido_fl_sabor = array();
   var $documento = array();
   var $telefono = array();
   var $municipio = array();
   var $d_v = array();
   var $detallepedido = array();
   var $detallepedido_unidad = array();
   var $detallepedido_fl_iddet = array();
   var $detallepedido_fl_idpedid = array();
   var $detallepedido_fl_idpro = array();
   var $detallepedido_j_nompro = array();
   var $detallepedido_j_codigobar = array();
   var $detallepedido_fl_unidadmayor = array();
   var $detallepedido_fl_factor = array();
   var $detallepedido_fl_valorunit = array();
   var $detallepedido_fl_valorpar = array();
   var $detallepedido_fl_descuento = array();
   var $detallepedido_fl_idbod = array();
   var $detallepedido_fl_cantidad = array();
   var $detallepedido_fl_iva = array();
   var $detallepedido_fl_adicional = array();
   var $detallepedido_fl_adicional1 = array();
   var $detallepedido_fl_colores = array();
   var $detallepedido_fl_tallas = array();
   var $detallepedido_fl_sabor = array();
   var $idpedido = array();
   var $numfacven = array();
   var $nremision = array();
   var $credito = array();
   var $fechaven = array();
   var $fechavenc = array();
   var $idcli = array();
   var $subtotal = array();
   var $valoriva = array();
   var $total = array();
   var $facturado = array();
   var $asentada = array();
   var $observaciones = array();
   var $saldo = array();
   var $adicional = array();
   var $formapago = array();
   var $adicional2 = array();
   var $adicional3 = array();
   var $obspago = array();
   var $vendedor = array();
   var $dircliente = array();
   var $numpedido = array();
   var $prefijo_ped = array();
   var $logo = array();
   var $look_credito = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = 'Courier';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "LETTER";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_pedidos_compras']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_pedidos_compras", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idpedido[0] = $Busca_temp['idpedido']; 
       $tmp_pos = strpos($this->idpedido[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idpedido[0]))
       {
           $this->idpedido[0] = substr($this->idpedido[0], 0, $tmp_pos);
       }
       $idpedido_2 = $Busca_temp['idpedido_input_2']; 
       $this->idpedido_2 = $Busca_temp['idpedido_input_2']; 
       $this->numfacven[0] = $Busca_temp['numfacven']; 
       $tmp_pos = strpos($this->numfacven[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->numfacven[0]))
       {
           $this->numfacven[0] = substr($this->numfacven[0], 0, $tmp_pos);
       }
       $numfacven_2 = $Busca_temp['numfacven_input_2']; 
       $this->numfacven_2 = $Busca_temp['numfacven_input_2']; 
       $this->nremision[0] = $Busca_temp['nremision']; 
       $tmp_pos = strpos($this->nremision[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->nremision[0]))
       {
           $this->nremision[0] = substr($this->nremision[0], 0, $tmp_pos);
       }
       $nremision_2 = $Busca_temp['nremision_input_2']; 
       $this->nremision_2 = $Busca_temp['nremision_input_2']; 
       $this->credito[0] = $Busca_temp['credito']; 
       $tmp_pos = strpos($this->credito[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->credito[0]))
       {
           $this->credito[0] = substr($this->credito[0], 0, $tmp_pos);
       }
       $credito_2 = $Busca_temp['credito_input_2']; 
       $this->credito_2 = $Busca_temp['credito_input_2']; 
       $this->prefijo_ped[0] = $Busca_temp['prefijo_ped']; 
       $tmp_pos = strpos($this->prefijo_ped[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->prefijo_ped[0]))
       {
           $this->prefijo_ped[0] = substr($this->prefijo_ped[0], 0, $tmp_pos);
       }
       $prefijo_ped_2 = $Busca_temp['prefijo_ped_input_2']; 
       $this->prefijo_ped_2 = $Busca_temp['prefijo_ped_input_2']; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_pedidos_compras']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['par_pedido'])) {$_SESSION['par_pedido'] = "";}
if (!isset($this->sc_temp_par_pedido)) {$this->sc_temp_par_pedido = (isset($_SESSION['par_pedido'])) ? $_SESSION['par_pedido'] : "";}
  $_SESSION['pdfreport_pedidos_compras']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_pedidos_compras']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_pedidos_compras']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_pedidos_compras']['telefono1']=$this->sc_temp_tele;
 
      $nm_select = "select asentada from pedidos where idpedido=$this->sc_temp_par_pedido"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des[$this->nm_grid_colunas] = array();
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
                        $this->des[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des[$this->nm_grid_colunas] = false;
          $this->des_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
if($this->des[$this->nm_grid_colunas][0][0]==0)
	{
	echo 'PEDIDO NO ESTÁ ASENTADO, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_par_pedido)) {$_SESSION['par_pedido'] = $this->sc_temp_par_pedido;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_pedidos_compras']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, convert(char(23),fechaven,121), convert(char(23),fechavenc,121), idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, EXTEND(fechaven, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, LOTOFILE(logo, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idpedido, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, facturado, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, dircliente, numpedido, prefijo_ped, logo from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     facturado,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,     dircliente,     numpedido,     prefijo_ped, (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      pedidos WHERE    idpedido=" . $_SESSION['par_pedido'] . ") nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     $this->Pdf->setCellMargins($left = 0, $top = 0, $right = 0, $bottom = 0);
     $this->Pdf->SetAutoPageBreak(true, 0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__pedido_compra.png", "1", "1", "216", "279", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['idpedido'] = "Idpedido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['numfacven'] = "Numfacven";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['nremision'] = "Nremision";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['credito'] = "Credito";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['fechaven'] = "Fechaven";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['fechavenc'] = "Fechavenc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['idcli'] = "Idcli";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['subtotal'] = "Subtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['valoriva'] = "Valoriva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['facturado'] = "Facturado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['asentada'] = "Asentada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['observaciones'] = "Observaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['saldo'] = "Saldo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['adicional'] = "Adicional";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['formapago'] = "Formapago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['adicional2'] = "Adicional 2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['adicional3'] = "Adicional 3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['obspago'] = "Obspago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['vendedor'] = "Vendedor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['dircliente'] = "Dircliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['numpedido'] = "Numpedido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['prefijo_ped'] = "Prefijo Ped";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['logo'] = "Logo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['documento'] = "documento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['telefono'] = "telefono";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['municipio'] = "municipio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['d_v'] = "d_v";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido'] = "detallepedido";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_unidad'] = "Unidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_iddet'] = "Iddet";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_idpedid'] = "Idpedid";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_idpro'] = "Idpro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_j_nompro'] = "Nompro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_j_codigobar'] = "Codigobar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_unidadmayor'] = "Unidadmayor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_factor'] = "Factor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_valorunit'] = "Valorunit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_valorpar'] = "Valorpar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_descuento'] = "Descuento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_idbod'] = "Idbod";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_iva'] = "Iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_adicional'] = "Adicional";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_adicional1'] = "Adicional 1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_colores'] = "Colores";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_tallas'] = "Tallas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['labels']['detallepedido_fl_sabor'] = "Sabor";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_pedidos_compras']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_pedidos_compras']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idpedido[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idpedido[$this->nm_grid_colunas] = (string)$this->idpedido[$this->nm_grid_colunas];
          $this->numfacven[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->numfacven[$this->nm_grid_colunas] = (string)$this->numfacven[$this->nm_grid_colunas];
          $this->nremision[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->nremision[$this->nm_grid_colunas] = (string)$this->nremision[$this->nm_grid_colunas];
          $this->credito[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->credito[$this->nm_grid_colunas] = (string)$this->credito[$this->nm_grid_colunas];
          $this->fechaven[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->fechavenc[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->idcli[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->idcli[$this->nm_grid_colunas] = (string)$this->idcli[$this->nm_grid_colunas];
          $this->subtotal[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->subtotal[$this->nm_grid_colunas] =  str_replace(",", ".", $this->subtotal[$this->nm_grid_colunas]);
          $this->subtotal[$this->nm_grid_colunas] = (strpos(strtolower($this->subtotal[$this->nm_grid_colunas]), "e")) ? (float)$this->subtotal[$this->nm_grid_colunas] : $this->subtotal[$this->nm_grid_colunas]; 
          $this->subtotal[$this->nm_grid_colunas] = (string)$this->subtotal[$this->nm_grid_colunas];
          $this->valoriva[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->valoriva[$this->nm_grid_colunas] =  str_replace(",", ".", $this->valoriva[$this->nm_grid_colunas]);
          $this->valoriva[$this->nm_grid_colunas] = (strpos(strtolower($this->valoriva[$this->nm_grid_colunas]), "e")) ? (float)$this->valoriva[$this->nm_grid_colunas] : $this->valoriva[$this->nm_grid_colunas]; 
          $this->valoriva[$this->nm_grid_colunas] = (string)$this->valoriva[$this->nm_grid_colunas];
          $this->total[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->total[$this->nm_grid_colunas] =  str_replace(",", ".", $this->total[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = (strpos(strtolower($this->total[$this->nm_grid_colunas]), "e")) ? (float)$this->total[$this->nm_grid_colunas] : $this->total[$this->nm_grid_colunas]; 
          $this->total[$this->nm_grid_colunas] = (string)$this->total[$this->nm_grid_colunas];
          $this->facturado[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->asentada[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->asentada[$this->nm_grid_colunas] = (string)$this->asentada[$this->nm_grid_colunas];
          $this->observaciones[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->saldo[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->saldo[$this->nm_grid_colunas] =  str_replace(",", ".", $this->saldo[$this->nm_grid_colunas]);
          $this->saldo[$this->nm_grid_colunas] = (strpos(strtolower($this->saldo[$this->nm_grid_colunas]), "e")) ? (float)$this->saldo[$this->nm_grid_colunas] : $this->saldo[$this->nm_grid_colunas]; 
          $this->saldo[$this->nm_grid_colunas] = (string)$this->saldo[$this->nm_grid_colunas];
          $this->adicional[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->adicional[$this->nm_grid_colunas] = (string)$this->adicional[$this->nm_grid_colunas];
          $this->formapago[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->adicional2[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->adicional2[$this->nm_grid_colunas] = (string)$this->adicional2[$this->nm_grid_colunas];
          $this->adicional3[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->adicional3[$this->nm_grid_colunas] = (string)$this->adicional3[$this->nm_grid_colunas];
          $this->obspago[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->vendedor[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->vendedor[$this->nm_grid_colunas] = (string)$this->vendedor[$this->nm_grid_colunas];
          $this->dircliente[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->dircliente[$this->nm_grid_colunas] = (string)$this->dircliente[$this->nm_grid_colunas];
          $this->numpedido[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->numpedido[$this->nm_grid_colunas] = (string)$this->numpedido[$this->nm_grid_colunas];
          $this->prefijo_ped[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->prefijo_ped[$this->nm_grid_colunas] = (string)$this->prefijo_ped[$this->nm_grid_colunas];
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       { 
           $this->logo[$this->nm_grid_colunas] = "";  
           if (is_file($this->rs_grid->fields[23])) 
           { 
               $this->logo[$this->nm_grid_colunas] = file_get_contents($this->rs_grid->fields[23]);  
           } 
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
       { 
           $this->logo[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[23]) ;  
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
       { 
           $this->logo[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[23]) ;  
       } 
       else
       { 
           $this->logo[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
       } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              if (!empty($this->logo[$this->nm_grid_colunas]))
              { 
                  $this->logo[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->logo[$this->nm_grid_colunas], false, true, "BLOB");
              }
          }
          $this->detallepedido_unidad[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_iddet[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_idpedid[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_idpro[$this->nm_grid_colunas] = array();
          $this->detallepedido_j_nompro[$this->nm_grid_colunas] = array();
          $this->detallepedido_j_codigobar[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_factor[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_valorunit[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_valorpar[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_descuento[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_idbod[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_cantidad[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_iva[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_adicional[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_adicional1[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_colores[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_tallas[$this->nm_grid_colunas] = array();
          $this->detallepedido_fl_sabor[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detallepedido($this->detallepedido[$this->nm_grid_colunas] , $this->idpedido[$this->nm_grid_colunas], $array_detallepedido); 
          $NM_ind = 0;
          $this->detallepedido = array();
          foreach ($array_detallepedido as $cada_subselect) 
          {
              $this->detallepedido[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detallepedido_fl_iddet[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detallepedido_fl_idpedid[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detallepedido_fl_idpro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detallepedido_j_nompro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detallepedido_j_codigobar[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->detallepedido_fl_factor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->detallepedido_unidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[8];
              $this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[9];
              $this->detallepedido_fl_descuento[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[10];
              $this->detallepedido_fl_idbod[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[11];
              $this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[12];
              $this->detallepedido_fl_iva[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[13];
              $this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[14];
              $this->detallepedido_fl_adicional1[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[15];
              $this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[16];
              $this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[17];
              $this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[18];
              $NM_ind++;
          }
          $this->look_credito[$this->nm_grid_colunas] = $this->credito[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_credito($this->look_credito[$this->nm_grid_colunas]); 
          $this->documento[$this->nm_grid_colunas] = "";
          $this->telefono[$this->nm_grid_colunas] = "";
          $this->municipio[$this->nm_grid_colunas] = "";
          $this->d_v[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_municipio($this->municipio[$this->nm_grid_colunas], $this->municipio[$this->nm_grid_colunas], $this->array_municipio); 
          $_SESSION['scriptcase']['pdfreport_pedidos_compras']['contr_erro'] = 'on';
   
      $nm_select = "select documento, dv, direccion, telefonos_prov, idmuni from terceros where idtercero=" . $this->idcli[$this->nm_grid_colunas]  . " "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds[$this->nm_grid_colunas] = array();
     if ($this->idcli[$this->nm_grid_colunas] !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds[$this->nm_grid_colunas] = false;
          $this->ds_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
     } 
;
if(!empty($this->ds[$this->nm_grid_colunas][0][0]))
   {
	$this->documento[$this->nm_grid_colunas] = $this->ds[$this->nm_grid_colunas][0][0];
	$this->d_v[$this->nm_grid_colunas] ="- ".$this->ds[$this->nm_grid_colunas][0][1];
	$this->dircliente[$this->nm_grid_colunas] =$this->ds[$this->nm_grid_colunas][0][2];
	$this->telefono[$this->nm_grid_colunas] =$this->ds[$this->nm_grid_colunas][0][3];
	$this->municipio[$this->nm_grid_colunas] =$this->ds[$this->nm_grid_colunas][0][4];
	}
$this->el_prefijo();
$_SESSION['scriptcase']['pdfreport_pedidos_compras']['contr_erro'] = 'off';
          $this->idpedido[$this->nm_grid_colunas] = sc_strip_script($this->idpedido[$this->nm_grid_colunas]);
          if ($this->idpedido[$this->nm_grid_colunas] === "") 
          { 
              $this->idpedido[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idpedido[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idpedido[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idpedido[$this->nm_grid_colunas]);
          $this->numfacven[$this->nm_grid_colunas] = sc_strip_script($this->numfacven[$this->nm_grid_colunas]);
          if ($this->numfacven[$this->nm_grid_colunas] === "") 
          { 
              $this->numfacven[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numfacven[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numfacven[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numfacven[$this->nm_grid_colunas]);
          $this->nremision[$this->nm_grid_colunas] = sc_strip_script($this->nremision[$this->nm_grid_colunas]);
          if ($this->nremision[$this->nm_grid_colunas] === "") 
          { 
              $this->nremision[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->nremision[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->nremision[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nremision[$this->nm_grid_colunas]);
          $this->credito[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_credito[$this->nm_grid_colunas])); 
          if ($this->credito[$this->nm_grid_colunas] === "") 
          { 
              $this->credito[$this->nm_grid_colunas] = "" ;  
          } 
          $this->credito[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->credito[$this->nm_grid_colunas]);
          $this->fechaven[$this->nm_grid_colunas] = sc_strip_script($this->fechaven[$this->nm_grid_colunas]);
          if ($this->fechaven[$this->nm_grid_colunas] === "") 
          { 
              $this->fechaven[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fechaven_x =  $this->fechaven[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechaven_x, "YYYY-MM-DD");
               if (is_numeric($fechaven_x) && strlen($fechaven_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechaven[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fechaven[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechaven[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechaven[$this->nm_grid_colunas]);
          $this->fechavenc[$this->nm_grid_colunas] = sc_strip_script($this->fechavenc[$this->nm_grid_colunas]);
          if ($this->fechavenc[$this->nm_grid_colunas] === "") 
          { 
              $this->fechavenc[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fechavenc_x =  $this->fechavenc[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechavenc_x, "YYYY-MM-DD");
               if (is_numeric($fechavenc_x) && strlen($fechavenc_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechavenc[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fechavenc[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechavenc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechavenc[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idcli($this->idcli[$this->nm_grid_colunas] , $this->idcli[$this->nm_grid_colunas]) ; 
          $this->idcli[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcli[$this->nm_grid_colunas]);
          $this->subtotal[$this->nm_grid_colunas] = sc_strip_script($this->subtotal[$this->nm_grid_colunas]);
          if ($this->subtotal[$this->nm_grid_colunas] === "") 
          { 
              $this->subtotal[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subtotal[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->subtotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->subtotal[$this->nm_grid_colunas]);
          $this->valoriva[$this->nm_grid_colunas] = sc_strip_script($this->valoriva[$this->nm_grid_colunas]);
          if ($this->valoriva[$this->nm_grid_colunas] === "") 
          { 
              $this->valoriva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->valoriva[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->valoriva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoriva[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = sc_strip_script($this->total[$this->nm_grid_colunas]);
          if ($this->total[$this->nm_grid_colunas] === "") 
          { 
              $this->total[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->total[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->total[$this->nm_grid_colunas]);
          $this->facturado[$this->nm_grid_colunas] = sc_strip_script($this->facturado[$this->nm_grid_colunas]);
          if ($this->facturado[$this->nm_grid_colunas] === "") 
          { 
              $this->facturado[$this->nm_grid_colunas] = "" ;  
          } 
          $this->facturado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->facturado[$this->nm_grid_colunas]);
          $this->asentada[$this->nm_grid_colunas] = sc_strip_script($this->asentada[$this->nm_grid_colunas]);
          if ($this->asentada[$this->nm_grid_colunas] === "") 
          { 
              $this->asentada[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->asentada[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->asentada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->asentada[$this->nm_grid_colunas]);
          $this->observaciones[$this->nm_grid_colunas] = sc_strip_script($this->observaciones[$this->nm_grid_colunas]);
          if ($this->observaciones[$this->nm_grid_colunas] === "") 
          { 
              $this->observaciones[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->observaciones[$this->nm_grid_colunas] !== "")
          { 
              $this->observaciones[$this->nm_grid_colunas] = nl2br($this->observaciones[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->observaciones[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->observaciones[$this->nm_grid_colunas]); 
              } 
              $this->observaciones[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->observaciones[$this->nm_grid_colunas])) 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 50) 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 50, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->observaciones[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->observaciones[$this->nm_grid_colunas]);
          $this->saldo[$this->nm_grid_colunas] = sc_strip_script($this->saldo[$this->nm_grid_colunas]);
          if ($this->saldo[$this->nm_grid_colunas] === "") 
          { 
              $this->saldo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->saldo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->saldo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->saldo[$this->nm_grid_colunas]);
          $this->adicional[$this->nm_grid_colunas] = sc_strip_script($this->adicional[$this->nm_grid_colunas]);
          if ($this->adicional[$this->nm_grid_colunas] === "") 
          { 
              $this->adicional[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->adicional[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->adicional[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->adicional[$this->nm_grid_colunas]);
          $this->formapago[$this->nm_grid_colunas] = sc_strip_script($this->formapago[$this->nm_grid_colunas]);
          if ($this->formapago[$this->nm_grid_colunas] === "") 
          { 
              $this->formapago[$this->nm_grid_colunas] = "" ;  
          } 
          $this->formapago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->formapago[$this->nm_grid_colunas]);
          $this->adicional2[$this->nm_grid_colunas] = sc_strip_script($this->adicional2[$this->nm_grid_colunas]);
          if ($this->adicional2[$this->nm_grid_colunas] === "") 
          { 
              $this->adicional2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->adicional2[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->adicional2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->adicional2[$this->nm_grid_colunas]);
          $this->adicional3[$this->nm_grid_colunas] = sc_strip_script($this->adicional3[$this->nm_grid_colunas]);
          if ($this->adicional3[$this->nm_grid_colunas] === "") 
          { 
              $this->adicional3[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->adicional3[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->adicional3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->adicional3[$this->nm_grid_colunas]);
          $this->obspago[$this->nm_grid_colunas] = sc_strip_script($this->obspago[$this->nm_grid_colunas]);
          if ($this->obspago[$this->nm_grid_colunas] === "") 
          { 
              $this->obspago[$this->nm_grid_colunas] = "" ;  
          } 
          $this->obspago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->obspago[$this->nm_grid_colunas]);
          $this->Lookup->lookup_vendedor($this->vendedor[$this->nm_grid_colunas] , $this->vendedor[$this->nm_grid_colunas]) ; 
          $this->vendedor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->vendedor[$this->nm_grid_colunas]);
          $this->dircliente[$this->nm_grid_colunas] = sc_strip_script($this->dircliente[$this->nm_grid_colunas]);
          if ($this->dircliente[$this->nm_grid_colunas] === "") 
          { 
              $this->dircliente[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->dircliente[$this->nm_grid_colunas] !== "") 
          { 
              $this->dircliente[$this->nm_grid_colunas] = sc_strtoupper($this->dircliente[$this->nm_grid_colunas]); 
          } 
          $this->dircliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dircliente[$this->nm_grid_colunas]);
          $this->numpedido[$this->nm_grid_colunas] = sc_strip_script($this->numpedido[$this->nm_grid_colunas]);
          if ($this->numpedido[$this->nm_grid_colunas] === "") 
          { 
              $this->numpedido[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numpedido[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numpedido[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numpedido[$this->nm_grid_colunas]);
          $this->Lookup->lookup_prefijo_ped($this->prefijo_ped[$this->nm_grid_colunas] , $this->prefijo_ped[$this->nm_grid_colunas]) ; 
          $this->prefijo_ped[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->prefijo_ped[$this->nm_grid_colunas]);
          $this->logo[$this->nm_grid_colunas] = $this->logo[$this->nm_grid_colunas]; 
          if (empty($this->logo[$this->nm_grid_colunas]) || $this->logo[$this->nm_grid_colunas] == "none" || $this->logo[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->logo[$this->nm_grid_colunas] = "" ;  
              $out_logo = "" ; 
          } 
          else   
          { 
              $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".jpg";   
              $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
              $_SESSION['scriptcase']['sc_num_img']++ ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
              { 
                  $nm_tmp = nm_conv_img_access(substr($this->logo[$this->nm_grid_colunas], 0, 12));
                  if (substr($nm_tmp, 0, 4) == "*nm*") 
                  { 
                      $this->logo[$this->nm_grid_colunas] = nm_conv_img_access($this->logo[$this->nm_grid_colunas]);
                  } 
              } 
              if (substr($this->logo[$this->nm_grid_colunas], 0, 4) == "*nm*") 
              { 
                  $this->logo[$this->nm_grid_colunas] = substr($this->logo[$this->nm_grid_colunas], 4) ; 
                  $this->logo[$this->nm_grid_colunas] = base64_decode($this->logo[$this->nm_grid_colunas]) ; 
              } 
              $img_pos_bm = strpos($this->logo[$this->nm_grid_colunas], "BM") ; 
              if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
              { 
                  $this->logo[$this->nm_grid_colunas] = substr($this->logo[$this->nm_grid_colunas], $img_pos_bm) ; 
              } 
              fwrite($arq_logo, $this->logo[$this->nm_grid_colunas]) ;  
              fclose($arq_logo) ;  
              $SC_tp_img = $this->SC_type_img($this->Ini->root . $out_logo);
              if ($SC_tp_img != ".jpg") 
              { 
                  $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . $SC_tp_img ;   
                  $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
                  fwrite($arq_logo, $this->logo[$this->nm_grid_colunas]) ;  
                  fclose($arq_logo) ;  
              }
              $this->logo[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_logo; 
          } 
          if ($this->documento[$this->nm_grid_colunas] === "") 
          { 
              $this->documento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->documento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->documento[$this->nm_grid_colunas]);
          if ($this->telefono[$this->nm_grid_colunas] === "") 
          { 
              $this->telefono[$this->nm_grid_colunas] = "" ;  
          } 
          $this->telefono[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->telefono[$this->nm_grid_colunas]);
          $this->Lookup->lookup_municipio($this->municipio[$this->nm_grid_colunas], $this->municipio[$this->nm_grid_colunas], $this->array_municipio); 
          $this->municipio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->municipio[$this->nm_grid_colunas]);
          if ($this->d_v[$this->nm_grid_colunas] === "") 
          { 
              $this->d_v[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->d_v[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->d_v[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->d_v[$this->nm_grid_colunas]);
          foreach ($this->detallepedido_unidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_unidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_unidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detallepedido_unidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_unidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_iddet[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_iddet[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_iddet[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_iddet[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_iddet[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_iddet[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_idpedid[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_idpedid[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_idpedid[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_idpedid[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_idpedid[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_idpedid[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_idpro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_idpro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_idpro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_idpro[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_idpro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_idpro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_j_nompro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_j_nompro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_j_nompro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detallepedido_j_nompro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_j_nompro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_j_codigobar[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_j_codigobar[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_j_codigobar[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detallepedido_j_codigobar[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_j_codigobar[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_factor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_factor[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_factor[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_factor[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_factor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_factor[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_valorunit[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_valorpar[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_descuento[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_descuento[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_descuento[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_descuento[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_descuento[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_descuento[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_idbod[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_idbod[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_idbod[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_idbod[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_idbod[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_idbod[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_cantidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_iva[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_iva[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_iva[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_iva[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_iva[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_iva[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_adicional[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_adicional1[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepedido_fl_adicional1[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepedido_fl_adicional1[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepedido_fl_adicional1[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepedido_fl_adicional1[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_adicional1[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_colores[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detallepedido_fl_colores($this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind] , $this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind], $array_detallepedido_fl_colores) ; 
              $this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_tallas[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detallepedido_fl_tallas($this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind] , $this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind], $array_detallepedido_fl_tallas) ; 
              $this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepedido_fl_sabor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detallepedido_fl_sabor($this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind] , $this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind], $array_detallepedido_fl_sabor) ; 
              $this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_credito = array('posx' => 165, 'posy' => 72, 'data' => $this->credito[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fechaven = array('posx' => 28, 'posy' => 72, 'data' => $this->fechaven[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fechavenc = array('posx' => 105, 'posy' => 72, 'data' => $this->fechavenc[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idcli = array('posx' => 10, 'posy' => 52, 'data' => $this->idcli[$this->nm_grid_colunas], 'width'      => 140, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_documento = array('posx' => 170, 'posy' => 52, 'data' => $this->documento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_d_v = array('posx' => 195, 'posy' => 52, 'data' => $this->d_v[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dircliente = array('posx' => 10, 'posy' => 59, 'data' => $this->dircliente[$this->nm_grid_colunas], 'width'      => 140, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_municipio = array('posx' => 155, 'posy' => 65, 'data' => $this->municipio[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_telefono = array('posx' => 28, 'posy' => 65, 'data' => $this->telefono[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subtotal = array('posx' => 5, 'posy' => 227, 'data' => $this->subtotal[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_valoriva = array('posx' => 5, 'posy' => 234, 'data' => $this->valoriva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_total = array('posx' => 5, 'posy' => 241, 'data' => $this->total[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_observaciones = array('posx' => 10, 'posy' => 233, 'data' => $this->observaciones[$this->nm_grid_colunas], 'width'      => 140, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_adicional = array('posx' => 37, 'posy' => 263, 'data' => $this->adicional[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_et_descuento = array('posx' => 10, 'posy' => 262, 'data' => $this->SC_conv_utf8('Descuento: $'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_obspago = array('posx' => 10, 'posy' => 190, 'data' => $this->obspago[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_vendedor = array('posx' => 120, 'posy' => 263, 'data' => $this->vendedor[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_eti_vendedor = array('posx' => 103, 'posy' => 263, 'data' => $this->SC_conv_utf8('Vendedor:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numpedido = array('posx' => 170, 'posy' => 12, 'data' => $this->numpedido[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 16, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_prefijo_ped = array('posx' => 170, 'posy' => 5, 'data' => $this->prefijo_ped[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Courier', 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tipo = array('posx' => 170, 'posy' => 20, 'data' => $this->SC_conv_utf8('TIPO DOCUMENTO'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_tipodoc = array('posx' => 170, 'posy' => 25, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_pedidos_compras']['tipodocu'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_LOGO = array('posx' => 10, 'posy' => 10, 'data' => $this->logo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ELNIT = array('posx' => 55, 'posy' => 7, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_pedidos_compras']['nit'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_LADIRECCION = array('posx' => 55, 'posy' => 12, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_pedidos_compras']['direccion1'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ELTEL = array('posx' => 55, 'posy' => 17, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_pedidos_compras']['telefono1'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_j_nompro = array('posx' => 42, 'posy' => 85, 'data' => $this->detallepedido_j_nompro[$this->nm_grid_colunas], 'width'      => 40, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_cantidad = array('posx' => 142, 'posy' => 85, 'data' => $this->detallepedido_fl_cantidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_adicional = array('posx' => 132, 'posy' => 85, 'data' => $this->detallepedido_fl_adicional[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_j_codigobar = array('posx' => 10, 'posy' => 185, 'data' => $this->detallepedido_j_codigobar[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_T_IVA = array('posx' => 130, 'posy' => 78.5, 'data' => $this->SC_conv_utf8('T. IVA'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_colores = array('posx' => 92, 'posy' => 85, 'data' => $this->detallepedido_fl_colores[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_tallas = array('posx' => 110, 'posy' => 85, 'data' => $this->detallepedido_fl_tallas[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_sabor = array('posx' => 125, 'posy' => 85, 'data' => $this->detallepedido_fl_sabor[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_valorunit = array('posx' => 155, 'posy' => 85, 'data' => $this->detallepedido_fl_valorunit[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepedido_fl_valorpar = array('posx' => 10, 'posy' => 85, 'data' => $this->detallepedido_fl_valorpar[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_credito['font_type'], $cell_credito['font_style'], $cell_credito['font_size']);
            $this->pdf_text_color($cell_credito['data'], $cell_credito['color_r'], $cell_credito['color_g'], $cell_credito['color_b']);
            if (!empty($cell_credito['posx']) && !empty($cell_credito['posy']))
            {
                $this->Pdf->SetXY($cell_credito['posx'], $cell_credito['posy']);
            }
            elseif (!empty($cell_credito['posx']))
            {
                $this->Pdf->SetX($cell_credito['posx']);
            }
            elseif (!empty($cell_credito['posy']))
            {
                $this->Pdf->SetY($cell_credito['posy']);
            }
            $this->Pdf->Cell($cell_credito['width'], 0, $cell_credito['data'], 0, 0, $cell_credito['align']);

            $this->Pdf->SetFont($cell_fechaven['font_type'], $cell_fechaven['font_style'], $cell_fechaven['font_size']);
            $this->pdf_text_color($cell_fechaven['data'], $cell_fechaven['color_r'], $cell_fechaven['color_g'], $cell_fechaven['color_b']);
            if (!empty($cell_fechaven['posx']) && !empty($cell_fechaven['posy']))
            {
                $this->Pdf->SetXY($cell_fechaven['posx'], $cell_fechaven['posy']);
            }
            elseif (!empty($cell_fechaven['posx']))
            {
                $this->Pdf->SetX($cell_fechaven['posx']);
            }
            elseif (!empty($cell_fechaven['posy']))
            {
                $this->Pdf->SetY($cell_fechaven['posy']);
            }
            $this->Pdf->Cell($cell_fechaven['width'], 0, $cell_fechaven['data'], 0, 0, $cell_fechaven['align']);

            $this->Pdf->SetFont($cell_fechavenc['font_type'], $cell_fechavenc['font_style'], $cell_fechavenc['font_size']);
            $this->pdf_text_color($cell_fechavenc['data'], $cell_fechavenc['color_r'], $cell_fechavenc['color_g'], $cell_fechavenc['color_b']);
            if (!empty($cell_fechavenc['posx']) && !empty($cell_fechavenc['posy']))
            {
                $this->Pdf->SetXY($cell_fechavenc['posx'], $cell_fechavenc['posy']);
            }
            elseif (!empty($cell_fechavenc['posx']))
            {
                $this->Pdf->SetX($cell_fechavenc['posx']);
            }
            elseif (!empty($cell_fechavenc['posy']))
            {
                $this->Pdf->SetY($cell_fechavenc['posy']);
            }
            $this->Pdf->Cell($cell_fechavenc['width'], 0, $cell_fechavenc['data'], 0, 0, $cell_fechavenc['align']);

            $this->Pdf->SetFont($cell_idcli['font_type'], $cell_idcli['font_style'], $cell_idcli['font_size']);
            $this->pdf_text_color($cell_idcli['data'], $cell_idcli['color_r'], $cell_idcli['color_g'], $cell_idcli['color_b']);
            if (!empty($cell_idcli['posx']) && !empty($cell_idcli['posy']))
            {
                $this->Pdf->SetXY($cell_idcli['posx'], $cell_idcli['posy']);
            }
            elseif (!empty($cell_idcli['posx']))
            {
                $this->Pdf->SetX($cell_idcli['posx']);
            }
            elseif (!empty($cell_idcli['posy']))
            {
                $this->Pdf->SetY($cell_idcli['posy']);
            }
            $this->Pdf->Cell($cell_idcli['width'], 0, $cell_idcli['data'], 0, 0, $cell_idcli['align']);

            $this->Pdf->SetFont($cell_documento['font_type'], $cell_documento['font_style'], $cell_documento['font_size']);
            $this->pdf_text_color($cell_documento['data'], $cell_documento['color_r'], $cell_documento['color_g'], $cell_documento['color_b']);
            if (!empty($cell_documento['posx']) && !empty($cell_documento['posy']))
            {
                $this->Pdf->SetXY($cell_documento['posx'], $cell_documento['posy']);
            }
            elseif (!empty($cell_documento['posx']))
            {
                $this->Pdf->SetX($cell_documento['posx']);
            }
            elseif (!empty($cell_documento['posy']))
            {
                $this->Pdf->SetY($cell_documento['posy']);
            }
            $this->Pdf->Cell($cell_documento['width'], 0, $cell_documento['data'], 0, 0, $cell_documento['align']);

            $this->Pdf->SetFont($cell_d_v['font_type'], $cell_d_v['font_style'], $cell_d_v['font_size']);
            $this->pdf_text_color($cell_d_v['data'], $cell_d_v['color_r'], $cell_d_v['color_g'], $cell_d_v['color_b']);
            if (!empty($cell_d_v['posx']) && !empty($cell_d_v['posy']))
            {
                $this->Pdf->SetXY($cell_d_v['posx'], $cell_d_v['posy']);
            }
            elseif (!empty($cell_d_v['posx']))
            {
                $this->Pdf->SetX($cell_d_v['posx']);
            }
            elseif (!empty($cell_d_v['posy']))
            {
                $this->Pdf->SetY($cell_d_v['posy']);
            }
            $this->Pdf->Cell($cell_d_v['width'], 0, $cell_d_v['data'], 0, 0, $cell_d_v['align']);

            $this->Pdf->SetFont($cell_dircliente['font_type'], $cell_dircliente['font_style'], $cell_dircliente['font_size']);
            $this->pdf_text_color($cell_dircliente['data'], $cell_dircliente['color_r'], $cell_dircliente['color_g'], $cell_dircliente['color_b']);
            if (!empty($cell_dircliente['posx']) && !empty($cell_dircliente['posy']))
            {
                $this->Pdf->SetXY($cell_dircliente['posx'], $cell_dircliente['posy']);
            }
            elseif (!empty($cell_dircliente['posx']))
            {
                $this->Pdf->SetX($cell_dircliente['posx']);
            }
            elseif (!empty($cell_dircliente['posy']))
            {
                $this->Pdf->SetY($cell_dircliente['posy']);
            }
            $this->Pdf->Cell($cell_dircliente['width'], 0, $cell_dircliente['data'], 0, 0, $cell_dircliente['align']);

            $this->Pdf->SetFont($cell_municipio['font_type'], $cell_municipio['font_style'], $cell_municipio['font_size']);
            $this->pdf_text_color($cell_municipio['data'], $cell_municipio['color_r'], $cell_municipio['color_g'], $cell_municipio['color_b']);
            if (!empty($cell_municipio['posx']) && !empty($cell_municipio['posy']))
            {
                $this->Pdf->SetXY($cell_municipio['posx'], $cell_municipio['posy']);
            }
            elseif (!empty($cell_municipio['posx']))
            {
                $this->Pdf->SetX($cell_municipio['posx']);
            }
            elseif (!empty($cell_municipio['posy']))
            {
                $this->Pdf->SetY($cell_municipio['posy']);
            }
            $this->Pdf->Cell($cell_municipio['width'], 0, $cell_municipio['data'], 0, 0, $cell_municipio['align']);

            $this->Pdf->SetFont($cell_telefono['font_type'], $cell_telefono['font_style'], $cell_telefono['font_size']);
            $this->pdf_text_color($cell_telefono['data'], $cell_telefono['color_r'], $cell_telefono['color_g'], $cell_telefono['color_b']);
            if (!empty($cell_telefono['posx']) && !empty($cell_telefono['posy']))
            {
                $this->Pdf->SetXY($cell_telefono['posx'], $cell_telefono['posy']);
            }
            elseif (!empty($cell_telefono['posx']))
            {
                $this->Pdf->SetX($cell_telefono['posx']);
            }
            elseif (!empty($cell_telefono['posy']))
            {
                $this->Pdf->SetY($cell_telefono['posy']);
            }
            $this->Pdf->Cell($cell_telefono['width'], 0, $cell_telefono['data'], 0, 0, $cell_telefono['align']);

            $this->Pdf->SetFont($cell_subtotal['font_type'], $cell_subtotal['font_style'], $cell_subtotal['font_size']);
            $this->pdf_text_color($cell_subtotal['data'], $cell_subtotal['color_r'], $cell_subtotal['color_g'], $cell_subtotal['color_b']);
            if (!empty($cell_subtotal['posx']) && !empty($cell_subtotal['posy']))
            {
                $this->Pdf->SetXY($cell_subtotal['posx'], $cell_subtotal['posy']);
            }
            elseif (!empty($cell_subtotal['posx']))
            {
                $this->Pdf->SetX($cell_subtotal['posx']);
            }
            elseif (!empty($cell_subtotal['posy']))
            {
                $this->Pdf->SetY($cell_subtotal['posy']);
            }
            $this->Pdf->Cell($cell_subtotal['width'], 0, $cell_subtotal['data'], 0, 0, $cell_subtotal['align']);

            $this->Pdf->SetFont($cell_valoriva['font_type'], $cell_valoriva['font_style'], $cell_valoriva['font_size']);
            $this->pdf_text_color($cell_valoriva['data'], $cell_valoriva['color_r'], $cell_valoriva['color_g'], $cell_valoriva['color_b']);
            if (!empty($cell_valoriva['posx']) && !empty($cell_valoriva['posy']))
            {
                $this->Pdf->SetXY($cell_valoriva['posx'], $cell_valoriva['posy']);
            }
            elseif (!empty($cell_valoriva['posx']))
            {
                $this->Pdf->SetX($cell_valoriva['posx']);
            }
            elseif (!empty($cell_valoriva['posy']))
            {
                $this->Pdf->SetY($cell_valoriva['posy']);
            }
            $this->Pdf->Cell($cell_valoriva['width'], 0, $cell_valoriva['data'], 0, 0, $cell_valoriva['align']);

            $this->Pdf->SetFont($cell_total['font_type'], $cell_total['font_style'], $cell_total['font_size']);
            $this->pdf_text_color($cell_total['data'], $cell_total['color_r'], $cell_total['color_g'], $cell_total['color_b']);
            if (!empty($cell_total['posx']) && !empty($cell_total['posy']))
            {
                $this->Pdf->SetXY($cell_total['posx'], $cell_total['posy']);
            }
            elseif (!empty($cell_total['posx']))
            {
                $this->Pdf->SetX($cell_total['posx']);
            }
            elseif (!empty($cell_total['posy']))
            {
                $this->Pdf->SetY($cell_total['posy']);
            }
            $this->Pdf->Cell($cell_total['width'], 0, $cell_total['data'], 0, 0, $cell_total['align']);

            $this->Pdf->SetFont($cell_observaciones['font_type'], $cell_observaciones['font_style'], $cell_observaciones['font_size']);
            $this->Pdf->SetTextColor($cell_observaciones['color_r'], $cell_observaciones['color_g'], $cell_observaciones['color_b']);
            if (!empty($cell_observaciones['posx']) && !empty($cell_observaciones['posy']))
            {
                $this->Pdf->SetXY($cell_observaciones['posx'], $cell_observaciones['posy']);
            }
            elseif (!empty($cell_observaciones['posx']))
            {
                $this->Pdf->SetX($cell_observaciones['posx']);
            }
            elseif (!empty($cell_observaciones['posy']))
            {
                $this->Pdf->SetY($cell_observaciones['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_observaciones['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(3.8805555555556);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_observaciones['width'], 0, trim($Lines), 0, 0, $cell_observaciones['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cell_adicional['font_type'], $cell_adicional['font_style'], $cell_adicional['font_size']);
            $this->pdf_text_color($cell_adicional['data'], $cell_adicional['color_r'], $cell_adicional['color_g'], $cell_adicional['color_b']);
            if (!empty($cell_adicional['posx']) && !empty($cell_adicional['posy']))
            {
                $this->Pdf->SetXY($cell_adicional['posx'], $cell_adicional['posy']);
            }
            elseif (!empty($cell_adicional['posx']))
            {
                $this->Pdf->SetX($cell_adicional['posx']);
            }
            elseif (!empty($cell_adicional['posy']))
            {
                $this->Pdf->SetY($cell_adicional['posy']);
            }
            $this->Pdf->Cell($cell_adicional['width'], 0, $cell_adicional['data'], 0, 0, $cell_adicional['align']);

            $this->Pdf->SetFont($cell_et_descuento['font_type'], $cell_et_descuento['font_style'], $cell_et_descuento['font_size']);
            $this->pdf_text_color($cell_et_descuento['data'], $cell_et_descuento['color_r'], $cell_et_descuento['color_g'], $cell_et_descuento['color_b']);
            if (!empty($cell_et_descuento['posx']) && !empty($cell_et_descuento['posy']))
            {
                $this->Pdf->SetXY($cell_et_descuento['posx'], $cell_et_descuento['posy']);
            }
            elseif (!empty($cell_et_descuento['posx']))
            {
                $this->Pdf->SetX($cell_et_descuento['posx']);
            }
            elseif (!empty($cell_et_descuento['posy']))
            {
                $this->Pdf->SetY($cell_et_descuento['posy']);
            }
            $this->Pdf->Cell($cell_et_descuento['width'], 0, $cell_et_descuento['data'], 0, 0, $cell_et_descuento['align']);

            $this->Pdf->SetFont($cell_obspago['font_type'], $cell_obspago['font_style'], $cell_obspago['font_size']);
            $this->pdf_text_color($cell_obspago['data'], $cell_obspago['color_r'], $cell_obspago['color_g'], $cell_obspago['color_b']);
            if (!empty($cell_obspago['posx']) && !empty($cell_obspago['posy']))
            {
                $this->Pdf->SetXY($cell_obspago['posx'], $cell_obspago['posy']);
            }
            elseif (!empty($cell_obspago['posx']))
            {
                $this->Pdf->SetX($cell_obspago['posx']);
            }
            elseif (!empty($cell_obspago['posy']))
            {
                $this->Pdf->SetY($cell_obspago['posy']);
            }
            $this->Pdf->Cell($cell_obspago['width'], 0, $cell_obspago['data'], 0, 0, $cell_obspago['align']);

            $this->Pdf->SetFont($cell_vendedor['font_type'], $cell_vendedor['font_style'], $cell_vendedor['font_size']);
            $this->pdf_text_color($cell_vendedor['data'], $cell_vendedor['color_r'], $cell_vendedor['color_g'], $cell_vendedor['color_b']);
            if (!empty($cell_vendedor['posx']) && !empty($cell_vendedor['posy']))
            {
                $this->Pdf->SetXY($cell_vendedor['posx'], $cell_vendedor['posy']);
            }
            elseif (!empty($cell_vendedor['posx']))
            {
                $this->Pdf->SetX($cell_vendedor['posx']);
            }
            elseif (!empty($cell_vendedor['posy']))
            {
                $this->Pdf->SetY($cell_vendedor['posy']);
            }
            $this->Pdf->Cell($cell_vendedor['width'], 0, $cell_vendedor['data'], 0, 0, $cell_vendedor['align']);

            $this->Pdf->SetFont($cell_eti_vendedor['font_type'], $cell_eti_vendedor['font_style'], $cell_eti_vendedor['font_size']);
            $this->pdf_text_color($cell_eti_vendedor['data'], $cell_eti_vendedor['color_r'], $cell_eti_vendedor['color_g'], $cell_eti_vendedor['color_b']);
            if (!empty($cell_eti_vendedor['posx']) && !empty($cell_eti_vendedor['posy']))
            {
                $this->Pdf->SetXY($cell_eti_vendedor['posx'], $cell_eti_vendedor['posy']);
            }
            elseif (!empty($cell_eti_vendedor['posx']))
            {
                $this->Pdf->SetX($cell_eti_vendedor['posx']);
            }
            elseif (!empty($cell_eti_vendedor['posy']))
            {
                $this->Pdf->SetY($cell_eti_vendedor['posy']);
            }
            $this->Pdf->Cell($cell_eti_vendedor['width'], 0, $cell_eti_vendedor['data'], 0, 0, $cell_eti_vendedor['align']);

            $this->Pdf->SetFont($cell_numpedido['font_type'], $cell_numpedido['font_style'], $cell_numpedido['font_size']);
            $this->pdf_text_color($cell_numpedido['data'], $cell_numpedido['color_r'], $cell_numpedido['color_g'], $cell_numpedido['color_b']);
            if (!empty($cell_numpedido['posx']) && !empty($cell_numpedido['posy']))
            {
                $this->Pdf->SetXY($cell_numpedido['posx'], $cell_numpedido['posy']);
            }
            elseif (!empty($cell_numpedido['posx']))
            {
                $this->Pdf->SetX($cell_numpedido['posx']);
            }
            elseif (!empty($cell_numpedido['posy']))
            {
                $this->Pdf->SetY($cell_numpedido['posy']);
            }
            $this->Pdf->Cell($cell_numpedido['width'], 0, $cell_numpedido['data'], 0, 0, $cell_numpedido['align']);

            $this->Pdf->SetFont($cell_prefijo_ped['font_type'], $cell_prefijo_ped['font_style'], $cell_prefijo_ped['font_size']);
            $this->pdf_text_color($cell_prefijo_ped['data'], $cell_prefijo_ped['color_r'], $cell_prefijo_ped['color_g'], $cell_prefijo_ped['color_b']);
            if (!empty($cell_prefijo_ped['posx']) && !empty($cell_prefijo_ped['posy']))
            {
                $this->Pdf->SetXY($cell_prefijo_ped['posx'], $cell_prefijo_ped['posy']);
            }
            elseif (!empty($cell_prefijo_ped['posx']))
            {
                $this->Pdf->SetX($cell_prefijo_ped['posx']);
            }
            elseif (!empty($cell_prefijo_ped['posy']))
            {
                $this->Pdf->SetY($cell_prefijo_ped['posy']);
            }
            $this->Pdf->Cell($cell_prefijo_ped['width'], 0, $cell_prefijo_ped['data'], 0, 0, $cell_prefijo_ped['align']);

            $this->Pdf->SetFont($cell_tipo['font_type'], $cell_tipo['font_style'], $cell_tipo['font_size']);
            $this->pdf_text_color($cell_tipo['data'], $cell_tipo['color_r'], $cell_tipo['color_g'], $cell_tipo['color_b']);
            if (!empty($cell_tipo['posx']) && !empty($cell_tipo['posy']))
            {
                $this->Pdf->SetXY($cell_tipo['posx'], $cell_tipo['posy']);
            }
            elseif (!empty($cell_tipo['posx']))
            {
                $this->Pdf->SetX($cell_tipo['posx']);
            }
            elseif (!empty($cell_tipo['posy']))
            {
                $this->Pdf->SetY($cell_tipo['posy']);
            }
            $this->Pdf->Cell($cell_tipo['width'], 0, $cell_tipo['data'], 0, 0, $cell_tipo['align']);

            $this->Pdf->SetFont($cell_tipodoc['font_type'], $cell_tipodoc['font_style'], $cell_tipodoc['font_size']);
            $this->pdf_text_color($cell_tipodoc['data'], $cell_tipodoc['color_r'], $cell_tipodoc['color_g'], $cell_tipodoc['color_b']);
            if (!empty($cell_tipodoc['posx']) && !empty($cell_tipodoc['posy']))
            {
                $this->Pdf->SetXY($cell_tipodoc['posx'], $cell_tipodoc['posy']);
            }
            elseif (!empty($cell_tipodoc['posx']))
            {
                $this->Pdf->SetX($cell_tipodoc['posx']);
            }
            elseif (!empty($cell_tipodoc['posy']))
            {
                $this->Pdf->SetY($cell_tipodoc['posy']);
            }
            $this->Pdf->Cell($cell_tipodoc['width'], 0, $cell_tipodoc['data'], 0, 0, $cell_tipodoc['align']);

            if (isset($cell_LOGO['data']) && !empty($cell_LOGO['data']) && is_file($cell_LOGO['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_LOGO['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_LOGO['data'], $cell_LOGO['posx'], $cell_LOGO['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_ELNIT['font_type'], $cell_ELNIT['font_style'], $cell_ELNIT['font_size']);
            $this->pdf_text_color($cell_ELNIT['data'], $cell_ELNIT['color_r'], $cell_ELNIT['color_g'], $cell_ELNIT['color_b']);
            if (!empty($cell_ELNIT['posx']) && !empty($cell_ELNIT['posy']))
            {
                $this->Pdf->SetXY($cell_ELNIT['posx'], $cell_ELNIT['posy']);
            }
            elseif (!empty($cell_ELNIT['posx']))
            {
                $this->Pdf->SetX($cell_ELNIT['posx']);
            }
            elseif (!empty($cell_ELNIT['posy']))
            {
                $this->Pdf->SetY($cell_ELNIT['posy']);
            }
            $this->Pdf->Cell($cell_ELNIT['width'], 0, $cell_ELNIT['data'], 0, 0, $cell_ELNIT['align']);

            $this->Pdf->SetFont($cell_LADIRECCION['font_type'], $cell_LADIRECCION['font_style'], $cell_LADIRECCION['font_size']);
            $this->pdf_text_color($cell_LADIRECCION['data'], $cell_LADIRECCION['color_r'], $cell_LADIRECCION['color_g'], $cell_LADIRECCION['color_b']);
            if (!empty($cell_LADIRECCION['posx']) && !empty($cell_LADIRECCION['posy']))
            {
                $this->Pdf->SetXY($cell_LADIRECCION['posx'], $cell_LADIRECCION['posy']);
            }
            elseif (!empty($cell_LADIRECCION['posx']))
            {
                $this->Pdf->SetX($cell_LADIRECCION['posx']);
            }
            elseif (!empty($cell_LADIRECCION['posy']))
            {
                $this->Pdf->SetY($cell_LADIRECCION['posy']);
            }
            $this->Pdf->Cell($cell_LADIRECCION['width'], 0, $cell_LADIRECCION['data'], 0, 0, $cell_LADIRECCION['align']);

            $this->Pdf->SetFont($cell_ELTEL['font_type'], $cell_ELTEL['font_style'], $cell_ELTEL['font_size']);
            $this->pdf_text_color($cell_ELTEL['data'], $cell_ELTEL['color_r'], $cell_ELTEL['color_g'], $cell_ELTEL['color_b']);
            if (!empty($cell_ELTEL['posx']) && !empty($cell_ELTEL['posy']))
            {
                $this->Pdf->SetXY($cell_ELTEL['posx'], $cell_ELTEL['posy']);
            }
            elseif (!empty($cell_ELTEL['posx']))
            {
                $this->Pdf->SetX($cell_ELTEL['posx']);
            }
            elseif (!empty($cell_ELTEL['posy']))
            {
                $this->Pdf->SetY($cell_ELTEL['posy']);
            }
            $this->Pdf->Cell($cell_ELTEL['width'], 0, $cell_ELTEL['data'], 0, 0, $cell_ELTEL['align']);

            $this->Pdf->SetY(85);
            foreach ($this->detallepedido[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detallepedido_j_nompro['font_type'], $cell_detallepedido_j_nompro['font_style'], $cell_detallepedido_j_nompro['font_size']);
                if (!empty($cell_detallepedido_j_nompro['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_j_nompro['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detallepedido_j_nompro['color_r'], $cell_detallepedido_j_nompro['color_g'], $cell_detallepedido_j_nompro['color_b']);
                $this->Pdf->writeHTMLCell($cell_detallepedido_j_nompro['width'], 0, $atu_X, $atu_Y, $this->detallepedido_j_nompro[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detallepedido_j_nompro['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detallepedido_fl_cantidad['font_type'], $cell_detallepedido_fl_cantidad['font_style'], $cell_detallepedido_fl_cantidad['font_size']);
                if (!empty($cell_detallepedido_fl_cantidad['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_cantidad['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_cantidad['color_r'], $cell_detallepedido_fl_cantidad['color_g'], $cell_detallepedido_fl_cantidad['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_cantidad['width'], 0, $this->detallepedido_fl_cantidad[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_cantidad['align']);
                $this->Pdf->SetFont($cell_detallepedido_fl_adicional['font_type'], $cell_detallepedido_fl_adicional['font_style'], $cell_detallepedido_fl_adicional['font_size']);
                if (!empty($cell_detallepedido_fl_adicional['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_adicional['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_adicional['color_r'], $cell_detallepedido_fl_adicional['color_g'], $cell_detallepedido_fl_adicional['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_adicional['width'], 0, $this->detallepedido_fl_adicional[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_adicional['align']);
                $this->Pdf->SetFont($cell_detallepedido_j_codigobar['font_type'], $cell_detallepedido_j_codigobar['font_style'], $cell_detallepedido_j_codigobar['font_size']);
                if (!empty($cell_detallepedido_j_codigobar['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_j_codigobar['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detallepedido_j_codigobar['color_r'], $cell_detallepedido_j_codigobar['color_g'], $cell_detallepedido_j_codigobar['color_b']);
                $this->Pdf->writeHTMLCell($cell_detallepedido_j_codigobar['width'], 0, $atu_X, $atu_Y, $this->detallepedido_j_codigobar[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detallepedido_j_codigobar['align']);
                $this->Pdf->SetY($atu_Y);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 4;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_T_IVA['font_type'], $cell_T_IVA['font_style'], $cell_T_IVA['font_size']);
            $this->pdf_text_color($cell_T_IVA['data'], $cell_T_IVA['color_r'], $cell_T_IVA['color_g'], $cell_T_IVA['color_b']);
            if (!empty($cell_T_IVA['posx']) && !empty($cell_T_IVA['posy']))
            {
                $this->Pdf->SetXY($cell_T_IVA['posx'], $cell_T_IVA['posy']);
            }
            elseif (!empty($cell_T_IVA['posx']))
            {
                $this->Pdf->SetX($cell_T_IVA['posx']);
            }
            elseif (!empty($cell_T_IVA['posy']))
            {
                $this->Pdf->SetY($cell_T_IVA['posy']);
            }
            $this->Pdf->Cell($cell_T_IVA['width'], 0, $cell_T_IVA['data'], 0, 0, $cell_T_IVA['align']);

            $this->Pdf->SetY(85);
            foreach ($this->detallepedido[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detallepedido_fl_colores['font_type'], $cell_detallepedido_fl_colores['font_style'], $cell_detallepedido_fl_colores['font_size']);
                if (!empty($cell_detallepedido_fl_colores['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_colores['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_colores['color_r'], $cell_detallepedido_fl_colores['color_g'], $cell_detallepedido_fl_colores['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_colores['width'], 0, $this->detallepedido_fl_colores[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_colores['align']);
                $this->Pdf->SetFont($cell_detallepedido_fl_tallas['font_type'], $cell_detallepedido_fl_tallas['font_style'], $cell_detallepedido_fl_tallas['font_size']);
                if (!empty($cell_detallepedido_fl_tallas['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_tallas['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_tallas['color_r'], $cell_detallepedido_fl_tallas['color_g'], $cell_detallepedido_fl_tallas['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_tallas['width'], 0, $this->detallepedido_fl_tallas[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_tallas['align']);
                $this->Pdf->SetFont($cell_detallepedido_fl_sabor['font_type'], $cell_detallepedido_fl_sabor['font_style'], $cell_detallepedido_fl_sabor['font_size']);
                if (!empty($cell_detallepedido_fl_sabor['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_sabor['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_sabor['color_r'], $cell_detallepedido_fl_sabor['color_g'], $cell_detallepedido_fl_sabor['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_sabor['width'], 0, $this->detallepedido_fl_sabor[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_sabor['align']);
                $this->Pdf->SetFont($cell_detallepedido_fl_valorunit['font_type'], $cell_detallepedido_fl_valorunit['font_style'], $cell_detallepedido_fl_valorunit['font_size']);
                if (!empty($cell_detallepedido_fl_valorunit['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_valorunit['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_valorunit['color_r'], $cell_detallepedido_fl_valorunit['color_g'], $cell_detallepedido_fl_valorunit['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_valorunit['width'], 0, $this->detallepedido_fl_valorunit[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_valorunit['align']);
                $this->Pdf->SetFont($cell_detallepedido_fl_valorpar['font_type'], $cell_detallepedido_fl_valorpar['font_style'], $cell_detallepedido_fl_valorpar['font_size']);
                if (!empty($cell_detallepedido_fl_valorpar['posx']))
                {
                    $this->Pdf->SetX($cell_detallepedido_fl_valorpar['posx']);
                }
                $this->pdf_text_color($this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind], $cell_detallepedido_fl_valorpar['color_r'], $cell_detallepedido_fl_valorpar['color_g'], $cell_detallepedido_fl_valorpar['color_b']);
                $this->Pdf->Cell($cell_detallepedido_fl_valorpar['width'], 0, $this->detallepedido_fl_valorpar[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepedido_fl_valorpar['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 4;
                $this->Pdf->SetY($max_Y);

            }
          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
    function SC_type_img($img_file)
    {
        $type_img = getimagesize($img_file);
        if (!$type_img)
        {
            return (".jpg");
        }
        switch ($type_img[2])
        {
           case 1:  return ".gif";   break;
           case 2:  return ".jpg";   break;
           case 3:  return ".png";   break;
           case 4:  return ".swf";   break;
           case 5:  return ".psd";   break;
           case 6:  return ".bmp";   break;
           case 7:  return ".tiff";  break;
           case 8:  return ".tiff";  break;
           case 9:  return ".jpc";   break;
           case 10: return ".jp2";   break;
           case 11: return ".jpx";   break;
           case 12: return ".jb2";   break;
           case 13: return ".swc";   break;
           case 14: return ".ief";   break;
           case 15: return ".wbmp";  break;
           case 16: return ".xbm";   break;
           default: return ".jpg";   break;
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
function el_prefijo()
{
$_SESSION['scriptcase']['pdfreport_pedidos_compras']['contr_erro'] = 'on';
  
$pref=$this->prefijo_ped[$this->nm_grid_colunas] ;
 
      $nm_select = "select prefijo from resdian where Idres=$pref"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->pre[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->pre[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->pre[$this->nm_grid_colunas] = false;
          $this->pre_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
if(isset($this->pre[$this->nm_grid_colunas][0][0]))
	{
	$cad=$this->pre[$this->nm_grid_colunas][0][0]; 
	$existe=strpos ($cad, 'PED');
	if($existe !== false)
		{
		$_SESSION['pdfreport_pedidos_compras']['tipodocu']='PEDIDO COMPRA';
		}
	else
		{
		$existe=strpos ($cad, 'COT');
		if($existe!== false)
			{
			$_SESSION['pdfreport_pedidos_compras']['tipodocu']='COTIZACIÓN';
			}
		else
			{
			$_SESSION['pdfreport_pedidos_compras']['tipodocu']='PROFORMA';
			}
		}
	}
$_SESSION['scriptcase']['pdfreport_pedidos_compras']['contr_erro'] = 'off';
}
}
?>
