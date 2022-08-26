<?php
class form_hacerpagos_041119_PENDIENTE_form extends form_hacerpagos_041119_PENDIENTE_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Pagos a terceros"); } else { echo strip_tags("Pagos a terceros"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_hacerpagos_041119_PENDIENTE/form_hacerpagos_041119_PENDIENTE_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_hacerpagos_041119_PENDIENTE_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['last'] : 'off'); ?>";
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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

include_once('form_hacerpagos_041119_PENDIENTE_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('client_1');

<?php
}
?>
  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
    "hidden_bloco_0": true,
    "hidden_bloco_1": true,
    "hidden_bloco_2": true
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
$str_iframe_body = 'margin-top: .5px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_hacerpagos_041119_PENDIENTE_js0.php");
?>
<script type="text/javascript"> 
nmdg_enter_tab = true;
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
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
<?php
$_SESSION['scriptcase']['error_span_title']['form_hacerpagos_041119_PENDIENTE'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_hacerpagos_041119_PENDIENTE'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Pagos a terceros"; } else { echo "Pagos a terceros"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['docapagar_']) && $this->nmgp_cmp_hidden['docapagar_'] == 'off') { $sStyleHidden_docapagar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['docapagar_']) || $this->nmgp_cmp_hidden['docapagar_'] == 'on') {
      if (!isset($this->nm_new_label['docapagar_'])) {
          $this->nm_new_label['docapagar_'] = "Documento N°"; } ?>

    <TD class="scFormLabelOddMult css_docapagar__label" id="hidden_field_label_docapagar_" style="<?php echo $sStyleHidden_docapagar_; ?>" > <?php echo $this->nm_new_label['docapagar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['saldodocumento_']) && $this->nmgp_cmp_hidden['saldodocumento_'] == 'off') { $sStyleHidden_saldodocumento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['saldodocumento_']) || $this->nmgp_cmp_hidden['saldodocumento_'] == 'on') {
      if (!isset($this->nm_new_label['saldodocumento_'])) {
          $this->nm_new_label['saldodocumento_'] = "Saldo documento"; } ?>

    <TD class="scFormLabelOddMult css_saldodocumento__label" id="hidden_field_label_saldodocumento_" style="<?php echo $sStyleHidden_saldodocumento_; ?>" > <?php echo $this->nm_new_label['saldodocumento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['montocan_']) && $this->nmgp_cmp_hidden['montocan_'] == 'off') { $sStyleHidden_montocan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['montocan_']) || $this->nmgp_cmp_hidden['montocan_'] == 'on') {
      if (!isset($this->nm_new_label['montocan_'])) {
          $this->nm_new_label['montocan_'] = "Valor Pagado"; } ?>

    <TD class="scFormLabelOddMult css_montocan__label" id="hidden_field_label_montocan_" style="<?php echo $sStyleHidden_montocan_; ?>" > <?php echo $this->nm_new_label['montocan_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_base_']) && $this->nmgp_cmp_hidden['valor_base_'] == 'off') { $sStyleHidden_valor_base_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valor_base_']) || $this->nmgp_cmp_hidden['valor_base_'] == 'on') {
      if (!isset($this->nm_new_label['valor_base_'])) {
          $this->nm_new_label['valor_base_'] = "Base"; } ?>

    <TD class="scFormLabelOddMult css_valor_base__label" id="hidden_field_label_valor_base_" style="<?php echo $sStyleHidden_valor_base_; ?>" > <?php echo $this->nm_new_label['valor_base_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_iva_']) && $this->nmgp_cmp_hidden['valor_iva_'] == 'off') { $sStyleHidden_valor_iva_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valor_iva_']) || $this->nmgp_cmp_hidden['valor_iva_'] == 'on') {
      if (!isset($this->nm_new_label['valor_iva_'])) {
          $this->nm_new_label['valor_iva_'] = "IVA"; } ?>

    <TD class="scFormLabelOddMult css_valor_iva__label" id="hidden_field_label_valor_iva_" style="<?php echo $sStyleHidden_valor_iva_; ?>" > <?php echo $this->nm_new_label['valor_iva_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valpagar_']) && $this->nmgp_cmp_hidden['valpagar_'] == 'off') { $sStyleHidden_valpagar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valpagar_']) || $this->nmgp_cmp_hidden['valpagar_'] == 'on') {
      if (!isset($this->nm_new_label['valpagar_'])) {
          $this->nm_new_label['valpagar_'] = "Valor a Pagar"; } ?>

    <TD class="scFormLabelOddMult css_valpagar__label" id="hidden_field_label_valpagar_" style="<?php echo $sStyleHidden_valpagar_; ?>" > <?php echo $this->nm_new_label['valpagar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porc_ret_']) && $this->nmgp_cmp_hidden['porc_ret_'] == 'off') { $sStyleHidden_porc_ret_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porc_ret_']) || $this->nmgp_cmp_hidden['porc_ret_'] == 'on') {
      if (!isset($this->nm_new_label['porc_ret_'])) {
          $this->nm_new_label['porc_ret_'] = "Retención %"; } ?>

    <TD class="scFormLabelOddMult css_porc_ret__label" id="hidden_field_label_porc_ret_" style="<?php echo $sStyleHidden_porc_ret_; ?>" > <?php echo $this->nm_new_label['porc_ret_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ret_']) && $this->nmgp_cmp_hidden['ret_'] == 'off') { $sStyleHidden_ret_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ret_']) || $this->nmgp_cmp_hidden['ret_'] == 'on') {
      if (!isset($this->nm_new_label['ret_'])) {
          $this->nm_new_label['ret_'] = "Valor Retención"; } ?>

    <TD class="scFormLabelOddMult css_ret__label" id="hidden_field_label_ret_" style="<?php echo $sStyleHidden_ret_; ?>" > <?php echo $this->nm_new_label['ret_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porc_ica_']) && $this->nmgp_cmp_hidden['porc_ica_'] == 'off') { $sStyleHidden_porc_ica_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porc_ica_']) || $this->nmgp_cmp_hidden['porc_ica_'] == 'on') {
      if (!isset($this->nm_new_label['porc_ica_'])) {
          $this->nm_new_label['porc_ica_'] = "ICA %"; } ?>

    <TD class="scFormLabelOddMult css_porc_ica__label" id="hidden_field_label_porc_ica_" style="<?php echo $sStyleHidden_porc_ica_; ?>" > <?php echo $this->nm_new_label['porc_ica_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['val_ica_']) && $this->nmgp_cmp_hidden['val_ica_'] == 'off') { $sStyleHidden_val_ica_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['val_ica_']) || $this->nmgp_cmp_hidden['val_ica_'] == 'on') {
      if (!isset($this->nm_new_label['val_ica_'])) {
          $this->nm_new_label['val_ica_'] = "Valor retención ICA"; } ?>

    <TD class="scFormLabelOddMult css_val_ica__label" id="hidden_field_label_val_ica_" style="<?php echo $sStyleHidden_val_ica_; ?>" > <?php echo $this->nm_new_label['val_ica_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['porc_reteiva_']) && $this->nmgp_cmp_hidden['porc_reteiva_'] == 'off') { $sStyleHidden_porc_reteiva_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['porc_reteiva_']) || $this->nmgp_cmp_hidden['porc_reteiva_'] == 'on') {
      if (!isset($this->nm_new_label['porc_reteiva_'])) {
          $this->nm_new_label['porc_reteiva_'] = "Rete IVA %"; } ?>

    <TD class="scFormLabelOddMult css_porc_reteiva__label" id="hidden_field_label_porc_reteiva_" style="<?php echo $sStyleHidden_porc_reteiva_; ?>" > <?php echo $this->nm_new_label['porc_reteiva_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['val_reteiva_']) && $this->nmgp_cmp_hidden['val_reteiva_'] == 'off') { $sStyleHidden_val_reteiva_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['val_reteiva_']) || $this->nmgp_cmp_hidden['val_reteiva_'] == 'on') {
      if (!isset($this->nm_new_label['val_reteiva_'])) {
          $this->nm_new_label['val_reteiva_'] = "Valor Rete IVA"; } ?>

    <TD class="scFormLabelOddMult css_val_reteiva__label" id="hidden_field_label_val_reteiva_" style="<?php echo $sStyleHidden_val_reteiva_; ?>" > <?php echo $this->nm_new_label['val_reteiva_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descuent_']) && $this->nmgp_cmp_hidden['descuent_'] == 'off') { $sStyleHidden_descuent_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descuent_']) || $this->nmgp_cmp_hidden['descuent_'] == 'on') {
      if (!isset($this->nm_new_label['descuent_'])) {
          $this->nm_new_label['descuent_'] = "Descuento"; } ?>

    <TD class="scFormLabelOddMult css_descuent__label" id="hidden_field_label_descuent_" style="<?php echo $sStyleHidden_descuent_; ?>" > <?php echo $this->nm_new_label['descuent_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_concepto_']) && $this->nmgp_cmp_hidden['id_concepto_'] == 'off') { $sStyleHidden_id_concepto_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_concepto_']) || $this->nmgp_cmp_hidden['id_concepto_'] == 'on') {
      if (!isset($this->nm_new_label['id_concepto_'])) {
          $this->nm_new_label['id_concepto_'] = "Código Concepto"; } ?>

    <TD class="scFormLabelOddMult css_id_concepto__label" id="hidden_field_label_id_concepto_" style="<?php echo $sStyleHidden_id_concepto_; ?>" > <?php echo $this->nm_new_label['id_concepto_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['conc_']) && $this->nmgp_cmp_hidden['conc_'] == 'off') { $sStyleHidden_conc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['conc_']) || $this->nmgp_cmp_hidden['conc_'] == 'on') {
      if (!isset($this->nm_new_label['conc_'])) {
          $this->nm_new_label['conc_'] = "Concepto"; } ?>

    <TD class="scFormLabelOddMult css_conc__label" id="hidden_field_label_conc_" style="<?php echo $sStyleHidden_conc_; ?>" > <?php echo $this->nm_new_label['conc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sStyleHidden_obs_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['obs_']) || $this->nmgp_cmp_hidden['obs_'] == 'on') {
      if (!isset($this->nm_new_label['obs_'])) {
          $this->nm_new_label['obs_'] = "Observación"; } ?>

    <TD class="scFormLabelOddMult css_obs__label" id="hidden_field_label_obs_" style="<?php echo $sStyleHidden_obs_; ?>" > <?php echo $this->nm_new_label['obs_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_hacerpagos_041119_PENDIENTE);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_hacerpagos_041119_PENDIENTE = $this->form_vert_form_hacerpagos_041119_PENDIENTE;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_hacerpagos_041119_PENDIENTE))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_hacerpagos_041119_PENDIENTE as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idpago_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['idpago_'];
       $this->numpago_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['numpago_'];
       $this->client_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['client_'];
       $this->fecpago_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['fecpago_'];
       $this->iddocapagar_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['iddocapagar_'];
       $this->asent_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['asent_'];
       $this->banco_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['banco_'];
       $this->usuario_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['usuario_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['docapagar_'] = true;
           $this->nmgp_cmp_readonly['saldodocumento_'] = true;
           $this->nmgp_cmp_readonly['montocan_'] = true;
           $this->nmgp_cmp_readonly['valor_base_'] = true;
           $this->nmgp_cmp_readonly['valor_iva_'] = true;
           $this->nmgp_cmp_readonly['valpagar_'] = true;
           $this->nmgp_cmp_readonly['porc_ret_'] = true;
           $this->nmgp_cmp_readonly['ret_'] = true;
           $this->nmgp_cmp_readonly['porc_ica_'] = true;
           $this->nmgp_cmp_readonly['val_ica_'] = true;
           $this->nmgp_cmp_readonly['porc_reteiva_'] = true;
           $this->nmgp_cmp_readonly['val_reteiva_'] = true;
           $this->nmgp_cmp_readonly['descuent_'] = true;
           $this->nmgp_cmp_readonly['id_concepto_'] = true;
           $this->nmgp_cmp_readonly['conc_'] = true;
           $this->nmgp_cmp_readonly['obs_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['docapagar_']) || $this->nmgp_cmp_readonly['docapagar_'] != "on") {$this->nmgp_cmp_readonly['docapagar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['saldodocumento_']) || $this->nmgp_cmp_readonly['saldodocumento_'] != "on") {$this->nmgp_cmp_readonly['saldodocumento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['montocan_']) || $this->nmgp_cmp_readonly['montocan_'] != "on") {$this->nmgp_cmp_readonly['montocan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valor_base_']) || $this->nmgp_cmp_readonly['valor_base_'] != "on") {$this->nmgp_cmp_readonly['valor_base_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valor_iva_']) || $this->nmgp_cmp_readonly['valor_iva_'] != "on") {$this->nmgp_cmp_readonly['valor_iva_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valpagar_']) || $this->nmgp_cmp_readonly['valpagar_'] != "on") {$this->nmgp_cmp_readonly['valpagar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porc_ret_']) || $this->nmgp_cmp_readonly['porc_ret_'] != "on") {$this->nmgp_cmp_readonly['porc_ret_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ret_']) || $this->nmgp_cmp_readonly['ret_'] != "on") {$this->nmgp_cmp_readonly['ret_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porc_ica_']) || $this->nmgp_cmp_readonly['porc_ica_'] != "on") {$this->nmgp_cmp_readonly['porc_ica_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['val_ica_']) || $this->nmgp_cmp_readonly['val_ica_'] != "on") {$this->nmgp_cmp_readonly['val_ica_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['porc_reteiva_']) || $this->nmgp_cmp_readonly['porc_reteiva_'] != "on") {$this->nmgp_cmp_readonly['porc_reteiva_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['val_reteiva_']) || $this->nmgp_cmp_readonly['val_reteiva_'] != "on") {$this->nmgp_cmp_readonly['val_reteiva_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descuent_']) || $this->nmgp_cmp_readonly['descuent_'] != "on") {$this->nmgp_cmp_readonly['descuent_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_concepto_']) || $this->nmgp_cmp_readonly['id_concepto_'] != "on") {$this->nmgp_cmp_readonly['id_concepto_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['conc_']) || $this->nmgp_cmp_readonly['conc_'] != "on") {$this->nmgp_cmp_readonly['conc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['obs_']) || $this->nmgp_cmp_readonly['obs_'] != "on") {$this->nmgp_cmp_readonly['obs_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->docapagar_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['docapagar_']; 
       $docapagar_ = $this->docapagar_; 
       $sStyleHidden_docapagar_ = '';
       if (isset($sCheckRead_docapagar_))
       {
           unset($sCheckRead_docapagar_);
       }
       if (isset($this->nmgp_cmp_readonly['docapagar_']))
       {
           $sCheckRead_docapagar_ = $this->nmgp_cmp_readonly['docapagar_'];
       }
       if (isset($this->nmgp_cmp_hidden['docapagar_']) && $this->nmgp_cmp_hidden['docapagar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['docapagar_']);
           $sStyleHidden_docapagar_ = 'display: none;';
       }
       $bTestReadOnly_docapagar_ = true;
       $sStyleReadLab_docapagar_ = 'display: none;';
       $sStyleReadInp_docapagar_ = '';
       if (isset($this->nmgp_cmp_readonly['docapagar_']) && $this->nmgp_cmp_readonly['docapagar_'] == 'on')
       {
           $bTestReadOnly_docapagar_ = false;
           unset($this->nmgp_cmp_readonly['docapagar_']);
           $sStyleReadLab_docapagar_ = '';
           $sStyleReadInp_docapagar_ = 'display: none;';
       }
       $this->saldodocumento_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['saldodocumento_']; 
       $saldodocumento_ = $this->saldodocumento_; 
       $sStyleHidden_saldodocumento_ = '';
       if (isset($sCheckRead_saldodocumento_))
       {
           unset($sCheckRead_saldodocumento_);
       }
       if (isset($this->nmgp_cmp_readonly['saldodocumento_']))
       {
           $sCheckRead_saldodocumento_ = $this->nmgp_cmp_readonly['saldodocumento_'];
       }
       if (isset($this->nmgp_cmp_hidden['saldodocumento_']) && $this->nmgp_cmp_hidden['saldodocumento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['saldodocumento_']);
           $sStyleHidden_saldodocumento_ = 'display: none;';
       }
       $bTestReadOnly_saldodocumento_ = true;
       $sStyleReadLab_saldodocumento_ = 'display: none;';
       $sStyleReadInp_saldodocumento_ = '';
       if (isset($this->nmgp_cmp_readonly['saldodocumento_']) && $this->nmgp_cmp_readonly['saldodocumento_'] == 'on')
       {
           $bTestReadOnly_saldodocumento_ = false;
           unset($this->nmgp_cmp_readonly['saldodocumento_']);
           $sStyleReadLab_saldodocumento_ = '';
           $sStyleReadInp_saldodocumento_ = 'display: none;';
       }
       $this->montocan_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['montocan_']; 
       $montocan_ = $this->montocan_; 
       $sStyleHidden_montocan_ = '';
       if (isset($sCheckRead_montocan_))
       {
           unset($sCheckRead_montocan_);
       }
       if (isset($this->nmgp_cmp_readonly['montocan_']))
       {
           $sCheckRead_montocan_ = $this->nmgp_cmp_readonly['montocan_'];
       }
       if (isset($this->nmgp_cmp_hidden['montocan_']) && $this->nmgp_cmp_hidden['montocan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['montocan_']);
           $sStyleHidden_montocan_ = 'display: none;';
       }
       $bTestReadOnly_montocan_ = true;
       $sStyleReadLab_montocan_ = 'display: none;';
       $sStyleReadInp_montocan_ = '';
       if (isset($this->nmgp_cmp_readonly['montocan_']) && $this->nmgp_cmp_readonly['montocan_'] == 'on')
       {
           $bTestReadOnly_montocan_ = false;
           unset($this->nmgp_cmp_readonly['montocan_']);
           $sStyleReadLab_montocan_ = '';
           $sStyleReadInp_montocan_ = 'display: none;';
       }
       $this->valor_base_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['valor_base_']; 
       $valor_base_ = $this->valor_base_; 
       $sStyleHidden_valor_base_ = '';
       if (isset($sCheckRead_valor_base_))
       {
           unset($sCheckRead_valor_base_);
       }
       if (isset($this->nmgp_cmp_readonly['valor_base_']))
       {
           $sCheckRead_valor_base_ = $this->nmgp_cmp_readonly['valor_base_'];
       }
       if (isset($this->nmgp_cmp_hidden['valor_base_']) && $this->nmgp_cmp_hidden['valor_base_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valor_base_']);
           $sStyleHidden_valor_base_ = 'display: none;';
       }
       $bTestReadOnly_valor_base_ = true;
       $sStyleReadLab_valor_base_ = 'display: none;';
       $sStyleReadInp_valor_base_ = '';
       if (isset($this->nmgp_cmp_readonly['valor_base_']) && $this->nmgp_cmp_readonly['valor_base_'] == 'on')
       {
           $bTestReadOnly_valor_base_ = false;
           unset($this->nmgp_cmp_readonly['valor_base_']);
           $sStyleReadLab_valor_base_ = '';
           $sStyleReadInp_valor_base_ = 'display: none;';
       }
       $this->valor_iva_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['valor_iva_']; 
       $valor_iva_ = $this->valor_iva_; 
       $sStyleHidden_valor_iva_ = '';
       if (isset($sCheckRead_valor_iva_))
       {
           unset($sCheckRead_valor_iva_);
       }
       if (isset($this->nmgp_cmp_readonly['valor_iva_']))
       {
           $sCheckRead_valor_iva_ = $this->nmgp_cmp_readonly['valor_iva_'];
       }
       if (isset($this->nmgp_cmp_hidden['valor_iva_']) && $this->nmgp_cmp_hidden['valor_iva_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valor_iva_']);
           $sStyleHidden_valor_iva_ = 'display: none;';
       }
       $bTestReadOnly_valor_iva_ = true;
       $sStyleReadLab_valor_iva_ = 'display: none;';
       $sStyleReadInp_valor_iva_ = '';
       if (isset($this->nmgp_cmp_readonly['valor_iva_']) && $this->nmgp_cmp_readonly['valor_iva_'] == 'on')
       {
           $bTestReadOnly_valor_iva_ = false;
           unset($this->nmgp_cmp_readonly['valor_iva_']);
           $sStyleReadLab_valor_iva_ = '';
           $sStyleReadInp_valor_iva_ = 'display: none;';
       }
       $this->valpagar_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['valpagar_']; 
       $valpagar_ = $this->valpagar_; 
       $sStyleHidden_valpagar_ = '';
       if (isset($sCheckRead_valpagar_))
       {
           unset($sCheckRead_valpagar_);
       }
       if (isset($this->nmgp_cmp_readonly['valpagar_']))
       {
           $sCheckRead_valpagar_ = $this->nmgp_cmp_readonly['valpagar_'];
       }
       if (isset($this->nmgp_cmp_hidden['valpagar_']) && $this->nmgp_cmp_hidden['valpagar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valpagar_']);
           $sStyleHidden_valpagar_ = 'display: none;';
       }
       $bTestReadOnly_valpagar_ = true;
       $sStyleReadLab_valpagar_ = 'display: none;';
       $sStyleReadInp_valpagar_ = '';
       if (isset($this->nmgp_cmp_readonly['valpagar_']) && $this->nmgp_cmp_readonly['valpagar_'] == 'on')
       {
           $bTestReadOnly_valpagar_ = false;
           unset($this->nmgp_cmp_readonly['valpagar_']);
           $sStyleReadLab_valpagar_ = '';
           $sStyleReadInp_valpagar_ = 'display: none;';
       }
       $this->porc_ret_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['porc_ret_']; 
       $porc_ret_ = $this->porc_ret_; 
       $sStyleHidden_porc_ret_ = '';
       if (isset($sCheckRead_porc_ret_))
       {
           unset($sCheckRead_porc_ret_);
       }
       if (isset($this->nmgp_cmp_readonly['porc_ret_']))
       {
           $sCheckRead_porc_ret_ = $this->nmgp_cmp_readonly['porc_ret_'];
       }
       if (isset($this->nmgp_cmp_hidden['porc_ret_']) && $this->nmgp_cmp_hidden['porc_ret_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porc_ret_']);
           $sStyleHidden_porc_ret_ = 'display: none;';
       }
       $bTestReadOnly_porc_ret_ = true;
       $sStyleReadLab_porc_ret_ = 'display: none;';
       $sStyleReadInp_porc_ret_ = '';
       if (isset($this->nmgp_cmp_readonly['porc_ret_']) && $this->nmgp_cmp_readonly['porc_ret_'] == 'on')
       {
           $bTestReadOnly_porc_ret_ = false;
           unset($this->nmgp_cmp_readonly['porc_ret_']);
           $sStyleReadLab_porc_ret_ = '';
           $sStyleReadInp_porc_ret_ = 'display: none;';
       }
       $this->ret_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['ret_']; 
       $ret_ = $this->ret_; 
       $sStyleHidden_ret_ = '';
       if (isset($sCheckRead_ret_))
       {
           unset($sCheckRead_ret_);
       }
       if (isset($this->nmgp_cmp_readonly['ret_']))
       {
           $sCheckRead_ret_ = $this->nmgp_cmp_readonly['ret_'];
       }
       if (isset($this->nmgp_cmp_hidden['ret_']) && $this->nmgp_cmp_hidden['ret_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ret_']);
           $sStyleHidden_ret_ = 'display: none;';
       }
       $bTestReadOnly_ret_ = true;
       $sStyleReadLab_ret_ = 'display: none;';
       $sStyleReadInp_ret_ = '';
       if (isset($this->nmgp_cmp_readonly['ret_']) && $this->nmgp_cmp_readonly['ret_'] == 'on')
       {
           $bTestReadOnly_ret_ = false;
           unset($this->nmgp_cmp_readonly['ret_']);
           $sStyleReadLab_ret_ = '';
           $sStyleReadInp_ret_ = 'display: none;';
       }
       $this->porc_ica_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['porc_ica_']; 
       $porc_ica_ = $this->porc_ica_; 
       $sStyleHidden_porc_ica_ = '';
       if (isset($sCheckRead_porc_ica_))
       {
           unset($sCheckRead_porc_ica_);
       }
       if (isset($this->nmgp_cmp_readonly['porc_ica_']))
       {
           $sCheckRead_porc_ica_ = $this->nmgp_cmp_readonly['porc_ica_'];
       }
       if (isset($this->nmgp_cmp_hidden['porc_ica_']) && $this->nmgp_cmp_hidden['porc_ica_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porc_ica_']);
           $sStyleHidden_porc_ica_ = 'display: none;';
       }
       $bTestReadOnly_porc_ica_ = true;
       $sStyleReadLab_porc_ica_ = 'display: none;';
       $sStyleReadInp_porc_ica_ = '';
       if (isset($this->nmgp_cmp_readonly['porc_ica_']) && $this->nmgp_cmp_readonly['porc_ica_'] == 'on')
       {
           $bTestReadOnly_porc_ica_ = false;
           unset($this->nmgp_cmp_readonly['porc_ica_']);
           $sStyleReadLab_porc_ica_ = '';
           $sStyleReadInp_porc_ica_ = 'display: none;';
       }
       $this->val_ica_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['val_ica_']; 
       $val_ica_ = $this->val_ica_; 
       $sStyleHidden_val_ica_ = '';
       if (isset($sCheckRead_val_ica_))
       {
           unset($sCheckRead_val_ica_);
       }
       if (isset($this->nmgp_cmp_readonly['val_ica_']))
       {
           $sCheckRead_val_ica_ = $this->nmgp_cmp_readonly['val_ica_'];
       }
       if (isset($this->nmgp_cmp_hidden['val_ica_']) && $this->nmgp_cmp_hidden['val_ica_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['val_ica_']);
           $sStyleHidden_val_ica_ = 'display: none;';
       }
       $bTestReadOnly_val_ica_ = true;
       $sStyleReadLab_val_ica_ = 'display: none;';
       $sStyleReadInp_val_ica_ = '';
       if (isset($this->nmgp_cmp_readonly['val_ica_']) && $this->nmgp_cmp_readonly['val_ica_'] == 'on')
       {
           $bTestReadOnly_val_ica_ = false;
           unset($this->nmgp_cmp_readonly['val_ica_']);
           $sStyleReadLab_val_ica_ = '';
           $sStyleReadInp_val_ica_ = 'display: none;';
       }
       $this->porc_reteiva_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['porc_reteiva_']; 
       $porc_reteiva_ = $this->porc_reteiva_; 
       $sStyleHidden_porc_reteiva_ = '';
       if (isset($sCheckRead_porc_reteiva_))
       {
           unset($sCheckRead_porc_reteiva_);
       }
       if (isset($this->nmgp_cmp_readonly['porc_reteiva_']))
       {
           $sCheckRead_porc_reteiva_ = $this->nmgp_cmp_readonly['porc_reteiva_'];
       }
       if (isset($this->nmgp_cmp_hidden['porc_reteiva_']) && $this->nmgp_cmp_hidden['porc_reteiva_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['porc_reteiva_']);
           $sStyleHidden_porc_reteiva_ = 'display: none;';
       }
       $bTestReadOnly_porc_reteiva_ = true;
       $sStyleReadLab_porc_reteiva_ = 'display: none;';
       $sStyleReadInp_porc_reteiva_ = '';
       if (isset($this->nmgp_cmp_readonly['porc_reteiva_']) && $this->nmgp_cmp_readonly['porc_reteiva_'] == 'on')
       {
           $bTestReadOnly_porc_reteiva_ = false;
           unset($this->nmgp_cmp_readonly['porc_reteiva_']);
           $sStyleReadLab_porc_reteiva_ = '';
           $sStyleReadInp_porc_reteiva_ = 'display: none;';
       }
       $this->val_reteiva_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['val_reteiva_']; 
       $val_reteiva_ = $this->val_reteiva_; 
       $sStyleHidden_val_reteiva_ = '';
       if (isset($sCheckRead_val_reteiva_))
       {
           unset($sCheckRead_val_reteiva_);
       }
       if (isset($this->nmgp_cmp_readonly['val_reteiva_']))
       {
           $sCheckRead_val_reteiva_ = $this->nmgp_cmp_readonly['val_reteiva_'];
       }
       if (isset($this->nmgp_cmp_hidden['val_reteiva_']) && $this->nmgp_cmp_hidden['val_reteiva_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['val_reteiva_']);
           $sStyleHidden_val_reteiva_ = 'display: none;';
       }
       $bTestReadOnly_val_reteiva_ = true;
       $sStyleReadLab_val_reteiva_ = 'display: none;';
       $sStyleReadInp_val_reteiva_ = '';
       if (isset($this->nmgp_cmp_readonly['val_reteiva_']) && $this->nmgp_cmp_readonly['val_reteiva_'] == 'on')
       {
           $bTestReadOnly_val_reteiva_ = false;
           unset($this->nmgp_cmp_readonly['val_reteiva_']);
           $sStyleReadLab_val_reteiva_ = '';
           $sStyleReadInp_val_reteiva_ = 'display: none;';
       }
       $this->descuent_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['descuent_']; 
       $descuent_ = $this->descuent_; 
       $sStyleHidden_descuent_ = '';
       if (isset($sCheckRead_descuent_))
       {
           unset($sCheckRead_descuent_);
       }
       if (isset($this->nmgp_cmp_readonly['descuent_']))
       {
           $sCheckRead_descuent_ = $this->nmgp_cmp_readonly['descuent_'];
       }
       if (isset($this->nmgp_cmp_hidden['descuent_']) && $this->nmgp_cmp_hidden['descuent_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['descuent_']);
           $sStyleHidden_descuent_ = 'display: none;';
       }
       $bTestReadOnly_descuent_ = true;
       $sStyleReadLab_descuent_ = 'display: none;';
       $sStyleReadInp_descuent_ = '';
       if (isset($this->nmgp_cmp_readonly['descuent_']) && $this->nmgp_cmp_readonly['descuent_'] == 'on')
       {
           $bTestReadOnly_descuent_ = false;
           unset($this->nmgp_cmp_readonly['descuent_']);
           $sStyleReadLab_descuent_ = '';
           $sStyleReadInp_descuent_ = 'display: none;';
       }
       $this->id_concepto_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['id_concepto_']; 
       $id_concepto_ = $this->id_concepto_; 
       $sStyleHidden_id_concepto_ = '';
       if (isset($sCheckRead_id_concepto_))
       {
           unset($sCheckRead_id_concepto_);
       }
       if (isset($this->nmgp_cmp_readonly['id_concepto_']))
       {
           $sCheckRead_id_concepto_ = $this->nmgp_cmp_readonly['id_concepto_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_concepto_']) && $this->nmgp_cmp_hidden['id_concepto_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_concepto_']);
           $sStyleHidden_id_concepto_ = 'display: none;';
       }
       $bTestReadOnly_id_concepto_ = true;
       $sStyleReadLab_id_concepto_ = 'display: none;';
       $sStyleReadInp_id_concepto_ = '';
       if (isset($this->nmgp_cmp_readonly['id_concepto_']) && $this->nmgp_cmp_readonly['id_concepto_'] == 'on')
       {
           $bTestReadOnly_id_concepto_ = false;
           unset($this->nmgp_cmp_readonly['id_concepto_']);
           $sStyleReadLab_id_concepto_ = '';
           $sStyleReadInp_id_concepto_ = 'display: none;';
       }
       $this->conc_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['conc_']; 
       $conc_ = $this->conc_; 
       $conc__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $conc_);
       $conc__val = $conc__tmp;
       $sStyleHidden_conc_ = '';
       if (isset($sCheckRead_conc_))
       {
           unset($sCheckRead_conc_);
       }
       if (isset($this->nmgp_cmp_readonly['conc_']))
       {
           $sCheckRead_conc_ = $this->nmgp_cmp_readonly['conc_'];
       }
       if (isset($this->nmgp_cmp_hidden['conc_']) && $this->nmgp_cmp_hidden['conc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['conc_']);
           $sStyleHidden_conc_ = 'display: none;';
       }
       $bTestReadOnly_conc_ = true;
       $sStyleReadLab_conc_ = 'display: none;';
       $sStyleReadInp_conc_ = '';
       if (isset($this->nmgp_cmp_readonly['conc_']) && $this->nmgp_cmp_readonly['conc_'] == 'on')
       {
           $bTestReadOnly_conc_ = false;
           unset($this->nmgp_cmp_readonly['conc_']);
           $sStyleReadLab_conc_ = '';
           $sStyleReadInp_conc_ = 'display: none;';
       }
       $this->obs_ = $this->form_vert_form_hacerpagos_041119_PENDIENTE[$sc_seq_vert]['obs_']; 
       $obs_ = $this->obs_; 
       $obs__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $obs_);
       $obs__val = $obs__tmp;
       $sStyleHidden_obs_ = '';
       if (isset($sCheckRead_obs_))
       {
           unset($sCheckRead_obs_);
       }
       if (isset($this->nmgp_cmp_readonly['obs_']))
       {
           $sCheckRead_obs_ = $this->nmgp_cmp_readonly['obs_'];
       }
       if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['obs_']);
           $sStyleHidden_obs_ = 'display: none;';
       }
       $bTestReadOnly_obs_ = true;
       $sStyleReadLab_obs_ = 'display: none;';
       $sStyleReadInp_obs_ = '';
       if (isset($this->nmgp_cmp_readonly['obs_']) && $this->nmgp_cmp_readonly['obs_'] == 'on')
       {
           $bTestReadOnly_obs_ = false;
           unset($this->nmgp_cmp_readonly['obs_']);
           $sStyleReadLab_obs_ = '';
           $sStyleReadInp_obs_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: true}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: true}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_hacerpagos_041119_PENDIENTE_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_hacerpagos_041119_PENDIENTE_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_hacerpagos_041119_PENDIENTE_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_hacerpagos_041119_PENDIENTE_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_hacerpagos_041119_PENDIENTE_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_hacerpagos_041119_PENDIENTE_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['docapagar_']) && $this->nmgp_cmp_hidden['docapagar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="docapagar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($docapagar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_docapagar__line" id="hidden_field_data_docapagar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_docapagar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_docapagar__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="docapagar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($docapagar_); ?>"><span id="id_ajax_label_docapagar_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($docapagar_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_docapagar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_docapagar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['saldodocumento_']) && $this->nmgp_cmp_hidden['saldodocumento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldodocumento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldodocumento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_saldodocumento__line" id="hidden_field_data_saldodocumento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_saldodocumento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_saldodocumento__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="saldodocumento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldodocumento_); ?>"><span id="id_ajax_label_saldodocumento_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($saldodocumento_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldodocumento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldodocumento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['montocan_']) && $this->nmgp_cmp_hidden['montocan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="montocan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($montocan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_montocan__line" id="hidden_field_data_montocan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_montocan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_montocan__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="montocan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($montocan_); ?>"><span id="id_ajax_label_montocan_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($montocan_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_montocan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_montocan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_base_']) && $this->nmgp_cmp_hidden['valor_base_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_base_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_base_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valor_base__line" id="hidden_field_data_valor_base_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valor_base_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valor_base__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="valor_base_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_base_); ?>"><span id="id_ajax_label_valor_base_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($valor_base_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_base_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_base_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_iva_']) && $this->nmgp_cmp_hidden['valor_iva_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_iva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_iva_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valor_iva__line" id="hidden_field_data_valor_iva_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valor_iva_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valor_iva__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="valor_iva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_iva_); ?>"><span id="id_ajax_label_valor_iva_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($valor_iva_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_iva_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_iva_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valpagar_']) && $this->nmgp_cmp_hidden['valpagar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valpagar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valpagar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valpagar__line" id="hidden_field_data_valpagar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valpagar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valpagar__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="valpagar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valpagar_); ?>"><span id="id_ajax_label_valpagar_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($valpagar_); ?></span>
<span class="scFormPopupBubble<?php echo $sc_seq_vert; ?>" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Si el pago es sobre una compra, y es solo un abono, se recomienda dejar las tasas de retenciones que trae de la factura, pero colocar los valores (Valor retención, valor retenido ICA, Valor rete IVA y Descuento) en 0.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Si el pago es sobre una compra, y es solo un abono, se recomienda dejar las tasas de retenciones que trae de la factura, pero colocar los valores (Valor retención, valor retenido ICA, Valor rete IVA y Descuento) en 0.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valpagar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valpagar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porc_ret_']) && $this->nmgp_cmp_hidden['porc_ret_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="porc_ret_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->porc_ret_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porc_ret__line" id="hidden_field_data_porc_ret_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porc_ret_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porc_ret__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porc_ret_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_ret_"]) &&  $this->nmgp_cmp_readonly["porc_ret_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_'] = array(); 
    }

   $old_value_saldodocumento_ = $this->saldodocumento_;
   $old_value_montocan_ = $this->montocan_;
   $old_value_valor_base_ = $this->valor_base_;
   $old_value_valor_iva_ = $this->valor_iva_;
   $old_value_valpagar_ = $this->valpagar_;
   $old_value_ret_ = $this->ret_;
   $old_value_val_ica_ = $this->val_ica_;
   $old_value_porc_reteiva_ = $this->porc_reteiva_;
   $old_value_val_reteiva_ = $this->val_reteiva_;
   $old_value_descuent_ = $this->descuent_;
   $this->nm_tira_formatacao();


   $unformatted_value_saldodocumento_ = $this->saldodocumento_;
   $unformatted_value_montocan_ = $this->montocan_;
   $unformatted_value_valor_base_ = $this->valor_base_;
   $unformatted_value_valor_iva_ = $this->valor_iva_;
   $unformatted_value_valpagar_ = $this->valpagar_;
   $unformatted_value_ret_ = $this->ret_;
   $unformatted_value_val_ica_ = $this->val_ica_;
   $unformatted_value_porc_reteiva_ = $this->porc_reteiva_;
   $unformatted_value_val_reteiva_ = $this->val_reteiva_;
   $unformatted_value_descuent_ = $this->descuent_;

   $nm_comando = "SELECT porrete FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->saldodocumento_ = $old_value_saldodocumento_;
   $this->montocan_ = $old_value_montocan_;
   $this->valor_base_ = $old_value_valor_base_;
   $this->valor_iva_ = $old_value_valor_iva_;
   $this->valpagar_ = $old_value_valpagar_;
   $this->ret_ = $old_value_ret_;
   $this->val_ica_ = $old_value_val_ica_;
   $this->porc_reteiva_ = $old_value_porc_reteiva_;
   $this->val_reteiva_ = $old_value_val_reteiva_;
   $this->descuent_ = $old_value_descuent_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_'][] = $rs->fields[0];
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
   $x = 0; 
   $porc_ret__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ret__1))
          {
              foreach ($this->porc_ret__1 as $tmp_porc_ret_)
              {
                  if (trim($tmp_porc_ret_) === trim($cadaselect[1])) { $porc_ret__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ret_) === trim($cadaselect[1])) { $porc_ret__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="porc_ret_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porc_ret_) . "\">" . $porc_ret__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_porc_ret_();
   $x = 0 ; 
   $porc_ret__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ret__1))
          {
              foreach ($this->porc_ret__1 as $tmp_porc_ret_)
              {
                  if (trim($tmp_porc_ret_) === trim($cadaselect[1])) { $porc_ret__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ret_) === trim($cadaselect[1])) { $porc_ret__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($porc_ret__look))
          {
              $porc_ret__look = $this->porc_ret_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_porc_ret_" . $sc_seq_vert . "\" class=\"css_porc_ret__line\" style=\"" .  $sStyleReadLab_porc_ret_ . "\">" . $this->form_format_readonly("porc_ret_", $this->form_encode_input($porc_ret__look)) . "</span><span id=\"id_read_off_porc_ret_" . $sc_seq_vert . "\" class=\"css_read_off_porc_ret_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_porc_ret_ . "\">";
   echo " <span id=\"idAjaxSelect_porc_ret_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_porc_ret__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_porc_ret_" . $sc_seq_vert . "\" name=\"porc_ret_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ret_'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->porc_ret_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->porc_ret_)) 
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
   if (isset($this->Ini->sc_lig_md5["form_tiporetefuente"]) && $this->Ini->sc_lig_md5["form_tiporetefuente"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_041119_PENDIENTE_lkpedt_refresh_porc_ret_*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_041119_PENDIENTE@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_041119_PENDIENTE_lkpedt_refresh_porc_ret_*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_porc_ret_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tiporetefuente_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_041119_PENDIENTE&KeepThis=true&TB_iframe=true&height=450&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_ret_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_ret_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ret_']) && $this->nmgp_cmp_hidden['ret_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ret_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ret_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ret__line" id="hidden_field_data_ret_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ret_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ret__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ret_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ret_"]) &&  $this->nmgp_cmp_readonly["ret_"] == "on") { 

 ?>
<input type="hidden" name="ret_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ret_) . "\">" . $ret_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ret_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ret_<?php echo $sc_seq_vert ?> css_ret__line" style="<?php echo $sStyleReadLab_ret_; ?>"><?php echo $this->form_format_readonly("ret_", $this->form_encode_input($this->ret_)); ?></span><span id="id_read_off_ret_<?php echo $sc_seq_vert ?>" class="css_read_off_ret_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ret_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ret__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ret_<?php echo $sc_seq_vert ?>" type=text name="ret_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ret_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['ret_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['ret_']['format_pos'] || 3 == $this->field_config['ret_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ret_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ret_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ret_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ret_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ret_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ret_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porc_ica_']) && $this->nmgp_cmp_hidden['porc_ica_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="porc_ica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->porc_ica_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porc_ica__line" id="hidden_field_data_porc_ica_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porc_ica_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porc_ica__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porc_ica_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_ica_"]) &&  $this->nmgp_cmp_readonly["porc_ica_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_'] = array(); 
    }

   $old_value_saldodocumento_ = $this->saldodocumento_;
   $old_value_montocan_ = $this->montocan_;
   $old_value_valor_base_ = $this->valor_base_;
   $old_value_valor_iva_ = $this->valor_iva_;
   $old_value_valpagar_ = $this->valpagar_;
   $old_value_ret_ = $this->ret_;
   $old_value_val_ica_ = $this->val_ica_;
   $old_value_porc_reteiva_ = $this->porc_reteiva_;
   $old_value_val_reteiva_ = $this->val_reteiva_;
   $old_value_descuent_ = $this->descuent_;
   $this->nm_tira_formatacao();


   $unformatted_value_saldodocumento_ = $this->saldodocumento_;
   $unformatted_value_montocan_ = $this->montocan_;
   $unformatted_value_valor_base_ = $this->valor_base_;
   $unformatted_value_valor_iva_ = $this->valor_iva_;
   $unformatted_value_valpagar_ = $this->valpagar_;
   $unformatted_value_ret_ = $this->ret_;
   $unformatted_value_val_ica_ = $this->val_ica_;
   $unformatted_value_porc_reteiva_ = $this->porc_reteiva_;
   $unformatted_value_val_reteiva_ = $this->val_reteiva_;
   $unformatted_value_descuent_ = $this->descuent_;

   $nm_comando = "SELECT porcica  FROM tipoica  ORDER BY  id_ica desc";

   $this->saldodocumento_ = $old_value_saldodocumento_;
   $this->montocan_ = $old_value_montocan_;
   $this->valor_base_ = $old_value_valor_base_;
   $this->valor_iva_ = $old_value_valor_iva_;
   $this->valpagar_ = $old_value_valpagar_;
   $this->ret_ = $old_value_ret_;
   $this->val_ica_ = $old_value_val_ica_;
   $this->porc_reteiva_ = $old_value_porc_reteiva_;
   $this->val_reteiva_ = $old_value_val_reteiva_;
   $this->descuent_ = $old_value_descuent_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_'][] = $rs->fields[0];
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
   $x = 0; 
   $porc_ica__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ica__1))
          {
              foreach ($this->porc_ica__1 as $tmp_porc_ica_)
              {
                  if (trim($tmp_porc_ica_) === trim($cadaselect[1])) { $porc_ica__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ica_) === trim($cadaselect[1])) { $porc_ica__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="porc_ica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porc_ica_) . "\">" . $porc_ica__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_porc_ica_();
   $x = 0 ; 
   $porc_ica__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ica__1))
          {
              foreach ($this->porc_ica__1 as $tmp_porc_ica_)
              {
                  if (trim($tmp_porc_ica_) === trim($cadaselect[1])) { $porc_ica__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ica_) === trim($cadaselect[1])) { $porc_ica__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($porc_ica__look))
          {
              $porc_ica__look = $this->porc_ica_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_porc_ica_" . $sc_seq_vert . "\" class=\"css_porc_ica__line\" style=\"" .  $sStyleReadLab_porc_ica_ . "\">" . $this->form_format_readonly("porc_ica_", $this->form_encode_input($porc_ica__look)) . "</span><span id=\"id_read_off_porc_ica_" . $sc_seq_vert . "\" class=\"css_read_off_porc_ica_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_porc_ica_ . "\">";
   echo " <span id=\"idAjaxSelect_porc_ica_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_porc_ica__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_porc_ica_" . $sc_seq_vert . "\" name=\"porc_ica_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_porc_ica_'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->porc_ica_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->porc_ica_)) 
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
   if (isset($this->Ini->sc_lig_md5["form_tipoica"]) && $this->Ini->sc_lig_md5["form_tipoica"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_041119_PENDIENTE_lkpedt_refresh_porc_ica_*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_041119_PENDIENTE@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_041119_PENDIENTE_lkpedt_refresh_porc_ica_*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_porc_ica_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tipoica_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_041119_PENDIENTE&KeepThis=true&TB_iframe=true&height=400&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_ica_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_ica_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['val_ica_']) && $this->nmgp_cmp_hidden['val_ica_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_ica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_ica_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_val_ica__line" id="hidden_field_data_val_ica_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_val_ica_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_val_ica__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_val_ica_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_ica_"]) &&  $this->nmgp_cmp_readonly["val_ica_"] == "on") { 

 ?>
<input type="hidden" name="val_ica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_ica_) . "\">" . $val_ica_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_ica_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-val_ica_<?php echo $sc_seq_vert ?> css_val_ica__line" style="<?php echo $sStyleReadLab_val_ica_; ?>"><?php echo $this->form_format_readonly("val_ica_", $this->form_encode_input($this->val_ica_)); ?></span><span id="id_read_off_val_ica_<?php echo $sc_seq_vert ?>" class="css_read_off_val_ica_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_ica_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_val_ica__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_val_ica_<?php echo $sc_seq_vert ?>" type=text name="val_ica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_ica_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['val_ica_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['val_ica_']['format_pos'] || 3 == $this->field_config['val_ica_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_ica_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_ica_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_ica_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['val_ica_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_ica_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_ica_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['porc_reteiva_']) && $this->nmgp_cmp_hidden['porc_reteiva_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porc_reteiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porc_reteiva_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_porc_reteiva__line" id="hidden_field_data_porc_reteiva_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_porc_reteiva_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_porc_reteiva__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_porc_reteiva_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_reteiva_"]) &&  $this->nmgp_cmp_readonly["porc_reteiva_"] == "on") { 

 ?>
<input type="hidden" name="porc_reteiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porc_reteiva_) . "\">" . $porc_reteiva_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_porc_reteiva_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-porc_reteiva_<?php echo $sc_seq_vert ?> css_porc_reteiva__line" style="<?php echo $sStyleReadLab_porc_reteiva_; ?>"><?php echo $this->form_format_readonly("porc_reteiva_", $this->form_encode_input($this->porc_reteiva_)); ?></span><span id="id_read_off_porc_reteiva_<?php echo $sc_seq_vert ?>" class="css_read_off_porc_reteiva_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porc_reteiva_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_porc_reteiva__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porc_reteiva_<?php echo $sc_seq_vert ?>" type=text name="porc_reteiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($porc_reteiva_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=9"; } ?> alt="{datatype: 'decimal', maxLength: 9, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porc_reteiva_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porc_reteiva_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porc_reteiva_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porc_reteiva_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_reteiva_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_reteiva_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['val_reteiva_']) && $this->nmgp_cmp_hidden['val_reteiva_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_reteiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_reteiva_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_val_reteiva__line" id="hidden_field_data_val_reteiva_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_val_reteiva_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_val_reteiva__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_val_reteiva_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_reteiva_"]) &&  $this->nmgp_cmp_readonly["val_reteiva_"] == "on") { 

 ?>
<input type="hidden" name="val_reteiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_reteiva_) . "\">" . $val_reteiva_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_reteiva_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-val_reteiva_<?php echo $sc_seq_vert ?> css_val_reteiva__line" style="<?php echo $sStyleReadLab_val_reteiva_; ?>"><?php echo $this->form_format_readonly("val_reteiva_", $this->form_encode_input($this->val_reteiva_)); ?></span><span id="id_read_off_val_reteiva_<?php echo $sc_seq_vert ?>" class="css_read_off_val_reteiva_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_reteiva_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_val_reteiva__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_val_reteiva_<?php echo $sc_seq_vert ?>" type=text name="val_reteiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($val_reteiva_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['val_reteiva_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['val_reteiva_']['format_pos'] || 3 == $this->field_config['val_reteiva_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_reteiva_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_reteiva_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_reteiva_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['val_reteiva_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_reteiva_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_reteiva_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descuent_']) && $this->nmgp_cmp_hidden['descuent_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descuent_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuent_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_descuent__line" id="hidden_field_data_descuent_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descuent_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_descuent__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_descuent_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descuent_"]) &&  $this->nmgp_cmp_readonly["descuent_"] == "on") { 

 ?>
<input type="hidden" name="descuent_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuent_) . "\">" . $descuent_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_descuent_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-descuent_<?php echo $sc_seq_vert ?> css_descuent__line" style="<?php echo $sStyleReadLab_descuent_; ?>"><?php echo $this->form_format_readonly("descuent_", $this->form_encode_input($this->descuent_)); ?></span><span id="id_read_off_descuent_<?php echo $sc_seq_vert ?>" class="css_read_off_descuent_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descuent_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_descuent__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descuent_<?php echo $sc_seq_vert ?>" type=text name="descuent_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuent_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['descuent_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['descuent_']['format_pos'] || 3 == $this->field_config['descuent_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descuent_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descuent_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descuent_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descuent_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descuent_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descuent_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_concepto_']) && $this->nmgp_cmp_hidden['id_concepto_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_concepto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_concepto_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_concepto__line" id="hidden_field_data_id_concepto_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_concepto_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_concepto__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_concepto_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_concepto_"]) &&  $this->nmgp_cmp_readonly["id_concepto_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_'] = array(); 
    }

   $old_value_saldodocumento_ = $this->saldodocumento_;
   $old_value_montocan_ = $this->montocan_;
   $old_value_valor_base_ = $this->valor_base_;
   $old_value_valor_iva_ = $this->valor_iva_;
   $old_value_valpagar_ = $this->valpagar_;
   $old_value_ret_ = $this->ret_;
   $old_value_val_ica_ = $this->val_ica_;
   $old_value_porc_reteiva_ = $this->porc_reteiva_;
   $old_value_val_reteiva_ = $this->val_reteiva_;
   $old_value_descuent_ = $this->descuent_;
   $this->nm_tira_formatacao();


   $unformatted_value_saldodocumento_ = $this->saldodocumento_;
   $unformatted_value_montocan_ = $this->montocan_;
   $unformatted_value_valor_base_ = $this->valor_base_;
   $unformatted_value_valor_iva_ = $this->valor_iva_;
   $unformatted_value_valpagar_ = $this->valpagar_;
   $unformatted_value_ret_ = $this->ret_;
   $unformatted_value_val_ica_ = $this->val_ica_;
   $unformatted_value_porc_reteiva_ = $this->porc_reteiva_;
   $unformatted_value_val_reteiva_ = $this->val_reteiva_;
   $unformatted_value_descuent_ = $this->descuent_;

   $nm_comando = "SELECT idpagos_conceptos, codigo  FROM pagos_conceptos where tipodoc like 'CE' ORDER BY codigo";

   $this->saldodocumento_ = $old_value_saldodocumento_;
   $this->montocan_ = $old_value_montocan_;
   $this->valor_base_ = $old_value_valor_base_;
   $this->valor_iva_ = $old_value_valor_iva_;
   $this->valpagar_ = $old_value_valpagar_;
   $this->ret_ = $old_value_ret_;
   $this->val_ica_ = $old_value_val_ica_;
   $this->porc_reteiva_ = $old_value_porc_reteiva_;
   $this->val_reteiva_ = $old_value_val_reteiva_;
   $this->descuent_ = $old_value_descuent_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_'][] = $rs->fields[0];
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
   $id_concepto__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_concepto__1))
          {
              foreach ($this->id_concepto__1 as $tmp_id_concepto_)
              {
                  if (trim($tmp_id_concepto_) === trim($cadaselect[1])) { $id_concepto__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_concepto_) === trim($cadaselect[1])) { $id_concepto__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_concepto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_concepto_) . "\">" . $id_concepto__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_concepto_();
   $x = 0 ; 
   $id_concepto__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_concepto__1))
          {
              foreach ($this->id_concepto__1 as $tmp_id_concepto_)
              {
                  if (trim($tmp_id_concepto_) === trim($cadaselect[1])) { $id_concepto__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_concepto_) === trim($cadaselect[1])) { $id_concepto__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_concepto__look))
          {
              $id_concepto__look = $this->id_concepto_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_concepto_" . $sc_seq_vert . "\" class=\"css_id_concepto__line\" style=\"" .  $sStyleReadLab_id_concepto_ . "\">" . $this->form_format_readonly("id_concepto_", $this->form_encode_input($id_concepto__look)) . "</span><span id=\"id_read_off_id_concepto_" . $sc_seq_vert . "\" class=\"css_read_off_id_concepto_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_concepto_ . "\">";
   echo " <span id=\"idAjaxSelect_id_concepto_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_concepto__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_concepto_" . $sc_seq_vert . "\" name=\"id_concepto_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lookup_id_concepto_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_concepto_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_concepto_)) 
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
   if (isset($this->Ini->sc_lig_md5["form_pagos_conceptos"]) && $this->Ini->sc_lig_md5["form_pagos_conceptos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_041119_PENDIENTE_lkpedt_refresh_id_concepto_*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_041119_PENDIENTE@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_041119_PENDIENTE_lkpedt_refresh_id_concepto_*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_id_concepto_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_pagos_conceptos_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_041119_PENDIENTE&KeepThis=true&TB_iframe=true&height=500&width=900&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_concepto_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_concepto_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['conc_']) && $this->nmgp_cmp_hidden['conc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($conc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_conc__line" id="hidden_field_data_conc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_conc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_conc__line" style="vertical-align: top;padding: 0px">
<?php
$conc__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($conc_));

?>

<?php if ($bTestReadOnly_conc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conc_"]) &&  $this->nmgp_cmp_readonly["conc_"] == "on") { 

 ?>
<input type="hidden" name="conc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($conc_) . "\">" . $conc__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_conc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-conc_<?php echo $sc_seq_vert ?> css_conc__line" style="<?php echo $sStyleReadLab_conc_; ?>"><?php echo $this->form_format_readonly("conc_", $this->form_encode_input($conc__val)); ?></span><span id="id_read_off_conc_<?php echo $sc_seq_vert ?>" class="css_read_off_conc_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conc_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_conc__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="conc_<?php echo $sc_seq_vert ?>" id="id_sc_field_conc_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'PAGO COMPRA, ABONO A FACTURA, ETC', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $conc_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_obs__line" id="hidden_field_data_obs_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_obs_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_obs__line" style="vertical-align: top;padding: 0px">
<?php
$obs__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obs_));

?>

<?php if ($bTestReadOnly_obs_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs_"]) &&  $this->nmgp_cmp_readonly["obs_"] == "on") { 

 ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">" . $obs__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-obs_<?php echo $sc_seq_vert ?> css_obs__line" style="<?php echo $sStyleReadLab_obs_; ?>"><?php echo $this->form_format_readonly("obs_", $this->form_encode_input($obs__val)); ?></span><span id="id_read_off_obs_<?php echo $sc_seq_vert ?>" class="css_read_off_obs_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_obs__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obs_<?php echo $sc_seq_vert ?>" id="id_sc_field_obs_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'COMENTARIOS SOBRE EL PAGO', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obs_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_docapagar_))
       {
           $this->nmgp_cmp_readonly['docapagar_'] = $sCheckRead_docapagar_;
       }
       if ('display: none;' == $sStyleHidden_docapagar_)
       {
           $this->nmgp_cmp_hidden['docapagar_'] = 'off';
       }
       if (isset($sCheckRead_saldodocumento_))
       {
           $this->nmgp_cmp_readonly['saldodocumento_'] = $sCheckRead_saldodocumento_;
       }
       if ('display: none;' == $sStyleHidden_saldodocumento_)
       {
           $this->nmgp_cmp_hidden['saldodocumento_'] = 'off';
       }
       if (isset($sCheckRead_montocan_))
       {
           $this->nmgp_cmp_readonly['montocan_'] = $sCheckRead_montocan_;
       }
       if ('display: none;' == $sStyleHidden_montocan_)
       {
           $this->nmgp_cmp_hidden['montocan_'] = 'off';
       }
       if (isset($sCheckRead_valor_base_))
       {
           $this->nmgp_cmp_readonly['valor_base_'] = $sCheckRead_valor_base_;
       }
       if ('display: none;' == $sStyleHidden_valor_base_)
       {
           $this->nmgp_cmp_hidden['valor_base_'] = 'off';
       }
       if (isset($sCheckRead_valor_iva_))
       {
           $this->nmgp_cmp_readonly['valor_iva_'] = $sCheckRead_valor_iva_;
       }
       if ('display: none;' == $sStyleHidden_valor_iva_)
       {
           $this->nmgp_cmp_hidden['valor_iva_'] = 'off';
       }
       if (isset($sCheckRead_valpagar_))
       {
           $this->nmgp_cmp_readonly['valpagar_'] = $sCheckRead_valpagar_;
       }
       if ('display: none;' == $sStyleHidden_valpagar_)
       {
           $this->nmgp_cmp_hidden['valpagar_'] = 'off';
       }
       if (isset($sCheckRead_porc_ret_))
       {
           $this->nmgp_cmp_readonly['porc_ret_'] = $sCheckRead_porc_ret_;
       }
       if ('display: none;' == $sStyleHidden_porc_ret_)
       {
           $this->nmgp_cmp_hidden['porc_ret_'] = 'off';
       }
       if (isset($sCheckRead_ret_))
       {
           $this->nmgp_cmp_readonly['ret_'] = $sCheckRead_ret_;
       }
       if ('display: none;' == $sStyleHidden_ret_)
       {
           $this->nmgp_cmp_hidden['ret_'] = 'off';
       }
       if (isset($sCheckRead_porc_ica_))
       {
           $this->nmgp_cmp_readonly['porc_ica_'] = $sCheckRead_porc_ica_;
       }
       if ('display: none;' == $sStyleHidden_porc_ica_)
       {
           $this->nmgp_cmp_hidden['porc_ica_'] = 'off';
       }
       if (isset($sCheckRead_val_ica_))
       {
           $this->nmgp_cmp_readonly['val_ica_'] = $sCheckRead_val_ica_;
       }
       if ('display: none;' == $sStyleHidden_val_ica_)
       {
           $this->nmgp_cmp_hidden['val_ica_'] = 'off';
       }
       if (isset($sCheckRead_porc_reteiva_))
       {
           $this->nmgp_cmp_readonly['porc_reteiva_'] = $sCheckRead_porc_reteiva_;
       }
       if ('display: none;' == $sStyleHidden_porc_reteiva_)
       {
           $this->nmgp_cmp_hidden['porc_reteiva_'] = 'off';
       }
       if (isset($sCheckRead_val_reteiva_))
       {
           $this->nmgp_cmp_readonly['val_reteiva_'] = $sCheckRead_val_reteiva_;
       }
       if ('display: none;' == $sStyleHidden_val_reteiva_)
       {
           $this->nmgp_cmp_hidden['val_reteiva_'] = 'off';
       }
       if (isset($sCheckRead_descuent_))
       {
           $this->nmgp_cmp_readonly['descuent_'] = $sCheckRead_descuent_;
       }
       if ('display: none;' == $sStyleHidden_descuent_)
       {
           $this->nmgp_cmp_hidden['descuent_'] = 'off';
       }
       if (isset($sCheckRead_id_concepto_))
       {
           $this->nmgp_cmp_readonly['id_concepto_'] = $sCheckRead_id_concepto_;
       }
       if ('display: none;' == $sStyleHidden_id_concepto_)
       {
           $this->nmgp_cmp_hidden['id_concepto_'] = 'off';
       }
       if (isset($sCheckRead_conc_))
       {
           $this->nmgp_cmp_readonly['conc_'] = $sCheckRead_conc_;
       }
       if ('display: none;' == $sStyleHidden_conc_)
       {
           $this->nmgp_cmp_hidden['conc_'] = 'off';
       }
       if (isset($sCheckRead_obs_))
       {
           $this->nmgp_cmp_readonly['obs_'] = $sCheckRead_obs_;
       }
       if ('display: none;' == $sStyleHidden_obs_)
       {
           $this->nmgp_cmp_hidden['obs_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_hacerpagos_041119_PENDIENTE = $guarda_form_vert_form_hacerpagos_041119_PENDIENTE;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

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
   </td></tr></table>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_hacerpagos_041119_PENDIENTE");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_hacerpagos_041119_PENDIENTE");
 parent.scAjaxDetailHeight("form_hacerpagos_041119_PENDIENTE", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_hacerpagos_041119_PENDIENTE", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_hacerpagos_041119_PENDIENTE", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['sc_modal'])
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
			do_ajax_form_hacerpagos_041119_PENDIENTE_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-5").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
		    if ($("#brec_b").hasClass("disabled")) {
		        return;
		    }
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_041119_PENDIENTE']['buttonStatus'] = $this->nmgp_botoes;
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
<?php 
 } 
} 
?> 
