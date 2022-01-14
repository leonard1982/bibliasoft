<?php
class form_recibos_ingcaja_detalle_form extends form_recibos_ingcaja_detalle_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - recibos_ingcaja_detalle"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - recibos_ingcaja_detalle"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_recibos_ingcaja_detalle/form_recibos_ingcaja_detalle_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_recibos_ingcaja_detalle_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['last'] : 'off'); ?>";
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

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
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
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "factura_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "factura_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("factura_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_recibos_ingcaja_detalle_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('factura_1');

<?php
}
?>
  sc_form_onload();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_recibos_ingcaja_detalle_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_recibos_ingcaja_detalle'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_recibos_ingcaja_detalle'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - recibos_ingcaja_detalle"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - recibos_ingcaja_detalle"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_detalle_']))
   {
       $this->nmgp_cmp_hidden['id_detalle_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_recibo_']))
   {
       $this->nmgp_cmp_hidden['id_recibo_'] = 'off';
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
   <?php if ((!isset($this->nmgp_cmp_hidden['id_detalle_']) || $this->nmgp_cmp_hidden['id_detalle_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_detalle_'])) {
          $this->nm_new_label['id_detalle_'] = "Id Detalle"; } ?>

    <TD class="scFormLabelOddMult css_id_detalle__label" id="hidden_field_label_id_detalle_" style="<?php echo $sStyleHidden_id_detalle_; ?>" > <?php echo $this->nm_new_label['id_detalle_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_recibo_']) && $this->nmgp_cmp_hidden['id_recibo_'] == 'off') { $sStyleHidden_id_recibo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_recibo_']) || $this->nmgp_cmp_hidden['id_recibo_'] == 'on') {
      if (!isset($this->nm_new_label['id_recibo_'])) {
          $this->nm_new_label['id_recibo_'] = "Id Recibo"; } ?>

    <TD class="scFormLabelOddMult css_id_recibo__label" id="hidden_field_label_id_recibo_" style="<?php echo $sStyleHidden_id_recibo_; ?>" > <?php echo $this->nm_new_label['id_recibo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['factura_']) && $this->nmgp_cmp_hidden['factura_'] == 'off') { $sStyleHidden_factura_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['factura_']) || $this->nmgp_cmp_hidden['factura_'] == 'on') {
      if (!isset($this->nm_new_label['factura_'])) {
          $this->nm_new_label['factura_'] = "Factura"; } ?>

    <TD class="scFormLabelOddMult css_factura__label" id="hidden_field_label_factura_" style="<?php echo $sStyleHidden_factura_; ?>" > <?php echo $this->nm_new_label['factura_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['documento_']) && $this->nmgp_cmp_hidden['documento_'] == 'off') { $sStyleHidden_documento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['documento_']) || $this->nmgp_cmp_hidden['documento_'] == 'on') {
      if (!isset($this->nm_new_label['documento_'])) {
          $this->nm_new_label['documento_'] = ""; } ?>

    <TD class="scFormLabelOddMult css_documento__label" id="hidden_field_label_documento_" style="<?php echo $sStyleHidden_documento_; ?>" > <?php echo $this->nm_new_label['documento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_factura_']) && $this->nmgp_cmp_hidden['valor_factura_'] == 'off') { $sStyleHidden_valor_factura_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valor_factura_']) || $this->nmgp_cmp_hidden['valor_factura_'] == 'on') {
      if (!isset($this->nm_new_label['valor_factura_'])) {
          $this->nm_new_label['valor_factura_'] = "Valor pte. a cancelar"; } ?>

    <TD class="scFormLabelOddMult css_valor_factura__label" id="hidden_field_label_valor_factura_" style="<?php echo $sStyleHidden_valor_factura_; ?>" > <?php echo $this->nm_new_label['valor_factura_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_pagado_']) && $this->nmgp_cmp_hidden['valor_pagado_'] == 'off') { $sStyleHidden_valor_pagado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valor_pagado_']) || $this->nmgp_cmp_hidden['valor_pagado_'] == 'on') {
      if (!isset($this->nm_new_label['valor_pagado_'])) {
          $this->nm_new_label['valor_pagado_'] = "Valor Pagado"; } ?>

    <TD class="scFormLabelOddMult css_valor_pagado__label" id="hidden_field_label_valor_pagado_" style="<?php echo $sStyleHidden_valor_pagado_; ?>" > <?php echo $this->nm_new_label['valor_pagado_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['saldo_factura_']) && $this->nmgp_cmp_hidden['saldo_factura_'] == 'off') { $sStyleHidden_saldo_factura_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['saldo_factura_']) || $this->nmgp_cmp_hidden['saldo_factura_'] == 'on') {
      if (!isset($this->nm_new_label['saldo_factura_'])) {
          $this->nm_new_label['saldo_factura_'] = "Saldo Factura"; } ?>

    <TD class="scFormLabelOddMult css_saldo_factura__label" id="hidden_field_label_saldo_factura_" style="<?php echo $sStyleHidden_saldo_factura_; ?>" > <?php echo $this->nm_new_label['saldo_factura_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
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
       $iStart = sizeof($this->form_vert_form_recibos_ingcaja_detalle);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_recibos_ingcaja_detalle = $this->form_vert_form_recibos_ingcaja_detalle;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_recibos_ingcaja_detalle))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_detalle_']))
           {
               $this->nmgp_cmp_readonly['id_detalle_'] = 'on';
           }
   foreach ($this->form_vert_form_recibos_ingcaja_detalle as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_detalle_'] = true;
           $this->nmgp_cmp_readonly['id_recibo_'] = true;
           $this->nmgp_cmp_readonly['factura_'] = true;
           $this->nmgp_cmp_readonly['documento_'] = true;
           $this->nmgp_cmp_readonly['valor_factura_'] = true;
           $this->nmgp_cmp_readonly['valor_pagado_'] = true;
           $this->nmgp_cmp_readonly['saldo_factura_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_detalle_']) || $this->nmgp_cmp_readonly['id_detalle_'] != "on") {$this->nmgp_cmp_readonly['id_detalle_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_recibo_']) || $this->nmgp_cmp_readonly['id_recibo_'] != "on") {$this->nmgp_cmp_readonly['id_recibo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['factura_']) || $this->nmgp_cmp_readonly['factura_'] != "on") {$this->nmgp_cmp_readonly['factura_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['documento_']) || $this->nmgp_cmp_readonly['documento_'] != "on") {$this->nmgp_cmp_readonly['documento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valor_factura_']) || $this->nmgp_cmp_readonly['valor_factura_'] != "on") {$this->nmgp_cmp_readonly['valor_factura_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valor_pagado_']) || $this->nmgp_cmp_readonly['valor_pagado_'] != "on") {$this->nmgp_cmp_readonly['valor_pagado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['saldo_factura_']) || $this->nmgp_cmp_readonly['saldo_factura_'] != "on") {$this->nmgp_cmp_readonly['saldo_factura_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->id_detalle_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['id_detalle_']; 
       $id_detalle_ = $this->id_detalle_; 
       if (!isset($this->nmgp_cmp_hidden['id_detalle_']))
       {
           $this->nmgp_cmp_hidden['id_detalle_'] = 'off';
       }
       $sStyleHidden_id_detalle_ = '';
       if (isset($sCheckRead_id_detalle_))
       {
           unset($sCheckRead_id_detalle_);
       }
       if (isset($this->nmgp_cmp_readonly['id_detalle_']))
       {
           $sCheckRead_id_detalle_ = $this->nmgp_cmp_readonly['id_detalle_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_detalle_']) && $this->nmgp_cmp_hidden['id_detalle_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_detalle_']);
           $sStyleHidden_id_detalle_ = 'display: none;';
       }
       $bTestReadOnly_id_detalle_ = true;
       $sStyleReadLab_id_detalle_ = 'display: none;';
       $sStyleReadInp_id_detalle_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_detalle_"]) &&  $this->nmgp_cmp_readonly["id_detalle_"] == "on"))
       {
           $bTestReadOnly_id_detalle_ = false;
           unset($this->nmgp_cmp_readonly['id_detalle_']);
           $sStyleReadLab_id_detalle_ = '';
           $sStyleReadInp_id_detalle_ = 'display: none;';
       }
       $this->id_recibo_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['id_recibo_']; 
       $id_recibo_ = $this->id_recibo_; 
       if (!isset($this->nmgp_cmp_hidden['id_recibo_']))
       {
           $this->nmgp_cmp_hidden['id_recibo_'] = 'off';
       }
       $sStyleHidden_id_recibo_ = '';
       if (isset($sCheckRead_id_recibo_))
       {
           unset($sCheckRead_id_recibo_);
       }
       if (isset($this->nmgp_cmp_readonly['id_recibo_']))
       {
           $sCheckRead_id_recibo_ = $this->nmgp_cmp_readonly['id_recibo_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_recibo_']) && $this->nmgp_cmp_hidden['id_recibo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_recibo_']);
           $sStyleHidden_id_recibo_ = 'display: none;';
       }
       $bTestReadOnly_id_recibo_ = true;
       $sStyleReadLab_id_recibo_ = 'display: none;';
       $sStyleReadInp_id_recibo_ = '';
       if (isset($this->nmgp_cmp_readonly['id_recibo_']) && $this->nmgp_cmp_readonly['id_recibo_'] == 'on')
       {
           $bTestReadOnly_id_recibo_ = false;
           unset($this->nmgp_cmp_readonly['id_recibo_']);
           $sStyleReadLab_id_recibo_ = '';
           $sStyleReadInp_id_recibo_ = 'display: none;';
       }
       $this->factura_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['factura_']; 
       $factura_ = $this->factura_; 
       $sStyleHidden_factura_ = '';
       if (isset($sCheckRead_factura_))
       {
           unset($sCheckRead_factura_);
       }
       if (isset($this->nmgp_cmp_readonly['factura_']))
       {
           $sCheckRead_factura_ = $this->nmgp_cmp_readonly['factura_'];
       }
       if (isset($this->nmgp_cmp_hidden['factura_']) && $this->nmgp_cmp_hidden['factura_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['factura_']);
           $sStyleHidden_factura_ = 'display: none;';
       }
       $bTestReadOnly_factura_ = true;
       $sStyleReadLab_factura_ = 'display: none;';
       $sStyleReadInp_factura_ = '';
       if (isset($this->nmgp_cmp_readonly['factura_']) && $this->nmgp_cmp_readonly['factura_'] == 'on')
       {
           $bTestReadOnly_factura_ = false;
           unset($this->nmgp_cmp_readonly['factura_']);
           $sStyleReadLab_factura_ = '';
           $sStyleReadInp_factura_ = 'display: none;';
       }
       $this->documento_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['documento_']; 
       $documento_ = $this->documento_; 
       $sStyleHidden_documento_ = '';
       if (isset($sCheckRead_documento_))
       {
           unset($sCheckRead_documento_);
       }
       if (isset($this->nmgp_cmp_readonly['documento_']))
       {
           $sCheckRead_documento_ = $this->nmgp_cmp_readonly['documento_'];
       }
       if (isset($this->nmgp_cmp_hidden['documento_']) && $this->nmgp_cmp_hidden['documento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['documento_']);
           $sStyleHidden_documento_ = 'display: none;';
       }
       $bTestReadOnly_documento_ = true;
       $sStyleReadLab_documento_ = 'display: none;';
       $sStyleReadInp_documento_ = '';
       if (isset($this->nmgp_cmp_readonly['documento_']) && $this->nmgp_cmp_readonly['documento_'] == 'on')
       {
           $bTestReadOnly_documento_ = false;
           unset($this->nmgp_cmp_readonly['documento_']);
           $sStyleReadLab_documento_ = '';
           $sStyleReadInp_documento_ = 'display: none;';
       }
       $this->valor_factura_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['valor_factura_']; 
       $valor_factura_ = $this->valor_factura_; 
       $sStyleHidden_valor_factura_ = '';
       if (isset($sCheckRead_valor_factura_))
       {
           unset($sCheckRead_valor_factura_);
       }
       if (isset($this->nmgp_cmp_readonly['valor_factura_']))
       {
           $sCheckRead_valor_factura_ = $this->nmgp_cmp_readonly['valor_factura_'];
       }
       if (isset($this->nmgp_cmp_hidden['valor_factura_']) && $this->nmgp_cmp_hidden['valor_factura_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valor_factura_']);
           $sStyleHidden_valor_factura_ = 'display: none;';
       }
       $bTestReadOnly_valor_factura_ = true;
       $sStyleReadLab_valor_factura_ = 'display: none;';
       $sStyleReadInp_valor_factura_ = '';
       if (isset($this->nmgp_cmp_readonly['valor_factura_']) && $this->nmgp_cmp_readonly['valor_factura_'] == 'on')
       {
           $bTestReadOnly_valor_factura_ = false;
           unset($this->nmgp_cmp_readonly['valor_factura_']);
           $sStyleReadLab_valor_factura_ = '';
           $sStyleReadInp_valor_factura_ = 'display: none;';
       }
       $this->valor_pagado_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['valor_pagado_']; 
       $valor_pagado_ = $this->valor_pagado_; 
       $sStyleHidden_valor_pagado_ = '';
       if (isset($sCheckRead_valor_pagado_))
       {
           unset($sCheckRead_valor_pagado_);
       }
       if (isset($this->nmgp_cmp_readonly['valor_pagado_']))
       {
           $sCheckRead_valor_pagado_ = $this->nmgp_cmp_readonly['valor_pagado_'];
       }
       if (isset($this->nmgp_cmp_hidden['valor_pagado_']) && $this->nmgp_cmp_hidden['valor_pagado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valor_pagado_']);
           $sStyleHidden_valor_pagado_ = 'display: none;';
       }
       $bTestReadOnly_valor_pagado_ = true;
       $sStyleReadLab_valor_pagado_ = 'display: none;';
       $sStyleReadInp_valor_pagado_ = '';
       if (isset($this->nmgp_cmp_readonly['valor_pagado_']) && $this->nmgp_cmp_readonly['valor_pagado_'] == 'on')
       {
           $bTestReadOnly_valor_pagado_ = false;
           unset($this->nmgp_cmp_readonly['valor_pagado_']);
           $sStyleReadLab_valor_pagado_ = '';
           $sStyleReadInp_valor_pagado_ = 'display: none;';
       }
       $this->saldo_factura_ = $this->form_vert_form_recibos_ingcaja_detalle[$sc_seq_vert]['saldo_factura_']; 
       $saldo_factura_ = $this->saldo_factura_; 
       $sStyleHidden_saldo_factura_ = '';
       if (isset($sCheckRead_saldo_factura_))
       {
           unset($sCheckRead_saldo_factura_);
       }
       if (isset($this->nmgp_cmp_readonly['saldo_factura_']))
       {
           $sCheckRead_saldo_factura_ = $this->nmgp_cmp_readonly['saldo_factura_'];
       }
       if (isset($this->nmgp_cmp_hidden['saldo_factura_']) && $this->nmgp_cmp_hidden['saldo_factura_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['saldo_factura_']);
           $sStyleHidden_saldo_factura_ = 'display: none;';
       }
       $bTestReadOnly_saldo_factura_ = true;
       $sStyleReadLab_saldo_factura_ = 'display: none;';
       $sStyleReadInp_saldo_factura_ = '';
       if (isset($this->nmgp_cmp_readonly['saldo_factura_']) && $this->nmgp_cmp_readonly['saldo_factura_'] == 'on')
       {
           $bTestReadOnly_saldo_factura_ = false;
           unset($this->nmgp_cmp_readonly['saldo_factura_']);
           $sStyleReadLab_saldo_factura_ = '';
           $sStyleReadInp_saldo_factura_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_recibos_ingcaja_detalle_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_recibos_ingcaja_detalle_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_recibos_ingcaja_detalle_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_recibos_ingcaja_detalle_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_recibos_ingcaja_detalle_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_recibos_ingcaja_detalle_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_detalle_']) && $this->nmgp_cmp_hidden['id_detalle_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_detalle_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_detalle_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id_detalle__line" id="hidden_field_data_id_detalle_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_detalle_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_detalle__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_detalle_<?php echo $sc_seq_vert ?>" class="css_id_detalle__line" style="<?php echo $sStyleReadLab_id_detalle_; ?>"><?php echo $this->form_format_readonly("id_detalle_", $this->form_encode_input($this->id_detalle_)); ?></span><span id="id_read_off_id_detalle_<?php echo $sc_seq_vert ?>" class="css_read_off_id_detalle_" style="<?php echo $sStyleReadInp_id_detalle_; ?>"><input type="hidden" id="id_sc_field_id_detalle_<?php echo $sc_seq_vert ?>" name="id_detalle_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_detalle_) . "\">"?>
<span id="id_ajax_label_id_detalle_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_detalle_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_detalle_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_detalle_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_recibo_']) && $this->nmgp_cmp_hidden['id_recibo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_recibo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_recibo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_recibo__line" id="hidden_field_data_id_recibo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_recibo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_recibo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_recibo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_recibo_"]) &&  $this->nmgp_cmp_readonly["id_recibo_"] == "on") { 

 ?>
<input type="hidden" name="id_recibo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_recibo_) . "\">" . $id_recibo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_recibo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_recibo_<?php echo $sc_seq_vert ?> css_id_recibo__line" style="<?php echo $sStyleReadLab_id_recibo_; ?>"><?php echo $this->form_format_readonly("id_recibo_", $this->form_encode_input($this->id_recibo_)); ?></span><span id="id_read_off_id_recibo_<?php echo $sc_seq_vert ?>" class="css_read_off_id_recibo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_recibo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_recibo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_recibo_<?php echo $sc_seq_vert ?>" type=text name="id_recibo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_recibo_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_recibo_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_recibo_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id_recibo_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_recibo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_recibo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['factura_']) && $this->nmgp_cmp_hidden['factura_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->factura_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_factura__line" id="hidden_field_data_factura_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_factura_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_factura__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_factura_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factura_"]) &&  $this->nmgp_cmp_readonly["factura_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_'] = array(); 
    }

   $old_value_id_detalle_ = $this->id_detalle_;
   $old_value_id_recibo_ = $this->id_recibo_;
   $old_value_valor_factura_ = $this->valor_factura_;
   $old_value_valor_pagado_ = $this->valor_pagado_;
   $old_value_saldo_factura_ = $this->saldo_factura_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_detalle_ = $this->id_detalle_;
   $unformatted_value_id_recibo_ = $this->id_recibo_;
   $unformatted_value_valor_factura_ = $this->valor_factura_;
   $unformatted_value_valor_pagado_ = $this->valor_pagado_;
   $unformatted_value_saldo_factura_ = $this->saldo_factura_;

   $nm_comando = "SELECT id, (select concat((select prefijo from resdian WHERE Idres = f.resolucion),'-', f.numfacven) from facturaven_contratos f where f.idfacven = factura) as factu FROM terceros_contratos_factura WHERE id_contrato = " . $_SESSION['gElContrato'] . " and saldo>0 ORDER BY factura";

   $this->id_detalle_ = $old_value_id_detalle_;
   $this->id_recibo_ = $old_value_id_recibo_;
   $this->valor_factura_ = $old_value_valor_factura_;
   $this->valor_pagado_ = $old_value_valor_pagado_;
   $this->saldo_factura_ = $old_value_saldo_factura_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_'][] = $rs->fields[0];
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
   $factura__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->factura__1))
          {
              foreach ($this->factura__1 as $tmp_factura_)
              {
                  if (trim($tmp_factura_) === trim($cadaselect[1])) { $factura__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->factura_) === trim($cadaselect[1])) { $factura__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($factura_) . "\">" . $factura__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_factura_();
   $x = 0 ; 
   $factura__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->factura__1))
          {
              foreach ($this->factura__1 as $tmp_factura_)
              {
                  if (trim($tmp_factura_) === trim($cadaselect[1])) { $factura__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->factura_) === trim($cadaselect[1])) { $factura__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($factura__look))
          {
              $factura__look = $this->factura_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_factura_" . $sc_seq_vert . "\" class=\"css_factura__line\" style=\"" .  $sStyleReadLab_factura_ . "\">" . $this->form_format_readonly("factura_", $this->form_encode_input($factura__look)) . "</span><span id=\"id_read_off_factura_" . $sc_seq_vert . "\" class=\"css_read_off_factura_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_factura_ . "\">";
   echo " <span id=\"idAjaxSelect_factura_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_factura__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_factura_" . $sc_seq_vert . "\" name=\"factura_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['Lookup_factura_'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->factura_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->factura_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factura_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factura_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['documento_']) && $this->nmgp_cmp_hidden['documento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_documento__line" id="hidden_field_data_documento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_documento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_documento__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_); ?>"><span id="id_ajax_label_documento_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($documento_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_documento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_documento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_factura_']) && $this->nmgp_cmp_hidden['valor_factura_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_factura_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valor_factura__line" id="hidden_field_data_valor_factura_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valor_factura_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valor_factura__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_valor_factura_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_factura_"]) &&  $this->nmgp_cmp_readonly["valor_factura_"] == "on") { 

 ?>
<input type="hidden" name="valor_factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_factura_) . "\">" . $valor_factura_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_factura_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-valor_factura_<?php echo $sc_seq_vert ?> css_valor_factura__line" style="<?php echo $sStyleReadLab_valor_factura_; ?>"><?php echo $this->form_format_readonly("valor_factura_", $this->form_encode_input($this->valor_factura_)); ?></span><span id="id_read_off_valor_factura_<?php echo $sc_seq_vert ?>" class="css_read_off_valor_factura_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_factura_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_valor_factura__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_factura_<?php echo $sc_seq_vert ?>" type=text name="valor_factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_factura_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_factura_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_factura_']['format_pos'] || 3 == $this->field_config['valor_factura_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_factura_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_factura_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_factura_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_factura_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_factura_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_factura_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_pagado_']) && $this->nmgp_cmp_hidden['valor_pagado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_pagado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_pagado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valor_pagado__line" id="hidden_field_data_valor_pagado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valor_pagado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valor_pagado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_valor_pagado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_pagado_"]) &&  $this->nmgp_cmp_readonly["valor_pagado_"] == "on") { 

 ?>
<input type="hidden" name="valor_pagado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_pagado_) . "\">" . $valor_pagado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_pagado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-valor_pagado_<?php echo $sc_seq_vert ?> css_valor_pagado__line" style="<?php echo $sStyleReadLab_valor_pagado_; ?>"><?php echo $this->form_format_readonly("valor_pagado_", $this->form_encode_input($this->valor_pagado_)); ?></span><span id="id_read_off_valor_pagado_<?php echo $sc_seq_vert ?>" class="css_read_off_valor_pagado_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_pagado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_valor_pagado__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_pagado_<?php echo $sc_seq_vert ?>" type=text name="valor_pagado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valor_pagado_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_pagado_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_pagado_']['format_pos'] || 3 == $this->field_config['valor_pagado_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_pagado_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_pagado_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_pagado_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_pagado_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_pagado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_pagado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['saldo_factura_']) && $this->nmgp_cmp_hidden['saldo_factura_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo_factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldo_factura_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_saldo_factura__line" id="hidden_field_data_saldo_factura_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_saldo_factura_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_saldo_factura__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_saldo_factura_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["saldo_factura_"]) &&  $this->nmgp_cmp_readonly["saldo_factura_"] == "on") { 

 ?>
<input type="hidden" name="saldo_factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldo_factura_) . "\">" . $saldo_factura_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_saldo_factura_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-saldo_factura_<?php echo $sc_seq_vert ?> css_saldo_factura__line" style="<?php echo $sStyleReadLab_saldo_factura_; ?>"><?php echo $this->form_format_readonly("saldo_factura_", $this->form_encode_input($this->saldo_factura_)); ?></span><span id="id_read_off_saldo_factura_<?php echo $sc_seq_vert ?>" class="css_read_off_saldo_factura_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saldo_factura_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_saldo_factura__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saldo_factura_<?php echo $sc_seq_vert ?>" type=text name="saldo_factura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($saldo_factura_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['saldo_factura_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['saldo_factura_']['format_pos'] || 3 == $this->field_config['saldo_factura_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo_factura_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldo_factura_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldo_factura_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldo_factura_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_factura_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_factura_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_detalle_))
       {
           $this->nmgp_cmp_readonly['id_detalle_'] = $sCheckRead_id_detalle_;
       }
       if ('display: none;' == $sStyleHidden_id_detalle_)
       {
           $this->nmgp_cmp_hidden['id_detalle_'] = 'off';
       }
       if (isset($sCheckRead_id_recibo_))
       {
           $this->nmgp_cmp_readonly['id_recibo_'] = $sCheckRead_id_recibo_;
       }
       if ('display: none;' == $sStyleHidden_id_recibo_)
       {
           $this->nmgp_cmp_hidden['id_recibo_'] = 'off';
       }
       if (isset($sCheckRead_factura_))
       {
           $this->nmgp_cmp_readonly['factura_'] = $sCheckRead_factura_;
       }
       if ('display: none;' == $sStyleHidden_factura_)
       {
           $this->nmgp_cmp_hidden['factura_'] = 'off';
       }
       if (isset($sCheckRead_documento_))
       {
           $this->nmgp_cmp_readonly['documento_'] = $sCheckRead_documento_;
       }
       if ('display: none;' == $sStyleHidden_documento_)
       {
           $this->nmgp_cmp_hidden['documento_'] = 'off';
       }
       if (isset($sCheckRead_valor_factura_))
       {
           $this->nmgp_cmp_readonly['valor_factura_'] = $sCheckRead_valor_factura_;
       }
       if ('display: none;' == $sStyleHidden_valor_factura_)
       {
           $this->nmgp_cmp_hidden['valor_factura_'] = 'off';
       }
       if (isset($sCheckRead_valor_pagado_))
       {
           $this->nmgp_cmp_readonly['valor_pagado_'] = $sCheckRead_valor_pagado_;
       }
       if ('display: none;' == $sStyleHidden_valor_pagado_)
       {
           $this->nmgp_cmp_hidden['valor_pagado_'] = 'off';
       }
       if (isset($sCheckRead_saldo_factura_))
       {
           $this->nmgp_cmp_readonly['saldo_factura_'] = $sCheckRead_saldo_factura_;
       }
       if ('display: none;' == $sStyleHidden_saldo_factura_)
       {
           $this->nmgp_cmp_hidden['saldo_factura_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_recibos_ingcaja_detalle = $guarda_form_vert_form_recibos_ingcaja_detalle;
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_recibos_ingcaja_detalle");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_recibos_ingcaja_detalle");
 parent.scAjaxDetailHeight("form_recibos_ingcaja_detalle", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_recibos_ingcaja_detalle", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_recibos_ingcaja_detalle", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['sc_modal'])
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
			do_ajax_form_recibos_ingcaja_detalle_add_new_line(); return false;
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
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['buttonStatus'] = $this->nmgp_botoes;
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
