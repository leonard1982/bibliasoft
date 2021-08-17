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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Configurar Impresión POS"); } else { echo strip_tags("Configurar Impresión POS"); } ?></TITLE>
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
 <style type="text/css">
  .scSpin_texto_tamanio_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_archo_ticket_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_configuraciones_print_pos/form_configuraciones_print_pos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>"></SCRIPT>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_configuraciones_print_pos_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_configuraciones_print_pos_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_configuraciones_print_pos_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_configuraciones_print_pos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_configuraciones_print_pos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Configurar Impresión POS"; } else { echo "Configurar Impresión POS"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__receipt_printer_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__receipt_printer_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__receipt_printer_32.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfprintpos']))
           {
               $this->nmgp_cmp_readonly['idconfprintpos'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idconfprintpos']))
    {
        $this->nm_new_label['idconfprintpos'] = "No Formato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idconfprintpos = $this->idconfprintpos;
   $sStyleHidden_idconfprintpos = '';
   if (isset($this->nmgp_cmp_hidden['idconfprintpos']) && $this->nmgp_cmp_hidden['idconfprintpos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idconfprintpos']);
       $sStyleHidden_idconfprintpos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idconfprintpos = 'display: none;';
   $sStyleReadInp_idconfprintpos = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idconfprintpos"]) &&  $this->nmgp_cmp_readonly["idconfprintpos"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idconfprintpos']);
       $sStyleReadLab_idconfprintpos = '';
       $sStyleReadInp_idconfprintpos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idconfprintpos']) && $this->nmgp_cmp_hidden['idconfprintpos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idconfprintpos" value="<?php echo $this->form_encode_input($idconfprintpos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idconfprintpos_label" id="hidden_field_label_idconfprintpos" style="<?php echo $sStyleHidden_idconfprintpos; ?>"><span id="id_label_idconfprintpos"><?php echo $this->nm_new_label['idconfprintpos']; ?></span></TD>
    <TD class="scFormDataOdd css_idconfprintpos_line" id="hidden_field_data_idconfprintpos" style="<?php echo $sStyleHidden_idconfprintpos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idconfprintpos_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idconfprintpos" class="css_idconfprintpos_line" style="<?php echo $sStyleReadLab_idconfprintpos; ?>"><?php echo $this->form_format_readonly("idconfprintpos", $this->form_encode_input($this->idconfprintpos)); ?></span><span id="id_read_off_idconfprintpos" class="css_read_off_idconfprintpos" style="<?php echo $sStyleReadInp_idconfprintpos; ?>"><input type="hidden" name="idconfprintpos" value="<?php echo $this->form_encode_input($idconfprintpos) . "\">"?><span id="id_ajax_label_idconfprintpos"><?php echo nl2br($idconfprintpos); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idconfprintpos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idconfprintpos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_doc']))
   {
       $this->nm_new_label['tipo_doc'] = "Tipo Documento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_doc = $this->tipo_doc;
   $sStyleHidden_tipo_doc = '';
   if (isset($this->nmgp_cmp_hidden['tipo_doc']) && $this->nmgp_cmp_hidden['tipo_doc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_doc']);
       $sStyleHidden_tipo_doc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_doc = 'display: none;';
   $sStyleReadInp_tipo_doc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_doc']) && $this->nmgp_cmp_readonly['tipo_doc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_doc']);
       $sStyleReadLab_tipo_doc = '';
       $sStyleReadInp_tipo_doc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_doc']) && $this->nmgp_cmp_hidden['tipo_doc'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_doc" value="<?php echo $this->form_encode_input($this->tipo_doc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_doc_label" id="hidden_field_label_tipo_doc" style="<?php echo $sStyleHidden_tipo_doc; ?>"><span id="id_label_tipo_doc"><?php echo $this->nm_new_label['tipo_doc']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_doc_line" id="hidden_field_data_tipo_doc" style="<?php echo $sStyleHidden_tipo_doc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_doc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_doc"]) &&  $this->nmgp_cmp_readonly["tipo_doc"] == "on") { 

$tipo_doc_look = "";
 if ($this->tipo_doc == "FACTURA") { $tipo_doc_look .= "FACTURA" ;} 
 if ($this->tipo_doc == "PEDIDO") { $tipo_doc_look .= "PEDIDO" ;} 
 if (empty($tipo_doc_look)) { $tipo_doc_look = $this->tipo_doc; }
?>
<input type="hidden" name="tipo_doc" value="<?php echo $this->form_encode_input($tipo_doc) . "\">" . $tipo_doc_look . ""; ?>
<?php } else { ?>
<?php

$tipo_doc_look = "";
 if ($this->tipo_doc == "FACTURA") { $tipo_doc_look .= "FACTURA" ;} 
 if ($this->tipo_doc == "PEDIDO") { $tipo_doc_look .= "PEDIDO" ;} 
 if (empty($tipo_doc_look)) { $tipo_doc_look = $this->tipo_doc; }
?>
<span id="id_read_on_tipo_doc" class="css_tipo_doc_line"  style="<?php echo $sStyleReadLab_tipo_doc; ?>"><?php echo $this->form_format_readonly("tipo_doc", $this->form_encode_input($tipo_doc_look)); ?></span><span id="id_read_off_tipo_doc" class="css_read_off_tipo_doc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_doc; ?>">
 <span id="idAjaxSelect_tipo_doc" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_doc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_doc" name="tipo_doc" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="FACTURA" <?php  if ($this->tipo_doc == "FACTURA") { echo " selected" ;} ?><?php  if (empty($this->tipo_doc)) { echo " selected" ;} ?>>FACTURA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_doc'][] = 'FACTURA'; ?>
 <option  value="PEDIDO" <?php  if ($this->tipo_doc == "PEDIDO") { echo " selected" ;} ?>>PEDIDO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_doc'][] = 'PEDIDO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_doc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_doc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['texto_fuente']))
   {
       $this->nm_new_label['texto_fuente'] = "Fuente";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $texto_fuente = $this->texto_fuente;
   $sStyleHidden_texto_fuente = '';
   if (isset($this->nmgp_cmp_hidden['texto_fuente']) && $this->nmgp_cmp_hidden['texto_fuente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['texto_fuente']);
       $sStyleHidden_texto_fuente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_texto_fuente = 'display: none;';
   $sStyleReadInp_texto_fuente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['texto_fuente']) && $this->nmgp_cmp_readonly['texto_fuente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['texto_fuente']);
       $sStyleReadLab_texto_fuente = '';
       $sStyleReadInp_texto_fuente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['texto_fuente']) && $this->nmgp_cmp_hidden['texto_fuente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="texto_fuente" value="<?php echo $this->form_encode_input($this->texto_fuente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_texto_fuente_label" id="hidden_field_label_texto_fuente" style="<?php echo $sStyleHidden_texto_fuente; ?>"><span id="id_label_texto_fuente"><?php echo $this->nm_new_label['texto_fuente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['texto_fuente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['texto_fuente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_texto_fuente_line" id="hidden_field_data_texto_fuente" style="<?php echo $sStyleHidden_texto_fuente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_texto_fuente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["texto_fuente"]) &&  $this->nmgp_cmp_readonly["texto_fuente"] == "on") { 

$texto_fuente_look = "";
 if ($this->texto_fuente == "Courier") { $texto_fuente_look .= "Courier" ;} 
 if ($this->texto_fuente == "Arial") { $texto_fuente_look .= "Arial" ;} 
 if ($this->texto_fuente == "Verdana") { $texto_fuente_look .= "Verdana" ;} 
 if ($this->texto_fuente == "Helvetica") { $texto_fuente_look .= "Helvetica" ;} 
 if ($this->texto_fuente == "Times") { $texto_fuente_look .= "Times" ;} 
 if ($this->texto_fuente == "Arial Black") { $texto_fuente_look .= "Arial Black" ;} 
 if (empty($texto_fuente_look)) { $texto_fuente_look = $this->texto_fuente; }
?>
<input type="hidden" name="texto_fuente" value="<?php echo $this->form_encode_input($texto_fuente) . "\">" . $texto_fuente_look . ""; ?>
<?php } else { ?>
<?php

$texto_fuente_look = "";
 if ($this->texto_fuente == "Courier") { $texto_fuente_look .= "Courier" ;} 
 if ($this->texto_fuente == "Arial") { $texto_fuente_look .= "Arial" ;} 
 if ($this->texto_fuente == "Verdana") { $texto_fuente_look .= "Verdana" ;} 
 if ($this->texto_fuente == "Helvetica") { $texto_fuente_look .= "Helvetica" ;} 
 if ($this->texto_fuente == "Times") { $texto_fuente_look .= "Times" ;} 
 if ($this->texto_fuente == "Arial Black") { $texto_fuente_look .= "Arial Black" ;} 
 if (empty($texto_fuente_look)) { $texto_fuente_look = $this->texto_fuente; }
?>
<span id="id_read_on_texto_fuente" class="css_texto_fuente_line"  style="<?php echo $sStyleReadLab_texto_fuente; ?>"><?php echo $this->form_format_readonly("texto_fuente", $this->form_encode_input($texto_fuente_look)); ?></span><span id="id_read_off_texto_fuente" class="css_read_off_texto_fuente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_texto_fuente; ?>">
 <span id="idAjaxSelect_texto_fuente" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_texto_fuente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_texto_fuente" name="texto_fuente" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Courier" <?php  if ($this->texto_fuente == "Courier") { echo " selected" ;} ?>>Courier</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_texto_fuente'][] = 'Courier'; ?>
 <option  value="Arial" <?php  if ($this->texto_fuente == "Arial") { echo " selected" ;} ?>>Arial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_texto_fuente'][] = 'Arial'; ?>
 <option  value="Verdana" <?php  if ($this->texto_fuente == "Verdana") { echo " selected" ;} ?>>Verdana</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_texto_fuente'][] = 'Verdana'; ?>
 <option  value="Helvetica" <?php  if ($this->texto_fuente == "Helvetica") { echo " selected" ;} ?>>Helvetica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_texto_fuente'][] = 'Helvetica'; ?>
 <option  value="Times" <?php  if ($this->texto_fuente == "Times") { echo " selected" ;} ?>>Times</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_texto_fuente'][] = 'Times'; ?>
 <option  value="Arial Black" <?php  if ($this->texto_fuente == "Arial Black") { echo " selected" ;} ?>>Arial Black</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_texto_fuente'][] = 'Arial Black'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_texto_fuente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_texto_fuente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['texto_tamanio']))
    {
        $this->nm_new_label['texto_tamanio'] = "Size";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $texto_tamanio = $this->texto_tamanio;
   $sStyleHidden_texto_tamanio = '';
   if (isset($this->nmgp_cmp_hidden['texto_tamanio']) && $this->nmgp_cmp_hidden['texto_tamanio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['texto_tamanio']);
       $sStyleHidden_texto_tamanio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_texto_tamanio = 'display: none;';
   $sStyleReadInp_texto_tamanio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['texto_tamanio']) && $this->nmgp_cmp_readonly['texto_tamanio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['texto_tamanio']);
       $sStyleReadLab_texto_tamanio = '';
       $sStyleReadInp_texto_tamanio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['texto_tamanio']) && $this->nmgp_cmp_hidden['texto_tamanio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="texto_tamanio" value="<?php echo $this->form_encode_input($texto_tamanio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_texto_tamanio_label" id="hidden_field_label_texto_tamanio" style="<?php echo $sStyleHidden_texto_tamanio; ?>"><span id="id_label_texto_tamanio"><?php echo $this->nm_new_label['texto_tamanio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['texto_tamanio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['texto_tamanio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_texto_tamanio_line" id="hidden_field_data_texto_tamanio" style="<?php echo $sStyleHidden_texto_tamanio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_texto_tamanio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["texto_tamanio"]) &&  $this->nmgp_cmp_readonly["texto_tamanio"] == "on") { 

 ?>
<input type="hidden" name="texto_tamanio" value="<?php echo $this->form_encode_input($texto_tamanio) . "\">" . $texto_tamanio . ""; ?>
<?php } else { ?>
<span id="id_read_on_texto_tamanio" class="sc-ui-readonly-texto_tamanio css_texto_tamanio_line" style="<?php echo $sStyleReadLab_texto_tamanio; ?>"><?php echo $this->form_format_readonly("texto_tamanio", $this->form_encode_input($this->texto_tamanio)); ?></span><span id="id_read_off_texto_tamanio" class="css_read_off_texto_tamanio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_texto_tamanio; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_texto_tamanio_obj css_texto_tamanio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_texto_tamanio" type=text name="texto_tamanio" value="<?php echo $this->form_encode_input($texto_tamanio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['texto_tamanio']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['texto_tamanio']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['texto_tamanio']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_texto_tamanio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_texto_tamanio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcentajeopx']))
    {
        $this->nm_new_label['porcentajeopx'] = "Tipo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcentajeopx = $this->porcentajeopx;
   $sStyleHidden_porcentajeopx = '';
   if (isset($this->nmgp_cmp_hidden['porcentajeopx']) && $this->nmgp_cmp_hidden['porcentajeopx'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcentajeopx']);
       $sStyleHidden_porcentajeopx = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcentajeopx = 'display: none;';
   $sStyleReadInp_porcentajeopx = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcentajeopx']) && $this->nmgp_cmp_readonly['porcentajeopx'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcentajeopx']);
       $sStyleReadLab_porcentajeopx = '';
       $sStyleReadInp_porcentajeopx = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcentajeopx']) && $this->nmgp_cmp_hidden['porcentajeopx'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcentajeopx" value="<?php echo $this->form_encode_input($porcentajeopx) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcentajeopx_label" id="hidden_field_label_porcentajeopx" style="<?php echo $sStyleHidden_porcentajeopx; ?>"><span id="id_label_porcentajeopx"><?php echo $this->nm_new_label['porcentajeopx']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['porcentajeopx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['porcentajeopx'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_porcentajeopx_line" id="hidden_field_data_porcentajeopx" style="<?php echo $sStyleHidden_porcentajeopx; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcentajeopx_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcentajeopx"]) &&  $this->nmgp_cmp_readonly["porcentajeopx"] == "on") { 

 if ("%" == $this->porcentajeopx) { $porcentajeopx_look = "Porcentaje";} 
 if ("PX" == $this->porcentajeopx) { $porcentajeopx_look = "Pixeles";} 
?>
<input type="hidden" name="porcentajeopx" value="<?php echo $this->form_encode_input($porcentajeopx) . "\">" . $porcentajeopx_look . ""; ?>
<?php } else { ?>

<?php

 if ("%" == $this->porcentajeopx) { $porcentajeopx_look = "Porcentaje";} 
 if ("PX" == $this->porcentajeopx) { $porcentajeopx_look = "Pixeles";} 
?>
<span id="id_read_on_porcentajeopx"  class="css_porcentajeopx_line" style="<?php echo $sStyleReadLab_porcentajeopx; ?>"><?php echo $this->form_format_readonly("porcentajeopx", $this->form_encode_input($porcentajeopx_look)); ?></span><span id="id_read_off_porcentajeopx" class="css_read_off_porcentajeopx css_porcentajeopx_line" style="<?php echo $sStyleReadInp_porcentajeopx; ?>"><div id="idAjaxRadio_porcentajeopx" style="display: inline-block"  class="css_porcentajeopx_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_porcentajeopx_line"><?php $tempOptionId = "id-opt-porcentajeopx" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-porcentajeopx sc-ui-radio-porcentajeopx" type=radio name="porcentajeopx" value="%"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_porcentajeopx'][] = '%'; ?>
<?php  if ("%" == $this->porcentajeopx)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Porcentaje</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_porcentajeopx_line"><?php $tempOptionId = "id-opt-porcentajeopx" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-porcentajeopx sc-ui-radio-porcentajeopx" type=radio name="porcentajeopx" value="PX"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_porcentajeopx'][] = 'PX'; ?>
<?php  if ("PX" == $this->porcentajeopx)  { echo " checked" ;} ?><?php  if (empty($this->porcentajeopx)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Pixeles</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcentajeopx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcentajeopx_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['logo']))
    {
        $this->nm_new_label['logo'] = "Mostrar Logo";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_logo_label" id="hidden_field_label_logo" style="<?php echo $sStyleHidden_logo; ?>"><span id="id_label_logo"><?php echo $this->nm_new_label['logo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['logo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['logo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_logo_line" id="hidden_field_data_logo" style="<?php echo $sStyleHidden_logo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_logo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["logo"]) &&  $this->nmgp_cmp_readonly["logo"] == "on") { 

 if ("SI" == $this->logo) { $logo_look = "SI";} 
 if ("NO" == $this->logo) { $logo_look = "NO";} 
?>
<input type="hidden" name="logo" value="<?php echo $this->form_encode_input($logo) . "\">" . $logo_look . ""; ?>
<?php } else { ?>

<?php

 if ("SI" == $this->logo) { $logo_look = "SI";} 
 if ("NO" == $this->logo) { $logo_look = "NO";} 
?>
<span id="id_read_on_logo"  class="css_logo_line" style="<?php echo $sStyleReadLab_logo; ?>"><?php echo $this->form_format_readonly("logo", $this->form_encode_input($logo_look)); ?></span><span id="id_read_off_logo" class="css_read_off_logo css_logo_line" style="<?php echo $sStyleReadInp_logo; ?>"><div id="idAjaxRadio_logo" style="display: inline-block"  class="css_logo_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_logo_line"><?php $tempOptionId = "id-opt-logo" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-logo sc-ui-radio-logo" type=radio name="logo" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_logo'][] = 'SI'; ?>
<?php  if ("SI" == $this->logo)  { echo " checked" ;} ?><?php  if (empty($this->logo)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_logo_line"><?php $tempOptionId = "id-opt-logo" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-logo sc-ui-radio-logo" type=radio name="logo" value="NO"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_logo'][] = 'NO'; ?>
<?php  if ("NO" == $this->logo)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_logo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_logo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['texto_cabecera']))
    {
        $this->nm_new_label['texto_cabecera'] = "Texto Cabecera";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $texto_cabecera = $this->texto_cabecera;
   $sStyleHidden_texto_cabecera = '';
   if (isset($this->nmgp_cmp_hidden['texto_cabecera']) && $this->nmgp_cmp_hidden['texto_cabecera'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['texto_cabecera']);
       $sStyleHidden_texto_cabecera = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_texto_cabecera = 'display: none;';
   $sStyleReadInp_texto_cabecera = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['texto_cabecera']) && $this->nmgp_cmp_readonly['texto_cabecera'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['texto_cabecera']);
       $sStyleReadLab_texto_cabecera = '';
       $sStyleReadInp_texto_cabecera = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['texto_cabecera']) && $this->nmgp_cmp_hidden['texto_cabecera'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="texto_cabecera" value="<?php echo $this->form_encode_input($texto_cabecera) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_texto_cabecera_label" id="hidden_field_label_texto_cabecera" style="<?php echo $sStyleHidden_texto_cabecera; ?>"><span id="id_label_texto_cabecera"><?php echo $this->nm_new_label['texto_cabecera']; ?></span></TD>
    <TD class="scFormDataOdd css_texto_cabecera_line" id="hidden_field_data_texto_cabecera" style="<?php echo $sStyleHidden_texto_cabecera; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_texto_cabecera_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_texto_cabecera" style="<?php echo $sStyleReadLab_texto_cabecera; ?>"><?php echo $this->form_format_readonly("texto_cabecera", sc_strip_script($this->texto_cabecera)); ?></span><span id="id_read_off_texto_cabecera" class="css_read_off_texto_cabecera" style="<?php echo $sStyleReadInp_texto_cabecera; ?>"><textarea id="texto_cabecera" name="texto_cabecera" cols="50" rows="10" class="mceEditor_texto_cabecera" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->texto_cabecera); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_texto_cabecera_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_texto_cabecera_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['texto_pie']))
    {
        $this->nm_new_label['texto_pie'] = "Texto Pie de Página";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $texto_pie = $this->texto_pie;
   $sStyleHidden_texto_pie = '';
   if (isset($this->nmgp_cmp_hidden['texto_pie']) && $this->nmgp_cmp_hidden['texto_pie'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['texto_pie']);
       $sStyleHidden_texto_pie = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_texto_pie = 'display: none;';
   $sStyleReadInp_texto_pie = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['texto_pie']) && $this->nmgp_cmp_readonly['texto_pie'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['texto_pie']);
       $sStyleReadLab_texto_pie = '';
       $sStyleReadInp_texto_pie = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['texto_pie']) && $this->nmgp_cmp_hidden['texto_pie'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="texto_pie" value="<?php echo $this->form_encode_input($texto_pie) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_texto_pie_label" id="hidden_field_label_texto_pie" style="<?php echo $sStyleHidden_texto_pie; ?>"><span id="id_label_texto_pie"><?php echo $this->nm_new_label['texto_pie']; ?></span></TD>
    <TD class="scFormDataOdd css_texto_pie_line" id="hidden_field_data_texto_pie" style="<?php echo $sStyleHidden_texto_pie; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_texto_pie_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_texto_pie" style="<?php echo $sStyleReadLab_texto_pie; ?>"><?php echo $this->form_format_readonly("texto_pie", sc_strip_script($this->texto_pie)); ?></span><span id="id_read_off_texto_pie" class="css_read_off_texto_pie" style="<?php echo $sStyleReadInp_texto_pie; ?>"><textarea id="texto_pie" name="texto_pie" cols="50" rows="10" class="mceEditor_texto_pie" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->texto_pie); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_texto_pie_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_texto_pie_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['archo_ticket']))
    {
        $this->nm_new_label['archo_ticket'] = "Archo Ticket";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archo_ticket = $this->archo_ticket;
   $sStyleHidden_archo_ticket = '';
   if (isset($this->nmgp_cmp_hidden['archo_ticket']) && $this->nmgp_cmp_hidden['archo_ticket'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archo_ticket']);
       $sStyleHidden_archo_ticket = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archo_ticket = 'display: none;';
   $sStyleReadInp_archo_ticket = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archo_ticket']) && $this->nmgp_cmp_readonly['archo_ticket'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archo_ticket']);
       $sStyleReadLab_archo_ticket = '';
       $sStyleReadInp_archo_ticket = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archo_ticket']) && $this->nmgp_cmp_hidden['archo_ticket'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archo_ticket" value="<?php echo $this->form_encode_input($archo_ticket) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_archo_ticket_label" id="hidden_field_label_archo_ticket" style="<?php echo $sStyleHidden_archo_ticket; ?>"><span id="id_label_archo_ticket"><?php echo $this->nm_new_label['archo_ticket']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['archo_ticket']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['archo_ticket'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_archo_ticket_line" id="hidden_field_data_archo_ticket" style="<?php echo $sStyleHidden_archo_ticket; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archo_ticket_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archo_ticket"]) &&  $this->nmgp_cmp_readonly["archo_ticket"] == "on") { 

 ?>
<input type="hidden" name="archo_ticket" value="<?php echo $this->form_encode_input($archo_ticket) . "\">" . $archo_ticket . ""; ?>
<?php } else { ?>
<span id="id_read_on_archo_ticket" class="sc-ui-readonly-archo_ticket css_archo_ticket_line" style="<?php echo $sStyleReadLab_archo_ticket; ?>"><?php echo $this->form_format_readonly("archo_ticket", $this->form_encode_input($this->archo_ticket)); ?></span><span id="id_read_off_archo_ticket" class="css_read_off_archo_ticket<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_archo_ticket; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_archo_ticket_obj css_archo_ticket_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_archo_ticket" type=text name="archo_ticket" value="<?php echo $this->form_encode_input($archo_ticket) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['archo_ticket']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['archo_ticket']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['archo_ticket']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archo_ticket_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archo_ticket_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ticket_pjopx']))
    {
        $this->nm_new_label['ticket_pjopx'] = "Tipo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ticket_pjopx = $this->ticket_pjopx;
   $sStyleHidden_ticket_pjopx = '';
   if (isset($this->nmgp_cmp_hidden['ticket_pjopx']) && $this->nmgp_cmp_hidden['ticket_pjopx'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ticket_pjopx']);
       $sStyleHidden_ticket_pjopx = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ticket_pjopx = 'display: none;';
   $sStyleReadInp_ticket_pjopx = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ticket_pjopx']) && $this->nmgp_cmp_readonly['ticket_pjopx'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ticket_pjopx']);
       $sStyleReadLab_ticket_pjopx = '';
       $sStyleReadInp_ticket_pjopx = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ticket_pjopx']) && $this->nmgp_cmp_hidden['ticket_pjopx'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ticket_pjopx" value="<?php echo $this->form_encode_input($ticket_pjopx) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ticket_pjopx_label" id="hidden_field_label_ticket_pjopx" style="<?php echo $sStyleHidden_ticket_pjopx; ?>"><span id="id_label_ticket_pjopx"><?php echo $this->nm_new_label['ticket_pjopx']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['ticket_pjopx']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['ticket_pjopx'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ticket_pjopx_line" id="hidden_field_data_ticket_pjopx" style="<?php echo $sStyleHidden_ticket_pjopx; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ticket_pjopx_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ticket_pjopx"]) &&  $this->nmgp_cmp_readonly["ticket_pjopx"] == "on") { 

 if ("%" == $this->ticket_pjopx) { $ticket_pjopx_look = "Porcentaje";} 
 if ("PX" == $this->ticket_pjopx) { $ticket_pjopx_look = "Pixeles";} 
?>
<input type="hidden" name="ticket_pjopx" value="<?php echo $this->form_encode_input($ticket_pjopx) . "\">" . $ticket_pjopx_look . ""; ?>
<?php } else { ?>

<?php

 if ("%" == $this->ticket_pjopx) { $ticket_pjopx_look = "Porcentaje";} 
 if ("PX" == $this->ticket_pjopx) { $ticket_pjopx_look = "Pixeles";} 
?>
<span id="id_read_on_ticket_pjopx"  class="css_ticket_pjopx_line" style="<?php echo $sStyleReadLab_ticket_pjopx; ?>"><?php echo $this->form_format_readonly("ticket_pjopx", $this->form_encode_input($ticket_pjopx_look)); ?></span><span id="id_read_off_ticket_pjopx" class="css_read_off_ticket_pjopx css_ticket_pjopx_line" style="<?php echo $sStyleReadInp_ticket_pjopx; ?>"><div id="idAjaxRadio_ticket_pjopx" style="display: inline-block"  class="css_ticket_pjopx_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ticket_pjopx_line"><?php $tempOptionId = "id-opt-ticket_pjopx" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-ticket_pjopx sc-ui-radio-ticket_pjopx" type=radio name="ticket_pjopx" value="%"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_ticket_pjopx'][] = '%'; ?>
<?php  if ("%" == $this->ticket_pjopx)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Porcentaje</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_ticket_pjopx_line"><?php $tempOptionId = "id-opt-ticket_pjopx" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-ticket_pjopx sc-ui-radio-ticket_pjopx" type=radio name="ticket_pjopx" value="PX"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_ticket_pjopx'][] = 'PX'; ?>
<?php  if ("PX" == $this->ticket_pjopx)  { echo " checked" ;} ?><?php  if (empty($this->ticket_pjopx)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">Pixeles</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ticket_pjopx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ticket_pjopx_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['predeterminada']))
   {
       $this->nm_new_label['predeterminada'] = "Predeterminada";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $predeterminada = $this->predeterminada;
   $sStyleHidden_predeterminada = '';
   if (isset($this->nmgp_cmp_hidden['predeterminada']) && $this->nmgp_cmp_hidden['predeterminada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['predeterminada']);
       $sStyleHidden_predeterminada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_predeterminada = 'display: none;';
   $sStyleReadInp_predeterminada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['predeterminada']) && $this->nmgp_cmp_readonly['predeterminada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['predeterminada']);
       $sStyleReadLab_predeterminada = '';
       $sStyleReadInp_predeterminada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['predeterminada']) && $this->nmgp_cmp_hidden['predeterminada'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="predeterminada" value="<?php echo $this->form_encode_input($this->predeterminada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_predeterminada_label" id="hidden_field_label_predeterminada" style="<?php echo $sStyleHidden_predeterminada; ?>"><span id="id_label_predeterminada"><?php echo $this->nm_new_label['predeterminada']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['predeterminada']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['php_cmp_required']['predeterminada'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_predeterminada_line" id="hidden_field_data_predeterminada" style="<?php echo $sStyleHidden_predeterminada; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_predeterminada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["predeterminada"]) &&  $this->nmgp_cmp_readonly["predeterminada"] == "on") { 

$predeterminada_look = "";
 if ($this->predeterminada == "NO") { $predeterminada_look .= "NO" ;} 
 if ($this->predeterminada == "SI") { $predeterminada_look .= "SI" ;} 
 if (empty($predeterminada_look)) { $predeterminada_look = $this->predeterminada; }
?>
<input type="hidden" name="predeterminada" value="<?php echo $this->form_encode_input($predeterminada) . "\">" . $predeterminada_look . ""; ?>
<?php } else { ?>
<?php

$predeterminada_look = "";
 if ($this->predeterminada == "NO") { $predeterminada_look .= "NO" ;} 
 if ($this->predeterminada == "SI") { $predeterminada_look .= "SI" ;} 
 if (empty($predeterminada_look)) { $predeterminada_look = $this->predeterminada; }
?>
<span id="id_read_on_predeterminada" class="css_predeterminada_line"  style="<?php echo $sStyleReadLab_predeterminada; ?>"><?php echo $this->form_format_readonly("predeterminada", $this->form_encode_input($predeterminada_look)); ?></span><span id="id_read_off_predeterminada" class="css_read_off_predeterminada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_predeterminada; ?>">
 <span id="idAjaxSelect_predeterminada" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_predeterminada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_predeterminada" name="predeterminada" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="NO" <?php  if ($this->predeterminada == "NO") { echo " selected" ;} ?><?php  if (empty($this->predeterminada)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_predeterminada'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->predeterminada == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_predeterminada'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_predeterminada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_predeterminada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_vista']))
   {
       $this->nm_new_label['tipo_vista'] = "Tipo Vista";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_vista = $this->tipo_vista;
   $sStyleHidden_tipo_vista = '';
   if (isset($this->nmgp_cmp_hidden['tipo_vista']) && $this->nmgp_cmp_hidden['tipo_vista'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_vista']);
       $sStyleHidden_tipo_vista = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_vista = 'display: none;';
   $sStyleReadInp_tipo_vista = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_vista']) && $this->nmgp_cmp_readonly['tipo_vista'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_vista']);
       $sStyleReadLab_tipo_vista = '';
       $sStyleReadInp_tipo_vista = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_vista']) && $this->nmgp_cmp_hidden['tipo_vista'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_vista" value="<?php echo $this->form_encode_input($this->tipo_vista) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_vista_label" id="hidden_field_label_tipo_vista" style="<?php echo $sStyleHidden_tipo_vista; ?>"><span id="id_label_tipo_vista"><?php echo $this->nm_new_label['tipo_vista']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_vista_line" id="hidden_field_data_tipo_vista" style="<?php echo $sStyleHidden_tipo_vista; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_vista_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_vista"]) &&  $this->nmgp_cmp_readonly["tipo_vista"] == "on") { 

$tipo_vista_look = "";
 if ($this->tipo_vista == "PRELIMINAR") { $tipo_vista_look .= "PRELIMINAR" ;} 
 if ($this->tipo_vista == "HTML") { $tipo_vista_look .= "HTML" ;} 
 if ($this->tipo_vista == "PDF") { $tipo_vista_look .= "PDF" ;} 
 if (empty($tipo_vista_look)) { $tipo_vista_look = $this->tipo_vista; }
?>
<input type="hidden" name="tipo_vista" value="<?php echo $this->form_encode_input($tipo_vista) . "\">" . $tipo_vista_look . ""; ?>
<?php } else { ?>
<?php

$tipo_vista_look = "";
 if ($this->tipo_vista == "PRELIMINAR") { $tipo_vista_look .= "PRELIMINAR" ;} 
 if ($this->tipo_vista == "HTML") { $tipo_vista_look .= "HTML" ;} 
 if ($this->tipo_vista == "PDF") { $tipo_vista_look .= "PDF" ;} 
 if (empty($tipo_vista_look)) { $tipo_vista_look = $this->tipo_vista; }
?>
<span id="id_read_on_tipo_vista" class="css_tipo_vista_line"  style="<?php echo $sStyleReadLab_tipo_vista; ?>"><?php echo $this->form_format_readonly("tipo_vista", $this->form_encode_input($tipo_vista_look)); ?></span><span id="id_read_off_tipo_vista" class="css_read_off_tipo_vista<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_vista; ?>">
 <span id="idAjaxSelect_tipo_vista" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_vista_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_vista" name="tipo_vista" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="PRELIMINAR" <?php  if ($this->tipo_vista == "PRELIMINAR") { echo " selected" ;} ?><?php  if (empty($this->tipo_vista)) { echo " selected" ;} ?>>PRELIMINAR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_vista'][] = 'PRELIMINAR'; ?>
 <option  value="HTML" <?php  if ($this->tipo_vista == "HTML") { echo " selected" ;} ?>>HTML</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_vista'][] = 'HTML'; ?>
 <option  value="PDF" <?php  if ($this->tipo_vista == "PDF") { echo " selected" ;} ?>>PDF</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_vista'][] = 'PDF'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_vista_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_vista_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['impresion_directa']))
   {
       $this->nm_new_label['impresion_directa'] = "Impresión Directa";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $impresion_directa = $this->impresion_directa;
   $sStyleHidden_impresion_directa = '';
   if (isset($this->nmgp_cmp_hidden['impresion_directa']) && $this->nmgp_cmp_hidden['impresion_directa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['impresion_directa']);
       $sStyleHidden_impresion_directa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_impresion_directa = 'display: none;';
   $sStyleReadInp_impresion_directa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['impresion_directa']) && $this->nmgp_cmp_readonly['impresion_directa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['impresion_directa']);
       $sStyleReadLab_impresion_directa = '';
       $sStyleReadInp_impresion_directa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['impresion_directa']) && $this->nmgp_cmp_hidden['impresion_directa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="impresion_directa" value="<?php echo $this->form_encode_input($this->impresion_directa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->impresion_directa_1 = explode(";", trim($this->impresion_directa));
  } 
  else
  {
      if (empty($this->impresion_directa))
      {
          $this->impresion_directa_1= array(); 
          $this->impresion_directa= "NO";
      } 
      else
      {
          $this->impresion_directa_1= $this->impresion_directa; 
          $this->impresion_directa= ""; 
          foreach ($this->impresion_directa_1 as $cada_impresion_directa)
          {
             if (!empty($impresion_directa))
             {
                 $this->impresion_directa.= ";"; 
             } 
             $this->impresion_directa.= $cada_impresion_directa; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_impresion_directa_label" id="hidden_field_label_impresion_directa" style="<?php echo $sStyleHidden_impresion_directa; ?>"><span id="id_label_impresion_directa"><?php echo $this->nm_new_label['impresion_directa']; ?></span></TD>
    <TD class="scFormDataOdd css_impresion_directa_line" id="hidden_field_data_impresion_directa" style="<?php echo $sStyleHidden_impresion_directa; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_impresion_directa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["impresion_directa"]) &&  $this->nmgp_cmp_readonly["impresion_directa"] == "on") { 

$impresion_directa_look = "";
 if ($this->impresion_directa == "SI") { $impresion_directa_look .= "" ;} 
 if (empty($impresion_directa_look)) { $impresion_directa_look = $this->impresion_directa; }
?>
<input type="hidden" name="impresion_directa" value="<?php echo $this->form_encode_input($impresion_directa) . "\">" . $impresion_directa_look . ""; ?>
<?php } else { ?>

<?php

$impresion_directa_look = "";
 if ($this->impresion_directa == "SI") { $impresion_directa_look .= "" ;} 
 if (empty($impresion_directa_look)) { $impresion_directa_look = $this->impresion_directa; }
?>
<span id="id_read_on_impresion_directa" class="css_impresion_directa_line" style="<?php echo $sStyleReadLab_impresion_directa; ?>"><?php echo $this->form_format_readonly("impresion_directa", $this->form_encode_input($impresion_directa_look)); ?></span><span id="id_read_off_impresion_directa" class="css_read_off_impresion_directa css_impresion_directa_line" style="<?php echo $sStyleReadInp_impresion_directa; ?>"><?php echo "<div id=\"idAjaxCheckbox_impresion_directa\" style=\"display: inline-block\" class=\"css_impresion_directa_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_impresion_directa_line"><?php $tempOptionId = "id-opt-impresion_directa" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-impresion_directa sc-ui-checkbox-impresion_directa" name="impresion_directa[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_impresion_directa'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->impresion_directa_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_impresion_directa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_impresion_directa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_impresora']))
   {
       $this->nm_new_label['tipo_impresora'] = "Tipo Impresora";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_impresora = $this->tipo_impresora;
   $sStyleHidden_tipo_impresora = '';
   if (isset($this->nmgp_cmp_hidden['tipo_impresora']) && $this->nmgp_cmp_hidden['tipo_impresora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_impresora']);
       $sStyleHidden_tipo_impresora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_impresora = 'display: none;';
   $sStyleReadInp_tipo_impresora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_impresora']) && $this->nmgp_cmp_readonly['tipo_impresora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_impresora']);
       $sStyleReadLab_tipo_impresora = '';
       $sStyleReadInp_tipo_impresora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_impresora']) && $this->nmgp_cmp_hidden['tipo_impresora'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_impresora" value="<?php echo $this->form_encode_input($this->tipo_impresora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_impresora_label" id="hidden_field_label_tipo_impresora" style="<?php echo $sStyleHidden_tipo_impresora; ?>"><span id="id_label_tipo_impresora"><?php echo $this->nm_new_label['tipo_impresora']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_impresora_line" id="hidden_field_data_tipo_impresora" style="<?php echo $sStyleHidden_tipo_impresora; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_impresora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_impresora"]) &&  $this->nmgp_cmp_readonly["tipo_impresora"] == "on") { 

$tipo_impresora_look = "";
 if ($this->tipo_impresora == "termica") { $tipo_impresora_look .= "Térmica" ;} 
 if ($this->tipo_impresora == "matricial") { $tipo_impresora_look .= "Matricial" ;} 
 if (empty($tipo_impresora_look)) { $tipo_impresora_look = $this->tipo_impresora; }
?>
<input type="hidden" name="tipo_impresora" value="<?php echo $this->form_encode_input($tipo_impresora) . "\">" . $tipo_impresora_look . ""; ?>
<?php } else { ?>
<?php

$tipo_impresora_look = "";
 if ($this->tipo_impresora == "termica") { $tipo_impresora_look .= "Térmica" ;} 
 if ($this->tipo_impresora == "matricial") { $tipo_impresora_look .= "Matricial" ;} 
 if (empty($tipo_impresora_look)) { $tipo_impresora_look = $this->tipo_impresora; }
?>
<span id="id_read_on_tipo_impresora" class="css_tipo_impresora_line"  style="<?php echo $sStyleReadLab_tipo_impresora; ?>"><?php echo $this->form_format_readonly("tipo_impresora", $this->form_encode_input($tipo_impresora_look)); ?></span><span id="id_read_off_tipo_impresora" class="css_read_off_tipo_impresora<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_impresora; ?>">
 <span id="idAjaxSelect_tipo_impresora" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_impresora_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_impresora" name="tipo_impresora" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="termica" <?php  if ($this->tipo_impresora == "termica") { echo " selected" ;} ?>>Térmica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_impresora'][] = 'termica'; ?>
 <option  value="matricial" <?php  if ($this->tipo_impresora == "matricial") { echo " selected" ;} ?>>Matricial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['Lookup_tipo_impresora'][] = 'matricial'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_impresora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_impresora_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_impresora']))
    {
        $this->nm_new_label['nombre_impresora'] = "Nombre Impresora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_impresora = $this->nombre_impresora;
   $sStyleHidden_nombre_impresora = '';
   if (isset($this->nmgp_cmp_hidden['nombre_impresora']) && $this->nmgp_cmp_hidden['nombre_impresora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_impresora']);
       $sStyleHidden_nombre_impresora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_impresora = 'display: none;';
   $sStyleReadInp_nombre_impresora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_impresora']) && $this->nmgp_cmp_readonly['nombre_impresora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_impresora']);
       $sStyleReadLab_nombre_impresora = '';
       $sStyleReadInp_nombre_impresora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_impresora']) && $this->nmgp_cmp_hidden['nombre_impresora'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_impresora" value="<?php echo $this->form_encode_input($nombre_impresora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_impresora_label" id="hidden_field_label_nombre_impresora" style="<?php echo $sStyleHidden_nombre_impresora; ?>"><span id="id_label_nombre_impresora"><?php echo $this->nm_new_label['nombre_impresora']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_impresora_line" id="hidden_field_data_nombre_impresora" style="<?php echo $sStyleHidden_nombre_impresora; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_impresora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_impresora"]) &&  $this->nmgp_cmp_readonly["nombre_impresora"] == "on") { 

 ?>
<input type="hidden" name="nombre_impresora" value="<?php echo $this->form_encode_input($nombre_impresora) . "\">" . $nombre_impresora . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_impresora" class="sc-ui-readonly-nombre_impresora css_nombre_impresora_line" style="<?php echo $sStyleReadLab_nombre_impresora; ?>"><?php echo $this->form_format_readonly("nombre_impresora", $this->form_encode_input($this->nombre_impresora)); ?></span><span id="id_read_off_nombre_impresora" class="css_read_off_nombre_impresora<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_impresora; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_impresora_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_impresora" type=text name="nombre_impresora" value="<?php echo $this->form_encode_input($nombre_impresora) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_impresora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_impresora_text"></span></td></tr></table></td></tr></table></TD>
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R")
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
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_configuraciones_print_pos");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_configuraciones_print_pos");
 parent.scAjaxDetailHeight("form_configuraciones_print_pos", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_configuraciones_print_pos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_configuraciones_print_pos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['sc_modal'])
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
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones_print_pos']['buttonStatus'] = $this->nmgp_botoes;
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
