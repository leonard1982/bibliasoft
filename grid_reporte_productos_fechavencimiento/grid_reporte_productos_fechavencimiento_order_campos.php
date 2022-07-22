<?php
   include_once('grid_reporte_productos_fechavencimiento_session.php');
   session_start();
   $_SESSION['scriptcase']['grid_reporte_productos_fechavencimiento']['glo_nm_path_imag_temp']  = "";
   //check tmp
   if(empty($_SESSION['scriptcase']['grid_reporte_productos_fechavencimiento']['glo_nm_path_imag_temp']))
   {
       $str_path_apl_url = $_SERVER['PHP_SELF'];
       $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
       /*check tmp*/$_SESSION['scriptcase']['grid_reporte_productos_fechavencimiento']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   if (!isset($_SESSION['sc_session']))
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys  = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web    = $_SERVER['PHP_SELF'];
       $str_path_web    = str_replace("\\", '/', $str_path_web);
       $str_path_web    = str_replace('//', '/', $str_path_web);
       $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       if (is_file($root . $_SESSION['scriptcase']['grid_reporte_productos_fechavencimiento']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv_2022.txt"))
       {
?>
           <script language="javascript">
            nm_move();
           </script>
<?php
           exit;
       }
   }
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   $Ord_Cmp = new grid_reporte_productos_fechavencimiento_Ord_cmp(); 
   $Ord_Cmp->Ord_cmp_init();
   
class grid_reporte_productos_fechavencimiento_Ord_cmp
{
function Ord_cmp_init()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_def_seq, $tab_labels, $embbed, $tbar_pos, $_POST, $_GET;
   if (isset($_POST['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_POST, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_POST, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_POST['use_alias']))  ? filter_input(INPUT_POST, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_POST, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_POST, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_POST, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_POST['embbed_groupby']) && 'Y' == $_POST['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_POST, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   elseif (isset($_GET['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_GET, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_GET, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_GET['use_alias']))  ? filter_input(INPUT_GET, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_GET, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_GET, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_GET, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_GET['embbed_groupby']) && 'Y' == $_GET['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_GET, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $this->Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       include_once($NM_arq_lang);
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_select_orig']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_select_orig'] = array();
   }
   $this->restore = isset($_POST['restore']) ? true : false;
   if ($this->restore && !class_exists('Services_JSON')) {
       include_once("grid_reporte_productos_fechavencimiento_json.php");
   }
   $this->Arr_result = array();
   
   $tab_ger_campos = array();
   $tab_def_campos = array();
   $tab_def_seq    = array();
   $tab_labels     = array();
   $tab_ger_campos['grupo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['grupo'] = "grupo";
       $tab_def_seq[10] = "grupo";
   }
   else
   {
       $tab_def_campos['grupo'] = "g.nomgrupo";
       $tab_def_seq[10] = "g.nomgrupo";
   }
   $tab_labels["grupo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["grupo"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["grupo"] : "Grupo";
   $tab_ger_campos['codigo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['codigo'] = "codigo";
       $tab_def_seq[20] = "codigo";
   }
   else
   {
       $tab_def_campos['codigo'] = "p.codigobar";
       $tab_def_seq[20] = "p.codigobar";
   }
   $tab_labels["codigo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["codigo"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["codigo"] : "Codigo";
   $tab_ger_campos['descripcion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['descripcion'] = "descripcion";
       $tab_def_seq[30] = "descripcion";
   }
   else
   {
       $tab_def_campos['descripcion'] = "p.nompro";
       $tab_def_seq[30] = "p.nompro";
   }
   $tab_labels["descripcion"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["descripcion"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["descripcion"] : "Descripcion";
   $tab_ger_campos['unidad'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['unidad'] = "unidad";
       $tab_def_seq[40] = "unidad";
   }
   else
   {
       $tab_def_campos['unidad'] = "if(p.unidmaymen='SI',p.unimay,p.unimen)";
       $tab_def_seq[40] = "if(p.unidmaymen='SI',p.unimay,p.unimen)";
   }
   $tab_labels["unidad"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["unidad"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["unidad"] : "Unidad";
   $tab_ger_campos['existencia'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['existencia'] = "existencia";
       $tab_def_seq[50] = "existencia";
   }
   else
   {
       $tab_def_campos['existencia'] = "p.stockmen";
       $tab_def_seq[50] = "p.stockmen";
   }
   $tab_labels["existencia"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["existencia"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["existencia"] : "Existencia";
   $tab_ger_campos['vence'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['vence'] = "vence";
       $tab_def_seq[60] = "vence";
   }
   else
   {
       $tab_def_campos['vence'] = "iv.fechavenc";
       $tab_def_seq[60] = "iv.fechavenc";
   }
   $tab_labels["vence"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["vence"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["vence"] : "Vence";
   $tab_ger_campos['lote'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['lote'] = "lote";
       $tab_def_seq[70] = "lote";
   }
   else
   {
       $tab_def_campos['lote'] = "iv.lote";
       $tab_def_seq[70] = "iv.lote";
   }
   $tab_labels["lote"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["lote"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['labels']["lote"] : "Lote";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_productos_fechavencimiento']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_productos_fechavencimiento']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_productos_fechavencimiento']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_select'] = array();
   }
   
   if ($fsel_ok == "regra" && !empty($sel_regra) && !$this->restore)
   {
       $this->Sel_processa_out_regr($sel_regra);
   }
   else
   {
       if ($embbed)
       {
           ob_start();
           $this->Sel_processa_form();
           $Temp = ob_get_clean();
           echo NM_charset_to_utf8($Temp);
       }
       else
       {
           if ($this->restore)
           {
               ob_start();
           }
           $this->Sel_processa_form();
       }
   }
   exit;
   
}
function Sel_processa_out_regr($sel_regra)
{
   global $sc_init, $tab_def_seq, $embbed;
   $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_grid']   = "";
   $regras_ord = explode("#_fld_#", $sel_regra);
   foreach ($regras_ord as $cada_regra)
   {
       $campo_regra = explode(";", $cada_regra);
       $ordem = ($campo_regra[0] == "+") ? "asc" : "desc";
       $seq   = $campo_regra[1];
       if (isset($tab_def_seq[$seq]))
       {
           $_SESSION['sc_session'][$sc_init]['grid_reporte_productos_fechavencimiento']['ordem_select'][$tab_def_seq[$seq]] = $ordem;
       }
   }
?>
    <script language="javascript"> 
<?php
   if (!$embbed)
   {
?>
      self.parent.tb_remove(); 
      parent.nm_gp_submit_ajax('inicio', ''); 
<?php
   }
   else
   {
?>
      nm_gp_submit_ajax('inicio', ''); 
<?php
   }
?>
   </script>
<?php
}
   
function Sel_processa_form()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_labels, $embbed, $tbar_pos;
   $size = 10;
   $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
   foreach ($this->Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
      {
          $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
          $this->Nm_lang[$ind] = $dados;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
   include("../_lib/css/" . $str_schema_all . "_grid.php");
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
   if (!$embbed)
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Vencimiento de Productos</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" /> 
 <?php
 if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts'] ?>" />
 <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
</HEAD>
<BODY class="scGridPage" style="margin: 0px; overflow-x: hidden">
<script language="javascript" type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
<?php
   }
?>
<script language="javascript"> 
<?php
if ($embbed)
{
?>
  function scSubmitOrderCampos(sPos, sType) {
    $("#id_fsel_ok_sel_ord").val(sType);
    if(sType == 'cmp')
    {
       scPackSelectedOrd();
    }
   return new Promise(function(resolve, reject) {$.ajax({
    type: "POST",
    url: "grid_reporte_productos_fechavencimiento_order_campos.php",
    data: {
     script_case_init: $("#id_script_case_init_sel_ord").val(),
     path_img: $("#id_path_img_sel_ord").val(),
     path_btn: $("#id_path_btn_sel_ord").val(),
     use_alias: $("#id_use_alias").val(),
     campos_sel: $("#id_campos_sel_sel_ord").val(),
     sel_regra: $("#id_sel_regra_sel_ord").val(),
     fsel_ok: $("#id_fsel_ok_sel_ord").val(),
     embbed_groupby: 'Y'
    }
   }).done(function(data) {
    scBtnOrderCamposHide(sPos);
    buttonunselectedOF();
    $("#sc_id_order_campos_placeholder_" + sPos).find("td").html("");
    var execString = data.toString().replace(/(\<.*?\>)/g, '');
    eval(execString).then(function(){resolve()});
   });});
  }
<?php
}
?>
 // Submeter o formularior
 //-------------------------------------
 function submit_form_Fsel_ord()
 {
     scPackSelectedOrd();
      buttonunselectedOF();
      document.Fsel_ord.submit();
 }
 function scPackSelectedOrd() {
  var fieldList, fieldName, i, selectedFields = new Array;
 fieldList = $("#sc_id_fldord_selected").sortable("toArray");
 for (i = 0; i < fieldList.length; i++) {
  fieldName  = fieldList[i].substr(14);
  selectedFields.push($("#sc_id_class_" + fieldName).val() + fieldName);
 }
 $("#id_campos_sel_sel_ord").val( selectedFields.join("@?@") );
 }
 </script>
<FORM name="Fsel_ord" method="POST">
  <INPUT type="hidden" name="script_case_init"    id="id_script_case_init_sel_ord"    value="<?php echo NM_encode_input($sc_init); ?>"> 
  <INPUT type="hidden" name="path_img"            id="id_path_img_sel_ord"            value="<?php echo NM_encode_input($path_img); ?>"> 
  <INPUT type="hidden" name="path_btn"            id="id_path_btn_sel_ord"            value="<?php echo NM_encode_input($path_btn); ?>"> 
  <INPUT type="hidden" name="use_alias"           id="id_use_alias"                   value="<?php echo NM_encode_input($use_alias); ?>"> 
  <INPUT type="hidden" name="fsel_ok"             id="id_fsel_ok_sel_ord"             value=""> 
<?php
if ($embbed)
{
    echo "<div class='scAppDivMoldura'>";
    echo "<table id=\"main_table\" style=\"width: 100%\" cellspacing=0 cellpadding=0>";
}
elseif ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px\">";
}
?>
<?php
if (!$embbed)
{
?>
<tr>
<td>
<div class="scGridBorder">
<table width='100%' cellspacing=0 cellpadding=0>
<?php
}
$disp_rest = "none";
?>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivHeader scAppDivHeaderText':'scGridLabelVert'; ?>">
   <?php echo $this->Nm_lang['lang_btns_sort_hint']; ?>
  </td>
 </tr>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivContent css_scAppDivContentText':'scGridTabelaTd'; ?>">
   <table class="<?php echo ($embbed)? '':'scGridTabela'; ?>" style="border-width: 0; border-collapse: collapse; width:100%;" cellspacing=0 cellpadding=0>
    <tr class="<?php echo ($embbed)? '':'scGridFieldOddVert'; ?>">
     <td style="vertical-align: top">
     <table>
    <tr>
    <td>
     <select  name="sel_regra" id="id_sel_regra_sel_ord" size=1 class="scAppDivToolbarInput">
       <OPTION value=""></OPTION>
       <OPTION value="+;60;vence">Vencimiento</OPTION>
    </select>
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok_appdiv", "document.Fsel_ord.fsel_ok.value='regra';proc_btn_ord('f_sel_sub','Fsel_ord.submit()')", "document.Fsel_ord.fsel_ok.value='regra';proc_btn_ord('f_sel_sub','Fsel_ord.submit()')", "f_sub_regr", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "scSubmitOrderCampos('" . NM_encode_input($tbar_pos) . "', 'regra')", "scSubmitOrderCampos('" . NM_encode_input($tbar_pos) . "', 'regra')", "f_sub_regr", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "self.parent.tb_remove(); buttonunselectedOF();", "self.parent.tb_remove(); buttonunselectedOF();", "f_sub_regr", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "f_sub_regr", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
     <br />
     <br />
    </td>
   </tr>
   </table>
  </td>
 </tr>
<?php
if (!$embbed)
{
?>
</table>
</div>
</td>
</tr>
<?php
}
?>
</table>
<?php
if ($embbed)
{
?>
    </div>
<?php
}
?>
</FORM>
<script language="javascript"> 
function buttonDisable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", true).addClass("disabled");
}
function buttonEnable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", false).removeClass("disabled");
}
function restore_ord() {
    $.ajax({
        type: 'POST',
        url: "grid_reporte_productos_fechavencimiento_order_campos.php",
        data: {
           script_case_init: $("#id_script_case_init_sel_ord").val(),
           restore: 'ok',
        }
    })
    .done(function(retcombos) {
       eval("Combos = " + retcombos);
       $("#sc_id_fldord_available").html(Combos["fldord_available"]);
       $("#sc_id_fldord_selected").html(Combos["fldord_selected"]);
       buttonDisable_ord("Brestore_ord");
       buttonEnable_ord("f_sel_sub");
       $('#f_sel_sub').css('display', 'inline-block');
    });
}
function buttonSelectedOF() {
   $("#ordcmp_top").addClass("selected");
   $("#ordcmp_bottom").addClass("selected");
}
function buttonunselectedOF() {
   $("#ordcmp_top").removeClass("selected");
   $("#ordcmp_bottom").removeClass("selected");
}
function display_btn_restore_ord() {
    buttonEnable_ord("Brestore_ord");
    buttonEnable_ord("f_sel_sub");
}
function proc_btn_ord(btn, proc) {
    if (
        (document.Fsel_ord.fsel_ok.value != 'regra' && $("#" + btn).prop("disabled") == true) || 
        (document.Fsel_ord.fsel_ok.value == 'regra' && $("#id_sel_regra_sel_ord").val() == '')
    )
    {
        return;
    }
    eval (proc);
}
$( document ).ready(function() {
   buttonDisable_ord("f_sel_sub");
   buttonSelectedOF();
<?php
   if ($disp_rest == "none") {
?>
   buttonDisable_ord("Brestore_ord");
<?php
   }
?>
});
var bFixed = false;
function ajusta_window_Fsel_ord()
{
<?php
   if ($embbed)
   {
?>
  return false;
<?php
   }
?>
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window_Fsel_ord()", 50);
    return;
  }
  else if(!bFixed)
  {
    var oOrig = $(document.Fsel_ord.sel_orig),
        oDest = $(document.Fsel_ord.sel_dest),
        mHeight = Math.max(oOrig.height(), oDest.height()),
        mWidth = Math.max(oOrig.width() + 5, oDest.width() + 5);
    oOrig.height(mHeight);
    oOrig.width(mWidth);
    oDest.height(mHeight);
    oDest.width(mWidth + 15);
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
      self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
      setTimeout("ajusta_window_Fsel_ord()", 50);
      return;
    }
  }
  strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
  self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
}
$( document ).ready(function() {
   ajusta_window_Fsel_ord();
});
</script>
<script>
    ajusta_window_Fsel_ord();
</script>
</BODY>
</HTML>
<?php
}
}
