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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Ingrese artículo"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>seleccionarproducto/seleccionarproducto_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("seleccionarproducto_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('seleccionarproducto_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('producto');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-contr" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
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
 include_once("seleccionarproducto_js0.php");
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
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['seleccionarproducto'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['seleccionarproducto'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Ingrese artículo"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['stock']))
   {
       $this->nmgp_cmp_hidden['stock'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['iva']))
   {
       $this->nmgp_cmp_hidden['iva'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['descuento']))
   {
       $this->nmgp_cmp_hidden['descuento'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['sidescuento']))
   {
       $this->nmgp_cmp_hidden['sidescuento'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tiva']))
   {
       $this->nmgp_cmp_hidden['tiva'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['precio']))
           {
               $this->nmgp_cmp_readonly['precio'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['producto']))
   {
       $this->nm_new_label['producto'] = "Producto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $producto = $this->producto;
   $sStyleHidden_producto = '';
   if (isset($this->nmgp_cmp_hidden['producto']) && $this->nmgp_cmp_hidden['producto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['producto']);
       $sStyleHidden_producto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_producto = 'display: none;';
   $sStyleReadInp_producto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['producto']) && $this->nmgp_cmp_readonly['producto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['producto']);
       $sStyleReadLab_producto = '';
       $sStyleReadInp_producto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['producto']) && $this->nmgp_cmp_hidden['producto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="producto" value="<?php echo $this->form_encode_input($this->producto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_producto_line" id="hidden_field_data_producto" style="<?php echo $sStyleHidden_producto; ?>"> <span class="scFormLabelOddFormat css_producto_label" style=""><span id="id_label_producto"><?php echo $this->nm_new_label['producto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["producto"]) &&  $this->nmgp_cmp_readonly["producto"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_precio = $this->precio;
   $old_value_stock = $this->stock;
   $old_value_iva = $this->iva;
   $old_value_tdescuento = $this->tdescuento;
   $old_value_descuento = $this->descuento;
   $old_value_sidescuento = $this->sidescuento;
   $old_value_tiva = $this->tiva;
   $old_value_subtotal = $this->subtotal;
   $old_value_ahorro = $this->ahorro;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_precio = $this->precio;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tdescuento = $this->tdescuento;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_sidescuento = $this->sidescuento;
   $unformatted_value_tiva = $this->tiva;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_ahorro = $this->ahorro;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro)  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro  FROM productos  ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->precio = $old_value_precio;
   $this->stock = $old_value_stock;
   $this->iva = $old_value_iva;
   $this->tdescuento = $old_value_tdescuento;
   $this->descuento = $old_value_descuento;
   $this->sidescuento = $old_value_sidescuento;
   $this->tiva = $old_value_tiva;
   $this->subtotal = $old_value_subtotal;
   $this->ahorro = $old_value_ahorro;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto'][] = $rs->fields[0];
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
   $producto_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->producto_1))
          {
              foreach ($this->producto_1 as $tmp_producto)
              {
                  if (trim($tmp_producto) === trim($cadaselect[1])) { $producto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->producto) === trim($cadaselect[1])) { $producto_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="producto" value="<?php echo $this->form_encode_input($producto) . "\">" . $producto_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_producto();
   $x = 0 ; 
   $producto_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->producto_1))
          {
              foreach ($this->producto_1 as $tmp_producto)
              {
                  if (trim($tmp_producto) === trim($cadaselect[1])) { $producto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->producto) === trim($cadaselect[1])) { $producto_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($producto_look))
          {
              $producto_look = $this->producto;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_producto\" class=\"css_producto_line\" style=\"" .  $sStyleReadLab_producto . "\">" . $this->form_format_readonly("producto", $this->form_encode_input($producto_look)) . "</span><span id=\"id_read_off_producto\" class=\"css_read_off_producto" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_producto . "\">";
   echo " <span id=\"idAjaxSelect_producto\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_producto_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_producto\" name=\"producto\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['Lookup_producto'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Introduzca código o nombre") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->producto) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->producto)) 
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
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cantidad']))
    {
        $this->nm_new_label['cantidad'] = "Cantidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidad = $this->cantidad;
   $sStyleHidden_cantidad = '';
   if (isset($this->nmgp_cmp_hidden['cantidad']) && $this->nmgp_cmp_hidden['cantidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidad']);
       $sStyleHidden_cantidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidad = 'display: none;';
   $sStyleReadInp_cantidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidad']) && $this->nmgp_cmp_readonly['cantidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidad']);
       $sStyleReadLab_cantidad = '';
       $sStyleReadInp_cantidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidad']) && $this->nmgp_cmp_hidden['cantidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidad" value="<?php echo $this->form_encode_input($cantidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cantidad_line" id="hidden_field_data_cantidad" style="<?php echo $sStyleHidden_cantidad; ?>"> <span class="scFormLabelOddFormat css_cantidad_label" style=""><span id="id_label_cantidad"><?php echo $this->nm_new_label['cantidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad"]) &&  $this->nmgp_cmp_readonly["cantidad"] == "on") { 

 ?>
<input type="hidden" name="cantidad" value="<?php echo $this->form_encode_input($cantidad) . "\">" . $cantidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad" class="sc-ui-readonly-cantidad css_cantidad_line" style="<?php echo $sStyleReadLab_cantidad; ?>"><?php echo $this->form_format_readonly("cantidad", $this->form_encode_input($this->cantidad)); ?></span><span id="id_read_off_cantidad" class="css_read_off_cantidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidad" type=text name="cantidad" value="<?php echo $this->form_encode_input($cantidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['precio']))
    {
        $this->nm_new_label['precio'] = "Precio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio = $this->precio;
   $sStyleHidden_precio = '';
   if (isset($this->nmgp_cmp_hidden['precio']) && $this->nmgp_cmp_hidden['precio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio']);
       $sStyleHidden_precio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio = 'display: none;';
   $sStyleReadInp_precio = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["precio"]) &&  $this->nmgp_cmp_readonly["precio"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio']);
       $sStyleReadLab_precio = '';
       $sStyleReadInp_precio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio']) && $this->nmgp_cmp_hidden['precio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio" value="<?php echo $this->form_encode_input($precio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_precio_line" id="hidden_field_data_precio" style="<?php echo $sStyleHidden_precio; ?>"> <span class="scFormLabelOddFormat css_precio_label" style=""><span id="id_label_precio"><?php echo $this->nm_new_label['precio']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["precio"]) &&  $this->nmgp_cmp_readonly["precio"] == "on")) { 

 ?>
<input type="hidden" name="precio" value="<?php echo $this->form_encode_input($precio) . "\"><span id=\"id_ajax_label_precio\">" . $precio . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_precio" class="sc-ui-readonly-precio css_precio_line" style="<?php echo $sStyleReadLab_precio; ?>"><?php echo $this->form_format_readonly("precio", $this->form_encode_input($this->precio)); ?></span><span id="id_read_off_precio" class="css_read_off_precio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio" type=text name="precio" value="<?php echo $this->form_encode_input($precio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['precio']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['precio']['format_pos'] || 3 == $this->field_config['precio']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['stock']))
    {
        $this->nm_new_label['stock'] = "Existencia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $stock = $this->stock;
   if (!isset($this->nmgp_cmp_hidden['stock']))
   {
       $this->nmgp_cmp_hidden['stock'] = 'off';
   }
   $sStyleHidden_stock = '';
   if (isset($this->nmgp_cmp_hidden['stock']) && $this->nmgp_cmp_hidden['stock'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['stock']);
       $sStyleHidden_stock = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_stock = 'display: none;';
   $sStyleReadInp_stock = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['stock']) && $this->nmgp_cmp_readonly['stock'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['stock']);
       $sStyleReadLab_stock = '';
       $sStyleReadInp_stock = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['stock']) && $this->nmgp_cmp_hidden['stock'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stock" value="<?php echo $this->form_encode_input($stock) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_stock_line" id="hidden_field_data_stock" style="<?php echo $sStyleHidden_stock; ?>"> <span class="scFormLabelOddFormat css_stock_label" style=""><span id="id_label_stock"><?php echo $this->nm_new_label['stock']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["stock"]) &&  $this->nmgp_cmp_readonly["stock"] == "on") { 

 ?>
<input type="hidden" name="stock" value="<?php echo $this->form_encode_input($stock) . "\">" . $stock . ""; ?>
<?php } else { ?>
<span id="id_read_on_stock" class="sc-ui-readonly-stock css_stock_line" style="<?php echo $sStyleReadLab_stock; ?>"><?php echo $this->form_format_readonly("stock", $this->form_encode_input($this->stock)); ?></span><span id="id_read_off_stock" class="css_read_off_stock<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_stock; ?>">
 <input class="sc-js-input scFormObjectOdd css_stock_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_stock" type=text name="stock" value="<?php echo $this->form_encode_input($stock) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['stock']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['stock']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['stock']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['stock']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['iva']))
    {
        $this->nm_new_label['iva'] = "IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iva = $this->iva;
   if (!isset($this->nmgp_cmp_hidden['iva']))
   {
       $this->nmgp_cmp_hidden['iva'] = 'off';
   }
   $sStyleHidden_iva = '';
   if (isset($this->nmgp_cmp_hidden['iva']) && $this->nmgp_cmp_hidden['iva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iva']);
       $sStyleHidden_iva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iva = 'display: none;';
   $sStyleReadInp_iva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iva']) && $this->nmgp_cmp_readonly['iva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iva']);
       $sStyleReadLab_iva = '';
       $sStyleReadInp_iva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iva']) && $this->nmgp_cmp_hidden['iva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iva" value="<?php echo $this->form_encode_input($iva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_iva_line" id="hidden_field_data_iva" style="<?php echo $sStyleHidden_iva; ?>"> <span class="scFormLabelOddFormat css_iva_label" style=""><span id="id_label_iva"><?php echo $this->nm_new_label['iva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iva"]) &&  $this->nmgp_cmp_readonly["iva"] == "on") { 

 ?>
<input type="hidden" name="iva" value="<?php echo $this->form_encode_input($iva) . "\">" . $iva . ""; ?>
<?php } else { ?>
<span id="id_read_on_iva" class="sc-ui-readonly-iva css_iva_line" style="<?php echo $sStyleReadLab_iva; ?>"><?php echo $this->form_format_readonly("iva", $this->form_encode_input($this->iva)); ?></span><span id="id_read_off_iva" class="css_read_off_iva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_iva; ?>">
 <input class="sc-js-input scFormObjectOdd css_iva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_iva" type=text name="iva" value="<?php echo $this->form_encode_input($iva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['iva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['iva']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['iva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tdescuento']))
    {
        $this->nm_new_label['tdescuento'] = "% Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tdescuento = $this->tdescuento;
   $sStyleHidden_tdescuento = '';
   if (isset($this->nmgp_cmp_hidden['tdescuento']) && $this->nmgp_cmp_hidden['tdescuento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tdescuento']);
       $sStyleHidden_tdescuento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tdescuento = 'display: none;';
   $sStyleReadInp_tdescuento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tdescuento']) && $this->nmgp_cmp_readonly['tdescuento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tdescuento']);
       $sStyleReadLab_tdescuento = '';
       $sStyleReadInp_tdescuento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tdescuento']) && $this->nmgp_cmp_hidden['tdescuento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tdescuento" value="<?php echo $this->form_encode_input($tdescuento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tdescuento_line" id="hidden_field_data_tdescuento" style="<?php echo $sStyleHidden_tdescuento; ?>"> <span class="scFormLabelOddFormat css_tdescuento_label" style=""><span id="id_label_tdescuento"><?php echo $this->nm_new_label['tdescuento']; ?></span></span><br><input type="hidden" name="tdescuento" value="<?php echo $this->form_encode_input($tdescuento); ?>"><span id="id_ajax_label_tdescuento"><?php echo nl2br($tdescuento); ?></span>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['descuento']))
    {
        $this->nm_new_label['descuento'] = "Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descuento = $this->descuento;
   if (!isset($this->nmgp_cmp_hidden['descuento']))
   {
       $this->nmgp_cmp_hidden['descuento'] = 'off';
   }
   $sStyleHidden_descuento = '';
   if (isset($this->nmgp_cmp_hidden['descuento']) && $this->nmgp_cmp_hidden['descuento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descuento']);
       $sStyleHidden_descuento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descuento = 'display: none;';
   $sStyleReadInp_descuento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descuento']) && $this->nmgp_cmp_readonly['descuento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descuento']);
       $sStyleReadLab_descuento = '';
       $sStyleReadInp_descuento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descuento']) && $this->nmgp_cmp_hidden['descuento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descuento" value="<?php echo $this->form_encode_input($descuento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descuento_line" id="hidden_field_data_descuento" style="<?php echo $sStyleHidden_descuento; ?>"> <span class="scFormLabelOddFormat css_descuento_label" style=""><span id="id_label_descuento"><?php echo $this->nm_new_label['descuento']; ?></span></span><br><input type="hidden" name="descuento" value="<?php echo $this->form_encode_input($descuento); ?>"><span id="id_ajax_label_descuento"><?php echo nl2br($descuento); ?></span>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_producto_dumb = ('' == $sStyleHidden_producto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_producto_dumb" style="<?php echo $sStyleHidden_producto_dumb; ?>"></TD>
<?php $sStyleHidden_cantidad_dumb = ('' == $sStyleHidden_cantidad) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cantidad_dumb" style="<?php echo $sStyleHidden_cantidad_dumb; ?>"></TD>
<?php $sStyleHidden_precio_dumb = ('' == $sStyleHidden_precio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_precio_dumb" style="<?php echo $sStyleHidden_precio_dumb; ?>"></TD>
<?php $sStyleHidden_stock_dumb = ('' == $sStyleHidden_stock) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_stock_dumb" style="<?php echo $sStyleHidden_stock_dumb; ?>"></TD>
<?php $sStyleHidden_iva_dumb = ('' == $sStyleHidden_iva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_iva_dumb" style="<?php echo $sStyleHidden_iva_dumb; ?>"></TD>
<?php $sStyleHidden_tdescuento_dumb = ('' == $sStyleHidden_tdescuento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tdescuento_dumb" style="<?php echo $sStyleHidden_tdescuento_dumb; ?>"></TD>
<?php $sStyleHidden_descuento_dumb = ('' == $sStyleHidden_descuento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_descuento_dumb" style="<?php echo $sStyleHidden_descuento_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sidescuento']))
    {
        $this->nm_new_label['sidescuento'] = "sidescuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sidescuento = $this->sidescuento;
   if (!isset($this->nmgp_cmp_hidden['sidescuento']))
   {
       $this->nmgp_cmp_hidden['sidescuento'] = 'off';
   }
   $sStyleHidden_sidescuento = '';
   if (isset($this->nmgp_cmp_hidden['sidescuento']) && $this->nmgp_cmp_hidden['sidescuento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sidescuento']);
       $sStyleHidden_sidescuento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sidescuento = 'display: none;';
   $sStyleReadInp_sidescuento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sidescuento']) && $this->nmgp_cmp_readonly['sidescuento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sidescuento']);
       $sStyleReadLab_sidescuento = '';
       $sStyleReadInp_sidescuento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sidescuento']) && $this->nmgp_cmp_hidden['sidescuento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sidescuento" value="<?php echo $this->form_encode_input($sidescuento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sidescuento_line" id="hidden_field_data_sidescuento" style="<?php echo $sStyleHidden_sidescuento; ?>"> <span class="scFormLabelOddFormat css_sidescuento_label" style=""><span id="id_label_sidescuento"><?php echo $this->nm_new_label['sidescuento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sidescuento"]) &&  $this->nmgp_cmp_readonly["sidescuento"] == "on") { 

 ?>
<input type="hidden" name="sidescuento" value="<?php echo $this->form_encode_input($sidescuento) . "\">" . $sidescuento . ""; ?>
<?php } else { ?>
<span id="id_read_on_sidescuento" class="sc-ui-readonly-sidescuento css_sidescuento_line" style="<?php echo $sStyleReadLab_sidescuento; ?>"><?php echo $this->form_format_readonly("sidescuento", $this->form_encode_input($this->sidescuento)); ?></span><span id="id_read_off_sidescuento" class="css_read_off_sidescuento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sidescuento; ?>">
 <input class="sc-js-input scFormObjectOdd css_sidescuento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sidescuento" type=text name="sidescuento" value="<?php echo $this->form_encode_input($sidescuento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sidescuento']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sidescuento']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sidescuento']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tiva']))
    {
        $this->nm_new_label['tiva'] = "T_Iva";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tiva = $this->tiva;
   if (!isset($this->nmgp_cmp_hidden['tiva']))
   {
       $this->nmgp_cmp_hidden['tiva'] = 'off';
   }
   $sStyleHidden_tiva = '';
   if (isset($this->nmgp_cmp_hidden['tiva']) && $this->nmgp_cmp_hidden['tiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tiva']);
       $sStyleHidden_tiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tiva = 'display: none;';
   $sStyleReadInp_tiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tiva']) && $this->nmgp_cmp_readonly['tiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tiva']);
       $sStyleReadLab_tiva = '';
       $sStyleReadInp_tiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tiva']) && $this->nmgp_cmp_hidden['tiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tiva" value="<?php echo $this->form_encode_input($tiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tiva_line" id="hidden_field_data_tiva" style="<?php echo $sStyleHidden_tiva; ?>"> <span class="scFormLabelOddFormat css_tiva_label" style=""><span id="id_label_tiva"><?php echo $this->nm_new_label['tiva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tiva"]) &&  $this->nmgp_cmp_readonly["tiva"] == "on") { 

 ?>
<input type="hidden" name="tiva" value="<?php echo $this->form_encode_input($tiva) . "\">" . $tiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_tiva" class="sc-ui-readonly-tiva css_tiva_line" style="<?php echo $sStyleReadLab_tiva; ?>"><?php echo $this->form_format_readonly("tiva", $this->form_encode_input($this->tiva)); ?></span><span id="id_read_off_tiva" class="css_read_off_tiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_tiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tiva" type=text name="tiva" value="<?php echo $this->form_encode_input($tiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['tiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tiva']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="5" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_sidescuento_dumb = ('' == $sStyleHidden_sidescuento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sidescuento_dumb" style="<?php echo $sStyleHidden_sidescuento_dumb; ?>"></TD>
<?php $sStyleHidden_tiva_dumb = ('' == $sStyleHidden_tiva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tiva_dumb" style="<?php echo $sStyleHidden_tiva_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="100%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['subtotal']))
    {
        $this->nm_new_label['subtotal'] = "SU FACTURA VA EN:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $subtotal = $this->subtotal;
   $sStyleHidden_subtotal = '';
   if (isset($this->nmgp_cmp_hidden['subtotal']) && $this->nmgp_cmp_hidden['subtotal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['subtotal']);
       $sStyleHidden_subtotal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_subtotal = 'display: none;';
   $sStyleReadInp_subtotal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['subtotal']) && $this->nmgp_cmp_readonly['subtotal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['subtotal']);
       $sStyleReadLab_subtotal = '';
       $sStyleReadInp_subtotal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['subtotal']) && $this->nmgp_cmp_hidden['subtotal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subtotal" value="<?php echo $this->form_encode_input($subtotal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_subtotal_line" id="hidden_field_data_subtotal" style="<?php echo $sStyleHidden_subtotal; ?>"> <span class="scFormLabelOddFormat css_subtotal_label" style=""><span id="id_label_subtotal"><?php echo $this->nm_new_label['subtotal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subtotal"]) &&  $this->nmgp_cmp_readonly["subtotal"] == "on") { 

 ?>
<input type="hidden" name="subtotal" value="<?php echo $this->form_encode_input($subtotal) . "\">" . $subtotal . ""; ?>
<?php } else { ?>
<span id="id_read_on_subtotal" class="sc-ui-readonly-subtotal css_subtotal_line" style="<?php echo $sStyleReadLab_subtotal; ?>"><?php echo $this->form_format_readonly("subtotal", $this->form_encode_input($this->subtotal)); ?></span><span id="id_read_off_subtotal" class="css_read_off_subtotal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_subtotal; ?>">
 <input class="sc-js-input scFormObjectOdd css_subtotal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_subtotal" type=text name="subtotal" value="<?php echo $this->form_encode_input($subtotal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['subtotal']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['subtotal']['format_pos'] || 3 == $this->field_config['subtotal']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['subtotal']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['subtotal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['subtotal']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['subtotal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ahorro']))
    {
        $this->nm_new_label['ahorro'] = "DESCUENTO EN:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ahorro = $this->ahorro;
   $sStyleHidden_ahorro = '';
   if (isset($this->nmgp_cmp_hidden['ahorro']) && $this->nmgp_cmp_hidden['ahorro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ahorro']);
       $sStyleHidden_ahorro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ahorro = 'display: none;';
   $sStyleReadInp_ahorro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ahorro']) && $this->nmgp_cmp_readonly['ahorro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ahorro']);
       $sStyleReadLab_ahorro = '';
       $sStyleReadInp_ahorro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ahorro']) && $this->nmgp_cmp_hidden['ahorro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ahorro" value="<?php echo $this->form_encode_input($ahorro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ahorro_line" id="hidden_field_data_ahorro" style="<?php echo $sStyleHidden_ahorro; ?>"> <span class="scFormLabelOddFormat css_ahorro_label" style=""><span id="id_label_ahorro"><?php echo $this->nm_new_label['ahorro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ahorro"]) &&  $this->nmgp_cmp_readonly["ahorro"] == "on") { 

 ?>
<input type="hidden" name="ahorro" value="<?php echo $this->form_encode_input($ahorro) . "\">" . $ahorro . ""; ?>
<?php } else { ?>
<span id="id_read_on_ahorro" class="sc-ui-readonly-ahorro css_ahorro_line" style="<?php echo $sStyleReadLab_ahorro; ?>"><?php echo $this->form_format_readonly("ahorro", $this->form_encode_input($this->ahorro)); ?></span><span id="id_read_off_ahorro" class="css_read_off_ahorro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ahorro; ?>">
 <input class="sc-js-input scFormObjectOdd css_ahorro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ahorro" type=text name="ahorro" value="<?php echo $this->form_encode_input($ahorro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['ahorro']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['ahorro']['format_pos'] || 3 == $this->field_config['ahorro']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ahorro']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ahorro']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ahorro']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ahorro']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['ok'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("seleccionarproducto");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("seleccionarproducto");
 parent.scAjaxDetailHeight("seleccionarproducto", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("seleccionarproducto", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("seleccionarproducto", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['sc_modal'])
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
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
		    if ($("#sc_b_hlp_b").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['seleccionarproducto']['buttonStatus'] = $this->nmgp_botoes;
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
