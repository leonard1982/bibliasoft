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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Caso"); } else { echo strip_tags("Caso"); } ?></TITLE>
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/timepicker/jquery.ui.timepicker.css" type="text/css" media="screen" />
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
.css_read_off_fecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_asignacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_cierre button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_casos/form_casos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_casos_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_casos_jquery.php');

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
    if ("hidden_bloco_5" == block_id) {
      scAjaxDetailHeight("grid_casos_novedades", "400");
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-factura", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "factura" != sId ? sId.substr(7) : "";
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
    url: "form_casos.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_factura",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "factura" != sId ? sId.substr(7) : "";
   sc_form_casos_factura_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_casos_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_casos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_casos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Caso"; } else { echo "Caso"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__ticket_yellow_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__ticket_yellow_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__ticket_yellow_32.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_caso']))
   {
       $this->nmgp_cmp_hidden['id_caso'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['notificado']))
   {
       $this->nmgp_cmp_hidden['notificado'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['factura']))
   {
       $this->nmgp_cmp_hidden['factura'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero']))
    {
        $this->nm_new_label['numero'] = "Numero";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero = $this->numero;
   $sStyleHidden_numero = '';
   if (isset($this->nmgp_cmp_hidden['numero']) && $this->nmgp_cmp_hidden['numero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero']);
       $sStyleHidden_numero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero = 'display: none;';
   $sStyleReadInp_numero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero']) && $this->nmgp_cmp_readonly['numero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero']);
       $sStyleReadLab_numero = '';
       $sStyleReadInp_numero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero']) && $this->nmgp_cmp_hidden['numero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero" value="<?php echo $this->form_encode_input($numero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_line" id="hidden_field_data_numero" style="<?php echo $sStyleHidden_numero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_label" style=""><span id="id_label_numero"><?php echo $this->nm_new_label['numero']; ?></span></span><br><input type="hidden" name="numero" value="<?php echo $this->form_encode_input($numero); ?>"><span id="id_ajax_label_numero"><?php echo nl2br($numero); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha']))
    {
        $this->nm_new_label['fecha'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha = $this->fecha;
   if (strlen($this->fecha_hora) > 8 ) {$this->fecha_hora = substr($this->fecha_hora, 0, 8);}
   $this->fecha .= ' ' . $this->fecha_hora;
   $this->fecha  = trim($this->fecha);
   $fecha = $this->fecha;
   $sStyleHidden_fecha = '';
   if (isset($this->nmgp_cmp_hidden['fecha']) && $this->nmgp_cmp_hidden['fecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha']);
       $sStyleHidden_fecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha = 'display: none;';
   $sStyleReadInp_fecha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha']) && $this->nmgp_cmp_readonly['fecha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha']);
       $sStyleReadLab_fecha = '';
       $sStyleReadInp_fecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha']) && $this->nmgp_cmp_hidden['fecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha" value="<?php echo $this->form_encode_input($fecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_line" id="hidden_field_data_fecha" style="<?php echo $sStyleHidden_fecha; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_label" style=""><span id="id_label_fecha"><?php echo $this->nm_new_label['fecha']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha"]) &&  $this->nmgp_cmp_readonly["fecha"] == "on") { 

 ?>
<input type="hidden" name="fecha" value="<?php echo $this->form_encode_input($fecha) . "\">" . $fecha . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha" class="sc-ui-readonly-fecha css_fecha_line" style="<?php echo $sStyleReadLab_fecha; ?>"><?php echo $this->form_format_readonly("fecha", $this->form_encode_input($fecha)); ?></span><span id="id_read_off_fecha" class="css_read_off_fecha<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha; ?>"><?php
$tmp_form_data = $this->field_config['fecha']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha" type=text name="fecha" value="<?php echo $this->form_encode_input($fecha) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecha']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecha = $old_dt_fecha;
?>

   <?php
    if (!isset($this->nm_new_label['hora']))
    {
        $this->nm_new_label['hora'] = "Hora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora = $this->hora;
   $sStyleHidden_hora = '';
   if (isset($this->nmgp_cmp_hidden['hora']) && $this->nmgp_cmp_hidden['hora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora']);
       $sStyleHidden_hora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora = 'display: none;';
   $sStyleReadInp_hora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora']) && $this->nmgp_cmp_readonly['hora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora']);
       $sStyleReadLab_hora = '';
       $sStyleReadInp_hora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora']) && $this->nmgp_cmp_hidden['hora'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora" value="<?php echo $this->form_encode_input($hora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_line" id="hidden_field_data_hora" style="<?php echo $sStyleHidden_hora; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hora_label" style=""><span id="id_label_hora"><?php echo $this->nm_new_label['hora']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora"]) &&  $this->nmgp_cmp_readonly["hora"] == "on") { 

 ?>
<input type="hidden" name="hora" value="<?php echo $this->form_encode_input($hora) . "\">" . $hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora" class="sc-ui-readonly-hora css_hora_line" style="<?php echo $sStyleReadLab_hora; ?>"><?php echo $this->form_format_readonly("hora", $this->form_encode_input($hora)); ?></span><span id="id_read_off_hora" class="css_read_off_hora<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora; ?>"><?php
$tmp_form_data = $this->field_config['hora']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora" type=text name="hora" value="<?php echo $this->form_encode_input($hora) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_numero_dumb = ('' == $sStyleHidden_numero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numero_dumb" style="<?php echo $sStyleHidden_numero_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_dumb = ('' == $sStyleHidden_fecha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_dumb" style="<?php echo $sStyleHidden_fecha_dumb; ?>"></TD>
<?php $sStyleHidden_hora_dumb = ('' == $sStyleHidden_hora) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hora_dumb" style="<?php echo $sStyleHidden_hora_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['codigo_cliente']))
    {
        $this->nm_new_label['codigo_cliente'] = "No. Contrato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_cliente = $this->codigo_cliente;
   $sStyleHidden_codigo_cliente = '';
   if (isset($this->nmgp_cmp_hidden['codigo_cliente']) && $this->nmgp_cmp_hidden['codigo_cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_cliente']);
       $sStyleHidden_codigo_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_cliente = 'display: none;';
   $sStyleReadInp_codigo_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_cliente']) && $this->nmgp_cmp_readonly['codigo_cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_cliente']);
       $sStyleReadLab_codigo_cliente = '';
       $sStyleReadInp_codigo_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_cliente']) && $this->nmgp_cmp_hidden['codigo_cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_cliente" value="<?php echo $this->form_encode_input($codigo_cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_cliente_line" id="hidden_field_data_codigo_cliente" style="<?php echo $sStyleHidden_codigo_cliente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_cliente_label" style=""><span id="id_label_codigo_cliente"><?php echo $this->nm_new_label['codigo_cliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['php_cmp_required']['codigo_cliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['php_cmp_required']['codigo_cliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_cliente"]) &&  $this->nmgp_cmp_readonly["codigo_cliente"] == "on") { 

 ?>
<input type="hidden" name="codigo_cliente" value="<?php echo $this->form_encode_input($codigo_cliente) . "\">" . $codigo_cliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_cliente" class="sc-ui-readonly-codigo_cliente css_codigo_cliente_line" style="<?php echo $sStyleReadLab_codigo_cliente; ?>"><?php echo $this->form_format_readonly("codigo_cliente", $this->form_encode_input($this->codigo_cliente)); ?></span><span id="id_read_off_codigo_cliente" class="css_read_off_codigo_cliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_cliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_cliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_cliente" type=text name="codigo_cliente" value="<?php echo $this->form_encode_input($codigo_cliente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_casos*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_seleccionar_contratos"]) && $this->Ini->sc_lig_md5["grid_seleccionar_contratos"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,codigo_cliente,numero_contrato*scoutnm_evt_ret_busca*scinsc_form_casos_codigo_cliente_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_casos@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,codigo_cliente,numero_contrato*scoutnm_evt_ret_busca*scinsc_form_casos_codigo_cliente_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_seleccionar_contratos_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_seleccionar_contratos_cons_psq. "', '" . $Md5_Lig . "')", "cap_codigo_cliente", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cedula_tercero']))
    {
        $this->nm_new_label['cedula_tercero'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cedula_tercero = $this->cedula_tercero;
   $sStyleHidden_cedula_tercero = '';
   if (isset($this->nmgp_cmp_hidden['cedula_tercero']) && $this->nmgp_cmp_hidden['cedula_tercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cedula_tercero']);
       $sStyleHidden_cedula_tercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cedula_tercero = 'display: none;';
   $sStyleReadInp_cedula_tercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cedula_tercero']) && $this->nmgp_cmp_readonly['cedula_tercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cedula_tercero']);
       $sStyleReadLab_cedula_tercero = '';
       $sStyleReadInp_cedula_tercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cedula_tercero']) && $this->nmgp_cmp_hidden['cedula_tercero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cedula_tercero" value="<?php echo $this->form_encode_input($cedula_tercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cedula_tercero_line" id="hidden_field_data_cedula_tercero" style="<?php echo $sStyleHidden_cedula_tercero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cedula_tercero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cedula_tercero_label" style=""><span id="id_label_cedula_tercero"><?php echo $this->nm_new_label['cedula_tercero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cedula_tercero"]) &&  $this->nmgp_cmp_readonly["cedula_tercero"] == "on") { 

 ?>
<input type="hidden" name="cedula_tercero" value="<?php echo $this->form_encode_input($cedula_tercero) . "\">" . $cedula_tercero . ""; ?>
<?php } else { ?>
<span id="id_read_on_cedula_tercero" class="sc-ui-readonly-cedula_tercero css_cedula_tercero_line" style="<?php echo $sStyleReadLab_cedula_tercero; ?>"><?php echo $this->form_format_readonly("cedula_tercero", $this->form_encode_input($this->cedula_tercero)); ?></span><span id="id_read_off_cedula_tercero" class="css_read_off_cedula_tercero<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cedula_tercero; ?>">
 <input class="sc-js-input scFormObjectOdd css_cedula_tercero_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cedula_tercero" type=text name="cedula_tercero" value="<?php echo $this->form_encode_input($cedula_tercero) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=14"; } ?> maxlength=14 alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cedula_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cedula_tercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['tercero_nom']))
    {
        $this->nm_new_label['tercero_nom'] = "Nombre usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tercero_nom = $this->tercero_nom;
   $sStyleHidden_tercero_nom = '';
   if (isset($this->nmgp_cmp_hidden['tercero_nom']) && $this->nmgp_cmp_hidden['tercero_nom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tercero_nom']);
       $sStyleHidden_tercero_nom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tercero_nom = 'display: none;';
   $sStyleReadInp_tercero_nom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tercero_nom']) && $this->nmgp_cmp_readonly['tercero_nom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tercero_nom']);
       $sStyleReadLab_tercero_nom = '';
       $sStyleReadInp_tercero_nom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tercero_nom']) && $this->nmgp_cmp_hidden['tercero_nom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tercero_nom" value="<?php echo $this->form_encode_input($tercero_nom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tercero_nom_line" id="hidden_field_data_tercero_nom" style="<?php echo $sStyleHidden_tercero_nom; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tercero_nom_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tercero_nom_label" style=""><span id="id_label_tercero_nom"><?php echo $this->nm_new_label['tercero_nom']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tercero_nom"]) &&  $this->nmgp_cmp_readonly["tercero_nom"] == "on") { 

 ?>
<input type="hidden" name="tercero_nom" value="<?php echo $this->form_encode_input($tercero_nom) . "\">" . $tercero_nom . ""; ?>
<?php } else { ?>
<span id="id_read_on_tercero_nom" class="sc-ui-readonly-tercero_nom css_tercero_nom_line" style="<?php echo $sStyleReadLab_tercero_nom; ?>"><?php echo $this->form_format_readonly("tercero_nom", $this->form_encode_input($this->tercero_nom)); ?></span><span id="id_read_off_tercero_nom" class="css_read_off_tercero_nom<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tercero_nom; ?>">
 <input class="sc-js-input scFormObjectOdd css_tercero_nom_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tercero_nom" type=text name="tercero_nom" value="<?php echo $this->form_encode_input($tercero_nom) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tercero_nom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tercero_nom_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_codigo_cliente_dumb = ('' == $sStyleHidden_codigo_cliente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_codigo_cliente_dumb" style="<?php echo $sStyleHidden_codigo_cliente_dumb; ?>"></TD>
<?php $sStyleHidden_cedula_tercero_dumb = ('' == $sStyleHidden_cedula_tercero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cedula_tercero_dumb" style="<?php echo $sStyleHidden_cedula_tercero_dumb; ?>"></TD>
<?php $sStyleHidden_tercero_nom_dumb = ('' == $sStyleHidden_tercero_nom) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tercero_nom_dumb" style="<?php echo $sStyleHidden_tercero_nom_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['notificado']))
    {
        $this->nm_new_label['notificado'] = "Notificado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notificado = $this->notificado;
   if (!isset($this->nmgp_cmp_hidden['notificado']))
   {
       $this->nmgp_cmp_hidden['notificado'] = 'off';
   }
   $sStyleHidden_notificado = '';
   if (isset($this->nmgp_cmp_hidden['notificado']) && $this->nmgp_cmp_hidden['notificado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notificado']);
       $sStyleHidden_notificado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notificado = 'display: none;';
   $sStyleReadInp_notificado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notificado']) && $this->nmgp_cmp_readonly['notificado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notificado']);
       $sStyleReadLab_notificado = '';
       $sStyleReadInp_notificado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notificado']) && $this->nmgp_cmp_hidden['notificado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="notificado" value="<?php echo $this->form_encode_input($notificado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_notificado_line" id="hidden_field_data_notificado" style="<?php echo $sStyleHidden_notificado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_notificado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_notificado_label" style=""><span id="id_label_notificado"><?php echo $this->nm_new_label['notificado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["notificado"]) &&  $this->nmgp_cmp_readonly["notificado"] == "on") { 

 ?>
<input type="hidden" name="notificado" value="<?php echo $this->form_encode_input($notificado) . "\">" . $notificado . ""; ?>
<?php } else { ?>
<span id="id_read_on_notificado" class="sc-ui-readonly-notificado css_notificado_line" style="<?php echo $sStyleReadLab_notificado; ?>"><?php echo $this->form_format_readonly("notificado", $this->form_encode_input($this->notificado)); ?></span><span id="id_read_off_notificado" class="css_read_off_notificado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_notificado; ?>">
 <input class="sc-js-input scFormObjectOdd css_notificado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_notificado" type=text name="notificado" value="<?php echo $this->form_encode_input($notificado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_notificado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_notificado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_notificado_dumb = ('' == $sStyleHidden_notificado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_notificado_dumb" style="<?php echo $sStyleHidden_notificado_dumb; ?>"></TD>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT descripcion, descripcion  FROM casos_estado  ORDER BY descripcion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_estado'][] = $rs->fields[0];
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
    if (!isset($this->nm_new_label['color1']))
    {
        $this->nm_new_label['color1'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $color1 = $this->color1;
   $sStyleHidden_color1 = '';
   if (isset($this->nmgp_cmp_hidden['color1']) && $this->nmgp_cmp_hidden['color1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['color1']);
       $sStyleHidden_color1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_color1 = 'display: none;';
   $sStyleReadInp_color1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['color1']) && $this->nmgp_cmp_readonly['color1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['color1']);
       $sStyleReadLab_color1 = '';
       $sStyleReadInp_color1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['color1']) && $this->nmgp_cmp_hidden['color1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="color1" value="<?php echo $this->form_encode_input($color1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_color1_line" id="hidden_field_data_color1" style="<?php echo $sStyleHidden_color1; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_color1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_color1_label" style=""><span id="id_label_color1"><?php echo $this->nm_new_label['color1']; ?></span></span><br><input type="hidden" name="color1" value="<?php echo $this->form_encode_input($color1); ?>"><span id="id_ajax_label_color1"><?php echo nl2br($color1); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_color1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_color1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['prioridad']))
   {
       $this->nm_new_label['prioridad'] = "Prioridad";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prioridad = $this->prioridad;
   $sStyleHidden_prioridad = '';
   if (isset($this->nmgp_cmp_hidden['prioridad']) && $this->nmgp_cmp_hidden['prioridad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prioridad']);
       $sStyleHidden_prioridad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prioridad = 'display: none;';
   $sStyleReadInp_prioridad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prioridad']) && $this->nmgp_cmp_readonly['prioridad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prioridad']);
       $sStyleReadLab_prioridad = '';
       $sStyleReadInp_prioridad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prioridad']) && $this->nmgp_cmp_hidden['prioridad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="prioridad" value="<?php echo $this->form_encode_input($this->prioridad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_prioridad_line" id="hidden_field_data_prioridad" style="<?php echo $sStyleHidden_prioridad; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prioridad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_prioridad_label" style=""><span id="id_label_prioridad"><?php echo $this->nm_new_label['prioridad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prioridad"]) &&  $this->nmgp_cmp_readonly["prioridad"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT descripcion, descripcion  FROM casos_prioridad  ORDER BY descripcion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_prioridad'][] = $rs->fields[0];
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
   $prioridad_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prioridad_1))
          {
              foreach ($this->prioridad_1 as $tmp_prioridad)
              {
                  if (trim($tmp_prioridad) === trim($cadaselect[1])) { $prioridad_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prioridad) === trim($cadaselect[1])) { $prioridad_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="prioridad" value="<?php echo $this->form_encode_input($prioridad) . "\">" . $prioridad_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_prioridad();
   $x = 0 ; 
   $prioridad_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prioridad_1))
          {
              foreach ($this->prioridad_1 as $tmp_prioridad)
              {
                  if (trim($tmp_prioridad) === trim($cadaselect[1])) { $prioridad_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prioridad) === trim($cadaselect[1])) { $prioridad_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($prioridad_look))
          {
              $prioridad_look = $this->prioridad;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_prioridad\" class=\"css_prioridad_line\" style=\"" .  $sStyleReadLab_prioridad . "\">" . $this->form_format_readonly("prioridad", $this->form_encode_input($prioridad_look)) . "</span><span id=\"id_read_off_prioridad\" class=\"css_read_off_prioridad" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_prioridad . "\">";
   echo " <span id=\"idAjaxSelect_prioridad\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_prioridad_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_prioridad\" name=\"prioridad\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->prioridad) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->prioridad)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prioridad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prioridad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['color2']))
    {
        $this->nm_new_label['color2'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $color2 = $this->color2;
   $sStyleHidden_color2 = '';
   if (isset($this->nmgp_cmp_hidden['color2']) && $this->nmgp_cmp_hidden['color2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['color2']);
       $sStyleHidden_color2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_color2 = 'display: none;';
   $sStyleReadInp_color2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['color2']) && $this->nmgp_cmp_readonly['color2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['color2']);
       $sStyleReadLab_color2 = '';
       $sStyleReadInp_color2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['color2']) && $this->nmgp_cmp_hidden['color2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="color2" value="<?php echo $this->form_encode_input($color2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_color2_line" id="hidden_field_data_color2" style="<?php echo $sStyleHidden_color2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_color2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_color2_label" style=""><span id="id_label_color2"><?php echo $this->nm_new_label['color2']; ?></span></span><br><input type="hidden" name="color2" value="<?php echo $this->form_encode_input($color2); ?>"><span id="id_ajax_label_color2"><?php echo nl2br($color2); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_color2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_color2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['tipo_caso']))
   {
       $this->nm_new_label['tipo_caso'] = "Tipo Caso";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_caso = $this->tipo_caso;
   $sStyleHidden_tipo_caso = '';
   if (isset($this->nmgp_cmp_hidden['tipo_caso']) && $this->nmgp_cmp_hidden['tipo_caso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_caso']);
       $sStyleHidden_tipo_caso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_caso = 'display: none;';
   $sStyleReadInp_tipo_caso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_caso']) && $this->nmgp_cmp_readonly['tipo_caso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_caso']);
       $sStyleReadLab_tipo_caso = '';
       $sStyleReadInp_tipo_caso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_caso']) && $this->nmgp_cmp_hidden['tipo_caso'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_caso" value="<?php echo $this->form_encode_input($this->tipo_caso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_caso_line" id="hidden_field_data_tipo_caso" style="<?php echo $sStyleHidden_tipo_caso; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_caso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_caso_label" style=""><span id="id_label_tipo_caso"><?php echo $this->nm_new_label['tipo_caso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_caso"]) &&  $this->nmgp_cmp_readonly["tipo_caso"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT descripcion, descripcion  FROM casos_tipo  ORDER BY descripcion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_tipo_caso'][] = $rs->fields[0];
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
   $tipo_caso_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_caso_1))
          {
              foreach ($this->tipo_caso_1 as $tmp_tipo_caso)
              {
                  if (trim($tmp_tipo_caso) === trim($cadaselect[1])) { $tipo_caso_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_caso) === trim($cadaselect[1])) { $tipo_caso_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_caso" value="<?php echo $this->form_encode_input($tipo_caso) . "\">" . $tipo_caso_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tipo_caso();
   $x = 0 ; 
   $tipo_caso_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_caso_1))
          {
              foreach ($this->tipo_caso_1 as $tmp_tipo_caso)
              {
                  if (trim($tmp_tipo_caso) === trim($cadaselect[1])) { $tipo_caso_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_caso) === trim($cadaselect[1])) { $tipo_caso_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_caso_look))
          {
              $tipo_caso_look = $this->tipo_caso;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_caso\" class=\"css_tipo_caso_line\" style=\"" .  $sStyleReadLab_tipo_caso . "\">" . $this->form_format_readonly("tipo_caso", $this->form_encode_input($tipo_caso_look)) . "</span><span id=\"id_read_off_tipo_caso\" class=\"css_read_off_tipo_caso" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tipo_caso . "\">";
   echo " <span id=\"idAjaxSelect_tipo_caso\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tipo_caso_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tipo_caso\" name=\"tipo_caso\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_caso) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_caso)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_caso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_caso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['medio']))
   {
       $this->nm_new_label['medio'] = "Medio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $medio = $this->medio;
   $sStyleHidden_medio = '';
   if (isset($this->nmgp_cmp_hidden['medio']) && $this->nmgp_cmp_hidden['medio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['medio']);
       $sStyleHidden_medio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_medio = 'display: none;';
   $sStyleReadInp_medio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['medio']) && $this->nmgp_cmp_readonly['medio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['medio']);
       $sStyleReadLab_medio = '';
       $sStyleReadInp_medio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['medio']) && $this->nmgp_cmp_hidden['medio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="medio" value="<?php echo $this->form_encode_input($this->medio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_medio_line" id="hidden_field_data_medio" style="<?php echo $sStyleHidden_medio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_medio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_medio_label" style=""><span id="id_label_medio"><?php echo $this->nm_new_label['medio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["medio"]) &&  $this->nmgp_cmp_readonly["medio"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT descripcion, descripcion  FROM casos_medio  ORDER BY descripcion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_medio'][] = $rs->fields[0];
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
   $medio_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->medio_1))
          {
              foreach ($this->medio_1 as $tmp_medio)
              {
                  if (trim($tmp_medio) === trim($cadaselect[1])) { $medio_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->medio) === trim($cadaselect[1])) { $medio_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="medio" value="<?php echo $this->form_encode_input($medio) . "\">" . $medio_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_medio();
   $x = 0 ; 
   $medio_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->medio_1))
          {
              foreach ($this->medio_1 as $tmp_medio)
              {
                  if (trim($tmp_medio) === trim($cadaselect[1])) { $medio_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->medio) === trim($cadaselect[1])) { $medio_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($medio_look))
          {
              $medio_look = $this->medio;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_medio\" class=\"css_medio_line\" style=\"" .  $sStyleReadLab_medio . "\">" . $this->form_format_readonly("medio", $this->form_encode_input($medio_look)) . "</span><span id=\"id_read_off_medio\" class=\"css_read_off_medio" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_medio . "\">";
   echo " <span id=\"idAjaxSelect_medio\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_medio_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_medio\" name=\"medio\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->medio) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->medio)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_medio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_medio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_estado_dumb = ('' == $sStyleHidden_estado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_estado_dumb" style="<?php echo $sStyleHidden_estado_dumb; ?>"></TD>
<?php $sStyleHidden_color1_dumb = ('' == $sStyleHidden_color1) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_color1_dumb" style="<?php echo $sStyleHidden_color1_dumb; ?>"></TD>
<?php $sStyleHidden_prioridad_dumb = ('' == $sStyleHidden_prioridad) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_prioridad_dumb" style="<?php echo $sStyleHidden_prioridad_dumb; ?>"></TD>
<?php $sStyleHidden_color2_dumb = ('' == $sStyleHidden_color2) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_color2_dumb" style="<?php echo $sStyleHidden_color2_dumb; ?>"></TD>
<?php $sStyleHidden_tipo_caso_dumb = ('' == $sStyleHidden_tipo_caso) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_caso_dumb" style="<?php echo $sStyleHidden_tipo_caso_dumb; ?>"></TD>
<?php $sStyleHidden_medio_dumb = ('' == $sStyleHidden_medio) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_medio_dumb" style="<?php echo $sStyleHidden_medio_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label" style=""><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['php_cmp_required']['observaciones']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['php_cmp_required']['observaciones'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['asignado_tercero']))
   {
       $this->nm_new_label['asignado_tercero'] = "Asignado a";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asignado_tercero = $this->asignado_tercero;
   $sStyleHidden_asignado_tercero = '';
   if (isset($this->nmgp_cmp_hidden['asignado_tercero']) && $this->nmgp_cmp_hidden['asignado_tercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asignado_tercero']);
       $sStyleHidden_asignado_tercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asignado_tercero = 'display: none;';
   $sStyleReadInp_asignado_tercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asignado_tercero']) && $this->nmgp_cmp_readonly['asignado_tercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asignado_tercero']);
       $sStyleReadLab_asignado_tercero = '';
       $sStyleReadInp_asignado_tercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asignado_tercero']) && $this->nmgp_cmp_hidden['asignado_tercero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="asignado_tercero" value="<?php echo $this->form_encode_input($this->asignado_tercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_asignado_tercero_line" id="hidden_field_data_asignado_tercero" style="<?php echo $sStyleHidden_asignado_tercero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asignado_tercero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_asignado_tercero_label" style=""><span id="id_label_asignado_tercero"><?php echo $this->nm_new_label['asignado_tercero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asignado_tercero"]) &&  $this->nmgp_cmp_readonly["asignado_tercero"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT documento, nombres  FROM terceros  WHERE es_tecnico='SI' ORDER BY nombres";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_asignado_tercero'][] = $rs->fields[0];
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
   $asignado_tercero_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->asignado_tercero_1))
          {
              foreach ($this->asignado_tercero_1 as $tmp_asignado_tercero)
              {
                  if (trim($tmp_asignado_tercero) === trim($cadaselect[1])) { $asignado_tercero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->asignado_tercero) === trim($cadaselect[1])) { $asignado_tercero_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="asignado_tercero" value="<?php echo $this->form_encode_input($asignado_tercero) . "\">" . $asignado_tercero_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_asignado_tercero();
   $x = 0 ; 
   $asignado_tercero_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->asignado_tercero_1))
          {
              foreach ($this->asignado_tercero_1 as $tmp_asignado_tercero)
              {
                  if (trim($tmp_asignado_tercero) === trim($cadaselect[1])) { $asignado_tercero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->asignado_tercero) === trim($cadaselect[1])) { $asignado_tercero_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($asignado_tercero_look))
          {
              $asignado_tercero_look = $this->asignado_tercero;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_asignado_tercero\" class=\"css_asignado_tercero_line\" style=\"" .  $sStyleReadLab_asignado_tercero . "\">" . $this->form_format_readonly("asignado_tercero", $this->form_encode_input($asignado_tercero_look)) . "</span><span id=\"id_read_off_asignado_tercero\" class=\"css_read_off_asignado_tercero" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_asignado_tercero . "\">";
   echo " <span id=\"idAjaxSelect_asignado_tercero\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_asignado_tercero_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_asignado_tercero\" name=\"asignado_tercero\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->asignado_tercero) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->asignado_tercero)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asignado_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asignado_tercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valor']))
    {
        $this->nm_new_label['valor'] = "Valor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor = $this->valor;
   $sStyleHidden_valor = '';
   if (isset($this->nmgp_cmp_hidden['valor']) && $this->nmgp_cmp_hidden['valor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor']);
       $sStyleHidden_valor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor = 'display: none;';
   $sStyleReadInp_valor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor']) && $this->nmgp_cmp_readonly['valor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor']);
       $sStyleReadLab_valor = '';
       $sStyleReadInp_valor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor']) && $this->nmgp_cmp_hidden['valor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor" value="<?php echo $this->form_encode_input($valor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_line" id="hidden_field_data_valor" style="<?php echo $sStyleHidden_valor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_label" style=""><span id="id_label_valor"><?php echo $this->nm_new_label['valor']; ?></span></span><br><input type="hidden" name="valor" value="<?php echo $this->form_encode_input($valor); ?>"><span id="id_ajax_label_valor"><?php echo nl2br($valor); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_observaciones_dumb = ('' == $sStyleHidden_observaciones) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_observaciones_dumb" style="<?php echo $sStyleHidden_observaciones_dumb; ?>"></TD>
<?php $sStyleHidden_asignado_tercero_dumb = ('' == $sStyleHidden_asignado_tercero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_asignado_tercero_dumb" style="<?php echo $sStyleHidden_asignado_tercero_dumb; ?>"></TD>
<?php $sStyleHidden_valor_dumb = ('' == $sStyleHidden_valor) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_dumb" style="<?php echo $sStyleHidden_valor_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['fecha_asignacion']))
    {
        $this->nm_new_label['fecha_asignacion'] = "Fecha Asignacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha_asignacion = $this->fecha_asignacion;
   if (strlen($this->fecha_asignacion_hora) > 8 ) {$this->fecha_asignacion_hora = substr($this->fecha_asignacion_hora, 0, 8);}
   $this->fecha_asignacion .= ' ' . $this->fecha_asignacion_hora;
   $this->fecha_asignacion  = trim($this->fecha_asignacion);
   $fecha_asignacion = $this->fecha_asignacion;
   $sStyleHidden_fecha_asignacion = '';
   if (isset($this->nmgp_cmp_hidden['fecha_asignacion']) && $this->nmgp_cmp_hidden['fecha_asignacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_asignacion']);
       $sStyleHidden_fecha_asignacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_asignacion = 'display: none;';
   $sStyleReadInp_fecha_asignacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_asignacion']) && $this->nmgp_cmp_readonly['fecha_asignacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_asignacion']);
       $sStyleReadLab_fecha_asignacion = '';
       $sStyleReadInp_fecha_asignacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_asignacion']) && $this->nmgp_cmp_hidden['fecha_asignacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_asignacion" value="<?php echo $this->form_encode_input($fecha_asignacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_asignacion_line" id="hidden_field_data_fecha_asignacion" style="<?php echo $sStyleHidden_fecha_asignacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_asignacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_asignacion_label" style=""><span id="id_label_fecha_asignacion"><?php echo $this->nm_new_label['fecha_asignacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_asignacion"]) &&  $this->nmgp_cmp_readonly["fecha_asignacion"] == "on") { 

 ?>
<input type="hidden" name="fecha_asignacion" value="<?php echo $this->form_encode_input($fecha_asignacion) . "\">" . $fecha_asignacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_asignacion" class="sc-ui-readonly-fecha_asignacion css_fecha_asignacion_line" style="<?php echo $sStyleReadLab_fecha_asignacion; ?>"><?php echo $this->form_format_readonly("fecha_asignacion", $this->form_encode_input($fecha_asignacion)); ?></span><span id="id_read_off_fecha_asignacion" class="css_read_off_fecha_asignacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_asignacion; ?>"><?php
$tmp_form_data = $this->field_config['fecha_asignacion']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_asignacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_asignacion" type=text name="fecha_asignacion" value="<?php echo $this->form_encode_input($fecha_asignacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecha_asignacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_asignacion']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecha_asignacion']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_asignacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_asignacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecha_asignacion = $old_dt_fecha_asignacion;
?>

   <?php
    if (!isset($this->nm_new_label['hora_asignacion']))
    {
        $this->nm_new_label['hora_asignacion'] = "Hora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_asignacion = $this->hora_asignacion;
   $sStyleHidden_hora_asignacion = '';
   if (isset($this->nmgp_cmp_hidden['hora_asignacion']) && $this->nmgp_cmp_hidden['hora_asignacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_asignacion']);
       $sStyleHidden_hora_asignacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_asignacion = 'display: none;';
   $sStyleReadInp_hora_asignacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_asignacion']) && $this->nmgp_cmp_readonly['hora_asignacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_asignacion']);
       $sStyleReadLab_hora_asignacion = '';
       $sStyleReadInp_hora_asignacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_asignacion']) && $this->nmgp_cmp_hidden['hora_asignacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_asignacion" value="<?php echo $this->form_encode_input($hora_asignacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_asignacion_line" id="hidden_field_data_hora_asignacion" style="<?php echo $sStyleHidden_hora_asignacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_asignacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hora_asignacion_label" style=""><span id="id_label_hora_asignacion"><?php echo $this->nm_new_label['hora_asignacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_asignacion"]) &&  $this->nmgp_cmp_readonly["hora_asignacion"] == "on") { 

 ?>
<input type="hidden" name="hora_asignacion" value="<?php echo $this->form_encode_input($hora_asignacion) . "\">" . $hora_asignacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_asignacion" class="sc-ui-readonly-hora_asignacion css_hora_asignacion_line" style="<?php echo $sStyleReadLab_hora_asignacion; ?>"><?php echo $this->form_format_readonly("hora_asignacion", $this->form_encode_input($hora_asignacion)); ?></span><span id="id_read_off_hora_asignacion" class="css_read_off_hora_asignacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_asignacion; ?>"><?php
$tmp_form_data = $this->field_config['hora_asignacion']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_asignacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_asignacion" type=text name="hora_asignacion" value="<?php echo $this->form_encode_input($hora_asignacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_asignacion']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_asignacion']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_asignacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_asignacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha_cierre']))
    {
        $this->nm_new_label['fecha_cierre'] = "Fecha Cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha_cierre = $this->fecha_cierre;
   if (strlen($this->fecha_cierre_hora) > 8 ) {$this->fecha_cierre_hora = substr($this->fecha_cierre_hora, 0, 8);}
   $this->fecha_cierre .= ' ' . $this->fecha_cierre_hora;
   $this->fecha_cierre  = trim($this->fecha_cierre);
   $fecha_cierre = $this->fecha_cierre;
   $sStyleHidden_fecha_cierre = '';
   if (isset($this->nmgp_cmp_hidden['fecha_cierre']) && $this->nmgp_cmp_hidden['fecha_cierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_cierre']);
       $sStyleHidden_fecha_cierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_cierre = 'display: none;';
   $sStyleReadInp_fecha_cierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_cierre']) && $this->nmgp_cmp_readonly['fecha_cierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_cierre']);
       $sStyleReadLab_fecha_cierre = '';
       $sStyleReadInp_fecha_cierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_cierre']) && $this->nmgp_cmp_hidden['fecha_cierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_cierre" value="<?php echo $this->form_encode_input($fecha_cierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecha_cierre_line" id="hidden_field_data_fecha_cierre" style="<?php echo $sStyleHidden_fecha_cierre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_cierre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_cierre_label" style=""><span id="id_label_fecha_cierre"><?php echo $this->nm_new_label['fecha_cierre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_cierre"]) &&  $this->nmgp_cmp_readonly["fecha_cierre"] == "on") { 

 ?>
<input type="hidden" name="fecha_cierre" value="<?php echo $this->form_encode_input($fecha_cierre) . "\">" . $fecha_cierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_cierre" class="sc-ui-readonly-fecha_cierre css_fecha_cierre_line" style="<?php echo $sStyleReadLab_fecha_cierre; ?>"><?php echo $this->form_format_readonly("fecha_cierre", $this->form_encode_input($fecha_cierre)); ?></span><span id="id_read_off_fecha_cierre" class="css_read_off_fecha_cierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_cierre; ?>"><?php
$tmp_form_data = $this->field_config['fecha_cierre']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_cierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_cierre" type=text name="fecha_cierre" value="<?php echo $this->form_encode_input($fecha_cierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecha_cierre']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_cierre']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecha_cierre']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_cierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_cierre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecha_cierre = $old_dt_fecha_cierre;
?>

   <?php
    if (!isset($this->nm_new_label['hora_cierre']))
    {
        $this->nm_new_label['hora_cierre'] = "Hora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $hora_cierre = $this->hora_cierre;
   $sStyleHidden_hora_cierre = '';
   if (isset($this->nmgp_cmp_hidden['hora_cierre']) && $this->nmgp_cmp_hidden['hora_cierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['hora_cierre']);
       $sStyleHidden_hora_cierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_hora_cierre = 'display: none;';
   $sStyleReadInp_hora_cierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['hora_cierre']) && $this->nmgp_cmp_readonly['hora_cierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['hora_cierre']);
       $sStyleReadLab_hora_cierre = '';
       $sStyleReadInp_hora_cierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['hora_cierre']) && $this->nmgp_cmp_hidden['hora_cierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_cierre" value="<?php echo $this->form_encode_input($hora_cierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_hora_cierre_line" id="hidden_field_data_hora_cierre" style="<?php echo $sStyleHidden_hora_cierre; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_hora_cierre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_hora_cierre_label" style=""><span id="id_label_hora_cierre"><?php echo $this->nm_new_label['hora_cierre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_cierre"]) &&  $this->nmgp_cmp_readonly["hora_cierre"] == "on") { 

 ?>
<input type="hidden" name="hora_cierre" value="<?php echo $this->form_encode_input($hora_cierre) . "\">" . $hora_cierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_cierre" class="sc-ui-readonly-hora_cierre css_hora_cierre_line" style="<?php echo $sStyleReadLab_hora_cierre; ?>"><?php echo $this->form_format_readonly("hora_cierre", $this->form_encode_input($hora_cierre)); ?></span><span id="id_read_off_hora_cierre" class="css_read_off_hora_cierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_cierre; ?>"><?php
$tmp_form_data = $this->field_config['hora_cierre']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_hora_cierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_hora_cierre" type=text name="hora_cierre" value="<?php echo $this->form_encode_input($hora_cierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_cierre']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_cierre']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_cierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_cierre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['factura']))
    {
        $this->nm_new_label['factura'] = "Factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factura = $this->factura;
   if (!isset($this->nmgp_cmp_hidden['factura']))
   {
       $this->nmgp_cmp_hidden['factura'] = 'off';
   }
   $sStyleHidden_factura = '';
   if (isset($this->nmgp_cmp_hidden['factura']) && $this->nmgp_cmp_hidden['factura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factura']);
       $sStyleHidden_factura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factura = 'display: none;';
   $sStyleReadInp_factura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factura']) && $this->nmgp_cmp_readonly['factura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factura']);
       $sStyleReadLab_factura = '';
       $sStyleReadInp_factura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factura']) && $this->nmgp_cmp_hidden['factura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factura" value="<?php echo $this->form_encode_input($factura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_factura_line" id="hidden_field_data_factura" style="<?php echo $sStyleHidden_factura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factura_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_factura_label" style=""><span id="id_label_factura"><?php echo $this->nm_new_label['factura']; ?></span></span><br><input type="hidden" name="factura" value="<?php echo $this->form_encode_input($factura); ?>"><span id="id_ajax_label_factura"><?php echo nl2br($factura); ?></span>

<?php
$aRecData['factura'] = $this->factura;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT fc.idfacven, concat(r.prefijo,'/',fc.numfacven) FROM facturaven_contratos fc INNER JOIN resdian r on fc.resolucion=r.Idres WHERE fc.idfacven = " . substr($this->Db->qstr($this->factura), 1, -1) . " ORDER BY fc.numfacven, fc.resolucion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   if ('' != $this->factura)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->factura])) ? $aLookup[0][$this->factura] : $this->factura;
$factura_look = (isset($aLookup[0][$this->factura])) ? $aLookup[0][$this->factura] : $this->factura;
?>

<?php
$aRecData['factura'] = $this->factura;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_fecha_hora = $this->fecha_hora;
   $old_value_hora = $this->hora;
   $old_value_valor = $this->valor;
   $old_value_fecha_asignacion = $this->fecha_asignacion;
   $old_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $old_value_hora_asignacion = $this->hora_asignacion;
   $old_value_fecha_cierre = $this->fecha_cierre;
   $old_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $old_value_hora_cierre = $this->hora_cierre;
   $old_value_id_caso = $this->id_caso;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fecha_hora = $this->fecha_hora;
   $unformatted_value_hora = $this->hora;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_fecha_asignacion = $this->fecha_asignacion;
   $unformatted_value_fecha_asignacion_hora = $this->fecha_asignacion_hora;
   $unformatted_value_hora_asignacion = $this->hora_asignacion;
   $unformatted_value_fecha_cierre = $this->fecha_cierre;
   $unformatted_value_fecha_cierre_hora = $this->fecha_cierre_hora;
   $unformatted_value_hora_cierre = $this->hora_cierre;
   $unformatted_value_id_caso = $this->id_caso;

   $nm_comando = "SELECT fc.idfacven, concat(r.prefijo,'/',fc.numfacven) FROM facturaven_contratos fc INNER JOIN resdian r on fc.resolucion=r.Idres WHERE fc.idfacven = " . substr($this->Db->qstr($this->factura), 1, -1) . " ORDER BY fc.numfacven, fc.resolucion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->fecha_hora = $old_value_fecha_hora;
   $this->hora = $old_value_hora;
   $this->valor = $old_value_valor;
   $this->fecha_asignacion = $old_value_fecha_asignacion;
   $this->fecha_asignacion_hora = $old_value_fecha_asignacion_hora;
   $this->hora_asignacion = $old_value_hora_asignacion;
   $this->fecha_cierre = $old_value_fecha_cierre;
   $this->fecha_cierre_hora = $old_value_fecha_cierre_hora;
   $this->hora_cierre = $old_value_hora_cierre;
   $this->id_caso = $old_value_id_caso;

   if ('' != $this->factura)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lookup_factura'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->factura])) ? $aLookup[0][$this->factura] : '';
$factura_look = (isset($aLookup[0][$this->factura])) ? $aLookup[0][$this->factura] : '';
?>
<select id="id_ac_factura" class="scFormObjectOdd sc-ui-autocomp-factura css_factura_obj"><?php if ('' != $this->factura) { ?><option value="<?php echo $this->factura ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fac_num']))
    {
        $this->nm_new_label['fac_num'] = "Facturado con:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fac_num = $this->fac_num;
   $sStyleHidden_fac_num = '';
   if (isset($this->nmgp_cmp_hidden['fac_num']) && $this->nmgp_cmp_hidden['fac_num'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fac_num']);
       $sStyleHidden_fac_num = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fac_num = 'display: none;';
   $sStyleReadInp_fac_num = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fac_num']) && $this->nmgp_cmp_readonly['fac_num'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fac_num']);
       $sStyleReadLab_fac_num = '';
       $sStyleReadInp_fac_num = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fac_num']) && $this->nmgp_cmp_hidden['fac_num'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fac_num" value="<?php echo $this->form_encode_input($fac_num) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fac_num_line" id="hidden_field_data_fac_num" style="<?php echo $sStyleHidden_fac_num; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fac_num_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fac_num_label" style=""><span id="id_label_fac_num"><?php echo $this->nm_new_label['fac_num']; ?></span></span><br><input type="hidden" name="fac_num" value="<?php echo $this->form_encode_input($fac_num); ?>"><span id="id_ajax_label_fac_num"><?php echo nl2br($fac_num); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fac_num_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fac_num_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fecha_asignacion_dumb = ('' == $sStyleHidden_fecha_asignacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_asignacion_dumb" style="<?php echo $sStyleHidden_fecha_asignacion_dumb; ?>"></TD>
<?php $sStyleHidden_hora_asignacion_dumb = ('' == $sStyleHidden_hora_asignacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hora_asignacion_dumb" style="<?php echo $sStyleHidden_hora_asignacion_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_cierre_dumb = ('' == $sStyleHidden_fecha_cierre) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_cierre_dumb" style="<?php echo $sStyleHidden_fecha_cierre_dumb; ?>"></TD>
<?php $sStyleHidden_hora_cierre_dumb = ('' == $sStyleHidden_hora_cierre) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_hora_cierre_dumb" style="<?php echo $sStyleHidden_hora_cierre_dumb; ?>"></TD>
<?php $sStyleHidden_factura_dumb = ('' == $sStyleHidden_factura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_factura_dumb" style="<?php echo $sStyleHidden_factura_dumb; ?>"></TD>
<?php $sStyleHidden_fac_num_dumb = ('' == $sStyleHidden_fac_num) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fac_num_dumb" style="<?php echo $sStyleHidden_fac_num_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_caso']))
           {
               $this->nmgp_cmp_readonly['id_caso'] = 'on';
           }
?>


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
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Detalle'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Detalle'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Detalle'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init'] ]['grid_casos_novedades']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init'] ]['grid_casos_novedades']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init'] ]['grid_casos_novedades']['embutida_pai']        = "form_casos";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init'] ]['grid_casos_novedades']['embutida_form_parms'] = "gid_caso*scin" . $this->nmgp_dados_form['id_caso'] . "*scoutNMSC_inicial*scininicio*scout";
 if (isset($this->Ini->sc_lig_md5["grid_casos_novedades"]) && $this->Ini->sc_lig_md5["grid_casos_novedades"] == "S") {
     $Parms_Lig  = "gid_caso*scin" . $this->nmgp_dados_form['id_caso'] . "*scoutNMSC_inicial*scininicio*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_casos@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "gid_caso*scin" . $this->nmgp_dados_form['id_caso'] . "*scoutNMSC_inicial*scininicio*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_casos_empty.htm' : $this->Ini->link_grid_casos_novedades_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=400' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_Detalle']) && 'nmsc_iframe_liga_grid_casos_novedades' != $this->Ini->sc_lig_target['C_@scinf_Detalle'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Detalle'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['grid_casos_novedades_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Detalle'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_casos_novedades"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="400" width="750" name="nmsc_iframe_liga_grid_casos_novedades"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_caso']))
    {
        $this->nm_new_label['id_caso'] = "Id Caso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_caso = $this->id_caso;
   if (!isset($this->nmgp_cmp_hidden['id_caso']))
   {
       $this->nmgp_cmp_hidden['id_caso'] = 'off';
   }
   $sStyleHidden_id_caso = '';
   if (isset($this->nmgp_cmp_hidden['id_caso']) && $this->nmgp_cmp_hidden['id_caso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_caso']);
       $sStyleHidden_id_caso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_caso = 'display: none;';
   $sStyleReadInp_id_caso = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_caso"]) &&  $this->nmgp_cmp_readonly["id_caso"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_caso']);
       $sStyleReadLab_id_caso = '';
       $sStyleReadInp_id_caso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_caso']) && $this->nmgp_cmp_hidden['id_caso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_caso" value="<?php echo $this->form_encode_input($id_caso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_id_caso_line" id="hidden_field_data_id_caso" style="<?php echo $sStyleHidden_id_caso; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_caso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_caso_label" style=""><span id="id_label_id_caso"><?php echo $this->nm_new_label['id_caso']; ?></span></span><br><span id="id_read_on_id_caso" class="css_id_caso_line" style="<?php echo $sStyleReadLab_id_caso; ?>"><?php echo $this->form_format_readonly("id_caso", $this->form_encode_input($this->id_caso)); ?></span><span id="id_read_off_id_caso" class="css_read_off_id_caso" style="<?php echo $sStyleReadInp_id_caso; ?>"><input type="hidden" name="id_caso" value="<?php echo $this->form_encode_input($id_caso) . "\">"?><span id="id_ajax_label_id_caso"><?php echo nl2br($id_caso); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_caso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_caso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
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

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_casos");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_casos");
 parent.scAjaxDetailHeight("form_casos", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_casos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_casos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos']['buttonStatus'] = $this->nmgp_botoes;
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
