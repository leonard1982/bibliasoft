<?php
class form_detallepagos_rc_020521_form extends form_detallepagos_rc_020521_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - detallepagos"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - detallepagos"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['sc_redir_atualiz'] == 'ok')
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
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_fechacob_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detallepagos_rc_020521/form_detallepagos_rc_020521_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detallepagos_rc_020521_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "idfp_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "idfp_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "monto_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "monto_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("idfp_=enabled", "", i);
    nm_field_disabled("monto_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_detallepagos_rc_020521_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('idfp_1');

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
$str_iframe_body = 'margin-top: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_detallepagos_rc_020521_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_detallepagos_rc_020521'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detallepagos_rc_020521'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['balterarsel'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['bexcluirsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['bexcluirsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['bexcluirsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['bexcluirsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['bexcluirsel'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluirsel", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['idfact_']))
   {
       $this->nmgp_cmp_hidden['idfact_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idrc_']))
   {
       $this->nmgp_cmp_hidden['idrc_'] = 'off';
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
   <?php if (isset($this->nmgp_cmp_hidden['idrc_']) && $this->nmgp_cmp_hidden['idrc_'] == 'off') { $sStyleHidden_idrc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idrc_']) || $this->nmgp_cmp_hidden['idrc_'] == 'on') {
      if (!isset($this->nm_new_label['idrc_'])) {
          $this->nm_new_label['idrc_'] = "Idrc"; } ?>

    <TD class="scFormLabelOddMult css_idrc__label" id="hidden_field_label_idrc_" style="<?php echo $sStyleHidden_idrc_; ?>" > <?php echo $this->nm_new_label['idrc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idfact_']) && $this->nmgp_cmp_hidden['idfact_'] == 'off') { $sStyleHidden_idfact_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idfact_']) || $this->nmgp_cmp_hidden['idfact_'] == 'on') {
      if (!isset($this->nm_new_label['idfact_'])) {
          $this->nm_new_label['idfact_'] = "Idfact"; } ?>

    <TD class="scFormLabelOddMult css_idfact__label" id="hidden_field_label_idfact_" style="<?php echo $sStyleHidden_idfact_; ?>" > <?php echo $this->nm_new_label['idfact_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idbanco_caja_']) && $this->nmgp_cmp_hidden['idbanco_caja_'] == 'off') { $sStyleHidden_idbanco_caja_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idbanco_caja_']) || $this->nmgp_cmp_hidden['idbanco_caja_'] == 'on') {
      if (!isset($this->nm_new_label['idbanco_caja_'])) {
          $this->nm_new_label['idbanco_caja_'] = "Banco"; } ?>

    <TD class="scFormLabelOddMult css_idbanco_caja__label" id="hidden_field_label_idbanco_caja_" style="<?php echo $sStyleHidden_idbanco_caja_; ?>" > <?php echo $this->nm_new_label['idbanco_caja_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idfp_']) && $this->nmgp_cmp_hidden['idfp_'] == 'off') { $sStyleHidden_idfp_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idfp_']) || $this->nmgp_cmp_hidden['idfp_'] == 'on') {
      if (!isset($this->nm_new_label['idfp_'])) {
          $this->nm_new_label['idfp_'] = "Forma de pago"; } ?>

    <TD class="scFormLabelOddMult css_idfp__label" id="hidden_field_label_idfp_" style="<?php echo $sStyleHidden_idfp_; ?>" > <?php echo $this->nm_new_label['idfp_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['monto_']) && $this->nmgp_cmp_hidden['monto_'] == 'off') { $sStyleHidden_monto_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['monto_']) || $this->nmgp_cmp_hidden['monto_'] == 'on') {
      if (!isset($this->nm_new_label['monto_'])) {
          $this->nm_new_label['monto_'] = "Monto"; } ?>

    <TD class="scFormLabelOddMult css_monto__label" id="hidden_field_label_monto_" style="<?php echo $sStyleHidden_monto_; ?>" > <?php echo $this->nm_new_label['monto_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off') { $sStyleHidden_banco_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['banco_']) || $this->nmgp_cmp_hidden['banco_'] == 'on') {
      if (!isset($this->nm_new_label['banco_'])) {
          $this->nm_new_label['banco_'] = "Banco"; } ?>

    <TD class="scFormLabelOddMult css_banco__label" id="hidden_field_label_banco_" style="<?php echo $sStyleHidden_banco_; ?>" > <?php echo $this->nm_new_label['banco_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['numcheque_']) && $this->nmgp_cmp_hidden['numcheque_'] == 'off') { $sStyleHidden_numcheque_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['numcheque_']) || $this->nmgp_cmp_hidden['numcheque_'] == 'on') {
      if (!isset($this->nm_new_label['numcheque_'])) {
          $this->nm_new_label['numcheque_'] = "Número cheque"; } ?>

    <TD class="scFormLabelOddMult css_numcheque__label" id="hidden_field_label_numcheque_" style="<?php echo $sStyleHidden_numcheque_; ?>" > <?php echo $this->nm_new_label['numcheque_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fechacob_']) && $this->nmgp_cmp_hidden['fechacob_'] == 'off') { $sStyleHidden_fechacob_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fechacob_']) || $this->nmgp_cmp_hidden['fechacob_'] == 'on') {
      if (!isset($this->nm_new_label['fechacob_'])) {
          $this->nm_new_label['fechacob_'] = "Fecha del cheque"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['fechacob_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_fechacob__label" id="hidden_field_label_fechacob_" style="<?php echo $sStyleHidden_fechacob_; ?>" > <?php echo $this->nm_new_label['fechacob_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
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
       $iStart = sizeof($this->form_vert_form_detallepagos_rc_020521);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detallepagos_rc_020521 = $this->form_vert_form_detallepagos_rc_020521;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detallepagos_rc_020521))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_detallepagos_rc_020521 as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->iddetall_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['iddetall_'];
       $this->id_pago_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['id_pago_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['idrc_'] = true;
           $this->nmgp_cmp_readonly['idfact_'] = true;
           $this->nmgp_cmp_readonly['idbanco_caja_'] = true;
           $this->nmgp_cmp_readonly['idfp_'] = true;
           $this->nmgp_cmp_readonly['monto_'] = true;
           $this->nmgp_cmp_readonly['banco_'] = true;
           $this->nmgp_cmp_readonly['numcheque_'] = true;
           $this->nmgp_cmp_readonly['fechacob_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['idrc_']) || $this->nmgp_cmp_readonly['idrc_'] != "on") {$this->nmgp_cmp_readonly['idrc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idfact_']) || $this->nmgp_cmp_readonly['idfact_'] != "on") {$this->nmgp_cmp_readonly['idfact_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idbanco_caja_']) || $this->nmgp_cmp_readonly['idbanco_caja_'] != "on") {$this->nmgp_cmp_readonly['idbanco_caja_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idfp_']) || $this->nmgp_cmp_readonly['idfp_'] != "on") {$this->nmgp_cmp_readonly['idfp_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['monto_']) || $this->nmgp_cmp_readonly['monto_'] != "on") {$this->nmgp_cmp_readonly['monto_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['banco_']) || $this->nmgp_cmp_readonly['banco_'] != "on") {$this->nmgp_cmp_readonly['banco_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['numcheque_']) || $this->nmgp_cmp_readonly['numcheque_'] != "on") {$this->nmgp_cmp_readonly['numcheque_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fechacob_']) || $this->nmgp_cmp_readonly['fechacob_'] != "on") {$this->nmgp_cmp_readonly['fechacob_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->idrc_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['idrc_']; 
       $idrc_ = $this->idrc_; 
       if (!isset($this->nmgp_cmp_hidden['idrc_']))
       {
           $this->nmgp_cmp_hidden['idrc_'] = 'off';
       }
       $sStyleHidden_idrc_ = '';
       if (isset($sCheckRead_idrc_))
       {
           unset($sCheckRead_idrc_);
       }
       if (isset($this->nmgp_cmp_readonly['idrc_']))
       {
           $sCheckRead_idrc_ = $this->nmgp_cmp_readonly['idrc_'];
       }
       if (isset($this->nmgp_cmp_hidden['idrc_']) && $this->nmgp_cmp_hidden['idrc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idrc_']);
           $sStyleHidden_idrc_ = 'display: none;';
       }
       $bTestReadOnly_idrc_ = true;
       $sStyleReadLab_idrc_ = 'display: none;';
       $sStyleReadInp_idrc_ = '';
       if (isset($this->nmgp_cmp_readonly['idrc_']) && $this->nmgp_cmp_readonly['idrc_'] == 'on')
       {
           $bTestReadOnly_idrc_ = false;
           unset($this->nmgp_cmp_readonly['idrc_']);
           $sStyleReadLab_idrc_ = '';
           $sStyleReadInp_idrc_ = 'display: none;';
       }
       $this->idfact_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['idfact_']; 
       $idfact_ = $this->idfact_; 
       if (!isset($this->nmgp_cmp_hidden['idfact_']))
       {
           $this->nmgp_cmp_hidden['idfact_'] = 'off';
       }
       $sStyleHidden_idfact_ = '';
       if (isset($sCheckRead_idfact_))
       {
           unset($sCheckRead_idfact_);
       }
       if (isset($this->nmgp_cmp_readonly['idfact_']))
       {
           $sCheckRead_idfact_ = $this->nmgp_cmp_readonly['idfact_'];
       }
       if (isset($this->nmgp_cmp_hidden['idfact_']) && $this->nmgp_cmp_hidden['idfact_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idfact_']);
           $sStyleHidden_idfact_ = 'display: none;';
       }
       $bTestReadOnly_idfact_ = true;
       $sStyleReadLab_idfact_ = 'display: none;';
       $sStyleReadInp_idfact_ = '';
       if (isset($this->nmgp_cmp_readonly['idfact_']) && $this->nmgp_cmp_readonly['idfact_'] == 'on')
       {
           $bTestReadOnly_idfact_ = false;
           unset($this->nmgp_cmp_readonly['idfact_']);
           $sStyleReadLab_idfact_ = '';
           $sStyleReadInp_idfact_ = 'display: none;';
       }
       $this->idbanco_caja_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['idbanco_caja_']; 
       $idbanco_caja_ = $this->idbanco_caja_; 
       $sStyleHidden_idbanco_caja_ = '';
       if (isset($sCheckRead_idbanco_caja_))
       {
           unset($sCheckRead_idbanco_caja_);
       }
       if (isset($this->nmgp_cmp_readonly['idbanco_caja_']))
       {
           $sCheckRead_idbanco_caja_ = $this->nmgp_cmp_readonly['idbanco_caja_'];
       }
       if (isset($this->nmgp_cmp_hidden['idbanco_caja_']) && $this->nmgp_cmp_hidden['idbanco_caja_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idbanco_caja_']);
           $sStyleHidden_idbanco_caja_ = 'display: none;';
       }
       $bTestReadOnly_idbanco_caja_ = true;
       $sStyleReadLab_idbanco_caja_ = 'display: none;';
       $sStyleReadInp_idbanco_caja_ = '';
       if (isset($this->nmgp_cmp_readonly['idbanco_caja_']) && $this->nmgp_cmp_readonly['idbanco_caja_'] == 'on')
       {
           $bTestReadOnly_idbanco_caja_ = false;
           unset($this->nmgp_cmp_readonly['idbanco_caja_']);
           $sStyleReadLab_idbanco_caja_ = '';
           $sStyleReadInp_idbanco_caja_ = 'display: none;';
       }
       $this->idfp_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['idfp_']; 
       $idfp_ = $this->idfp_; 
       $sStyleHidden_idfp_ = '';
       if (isset($sCheckRead_idfp_))
       {
           unset($sCheckRead_idfp_);
       }
       if (isset($this->nmgp_cmp_readonly['idfp_']))
       {
           $sCheckRead_idfp_ = $this->nmgp_cmp_readonly['idfp_'];
       }
       if (isset($this->nmgp_cmp_hidden['idfp_']) && $this->nmgp_cmp_hidden['idfp_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idfp_']);
           $sStyleHidden_idfp_ = 'display: none;';
       }
       $bTestReadOnly_idfp_ = true;
       $sStyleReadLab_idfp_ = 'display: none;';
       $sStyleReadInp_idfp_ = '';
       if (isset($this->nmgp_cmp_readonly['idfp_']) && $this->nmgp_cmp_readonly['idfp_'] == 'on')
       {
           $bTestReadOnly_idfp_ = false;
           unset($this->nmgp_cmp_readonly['idfp_']);
           $sStyleReadLab_idfp_ = '';
           $sStyleReadInp_idfp_ = 'display: none;';
       }
       $this->monto_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['monto_']; 
       $monto_ = $this->monto_; 
       $sStyleHidden_monto_ = '';
       if (isset($sCheckRead_monto_))
       {
           unset($sCheckRead_monto_);
       }
       if (isset($this->nmgp_cmp_readonly['monto_']))
       {
           $sCheckRead_monto_ = $this->nmgp_cmp_readonly['monto_'];
       }
       if (isset($this->nmgp_cmp_hidden['monto_']) && $this->nmgp_cmp_hidden['monto_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['monto_']);
           $sStyleHidden_monto_ = 'display: none;';
       }
       $bTestReadOnly_monto_ = true;
       $sStyleReadLab_monto_ = 'display: none;';
       $sStyleReadInp_monto_ = '';
       if (isset($this->nmgp_cmp_readonly['monto_']) && $this->nmgp_cmp_readonly['monto_'] == 'on')
       {
           $bTestReadOnly_monto_ = false;
           unset($this->nmgp_cmp_readonly['monto_']);
           $sStyleReadLab_monto_ = '';
           $sStyleReadInp_monto_ = 'display: none;';
       }
       $this->banco_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['banco_']; 
       $banco_ = $this->banco_; 
       $sStyleHidden_banco_ = '';
       if (isset($sCheckRead_banco_))
       {
           unset($sCheckRead_banco_);
       }
       if (isset($this->nmgp_cmp_readonly['banco_']))
       {
           $sCheckRead_banco_ = $this->nmgp_cmp_readonly['banco_'];
       }
       if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['banco_']);
           $sStyleHidden_banco_ = 'display: none;';
       }
       $bTestReadOnly_banco_ = true;
       $sStyleReadLab_banco_ = 'display: none;';
       $sStyleReadInp_banco_ = '';
       if (isset($this->nmgp_cmp_readonly['banco_']) && $this->nmgp_cmp_readonly['banco_'] == 'on')
       {
           $bTestReadOnly_banco_ = false;
           unset($this->nmgp_cmp_readonly['banco_']);
           $sStyleReadLab_banco_ = '';
           $sStyleReadInp_banco_ = 'display: none;';
       }
       $this->numcheque_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['numcheque_']; 
       $numcheque_ = $this->numcheque_; 
       $sStyleHidden_numcheque_ = '';
       if (isset($sCheckRead_numcheque_))
       {
           unset($sCheckRead_numcheque_);
       }
       if (isset($this->nmgp_cmp_readonly['numcheque_']))
       {
           $sCheckRead_numcheque_ = $this->nmgp_cmp_readonly['numcheque_'];
       }
       if (isset($this->nmgp_cmp_hidden['numcheque_']) && $this->nmgp_cmp_hidden['numcheque_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numcheque_']);
           $sStyleHidden_numcheque_ = 'display: none;';
       }
       $bTestReadOnly_numcheque_ = true;
       $sStyleReadLab_numcheque_ = 'display: none;';
       $sStyleReadInp_numcheque_ = '';
       if (isset($this->nmgp_cmp_readonly['numcheque_']) && $this->nmgp_cmp_readonly['numcheque_'] == 'on')
       {
           $bTestReadOnly_numcheque_ = false;
           unset($this->nmgp_cmp_readonly['numcheque_']);
           $sStyleReadLab_numcheque_ = '';
           $sStyleReadInp_numcheque_ = 'display: none;';
       }
       $this->fechacob_ = $this->form_vert_form_detallepagos_rc_020521[$sc_seq_vert]['fechacob_']; 
       $fechacob_ = $this->fechacob_; 
       $sStyleHidden_fechacob_ = '';
       if (isset($sCheckRead_fechacob_))
       {
           unset($sCheckRead_fechacob_);
       }
       if (isset($this->nmgp_cmp_readonly['fechacob_']))
       {
           $sCheckRead_fechacob_ = $this->nmgp_cmp_readonly['fechacob_'];
       }
       if (isset($this->nmgp_cmp_hidden['fechacob_']) && $this->nmgp_cmp_hidden['fechacob_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fechacob_']);
           $sStyleHidden_fechacob_ = 'display: none;';
       }
       $bTestReadOnly_fechacob_ = true;
       $sStyleReadLab_fechacob_ = 'display: none;';
       $sStyleReadInp_fechacob_ = '';
       if (isset($this->nmgp_cmp_readonly['fechacob_']) && $this->nmgp_cmp_readonly['fechacob_'] == 'on')
       {
           $bTestReadOnly_fechacob_ = false;
           unset($this->nmgp_cmp_readonly['fechacob_']);
           $sStyleReadLab_fechacob_ = '';
           $sStyleReadInp_fechacob_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detallepagos_rc_020521_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detallepagos_rc_020521_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallepagos_rc_020521_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detallepagos_rc_020521_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallepagos_rc_020521_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detallepagos_rc_020521_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['idrc_']) && $this->nmgp_cmp_hidden['idrc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idrc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idrc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idrc__line" id="hidden_field_data_idrc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idrc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idrc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idrc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idrc_"]) &&  $this->nmgp_cmp_readonly["idrc_"] == "on") { 

 ?>
<input type="hidden" name="idrc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idrc_) . "\">" . $idrc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_idrc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idrc_<?php echo $sc_seq_vert ?> css_idrc__line" style="<?php echo $sStyleReadLab_idrc_; ?>"><?php echo $this->form_format_readonly("idrc_", $this->form_encode_input($this->idrc_)); ?></span><span id="id_read_off_idrc_<?php echo $sc_seq_vert ?>" class="css_read_off_idrc_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idrc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idrc__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idrc_<?php echo $sc_seq_vert ?>" type=text name="idrc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idrc_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idrc_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idrc_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idrc_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idrc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idrc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idfact_']) && $this->nmgp_cmp_hidden['idfact_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idfact_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idfact_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idfact__line" id="hidden_field_data_idfact_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idfact_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idfact__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idfact_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfact_"]) &&  $this->nmgp_cmp_readonly["idfact_"] == "on") { 

 ?>
<input type="hidden" name="idfact_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idfact_) . "\">" . $idfact_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_idfact_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idfact_<?php echo $sc_seq_vert ?> css_idfact__line" style="<?php echo $sStyleReadLab_idfact_; ?>"><?php echo $this->form_format_readonly("idfact_", $this->form_encode_input($this->idfact_)); ?></span><span id="id_read_off_idfact_<?php echo $sc_seq_vert ?>" class="css_read_off_idfact_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idfact_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idfact__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idfact_<?php echo $sc_seq_vert ?>" type=text name="idfact_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idfact_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idfact_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idfact_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idfact_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfact_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfact_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idbanco_caja_']) && $this->nmgp_cmp_hidden['idbanco_caja_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idbanco_caja_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idbanco_caja_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idbanco_caja__line" id="hidden_field_data_idbanco_caja_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idbanco_caja_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idbanco_caja__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idbanco_caja_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idbanco_caja_"]) &&  $this->nmgp_cmp_readonly["idbanco_caja_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_'] = array(); 
    }

   $old_value_idrc_ = $this->idrc_;
   $old_value_idfact_ = $this->idfact_;
   $old_value_monto_ = $this->monto_;
   $old_value_fechacob_ = $this->fechacob_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idrc_ = $this->idrc_;
   $unformatted_value_idfact_ = $this->idfact_;
   $unformatted_value_monto_ = $this->monto_;
   $unformatted_value_fechacob_ = $this->fechacob_;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->idrc_ = $old_value_idrc_;
   $this->idfact_ = $old_value_idfact_;
   $this->monto_ = $old_value_monto_;
   $this->fechacob_ = $old_value_fechacob_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idbanco_caja_'][] = $rs->fields[0];
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
   $idbanco_caja__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbanco_caja__1))
          {
              foreach ($this->idbanco_caja__1 as $tmp_idbanco_caja_)
              {
                  if (trim($tmp_idbanco_caja_) === trim($cadaselect[1])) { $idbanco_caja__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbanco_caja_) === trim($cadaselect[1])) { $idbanco_caja__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idbanco_caja_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idbanco_caja_) . "\">" . $idbanco_caja__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idbanco_caja_();
   $x = 0 ; 
   $idbanco_caja__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbanco_caja__1))
          {
              foreach ($this->idbanco_caja__1 as $tmp_idbanco_caja_)
              {
                  if (trim($tmp_idbanco_caja_) === trim($cadaselect[1])) { $idbanco_caja__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbanco_caja_) === trim($cadaselect[1])) { $idbanco_caja__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idbanco_caja__look))
          {
              $idbanco_caja__look = $this->idbanco_caja_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idbanco_caja_" . $sc_seq_vert . "\" class=\"css_idbanco_caja__line\" style=\"" .  $sStyleReadLab_idbanco_caja_ . "\">" . $this->form_format_readonly("idbanco_caja_", $this->form_encode_input($idbanco_caja__look)) . "</span><span id=\"id_read_off_idbanco_caja_" . $sc_seq_vert . "\" class=\"css_read_off_idbanco_caja_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idbanco_caja_ . "\">";
   echo " <span id=\"idAjaxSelect_idbanco_caja_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idbanco_caja__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idbanco_caja_" . $sc_seq_vert . "\" name=\"idbanco_caja_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idbanco_caja_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idbanco_caja_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idbanco_caja_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idbanco_caja_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idfp_']) && $this->nmgp_cmp_hidden['idfp_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idfp_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idfp__line" id="hidden_field_data_idfp_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idfp_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idfp__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idfp_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfp_"]) &&  $this->nmgp_cmp_readonly["idfp_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_'] = array(); 
    }

   $old_value_idrc_ = $this->idrc_;
   $old_value_idfact_ = $this->idfact_;
   $old_value_monto_ = $this->monto_;
   $old_value_fechacob_ = $this->fechacob_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idrc_ = $this->idrc_;
   $unformatted_value_idfact_ = $this->idfact_;
   $unformatted_value_monto_ = $this->monto_;
   $unformatted_value_fechacob_ = $this->fechacob_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idforma, codigof + \" - \" + descripcion  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idforma, concat(codigof, \" - \",descripcion)  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idforma, codigof&\" - \"&descripcion  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idforma, codigof||\" - \"||descripcion  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idforma, codigof + \" - \" + descripcion  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idforma, codigof||\" - \"||descripcion  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }
   else
   {
       $nm_comando = "SELECT idforma, codigof||\" - \"||descripcion  FROM formadepago  where descripcion  not like  '%anti%'  and descripcion not like '%ret%' and descripcion not like '%cru%'  ORDER BY idforma ASC";
   }

   $this->idrc_ = $old_value_idrc_;
   $this->idfact_ = $old_value_idfact_;
   $this->monto_ = $old_value_monto_;
   $this->fechacob_ = $old_value_fechacob_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['Lookup_idfp_'][] = $rs->fields[0];
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
   $idfp__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfp__1))
          {
              foreach ($this->idfp__1 as $tmp_idfp_)
              {
                  if (trim($tmp_idfp_) === trim($cadaselect[1])) { $idfp__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfp_) === trim($cadaselect[1])) { $idfp__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfp_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idfp_) . "\">" . $idfp__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idfp_();
   $x = 0 ; 
   $idfp__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfp__1))
          {
              foreach ($this->idfp__1 as $tmp_idfp_)
              {
                  if (trim($tmp_idfp_) === trim($cadaselect[1])) { $idfp__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfp_) === trim($cadaselect[1])) { $idfp__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfp__look))
          {
              $idfp__look = $this->idfp_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfp_" . $sc_seq_vert . "\" class=\"css_idfp__line\" style=\"" .  $sStyleReadLab_idfp_ . "\">" . $this->form_format_readonly("idfp_", $this->form_encode_input($idfp__look)) . "</span><span id=\"id_read_off_idfp_" . $sc_seq_vert . "\" class=\"css_read_off_idfp_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idfp_ . "\">";
   echo " <span id=\"idAjaxSelect_idfp_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idfp__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idfp_" . $sc_seq_vert . "\" name=\"idfp_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfp_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfp_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfp_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfp_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['monto_']) && $this->nmgp_cmp_hidden['monto_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="monto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($monto_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_monto__line" id="hidden_field_data_monto_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_monto_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_monto__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_monto_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["monto_"]) &&  $this->nmgp_cmp_readonly["monto_"] == "on") { 

 ?>
<input type="hidden" name="monto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($monto_) . "\">" . $monto_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_monto_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-monto_<?php echo $sc_seq_vert ?> css_monto__line" style="<?php echo $sStyleReadLab_monto_; ?>"><?php echo $this->form_format_readonly("monto_", $this->form_encode_input($this->monto_)); ?></span><span id="id_read_off_monto_<?php echo $sc_seq_vert ?>" class="css_read_off_monto_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_monto_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_monto__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_monto_<?php echo $sc_seq_vert ?>" type=text name="monto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($monto_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['monto_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['monto_']['format_pos'] || 3 == $this->field_config['monto_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['monto_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['monto_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['monto_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['monto_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_monto_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_monto_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="banco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($banco_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_banco__line" id="hidden_field_data_banco_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_banco_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_banco__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_banco_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_"]) &&  $this->nmgp_cmp_readonly["banco_"] == "on") { 

 ?>
<input type="hidden" name="banco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($banco_) . "\">" . $banco_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_banco_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-banco_<?php echo $sc_seq_vert ?> css_banco__line" style="<?php echo $sStyleReadLab_banco_; ?>"><?php echo $this->form_format_readonly("banco_", $this->form_encode_input($this->banco_)); ?></span><span id="id_read_off_banco_<?php echo $sc_seq_vert ?>" class="css_read_off_banco_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_banco_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_banco__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_banco_<?php echo $sc_seq_vert ?>" type=text name="banco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($banco_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['numcheque_']) && $this->nmgp_cmp_hidden['numcheque_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcheque_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numcheque_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_numcheque__line" id="hidden_field_data_numcheque_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numcheque_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numcheque__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numcheque_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numcheque_"]) &&  $this->nmgp_cmp_readonly["numcheque_"] == "on") { 

 ?>
<input type="hidden" name="numcheque_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numcheque_) . "\">" . $numcheque_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numcheque_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numcheque_<?php echo $sc_seq_vert ?> css_numcheque__line" style="<?php echo $sStyleReadLab_numcheque_; ?>"><?php echo $this->form_format_readonly("numcheque_", $this->form_encode_input($this->numcheque_)); ?></span><span id="id_read_off_numcheque_<?php echo $sc_seq_vert ?>" class="css_read_off_numcheque_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numcheque_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numcheque__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numcheque_<?php echo $sc_seq_vert ?>" type=text name="numcheque_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numcheque_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcheque_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcheque_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fechacob_']) && $this->nmgp_cmp_hidden['fechacob_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechacob_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fechacob_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fechacob__line" id="hidden_field_data_fechacob_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fechacob_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fechacob__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fechacob_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechacob_"]) &&  $this->nmgp_cmp_readonly["fechacob_"] == "on") { 

 ?>
<input type="hidden" name="fechacob_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fechacob_) . "\">" . $fechacob_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechacob_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fechacob_<?php echo $sc_seq_vert ?> css_fechacob__line" style="<?php echo $sStyleReadLab_fechacob_; ?>"><?php echo $this->form_format_readonly("fechacob_", $this->form_encode_input($fechacob_)); ?></span><span id="id_read_off_fechacob_<?php echo $sc_seq_vert ?>" class="css_read_off_fechacob_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechacob_; ?>"><?php
$tmp_form_data = $this->field_config['fechacob_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOddMult css_fechacob__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechacob_<?php echo $sc_seq_vert ?>" type=text name="fechacob_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fechacob_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechacob_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechacob_']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechacob_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechacob_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_idrc_))
       {
           $this->nmgp_cmp_readonly['idrc_'] = $sCheckRead_idrc_;
       }
       if ('display: none;' == $sStyleHidden_idrc_)
       {
           $this->nmgp_cmp_hidden['idrc_'] = 'off';
       }
       if (isset($sCheckRead_idfact_))
       {
           $this->nmgp_cmp_readonly['idfact_'] = $sCheckRead_idfact_;
       }
       if ('display: none;' == $sStyleHidden_idfact_)
       {
           $this->nmgp_cmp_hidden['idfact_'] = 'off';
       }
       if (isset($sCheckRead_idbanco_caja_))
       {
           $this->nmgp_cmp_readonly['idbanco_caja_'] = $sCheckRead_idbanco_caja_;
       }
       if ('display: none;' == $sStyleHidden_idbanco_caja_)
       {
           $this->nmgp_cmp_hidden['idbanco_caja_'] = 'off';
       }
       if (isset($sCheckRead_idfp_))
       {
           $this->nmgp_cmp_readonly['idfp_'] = $sCheckRead_idfp_;
       }
       if ('display: none;' == $sStyleHidden_idfp_)
       {
           $this->nmgp_cmp_hidden['idfp_'] = 'off';
       }
       if (isset($sCheckRead_monto_))
       {
           $this->nmgp_cmp_readonly['monto_'] = $sCheckRead_monto_;
       }
       if ('display: none;' == $sStyleHidden_monto_)
       {
           $this->nmgp_cmp_hidden['monto_'] = 'off';
       }
       if (isset($sCheckRead_banco_))
       {
           $this->nmgp_cmp_readonly['banco_'] = $sCheckRead_banco_;
       }
       if ('display: none;' == $sStyleHidden_banco_)
       {
           $this->nmgp_cmp_hidden['banco_'] = 'off';
       }
       if (isset($sCheckRead_numcheque_))
       {
           $this->nmgp_cmp_readonly['numcheque_'] = $sCheckRead_numcheque_;
       }
       if ('display: none;' == $sStyleHidden_numcheque_)
       {
           $this->nmgp_cmp_hidden['numcheque_'] = 'off';
       }
       if (isset($sCheckRead_fechacob_))
       {
           $this->nmgp_cmp_readonly['fechacob_'] = $sCheckRead_fechacob_;
       }
       if ('display: none;' == $sStyleHidden_fechacob_)
       {
           $this->nmgp_cmp_hidden['fechacob_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detallepagos_rc_020521 = $guarda_form_vert_form_detallepagos_rc_020521;
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
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['run_modal'])
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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detallepagos_rc_020521");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detallepagos_rc_020521");
 parent.scAjaxDetailHeight("form_detallepagos_rc_020521", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detallepagos_rc_020521", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detallepagos_rc_020521", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['sc_modal'])
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
			do_ajax_form_detallepagos_rc_020521_add_new_line(); return false;
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
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_rc_020521']['buttonStatus'] = $this->nmgp_botoes;
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
