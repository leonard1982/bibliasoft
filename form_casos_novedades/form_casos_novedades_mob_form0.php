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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - casos_novedades"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - casos_novedades"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_casos_novedades/form_casos_novedades_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_casos_novedades_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['last'] : 'off'); ?>";
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
<?php

include_once('form_casos_novedades_mob_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if(event.target !== event.currentTarget) return;
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });
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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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


  $(".sc-ui-autocomp-id_producto", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "id_producto" != sId ? sId.substr(11) : "";
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
    url: "form_casos_novedades_mob.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_id_producto",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "id_producto" != sId ? sId.substr(11) : "";
   sc_form_casos_novedades_mob_id_producto_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_casos_novedades']['error_buffer']) && '' != $_SESSION['scriptcase']['form_casos_novedades']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_casos_novedades']['error_buffer'];
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
 include_once("form_casos_novedades_mob_js0.php");
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
               action="form_casos_novedades_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['insert_validation']; ?>">
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
<input type="hidden" name="id_novedades" value="<?php  echo $this->form_encode_input($this->id_novedades) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_casos_novedades_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_casos_novedades_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input id='fast_search_f0_t' type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:none;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "" . $this->Ini->Nm_lang['lang_btns_options'] . "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['group_group_2']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['group_group_2']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['group_group_2']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['group_group_2']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['group_group_2'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $buttonMacroDisabled . "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
echo nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 't', '', 'ini');
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['new'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['insert'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['update'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['delete'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label'][''];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['copy']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['copy']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['copy']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['copy']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['copy'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
echo nmButtonGroupTableOutput($this->arr_buttons, "", '', '', '', 'fim');
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['exit'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['fecha']))
   {
       $this->nmgp_cmp_hidden['fecha'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['valor_imp']))
   {
       $this->nmgp_cmp_hidden['valor_imp'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tarifa_imp']))
   {
       $this->nmgp_cmp_hidden['tarifa_imp'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['codigo_imp']))
   {
       $this->nmgp_cmp_hidden['codigo_imp'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['desc_imp']))
   {
       $this->nmgp_cmp_hidden['desc_imp'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['descr']))
   {
       $this->nmgp_cmp_hidden['descr'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['cod_producto']))
   {
       $this->nmgp_cmp_hidden['cod_producto'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_caso']) && $this->nmgp_cmp_readonly['id_caso'] == 'on')
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

    <TD class="scFormDataOdd css_id_caso_line" id="hidden_field_data_id_caso" style="<?php echo $sStyleHidden_id_caso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_caso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_caso_label" style=""><span id="id_label_id_caso"><?php echo $this->nm_new_label['id_caso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_caso"]) &&  $this->nmgp_cmp_readonly["id_caso"] == "on") { 

 ?>
<input type="hidden" name="id_caso" value="<?php echo $this->form_encode_input($id_caso) . "\">" . $id_caso . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_caso" class="sc-ui-readonly-id_caso css_id_caso_line" style="<?php echo $sStyleReadLab_id_caso; ?>"><?php echo $this->form_format_readonly("id_caso", $this->form_encode_input($this->id_caso)); ?></span><span id="id_read_off_id_caso" class="css_read_off_id_caso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_caso; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_caso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_caso" type=text name="id_caso" value="<?php echo $this->form_encode_input($id_caso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_caso']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_caso']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id_caso']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_caso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_caso_text"></span></td></tr></table></td></tr></table> </TD>
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
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo = $this->tipo;
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
<?php if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo" value="<?php echo $this->form_encode_input($this->tipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_line" id="hidden_field_data_tipo" style="<?php echo $sStyleHidden_tipo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_label" style=""><span id="id_label_tipo"><?php echo $this->nm_new_label['tipo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo"]) &&  $this->nmgp_cmp_readonly["tipo"] == "on") { 

$tipo_look = "";
 if ($this->tipo == "N") { $tipo_look .= "NOVEDAD" ;} 
 if ($this->tipo == "S") { $tipo_look .= "SERVICIO" ;} 
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">" . $tipo_look . ""; ?>
<?php } else { ?>
<?php

$tipo_look = "";
 if ($this->tipo == "N") { $tipo_look .= "NOVEDAD" ;} 
 if ($this->tipo == "S") { $tipo_look .= "SERVICIO" ;} 
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<span id="id_read_on_tipo" class="css_tipo_line"  style="<?php echo $sStyleReadLab_tipo; ?>"><?php echo $this->form_format_readonly("tipo", $this->form_encode_input($tipo_look)); ?></span><span id="id_read_off_tipo" class="css_read_off_tipo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo; ?>">
 <span id="idAjaxSelect_tipo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo" name="tipo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="N" <?php  if ($this->tipo == "N") { echo " selected" ;} ?>>NOVEDAD</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_tipo'][] = 'N'; ?>
 <option  value="S" <?php  if ($this->tipo == "S") { echo " selected" ;} ?>>SERVICIO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_tipo'][] = 'S'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_producto']))
    {
        $this->nm_new_label['id_producto'] = "Producto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_producto = $this->id_producto;
   $sStyleHidden_id_producto = '';
   if (isset($this->nmgp_cmp_hidden['id_producto']) && $this->nmgp_cmp_hidden['id_producto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_producto']);
       $sStyleHidden_id_producto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_producto = 'display: none;';
   $sStyleReadInp_id_producto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_producto']) && $this->nmgp_cmp_readonly['id_producto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_producto']);
       $sStyleReadLab_id_producto = '';
       $sStyleReadInp_id_producto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_producto']) && $this->nmgp_cmp_hidden['id_producto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_producto" value="<?php echo $this->form_encode_input($id_producto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_producto_line" id="hidden_field_data_id_producto" style="<?php echo $sStyleHidden_id_producto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_producto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_producto_label" style=""><span id="id_label_id_producto"><?php echo $this->nm_new_label['id_producto']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['php_cmp_required']['id_producto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['php_cmp_required']['id_producto'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_producto"]) &&  $this->nmgp_cmp_readonly["id_producto"] == "on") { 

 ?>
<input type="hidden" name="id_producto" value="<?php echo $this->form_encode_input($id_producto) . "\">" . $id_producto . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_producto'] = $this->id_producto;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto'] = array(); 
    }

   $old_value_id_caso = $this->id_caso;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_valor = $this->valor;
   $old_value_valor_imp = $this->valor_imp;
   $old_value_tarifa_imp = $this->tarifa_imp;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_caso = $this->id_caso;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_valor_imp = $this->valor_imp;
   $unformatted_value_tarifa_imp = $this->tarifa_imp;

   $nm_comando = "SELECT idprod, nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->id_producto), 1, -1) . " ORDER BY nompro";

   $this->id_caso = $old_value_id_caso;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->valor = $old_value_valor;
   $this->valor_imp = $old_value_valor_imp;
   $this->tarifa_imp = $old_value_tarifa_imp;

   if ('' != $this->id_producto)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->id_producto])) ? $aLookup[0][$this->id_producto] : $this->id_producto;
