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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - detallecompra"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - detallecompra"); } ?></TITLE>
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
.css_read_off_vencimiento button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>detallecompra2/detallecompra2_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("detallecompra2_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['last'] : 'off'); ?>";
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

 function fCodBarra() {
  
 } // fCodBarra
<?php

include_once('detallecompra2_mob_jquery.php');

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

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('autocompletar');

<?php
}
?>
  addAutocomplete(this);

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


  $(".sc-ui-autocomp-autocompletar", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "autocompletar" != sId ? sId.substr(13) : "";
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
    url: "detallecompra2_mob.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_autocompletar",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "autocompletar" != sId ? sId.substr(13) : "";
   sc_detallecompra2_mob_autocompletar_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['detallecompra2']['error_buffer']) && '' != $_SESSION['scriptcase']['detallecompra2']['error_buffer'])
{
    echo $_SESSION['scriptcase']['detallecompra2']['error_buffer'];
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
 include_once("detallecompra2_mob_js0.php");
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
               action="detallecompra2_mob.php" 
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['insert_validation']; ?>">
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
<input type="hidden" name="iddet" value="<?php  echo $this->form_encode_input($this->iddet) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['detallecompra2_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['detallecompra2_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="left" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['fast_search'][2] : "";
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['group_group_2']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['group_group_2']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['group_group_2']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['group_group_2']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['group_group_2'];
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
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['new'];
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
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['insert'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['bcancelar'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['update'];
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
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['delete'];
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
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label'][''];
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
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['copy']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['copy']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['copy']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['copy']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['copy'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['exit'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idfaccom']))
   {
       $this->nmgp_cmp_hidden['idfaccom'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idpro']))
   {
       $this->nmgp_cmp_hidden['idpro'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['descuento']))
   {
       $this->nmgp_cmp_hidden['descuento'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tasadesc']))
   {
       $this->nmgp_cmp_hidden['tasadesc'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['devuelto']))
   {
       $this->nmgp_cmp_hidden['devuelto'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['autocompletar']))
    {
        $this->nm_new_label['autocompletar'] = "Buscar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $autocompletar = $this->autocompletar;
   $sStyleHidden_autocompletar = '';
   if (isset($this->nmgp_cmp_hidden['autocompletar']) && $this->nmgp_cmp_hidden['autocompletar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['autocompletar']);
       $sStyleHidden_autocompletar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_autocompletar = 'display: none;';
   $sStyleReadInp_autocompletar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['autocompletar']) && $this->nmgp_cmp_readonly['autocompletar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['autocompletar']);
       $sStyleReadLab_autocompletar = '';
       $sStyleReadInp_autocompletar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['autocompletar']) && $this->nmgp_cmp_hidden['autocompletar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="autocompletar" value="<?php echo $this->form_encode_input($autocompletar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_autocompletar_line" id="hidden_field_data_autocompletar" style="<?php echo $sStyleHidden_autocompletar; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_autocompletar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_autocompletar_label" style=""><span id="id_label_autocompletar"><?php echo $this->nm_new_label['autocompletar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autocompletar"]) &&  $this->nmgp_cmp_readonly["autocompletar"] == "on") { 

 ?>
<input type="hidden" name="autocompletar" value="<?php echo $this->form_encode_input($autocompletar) . "\">" . $autocompletar . ""; ?>
<?php } else { ?>

<?php
$aRecData['autocompletar'] = $this->autocompletar;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + ' -- ' + nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar,' -- ', nompro) FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&' -- '&nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||' -- '||nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + ' -- ' + nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||' -- '||nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||' -- '||nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->autocompletar])) ? $aLookup[0][$this->autocompletar] : $this->autocompletar;
$autocompletar_look = (isset($aLookup[0][$this->autocompletar])) ? $aLookup[0][$this->autocompletar] : $this->autocompletar;
?>
<span id="id_read_on_autocompletar" class="sc-ui-readonly-autocompletar css_autocompletar_line" style="<?php echo $sStyleReadLab_autocompletar; ?>"><?php echo $this->form_format_readonly("autocompletar", str_replace("<", "&lt;", $autocompletar_look)); ?></span><span id="id_read_off_autocompletar" class="css_read_off_autocompletar<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_autocompletar; ?>">
 <input class="sc-js-input scFormObjectOdd css_autocompletar_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_autocompletar" type=text name="autocompletar" value="<?php echo $this->form_encode_input($autocompletar) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 style="display: none" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['autocompletar'] = $this->autocompletar;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + ' -- ' + nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar,' -- ', nompro) FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&' -- '&nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||' -- '||nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + ' -- ' + nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||' -- '||nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||' -- '||nompro FROM productos WHERE idprod = '" . substr($this->Db->qstr($this->autocompletar), 1, -1) . "' ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_autocompletar'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->autocompletar])) ? $aLookup[0][$this->autocompletar] : '';
$autocompletar_look = (isset($aLookup[0][$this->autocompletar])) ? $aLookup[0][$this->autocompletar] : '';
?>
<select id="id_ac_autocompletar" class="scFormObjectOdd sc-ui-autocomp-autocompletar css_autocompletar_obj sc-js-input"><?php if ('' != $this->autocompletar) { ?><option value="<?php echo $this->autocompletar ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autocompletar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autocompletar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_autocompletar_dumb = ('' == $sStyleHidden_autocompletar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_autocompletar_dumb" style="<?php echo $sStyleHidden_autocompletar_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['codbarra']))
    {
        $this->nm_new_label['codbarra'] = "Codigo de Barras";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codbarra = $this->codbarra;
   $sStyleHidden_codbarra = '';
   if (isset($this->nmgp_cmp_hidden['codbarra']) && $this->nmgp_cmp_hidden['codbarra'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codbarra']);
       $sStyleHidden_codbarra = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codbarra = 'display: none;';
   $sStyleReadInp_codbarra = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codbarra']) && $this->nmgp_cmp_readonly['codbarra'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codbarra']);
       $sStyleReadLab_codbarra = '';
       $sStyleReadInp_codbarra = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codbarra']) && $this->nmgp_cmp_hidden['codbarra'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codbarra" value="<?php echo $this->form_encode_input($codbarra) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codbarra_line" id="hidden_field_data_codbarra" style="<?php echo $sStyleHidden_codbarra; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codbarra_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codbarra_label" style=""><span id="id_label_codbarra"><?php echo $this->nm_new_label['codbarra']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codbarra"]) &&  $this->nmgp_cmp_readonly["codbarra"] == "on") { 

 ?>
<input type="hidden" name="codbarra" value="<?php echo $this->form_encode_input($codbarra) . "\">" . $codbarra . ""; ?>
<?php } else { ?>
<span id="id_read_on_codbarra" class="sc-ui-readonly-codbarra css_codbarra_line" style="<?php echo $sStyleReadLab_codbarra; ?>"><?php echo $this->form_format_readonly("codbarra", $this->form_encode_input($this->codbarra)); ?></span><span id="id_read_off_codbarra" class="css_read_off_codbarra<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codbarra; ?>">
 <input class="sc-js-input scFormObjectOdd css_codbarra_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codbarra" type=text name="codbarra" value="<?php echo $this->form_encode_input($codbarra) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codbarra_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codbarra_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['presentacion']))
    {
        $this->nm_new_label['presentacion'] = "Presentación";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $presentacion = $this->presentacion;
   $sStyleHidden_presentacion = '';
   if (isset($this->nmgp_cmp_hidden['presentacion']) && $this->nmgp_cmp_hidden['presentacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['presentacion']);
       $sStyleHidden_presentacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_presentacion = 'display: none;';
   $sStyleReadInp_presentacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['presentacion']) && $this->nmgp_cmp_readonly['presentacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['presentacion']);
       $sStyleReadLab_presentacion = '';
       $sStyleReadInp_presentacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['presentacion']) && $this->nmgp_cmp_hidden['presentacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="presentacion" value="<?php echo $this->form_encode_input($presentacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_presentacion_line" id="hidden_field_data_presentacion" style="<?php echo $sStyleHidden_presentacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_presentacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_presentacion_label" style=""><span id="id_label_presentacion"><?php echo $this->nm_new_label['presentacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["presentacion"]) &&  $this->nmgp_cmp_readonly["presentacion"] == "on") { 

 ?>
<input type="hidden" name="presentacion" value="<?php echo $this->form_encode_input($presentacion) . "\">" . $presentacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_presentacion" class="sc-ui-readonly-presentacion css_presentacion_line" style="<?php echo $sStyleReadLab_presentacion; ?>"><?php echo $this->form_format_readonly("presentacion", $this->form_encode_input($this->presentacion)); ?></span><span id="id_read_off_presentacion" class="css_read_off_presentacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_presentacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_presentacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_presentacion" type=text name="presentacion" value="<?php echo $this->form_encode_input($presentacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_presentacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_presentacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_presentacion_dumb = ('' == $sStyleHidden_presentacion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_presentacion_dumb" style="<?php echo $sStyleHidden_presentacion_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['mensaje']))
    {
        $this->nm_new_label['mensaje'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mensaje = $this->mensaje;
   $sStyleHidden_mensaje = '';
   if (isset($this->nmgp_cmp_hidden['mensaje']) && $this->nmgp_cmp_hidden['mensaje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mensaje']);
       $sStyleHidden_mensaje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mensaje = 'display: none;';
   $sStyleReadInp_mensaje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mensaje']) && $this->nmgp_cmp_readonly['mensaje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mensaje']);
       $sStyleReadLab_mensaje = '';
       $sStyleReadInp_mensaje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mensaje']) && $this->nmgp_cmp_hidden['mensaje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mensaje" value="<?php echo $this->form_encode_input($mensaje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mensaje_line" id="hidden_field_data_mensaje" style="<?php echo $sStyleHidden_mensaje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mensaje_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mensaje_label" style=""><span id="id_label_mensaje"><?php echo $this->nm_new_label['mensaje']; ?></span></span><br><input type="hidden" name="mensaje" value="<?php echo $this->form_encode_input($mensaje); ?>"><span id="id_ajax_label_mensaje"><?php echo nl2br($mensaje); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mensaje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mensaje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_mensaje_dumb = ('' == $sStyleHidden_mensaje) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_mensaje_dumb" style="<?php echo $sStyleHidden_mensaje_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['colores']))
   {
       $this->nm_new_label['colores'] = "Color";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $colores = $this->colores;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   $nm_comando = "SELECT f.idcol, c.color  FROM colorxproducto f left join colores c on f.idcol=c.idcolores where idpr=$this->idpro ORDER BY f.idcol";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_colores'][] = '0'; 
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas where idpr=$this->idpro ORDER BY f.idta";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_tallas'][] = '0'; 
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas where idpr=$this->idpro and tallasabor='S' ORDER BY f.idsa";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_sabor'][] = '0'; 
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






<?php $sStyleHidden_sabor_dumb = ('' == $sStyleHidden_sabor) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_sabor_dumb" style="<?php echo $sStyleHidden_sabor_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['idbod']))
   {
       $this->nm_new_label['idbod'] = "Ubicación";
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

    <TD class="scFormDataOdd css_idbod_line" id="hidden_field_data_idbod" style="<?php echo $sStyleHidden_idbod; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idbod_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idbod_label" style=""><span id="id_label_idbod"><?php echo $this->nm_new_label['idbod']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['php_cmp_required']['idbod']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['php_cmp_required']['idbod'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idbod"]) &&  $this->nmgp_cmp_readonly["idbod"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idbod'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Destino") . "</option>" ; 
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
    if (!isset($this->nm_new_label['valorunit']))
    {
        $this->nm_new_label['valorunit'] = "Costo unitario";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valorunit']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valorunit']['format_pos'] || 3 == $this->field_config['valorunit']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorunit']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorunit']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorunit']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valorunit']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorunit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorunit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_valorunit_dumb = ('' == $sStyleHidden_valorunit) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valorunit_dumb" style="<?php echo $sStyleHidden_valorunit_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['valorpar']))
    {
        $this->nm_new_label['valorpar'] = "Subtotal";
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

    <TD class="scFormDataOdd css_valorpar_line" id="hidden_field_data_valorpar" style="<?php echo $sStyleHidden_valorpar; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorpar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valorpar_label" style=""><span id="id_label_valorpar"><?php echo $this->nm_new_label['valorpar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorpar"]) &&  $this->nmgp_cmp_readonly["valorpar"] == "on") { 

 ?>
<input type="hidden" name="valorpar" value="<?php echo $this->form_encode_input($valorpar) . "\">" . $valorpar . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorpar" class="sc-ui-readonly-valorpar css_valorpar_line" style="<?php echo $sStyleReadLab_valorpar; ?>"><?php echo $this->form_format_readonly("valorpar", $this->form_encode_input($this->valorpar)); ?></span><span id="id_read_off_valorpar" class="css_read_off_valorpar<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valorpar; ?>">
 <input class="sc-js-input scFormObjectOdd css_valorpar_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valorpar" type=text name="valorpar" value="<?php echo $this->form_encode_input($valorpar) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valorpar']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valorpar']['format_pos'] || 3 == $this->field_config['valorpar']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorpar']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorpar']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorpar']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valorpar']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorpar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorpar_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['iva'] = "Valor IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iva = $this->iva;
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

    <TD class="scFormDataOdd css_iva_line" id="hidden_field_data_iva" style="<?php echo $sStyleHidden_iva; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_iva_label" style=""><span id="id_label_iva"><?php echo $this->nm_new_label['iva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iva"]) &&  $this->nmgp_cmp_readonly["iva"] == "on") { 

 ?>
<input type="hidden" name="iva" value="<?php echo $this->form_encode_input($iva) . "\">" . $iva . ""; ?>
<?php } else { ?>
<span id="id_read_on_iva" class="sc-ui-readonly-iva css_iva_line" style="<?php echo $sStyleReadLab_iva; ?>"><?php echo $this->form_format_readonly("iva", $this->form_encode_input($this->iva)); ?></span><span id="id_read_off_iva" class="css_read_off_iva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_iva; ?>">
 <input class="sc-js-input scFormObjectOdd css_iva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_iva" type=text name="iva" value="<?php echo $this->form_encode_input($iva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['iva']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['iva']['format_pos'] || 3 == $this->field_config['iva']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 11, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['iva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['iva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['iva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['iva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tasaiva']))
    {
        $this->nm_new_label['tasaiva'] = "Tasa IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tasaiva = $this->tasaiva;
   $sStyleHidden_tasaiva = '';
   if (isset($this->nmgp_cmp_hidden['tasaiva']) && $this->nmgp_cmp_hidden['tasaiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tasaiva']);
       $sStyleHidden_tasaiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tasaiva = 'display: none;';
   $sStyleReadInp_tasaiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tasaiva']) && $this->nmgp_cmp_readonly['tasaiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tasaiva']);
       $sStyleReadLab_tasaiva = '';
       $sStyleReadInp_tasaiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tasaiva']) && $this->nmgp_cmp_hidden['tasaiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tasaiva" value="<?php echo $this->form_encode_input($tasaiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tasaiva_line" id="hidden_field_data_tasaiva" style="<?php echo $sStyleHidden_tasaiva; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tasaiva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tasaiva_label" style=""><span id="id_label_tasaiva"><?php echo $this->nm_new_label['tasaiva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tasaiva"]) &&  $this->nmgp_cmp_readonly["tasaiva"] == "on") { 

 ?>
<input type="hidden" name="tasaiva" value="<?php echo $this->form_encode_input($tasaiva) . "\">" . $tasaiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_tasaiva" class="sc-ui-readonly-tasaiva css_tasaiva_line" style="<?php echo $sStyleReadLab_tasaiva; ?>"><?php echo $this->form_format_readonly("tasaiva", $this->form_encode_input($this->tasaiva)); ?></span><span id="id_read_off_tasaiva" class="css_read_off_tasaiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tasaiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_tasaiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tasaiva" type=text name="tasaiva" value="<?php echo $this->form_encode_input($tasaiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tasaiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tasaiva']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tasaiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tasaiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tasaiva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_tasaiva_dumb = ('' == $sStyleHidden_tasaiva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tasaiva_dumb" style="<?php echo $sStyleHidden_tasaiva_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lote']))
    {
        $this->nm_new_label['lote'] = "Lote";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lote = $this->lote;
   $sStyleHidden_lote = '';
   if (isset($this->nmgp_cmp_hidden['lote']) && $this->nmgp_cmp_hidden['lote'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lote']);
       $sStyleHidden_lote = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lote = 'display: none;';
   $sStyleReadInp_lote = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lote']) && $this->nmgp_cmp_readonly['lote'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lote']);
       $sStyleReadLab_lote = '';
       $sStyleReadInp_lote = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lote']) && $this->nmgp_cmp_hidden['lote'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lote" value="<?php echo $this->form_encode_input($lote) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lote_line" id="hidden_field_data_lote" style="<?php echo $sStyleHidden_lote; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lote_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lote_label" style=""><span id="id_label_lote"><?php echo $this->nm_new_label['lote']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lote"]) &&  $this->nmgp_cmp_readonly["lote"] == "on") { 

 ?>
<input type="hidden" name="lote" value="<?php echo $this->form_encode_input($lote) . "\">" . $lote . ""; ?>
<?php } else { ?>
<span id="id_read_on_lote" class="sc-ui-readonly-lote css_lote_line" style="<?php echo $sStyleReadLab_lote; ?>"><?php echo $this->form_format_readonly("lote", $this->form_encode_input($this->lote)); ?></span><span id="id_read_off_lote" class="css_read_off_lote<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lote; ?>">
 <input class="sc-js-input scFormObjectOdd css_lote_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lote" type=text name="lote" value="<?php echo $this->form_encode_input($lote) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lote_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lote_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vencimiento']))
    {
        $this->nm_new_label['vencimiento'] = "Vence";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vencimiento = $this->vencimiento;
   $sStyleHidden_vencimiento = '';
   if (isset($this->nmgp_cmp_hidden['vencimiento']) && $this->nmgp_cmp_hidden['vencimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vencimiento']);
       $sStyleHidden_vencimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vencimiento = 'display: none;';
   $sStyleReadInp_vencimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vencimiento']) && $this->nmgp_cmp_readonly['vencimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vencimiento']);
       $sStyleReadLab_vencimiento = '';
       $sStyleReadInp_vencimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vencimiento']) && $this->nmgp_cmp_hidden['vencimiento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vencimiento" value="<?php echo $this->form_encode_input($vencimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vencimiento_line" id="hidden_field_data_vencimiento" style="<?php echo $sStyleHidden_vencimiento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vencimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vencimiento_label" style=""><span id="id_label_vencimiento"><?php echo $this->nm_new_label['vencimiento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vencimiento"]) &&  $this->nmgp_cmp_readonly["vencimiento"] == "on") { 

 ?>
<input type="hidden" name="vencimiento" value="<?php echo $this->form_encode_input($vencimiento) . "\">" . $vencimiento . ""; ?>
<?php } else { ?>
<span id="id_read_on_vencimiento" class="sc-ui-readonly-vencimiento css_vencimiento_line" style="<?php echo $sStyleReadLab_vencimiento; ?>"><?php echo $this->form_format_readonly("vencimiento", $this->form_encode_input($vencimiento)); ?></span><span id="id_read_off_vencimiento" class="css_read_off_vencimiento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vencimiento; ?>"><?php
$tmp_form_data = $this->field_config['vencimiento']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_vencimiento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_vencimiento" type=text name="vencimiento" value="<?php echo $this->form_encode_input($vencimiento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['vencimiento']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['vencimiento']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vencimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vencimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_vencimiento_dumb = ('' == $sStyleHidden_vencimiento) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_vencimiento_dumb" style="<?php echo $sStyleHidden_vencimiento_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idfaccom']))
    {
        $this->nm_new_label['idfaccom'] = "Idfaccom";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfaccom = $this->idfaccom;
   if (!isset($this->nmgp_cmp_hidden['idfaccom']))
   {
       $this->nmgp_cmp_hidden['idfaccom'] = 'off';
   }
   $sStyleHidden_idfaccom = '';
   if (isset($this->nmgp_cmp_hidden['idfaccom']) && $this->nmgp_cmp_hidden['idfaccom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfaccom']);
       $sStyleHidden_idfaccom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfaccom = 'display: none;';
   $sStyleReadInp_idfaccom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfaccom']) && $this->nmgp_cmp_readonly['idfaccom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfaccom']);
       $sStyleReadLab_idfaccom = '';
       $sStyleReadInp_idfaccom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfaccom']) && $this->nmgp_cmp_hidden['idfaccom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idfaccom" value="<?php echo $this->form_encode_input($idfaccom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idfaccom_line" id="hidden_field_data_idfaccom" style="<?php echo $sStyleHidden_idfaccom; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfaccom_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfaccom_label" style=""><span id="id_label_idfaccom"><?php echo $this->nm_new_label['idfaccom']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['php_cmp_required']['idfaccom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['php_cmp_required']['idfaccom'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfaccom"]) &&  $this->nmgp_cmp_readonly["idfaccom"] == "on") { 

 ?>
<input type="hidden" name="idfaccom" value="<?php echo $this->form_encode_input($idfaccom) . "\">" . $idfaccom . ""; ?>
<?php } else { ?>
<span id="id_read_on_idfaccom" class="sc-ui-readonly-idfaccom css_idfaccom_line" style="<?php echo $sStyleReadLab_idfaccom; ?>"><?php echo $this->form_format_readonly("idfaccom", $this->form_encode_input($this->idfaccom)); ?></span><span id="id_read_off_idfaccom" class="css_read_off_idfaccom<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idfaccom; ?>">
 <input class="sc-js-input scFormObjectOdd css_idfaccom_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idfaccom" type=text name="idfaccom" value="<?php echo $this->form_encode_input($idfaccom) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idfaccom']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idfaccom']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idfaccom']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfaccom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfaccom_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['descuento'] = "Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descuento = $this->descuento;
   if (!isset($this->nmgp_cmp_hidden['descuento']))
   {
       $this->nmgp_cmp_hidden['descuento'] = 'off';
   }
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

    <TD class="scFormDataOdd css_descuento_line" id="hidden_field_data_descuento" style="<?php echo $sStyleHidden_descuento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descuento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descuento_label" style=""><span id="id_label_descuento"><?php echo $this->nm_new_label['descuento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descuento"]) &&  $this->nmgp_cmp_readonly["descuento"] == "on") { 

 ?>
<input type="hidden" name="descuento" value="<?php echo $this->form_encode_input($descuento) . "\">" . $descuento . ""; ?>
<?php } else { ?>
<span id="id_read_on_descuento" class="sc-ui-readonly-descuento css_descuento_line" style="<?php echo $sStyleReadLab_descuento; ?>"><?php echo $this->form_format_readonly("descuento", $this->form_encode_input($this->descuento)); ?></span><span id="id_read_off_descuento" class="css_read_off_descuento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descuento; ?>">
 <input class="sc-js-input scFormObjectOdd css_descuento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descuento" type=text name="descuento" value="<?php echo $this->form_encode_input($descuento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['descuento']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['descuento']['format_pos'] || 3 == $this->field_config['descuento']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 6, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descuento']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descuento']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descuento']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descuento']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descuento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descuento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tasadesc']))
    {
        $this->nm_new_label['tasadesc'] = "Tasadesc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tasadesc = $this->tasadesc;
   if (!isset($this->nmgp_cmp_hidden['tasadesc']))
   {
       $this->nmgp_cmp_hidden['tasadesc'] = 'off';
   }
   $sStyleHidden_tasadesc = '';
   if (isset($this->nmgp_cmp_hidden['tasadesc']) && $this->nmgp_cmp_hidden['tasadesc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tasadesc']);
       $sStyleHidden_tasadesc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tasadesc = 'display: none;';
   $sStyleReadInp_tasadesc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tasadesc']) && $this->nmgp_cmp_readonly['tasadesc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tasadesc']);
       $sStyleReadLab_tasadesc = '';
       $sStyleReadInp_tasadesc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tasadesc']) && $this->nmgp_cmp_hidden['tasadesc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tasadesc" value="<?php echo $this->form_encode_input($tasadesc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tasadesc_line" id="hidden_field_data_tasadesc" style="<?php echo $sStyleHidden_tasadesc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tasadesc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tasadesc_label" style=""><span id="id_label_tasadesc"><?php echo $this->nm_new_label['tasadesc']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tasadesc"]) &&  $this->nmgp_cmp_readonly["tasadesc"] == "on") { 

 ?>
<input type="hidden" name="tasadesc" value="<?php echo $this->form_encode_input($tasadesc) . "\">" . $tasadesc . ""; ?>
<?php } else { ?>
<span id="id_read_on_tasadesc" class="sc-ui-readonly-tasadesc css_tasadesc_line" style="<?php echo $sStyleReadLab_tasadesc; ?>"><?php echo $this->form_format_readonly("tasadesc", $this->form_encode_input($this->tasadesc)); ?></span><span id="id_read_off_tasadesc" class="css_read_off_tasadesc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tasadesc; ?>">
 <input class="sc-js-input scFormObjectOdd css_tasadesc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tasadesc" type=text name="tasadesc" value="<?php echo $this->form_encode_input($tasadesc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tasadesc']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tasadesc']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tasadesc']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tasadesc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tasadesc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['devuelto']))
    {
        $this->nm_new_label['devuelto'] = "Devuelto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $devuelto = $this->devuelto;
   if (!isset($this->nmgp_cmp_hidden['devuelto']))
   {
       $this->nmgp_cmp_hidden['devuelto'] = 'off';
   }
   $sStyleHidden_devuelto = '';
   if (isset($this->nmgp_cmp_hidden['devuelto']) && $this->nmgp_cmp_hidden['devuelto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['devuelto']);
       $sStyleHidden_devuelto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_devuelto = 'display: none;';
   $sStyleReadInp_devuelto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['devuelto']) && $this->nmgp_cmp_readonly['devuelto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['devuelto']);
       $sStyleReadLab_devuelto = '';
       $sStyleReadInp_devuelto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['devuelto']) && $this->nmgp_cmp_hidden['devuelto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="devuelto" value="<?php echo $this->form_encode_input($devuelto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_devuelto_line" id="hidden_field_data_devuelto" style="<?php echo $sStyleHidden_devuelto; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_devuelto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_devuelto_label" style=""><span id="id_label_devuelto"><?php echo $this->nm_new_label['devuelto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["devuelto"]) &&  $this->nmgp_cmp_readonly["devuelto"] == "on") { 

 ?>
<input type="hidden" name="devuelto" value="<?php echo $this->form_encode_input($devuelto) . "\">" . $devuelto . ""; ?>
<?php } else { ?>
<span id="id_read_on_devuelto" class="sc-ui-readonly-devuelto css_devuelto_line" style="<?php echo $sStyleReadLab_devuelto; ?>"><?php echo $this->form_format_readonly("devuelto", $this->form_encode_input($this->devuelto)); ?></span><span id="id_read_off_devuelto" class="css_read_off_devuelto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_devuelto; ?>">
 <input class="sc-js-input scFormObjectOdd css_devuelto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_devuelto" type=text name="devuelto" value="<?php echo $this->form_encode_input($devuelto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['devuelto']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['devuelto']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['devuelto']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_devuelto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_devuelto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idpro']))
   {
       $this->nm_new_label['idpro'] = "Producto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpro = $this->idpro;
   if (!isset($this->nmgp_cmp_hidden['idpro']))
   {
       $this->nmgp_cmp_hidden['idpro'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['idpro']) && $this->nmgp_cmp_hidden['idpro'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idpro" value="<?php echo $this->form_encode_input($this->idpro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpro_line" id="hidden_field_data_idpro" style="<?php echo $sStyleHidden_idpro; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpro_label" style=""><span id="id_label_idpro"><?php echo $this->nm_new_label['idpro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro"]) &&  $this->nmgp_cmp_readonly["idpro"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_vencimiento = $this->vencimiento;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_descuento = $this->descuento;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_vencimiento = $this->vencimiento;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro)  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro  FROM productos  ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro  FROM productos  ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->tasaiva = $old_value_tasaiva;
   $this->vencimiento = $old_value_vencimiento;
   $this->idfaccom = $old_value_idfaccom;
   $this->descuento = $old_value_descuento;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro'][] = $rs->fields[0];
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
   $idpro_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpro_1))
          {
              foreach ($this->idpro_1 as $tmp_idpro)
              {
                  if (trim($tmp_idpro) === trim($cadaselect[1])) { $idpro_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpro) === trim($cadaselect[1])) { $idpro_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idpro" value="<?php echo $this->form_encode_input($idpro) . "\">" . $idpro_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idpro();
   $x = 0 ; 
   $idpro_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpro_1))
          {
              foreach ($this->idpro_1 as $tmp_idpro)
              {
                  if (trim($tmp_idpro) === trim($cadaselect[1])) { $idpro_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpro) === trim($cadaselect[1])) { $idpro_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idpro_look))
          {
              $idpro_look = $this->idpro;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idpro\" class=\"css_idpro_line\" style=\"" .  $sStyleReadLab_idpro . "\">" . $this->form_format_readonly("idpro", $this->form_encode_input($idpro_look)) . "</span><span id=\"id_read_off_idpro\" class=\"css_read_off_idpro" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idpro . "\">";
   echo " <span id=\"idAjaxSelect_idpro\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idpro_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idpro\" name=\"idpro\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['Lookup_idpro'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione producto") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idpro) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idpro)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['back'];
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
        $buttonMacroDisabled = 'sc-unique-btn-29';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-30';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("detallecompra2_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("detallecompra2_mob");
 parent.scAjaxDetailHeight("detallecompra2_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("detallecompra2_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("detallecompra2_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['sc_modal'])
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-18").length && $("#sc_b_upd_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-18").hasClass("disabled")) {
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
		if ($("#sc_b_del_t.sc-unique-btn-19").length && $("#sc_b_del_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-19").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-22").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-23").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-25").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-26").length && $("#sc_b_sai_t.sc-unique-btn-26").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-26").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-27").length && $("#sc_b_ini_b.sc-unique-btn-27").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-27").hasClass("disabled")) {
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
		if ($("#sc_b_ret_b.sc-unique-btn-28").length && $("#sc_b_ret_b.sc-unique-btn-28").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-28").hasClass("disabled")) {
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
		if ($("#sc_b_avc_b.sc-unique-btn-29").length && $("#sc_b_avc_b.sc-unique-btn-29").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-29").hasClass("disabled")) {
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
		if ($("#sc_b_fim_b.sc-unique-btn-30").length && $("#sc_b_fim_b.sc-unique-btn-30").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-30").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-20").length && $("#sys_separator.sc-unique-btn-20").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-21").length && $("#sc_b_clone_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-21").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
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
$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra2_mob']['buttonStatus'] = $this->nmgp_botoes;
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
