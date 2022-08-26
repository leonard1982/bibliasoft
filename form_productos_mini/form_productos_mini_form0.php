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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Ingresar nuevo producto"); } else { echo strip_tags("Editar producto"); } ?></TITLE>
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
.css_read_off_ultima_compra button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_ultima_venta button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_productos_mini/form_productos_mini_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_productos_mini_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "unimay")
     {
        $('input[name="unimay"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="unimay"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="unimay"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "recmayamen")
     {
        $('input[name="recmayamen"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="recmayamen"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="recmayamen"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "preciofull")
     {
        $('input[name="preciofull"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="preciofull"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="preciofull"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "precio2")
     {
        $('input[name="precio2"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="precio2"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="precio2"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "preciomay")
     {
        $('input[name="preciomay"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="preciomay"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="preciomay"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "stockmen")
     {
        $('input[name="stockmen"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="stockmen"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="stockmen"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_productos_mini_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  addAutocomplete(this);

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


  $(".sc-ui-autocomp-idpro1", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idpro1" != sId ? sId.substr(6) : "";
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
    url: "form_productos_mini.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idpro1",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "idpro1" != sId ? sId.substr(6) : "";
   sc_form_productos_mini_idpro1_onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });

  $(".sc-ui-autocomp-idpro2", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idpro2" != sId ? sId.substr(6) : "";
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
    url: "form_productos_mini.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idpro2",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "idpro2" != sId ? sId.substr(6) : "";
   sc_form_productos_mini_idpro2_onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });

  $(".sc-ui-autocomp-unidad_", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "unidad_" != sId ? sId.substr(7) : "";
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
    url: "form_productos_mini.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_unidad_",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "unidad_" != sId ? sId.substr(7) : "";
   sc_form_productos_mini_unidad__onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });

  $(".sc-ui-autocomp-unidad_ma", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "unidad_ma" != sId ? sId.substr(9) : "";
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
    url: "form_productos_mini.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_unidad_ma",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "unidad_ma" != sId ? sId.substr(9) : "";
   sc_form_productos_mini_unidad_ma_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_productos_mini_js0.php");
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
               action="./" 
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_productos_mini'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_productos_mini'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Ingresar nuevo producto"; } else { echo "Editar producto"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['delete'];
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['unidmaymen']))
   {
       $this->nmgp_cmp_hidden['unidmaymen'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unimay']))
   {
       $this->nmgp_cmp_hidden['unimay'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unimen']))
   {
       $this->nmgp_cmp_hidden['unimen'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['recmayamen']))
   {
       $this->nmgp_cmp_hidden['recmayamen'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['precio2']))
   {
       $this->nmgp_cmp_hidden['precio2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['preciomay']))
   {
       $this->nmgp_cmp_hidden['preciomay'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['preciofull']))
   {
       $this->nmgp_cmp_hidden['preciofull'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idpro1']))
   {
       $this->nmgp_cmp_hidden['idpro1'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idpro2']))
   {
       $this->nmgp_cmp_hidden['idpro2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['otro']))
   {
       $this->nmgp_cmp_hidden['otro'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['otro2']))
   {
       $this->nmgp_cmp_hidden['otro2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['precio_editable']))
   {
       $this->nmgp_cmp_hidden['precio_editable'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['maneja_tcs_lfs']))
   {
       $this->nmgp_cmp_hidden['maneja_tcs_lfs'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['existencia']))
   {
       $this->nmgp_cmp_hidden['existencia'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['multiple_escala']))
   {
       $this->nmgp_cmp_hidden['multiple_escala'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['en_base_a']))
   {
       $this->nmgp_cmp_hidden['en_base_a'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['costo_prom']))
   {
       $this->nmgp_cmp_hidden['costo_prom'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['u_menor']))
   {
       $this->nmgp_cmp_hidden['u_menor'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unidad_ma']))
   {
       $this->nmgp_cmp_hidden['unidad_ma'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigobar']))
    {
        $this->nm_new_label['codigobar'] = "Código barras";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigobar = $this->codigobar;
   $sStyleHidden_codigobar = '';
   if (isset($this->nmgp_cmp_hidden['codigobar']) && $this->nmgp_cmp_hidden['codigobar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigobar']);
       $sStyleHidden_codigobar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigobar = 'display: none;';
   $sStyleReadInp_codigobar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigobar']) && $this->nmgp_cmp_readonly['codigobar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigobar']);
       $sStyleReadLab_codigobar = '';
       $sStyleReadInp_codigobar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigobar']) && $this->nmgp_cmp_hidden['codigobar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar" value="<?php echo $this->form_encode_input($codigobar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigobar_label" id="hidden_field_label_codigobar" style="<?php echo $sStyleHidden_codigobar; ?>"><span id="id_label_codigobar"><?php echo $this->nm_new_label['codigobar']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['codigobar']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['codigobar'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_codigobar_line" id="hidden_field_data_codigobar" style="<?php echo $sStyleHidden_codigobar; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigobar_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigobar"]) &&  $this->nmgp_cmp_readonly["codigobar"] == "on") { 

 ?>
<input type="hidden" name="codigobar" value="<?php echo $this->form_encode_input($codigobar) . "\">" . $codigobar . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigobar" class="sc-ui-readonly-codigobar css_codigobar_line" style="<?php echo $sStyleReadLab_codigobar; ?>"><?php echo $this->form_format_readonly("codigobar", $this->form_encode_input($this->codigobar)); ?></span><span id="id_read_off_codigobar" class="css_read_off_codigobar<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigobar; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigobar_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigobar" type=text name="codigobar" value="<?php echo $this->form_encode_input($codigobar) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 .-_") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ingrese código de barras ', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Este campo solo acepta:<br />
Números, letras, espacio, punto, signo menos, guión piso.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Este campo solo acepta:<br />
Números, letras, espacio, punto, signo menos, guión piso.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigoprod']))
    {
        $this->nm_new_label['codigoprod'] = "Código producto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigoprod = $this->codigoprod;
   $sStyleHidden_codigoprod = '';
   if (isset($this->nmgp_cmp_hidden['codigoprod']) && $this->nmgp_cmp_hidden['codigoprod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigoprod']);
       $sStyleHidden_codigoprod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigoprod = 'display: none;';
   $sStyleReadInp_codigoprod = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigoprod']) && $this->nmgp_cmp_readonly['codigoprod'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigoprod']);
       $sStyleReadLab_codigoprod = '';
       $sStyleReadInp_codigoprod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigoprod']) && $this->nmgp_cmp_hidden['codigoprod'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigoprod" value="<?php echo $this->form_encode_input($codigoprod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigoprod_label" id="hidden_field_label_codigoprod" style="<?php echo $sStyleHidden_codigoprod; ?>"><span id="id_label_codigoprod"><?php echo $this->nm_new_label['codigoprod']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['codigoprod']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['codigoprod'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_codigoprod_line" id="hidden_field_data_codigoprod" style="<?php echo $sStyleHidden_codigoprod; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigoprod_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigoprod"]) &&  $this->nmgp_cmp_readonly["codigoprod"] == "on") { 

 ?>
<input type="hidden" name="codigoprod" value="<?php echo $this->form_encode_input($codigoprod) . "\">" . $codigoprod . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigoprod" class="sc-ui-readonly-codigoprod css_codigoprod_line" style="<?php echo $sStyleReadLab_codigoprod; ?>"><?php echo $this->form_format_readonly("codigoprod", $this->form_encode_input($this->codigoprod)); ?></span><span id="id_read_off_codigoprod" class="css_read_off_codigoprod<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigoprod; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigoprod_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigoprod" type=text name="codigoprod" value="<?php echo $this->form_encode_input($codigoprod) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 .-_") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ingrese código alfanumérico', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Este campo solo acepta:<br />
Números, letras, espacio, punto, signo menos, guión piso.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Este campo solo acepta:<br />
Números, letras, espacio, punto, signo menos, guión piso.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigoprod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigoprod_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nompro']))
    {
        $this->nm_new_label['nompro'] = "Descripción";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nompro = $this->nompro;
   $sStyleHidden_nompro = '';
   if (isset($this->nmgp_cmp_hidden['nompro']) && $this->nmgp_cmp_hidden['nompro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nompro']);
       $sStyleHidden_nompro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nompro = 'display: none;';
   $sStyleReadInp_nompro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nompro']) && $this->nmgp_cmp_readonly['nompro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nompro']);
       $sStyleReadLab_nompro = '';
       $sStyleReadInp_nompro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nompro']) && $this->nmgp_cmp_hidden['nompro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nompro" value="<?php echo $this->form_encode_input($nompro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nompro_label" id="hidden_field_label_nompro" style="<?php echo $sStyleHidden_nompro; ?>"><span id="id_label_nompro"><?php echo $this->nm_new_label['nompro']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['nompro']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['nompro'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nompro_line" id="hidden_field_data_nompro" style="<?php echo $sStyleHidden_nompro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nompro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nompro"]) &&  $this->nmgp_cmp_readonly["nompro"] == "on") { 

 ?>
<input type="hidden" name="nompro" value="<?php echo $this->form_encode_input($nompro) . "\">" . $nompro . ""; ?>
<?php } else { ?>
<span id="id_read_on_nompro" class="sc-ui-readonly-nompro css_nompro_line" style="<?php echo $sStyleReadLab_nompro; ?>"><?php echo $this->form_format_readonly("nompro", $this->form_encode_input($this->nompro)); ?></span><span id="id_read_off_nompro" class="css_read_off_nompro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nompro; ?>">
 <input class="sc-js-input scFormObjectOdd css_nompro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nompro" type=text name="nompro" value="<?php echo $this->form_encode_input($nompro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Nombre o descripción del Producto', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nompro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nompro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idgrup']))
   {
       $this->nm_new_label['idgrup'] = "Familia o grupo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idgrup = $this->idgrup;
   $sStyleHidden_idgrup = '';
   if (isset($this->nmgp_cmp_hidden['idgrup']) && $this->nmgp_cmp_hidden['idgrup'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idgrup']);
       $sStyleHidden_idgrup = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idgrup = 'display: none;';
   $sStyleReadInp_idgrup = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idgrup']) && $this->nmgp_cmp_readonly['idgrup'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idgrup']);
       $sStyleReadLab_idgrup = '';
       $sStyleReadInp_idgrup = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idgrup']) && $this->nmgp_cmp_hidden['idgrup'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idgrup" value="<?php echo $this->form_encode_input($this->idgrup) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idgrup_label" id="hidden_field_label_idgrup" style="<?php echo $sStyleHidden_idgrup; ?>"><span id="id_label_idgrup"><?php echo $this->nm_new_label['idgrup']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['idgrup']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['idgrup'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idgrup_line" id="hidden_field_data_idgrup" style="<?php echo $sStyleHidden_idgrup; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idgrup_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idgrup"]) &&  $this->nmgp_cmp_readonly["idgrup"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup'][] = $rs->fields[0];
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
   $idgrup_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idgrup_1))
          {
              foreach ($this->idgrup_1 as $tmp_idgrup)
              {
                  if (trim($tmp_idgrup) === trim($cadaselect[1])) { $idgrup_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idgrup) === trim($cadaselect[1])) { $idgrup_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idgrup" value="<?php echo $this->form_encode_input($idgrup) . "\">" . $idgrup_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idgrup();
   $x = 0 ; 
   $idgrup_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idgrup_1))
          {
              foreach ($this->idgrup_1 as $tmp_idgrup)
              {
                  if (trim($tmp_idgrup) === trim($cadaselect[1])) { $idgrup_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idgrup) === trim($cadaselect[1])) { $idgrup_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idgrup_look))
          {
              $idgrup_look = $this->idgrup;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idgrup\" class=\"css_idgrup_line\" style=\"" .  $sStyleReadLab_idgrup . "\">" . $this->form_format_readonly("idgrup", $this->form_encode_input($idgrup_look)) . "</span><span id=\"id_read_off_idgrup\" class=\"css_read_off_idgrup" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idgrup . "\">";
   echo " <span id=\"idAjaxSelect_idgrup\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idgrup_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idgrup\" name=\"idgrup\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idgrup'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione familia o grupo") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idgrup) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idgrup)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idgrup_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idgrup_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpro1']))
    {
        $this->nm_new_label['idpro1'] = "Proveedor principal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpro1 = $this->idpro1;
   if (!isset($this->nmgp_cmp_hidden['idpro1']))
   {
       $this->nmgp_cmp_hidden['idpro1'] = 'off';
   }
   $sStyleHidden_idpro1 = '';
   if (isset($this->nmgp_cmp_hidden['idpro1']) && $this->nmgp_cmp_hidden['idpro1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpro1']);
       $sStyleHidden_idpro1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpro1 = 'display: none;';
   $sStyleReadInp_idpro1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpro1']) && $this->nmgp_cmp_readonly['idpro1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpro1']);
       $sStyleReadLab_idpro1 = '';
       $sStyleReadInp_idpro1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpro1']) && $this->nmgp_cmp_hidden['idpro1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpro1" value="<?php echo $this->form_encode_input($idpro1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idpro1_label" id="hidden_field_label_idpro1" style="<?php echo $sStyleHidden_idpro1; ?>"><span id="id_label_idpro1"><?php echo $this->nm_new_label['idpro1']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['idpro1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['idpro1'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idpro1_line" id="hidden_field_data_idpro1" style="<?php echo $sStyleHidden_idpro1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpro1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro1"]) &&  $this->nmgp_cmp_readonly["idpro1"] == "on") { 

 ?>
<input type="hidden" name="idpro1" value="<?php echo $this->form_encode_input($idpro1) . "\">" . $idpro1 . ""; ?>
<?php } else { ?>

<?php
$aRecData['idpro1'] = $this->idpro1;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"- \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"- \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   if ('' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro1])) ? $aLookup[0][$this->idpro1] : $this->idpro1;
$idpro1_look = (isset($aLookup[0][$this->idpro1])) ? $aLookup[0][$this->idpro1] : $this->idpro1;
?>
<span id="id_read_on_idpro1" class="sc-ui-readonly-idpro1 css_idpro1_line" style="<?php echo $sStyleReadLab_idpro1; ?>"><?php echo $this->form_format_readonly("idpro1", str_replace("<", "&lt;", $idpro1_look)); ?></span><span id="id_read_off_idpro1" class="css_read_off_idpro1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idpro1; ?>">
 <input class="sc-js-input scFormObjectOdd css_idpro1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_idpro1" type=text name="idpro1" value="<?php echo $this->form_encode_input($idpro1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> maxlength=19 style="display: none" alt="{datatype: 'text', maxLength: 19, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idpro1'] = $this->idpro1;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"- \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"- \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro1), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   if ('' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1 && '' != $this->idpro1)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro1'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro1])) ? $aLookup[0][$this->idpro1] : '';
$idpro1_look = (isset($aLookup[0][$this->idpro1])) ? $aLookup[0][$this->idpro1] : '';
?>
<select id="id_ac_idpro1" class="scFormObjectOdd sc-ui-autocomp-idpro1 css_idpro1_obj sc-js-input"><?php if ('' != $this->idpro1) { ?><option value="<?php echo $this->idpro1 ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select>
<?php
   if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_mini_lkpedt_refresh_idpro1*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_productos_mini@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_mini_lkpedt_refresh_idpro1*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
?>
<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_idpro1", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_terceros_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_productos_mini&KeepThis=true&TB_iframe=true&height=400&width=1200&modal=true", "");?>
<?php } ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_producto']))
   {
       $this->nm_new_label['tipo_producto'] = "Tipo Producto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_producto = $this->tipo_producto;
   $sStyleHidden_tipo_producto = '';
   if (isset($this->nmgp_cmp_hidden['tipo_producto']) && $this->nmgp_cmp_hidden['tipo_producto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_producto']);
       $sStyleHidden_tipo_producto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_producto = 'display: none;';
   $sStyleReadInp_tipo_producto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_producto']) && $this->nmgp_cmp_readonly['tipo_producto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_producto']);
       $sStyleReadLab_tipo_producto = '';
       $sStyleReadInp_tipo_producto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_producto']) && $this->nmgp_cmp_hidden['tipo_producto'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_producto" value="<?php echo $this->form_encode_input($this->tipo_producto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_producto_label" id="hidden_field_label_tipo_producto" style="<?php echo $sStyleHidden_tipo_producto; ?>"><span id="id_label_tipo_producto"><?php echo $this->nm_new_label['tipo_producto']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_producto_line" id="hidden_field_data_tipo_producto" style="<?php echo $sStyleHidden_tipo_producto; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_producto_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_producto"]) &&  $this->nmgp_cmp_readonly["tipo_producto"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_tp, codigo_tp + ' - ' + descripcion_tp  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_tp, concat(codigo_tp,' - ', descripcion_tp)  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_tp, codigo_tp&' - '&descripcion_tp  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_tp, codigo_tp||' - '||descripcion_tp  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_tp, codigo_tp + ' - ' + descripcion_tp  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_tp, codigo_tp||' - '||descripcion_tp  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }
   else
   {
       $nm_comando = "SELECT codigo_tp, codigo_tp||' - '||descripcion_tp  FROM tipo_producto  ORDER BY codigo_tp, descripcion_tp";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto'][] = $rs->fields[0];
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
   $tipo_producto_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_producto_1))
          {
              foreach ($this->tipo_producto_1 as $tmp_tipo_producto)
              {
                  if (trim($tmp_tipo_producto) === trim($cadaselect[1])) { $tipo_producto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_producto) === trim($cadaselect[1])) { $tipo_producto_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tipo_producto" value="<?php echo $this->form_encode_input($tipo_producto) . "\">" . $tipo_producto_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tipo_producto();
   $x = 0 ; 
   $tipo_producto_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tipo_producto_1))
          {
              foreach ($this->tipo_producto_1 as $tmp_tipo_producto)
              {
                  if (trim($tmp_tipo_producto) === trim($cadaselect[1])) { $tipo_producto_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tipo_producto) === trim($cadaselect[1])) { $tipo_producto_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tipo_producto_look))
          {
              $tipo_producto_look = $this->tipo_producto;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tipo_producto\" class=\"css_tipo_producto_line\" style=\"" .  $sStyleReadLab_tipo_producto . "\">" . $this->form_format_readonly("tipo_producto", $this->form_encode_input($tipo_producto_look)) . "</span><span id=\"id_read_off_tipo_producto\" class=\"css_read_off_tipo_producto" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tipo_producto . "\">";
   echo " <span id=\"idAjaxSelect_tipo_producto\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tipo_producto_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tipo_producto\" name=\"tipo_producto\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_tipo_producto'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tipo_producto) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tipo_producto)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_producto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_producto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpro2']))
    {
        $this->nm_new_label['idpro2'] = "Proveedor secundario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpro2 = $this->idpro2;
   if (!isset($this->nmgp_cmp_hidden['idpro2']))
   {
       $this->nmgp_cmp_hidden['idpro2'] = 'off';
   }
   $sStyleHidden_idpro2 = '';
   if (isset($this->nmgp_cmp_hidden['idpro2']) && $this->nmgp_cmp_hidden['idpro2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpro2']);
       $sStyleHidden_idpro2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpro2 = 'display: none;';
   $sStyleReadInp_idpro2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpro2']) && $this->nmgp_cmp_readonly['idpro2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpro2']);
       $sStyleReadLab_idpro2 = '';
       $sStyleReadInp_idpro2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpro2']) && $this->nmgp_cmp_hidden['idpro2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpro2" value="<?php echo $this->form_encode_input($idpro2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idpro2_label" id="hidden_field_label_idpro2" style="<?php echo $sStyleHidden_idpro2; ?>"><span id="id_label_idpro2"><?php echo $this->nm_new_label['idpro2']; ?></span></TD>
    <TD class="scFormDataOdd css_idpro2_line" id="hidden_field_data_idpro2" style="<?php echo $sStyleHidden_idpro2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpro2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro2"]) &&  $this->nmgp_cmp_readonly["idpro2"] == "on") { 

 ?>
<input type="hidden" name="idpro2" value="<?php echo $this->form_encode_input($idpro2) . "\">" . $idpro2 . ""; ?>
<?php } else { ?>

<?php
$aRecData['idpro2'] = $this->idpro2;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"- \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"- \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   if ('' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro2])) ? $aLookup[0][$this->idpro2] : $this->idpro2;
$idpro2_look = (isset($aLookup[0][$this->idpro2])) ? $aLookup[0][$this->idpro2] : $this->idpro2;
?>
<span id="id_read_on_idpro2" class="sc-ui-readonly-idpro2 css_idpro2_line" style="<?php echo $sStyleReadLab_idpro2; ?>"><?php echo $this->form_format_readonly("idpro2", str_replace("<", "&lt;", $idpro2_look)); ?></span><span id="id_read_off_idpro2" class="css_read_off_idpro2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idpro2; ?>">
 <input class="sc-js-input scFormObjectOdd css_idpro2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_idpro2" type=text name="idpro2" value="<?php echo $this->form_encode_input($idpro2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> maxlength=19 style="display: none" alt="{datatype: 'text', maxLength: 19, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idpro2'] = $this->idpro2;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"- \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"- \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"- \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"- \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idpro2), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   if ('' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2 && '' != $this->idpro2)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idpro2'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro2])) ? $aLookup[0][$this->idpro2] : '';
$idpro2_look = (isset($aLookup[0][$this->idpro2])) ? $aLookup[0][$this->idpro2] : '';
?>
<select id="id_ac_idpro2" class="scFormObjectOdd sc-ui-autocomp-idpro2 css_idpro2_obj sc-js-input"><?php if ('' != $this->idpro2) { ?><option value="<?php echo $this->idpro2 ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['otro']))
   {
       $this->nm_new_label['otro'] = "Promoción";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $otro = $this->otro;
   if (!isset($this->nmgp_cmp_hidden['otro']))
   {
       $this->nmgp_cmp_hidden['otro'] = 'off';
   }
   $sStyleHidden_otro = '';
   if (isset($this->nmgp_cmp_hidden['otro']) && $this->nmgp_cmp_hidden['otro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['otro']);
       $sStyleHidden_otro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_otro = 'display: none;';
   $sStyleReadInp_otro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['otro']) && $this->nmgp_cmp_readonly['otro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['otro']);
       $sStyleReadLab_otro = '';
       $sStyleReadInp_otro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['otro']) && $this->nmgp_cmp_hidden['otro'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="otro" value="<?php echo $this->form_encode_input($this->otro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_otro_label" id="hidden_field_label_otro" style="<?php echo $sStyleHidden_otro; ?>"><span id="id_label_otro"><?php echo $this->nm_new_label['otro']; ?></span></TD>
    <TD class="scFormDataOdd css_otro_line" id="hidden_field_data_otro" style="<?php echo $sStyleHidden_otro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_otro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["otro"]) &&  $this->nmgp_cmp_readonly["otro"] == "on") { 

$otro_look = "";
 if ($this->otro == "0") { $otro_look .= "No" ;} 
 if ($this->otro == "1") { $otro_look .= "Sí" ;} 
 if (empty($otro_look)) { $otro_look = $this->otro; }
?>
<input type="hidden" name="otro" value="<?php echo $this->form_encode_input($otro) . "\">" . $otro_look . ""; ?>
<?php } else { ?>
<?php

$otro_look = "";
 if ($this->otro == "0") { $otro_look .= "No" ;} 
 if ($this->otro == "1") { $otro_look .= "Sí" ;} 
 if (empty($otro_look)) { $otro_look = $this->otro; }
?>
<span id="id_read_on_otro" class="css_otro_line"  style="<?php echo $sStyleReadLab_otro; ?>"><?php echo $this->form_format_readonly("otro", $this->form_encode_input($otro_look)); ?></span><span id="id_read_off_otro" class="css_read_off_otro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_otro; ?>">
 <span id="idAjaxSelect_otro" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_otro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_otro" name="otro" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="0" <?php  if ($this->otro == "0") { echo " selected" ;} ?><?php  if (empty($this->otro)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_otro'][] = '0'; ?>
 <option  value="1" <?php  if ($this->otro == "1") { echo " selected" ;} ?>>Sí</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_otro'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_otro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_otro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['otro2']))
    {
        $this->nm_new_label['otro2'] = "Descuento %";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $otro2 = $this->otro2;
   if (!isset($this->nmgp_cmp_hidden['otro2']))
   {
       $this->nmgp_cmp_hidden['otro2'] = 'off';
   }
   $sStyleHidden_otro2 = '';
   if (isset($this->nmgp_cmp_hidden['otro2']) && $this->nmgp_cmp_hidden['otro2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['otro2']);
       $sStyleHidden_otro2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_otro2 = 'display: none;';
   $sStyleReadInp_otro2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['otro2']) && $this->nmgp_cmp_readonly['otro2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['otro2']);
       $sStyleReadLab_otro2 = '';
       $sStyleReadInp_otro2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['otro2']) && $this->nmgp_cmp_hidden['otro2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="otro2" value="<?php echo $this->form_encode_input($otro2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_otro2_label" id="hidden_field_label_otro2" style="<?php echo $sStyleHidden_otro2; ?>"><span id="id_label_otro2"><?php echo $this->nm_new_label['otro2']; ?></span></TD>
    <TD class="scFormDataOdd css_otro2_line" id="hidden_field_data_otro2" style="<?php echo $sStyleHidden_otro2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_otro2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["otro2"]) &&  $this->nmgp_cmp_readonly["otro2"] == "on") { 

 ?>
<input type="hidden" name="otro2" value="<?php echo $this->form_encode_input($otro2) . "\">" . $otro2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_otro2" class="sc-ui-readonly-otro2 css_otro2_line" style="<?php echo $sStyleReadLab_otro2; ?>"><?php echo $this->form_format_readonly("otro2", $this->form_encode_input($this->otro2)); ?></span><span id="id_read_off_otro2" class="css_read_off_otro2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_otro2; ?>">
 <input class="sc-js-input scFormObjectOdd css_otro2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_otro2" type=text name="otro2" value="<?php echo $this->form_encode_input($otro2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['otro2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['otro2']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['otro2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_otro2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_otro2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['precio_editable']))
   {
       $this->nm_new_label['precio_editable'] = "Precio editable en ventas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio_editable = $this->precio_editable;
   if (!isset($this->nmgp_cmp_hidden['precio_editable']))
   {
       $this->nmgp_cmp_hidden['precio_editable'] = 'off';
   }
   $sStyleHidden_precio_editable = '';
   if (isset($this->nmgp_cmp_hidden['precio_editable']) && $this->nmgp_cmp_hidden['precio_editable'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio_editable']);
       $sStyleHidden_precio_editable = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio_editable = 'display: none;';
   $sStyleReadInp_precio_editable = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio_editable']) && $this->nmgp_cmp_readonly['precio_editable'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio_editable']);
       $sStyleReadLab_precio_editable = '';
       $sStyleReadInp_precio_editable = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio_editable']) && $this->nmgp_cmp_hidden['precio_editable'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="precio_editable" value="<?php echo $this->form_encode_input($this->precio_editable) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio_editable_label" id="hidden_field_label_precio_editable" style="<?php echo $sStyleHidden_precio_editable; ?>"><span id="id_label_precio_editable"><?php echo $this->nm_new_label['precio_editable']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['precio_editable']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['precio_editable'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_precio_editable_line" id="hidden_field_data_precio_editable" style="<?php echo $sStyleHidden_precio_editable; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio_editable_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio_editable"]) &&  $this->nmgp_cmp_readonly["precio_editable"] == "on") { 

$precio_editable_look = "";
 if ($this->precio_editable == "NO") { $precio_editable_look .= "NO" ;} 
 if ($this->precio_editable == "SI") { $precio_editable_look .= "SI" ;} 
 if (empty($precio_editable_look)) { $precio_editable_look = $this->precio_editable; }
?>
<input type="hidden" name="precio_editable" value="<?php echo $this->form_encode_input($precio_editable) . "\">" . $precio_editable_look . ""; ?>
<?php } else { ?>
<?php

$precio_editable_look = "";
 if ($this->precio_editable == "NO") { $precio_editable_look .= "NO" ;} 
 if ($this->precio_editable == "SI") { $precio_editable_look .= "SI" ;} 
 if (empty($precio_editable_look)) { $precio_editable_look = $this->precio_editable; }
?>
<span id="id_read_on_precio_editable" class="css_precio_editable_line"  style="<?php echo $sStyleReadLab_precio_editable; ?>"><?php echo $this->form_format_readonly("precio_editable", $this->form_encode_input($precio_editable_look)); ?></span><span id="id_read_off_precio_editable" class="css_read_off_precio_editable<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_precio_editable; ?>">
 <span id="idAjaxSelect_precio_editable" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_precio_editable_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio_editable" name="precio_editable" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NO" <?php  if ($this->precio_editable == "NO") { echo " selected" ;} ?><?php  if (empty($this->precio_editable)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_precio_editable'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->precio_editable == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_precio_editable'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio_editable_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio_editable_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['maneja_tcs_lfs']))
    {
        $this->nm_new_label['maneja_tcs_lfs'] = "Maneja TCS ó LFS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $maneja_tcs_lfs = $this->maneja_tcs_lfs;
   if (!isset($this->nmgp_cmp_hidden['maneja_tcs_lfs']))
   {
       $this->nmgp_cmp_hidden['maneja_tcs_lfs'] = 'off';
   }
   $sStyleHidden_maneja_tcs_lfs = '';
   if (isset($this->nmgp_cmp_hidden['maneja_tcs_lfs']) && $this->nmgp_cmp_hidden['maneja_tcs_lfs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['maneja_tcs_lfs']);
       $sStyleHidden_maneja_tcs_lfs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_maneja_tcs_lfs = 'display: none;';
   $sStyleReadInp_maneja_tcs_lfs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['maneja_tcs_lfs']) && $this->nmgp_cmp_readonly['maneja_tcs_lfs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['maneja_tcs_lfs']);
       $sStyleReadLab_maneja_tcs_lfs = '';
       $sStyleReadInp_maneja_tcs_lfs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['maneja_tcs_lfs']) && $this->nmgp_cmp_hidden['maneja_tcs_lfs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="maneja_tcs_lfs" value="<?php echo $this->form_encode_input($maneja_tcs_lfs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_maneja_tcs_lfs_label" id="hidden_field_label_maneja_tcs_lfs" style="<?php echo $sStyleHidden_maneja_tcs_lfs; ?>"><span id="id_label_maneja_tcs_lfs"><?php echo $this->nm_new_label['maneja_tcs_lfs']; ?></span></TD>
    <TD class="scFormDataOdd css_maneja_tcs_lfs_line" id="hidden_field_data_maneja_tcs_lfs" style="<?php echo $sStyleHidden_maneja_tcs_lfs; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_maneja_tcs_lfs_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["maneja_tcs_lfs"]) &&  $this->nmgp_cmp_readonly["maneja_tcs_lfs"] == "on") { 

 if ("NA" == $this->maneja_tcs_lfs) { $maneja_tcs_lfs_look = "No Aplica";} 
 if ("CTS" == $this->maneja_tcs_lfs) { $maneja_tcs_lfs_look = "Color, Talla y Sabor";} 
 if ("LFS" == $this->maneja_tcs_lfs) { $maneja_tcs_lfs_look = "Lote, F. Vencimiento, Serial";} 
?>
<input type="hidden" name="maneja_tcs_lfs" value="<?php echo $this->form_encode_input($maneja_tcs_lfs) . "\">" . $maneja_tcs_lfs_look . ""; ?>
<?php } else { ?>

<?php

 if ("NA" == $this->maneja_tcs_lfs) { $maneja_tcs_lfs_look = "No Aplica";} 
 if ("CTS" == $this->maneja_tcs_lfs) { $maneja_tcs_lfs_look = "Color, Talla y Sabor";} 
 if ("LFS" == $this->maneja_tcs_lfs) { $maneja_tcs_lfs_look = "Lote, F. Vencimiento, Serial";} 
?>
<span id="id_read_on_maneja_tcs_lfs"  class="css_maneja_tcs_lfs_line" style="<?php echo $sStyleReadLab_maneja_tcs_lfs; ?>"><?php echo $this->form_format_readonly("maneja_tcs_lfs", $this->form_encode_input($maneja_tcs_lfs_look)); ?></span><span id="id_read_off_maneja_tcs_lfs" class="css_read_off_maneja_tcs_lfs css_maneja_tcs_lfs_line" style="<?php echo $sStyleReadInp_maneja_tcs_lfs; ?>"><div id="idAjaxRadio_maneja_tcs_lfs" style="display: inline-block"  class="css_maneja_tcs_lfs_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_maneja_tcs_lfs_line"><?php $tempOptionId = "id-opt-maneja_tcs_lfs" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-maneja_tcs_lfs sc-ui-radio-maneja_tcs_lfs sc-js-input" type=radio name="maneja_tcs_lfs" value="NA"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_maneja_tcs_lfs'][] = 'NA'; ?>
<?php  if ("NA" == $this->maneja_tcs_lfs)  { echo " checked" ;} ?><?php  if (empty($this->maneja_tcs_lfs)) { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_maneja_tcs_lfs_onclick();" ><label for="<?php echo $tempOptionId ?>">No Aplica</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_maneja_tcs_lfs_line"><?php $tempOptionId = "id-opt-maneja_tcs_lfs" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-maneja_tcs_lfs sc-ui-radio-maneja_tcs_lfs sc-js-input" type=radio name="maneja_tcs_lfs" value="CTS"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_maneja_tcs_lfs'][] = 'CTS'; ?>
<?php  if ("CTS" == $this->maneja_tcs_lfs)  { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_maneja_tcs_lfs_onclick();" ><label for="<?php echo $tempOptionId ?>">Color, Talla y Sabor</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_maneja_tcs_lfs_line"><?php $tempOptionId = "id-opt-maneja_tcs_lfs" . $sc_seq_vert . "-3"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-maneja_tcs_lfs sc-ui-radio-maneja_tcs_lfs sc-js-input" type=radio name="maneja_tcs_lfs" value="LFS"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_maneja_tcs_lfs'][] = 'LFS'; ?>
<?php  if ("LFS" == $this->maneja_tcs_lfs)  { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_maneja_tcs_lfs_onclick();" ><label for="<?php echo $tempOptionId ?>">Lote, F. Vencimiento, Serial</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_maneja_tcs_lfs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_maneja_tcs_lfs_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['stockmen']))
    {
        $this->nm_new_label['stockmen'] = "Existencia:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $stockmen = $this->stockmen;
   $sStyleHidden_stockmen = '';
   if (isset($this->nmgp_cmp_hidden['stockmen']) && $this->nmgp_cmp_hidden['stockmen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['stockmen']);
       $sStyleHidden_stockmen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_stockmen = 'display: none;';
   $sStyleReadInp_stockmen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['stockmen']) && $this->nmgp_cmp_readonly['stockmen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['stockmen']);
       $sStyleReadLab_stockmen = '';
       $sStyleReadInp_stockmen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['stockmen']) && $this->nmgp_cmp_hidden['stockmen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stockmen" value="<?php echo $this->form_encode_input($stockmen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_stockmen_label" id="hidden_field_label_stockmen" style="<?php echo $sStyleHidden_stockmen; ?>"><span id="id_label_stockmen"><?php echo $this->nm_new_label['stockmen']; ?></span></TD>
    <TD class="scFormDataOdd css_stockmen_line" id="hidden_field_data_stockmen" style="<?php echo $sStyleHidden_stockmen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_stockmen_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="stockmen" value="<?php echo $this->form_encode_input($stockmen); ?>"><span id="id_ajax_label_stockmen"><?php echo nl2br($stockmen); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stockmen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stockmen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidmaymen']))
    {
        $this->nm_new_label['unidmaymen'] = "Maneja unidad Mayor y Menor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidmaymen = $this->unidmaymen;
   if (!isset($this->nmgp_cmp_hidden['unidmaymen']))
   {
       $this->nmgp_cmp_hidden['unidmaymen'] = 'off';
   }
   $sStyleHidden_unidmaymen = '';
   if (isset($this->nmgp_cmp_hidden['unidmaymen']) && $this->nmgp_cmp_hidden['unidmaymen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidmaymen']);
       $sStyleHidden_unidmaymen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidmaymen = 'display: none;';
   $sStyleReadInp_unidmaymen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidmaymen']) && $this->nmgp_cmp_readonly['unidmaymen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidmaymen']);
       $sStyleReadLab_unidmaymen = '';
       $sStyleReadInp_unidmaymen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidmaymen']) && $this->nmgp_cmp_hidden['unidmaymen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidmaymen" value="<?php echo $this->form_encode_input($unidmaymen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unidmaymen_label" id="hidden_field_label_unidmaymen" style="<?php echo $sStyleHidden_unidmaymen; ?>"><span id="id_label_unidmaymen"><?php echo $this->nm_new_label['unidmaymen']; ?></span></TD>
    <TD class="scFormDataOdd css_unidmaymen_line" id="hidden_field_data_unidmaymen" style="<?php echo $sStyleHidden_unidmaymen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidmaymen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidmaymen"]) &&  $this->nmgp_cmp_readonly["unidmaymen"] == "on") { 

 if ("NO" == $this->unidmaymen) { $unidmaymen_look = "NO";} 
 if ("SI" == $this->unidmaymen) { $unidmaymen_look = "SI";} 
?>
<input type="hidden" name="unidmaymen" value="<?php echo $this->form_encode_input($unidmaymen) . "\">" . $unidmaymen_look . ""; ?>
<?php } else { ?>

<?php

 if ("NO" == $this->unidmaymen) { $unidmaymen_look = "NO";} 
 if ("SI" == $this->unidmaymen) { $unidmaymen_look = "SI";} 
?>
<span id="id_read_on_unidmaymen"  class="css_unidmaymen_line" style="<?php echo $sStyleReadLab_unidmaymen; ?>"><?php echo $this->form_format_readonly("unidmaymen", $this->form_encode_input($unidmaymen_look)); ?></span><span id="id_read_off_unidmaymen" class="css_read_off_unidmaymen css_unidmaymen_line" style="<?php echo $sStyleReadInp_unidmaymen; ?>"><div id="idAjaxRadio_unidmaymen" style="display: inline-block"  class="css_unidmaymen_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_unidmaymen_line"><?php $tempOptionId = "id-opt-unidmaymen" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-unidmaymen sc-ui-radio-unidmaymen sc-js-input" type=radio name="unidmaymen" value="NO"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidmaymen'][] = 'NO'; ?>
<?php  if ("NO" == $this->unidmaymen)  { echo " checked" ;} ?><?php  if (empty($this->unidmaymen)) { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_unidmaymen_onclick();" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_unidmaymen_line"><?php $tempOptionId = "id-opt-unidmaymen" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-unidmaymen sc-ui-radio-unidmaymen sc-js-input" type=radio name="unidmaymen" value="SI"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidmaymen'][] = 'SI'; ?>
<?php  if ("SI" == $this->unidmaymen)  { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_unidmaymen_onclick();" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidmaymen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidmaymen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unimay']))
    {
        $this->nm_new_label['unimay'] = "Unidad Mayor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unimay = $this->unimay;
   if (!isset($this->nmgp_cmp_hidden['unimay']))
   {
       $this->nmgp_cmp_hidden['unimay'] = 'off';
   }
   $sStyleHidden_unimay = '';
   if (isset($this->nmgp_cmp_hidden['unimay']) && $this->nmgp_cmp_hidden['unimay'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unimay']);
       $sStyleHidden_unimay = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unimay = 'display: none;';
   $sStyleReadInp_unimay = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unimay']) && $this->nmgp_cmp_readonly['unimay'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unimay']);
       $sStyleReadLab_unimay = '';
       $sStyleReadInp_unimay = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unimay']) && $this->nmgp_cmp_hidden['unimay'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unimay" value="<?php echo $this->form_encode_input($unimay) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unimay_label" id="hidden_field_label_unimay" style="<?php echo $sStyleHidden_unimay; ?>"><span id="id_label_unimay"><?php echo $this->nm_new_label['unimay']; ?></span></TD>
    <TD class="scFormDataOdd css_unimay_line" id="hidden_field_data_unimay" style="<?php echo $sStyleHidden_unimay; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unimay_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unimay"]) &&  $this->nmgp_cmp_readonly["unimay"] == "on") { 

 ?>
<input type="hidden" name="unimay" value="<?php echo $this->form_encode_input($unimay) . "\">" . $unimay . ""; ?>
<?php } else { ?>
<span id="id_read_on_unimay" class="sc-ui-readonly-unimay css_unimay_line" style="<?php echo $sStyleReadLab_unimay; ?>"><?php echo $this->form_format_readonly("unimay", $this->form_encode_input($this->unimay)); ?></span><span id="id_read_off_unimay" class="css_read_off_unimay<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unimay; ?>">
 <input class="sc-js-input scFormObjectOdd css_unimay_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unimay" type=text name="unimay" value="<?php echo $this->form_encode_input($unimay) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ej: docena, caja, arroba, etc', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unimay_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unimay_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unimen']))
    {
        $this->nm_new_label['unimen'] = "Unidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unimen = $this->unimen;
   if (!isset($this->nmgp_cmp_hidden['unimen']))
   {
       $this->nmgp_cmp_hidden['unimen'] = 'off';
   }
   $sStyleHidden_unimen = '';
   if (isset($this->nmgp_cmp_hidden['unimen']) && $this->nmgp_cmp_hidden['unimen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unimen']);
       $sStyleHidden_unimen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unimen = 'display: none;';
   $sStyleReadInp_unimen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unimen']) && $this->nmgp_cmp_readonly['unimen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unimen']);
       $sStyleReadLab_unimen = '';
       $sStyleReadInp_unimen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unimen']) && $this->nmgp_cmp_hidden['unimen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unimen" value="<?php echo $this->form_encode_input($unimen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unimen_label" id="hidden_field_label_unimen" style="<?php echo $sStyleHidden_unimen; ?>"><span id="id_label_unimen"><?php echo $this->nm_new_label['unimen']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['unimen']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['php_cmp_required']['unimen'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_unimen_line" id="hidden_field_data_unimen" style="<?php echo $sStyleHidden_unimen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unimen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unimen"]) &&  $this->nmgp_cmp_readonly["unimen"] == "on") { 

 ?>
<input type="hidden" name="unimen" value="<?php echo $this->form_encode_input($unimen) . "\">" . $unimen . ""; ?>
<?php } else { ?>
<span id="id_read_on_unimen" class="sc-ui-readonly-unimen css_unimen_line" style="<?php echo $sStyleReadLab_unimen; ?>"><?php echo $this->form_format_readonly("unimen", $this->form_encode_input($this->unimen)); ?></span><span id="id_read_off_unimen" class="css_read_off_unimen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unimen; ?>">
 <input class="sc-js-input scFormObjectOdd css_unimen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unimen" type=text name="unimen" value="<?php echo $this->form_encode_input($unimen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ej: unidad, kilo, gramos, etc', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unimen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unimen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidad_ma']))
    {
        $this->nm_new_label['unidad_ma'] = "Unidad Mayor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidad_ma = $this->unidad_ma;
   if (!isset($this->nmgp_cmp_hidden['unidad_ma']))
   {
       $this->nmgp_cmp_hidden['unidad_ma'] = 'off';
   }
   $sStyleHidden_unidad_ma = '';
   if (isset($this->nmgp_cmp_hidden['unidad_ma']) && $this->nmgp_cmp_hidden['unidad_ma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidad_ma']);
       $sStyleHidden_unidad_ma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidad_ma = 'display: none;';
   $sStyleReadInp_unidad_ma = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidad_ma']) && $this->nmgp_cmp_readonly['unidad_ma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidad_ma']);
       $sStyleReadLab_unidad_ma = '';
       $sStyleReadInp_unidad_ma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidad_ma']) && $this->nmgp_cmp_hidden['unidad_ma'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidad_ma" value="<?php echo $this->form_encode_input($unidad_ma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unidad_ma_label" id="hidden_field_label_unidad_ma" style="<?php echo $sStyleHidden_unidad_ma; ?>"><span id="id_label_unidad_ma"><?php echo $this->nm_new_label['unidad_ma']; ?></span></TD>
    <TD class="scFormDataOdd css_unidad_ma_line" id="hidden_field_data_unidad_ma" style="<?php echo $sStyleHidden_unidad_ma; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidad_ma_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidad_ma"]) &&  $this->nmgp_cmp_readonly["unidad_ma"] == "on") { 

 ?>
<input type="hidden" name="unidad_ma" value="<?php echo $this->form_encode_input($unidad_ma) . "\">" . $unidad_ma . ""; ?>
<?php } else { ?>

<?php
$aRecData['unidad_ma'] = $this->unidad_ma;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   $nm_comando = "SELECT codigo_um, descripcion_um FROM unidades_medida WHERE codigo_um = '" . substr($this->Db->qstr($this->unidad_ma), 1, -1) . "' ORDER BY descripcion_um";

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->unidad_ma])) ? $aLookup[0][$this->unidad_ma] : $this->unidad_ma;
$unidad_ma_look = (isset($aLookup[0][$this->unidad_ma])) ? $aLookup[0][$this->unidad_ma] : $this->unidad_ma;
?>
<span id="id_read_on_unidad_ma" class="sc-ui-readonly-unidad_ma css_unidad_ma_line" style="<?php echo $sStyleReadLab_unidad_ma; ?>"><?php echo $this->form_format_readonly("unidad_ma", str_replace("<", "&lt;", $unidad_ma_look)); ?></span><span id="id_read_off_unidad_ma" class="css_read_off_unidad_ma<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unidad_ma; ?>">
 <input class="sc-js-input scFormObjectOdd css_unidad_ma_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_unidad_ma" type=text name="unidad_ma" value="<?php echo $this->form_encode_input($unidad_ma) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 style="display: none" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['unidad_ma'] = $this->unidad_ma;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   $nm_comando = "SELECT codigo_um, descripcion_um FROM unidades_medida WHERE codigo_um = '" . substr($this->Db->qstr($this->unidad_ma), 1, -1) . "' ORDER BY descripcion_um";

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_ma'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->unidad_ma])) ? $aLookup[0][$this->unidad_ma] : '';
$unidad_ma_look = (isset($aLookup[0][$this->unidad_ma])) ? $aLookup[0][$this->unidad_ma] : '';
?>
<select id="id_ac_unidad_ma" class="scFormObjectOdd sc-ui-autocomp-unidad_ma css_unidad_ma_obj sc-js-input"><?php if ('' != $this->unidad_ma) { ?><option value="<?php echo $this->unidad_ma ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad_ma_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad_ma_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidad_']))
    {
        $this->nm_new_label['unidad_'] = "Unidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidad_ = $this->unidad_;
   $sStyleHidden_unidad_ = '';
   if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidad_']);
       $sStyleHidden_unidad_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidad_ = 'display: none;';
   $sStyleReadInp_unidad_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidad_']) && $this->nmgp_cmp_readonly['unidad_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidad_']);
       $sStyleReadLab_unidad_ = '';
       $sStyleReadInp_unidad_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidad_" value="<?php echo $this->form_encode_input($unidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unidad__label" id="hidden_field_label_unidad_" style="<?php echo $sStyleHidden_unidad_; ?>"><span id="id_label_unidad_"><?php echo $this->nm_new_label['unidad_']; ?></span></TD>
    <TD class="scFormDataOdd css_unidad__line" id="hidden_field_data_unidad_" style="<?php echo $sStyleHidden_unidad_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidad_"]) &&  $this->nmgp_cmp_readonly["unidad_"] == "on") { 

 ?>
<input type="hidden" name="unidad_" value="<?php echo $this->form_encode_input($unidad_) . "\">" . $unidad_ . ""; ?>
<?php } else { ?>

<?php
$aRecData['unidad_'] = $this->unidad_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   $nm_comando = "SELECT codigo_um, descripcion_um FROM unidades_medida WHERE codigo_um = '" . substr($this->Db->qstr($this->unidad_), 1, -1) . "' ORDER BY descripcion_um";

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->unidad_])) ? $aLookup[0][$this->unidad_] : $this->unidad_;
$unidad__look = (isset($aLookup[0][$this->unidad_])) ? $aLookup[0][$this->unidad_] : $this->unidad_;
?>
<span id="id_read_on_unidad_" class="sc-ui-readonly-unidad_ css_unidad__line" style="<?php echo $sStyleReadLab_unidad_; ?>"><?php echo $this->form_format_readonly("unidad_", str_replace("<", "&lt;", $unidad__look)); ?></span><span id="id_read_off_unidad_" class="css_read_off_unidad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unidad_; ?>">
 <input class="sc-js-input scFormObjectOdd css_unidad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_unidad_" type=text name="unidad_" value="<?php echo $this->form_encode_input($unidad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> maxlength=20 style="display: none" alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['unidad_'] = $this->unidad_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   $nm_comando = "SELECT codigo_um, descripcion_um FROM unidades_medida WHERE codigo_um = '" . substr($this->Db->qstr($this->unidad_), 1, -1) . "' ORDER BY descripcion_um";

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_unidad_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->unidad_])) ? $aLookup[0][$this->unidad_] : '';
$unidad__look = (isset($aLookup[0][$this->unidad_])) ? $aLookup[0][$this->unidad_] : '';
?>
<select id="id_ac_unidad_" class="scFormObjectOdd sc-ui-autocomp-unidad_ css_unidad__obj sc-js-input"><?php if ('' != $this->unidad_) { ?><option value="<?php echo $this->unidad_ ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['multiple_escala']))
    {
        $this->nm_new_label['multiple_escala'] = "Multiple Escala";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $multiple_escala = $this->multiple_escala;
   if (!isset($this->nmgp_cmp_hidden['multiple_escala']))
   {
       $this->nmgp_cmp_hidden['multiple_escala'] = 'off';
   }
   $sStyleHidden_multiple_escala = '';
   if (isset($this->nmgp_cmp_hidden['multiple_escala']) && $this->nmgp_cmp_hidden['multiple_escala'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['multiple_escala']);
       $sStyleHidden_multiple_escala = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_multiple_escala = 'display: none;';
   $sStyleReadInp_multiple_escala = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['multiple_escala']) && $this->nmgp_cmp_readonly['multiple_escala'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['multiple_escala']);
       $sStyleReadLab_multiple_escala = '';
       $sStyleReadInp_multiple_escala = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['multiple_escala']) && $this->nmgp_cmp_hidden['multiple_escala'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="multiple_escala" value="<?php echo $this->form_encode_input($multiple_escala) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_multiple_escala_label" id="hidden_field_label_multiple_escala" style="<?php echo $sStyleHidden_multiple_escala; ?>"><span id="id_label_multiple_escala"><?php echo $this->nm_new_label['multiple_escala']; ?></span></TD>
    <TD class="scFormDataOdd css_multiple_escala_line" id="hidden_field_data_multiple_escala" style="<?php echo $sStyleHidden_multiple_escala; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_multiple_escala_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["multiple_escala"]) &&  $this->nmgp_cmp_readonly["multiple_escala"] == "on") { 

 if ("NO" == $this->multiple_escala) { $multiple_escala_look = "NO";} 
 if ("SI" == $this->multiple_escala) { $multiple_escala_look = "SI";} 
?>
<input type="hidden" name="multiple_escala" value="<?php echo $this->form_encode_input($multiple_escala) . "\">" . $multiple_escala_look . ""; ?>
<?php } else { ?>

<?php

 if ("NO" == $this->multiple_escala) { $multiple_escala_look = "NO";} 
 if ("SI" == $this->multiple_escala) { $multiple_escala_look = "SI";} 
?>
<span id="id_read_on_multiple_escala"  class="css_multiple_escala_line" style="<?php echo $sStyleReadLab_multiple_escala; ?>"><?php echo $this->form_format_readonly("multiple_escala", $this->form_encode_input($multiple_escala_look)); ?></span><span id="id_read_off_multiple_escala" class="css_read_off_multiple_escala css_multiple_escala_line" style="<?php echo $sStyleReadInp_multiple_escala; ?>"><div id="idAjaxRadio_multiple_escala" style="display: inline-block"  class="css_multiple_escala_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_multiple_escala_line"><?php $tempOptionId = "id-opt-multiple_escala" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-multiple_escala sc-ui-radio-multiple_escala sc-js-input" type=radio name="multiple_escala" value="NO"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_multiple_escala'][] = 'NO'; ?>
<?php  if ("NO" == $this->multiple_escala)  { echo " checked" ;} ?><?php  if (empty($this->multiple_escala)) { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_multiple_escala_onclick();" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_multiple_escala_line"><?php $tempOptionId = "id-opt-multiple_escala" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-multiple_escala sc-ui-radio-multiple_escala sc-js-input" type=radio name="multiple_escala" value="SI"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_multiple_escala'][] = 'SI'; ?>
<?php  if ("SI" == $this->multiple_escala)  { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_multiple_escala_onclick();" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_multiple_escala_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_multiple_escala_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['en_base_a']))
    {
        $this->nm_new_label['en_base_a'] = "En base a Unidad:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $en_base_a = $this->en_base_a;
   if (!isset($this->nmgp_cmp_hidden['en_base_a']))
   {
       $this->nmgp_cmp_hidden['en_base_a'] = 'off';
   }
   $sStyleHidden_en_base_a = '';
   if (isset($this->nmgp_cmp_hidden['en_base_a']) && $this->nmgp_cmp_hidden['en_base_a'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['en_base_a']);
       $sStyleHidden_en_base_a = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_en_base_a = 'display: none;';
   $sStyleReadInp_en_base_a = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['en_base_a']) && $this->nmgp_cmp_readonly['en_base_a'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['en_base_a']);
       $sStyleReadLab_en_base_a = '';
       $sStyleReadInp_en_base_a = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['en_base_a']) && $this->nmgp_cmp_hidden['en_base_a'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="en_base_a" value="<?php echo $this->form_encode_input($en_base_a) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_en_base_a_label" id="hidden_field_label_en_base_a" style="<?php echo $sStyleHidden_en_base_a; ?>"><span id="id_label_en_base_a"><?php echo $this->nm_new_label['en_base_a']; ?></span></TD>
    <TD class="scFormDataOdd css_en_base_a_line" id="hidden_field_data_en_base_a" style="<?php echo $sStyleHidden_en_base_a; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_en_base_a_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["en_base_a"]) &&  $this->nmgp_cmp_readonly["en_base_a"] == "on") { 

 if ("UMAY" == $this->en_base_a) { $en_base_a_look = "UNIDAD MAYOR";} 
 if ("UMEN" == $this->en_base_a) { $en_base_a_look = "UNIDAD";} 
?>
<input type="hidden" name="en_base_a" value="<?php echo $this->form_encode_input($en_base_a) . "\">" . $en_base_a_look . ""; ?>
<?php } else { ?>

<?php

 if ("UMAY" == $this->en_base_a) { $en_base_a_look = "UNIDAD MAYOR";} 
 if ("UMEN" == $this->en_base_a) { $en_base_a_look = "UNIDAD";} 
?>
<span id="id_read_on_en_base_a"  class="css_en_base_a_line" style="<?php echo $sStyleReadLab_en_base_a; ?>"><?php echo $this->form_format_readonly("en_base_a", $this->form_encode_input($en_base_a_look)); ?></span><span id="id_read_off_en_base_a" class="css_read_off_en_base_a css_en_base_a_line" style="<?php echo $sStyleReadInp_en_base_a; ?>"><div id="idAjaxRadio_en_base_a" style="display: inline-block"  class="css_en_base_a_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_en_base_a_line"><?php $tempOptionId = "id-opt-en_base_a" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-en_base_a sc-ui-radio-en_base_a sc-js-input" type=radio name="en_base_a" value="UMAY"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_en_base_a'][] = 'UMAY'; ?>
<?php  if ("UMAY" == $this->en_base_a)  { echo " checked" ;} ?><?php  if (empty($this->en_base_a)) { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_en_base_a_onclick();" ><label for="<?php echo $tempOptionId ?>">UNIDAD MAYOR</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_en_base_a_line"><?php $tempOptionId = "id-opt-en_base_a" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-en_base_a sc-ui-radio-en_base_a sc-js-input" type=radio name="en_base_a" value="UMEN"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_en_base_a'][] = 'UMEN'; ?>
<?php  if ("UMEN" == $this->en_base_a)  { echo " checked" ;} ?>  onClick="do_ajax_form_productos_mini_event_en_base_a_onclick();" ><label for="<?php echo $tempOptionId ?>">UNIDAD</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('en_base_a')", "nm_mostra_mens('en_base_a')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_en_base_a_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_en_base_a_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['costomen']))
    {
        $this->nm_new_label['costomen'] = "Costo compra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $costomen = $this->costomen;
   $sStyleHidden_costomen = '';
   if (isset($this->nmgp_cmp_hidden['costomen']) && $this->nmgp_cmp_hidden['costomen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['costomen']);
       $sStyleHidden_costomen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_costomen = 'display: none;';
   $sStyleReadInp_costomen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['costomen']) && $this->nmgp_cmp_readonly['costomen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['costomen']);
       $sStyleReadLab_costomen = '';
       $sStyleReadInp_costomen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['costomen']) && $this->nmgp_cmp_hidden['costomen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costomen" value="<?php echo $this->form_encode_input($costomen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_costomen_label" id="hidden_field_label_costomen" style="<?php echo $sStyleHidden_costomen; ?>"><span id="id_label_costomen"><?php echo $this->nm_new_label['costomen']; ?></span></TD>
    <TD class="scFormDataOdd css_costomen_line" id="hidden_field_data_costomen" style="<?php echo $sStyleHidden_costomen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_costomen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costomen"]) &&  $this->nmgp_cmp_readonly["costomen"] == "on") { 

 ?>
<input type="hidden" name="costomen" value="<?php echo $this->form_encode_input($costomen) . "\">" . $costomen . ""; ?>
<?php } else { ?>
<span id="id_read_on_costomen" class="sc-ui-readonly-costomen css_costomen_line" style="<?php echo $sStyleReadLab_costomen; ?>"><?php echo $this->form_format_readonly("costomen", $this->form_encode_input($this->costomen)); ?></span><span id="id_read_off_costomen" class="css_read_off_costomen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costomen; ?>">
 <input class="sc-js-input scFormObjectOdd css_costomen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costomen" type=text name="costomen" value="<?php echo $this->form_encode_input($costomen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['costomen']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['costomen']['format_pos'] || 3 == $this->field_config['costomen']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['costomen']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['costomen']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['costomen']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['costomen']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('costomen')", "nm_mostra_mens('costomen')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costomen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costomen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['costo_prom']))
    {
        $this->nm_new_label['costo_prom'] = "Costo Promedio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $costo_prom = $this->costo_prom;
   if (!isset($this->nmgp_cmp_hidden['costo_prom']))
   {
       $this->nmgp_cmp_hidden['costo_prom'] = 'off';
   }
   $sStyleHidden_costo_prom = '';
   if (isset($this->nmgp_cmp_hidden['costo_prom']) && $this->nmgp_cmp_hidden['costo_prom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['costo_prom']);
       $sStyleHidden_costo_prom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_costo_prom = 'display: none;';
   $sStyleReadInp_costo_prom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['costo_prom']) && $this->nmgp_cmp_readonly['costo_prom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['costo_prom']);
       $sStyleReadLab_costo_prom = '';
       $sStyleReadInp_costo_prom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['costo_prom']) && $this->nmgp_cmp_hidden['costo_prom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costo_prom" value="<?php echo $this->form_encode_input($costo_prom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_costo_prom_label" id="hidden_field_label_costo_prom" style="<?php echo $sStyleHidden_costo_prom; ?>"><span id="id_label_costo_prom"><?php echo $this->nm_new_label['costo_prom']; ?></span></TD>
    <TD class="scFormDataOdd css_costo_prom_line" id="hidden_field_data_costo_prom" style="<?php echo $sStyleHidden_costo_prom; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_costo_prom_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="costo_prom" value="<?php echo $this->form_encode_input($costo_prom); ?>"><span id="id_ajax_label_costo_prom"><?php echo nl2br($costo_prom); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costo_prom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costo_prom_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['recmayamen']))
    {
        $this->nm_new_label['recmayamen'] = "Factor multiplicador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $recmayamen = $this->recmayamen;
   if (!isset($this->nmgp_cmp_hidden['recmayamen']))
   {
       $this->nmgp_cmp_hidden['recmayamen'] = 'off';
   }
   $sStyleHidden_recmayamen = '';
   if (isset($this->nmgp_cmp_hidden['recmayamen']) && $this->nmgp_cmp_hidden['recmayamen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['recmayamen']);
       $sStyleHidden_recmayamen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_recmayamen = 'display: none;';
   $sStyleReadInp_recmayamen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['recmayamen']) && $this->nmgp_cmp_readonly['recmayamen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['recmayamen']);
       $sStyleReadLab_recmayamen = '';
       $sStyleReadInp_recmayamen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['recmayamen']) && $this->nmgp_cmp_hidden['recmayamen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="recmayamen" value="<?php echo $this->form_encode_input($recmayamen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_recmayamen_label" id="hidden_field_label_recmayamen" style="<?php echo $sStyleHidden_recmayamen; ?>"><span id="id_label_recmayamen"><?php echo $this->nm_new_label['recmayamen']; ?></span></TD>
    <TD class="scFormDataOdd css_recmayamen_line" id="hidden_field_data_recmayamen" style="<?php echo $sStyleHidden_recmayamen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_recmayamen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["recmayamen"]) &&  $this->nmgp_cmp_readonly["recmayamen"] == "on") { 

 ?>
<input type="hidden" name="recmayamen" value="<?php echo $this->form_encode_input($recmayamen) . "\">" . $recmayamen . ""; ?>
<?php } else { ?>
<span id="id_read_on_recmayamen" class="sc-ui-readonly-recmayamen css_recmayamen_line" style="<?php echo $sStyleReadLab_recmayamen; ?>"><?php echo $this->form_format_readonly("recmayamen", $this->form_encode_input($this->recmayamen)); ?></span><span id="id_read_off_recmayamen" class="css_read_off_recmayamen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_recmayamen; ?>">
 <input class="sc-js-input scFormObjectOdd css_recmayamen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_recmayamen" type=text name="recmayamen" value="<?php echo $this->form_encode_input($recmayamen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['recmayamen']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['recmayamen']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['recmayamen']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '5, 10, 15, etc', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_recmayamen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_recmayamen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idiva']))
   {
       $this->nm_new_label['idiva'] = "Impuesto";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idiva = $this->idiva;
   $sStyleHidden_idiva = '';
   if (isset($this->nmgp_cmp_hidden['idiva']) && $this->nmgp_cmp_hidden['idiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idiva']);
       $sStyleHidden_idiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idiva = 'display: none;';
   $sStyleReadInp_idiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idiva']) && $this->nmgp_cmp_readonly['idiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idiva']);
       $sStyleReadLab_idiva = '';
       $sStyleReadInp_idiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idiva']) && $this->nmgp_cmp_hidden['idiva'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idiva" value="<?php echo $this->form_encode_input($this->idiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idiva_label" id="hidden_field_label_idiva" style="<?php echo $sStyleHidden_idiva; ?>"><span id="id_label_idiva"><?php echo $this->nm_new_label['idiva']; ?></span></TD>
    <TD class="scFormDataOdd css_idiva_line" id="hidden_field_data_idiva" style="<?php echo $sStyleHidden_idiva; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idiva_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idiva"]) &&  $this->nmgp_cmp_readonly["idiva"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva'] = array(); 
    }

   $old_value_otro2 = $this->otro2;
   $old_value_stockmen = $this->stockmen;
   $old_value_costomen = $this->costomen;
   $old_value_costo_prom = $this->costo_prom;
   $old_value_recmayamen = $this->recmayamen;
   $old_value_existencia = $this->existencia;
   $old_value_preciofull = $this->preciofull;
   $old_value_precio2 = $this->precio2;
   $old_value_preciomay = $this->preciomay;
   $old_value_preciomen = $this->preciomen;
   $old_value_preciomen2 = $this->preciomen2;
   $old_value_preciomen3 = $this->preciomen3;
   $this->nm_tira_formatacao();


   $unformatted_value_otro2 = $this->otro2;
   $unformatted_value_stockmen = $this->stockmen;
   $unformatted_value_costomen = $this->costomen;
   $unformatted_value_costo_prom = $this->costo_prom;
   $unformatted_value_recmayamen = $this->recmayamen;
   $unformatted_value_existencia = $this->existencia;
   $unformatted_value_preciofull = $this->preciofull;
   $unformatted_value_precio2 = $this->precio2;
   $unformatted_value_preciomay = $this->preciomay;
   $unformatted_value_preciomen = $this->preciomen;
   $unformatted_value_preciomen2 = $this->preciomen2;
   $unformatted_value_preciomen3 = $this->preciomen3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idiva, trifa + ' - ' + tipo_impuesto  FROM iva  ORDER BY trifa, tipo_impuesto";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idiva, concat(trifa,' - ',tipo_impuesto)  FROM iva  ORDER BY trifa, tipo_impuesto";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idiva, trifa&' - '&tipo_impuesto  FROM iva  ORDER BY trifa, tipo_impuesto";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idiva, trifa||' - '||tipo_impuesto  FROM iva  ORDER BY trifa, tipo_impuesto";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idiva, trifa + ' - ' + tipo_impuesto  FROM iva  ORDER BY trifa, tipo_impuesto";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idiva, trifa||' - '||tipo_impuesto  FROM iva  ORDER BY trifa, tipo_impuesto";
   }
   else
   {
       $nm_comando = "SELECT idiva, trifa||' - '||tipo_impuesto  FROM iva  ORDER BY trifa, tipo_impuesto";
   }

   $this->otro2 = $old_value_otro2;
   $this->stockmen = $old_value_stockmen;
   $this->costomen = $old_value_costomen;
   $this->costo_prom = $old_value_costo_prom;
   $this->recmayamen = $old_value_recmayamen;
   $this->existencia = $old_value_existencia;
   $this->preciofull = $old_value_preciofull;
   $this->precio2 = $old_value_precio2;
   $this->preciomay = $old_value_preciomay;
   $this->preciomen = $old_value_preciomen;
   $this->preciomen2 = $old_value_preciomen2;
   $this->preciomen3 = $old_value_preciomen3;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_idiva'][] = $rs->fields[0];
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
   $idiva_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idiva_1))
          {
              foreach ($this->idiva_1 as $tmp_idiva)
              {
                  if (trim($tmp_idiva) === trim($cadaselect[1])) { $idiva_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idiva) === trim($cadaselect[1])) { $idiva_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idiva" value="<?php echo $this->form_encode_input($idiva) . "\">" . $idiva_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idiva();
   $x = 0 ; 
   $idiva_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idiva_1))
          {
              foreach ($this->idiva_1 as $tmp_idiva)
              {
                  if (trim($tmp_idiva) === trim($cadaselect[1])) { $idiva_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idiva) === trim($cadaselect[1])) { $idiva_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idiva_look))
          {
              $idiva_look = $this->idiva;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idiva\" class=\"css_idiva_line\" style=\"" .  $sStyleReadLab_idiva . "\">" . $this->form_format_readonly("idiva", $this->form_encode_input($idiva_look)) . "</span><span id=\"id_read_off_idiva\" class=\"css_read_off_idiva" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idiva . "\">";
   echo " <span id=\"idAjaxSelect_idiva\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idiva_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idiva\" name=\"idiva\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idiva) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idiva)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idiva_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['existencia']))
    {
        $this->nm_new_label['existencia'] = "Existencia en unidad menor:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $existencia = $this->existencia;
   if (!isset($this->nmgp_cmp_hidden['existencia']))
   {
       $this->nmgp_cmp_hidden['existencia'] = 'off';
   }
   $sStyleHidden_existencia = '';
   if (isset($this->nmgp_cmp_hidden['existencia']) && $this->nmgp_cmp_hidden['existencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['existencia']);
       $sStyleHidden_existencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_existencia = 'display: none;';
   $sStyleReadInp_existencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['existencia']) && $this->nmgp_cmp_readonly['existencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['existencia']);
       $sStyleReadLab_existencia = '';
       $sStyleReadInp_existencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['existencia']) && $this->nmgp_cmp_hidden['existencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="existencia" value="<?php echo $this->form_encode_input($existencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_existencia_label" id="hidden_field_label_existencia" style="<?php echo $sStyleHidden_existencia; ?>"><span id="id_label_existencia"><?php echo $this->nm_new_label['existencia']; ?></span></TD>
    <TD class="scFormDataOdd css_existencia_line" id="hidden_field_data_existencia" style="<?php echo $sStyleHidden_existencia; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_existencia_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="existencia" value="<?php echo $this->form_encode_input($existencia); ?>"><span id="id_ajax_label_existencia"><?php echo nl2br($existencia); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_existencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_existencia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['u_menor']))
    {
        $this->nm_new_label['u_menor'] = "U. Menor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $u_menor = $this->u_menor;
   if (!isset($this->nmgp_cmp_hidden['u_menor']))
   {
       $this->nmgp_cmp_hidden['u_menor'] = 'off';
   }
   $sStyleHidden_u_menor = '';
   if (isset($this->nmgp_cmp_hidden['u_menor']) && $this->nmgp_cmp_hidden['u_menor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['u_menor']);
       $sStyleHidden_u_menor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_u_menor = 'display: none;';
   $sStyleReadInp_u_menor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['u_menor']) && $this->nmgp_cmp_readonly['u_menor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['u_menor']);
       $sStyleReadLab_u_menor = '';
       $sStyleReadInp_u_menor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['u_menor']) && $this->nmgp_cmp_hidden['u_menor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="u_menor" value="<?php echo $this->form_encode_input($u_menor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_u_menor_label" id="hidden_field_label_u_menor" style="<?php echo $sStyleHidden_u_menor; ?>"><span id="id_label_u_menor"><?php echo $this->nm_new_label['u_menor']; ?></span></TD>
    <TD class="scFormDataOdd css_u_menor_line" id="hidden_field_data_u_menor" style="<?php echo $sStyleHidden_u_menor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_u_menor_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="u_menor" value="<?php echo $this->form_encode_input($u_menor); ?>"><span id="id_ajax_label_u_menor"><?php echo nl2br($u_menor); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_u_menor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_u_menor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['activo']))
    {
        $this->nm_new_label['activo'] = "Activo";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['activo']) && $this->nmgp_cmp_hidden['activo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_activo_label" id="hidden_field_label_activo" style="<?php echo $sStyleHidden_activo; ?>"><span id="id_label_activo"><?php echo $this->nm_new_label['activo']; ?></span></TD>
    <TD class="scFormDataOdd css_activo_line" id="hidden_field_data_activo" style="<?php echo $sStyleHidden_activo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activo"]) &&  $this->nmgp_cmp_readonly["activo"] == "on") { 

 if ("SI" == $this->activo) { $activo_look = "SI";} 
 if ("NO" == $this->activo) { $activo_look = "NO";} 
?>
<input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo) . "\">" . $activo_look . ""; ?>
<?php } else { ?>

<?php

 if ("SI" == $this->activo) { $activo_look = "SI";} 
 if ("NO" == $this->activo) { $activo_look = "NO";} 
?>
<span id="id_read_on_activo"  class="css_activo_line" style="<?php echo $sStyleReadLab_activo; ?>"><?php echo $this->form_format_readonly("activo", $this->form_encode_input($activo_look)); ?></span><span id="id_read_off_activo" class="css_read_off_activo css_activo_line" style="<?php echo $sStyleReadInp_activo; ?>"><div id="idAjaxRadio_activo" style="display: inline-block"  class="css_activo_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_activo_line"><?php $tempOptionId = "id-opt-activo" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-activo sc-ui-radio-activo sc-js-input" type=radio name="activo" value="SI"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_activo'][] = 'SI'; ?>
<?php  if ("SI" == $this->activo)  { echo " checked" ;} ?><?php  if (empty($this->activo)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_activo_line"><?php $tempOptionId = "id-opt-activo" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-activo sc-ui-radio-activo sc-js-input" type=radio name="activo" value="NO"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['Lookup_activo'][] = 'NO'; ?>
<?php  if ("NO" == $this->activo)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="80%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciofull']))
    {
        $this->nm_new_label['preciofull'] = "Preciofull";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciofull = $this->preciofull;
   if (!isset($this->nmgp_cmp_hidden['preciofull']))
   {
       $this->nmgp_cmp_hidden['preciofull'] = 'off';
   }
   $sStyleHidden_preciofull = '';
   if (isset($this->nmgp_cmp_hidden['preciofull']) && $this->nmgp_cmp_hidden['preciofull'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciofull']);
       $sStyleHidden_preciofull = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciofull = 'display: none;';
   $sStyleReadInp_preciofull = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciofull']) && $this->nmgp_cmp_readonly['preciofull'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciofull']);
       $sStyleReadLab_preciofull = '';
       $sStyleReadInp_preciofull = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciofull']) && $this->nmgp_cmp_hidden['preciofull'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciofull" value="<?php echo $this->form_encode_input($preciofull) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciofull_label" id="hidden_field_label_preciofull" style="<?php echo $sStyleHidden_preciofull; ?>"><span id="id_label_preciofull"><?php echo $this->nm_new_label['preciofull']; ?></span></TD>
    <TD class="scFormDataOdd css_preciofull_line" id="hidden_field_data_preciofull" style="<?php echo $sStyleHidden_preciofull; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciofull_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciofull"]) &&  $this->nmgp_cmp_readonly["preciofull"] == "on") { 

 ?>
<input type="hidden" name="preciofull" value="<?php echo $this->form_encode_input($preciofull) . "\">" . $preciofull . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciofull" class="sc-ui-readonly-preciofull css_preciofull_line" style="<?php echo $sStyleReadLab_preciofull; ?>"><?php echo $this->form_format_readonly("preciofull", $this->form_encode_input($this->preciofull)); ?></span><span id="id_read_off_preciofull" class="css_read_off_preciofull<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciofull; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciofull_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciofull" type=text name="preciofull" value="<?php echo $this->form_encode_input($preciofull) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciofull']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciofull']['format_pos'] || 3 == $this->field_config['preciofull']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciofull']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciofull']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciofull']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciofull']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciofull_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciofull_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['precio2']))
    {
        $this->nm_new_label['precio2'] = "Precio especial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio2 = $this->precio2;
   if (!isset($this->nmgp_cmp_hidden['precio2']))
   {
       $this->nmgp_cmp_hidden['precio2'] = 'off';
   }
   $sStyleHidden_precio2 = '';
   if (isset($this->nmgp_cmp_hidden['precio2']) && $this->nmgp_cmp_hidden['precio2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio2']);
       $sStyleHidden_precio2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio2 = 'display: none;';
   $sStyleReadInp_precio2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio2']) && $this->nmgp_cmp_readonly['precio2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio2']);
       $sStyleReadLab_precio2 = '';
       $sStyleReadInp_precio2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio2']) && $this->nmgp_cmp_hidden['precio2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio2" value="<?php echo $this->form_encode_input($precio2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio2_label" id="hidden_field_label_precio2" style="<?php echo $sStyleHidden_precio2; ?>"><span id="id_label_precio2"><?php echo $this->nm_new_label['precio2']; ?></span></TD>
    <TD class="scFormDataOdd css_precio2_line" id="hidden_field_data_precio2" style="<?php echo $sStyleHidden_precio2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio2"]) &&  $this->nmgp_cmp_readonly["precio2"] == "on") { 

 ?>
<input type="hidden" name="precio2" value="<?php echo $this->form_encode_input($precio2) . "\">" . $precio2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio2" class="sc-ui-readonly-precio2 css_precio2_line" style="<?php echo $sStyleReadLab_precio2; ?>"><?php echo $this->form_format_readonly("precio2", $this->form_encode_input($this->precio2)); ?></span><span id="id_read_off_precio2" class="css_read_off_precio2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio2; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio2" type=text name="precio2" value="<?php echo $this->form_encode_input($precio2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['precio2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['precio2']['format_pos'] || 3 == $this->field_config['precio2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['preciomay']))
    {
        $this->nm_new_label['preciomay'] = "Precio venta al mayor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomay = $this->preciomay;
   if (!isset($this->nmgp_cmp_hidden['preciomay']))
   {
       $this->nmgp_cmp_hidden['preciomay'] = 'off';
   }
   $sStyleHidden_preciomay = '';
   if (isset($this->nmgp_cmp_hidden['preciomay']) && $this->nmgp_cmp_hidden['preciomay'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomay']);
       $sStyleHidden_preciomay = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomay = 'display: none;';
   $sStyleReadInp_preciomay = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomay']) && $this->nmgp_cmp_readonly['preciomay'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomay']);
       $sStyleReadLab_preciomay = '';
       $sStyleReadInp_preciomay = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomay']) && $this->nmgp_cmp_hidden['preciomay'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomay" value="<?php echo $this->form_encode_input($preciomay) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomay_label" id="hidden_field_label_preciomay" style="<?php echo $sStyleHidden_preciomay; ?>"><span id="id_label_preciomay"><?php echo $this->nm_new_label['preciomay']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomay_line" id="hidden_field_data_preciomay" style="<?php echo $sStyleHidden_preciomay; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomay_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomay"]) &&  $this->nmgp_cmp_readonly["preciomay"] == "on") { 

 ?>
<input type="hidden" name="preciomay" value="<?php echo $this->form_encode_input($preciomay) . "\">" . $preciomay . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomay" class="sc-ui-readonly-preciomay css_preciomay_line" style="<?php echo $sStyleReadLab_preciomay; ?>"><?php echo $this->form_format_readonly("preciomay", $this->form_encode_input($this->preciomay)); ?></span><span id="id_read_off_preciomay" class="css_read_off_preciomay<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomay; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomay_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomay" type=text name="preciomay" value="<?php echo $this->form_encode_input($preciomay) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomay']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomay']['format_pos'] || 3 == $this->field_config['preciomay']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomay']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomay']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomay']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomay']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomay_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomay_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['preciomen']))
    {
        $this->nm_new_label['preciomen'] = "Precio venta menudeo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomen = $this->preciomen;
   $sStyleHidden_preciomen = '';
   if (isset($this->nmgp_cmp_hidden['preciomen']) && $this->nmgp_cmp_hidden['preciomen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomen']);
       $sStyleHidden_preciomen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomen = 'display: none;';
   $sStyleReadInp_preciomen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomen']) && $this->nmgp_cmp_readonly['preciomen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomen']);
       $sStyleReadLab_preciomen = '';
       $sStyleReadInp_preciomen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomen']) && $this->nmgp_cmp_hidden['preciomen'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen" value="<?php echo $this->form_encode_input($preciomen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomen_label" id="hidden_field_label_preciomen" style="<?php echo $sStyleHidden_preciomen; ?>"><span id="id_label_preciomen"><?php echo $this->nm_new_label['preciomen']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomen_line" id="hidden_field_data_preciomen" style="<?php echo $sStyleHidden_preciomen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen"]) &&  $this->nmgp_cmp_readonly["preciomen"] == "on") { 

 ?>
<input type="hidden" name="preciomen" value="<?php echo $this->form_encode_input($preciomen) . "\">" . $preciomen . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen" class="sc-ui-readonly-preciomen css_preciomen_line" style="<?php echo $sStyleReadLab_preciomen; ?>"><?php echo $this->form_format_readonly("preciomen", $this->form_encode_input($this->preciomen)); ?></span><span id="id_read_off_preciomen" class="css_read_off_preciomen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen" type=text name="preciomen" value="<?php echo $this->form_encode_input($preciomen) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen']['format_pos'] || 3 == $this->field_config['preciomen']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(.000)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['preciomen2']))
    {
        $this->nm_new_label['preciomen2'] = "Precio especial menudeo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomen2 = $this->preciomen2;
   $sStyleHidden_preciomen2 = '';
   if (isset($this->nmgp_cmp_hidden['preciomen2']) && $this->nmgp_cmp_hidden['preciomen2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomen2']);
       $sStyleHidden_preciomen2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomen2 = 'display: none;';
   $sStyleReadInp_preciomen2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomen2']) && $this->nmgp_cmp_readonly['preciomen2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomen2']);
       $sStyleReadLab_preciomen2 = '';
       $sStyleReadInp_preciomen2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomen2']) && $this->nmgp_cmp_hidden['preciomen2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen2" value="<?php echo $this->form_encode_input($preciomen2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomen2_label" id="hidden_field_label_preciomen2" style="<?php echo $sStyleHidden_preciomen2; ?>"><span id="id_label_preciomen2"><?php echo $this->nm_new_label['preciomen2']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomen2_line" id="hidden_field_data_preciomen2" style="<?php echo $sStyleHidden_preciomen2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomen2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen2"]) &&  $this->nmgp_cmp_readonly["preciomen2"] == "on") { 

 ?>
<input type="hidden" name="preciomen2" value="<?php echo $this->form_encode_input($preciomen2) . "\">" . $preciomen2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen2" class="sc-ui-readonly-preciomen2 css_preciomen2_line" style="<?php echo $sStyleReadLab_preciomen2; ?>"><?php echo $this->form_format_readonly("preciomen2", $this->form_encode_input($this->preciomen2)); ?></span><span id="id_read_off_preciomen2" class="css_read_off_preciomen2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen2; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomen2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen2" type=text name="preciomen2" value="<?php echo $this->form_encode_input($preciomen2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen2']['format_pos'] || 3 == $this->field_config['preciomen2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['preciomen3']))
    {
        $this->nm_new_label['preciomen3'] = "Precio al mayor menudeo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $preciomen3 = $this->preciomen3;
   $sStyleHidden_preciomen3 = '';
   if (isset($this->nmgp_cmp_hidden['preciomen3']) && $this->nmgp_cmp_hidden['preciomen3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['preciomen3']);
       $sStyleHidden_preciomen3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_preciomen3 = 'display: none;';
   $sStyleReadInp_preciomen3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['preciomen3']) && $this->nmgp_cmp_readonly['preciomen3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['preciomen3']);
       $sStyleReadLab_preciomen3 = '';
       $sStyleReadInp_preciomen3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['preciomen3']) && $this->nmgp_cmp_hidden['preciomen3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen3" value="<?php echo $this->form_encode_input($preciomen3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_preciomen3_label" id="hidden_field_label_preciomen3" style="<?php echo $sStyleHidden_preciomen3; ?>"><span id="id_label_preciomen3"><?php echo $this->nm_new_label['preciomen3']; ?></span></TD>
    <TD class="scFormDataOdd css_preciomen3_line" id="hidden_field_data_preciomen3" style="<?php echo $sStyleHidden_preciomen3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_preciomen3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen3"]) &&  $this->nmgp_cmp_readonly["preciomen3"] == "on") { 

 ?>
<input type="hidden" name="preciomen3" value="<?php echo $this->form_encode_input($preciomen3) . "\">" . $preciomen3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen3" class="sc-ui-readonly-preciomen3 css_preciomen3_line" style="<?php echo $sStyleReadLab_preciomen3; ?>"><?php echo $this->form_format_readonly("preciomen3", $this->form_encode_input($this->preciomen3)); ?></span><span id="id_read_off_preciomen3" class="css_read_off_preciomen3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen3; ?>">
 <input class="sc-js-input scFormObjectOdd css_preciomen3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen3" type=text name="preciomen3" value="<?php echo $this->form_encode_input($preciomen3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen3']['format_pos'] || 3 == $this->field_config['preciomen3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen3']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['birpara'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['maximized']))
  {
?>
</td></tr> 
<tr><td><table width="100%"> 
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFormFooter">
    <tr>
        <td>
            <span class="scFormFooterFont" id="rod_col1"><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/usr__NM__bg__NM__1455739788_Kitchen_Bold_Line_Color_Mix-05_icon-icons.com_53393.png';echo '<IMG SRC="usr__NM__bg__NM__1455739788_Kitchen_Bold_Line_Color_Mix-05_icon-icons.com_53393.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/usr__NM__bg__NM__1455739788_Kitchen_Bold_Line_Color_Mix-05_icon-icons.com_53393.png';}?>" BORDER="0"/></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png';echo '<IMG SRC="usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png';}?>" BORDER="0"/></span>
        </td>
    </tr>
</table><?php
  }
?>
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
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_productos_mini");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_productos_mini");
 parent.scAjaxDetailHeight("form_productos_mini", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_productos_mini", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_productos_mini", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_mini']['buttonStatus'] = $this->nmgp_botoes;
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
