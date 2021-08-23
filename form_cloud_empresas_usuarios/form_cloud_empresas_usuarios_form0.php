<?php
class form_cloud_empresas_usuarios_form extends form_cloud_empresas_usuarios_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Usuarios"); } else { echo strip_tags("Usuarios"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['sc_redir_atualiz'] == 'ok')
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
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
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
.css_read_off_creado_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_actualizado_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cloud_empresas_usuarios/form_cloud_empresas_usuarios_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cloud_empresas_usuarios_sajax_js.php");
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

include_once('form_cloud_empresas_usuarios_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_cloud_empresas_usuarios_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
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
$_SESSION['scriptcase']['error_span_title']['form_cloud_empresas_usuarios'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cloud_empresas_usuarios'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="1150">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Usuarios"; } else { echo "Usuarios"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__users2_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__users2_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__users2_32.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
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
   <?php if (isset($this->nmgp_cmp_hidden['id_empresa_']) && $this->nmgp_cmp_hidden['id_empresa_'] == 'off') { $sStyleHidden_id_empresa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_empresa_']) || $this->nmgp_cmp_hidden['id_empresa_'] == 'on') {
      if (!isset($this->nm_new_label['id_empresa_'])) {
          $this->nm_new_label['id_empresa_'] = "Empresa"; } ?>

    <TD class="scFormLabelOddMult css_id_empresa__label" id="hidden_field_label_id_empresa_" style="<?php echo $sStyleHidden_id_empresa_; ?>" > <?php echo $this->nm_new_label['id_empresa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sStyleHidden_usuario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usuario_']) || $this->nmgp_cmp_hidden['usuario_'] == 'on') {
      if (!isset($this->nm_new_label['usuario_'])) {
          $this->nm_new_label['usuario_'] = "Usuario"; } ?>

    <TD class="scFormLabelOddMult css_usuario__label" id="hidden_field_label_usuario_" style="<?php echo $sStyleHidden_usuario_; ?>" > <?php echo $this->nm_new_label['usuario_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['password_']) && $this->nmgp_cmp_hidden['password_'] == 'off') { $sStyleHidden_password_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['password_']) || $this->nmgp_cmp_hidden['password_'] == 'on') {
      if (!isset($this->nm_new_label['password_'])) {
          $this->nm_new_label['password_'] = "Password"; } ?>

    <TD class="scFormLabelOddMult css_password__label" id="hidden_field_label_password_" style="<?php echo $sStyleHidden_password_; ?>" > <?php echo $this->nm_new_label['password_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre_completo_']) && $this->nmgp_cmp_hidden['nombre_completo_'] == 'off') { $sStyleHidden_nombre_completo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nombre_completo_']) || $this->nmgp_cmp_hidden['nombre_completo_'] == 'on') {
      if (!isset($this->nm_new_label['nombre_completo_'])) {
          $this->nm_new_label['nombre_completo_'] = "Nombre Completo"; } ?>

    <TD class="scFormLabelOddMult css_nombre_completo__label" id="hidden_field_label_nombre_completo_" style="<?php echo $sStyleHidden_nombre_completo_; ?>" > <?php echo $this->nm_new_label['nombre_completo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['celular_']) && $this->nmgp_cmp_hidden['celular_'] == 'off') { $sStyleHidden_celular_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['celular_']) || $this->nmgp_cmp_hidden['celular_'] == 'on') {
      if (!isset($this->nm_new_label['celular_'])) {
          $this->nm_new_label['celular_'] = "Celular"; } ?>

    <TD class="scFormLabelOddMult css_celular__label" id="hidden_field_label_celular_" style="<?php echo $sStyleHidden_celular_; ?>" > <?php echo $this->nm_new_label['celular_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['correo_']) && $this->nmgp_cmp_hidden['correo_'] == 'off') { $sStyleHidden_correo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['correo_']) || $this->nmgp_cmp_hidden['correo_'] == 'on') {
      if (!isset($this->nm_new_label['correo_'])) {
          $this->nm_new_label['correo_'] = "Correo"; } ?>

    <TD class="scFormLabelOddMult css_correo__label" id="hidden_field_label_correo_" style="<?php echo $sStyleHidden_correo_; ?>" > <?php echo $this->nm_new_label['correo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['prefijo_']) && $this->nmgp_cmp_hidden['prefijo_'] == 'off') { $sStyleHidden_prefijo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['prefijo_']) || $this->nmgp_cmp_hidden['prefijo_'] == 'on') {
      if (!isset($this->nm_new_label['prefijo_'])) {
          $this->nm_new_label['prefijo_'] = "Prefijo"; } ?>

    <TD class="scFormLabelOddMult css_prefijo__label" id="hidden_field_label_prefijo_" style="<?php echo $sStyleHidden_prefijo_; ?>" > <?php echo $this->nm_new_label['prefijo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['codsucursal_']) && $this->nmgp_cmp_hidden['codsucursal_'] == 'off') { $sStyleHidden_codsucursal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codsucursal_']) || $this->nmgp_cmp_hidden['codsucursal_'] == 'on') {
      if (!isset($this->nm_new_label['codsucursal_'])) {
          $this->nm_new_label['codsucursal_'] = "CodSucursal"; } ?>

    <TD class="scFormLabelOddMult css_codsucursal__label" id="hidden_field_label_codsucursal_" style="<?php echo $sStyleHidden_codsucursal_; ?>" > <?php echo $this->nm_new_label['codsucursal_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['activo_']) && $this->nmgp_cmp_hidden['activo_'] == 'off') { $sStyleHidden_activo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['activo_']) || $this->nmgp_cmp_hidden['activo_'] == 'on') {
      if (!isset($this->nm_new_label['activo_'])) {
          $this->nm_new_label['activo_'] = "Activo"; } ?>

    <TD class="scFormLabelOddMult css_activo__label" id="hidden_field_label_activo_" style="<?php echo $sStyleHidden_activo_; ?>" > <?php echo $this->nm_new_label['activo_'] ?> </TD>
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
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_cloud_empresas_usuarios);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_cloud_empresas_usuarios = $this->form_vert_form_cloud_empresas_usuarios;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_cloud_empresas_usuarios))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_cloud_empresas_usuarios as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->id_empresa_usuario_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['id_empresa_usuario_'];
       $this->sesion_id_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['sesion_id_'];
       $this->creado_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['creado_'];
       $this->actualizado_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['actualizado_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_empresa_'] = true;
           $this->nmgp_cmp_readonly['usuario_'] = true;
           $this->nmgp_cmp_readonly['password_'] = true;
           $this->nmgp_cmp_readonly['nombre_completo_'] = true;
           $this->nmgp_cmp_readonly['celular_'] = true;
           $this->nmgp_cmp_readonly['correo_'] = true;
           $this->nmgp_cmp_readonly['prefijo_'] = true;
           $this->nmgp_cmp_readonly['codsucursal_'] = true;
           $this->nmgp_cmp_readonly['activo_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_empresa_']) || $this->nmgp_cmp_readonly['id_empresa_'] != "on") {$this->nmgp_cmp_readonly['id_empresa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usuario_']) || $this->nmgp_cmp_readonly['usuario_'] != "on") {$this->nmgp_cmp_readonly['usuario_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['password_']) || $this->nmgp_cmp_readonly['password_'] != "on") {$this->nmgp_cmp_readonly['password_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nombre_completo_']) || $this->nmgp_cmp_readonly['nombre_completo_'] != "on") {$this->nmgp_cmp_readonly['nombre_completo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['celular_']) || $this->nmgp_cmp_readonly['celular_'] != "on") {$this->nmgp_cmp_readonly['celular_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['correo_']) || $this->nmgp_cmp_readonly['correo_'] != "on") {$this->nmgp_cmp_readonly['correo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['prefijo_']) || $this->nmgp_cmp_readonly['prefijo_'] != "on") {$this->nmgp_cmp_readonly['prefijo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codsucursal_']) || $this->nmgp_cmp_readonly['codsucursal_'] != "on") {$this->nmgp_cmp_readonly['codsucursal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['activo_']) || $this->nmgp_cmp_readonly['activo_'] != "on") {$this->nmgp_cmp_readonly['activo_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_empresa_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['id_empresa_']; 
       $id_empresa_ = $this->id_empresa_; 
       $sStyleHidden_id_empresa_ = '';
       if (isset($sCheckRead_id_empresa_))
       {
           unset($sCheckRead_id_empresa_);
       }
       if (isset($this->nmgp_cmp_readonly['id_empresa_']))
       {
           $sCheckRead_id_empresa_ = $this->nmgp_cmp_readonly['id_empresa_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_empresa_']) && $this->nmgp_cmp_hidden['id_empresa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_empresa_']);
           $sStyleHidden_id_empresa_ = 'display: none;';
       }
       $bTestReadOnly_id_empresa_ = true;
       $sStyleReadLab_id_empresa_ = 'display: none;';
       $sStyleReadInp_id_empresa_ = '';
       if (isset($this->nmgp_cmp_readonly['id_empresa_']) && $this->nmgp_cmp_readonly['id_empresa_'] == 'on')
       {
           $bTestReadOnly_id_empresa_ = false;
           unset($this->nmgp_cmp_readonly['id_empresa_']);
           $sStyleReadLab_id_empresa_ = '';
           $sStyleReadInp_id_empresa_ = 'display: none;';
       }
       $this->usuario_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['usuario_']; 
       $usuario_ = $this->usuario_; 
       $sStyleHidden_usuario_ = '';
       if (isset($sCheckRead_usuario_))
       {
           unset($sCheckRead_usuario_);
       }
       if (isset($this->nmgp_cmp_readonly['usuario_']))
       {
           $sCheckRead_usuario_ = $this->nmgp_cmp_readonly['usuario_'];
       }
       if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usuario_']);
           $sStyleHidden_usuario_ = 'display: none;';
       }
       $bTestReadOnly_usuario_ = true;
       $sStyleReadLab_usuario_ = 'display: none;';
       $sStyleReadInp_usuario_ = '';
       if (isset($this->nmgp_cmp_readonly['usuario_']) && $this->nmgp_cmp_readonly['usuario_'] == 'on')
       {
           $bTestReadOnly_usuario_ = false;
           unset($this->nmgp_cmp_readonly['usuario_']);
           $sStyleReadLab_usuario_ = '';
           $sStyleReadInp_usuario_ = 'display: none;';
       }
       $this->password_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['password_']; 
       $password_ = $this->password_; 
       $sStyleHidden_password_ = '';
       if (isset($sCheckRead_password_))
       {
           unset($sCheckRead_password_);
       }
       if (isset($this->nmgp_cmp_readonly['password_']))
       {
           $sCheckRead_password_ = $this->nmgp_cmp_readonly['password_'];
       }
       if (isset($this->nmgp_cmp_hidden['password_']) && $this->nmgp_cmp_hidden['password_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['password_']);
           $sStyleHidden_password_ = 'display: none;';
       }
       $bTestReadOnly_password_ = true;
       $sStyleReadLab_password_ = 'display: none;';
       $sStyleReadInp_password_ = '';
       if (isset($this->nmgp_cmp_readonly['password_']) && $this->nmgp_cmp_readonly['password_'] == 'on')
       {
           $bTestReadOnly_password_ = false;
           unset($this->nmgp_cmp_readonly['password_']);
           $sStyleReadLab_password_ = '';
           $sStyleReadInp_password_ = 'display: none;';
       }
       $this->nombre_completo_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['nombre_completo_']; 
       $nombre_completo_ = $this->nombre_completo_; 
       $sStyleHidden_nombre_completo_ = '';
       if (isset($sCheckRead_nombre_completo_))
       {
           unset($sCheckRead_nombre_completo_);
       }
       if (isset($this->nmgp_cmp_readonly['nombre_completo_']))
       {
           $sCheckRead_nombre_completo_ = $this->nmgp_cmp_readonly['nombre_completo_'];
       }
       if (isset($this->nmgp_cmp_hidden['nombre_completo_']) && $this->nmgp_cmp_hidden['nombre_completo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nombre_completo_']);
           $sStyleHidden_nombre_completo_ = 'display: none;';
       }
       $bTestReadOnly_nombre_completo_ = true;
       $sStyleReadLab_nombre_completo_ = 'display: none;';
       $sStyleReadInp_nombre_completo_ = '';
       if (isset($this->nmgp_cmp_readonly['nombre_completo_']) && $this->nmgp_cmp_readonly['nombre_completo_'] == 'on')
       {
           $bTestReadOnly_nombre_completo_ = false;
           unset($this->nmgp_cmp_readonly['nombre_completo_']);
           $sStyleReadLab_nombre_completo_ = '';
           $sStyleReadInp_nombre_completo_ = 'display: none;';
       }
       $this->celular_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['celular_']; 
       $celular_ = $this->celular_; 
       $sStyleHidden_celular_ = '';
       if (isset($sCheckRead_celular_))
       {
           unset($sCheckRead_celular_);
       }
       if (isset($this->nmgp_cmp_readonly['celular_']))
       {
           $sCheckRead_celular_ = $this->nmgp_cmp_readonly['celular_'];
       }
       if (isset($this->nmgp_cmp_hidden['celular_']) && $this->nmgp_cmp_hidden['celular_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['celular_']);
           $sStyleHidden_celular_ = 'display: none;';
       }
       $bTestReadOnly_celular_ = true;
       $sStyleReadLab_celular_ = 'display: none;';
       $sStyleReadInp_celular_ = '';
       if (isset($this->nmgp_cmp_readonly['celular_']) && $this->nmgp_cmp_readonly['celular_'] == 'on')
       {
           $bTestReadOnly_celular_ = false;
           unset($this->nmgp_cmp_readonly['celular_']);
           $sStyleReadLab_celular_ = '';
           $sStyleReadInp_celular_ = 'display: none;';
       }
       $this->correo_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['correo_']; 
       $correo_ = $this->correo_; 
       $sStyleHidden_correo_ = '';
       if (isset($sCheckRead_correo_))
       {
           unset($sCheckRead_correo_);
       }
       if (isset($this->nmgp_cmp_readonly['correo_']))
       {
           $sCheckRead_correo_ = $this->nmgp_cmp_readonly['correo_'];
       }
       if (isset($this->nmgp_cmp_hidden['correo_']) && $this->nmgp_cmp_hidden['correo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['correo_']);
           $sStyleHidden_correo_ = 'display: none;';
       }
       $bTestReadOnly_correo_ = true;
       $sStyleReadLab_correo_ = 'display: none;';
       $sStyleReadInp_correo_ = '';
       if (isset($this->nmgp_cmp_readonly['correo_']) && $this->nmgp_cmp_readonly['correo_'] == 'on')
       {
           $bTestReadOnly_correo_ = false;
           unset($this->nmgp_cmp_readonly['correo_']);
           $sStyleReadLab_correo_ = '';
           $sStyleReadInp_correo_ = 'display: none;';
       }
       $this->prefijo_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['prefijo_']; 
       $prefijo_ = $this->prefijo_; 
       $sStyleHidden_prefijo_ = '';
       if (isset($sCheckRead_prefijo_))
       {
           unset($sCheckRead_prefijo_);
       }
       if (isset($this->nmgp_cmp_readonly['prefijo_']))
       {
           $sCheckRead_prefijo_ = $this->nmgp_cmp_readonly['prefijo_'];
       }
       if (isset($this->nmgp_cmp_hidden['prefijo_']) && $this->nmgp_cmp_hidden['prefijo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['prefijo_']);
           $sStyleHidden_prefijo_ = 'display: none;';
       }
       $bTestReadOnly_prefijo_ = true;
       $sStyleReadLab_prefijo_ = 'display: none;';
       $sStyleReadInp_prefijo_ = '';
       if (isset($this->nmgp_cmp_readonly['prefijo_']) && $this->nmgp_cmp_readonly['prefijo_'] == 'on')
       {
           $bTestReadOnly_prefijo_ = false;
           unset($this->nmgp_cmp_readonly['prefijo_']);
           $sStyleReadLab_prefijo_ = '';
           $sStyleReadInp_prefijo_ = 'display: none;';
       }
       $this->codsucursal_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['codsucursal_']; 
       $codsucursal_ = $this->codsucursal_; 
       $sStyleHidden_codsucursal_ = '';
       if (isset($sCheckRead_codsucursal_))
       {
           unset($sCheckRead_codsucursal_);
       }
       if (isset($this->nmgp_cmp_readonly['codsucursal_']))
       {
           $sCheckRead_codsucursal_ = $this->nmgp_cmp_readonly['codsucursal_'];
       }
       if (isset($this->nmgp_cmp_hidden['codsucursal_']) && $this->nmgp_cmp_hidden['codsucursal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codsucursal_']);
           $sStyleHidden_codsucursal_ = 'display: none;';
       }
       $bTestReadOnly_codsucursal_ = true;
       $sStyleReadLab_codsucursal_ = 'display: none;';
       $sStyleReadInp_codsucursal_ = '';
       if (isset($this->nmgp_cmp_readonly['codsucursal_']) && $this->nmgp_cmp_readonly['codsucursal_'] == 'on')
       {
           $bTestReadOnly_codsucursal_ = false;
           unset($this->nmgp_cmp_readonly['codsucursal_']);
           $sStyleReadLab_codsucursal_ = '';
           $sStyleReadInp_codsucursal_ = 'display: none;';
       }
       $this->activo_ = $this->form_vert_form_cloud_empresas_usuarios[$sc_seq_vert]['activo_']; 
       $activo_ = $this->activo_; 
       $sStyleHidden_activo_ = '';
       if (isset($sCheckRead_activo_))
       {
           unset($sCheckRead_activo_);
       }
       if (isset($this->nmgp_cmp_readonly['activo_']))
       {
           $sCheckRead_activo_ = $this->nmgp_cmp_readonly['activo_'];
       }
       if (isset($this->nmgp_cmp_hidden['activo_']) && $this->nmgp_cmp_hidden['activo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['activo_']);
           $sStyleHidden_activo_ = 'display: none;';
       }
       $bTestReadOnly_activo_ = true;
       $sStyleReadLab_activo_ = 'display: none;';
       $sStyleReadInp_activo_ = '';
       if (isset($this->nmgp_cmp_readonly['activo_']) && $this->nmgp_cmp_readonly['activo_'] == 'on')
       {
           $bTestReadOnly_activo_ = false;
           unset($this->nmgp_cmp_readonly['activo_']);
           $sStyleReadLab_activo_ = '';
           $sStyleReadInp_activo_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_cloud_empresas_usuarios_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_cloud_empresas_usuarios_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cloud_empresas_usuarios_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_cloud_empresas_usuarios_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cloud_empresas_usuarios_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_cloud_empresas_usuarios_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_empresa_']) && $this->nmgp_cmp_hidden['id_empresa_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_empresa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_empresa__line" id="hidden_field_data_id_empresa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_empresa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_empresa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_empresa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_empresa_"]) &&  $this->nmgp_cmp_readonly["id_empresa_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_'] = array(); 
    }
   $nm_comando = "SELECT id_empresa, nombre_razonsocial  FROM cloud_empresas  ORDER BY nombre_razonsocial";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_id_empresa_'][] = $rs->fields[0];
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
   $id_empresa__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_empresa__1))
          {
              foreach ($this->id_empresa__1 as $tmp_id_empresa_)
              {
                  if (trim($tmp_id_empresa_) === trim($cadaselect[1])) { $id_empresa__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_empresa_) === trim($cadaselect[1])) { $id_empresa__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_empresa_) . "\">" . $id_empresa__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_empresa_();
   $x = 0 ; 
   $id_empresa__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_empresa__1))
          {
              foreach ($this->id_empresa__1 as $tmp_id_empresa_)
              {
                  if (trim($tmp_id_empresa_) === trim($cadaselect[1])) { $id_empresa__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_empresa_) === trim($cadaselect[1])) { $id_empresa__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_empresa__look))
          {
              $id_empresa__look = $this->id_empresa_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_empresa_" . $sc_seq_vert . "\" class=\"css_id_empresa__line\" style=\"" .  $sStyleReadLab_id_empresa_ . "\">" . $this->form_format_readonly("id_empresa_", $this->form_encode_input($id_empresa__look)) . "</span><span id=\"id_read_off_id_empresa_" . $sc_seq_vert . "\" class=\"css_read_off_id_empresa_\" style=\"white-space: nowrap; " . $sStyleReadInp_id_empresa_ . "\">";
   echo " <span id=\"idAjaxSelect_id_empresa_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_empresa__obj\" style=\"\" id=\"id_sc_field_id_empresa_" . $sc_seq_vert . "\" name=\"id_empresa_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_empresa_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_empresa_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_empresa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_empresa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_usuario__line" id="hidden_field_data_usuario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usuario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usuario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_"]) &&  $this->nmgp_cmp_readonly["usuario_"] == "on") { 

 ?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">" . $usuario_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-usuario_<?php echo $sc_seq_vert ?> css_usuario__line" style="<?php echo $sStyleReadLab_usuario_; ?>"><?php echo $this->form_format_readonly("usuario_", $this->form_encode_input($this->usuario_)); ?></span><span id="id_read_off_usuario_<?php echo $sc_seq_vert ?>" class="css_read_off_usuario_" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_usuario__obj" style="" id="id_sc_field_usuario_<?php echo $sc_seq_vert ?>" type=text name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) ?>"
 size=10 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['password_']) && $this->nmgp_cmp_hidden['password_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($password_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_password__line" id="hidden_field_data_password_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_password_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_password__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_password_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password_"]) &&  $this->nmgp_cmp_readonly["password_"] == "on") { 

 ?>
<input type="hidden" name="password_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($password_) . "\">" . $password_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_password_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-password_<?php echo $sc_seq_vert ?> css_password__line" style="<?php echo $sStyleReadLab_password_; ?>"><?php echo $this->form_format_readonly("password_", $this->form_encode_input($this->password_)); ?></span><span id="id_read_off_password_<?php echo $sc_seq_vert ?>" class="css_read_off_password_" style="white-space: nowrap;<?php echo $sStyleReadInp_password_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_password__obj" style="" id="id_sc_field_password_<?php echo $sc_seq_vert ?>" type=text name="password_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($password_) ?>"
 size=10 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre_completo_']) && $this->nmgp_cmp_hidden['nombre_completo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_completo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre_completo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nombre_completo__line" id="hidden_field_data_nombre_completo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nombre_completo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nombre_completo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nombre_completo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_completo_"]) &&  $this->nmgp_cmp_readonly["nombre_completo_"] == "on") { 

 ?>
<input type="hidden" name="nombre_completo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre_completo_) . "\">" . $nombre_completo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_completo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nombre_completo_<?php echo $sc_seq_vert ?> css_nombre_completo__line" style="<?php echo $sStyleReadLab_nombre_completo_; ?>"><?php echo $this->form_format_readonly("nombre_completo_", $this->form_encode_input($this->nombre_completo_)); ?></span><span id="id_read_off_nombre_completo_<?php echo $sc_seq_vert ?>" class="css_read_off_nombre_completo_" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_completo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nombre_completo__obj" style="" id="id_sc_field_nombre_completo_<?php echo $sc_seq_vert ?>" type=text name="nombre_completo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre_completo_) ?>"
 size=30 maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_completo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_completo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['celular_']) && $this->nmgp_cmp_hidden['celular_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="celular_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($celular_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_celular__line" id="hidden_field_data_celular_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_celular_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_celular__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_celular_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["celular_"]) &&  $this->nmgp_cmp_readonly["celular_"] == "on") { 

 ?>
<input type="hidden" name="celular_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($celular_) . "\">" . $celular_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_celular_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-celular_<?php echo $sc_seq_vert ?> css_celular__line" style="<?php echo $sStyleReadLab_celular_; ?>"><?php echo $this->form_format_readonly("celular_", $this->form_encode_input($this->celular_)); ?></span><span id="id_read_off_celular_<?php echo $sc_seq_vert ?>" class="css_read_off_celular_" style="white-space: nowrap;<?php echo $sStyleReadInp_celular_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_celular__obj" style="" id="id_sc_field_celular_<?php echo $sc_seq_vert ?>" type=text name="celular_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($celular_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_celular_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_celular_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['correo_']) && $this->nmgp_cmp_hidden['correo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_correo__line" id="hidden_field_data_correo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_correo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_correo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_correo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo_"]) &&  $this->nmgp_cmp_readonly["correo_"] == "on") { 

 ?>
<input type="hidden" name="correo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_) . "\">" . $correo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-correo_<?php echo $sc_seq_vert ?> css_correo__line" style="<?php echo $sStyleReadLab_correo_; ?>"><?php echo $this->form_format_readonly("correo_", $this->form_encode_input($this->correo_)); ?></span><span id="id_read_off_correo_<?php echo $sc_seq_vert ?>" class="css_read_off_correo_" style="white-space: nowrap;<?php echo $sStyleReadInp_correo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_correo__obj" style="" id="id_sc_field_correo_<?php echo $sc_seq_vert ?>" type=text name="correo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_) ?>"
 size=15 maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['prefijo_']) && $this->nmgp_cmp_hidden['prefijo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prefijo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prefijo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_prefijo__line" id="hidden_field_data_prefijo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_prefijo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_prefijo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_prefijo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prefijo_"]) &&  $this->nmgp_cmp_readonly["prefijo_"] == "on") { 

 ?>
<input type="hidden" name="prefijo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prefijo_) . "\">" . $prefijo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_prefijo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-prefijo_<?php echo $sc_seq_vert ?> css_prefijo__line" style="<?php echo $sStyleReadLab_prefijo_; ?>"><?php echo $this->form_format_readonly("prefijo_", $this->form_encode_input($this->prefijo_)); ?></span><span id="id_read_off_prefijo_<?php echo $sc_seq_vert ?>" class="css_read_off_prefijo_" style="white-space: nowrap;<?php echo $sStyleReadInp_prefijo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_prefijo__obj" style="" id="id_sc_field_prefijo_<?php echo $sc_seq_vert ?>" type=text name="prefijo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prefijo_) ?>"
 size=4 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prefijo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prefijo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codsucursal_']) && $this->nmgp_cmp_hidden['codsucursal_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codsucursal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codsucursal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codsucursal__line" id="hidden_field_data_codsucursal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codsucursal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codsucursal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codsucursal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codsucursal_"]) &&  $this->nmgp_cmp_readonly["codsucursal_"] == "on") { 

 ?>
