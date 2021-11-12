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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Actualizar Precios"); } else { echo strip_tags("Actualizar Precios"); } ?></TITLE>
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
<input type="hidden" id="sc-mobile-lock" value='true' />
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_producto_precioscompra/form_producto_precioscompra_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_producto_precioscompra_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_producto_precioscompra_jquery.php');

?>

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
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
 include_once("form_producto_precioscompra_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_producto_precioscompra'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_producto_precioscompra'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Actualizar Precios"; } else { echo "Actualizar Precios"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['out'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['out']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['out']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['out']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['out']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['out'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "out", "scBtnFn_out()", "scBtnFn_out()", "sc_out_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['empty_filter'] = true;
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
    if (!isset($this->nm_new_label['codigobar']))
    {
        $this->nm_new_label['codigobar'] = "CodBarra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigobar = $this->codigobar;
   $sStyleHidden_codigobar = '';
   if (isset($this->nmgp_cmp_hidden['codigobar']) && $this->nmgp_cmp_hidden['codigobar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigobar']);
       $sStyleHidden_codigobar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigobar = 'display: none;';
   $sStyleReadInp_codigobar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigobar']) && $this->nmgp_cmp_readonly['codigobar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigobar']);
       $sStyleReadLab_codigobar = '';
       $sStyleReadInp_codigobar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigobar']) && $this->nmgp_cmp_hidden['codigobar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar" value="<?php echo $this->form_encode_input($codigobar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigobar_label" id="hidden_field_label_codigobar" style="<?php echo $sStyleHidden_codigobar; ?>"><span id="id_label_codigobar"><?php echo $this->nm_new_label['codigobar']; ?></span></TD>
    <TD class="scFormDataOdd css_codigobar_line" id="hidden_field_data_codigobar" style="<?php echo $sStyleHidden_codigobar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigobar_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="codigobar" value="<?php echo $this->form_encode_input($codigobar); ?>"><span id="id_ajax_label_codigobar"><?php echo nl2br($codigobar); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigoprod']))
    {
        $this->nm_new_label['codigoprod'] = "Codigo Producto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigoprod = $this->codigoprod;
   $sStyleHidden_codigoprod = '';
   if (isset($this->nmgp_cmp_hidden['codigoprod']) && $this->nmgp_cmp_hidden['codigoprod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigoprod']);
       $sStyleHidden_codigoprod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigoprod = 'display: none;';
   $sStyleReadInp_codigoprod = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigoprod']) && $this->nmgp_cmp_readonly['codigoprod'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigoprod']);
       $sStyleReadLab_codigoprod = '';
       $sStyleReadInp_codigoprod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigoprod']) && $this->nmgp_cmp_hidden['codigoprod'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigoprod" value="<?php echo $this->form_encode_input($codigoprod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigoprod_label" id="hidden_field_label_codigoprod" style="<?php echo $sStyleHidden_codigoprod; ?>"><span id="id_label_codigoprod"><?php echo $this->nm_new_label['codigoprod']; ?></span></TD>
    <TD class="scFormDataOdd css_codigoprod_line" id="hidden_field_data_codigoprod" style="<?php echo $sStyleHidden_codigoprod; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigoprod_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="codigoprod" value="<?php echo $this->form_encode_input($codigoprod); ?>"><span id="id_ajax_label_codigoprod"><?php echo nl2br($codigoprod); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigoprod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigoprod_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nompro']))
    {
        $this->nm_new_label['nompro'] = "Descripción";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nompro = $this->nompro;
   $sStyleHidden_nompro = '';
   if (isset($this->nmgp_cmp_hidden['nompro']) && $this->nmgp_cmp_hidden['nompro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nompro']);
       $sStyleHidden_nompro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nompro = 'display: none;';
   $sStyleReadInp_nompro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nompro']) && $this->nmgp_cmp_readonly['nompro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nompro']);
       $sStyleReadLab_nompro = '';
       $sStyleReadInp_nompro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nompro']) && $this->nmgp_cmp_hidden['nompro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nompro" value="<?php echo $this->form_encode_input($nompro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nompro_label" id="hidden_field_label_nompro" style="<?php echo $sStyleHidden_nompro; ?>"><span id="id_label_nompro"><?php echo $this->nm_new_label['nompro']; ?></span></TD>
    <TD class="scFormDataOdd css_nompro_line" id="hidden_field_data_nompro" style="<?php echo $sStyleHidden_nompro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nompro_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="nompro" value="<?php echo $this->form_encode_input($nompro); ?>"><span id="id_ajax_label_nompro"><?php echo nl2br($nompro); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nompro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nompro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciomen']))
    {
        $this->nm_new_label['preciomen'] = "Precio Venta Menudeo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomen = $this->preciomen;
   $sStyleHidden_preciomen = '';
   if (isset($this->nmgp_cmp_hidden['preciomen']) && $this->nmgp_cmp_hidden['preciomen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomen']);
       $sStyleHidden_preciomen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomen = 'display: none;';
   $sStyleReadInp_preciomen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomen']) && $this->nmgp_cmp_readonly['preciomen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomen']);
       $sStyleReadLab_preciomen = '';
       $sStyleReadInp_preciomen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomen']) && $this->nmgp_cmp_hidden['preciomen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen" value="<?php echo $this->form_encode_input($preciomen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomen_label" id="hidden_field_label_preciomen" style="<?php echo $sStyleHidden_preciomen; ?>"><span id="id_label_preciomen"><?php echo $this->nm_new_label['preciomen']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomen_line" id="hidden_field_data_preciomen" style="<?php echo $sStyleHidden_preciomen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen"]) &&  $this->nmgp_cmp_readonly["preciomen"] == "on") { 

 ?>
<input type="hidden" name="preciomen" value="<?php echo $this->form_encode_input($preciomen) . "\">" . $preciomen . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen" class="sc-ui-readonly-preciomen css_preciomen_line" style="<?php echo $sStyleReadLab_preciomen; ?>"><?php echo $this->form_format_readonly("preciomen", $this->form_encode_input($this->preciomen)); ?></span><span id="id_read_off_preciomen" class="css_read_off_preciomen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen" type=text name="preciomen" value="<?php echo $this->form_encode_input($preciomen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen']['format_pos'] || 3 == $this->field_config['preciomen']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciomen2']))
    {
        $this->nm_new_label['preciomen2'] = "Precio Especial Menudeo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomen2 = $this->preciomen2;
   $sStyleHidden_preciomen2 = '';
   if (isset($this->nmgp_cmp_hidden['preciomen2']) && $this->nmgp_cmp_hidden['preciomen2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomen2']);
       $sStyleHidden_preciomen2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomen2 = 'display: none;';
   $sStyleReadInp_preciomen2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomen2']) && $this->nmgp_cmp_readonly['preciomen2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomen2']);
       $sStyleReadLab_preciomen2 = '';
       $sStyleReadInp_preciomen2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomen2']) && $this->nmgp_cmp_hidden['preciomen2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen2" value="<?php echo $this->form_encode_input($preciomen2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomen2_label" id="hidden_field_label_preciomen2" style="<?php echo $sStyleHidden_preciomen2; ?>"><span id="id_label_preciomen2"><?php echo $this->nm_new_label['preciomen2']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomen2_line" id="hidden_field_data_preciomen2" style="<?php echo $sStyleHidden_preciomen2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomen2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen2"]) &&  $this->nmgp_cmp_readonly["preciomen2"] == "on") { 

 ?>
<input type="hidden" name="preciomen2" value="<?php echo $this->form_encode_input($preciomen2) . "\">" . $preciomen2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen2" class="sc-ui-readonly-preciomen2 css_preciomen2_line" style="<?php echo $sStyleReadLab_preciomen2; ?>"><?php echo $this->form_format_readonly("preciomen2", $this->form_encode_input($this->preciomen2)); ?></span><span id="id_read_off_preciomen2" class="css_read_off_preciomen2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen2; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomen2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen2" type=text name="preciomen2" value="<?php echo $this->form_encode_input($preciomen2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen2']['format_pos'] || 3 == $this->field_config['preciomen2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciomen3']))
    {
        $this->nm_new_label['preciomen3'] = "Precio al Mayor Menudeo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomen3 = $this->preciomen3;
   $sStyleHidden_preciomen3 = '';
   if (isset($this->nmgp_cmp_hidden['preciomen3']) && $this->nmgp_cmp_hidden['preciomen3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomen3']);
       $sStyleHidden_preciomen3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomen3 = 'display: none;';
   $sStyleReadInp_preciomen3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomen3']) && $this->nmgp_cmp_readonly['preciomen3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomen3']);
       $sStyleReadLab_preciomen3 = '';
       $sStyleReadInp_preciomen3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomen3']) && $this->nmgp_cmp_hidden['preciomen3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen3" value="<?php echo $this->form_encode_input($preciomen3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomen3_label" id="hidden_field_label_preciomen3" style="<?php echo $sStyleHidden_preciomen3; ?>"><span id="id_label_preciomen3"><?php echo $this->nm_new_label['preciomen3']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomen3_line" id="hidden_field_data_preciomen3" style="<?php echo $sStyleHidden_preciomen3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomen3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen3"]) &&  $this->nmgp_cmp_readonly["preciomen3"] == "on") { 

 ?>
<input type="hidden" name="preciomen3" value="<?php echo $this->form_encode_input($preciomen3) . "\">" . $preciomen3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen3" class="sc-ui-readonly-preciomen3 css_preciomen3_line" style="<?php echo $sStyleReadLab_preciomen3; ?>"><?php echo $this->form_format_readonly("preciomen3", $this->form_encode_input($this->preciomen3)); ?></span><span id="id_read_off_preciomen3" class="css_read_off_preciomen3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen3; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomen3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen3" type=text name="preciomen3" value="<?php echo $this->form_encode_input($preciomen3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen3']['format_pos'] || 3 == $this->field_config['preciomen3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio2']))
    {
        $this->nm_new_label['precio2'] = "Precio Full";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio2 = $this->precio2;
   $sStyleHidden_precio2 = '';
   if (isset($this->nmgp_cmp_hidden['precio2']) && $this->nmgp_cmp_hidden['precio2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio2']);
       $sStyleHidden_precio2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio2 = 'display: none;';
   $sStyleReadInp_precio2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio2']) && $this->nmgp_cmp_readonly['precio2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio2']);
       $sStyleReadLab_precio2 = '';
       $sStyleReadInp_precio2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio2']) && $this->nmgp_cmp_hidden['precio2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio2" value="<?php echo $this->form_encode_input($precio2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio2_label" id="hidden_field_label_precio2" style="<?php echo $sStyleHidden_precio2; ?>"><span id="id_label_precio2"><?php echo $this->nm_new_label['precio2']; ?></span></TD>
    <TD class="scFormDataOdd css_precio2_line" id="hidden_field_data_precio2" style="<?php echo $sStyleHidden_precio2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio2"]) &&  $this->nmgp_cmp_readonly["precio2"] == "on") { 

 ?>
<input type="hidden" name="precio2" value="<?php echo $this->form_encode_input($precio2) . "\">" . $precio2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio2" class="sc-ui-readonly-precio2 css_precio2_line" style="<?php echo $sStyleReadLab_precio2; ?>"><?php echo $this->form_format_readonly("precio2", $this->form_encode_input($this->precio2)); ?></span><span id="id_read_off_precio2" class="css_read_off_precio2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio2; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio2" type=text name="precio2" value="<?php echo $this->form_encode_input($precio2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['precio2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['precio2']['format_pos'] || 3 == $this->field_config['precio2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciomay']))
    {
        $this->nm_new_label['preciomay'] = "Precio Especial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomay = $this->preciomay;
   $sStyleHidden_preciomay = '';
   if (isset($this->nmgp_cmp_hidden['preciomay']) && $this->nmgp_cmp_hidden['preciomay'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomay']);
       $sStyleHidden_preciomay = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomay = 'display: none;';
   $sStyleReadInp_preciomay = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomay']) && $this->nmgp_cmp_readonly['preciomay'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomay']);
       $sStyleReadLab_preciomay = '';
       $sStyleReadInp_preciomay = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomay']) && $this->nmgp_cmp_hidden['preciomay'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomay" value="<?php echo $this->form_encode_input($preciomay) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomay_label" id="hidden_field_label_preciomay" style="<?php echo $sStyleHidden_preciomay; ?>"><span id="id_label_preciomay"><?php echo $this->nm_new_label['preciomay']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomay_line" id="hidden_field_data_preciomay" style="<?php echo $sStyleHidden_preciomay; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomay_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomay"]) &&  $this->nmgp_cmp_readonly["preciomay"] == "on") { 

 ?>
<input type="hidden" name="preciomay" value="<?php echo $this->form_encode_input($preciomay) . "\">" . $preciomay . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomay" class="sc-ui-readonly-preciomay css_preciomay_line" style="<?php echo $sStyleReadLab_preciomay; ?>"><?php echo $this->form_format_readonly("preciomay", $this->form_encode_input($this->preciomay)); ?></span><span id="id_read_off_preciomay" class="css_read_off_preciomay<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomay; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomay_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomay" type=text name="preciomay" value="<?php echo $this->form_encode_input($preciomay) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomay']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomay']['format_pos'] || 3 == $this->field_config['preciomay']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomay']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomay']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomay']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomay']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomay_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomay_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciofull']))
    {
        $this->nm_new_label['preciofull'] = "Precio al Mayor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciofull = $this->preciofull;
   $sStyleHidden_preciofull = '';
   if (isset($this->nmgp_cmp_hidden['preciofull']) && $this->nmgp_cmp_hidden['preciofull'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciofull']);
       $sStyleHidden_preciofull = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciofull = 'display: none;';
   $sStyleReadInp_preciofull = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciofull']) && $this->nmgp_cmp_readonly['preciofull'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciofull']);
       $sStyleReadLab_preciofull = '';
       $sStyleReadInp_preciofull = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciofull']) && $this->nmgp_cmp_hidden['preciofull'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciofull" value="<?php echo $this->form_encode_input($preciofull) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciofull_label" id="hidden_field_label_preciofull" style="<?php echo $sStyleHidden_preciofull; ?>"><span id="id_label_preciofull"><?php echo $this->nm_new_label['preciofull']; ?></span></TD>
    <TD class="scFormDataOdd css_preciofull_line" id="hidden_field_data_preciofull" style="<?php echo $sStyleHidden_preciofull; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciofull_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciofull"]) &&  $this->nmgp_cmp_readonly["preciofull"] == "on") { 

 ?>
<input type="hidden" name="preciofull" value="<?php echo $this->form_encode_input($preciofull) . "\">" . $preciofull . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciofull" class="sc-ui-readonly-preciofull css_preciofull_line" style="<?php echo $sStyleReadLab_preciofull; ?>"><?php echo $this->form_format_readonly("preciofull", $this->form_encode_input($this->preciofull)); ?></span><span id="id_read_off_preciofull" class="css_read_off_preciofull<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciofull; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciofull_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciofull" type=text name="preciofull" value="<?php echo $this->form_encode_input($preciofull) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciofull']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciofull']['format_pos'] || 3 == $this->field_config['preciofull']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciofull']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciofull']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciofull']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciofull']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciofull_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciofull_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio_editable']))
    {
        $this->nm_new_label['precio_editable'] = "Precio Editable";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio_editable = $this->precio_editable;
   $sStyleHidden_precio_editable = '';
   if (isset($this->nmgp_cmp_hidden['precio_editable']) && $this->nmgp_cmp_hidden['precio_editable'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio_editable']);
       $sStyleHidden_precio_editable = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio_editable = 'display: none;';
   $sStyleReadInp_precio_editable = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio_editable']) && $this->nmgp_cmp_readonly['precio_editable'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio_editable']);
       $sStyleReadLab_precio_editable = '';
       $sStyleReadInp_precio_editable = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio_editable']) && $this->nmgp_cmp_hidden['precio_editable'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio_editable" value="<?php echo $this->form_encode_input($precio_editable) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio_editable_label" id="hidden_field_label_precio_editable" style="<?php echo $sStyleHidden_precio_editable; ?>"><span id="id_label_precio_editable"><?php echo $this->nm_new_label['precio_editable']; ?></span></TD>
    <TD class="scFormDataOdd css_precio_editable_line" id="hidden_field_data_precio_editable" style="<?php echo $sStyleHidden_precio_editable; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio_editable_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio_editable"]) &&  $this->nmgp_cmp_readonly["precio_editable"] == "on") { 

 ?>
<input type="hidden" name="precio_editable" value="<?php echo $this->form_encode_input($precio_editable) . "\">" . $precio_editable . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio_editable" class="sc-ui-readonly-precio_editable css_precio_editable_line" style="<?php echo $sStyleReadLab_precio_editable; ?>"><?php echo $this->form_format_readonly("precio_editable", $this->form_encode_input($this->precio_editable)); ?></span><span id="id_read_off_precio_editable" class="css_read_off_precio_editable<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio_editable; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio_editable_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio_editable" type=text name="precio_editable" value="<?php echo $this->form_encode_input($precio_editable) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio_editable_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio_editable_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['fecha_vencimiento']))
   {
       $this->nm_new_label['fecha_vencimiento'] = "Fecha Vencimiento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_vencimiento = $this->fecha_vencimiento;
   $sStyleHidden_fecha_vencimiento = '';
   if (isset($this->nmgp_cmp_hidden['fecha_vencimiento']) && $this->nmgp_cmp_hidden['fecha_vencimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_vencimiento']);
       $sStyleHidden_fecha_vencimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_vencimiento = 'display: none;';
   $sStyleReadInp_fecha_vencimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_vencimiento']) && $this->nmgp_cmp_readonly['fecha_vencimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_vencimiento']);
       $sStyleReadLab_fecha_vencimiento = '';
       $sStyleReadInp_fecha_vencimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_vencimiento']) && $this->nmgp_cmp_hidden['fecha_vencimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="fecha_vencimiento" value="<?php echo $this->form_encode_input($this->fecha_vencimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_vencimiento_label" id="hidden_field_label_fecha_vencimiento" style="<?php echo $sStyleHidden_fecha_vencimiento; ?>"><span id="id_label_fecha_vencimiento"><?php echo $this->nm_new_label['fecha_vencimiento']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_vencimiento_line" id="hidden_field_data_fecha_vencimiento" style="<?php echo $sStyleHidden_fecha_vencimiento; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_vencimiento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_vencimiento"]) &&  $this->nmgp_cmp_readonly["fecha_vencimiento"] == "on") { 

$fecha_vencimiento_look = "";
 if ($this->fecha_vencimiento == "SI") { $fecha_vencimiento_look .= "SI" ;} 
 if ($this->fecha_vencimiento == "NO") { $fecha_vencimiento_look .= "NO" ;} 
 if (empty($fecha_vencimiento_look)) { $fecha_vencimiento_look = $this->fecha_vencimiento; }
?>
<input type="hidden" name="fecha_vencimiento" value="<?php echo $this->form_encode_input($fecha_vencimiento) . "\">" . $fecha_vencimiento_look . ""; ?>
<?php } else { ?>
<?php

$fecha_vencimiento_look = "";
 if ($this->fecha_vencimiento == "SI") { $fecha_vencimiento_look .= "SI" ;} 
 if ($this->fecha_vencimiento == "NO") { $fecha_vencimiento_look .= "NO" ;} 
 if (empty($fecha_vencimiento_look)) { $fecha_vencimiento_look = $this->fecha_vencimiento; }
?>
<span id="id_read_on_fecha_vencimiento" class="css_fecha_vencimiento_line"  style="<?php echo $sStyleReadLab_fecha_vencimiento; ?>"><?php echo $this->form_format_readonly("fecha_vencimiento", $this->form_encode_input($fecha_vencimiento_look)); ?></span><span id="id_read_off_fecha_vencimiento" class="css_read_off_fecha_vencimiento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_fecha_vencimiento; ?>">
 <span id="idAjaxSelect_fecha_vencimiento" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_fecha_vencimiento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_vencimiento" name="fecha_vencimiento" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SI" <?php  if ($this->fecha_vencimiento == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['Lookup_fecha_vencimiento'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->fecha_vencimiento == "NO") { echo " selected" ;} ?><?php  if (empty($this->fecha_vencimiento)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['Lookup_fecha_vencimiento'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_vencimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_vencimiento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['lote']))
   {
       $this->nm_new_label['lote'] = "Lote";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lote = $this->lote;
   $sStyleHidden_lote = '';
   if (isset($this->nmgp_cmp_hidden['lote']) && $this->nmgp_cmp_hidden['lote'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lote']);
       $sStyleHidden_lote = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lote = 'display: none;';
   $sStyleReadInp_lote = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lote']) && $this->nmgp_cmp_readonly['lote'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lote']);
       $sStyleReadLab_lote = '';
       $sStyleReadInp_lote = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lote']) && $this->nmgp_cmp_hidden['lote'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="lote" value="<?php echo $this->form_encode_input($this->lote) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lote_label" id="hidden_field_label_lote" style="<?php echo $sStyleHidden_lote; ?>"><span id="id_label_lote"><?php echo $this->nm_new_label['lote']; ?></span></TD>
    <TD class="scFormDataOdd css_lote_line" id="hidden_field_data_lote" style="<?php echo $sStyleHidden_lote; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lote_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lote"]) &&  $this->nmgp_cmp_readonly["lote"] == "on") { 

$lote_look = "";
 if ($this->lote == "SI") { $lote_look .= "SI" ;} 
 if ($this->lote == "NO") { $lote_look .= "NO" ;} 
 if (empty($lote_look)) { $lote_look = $this->lote; }
?>
<input type="hidden" name="lote" value="<?php echo $this->form_encode_input($lote) . "\">" . $lote_look . ""; ?>
<?php } else { ?>
<?php

$lote_look = "";
 if ($this->lote == "SI") { $lote_look .= "SI" ;} 
 if ($this->lote == "NO") { $lote_look .= "NO" ;} 
 if (empty($lote_look)) { $lote_look = $this->lote; }
?>
<span id="id_read_on_lote" class="css_lote_line"  style="<?php echo $sStyleReadLab_lote; ?>"><?php echo $this->form_format_readonly("lote", $this->form_encode_input($lote_look)); ?></span><span id="id_read_off_lote" class="css_read_off_lote<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_lote; ?>">
 <span id="idAjaxSelect_lote" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_lote_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lote" name="lote" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SI" <?php  if ($this->lote == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['Lookup_lote'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->lote == "NO") { echo " selected" ;} ?><?php  if (empty($this->lote)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['Lookup_lote'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lote_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lote_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['serial_codbarras']))
   {
       $this->nm_new_label['serial_codbarras'] = "Serial o Codbarras";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $serial_codbarras = $this->serial_codbarras;
   $sStyleHidden_serial_codbarras = '';
   if (isset($this->nmgp_cmp_hidden['serial_codbarras']) && $this->nmgp_cmp_hidden['serial_codbarras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['serial_codbarras']);
       $sStyleHidden_serial_codbarras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_serial_codbarras = 'display: none;';
   $sStyleReadInp_serial_codbarras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['serial_codbarras']) && $this->nmgp_cmp_readonly['serial_codbarras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['serial_codbarras']);
       $sStyleReadLab_serial_codbarras = '';
       $sStyleReadInp_serial_codbarras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['serial_codbarras']) && $this->nmgp_cmp_hidden['serial_codbarras'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="serial_codbarras" value="<?php echo $this->form_encode_input($this->serial_codbarras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_serial_codbarras_label" id="hidden_field_label_serial_codbarras" style="<?php echo $sStyleHidden_serial_codbarras; ?>"><span id="id_label_serial_codbarras"><?php echo $this->nm_new_label['serial_codbarras']; ?></span></TD>
    <TD class="scFormDataOdd css_serial_codbarras_line" id="hidden_field_data_serial_codbarras" style="<?php echo $sStyleHidden_serial_codbarras; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_serial_codbarras_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["serial_codbarras"]) &&  $this->nmgp_cmp_readonly["serial_codbarras"] == "on") { 

$serial_codbarras_look = "";
 if ($this->serial_codbarras == "SI") { $serial_codbarras_look .= "SI" ;} 
 if ($this->serial_codbarras == "NO") { $serial_codbarras_look .= "NO" ;} 
 if (empty($serial_codbarras_look)) { $serial_codbarras_look = $this->serial_codbarras; }
?>
<input type="hidden" name="serial_codbarras" value="<?php echo $this->form_encode_input($serial_codbarras) . "\">" . $serial_codbarras_look . ""; ?>
<?php } else { ?>
<?php

$serial_codbarras_look = "";
 if ($this->serial_codbarras == "SI") { $serial_codbarras_look .= "SI" ;} 
 if ($this->serial_codbarras == "NO") { $serial_codbarras_look .= "NO" ;} 
 if (empty($serial_codbarras_look)) { $serial_codbarras_look = $this->serial_codbarras; }
?>
<span id="id_read_on_serial_codbarras" class="css_serial_codbarras_line"  style="<?php echo $sStyleReadLab_serial_codbarras; ?>"><?php echo $this->form_format_readonly("serial_codbarras", $this->form_encode_input($serial_codbarras_look)); ?></span><span id="id_read_off_serial_codbarras" class="css_read_off_serial_codbarras<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_serial_codbarras; ?>">
 <span id="idAjaxSelect_serial_codbarras" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_serial_codbarras_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_serial_codbarras" name="serial_codbarras" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SI" <?php  if ($this->serial_codbarras == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['Lookup_serial_codbarras'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->serial_codbarras == "NO") { echo " selected" ;} ?><?php  if (empty($this->serial_codbarras)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['Lookup_serial_codbarras'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_serial_codbarras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_serial_codbarras_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_producto_precioscompra");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_producto_precioscompra");
 parent.scAjaxDetailHeight("form_producto_precioscompra", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_producto_precioscompra", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_producto_precioscompra", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['sc_modal'])
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
	function scBtnFn_out() {
		if ($("#sc_out_top").length && $("#sc_out_top").is(":visible")) {
		    if ($("#sc_out_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_out()
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-2").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_producto_precioscompra']['buttonStatus'] = $this->nmgp_botoes;
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
