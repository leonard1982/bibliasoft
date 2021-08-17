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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Configuración Balanza"); } else { echo strip_tags("Configuración Balanza"); } ?></TITLE>
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
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_SN_BALANZA/form_SN_BALANZA_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_SN_BALANZA_sajax_js.php");
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
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
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
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
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

include_once('form_SN_BALANZA_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_SN_BALANZA_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_SN_BALANZA'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_SN_BALANZA'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Configuración Balanza"; } else { echo "Configuración Balanza"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__card_terminal_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__card_terminal_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__card_terminal_32.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sn_puerto_com']))
   {
       $this->nm_new_label['sn_puerto_com'] = "PUERTO COM";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_puerto_com = $this->sn_puerto_com;
   $sStyleHidden_sn_puerto_com = '';
   if (isset($this->nmgp_cmp_hidden['sn_puerto_com']) && $this->nmgp_cmp_hidden['sn_puerto_com'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_puerto_com']);
       $sStyleHidden_sn_puerto_com = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_puerto_com = 'display: none;';
   $sStyleReadInp_sn_puerto_com = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_puerto_com']) && $this->nmgp_cmp_readonly['sn_puerto_com'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_puerto_com']);
       $sStyleReadLab_sn_puerto_com = '';
       $sStyleReadInp_sn_puerto_com = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_puerto_com']) && $this->nmgp_cmp_hidden['sn_puerto_com'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sn_puerto_com" value="<?php echo $this->form_encode_input($this->sn_puerto_com) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_puerto_com_label" id="hidden_field_label_sn_puerto_com" style="<?php echo $sStyleHidden_sn_puerto_com; ?>"><span id="id_label_sn_puerto_com"><?php echo $this->nm_new_label['sn_puerto_com']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['php_cmp_required']['sn_puerto_com']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['php_cmp_required']['sn_puerto_com'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_sn_puerto_com_line" id="hidden_field_data_sn_puerto_com" style="<?php echo $sStyleHidden_sn_puerto_com; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_puerto_com_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_puerto_com"]) &&  $this->nmgp_cmp_readonly["sn_puerto_com"] == "on") { 

$sn_puerto_com_look = "";
 if ($this->sn_puerto_com == "1") { $sn_puerto_com_look .= "1" ;} 
 if ($this->sn_puerto_com == "2") { $sn_puerto_com_look .= "2" ;} 
 if ($this->sn_puerto_com == "3") { $sn_puerto_com_look .= "3" ;} 
 if ($this->sn_puerto_com == "4") { $sn_puerto_com_look .= "4" ;} 
 if ($this->sn_puerto_com == "5") { $sn_puerto_com_look .= "5" ;} 
 if ($this->sn_puerto_com == "6") { $sn_puerto_com_look .= "6" ;} 
 if ($this->sn_puerto_com == "7") { $sn_puerto_com_look .= "7" ;} 
 if ($this->sn_puerto_com == "8") { $sn_puerto_com_look .= "8" ;} 
 if ($this->sn_puerto_com == "9") { $sn_puerto_com_look .= "9" ;} 
 if ($this->sn_puerto_com == "10") { $sn_puerto_com_look .= "10" ;} 
 if (empty($sn_puerto_com_look)) { $sn_puerto_com_look = $this->sn_puerto_com; }
?>
<input type="hidden" name="sn_puerto_com" value="<?php echo $this->form_encode_input($sn_puerto_com) . "\">" . $sn_puerto_com_look . ""; ?>
<?php } else { ?>
<?php

$sn_puerto_com_look = "";
 if ($this->sn_puerto_com == "1") { $sn_puerto_com_look .= "1" ;} 
 if ($this->sn_puerto_com == "2") { $sn_puerto_com_look .= "2" ;} 
 if ($this->sn_puerto_com == "3") { $sn_puerto_com_look .= "3" ;} 
 if ($this->sn_puerto_com == "4") { $sn_puerto_com_look .= "4" ;} 
 if ($this->sn_puerto_com == "5") { $sn_puerto_com_look .= "5" ;} 
 if ($this->sn_puerto_com == "6") { $sn_puerto_com_look .= "6" ;} 
 if ($this->sn_puerto_com == "7") { $sn_puerto_com_look .= "7" ;} 
 if ($this->sn_puerto_com == "8") { $sn_puerto_com_look .= "8" ;} 
 if ($this->sn_puerto_com == "9") { $sn_puerto_com_look .= "9" ;} 
 if ($this->sn_puerto_com == "10") { $sn_puerto_com_look .= "10" ;} 
 if (empty($sn_puerto_com_look)) { $sn_puerto_com_look = $this->sn_puerto_com; }
?>
<span id="id_read_on_sn_puerto_com" class="css_sn_puerto_com_line"  style="<?php echo $sStyleReadLab_sn_puerto_com; ?>"><?php echo $this->form_format_readonly("sn_puerto_com", $this->form_encode_input($sn_puerto_com_look)); ?></span><span id="id_read_off_sn_puerto_com" class="css_read_off_sn_puerto_com" style="white-space: nowrap; <?php echo $sStyleReadInp_sn_puerto_com; ?>">
 <span id="idAjaxSelect_sn_puerto_com"><select class="sc-js-input scFormObjectOdd css_sn_puerto_com_obj" style="" id="id_sc_field_sn_puerto_com" name="sn_puerto_com" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->sn_puerto_com == "1") { echo " selected" ;} ?>>1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '1'; ?>
 <option  value="2" <?php  if ($this->sn_puerto_com == "2") { echo " selected" ;} ?>>2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '2'; ?>
 <option  value="3" <?php  if ($this->sn_puerto_com == "3") { echo " selected" ;} ?>>3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '3'; ?>
 <option  value="4" <?php  if ($this->sn_puerto_com == "4") { echo " selected" ;} ?>>4</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '4'; ?>
 <option  value="5" <?php  if ($this->sn_puerto_com == "5") { echo " selected" ;} ?>>5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '5'; ?>
 <option  value="6" <?php  if ($this->sn_puerto_com == "6") { echo " selected" ;} ?>>6</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '6'; ?>
 <option  value="7" <?php  if ($this->sn_puerto_com == "7") { echo " selected" ;} ?>>7</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '7'; ?>
 <option  value="8" <?php  if ($this->sn_puerto_com == "8") { echo " selected" ;} ?>>8</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '8'; ?>
 <option  value="9" <?php  if ($this->sn_puerto_com == "9") { echo " selected" ;} ?>>9</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '9'; ?>
 <option  value="10" <?php  if ($this->sn_puerto_com == "10") { echo " selected" ;} ?>>10</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_puerto_com'][] = '10'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_puerto_com_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_puerto_com_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_baudios']))
    {
        $this->nm_new_label['sn_baudios'] = "BAUDIOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_baudios = $this->sn_baudios;
   $sStyleHidden_sn_baudios = '';
   if (isset($this->nmgp_cmp_hidden['sn_baudios']) && $this->nmgp_cmp_hidden['sn_baudios'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_baudios']);
       $sStyleHidden_sn_baudios = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_baudios = 'display: none;';
   $sStyleReadInp_sn_baudios = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_baudios']) && $this->nmgp_cmp_readonly['sn_baudios'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_baudios']);
       $sStyleReadLab_sn_baudios = '';
       $sStyleReadInp_sn_baudios = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_baudios']) && $this->nmgp_cmp_hidden['sn_baudios'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_baudios" value="<?php echo $this->form_encode_input($sn_baudios) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_baudios_label" id="hidden_field_label_sn_baudios" style="<?php echo $sStyleHidden_sn_baudios; ?>"><span id="id_label_sn_baudios"><?php echo $this->nm_new_label['sn_baudios']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_baudios_line" id="hidden_field_data_sn_baudios" style="<?php echo $sStyleHidden_sn_baudios; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_baudios_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_baudios"]) &&  $this->nmgp_cmp_readonly["sn_baudios"] == "on") { 

 ?>
<input type="hidden" name="sn_baudios" value="<?php echo $this->form_encode_input($sn_baudios) . "\">" . $sn_baudios . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_baudios" class="sc-ui-readonly-sn_baudios css_sn_baudios_line" style="<?php echo $sStyleReadLab_sn_baudios; ?>"><?php echo $this->form_format_readonly("sn_baudios", $this->form_encode_input($this->sn_baudios)); ?></span><span id="id_read_off_sn_baudios" class="css_read_off_sn_baudios" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_baudios; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_baudios_obj" style="" id="id_sc_field_sn_baudios" type=text name="sn_baudios" value="<?php echo $this->form_encode_input($sn_baudios) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_baudios']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_baudios']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_baudios_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_baudios_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_paridad']))
    {
        $this->nm_new_label['sn_paridad'] = "PARIDAD";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_paridad = $this->sn_paridad;
   $sStyleHidden_sn_paridad = '';
   if (isset($this->nmgp_cmp_hidden['sn_paridad']) && $this->nmgp_cmp_hidden['sn_paridad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_paridad']);
       $sStyleHidden_sn_paridad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_paridad = 'display: none;';
   $sStyleReadInp_sn_paridad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_paridad']) && $this->nmgp_cmp_readonly['sn_paridad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_paridad']);
       $sStyleReadLab_sn_paridad = '';
       $sStyleReadInp_sn_paridad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_paridad']) && $this->nmgp_cmp_hidden['sn_paridad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_paridad" value="<?php echo $this->form_encode_input($sn_paridad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_paridad_label" id="hidden_field_label_sn_paridad" style="<?php echo $sStyleHidden_sn_paridad; ?>"><span id="id_label_sn_paridad"><?php echo $this->nm_new_label['sn_paridad']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_paridad_line" id="hidden_field_data_sn_paridad" style="<?php echo $sStyleHidden_sn_paridad; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_paridad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_paridad"]) &&  $this->nmgp_cmp_readonly["sn_paridad"] == "on") { 

 ?>
<input type="hidden" name="sn_paridad" value="<?php echo $this->form_encode_input($sn_paridad) . "\">" . $sn_paridad . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_paridad" class="sc-ui-readonly-sn_paridad css_sn_paridad_line" style="<?php echo $sStyleReadLab_sn_paridad; ?>"><?php echo $this->form_format_readonly("sn_paridad", $this->form_encode_input($this->sn_paridad)); ?></span><span id="id_read_off_sn_paridad" class="css_read_off_sn_paridad" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_paridad; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_paridad_obj" style="" id="id_sc_field_sn_paridad" type=text name="sn_paridad" value="<?php echo $this->form_encode_input($sn_paridad) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_paridad']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_paridad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_paridad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_paridad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_bits']))
    {
        $this->nm_new_label['sn_bits'] = "BITS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_bits = $this->sn_bits;
   $sStyleHidden_sn_bits = '';
   if (isset($this->nmgp_cmp_hidden['sn_bits']) && $this->nmgp_cmp_hidden['sn_bits'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_bits']);
       $sStyleHidden_sn_bits = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_bits = 'display: none;';
   $sStyleReadInp_sn_bits = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_bits']) && $this->nmgp_cmp_readonly['sn_bits'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_bits']);
       $sStyleReadLab_sn_bits = '';
       $sStyleReadInp_sn_bits = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_bits']) && $this->nmgp_cmp_hidden['sn_bits'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_bits" value="<?php echo $this->form_encode_input($sn_bits) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_bits_label" id="hidden_field_label_sn_bits" style="<?php echo $sStyleHidden_sn_bits; ?>"><span id="id_label_sn_bits"><?php echo $this->nm_new_label['sn_bits']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_bits_line" id="hidden_field_data_sn_bits" style="<?php echo $sStyleHidden_sn_bits; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_bits_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_bits"]) &&  $this->nmgp_cmp_readonly["sn_bits"] == "on") { 

 ?>
<input type="hidden" name="sn_bits" value="<?php echo $this->form_encode_input($sn_bits) . "\">" . $sn_bits . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_bits" class="sc-ui-readonly-sn_bits css_sn_bits_line" style="<?php echo $sStyleReadLab_sn_bits; ?>"><?php echo $this->form_format_readonly("sn_bits", $this->form_encode_input($this->sn_bits)); ?></span><span id="id_read_off_sn_bits" class="css_read_off_sn_bits" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_bits; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_bits_obj" style="" id="id_sc_field_sn_bits" type=text name="sn_bits" value="<?php echo $this->form_encode_input($sn_bits) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_bits']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_bits']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_bits_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_bits_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_copy_inicio']))
    {
        $this->nm_new_label['sn_copy_inicio'] = "COPY INICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_copy_inicio = $this->sn_copy_inicio;
   $sStyleHidden_sn_copy_inicio = '';
   if (isset($this->nmgp_cmp_hidden['sn_copy_inicio']) && $this->nmgp_cmp_hidden['sn_copy_inicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_copy_inicio']);
       $sStyleHidden_sn_copy_inicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_copy_inicio = 'display: none;';
   $sStyleReadInp_sn_copy_inicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_copy_inicio']) && $this->nmgp_cmp_readonly['sn_copy_inicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_copy_inicio']);
       $sStyleReadLab_sn_copy_inicio = '';
       $sStyleReadInp_sn_copy_inicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_copy_inicio']) && $this->nmgp_cmp_hidden['sn_copy_inicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_copy_inicio" value="<?php echo $this->form_encode_input($sn_copy_inicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_copy_inicio_label" id="hidden_field_label_sn_copy_inicio" style="<?php echo $sStyleHidden_sn_copy_inicio; ?>"><span id="id_label_sn_copy_inicio"><?php echo $this->nm_new_label['sn_copy_inicio']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_copy_inicio_line" id="hidden_field_data_sn_copy_inicio" style="<?php echo $sStyleHidden_sn_copy_inicio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_copy_inicio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_copy_inicio"]) &&  $this->nmgp_cmp_readonly["sn_copy_inicio"] == "on") { 

 ?>
<input type="hidden" name="sn_copy_inicio" value="<?php echo $this->form_encode_input($sn_copy_inicio) . "\">" . $sn_copy_inicio . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_copy_inicio" class="sc-ui-readonly-sn_copy_inicio css_sn_copy_inicio_line" style="<?php echo $sStyleReadLab_sn_copy_inicio; ?>"><?php echo $this->form_format_readonly("sn_copy_inicio", $this->form_encode_input($this->sn_copy_inicio)); ?></span><span id="id_read_off_sn_copy_inicio" class="css_read_off_sn_copy_inicio" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_copy_inicio; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_copy_inicio_obj" style="" id="id_sc_field_sn_copy_inicio" type=text name="sn_copy_inicio" value="<?php echo $this->form_encode_input($sn_copy_inicio) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_copy_inicio']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_copy_inicio']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_copy_inicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_copy_inicio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_copy_fin']))
    {
        $this->nm_new_label['sn_copy_fin'] = "COPY FIN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_copy_fin = $this->sn_copy_fin;
   $sStyleHidden_sn_copy_fin = '';
   if (isset($this->nmgp_cmp_hidden['sn_copy_fin']) && $this->nmgp_cmp_hidden['sn_copy_fin'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_copy_fin']);
       $sStyleHidden_sn_copy_fin = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_copy_fin = 'display: none;';
   $sStyleReadInp_sn_copy_fin = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_copy_fin']) && $this->nmgp_cmp_readonly['sn_copy_fin'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_copy_fin']);
       $sStyleReadLab_sn_copy_fin = '';
       $sStyleReadInp_sn_copy_fin = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_copy_fin']) && $this->nmgp_cmp_hidden['sn_copy_fin'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_copy_fin" value="<?php echo $this->form_encode_input($sn_copy_fin) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_copy_fin_label" id="hidden_field_label_sn_copy_fin" style="<?php echo $sStyleHidden_sn_copy_fin; ?>"><span id="id_label_sn_copy_fin"><?php echo $this->nm_new_label['sn_copy_fin']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_copy_fin_line" id="hidden_field_data_sn_copy_fin" style="<?php echo $sStyleHidden_sn_copy_fin; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_copy_fin_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_copy_fin"]) &&  $this->nmgp_cmp_readonly["sn_copy_fin"] == "on") { 

 ?>
<input type="hidden" name="sn_copy_fin" value="<?php echo $this->form_encode_input($sn_copy_fin) . "\">" . $sn_copy_fin . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_copy_fin" class="sc-ui-readonly-sn_copy_fin css_sn_copy_fin_line" style="<?php echo $sStyleReadLab_sn_copy_fin; ?>"><?php echo $this->form_format_readonly("sn_copy_fin", $this->form_encode_input($this->sn_copy_fin)); ?></span><span id="id_read_off_sn_copy_fin" class="css_read_off_sn_copy_fin" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_copy_fin; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_copy_fin_obj" style="" id="id_sc_field_sn_copy_fin" type=text name="sn_copy_fin" value="<?php echo $this->form_encode_input($sn_copy_fin) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_copy_fin']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_copy_fin']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_copy_fin_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_copy_fin_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_peso']))
    {
        $this->nm_new_label['sn_peso'] = "PESO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_peso = $this->sn_peso;
   $sStyleHidden_sn_peso = '';
   if (isset($this->nmgp_cmp_hidden['sn_peso']) && $this->nmgp_cmp_hidden['sn_peso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_peso']);
       $sStyleHidden_sn_peso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_peso = 'display: none;';
   $sStyleReadInp_sn_peso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_peso']) && $this->nmgp_cmp_readonly['sn_peso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_peso']);
       $sStyleReadLab_sn_peso = '';
       $sStyleReadInp_sn_peso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_peso']) && $this->nmgp_cmp_hidden['sn_peso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_peso" value="<?php echo $this->form_encode_input($sn_peso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_peso_label" id="hidden_field_label_sn_peso" style="<?php echo $sStyleHidden_sn_peso; ?>"><span id="id_label_sn_peso"><?php echo $this->nm_new_label['sn_peso']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_peso_line" id="hidden_field_data_sn_peso" style="<?php echo $sStyleHidden_sn_peso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_peso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_peso"]) &&  $this->nmgp_cmp_readonly["sn_peso"] == "on") { 

 ?>
<input type="hidden" name="sn_peso" value="<?php echo $this->form_encode_input($sn_peso) . "\">" . $sn_peso . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_peso" class="sc-ui-readonly-sn_peso css_sn_peso_line" style="<?php echo $sStyleReadLab_sn_peso; ?>"><?php echo $this->form_format_readonly("sn_peso", $this->form_encode_input($this->sn_peso)); ?></span><span id="id_read_off_sn_peso" class="css_read_off_sn_peso" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_peso; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_peso_obj" style="" id="id_sc_field_sn_peso" type=text name="sn_peso" value="<?php echo $this->form_encode_input($sn_peso) ?>"
 size=24 maxlength=24 alt="{datatype: 'text', maxLength: 24, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_peso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_peso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_intervalo']))
    {
        $this->nm_new_label['sn_intervalo'] = "INTERVALO (EN MILISEGUNDOS)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_intervalo = $this->sn_intervalo;
   $sStyleHidden_sn_intervalo = '';
   if (isset($this->nmgp_cmp_hidden['sn_intervalo']) && $this->nmgp_cmp_hidden['sn_intervalo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_intervalo']);
       $sStyleHidden_sn_intervalo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_intervalo = 'display: none;';
   $sStyleReadInp_sn_intervalo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_intervalo']) && $this->nmgp_cmp_readonly['sn_intervalo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_intervalo']);
       $sStyleReadLab_sn_intervalo = '';
       $sStyleReadInp_sn_intervalo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_intervalo']) && $this->nmgp_cmp_hidden['sn_intervalo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_intervalo" value="<?php echo $this->form_encode_input($sn_intervalo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_intervalo_label" id="hidden_field_label_sn_intervalo" style="<?php echo $sStyleHidden_sn_intervalo; ?>"><span id="id_label_sn_intervalo"><?php echo $this->nm_new_label['sn_intervalo']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_intervalo_line" id="hidden_field_data_sn_intervalo" style="<?php echo $sStyleHidden_sn_intervalo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_intervalo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_intervalo"]) &&  $this->nmgp_cmp_readonly["sn_intervalo"] == "on") { 

 ?>
<input type="hidden" name="sn_intervalo" value="<?php echo $this->form_encode_input($sn_intervalo) . "\">" . $sn_intervalo . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_intervalo" class="sc-ui-readonly-sn_intervalo css_sn_intervalo_line" style="<?php echo $sStyleReadLab_sn_intervalo; ?>"><?php echo $this->form_format_readonly("sn_intervalo", $this->form_encode_input($this->sn_intervalo)); ?></span><span id="id_read_off_sn_intervalo" class="css_read_off_sn_intervalo" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_intervalo; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_intervalo_obj" style="" id="id_sc_field_sn_intervalo" type=text name="sn_intervalo" value="<?php echo $this->form_encode_input($sn_intervalo) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_intervalo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_intervalo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_intervalo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_intervalo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_parametro']))
    {
        $this->nm_new_label['sn_parametro'] = "PARAMETRO BALANZA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_parametro = $this->sn_parametro;
   $sStyleHidden_sn_parametro = '';
   if (isset($this->nmgp_cmp_hidden['sn_parametro']) && $this->nmgp_cmp_hidden['sn_parametro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_parametro']);
       $sStyleHidden_sn_parametro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_parametro = 'display: none;';
   $sStyleReadInp_sn_parametro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_parametro']) && $this->nmgp_cmp_readonly['sn_parametro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_parametro']);
       $sStyleReadLab_sn_parametro = '';
       $sStyleReadInp_sn_parametro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_parametro']) && $this->nmgp_cmp_hidden['sn_parametro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_parametro" value="<?php echo $this->form_encode_input($sn_parametro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_parametro_label" id="hidden_field_label_sn_parametro" style="<?php echo $sStyleHidden_sn_parametro; ?>"><span id="id_label_sn_parametro"><?php echo $this->nm_new_label['sn_parametro']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_parametro_line" id="hidden_field_data_sn_parametro" style="<?php echo $sStyleHidden_sn_parametro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_parametro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_parametro"]) &&  $this->nmgp_cmp_readonly["sn_parametro"] == "on") { 

 ?>
<input type="hidden" name="sn_parametro" value="<?php echo $this->form_encode_input($sn_parametro) . "\">" . $sn_parametro . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_parametro" class="sc-ui-readonly-sn_parametro css_sn_parametro_line" style="<?php echo $sStyleReadLab_sn_parametro; ?>"><?php echo $this->form_format_readonly("sn_parametro", $this->form_encode_input($this->sn_parametro)); ?></span><span id="id_read_off_sn_parametro" class="css_read_off_sn_parametro" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_parametro; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_parametro_obj" style="" id="id_sc_field_sn_parametro" type=text name="sn_parametro" value="<?php echo $this->form_encode_input($sn_parametro) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_parametro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_parametro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sn_divisor']))
    {
        $this->nm_new_label['sn_divisor'] = "DIVISOR";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_divisor = $this->sn_divisor;
   $sStyleHidden_sn_divisor = '';
   if (isset($this->nmgp_cmp_hidden['sn_divisor']) && $this->nmgp_cmp_hidden['sn_divisor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_divisor']);
       $sStyleHidden_sn_divisor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_divisor = 'display: none;';
   $sStyleReadInp_sn_divisor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_divisor']) && $this->nmgp_cmp_readonly['sn_divisor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_divisor']);
       $sStyleReadLab_sn_divisor = '';
       $sStyleReadInp_sn_divisor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_divisor']) && $this->nmgp_cmp_hidden['sn_divisor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sn_divisor" value="<?php echo $this->form_encode_input($sn_divisor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_divisor_label" id="hidden_field_label_sn_divisor" style="<?php echo $sStyleHidden_sn_divisor; ?>"><span id="id_label_sn_divisor"><?php echo $this->nm_new_label['sn_divisor']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_divisor_line" id="hidden_field_data_sn_divisor" style="<?php echo $sStyleHidden_sn_divisor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_divisor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_divisor"]) &&  $this->nmgp_cmp_readonly["sn_divisor"] == "on") { 

 ?>
<input type="hidden" name="sn_divisor" value="<?php echo $this->form_encode_input($sn_divisor) . "\">" . $sn_divisor . ""; ?>
<?php } else { ?>
<span id="id_read_on_sn_divisor" class="sc-ui-readonly-sn_divisor css_sn_divisor_line" style="<?php echo $sStyleReadLab_sn_divisor; ?>"><?php echo $this->form_format_readonly("sn_divisor", $this->form_encode_input($this->sn_divisor)); ?></span><span id="id_read_off_sn_divisor" class="css_read_off_sn_divisor" style="white-space: nowrap;<?php echo $sStyleReadInp_sn_divisor; ?>">
 <input class="sc-js-input scFormObjectOdd css_sn_divisor_obj" style="" id="id_sc_field_sn_divisor" type=text name="sn_divisor" value="<?php echo $this->form_encode_input($sn_divisor) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['sn_divisor']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sn_divisor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_divisor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_divisor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['sn_modo']))
   {
       $this->nm_new_label['sn_modo'] = "MODO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sn_modo = $this->sn_modo;
   $sStyleHidden_sn_modo = '';
   if (isset($this->nmgp_cmp_hidden['sn_modo']) && $this->nmgp_cmp_hidden['sn_modo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sn_modo']);
       $sStyleHidden_sn_modo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sn_modo = 'display: none;';
   $sStyleReadInp_sn_modo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sn_modo']) && $this->nmgp_cmp_readonly['sn_modo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sn_modo']);
       $sStyleReadLab_sn_modo = '';
       $sStyleReadInp_sn_modo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sn_modo']) && $this->nmgp_cmp_hidden['sn_modo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sn_modo" value="<?php echo $this->form_encode_input($this->sn_modo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sn_modo_label" id="hidden_field_label_sn_modo" style="<?php echo $sStyleHidden_sn_modo; ?>"><span id="id_label_sn_modo"><?php echo $this->nm_new_label['sn_modo']; ?></span></TD>
    <TD class="scFormDataOdd css_sn_modo_line" id="hidden_field_data_sn_modo" style="<?php echo $sStyleHidden_sn_modo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sn_modo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sn_modo"]) &&  $this->nmgp_cmp_readonly["sn_modo"] == "on") { 

$sn_modo_look = "";
 if ($this->sn_modo == "PRUEBA") { $sn_modo_look .= "PRUEBA" ;} 
 if ($this->sn_modo == "PRODUCCION") { $sn_modo_look .= "PRODUCCIÓN" ;} 
 if (empty($sn_modo_look)) { $sn_modo_look = $this->sn_modo; }
?>
<input type="hidden" name="sn_modo" value="<?php echo $this->form_encode_input($sn_modo) . "\">" . $sn_modo_look . ""; ?>
<?php } else { ?>
<?php

$sn_modo_look = "";
 if ($this->sn_modo == "PRUEBA") { $sn_modo_look .= "PRUEBA" ;} 
 if ($this->sn_modo == "PRODUCCION") { $sn_modo_look .= "PRODUCCIÓN" ;} 
 if (empty($sn_modo_look)) { $sn_modo_look = $this->sn_modo; }
?>
<span id="id_read_on_sn_modo" class="css_sn_modo_line"  style="<?php echo $sStyleReadLab_sn_modo; ?>"><?php echo $this->form_format_readonly("sn_modo", $this->form_encode_input($sn_modo_look)); ?></span><span id="id_read_off_sn_modo" class="css_read_off_sn_modo" style="white-space: nowrap; <?php echo $sStyleReadInp_sn_modo; ?>">
 <span id="idAjaxSelect_sn_modo"><select class="sc-js-input scFormObjectOdd css_sn_modo_obj" style="" id="id_sc_field_sn_modo" name="sn_modo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="PRUEBA" <?php  if ($this->sn_modo == "PRUEBA") { echo " selected" ;} ?>>PRUEBA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_modo'][] = 'PRUEBA'; ?>
 <option  value="PRODUCCION" <?php  if ($this->sn_modo == "PRODUCCION") { echo " selected" ;} ?>>PRODUCCIÓN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['Lookup_sn_modo'][] = 'PRODUCCION'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sn_modo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sn_modo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id']))
    {
        $this->nm_new_label['id'] = "ID";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id = $this->id;
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
   $sStyleHidden_id = '';
   if (isset($this->nmgp_cmp_hidden['id']) && $this->nmgp_cmp_hidden['id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id']);
       $sStyleHidden_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id = 'display: none;';
   $sStyleReadInp_id = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id"]) &&  $this->nmgp_cmp_readonly["id"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id']);
       $sStyleReadLab_id = '';
       $sStyleReadInp_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id']) && $this->nmgp_cmp_hidden['id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_label" id="hidden_field_label_id" style="<?php echo $sStyleHidden_id; ?>"><span id="id_label_id"><?php echo $this->nm_new_label['id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['php_cmp_required']['id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['php_cmp_required']['id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_id_line" id="hidden_field_data_id" style="<?php echo $sStyleHidden_id; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id"]) &&  $this->nmgp_cmp_readonly["id"] == "on")) { 

 ?>
<input type="hidden" name="id" value="<?php echo $this->form_encode_input($id) . "\"><span id=\"id_ajax_label_id\">" . $id . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id" class="sc-ui-readonly-id css_id_line" style="<?php echo $sStyleReadLab_id; ?>"><?php echo $this->form_format_readonly("id", $this->form_encode_input($this->id)); ?></span><span id="id_read_off_id" class="css_read_off_id" style="white-space: nowrap;<?php echo $sStyleReadInp_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_obj" style="" id="id_sc_field_id" type=text name="id" value="<?php echo $this->form_encode_input($id) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_SN_BALANZA");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_SN_BALANZA");
 parent.scAjaxDetailHeight("form_SN_BALANZA", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_SN_BALANZA", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_SN_BALANZA", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['sc_modal'])
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
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_SN_BALANZA']['buttonStatus'] = $this->nmgp_botoes;
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