$id_producto_look = (isset($aLookup[0][$this->id_producto])) ? $aLookup[0][$this->id_producto] : $this->id_producto;
?>
<span id="id_read_on_id_producto" class="sc-ui-readonly-id_producto css_id_producto_line" style="<?php echo $sStyleReadLab_id_producto; ?>"><?php echo $this->form_format_readonly("id_producto", str_replace("<", "&lt;", $id_producto_look)); ?></span><span id="id_read_off_id_producto" class="css_read_off_id_producto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_producto; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_producto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_id_producto" type=text name="id_producto" value="<?php echo $this->form_encode_input($id_producto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['id_producto'] = $this->id_producto;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto'] = array(); 
    }

   $old_value_id_caso = $this->id_caso;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_valor = $this->valor;
   $old_value_valor_imp = $this->valor_imp;
   $old_value_tarifa_imp = $this->tarifa_imp;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_caso = $this->id_caso;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valor = $this->valor;
   $unformatted_value_valor_imp = $this->valor_imp;
   $unformatted_value_tarifa_imp = $this->tarifa_imp;

   $nm_comando = "SELECT idprod, nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->id_producto), 1, -1) . " ORDER BY nompro";

   $this->id_caso = $old_value_id_caso;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->valor = $old_value_valor;
   $this->valor_imp = $old_value_valor_imp;
   $this->tarifa_imp = $old_value_tarifa_imp;

   if ('' != $this->id_producto)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['Lookup_id_producto'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->id_producto])) ? $aLookup[0][$this->id_producto] : '';
