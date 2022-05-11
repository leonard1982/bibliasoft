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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Nuevo Tarifa Impuesto"); } else { echo strip_tags("Tabla de Impuestos (IVA, CONSUMO)"); } ?></TITLE>
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_iva/form_iva_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_iva_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_iva_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('trifa');

<?php
}
?>
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
$str_iframe_body = 'margin-top: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_iva_js0.php");
?>
<script type="text/javascript"> 
nmdg_enter_tab = true;
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
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_iva'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_iva'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['maximized']))
  {
?>
<tr><td>
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scFormHeaderFont">
          <?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/usr__NM__bg__NM__1486394955-13-tax_80558.png';echo '<IMG SRC="usr__NM__bg__NM__1486394955-13-tax_80558.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/usr__NM__bg__NM__1486394955-13-tax_80558.png';}?>" BORDER="0"/>
        </TD>
        <TD class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "Nuevo Tarifa Impuesto"; } else { echo "Tabla de Impuestos (IVA, CONSUMO)"; } ?>
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scFormHeaderFont">
          <?php echo date($this->dateDefaultFormat()); ?>
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['codigo']))
   {
       $this->nmgp_cmp_hidden['codigo'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['trifa']))
    {
        $this->nm_new_label['trifa'] = "Tasa Impuesto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $trifa = $this->trifa;
   $sStyleHidden_trifa = '';
   if (isset($this->nmgp_cmp_hidden['trifa']) && $this->nmgp_cmp_hidden['trifa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['trifa']);
       $sStyleHidden_trifa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_trifa = 'display: none;';
   $sStyleReadInp_trifa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['trifa']) && $this->nmgp_cmp_readonly['trifa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['trifa']);
       $sStyleReadLab_trifa = '';
       $sStyleReadInp_trifa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['trifa']) && $this->nmgp_cmp_hidden['trifa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trifa" value="<?php echo $this->form_encode_input($trifa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_trifa_label" id="hidden_field_label_trifa" style="<?php echo $sStyleHidden_trifa; ?>"><span id="id_label_trifa"><?php echo $this->nm_new_label['trifa']; ?></span></TD>
    <TD class="scFormDataOdd css_trifa_line" id="hidden_field_data_trifa" style="<?php echo $sStyleHidden_trifa; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trifa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trifa"]) &&  $this->nmgp_cmp_readonly["trifa"] == "on") { 

 ?>
<input type="hidden" name="trifa" value="<?php echo $this->form_encode_input($trifa) . "\">" . $trifa . ""; ?>
<?php } else { ?>
<span id="id_read_on_trifa" class="sc-ui-readonly-trifa css_trifa_line" style="<?php echo $sStyleReadLab_trifa; ?>"><?php echo $this->form_format_readonly("trifa", $this->form_encode_input($this->trifa)); ?></span><span id="id_read_off_trifa" class="css_read_off_trifa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_trifa; ?>">
 <input class="sc-js-input scFormObjectOdd css_trifa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_trifa" type=text name="trifa" value="<?php echo $this->form_encode_input($trifa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['trifa']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['trifa']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['trifa']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trifa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trifa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo_impuesto']))
    {
        $this->nm_new_label['tipo_impuesto'] = "Tipo de Impuesto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_impuesto = $this->tipo_impuesto;
   $sStyleHidden_tipo_impuesto = '';
   if (isset($this->nmgp_cmp_hidden['tipo_impuesto']) && $this->nmgp_cmp_hidden['tipo_impuesto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_impuesto']);
       $sStyleHidden_tipo_impuesto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_impuesto = 'display: none;';
   $sStyleReadInp_tipo_impuesto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_impuesto']) && $this->nmgp_cmp_readonly['tipo_impuesto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_impuesto']);
       $sStyleReadLab_tipo_impuesto = '';
       $sStyleReadInp_tipo_impuesto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_impuesto']) && $this->nmgp_cmp_hidden['tipo_impuesto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_impuesto" value="<?php echo $this->form_encode_input($tipo_impuesto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_impuesto_label" id="hidden_field_label_tipo_impuesto" style="<?php echo $sStyleHidden_tipo_impuesto; ?>"><span id="id_label_tipo_impuesto"><?php echo $this->nm_new_label['tipo_impuesto']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_impuesto_line" id="hidden_field_data_tipo_impuesto" style="<?php echo $sStyleHidden_tipo_impuesto; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_impuesto_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_impuesto"]) &&  $this->nmgp_cmp_readonly["tipo_impuesto"] == "on") { 

 ?>
<input type="hidden" name="tipo_impuesto" value="<?php echo $this->form_encode_input($tipo_impuesto) . "\">" . $tipo_impuesto . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_impuesto" class="sc-ui-readonly-tipo_impuesto css_tipo_impuesto_line" style="<?php echo $sStyleReadLab_tipo_impuesto; ?>"><?php echo $this->form_format_readonly("tipo_impuesto", $this->form_encode_input($this->tipo_impuesto)); ?></span><span id="id_read_off_tipo_impuesto" class="css_read_off_tipo_impuesto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_impuesto; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo_impuesto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_impuesto" type=text name="tipo_impuesto" value="<?php echo $this->form_encode_input($tipo_impuesto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_impuesto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_impuesto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo']))
    {
        $this->nm_new_label['codigo'] = "Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo = $this->codigo;
   if (!isset($this->nmgp_cmp_hidden['codigo']))
   {
       $this->nmgp_cmp_hidden['codigo'] = 'off';
   }
   $sStyleHidden_codigo = '';
   if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo']);
       $sStyleHidden_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo = 'display: none;';
   $sStyleReadInp_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo']) && $this->nmgp_cmp_readonly['codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo']);
       $sStyleReadLab_codigo = '';
       $sStyleReadInp_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigo_label" id="hidden_field_label_codigo" style="<?php echo $sStyleHidden_codigo; ?>"><span id="id_label_codigo"><?php echo $this->nm_new_label['codigo']; ?></span></TD>
    <TD class="scFormDataOdd css_codigo_line" id="hidden_field_data_codigo" style="<?php echo $sStyleHidden_codigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo"]) &&  $this->nmgp_cmp_readonly["codigo"] == "on") { 

 ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">" . $codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo" class="sc-ui-readonly-codigo css_codigo_line" style="<?php echo $sStyleReadLab_codigo; ?>"><?php echo $this->form_format_readonly("codigo", $this->form_encode_input($this->codigo)); ?></span><span id="id_read_off_codigo" class="css_read_off_codigo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo" type=text name="codigo" value="<?php echo $this->form_encode_input($codigo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_pucaux_compras']))
   {
       $this->nm_new_label['id_pucaux_compras'] = "Auxiliar Compras";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_pucaux_compras = $this->id_pucaux_compras;
   $sStyleHidden_id_pucaux_compras = '';
   if (isset($this->nmgp_cmp_hidden['id_pucaux_compras']) && $this->nmgp_cmp_hidden['id_pucaux_compras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_pucaux_compras']);
       $sStyleHidden_id_pucaux_compras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_pucaux_compras = 'display: none;';
   $sStyleReadInp_id_pucaux_compras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_pucaux_compras']) && $this->nmgp_cmp_readonly['id_pucaux_compras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_pucaux_compras']);
       $sStyleReadLab_id_pucaux_compras = '';
       $sStyleReadInp_id_pucaux_compras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_pucaux_compras']) && $this->nmgp_cmp_hidden['id_pucaux_compras'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_pucaux_compras" value="<?php echo $this->form_encode_input($this->id_pucaux_compras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_pucaux_compras_label" id="hidden_field_label_id_pucaux_compras" style="<?php echo $sStyleHidden_id_pucaux_compras; ?>"><span id="id_label_id_pucaux_compras"><?php echo $this->nm_new_label['id_pucaux_compras']; ?></span></TD>
    <TD class="scFormDataOdd css_id_pucaux_compras_line" id="hidden_field_data_id_pucaux_compras" style="<?php echo $sStyleHidden_id_pucaux_compras; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_pucaux_compras_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_pucaux_compras"]) &&  $this->nmgp_cmp_readonly["id_pucaux_compras"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras'][] = $rs->fields[0];
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
   $id_pucaux_compras_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_compras_1))
          {
              foreach ($this->id_pucaux_compras_1 as $tmp_id_pucaux_compras)
              {
                  if (trim($tmp_id_pucaux_compras) === trim($cadaselect[1])) { $id_pucaux_compras_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_compras) === trim($cadaselect[1])) { $id_pucaux_compras_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_pucaux_compras" value="<?php echo $this->form_encode_input($id_pucaux_compras) . "\">" . $id_pucaux_compras_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_pucaux_compras();
   $x = 0 ; 
   $id_pucaux_compras_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_compras_1))
          {
              foreach ($this->id_pucaux_compras_1 as $tmp_id_pucaux_compras)
              {
                  if (trim($tmp_id_pucaux_compras) === trim($cadaselect[1])) { $id_pucaux_compras_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_compras) === trim($cadaselect[1])) { $id_pucaux_compras_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_pucaux_compras_look))
          {
              $id_pucaux_compras_look = $this->id_pucaux_compras;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_pucaux_compras\" class=\"css_id_pucaux_compras_line\" style=\"" .  $sStyleReadLab_id_pucaux_compras . "\">" . $this->form_format_readonly("id_pucaux_compras", $this->form_encode_input($id_pucaux_compras_look)) . "</span><span id=\"id_read_off_id_pucaux_compras\" class=\"css_read_off_id_pucaux_compras" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_pucaux_compras . "\">";
   echo " <span id=\"idAjaxSelect_id_pucaux_compras\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_pucaux_compras_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_pucaux_compras\" name=\"id_pucaux_compras\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_compras'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_pucaux_compras) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_pucaux_compras)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_compras*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_compras*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_id_pucaux_compras", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_pucaux_compras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_pucaux_compras_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['puc_dv_compras']))
   {
       $this->nm_new_label['puc_dv_compras'] = "Auxiliar NC Compras";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_dv_compras = $this->puc_dv_compras;
   $sStyleHidden_puc_dv_compras = '';
   if (isset($this->nmgp_cmp_hidden['puc_dv_compras']) && $this->nmgp_cmp_hidden['puc_dv_compras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_dv_compras']);
       $sStyleHidden_puc_dv_compras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_dv_compras = 'display: none;';
   $sStyleReadInp_puc_dv_compras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_dv_compras']) && $this->nmgp_cmp_readonly['puc_dv_compras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_dv_compras']);
       $sStyleReadLab_puc_dv_compras = '';
       $sStyleReadInp_puc_dv_compras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_dv_compras']) && $this->nmgp_cmp_hidden['puc_dv_compras'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="puc_dv_compras" value="<?php echo $this->form_encode_input($this->puc_dv_compras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_puc_dv_compras_label" id="hidden_field_label_puc_dv_compras" style="<?php echo $sStyleHidden_puc_dv_compras; ?>"><span id="id_label_puc_dv_compras"><?php echo $this->nm_new_label['puc_dv_compras']; ?></span></TD>
    <TD class="scFormDataOdd css_puc_dv_compras_line" id="hidden_field_data_puc_dv_compras" style="<?php echo $sStyleHidden_puc_dv_compras; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_dv_compras_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_dv_compras"]) &&  $this->nmgp_cmp_readonly["puc_dv_compras"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras'][] = $rs->fields[0];
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
   $puc_dv_compras_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->puc_dv_compras_1))
          {
              foreach ($this->puc_dv_compras_1 as $tmp_puc_dv_compras)
              {
                  if (trim($tmp_puc_dv_compras) === trim($cadaselect[1])) { $puc_dv_compras_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->puc_dv_compras) === trim($cadaselect[1])) { $puc_dv_compras_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="puc_dv_compras" value="<?php echo $this->form_encode_input($puc_dv_compras) . "\">" . $puc_dv_compras_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_puc_dv_compras();
   $x = 0 ; 
   $puc_dv_compras_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->puc_dv_compras_1))
          {
              foreach ($this->puc_dv_compras_1 as $tmp_puc_dv_compras)
              {
                  if (trim($tmp_puc_dv_compras) === trim($cadaselect[1])) { $puc_dv_compras_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->puc_dv_compras) === trim($cadaselect[1])) { $puc_dv_compras_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($puc_dv_compras_look))
          {
              $puc_dv_compras_look = $this->puc_dv_compras;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_puc_dv_compras\" class=\"css_puc_dv_compras_line\" style=\"" .  $sStyleReadLab_puc_dv_compras . "\">" . $this->form_format_readonly("puc_dv_compras", $this->form_encode_input($puc_dv_compras_look)) . "</span><span id=\"id_read_off_puc_dv_compras\" class=\"css_read_off_puc_dv_compras" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_puc_dv_compras . "\">";
   echo " <span id=\"idAjaxSelect_puc_dv_compras\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_puc_dv_compras_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_puc_dv_compras\" name=\"puc_dv_compras\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_dv_compras'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->puc_dv_compras) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->puc_dv_compras)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_puc_dv_compras*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_puc_dv_compras*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_puc_dv_compras", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_dv_compras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_dv_compras_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['puc_compras']))
   {
       $this->nm_new_label['puc_compras'] = "Auxiliar ND Compras";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puc_compras = $this->puc_compras;
   $sStyleHidden_puc_compras = '';
   if (isset($this->nmgp_cmp_hidden['puc_compras']) && $this->nmgp_cmp_hidden['puc_compras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puc_compras']);
       $sStyleHidden_puc_compras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puc_compras = 'display: none;';
   $sStyleReadInp_puc_compras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puc_compras']) && $this->nmgp_cmp_readonly['puc_compras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puc_compras']);
       $sStyleReadLab_puc_compras = '';
       $sStyleReadInp_puc_compras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puc_compras']) && $this->nmgp_cmp_hidden['puc_compras'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="puc_compras" value="<?php echo $this->form_encode_input($this->puc_compras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_puc_compras_label" id="hidden_field_label_puc_compras" style="<?php echo $sStyleHidden_puc_compras; ?>"><span id="id_label_puc_compras"><?php echo $this->nm_new_label['puc_compras']; ?></span></TD>
    <TD class="scFormDataOdd css_puc_compras_line" id="hidden_field_data_puc_compras" style="<?php echo $sStyleHidden_puc_compras; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puc_compras_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puc_compras"]) &&  $this->nmgp_cmp_readonly["puc_compras"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras'][] = $rs->fields[0];
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
   $puc_compras_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->puc_compras_1))
          {
              foreach ($this->puc_compras_1 as $tmp_puc_compras)
              {
                  if (trim($tmp_puc_compras) === trim($cadaselect[1])) { $puc_compras_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->puc_compras) === trim($cadaselect[1])) { $puc_compras_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="puc_compras" value="<?php echo $this->form_encode_input($puc_compras) . "\">" . $puc_compras_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_puc_compras();
   $x = 0 ; 
   $puc_compras_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->puc_compras_1))
          {
              foreach ($this->puc_compras_1 as $tmp_puc_compras)
              {
                  if (trim($tmp_puc_compras) === trim($cadaselect[1])) { $puc_compras_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->puc_compras) === trim($cadaselect[1])) { $puc_compras_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($puc_compras_look))
          {
              $puc_compras_look = $this->puc_compras;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_puc_compras\" class=\"css_puc_compras_line\" style=\"" .  $sStyleReadLab_puc_compras . "\">" . $this->form_format_readonly("puc_compras", $this->form_encode_input($puc_compras_look)) . "</span><span id=\"id_read_off_puc_compras\" class=\"css_read_off_puc_compras" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_puc_compras . "\">";
   echo " <span id=\"idAjaxSelect_puc_compras\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_puc_compras_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_puc_compras\" name=\"puc_compras\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_puc_compras'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->puc_compras) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->puc_compras)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_puc_compras*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_puc_compras*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_puc_compras", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puc_compras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puc_compras_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_pucaux_ventas']))
   {
       $this->nm_new_label['id_pucaux_ventas'] = "Auxiliar Ventas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_pucaux_ventas = $this->id_pucaux_ventas;
   $sStyleHidden_id_pucaux_ventas = '';
   if (isset($this->nmgp_cmp_hidden['id_pucaux_ventas']) && $this->nmgp_cmp_hidden['id_pucaux_ventas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_pucaux_ventas']);
       $sStyleHidden_id_pucaux_ventas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_pucaux_ventas = 'display: none;';
   $sStyleReadInp_id_pucaux_ventas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_pucaux_ventas']) && $this->nmgp_cmp_readonly['id_pucaux_ventas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_pucaux_ventas']);
       $sStyleReadLab_id_pucaux_ventas = '';
       $sStyleReadInp_id_pucaux_ventas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_pucaux_ventas']) && $this->nmgp_cmp_hidden['id_pucaux_ventas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_pucaux_ventas" value="<?php echo $this->form_encode_input($this->id_pucaux_ventas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_pucaux_ventas_label" id="hidden_field_label_id_pucaux_ventas" style="<?php echo $sStyleHidden_id_pucaux_ventas; ?>"><span id="id_label_id_pucaux_ventas"><?php echo $this->nm_new_label['id_pucaux_ventas']; ?></span></TD>
    <TD class="scFormDataOdd css_id_pucaux_ventas_line" id="hidden_field_data_id_pucaux_ventas" style="<?php echo $sStyleHidden_id_pucaux_ventas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_pucaux_ventas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_pucaux_ventas"]) &&  $this->nmgp_cmp_readonly["id_pucaux_ventas"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas'][] = $rs->fields[0];
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
   $id_pucaux_ventas_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_ventas_1))
          {
              foreach ($this->id_pucaux_ventas_1 as $tmp_id_pucaux_ventas)
              {
                  if (trim($tmp_id_pucaux_ventas) === trim($cadaselect[1])) { $id_pucaux_ventas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_ventas) === trim($cadaselect[1])) { $id_pucaux_ventas_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_pucaux_ventas" value="<?php echo $this->form_encode_input($id_pucaux_ventas) . "\">" . $id_pucaux_ventas_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_pucaux_ventas();
   $x = 0 ; 
   $id_pucaux_ventas_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_ventas_1))
          {
              foreach ($this->id_pucaux_ventas_1 as $tmp_id_pucaux_ventas)
              {
                  if (trim($tmp_id_pucaux_ventas) === trim($cadaselect[1])) { $id_pucaux_ventas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_ventas) === trim($cadaselect[1])) { $id_pucaux_ventas_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_pucaux_ventas_look))
          {
              $id_pucaux_ventas_look = $this->id_pucaux_ventas;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_pucaux_ventas\" class=\"css_id_pucaux_ventas_line\" style=\"" .  $sStyleReadLab_id_pucaux_ventas . "\">" . $this->form_format_readonly("id_pucaux_ventas", $this->form_encode_input($id_pucaux_ventas_look)) . "</span><span id=\"id_read_off_id_pucaux_ventas\" class=\"css_read_off_id_pucaux_ventas" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_pucaux_ventas . "\">";
   echo " <span id=\"idAjaxSelect_id_pucaux_ventas\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_pucaux_ventas_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_pucaux_ventas\" name=\"id_pucaux_ventas\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_ventas'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_pucaux_ventas) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_pucaux_ventas)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_ventas*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_ventas*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_id_pucaux_ventas", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_pucaux_ventas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_pucaux_ventas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_pucaux_nc']))
   {
       $this->nm_new_label['id_pucaux_nc'] = "Auxuliar NC Ventas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_pucaux_nc = $this->id_pucaux_nc;
   $sStyleHidden_id_pucaux_nc = '';
   if (isset($this->nmgp_cmp_hidden['id_pucaux_nc']) && $this->nmgp_cmp_hidden['id_pucaux_nc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_pucaux_nc']);
       $sStyleHidden_id_pucaux_nc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_pucaux_nc = 'display: none;';
   $sStyleReadInp_id_pucaux_nc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_pucaux_nc']) && $this->nmgp_cmp_readonly['id_pucaux_nc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_pucaux_nc']);
       $sStyleReadLab_id_pucaux_nc = '';
       $sStyleReadInp_id_pucaux_nc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_pucaux_nc']) && $this->nmgp_cmp_hidden['id_pucaux_nc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_pucaux_nc" value="<?php echo $this->form_encode_input($this->id_pucaux_nc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_pucaux_nc_label" id="hidden_field_label_id_pucaux_nc" style="<?php echo $sStyleHidden_id_pucaux_nc; ?>"><span id="id_label_id_pucaux_nc"><?php echo $this->nm_new_label['id_pucaux_nc']; ?></span></TD>
    <TD class="scFormDataOdd css_id_pucaux_nc_line" id="hidden_field_data_id_pucaux_nc" style="<?php echo $sStyleHidden_id_pucaux_nc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_pucaux_nc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_pucaux_nc"]) &&  $this->nmgp_cmp_readonly["id_pucaux_nc"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc'][] = $rs->fields[0];
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
   $id_pucaux_nc_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_nc_1))
          {
              foreach ($this->id_pucaux_nc_1 as $tmp_id_pucaux_nc)
              {
                  if (trim($tmp_id_pucaux_nc) === trim($cadaselect[1])) { $id_pucaux_nc_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_nc) === trim($cadaselect[1])) { $id_pucaux_nc_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_pucaux_nc" value="<?php echo $this->form_encode_input($id_pucaux_nc) . "\">" . $id_pucaux_nc_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_pucaux_nc();
   $x = 0 ; 
   $id_pucaux_nc_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_nc_1))
          {
              foreach ($this->id_pucaux_nc_1 as $tmp_id_pucaux_nc)
              {
                  if (trim($tmp_id_pucaux_nc) === trim($cadaselect[1])) { $id_pucaux_nc_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_nc) === trim($cadaselect[1])) { $id_pucaux_nc_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_pucaux_nc_look))
          {
              $id_pucaux_nc_look = $this->id_pucaux_nc;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_pucaux_nc\" class=\"css_id_pucaux_nc_line\" style=\"" .  $sStyleReadLab_id_pucaux_nc . "\">" . $this->form_format_readonly("id_pucaux_nc", $this->form_encode_input($id_pucaux_nc_look)) . "</span><span id=\"id_read_off_id_pucaux_nc\" class=\"css_read_off_id_pucaux_nc" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_pucaux_nc . "\">";
   echo " <span id=\"idAjaxSelect_id_pucaux_nc\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_pucaux_nc_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_pucaux_nc\" name=\"id_pucaux_nc\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nc'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_pucaux_nc) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_pucaux_nc)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_nc*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_nc*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_id_pucaux_nc", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_pucaux_nc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_pucaux_nc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_pucaux_nd']))
   {
       $this->nm_new_label['id_pucaux_nd'] = "Auxiliar ND en Ventas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_pucaux_nd = $this->id_pucaux_nd;
   $sStyleHidden_id_pucaux_nd = '';
   if (isset($this->nmgp_cmp_hidden['id_pucaux_nd']) && $this->nmgp_cmp_hidden['id_pucaux_nd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_pucaux_nd']);
       $sStyleHidden_id_pucaux_nd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_pucaux_nd = 'display: none;';
   $sStyleReadInp_id_pucaux_nd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_pucaux_nd']) && $this->nmgp_cmp_readonly['id_pucaux_nd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_pucaux_nd']);
       $sStyleReadLab_id_pucaux_nd = '';
       $sStyleReadInp_id_pucaux_nd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_pucaux_nd']) && $this->nmgp_cmp_hidden['id_pucaux_nd'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_pucaux_nd" value="<?php echo $this->form_encode_input($this->id_pucaux_nd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_pucaux_nd_label" id="hidden_field_label_id_pucaux_nd" style="<?php echo $sStyleHidden_id_pucaux_nd; ?>"><span id="id_label_id_pucaux_nd"><?php echo $this->nm_new_label['id_pucaux_nd']; ?></span></TD>
    <TD class="scFormDataOdd css_id_pucaux_nd_line" id="hidden_field_data_id_pucaux_nd" style="<?php echo $sStyleHidden_id_pucaux_nd; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_pucaux_nd_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_pucaux_nd"]) &&  $this->nmgp_cmp_readonly["id_pucaux_nd"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd'][] = $rs->fields[0];
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
   $id_pucaux_nd_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_nd_1))
          {
              foreach ($this->id_pucaux_nd_1 as $tmp_id_pucaux_nd)
              {
                  if (trim($tmp_id_pucaux_nd) === trim($cadaselect[1])) { $id_pucaux_nd_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_nd) === trim($cadaselect[1])) { $id_pucaux_nd_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_pucaux_nd" value="<?php echo $this->form_encode_input($id_pucaux_nd) . "\">" . $id_pucaux_nd_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_pucaux_nd();
   $x = 0 ; 
   $id_pucaux_nd_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_nd_1))
          {
              foreach ($this->id_pucaux_nd_1 as $tmp_id_pucaux_nd)
              {
                  if (trim($tmp_id_pucaux_nd) === trim($cadaselect[1])) { $id_pucaux_nd_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_nd) === trim($cadaselect[1])) { $id_pucaux_nd_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_pucaux_nd_look))
          {
              $id_pucaux_nd_look = $this->id_pucaux_nd;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_pucaux_nd\" class=\"css_id_pucaux_nd_line\" style=\"" .  $sStyleReadLab_id_pucaux_nd . "\">" . $this->form_format_readonly("id_pucaux_nd", $this->form_encode_input($id_pucaux_nd_look)) . "</span><span id=\"id_read_off_id_pucaux_nd\" class=\"css_read_off_id_pucaux_nd" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_pucaux_nd . "\">";
   echo " <span id=\"idAjaxSelect_id_pucaux_nd\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_pucaux_nd_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_pucaux_nd\" name=\"id_pucaux_nd\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_nd'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_pucaux_nd) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_pucaux_nd)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_nd*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_nd*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_id_pucaux_nd", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_pucaux_nd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_pucaux_nd_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_pucaux_exec']))
   {
       $this->nm_new_label['id_pucaux_exec'] = "Auxiliar Exentos";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_pucaux_exec = $this->id_pucaux_exec;
   $sStyleHidden_id_pucaux_exec = '';
   if (isset($this->nmgp_cmp_hidden['id_pucaux_exec']) && $this->nmgp_cmp_hidden['id_pucaux_exec'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_pucaux_exec']);
       $sStyleHidden_id_pucaux_exec = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_pucaux_exec = 'display: none;';
   $sStyleReadInp_id_pucaux_exec = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_pucaux_exec']) && $this->nmgp_cmp_readonly['id_pucaux_exec'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_pucaux_exec']);
       $sStyleReadLab_id_pucaux_exec = '';
       $sStyleReadInp_id_pucaux_exec = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_pucaux_exec']) && $this->nmgp_cmp_hidden['id_pucaux_exec'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_pucaux_exec" value="<?php echo $this->form_encode_input($this->id_pucaux_exec) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_pucaux_exec_label" id="hidden_field_label_id_pucaux_exec" style="<?php echo $sStyleHidden_id_pucaux_exec; ?>"><span id="id_label_id_pucaux_exec"><?php echo $this->nm_new_label['id_pucaux_exec']; ?></span></TD>
    <TD class="scFormDataOdd css_id_pucaux_exec_line" id="hidden_field_data_id_pucaux_exec" style="<?php echo $sStyleHidden_id_pucaux_exec; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_pucaux_exec_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_pucaux_exec"]) &&  $this->nmgp_cmp_readonly["id_pucaux_exec"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec'] = array(); 
    }

   $old_value_trifa = $this->trifa;
   $this->nm_tira_formatacao();


   $unformatted_value_trifa = $this->trifa;

   $nm_comando = "SELECT id, concat((select p.codigo from puc p where p.id=id_puc), codigo,' ',nombre) FROM puc_auxiliares";

   $this->trifa = $old_value_trifa;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec'][] = $rs->fields[0];
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
   $id_pucaux_exec_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_exec_1))
          {
              foreach ($this->id_pucaux_exec_1 as $tmp_id_pucaux_exec)
              {
                  if (trim($tmp_id_pucaux_exec) === trim($cadaselect[1])) { $id_pucaux_exec_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_exec) === trim($cadaselect[1])) { $id_pucaux_exec_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_pucaux_exec" value="<?php echo $this->form_encode_input($id_pucaux_exec) . "\">" . $id_pucaux_exec_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_pucaux_exec();
   $x = 0 ; 
   $id_pucaux_exec_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pucaux_exec_1))
          {
              foreach ($this->id_pucaux_exec_1 as $tmp_id_pucaux_exec)
              {
                  if (trim($tmp_id_pucaux_exec) === trim($cadaselect[1])) { $id_pucaux_exec_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pucaux_exec) === trim($cadaselect[1])) { $id_pucaux_exec_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_pucaux_exec_look))
          {
              $id_pucaux_exec_look = $this->id_pucaux_exec;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_pucaux_exec\" class=\"css_id_pucaux_exec_line\" style=\"" .  $sStyleReadLab_id_pucaux_exec . "\">" . $this->form_format_readonly("id_pucaux_exec", $this->form_encode_input($id_pucaux_exec_look)) . "</span><span id=\"id_read_off_id_pucaux_exec\" class=\"css_read_off_id_pucaux_exec" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_pucaux_exec . "\">";
   echo " <span id=\"idAjaxSelect_id_pucaux_exec\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_pucaux_exec_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_pucaux_exec\" name=\"id_pucaux_exec\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lookup_id_pucaux_exec'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_pucaux_exec) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_pucaux_exec)) 
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
   if (isset($this->Ini->sc_lig_md5["form_puc_auxiliares"]) && $this->Ini->sc_lig_md5["form_puc_auxiliares"] == "S") {
       $Parms_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_exec*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_iva@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "gidcta*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_iva_lkpedt_refresh_id_pucaux_exec*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_puc_auxiliares_edit. "', '" . $Md5_Lig . "')", "fldedt_id_pucaux_exec", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_pucaux_exec_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_pucaux_exec_text"></span></td></tr></table></td></tr></table></TD>
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

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_iva");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_iva");
 parent.scAjaxDetailHeight("form_iva", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_iva", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_iva", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['sc_modal'])
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
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-3").length && $("#sc_b_upd_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-3").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_iva']['buttonStatus'] = $this->nmgp_botoes;
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
