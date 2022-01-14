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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . ""); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>control_menu/control_menu_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("control_menu_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('control_menu_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("control_menu_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['control_menu'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['control_menu'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%; border-color: #FFFFFF; border-spacing: 20px;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['productos']))
    {
        $this->nm_new_label['productos'] = "Productos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $productos = $this->productos;
   $sStyleHidden_productos = '';
   if (isset($this->nmgp_cmp_hidden['productos']) && $this->nmgp_cmp_hidden['productos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['productos']);
       $sStyleHidden_productos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_productos = 'display: none;';
   $sStyleReadInp_productos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['productos']) && $this->nmgp_cmp_readonly['productos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['productos']);
       $sStyleReadLab_productos = '';
       $sStyleReadInp_productos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['productos']) && $this->nmgp_cmp_hidden['productos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="productos" value="<?php echo $this->form_encode_input($productos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_productos_line" id="hidden_field_data_productos" style="<?php echo $sStyleHidden_productos; ?>"> <span class="scFormLabelOddFormat css_productos_label" style=""><span id="id_label_productos"><?php echo $this->nm_new_label['productos']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__PRODUCTOS.png"))
          { 
              $productos = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $productos = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_productos = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__PRODUCTOS.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__PRODUCTOS.png"); 
              $out_productos = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_productos = "sc_" . $out_productos . "_productos_130130_" . $img_time . "_grp__NM__menu_img__NM__PRODUCTOS.png";
              $out_productos = $this->Ini->path_imag_temp . "/sc_" . $out_productos . "_productos_130130_" . $img_time . "_grp__NM__menu_img__NM__PRODUCTOS.png";
              if (!is_file($this->Ini->root . $out_productos)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_productos, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_productos);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_productos;
                  $productos = "<img  border=\"1\" src=\"" . $prt_productos . "\"/>" ; 
              }
              else {
                  $productos = "<img  border=\"1\" src=\"" . $out_productos . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_productos"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_productos_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_productos')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $productos ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["productos"]) &&  $this->nmgp_cmp_readonly["productos"] == "on") { 

 ?>
<input type="hidden" name="productos" value="<?php echo $this->form_encode_input($productos) . "\">" . $productos . ""; ?>
<?php } else { ?>
<span id="id_read_on_productos" class="sc-ui-readonly-productos css_productos_line" style="<?php echo $sStyleReadLab_productos; ?>"><?php echo $this->form_format_readonly("productos", $this->form_encode_input($this->productos)); ?></span><span id="id_read_off_productos" class="css_read_off_productos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_productos; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['terceros']))
    {
        $this->nm_new_label['terceros'] = "Terceros";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $terceros = $this->terceros;
   $sStyleHidden_terceros = '';
   if (isset($this->nmgp_cmp_hidden['terceros']) && $this->nmgp_cmp_hidden['terceros'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['terceros']);
       $sStyleHidden_terceros = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_terceros = 'display: none;';
   $sStyleReadInp_terceros = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['terceros']) && $this->nmgp_cmp_readonly['terceros'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['terceros']);
       $sStyleReadLab_terceros = '';
       $sStyleReadInp_terceros = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['terceros']) && $this->nmgp_cmp_hidden['terceros'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="terceros" value="<?php echo $this->form_encode_input($terceros) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_terceros_line" id="hidden_field_data_terceros" style="<?php echo $sStyleHidden_terceros; ?>"> <span class="scFormLabelOddFormat css_terceros_label" style=""><span id="id_label_terceros"><?php echo $this->nm_new_label['terceros']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__CLIENTES.png"))
          { 
              $terceros = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $terceros = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_terceros = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__CLIENTES.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__CLIENTES.png"); 
              $out_terceros = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_terceros = "sc_" . $out_terceros . "_terceros_130130_" . $img_time . "_grp__NM__menu_img__NM__CLIENTES.png";
              $out_terceros = $this->Ini->path_imag_temp . "/sc_" . $out_terceros . "_terceros_130130_" . $img_time . "_grp__NM__menu_img__NM__CLIENTES.png";
              if (!is_file($this->Ini->root . $out_terceros)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_terceros, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_terceros);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_terceros;
                  $terceros = "<img  border=\"1\" src=\"" . $prt_terceros . "\"/>" ; 
              }
              else {
                  $terceros = "<img  border=\"1\" src=\"" . $out_terceros . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_terceros"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_terceros_todos_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_terceros_todos')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $terceros ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["terceros"]) &&  $this->nmgp_cmp_readonly["terceros"] == "on") { 

 ?>
<input type="hidden" name="terceros" value="<?php echo $this->form_encode_input($terceros) . "\">" . $terceros . ""; ?>
<?php } else { ?>
<span id="id_read_on_terceros" class="sc-ui-readonly-terceros css_terceros_line" style="<?php echo $sStyleReadLab_terceros; ?>"><?php echo $this->form_format_readonly("terceros", $this->form_encode_input($this->terceros)); ?></span><span id="id_read_off_terceros" class="css_read_off_terceros<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_terceros; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ventas']))
    {
        $this->nm_new_label['ventas'] = "Ventas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ventas = $this->ventas;
   $sStyleHidden_ventas = '';
   if (isset($this->nmgp_cmp_hidden['ventas']) && $this->nmgp_cmp_hidden['ventas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ventas']);
       $sStyleHidden_ventas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ventas = 'display: none;';
   $sStyleReadInp_ventas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ventas']) && $this->nmgp_cmp_readonly['ventas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ventas']);
       $sStyleReadLab_ventas = '';
       $sStyleReadInp_ventas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ventas']) && $this->nmgp_cmp_hidden['ventas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ventas" value="<?php echo $this->form_encode_input($ventas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ventas_line" id="hidden_field_data_ventas" style="<?php echo $sStyleHidden_ventas; ?>"> <span class="scFormLabelOddFormat css_ventas_label" style=""><span id="id_label_ventas"><?php echo $this->nm_new_label['ventas']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__VENTAS.png"))
          { 
              $ventas = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $ventas = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_ventas = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__VENTAS.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__VENTAS.png"); 
              $out_ventas = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_ventas = "sc_" . $out_ventas . "_ventas_130130_" . $img_time . "_grp__NM__menu_img__NM__VENTAS.png";
              $out_ventas = $this->Ini->path_imag_temp . "/sc_" . $out_ventas . "_ventas_130130_" . $img_time . "_grp__NM__menu_img__NM__VENTAS.png";
              if (!is_file($this->Ini->root . $out_ventas)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_ventas, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_ventas);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_ventas;
                  $ventas = "<img  border=\"1\" src=\"" . $prt_ventas . "\"/>" ; 
              }
              else {
                  $ventas = "<img  border=\"1\" src=\"" . $out_ventas . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_ventas"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_facturaven_pos_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_facturaven_pos')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ventas ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ventas"]) &&  $this->nmgp_cmp_readonly["ventas"] == "on") { 

 ?>
<input type="hidden" name="ventas" value="<?php echo $this->form_encode_input($ventas) . "\">" . $ventas . ""; ?>
<?php } else { ?>
<span id="id_read_on_ventas" class="sc-ui-readonly-ventas css_ventas_line" style="<?php echo $sStyleReadLab_ventas; ?>"><?php echo $this->form_format_readonly("ventas", $this->form_encode_input($this->ventas)); ?></span><span id="id_read_off_ventas" class="css_read_off_ventas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ventas; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['compras']))
    {
        $this->nm_new_label['compras'] = "Compras";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $compras = $this->compras;
   $sStyleHidden_compras = '';
   if (isset($this->nmgp_cmp_hidden['compras']) && $this->nmgp_cmp_hidden['compras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['compras']);
       $sStyleHidden_compras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_compras = 'display: none;';
   $sStyleReadInp_compras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['compras']) && $this->nmgp_cmp_readonly['compras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['compras']);
       $sStyleReadLab_compras = '';
       $sStyleReadInp_compras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['compras']) && $this->nmgp_cmp_hidden['compras'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="compras" value="<?php echo $this->form_encode_input($compras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_compras_line" id="hidden_field_data_compras" style="<?php echo $sStyleHidden_compras; ?>"> <span class="scFormLabelOddFormat css_compras_label" style=""><span id="id_label_compras"><?php echo $this->nm_new_label['compras']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__COMPRAS.png"))
          { 
              $compras = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $compras = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_compras = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__COMPRAS.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__COMPRAS.png"); 
              $out_compras = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_compras = "sc_" . $out_compras . "_compras_130130_" . $img_time . "_grp__NM__menu_img__NM__COMPRAS.png";
              $out_compras = $this->Ini->path_imag_temp . "/sc_" . $out_compras . "_compras_130130_" . $img_time . "_grp__NM__menu_img__NM__COMPRAS.png";
              if (!is_file($this->Ini->root . $out_compras)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_compras, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_compras);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_compras;
                  $compras = "<img  border=\"1\" src=\"" . $prt_compras . "\"/>" ; 
              }
              else {
                  $compras = "<img  border=\"1\" src=\"" . $out_compras . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_compras"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_compras_cons . "', '$this->nm_location', '', 'inicio', '_self', '0', '0', 'grid_compras')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $compras ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["compras"]) &&  $this->nmgp_cmp_readonly["compras"] == "on") { 

 ?>
<input type="hidden" name="compras" value="<?php echo $this->form_encode_input($compras) . "\">" . $compras . ""; ?>
<?php } else { ?>
<span id="id_read_on_compras" class="sc-ui-readonly-compras css_compras_line" style="<?php echo $sStyleReadLab_compras; ?>"><?php echo $this->form_format_readonly("compras", $this->form_encode_input($this->compras)); ?></span><span id="id_read_off_compras" class="css_read_off_compras<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_compras; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['copias']))
    {
        $this->nm_new_label['copias'] = "Copias de seguridad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $copias = $this->copias;
   $sStyleHidden_copias = '';
   if (isset($this->nmgp_cmp_hidden['copias']) && $this->nmgp_cmp_hidden['copias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['copias']);
       $sStyleHidden_copias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_copias = 'display: none;';
   $sStyleReadInp_copias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['copias']) && $this->nmgp_cmp_readonly['copias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['copias']);
       $sStyleReadLab_copias = '';
       $sStyleReadInp_copias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['copias']) && $this->nmgp_cmp_hidden['copias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="copias" value="<?php echo $this->form_encode_input($copias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_copias_line" id="hidden_field_data_copias" style="<?php echo $sStyleHidden_copias; ?>"> <span class="scFormLabelOddFormat css_copias_label" style=""><span id="id_label_copias"><?php echo $this->nm_new_label['copias']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__COPIAS DE SGURIDAD.png"))
          { 
              $copias = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $copias = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_copias = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__COPIAS DE SGURIDAD.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__COPIAS DE SGURIDAD.png"); 
              $out_copias = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_copias = "sc_" . $out_copias . "_copias_130130_" . $img_time . "_grp__NM__menu_img__NM__COPIAS DE SGURIDAD.png";
              $out_copias = $this->Ini->path_imag_temp . "/sc_" . $out_copias . "_copias_130130_" . $img_time . "_grp__NM__menu_img__NM__COPIAS DE SGURIDAD.png";
              if (!is_file($this->Ini->root . $out_copias)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_copias, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_copias);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_copias;
                  $copias = "<img  border=\"1\" src=\"" . $prt_copias . "\"/>" ; 
              }
              else {
                  $copias = "<img  border=\"1\" src=\"" . $out_copias . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_copias"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_blank_hacer_backup . "', '$this->nm_location', '', '', '_blank', '0', '0', 'blank_hacer_backup')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $copias ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["copias"]) &&  $this->nmgp_cmp_readonly["copias"] == "on") { 

 ?>
<input type="hidden" name="copias" value="<?php echo $this->form_encode_input($copias) . "\">" . $copias . ""; ?>
<?php } else { ?>
<span id="id_read_on_copias" class="sc-ui-readonly-copias css_copias_line" style="<?php echo $sStyleReadLab_copias; ?>"><?php echo $this->form_format_readonly("copias", $this->form_encode_input($this->copias)); ?></span><span id="id_read_off_copias" class="css_read_off_copias<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_copias; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['empresa']))
    {
        $this->nm_new_label['empresa'] = "Datos de la empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $empresa = $this->empresa;
   $sStyleHidden_empresa = '';
   if (isset($this->nmgp_cmp_hidden['empresa']) && $this->nmgp_cmp_hidden['empresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['empresa']);
       $sStyleHidden_empresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_empresa = 'display: none;';
   $sStyleReadInp_empresa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['empresa']) && $this->nmgp_cmp_readonly['empresa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['empresa']);
       $sStyleReadLab_empresa = '';
       $sStyleReadInp_empresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['empresa']) && $this->nmgp_cmp_hidden['empresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="empresa" value="<?php echo $this->form_encode_input($empresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_empresa_line" id="hidden_field_data_empresa" style="<?php echo $sStyleHidden_empresa; ?>"> <span class="scFormLabelOddFormat css_empresa_label" style=""><span id="id_label_empresa"><?php echo $this->nm_new_label['empresa']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__DATOS EMPRESA.png"))
          { 
              $empresa = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $empresa = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_empresa = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__DATOS EMPRESA.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__DATOS EMPRESA.png"); 
              $out_empresa = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_empresa = "sc_" . $out_empresa . "_empresa_130130_" . $img_time . "_grp__NM__menu_img__NM__DATOS EMPRESA.png";
              $out_empresa = $this->Ini->path_imag_temp . "/sc_" . $out_empresa . "_empresa_130130_" . $img_time . "_grp__NM__menu_img__NM__DATOS EMPRESA.png";
              if (!is_file($this->Ini->root . $out_empresa)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_empresa, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_empresa);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_empresa;
                  $empresa = "<img  border=\"1\" src=\"" . $prt_empresa . "\"/>" ; 
              }
              else {
                  $empresa = "<img  border=\"1\" src=\"" . $out_empresa . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_empresa"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_datosemp_edit . "', '$this->nm_location', 'NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_blank', '0', '0', 'form_datosemp')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $empresa ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["empresa"]) &&  $this->nmgp_cmp_readonly["empresa"] == "on") { 

 ?>
<input type="hidden" name="empresa" value="<?php echo $this->form_encode_input($empresa) . "\">" . $empresa . ""; ?>
<?php } else { ?>
<span id="id_read_on_empresa" class="sc-ui-readonly-empresa css_empresa_line" style="<?php echo $sStyleReadLab_empresa; ?>"><?php echo $this->form_format_readonly("empresa", $this->form_encode_input($this->empresa)); ?></span><span id="id_read_off_empresa" class="css_read_off_empresa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_empresa; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['pagos']))
    {
        $this->nm_new_label['pagos'] = "Por pagar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pagos = $this->pagos;
   $sStyleHidden_pagos = '';
   if (isset($this->nmgp_cmp_hidden['pagos']) && $this->nmgp_cmp_hidden['pagos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pagos']);
       $sStyleHidden_pagos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pagos = 'display: none;';
   $sStyleReadInp_pagos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pagos']) && $this->nmgp_cmp_readonly['pagos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pagos']);
       $sStyleReadLab_pagos = '';
       $sStyleReadInp_pagos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pagos']) && $this->nmgp_cmp_hidden['pagos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pagos" value="<?php echo $this->form_encode_input($pagos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pagos_line" id="hidden_field_data_pagos" style="<?php echo $sStyleHidden_pagos; ?>"> <span class="scFormLabelOddFormat css_pagos_label" style=""><span id="id_label_pagos"><?php echo $this->nm_new_label['pagos']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__POR PAGAR.png"))
          { 
              $pagos = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $pagos = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_pagos = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__POR PAGAR.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__POR PAGAR.png"); 
              $out_pagos = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_pagos = "sc_" . $out_pagos . "_pagos_130130_" . $img_time . "_grp__NM__menu_img__NM__POR PAGAR.png";
              $out_pagos = $this->Ini->path_imag_temp . "/sc_" . $out_pagos . "_pagos_130130_" . $img_time . "_grp__NM__menu_img__NM__POR PAGAR.png";
              if (!is_file($this->Ini->root . $out_pagos)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_pagos, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_pagos);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_pagos;
                  $pagos = "<img  border=\"1\" src=\"" . $prt_pagos . "\"/>" ; 
              }
              else {
                  $pagos = "<img  border=\"1\" src=\"" . $out_pagos . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_pagos"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_cuentaspagar_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_cuentaspagar')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $pagos ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pagos"]) &&  $this->nmgp_cmp_readonly["pagos"] == "on") { 

 ?>
<input type="hidden" name="pagos" value="<?php echo $this->form_encode_input($pagos) . "\">" . $pagos . ""; ?>
<?php } else { ?>
<span id="id_read_on_pagos" class="sc-ui-readonly-pagos css_pagos_line" style="<?php echo $sStyleReadLab_pagos; ?>"><?php echo $this->form_format_readonly("pagos", $this->form_encode_input($this->pagos)); ?></span><span id="id_read_off_pagos" class="css_read_off_pagos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pagos; ?>"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_productos_dumb = ('' == $sStyleHidden_productos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_productos_dumb" style="<?php echo $sStyleHidden_productos_dumb; ?>"></TD>
<?php $sStyleHidden_terceros_dumb = ('' == $sStyleHidden_terceros) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_terceros_dumb" style="<?php echo $sStyleHidden_terceros_dumb; ?>"></TD>
<?php $sStyleHidden_ventas_dumb = ('' == $sStyleHidden_ventas) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ventas_dumb" style="<?php echo $sStyleHidden_ventas_dumb; ?>"></TD>
<?php $sStyleHidden_compras_dumb = ('' == $sStyleHidden_compras) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_compras_dumb" style="<?php echo $sStyleHidden_compras_dumb; ?>"></TD>
<?php $sStyleHidden_copias_dumb = ('' == $sStyleHidden_copias) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_copias_dumb" style="<?php echo $sStyleHidden_copias_dumb; ?>"></TD>
<?php $sStyleHidden_empresa_dumb = ('' == $sStyleHidden_empresa) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_empresa_dumb" style="<?php echo $sStyleHidden_empresa_dumb; ?>"></TD>
<?php $sStyleHidden_pagos_dumb = ('' == $sStyleHidden_pagos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_pagos_dumb" style="<?php echo $sStyleHidden_pagos_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cobros']))
    {
        $this->nm_new_label['cobros'] = "Por cobrar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobros = $this->cobros;
   $sStyleHidden_cobros = '';
   if (isset($this->nmgp_cmp_hidden['cobros']) && $this->nmgp_cmp_hidden['cobros'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobros']);
       $sStyleHidden_cobros = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobros = 'display: none;';
   $sStyleReadInp_cobros = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cobros']) && $this->nmgp_cmp_readonly['cobros'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobros']);
       $sStyleReadLab_cobros = '';
       $sStyleReadInp_cobros = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobros']) && $this->nmgp_cmp_hidden['cobros'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobros" value="<?php echo $this->form_encode_input($cobros) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobros_line" id="hidden_field_data_cobros" style="<?php echo $sStyleHidden_cobros; ?>"> <span class="scFormLabelOddFormat css_cobros_label" style=""><span id="id_label_cobros"><?php echo $this->nm_new_label['cobros']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__POR COBRAR.png"))
          { 
              $cobros = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $cobros = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_cobros = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__POR COBRAR.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__POR COBRAR.png"); 
              $out_cobros = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_cobros = "sc_" . $out_cobros . "_cobros_130130_" . $img_time . "_grp__NM__menu_img__NM__POR COBRAR.png";
              $out_cobros = $this->Ini->path_imag_temp . "/sc_" . $out_cobros . "_cobros_130130_" . $img_time . "_grp__NM__menu_img__NM__POR COBRAR.png";
              if (!is_file($this->Ini->root . $out_cobros)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_cobros, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_cobros);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_cobros;
                  $cobros = "<img  border=\"1\" src=\"" . $prt_cobros . "\"/>" ; 
              }
              else {
                  $cobros = "<img  border=\"1\" src=\"" . $out_cobros . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_cobros"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_cartera_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_cartera')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $cobros ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cobros"]) &&  $this->nmgp_cmp_readonly["cobros"] == "on") { 

 ?>
<input type="hidden" name="cobros" value="<?php echo $this->form_encode_input($cobros) . "\">" . $cobros . ""; ?>
<?php } else { ?>
<span id="id_read_on_cobros" class="sc-ui-readonly-cobros css_cobros_line" style="<?php echo $sStyleReadLab_cobros; ?>"><?php echo $this->form_format_readonly("cobros", $this->form_encode_input($this->cobros)); ?></span><span id="id_read_off_cobros" class="css_read_off_cobros<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cobros; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['notas_credito']))
    {
        $this->nm_new_label['notas_credito'] = "Notas Crédito/Débito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notas_credito = $this->notas_credito;
   $sStyleHidden_notas_credito = '';
   if (isset($this->nmgp_cmp_hidden['notas_credito']) && $this->nmgp_cmp_hidden['notas_credito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notas_credito']);
       $sStyleHidden_notas_credito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notas_credito = 'display: none;';
   $sStyleReadInp_notas_credito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notas_credito']) && $this->nmgp_cmp_readonly['notas_credito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notas_credito']);
       $sStyleReadLab_notas_credito = '';
       $sStyleReadInp_notas_credito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notas_credito']) && $this->nmgp_cmp_hidden['notas_credito'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="notas_credito" value="<?php echo $this->form_encode_input($notas_credito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_notas_credito_line" id="hidden_field_data_notas_credito" style="<?php echo $sStyleHidden_notas_credito; ?>"> <span class="scFormLabelOddFormat css_notas_credito_label" style=""><span id="id_label_notas_credito"><?php echo $this->nm_new_label['notas_credito']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__NOTAS CREDITO.png"))
          { 
              $notas_credito = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $notas_credito = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_notas_credito = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__NOTAS CREDITO.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__NOTAS CREDITO.png"); 
              $out_notas_credito = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_notas_credito = "sc_" . $out_notas_credito . "_notas_credito_130130_" . $img_time . "_grp__NM__menu_img__NM__NOTAS CREDITO.png";
              $out_notas_credito = $this->Ini->path_imag_temp . "/sc_" . $out_notas_credito . "_notas_credito_130130_" . $img_time . "_grp__NM__menu_img__NM__NOTAS CREDITO.png";
              if (!is_file($this->Ini->root . $out_notas_credito)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_notas_credito, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_notas_credito);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_notas_credito;
                  $notas_credito = "<img  border=\"1\" src=\"" . $prt_notas_credito . "\"/>" ; 
              }
              else {
                  $notas_credito = "<img  border=\"1\" src=\"" . $out_notas_credito . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_notas_credito"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_NC_ND_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_NC_ND')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $notas_credito ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["notas_credito"]) &&  $this->nmgp_cmp_readonly["notas_credito"] == "on") { 

 ?>
<input type="hidden" name="notas_credito" value="<?php echo $this->form_encode_input($notas_credito) . "\">" . $notas_credito . ""; ?>
<?php } else { ?>
<span id="id_read_on_notas_credito" class="sc-ui-readonly-notas_credito css_notas_credito_line" style="<?php echo $sStyleReadLab_notas_credito; ?>"><?php echo $this->form_format_readonly("notas_credito", $this->form_encode_input($this->notas_credito)); ?></span><span id="id_read_off_notas_credito" class="css_read_off_notas_credito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_notas_credito; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['contratos']))
    {
        $this->nm_new_label['contratos'] = "Contratos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contratos = $this->contratos;
   $sStyleHidden_contratos = '';
   if (isset($this->nmgp_cmp_hidden['contratos']) && $this->nmgp_cmp_hidden['contratos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contratos']);
       $sStyleHidden_contratos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contratos = 'display: none;';
   $sStyleReadInp_contratos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contratos']) && $this->nmgp_cmp_readonly['contratos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contratos']);
       $sStyleReadLab_contratos = '';
       $sStyleReadInp_contratos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contratos']) && $this->nmgp_cmp_hidden['contratos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contratos" value="<?php echo $this->form_encode_input($contratos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contratos_line" id="hidden_field_data_contratos" style="<?php echo $sStyleHidden_contratos; ?>"> <span class="scFormLabelOddFormat css_contratos_label" style=""><span id="id_label_contratos"><?php echo $this->nm_new_label['contratos']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__CONTRATOS.png"))
          { 
              $contratos = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $contratos = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_contratos = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__CONTRATOS.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__CONTRATOS.png"); 
              $out_contratos = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_contratos = "sc_" . $out_contratos . "_contratos_130130_" . $img_time . "_grp__NM__menu_img__NM__CONTRATOS.png";
              $out_contratos = $this->Ini->path_imag_temp . "/sc_" . $out_contratos . "_contratos_130130_" . $img_time . "_grp__NM__menu_img__NM__CONTRATOS.png";
              if (!is_file($this->Ini->root . $out_contratos)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_contratos, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_contratos);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_contratos;
                  $contratos = "<img  border=\"1\" src=\"" . $prt_contratos . "\"/>" ; 
              }
              else {
                  $contratos = "<img  border=\"1\" src=\"" . $out_contratos . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_contratos"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_terceros_contratos_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_terceros_contratos')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $contratos ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contratos"]) &&  $this->nmgp_cmp_readonly["contratos"] == "on") { 

 ?>
<input type="hidden" name="contratos" value="<?php echo $this->form_encode_input($contratos) . "\">" . $contratos . ""; ?>
<?php } else { ?>
<span id="id_read_on_contratos" class="sc-ui-readonly-contratos css_contratos_line" style="<?php echo $sStyleReadLab_contratos; ?>"><?php echo $this->form_format_readonly("contratos", $this->form_encode_input($this->contratos)); ?></span><span id="id_read_off_contratos" class="css_read_off_contratos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contratos; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['agenda']))
    {
        $this->nm_new_label['agenda'] = "Agenda";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $agenda = $this->agenda;
   $sStyleHidden_agenda = '';
   if (isset($this->nmgp_cmp_hidden['agenda']) && $this->nmgp_cmp_hidden['agenda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['agenda']);
       $sStyleHidden_agenda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_agenda = 'display: none;';
   $sStyleReadInp_agenda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['agenda']) && $this->nmgp_cmp_readonly['agenda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['agenda']);
       $sStyleReadLab_agenda = '';
       $sStyleReadInp_agenda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['agenda']) && $this->nmgp_cmp_hidden['agenda'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="agenda" value="<?php echo $this->form_encode_input($agenda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_agenda_line" id="hidden_field_data_agenda" style="<?php echo $sStyleHidden_agenda; ?>"> <span class="scFormLabelOddFormat css_agenda_label" style=""><span id="id_label_agenda"><?php echo $this->nm_new_label['agenda']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__AGENDA.png"))
          { 
              $agenda = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $agenda = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_agenda = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__AGENDA.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__AGENDA.png"); 
              $out_agenda = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_agenda = "sc_" . $out_agenda . "_agenda_130130_" . $img_time . "_grp__NM__menu_img__NM__AGENDA.png";
              $out_agenda = $this->Ini->path_imag_temp . "/sc_" . $out_agenda . "_agenda_130130_" . $img_time . "_grp__NM__menu_img__NM__AGENDA.png";
              if (!is_file($this->Ini->root . $out_agenda)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_agenda, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_agenda);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_agenda;
                  $agenda = "<img  border=\"1\" src=\"" . $prt_agenda . "\"/>" ; 
              }
              else {
                  $agenda = "<img  border=\"1\" src=\"" . $out_agenda . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_agenda"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_calendar_calendar_edit . "', '$this->nm_location', 'NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_blank', '0', '0', 'calendar_calendar')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $agenda ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["agenda"]) &&  $this->nmgp_cmp_readonly["agenda"] == "on") { 

 ?>
<input type="hidden" name="agenda" value="<?php echo $this->form_encode_input($agenda) . "\">" . $agenda . ""; ?>
<?php } else { ?>
<span id="id_read_on_agenda" class="sc-ui-readonly-agenda css_agenda_line" style="<?php echo $sStyleReadLab_agenda; ?>"><?php echo $this->form_format_readonly("agenda", $this->form_encode_input($this->agenda)); ?></span><span id="id_read_off_agenda" class="css_read_off_agenda<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_agenda; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['indices']))
    {
        $this->nm_new_label['indices'] = "Indices";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $indices = $this->indices;
   $sStyleHidden_indices = '';
   if (isset($this->nmgp_cmp_hidden['indices']) && $this->nmgp_cmp_hidden['indices'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['indices']);
       $sStyleHidden_indices = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_indices = 'display: none;';
   $sStyleReadInp_indices = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['indices']) && $this->nmgp_cmp_readonly['indices'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['indices']);
       $sStyleReadLab_indices = '';
       $sStyleReadInp_indices = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['indices']) && $this->nmgp_cmp_hidden['indices'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="indices" value="<?php echo $this->form_encode_input($indices) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_indices_line" id="hidden_field_data_indices" style="<?php echo $sStyleHidden_indices; ?>"> <span class="scFormLabelOddFormat css_indices_label" style=""><span id="id_label_indices"><?php echo $this->nm_new_label['indices']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__INDICES.png"))
          { 
              $indices = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $indices = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_indices = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__INDICES.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__INDICES.png"); 
              $out_indices = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_indices = "sc_" . $out_indices . "_indices_130130_" . $img_time . "_grp__NM__menu_img__NM__INDICES.png";
              $out_indices = $this->Ini->path_imag_temp . "/sc_" . $out_indices . "_indices_130130_" . $img_time . "_grp__NM__menu_img__NM__INDICES.png";
              if (!is_file($this->Ini->root . $out_indices)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_indices, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_indices);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_indices;
                  $indices = "<img  border=\"1\" src=\"" . $prt_indices . "\"/>" ; 
              }
              else {
                  $indices = "<img  border=\"1\" src=\"" . $out_indices . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_indices"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_dash_ventas_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'dash_ventas')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $indices ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["indices"]) &&  $this->nmgp_cmp_readonly["indices"] == "on") { 

 ?>
<input type="hidden" name="indices" value="<?php echo $this->form_encode_input($indices) . "\">" . $indices . ""; ?>
<?php } else { ?>
<span id="id_read_on_indices" class="sc-ui-readonly-indices css_indices_line" style="<?php echo $sStyleReadLab_indices; ?>"><?php echo $this->form_format_readonly("indices", $this->form_encode_input($this->indices)); ?></span><span id="id_read_off_indices" class="css_read_off_indices<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_indices; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['inventario']))
    {
        $this->nm_new_label['inventario'] = "Rotación Inventario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inventario = $this->inventario;
   $sStyleHidden_inventario = '';
   if (isset($this->nmgp_cmp_hidden['inventario']) && $this->nmgp_cmp_hidden['inventario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inventario']);
       $sStyleHidden_inventario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inventario = 'display: none;';
   $sStyleReadInp_inventario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inventario']) && $this->nmgp_cmp_readonly['inventario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inventario']);
       $sStyleReadLab_inventario = '';
       $sStyleReadInp_inventario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inventario']) && $this->nmgp_cmp_hidden['inventario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inventario" value="<?php echo $this->form_encode_input($inventario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_inventario_line" id="hidden_field_data_inventario" style="<?php echo $sStyleHidden_inventario; ?>"> <span class="scFormLabelOddFormat css_inventario_label" style=""><span id="id_label_inventario"><?php echo $this->nm_new_label['inventario']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__ROTACION INVENTARIO.png"))
          { 
              $inventario = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $inventario = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_inventario = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__ROTACION INVENTARIO.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__ROTACION INVENTARIO.png"); 
              $out_inventario = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_inventario = "sc_" . $out_inventario . "_inventario_130130_" . $img_time . "_grp__NM__menu_img__NM__ROTACION INVENTARIO.png";
              $out_inventario = $this->Ini->path_imag_temp . "/sc_" . $out_inventario . "_inventario_130130_" . $img_time . "_grp__NM__menu_img__NM__ROTACION INVENTARIO.png";
              if (!is_file($this->Ini->root . $out_inventario)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_inventario, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_inventario);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_inventario;
                  $inventario = "<img  border=\"1\" src=\"" . $prt_inventario . "\"/>" ; 
              }
              else {
                  $inventario = "<img  border=\"1\" src=\"" . $out_inventario . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_inventario"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_inventario_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_inventario')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $inventario ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inventario"]) &&  $this->nmgp_cmp_readonly["inventario"] == "on") { 

 ?>
<input type="hidden" name="inventario" value="<?php echo $this->form_encode_input($inventario) . "\">" . $inventario . ""; ?>
<?php } else { ?>
<span id="id_read_on_inventario" class="sc-ui-readonly-inventario css_inventario_line" style="<?php echo $sStyleReadLab_inventario; ?>"><?php echo $this->form_format_readonly("inventario", $this->form_encode_input($this->inventario)); ?></span><span id="id_read_off_inventario" class="css_read_off_inventario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inventario; ?>"></span><?php } ?>
 </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['documentos']))
    {
        $this->nm_new_label['documentos'] = "Gestión Documentos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $documentos = $this->documentos;
   $sStyleHidden_documentos = '';
   if (isset($this->nmgp_cmp_hidden['documentos']) && $this->nmgp_cmp_hidden['documentos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['documentos']);
       $sStyleHidden_documentos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_documentos = 'display: none;';
   $sStyleReadInp_documentos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['documentos']) && $this->nmgp_cmp_readonly['documentos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['documentos']);
       $sStyleReadLab_documentos = '';
       $sStyleReadInp_documentos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['documentos']) && $this->nmgp_cmp_hidden['documentos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="documentos" value="<?php echo $this->form_encode_input($documentos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_documentos_line" id="hidden_field_data_documentos" style="<?php echo $sStyleHidden_documentos; ?>"> <span class="scFormLabelOddFormat css_documentos_label" style=""><span id="id_label_documentos"><?php echo $this->nm_new_label['documentos']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__GESTION DOCUMENTOS.png"))
          { 
              $documentos = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $documentos = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_documentos = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__GESTION DOCUMENTOS.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__GESTION DOCUMENTOS.png"); 
              $out_documentos = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_documentos = "sc_" . $out_documentos . "_documentos_130130_" . $img_time . "_grp__NM__menu_img__NM__GESTION DOCUMENTOS.png";
              $out_documentos = $this->Ini->path_imag_temp . "/sc_" . $out_documentos . "_documentos_130130_" . $img_time . "_grp__NM__menu_img__NM__GESTION DOCUMENTOS.png";
              if (!is_file($this->Ini->root . $out_documentos)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_documentos, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_documentos);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_documentos;
                  $documentos = "<img  border=\"1\" src=\"" . $prt_documentos . "\"/>" ; 
              }
              else {
                  $documentos = "<img  border=\"1\" src=\"" . $out_documentos . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_documentos"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_gestor_archivos_cons . "', '$this->nm_location', '', 'inicio', '_blank', '0', '0', 'grid_gestor_archivos')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $documentos ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["documentos"]) &&  $this->nmgp_cmp_readonly["documentos"] == "on") { 

 ?>
<input type="hidden" name="documentos" value="<?php echo $this->form_encode_input($documentos) . "\">" . $documentos . ""; ?>
<?php } else { ?>
<span id="id_read_on_documentos" class="sc-ui-readonly-documentos css_documentos_line" style="<?php echo $sStyleReadLab_documentos; ?>"><?php echo $this->form_format_readonly("documentos", $this->form_encode_input($this->documentos)); ?></span><span id="id_read_off_documentos" class="css_read_off_documentos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_documentos; ?>"></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_cobros_dumb = ('' == $sStyleHidden_cobros) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cobros_dumb" style="<?php echo $sStyleHidden_cobros_dumb; ?>"></TD>
<?php $sStyleHidden_notas_credito_dumb = ('' == $sStyleHidden_notas_credito) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_notas_credito_dumb" style="<?php echo $sStyleHidden_notas_credito_dumb; ?>"></TD>
<?php $sStyleHidden_contratos_dumb = ('' == $sStyleHidden_contratos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contratos_dumb" style="<?php echo $sStyleHidden_contratos_dumb; ?>"></TD>
<?php $sStyleHidden_agenda_dumb = ('' == $sStyleHidden_agenda) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_agenda_dumb" style="<?php echo $sStyleHidden_agenda_dumb; ?>"></TD>
<?php $sStyleHidden_indices_dumb = ('' == $sStyleHidden_indices) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_indices_dumb" style="<?php echo $sStyleHidden_indices_dumb; ?>"></TD>
<?php $sStyleHidden_inventario_dumb = ('' == $sStyleHidden_inventario) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_inventario_dumb" style="<?php echo $sStyleHidden_inventario_dumb; ?>"></TD>
<?php $sStyleHidden_documentos_dumb = ('' == $sStyleHidden_documentos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_documentos_dumb" style="<?php echo $sStyleHidden_documentos_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ventas_usuario']))
    {
        $this->nm_new_label['ventas_usuario'] = "Ventas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ventas_usuario = $this->ventas_usuario;
   $sStyleHidden_ventas_usuario = '';
   if (isset($this->nmgp_cmp_hidden['ventas_usuario']) && $this->nmgp_cmp_hidden['ventas_usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ventas_usuario']);
       $sStyleHidden_ventas_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ventas_usuario = 'display: none;';
   $sStyleReadInp_ventas_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ventas_usuario']) && $this->nmgp_cmp_readonly['ventas_usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ventas_usuario']);
       $sStyleReadLab_ventas_usuario = '';
       $sStyleReadInp_ventas_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ventas_usuario']) && $this->nmgp_cmp_hidden['ventas_usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ventas_usuario" value="<?php echo $this->form_encode_input($ventas_usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ventas_usuario_line" id="hidden_field_data_ventas_usuario" style="<?php echo $sStyleHidden_ventas_usuario; ?>"> <span class="scFormLabelOddFormat css_ventas_usuario_label" style=""><span id="id_label_ventas_usuario"><?php echo $this->nm_new_label['ventas_usuario']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__VENTAS.png"))
          { 
              $ventas_usuario = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $ventas_usuario = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_ventas_usuario = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__VENTAS.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__menu_img__NM__VENTAS.png"); 
              $out_ventas_usuario = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_ventas_usuario = "sc_" . $out_ventas_usuario . "_ventas_usuario_130130_" . $img_time . "_grp__NM__menu_img__NM__VENTAS.png";
              $out_ventas_usuario = $this->Ini->path_imag_temp . "/sc_" . $out_ventas_usuario . "_ventas_usuario_130130_" . $img_time . "_grp__NM__menu_img__NM__VENTAS.png";
              if (!is_file($this->Ini->root . $out_ventas_usuario)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_ventas_usuario, true);
                  $sc_obj_img->setWidth(130);
                  $sc_obj_img->setHeight(130);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_ventas_usuario);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_ventas_usuario;
                  $ventas_usuario = "<img  border=\"1\" src=\"" . $prt_ventas_usuario . "\"/>" ; 
              }
              else {
                  $ventas_usuario = "<img  border=\"1\" src=\"" . $out_ventas_usuario . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_ventas_usuario"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_blank_grid_pos_data . "', '$this->nm_location', '', '', '_self', '0', '0', 'blank_grid_pos_data')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ventas_usuario ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ventas_usuario"]) &&  $this->nmgp_cmp_readonly["ventas_usuario"] == "on") { 

 ?>
<input type="hidden" name="ventas_usuario" value="<?php echo $this->form_encode_input($ventas_usuario) . "\">" . $ventas_usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_ventas_usuario" class="sc-ui-readonly-ventas_usuario css_ventas_usuario_line" style="<?php echo $sStyleReadLab_ventas_usuario; ?>"><?php echo $this->form_format_readonly("ventas_usuario", $this->form_encode_input($this->ventas_usuario)); ?></span><span id="id_read_off_ventas_usuario" class="css_read_off_ventas_usuario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ventas_usuario; ?>"></span><?php } ?>
 </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="6" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
?>
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
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
<?php
}
?>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['maximized']))
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
            <span class="scFormFooterFont" id="rod_col1"></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"><?php echo "" ?></span>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("control_menu");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("control_menu");
 parent.scAjaxDetailHeight("control_menu", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("control_menu", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("control_menu", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['control_menu']['buttonStatus'] = $this->nmgp_botoes;
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
