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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Detalle venta"); } else { echo strip_tags("Detalle venta"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
.css_read_off_hora_inicio button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_hora_final button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detallepedido_220621/form_detallepedido_220621_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detallepedido_220621_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_detallepedido_220621_mob_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('idpro');

<?php
}
?>
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


  $(".sc-ui-autocomp-idpro", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idpro" != sId ? sId.substr(5) : "";
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
    url: "form_detallepedido_220621_mob.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idpro",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "idpro" != sId ? sId.substr(5) : "";
   sc_form_detallepedido_220621_mob_idpro_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_detallepedido_220621']['error_buffer']) && '' != $_SESSION['scriptcase']['form_detallepedido_220621']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_detallepedido_220621']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_detallepedido_220621_mob_js0.php");
?>
<script type="text/javascript"> 
nmdg_enter_tab = true;
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
               action="form_detallepedido_220621_mob.php" 
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_detallepedido_220621_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detallepedido_220621_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['new'];
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
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['iddet']))
   {
       $this->nmgp_cmp_hidden['iddet'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idpedid']))
   {
       $this->nmgp_cmp_hidden['idpedid'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unidadmayor']))
   {
       $this->nmgp_cmp_hidden['unidadmayor'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['factor']))
   {
       $this->nmgp_cmp_hidden['factor'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['costop']))
   {
       $this->nmgp_cmp_hidden['costop'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['iva']))
   {
       $this->nmgp_cmp_hidden['iva'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['adicional1']))
   {
       $this->nmgp_cmp_hidden['adicional1'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['colores']))
   {
       $this->nmgp_cmp_hidden['colores'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tallas']))
   {
       $this->nmgp_cmp_hidden['tallas'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['sabor']))
   {
       $this->nmgp_cmp_hidden['sabor'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['estado_comanda']))
   {
       $this->nmgp_cmp_hidden['estado_comanda'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['obs']))
   {
       $this->nmgp_cmp_hidden['obs'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['stockubica']))
   {
       $this->nmgp_cmp_hidden['stockubica'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unidad']))
   {
       $this->nmgp_cmp_hidden['unidad'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['autorizarborrado']))
   {
       $this->nmgp_cmp_hidden['autorizarborrado'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpro']))
    {
        $this->nm_new_label['idpro'] = "Artículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpro = $this->idpro;
   $sStyleHidden_idpro = '';
   if (isset($this->nmgp_cmp_hidden['idpro']) && $this->nmgp_cmp_hidden['idpro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpro']);
       $sStyleHidden_idpro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpro = 'display: none;';
   $sStyleReadInp_idpro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpro']) && $this->nmgp_cmp_readonly['idpro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpro']);
       $sStyleReadLab_idpro = '';
       $sStyleReadInp_idpro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpro']) && $this->nmgp_cmp_hidden['idpro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpro" value="<?php echo $this->form_encode_input($idpro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpro_line" id="hidden_field_data_idpro" style="<?php echo $sStyleHidden_idpro; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpro_label" style=""><span id="id_label_idpro"><?php echo $this->nm_new_label['idpro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro"]) &&  $this->nmgp_cmp_readonly["idpro"] == "on") { 

 ?>
<input type="hidden" name="idpro" value="<?php echo $this->form_encode_input($idpro) . "\">" . $idpro . ""; ?>
<?php } else { ?>

<?php
$aRecData['idpro'] = $this->idpro;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   if ('' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro])) ? $aLookup[0][$this->idpro] : $this->idpro;
$idpro_look = (isset($aLookup[0][$this->idpro])) ? $aLookup[0][$this->idpro] : $this->idpro;
?>
<span id="id_read_on_idpro" class="sc-ui-readonly-idpro css_idpro_line" style="<?php echo $sStyleReadLab_idpro; ?>"><?php echo $this->form_format_readonly("idpro", str_replace("<", "&lt;", $idpro_look)); ?></span><span id="id_read_off_idpro" class="css_read_off_idpro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idpro; ?>">
 <input class="sc-js-input scFormObjectOdd css_idpro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_idpro" type=text name="idpro" value="<?php echo $this->form_encode_input($idpro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idpro'] = $this->idpro;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   if ('' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro])) ? $aLookup[0][$this->idpro] : '';
$idpro_look = (isset($aLookup[0][$this->idpro])) ? $aLookup[0][$this->idpro] : '';
?>
<select id="id_ac_idpro" class="scFormObjectOdd sc-ui-autocomp-idpro css_idpro_obj sc-js-input"><?php if ('' != $this->idpro) { ?><option value="<?php echo $this->idpro ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descrip']))
    {
        $this->nm_new_label['descrip'] = "Desc. Artículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descrip = $this->descrip;
   $sStyleHidden_descrip = '';
   if (isset($this->nmgp_cmp_hidden['descrip']) && $this->nmgp_cmp_hidden['descrip'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descrip']);
       $sStyleHidden_descrip = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descrip = 'display: none;';
   $sStyleReadInp_descrip = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descrip']) && $this->nmgp_cmp_readonly['descrip'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descrip']);
       $sStyleReadLab_descrip = '';
       $sStyleReadInp_descrip = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descrip']) && $this->nmgp_cmp_hidden['descrip'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descrip" value="<?php echo $this->form_encode_input($descrip) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descrip_line" id="hidden_field_data_descrip" style="<?php echo $sStyleHidden_descrip; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descrip_line" style="padding: 0px"><span class="scFormLabelOddFormat css_descrip_label" style=""><span id="id_label_descrip"><?php echo $this->nm_new_label['descrip']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-factura-32.png"))
          { 
              $descrip = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $descrip = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_descrip = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-factura-32.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-factura-32.png"); 
              $out_descrip = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_descrip = "sc_" . $out_descrip . "_descrip_3030_" . $img_time . "_grp__NM__ico__NM__icons8-factura-32.png";
              $out_descrip = $this->Ini->path_imag_temp . "/sc_" . $out_descrip . "_descrip_3030_" . $img_time . "_grp__NM__ico__NM__icons8-factura-32.png";
              if (!is_file($this->Ini->root . $out_descrip)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_descrip, true);
                  $sc_obj_img->setWidth(30);
                  $sc_obj_img->setHeight(30);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_descrip);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_descrip;
                  $descrip = "<img  border=\"0\" src=\"" . $prt_descrip . "\"/>" ; 
              }
              else {
                  $descrip = "<img  border=\"0\" src=\"" . $out_descrip . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_descrip"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_form_detallepedido_obs_edit . "', '$this->nm_location', 'iddet*scin" . $this->nmgp_dados_form['iddet'] . "*scoutpar_numero*scin" . $this->nmgp_dados_form['idpedid'] . "*scoutid_detalle*scin" . $this->nmgp_dados_form['iddet'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_self', '0', '0', 'form_detallepedido_obs')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $descrip ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descrip"]) &&  $this->nmgp_cmp_readonly["descrip"] == "on") { 

 ?>
<input type="hidden" name="descrip" value="<?php echo $this->form_encode_input($descrip) . "\">" . $descrip . ""; ?>
<?php } else { ?>
<span id="id_read_on_descrip" class="sc-ui-readonly-descrip css_descrip_line" style="<?php echo $sStyleReadLab_descrip; ?>"><?php echo $this->form_format_readonly("descrip", $this->form_encode_input($this->descrip)); ?></span><span id="id_read_off_descrip" class="css_read_off_descrip<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descrip; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descrip_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descrip_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idbod']))
   {
       $this->nm_new_label['idbod'] = " Bodega";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idbod = $this->idbod;
   $sStyleHidden_idbod = '';
   if (isset($this->nmgp_cmp_hidden['idbod']) && $this->nmgp_cmp_hidden['idbod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idbod']);
       $sStyleHidden_idbod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idbod = 'display: none;';
   $sStyleReadInp_idbod = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idbod']) && $this->nmgp_cmp_readonly['idbod'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idbod']);
       $sStyleReadLab_idbod = '';
       $sStyleReadInp_idbod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idbod']) && $this->nmgp_cmp_hidden['idbod'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idbod" value="<?php echo $this->form_encode_input($this->idbod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idbod_line" id="hidden_field_data_idbod" style="<?php echo $sStyleHidden_idbod; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idbod_line" style="padding: 0px"><span class="scFormLabelOddFormat css_idbod_label" style=""><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['php_cmp_required']['idbod']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['php_cmp_required']['idbod'] == "on") { ?><span class="scFormRequiredOdd">*</span> <?php }?> <span id="id_label_idbod"><?php echo $this->nm_new_label['idbod']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idbod"]) &&  $this->nmgp_cmp_readonly["idbod"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'][] = $rs->fields[0];
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
   $idbod_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbod_1))
          {
              foreach ($this->idbod_1 as $tmp_idbod)
              {
                  if (trim($tmp_idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idbod" value="<?php echo $this->form_encode_input($idbod) . "\">" . $idbod_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idbod();
   $x = 0 ; 
   $idbod_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbod_1))
          {
              foreach ($this->idbod_1 as $tmp_idbod)
              {
                  if (trim($tmp_idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idbod_look))
          {
              $idbod_look = $this->idbod;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idbod\" class=\"css_idbod_line\" style=\"" .  $sStyleReadLab_idbod . "\">" . $this->form_format_readonly("idbod", $this->form_encode_input($idbod_look)) . "</span><span id=\"id_read_off_idbod\" class=\"css_read_off_idbod" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idbod . "\">";
   echo " <span id=\"idAjaxSelect_idbod\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idbod_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idbod\" name=\"idbod\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idbod) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idbod)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idbod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idbod_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidad']))
    {
        $this->nm_new_label['unidad'] = "Unidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidad = $this->unidad;
   if (!isset($this->nmgp_cmp_hidden['unidad']))
   {
       $this->nmgp_cmp_hidden['unidad'] = 'off';
   }
   $sStyleHidden_unidad = '';
   if (isset($this->nmgp_cmp_hidden['unidad']) && $this->nmgp_cmp_hidden['unidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidad']);
       $sStyleHidden_unidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidad = 'display: none;';
   $sStyleReadInp_unidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidad']) && $this->nmgp_cmp_readonly['unidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidad']);
       $sStyleReadLab_unidad = '';
       $sStyleReadInp_unidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidad']) && $this->nmgp_cmp_hidden['unidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidad" value="<?php echo $this->form_encode_input($unidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_unidad_line" id="hidden_field_data_unidad" style="<?php echo $sStyleHidden_unidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidad_line" style="padding: 0px"><span class="scFormLabelOddFormat css_unidad_label" style=""><span id="id_label_unidad"><?php echo $this->nm_new_label['unidad']; ?></span></span><br><input type="hidden" name="unidad" value="<?php echo $this->form_encode_input($unidad); ?>"><span id="id_ajax_label_unidad"><?php echo nl2br($unidad); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantidad']))
    {
        $this->nm_new_label['cantidad'] = "Cantidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantidad = $this->cantidad;
   $sStyleHidden_cantidad = '';
   if (isset($this->nmgp_cmp_hidden['cantidad']) && $this->nmgp_cmp_hidden['cantidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantidad']);
       $sStyleHidden_cantidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantidad = 'display: none;';
   $sStyleReadInp_cantidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantidad']) && $this->nmgp_cmp_readonly['cantidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantidad']);
       $sStyleReadLab_cantidad = '';
       $sStyleReadInp_cantidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantidad']) && $this->nmgp_cmp_hidden['cantidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidad" value="<?php echo $this->form_encode_input($cantidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cantidad_line" id="hidden_field_data_cantidad" style="<?php echo $sStyleHidden_cantidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cantidad_label" style=""><span id="id_label_cantidad"><?php echo $this->nm_new_label['cantidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad"]) &&  $this->nmgp_cmp_readonly["cantidad"] == "on") { 

 ?>
<input type="hidden" name="cantidad" value="<?php echo $this->form_encode_input($cantidad) . "\">" . $cantidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad" class="sc-ui-readonly-cantidad css_cantidad_line" style="<?php echo $sStyleReadLab_cantidad; ?>"><?php echo $this->form_format_readonly("cantidad", $this->form_encode_input($this->cantidad)); ?></span><span id="id_read_off_cantidad" class="css_read_off_cantidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidad" type=text name="cantidad" value="<?php echo $this->form_encode_input($cantidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valorunit']))
    {
        $this->nm_new_label['valorunit'] = "Unitario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorunit = $this->valorunit;
   $sStyleHidden_valorunit = '';
   if (isset($this->nmgp_cmp_hidden['valorunit']) && $this->nmgp_cmp_hidden['valorunit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorunit']);
       $sStyleHidden_valorunit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorunit = 'display: none;';
   $sStyleReadInp_valorunit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorunit']) && $this->nmgp_cmp_readonly['valorunit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorunit']);
       $sStyleReadLab_valorunit = '';
       $sStyleReadInp_valorunit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorunit']) && $this->nmgp_cmp_hidden['valorunit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorunit" value="<?php echo $this->form_encode_input($valorunit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valorunit_line" id="hidden_field_data_valorunit" style="<?php echo $sStyleHidden_valorunit; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorunit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valorunit_label" style=""><span id="id_label_valorunit"><?php echo $this->nm_new_label['valorunit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorunit"]) &&  $this->nmgp_cmp_readonly["valorunit"] == "on") { 

 ?>
<input type="hidden" name="valorunit" value="<?php echo $this->form_encode_input($valorunit) . "\">" . $valorunit . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorunit" class="sc-ui-readonly-valorunit css_valorunit_line" style="<?php echo $sStyleReadLab_valorunit; ?>"><?php echo $this->form_format_readonly("valorunit", $this->form_encode_input($this->valorunit)); ?></span><span id="id_read_off_valorunit" class="css_read_off_valorunit<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valorunit; ?>">
 <input class="sc-js-input scFormObjectOdd css_valorunit_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valorunit" type=text name="valorunit" value="<?php echo $this->form_encode_input($valorunit) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valorunit']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valorunit']['format_pos'] || 3 == $this->field_config['valorunit']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorunit']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorunit']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorunit']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valorunit']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorunit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorunit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adicional']))
    {
        $this->nm_new_label['adicional'] = "Impuesto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adicional = $this->adicional;
   $sStyleHidden_adicional = '';
   if (isset($this->nmgp_cmp_hidden['adicional']) && $this->nmgp_cmp_hidden['adicional'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adicional']);
       $sStyleHidden_adicional = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adicional = 'display: none;';
   $sStyleReadInp_adicional = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adicional']) && $this->nmgp_cmp_readonly['adicional'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adicional']);
       $sStyleReadLab_adicional = '';
       $sStyleReadInp_adicional = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adicional']) && $this->nmgp_cmp_hidden['adicional'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional" value="<?php echo $this->form_encode_input($adicional) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adicional_line" id="hidden_field_data_adicional" style="<?php echo $sStyleHidden_adicional; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_adicional_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_adicional_label" style=""><span id="id_label_adicional"><?php echo $this->nm_new_label['adicional']; ?></span></span><br><input type="hidden" name="adicional" value="<?php echo $this->form_encode_input($adicional); ?>"><span id="id_ajax_label_adicional"><?php echo nl2br($adicional); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descuento']))
    {
        $this->nm_new_label['descuento'] = "Desc.";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descuento = $this->descuento;
   $sStyleHidden_descuento = '';
   if (isset($this->nmgp_cmp_hidden['descuento']) && $this->nmgp_cmp_hidden['descuento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descuento']);
       $sStyleHidden_descuento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descuento = 'display: none;';
   $sStyleReadInp_descuento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descuento']) && $this->nmgp_cmp_readonly['descuento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descuento']);
       $sStyleReadLab_descuento = '';
       $sStyleReadInp_descuento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descuento']) && $this->nmgp_cmp_hidden['descuento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descuento" value="<?php echo $this->form_encode_input($descuento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descuento_line" id="hidden_field_data_descuento" style="<?php echo $sStyleHidden_descuento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descuento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descuento_label" style=""><span id="id_label_descuento"><?php echo $this->nm_new_label['descuento']; ?></span></span><br><input type="hidden" name="descuento" value="<?php echo $this->form_encode_input($descuento); ?>"><span id="id_ajax_label_descuento"><?php echo nl2br($descuento); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descuento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descuento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valorpar']))
    {
        $this->nm_new_label['valorpar'] = "Parcial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorpar = $this->valorpar;
   $sStyleHidden_valorpar = '';
   if (isset($this->nmgp_cmp_hidden['valorpar']) && $this->nmgp_cmp_hidden['valorpar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorpar']);
       $sStyleHidden_valorpar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorpar = 'display: none;';
   $sStyleReadInp_valorpar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorpar']) && $this->nmgp_cmp_readonly['valorpar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorpar']);
       $sStyleReadLab_valorpar = '';
       $sStyleReadInp_valorpar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorpar']) && $this->nmgp_cmp_hidden['valorpar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorpar" value="<?php echo $this->form_encode_input($valorpar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valorpar_line" id="hidden_field_data_valorpar" style="<?php echo $sStyleHidden_valorpar; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorpar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valorpar_label" style=""><span id="id_label_valorpar"><?php echo $this->nm_new_label['valorpar']; ?></span></span><br><input type="hidden" name="valorpar" value="<?php echo $this->form_encode_input($valorpar); ?>"><span id="id_ajax_label_valorpar"><?php echo nl2br($valorpar); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorpar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorpar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_valorpar_dumb = ('' == $sStyleHidden_valorpar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valorpar_dumb" style="<?php echo $sStyleHidden_valorpar_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['unidadmayor']))
   {
       $this->nm_new_label['unidadmayor'] = "Unidad Mayor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidadmayor = $this->unidadmayor;
   if (!isset($this->nmgp_cmp_hidden['unidadmayor']))
   {
       $this->nmgp_cmp_hidden['unidadmayor'] = 'off';
   }
   $sStyleHidden_unidadmayor = '';
   if (isset($this->nmgp_cmp_hidden['unidadmayor']) && $this->nmgp_cmp_hidden['unidadmayor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidadmayor']);
       $sStyleHidden_unidadmayor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidadmayor = 'display: none;';
   $sStyleReadInp_unidadmayor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidadmayor']) && $this->nmgp_cmp_readonly['unidadmayor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidadmayor']);
       $sStyleReadLab_unidadmayor = '';
       $sStyleReadInp_unidadmayor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidadmayor']) && $this->nmgp_cmp_hidden['unidadmayor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="unidadmayor" value="<?php echo $this->form_encode_input($this->unidadmayor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_unidadmayor_line" id="hidden_field_data_unidadmayor" style="<?php echo $sStyleHidden_unidadmayor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidadmayor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_unidadmayor_label" style=""><span id="id_label_unidadmayor"><?php echo $this->nm_new_label['unidadmayor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidadmayor"]) &&  $this->nmgp_cmp_readonly["unidadmayor"] == "on") { 

$unidadmayor_look = "";
 if ($this->unidadmayor == "NO") { $unidadmayor_look .= "NO" ;} 
 if ($this->unidadmayor == "SI") { $unidadmayor_look .= "SI" ;} 
 if (empty($unidadmayor_look)) { $unidadmayor_look = $this->unidadmayor; }
?>
<input type="hidden" name="unidadmayor" value="<?php echo $this->form_encode_input($unidadmayor) . "\">" . $unidadmayor_look . ""; ?>
<?php } else { ?>
<?php

$unidadmayor_look = "";
 if ($this->unidadmayor == "NO") { $unidadmayor_look .= "NO" ;} 
 if ($this->unidadmayor == "SI") { $unidadmayor_look .= "SI" ;} 
 if (empty($unidadmayor_look)) { $unidadmayor_look = $this->unidadmayor; }
?>
<span id="id_read_on_unidadmayor" class="css_unidadmayor_line"  style="<?php echo $sStyleReadLab_unidadmayor; ?>"><?php echo $this->form_format_readonly("unidadmayor", $this->form_encode_input($unidadmayor_look)); ?></span><span id="id_read_off_unidadmayor" class="css_read_off_unidadmayor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_unidadmayor; ?>">
 <span id="idAjaxSelect_unidadmayor" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_unidadmayor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unidadmayor" name="unidadmayor" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NO" <?php  if ($this->unidadmayor == "NO") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_unidadmayor'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->unidadmayor == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_unidadmayor'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidadmayor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidadmayor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['stockubica']))
    {
        $this->nm_new_label['stockubica'] = "Stock Ubicación";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $stockubica = $this->stockubica;
   if (!isset($this->nmgp_cmp_hidden['stockubica']))
   {
       $this->nmgp_cmp_hidden['stockubica'] = 'off';
   }
   $sStyleHidden_stockubica = '';
   if (isset($this->nmgp_cmp_hidden['stockubica']) && $this->nmgp_cmp_hidden['stockubica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['stockubica']);
       $sStyleHidden_stockubica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_stockubica = 'display: none;';
   $sStyleReadInp_stockubica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['stockubica']) && $this->nmgp_cmp_readonly['stockubica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['stockubica']);
       $sStyleReadLab_stockubica = '';
       $sStyleReadInp_stockubica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['stockubica']) && $this->nmgp_cmp_hidden['stockubica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stockubica" value="<?php echo $this->form_encode_input($stockubica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_stockubica_line" id="hidden_field_data_stockubica" style="<?php echo $sStyleHidden_stockubica; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_stockubica_line" style="padding: 0px"><span class="scFormLabelOddFormat css_stockubica_label" style=""><span id="id_label_stockubica"><?php echo $this->nm_new_label['stockubica']; ?></span></span><br><input type="hidden" name="stockubica" value="<?php echo $this->form_encode_input($stockubica); ?>"><span id="id_ajax_label_stockubica"><?php echo nl2br($stockubica); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stockubica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stockubica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['iddet']))
           {
               $this->nmgp_cmp_readonly['iddet'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['obs']))
    {
        $this->nm_new_label['obs'] = "Desc. Artículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obs = $this->obs;
   if (!isset($this->nmgp_cmp_hidden['obs']))
   {
       $this->nmgp_cmp_hidden['obs'] = 'off';
   }
   $sStyleHidden_obs = '';
   if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obs']);
       $sStyleHidden_obs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obs = 'display: none;';
   $sStyleReadInp_obs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obs']) && $this->nmgp_cmp_readonly['obs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obs']);
       $sStyleReadLab_obs = '';
       $sStyleReadInp_obs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs" value="<?php echo $this->form_encode_input($obs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_obs_line" id="hidden_field_data_obs" style="<?php echo $sStyleHidden_obs; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_obs_label" style=""><span id="id_label_obs"><?php echo $this->nm_new_label['obs']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs"]) &&  $this->nmgp_cmp_readonly["obs"] == "on") { 

 ?>
<input type="hidden" name="obs" value="<?php echo $this->form_encode_input($obs) . "\">" . $obs . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs" class="sc-ui-readonly-obs css_obs_line" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $this->form_format_readonly("obs", $this->form_encode_input($this->obs)); ?></span><span id="id_read_off_obs" class="css_read_off_obs<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs; ?>">
 <input class="sc-js-input scFormObjectOdd css_obs_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_obs" type=text name="obs" value="<?php echo $this->form_encode_input($obs) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=600 alt="{datatype: 'text', maxLength: 600, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iddet']))
    {
        $this->nm_new_label['iddet'] = "Iddet";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iddet = $this->iddet;
   if (!isset($this->nmgp_cmp_hidden['iddet']))
   {
       $this->nmgp_cmp_hidden['iddet'] = 'off';
   }
   $sStyleHidden_iddet = '';
   if (isset($this->nmgp_cmp_hidden['iddet']) && $this->nmgp_cmp_hidden['iddet'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iddet']);
       $sStyleHidden_iddet = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iddet = 'display: none;';
   $sStyleReadInp_iddet = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["iddet"]) &&  $this->nmgp_cmp_readonly["iddet"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iddet']);
       $sStyleReadLab_iddet = '';
       $sStyleReadInp_iddet = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iddet']) && $this->nmgp_cmp_hidden['iddet'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iddet" value="<?php echo $this->form_encode_input($iddet) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_iddet_line" id="hidden_field_data_iddet" style="<?php echo $sStyleHidden_iddet; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_iddet_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_iddet_label" style=""><span id="id_label_iddet"><?php echo $this->nm_new_label['iddet']; ?></span></span><br><span id="id_read_on_iddet" class="css_iddet_line" style="<?php echo $sStyleReadLab_iddet; ?>"><?php echo $this->form_format_readonly("iddet", $this->form_encode_input($this->iddet)); ?></span><span id="id_read_off_iddet" class="css_read_off_iddet" style="<?php echo $sStyleReadInp_iddet; ?>"><input type="hidden" name="iddet" value="<?php echo $this->form_encode_input($iddet) . "\">"?><span id="id_ajax_label_iddet"><?php echo nl2br($iddet); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddet_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddet_text"></span></td></tr></table></td></tr></table> </TD>
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
   if (!isset($this->nm_new_label['colores']))
   {
       $this->nm_new_label['colores'] = "Color";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $colores = $this->colores;
   if (!isset($this->nmgp_cmp_hidden['colores']))
   {
       $this->nmgp_cmp_hidden['colores'] = 'off';
   }
   $sStyleHidden_colores = '';
   if (isset($this->nmgp_cmp_hidden['colores']) && $this->nmgp_cmp_hidden['colores'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['colores']);
       $sStyleHidden_colores = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_colores = 'display: none;';
   $sStyleReadInp_colores = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['colores']) && $this->nmgp_cmp_readonly['colores'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['colores']);
       $sStyleReadLab_colores = '';
       $sStyleReadInp_colores = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['colores']) && $this->nmgp_cmp_hidden['colores'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="colores" value="<?php echo $this->form_encode_input($this->colores) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_colores_line" id="hidden_field_data_colores" style="<?php echo $sStyleHidden_colores; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_colores_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_colores_label" style=""><span id="id_label_colores"><?php echo $this->nm_new_label['colores']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["colores"]) &&  $this->nmgp_cmp_readonly["colores"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array(); 
}
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idcol, c.color  FROM colorxproducto f left join colores c on f.idcol=c.idcolores where idpr=$this->idpro ORDER BY f.idcol";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'][] = $rs->fields[0];
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
   $colores_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->colores_1))
          {
              foreach ($this->colores_1 as $tmp_colores)
              {
                  if (trim($tmp_colores) === trim($cadaselect[1])) { $colores_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->colores) === trim($cadaselect[1])) { $colores_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="colores" value="<?php echo $this->form_encode_input($colores) . "\">" . $colores_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_colores();
   $x = 0 ; 
   $colores_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->colores_1))
          {
              foreach ($this->colores_1 as $tmp_colores)
              {
                  if (trim($tmp_colores) === trim($cadaselect[1])) { $colores_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->colores) === trim($cadaselect[1])) { $colores_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($colores_look))
          {
              $colores_look = $this->colores;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_colores\" class=\"css_colores_line\" style=\"" .  $sStyleReadLab_colores . "\">" . $this->form_format_readonly("colores", $this->form_encode_input($colores_look)) . "</span><span id=\"id_read_off_colores\" class=\"css_read_off_colores" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_colores . "\">";
   echo " <span id=\"idAjaxSelect_colores\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_colores_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_colores\" name=\"colores\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->colores) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->colores)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_colores_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_colores_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tallas']))
   {
       $this->nm_new_label['tallas'] = "Talla";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tallas = $this->tallas;
   if (!isset($this->nmgp_cmp_hidden['tallas']))
   {
       $this->nmgp_cmp_hidden['tallas'] = 'off';
   }
   $sStyleHidden_tallas = '';
   if (isset($this->nmgp_cmp_hidden['tallas']) && $this->nmgp_cmp_hidden['tallas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tallas']);
       $sStyleHidden_tallas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tallas = 'display: none;';
   $sStyleReadInp_tallas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tallas']) && $this->nmgp_cmp_readonly['tallas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tallas']);
       $sStyleReadLab_tallas = '';
       $sStyleReadInp_tallas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tallas']) && $this->nmgp_cmp_hidden['tallas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tallas" value="<?php echo $this->form_encode_input($this->tallas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tallas_line" id="hidden_field_data_tallas" style="<?php echo $sStyleHidden_tallas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tallas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tallas_label" style=""><span id="id_label_tallas"><?php echo $this->nm_new_label['tallas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tallas"]) &&  $this->nmgp_cmp_readonly["tallas"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array(); 
}
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas where idpr=$this->idpro ORDER BY f.idta";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'][] = $rs->fields[0];
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
   $tallas_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tallas_1))
          {
              foreach ($this->tallas_1 as $tmp_tallas)
              {
                  if (trim($tmp_tallas) === trim($cadaselect[1])) { $tallas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tallas) === trim($cadaselect[1])) { $tallas_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tallas" value="<?php echo $this->form_encode_input($tallas) . "\">" . $tallas_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tallas();
   $x = 0 ; 
   $tallas_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tallas_1))
          {
              foreach ($this->tallas_1 as $tmp_tallas)
              {
                  if (trim($tmp_tallas) === trim($cadaselect[1])) { $tallas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tallas) === trim($cadaselect[1])) { $tallas_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tallas_look))
          {
              $tallas_look = $this->tallas;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tallas\" class=\"css_tallas_line\" style=\"" .  $sStyleReadLab_tallas . "\">" . $this->form_format_readonly("tallas", $this->form_encode_input($tallas_look)) . "</span><span id=\"id_read_off_tallas\" class=\"css_read_off_tallas" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tallas . "\">";
   echo " <span id=\"idAjaxSelect_tallas\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tallas_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tallas\" name=\"tallas\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tallas) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tallas)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tallas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tallas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sabor']))
   {
       $this->nm_new_label['sabor'] = "Sabor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sabor = $this->sabor;
   if (!isset($this->nmgp_cmp_hidden['sabor']))
   {
       $this->nmgp_cmp_hidden['sabor'] = 'off';
   }
   $sStyleHidden_sabor = '';
   if (isset($this->nmgp_cmp_hidden['sabor']) && $this->nmgp_cmp_hidden['sabor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sabor']);
       $sStyleHidden_sabor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sabor = 'display: none;';
   $sStyleReadInp_sabor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sabor']) && $this->nmgp_cmp_readonly['sabor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sabor']);
       $sStyleReadLab_sabor = '';
       $sStyleReadInp_sabor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sabor']) && $this->nmgp_cmp_hidden['sabor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sabor" value="<?php echo $this->form_encode_input($this->sabor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sabor_line" id="hidden_field_data_sabor" style="<?php echo $sStyleHidden_sabor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sabor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sabor_label" style=""><span id="id_label_sabor"><?php echo $this->nm_new_label['sabor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sabor"]) &&  $this->nmgp_cmp_readonly["sabor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array(); 
}
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas where idpr=$this->idpro and tallasabor='S' ORDER BY f.idsa";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'][] = $rs->fields[0];
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
   $sabor_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sabor_1))
          {
              foreach ($this->sabor_1 as $tmp_sabor)
              {
                  if (trim($tmp_sabor) === trim($cadaselect[1])) { $sabor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sabor) === trim($cadaselect[1])) { $sabor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sabor" value="<?php echo $this->form_encode_input($sabor) . "\">" . $sabor_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sabor();
   $x = 0 ; 
   $sabor_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sabor_1))
          {
              foreach ($this->sabor_1 as $tmp_sabor)
              {
                  if (trim($tmp_sabor) === trim($cadaselect[1])) { $sabor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sabor) === trim($cadaselect[1])) { $sabor_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sabor_look))
          {
              $sabor_look = $this->sabor;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sabor\" class=\"css_sabor_line\" style=\"" .  $sStyleReadLab_sabor . "\">" . $this->form_format_readonly("sabor", $this->form_encode_input($sabor_look)) . "</span><span id=\"id_read_off_sabor\" class=\"css_read_off_sabor" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_sabor . "\">";
   echo " <span id=\"idAjaxSelect_sabor\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_sabor_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_sabor\" name=\"sabor\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sabor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sabor)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sabor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sabor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adicional1']))
    {
        $this->nm_new_label['adicional1'] = "Tasa de descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adicional1 = $this->adicional1;
   if (!isset($this->nmgp_cmp_hidden['adicional1']))
   {
       $this->nmgp_cmp_hidden['adicional1'] = 'off';
   }
   $sStyleHidden_adicional1 = '';
   if (isset($this->nmgp_cmp_hidden['adicional1']) && $this->nmgp_cmp_hidden['adicional1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adicional1']);
       $sStyleHidden_adicional1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adicional1 = 'display: none;';
   $sStyleReadInp_adicional1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adicional1']) && $this->nmgp_cmp_readonly['adicional1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adicional1']);
       $sStyleReadLab_adicional1 = '';
       $sStyleReadInp_adicional1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adicional1']) && $this->nmgp_cmp_hidden['adicional1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional1" value="<?php echo $this->form_encode_input($adicional1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adicional1_line" id="hidden_field_data_adicional1" style="<?php echo $sStyleHidden_adicional1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_adicional1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_adicional1_label" style=""><span id="id_label_adicional1"><?php echo $this->nm_new_label['adicional1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional1"]) &&  $this->nmgp_cmp_readonly["adicional1"] == "on") { 

 ?>
<input type="hidden" name="adicional1" value="<?php echo $this->form_encode_input($adicional1) . "\">" . $adicional1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional1" class="sc-ui-readonly-adicional1 css_adicional1_line" style="<?php echo $sStyleReadLab_adicional1; ?>"><?php echo $this->form_format_readonly("adicional1", $this->form_encode_input($this->adicional1)); ?></span><span id="id_read_off_adicional1" class="css_read_off_adicional1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional1; ?>">
 <input class="sc-js-input scFormObjectOdd css_adicional1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional1" type=text name="adicional1" value="<?php echo $this->form_encode_input($adicional1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['adicional1']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['adicional1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['factor']))
    {
        $this->nm_new_label['factor'] = "Factor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factor = $this->factor;
   if (!isset($this->nmgp_cmp_hidden['factor']))
   {
       $this->nmgp_cmp_hidden['factor'] = 'off';
   }
   $sStyleHidden_factor = '';
   if (isset($this->nmgp_cmp_hidden['factor']) && $this->nmgp_cmp_hidden['factor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factor']);
       $sStyleHidden_factor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factor = 'display: none;';
   $sStyleReadInp_factor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factor']) && $this->nmgp_cmp_readonly['factor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factor']);
       $sStyleReadLab_factor = '';
       $sStyleReadInp_factor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factor']) && $this->nmgp_cmp_hidden['factor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factor" value="<?php echo $this->form_encode_input($factor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_factor_line" id="hidden_field_data_factor" style="<?php echo $sStyleHidden_factor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_factor_label" style=""><span id="id_label_factor"><?php echo $this->nm_new_label['factor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factor"]) &&  $this->nmgp_cmp_readonly["factor"] == "on") { 

 ?>
<input type="hidden" name="factor" value="<?php echo $this->form_encode_input($factor) . "\">" . $factor . ""; ?>
<?php } else { ?>
<span id="id_read_on_factor" class="sc-ui-readonly-factor css_factor_line" style="<?php echo $sStyleReadLab_factor; ?>"><?php echo $this->form_format_readonly("factor", $this->form_encode_input($this->factor)); ?></span><span id="id_read_off_factor" class="css_read_off_factor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_factor; ?>">
 <input class="sc-js-input scFormObjectOdd css_factor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_factor" type=text name="factor" value="<?php echo $this->form_encode_input($factor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['factor']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['factor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['factor']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['factor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iva']))
    {
        $this->nm_new_label['iva'] = "Impuesto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iva = $this->iva;
   if (!isset($this->nmgp_cmp_hidden['iva']))
   {
       $this->nmgp_cmp_hidden['iva'] = 'off';
   }
   $sStyleHidden_iva = '';
   if (isset($this->nmgp_cmp_hidden['iva']) && $this->nmgp_cmp_hidden['iva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iva']);
       $sStyleHidden_iva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iva = 'display: none;';
   $sStyleReadInp_iva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iva']) && $this->nmgp_cmp_readonly['iva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iva']);
       $sStyleReadLab_iva = '';
       $sStyleReadInp_iva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iva']) && $this->nmgp_cmp_hidden['iva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iva" value="<?php echo $this->form_encode_input($iva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_iva_line" id="hidden_field_data_iva" style="<?php echo $sStyleHidden_iva; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_iva_label" style=""><span id="id_label_iva"><?php echo $this->nm_new_label['iva']; ?></span></span><br><input type="hidden" name="iva" value="<?php echo $this->form_encode_input($iva); ?>"><span id="id_ajax_label_iva"><?php echo nl2br($iva); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['costop']))
    {
        $this->nm_new_label['costop'] = "Costop";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $costop = $this->costop;
   if (!isset($this->nmgp_cmp_hidden['costop']))
   {
       $this->nmgp_cmp_hidden['costop'] = 'off';
   }
   $sStyleHidden_costop = '';
   if (isset($this->nmgp_cmp_hidden['costop']) && $this->nmgp_cmp_hidden['costop'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['costop']);
       $sStyleHidden_costop = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_costop = 'display: none;';
   $sStyleReadInp_costop = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['costop']) && $this->nmgp_cmp_readonly['costop'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['costop']);
       $sStyleReadLab_costop = '';
       $sStyleReadInp_costop = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['costop']) && $this->nmgp_cmp_hidden['costop'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costop" value="<?php echo $this->form_encode_input($costop) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_costop_line" id="hidden_field_data_costop" style="<?php echo $sStyleHidden_costop; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_costop_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_costop_label" style=""><span id="id_label_costop"><?php echo $this->nm_new_label['costop']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costop"]) &&  $this->nmgp_cmp_readonly["costop"] == "on") { 

 ?>
<input type="hidden" name="costop" value="<?php echo $this->form_encode_input($costop) . "\">" . $costop . ""; ?>
<?php } else { ?>
<span id="id_read_on_costop" class="sc-ui-readonly-costop css_costop_line" style="<?php echo $sStyleReadLab_costop; ?>"><?php echo $this->form_format_readonly("costop", $this->form_encode_input($this->costop)); ?></span><span id="id_read_off_costop" class="css_read_off_costop<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costop; ?>">
 <input class="sc-js-input scFormObjectOdd css_costop_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costop" type=text name="costop" value="<?php echo $this->form_encode_input($costop) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['costop']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['costop']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['costop']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['costop']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costop_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costop_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['autorizarborrado']))
    {
        $this->nm_new_label['autorizarborrado'] = "Borrar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $autorizarborrado = $this->autorizarborrado;
   if (!isset($this->nmgp_cmp_hidden['autorizarborrado']))
   {
       $this->nmgp_cmp_hidden['autorizarborrado'] = 'off';
   }
   $sStyleHidden_autorizarborrado = '';
   if (isset($this->nmgp_cmp_hidden['autorizarborrado']) && $this->nmgp_cmp_hidden['autorizarborrado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['autorizarborrado']);
       $sStyleHidden_autorizarborrado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_autorizarborrado = 'display: none;';
   $sStyleReadInp_autorizarborrado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['autorizarborrado']) && $this->nmgp_cmp_readonly['autorizarborrado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['autorizarborrado']);
       $sStyleReadLab_autorizarborrado = '';
       $sStyleReadInp_autorizarborrado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['autorizarborrado']) && $this->nmgp_cmp_hidden['autorizarborrado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="autorizarborrado" value="<?php echo $this->form_encode_input($autorizarborrado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_autorizarborrado_line" id="hidden_field_data_autorizarborrado" style="<?php echo $sStyleHidden_autorizarborrado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_autorizarborrado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_autorizarborrado_label" style=""><span id="id_label_autorizarborrado"><?php echo $this->nm_new_label['autorizarborrado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autorizarborrado"]) &&  $this->nmgp_cmp_readonly["autorizarborrado"] == "on") { 

 if ("s" == $this->autorizarborrado) { $autorizarborrado_look = "";} 
?>
<input type="hidden" name="autorizarborrado" value="<?php echo $this->form_encode_input($autorizarborrado) . "\">" . $autorizarborrado_look . ""; ?>
<?php } else { ?>

<?php

 if ("s" == $this->autorizarborrado) { $autorizarborrado_look = "";} 
?>
<span id="id_read_on_autorizarborrado"  class="css_autorizarborrado_line" style="<?php echo $sStyleReadLab_autorizarborrado; ?>"><?php echo $this->form_format_readonly("autorizarborrado", $this->form_encode_input($autorizarborrado_look)); ?></span><span id="id_read_off_autorizarborrado" class="css_read_off_autorizarborrado css_autorizarborrado_line" style="<?php echo $sStyleReadInp_autorizarborrado; ?>"><div id="idAjaxRadio_autorizarborrado" style="display: inline-block"  class="css_autorizarborrado_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_autorizarborrado_line"><?php $tempOptionId = "id-opt-autorizarborrado" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-autorizarborrado sc-ui-radio-autorizarborrado sc-js-input" type=radio name="autorizarborrado" value="s"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_autorizarborrado'][] = 's'; ?>
<?php  if ("s" == $this->autorizarborrado)  { echo " checked" ;} ?>  onClick="do_ajax_form_detallepedido_220621_mob_event_autorizarborrado_onclick();" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autorizarborrado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autorizarborrado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado_comanda']))
    {
        $this->nm_new_label['estado_comanda'] = "Estado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado_comanda = $this->estado_comanda;
   if (!isset($this->nmgp_cmp_hidden['estado_comanda']))
   {
       $this->nmgp_cmp_hidden['estado_comanda'] = 'off';
   }
   $sStyleHidden_estado_comanda = '';
   if (isset($this->nmgp_cmp_hidden['estado_comanda']) && $this->nmgp_cmp_hidden['estado_comanda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado_comanda']);
       $sStyleHidden_estado_comanda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado_comanda = 'display: none;';
   $sStyleReadInp_estado_comanda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado_comanda']) && $this->nmgp_cmp_readonly['estado_comanda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado_comanda']);
       $sStyleReadLab_estado_comanda = '';
       $sStyleReadInp_estado_comanda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado_comanda']) && $this->nmgp_cmp_hidden['estado_comanda'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_comanda" value="<?php echo $this->form_encode_input($estado_comanda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_comanda_line" id="hidden_field_data_estado_comanda" style="<?php echo $sStyleHidden_estado_comanda; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_comanda_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_comanda_label" style=""><span id="id_label_estado_comanda"><?php echo $this->nm_new_label['estado_comanda']; ?></span></span><br><input type="hidden" name="estado_comanda" value="<?php echo $this->form_encode_input($estado_comanda); ?>"><span id="id_ajax_label_estado_comanda"><?php echo nl2br($estado_comanda); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_comanda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_comanda_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpedid']))
    {
        $this->nm_new_label['idpedid'] = "Idpedid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpedid = $this->idpedid;
   if (!isset($this->nmgp_cmp_hidden['idpedid']))
   {
       $this->nmgp_cmp_hidden['idpedid'] = 'off';
   }
   $sStyleHidden_idpedid = '';
   if (isset($this->nmgp_cmp_hidden['idpedid']) && $this->nmgp_cmp_hidden['idpedid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpedid']);
       $sStyleHidden_idpedid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpedid = 'display: none;';
   $sStyleReadInp_idpedid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpedid']) && $this->nmgp_cmp_readonly['idpedid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpedid']);
       $sStyleReadLab_idpedid = '';
       $sStyleReadInp_idpedid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpedid']) && $this->nmgp_cmp_hidden['idpedid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpedid" value="<?php echo $this->form_encode_input($idpedid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpedid_line" id="hidden_field_data_idpedid" style="<?php echo $sStyleHidden_idpedid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpedid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpedid_label" style=""><span id="id_label_idpedid"><?php echo $this->nm_new_label['idpedid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpedid"]) &&  $this->nmgp_cmp_readonly["idpedid"] == "on") { 

 ?>
<input type="hidden" name="idpedid" value="<?php echo $this->form_encode_input($idpedid) . "\">" . $idpedid . ""; ?>
<?php } else { ?>
<span id="id_read_on_idpedid" class="sc-ui-readonly-idpedid css_idpedid_line" style="<?php echo $sStyleReadLab_idpedid; ?>"><?php echo $this->form_format_readonly("idpedid", $this->form_encode_input($this->idpedid)); ?></span><span id="id_read_off_idpedid" class="css_read_off_idpedid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idpedid; ?>">
 <input class="sc-js-input scFormObjectOdd css_idpedid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idpedid" type=text name="idpedid" value="<?php echo $this->form_encode_input($idpedid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idpedid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idpedid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idpedid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpedid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpedid_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['back'];
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
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detallepedido_220621_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detallepedido_220621_mob");
 parent.scAjaxDetailHeight("form_detallepedido_220621_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detallepedido_220621_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detallepedido_220621_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-15").length && $("#sc_b_new_t.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-16").length && $("#sc_b_ins_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-16").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-17").length && $("#sc_b_sai_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-17").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
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
		if ($("#sc_b_del_t.sc-unique-btn-18").length && $("#sc_b_del_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-18").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
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
		if ($("#sc_b_upd_t.sc-unique-btn-19").length && $("#sc_b_upd_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-19").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-21").length && $("#sc_b_sai_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-21").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-22").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-23").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-25").length && $("#sc_b_ini_b.sc-unique-btn-25").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-25").hasClass("disabled")) {
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
		if ($("#sc_b_ret_b.sc-unique-btn-26").length && $("#sc_b_ret_b.sc-unique-btn-26").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-26").hasClass("disabled")) {
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
		if ($("#sc_b_avc_b.sc-unique-btn-27").length && $("#sc_b_avc_b.sc-unique-btn-27").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-27").hasClass("disabled")) {
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
		if ($("#sc_b_fim_b.sc-unique-btn-28").length && $("#sc_b_fim_b.sc-unique-btn-28").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-28").hasClass("disabled")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['buttonStatus'] = $this->nmgp_botoes;
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