$id_producto_look = (isset($aLookup[0][$this->id_producto])) ? $aLookup[0][$this->id_producto] : '';
?>
<select id="id_ac_id_producto" class="scFormObjectOdd sc-ui-autocomp-id_producto css_id_producto_obj"><?php if ('' != $this->id_producto) { ?><option value="<?php echo $this->id_producto ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_producto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_producto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descripcion']))
    {
        $this->nm_new_label['descripcion'] = "Descripcion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descripcion = $this->descripcion;
   $sStyleHidden_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descripcion']);
       $sStyleHidden_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descripcion = 'display: none;';
   $sStyleReadInp_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descripcion']) && $this->nmgp_cmp_readonly['descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descripcion']);
       $sStyleReadLab_descripcion = '';
       $sStyleReadInp_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descripcion_line" id="hidden_field_data_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descripcion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descripcion_label" style=""><span id="id_label_descripcion"><?php echo $this->nm_new_label['descripcion']; ?></span></span><br>
<?php
$descripcion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($descripcion));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion"]) &&  $this->nmgp_cmp_readonly["descripcion"] == "on") { 

 ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">" . $descripcion_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion" class="sc-ui-readonly-descripcion css_descripcion_line" style="<?php echo $sStyleReadLab_descripcion; ?>"><?php echo $this->form_format_readonly("descripcion", $this->form_encode_input($descripcion_val)); ?></span><span id="id_read_off_descripcion" class="css_read_off_descripcion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_descripcion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="descripcion" id="id_sc_field_descripcion" rows="2" cols="70"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $descripcion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha']))
    {
        $this->nm_new_label['fecha'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha = $this->fecha;
   if (!isset($this->nmgp_cmp_hidden['fecha']))
   {
       $this->nmgp_cmp_hidden['fecha'] = 'off';
   }
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

    <TD class="scFormDataOdd css_fecha_line" id="hidden_field_data_fecha" style="<?php echo $sStyleHidden_fecha; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_label" style=""><span id="id_label_fecha"><?php echo $this->nm_new_label['fecha']; ?></span></span><br>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table> </TD>
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

    <TD class="scFormDataOdd css_cantidad_line" id="hidden_field_data_cantidad" style="<?php echo $sStyleHidden_cantidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cantidad_label" style=""><span id="id_label_cantidad"><?php echo $this->nm_new_label['cantidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['php_cmp_required']['cantidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['php_cmp_required']['cantidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad"]) &&  $this->nmgp_cmp_readonly["cantidad"] == "on") { 

 ?>
<input type="hidden" name="cantidad" value="<?php echo $this->form_encode_input($cantidad) . "\">" . $cantidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad" class="sc-ui-readonly-cantidad css_cantidad_line" style="<?php echo $sStyleReadLab_cantidad; ?>"><?php echo $this->form_format_readonly("cantidad", $this->form_encode_input($this->cantidad)); ?></span><span id="id_read_off_cantidad" class="css_read_off_cantidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidad" type=text name="cantidad" value="<?php echo $this->form_encode_input($cantidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_valor_line" id="hidden_field_data_valor" style="<?php echo $sStyleHidden_valor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_label" style=""><span id="id_label_valor"><?php echo $this->nm_new_label['valor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['php_cmp_required']['valor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['php_cmp_required']['valor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor"]) &&  $this->nmgp_cmp_readonly["valor"] == "on") { 

 ?>
<input type="hidden" name="valor" value="<?php echo $this->form_encode_input($valor) . "\">" . $valor . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor" class="sc-ui-readonly-valor css_valor_line" style="<?php echo $sStyleReadLab_valor; ?>"><?php echo $this->form_format_readonly("valor", $this->form_encode_input($this->valor)); ?></span><span id="id_read_off_valor" class="css_read_off_valor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor" type=text name="valor" value="<?php echo $this->form_encode_input($valor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor']['format_pos'] || 3 == $this->field_config['valor']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_imp']))
    {
        $this->nm_new_label['valor_imp'] = "Valor Imp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_imp = $this->valor_imp;
   if (!isset($this->nmgp_cmp_hidden['valor_imp']))
   {
       $this->nmgp_cmp_hidden['valor_imp'] = 'off';
   }
   $sStyleHidden_valor_imp = '';
   if (isset($this->nmgp_cmp_hidden['valor_imp']) && $this->nmgp_cmp_hidden['valor_imp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_imp']);
       $sStyleHidden_valor_imp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_imp = 'display: none;';
   $sStyleReadInp_valor_imp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_imp']) && $this->nmgp_cmp_readonly['valor_imp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_imp']);
       $sStyleReadLab_valor_imp = '';
       $sStyleReadInp_valor_imp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_imp']) && $this->nmgp_cmp_hidden['valor_imp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_imp" value="<?php echo $this->form_encode_input($valor_imp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_imp_line" id="hidden_field_data_valor_imp" style="<?php echo $sStyleHidden_valor_imp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_imp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_imp_label" style=""><span id="id_label_valor_imp"><?php echo $this->nm_new_label['valor_imp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_imp"]) &&  $this->nmgp_cmp_readonly["valor_imp"] == "on") { 

 ?>
<input type="hidden" name="valor_imp" value="<?php echo $this->form_encode_input($valor_imp) . "\">" . $valor_imp . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_imp" class="sc-ui-readonly-valor_imp css_valor_imp_line" style="<?php echo $sStyleReadLab_valor_imp; ?>"><?php echo $this->form_format_readonly("valor_imp", $this->form_encode_input($this->valor_imp)); ?></span><span id="id_read_off_valor_imp" class="css_read_off_valor_imp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_imp; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_imp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_imp" type=text name="valor_imp" value="<?php echo $this->form_encode_input($valor_imp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_imp']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_imp']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_imp']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_imp']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_imp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_imp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarifa_imp']))
    {
        $this->nm_new_label['tarifa_imp'] = "Tarifa Imp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarifa_imp = $this->tarifa_imp;
   if (!isset($this->nmgp_cmp_hidden['tarifa_imp']))
   {
       $this->nmgp_cmp_hidden['tarifa_imp'] = 'off';
   }
   $sStyleHidden_tarifa_imp = '';
   if (isset($this->nmgp_cmp_hidden['tarifa_imp']) && $this->nmgp_cmp_hidden['tarifa_imp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarifa_imp']);
       $sStyleHidden_tarifa_imp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarifa_imp = 'display: none;';
   $sStyleReadInp_tarifa_imp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarifa_imp']) && $this->nmgp_cmp_readonly['tarifa_imp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarifa_imp']);
       $sStyleReadLab_tarifa_imp = '';
       $sStyleReadInp_tarifa_imp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarifa_imp']) && $this->nmgp_cmp_hidden['tarifa_imp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarifa_imp" value="<?php echo $this->form_encode_input($tarifa_imp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tarifa_imp_line" id="hidden_field_data_tarifa_imp" style="<?php echo $sStyleHidden_tarifa_imp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tarifa_imp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tarifa_imp_label" style=""><span id="id_label_tarifa_imp"><?php echo $this->nm_new_label['tarifa_imp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarifa_imp"]) &&  $this->nmgp_cmp_readonly["tarifa_imp"] == "on") { 

 ?>
<input type="hidden" name="tarifa_imp" value="<?php echo $this->form_encode_input($tarifa_imp) . "\">" . $tarifa_imp . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarifa_imp" class="sc-ui-readonly-tarifa_imp css_tarifa_imp_line" style="<?php echo $sStyleReadLab_tarifa_imp; ?>"><?php echo $this->form_format_readonly("tarifa_imp", $this->form_encode_input($this->tarifa_imp)); ?></span><span id="id_read_off_tarifa_imp" class="css_read_off_tarifa_imp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tarifa_imp; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarifa_imp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tarifa_imp" type=text name="tarifa_imp" value="<?php echo $this->form_encode_input($tarifa_imp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tarifa_imp']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tarifa_imp']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tarifa_imp']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tarifa_imp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tarifa_imp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo_imp']))
    {
        $this->nm_new_label['codigo_imp'] = "Codigo Imp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_imp = $this->codigo_imp;
   if (!isset($this->nmgp_cmp_hidden['codigo_imp']))
   {
       $this->nmgp_cmp_hidden['codigo_imp'] = 'off';
   }
   $sStyleHidden_codigo_imp = '';
   if (isset($this->nmgp_cmp_hidden['codigo_imp']) && $this->nmgp_cmp_hidden['codigo_imp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_imp']);
       $sStyleHidden_codigo_imp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_imp = 'display: none;';
   $sStyleReadInp_codigo_imp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_imp']) && $this->nmgp_cmp_readonly['codigo_imp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_imp']);
       $sStyleReadLab_codigo_imp = '';
       $sStyleReadInp_codigo_imp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_imp']) && $this->nmgp_cmp_hidden['codigo_imp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_imp" value="<?php echo $this->form_encode_input($codigo_imp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_imp_line" id="hidden_field_data_codigo_imp" style="<?php echo $sStyleHidden_codigo_imp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_imp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_imp_label" style=""><span id="id_label_codigo_imp"><?php echo $this->nm_new_label['codigo_imp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_imp"]) &&  $this->nmgp_cmp_readonly["codigo_imp"] == "on") { 

 ?>
<input type="hidden" name="codigo_imp" value="<?php echo $this->form_encode_input($codigo_imp) . "\">" . $codigo_imp . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_imp" class="sc-ui-readonly-codigo_imp css_codigo_imp_line" style="<?php echo $sStyleReadLab_codigo_imp; ?>"><?php echo $this->form_format_readonly("codigo_imp", $this->form_encode_input($this->codigo_imp)); ?></span><span id="id_read_off_codigo_imp" class="css_read_off_codigo_imp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_imp; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_imp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_imp" type=text name="codigo_imp" value="<?php echo $this->form_encode_input($codigo_imp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_imp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_imp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desc_imp']))
    {
        $this->nm_new_label['desc_imp'] = "Desc Imp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desc_imp = $this->desc_imp;
   if (!isset($this->nmgp_cmp_hidden['desc_imp']))
   {
       $this->nmgp_cmp_hidden['desc_imp'] = 'off';
   }
   $sStyleHidden_desc_imp = '';
   if (isset($this->nmgp_cmp_hidden['desc_imp']) && $this->nmgp_cmp_hidden['desc_imp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desc_imp']);
       $sStyleHidden_desc_imp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desc_imp = 'display: none;';
   $sStyleReadInp_desc_imp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desc_imp']) && $this->nmgp_cmp_readonly['desc_imp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desc_imp']);
       $sStyleReadLab_desc_imp = '';
       $sStyleReadInp_desc_imp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desc_imp']) && $this->nmgp_cmp_hidden['desc_imp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desc_imp" value="<?php echo $this->form_encode_input($desc_imp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_desc_imp_line" id="hidden_field_data_desc_imp" style="<?php echo $sStyleHidden_desc_imp; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desc_imp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_desc_imp_label" style=""><span id="id_label_desc_imp"><?php echo $this->nm_new_label['desc_imp']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desc_imp"]) &&  $this->nmgp_cmp_readonly["desc_imp"] == "on") { 

 ?>
<input type="hidden" name="desc_imp" value="<?php echo $this->form_encode_input($desc_imp) . "\">" . $desc_imp . ""; ?>
<?php } else { ?>
<span id="id_read_on_desc_imp" class="sc-ui-readonly-desc_imp css_desc_imp_line" style="<?php echo $sStyleReadLab_desc_imp; ?>"><?php echo $this->form_format_readonly("desc_imp", $this->form_encode_input($this->desc_imp)); ?></span><span id="id_read_off_desc_imp" class="css_read_off_desc_imp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desc_imp; ?>">
 <input class="sc-js-input scFormObjectOdd css_desc_imp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desc_imp" type=text name="desc_imp" value="<?php echo $this->form_encode_input($desc_imp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desc_imp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desc_imp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descr']))
    {
        $this->nm_new_label['descr'] = "Descr";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descr = $this->descr;
   if (!isset($this->nmgp_cmp_hidden['descr']))
   {
       $this->nmgp_cmp_hidden['descr'] = 'off';
   }
   $sStyleHidden_descr = '';
   if (isset($this->nmgp_cmp_hidden['descr']) && $this->nmgp_cmp_hidden['descr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descr']);
       $sStyleHidden_descr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descr = 'display: none;';
   $sStyleReadInp_descr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descr']) && $this->nmgp_cmp_readonly['descr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descr']);
       $sStyleReadLab_descr = '';
       $sStyleReadInp_descr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descr']) && $this->nmgp_cmp_hidden['descr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descr" value="<?php echo $this->form_encode_input($descr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descr_line" id="hidden_field_data_descr" style="<?php echo $sStyleHidden_descr; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descr_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descr_label" style=""><span id="id_label_descr"><?php echo $this->nm_new_label['descr']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descr"]) &&  $this->nmgp_cmp_readonly["descr"] == "on") { 

 ?>
<input type="hidden" name="descr" value="<?php echo $this->form_encode_input($descr) . "\">" . $descr . ""; ?>
<?php } else { ?>
<span id="id_read_on_descr" class="sc-ui-readonly-descr css_descr_line" style="<?php echo $sStyleReadLab_descr; ?>"><?php echo $this->form_format_readonly("descr", $this->form_encode_input($this->descr)); ?></span><span id="id_read_off_descr" class="css_read_off_descr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descr; ?>">
 <input class="sc-js-input scFormObjectOdd css_descr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descr" type=text name="descr" value="<?php echo $this->form_encode_input($descr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descr_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_producto']))
    {
        $this->nm_new_label['cod_producto'] = "Cod Producto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_producto = $this->cod_producto;
   if (!isset($this->nmgp_cmp_hidden['cod_producto']))
   {
       $this->nmgp_cmp_hidden['cod_producto'] = 'off';
   }
   $sStyleHidden_cod_producto = '';
   if (isset($this->nmgp_cmp_hidden['cod_producto']) && $this->nmgp_cmp_hidden['cod_producto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_producto']);
       $sStyleHidden_cod_producto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_producto = 'display: none;';
   $sStyleReadInp_cod_producto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_producto']) && $this->nmgp_cmp_readonly['cod_producto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_producto']);
       $sStyleReadLab_cod_producto = '';
       $sStyleReadInp_cod_producto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_producto']) && $this->nmgp_cmp_hidden['cod_producto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_producto" value="<?php echo $this->form_encode_input($cod_producto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_producto_line" id="hidden_field_data_cod_producto" style="<?php echo $sStyleHidden_cod_producto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_producto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_producto_label" style=""><span id="id_label_cod_producto"><?php echo $this->nm_new_label['cod_producto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_producto"]) &&  $this->nmgp_cmp_readonly["cod_producto"] == "on") { 

 ?>
<input type="hidden" name="cod_producto" value="<?php echo $this->form_encode_input($cod_producto) . "\">" . $cod_producto . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_producto" class="sc-ui-readonly-cod_producto css_cod_producto_line" style="<?php echo $sStyleReadLab_cod_producto; ?>"><?php echo $this->form_format_readonly("cod_producto", $this->form_encode_input($this->cod_producto)); ?></span><span id="id_read_off_cod_producto" class="css_read_off_cod_producto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_producto; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_producto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_producto" type=text name="cod_producto" value="<?php echo $this->form_encode_input($cod_producto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_producto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_producto_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_casos_novedades_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_casos_novedades_mob");
 parent.scAjaxDetailHeight("form_casos_novedades_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_casos_novedades_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_casos_novedades_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-8").length && $("#sc_b_new_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-9").length && $("#sc_b_ins_t.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-9").hasClass("disabled")) {
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
		if ($("#sc_b_upd_t.sc-unique-btn-10").length && $("#sc_b_upd_t.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-10").hasClass("disabled")) {
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
		if ($("#sc_b_del_t.sc-unique-btn-11").length && $("#sc_b_del_t.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-11").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-14").length && $("#sc_b_sai_t.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-15").length && $("#sc_b_sai_t.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-16").length && $("#sc_b_sai_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-16").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-12").length && $("#sys_separator.sc-unique-btn-12").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-13").length && $("#sc_b_clone_t.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-17").length && $("#sc_b_ini_b.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-17").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-18").length && $("#sc_b_ret_b.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-18").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-19").length && $("#sc_b_avc_b.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-19").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-20").length && $("#sc_b_fim_b.sc-unique-btn-20").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-20").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_casos_novedades_mob']['buttonStatus'] = $this->nmgp_botoes;
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
