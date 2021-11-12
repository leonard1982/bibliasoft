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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Iniciar Sesión"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>iniciar_sesion/iniciar_sesion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("iniciar_sesion_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['last'] : 'off'); ?>";
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

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     if (F_name == "licencia")
     {
        $('input[name="licencia"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="licencia"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="licencia"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('iniciar_sesion_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('usuario');

<?php
}
?>
  sc_form_onload();

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
$str_iframe_body = 'margin-top: 130px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("iniciar_sesion_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['iniciar_sesion'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['iniciar_sesion'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Iniciar Sesión"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo "" . $_SESSION['gnuevaactualizacion'] . "" ?></span></td>
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['empty_filter'] = true;
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
    if (!isset($this->nm_new_label['licencia']))
    {
        $this->nm_new_label['licencia'] = "Licencia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $licencia = $this->licencia;
   $sStyleHidden_licencia = '';
   if (isset($this->nmgp_cmp_hidden['licencia']) && $this->nmgp_cmp_hidden['licencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['licencia']);
       $sStyleHidden_licencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_licencia = 'display: none;';
   $sStyleReadInp_licencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['licencia']) && $this->nmgp_cmp_readonly['licencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['licencia']);
       $sStyleReadLab_licencia = '';
       $sStyleReadInp_licencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['licencia']) && $this->nmgp_cmp_hidden['licencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licencia" value="<?php echo $this->form_encode_input($licencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_licencia_label" id="hidden_field_label_licencia" style="<?php echo $sStyleHidden_licencia; ?>"><span id="id_label_licencia"><?php echo $this->nm_new_label['licencia']; ?></span></TD>
    <TD class="scFormDataOdd css_licencia_line" id="hidden_field_data_licencia" style="<?php echo $sStyleHidden_licencia; ?>"><input type="hidden" name="licencia" value="<?php echo $this->form_encode_input($licencia); ?>"><span id="id_ajax_label_licencia"><?php echo nl2br($licencia); ?></span>
</TD>
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
   if (!isset($this->nm_new_label['empresa']))
   {
       $this->nm_new_label['empresa'] = "Empresa";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['empresa']) && $this->nmgp_cmp_hidden['empresa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="empresa" value="<?php echo $this->form_encode_input($this->empresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_empresa_label" id="hidden_field_label_empresa" style="<?php echo $sStyleHidden_empresa; ?>"><span id="id_label_empresa"><?php echo $this->nm_new_label['empresa']; ?></span></TD>
    <TD class="scFormDataOdd css_empresa_line" id="hidden_field_data_empresa" style="<?php echo $sStyleHidden_empresa; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["empresa"]) &&  $this->nmgp_cmp_readonly["empresa"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_con_conn_facilweb['tpbanco']), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa'] = array(); 
    }
   $nm_comando = "SELECT nombre,nombre_empresa FROM empresas  ORDER BY idempresa";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Ini->nm_db_conn_facilweb->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['Lookup_empresa'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_facilweb->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $empresa_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->empresa_1))
          {
              foreach ($this->empresa_1 as $tmp_empresa)
              {
                  if (trim($tmp_empresa) === trim($cadaselect[1])) { $empresa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->empresa) === trim($cadaselect[1])) { $empresa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="empresa" value="<?php echo $this->form_encode_input($empresa) . "\">" . $empresa_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_empresa();
   $x = 0 ; 
   $empresa_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->empresa_1))
          {
              foreach ($this->empresa_1 as $tmp_empresa)
              {
                  if (trim($tmp_empresa) === trim($cadaselect[1])) { $empresa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->empresa) === trim($cadaselect[1])) { $empresa_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($empresa_look))
          {
              $empresa_look = $this->empresa;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_empresa\" class=\"css_empresa_line\" style=\"" .  $sStyleReadLab_empresa . "\">" . $this->form_format_readonly("empresa", $this->form_encode_input($empresa_look)) . "</span><span id=\"id_read_off_empresa\" class=\"css_read_off_empresa" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_empresa . "\">";
   echo " <span id=\"idAjaxSelect_empresa\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_empresa_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_empresa\" name=\"empresa\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->empresa) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->empresa)) 
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


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuario']))
    {
        $this->nm_new_label['usuario'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario = $this->usuario;
   $sStyleHidden_usuario = '';
   if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario']);
       $sStyleHidden_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario = 'display: none;';
   $sStyleReadInp_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario']) && $this->nmgp_cmp_readonly['usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario']);
       $sStyleReadLab_usuario = '';
       $sStyleReadInp_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario_label" id="hidden_field_label_usuario" style="<?php echo $sStyleHidden_usuario; ?>"><span id="id_label_usuario"><?php echo $this->nm_new_label['usuario']; ?></span></TD>
    <TD class="scFormDataOdd css_usuario_line" id="hidden_field_data_usuario" style="<?php echo $sStyleHidden_usuario; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario"]) &&  $this->nmgp_cmp_readonly["usuario"] == "on") { 

 ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">" . $usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario" class="sc-ui-readonly-usuario css_usuario_line" style="<?php echo $sStyleReadLab_usuario; ?>"><?php echo $this->form_format_readonly("usuario", $this->form_encode_input($this->usuario)); ?></span><span id="id_read_off_usuario" class="css_read_off_usuario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario" type=text name="usuario" value="<?php echo $this->form_encode_input($usuario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=27"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
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
        $this->nm_new_label['password'] = "Contraseña";
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
    <TD class="scFormDataOdd css_password_line" id="hidden_field_data_password" style="<?php echo $sStyleHidden_password; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password"]) &&  $this->nmgp_cmp_readonly["password"] == "on") { ?>
<input type="hidden" name="password" value="">
<?php } else { ?>
<span id="id_read_on_password" class="sc-ui-readonly-password css_password_line" style="<?php echo $sStyleReadLab_password; ?>"><?php echo $this->form_format_readonly("password", $this->form_encode_input($this->password)); ?></span><span id="id_read_off_password" class="css_read_off_password<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password; ?>"><div class="scFormObjectOddPwdBox"><input class="sc-js-input scFormObjectOddPwdInput scFormObjectOddPwdText sc-ui-pwd-toggle css_password_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_password" type="password" autocomplete="off" name="password" value="" 
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=27"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><span id="id_pwd_show_hide_password" class="sc-ui-pwd-toggle-icon"><i class="fa fa-eye sc-ui-pwd-eye" aria-hidden="true" id="id_pwd_fa_password"></i></span></div></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['version_actual']))
    {
        $this->nm_new_label['version_actual'] = "Versión";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $version_actual = $this->version_actual;
   $sStyleHidden_version_actual = '';
   if (isset($this->nmgp_cmp_hidden['version_actual']) && $this->nmgp_cmp_hidden['version_actual'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['version_actual']);
       $sStyleHidden_version_actual = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_version_actual = 'display: none;';
   $sStyleReadInp_version_actual = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['version_actual']) && $this->nmgp_cmp_readonly['version_actual'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['version_actual']);
       $sStyleReadLab_version_actual = '';
       $sStyleReadInp_version_actual = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['version_actual']) && $this->nmgp_cmp_hidden['version_actual'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="version_actual" value="<?php echo $this->form_encode_input($version_actual) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_version_actual_label" id="hidden_field_label_version_actual" style="<?php echo $sStyleHidden_version_actual; ?>"><span id="id_label_version_actual"><?php echo $this->nm_new_label['version_actual']; ?></span></TD>
    <TD class="scFormDataOdd css_version_actual_line" id="hidden_field_data_version_actual" style="<?php echo $sStyleHidden_version_actual; ?>"><input type="hidden" name="version_actual" value="<?php echo $this->form_encode_input($version_actual); ?>"><span id="id_ajax_label_version_actual"><?php echo nl2br($version_actual); ?></span>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="100%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['logo']))
    {
        $this->nm_new_label['logo'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $logo = $this->logo;
   $sStyleHidden_logo = '';
   if (isset($this->nmgp_cmp_hidden['logo']) && $this->nmgp_cmp_hidden['logo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['logo']);
       $sStyleHidden_logo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_logo = 'display: none;';
   $sStyleReadInp_logo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['logo']) && $this->nmgp_cmp_readonly['logo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['logo']);
       $sStyleReadLab_logo = '';
       $sStyleReadInp_logo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['logo']) && $this->nmgp_cmp_hidden['logo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="logo" value="<?php echo $this->form_encode_input($logo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_logo_label" id="hidden_field_label_logo" style="<?php echo $sStyleHidden_logo; ?>"><span id="id_label_logo"><?php echo $this->nm_new_label['logo']; ?></span></TD>
    <TD class="scFormDataOdd css_logo_line" id="hidden_field_data_logo" style="<?php echo $sStyleHidden_logo; ?>"><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__logo_facilweb.jpeg"))
          { 
              $logo = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $logo = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_logo = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__logo_facilweb.jpeg"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__logo_facilweb.jpeg"); 
              $out_logo = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_logo = "sc_" . $out_logo . "_logo_188188_" . $img_time . "_grp__NM__bg__NM__logo_facilweb.jpeg";
              $out_logo = $this->Ini->path_imag_temp . "/sc_" . $out_logo . "_logo_188188_" . $img_time . "_grp__NM__bg__NM__logo_facilweb.jpeg";
              if (!is_file($this->Ini->root . $out_logo)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_logo, true);
                  $sc_obj_img->setWidth(188);
                  $sc_obj_img->setHeight(188);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_logo);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_logo;
                  $logo = "<img  border=\"0\" src=\"" . $prt_logo . "\"/>" ; 
              }
              else {
                  $logo = "<img  border=\"0\" src=\"" . $out_logo . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_logo"><?php echo $logo; ?>
</span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["logo"]) &&  $this->nmgp_cmp_readonly["logo"] == "on") { 

 ?>
<input type="hidden" name="logo" value="<?php echo $this->form_encode_input($logo) . "\">" . $logo . ""; ?>
<?php } else { ?>
<span id="id_read_on_logo" class="sc-ui-readonly-logo css_logo_line" style="<?php echo $sStyleReadLab_logo; ?>"><?php echo $this->form_format_readonly("logo", $this->form_encode_input($this->logo)); ?></span><span id="id_read_off_logo" class="css_read_off_logo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_logo; ?>"></span><?php } ?>
</TD>
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
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['administrar']))
    {
        $this->nm_new_label['administrar'] = "Enlaces";
    }
?>
<?php if (isset($this->nmgp_cmp_hidden['administrar']) && $this->nmgp_cmp_hidden['administrar'] == 'off') { $sc_hidden_yes++; ?>
<input type="hidden" name="administrar" value="<?php echo $this->form_encode_input($this->administrar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_administrar_label" id="hidden_field_label_administrar" style="<?php echo $sStyleHidden_administrar; ?>"><span id="id_label_administrar"><?php echo $this->nm_new_label['administrar']; ?></span></TD>
    <TD class="scFormDataOdd css_administrar_line" id="hidden_field_data_administrar" style="<?php echo $sStyleHidden_administrar; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["administrar"]) &&  $this->nmgp_cmp_readonly["administrar"] == "on") { 

 ?>
<input type="hidden" name="administrar" value="<?php echo $this->form_encode_input($administrar) . "\">" . $administrar . ""; ?>
<?php } else { ?>

<input type="hidden" name="administrar" value = "">
<input type="hidden" name="administrar_sc_target_name" value = "">

<a href="javascript:nm_menu_link_administrar('../_lib', '_self')" title="Administrar Conexiones"><img src="<?php echo $this->Ini->path_icones . "/scriptcase__NM__ico__NM__gear_connection_32.png" ?>" align="absmiddle" border="0"></a>&nbsp;
<br>

 <a href="javascript:nm_menu_link_administrar('../_lib', '_self')" class="scFormLinkOdd">Administrar Conexiones</a>
<br>

<a href="javascript:nm_menu_link_administrar('https://www.youtube.com/channel/UCFe8zYL0hV3G9fe1MbJdDBg?view_as=subscriber', '_self')" title="Aprende en el canal de Youtube"><img src="<?php echo $this->Ini->path_icones . "/scriptcase__NM__ico__NM__videocamera_run_32.png" ?>" align="absmiddle" border="0"></a>&nbsp;
<br>

 <a href="javascript:nm_menu_link_administrar('https://www.youtube.com/channel/UCFe8zYL0hV3G9fe1MbJdDBg?view_as=subscriber', '_self')" class="scFormLinkOdd">Aprende en el canal de Youtube</a>
<br>

<a href="javascript:nm_menu_link_administrar('blank_hacer_backup', '_self')" title="Copias de Seguridad"><img src="<?php echo $this->Ini->path_icones . "/scriptcase__NM__ico__NM__data_copy_32.png" ?>" align="absmiddle" border="0"></a>&nbsp;
<br>

 <a href="javascript:nm_menu_link_administrar('blank_hacer_backup', '_self')" class="scFormLinkOdd">Copias de Seguridad</a>
<br>

<a href="javascript:nm_menu_link_administrar('blank_restaurar_backup', '_self')" title="Restaurar Copia"><img src="<?php echo $this->Ini->path_icones . "/scriptcase__NM__ico__NM__cd_data_32.png" ?>" align="absmiddle" border="0"></a>&nbsp;
<br>

 <a href="javascript:nm_menu_link_administrar('blank_restaurar_backup', '_self')" class="scFormLinkOdd">Restaurar Copia</a>
<?php  } ?>
</TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="6" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 

<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       <?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['btn_label']['ok'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
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
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['maximized']))
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
            <span class="scFormFooterFont" id="rod_col1"><?php echo "Facilweb - Todos los derechos reservados 2018 - Col." ?></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"><?php echo "www.solucionesnavarro.com" ?></span>
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

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("iniciar_sesion");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("iniciar_sesion");
 parent.scAjaxDetailHeight("iniciar_sesion", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("iniciar_sesion", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("iniciar_sesion", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['sc_modal'])
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
	}
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-3").length && $("#sub_form_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-3").hasClass("disabled")) {
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
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['iniciar_sesion']['buttonStatus'] = $this->nmgp_botoes;
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
