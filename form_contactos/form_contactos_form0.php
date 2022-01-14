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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Contacto"); } else { echo strip_tags("Contacto"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_contactos/form_contactos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_contactos_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_contactos_jquery.php');

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
    if ("hidden_bloco_1" == block_id) {
      scAjaxDetailHeight("form_contacto_clientes", "300");
    }
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_contacto_correos", "300");
    }
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_contacto_telefonos", "300");
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_contacto_cotizaciones", "300");
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_contactos_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_contactos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_contactos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Contacto"; } else { echo "Contacto"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__contacts.png';echo '<IMG SRC="scriptcase__NM__ico__NM__contacts.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__contacts.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_contactos_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_contactos_form0' => array(
            'title' => "Datos",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_contactos_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_contactos_form1' => array(
            'title' => "Clientes",
            'class' => $nmgp_num_form == "form_contactos_form1" ? "scTabActive" : "scTabInactive",
        ),
        'form_contactos_form2' => array(
            'title' => "Correos",
            'class' => $nmgp_num_form == "form_contactos_form2" ? "scTabActive" : "scTabInactive",
        ),
        'form_contactos_form3' => array(
            'title' => "Telefonos",
            'class' => $nmgp_num_form == "form_contactos_form3" ? "scTabActive" : "scTabInactive",
        ),
        'form_contactos_form4' => array(
            'title' => "Archivos",
            'class' => $nmgp_num_form == "form_contactos_form4" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Datos' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_contactos_form0']['class'] = 'scTabInactive';
                        }
                        if ('Clientes' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_contactos_form1']['class'] = 'scTabInactive';
                        }
                        if ('Correos' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_contactos_form2']['class'] = 'scTabInactive';
                        }
                        if ('Telefonos' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_contactos_form3']['class'] = 'scTabInactive';
                        }
                        if ('Archivos' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_contactos_form4']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["form_contactos_form0"]['class'];
?>
   <li id="id_form_contactos_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_contactos_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__about_24.png" align="absmiddle">
     Datos
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_contactos_form1"]['class'];
?>
   <li id="id_form_contactos_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_contactos_form1')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__users2_24.png" align="absmiddle">
     Clientes
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_contactos_form2"]['class'];
?>
   <li id="id_form_contactos_form2" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_contactos_form2')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__airmail_24.png" align="absmiddle">
     Correos
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_contactos_form3"]['class'];
?>
   <li id="id_form_contactos_form3" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_contactos_form3')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__telephone2_24.png" align="absmiddle">
     Telefonos
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_contactos_form4"]['class'];
?>
   <li id="id_form_contactos_form4" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_contactos_form4')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__document_pinned_24.png" align="absmiddle">
     Archivos
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_contactos_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_contacto']))
   {
       $this->nmgp_cmp_hidden['id_contacto'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_contacto']))
           {
               $this->nmgp_cmp_readonly['id_contacto'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_contacto']))
    {
        $this->nm_new_label['id_contacto'] = "Id Contacto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_contacto = $this->id_contacto;
   if (!isset($this->nmgp_cmp_hidden['id_contacto']))
   {
       $this->nmgp_cmp_hidden['id_contacto'] = 'off';
   }
   $sStyleHidden_id_contacto = '';
   if (isset($this->nmgp_cmp_hidden['id_contacto']) && $this->nmgp_cmp_hidden['id_contacto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_contacto']);
       $sStyleHidden_id_contacto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_contacto = 'display: none;';
   $sStyleReadInp_id_contacto = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_contacto"]) &&  $this->nmgp_cmp_readonly["id_contacto"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_contacto']);
       $sStyleReadLab_id_contacto = '';
       $sStyleReadInp_id_contacto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_contacto']) && $this->nmgp_cmp_hidden['id_contacto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_contacto" value="<?php echo $this->form_encode_input($id_contacto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_contacto_label" id="hidden_field_label_id_contacto" style="<?php echo $sStyleHidden_id_contacto; ?>"><span id="id_label_id_contacto"><?php echo $this->nm_new_label['id_contacto']; ?></span></TD>
    <TD class="scFormDataOdd css_id_contacto_line" id="hidden_field_data_id_contacto" style="<?php echo $sStyleHidden_id_contacto; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_contacto_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_contacto" class="css_id_contacto_line" style="<?php echo $sStyleReadLab_id_contacto; ?>"><?php echo $this->form_format_readonly("id_contacto", $this->form_encode_input($this->id_contacto)); ?></span><span id="id_read_off_id_contacto" class="css_read_off_id_contacto" style="<?php echo $sStyleReadInp_id_contacto; ?>"><input type="hidden" name="id_contacto" value="<?php echo $this->form_encode_input($id_contacto) . "\">"?><span id="id_ajax_label_id_contacto"><?php echo nl2br($id_contacto); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_contacto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_contacto_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['nombres']))
    {
        $this->nm_new_label['nombres'] = "Nombres";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombres = $this->nombres;
   $sStyleHidden_nombres = '';
   if (isset($this->nmgp_cmp_hidden['nombres']) && $this->nmgp_cmp_hidden['nombres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombres']);
       $sStyleHidden_nombres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombres = 'display: none;';
   $sStyleReadInp_nombres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombres']) && $this->nmgp_cmp_readonly['nombres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombres']);
       $sStyleReadLab_nombres = '';
       $sStyleReadInp_nombres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombres']) && $this->nmgp_cmp_hidden['nombres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombres" value="<?php echo $this->form_encode_input($nombres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombres_label" id="hidden_field_label_nombres" style="<?php echo $sStyleHidden_nombres; ?>"><span id="id_label_nombres"><?php echo $this->nm_new_label['nombres']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['php_cmp_required']['nombres']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['php_cmp_required']['nombres'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nombres_line" id="hidden_field_data_nombres" style="<?php echo $sStyleHidden_nombres; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombres_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombres"]) &&  $this->nmgp_cmp_readonly["nombres"] == "on") { 

 ?>
<input type="hidden" name="nombres" value="<?php echo $this->form_encode_input($nombres) . "\">" . $nombres . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombres" class="sc-ui-readonly-nombres css_nombres_line" style="<?php echo $sStyleReadLab_nombres; ?>"><?php echo $this->form_format_readonly("nombres", $this->form_encode_input($this->nombres)); ?></span><span id="id_read_off_nombres" class="css_read_off_nombres<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombres; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombres_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombres" type=text name="nombres" value="<?php echo $this->form_encode_input($nombres) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombres_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direccion']))
    {
        $this->nm_new_label['direccion'] = "Direccion";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_direccion_label" id="hidden_field_label_direccion" style="<?php echo $sStyleHidden_direccion; ?>"><span id="id_label_direccion"><?php echo $this->nm_new_label['direccion']; ?></span></TD>
    <TD class="scFormDataOdd css_direccion_line" id="hidden_field_data_direccion" style="<?php echo $sStyleHidden_direccion; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion"]) &&  $this->nmgp_cmp_readonly["direccion"] == "on") { 

 ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">" . $direccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion" class="sc-ui-readonly-direccion css_direccion_line" style="<?php echo $sStyleReadLab_direccion; ?>"><?php echo $this->form_format_readonly("direccion", $this->form_encode_input($this->direccion)); ?></span><span id="id_read_off_direccion" class="css_read_off_direccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_direccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direccion" type=text name="direccion" value="<?php echo $this->form_encode_input($direccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observaciones']))
    {
        $this->nm_new_label['observaciones'] = "Observaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observaciones = $this->observaciones;
   $sStyleHidden_observaciones = '';
   if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observaciones']);
       $sStyleHidden_observaciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observaciones = 'display: none;';
   $sStyleReadInp_observaciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observaciones']) && $this->nmgp_cmp_readonly['observaciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observaciones']);
       $sStyleReadLab_observaciones = '';
       $sStyleReadInp_observaciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_observaciones_label" id="hidden_field_label_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></TD>
    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px">
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 2000, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pais']))
   {
       $this->nm_new_label['pais'] = "Pais";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pais = $this->pais;
   $sStyleHidden_pais = '';
   if (isset($this->nmgp_cmp_hidden['pais']) && $this->nmgp_cmp_hidden['pais'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pais']);
       $sStyleHidden_pais = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pais = 'display: none;';
   $sStyleReadInp_pais = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pais']) && $this->nmgp_cmp_readonly['pais'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pais']);
       $sStyleReadLab_pais = '';
       $sStyleReadInp_pais = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pais']) && $this->nmgp_cmp_hidden['pais'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pais" value="<?php echo $this->form_encode_input($this->pais) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pais_label" id="hidden_field_label_pais" style="<?php echo $sStyleHidden_pais; ?>"><span id="id_label_pais"><?php echo $this->nm_new_label['pais']; ?></span></TD>
    <TD class="scFormDataOdd css_pais_line" id="hidden_field_data_pais" style="<?php echo $sStyleHidden_pais; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pais_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pais"]) &&  $this->nmgp_cmp_readonly["pais"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais'] = array(); 
    }

   $old_value_id_contacto = $this->id_contacto;
   $old_value_ultimo_contacto = $this->ultimo_contacto;
   $old_value_ultimo_contacto_hora = $this->ultimo_contacto_hora;
   $old_value_numero_contactos = $this->numero_contactos;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_contacto = $this->id_contacto;
   $unformatted_value_ultimo_contacto = $this->ultimo_contacto;
   $unformatted_value_ultimo_contacto_hora = $this->ultimo_contacto_hora;
   $unformatted_value_numero_contactos = $this->numero_contactos;

   $inactivo_val_str = "''";
   if (!empty($this->inactivo))
   {
       if (is_array($this->inactivo))
       {
           $Tmp_array = $this->inactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->inactivo);
       }
       $inactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $inactivo_val_str)
          {
             $inactivo_val_str .= ", ";
          }
          $inactivo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT nompais, nompais  FROM paises  ORDER BY nompais";

   $this->id_contacto = $old_value_id_contacto;
   $this->ultimo_contacto = $old_value_ultimo_contacto;
   $this->ultimo_contacto_hora = $old_value_ultimo_contacto_hora;
   $this->numero_contactos = $old_value_numero_contactos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_pais'][] = $rs->fields[0];
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
   $pais_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pais_1))
          {
              foreach ($this->pais_1 as $tmp_pais)
              {
                  if (trim($tmp_pais) === trim($cadaselect[1])) { $pais_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pais) === trim($cadaselect[1])) { $pais_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pais" value="<?php echo $this->form_encode_input($pais) . "\">" . $pais_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pais();
   $x = 0 ; 
   $pais_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pais_1))
          {
              foreach ($this->pais_1 as $tmp_pais)
              {
                  if (trim($tmp_pais) === trim($cadaselect[1])) { $pais_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pais) === trim($cadaselect[1])) { $pais_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pais_look))
          {
              $pais_look = $this->pais;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pais\" class=\"css_pais_line\" style=\"" .  $sStyleReadLab_pais . "\">" . $this->form_format_readonly("pais", $this->form_encode_input($pais_look)) . "</span><span id=\"id_read_off_pais\" class=\"css_read_off_pais" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_pais . "\">";
   echo " <span id=\"idAjaxSelect_pais\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_pais_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_pais\" name=\"pais\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pais) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pais)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pais_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pais_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ciudad']))
    {
        $this->nm_new_label['ciudad'] = "Ciudad";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['ciudad']) && $this->nmgp_cmp_hidden['ciudad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ciudad" value="<?php echo $this->form_encode_input($ciudad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ciudad_label" id="hidden_field_label_ciudad" style="<?php echo $sStyleHidden_ciudad; ?>"><span id="id_label_ciudad"><?php echo $this->nm_new_label['ciudad']; ?></span></TD>
    <TD class="scFormDataOdd css_ciudad_line" id="hidden_field_data_ciudad" style="<?php echo $sStyleHidden_ciudad; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ciudad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciudad"]) &&  $this->nmgp_cmp_readonly["ciudad"] == "on") { 

 ?>
<input type="hidden" name="ciudad" value="<?php echo $this->form_encode_input($ciudad) . "\">" . $ciudad . ""; ?>
<?php } else { ?>
<span id="id_read_on_ciudad" class="sc-ui-readonly-ciudad css_ciudad_line" style="<?php echo $sStyleReadLab_ciudad; ?>"><?php echo $this->form_format_readonly("ciudad", $this->form_encode_input($this->ciudad)); ?></span><span id="id_read_off_ciudad" class="css_read_off_ciudad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ciudad; ?>">
 <input class="sc-js-input scFormObjectOdd css_ciudad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ciudad" type=text name="ciudad" value="<?php echo $this->form_encode_input($ciudad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciudad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciudad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['clasificacion']))
   {
       $this->nm_new_label['clasificacion'] = "Clasificacion";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clasificacion = $this->clasificacion;
   $sStyleHidden_clasificacion = '';
   if (isset($this->nmgp_cmp_hidden['clasificacion']) && $this->nmgp_cmp_hidden['clasificacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clasificacion']);
       $sStyleHidden_clasificacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clasificacion = 'display: none;';
   $sStyleReadInp_clasificacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clasificacion']) && $this->nmgp_cmp_readonly['clasificacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clasificacion']);
       $sStyleReadLab_clasificacion = '';
       $sStyleReadInp_clasificacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clasificacion']) && $this->nmgp_cmp_hidden['clasificacion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="clasificacion" value="<?php echo $this->form_encode_input($this->clasificacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_clasificacion_label" id="hidden_field_label_clasificacion" style="<?php echo $sStyleHidden_clasificacion; ?>"><span id="id_label_clasificacion"><?php echo $this->nm_new_label['clasificacion']; ?></span></TD>
    <TD class="scFormDataOdd css_clasificacion_line" id="hidden_field_data_clasificacion" style="<?php echo $sStyleHidden_clasificacion; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clasificacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clasificacion"]) &&  $this->nmgp_cmp_readonly["clasificacion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion'] = array(); 
    }

   $old_value_id_contacto = $this->id_contacto;
   $old_value_ultimo_contacto = $this->ultimo_contacto;
   $old_value_ultimo_contacto_hora = $this->ultimo_contacto_hora;
   $old_value_numero_contactos = $this->numero_contactos;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_contacto = $this->id_contacto;
   $unformatted_value_ultimo_contacto = $this->ultimo_contacto;
   $unformatted_value_ultimo_contacto_hora = $this->ultimo_contacto_hora;
   $unformatted_value_numero_contactos = $this->numero_contactos;

   $inactivo_val_str = "''";
   if (!empty($this->inactivo))
   {
       if (is_array($this->inactivo))
       {
           $Tmp_array = $this->inactivo;
       }
       else
       {
           $Tmp_array = explode(";", $this->inactivo);
       }
       $inactivo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $inactivo_val_str)
          {
             $inactivo_val_str .= ", ";
          }
          $inactivo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo + ' / ' + nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idclasificacion_cliente, concat(codigo,' / ',nombre)  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo&' / '&nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo||' / '||nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo + ' / ' + nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo||' / '||nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT idclasificacion_cliente, codigo||' / '||nombre  FROM clasificacion_clientes  ORDER BY codigo, nombre";
   }

   $this->id_contacto = $old_value_id_contacto;
   $this->ultimo_contacto = $old_value_ultimo_contacto;
   $this->ultimo_contacto_hora = $old_value_ultimo_contacto_hora;
   $this->numero_contactos = $old_value_numero_contactos;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion'][] = $rs->fields[0];
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
   $clasificacion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->clasificacion_1))
          {
              foreach ($this->clasificacion_1 as $tmp_clasificacion)
              {
                  if (trim($tmp_clasificacion) === trim($cadaselect[1])) { $clasificacion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->clasificacion) === trim($cadaselect[1])) { $clasificacion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="clasificacion" value="<?php echo $this->form_encode_input($clasificacion) . "\">" . $clasificacion_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_clasificacion();
   $x = 0 ; 
   $clasificacion_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->clasificacion_1))
          {
              foreach ($this->clasificacion_1 as $tmp_clasificacion)
              {
                  if (trim($tmp_clasificacion) === trim($cadaselect[1])) { $clasificacion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->clasificacion) === trim($cadaselect[1])) { $clasificacion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($clasificacion_look))
          {
              $clasificacion_look = $this->clasificacion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_clasificacion\" class=\"css_clasificacion_line\" style=\"" .  $sStyleReadLab_clasificacion . "\">" . $this->form_format_readonly("clasificacion", $this->form_encode_input($clasificacion_look)) . "</span><span id=\"id_read_off_clasificacion\" class=\"css_read_off_clasificacion" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_clasificacion . "\">";
   echo " <span id=\"idAjaxSelect_clasificacion\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_clasificacion_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_clasificacion\" name=\"clasificacion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_clasificacion'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->clasificacion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->clasificacion)) 
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
   if (isset($this->Ini->sc_lig_md5["form_clasificacion_clientes"]) && $this->Ini->sc_lig_md5["form_clasificacion_clientes"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_contactos_lkpedt_refresh_clasificacion*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_contactos@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_contactos_lkpedt_refresh_clasificacion*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_clasificacion_clientes_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_clasificacion_clientes_edit. "', '" . $Md5_Lig . "')", "fldedt_clasificacion", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clasificacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clasificacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['asesor']))
   {
       $this->nm_new_label['asesor'] = "Asesor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asesor = $this->asesor;
   $sStyleHidden_asesor = '';
   if (isset($this->nmgp_cmp_hidden['asesor']) && $this->nmgp_cmp_hidden['asesor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asesor']);
       $sStyleHidden_asesor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asesor = 'display: none;';
   $sStyleReadInp_asesor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asesor']) && $this->nmgp_cmp_readonly['asesor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asesor']);
       $sStyleReadLab_asesor = '';
       $sStyleReadInp_asesor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asesor']) && $this->nmgp_cmp_hidden['asesor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="asesor" value="<?php echo $this->form_encode_input($this->asesor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_asesor_label" id="hidden_field_label_asesor" style="<?php echo $sStyleHidden_asesor; ?>"><span id="id_label_asesor"><?php echo $this->nm_new_label['asesor']; ?></span></TD>
    <TD class="scFormDataOdd css_asesor_line" id="hidden_field_data_asesor" style="<?php echo $sStyleHidden_asesor; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asesor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asesor"]) &&  $this->nmgp_cmp_readonly["asesor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor'] = array(); 
    }

   $old_value_id_contacto = $this->id_contacto;
   $old_value_ultimo_contacto = $this->ultimo_contacto;
   $old_value_ultimo_contacto_hora = $this->ultimo_contacto_hora;
   $old_value_numero_contactos = $this->numero_contactos;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_contacto = $this->id_contacto;
   $unformatted_value_ultimo_contacto = $this->ultimo_contacto;
   $unformatted_value_ultimo_contacto_hora = $this->ultimo_contacto_hora;
   $unformatted_value_numero_contactos = $this->numero_contactos;

   $nm_comando = "SELECT idtercero, nombres  FROM terceros  WHERE empleado='SI' ORDER BY nombres";

   $this->id_contacto = $old_value_id_contacto;
   $this->ultimo_contacto = $old_value_ultimo_contacto;
   $this->ultimo_contacto_hora = $old_value_ultimo_contacto_hora;
   $this->numero_contactos = $old_value_numero_contactos;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor'][] = $rs->fields[0];
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
   $asesor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->asesor_1))
          {
              foreach ($this->asesor_1 as $tmp_asesor)
              {
                  if (trim($tmp_asesor) === trim($cadaselect[1])) { $asesor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->asesor) === trim($cadaselect[1])) { $asesor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="asesor" value="<?php echo $this->form_encode_input($asesor) . "\">" . $asesor_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_asesor();
   $x = 0 ; 
   $asesor_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->asesor_1))
          {
              foreach ($this->asesor_1 as $tmp_asesor)
              {
                  if (trim($tmp_asesor) === trim($cadaselect[1])) { $asesor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->asesor) === trim($cadaselect[1])) { $asesor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($asesor_look))
          {
              $asesor_look = $this->asesor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_asesor\" class=\"css_asesor_line\" style=\"" .  $sStyleReadLab_asesor . "\">" . $this->form_format_readonly("asesor", $this->form_encode_input($asesor_look)) . "</span><span id=\"id_read_off_asesor\" class=\"css_read_off_asesor" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_asesor . "\">";
   echo " <span id=\"idAjaxSelect_asesor\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_asesor_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_asesor\" name=\"asesor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_asesor'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->asesor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->asesor)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asesor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asesor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['inactivo']))
   {
       $this->nm_new_label['inactivo'] = "Inactivo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inactivo = $this->inactivo;
   $sStyleHidden_inactivo = '';
   if (isset($this->nmgp_cmp_hidden['inactivo']) && $this->nmgp_cmp_hidden['inactivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inactivo']);
       $sStyleHidden_inactivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inactivo = 'display: none;';
   $sStyleReadInp_inactivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inactivo']) && $this->nmgp_cmp_readonly['inactivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inactivo']);
       $sStyleReadLab_inactivo = '';
       $sStyleReadInp_inactivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inactivo']) && $this->nmgp_cmp_hidden['inactivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="inactivo" value="<?php echo $this->form_encode_input($this->inactivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->inactivo_1 = explode(";", trim($this->inactivo));
  } 
  else
  {
      if (empty($this->inactivo))
      {
          $this->inactivo_1= array(); 
          $this->inactivo= "NO";
      } 
      else
      {
          $this->inactivo_1= $this->inactivo; 
          $this->inactivo= ""; 
          foreach ($this->inactivo_1 as $cada_inactivo)
          {
             if (!empty($inactivo))
             {
                 $this->inactivo.= ";"; 
             } 
             $this->inactivo.= $cada_inactivo; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_inactivo_label" id="hidden_field_label_inactivo" style="<?php echo $sStyleHidden_inactivo; ?>"><span id="id_label_inactivo"><?php echo $this->nm_new_label['inactivo']; ?></span></TD>
    <TD class="scFormDataOdd css_inactivo_line" id="hidden_field_data_inactivo" style="<?php echo $sStyleHidden_inactivo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inactivo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inactivo"]) &&  $this->nmgp_cmp_readonly["inactivo"] == "on") { 

$inactivo_look = "";
 if ($this->inactivo == "SI") { $inactivo_look .= "" ;} 
 if (empty($inactivo_look)) { $inactivo_look = $this->inactivo; }
?>
<input type="hidden" name="inactivo" value="<?php echo $this->form_encode_input($inactivo) . "\">" . $inactivo_look . ""; ?>
<?php } else { ?>

<?php

$inactivo_look = "";
 if ($this->inactivo == "SI") { $inactivo_look .= "" ;} 
 if (empty($inactivo_look)) { $inactivo_look = $this->inactivo; }
?>
<span id="id_read_on_inactivo" class="css_inactivo_line" style="<?php echo $sStyleReadLab_inactivo; ?>"><?php echo $this->form_format_readonly("inactivo", $this->form_encode_input($inactivo_look)); ?></span><span id="id_read_off_inactivo" class="css_read_off_inactivo css_inactivo_line" style="<?php echo $sStyleReadInp_inactivo; ?>"><?php echo "<div id=\"idAjaxCheckbox_inactivo\" style=\"display: inline-block\" class=\"css_inactivo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_inactivo_line"><?php $tempOptionId = "id-opt-inactivo" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-inactivo sc-ui-checkbox-inactivo" name="inactivo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_contactos']['Lookup_inactivo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->inactivo_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inactivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inactivo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ultimo_contacto']))
    {
        $this->nm_new_label['ultimo_contacto'] = "Ultimo Contacto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_ultimo_contacto = $this->ultimo_contacto;
   if (strlen($this->ultimo_contacto_hora) > 8 ) {$this->ultimo_contacto_hora = substr($this->ultimo_contacto_hora, 0, 8);}
   $this->ultimo_contacto .= ' ' . $this->ultimo_contacto_hora;
   $this->ultimo_contacto  = trim($this->ultimo_contacto);
   $ultimo_contacto = $this->ultimo_contacto;
   $sStyleHidden_ultimo_contacto = '';
   if (isset($this->nmgp_cmp_hidden['ultimo_contacto']) && $this->nmgp_cmp_hidden['ultimo_contacto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ultimo_contacto']);
       $sStyleHidden_ultimo_contacto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ultimo_contacto = 'display: none;';
   $sStyleReadInp_ultimo_contacto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ultimo_contacto']) && $this->nmgp_cmp_readonly['ultimo_contacto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ultimo_contacto']);
       $sStyleReadLab_ultimo_contacto = '';
       $sStyleReadInp_ultimo_contacto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ultimo_contacto']) && $this->nmgp_cmp_hidden['ultimo_contacto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ultimo_contacto" value="<?php echo $this->form_encode_input($ultimo_contacto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ultimo_contacto_label" id="hidden_field_label_ultimo_contacto" style="<?php echo $sStyleHidden_ultimo_contacto; ?>"><span id="id_label_ultimo_contacto"><?php echo $this->nm_new_label['ultimo_contacto']; ?></span></TD>
    <TD class="scFormDataOdd css_ultimo_contacto_line" id="hidden_field_data_ultimo_contacto" style="<?php echo $sStyleHidden_ultimo_contacto; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ultimo_contacto_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="ultimo_contacto" value="<?php echo $this->form_encode_input($ultimo_contacto); ?>"><span id="id_ajax_label_ultimo_contacto"><?php echo nl2br($ultimo_contacto); ?></span>
<?php
$tmp_form_data = $this->field_config['ultimo_contacto']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ultimo_contacto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ultimo_contacto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->ultimo_contacto = $old_dt_ultimo_contacto;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_contactos']))
    {
        $this->nm_new_label['numero_contactos'] = "Numero Contactos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_contactos = $this->numero_contactos;
   $sStyleHidden_numero_contactos = '';
   if (isset($this->nmgp_cmp_hidden['numero_contactos']) && $this->nmgp_cmp_hidden['numero_contactos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_contactos']);
       $sStyleHidden_numero_contactos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_contactos = 'display: none;';
   $sStyleReadInp_numero_contactos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_contactos']) && $this->nmgp_cmp_readonly['numero_contactos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_contactos']);
       $sStyleReadLab_numero_contactos = '';
       $sStyleReadInp_numero_contactos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_contactos']) && $this->nmgp_cmp_hidden['numero_contactos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_contactos" value="<?php echo $this->form_encode_input($numero_contactos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numero_contactos_label" id="hidden_field_label_numero_contactos" style="<?php echo $sStyleHidden_numero_contactos; ?>"><span id="id_label_numero_contactos"><?php echo $this->nm_new_label['numero_contactos']; ?></span></TD>
    <TD class="scFormDataOdd css_numero_contactos_line" id="hidden_field_data_numero_contactos" style="<?php echo $sStyleHidden_numero_contactos; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_contactos_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="numero_contactos" value="<?php echo $this->form_encode_input($numero_contactos); ?>"><span id="id_ajax_label_numero_contactos"><?php echo nl2br($numero_contactos); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_contactos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_contactos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
