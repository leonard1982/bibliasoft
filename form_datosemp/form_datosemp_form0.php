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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("DATOS DE LA EMPRESA"); } else { echo strip_tags("DATOS DE LA EMPRESA"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_datosemp/form_datosemp_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_datosemp_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_datosemp_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('codigo_te');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_datosemp_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="ruta_logo_salva" value="<?php  echo $this->form_encode_input($this->ruta_logo) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_datosemp'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_datosemp'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "DATOS DE LA EMPRESA"; } else { echo "DATOS DE LA EMPRESA"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['update'];
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
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['sc_btn_0']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['sc_btn_0']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['sc_btn_0']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['sc_btn_0']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['sc_btn_0'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "scBtnFn_sc_btn_0()", "scBtnFn_sc_btn_0()", "sc_sc_btn_0_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="60%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['iddatos']))
   {
       $this->nmgp_cmp_hidden['iddatos'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['responsab_trib']))
   {
       $this->nmgp_cmp_hidden['responsab_trib'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="logo_ul_name" id="id_sc_field_logo_ul_name" value="<?php echo $this->form_encode_input($this->logo_ul_name);?>">
<input type="hidden" name="logo_ul_type" id="id_sc_field_logo_ul_type" value="<?php echo $this->form_encode_input($this->logo_ul_type);?>">
<input type="hidden" name="ruta_logo_ul_name" id="id_sc_field_ruta_logo_ul_name" value="<?php echo $this->form_encode_input($this->ruta_logo_ul_name);?>">
<input type="hidden" name="ruta_logo_ul_type" id="id_sc_field_ruta_logo_ul_type" value="<?php echo $this->form_encode_input($this->ruta_logo_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['codigo_te']))
   {
       $this->nm_new_label['codigo_te'] = "TIPO ESTABLECIMIENTO**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_te = $this->codigo_te;
   $sStyleHidden_codigo_te = '';
   if (isset($this->nmgp_cmp_hidden['codigo_te']) && $this->nmgp_cmp_hidden['codigo_te'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_te']);
       $sStyleHidden_codigo_te = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_te = 'display: none;';
   $sStyleReadInp_codigo_te = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_te']) && $this->nmgp_cmp_readonly['codigo_te'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_te']);
       $sStyleReadLab_codigo_te = '';
       $sStyleReadInp_codigo_te = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_te']) && $this->nmgp_cmp_hidden['codigo_te'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codigo_te" value="<?php echo $this->form_encode_input($this->codigo_te) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_te_line" id="hidden_field_data_codigo_te" style="<?php echo $sStyleHidden_codigo_te; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_te_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_te_label" style=""><span id="id_label_codigo_te"><?php echo $this->nm_new_label['codigo_te']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_te"]) &&  $this->nmgp_cmp_readonly["codigo_te"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_te, codigo_te + ' - ' + descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_te, concat(codigo_te, ' - ',descripcion_te)  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_te, codigo_te&' - '&descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_te, codigo_te + ' - ' + descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   else
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigo_te'][] = $rs->fields[0];
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
   $codigo_te_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigo_te_1))
          {
              foreach ($this->codigo_te_1 as $tmp_codigo_te)
              {
                  if (trim($tmp_codigo_te) === trim($cadaselect[1])) { $codigo_te_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigo_te) === trim($cadaselect[1])) { $codigo_te_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="codigo_te" value="<?php echo $this->form_encode_input($codigo_te) . "\">" . $codigo_te_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_codigo_te();
   $x = 0 ; 
   $codigo_te_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigo_te_1))
          {
              foreach ($this->codigo_te_1 as $tmp_codigo_te)
              {
                  if (trim($tmp_codigo_te) === trim($cadaselect[1])) { $codigo_te_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigo_te) === trim($cadaselect[1])) { $codigo_te_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($codigo_te_look))
          {
              $codigo_te_look = $this->codigo_te;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_codigo_te\" class=\"css_codigo_te_line\" style=\"" .  $sStyleReadLab_codigo_te . "\">" . $this->form_format_readonly("codigo_te", $this->form_encode_input($codigo_te_look)) . "</span><span id=\"id_read_off_codigo_te\" class=\"css_read_off_codigo_te" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_codigo_te . "\">";
   echo " <span id=\"idAjaxSelect_codigo_te\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_codigo_te_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_codigo_te\" name=\"codigo_te\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->codigo_te) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->codigo_te)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_te_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_te_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sucursal']))
   {
       $this->nm_new_label['sucursal'] = "CÓDIGO SUCURSAL**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sucursal = $this->sucursal;
   $sStyleHidden_sucursal = '';
   if (isset($this->nmgp_cmp_hidden['sucursal']) && $this->nmgp_cmp_hidden['sucursal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sucursal']);
       $sStyleHidden_sucursal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sucursal = 'display: none;';
   $sStyleReadInp_sucursal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sucursal']) && $this->nmgp_cmp_readonly['sucursal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sucursal']);
       $sStyleReadLab_sucursal = '';
       $sStyleReadInp_sucursal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sucursal']) && $this->nmgp_cmp_hidden['sucursal'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sucursal" value="<?php echo $this->form_encode_input($this->sucursal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sucursal_line" id="hidden_field_data_sucursal" style="<?php echo $sStyleHidden_sucursal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sucursal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sucursal_label" style=""><span id="id_label_sucursal"><?php echo $this->nm_new_label['sucursal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sucursal"]) &&  $this->nmgp_cmp_readonly["sucursal"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc + ' - ' + observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_suc, concat(codigo_suc,' - ', observacion_suc)  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc&' - '&observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc + ' - ' + observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   else
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_sucursal'][] = $rs->fields[0];
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
   $sucursal_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sucursal_1))
          {
              foreach ($this->sucursal_1 as $tmp_sucursal)
              {
                  if (trim($tmp_sucursal) === trim($cadaselect[1])) { $sucursal_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sucursal) === trim($cadaselect[1])) { $sucursal_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sucursal" value="<?php echo $this->form_encode_input($sucursal) . "\">" . $sucursal_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sucursal();
   $x = 0 ; 
   $sucursal_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sucursal_1))
          {
              foreach ($this->sucursal_1 as $tmp_sucursal)
              {
                  if (trim($tmp_sucursal) === trim($cadaselect[1])) { $sucursal_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sucursal) === trim($cadaselect[1])) { $sucursal_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sucursal_look))
          {
              $sucursal_look = $this->sucursal;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sucursal\" class=\"css_sucursal_line\" style=\"" .  $sStyleReadLab_sucursal . "\">" . $this->form_format_readonly("sucursal", $this->form_encode_input($sucursal_look)) . "</span><span id=\"id_read_off_sucursal\" class=\"css_read_off_sucursal" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_sucursal . "\">";
   echo " <span id=\"idAjaxSelect_sucursal\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_sucursal_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_sucursal\" name=\"sucursal\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sucursal) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sucursal)) 
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
   if (isset($this->Ini->sc_lig_md5["form_sucursales"]) && $this->Ini->sc_lig_md5["form_sucursales"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_datosemp_lkpedt_refresh_sucursal*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_datosemp@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_datosemp_lkpedt_refresh_sucursal*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_sucursales_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_sucursales_edit. "', '" . $Md5_Lig . "')", "fldedt_sucursal", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sucursal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sucursal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razonsoc']))
    {
        $this->nm_new_label['razonsoc'] = "NOMBRES";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razonsoc = $this->razonsoc;
   $sStyleHidden_razonsoc = '';
   if (isset($this->nmgp_cmp_hidden['razonsoc']) && $this->nmgp_cmp_hidden['razonsoc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razonsoc']);
       $sStyleHidden_razonsoc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razonsoc = 'display: none;';
   $sStyleReadInp_razonsoc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razonsoc']) && $this->nmgp_cmp_readonly['razonsoc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razonsoc']);
       $sStyleReadLab_razonsoc = '';
       $sStyleReadInp_razonsoc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razonsoc']) && $this->nmgp_cmp_hidden['razonsoc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razonsoc" value="<?php echo $this->form_encode_input($razonsoc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_razonsoc_line" id="hidden_field_data_razonsoc" style="<?php echo $sStyleHidden_razonsoc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razonsoc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_razonsoc_label" style=""><span id="id_label_razonsoc"><?php echo $this->nm_new_label['razonsoc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['php_cmp_required']['razonsoc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['php_cmp_required']['razonsoc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razonsoc"]) &&  $this->nmgp_cmp_readonly["razonsoc"] == "on") { 

 ?>
<input type="hidden" name="razonsoc" value="<?php echo $this->form_encode_input($razonsoc) . "\">" . $razonsoc . ""; ?>
<?php } else { ?>
<span id="id_read_on_razonsoc" class="sc-ui-readonly-razonsoc css_razonsoc_line" style="<?php echo $sStyleReadLab_razonsoc; ?>"><?php echo $this->form_format_readonly("razonsoc", $this->form_encode_input($this->razonsoc)); ?></span><span id="id_read_off_razonsoc" class="css_read_off_razonsoc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razonsoc; ?>">
 <input class="sc-js-input scFormObjectOdd css_razonsoc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_razonsoc" type=text name="razonsoc" value="<?php echo $this->form_encode_input($razonsoc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ej: Papitas fritas-Pepita Pérez', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razonsoc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razonsoc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_comercial']))
    {
        $this->nm_new_label['nombre_comercial'] = "NOMBRE COMERCIAL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_comercial = $this->nombre_comercial;
   $sStyleHidden_nombre_comercial = '';
   if (isset($this->nmgp_cmp_hidden['nombre_comercial']) && $this->nmgp_cmp_hidden['nombre_comercial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_comercial']);
       $sStyleHidden_nombre_comercial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_comercial = 'display: none;';
   $sStyleReadInp_nombre_comercial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_comercial']) && $this->nmgp_cmp_readonly['nombre_comercial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_comercial']);
       $sStyleReadLab_nombre_comercial = '';
       $sStyleReadInp_nombre_comercial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_comercial']) && $this->nmgp_cmp_hidden['nombre_comercial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_comercial" value="<?php echo $this->form_encode_input($nombre_comercial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_comercial_line" id="hidden_field_data_nombre_comercial" style="<?php echo $sStyleHidden_nombre_comercial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_comercial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_comercial_label" style=""><span id="id_label_nombre_comercial"><?php echo $this->nm_new_label['nombre_comercial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_comercial"]) &&  $this->nmgp_cmp_readonly["nombre_comercial"] == "on") { 

 ?>
<input type="hidden" name="nombre_comercial" value="<?php echo $this->form_encode_input($nombre_comercial) . "\">" . $nombre_comercial . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_comercial" class="sc-ui-readonly-nombre_comercial css_nombre_comercial_line" style="<?php echo $sStyleReadLab_nombre_comercial; ?>"><?php echo $this->form_format_readonly("nombre_comercial", $this->form_encode_input($this->nombre_comercial)); ?></span><span id="id_read_off_nombre_comercial" class="css_read_off_nombre_comercial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_comercial; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_comercial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_comercial" type=text name="nombre_comercial" value="<?php echo $this->form_encode_input($nombre_comercial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_comercial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_comercial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['regimen']))
   {
       $this->nm_new_label['regimen'] = "RÉGIMEN";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regimen = $this->regimen;
   $sStyleHidden_regimen = '';
   if (isset($this->nmgp_cmp_hidden['regimen']) && $this->nmgp_cmp_hidden['regimen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regimen']);
       $sStyleHidden_regimen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regimen = 'display: none;';
   $sStyleReadInp_regimen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regimen']) && $this->nmgp_cmp_readonly['regimen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regimen']);
       $sStyleReadLab_regimen = '';
       $sStyleReadInp_regimen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regimen']) && $this->nmgp_cmp_hidden['regimen'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="regimen" value="<?php echo $this->form_encode_input($this->regimen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_regimen_line" id="hidden_field_data_regimen" style="<?php echo $sStyleHidden_regimen; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regimen_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regimen_label" style=""><span id="id_label_regimen"><?php echo $this->nm_new_label['regimen']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regimen"]) &&  $this->nmgp_cmp_readonly["regimen"] == "on") { 

$regimen_look = "";
 if ($this->regimen == "0") { $regimen_look .= "No responsable de IVA" ;} 
 if ($this->regimen == "1") { $regimen_look .= "Responsable de IVA" ;} 
 if (empty($regimen_look)) { $regimen_look = $this->regimen; }
?>
<input type="hidden" name="regimen" value="<?php echo $this->form_encode_input($regimen) . "\">" . $regimen_look . ""; ?>
<?php } else { ?>
<?php

$regimen_look = "";
 if ($this->regimen == "0") { $regimen_look .= "No responsable de IVA" ;} 
 if ($this->regimen == "1") { $regimen_look .= "Responsable de IVA" ;} 
 if (empty($regimen_look)) { $regimen_look = $this->regimen; }
?>
<span id="id_read_on_regimen" class="css_regimen_line"  style="<?php echo $sStyleReadLab_regimen; ?>"><?php echo $this->form_format_readonly("regimen", $this->form_encode_input($regimen_look)); ?></span><span id="id_read_off_regimen" class="css_read_off_regimen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_regimen; ?>">
 <span id="idAjaxSelect_regimen" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_regimen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_regimen" name="regimen" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="0" <?php  if ($this->regimen == "0") { echo " selected" ;} ?><?php  if (empty($this->regimen)) { echo " selected" ;} ?>>No responsable de IVA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_regimen'][] = '0'; ?>
 <option  value="1" <?php  if ($this->regimen == "1") { echo " selected" ;} ?>>Responsable de IVA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_regimen'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regimen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regimen_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['naturaleza']))
   {
       $this->nm_new_label['naturaleza'] = "NATURALEZA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $naturaleza = $this->naturaleza;
   $sStyleHidden_naturaleza = '';
   if (isset($this->nmgp_cmp_hidden['naturaleza']) && $this->nmgp_cmp_hidden['naturaleza'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['naturaleza']);
       $sStyleHidden_naturaleza = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_naturaleza = 'display: none;';
   $sStyleReadInp_naturaleza = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['naturaleza']) && $this->nmgp_cmp_readonly['naturaleza'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['naturaleza']);
       $sStyleReadLab_naturaleza = '';
       $sStyleReadInp_naturaleza = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['naturaleza']) && $this->nmgp_cmp_hidden['naturaleza'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="naturaleza" value="<?php echo $this->form_encode_input($this->naturaleza) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_naturaleza_line" id="hidden_field_data_naturaleza" style="<?php echo $sStyleHidden_naturaleza; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_naturaleza_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_naturaleza_label" style=""><span id="id_label_naturaleza"><?php echo $this->nm_new_label['naturaleza']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["naturaleza"]) &&  $this->nmgp_cmp_readonly["naturaleza"] == "on") { 

$naturaleza_look = "";
 if ($this->naturaleza == "1") { $naturaleza_look .= "Natural" ;} 
 if ($this->naturaleza == "2") { $naturaleza_look .= "Jurídica" ;} 
 if (empty($naturaleza_look)) { $naturaleza_look = $this->naturaleza; }
?>
<input type="hidden" name="naturaleza" value="<?php echo $this->form_encode_input($naturaleza) . "\">" . $naturaleza_look . ""; ?>
<?php } else { ?>
<?php

$naturaleza_look = "";
 if ($this->naturaleza == "1") { $naturaleza_look .= "Natural" ;} 
 if ($this->naturaleza == "2") { $naturaleza_look .= "Jurídica" ;} 
 if (empty($naturaleza_look)) { $naturaleza_look = $this->naturaleza; }
?>
<span id="id_read_on_naturaleza" class="css_naturaleza_line"  style="<?php echo $sStyleReadLab_naturaleza; ?>"><?php echo $this->form_format_readonly("naturaleza", $this->form_encode_input($naturaleza_look)); ?></span><span id="id_read_off_naturaleza" class="css_read_off_naturaleza<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_naturaleza; ?>">
 <span id="idAjaxSelect_naturaleza" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_naturaleza_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_naturaleza" name="naturaleza" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="1" <?php  if ($this->naturaleza == "1") { echo " selected" ;} ?><?php  if (empty($this->naturaleza)) { echo " selected" ;} ?>>Natural</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_naturaleza'][] = '1'; ?>
 <option  value="2" <?php  if ($this->naturaleza == "2") { echo " selected" ;} ?>>Jurídica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_naturaleza'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_naturaleza_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_naturaleza_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_documento']))
   {
       $this->nm_new_label['tipo_documento'] = "TIPO DOCUMENTO";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_documento = $this->tipo_documento;
   $sStyleHidden_tipo_documento = '';
   if (isset($this->nmgp_cmp_hidden['tipo_documento']) && $this->nmgp_cmp_hidden['tipo_documento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_documento']);
       $sStyleHidden_tipo_documento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_documento = 'display: none;';
   $sStyleReadInp_tipo_documento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_documento']) && $this->nmgp_cmp_readonly['tipo_documento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_documento']);
       $sStyleReadLab_tipo_documento = '';
       $sStyleReadInp_tipo_documento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_documento']) && $this->nmgp_cmp_hidden['tipo_documento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_documento" value="<?php echo $this->form_encode_input($this->tipo_documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_documento_line" id="hidden_field_data_tipo_documento" style="<?php echo $sStyleHidden_tipo_documento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_documento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_documento_label" style=""><span id="id_label_tipo_documento"><?php echo $this->nm_new_label['tipo_documento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_documento"]) &&  $this->nmgp_cmp_readonly["tipo_documento"] == "on") { 

$tipo_documento_look = "";
 if ($this->tipo_documento == "11") { $tipo_documento_look .= "Registro civil de nacimiento" ;} 
 if ($this->tipo_documento == "12") { $tipo_documento_look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento == "13") { $tipo_documento_look .= "Cédula de ciudadanía" ;} 
 if ($this->tipo_documento == "21") { $tipo_documento_look .= "Tarjeta de Extranjería" ;} 
 if ($this->tipo_documento == "22") { $tipo_documento_look .= "Cédula de extranjería" ;} 
 if ($this->tipo_documento == "31") { $tipo_documento_look .= "Nit" ;} 
 if ($this->tipo_documento == "41") { $tipo_documento_look .= "Pasaporte" ;} 
 if ($this->tipo_documento == "42") { $tipo_documento_look .= "Tipo de documento extranjero" ;} 
 if (empty($tipo_documento_look)) { $tipo_documento_look = $this->tipo_documento; }
?>
<input type="hidden" name="tipo_documento" value="<?php echo $this->form_encode_input($tipo_documento) . "\">" . $tipo_documento_look . ""; ?>
<?php } else { ?>
<?php

$tipo_documento_look = "";
 if ($this->tipo_documento == "11") { $tipo_documento_look .= "Registro civil de nacimiento" ;} 
 if ($this->tipo_documento == "12") { $tipo_documento_look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento == "13") { $tipo_documento_look .= "Cédula de ciudadanía" ;} 
 if ($this->tipo_documento == "21") { $tipo_documento_look .= "Tarjeta de Extranjería" ;} 
 if ($this->tipo_documento == "22") { $tipo_documento_look .= "Cédula de extranjería" ;} 
 if ($this->tipo_documento == "31") { $tipo_documento_look .= "Nit" ;} 
 if ($this->tipo_documento == "41") { $tipo_documento_look .= "Pasaporte" ;} 
 if ($this->tipo_documento == "42") { $tipo_documento_look .= "Tipo de documento extranjero" ;} 
 if (empty($tipo_documento_look)) { $tipo_documento_look = $this->tipo_documento; }
?>
<span id="id_read_on_tipo_documento" class="css_tipo_documento_line"  style="<?php echo $sStyleReadLab_tipo_documento; ?>"><?php echo $this->form_format_readonly("tipo_documento", $this->form_encode_input($tipo_documento_look)); ?></span><span id="id_read_off_tipo_documento" class="css_read_off_tipo_documento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_documento; ?>">
 <span id="idAjaxSelect_tipo_documento" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_documento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_documento" name="tipo_documento" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="11" <?php  if ($this->tipo_documento == "11") { echo " selected" ;} ?>>Registro civil de nacimiento</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '11'; ?>
 <option  value="12" <?php  if ($this->tipo_documento == "12") { echo " selected" ;} ?>>Tarjeta de identidad</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '12'; ?>
 <option  value="13" <?php  if ($this->tipo_documento == "13") { echo " selected" ;} ?><?php  if (empty($this->tipo_documento)) { echo " selected" ;} ?>>Cédula de ciudadanía</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '13'; ?>
 <option  value="21" <?php  if ($this->tipo_documento == "21") { echo " selected" ;} ?>>Tarjeta de Extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '21'; ?>
 <option  value="22" <?php  if ($this->tipo_documento == "22") { echo " selected" ;} ?>>Cédula de extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '22'; ?>
 <option  value="31" <?php  if ($this->tipo_documento == "31") { echo " selected" ;} ?>>Nit</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '31'; ?>
 <option  value="41" <?php  if ($this->tipo_documento == "41") { echo " selected" ;} ?>>Pasaporte</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '41'; ?>
 <option  value="42" <?php  if ($this->tipo_documento == "42") { echo " selected" ;} ?>>Tipo de documento extranjero</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_tipo_documento'][] = '42'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_documento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_documento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nit']))
    {
        $this->nm_new_label['nit'] = "NIT o CÉDULA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nit = $this->nit;
   $sStyleHidden_nit = '';
   if (isset($this->nmgp_cmp_hidden['nit']) && $this->nmgp_cmp_hidden['nit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nit']);
       $sStyleHidden_nit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nit = 'display: none;';
   $sStyleReadInp_nit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nit']) && $this->nmgp_cmp_readonly['nit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nit']);
       $sStyleReadLab_nit = '';
       $sStyleReadInp_nit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nit']) && $this->nmgp_cmp_hidden['nit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nit" value="<?php echo $this->form_encode_input($nit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nit_line" id="hidden_field_data_nit" style="<?php echo $sStyleHidden_nit; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nit_label" style=""><span id="id_label_nit"><?php echo $this->nm_new_label['nit']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['php_cmp_required']['nit']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['php_cmp_required']['nit'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nit"]) &&  $this->nmgp_cmp_readonly["nit"] == "on") { 

 ?>
<input type="hidden" name="nit" value="<?php echo $this->form_encode_input($nit) . "\">" . $nit . ""; ?>
<?php } else { ?>
<span id="id_read_on_nit" class="sc-ui-readonly-nit css_nit_line" style="<?php echo $sStyleReadLab_nit; ?>"><?php echo $this->form_format_readonly("nit", $this->form_encode_input($this->nit)); ?></span><span id="id_read_off_nit" class="css_read_off_nit<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nit; ?>">
 <input class="sc-js-input scFormObjectOdd css_nit_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nit" type=text name="nit" value="<?php echo $this->form_encode_input($nit) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=14"; } ?> maxlength=14 alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789ç") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'RUT (Ej: 13125143-1)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dv']))
    {
        $this->nm_new_label['dv'] = "DÍGITO VERIFICACIÓN";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dv = $this->dv;
   $sStyleHidden_dv = '';
   if (isset($this->nmgp_cmp_hidden['dv']) && $this->nmgp_cmp_hidden['dv'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dv']);
       $sStyleHidden_dv = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dv = 'display: none;';
   $sStyleReadInp_dv = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dv']) && $this->nmgp_cmp_readonly['dv'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dv']);
       $sStyleReadLab_dv = '';
       $sStyleReadInp_dv = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dv']) && $this->nmgp_cmp_hidden['dv'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dv" value="<?php echo $this->form_encode_input($dv) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dv_line" id="hidden_field_data_dv" style="<?php echo $sStyleHidden_dv; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dv_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dv_label" style=""><span id="id_label_dv"><?php echo $this->nm_new_label['dv']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dv"]) &&  $this->nmgp_cmp_readonly["dv"] == "on") { 

 ?>
<input type="hidden" name="dv" value="<?php echo $this->form_encode_input($dv) . "\">" . $dv . ""; ?>
<?php } else { ?>
<span id="id_read_on_dv" class="sc-ui-readonly-dv css_dv_line" style="<?php echo $sStyleReadLab_dv; ?>"><?php echo $this->form_format_readonly("dv", $this->form_encode_input($this->dv)); ?></span><span id="id_read_off_dv" class="css_read_off_dv<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dv; ?>">
 <input class="sc-js-input scFormObjectOdd css_dv_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dv" type=text name="dv" value="<?php echo $this->form_encode_input($dv) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 1, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dv']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dv']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dv']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dv_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dv_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['iddatos']))
           {
               $this->nmgp_cmp_readonly['iddatos'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['correo']))
    {
        $this->nm_new_label['correo'] = "E-MAIL**";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $correo = $this->correo;
   $sStyleHidden_correo = '';
   if (isset($this->nmgp_cmp_hidden['correo']) && $this->nmgp_cmp_hidden['correo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['correo']);
       $sStyleHidden_correo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_correo = 'display: none;';
   $sStyleReadInp_correo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['correo']) && $this->nmgp_cmp_readonly['correo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['correo']);
       $sStyleReadLab_correo = '';
       $sStyleReadInp_correo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['correo']) && $this->nmgp_cmp_hidden['correo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_correo_line" id="hidden_field_data_correo" style="<?php echo $sStyleHidden_correo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_correo_label" style=""><span id="id_label_correo"><?php echo $this->nm_new_label['correo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo"]) &&  $this->nmgp_cmp_readonly["correo"] == "on") { 

 ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">" . $correo . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo" class="sc-ui-readonly-correo css_correo_line" style="<?php echo $sStyleReadLab_correo; ?>"><?php echo $this->form_format_readonly("correo", $this->form_encode_input($this->correo)); ?></span><span id="id_read_off_correo" class="css_read_off_correo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo" type=text name="correo" value="<?php echo $this->form_encode_input($correo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iddatos']))
    {
        $this->nm_new_label['iddatos'] = "Iddatos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iddatos = $this->iddatos;
   if (!isset($this->nmgp_cmp_hidden['iddatos']))
   {
       $this->nmgp_cmp_hidden['iddatos'] = 'off';
   }
   $sStyleHidden_iddatos = '';
   if (isset($this->nmgp_cmp_hidden['iddatos']) && $this->nmgp_cmp_hidden['iddatos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iddatos']);
       $sStyleHidden_iddatos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iddatos = 'display: none;';
   $sStyleReadInp_iddatos = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["iddatos"]) &&  $this->nmgp_cmp_readonly["iddatos"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iddatos']);
       $sStyleReadLab_iddatos = '';
       $sStyleReadInp_iddatos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iddatos']) && $this->nmgp_cmp_hidden['iddatos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iddatos" value="<?php echo $this->form_encode_input($iddatos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_iddatos_line" id="hidden_field_data_iddatos" style="<?php echo $sStyleHidden_iddatos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iddatos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_iddatos_label" style=""><span id="id_label_iddatos"><?php echo $this->nm_new_label['iddatos']; ?></span></span><br><span id="id_read_on_iddatos" class="css_iddatos_line" style="<?php echo $sStyleReadLab_iddatos; ?>"><?php echo $this->form_format_readonly("iddatos", $this->form_encode_input($this->iddatos)); ?></span><span id="id_read_off_iddatos" class="css_read_off_iddatos" style="<?php echo $sStyleReadInp_iddatos; ?>"><input type="hidden" name="iddatos" value="<?php echo $this->form_encode_input($iddatos) . "\">"?><span id="id_ajax_label_iddatos"><?php echo nl2br($iddatos); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddatos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddatos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_iddatos_dumb = ('' == $sStyleHidden_iddatos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_iddatos_dumb" style="<?php echo $sStyleHidden_iddatos_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="30%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nompais']))
   {
       $this->nm_new_label['nompais'] = "PAÍS**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nompais = $this->nompais;
   $sStyleHidden_nompais = '';
   if (isset($this->nmgp_cmp_hidden['nompais']) && $this->nmgp_cmp_hidden['nompais'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nompais']);
       $sStyleHidden_nompais = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nompais = 'display: none;';
   $sStyleReadInp_nompais = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nompais']) && $this->nmgp_cmp_readonly['nompais'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nompais']);
       $sStyleReadLab_nompais = '';
       $sStyleReadInp_nompais = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nompais']) && $this->nmgp_cmp_hidden['nompais'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nompais" value="<?php echo $this->form_encode_input($this->nompais) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nompais_line" id="hidden_field_data_nompais" style="<?php echo $sStyleHidden_nompais; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nompais_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nompais_label" style=""><span id="id_label_nompais"><?php echo $this->nm_new_label['nompais']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nompais"]) &&  $this->nmgp_cmp_readonly["nompais"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT nompais, nompais  FROM paises  ORDER BY nompais";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nompais'][] = $rs->fields[0];
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
   $nompais_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nompais_1))
          {
              foreach ($this->nompais_1 as $tmp_nompais)
              {
                  if (trim($tmp_nompais) === trim($cadaselect[1])) { $nompais_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nompais) === trim($cadaselect[1])) { $nompais_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="nompais" value="<?php echo $this->form_encode_input($nompais) . "\">" . $nompais_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_nompais();
   $x = 0 ; 
   $nompais_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nompais_1))
          {
              foreach ($this->nompais_1 as $tmp_nompais)
              {
                  if (trim($tmp_nompais) === trim($cadaselect[1])) { $nompais_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nompais) === trim($cadaselect[1])) { $nompais_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($nompais_look))
          {
              $nompais_look = $this->nompais;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_nompais\" class=\"css_nompais_line\" style=\"" .  $sStyleReadLab_nompais . "\">" . $this->form_format_readonly("nompais", $this->form_encode_input($nompais_look)) . "</span><span id=\"id_read_off_nompais\" class=\"css_read_off_nompais" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_nompais . "\">";
   echo " <span id=\"idAjaxSelect_nompais\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_nompais_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_nompais\" name=\"nompais\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->nompais) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->nompais)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nompais_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nompais_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['nom_depto']))
   {
       $this->nm_new_label['nom_depto'] = "DEPARTAMENTO**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nom_depto = $this->nom_depto;
   $sStyleHidden_nom_depto = '';
   if (isset($this->nmgp_cmp_hidden['nom_depto']) && $this->nmgp_cmp_hidden['nom_depto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nom_depto']);
       $sStyleHidden_nom_depto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nom_depto = 'display: none;';
   $sStyleReadInp_nom_depto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nom_depto']) && $this->nmgp_cmp_readonly['nom_depto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nom_depto']);
       $sStyleReadLab_nom_depto = '';
       $sStyleReadInp_nom_depto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nom_depto']) && $this->nmgp_cmp_hidden['nom_depto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="nom_depto" value="<?php echo $this->form_encode_input($this->nom_depto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nom_depto_line" id="hidden_field_data_nom_depto" style="<?php echo $sStyleHidden_nom_depto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nom_depto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nom_depto_label" style=""><span id="id_label_nom_depto"><?php echo $this->nm_new_label['nom_depto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nom_depto"]) &&  $this->nmgp_cmp_readonly["nom_depto"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT departamento, cod_iso3166 + ' - ' + departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT departamento, concat(cod_iso3166, ' - ',departamento)  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT departamento, cod_iso3166&' - '&departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT departamento, cod_iso3166 + ' - ' + departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   else
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_nom_depto'][] = $rs->fields[0];
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
   $nom_depto_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nom_depto_1))
          {
              foreach ($this->nom_depto_1 as $tmp_nom_depto)
              {
                  if (trim($tmp_nom_depto) === trim($cadaselect[1])) { $nom_depto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nom_depto) === trim($cadaselect[1])) { $nom_depto_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="nom_depto" value="<?php echo $this->form_encode_input($nom_depto) . "\">" . $nom_depto_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_nom_depto();
   $x = 0 ; 
   $nom_depto_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->nom_depto_1))
          {
              foreach ($this->nom_depto_1 as $tmp_nom_depto)
              {
                  if (trim($tmp_nom_depto) === trim($cadaselect[1])) { $nom_depto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->nom_depto) === trim($cadaselect[1])) { $nom_depto_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($nom_depto_look))
          {
              $nom_depto_look = $this->nom_depto;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_nom_depto\" class=\"css_nom_depto_line\" style=\"" .  $sStyleReadLab_nom_depto . "\">" . $this->form_format_readonly("nom_depto", $this->form_encode_input($nom_depto_look)) . "</span><span id=\"id_read_off_nom_depto\" class=\"css_read_off_nom_depto" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_nom_depto . "\">";
   echo " <span id=\"idAjaxSelect_nom_depto\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_nom_depto_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_nom_depto\" name=\"nom_depto\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->nom_depto) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->nom_depto)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nom_depto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nom_depto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['municipio']))
   {
       $this->nm_new_label['municipio'] = "MUNICIPIO**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $municipio = $this->municipio;
   $sStyleHidden_municipio = '';
   if (isset($this->nmgp_cmp_hidden['municipio']) && $this->nmgp_cmp_hidden['municipio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['municipio']);
       $sStyleHidden_municipio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_municipio = 'display: none;';
   $sStyleReadInp_municipio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['municipio']) && $this->nmgp_cmp_readonly['municipio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['municipio']);
       $sStyleReadLab_municipio = '';
       $sStyleReadInp_municipio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['municipio']) && $this->nmgp_cmp_hidden['municipio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="municipio" value="<?php echo $this->form_encode_input($this->municipio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_municipio_line" id="hidden_field_data_municipio" style="<?php echo $sStyleHidden_municipio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_municipio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_municipio_label" style=""><span id="id_label_municipio"><?php echo $this->nm_new_label['municipio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["municipio"]) &&  $this->nmgp_cmp_readonly["municipio"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=(SELECT iddep from departamento where departamento like '$this->nom_depto') ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_municipio'][] = $rs->fields[0];
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
   $municipio_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_1))
          {
              foreach ($this->municipio_1 as $tmp_municipio)
              {
                  if (trim($tmp_municipio) === trim($cadaselect[1])) { $municipio_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio) === trim($cadaselect[1])) { $municipio_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="municipio" value="<?php echo $this->form_encode_input($municipio) . "\">" . $municipio_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_municipio();
   $x = 0 ; 
   $municipio_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->municipio_1))
          {
              foreach ($this->municipio_1 as $tmp_municipio)
              {
                  if (trim($tmp_municipio) === trim($cadaselect[1])) { $municipio_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->municipio) === trim($cadaselect[1])) { $municipio_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($municipio_look))
          {
              $municipio_look = $this->municipio;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_municipio\" class=\"css_municipio_line\" style=\"" .  $sStyleReadLab_municipio . "\">" . $this->form_format_readonly("municipio", $this->form_encode_input($municipio_look)) . "</span><span id=\"id_read_off_municipio\" class=\"css_read_off_municipio" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_municipio . "\">";
   echo " <span id=\"idAjaxSelect_municipio\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_municipio_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_municipio\" name=\"municipio\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->municipio) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->municipio)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_municipio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_municipio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ciudad']))
   {
       $this->nm_new_label['ciudad'] = "CIUDAD";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ciudad = $this->ciudad;
   $sStyleHidden_ciudad = '';
   if (isset($this->nmgp_cmp_hidden['ciudad']) && $this->nmgp_cmp_hidden['ciudad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ciudad']);
       $sStyleHidden_ciudad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ciudad = 'display: none;';
   $sStyleReadInp_ciudad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ciudad']) && $this->nmgp_cmp_readonly['ciudad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ciudad']);
       $sStyleReadLab_ciudad = '';
       $sStyleReadInp_ciudad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ciudad']) && $this->nmgp_cmp_hidden['ciudad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ciudad" value="<?php echo $this->form_encode_input($this->ciudad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ciudad_line" id="hidden_field_data_ciudad" style="<?php echo $sStyleHidden_ciudad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ciudad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ciudad_label" style=""><span id="id_label_ciudad"><?php echo $this->nm_new_label['ciudad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciudad"]) &&  $this->nmgp_cmp_readonly["ciudad"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad'] = array(); 
}
if ($this->municipio != "")
{ 
   $this->nm_clear_val("municipio");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT municipio FROM municipio  WHERE idmun=$this->municipio ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_ciudad'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
} 
   $x = 0; 
   $ciudad_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ciudad_1))
          {
              foreach ($this->ciudad_1 as $tmp_ciudad)
              {
                  if (trim($tmp_ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ciudad" value="<?php echo $this->form_encode_input($ciudad) . "\">" . $ciudad_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ciudad();
   $x = 0 ; 
   $ciudad_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ciudad_1))
          {
              foreach ($this->ciudad_1 as $tmp_ciudad)
              {
                  if (trim($tmp_ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ciudad_look))
          {
              $ciudad_look = $this->ciudad;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ciudad\" class=\"css_ciudad_line\" style=\"" .  $sStyleReadLab_ciudad . "\">" . $this->form_format_readonly("ciudad", $this->form_encode_input($ciudad_look)) . "</span><span id=\"id_read_off_ciudad\" class=\"css_read_off_ciudad" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_ciudad . "\">";
   echo " <span id=\"idAjaxSelect_ciudad\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_ciudad_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_ciudad\" name=\"ciudad\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ciudad) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ciudad)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciudad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciudad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direccion']))
    {
        $this->nm_new_label['direccion'] = "DIRECCIÓN**";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $direccion = $this->direccion;
   $sStyleHidden_direccion = '';
   if (isset($this->nmgp_cmp_hidden['direccion']) && $this->nmgp_cmp_hidden['direccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['direccion']);
       $sStyleHidden_direccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_direccion = 'display: none;';
   $sStyleReadInp_direccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['direccion']) && $this->nmgp_cmp_readonly['direccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['direccion']);
       $sStyleReadLab_direccion = '';
       $sStyleReadInp_direccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['direccion']) && $this->nmgp_cmp_hidden['direccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_direccion_line" id="hidden_field_data_direccion" style="<?php echo $sStyleHidden_direccion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_direccion_label" style=""><span id="id_label_direccion"><?php echo $this->nm_new_label['direccion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion"]) &&  $this->nmgp_cmp_readonly["direccion"] == "on") { 

 ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">" . $direccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion" class="sc-ui-readonly-direccion css_direccion_line" style="<?php echo $sStyleReadLab_direccion; ?>"><?php echo $this->form_format_readonly("direccion", $this->form_encode_input($this->direccion)); ?></span><span id="id_read_off_direccion" class="css_read_off_direccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_direccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direccion" type=text name="direccion" value="<?php echo $this->form_encode_input($direccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ubicación de la empresa', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo_postal']))
    {
        $this->nm_new_label['codigo_postal'] = "CÓDIGO POSTAL**";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_postal = $this->codigo_postal;
   $sStyleHidden_codigo_postal = '';
   if (isset($this->nmgp_cmp_hidden['codigo_postal']) && $this->nmgp_cmp_hidden['codigo_postal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_postal']);
       $sStyleHidden_codigo_postal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_postal = 'display: none;';
   $sStyleReadInp_codigo_postal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_postal']) && $this->nmgp_cmp_readonly['codigo_postal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_postal']);
       $sStyleReadLab_codigo_postal = '';
       $sStyleReadInp_codigo_postal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_postal']) && $this->nmgp_cmp_hidden['codigo_postal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_postal" value="<?php echo $this->form_encode_input($codigo_postal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_postal_line" id="hidden_field_data_codigo_postal" style="<?php echo $sStyleHidden_codigo_postal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_postal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_postal_label" style=""><span id="id_label_codigo_postal"><?php echo $this->nm_new_label['codigo_postal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_postal"]) &&  $this->nmgp_cmp_readonly["codigo_postal"] == "on") { 

 ?>
<input type="hidden" name="codigo_postal" value="<?php echo $this->form_encode_input($codigo_postal) . "\">" . $codigo_postal . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_postal" class="sc-ui-readonly-codigo_postal css_codigo_postal_line" style="<?php echo $sStyleReadLab_codigo_postal; ?>"><?php echo $this->form_format_readonly("codigo_postal", $this->form_encode_input($this->codigo_postal)); ?></span><span id="id_read_off_codigo_postal" class="css_read_off_codigo_postal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_postal; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_postal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_postal" type=text name="codigo_postal" value="<?php echo $this->form_encode_input($codigo_postal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_postal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_postal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefono']))
    {
        $this->nm_new_label['telefono'] = "TELÉFONO/WHATSAPP ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefono = $this->telefono;
   $sStyleHidden_telefono = '';
   if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefono']);
       $sStyleHidden_telefono = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefono = 'display: none;';
   $sStyleReadInp_telefono = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefono']) && $this->nmgp_cmp_readonly['telefono'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefono']);
       $sStyleReadLab_telefono = '';
       $sStyleReadInp_telefono = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telefono_line" id="hidden_field_data_telefono" style="<?php echo $sStyleHidden_telefono; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefono_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telefono_label" style=""><span id="id_label_telefono"><?php echo $this->nm_new_label['telefono']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono"]) &&  $this->nmgp_cmp_readonly["telefono"] == "on") { 

 ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">" . $telefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono" class="sc-ui-readonly-telefono css_telefono_line" style="<?php echo $sStyleReadLab_telefono; ?>"><?php echo $this->form_format_readonly("telefono", $this->form_encode_input($this->telefono)); ?></span><span id="id_read_off_telefono" class="css_read_off_telefono<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefono_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefono" type=text name="telefono" value="<?php echo $this->form_encode_input($telefono) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['logo']))
    {
        $this->nm_new_label['logo'] = "LOGO EMPRESA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $logo = $this->logo;
   $nombre_archivo = $this->nombre_archivo;
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

    <TD class="scFormDataOdd css_logo_line" id="hidden_field_data_logo" style="<?php echo $sStyleHidden_logo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_logo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_logo_label" style=""><span id="id_label_logo"><?php echo $this->nm_new_label['logo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["logo"]) &&  $this->nmgp_cmp_readonly["logo"] == "on") { 

 ?>
<input type="hidden" name="logo" value=""><img id=\"logo_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_logo\"><a href=\"javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", trim($nombre_archivo)) . "', 'form_datosemp')\">" . $nombre_archivo"</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_logo" class="scFormLinkOdd sc-ui-readonly-logo css_logo_line" style="<?php echo $sStyleReadLab_logo; ?>"><?php echo $this->form_format_readonly("nombre_archivo", $nombre_archivo) ?></span><span id="id_read_off_logo" class="css_read_off_logo" style="white-space: nowrap;<?php echo $sStyleReadInp_logo; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-logo" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_logo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="logo[]" id="id_sc_field_logo" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_logo"<?php if ($this->nmgp_opcao == "novo" || empty($logo)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="logo_limpa" value="<?php echo $logo_limpa . '" '; if ($logo_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span>
<?php 
   $nombre_archivo = trim($nombre_archivo); 
   if (!empty($nombre_archivo)) 
   { 
       $nm_img_icone = $this->gera_icone($nombre_archivo); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_logo\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="logo_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_logo"><a href="javascript:nm_mostra_doc('documento_db', '<?php echo str_replace("'", "\'", substr($sTmpFile_nombre_archivo, 3)) ;?>', 'form_datosemp')"><?php echo $nombre_archivo ?></a></span><div id="id_img_loader_logo" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_logo" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">El logo debe cumplir las siguiente especificaciones:  altura 140px, ancho 250 px como máximo. La imagen puede ser jpg, png ogif.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">El logo debe cumplir las siguiente especificaciones:  altura 140px, ancho 250 px como máximo. La imagen puede ser jpg, png ogif.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span><div id="id_sc_dragdrop_logo" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_logo ?>"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_logo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_logo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ruta_logo']))
    {
        $this->nm_new_label['ruta_logo'] = "Ruta Logo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ruta_logo = $this->ruta_logo;
   $sStyleHidden_ruta_logo = '';
   if (isset($this->nmgp_cmp_hidden['ruta_logo']) && $this->nmgp_cmp_hidden['ruta_logo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ruta_logo']);
       $sStyleHidden_ruta_logo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ruta_logo = 'display: none;';
   $sStyleReadInp_ruta_logo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ruta_logo']) && $this->nmgp_cmp_readonly['ruta_logo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ruta_logo']);
       $sStyleReadLab_ruta_logo = '';
       $sStyleReadInp_ruta_logo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ruta_logo']) && $this->nmgp_cmp_hidden['ruta_logo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ruta_logo" value="<?php echo $this->form_encode_input($ruta_logo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ruta_logo_line" id="hidden_field_data_ruta_logo" style="<?php echo $sStyleHidden_ruta_logo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ruta_logo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ruta_logo_label" style=""><span id="id_label_ruta_logo"><?php echo $this->nm_new_label['ruta_logo']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_ruta_logo" => $out_ruta_logo); ?><script>var var_ajax_img_ruta_logo = '<?php echo $out_ruta_logo; ?>';</script><?php if (!empty($out_ruta_logo)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_ruta_logo, '" . $this->nmgp_return_img['ruta_logo'][0] . "', '" . $this->nmgp_return_img['ruta_logo'][1] . "')\"><img id=\"id_ajax_img_ruta_logo\" border=\"0\" src=\"$out_ruta_logo\"></a> &nbsp;" . "<span id=\"txt_ajax_img_ruta_logo\">" . $this->form_format_readonly("ruta_logo", $ruta_logo) . "</span>"; if (!empty($ruta_logo)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_ruta_logo\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_ruta_logo\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ruta_logo"]) &&  $this->nmgp_cmp_readonly["ruta_logo"] == "on") { 

 ?>
<img id=\"ruta_logo_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="ruta_logo" value="<?php echo $this->form_encode_input($ruta_logo) . "\">" . $ruta_logo . ""; ?>
<?php } else { ?>
<span id="id_read_off_ruta_logo" class="css_read_off_ruta_logo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ruta_logo; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-ruta_logo" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_ruta_logo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="ruta_logo[]" id="id_sc_field_ruta_logo" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_ruta_logo"<?php if ($this->nmgp_opcao == "novo" || empty($ruta_logo)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="ruta_logo_limpa" value="<?php echo $ruta_logo_limpa . '" '; if ($ruta_logo_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="ruta_logo_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_ruta_logo" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_ruta_logo" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ruta_logo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ruta_logo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_ruta_logo_dumb = ('' == $sStyleHidden_ruta_logo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ruta_logo_dumb" style="<?php echo $sStyleHidden_ruta_logo_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['detalle_trib']))
   {
       $this->nm_new_label['detalle_trib'] = "DETALLE TRIBUTARIO**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_trib = $this->detalle_trib;
   $sStyleHidden_detalle_trib = '';
   if (isset($this->nmgp_cmp_hidden['detalle_trib']) && $this->nmgp_cmp_hidden['detalle_trib'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_trib']);
       $sStyleHidden_detalle_trib = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_trib = 'display: none;';
   $sStyleReadInp_detalle_trib = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_trib']) && $this->nmgp_cmp_readonly['detalle_trib'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_trib']);
       $sStyleReadLab_detalle_trib = '';
       $sStyleReadInp_detalle_trib = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_trib']) && $this->nmgp_cmp_hidden['detalle_trib'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="detalle_trib" value="<?php echo $this->form_encode_input($this->detalle_trib) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_trib_line" id="hidden_field_data_detalle_trib" style="<?php echo $sStyleHidden_detalle_trib; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_detalle_trib_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_trib_label" style=""><span id="id_label_detalle_trib"><?php echo $this->nm_new_label['detalle_trib']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["detalle_trib"]) &&  $this->nmgp_cmp_readonly["detalle_trib"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo, ' - ',descripcion_dt)  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib'][] = $rs->fields[0];
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
   $detalle_trib_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->detalle_trib_1))
          {
              foreach ($this->detalle_trib_1 as $tmp_detalle_trib)
              {
                  if (trim($tmp_detalle_trib) === trim($cadaselect[1])) { $detalle_trib_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->detalle_trib) === trim($cadaselect[1])) { $detalle_trib_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="detalle_trib" value="<?php echo $this->form_encode_input($detalle_trib) . "\">" . $detalle_trib_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_detalle_trib();
   $x = 0 ; 
   $detalle_trib_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->detalle_trib_1))
          {
              foreach ($this->detalle_trib_1 as $tmp_detalle_trib)
              {
                  if (trim($tmp_detalle_trib) === trim($cadaselect[1])) { $detalle_trib_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->detalle_trib) === trim($cadaselect[1])) { $detalle_trib_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($detalle_trib_look))
          {
              $detalle_trib_look = $this->detalle_trib;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_detalle_trib\" class=\"css_detalle_trib_line\" style=\"" .  $sStyleReadLab_detalle_trib . "\">" . $this->form_format_readonly("detalle_trib", $this->form_encode_input($detalle_trib_look)) . "</span><span id=\"id_read_off_detalle_trib\" class=\"css_read_off_detalle_trib" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_detalle_trib . "\">";
   echo " <span id=\"idAjaxSelect_detalle_trib\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_detalle_trib_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_detalle_trib\" name=\"detalle_trib\" size=\"4\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_detalle_trib'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->detalle_trib) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->detalle_trib)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_trib_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_trib_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['codigos_ciiu']))
   {
       $this->nm_new_label['codigos_ciiu'] = "ACTIVIDAD ECONÓMICA (CIIU)**";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigos_ciiu = $this->codigos_ciiu;
   $sStyleHidden_codigos_ciiu = '';
   if (isset($this->nmgp_cmp_hidden['codigos_ciiu']) && $this->nmgp_cmp_hidden['codigos_ciiu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigos_ciiu']);
       $sStyleHidden_codigos_ciiu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigos_ciiu = 'display: none;';
   $sStyleReadInp_codigos_ciiu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigos_ciiu']) && $this->nmgp_cmp_readonly['codigos_ciiu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigos_ciiu']);
       $sStyleReadLab_codigos_ciiu = '';
       $sStyleReadInp_codigos_ciiu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigos_ciiu']) && $this->nmgp_cmp_hidden['codigos_ciiu'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codigos_ciiu" value="<?php echo $this->form_encode_input($this->codigos_ciiu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigos_ciiu_line" id="hidden_field_data_codigos_ciiu" style="<?php echo $sStyleHidden_codigos_ciiu; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigos_ciiu_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigos_ciiu_label" style=""><span id="id_label_codigos_ciiu"><?php echo $this->nm_new_label['codigos_ciiu']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigos_ciiu"]) &&  $this->nmgp_cmp_readonly["codigos_ciiu"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu + ' - ' + descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_ciiu, concat(codigo_ciiu, ' - ',descripcion)  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu&' - '&descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu + ' - ' + descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['Lookup_codigos_ciiu'][] = $rs->fields[0];
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
   $codigos_ciiu_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigos_ciiu_1))
          {
              foreach ($this->codigos_ciiu_1 as $tmp_codigos_ciiu)
              {
                  if (trim($tmp_codigos_ciiu) === trim($cadaselect[1])) { $codigos_ciiu_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigos_ciiu) === trim($cadaselect[1])) { $codigos_ciiu_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="codigos_ciiu" value="<?php echo $this->form_encode_input($codigos_ciiu) . "\">" . $codigos_ciiu_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_codigos_ciiu();
   $x = 0 ; 
   $codigos_ciiu_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigos_ciiu_1))
          {
              foreach ($this->codigos_ciiu_1 as $tmp_codigos_ciiu)
              {
                  if (trim($tmp_codigos_ciiu) === trim($cadaselect[1])) { $codigos_ciiu_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigos_ciiu) === trim($cadaselect[1])) { $codigos_ciiu_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($codigos_ciiu_look))
          {
              $codigos_ciiu_look = $this->codigos_ciiu;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_codigos_ciiu\" class=\"css_codigos_ciiu_line\" style=\"" .  $sStyleReadLab_codigos_ciiu . "\">" . $this->form_format_readonly("codigos_ciiu", $this->form_encode_input($codigos_ciiu_look)) . "</span><span id=\"id_read_off_codigos_ciiu\" class=\"css_read_off_codigos_ciiu" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_codigos_ciiu . "\">";
   echo " <span id=\"idAjaxSelect_codigos_ciiu\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_codigos_ciiu_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_codigos_ciiu\" name=\"codigos_ciiu\" size=\"4\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->codigos_ciiu) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->codigos_ciiu)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigos_ciiu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigos_ciiu_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ciiu']))
    {
        $this->nm_new_label['ciiu'] = "CONSULTAR CIIU";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ciiu = $this->ciiu;
   $sStyleHidden_ciiu = '';
   if (isset($this->nmgp_cmp_hidden['ciiu']) && $this->nmgp_cmp_hidden['ciiu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ciiu']);
       $sStyleHidden_ciiu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ciiu = 'display: none;';
   $sStyleReadInp_ciiu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ciiu']) && $this->nmgp_cmp_readonly['ciiu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ciiu']);
       $sStyleReadLab_ciiu = '';
       $sStyleReadInp_ciiu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ciiu']) && $this->nmgp_cmp_hidden['ciiu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ciiu" value="<?php echo $this->form_encode_input($ciiu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ciiu_line" id="hidden_field_data_ciiu" style="<?php echo $sStyleHidden_ciiu; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ciiu_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ciiu_label" style=""><span id="id_label_ciiu"><?php echo $this->nm_new_label['ciiu']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-feed-de-actividad-32.png"))
          { 
              $ciiu = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-feed-de-actividad-32.png";
                  $ciiu = "<img border=\"0\" src=\"grp__NM__ico__NM__icons8-feed-de-actividad-32.png\"/>" ; 
              }
              else {
                  $ciiu = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-feed-de-actividad-32.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_ciiu"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_grid_codigos_ciiu_cons . "', '$this->nm_location', 'NMSC_inicial*scininicio*scout', 'inicio', '_blank', '0', '0', 'grid_codigos_ciiu')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ciiu ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciiu"]) &&  $this->nmgp_cmp_readonly["ciiu"] == "on") { 

 ?>
<input type="hidden" name="ciiu" value="<?php echo $this->form_encode_input($ciiu) . "\">" . $ciiu . ""; ?>
<?php } else { ?>
<span id="id_read_on_ciiu" class="sc-ui-readonly-ciiu css_ciiu_line" style="<?php echo $sStyleReadLab_ciiu; ?>"><?php echo $this->form_format_readonly("ciiu", $this->form_encode_input($this->ciiu)); ?></span><span id="id_read_off_ciiu" class="css_read_off_ciiu<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ciiu; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciiu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciiu_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['responsab_trib']))
    {
        $this->nm_new_label['responsab_trib'] = "RESPONSABILIDADES FISCALES**";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $responsab_trib = $this->responsab_trib;
   if (!isset($this->nmgp_cmp_hidden['responsab_trib']))
   {
       $this->nmgp_cmp_hidden['responsab_trib'] = 'off';
   }
   $sStyleHidden_responsab_trib = '';
   if (isset($this->nmgp_cmp_hidden['responsab_trib']) && $this->nmgp_cmp_hidden['responsab_trib'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['responsab_trib']);
       $sStyleHidden_responsab_trib = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_responsab_trib = 'display: none;';
   $sStyleReadInp_responsab_trib = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['responsab_trib']) && $this->nmgp_cmp_readonly['responsab_trib'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['responsab_trib']);
       $sStyleReadLab_responsab_trib = '';
       $sStyleReadInp_responsab_trib = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['responsab_trib']) && $this->nmgp_cmp_hidden['responsab_trib'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="responsab_trib" value="<?php echo $this->form_encode_input($responsab_trib) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_responsab_trib_line" id="hidden_field_data_responsab_trib" style="<?php echo $sStyleHidden_responsab_trib; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_responsab_trib_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_responsab_trib_label" style=""><span id="id_label_responsab_trib"><?php echo $this->nm_new_label['responsab_trib']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["responsab_trib"]) &&  $this->nmgp_cmp_readonly["responsab_trib"] == "on") { 

 ?>
<input type="hidden" name="responsab_trib" value="<?php echo $this->form_encode_input($responsab_trib) . "\">" . $responsab_trib . ""; ?>
<?php } else { ?>
<span id="id_read_on_responsab_trib" class="sc-ui-readonly-responsab_trib css_responsab_trib_line" style="<?php echo $sStyleReadLab_responsab_trib; ?>"><?php echo $this->form_format_readonly("responsab_trib", $this->form_encode_input($this->responsab_trib)); ?></span><span id="id_read_off_responsab_trib" class="css_read_off_responsab_trib<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_responsab_trib; ?>">
 <input class="sc-js-input scFormObjectOdd css_responsab_trib_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_responsab_trib" type=text name="responsab_trib" value="<?php echo $this->form_encode_input($responsab_trib) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_responsab_trib_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_responsab_trib_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['maximized']))
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
            <span class="scFormFooterFont" id="rod_col1"><?php echo "** CAMPOS NECESARIOS PARA F. E." ?></span>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_datosemp");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_datosemp");
 parent.scAjaxDetailHeight("form_datosemp", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_datosemp", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_datosemp", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['sc_modal'])
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
	function scBtnFn_sc_btn_0() {
		if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
		    if ($("#sc_sc_btn_0_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_sc_btn_0()
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
<iframe id="sc-id-download-iframe" name="sc_name_download_iframe" style="display: none"></iframe>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['buttonStatus'] = $this->nmgp_botoes;
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
