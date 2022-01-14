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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Nuevo Recibo de Ingreso a caja"); } else { echo strip_tags("Recibo de Ingreso a caja"); } ?></TITLE>
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
.css_read_off_fecharecibo button {
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
<?php
$miniCalculatorFA = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorFA) {
?>
<style type="text/css">
.css_read_off_total_cuenta button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_reciboingreso/form_reciboingreso_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_reciboingreso_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "nurecibo")
     {
        $('input[name="nurecibo"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nurecibo"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nurecibo"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_reciboingreso_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('cliente');

<?php
}
?>
  addAutocomplete(this);

  $("#hidden_bloco_2,#hidden_bloco_4,#hidden_bloco_5,#hidden_bloco_6").each(function() {
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
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_2": true,
    "hidden_bloco_4": true,
    "hidden_bloco_5": true,
    "hidden_bloco_6": true
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
      scAjaxDetailHeight("form_detallepagos_rc", "500");
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
    url: "form_reciboingreso.php",
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
   sc_form_reciboingreso_cliente_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = 'margin-top: 0.5px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_reciboingreso_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_reciboingreso'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_reciboingreso'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['imprime'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['imprime']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['imprime']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['imprime']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['imprime']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['imprime'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "imprime", "scBtnFn_imprime()", "scBtnFn_imprime()", "sc_imprime_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['imprime'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['imprime']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['imprime']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['imprime']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['imprime']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['imprime'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "imprime", "scBtnFn_imprime()", "scBtnFn_imprime()", "sc_imprime_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['btn_asentar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_asentar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_asentar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_asentar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_asentar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_asentar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_asentar", "scBtnFn_btn_asentar()", "scBtnFn_btn_asentar()", "sc_btn_asentar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['btn_asentar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_asentar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_asentar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_asentar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_asentar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_asentar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_asentar", "scBtnFn_btn_asentar()", "scBtnFn_btn_asentar()", "sc_btn_asentar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['btn_reversar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_reversar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_reversar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_reversar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_reversar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_reversar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_reversar", "scBtnFn_btn_reversar()", "scBtnFn_btn_reversar()", "sc_btn_reversar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['btn_reversar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_reversar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['btn_reversar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_reversar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_reversar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['btn_reversar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_reversar", "scBtnFn_btn_reversar()", "scBtnFn_btn_reversar()", "sc_btn_reversar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idrecibo']))
   {
       $this->nmgp_cmp_hidden['idrecibo'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nufac']))
   {
       $this->nmgp_cmp_hidden['nufac'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['concepto']))
   {
       $this->nmgp_cmp_hidden['concepto'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['resolucion']))
   {
       $this->nmgp_cmp_hidden['resolucion'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['titulo']))
   {
       $this->nmgp_cmp_hidden['titulo'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['total_cuenta']))
   {
       $this->nmgp_cmp_hidden['total_cuenta'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nurecibo']))
    {
        $this->nm_new_label['nurecibo'] = "N. RECIBO ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nurecibo = $this->nurecibo;
   $sStyleHidden_nurecibo = '';
   if (isset($this->nmgp_cmp_hidden['nurecibo']) && $this->nmgp_cmp_hidden['nurecibo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nurecibo']);
       $sStyleHidden_nurecibo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nurecibo = 'display: none;';
   $sStyleReadInp_nurecibo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nurecibo']) && $this->nmgp_cmp_readonly['nurecibo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nurecibo']);
       $sStyleReadLab_nurecibo = '';
       $sStyleReadInp_nurecibo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nurecibo']) && $this->nmgp_cmp_hidden['nurecibo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nurecibo" value="<?php echo $this->form_encode_input($nurecibo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nurecibo_line" id="hidden_field_data_nurecibo" style="<?php echo $sStyleHidden_nurecibo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nurecibo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nurecibo_label" style=""><span id="id_label_nurecibo"><?php echo $this->nm_new_label['nurecibo']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_nurecibo" css_nurecibo_line" style="<?php echo $sStyleReadLab_nurecibo; ?>"><?php echo $this->form_format_readonly("nurecibo", $this->form_encode_input($this->nurecibo)); ?></span><span id="id_read_off_nurecibo" class="css_read_off_nurecibo" style="<?php echo $sStyleReadInp_nurecibo; ?>"><input type="hidden" name="nurecibo" value="<?php echo $this->form_encode_input($nurecibo) . "\">"?><span id="id_ajax_label_nurecibo"><?php echo nl2br($nurecibo); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nurecibo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nurecibo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['ncuenta_tercero']))
    {
        $this->nm_new_label['ncuenta_tercero'] = "CUENTA A PAGAR";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789/") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_reciboingreso*scout' : '';
   if (isset($this->Ini->sc_lig_md5["form_reciboingreso_seleccionar_cuenta"]) && $this->Ini->sc_lig_md5["form_reciboingreso_seleccionar_cuenta"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,ncuenta_tercero,nro*scoutnm_evt_ret_busca*scinsc_form_reciboingreso_ncuenta_tercero_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_reciboingreso@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,ncuenta_tercero,nro*scoutnm_evt_ret_busca*scinsc_form_reciboingreso_ncuenta_tercero_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_form_reciboingreso_seleccionar_cuenta_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_reciboingreso_seleccionar_cuenta_cons_psq. "', '" . $Md5_Lig . "')", "cap_ncuenta_tercero", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ncuenta_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ncuenta_tercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['doc_cobrado']))
    {
        $this->nm_new_label['doc_cobrado'] = "DOC COBRADO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_cobrado = $this->doc_cobrado;
   $sStyleHidden_doc_cobrado = '';
   if (isset($this->nmgp_cmp_hidden['doc_cobrado']) && $this->nmgp_cmp_hidden['doc_cobrado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_cobrado']);
       $sStyleHidden_doc_cobrado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_cobrado = 'display: none;';
   $sStyleReadInp_doc_cobrado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_cobrado']) && $this->nmgp_cmp_readonly['doc_cobrado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_cobrado']);
       $sStyleReadLab_doc_cobrado = '';
       $sStyleReadInp_doc_cobrado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_cobrado']) && $this->nmgp_cmp_hidden['doc_cobrado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doc_cobrado" value="<?php echo $this->form_encode_input($doc_cobrado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doc_cobrado_line" id="hidden_field_data_doc_cobrado" style="<?php echo $sStyleHidden_doc_cobrado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_cobrado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_doc_cobrado_label" style=""><span id="id_label_doc_cobrado"><?php echo $this->nm_new_label['doc_cobrado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_cobrado"]) &&  $this->nmgp_cmp_readonly["doc_cobrado"] == "on") { 

 ?>
<input type="hidden" name="doc_cobrado" value="<?php echo $this->form_encode_input($doc_cobrado) . "\">" . $doc_cobrado . ""; ?>
<?php } else { ?>
<span id="id_read_on_doc_cobrado" class="sc-ui-readonly-doc_cobrado css_doc_cobrado_line" style="<?php echo $sStyleReadLab_doc_cobrado; ?>"><?php echo $this->form_format_readonly("doc_cobrado", $this->form_encode_input($this->doc_cobrado)); ?></span><span id="id_read_off_doc_cobrado" class="css_read_off_doc_cobrado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_cobrado; ?>">
 <input class="sc-js-input scFormObjectOdd css_doc_cobrado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_doc_cobrado" type=text name="doc_cobrado" value="<?php echo $this->form_encode_input($doc_cobrado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_reciboingreso*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_reciboingreso_seleccionar_factura"]) && $this->Ini->sc_lig_md5["grid_reciboingreso_seleccionar_factura"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,doc_cobrado,documento*scoutnm_evt_ret_busca*scinsc_form_reciboingreso_doc_cobrado_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_reciboingreso@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,doc_cobrado,documento*scoutnm_evt_ret_busca*scinsc_form_reciboingreso_doc_cobrado_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_reciboingreso_seleccionar_factura_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_reciboingreso_seleccionar_factura_cons_psq. "', '" . $Md5_Lig . "')", "cap_doc_cobrado", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_cobrado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_cobrado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_nurecibo_dumb = ('' == $sStyleHidden_nurecibo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nurecibo_dumb" style="<?php echo $sStyleHidden_nurecibo_dumb; ?>"></TD>
<?php $sStyleHidden_ncuenta_tercero_dumb = ('' == $sStyleHidden_ncuenta_tercero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ncuenta_tercero_dumb" style="<?php echo $sStyleHidden_ncuenta_tercero_dumb; ?>"></TD>
<?php $sStyleHidden_doc_cobrado_dumb = ('' == $sStyleHidden_doc_cobrado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_doc_cobrado_dumb" style="<?php echo $sStyleHidden_doc_cobrado_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_total_cuenta_line" id="hidden_field_data_total_cuenta" style="<?php echo $sStyleHidden_total_cuenta; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_total_cuenta_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="total_cuenta" value="<?php echo $this->form_encode_input($total_cuenta); ?>"><span id="id_ajax_label_total_cuenta"><?php echo nl2br($total_cuenta); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_cuenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_cuenta_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_total_cuenta_dumb = ('' == $sStyleHidden_total_cuenta) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_total_cuenta_dumb" style="<?php echo $sStyleHidden_total_cuenta_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos Generales<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecharecibo']))
    {
        $this->nm_new_label['fecharecibo'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecharecibo = $this->fecharecibo;
   $sStyleHidden_fecharecibo = '';
   if (isset($this->nmgp_cmp_hidden['fecharecibo']) && $this->nmgp_cmp_hidden['fecharecibo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecharecibo']);
       $sStyleHidden_fecharecibo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecharecibo = 'display: none;';
   $sStyleReadInp_fecharecibo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecharecibo']) && $this->nmgp_cmp_readonly['fecharecibo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecharecibo']);
       $sStyleReadLab_fecharecibo = '';
       $sStyleReadInp_fecharecibo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecharecibo']) && $this->nmgp_cmp_hidden['fecharecibo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecharecibo" value="<?php echo $this->form_encode_input($fecharecibo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecharecibo_line" id="hidden_field_data_fecharecibo" style="<?php echo $sStyleHidden_fecharecibo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecharecibo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecharecibo_label" style=""><span id="id_label_fecharecibo"><?php echo $this->nm_new_label['fecharecibo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecharecibo"]) &&  $this->nmgp_cmp_readonly["fecharecibo"] == "on") { 

 ?>
<input type="hidden" name="fecharecibo" value="<?php echo $this->form_encode_input($fecharecibo) . "\">" . $fecharecibo . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecharecibo" class="sc-ui-readonly-fecharecibo css_fecharecibo_line" style="<?php echo $sStyleReadLab_fecharecibo; ?>"><?php echo $this->form_format_readonly("fecharecibo", $this->form_encode_input($fecharecibo)); ?></span><span id="id_read_off_fecharecibo" class="css_read_off_fecharecibo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecharecibo; ?>"><?php
$tmp_form_data = $this->field_config['fecharecibo']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecharecibo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecharecibo" type=text name="fecharecibo" value="<?php echo $this->form_encode_input($fecharecibo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecharecibo']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecharecibo']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecharecibo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecharecibo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_cliente_line" id="hidden_field_data_cliente" style="<?php echo $sStyleHidden_cliente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cliente_label" style=""><span id="id_label_cliente"><?php echo $this->nm_new_label['cliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['php_cmp_required']['cliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['php_cmp_required']['cliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente'] = array(); 
    }

   $old_value_nurecibo = $this->nurecibo;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_fecharecibo = $this->fecharecibo;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_monto = $this->monto;
   $old_value_saldofac = $this->saldofac;
   $old_value_valcobrar = $this->valcobrar;
   $old_value_rete = $this->rete;
   $old_value_val_ica = $this->val_ica;
   $old_value_por_retiva = $this->por_retiva;
   $old_value_val_retiva = $this->val_retiva;
   $old_value_descu = $this->descu;
   $old_value_idrecibo = $this->idrecibo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_nurecibo = $this->nurecibo;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_fecharecibo = $this->fecharecibo;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_monto = $this->monto;
   $unformatted_value_saldofac = $this->saldofac;
   $unformatted_value_valcobrar = $this->valcobrar;
   $unformatted_value_rete = $this->rete;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_por_retiva = $this->por_retiva;
   $unformatted_value_val_retiva = $this->val_retiva;
   $unformatted_value_descu = $this->descu;
   $unformatted_value_idrecibo = $this->idrecibo;

   $nm_comando = "SELECT idtercero, nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->cliente), 1, -1) . "";

   $this->nurecibo = $old_value_nurecibo;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->fecharecibo = $old_value_fecharecibo;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->monto = $old_value_monto;
   $this->saldofac = $old_value_saldofac;
   $this->valcobrar = $old_value_valcobrar;
   $this->rete = $old_value_rete;
   $this->val_ica = $old_value_val_ica;
   $this->por_retiva = $old_value_por_retiva;
   $this->val_retiva = $old_value_val_retiva;
   $this->descu = $old_value_descu;
   $this->idrecibo = $old_value_idrecibo;

   if ('' != $this->cliente)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : $this->cliente;
$cliente_look = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : $this->cliente;
?>
<span id="id_read_on_cliente" class="sc-ui-readonly-cliente css_cliente_line" style="<?php echo $sStyleReadLab_cliente; ?>"><?php echo $this->form_format_readonly("cliente", str_replace("<", "&lt;", $cliente_look)); ?></span><span id="id_read_off_cliente" class="css_read_off_cliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_cliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_cliente" type=text name="cliente" value="<?php echo $this->form_encode_input($cliente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['cliente'] = $this->cliente;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente'] = array(); 
    }

   $old_value_nurecibo = $this->nurecibo;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_fecharecibo = $this->fecharecibo;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_monto = $this->monto;
   $old_value_saldofac = $this->saldofac;
   $old_value_valcobrar = $this->valcobrar;
   $old_value_rete = $this->rete;
   $old_value_val_ica = $this->val_ica;
   $old_value_por_retiva = $this->por_retiva;
   $old_value_val_retiva = $this->val_retiva;
   $old_value_descu = $this->descu;
   $old_value_idrecibo = $this->idrecibo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_nurecibo = $this->nurecibo;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_fecharecibo = $this->fecharecibo;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_monto = $this->monto;
   $unformatted_value_saldofac = $this->saldofac;
   $unformatted_value_valcobrar = $this->valcobrar;
   $unformatted_value_rete = $this->rete;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_por_retiva = $this->por_retiva;
   $unformatted_value_val_retiva = $this->val_retiva;
   $unformatted_value_descu = $this->descu;
   $unformatted_value_idrecibo = $this->idrecibo;

   $nm_comando = "SELECT idtercero, nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->cliente), 1, -1) . "";

   $this->nurecibo = $old_value_nurecibo;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->fecharecibo = $old_value_fecharecibo;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->monto = $old_value_monto;
   $this->saldofac = $old_value_saldofac;
   $this->valcobrar = $old_value_valcobrar;
   $this->rete = $old_value_rete;
   $this->val_ica = $old_value_val_ica;
   $this->por_retiva = $old_value_por_retiva;
   $this->val_retiva = $old_value_val_retiva;
   $this->descu = $old_value_descu;
   $this->idrecibo = $old_value_idrecibo;

   if ('' != $this->cliente)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_cliente'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : '';
$cliente_look = (isset($aLookup[0][$this->cliente])) ? $aLookup[0][$this->cliente] : '';
?>
<select id="id_ac_cliente" class="scFormObjectOdd sc-ui-autocomp-cliente css_cliente_obj sc-js-input"><?php if ('' != $this->cliente) { ?><option value="<?php echo $this->cliente ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['banco_id']))
   {
       $this->nm_new_label['banco_id'] = "Caja N°";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banco_id = $this->banco_id;
   $sStyleHidden_banco_id = '';
   if (isset($this->nmgp_cmp_hidden['banco_id']) && $this->nmgp_cmp_hidden['banco_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banco_id']);
       $sStyleHidden_banco_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banco_id = 'display: none;';
   $sStyleReadInp_banco_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banco_id']) && $this->nmgp_cmp_readonly['banco_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banco_id']);
       $sStyleReadLab_banco_id = '';
       $sStyleReadInp_banco_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banco_id']) && $this->nmgp_cmp_hidden['banco_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="banco_id" value="<?php echo $this->form_encode_input($this->banco_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_banco_id_line" id="hidden_field_data_banco_id" style="<?php echo $sStyleHidden_banco_id; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_banco_id_label" style=""><span id="id_label_banco_id"><?php echo $this->nm_new_label['banco_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_id"]) &&  $this->nmgp_cmp_readonly["banco_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id'] = array(); 
    }

   $old_value_nurecibo = $this->nurecibo;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_fecharecibo = $this->fecharecibo;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_monto = $this->monto;
   $old_value_saldofac = $this->saldofac;
   $old_value_valcobrar = $this->valcobrar;
   $old_value_rete = $this->rete;
   $old_value_val_ica = $this->val_ica;
   $old_value_por_retiva = $this->por_retiva;
   $old_value_val_retiva = $this->val_retiva;
   $old_value_descu = $this->descu;
   $old_value_idrecibo = $this->idrecibo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_nurecibo = $this->nurecibo;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_fecharecibo = $this->fecharecibo;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_monto = $this->monto;
   $unformatted_value_saldofac = $this->saldofac;
   $unformatted_value_valcobrar = $this->valcobrar;
   $unformatted_value_rete = $this->rete;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_por_retiva = $this->por_retiva;
   $unformatted_value_val_retiva = $this->val_retiva;
   $unformatted_value_descu = $this->descu;
   $unformatted_value_idrecibo = $this->idrecibo;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->nurecibo = $old_value_nurecibo;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->fecharecibo = $old_value_fecharecibo;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->monto = $old_value_monto;
   $this->saldofac = $old_value_saldofac;
   $this->valcobrar = $old_value_valcobrar;
   $this->rete = $old_value_rete;
   $this->val_ica = $old_value_val_ica;
   $this->por_retiva = $old_value_por_retiva;
   $this->val_retiva = $old_value_val_retiva;
   $this->descu = $old_value_descu;
   $this->idrecibo = $old_value_idrecibo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_banco_id'][] = $rs->fields[0];
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
   $banco_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->banco_id_1))
          {
              foreach ($this->banco_id_1 as $tmp_banco_id)
              {
                  if (trim($tmp_banco_id) === trim($cadaselect[1])) { $banco_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->banco_id) === trim($cadaselect[1])) { $banco_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="banco_id" value="<?php echo $this->form_encode_input($banco_id) . "\">" . $banco_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_banco_id();
   $x = 0 ; 
   $banco_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->banco_id_1))
          {
              foreach ($this->banco_id_1 as $tmp_banco_id)
              {
                  if (trim($tmp_banco_id) === trim($cadaselect[1])) { $banco_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->banco_id) === trim($cadaselect[1])) { $banco_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($banco_id_look))
          {
              $banco_id_look = $this->banco_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_banco_id\" class=\"css_banco_id_line\" style=\"" .  $sStyleReadLab_banco_id . "\">" . $this->form_format_readonly("banco_id", $this->form_encode_input($banco_id_look)) . "</span><span id=\"id_read_off_banco_id\" class=\"css_read_off_banco_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_banco_id . "\">";
   echo " <span id=\"idAjaxSelect_banco_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_banco_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_banco_id\" name=\"banco_id\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->banco_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->banco_id)) 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_banco_id*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_reciboingreso@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_banco_id*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_banco_id", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_bancos_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_reciboingreso&KeepThis=true&TB_iframe=true&height=400&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['asentado']))
    {
        $this->nm_new_label['asentado'] = "Asentado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asentado = $this->asentado;
   $sStyleHidden_asentado = '';
   if (isset($this->nmgp_cmp_hidden['asentado']) && $this->nmgp_cmp_hidden['asentado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asentado']);
       $sStyleHidden_asentado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asentado = 'display: none;';
   $sStyleReadInp_asentado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asentado']) && $this->nmgp_cmp_readonly['asentado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asentado']);
       $sStyleReadLab_asentado = '';
       $sStyleReadInp_asentado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asentado']) && $this->nmgp_cmp_hidden['asentado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="asentado" value="<?php echo $this->form_encode_input($asentado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_asentado_line" id="hidden_field_data_asentado" style="<?php echo $sStyleHidden_asentado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asentado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_asentado_label" style=""><span id="id_label_asentado"><?php echo $this->nm_new_label['asentado']; ?></span></span><br><input type="hidden" name="asentado" value="<?php echo $this->form_encode_input($asentado); ?>"><span id="id_ajax_label_asentado"><?php echo nl2br($asentado); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asentado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asentado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_fecharecibo_dumb = ('' == $sStyleHidden_fecharecibo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecharecibo_dumb" style="<?php echo $sStyleHidden_fecharecibo_dumb; ?>"></TD>
<?php $sStyleHidden_cliente_dumb = ('' == $sStyleHidden_cliente) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cliente_dumb" style="<?php echo $sStyleHidden_cliente_dumb; ?>"></TD>
<?php $sStyleHidden_banco_id_dumb = ('' == $sStyleHidden_banco_id) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_banco_id_dumb" style="<?php echo $sStyleHidden_banco_id_dumb; ?>"></TD>
<?php $sStyleHidden_asentado_dumb = ('' == $sStyleHidden_asentado) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_asentado_dumb" style="<?php echo $sStyleHidden_asentado_dumb; ?>"></TD>
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

   <?php
    if (!isset($this->nm_new_label['monto']))
    {
        $this->nm_new_label['monto'] = "Monto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $monto = $this->monto;
   $sStyleHidden_monto = '';
   if (isset($this->nmgp_cmp_hidden['monto']) && $this->nmgp_cmp_hidden['monto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['monto']);
       $sStyleHidden_monto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_monto = 'display: none;';
   $sStyleReadInp_monto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['monto']) && $this->nmgp_cmp_readonly['monto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['monto']);
       $sStyleReadLab_monto = '';
       $sStyleReadInp_monto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['monto']) && $this->nmgp_cmp_hidden['monto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="monto" value="<?php echo $this->form_encode_input($monto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_monto_line" id="hidden_field_data_monto" style="<?php echo $sStyleHidden_monto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_monto_line" style="padding: 0px"><span class="scFormLabelOddFormat css_monto_label" style=""><span id="id_label_monto"><?php echo $this->nm_new_label['monto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["monto"]) &&  $this->nmgp_cmp_readonly["monto"] == "on") { 

 ?>
<input type="hidden" name="monto" value="<?php echo $this->form_encode_input($monto) . "\">" . $monto . ""; ?>
<?php } else { ?>
<span id="id_read_on_monto" class="sc-ui-readonly-monto css_monto_line" style="<?php echo $sStyleReadLab_monto; ?>"><?php echo $this->form_format_readonly("monto", $this->form_encode_input($this->monto)); ?></span><span id="id_read_off_monto" class="css_read_off_monto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_monto; ?>">
 <input class="sc-js-input scFormObjectOdd css_monto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_monto" type=text name="monto" value="<?php echo $this->form_encode_input($monto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['monto']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['monto']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['monto']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['monto']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_monto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_monto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['saldofac']))
    {
        $this->nm_new_label['saldofac'] = "Saldo de la factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldofac = $this->saldofac;
   $sStyleHidden_saldofac = '';
   if (isset($this->nmgp_cmp_hidden['saldofac']) && $this->nmgp_cmp_hidden['saldofac'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldofac']);
       $sStyleHidden_saldofac = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldofac = 'display: none;';
   $sStyleReadInp_saldofac = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldofac']) && $this->nmgp_cmp_readonly['saldofac'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldofac']);
       $sStyleReadLab_saldofac = '';
       $sStyleReadInp_saldofac = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldofac']) && $this->nmgp_cmp_hidden['saldofac'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldofac" value="<?php echo $this->form_encode_input($saldofac) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldofac_line" id="hidden_field_data_saldofac" style="<?php echo $sStyleHidden_saldofac; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldofac_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldofac_label" style=""><span id="id_label_saldofac"><?php echo $this->nm_new_label['saldofac']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["saldofac"]) &&  $this->nmgp_cmp_readonly["saldofac"] == "on") { 

 ?>
<input type="hidden" name="saldofac" value="<?php echo $this->form_encode_input($saldofac) . "\">" . $saldofac . ""; ?>
<?php } else { ?>
<span id="id_read_on_saldofac" class="sc-ui-readonly-saldofac css_saldofac_line" style="<?php echo $sStyleReadLab_saldofac; ?>"><?php echo $this->form_format_readonly("saldofac", $this->form_encode_input($this->saldofac)); ?></span><span id="id_read_off_saldofac" class="css_read_off_saldofac<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saldofac; ?>">
 <input class="sc-js-input scFormObjectOdd css_saldofac_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saldofac" type=text name="saldofac" value="<?php echo $this->form_encode_input($saldofac) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['saldofac']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['saldofac']['format_pos'] || 3 == $this->field_config['saldofac']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldofac']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldofac']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldofac']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldofac']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldofac_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldofac_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valcobrar']))
    {
        $this->nm_new_label['valcobrar'] = "A Cobrar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valcobrar = $this->valcobrar;
   $sStyleHidden_valcobrar = '';
   if (isset($this->nmgp_cmp_hidden['valcobrar']) && $this->nmgp_cmp_hidden['valcobrar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valcobrar']);
       $sStyleHidden_valcobrar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valcobrar = 'display: none;';
   $sStyleReadInp_valcobrar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valcobrar']) && $this->nmgp_cmp_readonly['valcobrar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valcobrar']);
       $sStyleReadLab_valcobrar = '';
       $sStyleReadInp_valcobrar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valcobrar']) && $this->nmgp_cmp_hidden['valcobrar'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valcobrar" value="<?php echo $this->form_encode_input($valcobrar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valcobrar_line" id="hidden_field_data_valcobrar" style="<?php echo $sStyleHidden_valcobrar; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valcobrar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valcobrar_label" style=""><span id="id_label_valcobrar"><?php echo $this->nm_new_label['valcobrar']; ?></span></span><br><input type="hidden" name="valcobrar" value="<?php echo $this->form_encode_input($valcobrar); ?>"><span id="id_ajax_label_valcobrar"><?php echo nl2br($valcobrar); ?></span>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('valcobrar')", "nm_mostra_mens('valcobrar')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valcobrar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valcobrar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_valor_base_dumb = ('' == $sStyleHidden_valor_base) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_base_dumb" style="<?php echo $sStyleHidden_valor_base_dumb; ?>"></TD>
<?php $sStyleHidden_valor_iva_dumb = ('' == $sStyleHidden_valor_iva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valor_iva_dumb" style="<?php echo $sStyleHidden_valor_iva_dumb; ?>"></TD>
<?php $sStyleHidden_monto_dumb = ('' == $sStyleHidden_monto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_monto_dumb" style="<?php echo $sStyleHidden_monto_dumb; ?>"></TD>
<?php $sStyleHidden_saldofac_dumb = ('' == $sStyleHidden_saldofac) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_saldofac_dumb" style="<?php echo $sStyleHidden_saldofac_dumb; ?>"></TD>
<?php $sStyleHidden_valcobrar_dumb = ('' == $sStyleHidden_valcobrar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valcobrar_dumb" style="<?php echo $sStyleHidden_valcobrar_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['resolucion']))
    {
        $this->nm_new_label['resolucion'] = "Prefijo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resolucion = $this->resolucion;
   if (!isset($this->nmgp_cmp_hidden['resolucion']))
   {
       $this->nmgp_cmp_hidden['resolucion'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['resolucion']) && $this->nmgp_cmp_hidden['resolucion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="resolucion" value="<?php echo $this->form_encode_input($resolucion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resolucion_line" id="hidden_field_data_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resolucion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_resolucion_label" style=""><span id="id_label_resolucion"><?php echo $this->nm_new_label['resolucion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resolucion"]) &&  $this->nmgp_cmp_readonly["resolucion"] == "on") { 

 ?>
<input type="hidden" name="resolucion" value="<?php echo $this->form_encode_input($resolucion) . "\">" . $resolucion . ""; ?>
<?php } else { ?>
<span id="id_read_on_resolucion" class="sc-ui-readonly-resolucion css_resolucion_line" style="<?php echo $sStyleReadLab_resolucion; ?>"><?php echo $this->form_format_readonly("resolucion", $this->form_encode_input($this->resolucion)); ?></span><span id="id_read_off_resolucion" class="css_read_off_resolucion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_resolucion; ?>">
 <input class="sc-js-input scFormObjectOdd css_resolucion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_resolucion" type=text name="resolucion" value="<?php echo $this->form_encode_input($resolucion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resolucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resolucion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['nufac']))
    {
        $this->nm_new_label['nufac'] = "Factura a pagar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nufac = $this->nufac;
   if (!isset($this->nmgp_cmp_hidden['nufac']))
   {
       $this->nmgp_cmp_hidden['nufac'] = 'off';
   }
   $sStyleHidden_nufac = '';
   if (isset($this->nmgp_cmp_hidden['nufac']) && $this->nmgp_cmp_hidden['nufac'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nufac']);
       $sStyleHidden_nufac = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nufac = 'display: none;';
   $sStyleReadInp_nufac = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nufac']) && $this->nmgp_cmp_readonly['nufac'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nufac']);
       $sStyleReadLab_nufac = '';
       $sStyleReadInp_nufac = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nufac']) && $this->nmgp_cmp_hidden['nufac'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nufac" value="<?php echo $this->form_encode_input($nufac) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nufac_line" id="hidden_field_data_nufac" style="<?php echo $sStyleHidden_nufac; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nufac_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nufac_label" style=""><span id="id_label_nufac"><?php echo $this->nm_new_label['nufac']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nufac"]) &&  $this->nmgp_cmp_readonly["nufac"] == "on") { 

 ?>
<input type="hidden" name="nufac" value="<?php echo $this->form_encode_input($nufac) . "\">" . $nufac . ""; ?>
<?php } else { ?>
<span id="id_read_on_nufac" class="sc-ui-readonly-nufac css_nufac_line" style="<?php echo $sStyleReadLab_nufac; ?>"><?php echo $this->form_format_readonly("nufac", $this->form_encode_input($this->nufac)); ?></span><span id="id_read_off_nufac" class="css_read_off_nufac<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nufac; ?>">
 <input class="sc-js-input scFormObjectOdd css_nufac_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nufac" type=text name="nufac" value="<?php echo $this->form_encode_input($nufac) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nufac_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nufac_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_resolucion_dumb = ('' == $sStyleHidden_resolucion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_resolucion_dumb" style="<?php echo $sStyleHidden_resolucion_dumb; ?>"></TD>
<?php $sStyleHidden_nufac_dumb = ('' == $sStyleHidden_nufac) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nufac_dumb" style="<?php echo $sStyleHidden_nufac_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Descuento otorgado y retención que efectúa el cliente<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['porc_rete']))
   {
       $this->nm_new_label['porc_rete'] = "Retención %";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porc_rete = $this->porc_rete;
   $sStyleHidden_porc_rete = '';
   if (isset($this->nmgp_cmp_hidden['porc_rete']) && $this->nmgp_cmp_hidden['porc_rete'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porc_rete']);
       $sStyleHidden_porc_rete = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porc_rete = 'display: none;';
   $sStyleReadInp_porc_rete = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porc_rete']) && $this->nmgp_cmp_readonly['porc_rete'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porc_rete']);
       $sStyleReadLab_porc_rete = '';
       $sStyleReadInp_porc_rete = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porc_rete']) && $this->nmgp_cmp_hidden['porc_rete'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="porc_rete" value="<?php echo $this->form_encode_input($this->porc_rete) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_porc_rete_line" id="hidden_field_data_porc_rete" style="<?php echo $sStyleHidden_porc_rete; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porc_rete_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_porc_rete_label" style=""><span id="id_label_porc_rete"><?php echo $this->nm_new_label['porc_rete']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porc_rete"]) &&  $this->nmgp_cmp_readonly["porc_rete"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete'] = array(); 
    }

   $old_value_nurecibo = $this->nurecibo;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_fecharecibo = $this->fecharecibo;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_monto = $this->monto;
   $old_value_saldofac = $this->saldofac;
   $old_value_valcobrar = $this->valcobrar;
   $old_value_rete = $this->rete;
   $old_value_val_ica = $this->val_ica;
   $old_value_por_retiva = $this->por_retiva;
   $old_value_val_retiva = $this->val_retiva;
   $old_value_descu = $this->descu;
   $old_value_idrecibo = $this->idrecibo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_nurecibo = $this->nurecibo;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_fecharecibo = $this->fecharecibo;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_monto = $this->monto;
   $unformatted_value_saldofac = $this->saldofac;
   $unformatted_value_valcobrar = $this->valcobrar;
   $unformatted_value_rete = $this->rete;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_por_retiva = $this->por_retiva;
   $unformatted_value_val_retiva = $this->val_retiva;
   $unformatted_value_descu = $this->descu;
   $unformatted_value_idrecibo = $this->idrecibo;

   $nm_comando = "SELECT  porrete  FROM tiporetefuente  ORDER BY id_tiporetefuente DESC";

   $this->nurecibo = $old_value_nurecibo;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->fecharecibo = $old_value_fecharecibo;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->monto = $old_value_monto;
   $this->saldofac = $old_value_saldofac;
   $this->valcobrar = $old_value_valcobrar;
   $this->rete = $old_value_rete;
   $this->val_ica = $old_value_val_ica;
   $this->por_retiva = $old_value_por_retiva;
   $this->val_retiva = $old_value_val_retiva;
   $this->descu = $old_value_descu;
   $this->idrecibo = $old_value_idrecibo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete'][] = $rs->fields[0];
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
   $porc_rete_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_rete_1))
          {
              foreach ($this->porc_rete_1 as $tmp_porc_rete)
              {
                  if (trim($tmp_porc_rete) === trim($cadaselect[1])) { $porc_rete_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_rete) === trim($cadaselect[1])) { $porc_rete_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="porc_rete" value="<?php echo $this->form_encode_input($porc_rete) . "\">" . $porc_rete_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_porc_rete();
   $x = 0 ; 
   $porc_rete_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->porc_rete_1))
          {
              foreach ($this->porc_rete_1 as $tmp_porc_rete)
              {
                  if (trim($tmp_porc_rete) === trim($cadaselect[1])) { $porc_rete_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->porc_rete) === trim($cadaselect[1])) { $porc_rete_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($porc_rete_look))
          {
              $porc_rete_look = $this->porc_rete;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_porc_rete\" class=\"css_porc_rete_line\" style=\"" .  $sStyleReadLab_porc_rete . "\">" . $this->form_format_readonly("porc_rete", $this->form_encode_input($porc_rete_look)) . "</span><span id=\"id_read_off_porc_rete\" class=\"css_read_off_porc_rete" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_porc_rete . "\">";
   echo " <span id=\"idAjaxSelect_porc_rete\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_porc_rete_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_porc_rete\" name=\"porc_rete\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_porc_rete'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->porc_rete) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->porc_rete)) 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_porc_rete*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_reciboingreso@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_porc_rete*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_porc_rete", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tiporetefuente_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_reciboingreso&KeepThis=true&TB_iframe=true&height=450&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porc_rete_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porc_rete_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['rete']))
    {
        $this->nm_new_label['rete'] = "Valor Retención";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rete = $this->rete;
   $sStyleHidden_rete = '';
   if (isset($this->nmgp_cmp_hidden['rete']) && $this->nmgp_cmp_hidden['rete'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rete']);
       $sStyleHidden_rete = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rete = 'display: none;';
   $sStyleReadInp_rete = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rete']) && $this->nmgp_cmp_readonly['rete'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rete']);
       $sStyleReadLab_rete = '';
       $sStyleReadInp_rete = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rete']) && $this->nmgp_cmp_hidden['rete'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rete" value="<?php echo $this->form_encode_input($rete) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rete_line" id="hidden_field_data_rete" style="<?php echo $sStyleHidden_rete; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rete_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rete_label" style=""><span id="id_label_rete"><?php echo $this->nm_new_label['rete']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rete"]) &&  $this->nmgp_cmp_readonly["rete"] == "on") { 

 ?>
<input type="hidden" name="rete" value="<?php echo $this->form_encode_input($rete) . "\">" . $rete . ""; ?>
<?php } else { ?>
<span id="id_read_on_rete" class="sc-ui-readonly-rete css_rete_line" style="<?php echo $sStyleReadLab_rete; ?>"><?php echo $this->form_format_readonly("rete", $this->form_encode_input($this->rete)); ?></span><span id="id_read_off_rete" class="css_read_off_rete<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rete; ?>">
 <input class="sc-js-input scFormObjectOdd css_rete_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rete" type=text name="rete" value="<?php echo $this->form_encode_input($rete) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['rete']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['rete']['format_pos'] || 3 == $this->field_config['rete']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rete']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rete']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rete']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rete']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rete_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rete_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['por_ica']))
   {
       $this->nm_new_label['por_ica'] = "ICA %";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $por_ica = $this->por_ica;
   $sStyleHidden_por_ica = '';
   if (isset($this->nmgp_cmp_hidden['por_ica']) && $this->nmgp_cmp_hidden['por_ica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['por_ica']);
       $sStyleHidden_por_ica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_por_ica = 'display: none;';
   $sStyleReadInp_por_ica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['por_ica']) && $this->nmgp_cmp_readonly['por_ica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['por_ica']);
       $sStyleReadLab_por_ica = '';
       $sStyleReadInp_por_ica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['por_ica']) && $this->nmgp_cmp_hidden['por_ica'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="por_ica" value="<?php echo $this->form_encode_input($this->por_ica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_por_ica_line" id="hidden_field_data_por_ica" style="<?php echo $sStyleHidden_por_ica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_por_ica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_por_ica_label" style=""><span id="id_label_por_ica"><?php echo $this->nm_new_label['por_ica']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["por_ica"]) &&  $this->nmgp_cmp_readonly["por_ica"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica'] = array(); 
    }

   $old_value_nurecibo = $this->nurecibo;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_fecharecibo = $this->fecharecibo;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_monto = $this->monto;
   $old_value_saldofac = $this->saldofac;
   $old_value_valcobrar = $this->valcobrar;
   $old_value_rete = $this->rete;
   $old_value_val_ica = $this->val_ica;
   $old_value_por_retiva = $this->por_retiva;
   $old_value_val_retiva = $this->val_retiva;
   $old_value_descu = $this->descu;
   $old_value_idrecibo = $this->idrecibo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_nurecibo = $this->nurecibo;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_fecharecibo = $this->fecharecibo;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_monto = $this->monto;
   $unformatted_value_saldofac = $this->saldofac;
   $unformatted_value_valcobrar = $this->valcobrar;
   $unformatted_value_rete = $this->rete;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_por_retiva = $this->por_retiva;
   $unformatted_value_val_retiva = $this->val_retiva;
   $unformatted_value_descu = $this->descu;
   $unformatted_value_idrecibo = $this->idrecibo;

   $nm_comando = "SELECT porcica  FROM tipoica  ORDER BY  id_ica desc";

   $this->nurecibo = $old_value_nurecibo;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->fecharecibo = $old_value_fecharecibo;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->monto = $old_value_monto;
   $this->saldofac = $old_value_saldofac;
   $this->valcobrar = $old_value_valcobrar;
   $this->rete = $old_value_rete;
   $this->val_ica = $old_value_val_ica;
   $this->por_retiva = $old_value_por_retiva;
   $this->val_retiva = $old_value_val_retiva;
   $this->descu = $old_value_descu;
   $this->idrecibo = $old_value_idrecibo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica'][] = $rs->fields[0];
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
   $por_ica_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->por_ica_1))
          {
              foreach ($this->por_ica_1 as $tmp_por_ica)
              {
                  if (trim($tmp_por_ica) === trim($cadaselect[1])) { $por_ica_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->por_ica) === trim($cadaselect[1])) { $por_ica_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="por_ica" value="<?php echo $this->form_encode_input($por_ica) . "\">" . $por_ica_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_por_ica();
   $x = 0 ; 
   $por_ica_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->por_ica_1))
          {
              foreach ($this->por_ica_1 as $tmp_por_ica)
              {
                  if (trim($tmp_por_ica) === trim($cadaselect[1])) { $por_ica_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->por_ica) === trim($cadaselect[1])) { $por_ica_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($por_ica_look))
          {
              $por_ica_look = $this->por_ica;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_por_ica\" class=\"css_por_ica_line\" style=\"" .  $sStyleReadLab_por_ica . "\">" . $this->form_format_readonly("por_ica", $this->form_encode_input($por_ica_look)) . "</span><span id=\"id_read_off_por_ica\" class=\"css_read_off_por_ica" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_por_ica . "\">";
   echo " <span id=\"idAjaxSelect_por_ica\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_por_ica_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_por_ica\" name=\"por_ica\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_por_ica'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->por_ica) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->por_ica)) 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_por_ica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_reciboingreso@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_por_ica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_por_ica", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tipoica_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_reciboingreso&KeepThis=true&TB_iframe=true&height=400&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_por_ica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_por_ica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['val_ica']))
    {
        $this->nm_new_label['val_ica'] = "Valor Retenido ICA";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['val_ica']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['val_ica']['format_pos'] || 3 == $this->field_config['val_ica']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_ica']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_ica']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_ica']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['val_ica']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_ica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_ica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_porc_rete_dumb = ('' == $sStyleHidden_porc_rete) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_porc_rete_dumb" style="<?php echo $sStyleHidden_porc_rete_dumb; ?>"></TD>
<?php $sStyleHidden_rete_dumb = ('' == $sStyleHidden_rete) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_rete_dumb" style="<?php echo $sStyleHidden_rete_dumb; ?>"></TD>
<?php $sStyleHidden_por_ica_dumb = ('' == $sStyleHidden_por_ica) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_por_ica_dumb" style="<?php echo $sStyleHidden_por_ica_dumb; ?>"></TD>
<?php $sStyleHidden_val_ica_dumb = ('' == $sStyleHidden_val_ica) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_val_ica_dumb" style="<?php echo $sStyleHidden_val_ica_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['por_retiva']))
    {
        $this->nm_new_label['por_retiva'] = "Rete IVA %";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $por_retiva = $this->por_retiva;
   $sStyleHidden_por_retiva = '';
   if (isset($this->nmgp_cmp_hidden['por_retiva']) && $this->nmgp_cmp_hidden['por_retiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['por_retiva']);
       $sStyleHidden_por_retiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_por_retiva = 'display: none;';
   $sStyleReadInp_por_retiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['por_retiva']) && $this->nmgp_cmp_readonly['por_retiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['por_retiva']);
       $sStyleReadLab_por_retiva = '';
       $sStyleReadInp_por_retiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['por_retiva']) && $this->nmgp_cmp_hidden['por_retiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="por_retiva" value="<?php echo $this->form_encode_input($por_retiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_por_retiva_line" id="hidden_field_data_por_retiva" style="<?php echo $sStyleHidden_por_retiva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_por_retiva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_por_retiva_label" style=""><span id="id_label_por_retiva"><?php echo $this->nm_new_label['por_retiva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["por_retiva"]) &&  $this->nmgp_cmp_readonly["por_retiva"] == "on") { 

 ?>
<input type="hidden" name="por_retiva" value="<?php echo $this->form_encode_input($por_retiva) . "\">" . $por_retiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_por_retiva" class="sc-ui-readonly-por_retiva css_por_retiva_line" style="<?php echo $sStyleReadLab_por_retiva; ?>"><?php echo $this->form_format_readonly("por_retiva", $this->form_encode_input($this->por_retiva)); ?></span><span id="id_read_off_por_retiva" class="css_read_off_por_retiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_por_retiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_por_retiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_por_retiva" type=text name="por_retiva" value="<?php echo $this->form_encode_input($por_retiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=9"; } ?> alt="{datatype: 'decimal', maxLength: 9, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['por_retiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['por_retiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['por_retiva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['por_retiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_por_retiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_por_retiva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['val_retiva']))
    {
        $this->nm_new_label['val_retiva'] = "Valor Rete IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $val_retiva = $this->val_retiva;
   $sStyleHidden_val_retiva = '';
   if (isset($this->nmgp_cmp_hidden['val_retiva']) && $this->nmgp_cmp_hidden['val_retiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['val_retiva']);
       $sStyleHidden_val_retiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_val_retiva = 'display: none;';
   $sStyleReadInp_val_retiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['val_retiva']) && $this->nmgp_cmp_readonly['val_retiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['val_retiva']);
       $sStyleReadLab_val_retiva = '';
       $sStyleReadInp_val_retiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['val_retiva']) && $this->nmgp_cmp_hidden['val_retiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="val_retiva" value="<?php echo $this->form_encode_input($val_retiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_val_retiva_line" id="hidden_field_data_val_retiva" style="<?php echo $sStyleHidden_val_retiva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_val_retiva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_val_retiva_label" style=""><span id="id_label_val_retiva"><?php echo $this->nm_new_label['val_retiva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["val_retiva"]) &&  $this->nmgp_cmp_readonly["val_retiva"] == "on") { 

 ?>
<input type="hidden" name="val_retiva" value="<?php echo $this->form_encode_input($val_retiva) . "\">" . $val_retiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_val_retiva" class="sc-ui-readonly-val_retiva css_val_retiva_line" style="<?php echo $sStyleReadLab_val_retiva; ?>"><?php echo $this->form_format_readonly("val_retiva", $this->form_encode_input($this->val_retiva)); ?></span><span id="id_read_off_val_retiva" class="css_read_off_val_retiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_val_retiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_val_retiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_val_retiva" type=text name="val_retiva" value="<?php echo $this->form_encode_input($val_retiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['val_retiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['val_retiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['val_retiva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['val_retiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_val_retiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_val_retiva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['descu']))
    {
        $this->nm_new_label['descu'] = "Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descu = $this->descu;
   $sStyleHidden_descu = '';
   if (isset($this->nmgp_cmp_hidden['descu']) && $this->nmgp_cmp_hidden['descu'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descu']);
       $sStyleHidden_descu = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descu = 'display: none;';
   $sStyleReadInp_descu = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descu']) && $this->nmgp_cmp_readonly['descu'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descu']);
       $sStyleReadLab_descu = '';
       $sStyleReadInp_descu = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descu']) && $this->nmgp_cmp_hidden['descu'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descu" value="<?php echo $this->form_encode_input($descu) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_descu_line" id="hidden_field_data_descu" style="<?php echo $sStyleHidden_descu; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descu_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_descu_label" style=""><span id="id_label_descu"><?php echo $this->nm_new_label['descu']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descu"]) &&  $this->nmgp_cmp_readonly["descu"] == "on") { 

 ?>
<input type="hidden" name="descu" value="<?php echo $this->form_encode_input($descu) . "\">" . $descu . ""; ?>
<?php } else { ?>
<span id="id_read_on_descu" class="sc-ui-readonly-descu css_descu_line" style="<?php echo $sStyleReadLab_descu; ?>"><?php echo $this->form_format_readonly("descu", $this->form_encode_input($this->descu)); ?></span><span id="id_read_off_descu" class="css_read_off_descu<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descu; ?>">
 <input class="sc-js-input scFormObjectOdd css_descu_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descu" type=text name="descu" value="<?php echo $this->form_encode_input($descu) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['descu']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['descu']['format_pos'] || 3 == $this->field_config['descu']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descu']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descu']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descu']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descu']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descu_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descu_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_por_retiva_dumb = ('' == $sStyleHidden_por_retiva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_por_retiva_dumb" style="<?php echo $sStyleHidden_por_retiva_dumb; ?>"></TD>
<?php $sStyleHidden_val_retiva_dumb = ('' == $sStyleHidden_val_retiva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_val_retiva_dumb" style="<?php echo $sStyleHidden_val_retiva_dumb; ?>"></TD>
<?php $sStyleHidden_descu_dumb = ('' == $sStyleHidden_descu) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_descu_dumb" style="<?php echo $sStyleHidden_descu_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf5\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Concepto y Comentarios<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_concepto']))
   {
       $this->nm_new_label['id_concepto'] = "Concepto";
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

    <TD class="scFormDataOdd css_id_concepto_line" id="hidden_field_data_id_concepto" style="<?php echo $sStyleHidden_id_concepto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_concepto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_concepto_label" style=""><span id="id_label_id_concepto"><?php echo $this->nm_new_label['id_concepto']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['php_cmp_required']['id_concepto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['php_cmp_required']['id_concepto'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_concepto"]) &&  $this->nmgp_cmp_readonly["id_concepto"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto'] = array(); 
    }

   $old_value_nurecibo = $this->nurecibo;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_fecharecibo = $this->fecharecibo;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_monto = $this->monto;
   $old_value_saldofac = $this->saldofac;
   $old_value_valcobrar = $this->valcobrar;
   $old_value_rete = $this->rete;
   $old_value_val_ica = $this->val_ica;
   $old_value_por_retiva = $this->por_retiva;
   $old_value_val_retiva = $this->val_retiva;
   $old_value_descu = $this->descu;
   $old_value_idrecibo = $this->idrecibo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_nurecibo = $this->nurecibo;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_fecharecibo = $this->fecharecibo;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_monto = $this->monto;
   $unformatted_value_saldofac = $this->saldofac;
   $unformatted_value_valcobrar = $this->valcobrar;
   $unformatted_value_rete = $this->rete;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_por_retiva = $this->por_retiva;
   $unformatted_value_val_retiva = $this->val_retiva;
   $unformatted_value_descu = $this->descu;
   $unformatted_value_idrecibo = $this->idrecibo;

   $nm_comando = "SELECT idpagos_conceptos, concat(codigo,'/',descripcion)  FROM pagos_conceptos where tipodoc like 'RC' ORDER BY codigo";

   $this->nurecibo = $old_value_nurecibo;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->fecharecibo = $old_value_fecharecibo;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->monto = $old_value_monto;
   $this->saldofac = $old_value_saldofac;
   $this->valcobrar = $old_value_valcobrar;
   $this->rete = $old_value_rete;
   $this->val_ica = $old_value_val_ica;
   $this->por_retiva = $old_value_por_retiva;
   $this->val_retiva = $old_value_val_retiva;
   $this->descu = $old_value_descu;
   $this->idrecibo = $old_value_idrecibo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lookup_id_concepto'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
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
   if (isset($this->Ini->sc_lig_md5["form_pagos_conceptos_rc"]) && $this->Ini->sc_lig_md5["form_pagos_conceptos_rc"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_id_concepto*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_reciboingreso@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_reciboingreso_lkpedt_refresh_id_concepto*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_id_concepto", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_pagos_conceptos_rc_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_reciboingreso&KeepThis=true&TB_iframe=true&height=500&width=900&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_concepto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_concepto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['obser']))
    {
        $this->nm_new_label['obser'] = "Observaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obser = $this->obser;
   $sStyleHidden_obser = '';
   if (isset($this->nmgp_cmp_hidden['obser']) && $this->nmgp_cmp_hidden['obser'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obser']);
       $sStyleHidden_obser = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obser = 'display: none;';
   $sStyleReadInp_obser = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obser']) && $this->nmgp_cmp_readonly['obser'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obser']);
       $sStyleReadLab_obser = '';
       $sStyleReadInp_obser = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obser']) && $this->nmgp_cmp_hidden['obser'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obser" value="<?php echo $this->form_encode_input($obser) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_obser_line" id="hidden_field_data_obser" style="<?php echo $sStyleHidden_obser; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obser_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_obser_label" style=""><span id="id_label_obser"><?php echo $this->nm_new_label['obser']; ?></span></span><br>
<?php
$obser_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obser));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obser"]) &&  $this->nmgp_cmp_readonly["obser"] == "on") { 

 ?>
<input type="hidden" name="obser" value="<?php echo $this->form_encode_input($obser) . "\">" . $obser_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obser" class="sc-ui-readonly-obser css_obser_line" style="<?php echo $sStyleReadLab_obser; ?>"><?php echo $this->form_format_readonly("obser", $this->form_encode_input($obser_val)); ?></span><span id="id_read_off_obser" class="css_read_off_obser<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obser; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_obser_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obser" id="id_sc_field_obser" rows="4" cols="60"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obser; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obser_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obser_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_id_concepto_dumb = ('' == $sStyleHidden_id_concepto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_id_concepto_dumb" style="<?php echo $sStyleHidden_id_concepto_dumb; ?>"></TD>
<?php $sStyleHidden_obser_dumb = ('' == $sStyleHidden_obser) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_obser_dumb" style="<?php echo $sStyleHidden_obser_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['concepto']))
    {
        $this->nm_new_label['concepto'] = "Concepto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $concepto = $this->concepto;
   if (!isset($this->nmgp_cmp_hidden['concepto']))
   {
       $this->nmgp_cmp_hidden['concepto'] = 'off';
   }
   $sStyleHidden_concepto = '';
   if (isset($this->nmgp_cmp_hidden['concepto']) && $this->nmgp_cmp_hidden['concepto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['concepto']);
       $sStyleHidden_concepto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_concepto = 'display: none;';
   $sStyleReadInp_concepto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['concepto']) && $this->nmgp_cmp_readonly['concepto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['concepto']);
       $sStyleReadLab_concepto = '';
       $sStyleReadInp_concepto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['concepto']) && $this->nmgp_cmp_hidden['concepto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="concepto" value="<?php echo $this->form_encode_input($concepto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_concepto_line" id="hidden_field_data_concepto" style="<?php echo $sStyleHidden_concepto; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_concepto_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_concepto_label" style=""><span id="id_label_concepto"><?php echo $this->nm_new_label['concepto']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["concepto"]) &&  $this->nmgp_cmp_readonly["concepto"] == "on") { 

 ?>
<input type="hidden" name="concepto" value="<?php echo $this->form_encode_input($concepto) . "\">" . $concepto . ""; ?>
<?php } else { ?>
<span id="id_read_on_concepto" class="sc-ui-readonly-concepto css_concepto_line" style="<?php echo $sStyleReadLab_concepto; ?>"><?php echo $this->form_format_readonly("concepto", $this->form_encode_input($this->concepto)); ?></span><span id="id_read_off_concepto" class="css_read_off_concepto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_concepto; ?>">
 <input class="sc-js-input scFormObjectOdd css_concepto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_concepto" type=text name="concepto" value="<?php echo $this->form_encode_input($concepto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: 'PAGO FACTURA, ABONO A FACTURA, ANTICIPO, etc', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_concepto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_concepto_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['relleno']))
    {
        $this->nm_new_label['relleno'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $relleno = $this->relleno;
   $sStyleHidden_relleno = '';
   if (isset($this->nmgp_cmp_hidden['relleno']) && $this->nmgp_cmp_hidden['relleno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['relleno']);
       $sStyleHidden_relleno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_relleno = 'display: none;';
   $sStyleReadInp_relleno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['relleno']) && $this->nmgp_cmp_readonly['relleno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['relleno']);
       $sStyleReadLab_relleno = '';
       $sStyleReadInp_relleno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['relleno']) && $this->nmgp_cmp_hidden['relleno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="relleno" value="<?php echo $this->form_encode_input($relleno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_relleno_line" id="hidden_field_data_relleno" style="<?php echo $sStyleHidden_relleno; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_relleno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_relleno_label" style=""><span id="id_label_relleno"><?php echo $this->nm_new_label['relleno']; ?></span></span><br><input type="hidden" name="relleno" value="<?php echo $this->form_encode_input($relleno); ?>"><span id="id_ajax_label_relleno"><?php echo nl2br($relleno); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_relleno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_relleno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_concepto_dumb = ('' == $sStyleHidden_concepto) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_concepto_dumb" style="<?php echo $sStyleHidden_concepto_dumb; ?>"></TD>
<?php $sStyleHidden_relleno_dumb = ('' == $sStyleHidden_relleno) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_relleno_dumb" style="<?php echo $sStyleHidden_relleno_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf6\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Detalle<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idrecibo']))
           {
               $this->nmgp_cmp_readonly['idrecibo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['detallepagos']))
    {
        $this->nm_new_label['detallepagos'] = "Pagos Multiples formas";
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
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallepagos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_multi'] = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_grid_edit'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_grid_edit_link'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_qtd_reg'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init'] ]['form_detallepagos_rc']['embutida_parms'] = "par_idrc*scin" . $this->nmgp_dados_form['idrecibo'] . "*scoutgtotalpagado*scin0*scoutgmonto*scin0*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_reciboingreso_empty.htm' : $this->Ini->link_form_detallepagos_rc_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_detallepagos']) && 'nmsc_iframe_liga_form_detallepagos_rc' != $this->Ini->sc_lig_target['C_@scinf_detallepagos'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detallepagos'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['form_detallepagos_rc_script_case_init']);
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
<iframe border="0" id="nmsc_iframe_liga_form_detallepagos_rc"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="800" name="nmsc_iframe_liga_form_detallepagos_rc"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detallepagos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detallepagos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['idrecibo']))
    {
        $this->nm_new_label['idrecibo'] = "Idrecibo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idrecibo = $this->idrecibo;
   if (!isset($this->nmgp_cmp_hidden['idrecibo']))
   {
       $this->nmgp_cmp_hidden['idrecibo'] = 'off';
   }
   $sStyleHidden_idrecibo = '';
   if (isset($this->nmgp_cmp_hidden['idrecibo']) && $this->nmgp_cmp_hidden['idrecibo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idrecibo']);
       $sStyleHidden_idrecibo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idrecibo = 'display: none;';
   $sStyleReadInp_idrecibo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idrecibo"]) &&  $this->nmgp_cmp_readonly["idrecibo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idrecibo']);
       $sStyleReadLab_idrecibo = '';
       $sStyleReadInp_idrecibo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idrecibo']) && $this->nmgp_cmp_hidden['idrecibo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idrecibo" value="<?php echo $this->form_encode_input($idrecibo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idrecibo_line" id="hidden_field_data_idrecibo" style="<?php echo $sStyleHidden_idrecibo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idrecibo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idrecibo_label" style=""><span id="id_label_idrecibo"><?php echo $this->nm_new_label['idrecibo']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_idrecibo" css_idrecibo_line" style="<?php echo $sStyleReadLab_idrecibo; ?>"><?php echo $this->form_format_readonly("idrecibo", $this->form_encode_input($this->idrecibo)); ?></span><span id="id_read_off_idrecibo" class="css_read_off_idrecibo" style="<?php echo $sStyleReadInp_idrecibo; ?>"><input type="hidden" name="idrecibo" value="<?php echo $this->form_encode_input($idrecibo) . "\">"?><span id="id_ajax_label_idrecibo"><?php echo nl2br($idrecibo); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idrecibo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idrecibo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_detallepagos_dumb = ('' == $sStyleHidden_detallepagos) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_detallepagos_dumb" style="<?php echo $sStyleHidden_detallepagos_dumb; ?>"></TD>
<?php $sStyleHidden_idrecibo_dumb = ('' == $sStyleHidden_idrecibo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idrecibo_dumb" style="<?php echo $sStyleHidden_idrecibo_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['titulo']))
    {
        $this->nm_new_label['titulo'] = "CUENTA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $titulo = $this->titulo;
   if (!isset($this->nmgp_cmp_hidden['titulo']))
   {
       $this->nmgp_cmp_hidden['titulo'] = 'off';
   }
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

    <TD class="scFormDataOdd css_titulo_line" id="hidden_field_data_titulo" style="<?php echo $sStyleHidden_titulo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_titulo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_titulo_label" style=""><span id="id_label_titulo"><?php echo $this->nm_new_label['titulo']; ?></span></span><br><input type="hidden" name="titulo" value="<?php echo $this->form_encode_input($titulo); ?>"><span id="id_ajax_label_titulo"><?php echo nl2br($titulo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_titulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_titulo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['birpara'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6);

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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_reciboingreso");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_reciboingreso");
 parent.scAjaxDetailHeight("form_reciboingreso", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_reciboingreso", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_reciboingreso", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['sc_modal'])
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
	function scBtnFn_imprime() {
		if ($("#sc_imprime_top").length && $("#sc_imprime_top").is(":visible")) {
		    if ($("#sc_imprime_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_imprime()
			 return;
		}
	}
	function scBtnFn_btn_asentar() {
		if ($("#sc_btn_asentar_top").length && $("#sc_btn_asentar_top").is(":visible")) {
		    if ($("#sc_btn_asentar_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_btn_asentar()
			 return;
		}
	}
	function scBtnFn_btn_reversar() {
		if ($("#sc_btn_reversar_top").length && $("#sc_btn_reversar_top").is(":visible")) {
		    if ($("#sc_btn_reversar_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_btn_reversar()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_reciboingreso']['buttonStatus'] = $this->nmgp_botoes;
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
