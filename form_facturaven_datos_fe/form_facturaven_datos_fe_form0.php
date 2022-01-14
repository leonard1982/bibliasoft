<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Editar Datos Factura Electrónica"); } else { echo strip_tags("Editar Datos Factura Electrónica"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fecha_validacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechaven button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechavenc button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_a_tns button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_creado button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_editado button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_orden_fecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_pago button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_facturaven_datos_fe/form_facturaven_datos_fe_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_facturaven_datos_fe_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_facturaven_datos_fe_jquery.php');

?>
var applicationKeys = "";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_facturaven_datos_fe_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_facturaven_datos_fe'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_facturaven_datos_fe'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Editar Datos Factura Electrónica"; } else { echo "Editar Datos Factura Electrónica"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo "Documento: " . $_SESSION['gnumerodoc'] . "" ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['advertencia']))
    {
        $this->nm_new_label['advertencia'] = "Advertencia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $advertencia = $this->advertencia;
   $sStyleHidden_advertencia = '';
   if (isset($this->nmgp_cmp_hidden['advertencia']) && $this->nmgp_cmp_hidden['advertencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['advertencia']);
       $sStyleHidden_advertencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_advertencia = 'display: none;';
   $sStyleReadInp_advertencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['advertencia']) && $this->nmgp_cmp_readonly['advertencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['advertencia']);
       $sStyleReadLab_advertencia = '';
       $sStyleReadInp_advertencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['advertencia']) && $this->nmgp_cmp_hidden['advertencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="advertencia" value="<?php echo $this->form_encode_input($advertencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_advertencia_label" id="hidden_field_label_advertencia" style="<?php echo $sStyleHidden_advertencia; ?>"><span id="id_label_advertencia"><?php echo $this->nm_new_label['advertencia']; ?></span></TD>
    <TD class="scFormDataOdd css_advertencia_line" id="hidden_field_data_advertencia" style="<?php echo $sStyleHidden_advertencia; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_advertencia_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_advertencia css_advertencia_line" style="<?php echo $sStyleReadLab_advertencia; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_advertencia" class="css_read_off_advertencia" style="<?php echo $sStyleReadInp_advertencia; ?>"><span id="id_ajax_label_advertencia"><?php echo $advertencia?></span>
</span><input type="hidden" name="advertencia" value="<?php echo $this->form_encode_input($advertencia); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_advertencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_advertencia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cufe']))
    {
        $this->nm_new_label['cufe'] = "CUFE";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cufe = $this->cufe;
   $sStyleHidden_cufe = '';
   if (isset($this->nmgp_cmp_hidden['cufe']) && $this->nmgp_cmp_hidden['cufe'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cufe']);
       $sStyleHidden_cufe = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cufe = 'display: none;';
   $sStyleReadInp_cufe = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cufe']) && $this->nmgp_cmp_readonly['cufe'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cufe']);
       $sStyleReadLab_cufe = '';
       $sStyleReadInp_cufe = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cufe']) && $this->nmgp_cmp_hidden['cufe'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cufe" value="<?php echo $this->form_encode_input($cufe) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cufe_label" id="hidden_field_label_cufe" style="<?php echo $sStyleHidden_cufe; ?>"><span id="id_label_cufe"><?php echo $this->nm_new_label['cufe']; ?></span></TD>
    <TD class="scFormDataOdd css_cufe_line" id="hidden_field_data_cufe" style="<?php echo $sStyleHidden_cufe; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cufe_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cufe"]) &&  $this->nmgp_cmp_readonly["cufe"] == "on") { 

 ?>
<input type="hidden" name="cufe" value="<?php echo $this->form_encode_input($cufe) . "\">" . $cufe . ""; ?>
<?php } else { ?>
<span id="id_read_on_cufe" class="sc-ui-readonly-cufe css_cufe_line" style="<?php echo $sStyleReadLab_cufe; ?>"><?php echo $this->form_format_readonly("cufe", $this->form_encode_input($this->cufe)); ?></span><span id="id_read_off_cufe" class="css_read_off_cufe<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cufe; ?>">
 <input class="sc-js-input scFormObjectOdd css_cufe_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cufe" type=text name="cufe" value="<?php echo $this->form_encode_input($cufe) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cufe_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cufe_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['enlacepdf']))
    {
        $this->nm_new_label['enlacepdf'] = "Enlace PDF";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enlacepdf = $this->enlacepdf;
   $sStyleHidden_enlacepdf = '';
   if (isset($this->nmgp_cmp_hidden['enlacepdf']) && $this->nmgp_cmp_hidden['enlacepdf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enlacepdf']);
       $sStyleHidden_enlacepdf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enlacepdf = 'display: none;';
   $sStyleReadInp_enlacepdf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enlacepdf']) && $this->nmgp_cmp_readonly['enlacepdf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enlacepdf']);
       $sStyleReadLab_enlacepdf = '';
       $sStyleReadInp_enlacepdf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enlacepdf']) && $this->nmgp_cmp_hidden['enlacepdf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enlacepdf" value="<?php echo $this->form_encode_input($enlacepdf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enlacepdf_label" id="hidden_field_label_enlacepdf" style="<?php echo $sStyleHidden_enlacepdf; ?>"><span id="id_label_enlacepdf"><?php echo $this->nm_new_label['enlacepdf']; ?></span></TD>
    <TD class="scFormDataOdd css_enlacepdf_line" id="hidden_field_data_enlacepdf" style="<?php echo $sStyleHidden_enlacepdf; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enlacepdf_line" style="vertical-align: top;padding: 0px">
<?php
$enlacepdf_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($enlacepdf));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enlacepdf"]) &&  $this->nmgp_cmp_readonly["enlacepdf"] == "on") { 

 ?>
<input type="hidden" name="enlacepdf" value="<?php echo $this->form_encode_input($enlacepdf) . "\">" . $enlacepdf_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_enlacepdf" class="sc-ui-readonly-enlacepdf css_enlacepdf_line" style="<?php echo $sStyleReadLab_enlacepdf; ?>"><?php echo $this->form_format_readonly("enlacepdf", $this->form_encode_input($enlacepdf_val)); ?></span><span id="id_read_off_enlacepdf" class="css_read_off_enlacepdf<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_enlacepdf; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_enlacepdf_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="enlacepdf" id="id_sc_field_enlacepdf" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $enlacepdf; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enlacepdf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enlacepdf_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['estado']))
   {
       $this->nm_new_label['estado'] = "Estado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado = $this->estado;
   $sStyleHidden_estado = '';
   if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado']);
       $sStyleHidden_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado = 'display: none;';
   $sStyleReadInp_estado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado']) && $this->nmgp_cmp_readonly['estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado']);
       $sStyleReadLab_estado = '';
       $sStyleReadInp_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estado" value="<?php echo $this->form_encode_input($this->estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estado_label" id="hidden_field_label_estado" style="<?php echo $sStyleHidden_estado; ?>"><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span></TD>
    <TD class="scFormDataOdd css_estado_line" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 

$estado_look = "";
 if ($this->estado == "200") { $estado_look .= "Enviado con éxito" ;} 
 if (empty($estado_look)) { $estado_look = $this->estado; }
?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">" . $estado_look . ""; ?>
<?php } else { ?>
<?php

$estado_look = "";
 if ($this->estado == "200") { $estado_look .= "Enviado con éxito" ;} 
 if (empty($estado_look)) { $estado_look = $this->estado; }
?>
<span id="id_read_on_estado" class="css_estado_line"  style="<?php echo $sStyleReadLab_estado; ?>"><?php echo $this->form_format_readonly("estado", $this->form_encode_input($estado_look)); ?></span><span id="id_read_off_estado" class="css_read_off_estado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_estado; ?>">
 <span id="idAjaxSelect_estado" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_estado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado" name="estado" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_estado'][] = ''; ?>
 <option value="">Ninguno</option>
 <option  value="200" <?php  if ($this->estado == "200") { echo " selected" ;} ?>>Enviado con éxito</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_estado'][] = '200'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['avisos']))
    {
        $this->nm_new_label['avisos'] = "Avisos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $avisos = $this->avisos;
   $sStyleHidden_avisos = '';
   if (isset($this->nmgp_cmp_hidden['avisos']) && $this->nmgp_cmp_hidden['avisos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['avisos']);
       $sStyleHidden_avisos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_avisos = 'display: none;';
   $sStyleReadInp_avisos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['avisos']) && $this->nmgp_cmp_readonly['avisos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['avisos']);
       $sStyleReadLab_avisos = '';
       $sStyleReadInp_avisos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['avisos']) && $this->nmgp_cmp_hidden['avisos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="avisos" value="<?php echo $this->form_encode_input($avisos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_avisos_label" id="hidden_field_label_avisos" style="<?php echo $sStyleHidden_avisos; ?>"><span id="id_label_avisos"><?php echo $this->nm_new_label['avisos']; ?></span></TD>
    <TD class="scFormDataOdd css_avisos_line" id="hidden_field_data_avisos" style="<?php echo $sStyleHidden_avisos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_avisos_line" style="vertical-align: top;padding: 0px">
<?php
$avisos_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($avisos));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["avisos"]) &&  $this->nmgp_cmp_readonly["avisos"] == "on") { 

 ?>
<input type="hidden" name="avisos" value="<?php echo $this->form_encode_input($avisos) . "\">" . $avisos_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_avisos" class="sc-ui-readonly-avisos css_avisos_line" style="<?php echo $sStyleReadLab_avisos; ?>"><?php echo $this->form_format_readonly("avisos", $this->form_encode_input($avisos_val)); ?></span><span id="id_read_off_avisos" class="css_read_off_avisos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_avisos; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_avisos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="avisos" id="id_sc_field_avisos" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $avisos; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_avisos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_avisos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qr_base64']))
    {
        $this->nm_new_label['qr_base64'] = "QR Base 64";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qr_base64 = $this->qr_base64;
   $sStyleHidden_qr_base64 = '';
   if (isset($this->nmgp_cmp_hidden['qr_base64']) && $this->nmgp_cmp_hidden['qr_base64'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qr_base64']);
       $sStyleHidden_qr_base64 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qr_base64 = 'display: none;';
   $sStyleReadInp_qr_base64 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qr_base64']) && $this->nmgp_cmp_readonly['qr_base64'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qr_base64']);
       $sStyleReadLab_qr_base64 = '';
       $sStyleReadInp_qr_base64 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qr_base64']) && $this->nmgp_cmp_hidden['qr_base64'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qr_base64" value="<?php echo $this->form_encode_input($qr_base64) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_qr_base64_label" id="hidden_field_label_qr_base64" style="<?php echo $sStyleHidden_qr_base64; ?>"><span id="id_label_qr_base64"><?php echo $this->nm_new_label['qr_base64']; ?></span></TD>
    <TD class="scFormDataOdd css_qr_base64_line" id="hidden_field_data_qr_base64" style="<?php echo $sStyleHidden_qr_base64; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qr_base64_line" style="vertical-align: top;padding: 0px">
<?php
$qr_base64_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($qr_base64));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qr_base64"]) &&  $this->nmgp_cmp_readonly["qr_base64"] == "on") { 

 ?>
<input type="hidden" name="qr_base64" value="<?php echo $this->form_encode_input($qr_base64) . "\">" . $qr_base64_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_qr_base64" class="sc-ui-readonly-qr_base64 css_qr_base64_line" style="<?php echo $sStyleReadLab_qr_base64; ?>"><?php echo $this->form_format_readonly("qr_base64", $this->form_encode_input($qr_base64_val)); ?></span><span id="id_read_off_qr_base64" class="css_read_off_qr_base64<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_qr_base64; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_qr_base64_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="qr_base64" id="id_sc_field_qr_base64" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $qr_base64; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qr_base64_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qr_base64_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_trans_fe']))
    {
        $this->nm_new_label['id_trans_fe'] = "Id Trans Fe";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_trans_fe = $this->id_trans_fe;
   $sStyleHidden_id_trans_fe = '';
   if (isset($this->nmgp_cmp_hidden['id_trans_fe']) && $this->nmgp_cmp_hidden['id_trans_fe'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_trans_fe']);
       $sStyleHidden_id_trans_fe = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_trans_fe = 'display: none;';
   $sStyleReadInp_id_trans_fe = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_trans_fe']) && $this->nmgp_cmp_readonly['id_trans_fe'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_trans_fe']);
       $sStyleReadLab_id_trans_fe = '';
       $sStyleReadInp_id_trans_fe = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_trans_fe']) && $this->nmgp_cmp_hidden['id_trans_fe'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_trans_fe" value="<?php echo $this->form_encode_input($id_trans_fe) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_trans_fe_label" id="hidden_field_label_id_trans_fe" style="<?php echo $sStyleHidden_id_trans_fe; ?>"><span id="id_label_id_trans_fe"><?php echo $this->nm_new_label['id_trans_fe']; ?></span></TD>
    <TD class="scFormDataOdd css_id_trans_fe_line" id="hidden_field_data_id_trans_fe" style="<?php echo $sStyleHidden_id_trans_fe; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_trans_fe_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_trans_fe"]) &&  $this->nmgp_cmp_readonly["id_trans_fe"] == "on") { 

 ?>
<input type="hidden" name="id_trans_fe" value="<?php echo $this->form_encode_input($id_trans_fe) . "\">" . $id_trans_fe . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_trans_fe" class="sc-ui-readonly-id_trans_fe css_id_trans_fe_line" style="<?php echo $sStyleReadLab_id_trans_fe; ?>"><?php echo $this->form_format_readonly("id_trans_fe", $this->form_encode_input($this->id_trans_fe)); ?></span><span id="id_read_off_id_trans_fe" class="css_read_off_id_trans_fe<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_trans_fe; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_trans_fe_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_trans_fe" type=text name="id_trans_fe" value="<?php echo $this->form_encode_input($id_trans_fe) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_trans_fe_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_trans_fe_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_validacion']))
    {
        $this->nm_new_label['fecha_validacion'] = "Fecha Validacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha_validacion = $this->fecha_validacion;
   if (strlen($this->fecha_validacion_hora) > 8 ) {$this->fecha_validacion_hora = substr($this->fecha_validacion_hora, 0, 8);}
   $this->fecha_validacion .= ' ' . $this->fecha_validacion_hora;
   $this->fecha_validacion  = trim($this->fecha_validacion);
   $fecha_validacion = $this->fecha_validacion;
   $sStyleHidden_fecha_validacion = '';
   if (isset($this->nmgp_cmp_hidden['fecha_validacion']) && $this->nmgp_cmp_hidden['fecha_validacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_validacion']);
       $sStyleHidden_fecha_validacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_validacion = 'display: none;';
   $sStyleReadInp_fecha_validacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_validacion']) && $this->nmgp_cmp_readonly['fecha_validacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_validacion']);
       $sStyleReadLab_fecha_validacion = '';
       $sStyleReadInp_fecha_validacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_validacion']) && $this->nmgp_cmp_hidden['fecha_validacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_validacion" value="<?php echo $this->form_encode_input($fecha_validacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_validacion_label" id="hidden_field_label_fecha_validacion" style="<?php echo $sStyleHidden_fecha_validacion; ?>"><span id="id_label_fecha_validacion"><?php echo $this->nm_new_label['fecha_validacion']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_validacion_line" id="hidden_field_data_fecha_validacion" style="<?php echo $sStyleHidden_fecha_validacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_validacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_validacion"]) &&  $this->nmgp_cmp_readonly["fecha_validacion"] == "on") { 

 ?>
<input type="hidden" name="fecha_validacion" value="<?php echo $this->form_encode_input($fecha_validacion) . "\">" . $fecha_validacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_validacion" class="sc-ui-readonly-fecha_validacion css_fecha_validacion_line" style="<?php echo $sStyleReadLab_fecha_validacion; ?>"><?php echo $this->form_format_readonly("fecha_validacion", $this->form_encode_input($fecha_validacion)); ?></span><span id="id_read_off_fecha_validacion" class="css_read_off_fecha_validacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_validacion; ?>"><?php
$tmp_form_data = $this->field_config['fecha_validacion']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_fecha_validacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_validacion" type=text name="fecha_validacion" value="<?php echo $this->form_encode_input($fecha_validacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecha_validacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_validacion']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecha_validacion']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_validacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_validacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecha_validacion = $old_dt_fecha_validacion;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['proveedor']))
   {
       $this->nm_new_label['proveedor'] = "Proveedor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proveedor = $this->proveedor;
   $sStyleHidden_proveedor = '';
   if (isset($this->nmgp_cmp_hidden['proveedor']) && $this->nmgp_cmp_hidden['proveedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proveedor']);
       $sStyleHidden_proveedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proveedor = 'display: none;';
   $sStyleReadInp_proveedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proveedor']) && $this->nmgp_cmp_readonly['proveedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proveedor']);
       $sStyleReadLab_proveedor = '';
       $sStyleReadInp_proveedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proveedor']) && $this->nmgp_cmp_hidden['proveedor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="proveedor" value="<?php echo $this->form_encode_input($this->proveedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_proveedor_label" id="hidden_field_label_proveedor" style="<?php echo $sStyleHidden_proveedor; ?>"><span id="id_label_proveedor"><?php echo $this->nm_new_label['proveedor']; ?></span></TD>
    <TD class="scFormDataOdd css_proveedor_line" id="hidden_field_data_proveedor" style="<?php echo $sStyleHidden_proveedor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proveedor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proveedor"]) &&  $this->nmgp_cmp_readonly["proveedor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor'] = array(); 
    }

   $old_value_fecha_validacion = $this->fecha_validacion;
   $old_value_fecha_validacion_hora = $this->fecha_validacion_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fecha_validacion = $this->fecha_validacion;
   $unformatted_value_fecha_validacion_hora = $this->fecha_validacion_hora;

   $nm_comando = "SELECT proveedor, proveedor  FROM webservicefe_proveedores  ORDER BY proveedor";

   $this->fecha_validacion = $old_value_fecha_validacion;
   $this->fecha_validacion_hora = $old_value_fecha_validacion_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor'][] = $rs->fields[0];
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
   $x = 0; 
   $proveedor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->proveedor_1))
          {
              foreach ($this->proveedor_1 as $tmp_proveedor)
              {
                  if (trim($tmp_proveedor) === trim($cadaselect[1])) { $proveedor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->proveedor) === trim($cadaselect[1])) { $proveedor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="proveedor" value="<?php echo $this->form_encode_input($proveedor) . "\">" . $proveedor_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_proveedor();
   $x = 0 ; 
   $proveedor_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->proveedor_1))
          {
              foreach ($this->proveedor_1 as $tmp_proveedor)
              {
                  if (trim($tmp_proveedor) === trim($cadaselect[1])) { $proveedor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->proveedor) === trim($cadaselect[1])) { $proveedor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($proveedor_look))
          {
              $proveedor_look = $this->proveedor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_proveedor\" class=\"css_proveedor_line\" style=\"" .  $sStyleReadLab_proveedor . "\">" . $this->form_format_readonly("proveedor", $this->form_encode_input($proveedor_look)) . "</span><span id=\"id_read_off_proveedor\" class=\"css_read_off_proveedor" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_proveedor . "\">";
   echo " <span id=\"idAjaxSelect_proveedor\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_proveedor_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_proveedor\" name=\"proveedor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['Lookup_proveedor'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->proveedor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->proveedor)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proveedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proveedor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['token']))
    {
        $this->nm_new_label['token'] = "Token";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $token = $this->token;
   $sStyleHidden_token = '';
   if (isset($this->nmgp_cmp_hidden['token']) && $this->nmgp_cmp_hidden['token'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['token']);
       $sStyleHidden_token = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_token = 'display: none;';
   $sStyleReadInp_token = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['token']) && $this->nmgp_cmp_readonly['token'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['token']);
       $sStyleReadLab_token = '';
       $sStyleReadInp_token = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['token']) && $this->nmgp_cmp_hidden['token'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="token" value="<?php echo $this->form_encode_input($token) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_token_label" id="hidden_field_label_token" style="<?php echo $sStyleHidden_token; ?>"><span id="id_label_token"><?php echo $this->nm_new_label['token']; ?></span></TD>
    <TD class="scFormDataOdd css_token_line" id="hidden_field_data_token" style="<?php echo $sStyleHidden_token; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_token_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["token"]) &&  $this->nmgp_cmp_readonly["token"] == "on") { 

 ?>
<input type="hidden" name="token" value="<?php echo $this->form_encode_input($token) . "\">" . $token . ""; ?>
<?php } else { ?>
<span id="id_read_on_token" class="sc-ui-readonly-token css_token_line" style="<?php echo $sStyleReadLab_token; ?>"><?php echo $this->form_format_readonly("token", $this->form_encode_input($this->token)); ?></span><span id="id_read_off_token" class="css_read_off_token<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_token; ?>">
 <input class="sc-js-input scFormObjectOdd css_token_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_token" type=text name="token" value="<?php echo $this->form_encode_input($token) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_token_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_token_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password']))
    {
        $this->nm_new_label['password'] = "Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password = $this->password;
   $sStyleHidden_password = '';
   if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password']);
       $sStyleHidden_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password = 'display: none;';
   $sStyleReadInp_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password']) && $this->nmgp_cmp_readonly['password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password']);
       $sStyleReadLab_password = '';
       $sStyleReadInp_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_password_label" id="hidden_field_label_password" style="<?php echo $sStyleHidden_password; ?>"><span id="id_label_password"><?php echo $this->nm_new_label['password']; ?></span></TD>
    <TD class="scFormDataOdd css_password_line" id="hidden_field_data_password" style="<?php echo $sStyleHidden_password; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password"]) &&  $this->nmgp_cmp_readonly["password"] == "on") { 

 ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">" . $password . ""; ?>
<?php } else { ?>
<span id="id_read_on_password" class="sc-ui-readonly-password css_password_line" style="<?php echo $sStyleReadLab_password; ?>"><?php echo $this->form_format_readonly("password", $this->form_encode_input($this->password)); ?></span><span id="id_read_off_password" class="css_read_off_password<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_password" type=text name="password" value="<?php echo $this->form_encode_input($password) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor']))
    {
        $this->nm_new_label['servidor'] = "Servidor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor = $this->servidor;
   $sStyleHidden_servidor = '';
   if (isset($this->nmgp_cmp_hidden['servidor']) && $this->nmgp_cmp_hidden['servidor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor']);
       $sStyleHidden_servidor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor = 'display: none;';
   $sStyleReadInp_servidor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor']) && $this->nmgp_cmp_readonly['servidor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor']);
       $sStyleReadLab_servidor = '';
       $sStyleReadInp_servidor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor']) && $this->nmgp_cmp_hidden['servidor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor" value="<?php echo $this->form_encode_input($servidor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_servidor_label" id="hidden_field_label_servidor" style="<?php echo $sStyleHidden_servidor; ?>"><span id="id_label_servidor"><?php echo $this->nm_new_label['servidor']; ?></span></TD>
    <TD class="scFormDataOdd css_servidor_line" id="hidden_field_data_servidor" style="<?php echo $sStyleHidden_servidor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor"]) &&  $this->nmgp_cmp_readonly["servidor"] == "on") { 

 ?>
<input type="hidden" name="servidor" value="<?php echo $this->form_encode_input($servidor) . "\">" . $servidor . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor" class="sc-ui-readonly-servidor css_servidor_line" style="<?php echo $sStyleReadLab_servidor; ?>"><?php echo $this->form_format_readonly("servidor", $this->form_encode_input($this->servidor)); ?></span><span id="id_read_off_servidor" class="css_read_off_servidor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor" type=text name="servidor" value="<?php echo $this->form_encode_input($servidor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['maximized']))
  {
?>
</td></tr> 
<tr><td><table width="100%"> 
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFormFooter">
    <tr>
        <td>
            <span class="scFormFooterFont" id="rod_col1"><?php echo "No editar estos campos, puede generar un daño en el sistema." ?></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"></span>
        </td>
    </tr>
</table><?php
  }
?>
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_facturaven_datos_fe");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_facturaven_datos_fe");
 parent.scAjaxDetailHeight("form_facturaven_datos_fe", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_facturaven_datos_fe", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_facturaven_datos_fe", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
		    if ($("#sc_b_hlp_t").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_datos_fe']['buttonStatus'] = $this->nmgp_botoes;
?>
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
</script>
</body> 
</html> 
