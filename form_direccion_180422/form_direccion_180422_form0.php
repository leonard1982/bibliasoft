<?php
class form_direccion_180422_form extends form_direccion_180422_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("DIRECCIÓN DEL CLIENTE  (INCLUYA SUCURSALES)"); } else { echo strip_tags("DIRECCIÓN DEL CLIENTE, INCLUYE SUCURSALES"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_direccion_180422/form_direccion_180422_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_direccion_180422_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_direccion_180422_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('iddepar_1');

<?php
}
?>
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
$str_iframe_body = 'margin-top: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_direccion_180422_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_direccion_180422'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_direccion_180422'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "DIRECCIÓN DEL CLIENTE  (INCLUYA SUCURSALES)"; } else { echo "DIRECCIÓN DEL CLIENTE, INCLUYE SUCURSALES"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['balterarsel'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['bexcluirsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['bexcluirsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['bexcluirsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['bexcluirsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['bexcluirsel'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluirsel", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['idter_']))
   {
       $this->nmgp_cmp_hidden['idter_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['lenguaje_']))
   {
       $this->nmgp_cmp_hidden['lenguaje_'] = 'off';
   }
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['idter_']) && $this->nmgp_cmp_hidden['idter_'] == 'off') { $sStyleHidden_idter_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idter_']) || $this->nmgp_cmp_hidden['idter_'] == 'on') {
      if (!isset($this->nm_new_label['idter_'])) {
          $this->nm_new_label['idter_'] = "Idter"; } ?>

    <TD class="scFormLabelOddMult css_idter__label" id="hidden_field_label_idter_" style="<?php echo $sStyleHidden_idter_; ?>" > <?php echo $this->nm_new_label['idter_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['iddepar_']) && $this->nmgp_cmp_hidden['iddepar_'] == 'off') { $sStyleHidden_iddepar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['iddepar_']) || $this->nmgp_cmp_hidden['iddepar_'] == 'on') {
      if (!isset($this->nm_new_label['iddepar_'])) {
          $this->nm_new_label['iddepar_'] = "Departamento"; } ?>

    <TD class="scFormLabelOddMult css_iddepar__label" id="hidden_field_label_iddepar_" style="<?php echo $sStyleHidden_iddepar_; ?>" > <?php echo $this->nm_new_label['iddepar_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idmuni_']) && $this->nmgp_cmp_hidden['idmuni_'] == 'off') { $sStyleHidden_idmuni_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idmuni_']) || $this->nmgp_cmp_hidden['idmuni_'] == 'on') {
      if (!isset($this->nm_new_label['idmuni_'])) {
          $this->nm_new_label['idmuni_'] = "Ciudad o Municipio"; } ?>

    <TD class="scFormLabelOddMult css_idmuni__label" id="hidden_field_label_idmuni_" style="<?php echo $sStyleHidden_idmuni_; ?>" > <?php echo $this->nm_new_label['idmuni_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ciudad_']) && $this->nmgp_cmp_hidden['ciudad_'] == 'off') { $sStyleHidden_ciudad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ciudad_']) || $this->nmgp_cmp_hidden['ciudad_'] == 'on') {
      if (!isset($this->nm_new_label['ciudad_'])) {
          $this->nm_new_label['ciudad_'] = "Ciudad"; } ?>

    <TD class="scFormLabelOddMult css_ciudad__label" id="hidden_field_label_ciudad_" style="<?php echo $sStyleHidden_ciudad_; ?>" > <?php echo $this->nm_new_label['ciudad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['direc_']) && $this->nmgp_cmp_hidden['direc_'] == 'off') { $sStyleHidden_direc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['direc_']) || $this->nmgp_cmp_hidden['direc_'] == 'on') {
      if (!isset($this->nm_new_label['direc_'])) {
          $this->nm_new_label['direc_'] = "Dirección"; } ?>

    <TD class="scFormLabelOddMult css_direc__label" id="hidden_field_label_direc_" style="<?php echo $sStyleHidden_direc_; ?>" > <?php echo $this->nm_new_label['direc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['codigo_postal_']) && $this->nmgp_cmp_hidden['codigo_postal_'] == 'off') { $sStyleHidden_codigo_postal_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codigo_postal_']) || $this->nmgp_cmp_hidden['codigo_postal_'] == 'on') {
      if (!isset($this->nm_new_label['codigo_postal_'])) {
          $this->nm_new_label['codigo_postal_'] = "Codigo Postal"; } ?>

    <TD class="scFormLabelOddMult css_codigo_postal__label" id="hidden_field_label_codigo_postal_" style="<?php echo $sStyleHidden_codigo_postal_; ?>" > <?php echo $this->nm_new_label['codigo_postal_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['telefono_']) && $this->nmgp_cmp_hidden['telefono_'] == 'off') { $sStyleHidden_telefono_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['telefono_']) || $this->nmgp_cmp_hidden['telefono_'] == 'on') {
      if (!isset($this->nm_new_label['telefono_'])) {
          $this->nm_new_label['telefono_'] = "Teléfono"; } ?>

    <TD class="scFormLabelOddMult css_telefono__label" id="hidden_field_label_telefono_" style="<?php echo $sStyleHidden_telefono_; ?>" > <?php echo $this->nm_new_label['telefono_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lenguaje_']) && $this->nmgp_cmp_hidden['lenguaje_'] == 'off') { $sStyleHidden_lenguaje_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lenguaje_']) || $this->nmgp_cmp_hidden['lenguaje_'] == 'on') {
      if (!isset($this->nm_new_label['lenguaje_'])) {
          $this->nm_new_label['lenguaje_'] = "Lenguaje"; } ?>

    <TD class="scFormLabelOddMult css_lenguaje__label" id="hidden_field_label_lenguaje_" style="<?php echo $sStyleHidden_lenguaje_; ?>" > <?php echo $this->nm_new_label['lenguaje_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sStyleHidden_obs_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['obs_']) || $this->nmgp_cmp_hidden['obs_'] == 'on') {
      if (!isset($this->nm_new_label['obs_'])) {
          $this->nm_new_label['obs_'] = "Sucursal/Observ.:"; } ?>

    <TD class="scFormLabelOddMult css_obs__label" id="hidden_field_label_obs_" style="<?php echo $sStyleHidden_obs_; ?>" > <?php echo $this->nm_new_label['obs_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['correo_']) && $this->nmgp_cmp_hidden['correo_'] == 'off') { $sStyleHidden_correo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['correo_']) || $this->nmgp_cmp_hidden['correo_'] == 'on') {
      if (!isset($this->nm_new_label['correo_'])) {
          $this->nm_new_label['correo_'] = "Correo"; } ?>

    <TD class="scFormLabelOddMult css_correo__label" id="hidden_field_label_correo_" style="<?php echo $sStyleHidden_correo_; ?>" > <?php echo $this->nm_new_label['correo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['correo_notificafe_']) && $this->nmgp_cmp_hidden['correo_notificafe_'] == 'off') { $sStyleHidden_correo_notificafe_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['correo_notificafe_']) || $this->nmgp_cmp_hidden['correo_notificafe_'] == 'on') {
      if (!isset($this->nm_new_label['correo_notificafe_'])) {
          $this->nm_new_label['correo_notificafe_'] = "Correo Notificación"; } ?>

    <TD class="scFormLabelOddMult css_correo_notificafe__label" id="hidden_field_label_correo_notificafe_" style="<?php echo $sStyleHidden_correo_notificafe_; ?>" > <?php echo $this->nm_new_label['correo_notificafe_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['celular_notificafe_']) && $this->nmgp_cmp_hidden['celular_notificafe_'] == 'off') { $sStyleHidden_celular_notificafe_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['celular_notificafe_']) || $this->nmgp_cmp_hidden['celular_notificafe_'] == 'on') {
      if (!isset($this->nm_new_label['celular_notificafe_'])) {
          $this->nm_new_label['celular_notificafe_'] = "Celular Notificación"; } ?>

    <TD class="scFormLabelOddMult css_celular_notificafe__label" id="hidden_field_label_celular_notificafe_" style="<?php echo $sStyleHidden_celular_notificafe_; ?>" > <?php echo $this->nm_new_label['celular_notificafe_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_direccion_180422);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_direccion_180422 = $this->form_vert_form_direccion_180422;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_direccion_180422))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_direccion_180422 as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->iddireccion_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['iddireccion_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['idter_'] = true;
           $this->nmgp_cmp_readonly['iddepar_'] = true;
           $this->nmgp_cmp_readonly['idmuni_'] = true;
           $this->nmgp_cmp_readonly['ciudad_'] = true;
           $this->nmgp_cmp_readonly['direc_'] = true;
           $this->nmgp_cmp_readonly['codigo_postal_'] = true;
           $this->nmgp_cmp_readonly['telefono_'] = true;
           $this->nmgp_cmp_readonly['lenguaje_'] = true;
           $this->nmgp_cmp_readonly['obs_'] = true;
           $this->nmgp_cmp_readonly['correo_'] = true;
           $this->nmgp_cmp_readonly['correo_notificafe_'] = true;
           $this->nmgp_cmp_readonly['celular_notificafe_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['idter_']) || $this->nmgp_cmp_readonly['idter_'] != "on") {$this->nmgp_cmp_readonly['idter_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['iddepar_']) || $this->nmgp_cmp_readonly['iddepar_'] != "on") {$this->nmgp_cmp_readonly['iddepar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idmuni_']) || $this->nmgp_cmp_readonly['idmuni_'] != "on") {$this->nmgp_cmp_readonly['idmuni_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ciudad_']) || $this->nmgp_cmp_readonly['ciudad_'] != "on") {$this->nmgp_cmp_readonly['ciudad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['direc_']) || $this->nmgp_cmp_readonly['direc_'] != "on") {$this->nmgp_cmp_readonly['direc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codigo_postal_']) || $this->nmgp_cmp_readonly['codigo_postal_'] != "on") {$this->nmgp_cmp_readonly['codigo_postal_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['telefono_']) || $this->nmgp_cmp_readonly['telefono_'] != "on") {$this->nmgp_cmp_readonly['telefono_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lenguaje_']) || $this->nmgp_cmp_readonly['lenguaje_'] != "on") {$this->nmgp_cmp_readonly['lenguaje_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['obs_']) || $this->nmgp_cmp_readonly['obs_'] != "on") {$this->nmgp_cmp_readonly['obs_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['correo_']) || $this->nmgp_cmp_readonly['correo_'] != "on") {$this->nmgp_cmp_readonly['correo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['correo_notificafe_']) || $this->nmgp_cmp_readonly['correo_notificafe_'] != "on") {$this->nmgp_cmp_readonly['correo_notificafe_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['celular_notificafe_']) || $this->nmgp_cmp_readonly['celular_notificafe_'] != "on") {$this->nmgp_cmp_readonly['celular_notificafe_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->idter_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['idter_']; 
       $idter_ = $this->idter_; 
       if (!isset($this->nmgp_cmp_hidden['idter_']))
       {
           $this->nmgp_cmp_hidden['idter_'] = 'off';
       }
       $sStyleHidden_idter_ = '';
       if (isset($sCheckRead_idter_))
       {
           unset($sCheckRead_idter_);
       }
       if (isset($this->nmgp_cmp_readonly['idter_']))
       {
           $sCheckRead_idter_ = $this->nmgp_cmp_readonly['idter_'];
       }
       if (isset($this->nmgp_cmp_hidden['idter_']) && $this->nmgp_cmp_hidden['idter_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idter_']);
           $sStyleHidden_idter_ = 'display: none;';
       }
       $bTestReadOnly_idter_ = true;
       $sStyleReadLab_idter_ = 'display: none;';
       $sStyleReadInp_idter_ = '';
       if (isset($this->nmgp_cmp_readonly['idter_']) && $this->nmgp_cmp_readonly['idter_'] == 'on')
       {
           $bTestReadOnly_idter_ = false;
           unset($this->nmgp_cmp_readonly['idter_']);
           $sStyleReadLab_idter_ = '';
           $sStyleReadInp_idter_ = 'display: none;';
       }
       $this->iddepar_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['iddepar_']; 
       $iddepar_ = $this->iddepar_; 
       $sStyleHidden_iddepar_ = '';
       if (isset($sCheckRead_iddepar_))
       {
           unset($sCheckRead_iddepar_);
       }
       if (isset($this->nmgp_cmp_readonly['iddepar_']))
       {
           $sCheckRead_iddepar_ = $this->nmgp_cmp_readonly['iddepar_'];
       }
       if (isset($this->nmgp_cmp_hidden['iddepar_']) && $this->nmgp_cmp_hidden['iddepar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['iddepar_']);
           $sStyleHidden_iddepar_ = 'display: none;';
       }
       $bTestReadOnly_iddepar_ = true;
       $sStyleReadLab_iddepar_ = 'display: none;';
       $sStyleReadInp_iddepar_ = '';
       if (isset($this->nmgp_cmp_readonly['iddepar_']) && $this->nmgp_cmp_readonly['iddepar_'] == 'on')
       {
           $bTestReadOnly_iddepar_ = false;
           unset($this->nmgp_cmp_readonly['iddepar_']);
           $sStyleReadLab_iddepar_ = '';
           $sStyleReadInp_iddepar_ = 'display: none;';
       }
       $this->idmuni_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['idmuni_']; 
       $idmuni_ = $this->idmuni_; 
       $sStyleHidden_idmuni_ = '';
       if (isset($sCheckRead_idmuni_))
       {
           unset($sCheckRead_idmuni_);
       }
       if (isset($this->nmgp_cmp_readonly['idmuni_']))
       {
           $sCheckRead_idmuni_ = $this->nmgp_cmp_readonly['idmuni_'];
       }
       if (isset($this->nmgp_cmp_hidden['idmuni_']) && $this->nmgp_cmp_hidden['idmuni_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idmuni_']);
           $sStyleHidden_idmuni_ = 'display: none;';
       }
       $bTestReadOnly_idmuni_ = true;
       $sStyleReadLab_idmuni_ = 'display: none;';
       $sStyleReadInp_idmuni_ = '';
       if (isset($this->nmgp_cmp_readonly['idmuni_']) && $this->nmgp_cmp_readonly['idmuni_'] == 'on')
       {
           $bTestReadOnly_idmuni_ = false;
           unset($this->nmgp_cmp_readonly['idmuni_']);
           $sStyleReadLab_idmuni_ = '';
           $sStyleReadInp_idmuni_ = 'display: none;';
       }
       $this->ciudad_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['ciudad_']; 
       $ciudad_ = $this->ciudad_; 
       $sStyleHidden_ciudad_ = '';
       if (isset($sCheckRead_ciudad_))
       {
           unset($sCheckRead_ciudad_);
       }
       if (isset($this->nmgp_cmp_readonly['ciudad_']))
       {
           $sCheckRead_ciudad_ = $this->nmgp_cmp_readonly['ciudad_'];
       }
       if (isset($this->nmgp_cmp_hidden['ciudad_']) && $this->nmgp_cmp_hidden['ciudad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ciudad_']);
           $sStyleHidden_ciudad_ = 'display: none;';
       }
       $bTestReadOnly_ciudad_ = true;
       $sStyleReadLab_ciudad_ = 'display: none;';
       $sStyleReadInp_ciudad_ = '';
       if (isset($this->nmgp_cmp_readonly['ciudad_']) && $this->nmgp_cmp_readonly['ciudad_'] == 'on')
       {
           $bTestReadOnly_ciudad_ = false;
           unset($this->nmgp_cmp_readonly['ciudad_']);
           $sStyleReadLab_ciudad_ = '';
           $sStyleReadInp_ciudad_ = 'display: none;';
       }
       $this->direc_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['direc_']; 
       $direc_ = $this->direc_; 
       $direc__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $direc_);
       $direc__val = $direc__tmp;
       $sStyleHidden_direc_ = '';
       if (isset($sCheckRead_direc_))
       {
           unset($sCheckRead_direc_);
       }
       if (isset($this->nmgp_cmp_readonly['direc_']))
       {
           $sCheckRead_direc_ = $this->nmgp_cmp_readonly['direc_'];
       }
       if (isset($this->nmgp_cmp_hidden['direc_']) && $this->nmgp_cmp_hidden['direc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['direc_']);
           $sStyleHidden_direc_ = 'display: none;';
       }
       $bTestReadOnly_direc_ = true;
       $sStyleReadLab_direc_ = 'display: none;';
       $sStyleReadInp_direc_ = '';
       if (isset($this->nmgp_cmp_readonly['direc_']) && $this->nmgp_cmp_readonly['direc_'] == 'on')
       {
           $bTestReadOnly_direc_ = false;
           unset($this->nmgp_cmp_readonly['direc_']);
           $sStyleReadLab_direc_ = '';
           $sStyleReadInp_direc_ = 'display: none;';
       }
       $this->codigo_postal_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['codigo_postal_']; 
       $codigo_postal_ = $this->codigo_postal_; 
       $sStyleHidden_codigo_postal_ = '';
       if (isset($sCheckRead_codigo_postal_))
       {
           unset($sCheckRead_codigo_postal_);
       }
       if (isset($this->nmgp_cmp_readonly['codigo_postal_']))
       {
           $sCheckRead_codigo_postal_ = $this->nmgp_cmp_readonly['codigo_postal_'];
       }
       if (isset($this->nmgp_cmp_hidden['codigo_postal_']) && $this->nmgp_cmp_hidden['codigo_postal_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codigo_postal_']);
           $sStyleHidden_codigo_postal_ = 'display: none;';
       }
       $bTestReadOnly_codigo_postal_ = true;
       $sStyleReadLab_codigo_postal_ = 'display: none;';
       $sStyleReadInp_codigo_postal_ = '';
       if (isset($this->nmgp_cmp_readonly['codigo_postal_']) && $this->nmgp_cmp_readonly['codigo_postal_'] == 'on')
       {
           $bTestReadOnly_codigo_postal_ = false;
           unset($this->nmgp_cmp_readonly['codigo_postal_']);
           $sStyleReadLab_codigo_postal_ = '';
           $sStyleReadInp_codigo_postal_ = 'display: none;';
       }
       $this->telefono_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['telefono_']; 
       $telefono_ = $this->telefono_; 
       $sStyleHidden_telefono_ = '';
       if (isset($sCheckRead_telefono_))
       {
           unset($sCheckRead_telefono_);
       }
       if (isset($this->nmgp_cmp_readonly['telefono_']))
       {
           $sCheckRead_telefono_ = $this->nmgp_cmp_readonly['telefono_'];
       }
       if (isset($this->nmgp_cmp_hidden['telefono_']) && $this->nmgp_cmp_hidden['telefono_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['telefono_']);
           $sStyleHidden_telefono_ = 'display: none;';
       }
       $bTestReadOnly_telefono_ = true;
       $sStyleReadLab_telefono_ = 'display: none;';
       $sStyleReadInp_telefono_ = '';
       if (isset($this->nmgp_cmp_readonly['telefono_']) && $this->nmgp_cmp_readonly['telefono_'] == 'on')
       {
           $bTestReadOnly_telefono_ = false;
           unset($this->nmgp_cmp_readonly['telefono_']);
           $sStyleReadLab_telefono_ = '';
           $sStyleReadInp_telefono_ = 'display: none;';
       }
       $this->lenguaje_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['lenguaje_']; 
       $lenguaje_ = $this->lenguaje_; 
       if (!isset($this->nmgp_cmp_hidden['lenguaje_']))
       {
           $this->nmgp_cmp_hidden['lenguaje_'] = 'off';
       }
       $sStyleHidden_lenguaje_ = '';
       if (isset($sCheckRead_lenguaje_))
       {
           unset($sCheckRead_lenguaje_);
       }
       if (isset($this->nmgp_cmp_readonly['lenguaje_']))
       {
           $sCheckRead_lenguaje_ = $this->nmgp_cmp_readonly['lenguaje_'];
       }
       if (isset($this->nmgp_cmp_hidden['lenguaje_']) && $this->nmgp_cmp_hidden['lenguaje_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lenguaje_']);
           $sStyleHidden_lenguaje_ = 'display: none;';
       }
       $bTestReadOnly_lenguaje_ = true;
       $sStyleReadLab_lenguaje_ = 'display: none;';
       $sStyleReadInp_lenguaje_ = '';
       if (isset($this->nmgp_cmp_readonly['lenguaje_']) && $this->nmgp_cmp_readonly['lenguaje_'] == 'on')
       {
           $bTestReadOnly_lenguaje_ = false;
           unset($this->nmgp_cmp_readonly['lenguaje_']);
           $sStyleReadLab_lenguaje_ = '';
           $sStyleReadInp_lenguaje_ = 'display: none;';
       }
       $this->obs_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['obs_']; 
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
       $this->correo_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['correo_']; 
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
       $this->correo_notificafe_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['correo_notificafe_']; 
       $correo_notificafe_ = $this->correo_notificafe_; 
       $sStyleHidden_correo_notificafe_ = '';
       if (isset($sCheckRead_correo_notificafe_))
       {
           unset($sCheckRead_correo_notificafe_);
       }
       if (isset($this->nmgp_cmp_readonly['correo_notificafe_']))
       {
           $sCheckRead_correo_notificafe_ = $this->nmgp_cmp_readonly['correo_notificafe_'];
       }
       if (isset($this->nmgp_cmp_hidden['correo_notificafe_']) && $this->nmgp_cmp_hidden['correo_notificafe_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['correo_notificafe_']);
           $sStyleHidden_correo_notificafe_ = 'display: none;';
       }
       $bTestReadOnly_correo_notificafe_ = true;
       $sStyleReadLab_correo_notificafe_ = 'display: none;';
       $sStyleReadInp_correo_notificafe_ = '';
       if (isset($this->nmgp_cmp_readonly['correo_notificafe_']) && $this->nmgp_cmp_readonly['correo_notificafe_'] == 'on')
       {
           $bTestReadOnly_correo_notificafe_ = false;
           unset($this->nmgp_cmp_readonly['correo_notificafe_']);
           $sStyleReadLab_correo_notificafe_ = '';
           $sStyleReadInp_correo_notificafe_ = 'display: none;';
       }
       $this->celular_notificafe_ = $this->form_vert_form_direccion_180422[$sc_seq_vert]['celular_notificafe_']; 
       $celular_notificafe_ = $this->celular_notificafe_; 
       $sStyleHidden_celular_notificafe_ = '';
       if (isset($sCheckRead_celular_notificafe_))
       {
           unset($sCheckRead_celular_notificafe_);
       }
       if (isset($this->nmgp_cmp_readonly['celular_notificafe_']))
       {
           $sCheckRead_celular_notificafe_ = $this->nmgp_cmp_readonly['celular_notificafe_'];
       }
       if (isset($this->nmgp_cmp_hidden['celular_notificafe_']) && $this->nmgp_cmp_hidden['celular_notificafe_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['celular_notificafe_']);
           $sStyleHidden_celular_notificafe_ = 'display: none;';
       }
       $bTestReadOnly_celular_notificafe_ = true;
       $sStyleReadLab_celular_notificafe_ = 'display: none;';
       $sStyleReadInp_celular_notificafe_ = '';
       if (isset($this->nmgp_cmp_readonly['celular_notificafe_']) && $this->nmgp_cmp_readonly['celular_notificafe_'] == 'on')
       {
           $bTestReadOnly_celular_notificafe_ = false;
           unset($this->nmgp_cmp_readonly['celular_notificafe_']);
           $sStyleReadLab_celular_notificafe_ = '';
           $sStyleReadInp_celular_notificafe_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_direccion_180422_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_direccion_180422_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_direccion_180422_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_direccion_180422_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_direccion_180422_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_direccion_180422_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['idter_']) && $this->nmgp_cmp_hidden['idter_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idter_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idter__line" id="hidden_field_data_idter_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idter_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idter__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idter_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idter_"]) &&  $this->nmgp_cmp_readonly["idter_"] == "on") { 

 ?>
<input type="hidden" name="idter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idter_) . "\">" . $idter_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_idter_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idter_<?php echo $sc_seq_vert ?> css_idter__line" style="<?php echo $sStyleReadLab_idter_; ?>"><?php echo $this->form_format_readonly("idter_", $this->form_encode_input($this->idter_)); ?></span><span id="id_read_off_idter_<?php echo $sc_seq_vert ?>" class="css_read_off_idter_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idter_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idter__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idter_<?php echo $sc_seq_vert ?>" type=text name="idter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idter_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idter_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idter_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idter_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idter_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idter_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['iddepar_']) && $this->nmgp_cmp_hidden['iddepar_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="iddepar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->iddepar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_iddepar__line" id="hidden_field_data_iddepar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_iddepar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_iddepar__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_iddepar_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iddepar_"]) &&  $this->nmgp_cmp_readonly["iddepar_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_'] = array(); 
    }

   $old_value_idter_ = $this->idter_;
   $old_value_celular_notificafe_ = $this->celular_notificafe_;
   $this->nm_tira_formatacao();


   $unformatted_value_idter_ = $this->idter_;
   $unformatted_value_celular_notificafe_ = $this->celular_notificafe_;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->idter_ = $old_value_idter_;
   $this->celular_notificafe_ = $old_value_celular_notificafe_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_iddepar_'][] = $rs->fields[0];
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
   $iddepar__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->iddepar__1))
          {
              foreach ($this->iddepar__1 as $tmp_iddepar_)
              {
                  if (trim($tmp_iddepar_) === trim($cadaselect[1])) { $iddepar__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->iddepar_) === trim($cadaselect[1])) { $iddepar__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="iddepar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iddepar_) . "\">" . $iddepar__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_iddepar_();
   $x = 0 ; 
   $iddepar__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->iddepar__1))
          {
              foreach ($this->iddepar__1 as $tmp_iddepar_)
              {
                  if (trim($tmp_iddepar_) === trim($cadaselect[1])) { $iddepar__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->iddepar_) === trim($cadaselect[1])) { $iddepar__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($iddepar__look))
          {
              $iddepar__look = $this->iddepar_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_iddepar_" . $sc_seq_vert . "\" class=\"css_iddepar__line\" style=\"" .  $sStyleReadLab_iddepar_ . "\">" . $this->form_format_readonly("iddepar_", $this->form_encode_input($iddepar__look)) . "</span><span id=\"id_read_off_iddepar_" . $sc_seq_vert . "\" class=\"css_read_off_iddepar_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_iddepar_ . "\">";
   echo " <span id=\"idAjaxSelect_iddepar_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_iddepar__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_iddepar_" . $sc_seq_vert . "\" name=\"iddepar_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->iddepar_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->iddepar_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddepar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddepar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idmuni_']) && $this->nmgp_cmp_hidden['idmuni_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idmuni_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idmuni_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idmuni__line" id="hidden_field_data_idmuni_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idmuni_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idmuni__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idmuni_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idmuni_"]) &&  $this->nmgp_cmp_readonly["idmuni_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_'] = array(); 
}
if ($this->iddepar_ != "")
{ 
   $this->nm_clear_val("iddepar_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_'] = array(); 
    }

   $old_value_idter_ = $this->idter_;
   $old_value_celular_notificafe_ = $this->celular_notificafe_;
   $this->nm_tira_formatacao();


   $unformatted_value_idter_ = $this->idter_;
   $unformatted_value_celular_notificafe_ = $this->celular_notificafe_;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->iddepar_ ORDER BY municipio";

   $this->idter_ = $old_value_idter_;
   $this->celular_notificafe_ = $old_value_celular_notificafe_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_idmuni_'][] = $rs->fields[0];
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
   $idmuni__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmuni__1))
          {
              foreach ($this->idmuni__1 as $tmp_idmuni_)
              {
                  if (trim($tmp_idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idmuni_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idmuni_) . "\">" . $idmuni__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idmuni_();
   $x = 0 ; 
   $idmuni__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmuni__1))
          {
              foreach ($this->idmuni__1 as $tmp_idmuni_)
              {
                  if (trim($tmp_idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idmuni__look))
          {
              $idmuni__look = $this->idmuni_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idmuni_" . $sc_seq_vert . "\" class=\"css_idmuni__line\" style=\"" .  $sStyleReadLab_idmuni_ . "\">" . $this->form_format_readonly("idmuni_", $this->form_encode_input($idmuni__look)) . "</span><span id=\"id_read_off_idmuni_" . $sc_seq_vert . "\" class=\"css_read_off_idmuni_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idmuni_ . "\">";
   echo " <span id=\"idAjaxSelect_idmuni_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idmuni__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idmuni_" . $sc_seq_vert . "\" name=\"idmuni_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idmuni_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idmuni_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmuni_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmuni_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ciudad_']) && $this->nmgp_cmp_hidden['ciudad_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ciudad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->ciudad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ciudad__line" id="hidden_field_data_ciudad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ciudad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ciudad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ciudad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciudad_"]) &&  $this->nmgp_cmp_readonly["ciudad_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_'] = array(); 
}
if ($this->idmuni_ != "")
{ 
   $this->nm_clear_val("idmuni_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_'] = array(); 
    }

   $old_value_idter_ = $this->idter_;
   $old_value_celular_notificafe_ = $this->celular_notificafe_;
   $this->nm_tira_formatacao();


   $unformatted_value_idter_ = $this->idter_;
   $unformatted_value_celular_notificafe_ = $this->celular_notificafe_;

   $nm_comando = "SELECT municipio FROM municipio  WHERE idmun=$this->idmuni_ ORDER BY municipio";

   $this->idter_ = $old_value_idter_;
   $this->celular_notificafe_ = $old_value_celular_notificafe_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_ciudad_'][] = $rs->fields[0];
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
   $ciudad__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ciudad__1))
          {
              foreach ($this->ciudad__1 as $tmp_ciudad_)
              {
                  if (trim($tmp_ciudad_) === trim($cadaselect[1])) { $ciudad__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ciudad_) === trim($cadaselect[1])) { $ciudad__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ciudad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ciudad_) . "\">" . $ciudad__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ciudad_();
   $x = 0 ; 
   $ciudad__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ciudad__1))
          {
              foreach ($this->ciudad__1 as $tmp_ciudad_)
              {
                  if (trim($tmp_ciudad_) === trim($cadaselect[1])) { $ciudad__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ciudad_) === trim($cadaselect[1])) { $ciudad__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ciudad__look))
          {
              $ciudad__look = $this->ciudad_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ciudad_" . $sc_seq_vert . "\" class=\"css_ciudad__line\" style=\"" .  $sStyleReadLab_ciudad_ . "\">" . $this->form_format_readonly("ciudad_", $this->form_encode_input($ciudad__look)) . "</span><span id=\"id_read_off_ciudad_" . $sc_seq_vert . "\" class=\"css_read_off_ciudad_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_ciudad_ . "\">";
   echo " <span id=\"idAjaxSelect_ciudad_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_ciudad__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_ciudad_" . $sc_seq_vert . "\" name=\"ciudad_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ciudad_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ciudad_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciudad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciudad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['direc_']) && $this->nmgp_cmp_hidden['direc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_direc__line" id="hidden_field_data_direc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_direc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_direc__line" style="vertical-align: top;padding: 0px">
<?php
$direc__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($direc_));

?>

<?php if ($bTestReadOnly_direc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direc_"]) &&  $this->nmgp_cmp_readonly["direc_"] == "on") { 

 ?>
<input type="hidden" name="direc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direc_) . "\">" . $direc__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_direc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-direc_<?php echo $sc_seq_vert ?> css_direc__line" style="<?php echo $sStyleReadLab_direc_; ?>"><?php echo $this->form_format_readonly("direc_", $this->form_encode_input($direc__val)); ?></span><span id="id_read_off_direc_<?php echo $sc_seq_vert ?>" class="css_read_off_direc_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direc_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_direc__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="direc_<?php echo $sc_seq_vert ?>" id="id_sc_field_direc_<?php echo $sc_seq_vert ?>" rows="1" cols="40"
 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $direc_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codigo_postal_']) && $this->nmgp_cmp_hidden['codigo_postal_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codigo_postal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->codigo_postal_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigo_postal__line" id="hidden_field_data_codigo_postal_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigo_postal_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigo_postal__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codigo_postal_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_postal_"]) &&  $this->nmgp_cmp_readonly["codigo_postal_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_'] = array(); 
}
if ($this->idmuni_ != "")
{ 
   $this->nm_clear_val("idmuni_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_'] = array(); 
    }

   $old_value_idter_ = $this->idter_;
   $old_value_celular_notificafe_ = $this->celular_notificafe_;
   $this->nm_tira_formatacao();


   $unformatted_value_idter_ = $this->idter_;
   $unformatted_value_celular_notificafe_ = $this->celular_notificafe_;

   $nm_comando = "SELECT codigo_postal  FROM codigo_postal  WHERE idmuni=$this->idmuni_ ORDER BY codigo_postal";

   $this->idter_ = $old_value_idter_;
   $this->celular_notificafe_ = $old_value_celular_notificafe_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_codigo_postal_'][] = $rs->fields[0];
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
   $codigo_postal__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigo_postal__1))
          {
              foreach ($this->codigo_postal__1 as $tmp_codigo_postal_)
              {
                  if (trim($tmp_codigo_postal_) === trim($cadaselect[1])) { $codigo_postal__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigo_postal_) === trim($cadaselect[1])) { $codigo_postal__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="codigo_postal_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigo_postal_) . "\">" . $codigo_postal__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_codigo_postal_();
   $x = 0 ; 
   $codigo_postal__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigo_postal__1))
          {
              foreach ($this->codigo_postal__1 as $tmp_codigo_postal_)
              {
                  if (trim($tmp_codigo_postal_) === trim($cadaselect[1])) { $codigo_postal__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigo_postal_) === trim($cadaselect[1])) { $codigo_postal__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($codigo_postal__look))
          {
              $codigo_postal__look = $this->codigo_postal_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_codigo_postal_" . $sc_seq_vert . "\" class=\"css_codigo_postal__line\" style=\"" .  $sStyleReadLab_codigo_postal_ . "\">" . $this->form_format_readonly("codigo_postal_", $this->form_encode_input($codigo_postal__look)) . "</span><span id=\"id_read_off_codigo_postal_" . $sc_seq_vert . "\" class=\"css_read_off_codigo_postal_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_codigo_postal_ . "\">";
   echo " <span id=\"idAjaxSelect_codigo_postal_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_codigo_postal__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_codigo_postal_" . $sc_seq_vert . "\" name=\"codigo_postal_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->codigo_postal_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->codigo_postal_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_postal_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_postal_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['telefono_']) && $this->nmgp_cmp_hidden['telefono_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($telefono_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_telefono__line" id="hidden_field_data_telefono_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_telefono_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_telefono__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_telefono_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono_"]) &&  $this->nmgp_cmp_readonly["telefono_"] == "on") { 

 ?>
<input type="hidden" name="telefono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($telefono_) . "\">" . $telefono_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-telefono_<?php echo $sc_seq_vert ?> css_telefono__line" style="<?php echo $sStyleReadLab_telefono_; ?>"><?php echo $this->form_format_readonly("telefono_", $this->form_encode_input($this->telefono_)); ?></span><span id="id_read_off_telefono_<?php echo $sc_seq_vert ?>" class="css_read_off_telefono_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_telefono__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefono_<?php echo $sc_seq_vert ?>" type=text name="telefono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($telefono_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 -") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lenguaje_']) && $this->nmgp_cmp_hidden['lenguaje_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="lenguaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->lenguaje_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lenguaje__line" id="hidden_field_data_lenguaje_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lenguaje_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lenguaje__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lenguaje_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lenguaje_"]) &&  $this->nmgp_cmp_readonly["lenguaje_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_'] = array(); 
    }

   $old_value_idter_ = $this->idter_;
   $old_value_celular_notificafe_ = $this->celular_notificafe_;
   $this->nm_tira_formatacao();


   $unformatted_value_idter_ = $this->idter_;
   $unformatted_value_celular_notificafe_ = $this->celular_notificafe_;

   $nm_comando = "SELECT lenguaje, lenguaje  FROM lenguas  ORDER BY lenguaje";

   $this->idter_ = $old_value_idter_;
   $this->celular_notificafe_ = $old_value_celular_notificafe_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['Lookup_lenguaje_'][] = $rs->fields[0];
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
   $lenguaje__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lenguaje__1))
          {
              foreach ($this->lenguaje__1 as $tmp_lenguaje_)
              {
                  if (trim($tmp_lenguaje_) === trim($cadaselect[1])) { $lenguaje__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lenguaje_) === trim($cadaselect[1])) { $lenguaje__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="lenguaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lenguaje_) . "\">" . $lenguaje__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_lenguaje_();
   $x = 0 ; 
   $lenguaje__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lenguaje__1))
          {
              foreach ($this->lenguaje__1 as $tmp_lenguaje_)
              {
                  if (trim($tmp_lenguaje_) === trim($cadaselect[1])) { $lenguaje__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lenguaje_) === trim($cadaselect[1])) { $lenguaje__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($lenguaje__look))
          {
              $lenguaje__look = $this->lenguaje_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_lenguaje_" . $sc_seq_vert . "\" class=\"css_lenguaje__line\" style=\"" .  $sStyleReadLab_lenguaje_ . "\">" . $this->form_format_readonly("lenguaje_", $this->form_encode_input($lenguaje__look)) . "</span><span id=\"id_read_off_lenguaje_" . $sc_seq_vert . "\" class=\"css_read_off_lenguaje_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_lenguaje_ . "\">";
   echo " <span id=\"idAjaxSelect_lenguaje_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_lenguaje__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_lenguaje_" . $sc_seq_vert . "\" name=\"lenguaje_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->lenguaje_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->lenguaje_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lenguaje_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lenguaje_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 <textarea class="sc-js-input scFormObjectOddMult css_obs__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obs_<?php echo $sc_seq_vert ?>" id="id_sc_field_obs_<?php echo $sc_seq_vert ?>" rows="1" cols="30"
 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obs_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['correo_']) && $this->nmgp_cmp_hidden['correo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_correo__line" id="hidden_field_data_correo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_correo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_correo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_correo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo_"]) &&  $this->nmgp_cmp_readonly["correo_"] == "on") { 

 ?>
<input type="hidden" name="correo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_) . "\">" . $correo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-correo_<?php echo $sc_seq_vert ?> css_correo__line" style="<?php echo $sStyleReadLab_correo_; ?>"><?php echo $this->form_format_readonly("correo_", $this->form_encode_input($this->correo_)); ?></span><span id="id_read_off_correo_<?php echo $sc_seq_vert ?>" class="css_read_off_correo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_correo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo_<?php echo $sc_seq_vert ?>" type=text name="correo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=200 alt="{enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.correo_" . $sc_seq_vert . ".value != '') {window.open('mailto:' + document.F1.correo_" . $sc_seq_vert . ".value); }", "if (document.F1.correo_" . $sc_seq_vert . ".value != '') {window.open('mailto:' + document.F1.correo_" . $sc_seq_vert . ".value); }", "correo_" . $sc_seq_vert . "_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['correo_notificafe_']) && $this->nmgp_cmp_hidden['correo_notificafe_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo_notificafe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_notificafe_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_correo_notificafe__line" id="hidden_field_data_correo_notificafe_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_correo_notificafe_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_correo_notificafe__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_correo_notificafe_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo_notificafe_"]) &&  $this->nmgp_cmp_readonly["correo_notificafe_"] == "on") { 

 ?>
<input type="hidden" name="correo_notificafe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_notificafe_) . "\">" . $correo_notificafe_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo_notificafe_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-correo_notificafe_<?php echo $sc_seq_vert ?> css_correo_notificafe__line" style="<?php echo $sStyleReadLab_correo_notificafe_; ?>"><?php echo $this->form_format_readonly("correo_notificafe_", $this->form_encode_input($this->correo_notificafe_)); ?></span><span id="id_read_off_correo_notificafe_<?php echo $sc_seq_vert ?>" class="css_read_off_correo_notificafe_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo_notificafe_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_correo_notificafe__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo_notificafe_<?php echo $sc_seq_vert ?>" type=text name="correo_notificafe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($correo_notificafe_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=120 alt="{enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.correo_notificafe_" . $sc_seq_vert . ".value != '') {window.open('mailto:' + document.F1.correo_notificafe_" . $sc_seq_vert . ".value); }", "if (document.F1.correo_notificafe_" . $sc_seq_vert . ".value != '') {window.open('mailto:' + document.F1.correo_notificafe_" . $sc_seq_vert . ".value); }", "correo_notificafe_" . $sc_seq_vert . "_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('correo_notificafe_')", "nm_mostra_mens('correo_notificafe_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_notificafe_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_notificafe_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['celular_notificafe_']) && $this->nmgp_cmp_hidden['celular_notificafe_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="celular_notificafe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($celular_notificafe_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_celular_notificafe__line" id="hidden_field_data_celular_notificafe_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_celular_notificafe_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_celular_notificafe__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_celular_notificafe_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["celular_notificafe_"]) &&  $this->nmgp_cmp_readonly["celular_notificafe_"] == "on") { 

 ?>
<input type="hidden" name="celular_notificafe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($celular_notificafe_) . "\">" . $celular_notificafe_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_celular_notificafe_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-celular_notificafe_<?php echo $sc_seq_vert ?> css_celular_notificafe__line" style="<?php echo $sStyleReadLab_celular_notificafe_; ?>"><?php echo $this->form_format_readonly("celular_notificafe_", $this->form_encode_input($this->celular_notificafe_)); ?></span><span id="id_read_off_celular_notificafe_<?php echo $sc_seq_vert ?>" class="css_read_off_celular_notificafe_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_celular_notificafe_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_celular_notificafe__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_celular_notificafe_<?php echo $sc_seq_vert ?>" type=text name="celular_notificafe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($celular_notificafe_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=21 alt="{datatype: 'mask', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789-") ?>', lettersCase: '', maskList: '999-9999999', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('celular_notificafe_')", "nm_mostra_mens('celular_notificafe_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_celular_notificafe_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_celular_notificafe_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_idter_))
       {
           $this->nmgp_cmp_readonly['idter_'] = $sCheckRead_idter_;
       }
       if ('display: none;' == $sStyleHidden_idter_)
       {
           $this->nmgp_cmp_hidden['idter_'] = 'off';
       }
       if (isset($sCheckRead_iddepar_))
       {
           $this->nmgp_cmp_readonly['iddepar_'] = $sCheckRead_iddepar_;
       }
       if ('display: none;' == $sStyleHidden_iddepar_)
       {
           $this->nmgp_cmp_hidden['iddepar_'] = 'off';
       }
       if (isset($sCheckRead_idmuni_))
       {
           $this->nmgp_cmp_readonly['idmuni_'] = $sCheckRead_idmuni_;
       }
       if ('display: none;' == $sStyleHidden_idmuni_)
       {
           $this->nmgp_cmp_hidden['idmuni_'] = 'off';
       }
       if (isset($sCheckRead_ciudad_))
       {
           $this->nmgp_cmp_readonly['ciudad_'] = $sCheckRead_ciudad_;
       }
       if ('display: none;' == $sStyleHidden_ciudad_)
       {
           $this->nmgp_cmp_hidden['ciudad_'] = 'off';
       }
       if (isset($sCheckRead_direc_))
       {
           $this->nmgp_cmp_readonly['direc_'] = $sCheckRead_direc_;
       }
       if ('display: none;' == $sStyleHidden_direc_)
       {
           $this->nmgp_cmp_hidden['direc_'] = 'off';
       }
       if (isset($sCheckRead_codigo_postal_))
       {
           $this->nmgp_cmp_readonly['codigo_postal_'] = $sCheckRead_codigo_postal_;
       }
       if ('display: none;' == $sStyleHidden_codigo_postal_)
       {
           $this->nmgp_cmp_hidden['codigo_postal_'] = 'off';
       }
       if (isset($sCheckRead_telefono_))
       {
           $this->nmgp_cmp_readonly['telefono_'] = $sCheckRead_telefono_;
       }
       if ('display: none;' == $sStyleHidden_telefono_)
       {
           $this->nmgp_cmp_hidden['telefono_'] = 'off';
       }
       if (isset($sCheckRead_lenguaje_))
       {
           $this->nmgp_cmp_readonly['lenguaje_'] = $sCheckRead_lenguaje_;
       }
       if ('display: none;' == $sStyleHidden_lenguaje_)
       {
           $this->nmgp_cmp_hidden['lenguaje_'] = 'off';
       }
       if (isset($sCheckRead_obs_))
       {
           $this->nmgp_cmp_readonly['obs_'] = $sCheckRead_obs_;
       }
       if ('display: none;' == $sStyleHidden_obs_)
       {
           $this->nmgp_cmp_hidden['obs_'] = 'off';
       }
       if (isset($sCheckRead_correo_))
       {
           $this->nmgp_cmp_readonly['correo_'] = $sCheckRead_correo_;
       }
       if ('display: none;' == $sStyleHidden_correo_)
       {
           $this->nmgp_cmp_hidden['correo_'] = 'off';
       }
       if (isset($sCheckRead_correo_notificafe_))
       {
           $this->nmgp_cmp_readonly['correo_notificafe_'] = $sCheckRead_correo_notificafe_;
       }
       if ('display: none;' == $sStyleHidden_correo_notificafe_)
       {
           $this->nmgp_cmp_hidden['correo_notificafe_'] = 'off';
       }
       if (isset($sCheckRead_celular_notificafe_))
       {
           $this->nmgp_cmp_readonly['celular_notificafe_'] = $sCheckRead_celular_notificafe_;
       }
       if ('display: none;' == $sStyleHidden_celular_notificafe_)
       {
           $this->nmgp_cmp_hidden['celular_notificafe_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_direccion_180422 = $guarda_form_vert_form_direccion_180422;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['btn_label']['last'];
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
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_iframe'] != "R")
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_direccion_180422");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_direccion_180422");
 parent.scAjaxDetailHeight("form_direccion_180422", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_direccion_180422", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_direccion_180422", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['sc_modal'])
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
			do_ajax_form_direccion_180422_add_new_line(); return false;
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
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-6").length && $("#sc_b_del_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
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
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
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
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-14").length && $("#sc_b_avc_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-15").length && $("#sc_b_fim_b.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_direccion_180422']['buttonStatus'] = $this->nmgp_botoes;
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