<input type="hidden" name="codsucursal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codsucursal_) . "\">" . $codsucursal_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_codsucursal_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-codsucursal_<?php echo $sc_seq_vert ?> css_codsucursal__line" style="<?php echo $sStyleReadLab_codsucursal_; ?>"><?php echo $this->form_format_readonly("codsucursal_", $this->form_encode_input($this->codsucursal_)); ?></span><span id="id_read_off_codsucursal_<?php echo $sc_seq_vert ?>" class="css_read_off_codsucursal_" style="white-space: nowrap;<?php echo $sStyleReadInp_codsucursal_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_codsucursal__obj" style="" id="id_sc_field_codsucursal_<?php echo $sc_seq_vert ?>" type=text name="codsucursal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codsucursal_) ?>"
 size=5 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('codsucursal_')", "nm_mostra_mens('codsucursal_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codsucursal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codsucursal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['activo_']) && $this->nmgp_cmp_hidden['activo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->activo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_activo__line" id="hidden_field_data_activo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_activo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_activo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_activo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activo_"]) &&  $this->nmgp_cmp_readonly["activo_"] == "on") { 

$activo__look = "";
 if ($this->activo_ == "SI") { $activo__look .= "SI" ;} 
 if ($this->activo_ == "NO") { $activo__look .= "NO" ;} 
 if (empty($activo__look)) { $activo__look = $this->activo_; }
?>
<input type="hidden" name="activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($activo_) . "\">" . $activo__look . ""; ?>
<?php } else { ?>
<?php

$activo__look = "";
 if ($this->activo_ == "SI") { $activo__look .= "SI" ;} 
 if ($this->activo_ == "NO") { $activo__look .= "NO" ;} 
 if (empty($activo__look)) { $activo__look = $this->activo_; }
?>
<span id="id_read_on_activo_<?php echo $sc_seq_vert ; ?>" class="css_activo__line"  style="<?php echo $sStyleReadLab_activo_; ?>"><?php echo $this->form_format_readonly("activo_", $this->form_encode_input($activo__look)); ?></span><span id="id_read_off_activo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_activo_" style="white-space: nowrap; <?php echo $sStyleReadInp_activo_; ?>">
 <span id="idAjaxSelect_activo_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_activo__obj" style="" id="id_sc_field_activo_<?php echo $sc_seq_vert ?>" name="activo_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SI" <?php  if ($this->activo_ == "SI") { echo " selected" ;} ?><?php  if (empty($this->activo_)) { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_activo_'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->activo_ == "NO") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['Lookup_activo_'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_empresa_))
       {
           $this->nmgp_cmp_readonly['id_empresa_'] = $sCheckRead_id_empresa_;
       }
       if ('display: none;' == $sStyleHidden_id_empresa_)
       {
           $this->nmgp_cmp_hidden['id_empresa_'] = 'off';
       }
       if (isset($sCheckRead_usuario_))
       {
           $this->nmgp_cmp_readonly['usuario_'] = $sCheckRead_usuario_;
       }
       if ('display: none;' == $sStyleHidden_usuario_)
       {
           $this->nmgp_cmp_hidden['usuario_'] = 'off';
       }
       if (isset($sCheckRead_password_))
       {
           $this->nmgp_cmp_readonly['password_'] = $sCheckRead_password_;
       }
       if ('display: none;' == $sStyleHidden_password_)
       {
           $this->nmgp_cmp_hidden['password_'] = 'off';
       }
       if (isset($sCheckRead_nombre_completo_))
       {
           $this->nmgp_cmp_readonly['nombre_completo_'] = $sCheckRead_nombre_completo_;
       }
       if ('display: none;' == $sStyleHidden_nombre_completo_)
       {
           $this->nmgp_cmp_hidden['nombre_completo_'] = 'off';
       }
       if (isset($sCheckRead_celular_))
       {
           $this->nmgp_cmp_readonly['celular_'] = $sCheckRead_celular_;
       }
       if ('display: none;' == $sStyleHidden_celular_)
       {
           $this->nmgp_cmp_hidden['celular_'] = 'off';
       }
       if (isset($sCheckRead_correo_))
       {
           $this->nmgp_cmp_readonly['correo_'] = $sCheckRead_correo_;
       }
       if ('display: none;' == $sStyleHidden_correo_)
       {
           $this->nmgp_cmp_hidden['correo_'] = 'off';
       }
       if (isset($sCheckRead_prefijo_))
       {
           $this->nmgp_cmp_readonly['prefijo_'] = $sCheckRead_prefijo_;
       }
       if ('display: none;' == $sStyleHidden_prefijo_)
       {
           $this->nmgp_cmp_hidden['prefijo_'] = 'off';
       }
       if (isset($sCheckRead_codsucursal_))
       {
           $this->nmgp_cmp_readonly['codsucursal_'] = $sCheckRead_codsucursal_;
       }
       if ('display: none;' == $sStyleHidden_codsucursal_)
       {
           $this->nmgp_cmp_hidden['codsucursal_'] = 'off';
       }
       if (isset($sCheckRead_activo_))
       {
           $this->nmgp_cmp_readonly['activo_'] = $sCheckRead_activo_;
       }
       if ('display: none;' == $sStyleHidden_activo_)
       {
           $this->nmgp_cmp_hidden['activo_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_cloud_empresas_usuarios = $guarda_form_vert_form_cloud_empresas_usuarios;
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
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R")
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
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['run_modal'])
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
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cloud_empresas_usuarios");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cloud_empresas_usuarios");
 parent.scAjaxDetailHeight("form_cloud_empresas_usuarios", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cloud_empresas_usuarios", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cloud_empresas_usuarios", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['sc_modal'])
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
			do_ajax_form_cloud_empresas_usuarios_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_usuarios']['buttonStatus'] = $this->nmgp_botoes;
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
