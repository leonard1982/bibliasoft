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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Factura Automática"); } else { echo strip_tags("Factura Automática"); } ?></TITLE>
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
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/calculator/jquery.calculator.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/calculator/jquery.plugin.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/calculator/jquery.calculator.js"></SCRIPT>
<?php
switch ($_SESSION['scriptcase']['str_lang']) {
        case 'ca':
        case 'da':
        case 'de':
        case 'es':
        case 'fr':
        case 'hr':
        case 'it':
        case 'nl':
        case 'no':
        case 'pl':
        case 'ru':
//        case 'sr':
        case 'sl':
        case 'uk':
                $tmpCalcLocale = $_SESSION['scriptcase']['str_lang'];
                break;
        case 'pt_br':
                $tmpCalcLocale = 'pt-BR';
                break;
        case 'tr':
                $tmpCalcLocale = 'ar';
                break;
        case 'zh_cn':
                $tmpCalcLocale = 'zh-CN';
                break;
//        case 'zh_hk':
//                $tmpCalcLocale = 'zh-TW';
//                break;
        default:
                $tmpCalcLocale = '';
                break;
}
if ('' != $tmpCalcLocale) {
        echo " <SCRIPT type=\"text/javascript\" src=\"{$this->Ini->path_prod}/third/jquery_plugin/calculator/jquery.calculator-$tmpCalcLocale.js\"></SCRIPT>\r\n";
}
?>
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
.css_read_off_fechaven button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechavenc button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_a_tns button {
	background-color: transparent;
	border: 0;
	padding: 0
}
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
.css_read_off_fecha_validacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<?php
$miniCalculatorFA = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorFA) {
?>
<style type="text/css">
.css_read_off_subtotal button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_facturaven_automaticas/form_facturaven_automaticas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_facturaven_automaticas_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_facturaven_automaticas_jquery.php');

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
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_facturaven_automaticas_detalleventa", "500");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_facturaven_automaticas_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_facturaven_automaticas'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_facturaven_automaticas'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Factura Automática"; } else { echo "Factura Automática"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['update'];
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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idfacven']))
   {
       $this->nmgp_cmp_hidden['idfacven'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['numfacven']))
   {
       $this->nmgp_cmp_hidden['numfacven'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['formapago']))
   {
       $this->nmgp_cmp_hidden['formapago'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['vendedor']))
   {
       $this->nmgp_cmp_hidden['vendedor'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tipo']))
   {
       $this->nmgp_cmp_hidden['tipo'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['resolucion']))
   {
       $this->nm_new_label['resolucion'] = "Prefijo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resolucion = $this->resolucion;
   $sStyleHidden_resolucion = '';
   if (isset($this->nmgp_cmp_hidden['resolucion']) && $this->nmgp_cmp_hidden['resolucion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resolucion']);
       $sStyleHidden_resolucion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resolucion = 'display: none;';
   $sStyleReadInp_resolucion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resolucion']) && $this->nmgp_cmp_readonly['resolucion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resolucion']);
       $sStyleReadLab_resolucion = '';
       $sStyleReadInp_resolucion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resolucion']) && $this->nmgp_cmp_hidden['resolucion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="resolucion" value="<?php echo $this->form_encode_input($this->resolucion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resolucion_line" id="hidden_field_data_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resolucion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_resolucion_label" style=""><span id="id_label_resolucion"><?php echo $this->nm_new_label['resolucion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resolucion"]) &&  $this->nmgp_cmp_readonly["resolucion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  WHERE activa='SI' ORDER BY prefijo";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_resolucion'][] = $rs->fields[0];
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
   $resolucion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->resolucion_1))
          {
              foreach ($this->resolucion_1 as $tmp_resolucion)
              {
                  if (trim($tmp_resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="resolucion" value="<?php echo $this->form_encode_input($resolucion) . "\">" . $resolucion_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_resolucion();
   $x = 0 ; 
   $resolucion_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->resolucion_1))
          {
              foreach ($this->resolucion_1 as $tmp_resolucion)
              {
                  if (trim($tmp_resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($resolucion_look))
          {
              $resolucion_look = $this->resolucion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_resolucion\" class=\"css_resolucion_line\" style=\"" .  $sStyleReadLab_resolucion . "\">" . $this->form_format_readonly("resolucion", $this->form_encode_input($resolucion_look)) . "</span><span id=\"id_read_off_resolucion\" class=\"css_read_off_resolucion" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_resolucion . "\">";
   echo " <span id=\"idAjaxSelect_resolucion\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_resolucion_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_resolucion\" name=\"resolucion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->resolucion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->resolucion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resolucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resolucion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['formapago']))
    {
        $this->nm_new_label['formapago'] = "Formapago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $formapago = $this->formapago;
   if (!isset($this->nmgp_cmp_hidden['formapago']))
   {
       $this->nmgp_cmp_hidden['formapago'] = 'off';
   }
   $sStyleHidden_formapago = '';
   if (isset($this->nmgp_cmp_hidden['formapago']) && $this->nmgp_cmp_hidden['formapago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['formapago']);
       $sStyleHidden_formapago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_formapago = 'display: none;';
   $sStyleReadInp_formapago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['formapago']) && $this->nmgp_cmp_readonly['formapago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['formapago']);
       $sStyleReadLab_formapago = '';
       $sStyleReadInp_formapago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['formapago']) && $this->nmgp_cmp_hidden['formapago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="formapago" value="<?php echo $this->form_encode_input($formapago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_formapago_line" id="hidden_field_data_formapago" style="<?php echo $sStyleHidden_formapago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_formapago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_formapago_label" style=""><span id="id_label_formapago"><?php echo $this->nm_new_label['formapago']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["formapago"]) &&  $this->nmgp_cmp_readonly["formapago"] == "on") { 

 ?>
<input type="hidden" name="formapago" value="<?php echo $this->form_encode_input($formapago) . "\">" . $formapago . ""; ?>
<?php } else { ?>
<span id="id_read_on_formapago" class="sc-ui-readonly-formapago css_formapago_line" style="<?php echo $sStyleReadLab_formapago; ?>"><?php echo $this->form_format_readonly("formapago", $this->form_encode_input($this->formapago)); ?></span><span id="id_read_off_formapago" class="css_read_off_formapago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_formapago; ?>">
 <input class="sc-js-input scFormObjectOdd css_formapago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_formapago" type=text name="formapago" value="<?php echo $this->form_encode_input($formapago) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_formapago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_formapago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fechaven']))
    {
        $this->nm_new_label['fechaven'] = "Fecha Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechaven = $this->fechaven;
   $sStyleHidden_fechaven = '';
   if (isset($this->nmgp_cmp_hidden['fechaven']) && $this->nmgp_cmp_hidden['fechaven'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechaven']);
       $sStyleHidden_fechaven = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechaven = 'display: none;';
   $sStyleReadInp_fechaven = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechaven']) && $this->nmgp_cmp_readonly['fechaven'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechaven']);
       $sStyleReadLab_fechaven = '';
       $sStyleReadInp_fechaven = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechaven']) && $this->nmgp_cmp_hidden['fechaven'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechaven" value="<?php echo $this->form_encode_input($fechaven) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechaven_line" id="hidden_field_data_fechaven" style="<?php echo $sStyleHidden_fechaven; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaven_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechaven_label" style=""><span id="id_label_fechaven"><?php echo $this->nm_new_label['fechaven']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechaven"]) &&  $this->nmgp_cmp_readonly["fechaven"] == "on") { 

 ?>
<input type="hidden" name="fechaven" value="<?php echo $this->form_encode_input($fechaven) . "\">" . $fechaven . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechaven" class="sc-ui-readonly-fechaven css_fechaven_line" style="<?php echo $sStyleReadLab_fechaven; ?>"><?php echo $this->form_format_readonly("fechaven", $this->form_encode_input($fechaven)); ?></span><span id="id_read_off_fechaven" class="css_read_off_fechaven<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechaven; ?>"><?php
$tmp_form_data = $this->field_config['fechaven']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechaven_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechaven" type=text name="fechaven" value="<?php echo $this->form_encode_input($fechaven) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechaven']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaven']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaven_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['credito']))
   {
       $this->nm_new_label['credito'] = "Forma de pago";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $credito = $this->credito;
   $sStyleHidden_credito = '';
   if (isset($this->nmgp_cmp_hidden['credito']) && $this->nmgp_cmp_hidden['credito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['credito']);
       $sStyleHidden_credito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_credito = 'display: none;';
   $sStyleReadInp_credito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['credito']) && $this->nmgp_cmp_readonly['credito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['credito']);
       $sStyleReadLab_credito = '';
       $sStyleReadInp_credito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['credito']) && $this->nmgp_cmp_hidden['credito'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="credito" value="<?php echo $this->form_encode_input($this->credito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_credito_line" id="hidden_field_data_credito" style="<?php echo $sStyleHidden_credito; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_credito_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_credito_label" style=""><span id="id_label_credito"><?php echo $this->nm_new_label['credito']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['credito']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['credito'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["credito"]) &&  $this->nmgp_cmp_readonly["credito"] == "on") { 

$credito_look = "";
 if ($this->credito == "1") { $credito_look .= "Crédito" ;} 
 if ($this->credito == "2") { $credito_look .= "Contado" ;} 
 if (empty($credito_look)) { $credito_look = $this->credito; }
?>
<input type="hidden" name="credito" value="<?php echo $this->form_encode_input($credito) . "\">" . $credito_look . ""; ?>
<?php } else { ?>
<?php

$credito_look = "";
 if ($this->credito == "1") { $credito_look .= "Crédito" ;} 
 if ($this->credito == "2") { $credito_look .= "Contado" ;} 
 if (empty($credito_look)) { $credito_look = $this->credito; }
?>
<span id="id_read_on_credito" class="css_credito_line"  style="<?php echo $sStyleReadLab_credito; ?>"><?php echo $this->form_format_readonly("credito", $this->form_encode_input($credito_look)); ?></span><span id="id_read_off_credito" class="css_read_off_credito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_credito; ?>">
 <span id="idAjaxSelect_credito" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_credito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_credito" name="credito" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->credito == "1") { echo " selected" ;} ?>>Crédito</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_credito'][] = '1'; ?>
 <option  value="2" <?php  if ($this->credito == "2") { echo " selected" ;} ?>>Contado</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_credito'][] = '2'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_credito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_credito_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['dias_decredito']))
    {
        $this->nm_new_label['dias_decredito'] = "Días crédito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dias_decredito = $this->dias_decredito;
   $sStyleHidden_dias_decredito = '';
   if (isset($this->nmgp_cmp_hidden['dias_decredito']) && $this->nmgp_cmp_hidden['dias_decredito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dias_decredito']);
       $sStyleHidden_dias_decredito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dias_decredito = 'display: none;';
   $sStyleReadInp_dias_decredito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dias_decredito']) && $this->nmgp_cmp_readonly['dias_decredito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dias_decredito']);
       $sStyleReadLab_dias_decredito = '';
       $sStyleReadInp_dias_decredito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dias_decredito']) && $this->nmgp_cmp_hidden['dias_decredito'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dias_decredito" value="<?php echo $this->form_encode_input($dias_decredito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dias_decredito_line" id="hidden_field_data_dias_decredito" style="<?php echo $sStyleHidden_dias_decredito; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dias_decredito_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dias_decredito_label" style=""><span id="id_label_dias_decredito"><?php echo $this->nm_new_label['dias_decredito']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['dias_decredito']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['dias_decredito'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dias_decredito"]) &&  $this->nmgp_cmp_readonly["dias_decredito"] == "on") { 

 ?>
<input type="hidden" name="dias_decredito" value="<?php echo $this->form_encode_input($dias_decredito) . "\">" . $dias_decredito . ""; ?>
<?php } else { ?>
<span id="id_read_on_dias_decredito" class="sc-ui-readonly-dias_decredito css_dias_decredito_line" style="<?php echo $sStyleReadLab_dias_decredito; ?>"><?php echo $this->form_format_readonly("dias_decredito", $this->form_encode_input($this->dias_decredito)); ?></span><span id="id_read_off_dias_decredito" class="css_read_off_dias_decredito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dias_decredito; ?>">
 <input class="sc-js-input scFormObjectOdd css_dias_decredito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dias_decredito" type=text name="dias_decredito" value="<?php echo $this->form_encode_input($dias_decredito) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dias_decredito']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dias_decredito']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dias_decredito']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dias_decredito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dias_decredito_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_resolucion_dumb = ('' == $sStyleHidden_resolucion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_resolucion_dumb" style="<?php echo $sStyleHidden_resolucion_dumb; ?>"></TD>
<?php $sStyleHidden_formapago_dumb = ('' == $sStyleHidden_formapago) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_formapago_dumb" style="<?php echo $sStyleHidden_formapago_dumb; ?>"></TD>
<?php $sStyleHidden_fechaven_dumb = ('' == $sStyleHidden_fechaven) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechaven_dumb" style="<?php echo $sStyleHidden_fechaven_dumb; ?>"></TD>
<?php $sStyleHidden_credito_dumb = ('' == $sStyleHidden_credito) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_credito_dumb" style="<?php echo $sStyleHidden_credito_dumb; ?>"></TD>
<?php $sStyleHidden_dias_decredito_dumb = ('' == $sStyleHidden_dias_decredito) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dias_decredito_dumb" style="<?php echo $sStyleHidden_dias_decredito_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['idcli']))
   {
       $this->nm_new_label['idcli'] = "Cliente";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcli = $this->idcli;
   $sStyleHidden_idcli = '';
   if (isset($this->nmgp_cmp_hidden['idcli']) && $this->nmgp_cmp_hidden['idcli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcli']);
       $sStyleHidden_idcli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcli = 'display: none;';
   $sStyleReadInp_idcli = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcli']) && $this->nmgp_cmp_readonly['idcli'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcli']);
       $sStyleReadLab_idcli = '';
       $sStyleReadInp_idcli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcli']) && $this->nmgp_cmp_hidden['idcli'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idcli" value="<?php echo $this->form_encode_input($this->idcli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idcli_line" id="hidden_field_data_idcli" style="<?php echo $sStyleHidden_idcli; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcli_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcli_label" style=""><span id="id_label_idcli"><?php echo $this->nm_new_label['idcli']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcli"]) &&  $this->nmgp_cmp_readonly["idcli"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT idtercero, nombres  FROM terceros  ORDER BY nombres";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_idcli'][] = $rs->fields[0];
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
   $idcli_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcli_1))
          {
              foreach ($this->idcli_1 as $tmp_idcli)
              {
                  if (trim($tmp_idcli) === trim($cadaselect[1])) { $idcli_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcli) === trim($cadaselect[1])) { $idcli_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idcli" value="<?php echo $this->form_encode_input($idcli) . "\">" . $idcli_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idcli();
   $x = 0 ; 
   $idcli_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcli_1))
          {
              foreach ($this->idcli_1 as $tmp_idcli)
              {
                  if (trim($tmp_idcli) === trim($cadaselect[1])) { $idcli_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcli) === trim($cadaselect[1])) { $idcli_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idcli_look))
          {
              $idcli_look = $this->idcli;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idcli\" class=\"css_idcli_line\" style=\"" .  $sStyleReadLab_idcli . "\">" . $this->form_format_readonly("idcli", $this->form_encode_input($idcli_look)) . "</span><span id=\"id_read_off_idcli\" class=\"css_read_off_idcli" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idcli . "\">";
   echo " <span id=\"idAjaxSelect_idcli\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idcli_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idcli\" name=\"idcli\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idcli) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idcli)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcli_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcli_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['dircliente']))
   {
       $this->nm_new_label['dircliente'] = "Dirección";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dircliente = $this->dircliente;
   $sStyleHidden_dircliente = '';
   if (isset($this->nmgp_cmp_hidden['dircliente']) && $this->nmgp_cmp_hidden['dircliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dircliente']);
       $sStyleHidden_dircliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dircliente = 'display: none;';
   $sStyleReadInp_dircliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dircliente']) && $this->nmgp_cmp_readonly['dircliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dircliente']);
       $sStyleReadLab_dircliente = '';
       $sStyleReadInp_dircliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dircliente']) && $this->nmgp_cmp_hidden['dircliente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dircliente" value="<?php echo $this->form_encode_input($this->dircliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dircliente_line" id="hidden_field_data_dircliente" style="<?php echo $sStyleHidden_dircliente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dircliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dircliente_label" style=""><span id="id_label_dircliente"><?php echo $this->nm_new_label['dircliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['dircliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['dircliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dircliente"]) &&  $this->nmgp_cmp_readonly["dircliente"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente'] = array(); 
}
if ($this->idcli != "")
{ 
   $this->nm_clear_val("idcli");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT iddireccion, direc FROM direccion  WHERE idter='$this->idcli' ORDER BY direc";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['Lookup_dircliente'][] = $rs->fields[0];
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
   $dircliente_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dircliente_1))
          {
              foreach ($this->dircliente_1 as $tmp_dircliente)
              {
                  if (trim($tmp_dircliente) === trim($cadaselect[1])) { $dircliente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dircliente) === trim($cadaselect[1])) { $dircliente_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="dircliente" value="<?php echo $this->form_encode_input($dircliente) . "\">" . $dircliente_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_dircliente();
   $x = 0 ; 
   $dircliente_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dircliente_1))
          {
              foreach ($this->dircliente_1 as $tmp_dircliente)
              {
                  if (trim($tmp_dircliente) === trim($cadaselect[1])) { $dircliente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dircliente) === trim($cadaselect[1])) { $dircliente_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($dircliente_look))
          {
              $dircliente_look = $this->dircliente;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_dircliente\" class=\"css_dircliente_line\" style=\"" .  $sStyleReadLab_dircliente . "\">" . $this->form_format_readonly("dircliente", $this->form_encode_input($dircliente_look)) . "</span><span id=\"id_read_off_dircliente\" class=\"css_read_off_dircliente" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_dircliente . "\">";
   echo " <span id=\"idAjaxSelect_dircliente\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_dircliente_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_dircliente\" name=\"dircliente\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->dircliente) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->dircliente)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dircliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dircliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_dircliente_dumb = ('' == $sStyleHidden_dircliente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dircliente_dumb" style="<?php echo $sStyleHidden_dircliente_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['subtotal']))
    {
        $this->nm_new_label['subtotal'] = "SubTotal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $subtotal = $this->subtotal;
   $sStyleHidden_subtotal = '';
   if (isset($this->nmgp_cmp_hidden['subtotal']) && $this->nmgp_cmp_hidden['subtotal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['subtotal']);
       $sStyleHidden_subtotal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_subtotal = 'display: none;';
   $sStyleReadInp_subtotal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['subtotal']) && $this->nmgp_cmp_readonly['subtotal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['subtotal']);
       $sStyleReadLab_subtotal = '';
       $sStyleReadInp_subtotal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['subtotal']) && $this->nmgp_cmp_hidden['subtotal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subtotal" value="<?php echo $this->form_encode_input($subtotal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_subtotal_line" id="hidden_field_data_subtotal" style="<?php echo $sStyleHidden_subtotal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_subtotal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_subtotal_label" style=""><span id="id_label_subtotal"><?php echo $this->nm_new_label['subtotal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subtotal"]) &&  $this->nmgp_cmp_readonly["subtotal"] == "on") { 

 ?>
<input type="hidden" name="subtotal" value="<?php echo $this->form_encode_input($subtotal) . "\">" . $subtotal . ""; ?>
<?php } else { ?>
<span id="id_read_on_subtotal" class="sc-ui-readonly-subtotal css_subtotal_line" style="<?php echo $sStyleReadLab_subtotal; ?>"><?php echo $this->form_format_readonly("subtotal", $this->form_encode_input($this->subtotal)); ?></span><span id="id_read_off_subtotal" class="css_read_off_subtotal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_subtotal; ?>">
 <input class="sc-js-input scFormObjectOdd css_subtotal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_subtotal" type=text name="subtotal" value="<?php echo $this->form_encode_input($subtotal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['subtotal']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['subtotal']['format_pos'] || 3 == $this->field_config['subtotal']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['subtotal']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['subtotal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['subtotal']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['subtotal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subtotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subtotal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoriva']))
    {
        $this->nm_new_label['valoriva'] = "Valor IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoriva = $this->valoriva;
   $sStyleHidden_valoriva = '';
   if (isset($this->nmgp_cmp_hidden['valoriva']) && $this->nmgp_cmp_hidden['valoriva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoriva']);
       $sStyleHidden_valoriva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoriva = 'display: none;';
   $sStyleReadInp_valoriva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valoriva']) && $this->nmgp_cmp_readonly['valoriva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoriva']);
       $sStyleReadLab_valoriva = '';
       $sStyleReadInp_valoriva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoriva']) && $this->nmgp_cmp_hidden['valoriva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoriva" value="<?php echo $this->form_encode_input($valoriva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valoriva_line" id="hidden_field_data_valoriva" style="<?php echo $sStyleHidden_valoriva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoriva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valoriva_label" style=""><span id="id_label_valoriva"><?php echo $this->nm_new_label['valoriva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valoriva"]) &&  $this->nmgp_cmp_readonly["valoriva"] == "on") { 

 ?>
<input type="hidden" name="valoriva" value="<?php echo $this->form_encode_input($valoriva) . "\">" . $valoriva . ""; ?>
<?php } else { ?>
<span id="id_read_on_valoriva" class="sc-ui-readonly-valoriva css_valoriva_line" style="<?php echo $sStyleReadLab_valoriva; ?>"><?php echo $this->form_format_readonly("valoriva", $this->form_encode_input($this->valoriva)); ?></span><span id="id_read_off_valoriva" class="css_read_off_valoriva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valoriva; ?>">
 <input class="sc-js-input scFormObjectOdd css_valoriva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valoriva" type=text name="valoriva" value="<?php echo $this->form_encode_input($valoriva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valoriva']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valoriva']['format_pos'] || 3 == $this->field_config['valoriva']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valoriva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valoriva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valoriva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valoriva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoriva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoriva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['total']))
    {
        $this->nm_new_label['total'] = "Total";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $total = $this->total;
   $sStyleHidden_total = '';
   if (isset($this->nmgp_cmp_hidden['total']) && $this->nmgp_cmp_hidden['total'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['total']);
       $sStyleHidden_total = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_total = 'display: none;';
   $sStyleReadInp_total = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['total']) && $this->nmgp_cmp_readonly['total'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['total']);
       $sStyleReadLab_total = '';
       $sStyleReadInp_total = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['total']) && $this->nmgp_cmp_hidden['total'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="total" value="<?php echo $this->form_encode_input($total) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_total_line" id="hidden_field_data_total" style="<?php echo $sStyleHidden_total; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_total_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_total_label" style=""><span id="id_label_total"><?php echo $this->nm_new_label['total']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["total"]) &&  $this->nmgp_cmp_readonly["total"] == "on") { 

 ?>
<input type="hidden" name="total" value="<?php echo $this->form_encode_input($total) . "\">" . $total . ""; ?>
<?php } else { ?>
<span id="id_read_on_total" class="sc-ui-readonly-total css_total_line" style="<?php echo $sStyleReadLab_total; ?>"><?php echo $this->form_format_readonly("total", $this->form_encode_input($this->total)); ?></span><span id="id_read_off_total" class="css_read_off_total<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_total; ?>">
 <input class="sc-js-input scFormObjectOdd css_total_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_total" type=text name="total" value="<?php echo $this->form_encode_input($total) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['total']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['total']['format_pos'] || 3 == $this->field_config['total']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['total']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['total']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_subtotal_dumb = ('' == $sStyleHidden_subtotal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_subtotal_dumb" style="<?php echo $sStyleHidden_subtotal_dumb; ?>"></TD>
<?php $sStyleHidden_valoriva_dumb = ('' == $sStyleHidden_valoriva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoriva_dumb" style="<?php echo $sStyleHidden_valoriva_dumb; ?>"></TD>
<?php $sStyleHidden_total_dumb = ('' == $sStyleHidden_total) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_total_dumb" style="<?php echo $sStyleHidden_total_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label" style=""><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br>
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="6" cols="60"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vendedor']))
    {
        $this->nm_new_label['vendedor'] = "Vendedor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vendedor = $this->vendedor;
   if (!isset($this->nmgp_cmp_hidden['vendedor']))
   {
       $this->nmgp_cmp_hidden['vendedor'] = 'off';
   }
   $sStyleHidden_vendedor = '';
   if (isset($this->nmgp_cmp_hidden['vendedor']) && $this->nmgp_cmp_hidden['vendedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vendedor']);
       $sStyleHidden_vendedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vendedor = 'display: none;';
   $sStyleReadInp_vendedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vendedor']) && $this->nmgp_cmp_readonly['vendedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vendedor']);
       $sStyleReadLab_vendedor = '';
       $sStyleReadInp_vendedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vendedor']) && $this->nmgp_cmp_hidden['vendedor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vendedor" value="<?php echo $this->form_encode_input($vendedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vendedor_line" id="hidden_field_data_vendedor" style="<?php echo $sStyleHidden_vendedor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vendedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vendedor_label" style=""><span id="id_label_vendedor"><?php echo $this->nm_new_label['vendedor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vendedor"]) &&  $this->nmgp_cmp_readonly["vendedor"] == "on") { 

 ?>
<input type="hidden" name="vendedor" value="<?php echo $this->form_encode_input($vendedor) . "\">" . $vendedor . ""; ?>
<?php } else { ?>
<span id="id_read_on_vendedor" class="sc-ui-readonly-vendedor css_vendedor_line" style="<?php echo $sStyleReadLab_vendedor; ?>"><?php echo $this->form_format_readonly("vendedor", $this->form_encode_input($this->vendedor)); ?></span><span id="id_read_off_vendedor" class="css_read_off_vendedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vendedor; ?>">
 <input class="sc-js-input scFormObjectOdd css_vendedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_vendedor" type=text name="vendedor" value="<?php echo $this->form_encode_input($vendedor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['vendedor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['vendedor']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['vendedor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vendedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vendedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idfacven']))
           {
               $this->nmgp_cmp_readonly['idfacven'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['numfacven']))
    {
        $this->nm_new_label['numfacven'] = "Número";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numfacven = $this->numfacven;
   if (!isset($this->nmgp_cmp_hidden['numfacven']))
   {
       $this->nmgp_cmp_hidden['numfacven'] = 'off';
   }
   $sStyleHidden_numfacven = '';
   if (isset($this->nmgp_cmp_hidden['numfacven']) && $this->nmgp_cmp_hidden['numfacven'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numfacven']);
       $sStyleHidden_numfacven = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numfacven = 'display: none;';
   $sStyleReadInp_numfacven = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numfacven']) && $this->nmgp_cmp_readonly['numfacven'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numfacven']);
       $sStyleReadLab_numfacven = '';
       $sStyleReadInp_numfacven = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numfacven']) && $this->nmgp_cmp_hidden['numfacven'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numfacven" value="<?php echo $this->form_encode_input($numfacven) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numfacven_line" id="hidden_field_data_numfacven" style="<?php echo $sStyleHidden_numfacven; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numfacven_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numfacven_label" style=""><span id="id_label_numfacven"><?php echo $this->nm_new_label['numfacven']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numfacven"]) &&  $this->nmgp_cmp_readonly["numfacven"] == "on") { 

 ?>
<input type="hidden" name="numfacven" value="<?php echo $this->form_encode_input($numfacven) . "\">" . $numfacven . ""; ?>
<?php } else { ?>
<span id="id_read_on_numfacven" class="sc-ui-readonly-numfacven css_numfacven_line" style="<?php echo $sStyleReadLab_numfacven; ?>"><?php echo $this->form_format_readonly("numfacven", $this->form_encode_input($this->numfacven)); ?></span><span id="id_read_off_numfacven" class="css_read_off_numfacven<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numfacven; ?>">
 <input class="sc-js-input scFormObjectOdd css_numfacven_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numfacven" type=text name="numfacven" value="<?php echo $this->form_encode_input($numfacven) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numfacven']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numfacven']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numfacven']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numfacven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numfacven_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idfacven']))
    {
        $this->nm_new_label['idfacven'] = "Idfacven";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfacven = $this->idfacven;
   if (!isset($this->nmgp_cmp_hidden['idfacven']))
   {
       $this->nmgp_cmp_hidden['idfacven'] = 'off';
   }
   $sStyleHidden_idfacven = '';
   if (isset($this->nmgp_cmp_hidden['idfacven']) && $this->nmgp_cmp_hidden['idfacven'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfacven']);
       $sStyleHidden_idfacven = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfacven = 'display: none;';
   $sStyleReadInp_idfacven = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idfacven"]) &&  $this->nmgp_cmp_readonly["idfacven"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfacven']);
       $sStyleReadLab_idfacven = '';
       $sStyleReadInp_idfacven = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfacven']) && $this->nmgp_cmp_hidden['idfacven'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idfacven" value="<?php echo $this->form_encode_input($idfacven) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_idfacven_line" id="hidden_field_data_idfacven" style="<?php echo $sStyleHidden_idfacven; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfacven_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfacven_label" style=""><span id="id_label_idfacven"><?php echo $this->nm_new_label['idfacven']; ?></span></span><br><span id="id_read_on_idfacven" class="css_idfacven_line" style="<?php echo $sStyleReadLab_idfacven; ?>"><?php echo $this->form_format_readonly("idfacven", $this->form_encode_input($this->idfacven)); ?></span><span id="id_read_off_idfacven" class="css_read_off_idfacven" style="<?php echo $sStyleReadInp_idfacven; ?>"><input type="hidden" name="idfacven" value="<?php echo $this->form_encode_input($idfacven) . "\">"?><span id="id_ajax_label_idfacven"><?php echo nl2br($idfacven); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfacven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfacven_text"></span></td></tr></table></td></tr></table> </TD>
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
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo']))
    {
        $this->nm_new_label['tipo'] = "Tipo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo = $this->tipo;
   if (!isset($this->nmgp_cmp_hidden['tipo']))
   {
       $this->nmgp_cmp_hidden['tipo'] = 'off';
   }
   $sStyleHidden_tipo = '';
   if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo']);
       $sStyleHidden_tipo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo = 'display: none;';
   $sStyleReadInp_tipo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo']) && $this->nmgp_cmp_readonly['tipo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo']);
       $sStyleReadLab_tipo = '';
       $sStyleReadInp_tipo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_line" id="hidden_field_data_tipo" style="<?php echo $sStyleHidden_tipo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_label" style=""><span id="id_label_tipo"><?php echo $this->nm_new_label['tipo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['php_cmp_required']['tipo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo"]) &&  $this->nmgp_cmp_readonly["tipo"] == "on") { 

 ?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">" . $tipo . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo" class="sc-ui-readonly-tipo css_tipo_line" style="<?php echo $sStyleReadLab_tipo; ?>"><?php echo $this->form_format_readonly("tipo", $this->form_encode_input($this->tipo)); ?></span><span id="id_read_off_tipo" class="css_read_off_tipo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo" type=text name="tipo" value="<?php echo $this->form_encode_input($tipo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_tipo_dumb = ('' == $sStyleHidden_tipo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_dumb" style="<?php echo $sStyleHidden_tipo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle']))
    {
        $this->nm_new_label['detalle'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle = $this->detalle;
   $sStyleHidden_detalle = '';
   if (isset($this->nmgp_cmp_hidden['detalle']) && $this->nmgp_cmp_hidden['detalle'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle']);
       $sStyleHidden_detalle = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle = 'display: none;';
   $sStyleReadInp_detalle = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle']) && $this->nmgp_cmp_readonly['detalle'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle']);
       $sStyleReadLab_detalle = '';
       $sStyleReadInp_detalle = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle']) && $this->nmgp_cmp_hidden['detalle'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle" value="<?php echo $this->form_encode_input($detalle) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_line" id="hidden_field_data_detalle" style="<?php echo $sStyleHidden_detalle; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_label" style=""><span id="id_label_detalle"><?php echo $this->nm_new_label['detalle']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['embutida_parms'] = "didfacven*scin" . $this->nmgp_dados_form['idfacven'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['foreign_key']['numfac'] = $this->nmgp_dados_form['idfacven'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['where_filter'] = "numfac = " . $this->nmgp_dados_form['idfacven'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['where_detal']  = "numfac = " . $this->nmgp_dados_form['idfacven'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init'] ]['form_facturaven_automaticas_detalleventa']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_facturaven_automaticas_empty.htm' : $this->Ini->link_form_facturaven_automaticas_detalleventa_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle']) && 'nmsc_iframe_liga_form_facturaven_automaticas_detalleventa' != $this->Ini->sc_lig_target['C_@scinf_detalle'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['form_facturaven_automaticas_detalleventa_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detalle'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_facturaven_automaticas_detalleventa"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="1000" name="nmsc_iframe_liga_form_facturaven_automaticas_detalleventa"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_text"></span></td></tr></table></td></tr></table> </TD>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_facturaven_automaticas");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_facturaven_automaticas");
 parent.scAjaxDetailHeight("form_facturaven_automaticas", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_facturaven_automaticas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_facturaven_automaticas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['sc_modal'])
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
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-3").length && $("#sc_b_upd_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-4").length && $("#sc_b_del_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-4").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['buttonStatus'] = $this->nmgp_botoes;
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
