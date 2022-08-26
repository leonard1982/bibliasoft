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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Impresión de Etiquetas"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_codbarras_filtro/control_codbarras_filtro_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("control_codbarras_filtro_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('control_codbarras_filtro_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-contr" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['control_codbarras_filtro']['error_buffer']) && '' != $_SESSION['scriptcase']['control_codbarras_filtro']['error_buffer'])
{
    echo $_SESSION['scriptcase']['control_codbarras_filtro']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("control_codbarras_filtro_mob_js0.php");
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
               action="control_codbarras_filtro_mob.php" 
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
$_SESSION['scriptcase']['error_span_title']['control_codbarras_filtro_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_codbarras_filtro_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Impresión de Etiquetas"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__barcode_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__barcode_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__barcode_32.png';}?>" BORDER="0"/></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
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
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['empty_filter'] = true;
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
   if (!isset($this->nm_new_label['familia']))
   {
       $this->nm_new_label['familia'] = "Grupo/Familia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $familia = $this->familia;
   $sStyleHidden_familia = '';
   if (isset($this->nmgp_cmp_hidden['familia']) && $this->nmgp_cmp_hidden['familia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['familia']);
       $sStyleHidden_familia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_familia = 'display: none;';
   $sStyleReadInp_familia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['familia']) && $this->nmgp_cmp_readonly['familia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['familia']);
       $sStyleReadLab_familia = '';
       $sStyleReadInp_familia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['familia']) && $this->nmgp_cmp_hidden['familia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="familia" value="<?php echo $this->form_encode_input($this->familia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_familia_line" id="hidden_field_data_familia" style="<?php echo $sStyleHidden_familia; ?>"> <span class="scFormLabelOddFormat css_familia_label" style=""><span id="id_label_familia"><?php echo $this->nm_new_label['familia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["familia"]) &&  $this->nmgp_cmp_readonly["familia"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia'] = array(); 
    }

   $old_value_tamanio = $this->tamanio;
   $old_value_numerocolumnas = $this->numerocolumnas;
   $old_value_altura = $this->altura;
   $this->nm_tira_formatacao();


   $unformatted_value_tamanio = $this->tamanio;
   $unformatted_value_numerocolumnas = $this->numerocolumnas;
   $unformatted_value_altura = $this->altura;

   $vercodigo_val_str = "''";
   if (!empty($this->vercodigo))
   {
       if (is_array($this->vercodigo))
       {
           $Tmp_array = $this->vercodigo;
       }
       else
       {
           $Tmp_array = explode(";", $this->vercodigo);
       }
       $vercodigo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $vercodigo_val_str)
          {
             $vercodigo_val_str .= ", ";
          }
          $vercodigo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $verdescripcion_val_str = "''";
   if (!empty($this->verdescripcion))
   {
       if (is_array($this->verdescripcion))
       {
           $Tmp_array = $this->verdescripcion;
       }
       else
       {
           $Tmp_array = explode(";", $this->verdescripcion);
       }
       $verdescripcion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $verdescripcion_val_str)
          {
             $verdescripcion_val_str .= ", ";
          }
          $verdescripcion_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->tamanio = $old_value_tamanio;
   $this->numerocolumnas = $old_value_numerocolumnas;
   $this->altura = $old_value_altura;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia'][] = $rs->fields[0];
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
   $familia_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->familia_1))
          {
              foreach ($this->familia_1 as $tmp_familia)
              {
                  if (trim($tmp_familia) === trim($cadaselect[1])) { $familia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->familia) === trim($cadaselect[1])) { $familia_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="familia" value="<?php echo $this->form_encode_input($familia) . "\">" . $familia_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_familia();
   $x = 0 ; 
   $familia_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->familia_1))
          {
              foreach ($this->familia_1 as $tmp_familia)
              {
                  if (trim($tmp_familia) === trim($cadaselect[1])) { $familia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->familia) === trim($cadaselect[1])) { $familia_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($familia_look))
          {
              $familia_look = $this->familia;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_familia\" class=\"css_familia_line\" style=\"" .  $sStyleReadLab_familia . "\">" . $this->form_format_readonly("familia", $this->form_encode_input($familia_look)) . "</span><span id=\"id_read_off_familia\" class=\"css_read_off_familia" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_familia . "\">";
   echo " <span id=\"idAjaxSelect_familia\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_familia_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_familia\" name=\"familia\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_familia'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->familia) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->familia)) 
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





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo']))
    {
        $this->nm_new_label['codigo'] = "Código";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo = $this->codigo;
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

    <TD class="scFormDataOdd css_codigo_line" id="hidden_field_data_codigo" style="<?php echo $sStyleHidden_codigo; ?>"> <span class="scFormLabelOddFormat css_codigo_label" style=""><span id="id_label_codigo"><?php echo $this->nm_new_label['codigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo"]) &&  $this->nmgp_cmp_readonly["codigo"] == "on") { 

 ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">" . $codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo" class="sc-ui-readonly-codigo css_codigo_line" style="<?php echo $sStyleReadLab_codigo; ?>"><?php echo $this->form_format_readonly("codigo", $this->form_encode_input($this->codigo)); ?></span><span id="id_read_off_codigo" class="css_read_off_codigo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo" type=text name="codigo" value="<?php echo $this->form_encode_input($codigo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descripcion']))
    {
        $this->nm_new_label['descripcion'] = "Descripción";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descripcion = $this->descripcion;
   $sStyleHidden_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descripcion']);
       $sStyleHidden_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descripcion = 'display: none;';
   $sStyleReadInp_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descripcion']) && $this->nmgp_cmp_readonly['descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descripcion']);
       $sStyleReadLab_descripcion = '';
       $sStyleReadInp_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descripcion_line" id="hidden_field_data_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>"> <span class="scFormLabelOddFormat css_descripcion_label" style=""><span id="id_label_descripcion"><?php echo $this->nm_new_label['descripcion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion"]) &&  $this->nmgp_cmp_readonly["descripcion"] == "on") { 

 ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">" . $descripcion . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion" class="sc-ui-readonly-descripcion css_descripcion_line" style="<?php echo $sStyleReadLab_descripcion; ?>"><?php echo $this->form_format_readonly("descripcion", $this->form_encode_input($this->descripcion)); ?></span><span id="id_read_off_descripcion" class="css_read_off_descripcion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion; ?>">
 <input class="sc-js-input scFormObjectOdd css_descripcion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descripcion" type=text name="descripcion" value="<?php echo $this->form_encode_input($descripcion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_descripcion_dumb = ('' == $sStyleHidden_descripcion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_descripcion_dumb" style="<?php echo $sStyleHidden_descripcion_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['tamanio']))
    {
        $this->nm_new_label['tamanio'] = "Tamaño Letra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tamanio = $this->tamanio;
   $sStyleHidden_tamanio = '';
   if (isset($this->nmgp_cmp_hidden['tamanio']) && $this->nmgp_cmp_hidden['tamanio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tamanio']);
       $sStyleHidden_tamanio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tamanio = 'display: none;';
   $sStyleReadInp_tamanio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tamanio']) && $this->nmgp_cmp_readonly['tamanio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tamanio']);
       $sStyleReadLab_tamanio = '';
       $sStyleReadInp_tamanio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tamanio']) && $this->nmgp_cmp_hidden['tamanio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tamanio" value="<?php echo $this->form_encode_input($tamanio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tamanio_line" id="hidden_field_data_tamanio" style="<?php echo $sStyleHidden_tamanio; ?>"> <span class="scFormLabelOddFormat css_tamanio_label" style=""><span id="id_label_tamanio"><?php echo $this->nm_new_label['tamanio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tamanio"]) &&  $this->nmgp_cmp_readonly["tamanio"] == "on") { 

 ?>
<input type="hidden" name="tamanio" value="<?php echo $this->form_encode_input($tamanio) . "\">" . $tamanio . ""; ?>
<?php } else { ?>
<span id="id_read_on_tamanio" class="sc-ui-readonly-tamanio css_tamanio_line" style="<?php echo $sStyleReadLab_tamanio; ?>"><?php echo $this->form_format_readonly("tamanio", $this->form_encode_input($this->tamanio)); ?></span><span id="id_read_off_tamanio" class="css_read_off_tamanio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tamanio; ?>">
 <input class="sc-js-input scFormObjectOdd css_tamanio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tamanio" type=text name="tamanio" value="<?php echo $this->form_encode_input($tamanio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tamanio']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tamanio']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tamanio']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipoletra']))
   {
       $this->nm_new_label['tipoletra'] = "Tipo Letra";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoletra = $this->tipoletra;
   $sStyleHidden_tipoletra = '';
   if (isset($this->nmgp_cmp_hidden['tipoletra']) && $this->nmgp_cmp_hidden['tipoletra'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoletra']);
       $sStyleHidden_tipoletra = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoletra = 'display: none;';
   $sStyleReadInp_tipoletra = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipoletra']) && $this->nmgp_cmp_readonly['tipoletra'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoletra']);
       $sStyleReadLab_tipoletra = '';
       $sStyleReadInp_tipoletra = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoletra']) && $this->nmgp_cmp_hidden['tipoletra'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipoletra" value="<?php echo $this->form_encode_input($this->tipoletra) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipoletra_line" id="hidden_field_data_tipoletra" style="<?php echo $sStyleHidden_tipoletra; ?>"> <span class="scFormLabelOddFormat css_tipoletra_label" style=""><span id="id_label_tipoletra"><?php echo $this->nm_new_label['tipoletra']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoletra"]) &&  $this->nmgp_cmp_readonly["tipoletra"] == "on") { 

$tipoletra_look = "";
 if ($this->tipoletra == "Arial") { $tipoletra_look .= "Arial" ;} 
 if ($this->tipoletra == "Helvetica") { $tipoletra_look .= "Helvetica" ;} 
 if ($this->tipoletra == "sans") { $tipoletra_look .= "sans-serif" ;} 
 if ($this->tipoletra == "Tahoma") { $tipoletra_look .= "Tahoma" ;} 
 if ($this->tipoletra == "Georgia") { $tipoletra_look .= "Georgia" ;} 
 if ($this->tipoletra == "Verdana") { $tipoletra_look .= "Verdana" ;} 
 if (empty($tipoletra_look)) { $tipoletra_look = $this->tipoletra; }
?>
<input type="hidden" name="tipoletra" value="<?php echo $this->form_encode_input($tipoletra) . "\">" . $tipoletra_look . ""; ?>
<?php } else { ?>
<?php

$tipoletra_look = "";
 if ($this->tipoletra == "Arial") { $tipoletra_look .= "Arial" ;} 
 if ($this->tipoletra == "Helvetica") { $tipoletra_look .= "Helvetica" ;} 
 if ($this->tipoletra == "sans") { $tipoletra_look .= "sans-serif" ;} 
 if ($this->tipoletra == "Tahoma") { $tipoletra_look .= "Tahoma" ;} 
 if ($this->tipoletra == "Georgia") { $tipoletra_look .= "Georgia" ;} 
 if ($this->tipoletra == "Verdana") { $tipoletra_look .= "Verdana" ;} 
 if (empty($tipoletra_look)) { $tipoletra_look = $this->tipoletra; }
?>
<span id="id_read_on_tipoletra" class="css_tipoletra_line"  style="<?php echo $sStyleReadLab_tipoletra; ?>"><?php echo $this->form_format_readonly("tipoletra", $this->form_encode_input($tipoletra_look)); ?></span><span id="id_read_off_tipoletra" class="css_read_off_tipoletra<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipoletra; ?>">
 <span id="idAjaxSelect_tipoletra" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipoletra_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoletra" name="tipoletra" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Arial" <?php  if ($this->tipoletra == "Arial") { echo " selected" ;} ?><?php  if (empty($this->tipoletra)) { echo " selected" ;} ?>>Arial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoletra'][] = 'Arial'; ?>
 <option  value="Helvetica" <?php  if ($this->tipoletra == "Helvetica") { echo " selected" ;} ?>>Helvetica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoletra'][] = 'Helvetica'; ?>
 <option  value="sans" <?php  if ($this->tipoletra == "sans") { echo " selected" ;} ?>>sans-serif</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoletra'][] = 'sans'; ?>
 <option  value="Tahoma" <?php  if ($this->tipoletra == "Tahoma") { echo " selected" ;} ?>>Tahoma</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoletra'][] = 'Tahoma'; ?>
 <option  value="Georgia" <?php  if ($this->tipoletra == "Georgia") { echo " selected" ;} ?>>Georgia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoletra'][] = 'Georgia'; ?>
 <option  value="Verdana" <?php  if ($this->tipoletra == "Verdana") { echo " selected" ;} ?>>Verdana</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoletra'][] = 'Verdana'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numerocolumnas']))
    {
        $this->nm_new_label['numerocolumnas'] = "Columnas  por Hoja";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numerocolumnas = $this->numerocolumnas;
   $sStyleHidden_numerocolumnas = '';
   if (isset($this->nmgp_cmp_hidden['numerocolumnas']) && $this->nmgp_cmp_hidden['numerocolumnas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numerocolumnas']);
       $sStyleHidden_numerocolumnas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numerocolumnas = 'display: none;';
   $sStyleReadInp_numerocolumnas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numerocolumnas']) && $this->nmgp_cmp_readonly['numerocolumnas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numerocolumnas']);
       $sStyleReadLab_numerocolumnas = '';
       $sStyleReadInp_numerocolumnas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numerocolumnas']) && $this->nmgp_cmp_hidden['numerocolumnas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numerocolumnas" value="<?php echo $this->form_encode_input($numerocolumnas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numerocolumnas_line" id="hidden_field_data_numerocolumnas" style="<?php echo $sStyleHidden_numerocolumnas; ?>"> <span class="scFormLabelOddFormat css_numerocolumnas_label" style=""><span id="id_label_numerocolumnas"><?php echo $this->nm_new_label['numerocolumnas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numerocolumnas"]) &&  $this->nmgp_cmp_readonly["numerocolumnas"] == "on") { 

 ?>
<input type="hidden" name="numerocolumnas" value="<?php echo $this->form_encode_input($numerocolumnas) . "\">" . $numerocolumnas . ""; ?>
<?php } else { ?>
<span id="id_read_on_numerocolumnas" class="sc-ui-readonly-numerocolumnas css_numerocolumnas_line" style="<?php echo $sStyleReadLab_numerocolumnas; ?>"><?php echo $this->form_format_readonly("numerocolumnas", $this->form_encode_input($this->numerocolumnas)); ?></span><span id="id_read_off_numerocolumnas" class="css_read_off_numerocolumnas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numerocolumnas; ?>">
 <input class="sc-js-input scFormObjectOdd css_numerocolumnas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numerocolumnas" type=text name="numerocolumnas" value="<?php echo $this->form_encode_input($numerocolumnas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numerocolumnas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numerocolumnas']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numerocolumnas']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipocodbarras']))
   {
       $this->nm_new_label['tipocodbarras'] = "Tipo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipocodbarras = $this->tipocodbarras;
   $sStyleHidden_tipocodbarras = '';
   if (isset($this->nmgp_cmp_hidden['tipocodbarras']) && $this->nmgp_cmp_hidden['tipocodbarras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipocodbarras']);
       $sStyleHidden_tipocodbarras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipocodbarras = 'display: none;';
   $sStyleReadInp_tipocodbarras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipocodbarras']) && $this->nmgp_cmp_readonly['tipocodbarras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipocodbarras']);
       $sStyleReadLab_tipocodbarras = '';
       $sStyleReadInp_tipocodbarras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipocodbarras']) && $this->nmgp_cmp_hidden['tipocodbarras'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipocodbarras" value="<?php echo $this->form_encode_input($this->tipocodbarras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipocodbarras_line" id="hidden_field_data_tipocodbarras" style="<?php echo $sStyleHidden_tipocodbarras; ?>"> <span class="scFormLabelOddFormat css_tipocodbarras_label" style=""><span id="id_label_tipocodbarras"><?php echo $this->nm_new_label['tipocodbarras']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipocodbarras"]) &&  $this->nmgp_cmp_readonly["tipocodbarras"] == "on") { 

$tipocodbarras_look = "";
 if ($this->tipocodbarras == "TYPE_EAN_13") { $tipocodbarras_look .= "TYPE_EAN_13" ;} 
 if ($this->tipocodbarras == "TYPE_EAN_8") { $tipocodbarras_look .= "TYPE_EAN_8" ;} 
 if ($this->tipocodbarras == "TYPE_EAN_5") { $tipocodbarras_look .= "TYPE_EAN_5" ;} 
 if ($this->tipocodbarras == "TYPE_CODE_39") { $tipocodbarras_look .= "TYPE_CODE_39" ;} 
 if ($this->tipocodbarras == "TYPE_CODE_128") { $tipocodbarras_look .= "TYPE_CODE_128" ;} 
 if ($this->tipocodbarras == "TYPE_CODE_11") { $tipocodbarras_look .= "TYPE_CODE_11" ;} 
 if ($this->tipocodbarras == "TYPE_PHARMA_CODE") { $tipocodbarras_look .= "TYPE_PHARMA_CODE" ;} 
 if (empty($tipocodbarras_look)) { $tipocodbarras_look = $this->tipocodbarras; }
?>
<input type="hidden" name="tipocodbarras" value="<?php echo $this->form_encode_input($tipocodbarras) . "\">" . $tipocodbarras_look . ""; ?>
<?php } else { ?>
<?php

$tipocodbarras_look = "";
 if ($this->tipocodbarras == "TYPE_EAN_13") { $tipocodbarras_look .= "TYPE_EAN_13" ;} 
 if ($this->tipocodbarras == "TYPE_EAN_8") { $tipocodbarras_look .= "TYPE_EAN_8" ;} 
 if ($this->tipocodbarras == "TYPE_EAN_5") { $tipocodbarras_look .= "TYPE_EAN_5" ;} 
 if ($this->tipocodbarras == "TYPE_CODE_39") { $tipocodbarras_look .= "TYPE_CODE_39" ;} 
 if ($this->tipocodbarras == "TYPE_CODE_128") { $tipocodbarras_look .= "TYPE_CODE_128" ;} 
 if ($this->tipocodbarras == "TYPE_CODE_11") { $tipocodbarras_look .= "TYPE_CODE_11" ;} 
 if ($this->tipocodbarras == "TYPE_PHARMA_CODE") { $tipocodbarras_look .= "TYPE_PHARMA_CODE" ;} 
 if (empty($tipocodbarras_look)) { $tipocodbarras_look = $this->tipocodbarras; }
?>
<span id="id_read_on_tipocodbarras" class="css_tipocodbarras_line"  style="<?php echo $sStyleReadLab_tipocodbarras; ?>"><?php echo $this->form_format_readonly("tipocodbarras", $this->form_encode_input($tipocodbarras_look)); ?></span><span id="id_read_off_tipocodbarras" class="css_read_off_tipocodbarras<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipocodbarras; ?>">
 <span id="idAjaxSelect_tipocodbarras" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipocodbarras_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipocodbarras" name="tipocodbarras" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="TYPE_EAN_13" <?php  if ($this->tipocodbarras == "TYPE_EAN_13") { echo " selected" ;} ?>>TYPE_EAN_13</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_EAN_13'; ?>
 <option  value="TYPE_EAN_8" <?php  if ($this->tipocodbarras == "TYPE_EAN_8") { echo " selected" ;} ?>>TYPE_EAN_8</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_EAN_8'; ?>
 <option  value="TYPE_EAN_5" <?php  if ($this->tipocodbarras == "TYPE_EAN_5") { echo " selected" ;} ?>>TYPE_EAN_5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_EAN_5'; ?>
 <option  value="TYPE_CODE_39" <?php  if ($this->tipocodbarras == "TYPE_CODE_39") { echo " selected" ;} ?>>TYPE_CODE_39</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_CODE_39'; ?>
 <option  value="TYPE_CODE_128" <?php  if ($this->tipocodbarras == "TYPE_CODE_128") { echo " selected" ;} ?>>TYPE_CODE_128</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_CODE_128'; ?>
 <option  value="TYPE_CODE_11" <?php  if ($this->tipocodbarras == "TYPE_CODE_11") { echo " selected" ;} ?>>TYPE_CODE_11</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_CODE_11'; ?>
 <option  value="TYPE_PHARMA_CODE" <?php  if ($this->tipocodbarras == "TYPE_PHARMA_CODE") { echo " selected" ;} ?>>TYPE_PHARMA_CODE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipocodbarras'][] = 'TYPE_PHARMA_CODE'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipoimagen']))
   {
       $this->nm_new_label['tipoimagen'] = "Tipo Imagen";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoimagen = $this->tipoimagen;
   $sStyleHidden_tipoimagen = '';
   if (isset($this->nmgp_cmp_hidden['tipoimagen']) && $this->nmgp_cmp_hidden['tipoimagen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoimagen']);
       $sStyleHidden_tipoimagen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoimagen = 'display: none;';
   $sStyleReadInp_tipoimagen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipoimagen']) && $this->nmgp_cmp_readonly['tipoimagen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoimagen']);
       $sStyleReadLab_tipoimagen = '';
       $sStyleReadInp_tipoimagen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoimagen']) && $this->nmgp_cmp_hidden['tipoimagen'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipoimagen" value="<?php echo $this->form_encode_input($this->tipoimagen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipoimagen_line" id="hidden_field_data_tipoimagen" style="<?php echo $sStyleHidden_tipoimagen; ?>"> <span class="scFormLabelOddFormat css_tipoimagen_label" style=""><span id="id_label_tipoimagen"><?php echo $this->nm_new_label['tipoimagen']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoimagen"]) &&  $this->nmgp_cmp_readonly["tipoimagen"] == "on") { 

$tipoimagen_look = "";
 if ($this->tipoimagen == "BarcodeGeneratorPNG") { $tipoimagen_look .= "PNG" ;} 
 if ($this->tipoimagen == "BarcodeGeneratorSVG") { $tipoimagen_look .= "SVG" ;} 
 if ($this->tipoimagen == "BarcodeGeneratorJPG") { $tipoimagen_look .= "JPG" ;} 
 if ($this->tipoimagen == "BarcodeGeneratorHTML") { $tipoimagen_look .= "HTML" ;} 
 if (empty($tipoimagen_look)) { $tipoimagen_look = $this->tipoimagen; }
?>
<input type="hidden" name="tipoimagen" value="<?php echo $this->form_encode_input($tipoimagen) . "\">" . $tipoimagen_look . ""; ?>
<?php } else { ?>
<?php

$tipoimagen_look = "";
 if ($this->tipoimagen == "BarcodeGeneratorPNG") { $tipoimagen_look .= "PNG" ;} 
 if ($this->tipoimagen == "BarcodeGeneratorSVG") { $tipoimagen_look .= "SVG" ;} 
 if ($this->tipoimagen == "BarcodeGeneratorJPG") { $tipoimagen_look .= "JPG" ;} 
 if ($this->tipoimagen == "BarcodeGeneratorHTML") { $tipoimagen_look .= "HTML" ;} 
 if (empty($tipoimagen_look)) { $tipoimagen_look = $this->tipoimagen; }
?>
<span id="id_read_on_tipoimagen" class="css_tipoimagen_line"  style="<?php echo $sStyleReadLab_tipoimagen; ?>"><?php echo $this->form_format_readonly("tipoimagen", $this->form_encode_input($tipoimagen_look)); ?></span><span id="id_read_off_tipoimagen" class="css_read_off_tipoimagen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipoimagen; ?>">
 <span id="idAjaxSelect_tipoimagen" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipoimagen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoimagen" name="tipoimagen" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="BarcodeGeneratorPNG" <?php  if ($this->tipoimagen == "BarcodeGeneratorPNG") { echo " selected" ;} ?><?php  if (empty($this->tipoimagen)) { echo " selected" ;} ?>>PNG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoimagen'][] = 'BarcodeGeneratorPNG'; ?>
 <option  value="BarcodeGeneratorSVG" <?php  if ($this->tipoimagen == "BarcodeGeneratorSVG") { echo " selected" ;} ?>>SVG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoimagen'][] = 'BarcodeGeneratorSVG'; ?>
 <option  value="BarcodeGeneratorJPG" <?php  if ($this->tipoimagen == "BarcodeGeneratorJPG") { echo " selected" ;} ?>>JPG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoimagen'][] = 'BarcodeGeneratorJPG'; ?>
 <option  value="BarcodeGeneratorHTML" <?php  if ($this->tipoimagen == "BarcodeGeneratorHTML") { echo " selected" ;} ?>>HTML</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_tipoimagen'][] = 'BarcodeGeneratorHTML'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['altura']))
    {
        $this->nm_new_label['altura'] = "Altura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $altura = $this->altura;
   $sStyleHidden_altura = '';
   if (isset($this->nmgp_cmp_hidden['altura']) && $this->nmgp_cmp_hidden['altura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['altura']);
       $sStyleHidden_altura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_altura = 'display: none;';
   $sStyleReadInp_altura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['altura']) && $this->nmgp_cmp_readonly['altura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['altura']);
       $sStyleReadLab_altura = '';
       $sStyleReadInp_altura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['altura']) && $this->nmgp_cmp_hidden['altura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="altura" value="<?php echo $this->form_encode_input($altura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_altura_line" id="hidden_field_data_altura" style="<?php echo $sStyleHidden_altura; ?>"> <span class="scFormLabelOddFormat css_altura_label" style=""><span id="id_label_altura"><?php echo $this->nm_new_label['altura']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["altura"]) &&  $this->nmgp_cmp_readonly["altura"] == "on") { 

 ?>
<input type="hidden" name="altura" value="<?php echo $this->form_encode_input($altura) . "\">" . $altura . ""; ?>
<?php } else { ?>
<span id="id_read_on_altura" class="sc-ui-readonly-altura css_altura_line" style="<?php echo $sStyleReadLab_altura; ?>"><?php echo $this->form_format_readonly("altura", $this->form_encode_input($this->altura)); ?></span><span id="id_read_off_altura" class="css_read_off_altura<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_altura; ?>">
 <input class="sc-js-input scFormObjectOdd css_altura_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_altura" type=text name="altura" value="<?php echo $this->form_encode_input($altura) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['altura']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['altura']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['altura']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['vercodigo']))
   {
       $this->nm_new_label['vercodigo'] = "Ver Código";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vercodigo = $this->vercodigo;
   $sStyleHidden_vercodigo = '';
   if (isset($this->nmgp_cmp_hidden['vercodigo']) && $this->nmgp_cmp_hidden['vercodigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vercodigo']);
       $sStyleHidden_vercodigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vercodigo = 'display: none;';
   $sStyleReadInp_vercodigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vercodigo']) && $this->nmgp_cmp_readonly['vercodigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vercodigo']);
       $sStyleReadLab_vercodigo = '';
       $sStyleReadInp_vercodigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vercodigo']) && $this->nmgp_cmp_hidden['vercodigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="vercodigo" value="<?php echo $this->form_encode_input($this->vercodigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->vercodigo_1 = explode(";", trim($this->vercodigo));
  } 
  else
  {
      if (empty($this->vercodigo))
      {
          $this->vercodigo_1= array(); 
          $this->vercodigo= "NO";
      } 
      else
      {
          $this->vercodigo_1= $this->vercodigo; 
          $this->vercodigo= ""; 
          foreach ($this->vercodigo_1 as $cada_vercodigo)
          {
             if (!empty($vercodigo))
             {
                 $this->vercodigo.= ";"; 
             } 
             $this->vercodigo.= $cada_vercodigo; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_vercodigo_line" id="hidden_field_data_vercodigo" style="<?php echo $sStyleHidden_vercodigo; ?>"> <span class="scFormLabelOddFormat css_vercodigo_label" style=""><span id="id_label_vercodigo"><?php echo $this->nm_new_label['vercodigo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vercodigo"]) &&  $this->nmgp_cmp_readonly["vercodigo"] == "on") { 

$vercodigo_look = "";
 if ($this->vercodigo == "SI") { $vercodigo_look .= "" ;} 
 if (empty($vercodigo_look)) { $vercodigo_look = $this->vercodigo; }
?>
<input type="hidden" name="vercodigo" value="<?php echo $this->form_encode_input($vercodigo) . "\">" . $vercodigo_look . ""; ?>
<?php } else { ?>

<?php

$vercodigo_look = "";
 if ($this->vercodigo == "SI") { $vercodigo_look .= "" ;} 
 if (empty($vercodigo_look)) { $vercodigo_look = $this->vercodigo; }
?>
<span id="id_read_on_vercodigo" class="css_vercodigo_line" style="<?php echo $sStyleReadLab_vercodigo; ?>"><?php echo $this->form_format_readonly("vercodigo", $this->form_encode_input($vercodigo_look)); ?></span><span id="id_read_off_vercodigo" class="css_read_off_vercodigo css_vercodigo_line" style="<?php echo $sStyleReadInp_vercodigo; ?>"><?php echo "<div id=\"idAjaxCheckbox_vercodigo\" style=\"display: inline-block\" class=\"css_vercodigo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_vercodigo_line"><?php $tempOptionId = "id-opt-vercodigo" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-vercodigo sc-ui-checkbox-vercodigo" name="vercodigo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_vercodigo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->vercodigo_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['verdescripcion']))
   {
       $this->nm_new_label['verdescripcion'] = "Ver Descripción";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $verdescripcion = $this->verdescripcion;
   $sStyleHidden_verdescripcion = '';
   if (isset($this->nmgp_cmp_hidden['verdescripcion']) && $this->nmgp_cmp_hidden['verdescripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['verdescripcion']);
       $sStyleHidden_verdescripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_verdescripcion = 'display: none;';
   $sStyleReadInp_verdescripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['verdescripcion']) && $this->nmgp_cmp_readonly['verdescripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['verdescripcion']);
       $sStyleReadLab_verdescripcion = '';
       $sStyleReadInp_verdescripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['verdescripcion']) && $this->nmgp_cmp_hidden['verdescripcion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="verdescripcion" value="<?php echo $this->form_encode_input($this->verdescripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->verdescripcion_1 = explode(";", trim($this->verdescripcion));
  } 
  else
  {
      if (empty($this->verdescripcion))
      {
          $this->verdescripcion_1= array(); 
          $this->verdescripcion= "NO";
      } 
      else
      {
          $this->verdescripcion_1= $this->verdescripcion; 
          $this->verdescripcion= ""; 
          foreach ($this->verdescripcion_1 as $cada_verdescripcion)
          {
             if (!empty($verdescripcion))
             {
                 $this->verdescripcion.= ";"; 
             } 
             $this->verdescripcion.= $cada_verdescripcion; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_verdescripcion_line" id="hidden_field_data_verdescripcion" style="<?php echo $sStyleHidden_verdescripcion; ?>"> <span class="scFormLabelOddFormat css_verdescripcion_label" style=""><span id="id_label_verdescripcion"><?php echo $this->nm_new_label['verdescripcion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["verdescripcion"]) &&  $this->nmgp_cmp_readonly["verdescripcion"] == "on") { 

$verdescripcion_look = "";
 if ($this->verdescripcion == "SI") { $verdescripcion_look .= "" ;} 
 if (empty($verdescripcion_look)) { $verdescripcion_look = $this->verdescripcion; }
?>
<input type="hidden" name="verdescripcion" value="<?php echo $this->form_encode_input($verdescripcion) . "\">" . $verdescripcion_look . ""; ?>
<?php } else { ?>

<?php

$verdescripcion_look = "";
 if ($this->verdescripcion == "SI") { $verdescripcion_look .= "" ;} 
 if (empty($verdescripcion_look)) { $verdescripcion_look = $this->verdescripcion; }
?>
<span id="id_read_on_verdescripcion" class="css_verdescripcion_line" style="<?php echo $sStyleReadLab_verdescripcion; ?>"><?php echo $this->form_format_readonly("verdescripcion", $this->form_encode_input($verdescripcion_look)); ?></span><span id="id_read_off_verdescripcion" class="css_read_off_verdescripcion css_verdescripcion_line" style="<?php echo $sStyleReadInp_verdescripcion; ?>"><?php echo "<div id=\"idAjaxCheckbox_verdescripcion\" style=\"display: inline-block\" class=\"css_verdescripcion_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_verdescripcion_line"><?php $tempOptionId = "id-opt-verdescripcion" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-verdescripcion sc-ui-checkbox-verdescripcion" name="verdescripcion[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verdescripcion'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->verdescripcion_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['verprecio']))
   {
       $this->nm_new_label['verprecio'] = " Ver Precio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $verprecio = $this->verprecio;
   $sStyleHidden_verprecio = '';
   if (isset($this->nmgp_cmp_hidden['verprecio']) && $this->nmgp_cmp_hidden['verprecio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['verprecio']);
       $sStyleHidden_verprecio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_verprecio = 'display: none;';
   $sStyleReadInp_verprecio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['verprecio']) && $this->nmgp_cmp_readonly['verprecio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['verprecio']);
       $sStyleReadLab_verprecio = '';
       $sStyleReadInp_verprecio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['verprecio']) && $this->nmgp_cmp_hidden['verprecio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="verprecio" value="<?php echo $this->form_encode_input($this->verprecio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_verprecio_line" id="hidden_field_data_verprecio" style="<?php echo $sStyleHidden_verprecio; ?>"> <span class="scFormLabelOddFormat css_verprecio_label" style=""><span id="id_label_verprecio"><?php echo $this->nm_new_label['verprecio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["verprecio"]) &&  $this->nmgp_cmp_readonly["verprecio"] == "on") { 

$verprecio_look = "";
 if ($this->verprecio == "preciomen") { $verprecio_look .= "PRECIO1" ;} 
 if ($this->verprecio == "preciomen2") { $verprecio_look .= "PRECIO2" ;} 
 if ($this->verprecio == "preciomen3") { $verprecio_look .= "PRECIO3" ;} 
 if ($this->verprecio == "preciofull") { $verprecio_look .= "PRECIOM1" ;} 
 if ($this->verprecio == "precio2") { $verprecio_look .= "PRECIOM2" ;} 
 if ($this->verprecio == "preciomay") { $verprecio_look .= "PRECIOM3" ;} 
 if (empty($verprecio_look)) { $verprecio_look = $this->verprecio; }
?>
<input type="hidden" name="verprecio" value="<?php echo $this->form_encode_input($verprecio) . "\">" . $verprecio_look . ""; ?>
<?php } else { ?>
<?php

$verprecio_look = "";
 if ($this->verprecio == "preciomen") { $verprecio_look .= "PRECIO1" ;} 
 if ($this->verprecio == "preciomen2") { $verprecio_look .= "PRECIO2" ;} 
 if ($this->verprecio == "preciomen3") { $verprecio_look .= "PRECIO3" ;} 
 if ($this->verprecio == "preciofull") { $verprecio_look .= "PRECIOM1" ;} 
 if ($this->verprecio == "precio2") { $verprecio_look .= "PRECIOM2" ;} 
 if ($this->verprecio == "preciomay") { $verprecio_look .= "PRECIOM3" ;} 
 if (empty($verprecio_look)) { $verprecio_look = $this->verprecio; }
?>
<span id="id_read_on_verprecio" class="css_verprecio_line"  style="<?php echo $sStyleReadLab_verprecio; ?>"><?php echo $this->form_format_readonly("verprecio", $this->form_encode_input($verprecio_look)); ?></span><span id="id_read_off_verprecio" class="css_read_off_verprecio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_verprecio; ?>">
 <span id="idAjaxSelect_verprecio" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_verprecio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_verprecio" name="verprecio" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = ''; ?>
 <option value="">No Mostrar</option>
 <option  value="preciomen" <?php  if ($this->verprecio == "preciomen") { echo " selected" ;} ?>>PRECIO1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = 'preciomen'; ?>
 <option  value="preciomen2" <?php  if ($this->verprecio == "preciomen2") { echo " selected" ;} ?>>PRECIO2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = 'preciomen2'; ?>
 <option  value="preciomen3" <?php  if ($this->verprecio == "preciomen3") { echo " selected" ;} ?>>PRECIO3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = 'preciomen3'; ?>
 <option  value="preciofull" <?php  if ($this->verprecio == "preciofull") { echo " selected" ;} ?>>PRECIOM1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = 'preciofull'; ?>
 <option  value="precio2" <?php  if ($this->verprecio == "precio2") { echo " selected" ;} ?>>PRECIOM2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = 'precio2'; ?>
 <option  value="preciomay" <?php  if ($this->verprecio == "preciomay") { echo " selected" ;} ?>>PRECIOM3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['Lookup_verprecio'][] = 'preciomay'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_verprecio_dumb = ('' == $sStyleHidden_verprecio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_verprecio_dumb" style="<?php echo $sStyleHidden_verprecio_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['titulopersonalizado']))
    {
        $this->nm_new_label['titulopersonalizado'] = "Titulo Reporte";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $titulopersonalizado = $this->titulopersonalizado;
   $sStyleHidden_titulopersonalizado = '';
   if (isset($this->nmgp_cmp_hidden['titulopersonalizado']) && $this->nmgp_cmp_hidden['titulopersonalizado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['titulopersonalizado']);
       $sStyleHidden_titulopersonalizado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_titulopersonalizado = 'display: none;';
   $sStyleReadInp_titulopersonalizado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['titulopersonalizado']) && $this->nmgp_cmp_readonly['titulopersonalizado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['titulopersonalizado']);
       $sStyleReadLab_titulopersonalizado = '';
       $sStyleReadInp_titulopersonalizado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['titulopersonalizado']) && $this->nmgp_cmp_hidden['titulopersonalizado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="titulopersonalizado" value="<?php echo $this->form_encode_input($titulopersonalizado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_titulopersonalizado_line" id="hidden_field_data_titulopersonalizado" style="<?php echo $sStyleHidden_titulopersonalizado; ?>"> <span class="scFormLabelOddFormat css_titulopersonalizado_label" style=""><span id="id_label_titulopersonalizado"><?php echo $this->nm_new_label['titulopersonalizado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["titulopersonalizado"]) &&  $this->nmgp_cmp_readonly["titulopersonalizado"] == "on") { 

 ?>
<input type="hidden" name="titulopersonalizado" value="<?php echo $this->form_encode_input($titulopersonalizado) . "\">" . $titulopersonalizado . ""; ?>
<?php } else { ?>
<span id="id_read_on_titulopersonalizado" class="sc-ui-readonly-titulopersonalizado css_titulopersonalizado_line" style="<?php echo $sStyleReadLab_titulopersonalizado; ?>"><?php echo $this->form_format_readonly("titulopersonalizado", $this->form_encode_input($this->titulopersonalizado)); ?></span><span id="id_read_off_titulopersonalizado" class="css_read_off_titulopersonalizado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_titulopersonalizado; ?>">
 <input class="sc-js-input scFormObjectOdd css_titulopersonalizado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_titulopersonalizado" type=text name="titulopersonalizado" value="<?php echo $this->form_encode_input($titulopersonalizado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Opcional', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
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
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['ok'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("control_codbarras_filtro_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("control_codbarras_filtro_mob");
 parent.scAjaxDetailHeight("control_codbarras_filtro_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("control_codbarras_filtro_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_codbarras_filtro_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['sc_modal'])
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
		if ($("#Bsair_b.sc-unique-btn-1").length && $("#Bsair_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-5").length && $("#Bsair_b.sc-unique-btn-5").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-6").length && $("#Bsair_b.sc-unique-btn-6").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
	}
	function scBtnFn_resetar() {
		if ($("#sc_resetar_bot").length && $("#sc_resetar_bot").is(":visible")) {
		    if ($("#sc_resetar_bot").hasClass("disabled")) {
		        return;
		    }
			sc_btn_resetar()
			 return;
		}
	}
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-3").length && $("#sub_form_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza('alterar');
			 return;
		}
		if ($("#sub_form_b.sc-unique-btn-4").length && $("#sub_form_b.sc-unique-btn-4").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza('alterar');
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro_mob']['buttonStatus'] = $this->nmgp_botoes;
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
