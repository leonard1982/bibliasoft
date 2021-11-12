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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Pagos a terceros"); } else { echo strip_tags("Pagos a terceros"); } ?></TITLE>
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
.css_read_off_fecpago button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_creado button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_actualizado button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_hacerpagos/form_hacerpagos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_hacerpagos_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['last'] : 'off'); ?>";
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

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
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
     if (F_name == "asent")
     {
        $('select[name="asent"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="asent"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="asent"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_hacerpagos_mob_jquery.php');

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
  scFocusField('ncuenta_tercero');

<?php
}
?>
  $("#hidden_bloco_1,#hidden_bloco_2,#hidden_bloco_4,#hidden_bloco_5").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

  sc_form_onload();

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
    "hidden_bloco_1": true,
    "hidden_bloco_2": true,
    "hidden_bloco_4": true,
    "hidden_bloco_5": true
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
    if ("hidden_bloco_6" == block_id) {
      scAjaxDetailHeight("form_detallepagos_terceros", $($("#nmsc_iframe_liga_form_detallepagos_terceros")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_7" == block_id) {
      scAjaxDetailHeight("grid_gestor_archivos_ce", "500");
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
$str_iframe_body = 'margin-top: .5px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_hacerpagos']['error_buffer']) && '' != $_SESSION['scriptcase']['form_hacerpagos']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_hacerpagos']['error_buffer'];
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
 include_once("form_hacerpagos_mob_js0.php");
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
               action="form_hacerpagos_mob.php" 
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_hacerpagos_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_hacerpagos_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['fast_search'][2] : "";
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['group_group_2']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['group_group_2']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['group_group_2']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['group_group_2']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['group_group_2'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label'][''];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['copy']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['copy']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['copy']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['copy']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['copy'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['btn_label']['exit'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_hacerpagos_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_hacerpagos_mob_form0' => array(
            'title' => "Datos",
            'class' => $nmgp_num_form == "form_hacerpagos_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_hacerpagos_mob_form1' => array(
            'title' => "Soportes",
            'class' => $nmgp_num_form == "form_hacerpagos_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Datos' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_hacerpagos_mob_form0']['class'] = 'scTabInactive';
                        }
                        if ('Soportes' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_hacerpagos_mob_form1']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["form_hacerpagos_mob_form0"]['class'];
?>
   <li id="id_form_hacerpagos_mob_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_hacerpagos_mob_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__document_edit_32.png" align="absmiddle">
     Datos
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_hacerpagos_mob_form1"]['class'];
?>
   <li id="id_form_hacerpagos_mob_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_hacerpagos_mob_form1')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__document_attachment_32.png" align="absmiddle">
     Soportes
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_hacerpagos_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idpago']))
   {
       $this->nmgp_cmp_hidden['idpago'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['iddocapagar']))
   {
       $this->nmgp_cmp_hidden['iddocapagar'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['conc']))
   {
       $this->nmgp_cmp_hidden['conc'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['cod_cuenta']))
   {
       $this->nmgp_cmp_hidden['cod_cuenta'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['total_cuenta']))
   {
       $this->nmgp_cmp_hidden['total_cuenta'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numpago']))
    {
        $this->nm_new_label['numpago'] = "COMPROBANTE EGRESO:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numpago = $this->numpago;
   $sStyleHidden_numpago = '';
   if (isset($this->nmgp_cmp_hidden['numpago']) && $this->nmgp_cmp_hidden['numpago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numpago']);
       $sStyleHidden_numpago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numpago = 'display: none;';
   $sStyleReadInp_numpago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numpago']) && $this->nmgp_cmp_readonly['numpago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numpago']);
       $sStyleReadLab_numpago = '';
       $sStyleReadInp_numpago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numpago']) && $this->nmgp_cmp_hidden['numpago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numpago" value="<?php echo $this->form_encode_input($numpago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_numpago_line" id="hidden_field_data_numpago" style="<?php echo $sStyleHidden_numpago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numpago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numpago_label" style=""><span id="id_label_numpago"><?php echo $this->nm_new_label['numpago']; ?></span></span><br><span id="id_read_on_numpago" class="css_numpago_line" style="<?php echo $sStyleReadLab_numpago; ?>"><?php echo $this->form_format_readonly("numpago", $this->form_encode_input($this->numpago)); ?></span><span id="id_read_off_numpago" class="css_read_off_numpago" style="<?php echo $sStyleReadInp_numpago; ?>"><input type="hidden" name="numpago" value="<?php echo $this->form_encode_input($numpago) . "\">"?><span id="id_ajax_label_numpago"><?php echo nl2br($numpago); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numpago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numpago_text"></span></td></tr></table></td></tr></table> </TD>
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
    if (!isset($this->nm_new_label['titulo']))
    {
        $this->nm_new_label['titulo'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $titulo = $this->titulo;
   $sStyleHidden_titulo = '';
   if (isset($this->nmgp_cmp_hidden['titulo']) && $this->nmgp_cmp_hidden['titulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['titulo']);
       $sStyleHidden_titulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_titulo = 'display: none;';
   $sStyleReadInp_titulo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['titulo']) && $this->nmgp_cmp_readonly['titulo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['titulo']);
       $sStyleReadLab_titulo = '';
       $sStyleReadInp_titulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['titulo']) && $this->nmgp_cmp_hidden['titulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="titulo" value="<?php echo $this->form_encode_input($titulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_titulo_line" id="hidden_field_data_titulo" style="<?php echo $sStyleHidden_titulo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_titulo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_titulo_label" style=""><span id="id_label_titulo"><?php echo $this->nm_new_label['titulo']; ?></span></span><br><input type="hidden" name="titulo" value="<?php echo $this->form_encode_input($titulo); ?>"><span id="id_ajax_label_titulo"><?php echo nl2br($titulo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_titulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_titulo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_cuenta']))
    {
        $this->nm_new_label['cod_cuenta'] = "Cod Cuenta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_cuenta = $this->cod_cuenta;
   if (!isset($this->nmgp_cmp_hidden['cod_cuenta']))
   {
       $this->nmgp_cmp_hidden['cod_cuenta'] = 'off';
   }
   $sStyleHidden_cod_cuenta = '';
   if (isset($this->nmgp_cmp_hidden['cod_cuenta']) && $this->nmgp_cmp_hidden['cod_cuenta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_cuenta']);
       $sStyleHidden_cod_cuenta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_cuenta = 'display: none;';
   $sStyleReadInp_cod_cuenta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_cuenta']) && $this->nmgp_cmp_readonly['cod_cuenta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_cuenta']);
       $sStyleReadLab_cod_cuenta = '';
       $sStyleReadInp_cod_cuenta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_cuenta']) && $this->nmgp_cmp_hidden['cod_cuenta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_cuenta" value="<?php echo $this->form_encode_input($cod_cuenta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_cuenta_line" id="hidden_field_data_cod_cuenta" style="<?php echo $sStyleHidden_cod_cuenta; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_cuenta_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_cuenta_label" style=""><span id="id_label_cod_cuenta"><?php echo $this->nm_new_label['cod_cuenta']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_cuenta"]) &&  $this->nmgp_cmp_readonly["cod_cuenta"] == "on") { 

 ?>
<input type="hidden" name="cod_cuenta" value="<?php echo $this->form_encode_input($cod_cuenta) . "\">" . $cod_cuenta . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_cuenta" class="sc-ui-readonly-cod_cuenta css_cod_cuenta_line" style="<?php echo $sStyleReadLab_cod_cuenta; ?>"><?php echo $this->form_format_readonly("cod_cuenta", $this->form_encode_input($this->cod_cuenta)); ?></span><span id="id_read_off_cod_cuenta" class="css_read_off_cod_cuenta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_cuenta; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_cuenta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_cuenta" type=text name="cod_cuenta" value="<?php echo $this->form_encode_input($cod_cuenta) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_cuenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_cuenta_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_cod_cuenta_dumb = ('' == $sStyleHidden_cod_cuenta) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cod_cuenta_dumb" style="<?php echo $sStyleHidden_cod_cuenta_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Cuenta o Factura a Pagar<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ncuenta_tercero']))
    {
        $this->nm_new_label['ncuenta_tercero'] = "Cuenta a pagar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ncuenta_tercero = $this->ncuenta_tercero;
   $sStyleHidden_ncuenta_tercero = '';
   if (isset($this->nmgp_cmp_hidden['ncuenta_tercero']) && $this->nmgp_cmp_hidden['ncuenta_tercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ncuenta_tercero']);
       $sStyleHidden_ncuenta_tercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ncuenta_tercero = 'display: none;';
   $sStyleReadInp_ncuenta_tercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ncuenta_tercero']) && $this->nmgp_cmp_readonly['ncuenta_tercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ncuenta_tercero']);
       $sStyleReadLab_ncuenta_tercero = '';
       $sStyleReadInp_ncuenta_tercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ncuenta_tercero']) && $this->nmgp_cmp_hidden['ncuenta_tercero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ncuenta_tercero" value="<?php echo $this->form_encode_input($ncuenta_tercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ncuenta_tercero_line" id="hidden_field_data_ncuenta_tercero" style="<?php echo $sStyleHidden_ncuenta_tercero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ncuenta_tercero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ncuenta_tercero_label" style=""><span id="id_label_ncuenta_tercero"><?php echo $this->nm_new_label['ncuenta_tercero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ncuenta_tercero"]) &&  $this->nmgp_cmp_readonly["ncuenta_tercero"] == "on") { 

 ?>
<input type="hidden" name="ncuenta_tercero" value="<?php echo $this->form_encode_input($ncuenta_tercero) . "\">" . $ncuenta_tercero . ""; ?>
<?php } else { ?>
<span id="id_read_on_ncuenta_tercero" class="sc-ui-readonly-ncuenta_tercero css_ncuenta_tercero_line" style="<?php echo $sStyleReadLab_ncuenta_tercero; ?>"><?php echo $this->form_format_readonly("ncuenta_tercero", $this->form_encode_input($this->ncuenta_tercero)); ?></span><span id="id_read_off_ncuenta_tercero" class="css_read_off_ncuenta_tercero<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ncuenta_tercero; ?>">
 <input class="sc-js-input scFormObjectOdd css_ncuenta_tercero_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ncuenta_tercero" type=text name="ncuenta_tercero" value="<?php echo $this->form_encode_input($ncuenta_tercero) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_hacerpagos_mob*scout' : '';
   if (isset($this->Ini->sc_lig_md5["form_hacerpagos_seleccionar_cuenta"]) && $this->Ini->sc_lig_md5["form_hacerpagos_seleccionar_cuenta"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,ncuenta_tercero,nro*scoutnm_evt_ret_busca*scinsc_form_hacerpagos_ncuenta_tercero_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,ncuenta_tercero,nro*scoutnm_evt_ret_busca*scinsc_form_hacerpagos_ncuenta_tercero_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_form_hacerpagos_seleccionar_cuenta_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_hacerpagos_seleccionar_cuenta_cons_psq. "', '" . $Md5_Lig . "')", "cap_ncuenta_tercero", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ncuenta_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ncuenta_tercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['docapagar']))
    {
        $this->nm_new_label['docapagar'] = "Factura de Compra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $docapagar = $this->docapagar;
   $sStyleHidden_docapagar = '';
   if (isset($this->nmgp_cmp_hidden['docapagar']) && $this->nmgp_cmp_hidden['docapagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['docapagar']);
       $sStyleHidden_docapagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_docapagar = 'display: none;';
   $sStyleReadInp_docapagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['docapagar']) && $this->nmgp_cmp_readonly['docapagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['docapagar']);
       $sStyleReadLab_docapagar = '';
       $sStyleReadInp_docapagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['docapagar']) && $this->nmgp_cmp_hidden['docapagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="docapagar" value="<?php echo $this->form_encode_input($docapagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_docapagar_line" id="hidden_field_data_docapagar" style="<?php echo $sStyleHidden_docapagar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_docapagar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_docapagar_label" style=""><span id="id_label_docapagar"><?php echo $this->nm_new_label['docapagar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["docapagar"]) &&  $this->nmgp_cmp_readonly["docapagar"] == "on") { 

 ?>
<input type="hidden" name="docapagar" value="<?php echo $this->form_encode_input($docapagar) . "\">" . $docapagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_docapagar" class="sc-ui-readonly-docapagar css_docapagar_line" style="<?php echo $sStyleReadLab_docapagar; ?>"><?php echo $this->form_format_readonly("docapagar", $this->form_encode_input($this->docapagar)); ?></span><span id="id_read_off_docapagar" class="css_read_off_docapagar<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_docapagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_docapagar_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_docapagar" type=text name="docapagar" value="<?php echo $this->form_encode_input($docapagar) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_hacerpagos_mob*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_cuentaspagar_contado_seleccionar"]) && $this->Ini->sc_lig_md5["grid_cuentaspagar_contado_seleccionar"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,docapagar,seleccion*scoutnm_evt_ret_busca*scinsc_form_hacerpagos_docapagar_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,docapagar,seleccion*scoutnm_evt_ret_busca*scinsc_form_hacerpagos_docapagar_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_cuentaspagar_contado_seleccionar_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_cuentaspagar_contado_seleccionar_cons_psq. "', '" . $Md5_Lig . "')", "cap_docapagar", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_docapagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_docapagar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_docapagar_dumb = ('' == $sStyleHidden_docapagar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_docapagar_dumb" style="<?php echo $sStyleHidden_docapagar_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos generales<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecpago']))
    {
        $this->nm_new_label['fecpago'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecpago = $this->fecpago;
   $sStyleHidden_fecpago = '';
   if (isset($this->nmgp_cmp_hidden['fecpago']) && $this->nmgp_cmp_hidden['fecpago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecpago']);
       $sStyleHidden_fecpago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecpago = 'display: none;';
   $sStyleReadInp_fecpago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecpago']) && $this->nmgp_cmp_readonly['fecpago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecpago']);
       $sStyleReadLab_fecpago = '';
       $sStyleReadInp_fecpago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecpago']) && $this->nmgp_cmp_hidden['fecpago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecpago" value="<?php echo $this->form_encode_input($fecpago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecpago_line" id="hidden_field_data_fecpago" style="<?php echo $sStyleHidden_fecpago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecpago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecpago_label" style=""><span id="id_label_fecpago"><?php echo $this->nm_new_label['fecpago']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['fecpago']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['fecpago'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecpago"]) &&  $this->nmgp_cmp_readonly["fecpago"] == "on") { 

 ?>
<input type="hidden" name="fecpago" value="<?php echo $this->form_encode_input($fecpago) . "\">" . $fecpago . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecpago" class="sc-ui-readonly-fecpago css_fecpago_line" style="<?php echo $sStyleReadLab_fecpago; ?>"><?php echo $this->form_format_readonly("fecpago", $this->form_encode_input($fecpago)); ?></span><span id="id_read_off_fecpago" class="css_read_off_fecpago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecpago; ?>"><?php
$tmp_form_data = $this->field_config['fecpago']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecpago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecpago" type=text name="fecpago" value="<?php echo $this->form_encode_input($fecpago) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecpago']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecpago']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecpago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecpago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['client']))
   {
       $this->nm_new_label['client'] = "Tercero";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $client = $this->client;
   $sStyleHidden_client = '';
   if (isset($this->nmgp_cmp_hidden['client']) && $this->nmgp_cmp_hidden['client'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['client']);
       $sStyleHidden_client = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_client = 'display: none;';
   $sStyleReadInp_client = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['client']) && $this->nmgp_cmp_readonly['client'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['client']);
       $sStyleReadLab_client = '';
       $sStyleReadInp_client = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['client']) && $this->nmgp_cmp_hidden['client'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="client" value="<?php echo $this->form_encode_input($this->client) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_client_line" id="hidden_field_data_client" style="<?php echo $sStyleHidden_client; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_client_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_client_label" style=""><span id="id_label_client"><?php echo $this->nm_new_label['client']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['client']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['client'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["client"]) &&  $this->nmgp_cmp_readonly["client"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idtercero, concat(documento, ' - ',nombres)  FROM terceros  ORDER BY nombres, documento";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client'][] = $rs->fields[0];
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
   $client_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->client_1))
          {
              foreach ($this->client_1 as $tmp_client)
              {
                  if (trim($tmp_client) === trim($cadaselect[1])) { $client_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->client) === trim($cadaselect[1])) { $client_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="client" value="<?php echo $this->form_encode_input($client) . "\">" . $client_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_client();
   $x = 0 ; 
   $client_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->client_1))
          {
              foreach ($this->client_1 as $tmp_client)
              {
                  if (trim($tmp_client) === trim($cadaselect[1])) { $client_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->client) === trim($cadaselect[1])) { $client_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($client_look))
          {
              $client_look = $this->client;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_client\" class=\"css_client_line\" style=\"" .  $sStyleReadLab_client . "\">" . $this->form_format_readonly("client", $this->form_encode_input($client_look)) . "</span><span id=\"id_read_off_client\" class=\"css_read_off_client" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_client . "\">";
   echo " <span id=\"idAjaxSelect_client\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_client_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_client\" name=\"client\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_client'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->client) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->client)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_client_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_client_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['banco']))
   {
       $this->nm_new_label['banco'] = "Caja N°";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banco = $this->banco;
   $sStyleHidden_banco = '';
   if (isset($this->nmgp_cmp_hidden['banco']) && $this->nmgp_cmp_hidden['banco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banco']);
       $sStyleHidden_banco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banco = 'display: none;';
   $sStyleReadInp_banco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banco']) && $this->nmgp_cmp_readonly['banco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banco']);
       $sStyleReadLab_banco = '';
       $sStyleReadInp_banco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banco']) && $this->nmgp_cmp_hidden['banco'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="banco" value="<?php echo $this->form_encode_input($this->banco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_banco_line" id="hidden_field_data_banco" style="<?php echo $sStyleHidden_banco; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_banco_label" style=""><span id="id_label_banco"><?php echo $this->nm_new_label['banco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco"]) &&  $this->nmgp_cmp_readonly["banco"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_banco'][] = $rs->fields[0];
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
   $banco_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->banco_1))
          {
              foreach ($this->banco_1 as $tmp_banco)
              {
                  if (trim($tmp_banco) === trim($cadaselect[1])) { $banco_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->banco) === trim($cadaselect[1])) { $banco_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="banco" value="<?php echo $this->form_encode_input($banco) . "\">" . $banco_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_banco();
   $x = 0 ; 
   $banco_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->banco_1))
          {
              foreach ($this->banco_1 as $tmp_banco)
              {
                  if (trim($tmp_banco) === trim($cadaselect[1])) { $banco_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->banco) === trim($cadaselect[1])) { $banco_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($banco_look))
          {
              $banco_look = $this->banco;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_banco\" class=\"css_banco_line\" style=\"" .  $sStyleReadLab_banco . "\">" . $this->form_format_readonly("banco", $this->form_encode_input($banco_look)) . "</span><span id=\"id_read_off_banco\" class=\"css_read_off_banco" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_banco . "\">";
   echo " <span id=\"idAjaxSelect_banco\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_banco_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_banco\" name=\"banco\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->banco) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->banco)) 
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
   if (isset($this->Ini->sc_lig_md5["form_bancos"]) && $this->Ini->sc_lig_md5["form_bancos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_banco*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_banco*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_banco", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_bancos_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_mob&KeepThis=true&TB_iframe=true&height=400&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['asent']))
   {
       $this->nm_new_label['asent'] = "Asentar";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asent = $this->asent;
   $sStyleHidden_asent = '';
   if (isset($this->nmgp_cmp_hidden['asent']) && $this->nmgp_cmp_hidden['asent'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asent']);
       $sStyleHidden_asent = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asent = 'display: none;';
   $sStyleReadInp_asent = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asent']) && $this->nmgp_cmp_readonly['asent'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asent']);
       $sStyleReadLab_asent = '';
       $sStyleReadInp_asent = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asent']) && $this->nmgp_cmp_hidden['asent'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="asent" value="<?php echo $this->form_encode_input($this->asent) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_asent_line" id="hidden_field_data_asent" style="<?php echo $sStyleHidden_asent; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asent_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_asent_label" style=""><span id="id_label_asent"><?php echo $this->nm_new_label['asent']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asent"]) &&  $this->nmgp_cmp_readonly["asent"] == "on") { 

$asent_look = "";
 if ($this->asent == "NO") { $asent_look .= "NO" ;} 
 if ($this->asent == "SI") { $asent_look .= "SI" ;} 
 if (empty($asent_look)) { $asent_look = $this->asent; }
?>
<input type="hidden" name="asent" value="<?php echo $this->form_encode_input($asent) . "\">" . $asent_look . ""; ?>
<?php } else { ?>
<?php

$asent_look = "";
 if ($this->asent == "NO") { $asent_look .= "NO" ;} 
 if ($this->asent == "SI") { $asent_look .= "SI" ;} 
 if (empty($asent_look)) { $asent_look = $this->asent; }
?>
<span id="id_read_on_asent" class="css_asent_line"  style="<?php echo $sStyleReadLab_asent; ?>"><?php echo $this->form_format_readonly("asent", $this->form_encode_input($asent_look)); ?></span><span id="id_read_off_asent" class="css_read_off_asent<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_asent; ?>">
 <span id="idAjaxSelect_asent" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_asent_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_asent" name="asent" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NO" <?php  if ($this->asent == "NO") { echo " selected" ;} ?><?php  if (empty($this->asent)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_asent'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->asent == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_asent'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asent_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asent_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_asent_dumb = ('' == $sStyleHidden_asent) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_asent_dumb" style="<?php echo $sStyleHidden_asent_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['valor_base']))
    {
        $this->nm_new_label['valor_base'] = "Base";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_base = $this->valor_base;
   $sStyleHidden_valor_base = '';
   if (isset($this->nmgp_cmp_hidden['valor_base']) && $this->nmgp_cmp_hidden['valor_base'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_base']);
       $sStyleHidden_valor_base = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_base = 'display: none;';
   $sStyleReadInp_valor_base = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_base']) && $this->nmgp_cmp_readonly['valor_base'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_base']);
       $sStyleReadLab_valor_base = '';
       $sStyleReadInp_valor_base = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_base']) && $this->nmgp_cmp_hidden['valor_base'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_base" value="<?php echo $this->form_encode_input($valor_base) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_base_line" id="hidden_field_data_valor_base" style="<?php echo $sStyleHidden_valor_base; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_base_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_base_label" style=""><span id="id_label_valor_base"><?php echo $this->nm_new_label['valor_base']; ?></span></span><br><input type="hidden" name="valor_base" value="<?php echo $this->form_encode_input($valor_base); ?>"><span id="id_ajax_label_valor_base"><?php echo nl2br($valor_base); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_base_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_base_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_iva']))
    {
        $this->nm_new_label['valor_iva'] = "IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_iva = $this->valor_iva;
   $sStyleHidden_valor_iva = '';
   if (isset($this->nmgp_cmp_hidden['valor_iva']) && $this->nmgp_cmp_hidden['valor_iva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_iva']);
       $sStyleHidden_valor_iva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_iva = 'display: none;';
   $sStyleReadInp_valor_iva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_iva']) && $this->nmgp_cmp_readonly['valor_iva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_iva']);
       $sStyleReadLab_valor_iva = '';
       $sStyleReadInp_valor_iva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_iva']) && $this->nmgp_cmp_hidden['valor_iva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_iva" value="<?php echo $this->form_encode_input($valor_iva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_iva_line" id="hidden_field_data_valor_iva" style="<?php echo $sStyleHidden_valor_iva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_iva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_iva_label" style=""><span id="id_label_valor_iva"><?php echo $this->nm_new_label['valor_iva']; ?></span></span><br><input type="hidden" name="valor_iva" value="<?php echo $this->form_encode_input($valor_iva); ?>"><span id="id_ajax_label_valor_iva"><?php echo nl2br($valor_iva); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_iva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_iva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['montocan']))
    {
        $this->nm_new_label['montocan'] = "Valor Pagado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $montocan = $this->montocan;
   $sStyleHidden_montocan = '';
   if (isset($this->nmgp_cmp_hidden['montocan']) && $this->nmgp_cmp_hidden['montocan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['montocan']);
       $sStyleHidden_montocan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_montocan = 'display: none;';
   $sStyleReadInp_montocan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['montocan']) && $this->nmgp_cmp_readonly['montocan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['montocan']);
       $sStyleReadLab_montocan = '';
       $sStyleReadInp_montocan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['montocan']) && $this->nmgp_cmp_hidden['montocan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="montocan" value="<?php echo $this->form_encode_input($montocan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_montocan_line" id="hidden_field_data_montocan" style="<?php echo $sStyleHidden_montocan; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_montocan_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_montocan_label" style=""><span id="id_label_montocan"><?php echo $this->nm_new_label['montocan']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['montocan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['montocan'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="montocan" value="<?php echo $this->form_encode_input($montocan); ?>"><span id="id_ajax_label_montocan"><?php echo nl2br($montocan); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_montocan_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_montocan_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldodocumento']))
    {
        $this->nm_new_label['saldodocumento'] = "Saldo documento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldodocumento = $this->saldodocumento;
   $sStyleHidden_saldodocumento = '';
   if (isset($this->nmgp_cmp_hidden['saldodocumento']) && $this->nmgp_cmp_hidden['saldodocumento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldodocumento']);
       $sStyleHidden_saldodocumento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldodocumento = 'display: none;';
   $sStyleReadInp_saldodocumento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldodocumento']) && $this->nmgp_cmp_readonly['saldodocumento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldodocumento']);
       $sStyleReadLab_saldodocumento = '';
       $sStyleReadInp_saldodocumento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldodocumento']) && $this->nmgp_cmp_hidden['saldodocumento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldodocumento" value="<?php echo $this->form_encode_input($saldodocumento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldodocumento_line" id="hidden_field_data_saldodocumento" style="<?php echo $sStyleHidden_saldodocumento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldodocumento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldodocumento_label" style=""><span id="id_label_saldodocumento"><?php echo $this->nm_new_label['saldodocumento']; ?></span></span><br><input type="hidden" name="saldodocumento" value="<?php echo $this->form_encode_input($saldodocumento); ?>"><span id="id_ajax_label_saldodocumento"><?php echo nl2br($saldodocumento); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldodocumento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldodocumento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valpagar']))
    {
        $this->nm_new_label['valpagar'] = "Valor a Pagar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valpagar = $this->valpagar;
   $sStyleHidden_valpagar = '';
   if (isset($this->nmgp_cmp_hidden['valpagar']) && $this->nmgp_cmp_hidden['valpagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valpagar']);
       $sStyleHidden_valpagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valpagar = 'display: none;';
   $sStyleReadInp_valpagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valpagar']) && $this->nmgp_cmp_readonly['valpagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valpagar']);
       $sStyleReadLab_valpagar = '';
       $sStyleReadInp_valpagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valpagar']) && $this->nmgp_cmp_hidden['valpagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valpagar" value="<?php echo $this->form_encode_input($valpagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valpagar_line" id="hidden_field_data_valpagar" style="<?php echo $sStyleHidden_valpagar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valpagar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valpagar_label" style=""><span id="id_label_valpagar"><?php echo $this->nm_new_label['valpagar']; ?></span></span><br><input type="hidden" name="valpagar" value="<?php echo $this->form_encode_input($valpagar); ?>"><span id="id_ajax_label_valpagar"><?php echo nl2br($valpagar); ?></span>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Si el pago es sobre una compra, y es solo un abono, se recomienda dejar las tasas de retenciones que trae de la factura, pero colocar los valores (Valor retención, valor retenido ICA, Valor rete IVA y Descuento) en 0.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Si el pago es sobre una compra, y es solo un abono, se recomienda dejar las tasas de retenciones que trae de la factura, pero colocar los valores (Valor retención, valor retenido ICA, Valor rete IVA y Descuento) en 0.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valpagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valpagar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_valpagar_dumb = ('' == $sStyleHidden_valpagar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valpagar_dumb" style="<?php echo $sStyleHidden_valpagar_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Descuento y Retenciones hechas al proveedor<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['porc_ret']))
   {
       $this->nm_new_label['porc_ret'] = "Retención %";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porc_ret = $this->porc_ret;
   $sStyleHidden_porc_ret = '';
   if (isset($this->nmgp_cmp_hidden['porc_ret']) && $this->nmgp_cmp_hidden['porc_ret'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porc_ret']);
       $sStyleHidden_porc_ret = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porc_ret = 'display: none;';
   $sStyleReadInp_porc_ret = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porc_ret']) && $this->nmgp_cmp_readonly['porc_ret'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porc_ret']);
       $sStyleReadLab_porc_ret = '';
       $sStyleReadInp_porc_ret = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porc_ret']) && $this->nmgp_cmp_hidden['porc_ret'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="porc_ret" value="<?php echo $this->form_encode_input($this->porc_ret) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_porc_ret_line" id="hidden_field_data_porc_ret" style="<?php echo $sStyleHidden_porc_ret; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porc_ret_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_porc_ret_label" style=""><span id="id_label_porc_ret"><?php echo $this->nm_new_label['porc_ret']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_ret"]) &&  $this->nmgp_cmp_readonly["porc_ret"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT porrete FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret'][] = $rs->fields[0];
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
   $x = 0; 
   $porc_ret_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ret_1))
          {
              foreach ($this->porc_ret_1 as $tmp_porc_ret)
              {
                  if (trim($tmp_porc_ret) === trim($cadaselect[1])) { $porc_ret_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ret) === trim($cadaselect[1])) { $porc_ret_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="porc_ret" value="<?php echo $this->form_encode_input($porc_ret) . "\">" . $porc_ret_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_porc_ret();
   $x = 0 ; 
   $porc_ret_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ret_1))
          {
              foreach ($this->porc_ret_1 as $tmp_porc_ret)
              {
                  if (trim($tmp_porc_ret) === trim($cadaselect[1])) { $porc_ret_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ret) === trim($cadaselect[1])) { $porc_ret_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($porc_ret_look))
          {
              $porc_ret_look = $this->porc_ret;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_porc_ret\" class=\"css_porc_ret_line\" style=\"" .  $sStyleReadLab_porc_ret . "\">" . $this->form_format_readonly("porc_ret", $this->form_encode_input($porc_ret_look)) . "</span><span id=\"id_read_off_porc_ret\" class=\"css_read_off_porc_ret" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_porc_ret . "\">";
   echo " <span id=\"idAjaxSelect_porc_ret\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_porc_ret_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_porc_ret\" name=\"porc_ret\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ret'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->porc_ret) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->porc_ret)) 
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
   if (isset($this->Ini->sc_lig_md5["form_tiporetefuente"]) && $this->Ini->sc_lig_md5["form_tiporetefuente"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_porc_ret*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_porc_ret*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_porc_ret", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tiporetefuente_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_mob&KeepThis=true&TB_iframe=true&height=450&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_ret_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_ret_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ret']))
    {
        $this->nm_new_label['ret'] = "Valor Retención";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ret = $this->ret;
   $sStyleHidden_ret = '';
   if (isset($this->nmgp_cmp_hidden['ret']) && $this->nmgp_cmp_hidden['ret'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ret']);
       $sStyleHidden_ret = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ret = 'display: none;';
   $sStyleReadInp_ret = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ret']) && $this->nmgp_cmp_readonly['ret'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ret']);
       $sStyleReadLab_ret = '';
       $sStyleReadInp_ret = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ret']) && $this->nmgp_cmp_hidden['ret'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ret" value="<?php echo $this->form_encode_input($ret) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ret_line" id="hidden_field_data_ret" style="<?php echo $sStyleHidden_ret; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ret_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ret_label" style=""><span id="id_label_ret"><?php echo $this->nm_new_label['ret']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ret"]) &&  $this->nmgp_cmp_readonly["ret"] == "on") { 

 ?>
<input type="hidden" name="ret" value="<?php echo $this->form_encode_input($ret) . "\">" . $ret . ""; ?>
<?php } else { ?>
<span id="id_read_on_ret" class="sc-ui-readonly-ret css_ret_line" style="<?php echo $sStyleReadLab_ret; ?>"><?php echo $this->form_format_readonly("ret", $this->form_encode_input($this->ret)); ?></span><span id="id_read_off_ret" class="css_read_off_ret<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ret; ?>">
 <input class="sc-js-input scFormObjectOdd css_ret_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ret" type=text name="ret" value="<?php echo $this->form_encode_input($ret) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['ret']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['ret']['format_pos'] || 3 == $this->field_config['ret']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ret']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ret']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ret']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ret']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ret_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ret_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['porc_ica']))
   {
       $this->nm_new_label['porc_ica'] = "ICA %";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porc_ica = $this->porc_ica;
   $sStyleHidden_porc_ica = '';
   if (isset($this->nmgp_cmp_hidden['porc_ica']) && $this->nmgp_cmp_hidden['porc_ica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porc_ica']);
       $sStyleHidden_porc_ica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porc_ica = 'display: none;';
   $sStyleReadInp_porc_ica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porc_ica']) && $this->nmgp_cmp_readonly['porc_ica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porc_ica']);
       $sStyleReadLab_porc_ica = '';
       $sStyleReadInp_porc_ica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porc_ica']) && $this->nmgp_cmp_hidden['porc_ica'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="porc_ica" value="<?php echo $this->form_encode_input($this->porc_ica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_porc_ica_line" id="hidden_field_data_porc_ica" style="<?php echo $sStyleHidden_porc_ica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porc_ica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_porc_ica_label" style=""><span id="id_label_porc_ica"><?php echo $this->nm_new_label['porc_ica']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_ica"]) &&  $this->nmgp_cmp_readonly["porc_ica"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT porcica  FROM tipoica  ORDER BY  id_ica desc";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica'][] = $rs->fields[0];
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
   $x = 0; 
   $porc_ica_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ica_1))
          {
              foreach ($this->porc_ica_1 as $tmp_porc_ica)
              {
                  if (trim($tmp_porc_ica) === trim($cadaselect[1])) { $porc_ica_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ica) === trim($cadaselect[1])) { $porc_ica_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="porc_ica" value="<?php echo $this->form_encode_input($porc_ica) . "\">" . $porc_ica_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_porc_ica();
   $x = 0 ; 
   $porc_ica_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_ica_1))
          {
              foreach ($this->porc_ica_1 as $tmp_porc_ica)
              {
                  if (trim($tmp_porc_ica) === trim($cadaselect[1])) { $porc_ica_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_ica) === trim($cadaselect[1])) { $porc_ica_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($porc_ica_look))
          {
              $porc_ica_look = $this->porc_ica;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_porc_ica\" class=\"css_porc_ica_line\" style=\"" .  $sStyleReadLab_porc_ica . "\">" . $this->form_format_readonly("porc_ica", $this->form_encode_input($porc_ica_look)) . "</span><span id=\"id_read_off_porc_ica\" class=\"css_read_off_porc_ica" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_porc_ica . "\">";
   echo " <span id=\"idAjaxSelect_porc_ica\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_porc_ica_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_porc_ica\" name=\"porc_ica\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_porc_ica'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->porc_ica) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->porc_ica)) 
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
   if (isset($this->Ini->sc_lig_md5["form_tipoica"]) && $this->Ini->sc_lig_md5["form_tipoica"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_porc_ica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_porc_ica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_porc_ica", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tipoica_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_mob&KeepThis=true&TB_iframe=true&height=400&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_ica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_ica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['val_ica']))
    {
        $this->nm_new_label['val_ica'] = "Valor retención ICA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $val_ica = $this->val_ica;
   $sStyleHidden_val_ica = '';
   if (isset($this->nmgp_cmp_hidden['val_ica']) && $this->nmgp_cmp_hidden['val_ica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['val_ica']);
       $sStyleHidden_val_ica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_val_ica = 'display: none;';
   $sStyleReadInp_val_ica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['val_ica']) && $this->nmgp_cmp_readonly['val_ica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['val_ica']);
       $sStyleReadLab_val_ica = '';
       $sStyleReadInp_val_ica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['val_ica']) && $this->nmgp_cmp_hidden['val_ica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_ica" value="<?php echo $this->form_encode_input($val_ica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_val_ica_line" id="hidden_field_data_val_ica" style="<?php echo $sStyleHidden_val_ica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_val_ica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_val_ica_label" style=""><span id="id_label_val_ica"><?php echo $this->nm_new_label['val_ica']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_ica"]) &&  $this->nmgp_cmp_readonly["val_ica"] == "on") { 

 ?>
<input type="hidden" name="val_ica" value="<?php echo $this->form_encode_input($val_ica) . "\">" . $val_ica . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_ica" class="sc-ui-readonly-val_ica css_val_ica_line" style="<?php echo $sStyleReadLab_val_ica; ?>"><?php echo $this->form_format_readonly("val_ica", $this->form_encode_input($this->val_ica)); ?></span><span id="id_read_off_val_ica" class="css_read_off_val_ica<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_ica; ?>">
 <input class="sc-js-input scFormObjectOdd css_val_ica_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_val_ica" type=text name="val_ica" value="<?php echo $this->form_encode_input($val_ica) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['val_ica']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['val_ica']['format_pos'] || 3 == $this->field_config['val_ica']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_ica']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_ica']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_ica']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['val_ica']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_ica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_ica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porc_reteiva']))
    {
        $this->nm_new_label['porc_reteiva'] = "Rete IVA %";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porc_reteiva = $this->porc_reteiva;
   $sStyleHidden_porc_reteiva = '';
   if (isset($this->nmgp_cmp_hidden['porc_reteiva']) && $this->nmgp_cmp_hidden['porc_reteiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porc_reteiva']);
       $sStyleHidden_porc_reteiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porc_reteiva = 'display: none;';
   $sStyleReadInp_porc_reteiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porc_reteiva']) && $this->nmgp_cmp_readonly['porc_reteiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porc_reteiva']);
       $sStyleReadLab_porc_reteiva = '';
       $sStyleReadInp_porc_reteiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porc_reteiva']) && $this->nmgp_cmp_hidden['porc_reteiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porc_reteiva" value="<?php echo $this->form_encode_input($porc_reteiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_porc_reteiva_line" id="hidden_field_data_porc_reteiva" style="<?php echo $sStyleHidden_porc_reteiva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porc_reteiva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_porc_reteiva_label" style=""><span id="id_label_porc_reteiva"><?php echo $this->nm_new_label['porc_reteiva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_reteiva"]) &&  $this->nmgp_cmp_readonly["porc_reteiva"] == "on") { 

 ?>
<input type="hidden" name="porc_reteiva" value="<?php echo $this->form_encode_input($porc_reteiva) . "\">" . $porc_reteiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_porc_reteiva" class="sc-ui-readonly-porc_reteiva css_porc_reteiva_line" style="<?php echo $sStyleReadLab_porc_reteiva; ?>"><?php echo $this->form_format_readonly("porc_reteiva", $this->form_encode_input($this->porc_reteiva)); ?></span><span id="id_read_off_porc_reteiva" class="css_read_off_porc_reteiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porc_reteiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_porc_reteiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porc_reteiva" type=text name="porc_reteiva" value="<?php echo $this->form_encode_input($porc_reteiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=9"; } ?> alt="{datatype: 'decimal', maxLength: 9, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porc_reteiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porc_reteiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porc_reteiva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porc_reteiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_reteiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_reteiva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['val_reteiva']))
    {
        $this->nm_new_label['val_reteiva'] = "Valor Rete IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $val_reteiva = $this->val_reteiva;
   $sStyleHidden_val_reteiva = '';
   if (isset($this->nmgp_cmp_hidden['val_reteiva']) && $this->nmgp_cmp_hidden['val_reteiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['val_reteiva']);
       $sStyleHidden_val_reteiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_val_reteiva = 'display: none;';
   $sStyleReadInp_val_reteiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['val_reteiva']) && $this->nmgp_cmp_readonly['val_reteiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['val_reteiva']);
       $sStyleReadLab_val_reteiva = '';
       $sStyleReadInp_val_reteiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['val_reteiva']) && $this->nmgp_cmp_hidden['val_reteiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_reteiva" value="<?php echo $this->form_encode_input($val_reteiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_val_reteiva_line" id="hidden_field_data_val_reteiva" style="<?php echo $sStyleHidden_val_reteiva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_val_reteiva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_val_reteiva_label" style=""><span id="id_label_val_reteiva"><?php echo $this->nm_new_label['val_reteiva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_reteiva"]) &&  $this->nmgp_cmp_readonly["val_reteiva"] == "on") { 

 ?>
<input type="hidden" name="val_reteiva" value="<?php echo $this->form_encode_input($val_reteiva) . "\">" . $val_reteiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_reteiva" class="sc-ui-readonly-val_reteiva css_val_reteiva_line" style="<?php echo $sStyleReadLab_val_reteiva; ?>"><?php echo $this->form_format_readonly("val_reteiva", $this->form_encode_input($this->val_reteiva)); ?></span><span id="id_read_off_val_reteiva" class="css_read_off_val_reteiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_reteiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_val_reteiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_val_reteiva" type=text name="val_reteiva" value="<?php echo $this->form_encode_input($val_reteiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['val_reteiva']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['val_reteiva']['format_pos'] || 3 == $this->field_config['val_reteiva']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_reteiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_reteiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_reteiva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['val_reteiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_reteiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_reteiva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descuent']))
    {
        $this->nm_new_label['descuent'] = "Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descuent = $this->descuent;
   $sStyleHidden_descuent = '';
   if (isset($this->nmgp_cmp_hidden['descuent']) && $this->nmgp_cmp_hidden['descuent'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descuent']);
       $sStyleHidden_descuent = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descuent = 'display: none;';
   $sStyleReadInp_descuent = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descuent']) && $this->nmgp_cmp_readonly['descuent'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descuent']);
       $sStyleReadLab_descuent = '';
       $sStyleReadInp_descuent = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descuent']) && $this->nmgp_cmp_hidden['descuent'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descuent" value="<?php echo $this->form_encode_input($descuent) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descuent_line" id="hidden_field_data_descuent" style="<?php echo $sStyleHidden_descuent; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descuent_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descuent_label" style=""><span id="id_label_descuent"><?php echo $this->nm_new_label['descuent']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descuent"]) &&  $this->nmgp_cmp_readonly["descuent"] == "on") { 

 ?>
<input type="hidden" name="descuent" value="<?php echo $this->form_encode_input($descuent) . "\">" . $descuent . ""; ?>
<?php } else { ?>
<span id="id_read_on_descuent" class="sc-ui-readonly-descuent css_descuent_line" style="<?php echo $sStyleReadLab_descuent; ?>"><?php echo $this->form_format_readonly("descuent", $this->form_encode_input($this->descuent)); ?></span><span id="id_read_off_descuent" class="css_read_off_descuent<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descuent; ?>">
 <input class="sc-js-input scFormObjectOdd css_descuent_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descuent" type=text name="descuent" value="<?php echo $this->form_encode_input($descuent) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['descuent']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['descuent']['format_pos'] || 3 == $this->field_config['descuent']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descuent']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descuent']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descuent']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descuent']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descuent_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descuent_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iddocapagar']))
    {
        $this->nm_new_label['iddocapagar'] = "Selec documento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iddocapagar = $this->iddocapagar;
   if (!isset($this->nmgp_cmp_hidden['iddocapagar']))
   {
       $this->nmgp_cmp_hidden['iddocapagar'] = 'off';
   }
   $sStyleHidden_iddocapagar = '';
   if (isset($this->nmgp_cmp_hidden['iddocapagar']) && $this->nmgp_cmp_hidden['iddocapagar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iddocapagar']);
       $sStyleHidden_iddocapagar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iddocapagar = 'display: none;';
   $sStyleReadInp_iddocapagar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iddocapagar']) && $this->nmgp_cmp_readonly['iddocapagar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iddocapagar']);
       $sStyleReadLab_iddocapagar = '';
       $sStyleReadInp_iddocapagar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iddocapagar']) && $this->nmgp_cmp_hidden['iddocapagar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iddocapagar" value="<?php echo $this->form_encode_input($iddocapagar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_iddocapagar_line" id="hidden_field_data_iddocapagar" style="<?php echo $sStyleHidden_iddocapagar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iddocapagar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_iddocapagar_label" style=""><span id="id_label_iddocapagar"><?php echo $this->nm_new_label['iddocapagar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iddocapagar"]) &&  $this->nmgp_cmp_readonly["iddocapagar"] == "on") { 

 ?>
<input type="hidden" name="iddocapagar" value="<?php echo $this->form_encode_input($iddocapagar) . "\">" . $iddocapagar . ""; ?>
<?php } else { ?>
<span id="id_read_on_iddocapagar" class="sc-ui-readonly-iddocapagar css_iddocapagar_line" style="<?php echo $sStyleReadLab_iddocapagar; ?>"><?php echo $this->form_format_readonly("iddocapagar", $this->form_encode_input($this->iddocapagar)); ?></span><span id="id_read_off_iddocapagar" class="css_read_off_iddocapagar<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_iddocapagar; ?>">
 <input class="sc-js-input scFormObjectOdd css_iddocapagar_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_iddocapagar" type=text name="iddocapagar" value="<?php echo $this->form_encode_input($iddocapagar) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddocapagar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddocapagar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['total_cuenta']))
    {
        $this->nm_new_label['total_cuenta'] = "Total Cuenta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $total_cuenta = $this->total_cuenta;
   if (!isset($this->nmgp_cmp_hidden['total_cuenta']))
   {
       $this->nmgp_cmp_hidden['total_cuenta'] = 'off';
   }
   $sStyleHidden_total_cuenta = '';
   if (isset($this->nmgp_cmp_hidden['total_cuenta']) && $this->nmgp_cmp_hidden['total_cuenta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['total_cuenta']);
       $sStyleHidden_total_cuenta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_total_cuenta = 'display: none;';
   $sStyleReadInp_total_cuenta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['total_cuenta']) && $this->nmgp_cmp_readonly['total_cuenta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['total_cuenta']);
       $sStyleReadLab_total_cuenta = '';
       $sStyleReadInp_total_cuenta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['total_cuenta']) && $this->nmgp_cmp_hidden['total_cuenta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="total_cuenta" value="<?php echo $this->form_encode_input($total_cuenta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_total_cuenta_line" id="hidden_field_data_total_cuenta" style="<?php echo $sStyleHidden_total_cuenta; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_total_cuenta_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_total_cuenta_label" style=""><span id="id_label_total_cuenta"><?php echo $this->nm_new_label['total_cuenta']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["total_cuenta"]) &&  $this->nmgp_cmp_readonly["total_cuenta"] == "on") { 

 ?>
<input type="hidden" name="total_cuenta" value="<?php echo $this->form_encode_input($total_cuenta) . "\">" . $total_cuenta . ""; ?>
<?php } else { ?>
<span id="id_read_on_total_cuenta" class="sc-ui-readonly-total_cuenta css_total_cuenta_line" style="<?php echo $sStyleReadLab_total_cuenta; ?>"><?php echo $this->form_format_readonly("total_cuenta", $this->form_encode_input($this->total_cuenta)); ?></span><span id="id_read_off_total_cuenta" class="css_read_off_total_cuenta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_total_cuenta; ?>">
 <input class="sc-js-input scFormObjectOdd css_total_cuenta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_total_cuenta" type=text name="total_cuenta" value="<?php echo $this->form_encode_input($total_cuenta) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['total_cuenta']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['total_cuenta']['format_pos'] || 3 == $this->field_config['total_cuenta']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 20, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['total_cuenta']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['total_cuenta']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['total_cuenta']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['total_cuenta']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_cuenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_cuenta_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_total_cuenta_dumb = ('' == $sStyleHidden_total_cuenta) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_total_cuenta_dumb" style="<?php echo $sStyleHidden_total_cuenta_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf5\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Concepto y comentarios<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_concepto']))
   {
       $this->nm_new_label['id_concepto'] = "Código Concepto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_concepto = $this->id_concepto;
   $sStyleHidden_id_concepto = '';
   if (isset($this->nmgp_cmp_hidden['id_concepto']) && $this->nmgp_cmp_hidden['id_concepto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_concepto']);
       $sStyleHidden_id_concepto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_concepto = 'display: none;';
   $sStyleReadInp_id_concepto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_concepto']) && $this->nmgp_cmp_readonly['id_concepto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_concepto']);
       $sStyleReadLab_id_concepto = '';
       $sStyleReadInp_id_concepto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_concepto']) && $this->nmgp_cmp_hidden['id_concepto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_concepto" value="<?php echo $this->form_encode_input($this->id_concepto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_concepto_line" id="hidden_field_data_id_concepto" style="<?php echo $sStyleHidden_id_concepto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_concepto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_concepto_label" style=""><span id="id_label_id_concepto"><?php echo $this->nm_new_label['id_concepto']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['id_concepto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['php_cmp_required']['id_concepto'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_concepto"]) &&  $this->nmgp_cmp_readonly["id_concepto"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idpagos_conceptos, concat(codigo,'/',descripcion)  FROM pagos_conceptos where tipodoc like 'CE' ORDER BY codigo";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto'][] = $rs->fields[0];
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
   $id_concepto_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_concepto_1))
          {
              foreach ($this->id_concepto_1 as $tmp_id_concepto)
              {
                  if (trim($tmp_id_concepto) === trim($cadaselect[1])) { $id_concepto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_concepto) === trim($cadaselect[1])) { $id_concepto_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_concepto" value="<?php echo $this->form_encode_input($id_concepto) . "\">" . $id_concepto_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_concepto();
   $x = 0 ; 
   $id_concepto_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_concepto_1))
          {
              foreach ($this->id_concepto_1 as $tmp_id_concepto)
              {
                  if (trim($tmp_id_concepto) === trim($cadaselect[1])) { $id_concepto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_concepto) === trim($cadaselect[1])) { $id_concepto_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_concepto_look))
          {
              $id_concepto_look = $this->id_concepto;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_concepto\" class=\"css_id_concepto_line\" style=\"" .  $sStyleReadLab_id_concepto . "\">" . $this->form_format_readonly("id_concepto", $this->form_encode_input($id_concepto_look)) . "</span><span id=\"id_read_off_id_concepto\" class=\"css_read_off_id_concepto" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_concepto . "\">";
   echo " <span id=\"idAjaxSelect_id_concepto\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_concepto_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_concepto\" name=\"id_concepto\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lookup_id_concepto'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_concepto) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_concepto)) 
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
   if (isset($this->Ini->sc_lig_md5["form_pagos_conceptos"]) && $this->Ini->sc_lig_md5["form_pagos_conceptos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_id_concepto*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_hacerpagos_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_hacerpagos_mob_lkpedt_refresh_id_concepto*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_id_concepto", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_pagos_conceptos_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_hacerpagos_mob&KeepThis=true&TB_iframe=true&height=500&width=900&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_concepto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_concepto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obs']))
    {
        $this->nm_new_label['obs'] = "Observación";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obs = $this->obs;
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

    <TD class="scFormDataOdd css_obs_line" id="hidden_field_data_obs" style="<?php echo $sStyleHidden_obs; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_obs_label" style=""><span id="id_label_obs"><?php echo $this->nm_new_label['obs']; ?></span></span><br>
<?php
$obs_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obs));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs"]) &&  $this->nmgp_cmp_readonly["obs"] == "on") { 

 ?>
<input type="hidden" name="obs" value="<?php echo $this->form_encode_input($obs) . "\">" . $obs_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs" class="sc-ui-readonly-obs css_obs_line" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $this->form_format_readonly("obs", $this->form_encode_input($obs_val)); ?></span><span id="id_read_off_obs" class="css_read_off_obs<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_obs_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obs" id="id_sc_field_obs" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 10000, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'COMENTARIOS SOBRE EL PAGO', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obs; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conc']))
    {
        $this->nm_new_label['conc'] = "Concepto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conc = $this->conc;
   if (!isset($this->nmgp_cmp_hidden['conc']))
   {
       $this->nmgp_cmp_hidden['conc'] = 'off';
   }
   $sStyleHidden_conc = '';
   if (isset($this->nmgp_cmp_hidden['conc']) && $this->nmgp_cmp_hidden['conc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conc']);
       $sStyleHidden_conc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conc = 'display: none;';
   $sStyleReadInp_conc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conc']) && $this->nmgp_cmp_readonly['conc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conc']);
       $sStyleReadLab_conc = '';
       $sStyleReadInp_conc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conc']) && $this->nmgp_cmp_hidden['conc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conc" value="<?php echo $this->form_encode_input($conc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_conc_line" id="hidden_field_data_conc" style="<?php echo $sStyleHidden_conc; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conc_label" style=""><span id="id_label_conc"><?php echo $this->nm_new_label['conc']; ?></span></span><br>
<?php
$conc_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($conc));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conc"]) &&  $this->nmgp_cmp_readonly["conc"] == "on") { 

 ?>
<input type="hidden" name="conc" value="<?php echo $this->form_encode_input($conc) . "\">" . $conc_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_conc" class="sc-ui-readonly-conc css_conc_line" style="<?php echo $sStyleReadLab_conc; ?>"><?php echo $this->form_format_readonly("conc", $this->form_encode_input($conc_val)); ?></span><span id="id_read_off_conc" class="css_read_off_conc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conc; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_conc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="conc" id="id_sc_field_conc" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'PAGO COMPRA, ABONO A FACTURA, ETC', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $conc; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_conc_dumb = ('' == $sStyleHidden_conc) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_conc_dumb" style="<?php echo $sStyleHidden_conc_dumb; ?>"></TD>
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idpago']))
           {
               $this->nmgp_cmp_readonly['idpago'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['detallepagos']))
    {
        $this->nm_new_label['detallepagos'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detallepagos = $this->detallepagos;
   $sStyleHidden_detallepagos = '';
   if (isset($this->nmgp_cmp_hidden['detallepagos']) && $this->nmgp_cmp_hidden['detallepagos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detallepagos']);
       $sStyleHidden_detallepagos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detallepagos = 'display: none;';
   $sStyleReadInp_detallepagos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detallepagos']) && $this->nmgp_cmp_readonly['detallepagos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detallepagos']);
       $sStyleReadLab_detallepagos = '';
       $sStyleReadInp_detallepagos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detallepagos']) && $this->nmgp_cmp_hidden['detallepagos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detallepagos" value="<?php echo $this->form_encode_input($detallepagos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detallepagos_line" id="hidden_field_data_detallepagos" style="<?php echo $sStyleHidden_detallepagos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detallepagos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detallepagos_label" style=""><span id="id_label_detallepagos"><?php echo $this->nm_new_label['detallepagos']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_multi'] = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_grid_edit'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_grid_edit_link'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_qtd_reg'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob']['embutida_parms'] = "gtotalpagado*scin0*scoutpar_idpago*scin" . $this->nmgp_dados_form['idpago'] . "*scoutgmonto*scin0*scoutgdesc*scin0*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_hacerpagos_mob_empty.htm' : $this->Ini->link_form_detallepagos_terceros_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init'] ]['form_detallepagos_terceros'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_detallepagos']) && 'nmsc_iframe_liga_form_detallepagos_terceros_mob' != $this->Ini->sc_lig_target['C_@scinf_detallepagos'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detallepagos'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos_mob']['form_detallepagos_terceros_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detallepagos_terceros_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_detallepagos_terceros_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detallepagos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detallepagos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpago']))
    {
        $this->nm_new_label['idpago'] = "Idpago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpago = $this->idpago;
   if (!isset($this->nmgp_cmp_hidden['idpago']))
   {
       $this->nmgp_cmp_hidden['idpago'] = 'off';
   }
   $sStyleHidden_idpago = '';
   if (isset($this->nmgp_cmp_hidden['idpago']) && $this->nmgp_cmp_hidden['idpago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpago']);
       $sStyleHidden_idpago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpago = 'display: none;';
   $sStyleReadInp_idpago = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idpago"]) &&  $this->nmgp_cmp_readonly["idpago"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpago']);
       $sStyleReadLab_idpago = '';
       $sStyleReadInp_idpago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpago']) && $this->nmgp_cmp_hidden['idpago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpago" value="<?php echo $this->form_encode_input($idpago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_idpago_line" id="hidden_field_data_idpago" style="<?php echo $sStyleHidden_idpago; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpago_label" style=""><span id="id_label_idpago"><?php echo $this->nm_new_label['idpago']; ?></span></span><br><span id="id_read_on_idpago" class="css_idpago_line" style="<?php echo $sStyleReadLab_idpago; ?>"><?php echo $this->form_format_readonly("idpago", $this->form_encode_input($this->idpago)); ?></span><span id="id_read_off_idpago" class="css_read_off_idpago" style="<?php echo $sStyleReadInp_idpago; ?>"><input type="hidden" name="idpago" value="<?php echo $this->form_encode_input($idpago) . "\">"?><span id="id_ajax_label_idpago"><?php echo nl2br($idpago); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpago_text"></span></td></tr></table></td></tr></table> </TD>
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






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
