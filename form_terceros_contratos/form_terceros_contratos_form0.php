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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("CONTRATO NUEVO"); } else { echo strip_tags("EDITAR CONTRATO"); } ?></TITLE>
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
.css_read_off_fecha_contrato button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_inicio button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_terceros_contratos/form_terceros_contratos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_terceros_contratos_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_terceros_contratos_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  addAutocomplete(this);

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

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-cliente", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "cliente" != sId ? sId.substr(7) : "";
   if ("" == $(this).val()) {
    $("#id_sc_field_" + sId).val("");
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).select2({
   minimumInputLength: 1,
   language: {
    inputTooShort: function() {
     return "<?php echo sprintf($this->Ini->Nm_lang['lang_autocomp_tooshort'], 1) ?>";
    },
    noResults: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
    },
    searching: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
    }
   },
   width: "300px",
   ajax: {
    url: "form_terceros_contratos.php",
    dataType: "json",
    processResults: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      return data;
    },
    data: function (params) {
     var query = {
      term: params.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_cliente",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "cliente" != sId ? sId.substr(7) : "";
   sc_form_terceros_contratos_cliente_onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_terceros_contratos_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_terceros_contratos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_terceros_contratos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "CONTRATO NUEVO"; } else { echo "EDITAR CONTRATO"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['copiar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['copiar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['copiar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['copiar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['copiar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['copiar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "copiar", "scBtnFn_copiar()", "scBtnFn_copiar()", "sc_copiar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['copiar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['copiar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['copiar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['copiar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['copiar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['copiar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "copiar", "scBtnFn_copiar()", "scBtnFn_copiar()", "sc_copiar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="20%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_ter_cont']))
   {
       $this->nmgp_cmp_hidden['id_ter_cont'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['usuario_crea']))
   {
       $this->nmgp_cmp_hidden['usuario_crea'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['usuario_edita']))
   {
       $this->nmgp_cmp_hidden['usuario_edita'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_contrato']))
    {
        $this->nm_new_label['numero_contrato'] = "Número Contrato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_contrato = $this->numero_contrato;
   $sStyleHidden_numero_contrato = '';
   if (isset($this->nmgp_cmp_hidden['numero_contrato']) && $this->nmgp_cmp_hidden['numero_contrato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_contrato']);
       $sStyleHidden_numero_contrato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_contrato = 'display: none;';
   $sStyleReadInp_numero_contrato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_contrato']) && $this->nmgp_cmp_readonly['numero_contrato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_contrato']);
       $sStyleReadLab_numero_contrato = '';
       $sStyleReadInp_numero_contrato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_contrato']) && $this->nmgp_cmp_hidden['numero_contrato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_contrato" value="<?php echo $this->form_encode_input($numero_contrato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_contrato_line" id="hidden_field_data_numero_contrato" style="<?php echo $sStyleHidden_numero_contrato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_contrato_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_contrato_label" style=""><span id="id_label_numero_contrato"><?php echo $this->nm_new_label['numero_contrato']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_contrato"]) &&  $this->nmgp_cmp_readonly["numero_contrato"] == "on") { 

 ?>
<input type="hidden" name="numero_contrato" value="<?php echo $this->form_encode_input($numero_contrato) . "\">" . $numero_contrato . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_contrato" class="sc-ui-readonly-numero_contrato css_numero_contrato_line" style="<?php echo $sStyleReadLab_numero_contrato; ?>"><?php echo $this->form_format_readonly("numero_contrato", $this->form_encode_input($this->numero_contrato)); ?></span><span id="id_read_off_numero_contrato" class="css_read_off_numero_contrato<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_contrato; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_contrato_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_contrato" type=text name="numero_contrato" value="<?php echo $this->form_encode_input($numero_contrato) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['numero_contrato']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numero_contrato']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_contrato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_contrato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_contrato']))
    {
        $this->nm_new_label['fecha_contrato'] = "Fecha Contrato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_contrato = $this->fecha_contrato;
   $sStyleHidden_fecha_contrato = '';
   if (isset($this->nmgp_cmp_hidden['fecha_contrato']) && $this->nmgp_cmp_hidden['fecha_contrato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_contrato']);
       $sStyleHidden_fecha_contrato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_contrato = 'display: none;';
   $sStyleReadInp_fecha_contrato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_contrato']) && $this->nmgp_cmp_readonly['fecha_contrato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_contrato']);
       $sStyleReadLab_fecha_contrato = '';
       $sStyleReadInp_fecha_contrato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_contrato']) && $this->nmgp_cmp_hidden['fecha_contrato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_contrato" value="<?php echo $this->form_encode_input($fecha_contrato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_contrato_line" id="hidden_field_data_fecha_contrato" style="<?php echo $sStyleHidden_fecha_contrato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_contrato_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_contrato_label" style=""><span id="id_label_fecha_contrato"><?php echo $this->nm_new_label['fecha_contrato']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_contrato"]) &&  $this->nmgp_cmp_readonly["fecha_contrato"] == "on") { 

 ?>
<input type="hidden" name="fecha_contrato" value="<?php echo $this->form_encode_input($fecha_contrato) . "\">" . $fecha_contrato . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_contrato" class="sc-ui-readonly-fecha_contrato css_fecha_contrato_line" style="<?php echo $sStyleReadLab_fecha_contrato; ?>"><?php echo $this->form_format_readonly("fecha_contrato", $this->form_encode_input($fecha_contrato)); ?></span><span id="id_read_off_fecha_contrato" class="css_read_off_fecha_contrato<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_contrato; ?>"><?php
$tmp_form_data = $this->field_config['fecha_contrato']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_contrato_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_contrato" type=text name="fecha_contrato" value="<?php echo $this->form_encode_input($fecha_contrato) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_contrato']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_contrato']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_contrato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_contrato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_numero_contrato_dumb = ('' == $sStyleHidden_numero_contrato) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numero_contrato_dumb" style="<?php echo $sStyleHidden_numero_contrato_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_contrato_dumb = ('' == $sStyleHidden_fecha_contrato) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_contrato_dumb" style="<?php echo $sStyleHidden_fecha_contrato_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_inicio']))
    {
        $this->nm_new_label['fecha_inicio'] = "Fecha Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_inicio = $this->fecha_inicio;
   $sStyleHidden_fecha_inicio = '';
   if (isset($this->nmgp_cmp_hidden['fecha_inicio']) && $this->nmgp_cmp_hidden['fecha_inicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_inicio']);
       $sStyleHidden_fecha_inicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_inicio = 'display: none;';
   $sStyleReadInp_fecha_inicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_inicio']) && $this->nmgp_cmp_readonly['fecha_inicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_inicio']);
       $sStyleReadLab_fecha_inicio = '';
       $sStyleReadInp_fecha_inicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_inicio']) && $this->nmgp_cmp_hidden['fecha_inicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_inicio" value="<?php echo $this->form_encode_input($fecha_inicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_inicio_line" id="hidden_field_data_fecha_inicio" style="<?php echo $sStyleHidden_fecha_inicio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_inicio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_inicio_label" style=""><span id="id_label_fecha_inicio"><?php echo $this->nm_new_label['fecha_inicio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_inicio"]) &&  $this->nmgp_cmp_readonly["fecha_inicio"] == "on") { 

 ?>
<input type="hidden" name="fecha_inicio" value="<?php echo $this->form_encode_input($fecha_inicio) . "\">" . $fecha_inicio . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_inicio" class="sc-ui-readonly-fecha_inicio css_fecha_inicio_line" style="<?php echo $sStyleReadLab_fecha_inicio; ?>"><?php echo $this->form_format_readonly("fecha_inicio", $this->form_encode_input($fecha_inicio)); ?></span><span id="id_read_off_fecha_inicio" class="css_read_off_fecha_inicio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_inicio; ?>"><?php
$tmp_form_data = $this->field_config['fecha_inicio']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_inicio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_inicio" type=text name="fecha_inicio" value="<?php echo $this->form_encode_input($fecha_inicio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_inicio']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_inicio']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_inicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_inicio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['activo']))
   {
       $this->nm_new_label['activo'] = "Activo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $activo = $this->activo;
   $sStyleHidden_activo = '';
   if (isset($this->nmgp_cmp_hidden['activo']) && $this->nmgp_cmp_hidden['activo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['activo']);
       $sStyleHidden_activo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_activo = 'display: none;';
   $sStyleReadInp_activo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['activo']) && $this->nmgp_cmp_readonly['activo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['activo']);
       $sStyleReadLab_activo = '';
       $sStyleReadInp_activo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['activo']) && $this->nmgp_cmp_hidden['activo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="activo" value="<?php echo $this->form_encode_input($this->activo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_activo_line" id="hidden_field_data_activo" style="<?php echo $sStyleHidden_activo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_activo_label" style=""><span id="id_label_activo"><?php echo $this->nm_new_label['activo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activo"]) &&  $this->nmgp_cmp_readonly["activo"] == "on") { 

$activo_look = "";
 if ($this->activo == "SI") { $activo_look .= "SI" ;} 
 if ($this->activo == "NO") { $activo_look .= "NO" ;} 
 if (empty($activo_look)) { $activo_look = $this->activo; }
?>
<input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo) . "\">" . $activo_look . ""; ?>
<?php } else { ?>
<?php

$activo_look = "";
 if ($this->activo == "SI") { $activo_look .= "SI" ;} 
 if ($this->activo == "NO") { $activo_look .= "NO" ;} 
 if (empty($activo_look)) { $activo_look = $this->activo; }
?>
<span id="id_read_on_activo" class="css_activo_line"  style="<?php echo $sStyleReadLab_activo; ?>"><?php echo $this->form_format_readonly("activo", $this->form_encode_input($activo_look)); ?></span><span id="id_read_off_activo" class="css_read_off_activo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_activo; ?>">
 <span id="idAjaxSelect_activo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_activo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_activo" name="activo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SI" <?php  if ($this->activo == "SI") { echo " selected" ;} ?><?php  if (empty($this->activo)) { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_activo'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->activo == "NO") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_activo'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_fecha_inicio_dumb = ('' == $sStyleHidden_fecha_inicio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_inicio_dumb" style="<?php echo $sStyleHidden_fecha_inicio_dumb; ?>"></TD>
<?php $sStyleHidden_activo_dumb = ('' == $sStyleHidden_activo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_activo_dumb" style="<?php echo $sStyleHidden_activo_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['estado']))
   {
       $this->nm_new_label['estado'] = "Estado";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado = $this->estado;
   $sStyleHidden_estado = '';
   if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado']);
       $sStyleHidden_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado = 'display: none;';
   $sStyleReadInp_estado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado']) && $this->nmgp_cmp_readonly['estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado']);
       $sStyleReadLab_estado = '';
       $sStyleReadInp_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estado" value="<?php echo $this->form_encode_input($this->estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_line" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_label" style=""><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado'] = array(); 
    }

   $old_value_numero_contrato = $this->numero_contrato;
   $old_value_fecha_contrato = $this->fecha_contrato;
   $old_value_fecha_inicio = $this->fecha_inicio;
   $old_value_fecha_corte = $this->fecha_corte;
   $old_value_mensualidad = $this->mensualidad;
   $old_value_fecha_ultimopago = $this->fecha_ultimopago;
   $old_value_fecha_limitepago = $this->fecha_limitepago;
   $old_value_saldoanterior = $this->saldoanterior;
   $old_value_valorpagado = $this->valorpagado;
   $old_value_saldoactual = $this->saldoactual;
   $old_value_valor_ultimafactura = $this->valor_ultimafactura;
   $old_value_fecha_factura = $this->fecha_factura;
   $old_value_usuario_crea = $this->usuario_crea;
   $old_value_usuario_edita = $this->usuario_edita;
   $old_value_id_ter_cont = $this->id_ter_cont;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_contrato = $this->numero_contrato;
   $unformatted_value_fecha_contrato = $this->fecha_contrato;
   $unformatted_value_fecha_inicio = $this->fecha_inicio;
   $unformatted_value_fecha_corte = $this->fecha_corte;
   $unformatted_value_mensualidad = $this->mensualidad;
   $unformatted_value_fecha_ultimopago = $this->fecha_ultimopago;
   $unformatted_value_fecha_limitepago = $this->fecha_limitepago;
   $unformatted_value_saldoanterior = $this->saldoanterior;
   $unformatted_value_valorpagado = $this->valorpagado;
   $unformatted_value_saldoactual = $this->saldoactual;
   $unformatted_value_valor_ultimafactura = $this->valor_ultimafactura;
   $unformatted_value_fecha_factura = $this->fecha_factura;
   $unformatted_value_usuario_crea = $this->usuario_crea;
   $unformatted_value_usuario_edita = $this->usuario_edita;
   $unformatted_value_id_ter_cont = $this->id_ter_cont;

   $nm_comando = "SELECT codigo_estado, descripcion  FROM terceros_contratos_estado  ORDER BY descripcion";

   $this->numero_contrato = $old_value_numero_contrato;
   $this->fecha_contrato = $old_value_fecha_contrato;
   $this->fecha_inicio = $old_value_fecha_inicio;
   $this->fecha_corte = $old_value_fecha_corte;
   $this->mensualidad = $old_value_mensualidad;
   $this->fecha_ultimopago = $old_value_fecha_ultimopago;
   $this->fecha_limitepago = $old_value_fecha_limitepago;
   $this->saldoanterior = $old_value_saldoanterior;
   $this->valorpagado = $old_value_valorpagado;
   $this->saldoactual = $old_value_saldoactual;
   $this->valor_ultimafactura = $old_value_valor_ultimafactura;
   $this->fecha_factura = $old_value_fecha_factura;
   $this->usuario_crea = $old_value_usuario_crea;
   $this->usuario_edita = $old_value_usuario_edita;
   $this->id_ter_cont = $old_value_id_ter_cont;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estado'][] = $rs->fields[0];
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
   $estado_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->estado_1))
          {
              foreach ($this->estado_1 as $tmp_estado)
              {
                  if (trim($tmp_estado) === trim($cadaselect[1])) { $estado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->estado) === trim($cadaselect[1])) { $estado_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">" . $estado_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_estado();
   $x = 0 ; 
   $estado_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->estado_1))
          {
              foreach ($this->estado_1 as $tmp_estado)
              {
                  if (trim($tmp_estado) === trim($cadaselect[1])) { $estado_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->estado) === trim($cadaselect[1])) { $estado_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($estado_look))
          {
              $estado_look = $this->estado;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_estado\" class=\"css_estado_line\" style=\"" .  $sStyleReadLab_estado . "\">" . $this->form_format_readonly("estado", $this->form_encode_input($estado_look)) . "</span><span id=\"id_read_off_estado\" class=\"css_read_off_estado" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_estado . "\">";
   echo " <span id=\"idAjaxSelect_estado\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_estado_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_estado\" name=\"estado\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->estado) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->estado)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['estrato']))
   {
       $this->nm_new_label['estrato'] = "Estrato";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estrato = $this->estrato;
   $sStyleHidden_estrato = '';
   if (isset($this->nmgp_cmp_hidden['estrato']) && $this->nmgp_cmp_hidden['estrato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estrato']);
       $sStyleHidden_estrato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estrato = 'display: none;';
   $sStyleReadInp_estrato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estrato']) && $this->nmgp_cmp_readonly['estrato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estrato']);
       $sStyleReadLab_estrato = '';
       $sStyleReadInp_estrato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estrato']) && $this->nmgp_cmp_hidden['estrato'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="estrato" value="<?php echo $this->form_encode_input($this->estrato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estrato_line" id="hidden_field_data_estrato" style="<?php echo $sStyleHidden_estrato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estrato_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estrato_label" style=""><span id="id_label_estrato"><?php echo $this->nm_new_label['estrato']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estrato"]) &&  $this->nmgp_cmp_readonly["estrato"] == "on") { 

$estrato_look = "";
 if ($this->estrato == "1") { $estrato_look .= "UNO" ;} 
 if ($this->estrato == "2") { $estrato_look .= "DOS" ;} 
 if ($this->estrato == "3") { $estrato_look .= "TRES" ;} 
 if ($this->estrato == "4") { $estrato_look .= "CUATRO" ;} 
 if ($this->estrato == "5") { $estrato_look .= "CINCO" ;} 
 if ($this->estrato == "6") { $estrato_look .= "SEIS" ;} 
 if ($this->estrato == "C") { $estrato_look .= "COMERCIAL" ;} 
 if (empty($estrato_look)) { $estrato_look = $this->estrato; }
?>
<input type="hidden" name="estrato" value="<?php echo $this->form_encode_input($estrato) . "\">" . $estrato_look . ""; ?>
<?php } else { ?>
<?php

$estrato_look = "";
 if ($this->estrato == "1") { $estrato_look .= "UNO" ;} 
 if ($this->estrato == "2") { $estrato_look .= "DOS" ;} 
 if ($this->estrato == "3") { $estrato_look .= "TRES" ;} 
 if ($this->estrato == "4") { $estrato_look .= "CUATRO" ;} 
 if ($this->estrato == "5") { $estrato_look .= "CINCO" ;} 
 if ($this->estrato == "6") { $estrato_look .= "SEIS" ;} 
 if ($this->estrato == "C") { $estrato_look .= "COMERCIAL" ;} 
 if (empty($estrato_look)) { $estrato_look = $this->estrato; }
?>
<span id="id_read_on_estrato" class="css_estrato_line"  style="<?php echo $sStyleReadLab_estrato; ?>"><?php echo $this->form_format_readonly("estrato", $this->form_encode_input($estrato_look)); ?></span><span id="id_read_off_estrato" class="css_read_off_estrato<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_estrato; ?>">
 <span id="idAjaxSelect_estrato" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_estrato_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estrato" name="estrato" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->estrato == "1") { echo " selected" ;} ?><?php  if (empty($this->estrato)) { echo " selected" ;} ?>>UNO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = '1'; ?>
 <option  value="2" <?php  if ($this->estrato == "2") { echo " selected" ;} ?>>DOS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = '2'; ?>
 <option  value="3" <?php  if ($this->estrato == "3") { echo " selected" ;} ?>>TRES</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = '3'; ?>
 <option  value="4" <?php  if ($this->estrato == "4") { echo " selected" ;} ?>>CUATRO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = '4'; ?>
 <option  value="5" <?php  if ($this->estrato == "5") { echo " selected" ;} ?>>CINCO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = '5'; ?>
 <option  value="6" <?php  if ($this->estrato == "6") { echo " selected" ;} ?>>SEIS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = '6'; ?>
 <option  value="C" <?php  if ($this->estrato == "C") { echo " selected" ;} ?>>COMERCIAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_estrato'][] = 'C'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estrato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estrato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_estado_dumb = ('' == $sStyleHidden_estado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_estado_dumb" style="<?php echo $sStyleHidden_estado_dumb; ?>"></TD>
<?php $sStyleHidden_estrato_dumb = ('' == $sStyleHidden_estrato) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_estrato_dumb" style="<?php echo $sStyleHidden_estrato_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['motivo']))
   {
       $this->nm_new_label['motivo'] = "Motivo corte";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $motivo = $this->motivo;
   $sStyleHidden_motivo = '';
   if (isset($this->nmgp_cmp_hidden['motivo']) && $this->nmgp_cmp_hidden['motivo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['motivo']);
       $sStyleHidden_motivo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_motivo = 'display: none;';
   $sStyleReadInp_motivo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['motivo']) && $this->nmgp_cmp_readonly['motivo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['motivo']);
       $sStyleReadLab_motivo = '';
       $sStyleReadInp_motivo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['motivo']) && $this->nmgp_cmp_hidden['motivo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="motivo" value="<?php echo $this->form_encode_input($this->motivo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_motivo_line" id="hidden_field_data_motivo" style="<?php echo $sStyleHidden_motivo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_motivo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_motivo_label" style=""><span id="id_label_motivo"><?php echo $this->nm_new_label['motivo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["motivo"]) &&  $this->nmgp_cmp_readonly["motivo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo'] = array(); 
    }

   $old_value_numero_contrato = $this->numero_contrato;
   $old_value_fecha_contrato = $this->fecha_contrato;
   $old_value_fecha_inicio = $this->fecha_inicio;
   $old_value_fecha_corte = $this->fecha_corte;
   $old_value_mensualidad = $this->mensualidad;
   $old_value_fecha_ultimopago = $this->fecha_ultimopago;
   $old_value_fecha_limitepago = $this->fecha_limitepago;
   $old_value_saldoanterior = $this->saldoanterior;
   $old_value_valorpagado = $this->valorpagado;
   $old_value_saldoactual = $this->saldoactual;
   $old_value_valor_ultimafactura = $this->valor_ultimafactura;
   $old_value_fecha_factura = $this->fecha_factura;
   $old_value_usuario_crea = $this->usuario_crea;
   $old_value_usuario_edita = $this->usuario_edita;
   $old_value_id_ter_cont = $this->id_ter_cont;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_contrato = $this->numero_contrato;
   $unformatted_value_fecha_contrato = $this->fecha_contrato;
   $unformatted_value_fecha_inicio = $this->fecha_inicio;
   $unformatted_value_fecha_corte = $this->fecha_corte;
   $unformatted_value_mensualidad = $this->mensualidad;
   $unformatted_value_fecha_ultimopago = $this->fecha_ultimopago;
   $unformatted_value_fecha_limitepago = $this->fecha_limitepago;
   $unformatted_value_saldoanterior = $this->saldoanterior;
   $unformatted_value_valorpagado = $this->valorpagado;
   $unformatted_value_saldoactual = $this->saldoactual;
   $unformatted_value_valor_ultimafactura = $this->valor_ultimafactura;
   $unformatted_value_fecha_factura = $this->fecha_factura;
   $unformatted_value_usuario_crea = $this->usuario_crea;
   $unformatted_value_usuario_edita = $this->usuario_edita;
   $unformatted_value_id_ter_cont = $this->id_ter_cont;

   $nm_comando = "SELECT codigo_motivo, concat(codigo_motivo,' - ',descripcion_motivo)  FROM terceros_contratos_motivoscorte  ORDER BY codigo_motivo, descripcion_motivo";

   $this->numero_contrato = $old_value_numero_contrato;
   $this->fecha_contrato = $old_value_fecha_contrato;
   $this->fecha_inicio = $old_value_fecha_inicio;
   $this->fecha_corte = $old_value_fecha_corte;
   $this->mensualidad = $old_value_mensualidad;
   $this->fecha_ultimopago = $old_value_fecha_ultimopago;
   $this->fecha_limitepago = $old_value_fecha_limitepago;
   $this->saldoanterior = $old_value_saldoanterior;
   $this->valorpagado = $old_value_valorpagado;
   $this->saldoactual = $old_value_saldoactual;
   $this->valor_ultimafactura = $old_value_valor_ultimafactura;
   $this->fecha_factura = $old_value_fecha_factura;
   $this->usuario_crea = $old_value_usuario_crea;
   $this->usuario_edita = $old_value_usuario_edita;
   $this->id_ter_cont = $old_value_id_ter_cont;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo'][] = $rs->fields[0];
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
   $motivo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->motivo_1))
          {
              foreach ($this->motivo_1 as $tmp_motivo)
              {
                  if (trim($tmp_motivo) === trim($cadaselect[1])) { $motivo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->motivo) === trim($cadaselect[1])) { $motivo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="motivo" value="<?php echo $this->form_encode_input($motivo) . "\">" . $motivo_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_motivo();
   $x = 0 ; 
   $motivo_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->motivo_1))
          {
              foreach ($this->motivo_1 as $tmp_motivo)
              {
                  if (trim($tmp_motivo) === trim($cadaselect[1])) { $motivo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->motivo) === trim($cadaselect[1])) { $motivo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($motivo_look))
          {
              $motivo_look = $this->motivo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_motivo\" class=\"css_motivo_line\" style=\"" .  $sStyleReadLab_motivo . "\">" . $this->form_format_readonly("motivo", $this->form_encode_input($motivo_look)) . "</span><span id=\"id_read_off_motivo\" class=\"css_read_off_motivo" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_motivo . "\">";
   echo " <span id=\"idAjaxSelect_motivo\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_motivo_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_motivo\" name=\"motivo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_motivo'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->motivo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->motivo)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_motivo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_motivo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_corte']))
    {
        $this->nm_new_label['fecha_corte'] = "Fecha Corte";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_corte = $this->fecha_corte;
   $sStyleHidden_fecha_corte = '';
   if (isset($this->nmgp_cmp_hidden['fecha_corte']) && $this->nmgp_cmp_hidden['fecha_corte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_corte']);
       $sStyleHidden_fecha_corte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_corte = 'display: none;';
   $sStyleReadInp_fecha_corte = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_corte']) && $this->nmgp_cmp_readonly['fecha_corte'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_corte']);
       $sStyleReadLab_fecha_corte = '';
       $sStyleReadInp_fecha_corte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_corte']) && $this->nmgp_cmp_hidden['fecha_corte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_corte" value="<?php echo $this->form_encode_input($fecha_corte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_corte_line" id="hidden_field_data_fecha_corte" style="<?php echo $sStyleHidden_fecha_corte; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_corte_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_corte_label" style=""><span id="id_label_fecha_corte"><?php echo $this->nm_new_label['fecha_corte']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_corte"]) &&  $this->nmgp_cmp_readonly["fecha_corte"] == "on") { 

 ?>
<input type="hidden" name="fecha_corte" value="<?php echo $this->form_encode_input($fecha_corte) . "\">" . $fecha_corte . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_corte" class="sc-ui-readonly-fecha_corte css_fecha_corte_line" style="<?php echo $sStyleReadLab_fecha_corte; ?>"><?php echo $this->form_format_readonly("fecha_corte", $this->form_encode_input($fecha_corte)); ?></span><span id="id_read_off_fecha_corte" class="css_read_off_fecha_corte<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_corte; ?>"><?php
$tmp_form_data = $this->field_config['fecha_corte']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_fecha_corte_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_corte" type=text name="fecha_corte" value="<?php echo $this->form_encode_input($fecha_corte) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_corte']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_corte']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_corte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_corte_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_motivo_dumb = ('' == $sStyleHidden_motivo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_motivo_dumb" style="<?php echo $sStyleHidden_motivo_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_corte_dumb = ('' == $sStyleHidden_fecha_corte) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_corte_dumb" style="<?php echo $sStyleHidden_fecha_corte_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="20%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cliente']))
    {
        $this->nm_new_label['cliente'] = "Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cliente = $this->cliente;
   $sStyleHidden_cliente = '';
   if (isset($this->nmgp_cmp_hidden['cliente']) && $this->nmgp_cmp_hidden['cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cliente']);
       $sStyleHidden_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cliente = 'display: none;';
   $sStyleReadInp_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cliente']) && $this->nmgp_cmp_readonly['cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cliente']);
       $sStyleReadLab_cliente = '';
       $sStyleReadInp_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cliente']) && $this->nmgp_cmp_hidden['cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cliente" value="<?php echo $this->form_encode_input($cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cliente_line" id="hidden_field_data_cliente" style="<?php echo $sStyleHidden_cliente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cliente_label" style=""><span id="id_label_cliente"><?php echo $this->nm_new_label['cliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['cliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['cliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cliente"]) &&  $this->nmgp_cmp_readonly["cliente"] == "on") { 

 ?>
<input type="hidden" name="cliente" value="<?php echo $this->form_encode_input($cliente) . "\">" . $cliente . ""; ?>
<?php } else { ?>

<?php
$aRecData['cliente'] = $this->cliente;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente'] = array(); 
    }

   $old_value_numero_contrato = $this->numero_contrato;
   $old_value_fecha_contrato = $this->fecha_contrato;
   $old_value_fecha_inicio = $this->fecha_inicio;
   $old_value_fecha_corte = $this->fecha_corte;
   $old_value_mensualidad = $this->mensualidad;
   $old_value_fecha_ultimopago = $this->fecha_ultimopago;
   $old_value_fecha_limitepago = $this->fecha_limitepago;
   $old_value_saldoanterior = $this->saldoanterior;
   $old_value_valorpagado = $this->valorpagado;
   $old_value_saldoactual = $this->saldoactual;
   $old_value_valor_ultimafactura = $this->valor_ultimafactura;
   $old_value_fecha_factura = $this->fecha_factura;
   $old_value_usuario_crea = $this->usuario_crea;
   $old_value_usuario_edita = $this->usuario_edita;
   $old_value_id_ter_cont = $this->id_ter_cont;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_contrato = $this->numero_contrato;
   $unformatted_value_fecha_contrato = $this->fecha_contrato;
   $unformatted_value_fecha_inicio = $this->fecha_inicio;
   $unformatted_value_fecha_corte = $this->fecha_corte;
   $unformatted_value_mensualidad = $this->mensualidad;
   $unformatted_value_fecha_ultimopago = $this->fecha_ultimopago;
   $unformatted_value_fecha_limitepago = $this->fecha_limitepago;
   $unformatted_value_saldoanterior = $this->saldoanterior;
   $unformatted_value_valorpagado = $this->valorpagado;
   $unformatted_value_saldoactual = $this->saldoactual;
   $unformatted_value_valor_ultimafactura = $this->valor_ultimafactura;
   $unformatted_value_fecha_factura = $this->fecha_factura;
   $unformatted_value_usuario_crea = $this->usuario_crea;
   $unformatted_value_usuario_edita = $this->usuario_edita;
   $unformatted_value_id_ter_cont = $this->id_ter_cont;

   $nm_comando = "SELECT documento, concat(documento,' - ',nombres) FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->cliente), 1, -1) . "' ORDER BY documento, nombres";

   $this->numero_contrato = $old_value_numero_contrato;
   $this->fecha_contrato = $old_value_fecha_contrato;
   $this->fecha_inicio = $old_value_fecha_inicio;
   $this->fecha_corte = $old_value_fecha_corte;
   $this->mensualidad = $old_value_mensualidad;
   $this->fecha_ultimopago = $old_value_fecha_ultimopago;
   $this->fecha_limitepago = $old_value_fecha_limitepago;
   $this->saldoanterior = $old_value_saldoanterior;
   $this->valorpagado = $old_value_valorpagado;
   $this->saldoactual = $old_value_saldoactual;
   $this->valor_ultimafactura = $old_value_valor_ultimafactura;
   $this->fecha_factura = $old_value_fecha_factura;
   $this->usuario_crea = $old_value_usuario_crea;
   $this->usuario_edita = $old_value_usuario_edita;
   $this->id_ter_cont = $old_value_id_ter_cont;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : $this->cliente;
$cliente_look = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : $this->cliente;
?>
<span id="id_read_on_cliente" class="sc-ui-readonly-cliente css_cliente_line" style="<?php echo $sStyleReadLab_cliente; ?>"><?php echo $this->form_format_readonly("cliente", str_replace("<", "&lt;", $cliente_look)); ?></span><span id="id_read_off_cliente" class="css_read_off_cliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_cliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_cliente" type=text name="cliente" value="<?php echo $this->form_encode_input($cliente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=400"; } ?> maxlength=14 style="display: none" alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['cliente'] = $this->cliente;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente'] = array(); 
    }

   $old_value_numero_contrato = $this->numero_contrato;
   $old_value_fecha_contrato = $this->fecha_contrato;
   $old_value_fecha_inicio = $this->fecha_inicio;
   $old_value_fecha_corte = $this->fecha_corte;
   $old_value_mensualidad = $this->mensualidad;
   $old_value_fecha_ultimopago = $this->fecha_ultimopago;
   $old_value_fecha_limitepago = $this->fecha_limitepago;
   $old_value_saldoanterior = $this->saldoanterior;
   $old_value_valorpagado = $this->valorpagado;
   $old_value_saldoactual = $this->saldoactual;
   $old_value_valor_ultimafactura = $this->valor_ultimafactura;
   $old_value_fecha_factura = $this->fecha_factura;
   $old_value_usuario_crea = $this->usuario_crea;
   $old_value_usuario_edita = $this->usuario_edita;
   $old_value_id_ter_cont = $this->id_ter_cont;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_contrato = $this->numero_contrato;
   $unformatted_value_fecha_contrato = $this->fecha_contrato;
   $unformatted_value_fecha_inicio = $this->fecha_inicio;
   $unformatted_value_fecha_corte = $this->fecha_corte;
   $unformatted_value_mensualidad = $this->mensualidad;
   $unformatted_value_fecha_ultimopago = $this->fecha_ultimopago;
   $unformatted_value_fecha_limitepago = $this->fecha_limitepago;
   $unformatted_value_saldoanterior = $this->saldoanterior;
   $unformatted_value_valorpagado = $this->valorpagado;
   $unformatted_value_saldoactual = $this->saldoactual;
   $unformatted_value_valor_ultimafactura = $this->valor_ultimafactura;
   $unformatted_value_fecha_factura = $this->fecha_factura;
   $unformatted_value_usuario_crea = $this->usuario_crea;
   $unformatted_value_usuario_edita = $this->usuario_edita;
   $unformatted_value_id_ter_cont = $this->id_ter_cont;

   $nm_comando = "SELECT documento, concat(documento,' - ',nombres) FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->cliente), 1, -1) . "' ORDER BY documento, nombres";

   $this->numero_contrato = $old_value_numero_contrato;
   $this->fecha_contrato = $old_value_fecha_contrato;
   $this->fecha_inicio = $old_value_fecha_inicio;
   $this->fecha_corte = $old_value_fecha_corte;
   $this->mensualidad = $old_value_mensualidad;
   $this->fecha_ultimopago = $old_value_fecha_ultimopago;
   $this->fecha_limitepago = $old_value_fecha_limitepago;
   $this->saldoanterior = $old_value_saldoanterior;
   $this->valorpagado = $old_value_valorpagado;
   $this->saldoactual = $old_value_saldoactual;
   $this->valor_ultimafactura = $old_value_valor_ultimafactura;
   $this->fecha_factura = $old_value_fecha_factura;
   $this->usuario_crea = $old_value_usuario_crea;
   $this->usuario_edita = $old_value_usuario_edita;
   $this->id_ter_cont = $old_value_id_ter_cont;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_cliente'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : '';
$cliente_look = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : '';
?>
<select id="id_ac_cliente" class="scFormObjectOdd sc-ui-autocomp-cliente css_cliente_obj"><?php if ('' != $this->cliente) { ?><option value="<?php echo $this->cliente ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select>
<?php
   if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
       $Parms_Lig  = "pa*scin0*scoutsa*scin0*scoutid_tercero*scin*scoutpn*scin0*scoutsn*scin0*scoutgidtercero*scin0*scoutnomb*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_terceros_contratos_lkpedt_refresh_cliente*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_terceros_contratos@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "pa*scin0*scoutsa*scin0*scoutid_tercero*scin*scoutpn*scin0*scoutsn*scin0*scoutgidtercero*scin0*scoutnomb*scin0*scoutnm_evt_ret_edit*scindo_ajax_form_terceros_contratos_lkpedt_refresh_cliente*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
?>
<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "fldedt_cliente", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cliente_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['telefono'] = "Teléfono";
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

    <TD class="scFormDataOdd css_telefono_line" id="hidden_field_data_telefono" style="<?php echo $sStyleHidden_telefono; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefono_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telefono_label" style=""><span id="id_label_telefono"><?php echo $this->nm_new_label['telefono']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['telefono']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['telefono'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono"]) &&  $this->nmgp_cmp_readonly["telefono"] == "on") { 

 ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">" . $telefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono" class="sc-ui-readonly-telefono css_telefono_line" style="<?php echo $sStyleReadLab_telefono; ?>"><?php echo $this->form_format_readonly("telefono", $this->form_encode_input($this->telefono)); ?></span><span id="id_read_off_telefono" class="css_read_off_telefono<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefono_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefono" type=text name="telefono" value="<?php echo $this->form_encode_input($telefono) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['zona']))
   {
       $this->nm_new_label['zona'] = "Zona";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zona = $this->zona;
   $sStyleHidden_zona = '';
   if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zona']);
       $sStyleHidden_zona = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zona = 'display: none;';
   $sStyleReadInp_zona = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zona']) && $this->nmgp_cmp_readonly['zona'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zona']);
       $sStyleReadLab_zona = '';
       $sStyleReadInp_zona = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zona']) && $this->nmgp_cmp_hidden['zona'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="zona" value="<?php echo $this->form_encode_input($this->zona) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zona_line" id="hidden_field_data_zona" style="<?php echo $sStyleHidden_zona; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zona_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zona_label" style=""><span id="id_label_zona"><?php echo $this->nm_new_label['zona']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['zona']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['zona'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zona"]) &&  $this->nmgp_cmp_readonly["zona"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona'] = array(); 
    }

   $old_value_numero_contrato = $this->numero_contrato;
   $old_value_fecha_contrato = $this->fecha_contrato;
   $old_value_fecha_inicio = $this->fecha_inicio;
   $old_value_fecha_corte = $this->fecha_corte;
   $old_value_mensualidad = $this->mensualidad;
   $old_value_fecha_ultimopago = $this->fecha_ultimopago;
   $old_value_fecha_limitepago = $this->fecha_limitepago;
   $old_value_saldoanterior = $this->saldoanterior;
   $old_value_valorpagado = $this->valorpagado;
   $old_value_saldoactual = $this->saldoactual;
   $old_value_valor_ultimafactura = $this->valor_ultimafactura;
   $old_value_fecha_factura = $this->fecha_factura;
   $old_value_usuario_crea = $this->usuario_crea;
   $old_value_usuario_edita = $this->usuario_edita;
   $old_value_id_ter_cont = $this->id_ter_cont;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_contrato = $this->numero_contrato;
   $unformatted_value_fecha_contrato = $this->fecha_contrato;
   $unformatted_value_fecha_inicio = $this->fecha_inicio;
   $unformatted_value_fecha_corte = $this->fecha_corte;
   $unformatted_value_mensualidad = $this->mensualidad;
   $unformatted_value_fecha_ultimopago = $this->fecha_ultimopago;
   $unformatted_value_fecha_limitepago = $this->fecha_limitepago;
   $unformatted_value_saldoanterior = $this->saldoanterior;
   $unformatted_value_valorpagado = $this->valorpagado;
   $unformatted_value_saldoactual = $this->saldoactual;
   $unformatted_value_valor_ultimafactura = $this->valor_ultimafactura;
   $unformatted_value_fecha_factura = $this->fecha_factura;
   $unformatted_value_usuario_crea = $this->usuario_crea;
   $unformatted_value_usuario_edita = $this->usuario_edita;
   $unformatted_value_id_ter_cont = $this->id_ter_cont;

   $nm_comando = "SELECT codigo, nombre  FROM zona_clientes  ORDER BY nombre";

   $this->numero_contrato = $old_value_numero_contrato;
   $this->fecha_contrato = $old_value_fecha_contrato;
   $this->fecha_inicio = $old_value_fecha_inicio;
   $this->fecha_corte = $old_value_fecha_corte;
   $this->mensualidad = $old_value_mensualidad;
   $this->fecha_ultimopago = $old_value_fecha_ultimopago;
   $this->fecha_limitepago = $old_value_fecha_limitepago;
   $this->saldoanterior = $old_value_saldoanterior;
   $this->valorpagado = $old_value_valorpagado;
   $this->saldoactual = $old_value_saldoactual;
   $this->valor_ultimafactura = $old_value_valor_ultimafactura;
   $this->fecha_factura = $old_value_fecha_factura;
   $this->usuario_crea = $old_value_usuario_crea;
   $this->usuario_edita = $old_value_usuario_edita;
   $this->id_ter_cont = $old_value_id_ter_cont;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona'][] = $rs->fields[0];
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
   $zona_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zona_1))
          {
              foreach ($this->zona_1 as $tmp_zona)
              {
                  if (trim($tmp_zona) === trim($cadaselect[1])) { $zona_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zona) === trim($cadaselect[1])) { $zona_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="zona" value="<?php echo $this->form_encode_input($zona) . "\">" . $zona_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_zona();
   $x = 0 ; 
   $zona_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->zona_1))
          {
              foreach ($this->zona_1 as $tmp_zona)
              {
                  if (trim($tmp_zona) === trim($cadaselect[1])) { $zona_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->zona) === trim($cadaselect[1])) { $zona_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($zona_look))
          {
              $zona_look = $this->zona;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_zona\" class=\"css_zona_line\" style=\"" .  $sStyleReadLab_zona . "\">" . $this->form_format_readonly("zona", $this->form_encode_input($zona_look)) . "</span><span id=\"id_read_off_zona\" class=\"css_read_off_zona" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_zona . "\">";
   echo " <span id=\"idAjaxSelect_zona\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_zona_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_zona\" name=\"zona\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_zona'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->zona) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->zona)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zona_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zona_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['barrio']))
   {
       $this->nm_new_label['barrio'] = "Barrio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $barrio = $this->barrio;
   $sStyleHidden_barrio = '';
   if (isset($this->nmgp_cmp_hidden['barrio']) && $this->nmgp_cmp_hidden['barrio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['barrio']);
       $sStyleHidden_barrio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_barrio = 'display: none;';
   $sStyleReadInp_barrio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['barrio']) && $this->nmgp_cmp_readonly['barrio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['barrio']);
       $sStyleReadLab_barrio = '';
       $sStyleReadInp_barrio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['barrio']) && $this->nmgp_cmp_hidden['barrio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="barrio" value="<?php echo $this->form_encode_input($this->barrio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_barrio_line" id="hidden_field_data_barrio" style="<?php echo $sStyleHidden_barrio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_barrio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_barrio_label" style=""><span id="id_label_barrio"><?php echo $this->nm_new_label['barrio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['barrio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['barrio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["barrio"]) &&  $this->nmgp_cmp_readonly["barrio"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio'] = array(); 
    }

   $old_value_numero_contrato = $this->numero_contrato;
   $old_value_fecha_contrato = $this->fecha_contrato;
   $old_value_fecha_inicio = $this->fecha_inicio;
   $old_value_fecha_corte = $this->fecha_corte;
   $old_value_mensualidad = $this->mensualidad;
   $old_value_fecha_ultimopago = $this->fecha_ultimopago;
   $old_value_fecha_limitepago = $this->fecha_limitepago;
   $old_value_saldoanterior = $this->saldoanterior;
   $old_value_valorpagado = $this->valorpagado;
   $old_value_saldoactual = $this->saldoactual;
   $old_value_valor_ultimafactura = $this->valor_ultimafactura;
   $old_value_fecha_factura = $this->fecha_factura;
   $old_value_usuario_crea = $this->usuario_crea;
   $old_value_usuario_edita = $this->usuario_edita;
   $old_value_id_ter_cont = $this->id_ter_cont;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_contrato = $this->numero_contrato;
   $unformatted_value_fecha_contrato = $this->fecha_contrato;
   $unformatted_value_fecha_inicio = $this->fecha_inicio;
   $unformatted_value_fecha_corte = $this->fecha_corte;
   $unformatted_value_mensualidad = $this->mensualidad;
   $unformatted_value_fecha_ultimopago = $this->fecha_ultimopago;
   $unformatted_value_fecha_limitepago = $this->fecha_limitepago;
   $unformatted_value_saldoanterior = $this->saldoanterior;
   $unformatted_value_valorpagado = $this->valorpagado;
   $unformatted_value_saldoactual = $this->saldoactual;
   $unformatted_value_valor_ultimafactura = $this->valor_ultimafactura;
   $unformatted_value_fecha_factura = $this->fecha_factura;
   $unformatted_value_usuario_crea = $this->usuario_crea;
   $unformatted_value_usuario_edita = $this->usuario_edita;
   $unformatted_value_id_ter_cont = $this->id_ter_cont;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' ' + descripcion  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' ' ,descripcion)  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' '&descripcion  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' '||descripcion  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' ' + descripcion  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' '||descripcion  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' '||descripcion  FROM barrios WHERE cod_zona=" . $_SESSION['gZona'] . " ORDER BY codigo, descripcion";
   }

   $this->numero_contrato = $old_value_numero_contrato;
   $this->fecha_contrato = $old_value_fecha_contrato;
   $this->fecha_inicio = $old_value_fecha_inicio;
   $this->fecha_corte = $old_value_fecha_corte;
   $this->mensualidad = $old_value_mensualidad;
   $this->fecha_ultimopago = $old_value_fecha_ultimopago;
   $this->fecha_limitepago = $old_value_fecha_limitepago;
   $this->saldoanterior = $old_value_saldoanterior;
   $this->valorpagado = $old_value_valorpagado;
   $this->saldoactual = $old_value_saldoactual;
   $this->valor_ultimafactura = $old_value_valor_ultimafactura;
   $this->fecha_factura = $old_value_fecha_factura;
   $this->usuario_crea = $old_value_usuario_crea;
   $this->usuario_edita = $old_value_usuario_edita;
   $this->id_ter_cont = $old_value_id_ter_cont;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio'][] = $rs->fields[0];
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
   $barrio_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->barrio_1))
          {
              foreach ($this->barrio_1 as $tmp_barrio)
              {
                  if (trim($tmp_barrio) === trim($cadaselect[1])) { $barrio_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->barrio) === trim($cadaselect[1])) { $barrio_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="barrio" value="<?php echo $this->form_encode_input($barrio) . "\">" . $barrio_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_barrio();
   $x = 0 ; 
   $barrio_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->barrio_1))
          {
              foreach ($this->barrio_1 as $tmp_barrio)
              {
                  if (trim($tmp_barrio) === trim($cadaselect[1])) { $barrio_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->barrio) === trim($cadaselect[1])) { $barrio_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($barrio_look))
          {
              $barrio_look = $this->barrio;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_barrio\" class=\"css_barrio_line\" style=\"" .  $sStyleReadLab_barrio . "\">" . $this->form_format_readonly("barrio", $this->form_encode_input($barrio_look)) . "</span><span id=\"id_read_off_barrio\" class=\"css_read_off_barrio" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_barrio . "\">";
   echo " <span id=\"idAjaxSelect_barrio\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_barrio_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_barrio\" name=\"barrio\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_barrio'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->barrio) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->barrio)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_barrio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_barrio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_barrio_dumb = ('' == $sStyleHidden_barrio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_barrio_dumb" style="<?php echo $sStyleHidden_barrio_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="20%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mensualidad']))
    {
        $this->nm_new_label['mensualidad'] = "Mensualidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mensualidad = $this->mensualidad;
   $sStyleHidden_mensualidad = '';
   if (isset($this->nmgp_cmp_hidden['mensualidad']) && $this->nmgp_cmp_hidden['mensualidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mensualidad']);
       $sStyleHidden_mensualidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mensualidad = 'display: none;';
   $sStyleReadInp_mensualidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mensualidad']) && $this->nmgp_cmp_readonly['mensualidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mensualidad']);
       $sStyleReadLab_mensualidad = '';
       $sStyleReadInp_mensualidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mensualidad']) && $this->nmgp_cmp_hidden['mensualidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mensualidad" value="<?php echo $this->form_encode_input($mensualidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mensualidad_line" id="hidden_field_data_mensualidad" style="<?php echo $sStyleHidden_mensualidad; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mensualidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mensualidad_label" style=""><span id="id_label_mensualidad"><?php echo $this->nm_new_label['mensualidad']; ?></span></span><br><input type="hidden" name="mensualidad" value="<?php echo $this->form_encode_input($mensualidad); ?>"><span id="id_ajax_label_mensualidad"><?php echo nl2br($mensualidad); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mensualidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mensualidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precinto']))
    {
        $this->nm_new_label['precinto'] = "Precinto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precinto = $this->precinto;
   $sStyleHidden_precinto = '';
   if (isset($this->nmgp_cmp_hidden['precinto']) && $this->nmgp_cmp_hidden['precinto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precinto']);
       $sStyleHidden_precinto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precinto = 'display: none;';
   $sStyleReadInp_precinto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precinto']) && $this->nmgp_cmp_readonly['precinto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precinto']);
       $sStyleReadLab_precinto = '';
       $sStyleReadInp_precinto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precinto']) && $this->nmgp_cmp_hidden['precinto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precinto" value="<?php echo $this->form_encode_input($precinto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_precinto_line" id="hidden_field_data_precinto" style="<?php echo $sStyleHidden_precinto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precinto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_precinto_label" style=""><span id="id_label_precinto"><?php echo $this->nm_new_label['precinto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precinto"]) &&  $this->nmgp_cmp_readonly["precinto"] == "on") { 

 ?>
<input type="hidden" name="precinto" value="<?php echo $this->form_encode_input($precinto) . "\">" . $precinto . ""; ?>
<?php } else { ?>
<span id="id_read_on_precinto" class="sc-ui-readonly-precinto css_precinto_line" style="<?php echo $sStyleReadLab_precinto; ?>"><?php echo $this->form_format_readonly("precinto", $this->form_encode_input($this->precinto)); ?></span><span id="id_read_off_precinto" class="css_read_off_precinto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precinto; ?>">
 <input class="sc-js-input scFormObjectOdd css_precinto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precinto" type=text name="precinto" value="<?php echo $this->form_encode_input($precinto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ ._-") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precinto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precinto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['correo']))
    {
        $this->nm_new_label['correo'] = "Correo";
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

    <TD class="scFormDataOdd css_correo_line" id="hidden_field_data_correo" style="<?php echo $sStyleHidden_correo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_correo_label" style=""><span id="id_label_correo"><?php echo $this->nm_new_label['correo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['correo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['correo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo"]) &&  $this->nmgp_cmp_readonly["correo"] == "on") { 

 ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">" . $correo . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo" class="sc-ui-readonly-correo css_correo_line" style="<?php echo $sStyleReadLab_correo; ?>"><?php echo $this->form_format_readonly("correo", $this->form_encode_input($this->correo)); ?></span><span id="id_read_off_correo" class="css_read_off_correo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo" type=text name="correo" value="<?php echo $this->form_encode_input($correo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.correo.value != '') {window.open('mailto:' + document.F1.correo.value); }", "if (document.F1.correo.value != '') {window.open('mailto:' + document.F1.correo.value); }", "correo_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['direccion'] = "Dirección";
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

    <TD class="scFormDataOdd css_direccion_line" id="hidden_field_data_direccion" style="<?php echo $sStyleHidden_direccion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_direccion_label" style=""><span id="id_label_direccion"><?php echo $this->nm_new_label['direccion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['direccion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['php_cmp_required']['direccion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion"]) &&  $this->nmgp_cmp_readonly["direccion"] == "on") { 

 ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">" . $direccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion" class="sc-ui-readonly-direccion css_direccion_line" style="<?php echo $sStyleReadLab_direccion; ?>"><?php echo $this->form_format_readonly("direccion", $this->form_encode_input($this->direccion)); ?></span><span id="id_read_off_direccion" class="css_read_off_direccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_direccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direccion" type=text name="direccion" value="<?php echo $this->form_encode_input($direccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_direccion_dumb = ('' == $sStyleHidden_direccion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_direccion_dumb" style="<?php echo $sStyleHidden_direccion_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="20%" height="">
   <a name="bloco_3"></a>
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_ultimopago']))
    {
        $this->nm_new_label['fecha_ultimopago'] = "Fec. Últ. pago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_ultimopago = $this->fecha_ultimopago;
   $sStyleHidden_fecha_ultimopago = '';
   if (isset($this->nmgp_cmp_hidden['fecha_ultimopago']) && $this->nmgp_cmp_hidden['fecha_ultimopago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_ultimopago']);
       $sStyleHidden_fecha_ultimopago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_ultimopago = 'display: none;';
   $sStyleReadInp_fecha_ultimopago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_ultimopago']) && $this->nmgp_cmp_readonly['fecha_ultimopago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_ultimopago']);
       $sStyleReadLab_fecha_ultimopago = '';
       $sStyleReadInp_fecha_ultimopago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_ultimopago']) && $this->nmgp_cmp_hidden['fecha_ultimopago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_ultimopago" value="<?php echo $this->form_encode_input($fecha_ultimopago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_ultimopago_line" id="hidden_field_data_fecha_ultimopago" style="<?php echo $sStyleHidden_fecha_ultimopago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_ultimopago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_ultimopago_label" style=""><span id="id_label_fecha_ultimopago"><?php echo $this->nm_new_label['fecha_ultimopago']; ?></span></span><br><input type="hidden" name="fecha_ultimopago" value="<?php echo $this->form_encode_input($fecha_ultimopago); ?>"><span id="id_ajax_label_fecha_ultimopago"><?php echo nl2br($fecha_ultimopago); ?></span>
<?php
$tmp_form_data = $this->field_config['fecha_ultimopago']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_ultimopago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_ultimopago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_limitepago']))
    {
        $this->nm_new_label['fecha_limitepago'] = "Fec. Límite pago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_limitepago = $this->fecha_limitepago;
   $sStyleHidden_fecha_limitepago = '';
   if (isset($this->nmgp_cmp_hidden['fecha_limitepago']) && $this->nmgp_cmp_hidden['fecha_limitepago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_limitepago']);
       $sStyleHidden_fecha_limitepago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_limitepago = 'display: none;';
   $sStyleReadInp_fecha_limitepago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_limitepago']) && $this->nmgp_cmp_readonly['fecha_limitepago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_limitepago']);
       $sStyleReadLab_fecha_limitepago = '';
       $sStyleReadInp_fecha_limitepago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_limitepago']) && $this->nmgp_cmp_hidden['fecha_limitepago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_limitepago" value="<?php echo $this->form_encode_input($fecha_limitepago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_limitepago_line" id="hidden_field_data_fecha_limitepago" style="<?php echo $sStyleHidden_fecha_limitepago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_limitepago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_limitepago_label" style=""><span id="id_label_fecha_limitepago"><?php echo $this->nm_new_label['fecha_limitepago']; ?></span></span><br><input type="hidden" name="fecha_limitepago" value="<?php echo $this->form_encode_input($fecha_limitepago); ?>"><span id="id_ajax_label_fecha_limitepago"><?php echo nl2br($fecha_limitepago); ?></span>
<?php
$tmp_form_data = $this->field_config['fecha_limitepago']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_limitepago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_limitepago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_fecha_ultimopago_dumb = ('' == $sStyleHidden_fecha_ultimopago) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_ultimopago_dumb" style="<?php echo $sStyleHidden_fecha_ultimopago_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_limitepago_dumb = ('' == $sStyleHidden_fecha_limitepago) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_limitepago_dumb" style="<?php echo $sStyleHidden_fecha_limitepago_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldoanterior']))
    {
        $this->nm_new_label['saldoanterior'] = "Saldo anterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldoanterior = $this->saldoanterior;
   $sStyleHidden_saldoanterior = '';
   if (isset($this->nmgp_cmp_hidden['saldoanterior']) && $this->nmgp_cmp_hidden['saldoanterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldoanterior']);
       $sStyleHidden_saldoanterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldoanterior = 'display: none;';
   $sStyleReadInp_saldoanterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldoanterior']) && $this->nmgp_cmp_readonly['saldoanterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldoanterior']);
       $sStyleReadLab_saldoanterior = '';
       $sStyleReadInp_saldoanterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldoanterior']) && $this->nmgp_cmp_hidden['saldoanterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldoanterior" value="<?php echo $this->form_encode_input($saldoanterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldoanterior_line" id="hidden_field_data_saldoanterior" style="<?php echo $sStyleHidden_saldoanterior; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldoanterior_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldoanterior_label" style=""><span id="id_label_saldoanterior"><?php echo $this->nm_new_label['saldoanterior']; ?></span></span><br><input type="hidden" name="saldoanterior" value="<?php echo $this->form_encode_input($saldoanterior); ?>"><span id="id_ajax_label_saldoanterior"><?php echo nl2br($saldoanterior); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldoanterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldoanterior_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valorpagado']))
    {
        $this->nm_new_label['valorpagado'] = "$ Últ. Pago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorpagado = $this->valorpagado;
   $sStyleHidden_valorpagado = '';
   if (isset($this->nmgp_cmp_hidden['valorpagado']) && $this->nmgp_cmp_hidden['valorpagado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorpagado']);
       $sStyleHidden_valorpagado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorpagado = 'display: none;';
   $sStyleReadInp_valorpagado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorpagado']) && $this->nmgp_cmp_readonly['valorpagado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorpagado']);
       $sStyleReadLab_valorpagado = '';
       $sStyleReadInp_valorpagado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorpagado']) && $this->nmgp_cmp_hidden['valorpagado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorpagado" value="<?php echo $this->form_encode_input($valorpagado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valorpagado_line" id="hidden_field_data_valorpagado" style="<?php echo $sStyleHidden_valorpagado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorpagado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valorpagado_label" style=""><span id="id_label_valorpagado"><?php echo $this->nm_new_label['valorpagado']; ?></span></span><br><input type="hidden" name="valorpagado" value="<?php echo $this->form_encode_input($valorpagado); ?>"><span id="id_ajax_label_valorpagado"><?php echo nl2br($valorpagado); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorpagado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorpagado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_saldoanterior_dumb = ('' == $sStyleHidden_saldoanterior) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_saldoanterior_dumb" style="<?php echo $sStyleHidden_saldoanterior_dumb; ?>"></TD>
<?php $sStyleHidden_valorpagado_dumb = ('' == $sStyleHidden_valorpagado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valorpagado_dumb" style="<?php echo $sStyleHidden_valorpagado_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldoactual']))
    {
        $this->nm_new_label['saldoactual'] = "Saldo actual";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldoactual = $this->saldoactual;
   $sStyleHidden_saldoactual = '';
   if (isset($this->nmgp_cmp_hidden['saldoactual']) && $this->nmgp_cmp_hidden['saldoactual'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldoactual']);
       $sStyleHidden_saldoactual = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldoactual = 'display: none;';
   $sStyleReadInp_saldoactual = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldoactual']) && $this->nmgp_cmp_readonly['saldoactual'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldoactual']);
       $sStyleReadLab_saldoactual = '';
       $sStyleReadInp_saldoactual = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldoactual']) && $this->nmgp_cmp_hidden['saldoactual'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldoactual" value="<?php echo $this->form_encode_input($saldoactual) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldoactual_line" id="hidden_field_data_saldoactual" style="<?php echo $sStyleHidden_saldoactual; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldoactual_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldoactual_label" style=""><span id="id_label_saldoactual"><?php echo $this->nm_new_label['saldoactual']; ?></span></span><br><input type="hidden" name="saldoactual" value="<?php echo $this->form_encode_input($saldoactual); ?>"><span id="id_ajax_label_saldoactual"><?php echo nl2br($saldoactual); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldoactual_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldoactual_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor_ultimafactura']))
    {
        $this->nm_new_label['valor_ultimafactura'] = "$ Últ. factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_ultimafactura = $this->valor_ultimafactura;
   $sStyleHidden_valor_ultimafactura = '';
   if (isset($this->nmgp_cmp_hidden['valor_ultimafactura']) && $this->nmgp_cmp_hidden['valor_ultimafactura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_ultimafactura']);
       $sStyleHidden_valor_ultimafactura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_ultimafactura = 'display: none;';
   $sStyleReadInp_valor_ultimafactura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_ultimafactura']) && $this->nmgp_cmp_readonly['valor_ultimafactura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_ultimafactura']);
       $sStyleReadLab_valor_ultimafactura = '';
       $sStyleReadInp_valor_ultimafactura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_ultimafactura']) && $this->nmgp_cmp_hidden['valor_ultimafactura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_ultimafactura" value="<?php echo $this->form_encode_input($valor_ultimafactura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_ultimafactura_line" id="hidden_field_data_valor_ultimafactura" style="<?php echo $sStyleHidden_valor_ultimafactura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_ultimafactura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_ultimafactura_label" style=""><span id="id_label_valor_ultimafactura"><?php echo $this->nm_new_label['valor_ultimafactura']; ?></span></span><br><input type="hidden" name="valor_ultimafactura" value="<?php echo $this->form_encode_input($valor_ultimafactura); ?>"><span id="id_ajax_label_valor_ultimafactura"><?php echo nl2br($valor_ultimafactura); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_ultimafactura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_ultimafactura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_saldoactual_dumb = ('' == $sStyleHidden_saldoactual) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_saldoactual_dumb" style="<?php echo $sStyleHidden_saldoactual_dumb; ?>"></TD>
<?php $sStyleHidden_valor_ultimafactura_dumb = ('' == $sStyleHidden_valor_ultimafactura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_ultimafactura_dumb" style="<?php echo $sStyleHidden_valor_ultimafactura_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['mesultimafactura']))
   {
       $this->nm_new_label['mesultimafactura'] = "Mesultimafactura";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mesultimafactura = $this->mesultimafactura;
   $sStyleHidden_mesultimafactura = '';
   if (isset($this->nmgp_cmp_hidden['mesultimafactura']) && $this->nmgp_cmp_hidden['mesultimafactura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mesultimafactura']);
       $sStyleHidden_mesultimafactura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mesultimafactura = 'display: none;';
   $sStyleReadInp_mesultimafactura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mesultimafactura']) && $this->nmgp_cmp_readonly['mesultimafactura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mesultimafactura']);
       $sStyleReadLab_mesultimafactura = '';
       $sStyleReadInp_mesultimafactura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mesultimafactura']) && $this->nmgp_cmp_hidden['mesultimafactura'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="mesultimafactura" value="<?php echo $this->form_encode_input($this->mesultimafactura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mesultimafactura_line" id="hidden_field_data_mesultimafactura" style="<?php echo $sStyleHidden_mesultimafactura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mesultimafactura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mesultimafactura_label" style=""><span id="id_label_mesultimafactura"><?php echo $this->nm_new_label['mesultimafactura']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mesultimafactura"]) &&  $this->nmgp_cmp_readonly["mesultimafactura"] == "on") { 

$mesultimafactura_look = "";
 if ($this->mesultimafactura == "ENERO") { $mesultimafactura_look .= "ENERO" ;} 
 if ($this->mesultimafactura == "FEBRERO") { $mesultimafactura_look .= "FEBRERO" ;} 
 if ($this->mesultimafactura == "MARZO") { $mesultimafactura_look .= "MARZO" ;} 
 if ($this->mesultimafactura == "ABRIL") { $mesultimafactura_look .= "ABRIL" ;} 
 if ($this->mesultimafactura == "MAYO") { $mesultimafactura_look .= "MAYO" ;} 
 if ($this->mesultimafactura == "JUNIO") { $mesultimafactura_look .= "JUNIO" ;} 
 if ($this->mesultimafactura == "JULIO") { $mesultimafactura_look .= "JULIO" ;} 
 if ($this->mesultimafactura == "AGOSTO") { $mesultimafactura_look .= "AGOSTO" ;} 
 if ($this->mesultimafactura == "SEPTIEMBRE") { $mesultimafactura_look .= "SEPTIEMBRE" ;} 
 if ($this->mesultimafactura == "OCTUBRE") { $mesultimafactura_look .= "OCTUBRE" ;} 
 if ($this->mesultimafactura == "NOVIEMBRE") { $mesultimafactura_look .= "NOVIEMBRE" ;} 
 if ($this->mesultimafactura == "DICIEMBRE") { $mesultimafactura_look .= "DICIEMBRE" ;} 
 if (empty($mesultimafactura_look)) { $mesultimafactura_look = $this->mesultimafactura; }
?>
<input type="hidden" name="mesultimafactura" value="<?php echo $this->form_encode_input($mesultimafactura) . "\">" . $mesultimafactura_look . ""; ?>
<?php } else { ?>
<?php

$mesultimafactura_look = "";
 if ($this->mesultimafactura == "ENERO") { $mesultimafactura_look .= "ENERO" ;} 
 if ($this->mesultimafactura == "FEBRERO") { $mesultimafactura_look .= "FEBRERO" ;} 
 if ($this->mesultimafactura == "MARZO") { $mesultimafactura_look .= "MARZO" ;} 
 if ($this->mesultimafactura == "ABRIL") { $mesultimafactura_look .= "ABRIL" ;} 
 if ($this->mesultimafactura == "MAYO") { $mesultimafactura_look .= "MAYO" ;} 
 if ($this->mesultimafactura == "JUNIO") { $mesultimafactura_look .= "JUNIO" ;} 
 if ($this->mesultimafactura == "JULIO") { $mesultimafactura_look .= "JULIO" ;} 
 if ($this->mesultimafactura == "AGOSTO") { $mesultimafactura_look .= "AGOSTO" ;} 
 if ($this->mesultimafactura == "SEPTIEMBRE") { $mesultimafactura_look .= "SEPTIEMBRE" ;} 
 if ($this->mesultimafactura == "OCTUBRE") { $mesultimafactura_look .= "OCTUBRE" ;} 
 if ($this->mesultimafactura == "NOVIEMBRE") { $mesultimafactura_look .= "NOVIEMBRE" ;} 
 if ($this->mesultimafactura == "DICIEMBRE") { $mesultimafactura_look .= "DICIEMBRE" ;} 
 if (empty($mesultimafactura_look)) { $mesultimafactura_look = $this->mesultimafactura; }
?>
<span id="id_read_on_mesultimafactura" class="css_mesultimafactura_line"  style="<?php echo $sStyleReadLab_mesultimafactura; ?>"><?php echo $this->form_format_readonly("mesultimafactura", $this->form_encode_input($mesultimafactura_look)); ?></span><span id="id_read_off_mesultimafactura" class="css_read_off_mesultimafactura<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_mesultimafactura; ?>">
 <span id="idAjaxSelect_mesultimafactura" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_mesultimafactura_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mesultimafactura" name="mesultimafactura" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="ENERO" <?php  if ($this->mesultimafactura == "ENERO") { echo " selected" ;} ?>>ENERO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'ENERO'; ?>
 <option  value="FEBRERO" <?php  if ($this->mesultimafactura == "FEBRERO") { echo " selected" ;} ?>>FEBRERO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'FEBRERO'; ?>
 <option  value="MARZO" <?php  if ($this->mesultimafactura == "MARZO") { echo " selected" ;} ?>>MARZO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'MARZO'; ?>
 <option  value="ABRIL" <?php  if ($this->mesultimafactura == "ABRIL") { echo " selected" ;} ?>>ABRIL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'ABRIL'; ?>
 <option  value="MAYO" <?php  if ($this->mesultimafactura == "MAYO") { echo " selected" ;} ?>>MAYO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'MAYO'; ?>
 <option  value="JUNIO" <?php  if ($this->mesultimafactura == "JUNIO") { echo " selected" ;} ?>>JUNIO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'JUNIO'; ?>
 <option  value="JULIO" <?php  if ($this->mesultimafactura == "JULIO") { echo " selected" ;} ?>>JULIO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'JULIO'; ?>
 <option  value="AGOSTO" <?php  if ($this->mesultimafactura == "AGOSTO") { echo " selected" ;} ?>>AGOSTO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'AGOSTO'; ?>
 <option  value="SEPTIEMBRE" <?php  if ($this->mesultimafactura == "SEPTIEMBRE") { echo " selected" ;} ?>>SEPTIEMBRE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'SEPTIEMBRE'; ?>
 <option  value="OCTUBRE" <?php  if ($this->mesultimafactura == "OCTUBRE") { echo " selected" ;} ?>>OCTUBRE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'OCTUBRE'; ?>
 <option  value="NOVIEMBRE" <?php  if ($this->mesultimafactura == "NOVIEMBRE") { echo " selected" ;} ?>>NOVIEMBRE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'NOVIEMBRE'; ?>
 <option  value="DICIEMBRE" <?php  if ($this->mesultimafactura == "DICIEMBRE") { echo " selected" ;} ?>>DICIEMBRE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lookup_mesultimafactura'][] = 'DICIEMBRE'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mesultimafactura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mesultimafactura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_factura']))
    {
        $this->nm_new_label['fecha_factura'] = "Fecha Factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_factura = $this->fecha_factura;
   $sStyleHidden_fecha_factura = '';
   if (isset($this->nmgp_cmp_hidden['fecha_factura']) && $this->nmgp_cmp_hidden['fecha_factura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_factura']);
       $sStyleHidden_fecha_factura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_factura = 'display: none;';
   $sStyleReadInp_fecha_factura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_factura']) && $this->nmgp_cmp_readonly['fecha_factura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_factura']);
       $sStyleReadLab_fecha_factura = '';
       $sStyleReadInp_fecha_factura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_factura']) && $this->nmgp_cmp_hidden['fecha_factura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_factura" value="<?php echo $this->form_encode_input($fecha_factura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_factura_line" id="hidden_field_data_fecha_factura" style="<?php echo $sStyleHidden_fecha_factura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_factura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_factura_label" style=""><span id="id_label_fecha_factura"><?php echo $this->nm_new_label['fecha_factura']; ?></span></span><br><input type="hidden" name="fecha_factura" value="<?php echo $this->form_encode_input($fecha_factura); ?>"><span id="id_ajax_label_fecha_factura"><?php echo nl2br($fecha_factura); ?></span>
<?php
$tmp_form_data = $this->field_config['fecha_factura']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_factura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_factura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_mesultimafactura_dumb = ('' == $sStyleHidden_mesultimafactura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_mesultimafactura_dumb" style="<?php echo $sStyleHidden_mesultimafactura_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_factura_dumb = ('' == $sStyleHidden_fecha_factura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_factura_dumb" style="<?php echo $sStyleHidden_fecha_factura_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['codigo_cli']))
    {
        $this->nm_new_label['codigo_cli'] = "Código cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_cli = $this->codigo_cli;
   $sStyleHidden_codigo_cli = '';
   if (isset($this->nmgp_cmp_hidden['codigo_cli']) && $this->nmgp_cmp_hidden['codigo_cli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_cli']);
       $sStyleHidden_codigo_cli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_cli = 'display: none;';
   $sStyleReadInp_codigo_cli = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_cli']) && $this->nmgp_cmp_readonly['codigo_cli'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_cli']);
       $sStyleReadLab_codigo_cli = '';
       $sStyleReadInp_codigo_cli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_cli']) && $this->nmgp_cmp_hidden['codigo_cli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_cli" value="<?php echo $this->form_encode_input($codigo_cli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_cli_line" id="hidden_field_data_codigo_cli" style="<?php echo $sStyleHidden_codigo_cli; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_cli_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_cli_label" style=""><span id="id_label_codigo_cli"><?php echo $this->nm_new_label['codigo_cli']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_cli"]) &&  $this->nmgp_cmp_readonly["codigo_cli"] == "on") { 

 ?>
<input type="hidden" name="codigo_cli" value="<?php echo $this->form_encode_input($codigo_cli) . "\">" . $codigo_cli . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_cli" class="sc-ui-readonly-codigo_cli css_codigo_cli_line" style="<?php echo $sStyleReadLab_codigo_cli; ?>"><?php echo $this->form_format_readonly("codigo_cli", $this->form_encode_input($this->codigo_cli)); ?></span><span id="id_read_off_codigo_cli" class="css_read_off_codigo_cli<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_cli; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_cli_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_cli" type=text name="codigo_cli" value="<?php echo $this->form_encode_input($codigo_cli) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_cli_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_cli_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($this->observaciones)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <input class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_observaciones" type=text name="observaciones" value="<?php echo $this->form_encode_input($observaciones) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=200"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_codigo_cli_dumb = ('' == $sStyleHidden_codigo_cli) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_codigo_cli_dumb" style="<?php echo $sStyleHidden_codigo_cli_dumb; ?>"></TD>
<?php $sStyleHidden_observaciones_dumb = ('' == $sStyleHidden_observaciones) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_observaciones_dumb" style="<?php echo $sStyleHidden_observaciones_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuario_crea']))
    {
        $this->nm_new_label['usuario_crea'] = "Usuario Crea";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario_crea = $this->usuario_crea;
   if (!isset($this->nmgp_cmp_hidden['usuario_crea']))
   {
       $this->nmgp_cmp_hidden['usuario_crea'] = 'off';
   }
   $sStyleHidden_usuario_crea = '';
   if (isset($this->nmgp_cmp_hidden['usuario_crea']) && $this->nmgp_cmp_hidden['usuario_crea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario_crea']);
       $sStyleHidden_usuario_crea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario_crea = 'display: none;';
   $sStyleReadInp_usuario_crea = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario_crea']) && $this->nmgp_cmp_readonly['usuario_crea'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario_crea']);
       $sStyleReadLab_usuario_crea = '';
       $sStyleReadInp_usuario_crea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario_crea']) && $this->nmgp_cmp_hidden['usuario_crea'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario_crea" value="<?php echo $this->form_encode_input($usuario_crea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario_crea_label" id="hidden_field_label_usuario_crea" style="<?php echo $sStyleHidden_usuario_crea; ?>"><span id="id_label_usuario_crea"><?php echo $this->nm_new_label['usuario_crea']; ?></span></TD>
    <TD class="scFormDataOdd css_usuario_crea_line" id="hidden_field_data_usuario_crea" style="<?php echo $sStyleHidden_usuario_crea; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_crea_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_crea"]) &&  $this->nmgp_cmp_readonly["usuario_crea"] == "on") { 

 ?>
<input type="hidden" name="usuario_crea" value="<?php echo $this->form_encode_input($usuario_crea) . "\">" . $usuario_crea . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario_crea" class="sc-ui-readonly-usuario_crea css_usuario_crea_line" style="<?php echo $sStyleReadLab_usuario_crea; ?>"><?php echo $this->form_format_readonly("usuario_crea", $this->form_encode_input($this->usuario_crea)); ?></span><span id="id_read_off_usuario_crea" class="css_read_off_usuario_crea<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario_crea; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_crea_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario_crea" type=text name="usuario_crea" value="<?php echo $this->form_encode_input($usuario_crea) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['usuario_crea']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['usuario_crea']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['usuario_crea']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_crea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_crea_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_ter_cont']))
           {
               $this->nmgp_cmp_readonly['id_ter_cont'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['usuario_edita']))
    {
        $this->nm_new_label['usuario_edita'] = "Usuario Edita";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario_edita = $this->usuario_edita;
   if (!isset($this->nmgp_cmp_hidden['usuario_edita']))
   {
       $this->nmgp_cmp_hidden['usuario_edita'] = 'off';
   }
   $sStyleHidden_usuario_edita = '';
   if (isset($this->nmgp_cmp_hidden['usuario_edita']) && $this->nmgp_cmp_hidden['usuario_edita'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario_edita']);
       $sStyleHidden_usuario_edita = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario_edita = 'display: none;';
   $sStyleReadInp_usuario_edita = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario_edita']) && $this->nmgp_cmp_readonly['usuario_edita'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario_edita']);
       $sStyleReadLab_usuario_edita = '';
       $sStyleReadInp_usuario_edita = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario_edita']) && $this->nmgp_cmp_hidden['usuario_edita'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario_edita" value="<?php echo $this->form_encode_input($usuario_edita) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario_edita_label" id="hidden_field_label_usuario_edita" style="<?php echo $sStyleHidden_usuario_edita; ?>"><span id="id_label_usuario_edita"><?php echo $this->nm_new_label['usuario_edita']; ?></span></TD>
    <TD class="scFormDataOdd css_usuario_edita_line" id="hidden_field_data_usuario_edita" style="<?php echo $sStyleHidden_usuario_edita; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_edita_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_edita"]) &&  $this->nmgp_cmp_readonly["usuario_edita"] == "on") { 

 ?>
<input type="hidden" name="usuario_edita" value="<?php echo $this->form_encode_input($usuario_edita) . "\">" . $usuario_edita . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario_edita" class="sc-ui-readonly-usuario_edita css_usuario_edita_line" style="<?php echo $sStyleReadLab_usuario_edita; ?>"><?php echo $this->form_format_readonly("usuario_edita", $this->form_encode_input($this->usuario_edita)); ?></span><span id="id_read_off_usuario_edita" class="css_read_off_usuario_edita<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario_edita; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_edita_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario_edita" type=text name="usuario_edita" value="<?php echo $this->form_encode_input($usuario_edita) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['usuario_edita']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['usuario_edita']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['usuario_edita']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_edita_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_edita_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_ter_cont']))
    {
        $this->nm_new_label['id_ter_cont'] = "Id Ter Cont";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_ter_cont = $this->id_ter_cont;
   if (!isset($this->nmgp_cmp_hidden['id_ter_cont']))
   {
       $this->nmgp_cmp_hidden['id_ter_cont'] = 'off';
   }
   $sStyleHidden_id_ter_cont = '';
   if (isset($this->nmgp_cmp_hidden['id_ter_cont']) && $this->nmgp_cmp_hidden['id_ter_cont'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_ter_cont']);
       $sStyleHidden_id_ter_cont = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_ter_cont = 'display: none;';
   $sStyleReadInp_id_ter_cont = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_ter_cont"]) &&  $this->nmgp_cmp_readonly["id_ter_cont"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_ter_cont']);
       $sStyleReadLab_id_ter_cont = '';
       $sStyleReadInp_id_ter_cont = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_ter_cont']) && $this->nmgp_cmp_hidden['id_ter_cont'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_ter_cont" value="<?php echo $this->form_encode_input($id_ter_cont) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_ter_cont_label" id="hidden_field_label_id_ter_cont" style="<?php echo $sStyleHidden_id_ter_cont; ?>"><span id="id_label_id_ter_cont"><?php echo $this->nm_new_label['id_ter_cont']; ?></span></TD>
    <TD class="scFormDataOdd css_id_ter_cont_line" id="hidden_field_data_id_ter_cont" style="<?php echo $sStyleHidden_id_ter_cont; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_ter_cont_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_ter_cont" class="css_id_ter_cont_line" style="<?php echo $sStyleReadLab_id_ter_cont; ?>"><?php echo $this->form_format_readonly("id_ter_cont", $this->form_encode_input($this->id_ter_cont)); ?></span><span id="id_read_off_id_ter_cont" class="css_read_off_id_ter_cont" style="<?php echo $sStyleReadInp_id_ter_cont; ?>"><input type="hidden" name="id_ter_cont" value="<?php echo $this->form_encode_input($id_ter_cont) . "\">"?><span id="id_ajax_label_id_ter_cont"><?php echo nl2br($id_ter_cont); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_ter_cont_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_ter_cont_text"></span></td></tr></table></td></tr></table></TD>
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


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Detalle</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle_contrato']))
    {
        $this->nm_new_label['detalle_contrato'] = "Detalle";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_contrato = $this->detalle_contrato;
   $sStyleHidden_detalle_contrato = '';
   if (isset($this->nmgp_cmp_hidden['detalle_contrato']) && $this->nmgp_cmp_hidden['detalle_contrato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_contrato']);
       $sStyleHidden_detalle_contrato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_contrato = 'display: none;';
   $sStyleReadInp_detalle_contrato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_contrato']) && $this->nmgp_cmp_readonly['detalle_contrato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_contrato']);
       $sStyleReadLab_detalle_contrato = '';
       $sStyleReadInp_detalle_contrato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_contrato']) && $this->nmgp_cmp_hidden['detalle_contrato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_contrato" value="<?php echo $this->form_encode_input($detalle_contrato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_contrato_line" id="hidden_field_data_detalle_contrato" style="<?php echo $sStyleHidden_detalle_contrato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_contrato_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_contrato'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_contrato'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_contrato'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init'] ]['form_terceros_contratos_detalle']['embutida_parms'] = "gidcontrato*scin" . $this->nmgp_dados_form['id_ter_cont'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_terceros_contratos_empty.htm' : $this->Ini->link_form_terceros_contratos_detalle_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=300';
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle_contrato']) && 'nmsc_iframe_liga_form_terceros_contratos_detalle' != $this->Ini->sc_lig_target['C_@scinf_detalle_contrato'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle_contrato'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['form_terceros_contratos_detalle_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detalle_contrato'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_terceros_contratos_detalle"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="300" width="100%" name="nmsc_iframe_liga_form_terceros_contratos_detalle"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_contrato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_contrato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_detalle_contrato_dumb = ('' == $sStyleHidden_detalle_contrato) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_detalle_contrato_dumb" style="<?php echo $sStyleHidden_detalle_contrato_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="50%" height="">
   <a name="bloco_7"></a>
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Novedades</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['grid_casos']))
    {
        $this->nm_new_label['grid_casos'] = "Novedades";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grid_casos = $this->grid_casos;
   $sStyleHidden_grid_casos = '';
   if (isset($this->nmgp_cmp_hidden['grid_casos']) && $this->nmgp_cmp_hidden['grid_casos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grid_casos']);
       $sStyleHidden_grid_casos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grid_casos = 'display: none;';
   $sStyleReadInp_grid_casos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grid_casos']) && $this->nmgp_cmp_readonly['grid_casos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grid_casos']);
       $sStyleReadLab_grid_casos = '';
       $sStyleReadInp_grid_casos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grid_casos']) && $this->nmgp_cmp_hidden['grid_casos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="grid_casos" value="<?php echo $this->form_encode_input($grid_casos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_grid_casos_line" id="hidden_field_data_grid_casos" style="<?php echo $sStyleHidden_grid_casos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_grid_casos_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_grid_casos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_grid_casos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_grid_casos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init'] ]['grid_casos_vistacontrato']['embutida_form_full']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init'] ]['grid_casos_vistacontrato']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init'] ]['grid_casos_vistacontrato']['embutida_pai']        = "form_terceros_contratos";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init'] ]['grid_casos_vistacontrato']['embutida_form_parms'] = "gnum_contrato*scin" . $this->nmgp_dados_form['numero_contrato'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin100*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
 if (isset($this->Ini->sc_lig_md5["grid_casos_vistacontrato"]) && $this->Ini->sc_lig_md5["grid_casos_vistacontrato"] == "S") {
     $Parms_Lig  = "gnum_contrato*scin" . $this->nmgp_dados_form['numero_contrato'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin100*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_terceros_contratos@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "gnum_contrato*scin" . $this->nmgp_dados_form['numero_contrato'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin100*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_terceros_contratos_empty.htm' : $this->Ini->link_grid_casos_vistacontrato_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=300' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_grid_casos']) && 'nmsc_iframe_liga_grid_casos_vistacontrato' != $this->Ini->sc_lig_target['C_@scinf_grid_casos'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_grid_casos'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['grid_casos_vistacontrato_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_grid_casos'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_casos_vistacontrato"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="300" width="100%" name="nmsc_iframe_liga_grid_casos_vistacontrato"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grid_casos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grid_casos_text"></span></td></tr></table></td></tr></table> </TD>
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['birpara'];
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['back'];
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_terceros_contratos");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_terceros_contratos");
 parent.scAjaxDetailHeight("form_terceros_contratos", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_terceros_contratos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_terceros_contratos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['sc_modal'])
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
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_copiar() {
		if ($("#sc_copiar_top").length && $("#sc_copiar_top").is(":visible")) {
		    if ($("#sc_copiar_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_copiar()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contratos']['buttonStatus'] = $this->nmgp_botoes;
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
