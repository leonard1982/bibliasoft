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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Nueva venta"); } else { echo strip_tags("Editar venta"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_facturaven/form_facturaven_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_facturaven_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "pedido")
     {
        $('input[name="pedido"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="pedido"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="pedido"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "idcli")
     {
        $('input[name="idcli_autocomp"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="idcli_autocomp"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="idcli_autocomp"]').removeClass("scFormInputDisabled");
        }
        $('input[id="idcli_autocomp_cap"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#idcli_autocomp_cap').hide();
        }
        else {
            $('#idcli_autocomp_cap').show();
        }
     }
     if (F_name == "observaciones")
     {
        $('textarea[name="observaciones"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('textarea[name="observaciones"]').addClass("scFormInputDisabled");
        }
        else {
            $('textarea[name="observaciones"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "numfacven")
     {
        $('input[name="numfacven"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="numfacven"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="numfacven"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "pagada")
     {
        $('input[name="pagada"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="pagada"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="pagada"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "fechaven")
     {
        $('input[name="fechaven"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fechaven"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fechaven"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_fechaven"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_fechaven").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "fechavenc")
     {
        $('input[name="fechavenc"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fechavenc"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fechavenc"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_fechavenc"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_fechavenc").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "credito")
     {
        $('select[name="credito"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="credito"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="credito"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "resolucion")
     {
        $('select[name="resolucion"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="resolucion"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="resolucion"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_facturaven_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('idcli');

<?php
}
?>
  addAutocomplete(this);

  $("#hidden_bloco_0,#hidden_bloco_1").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

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
    "hidden_bloco_0": true,
    "hidden_bloco_1": true
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
      scAjaxDetailHeight("form_detalleventa", "500");
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


  $(".sc-ui-autocomp-idcli", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idcli" != sId ? sId.substr(5) : "";
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
    url: "form_facturaven.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idcli",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "idcli" != sId ? sId.substr(5) : "";
   sc_form_facturaven_idcli_onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });

  $(".sc-ui-autocomp-vendedor", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "vendedor" != sId ? sId.substr(8) : "";
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
    url: "form_facturaven.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_vendedor",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "vendedor" != sId ? sId.substr(8) : "";
   sc_form_facturaven_vendedor_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_facturaven_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_facturaven'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_facturaven'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Nueva venta"; } else { echo "Editar venta"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Eliminar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['eliminar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['eliminar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['eliminar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['eliminar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['eliminar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "eliminar", "scBtnFn_Eliminar()", "scBtnFn_Eliminar()", "sc_Eliminar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Eliminar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['eliminar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['eliminar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['eliminar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['eliminar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['eliminar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "eliminar", "scBtnFn_Eliminar()", "scBtnFn_Eliminar()", "sc_Eliminar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['rc'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['rc']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['rc']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['rc']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['rc']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['rc'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "rc", "scBtnFn_rc()", "scBtnFn_rc()", "sc_rc_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['rc'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['rc']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['rc']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['rc']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['rc']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['rc'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "rc", "scBtnFn_rc()", "scBtnFn_rc()", "sc_rc_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes == "novo")) {
        $sCondStyle = ($this->nmgp_botoes['autorizar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['autorizar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['autorizar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['autorizar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['autorizar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['autorizar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "autorizar", "scBtnFn_autorizar()", "scBtnFn_autorizar()", "sc_autorizar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes == "novo")) {
        $sCondStyle = ($this->nmgp_botoes['autorizar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['autorizar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['autorizar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['autorizar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['autorizar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['autorizar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "autorizar", "scBtnFn_autorizar()", "scBtnFn_autorizar()", "sc_autorizar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['imprimir'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['imprimir']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['imprimir']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['imprimir']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['imprimir']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['imprimir'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "imprimir", "scBtnFn_imprimir()", "scBtnFn_imprimir()", "sc_imprimir_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['imprimir'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['imprimir']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['imprimir']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['imprimir']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['imprimir']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['imprimir'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "imprimir", "scBtnFn_imprimir()", "scBtnFn_imprimir()", "sc_imprimir_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="30%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['nremision']))
   {
       $this->nmgp_cmp_hidden['nremision'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['pedido']))
   {
       $this->nmgp_cmp_hidden['pedido'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['imconsumo']))
   {
       $this->nmgp_cmp_hidden['imconsumo'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>ENCABEZADO (Datos)<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['resolucion']))
   {
       $this->nm_new_label['resolucion'] = "PREFIJO FACTURA:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_resolucion_label" id="hidden_field_label_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>"><span id="id_label_resolucion"><?php echo $this->nm_new_label['resolucion']; ?></span></TD>
    <TD class="scFormDataOdd css_resolucion_line" id="hidden_field_data_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resolucion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resolucion"]) &&  $this->nmgp_cmp_readonly["resolucion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  where fecha>0 ORDER BY prefijo";

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_resolucion'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_resolucion\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_resolucion_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_resolucion\" name=\"resolucion\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resolucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resolucion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numfacven']))
    {
        $this->nm_new_label['numfacven'] = "FACTURA No:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numfacven = $this->numfacven;
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numfacven_label" id="hidden_field_label_numfacven" style="<?php echo $sStyleHidden_numfacven; ?>"><span id="id_label_numfacven"><?php echo $this->nm_new_label['numfacven']; ?></span></TD>
    <TD class="scFormDataOdd css_numfacven_line" id="hidden_field_data_numfacven" style="<?php echo $sStyleHidden_numfacven; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numfacven_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numfacven"]) &&  $this->nmgp_cmp_readonly["numfacven"] == "on") { 

 ?>
<input type="hidden" name="numfacven" value="<?php echo $this->form_encode_input($numfacven) . "\">" . $numfacven . ""; ?>
<?php } else { ?>
<span id="id_read_on_numfacven" class="sc-ui-readonly-numfacven css_numfacven_line" style="<?php echo $sStyleReadLab_numfacven; ?>"><?php echo $this->form_format_readonly("numfacven", $this->form_encode_input($this->numfacven)); ?></span><span id="id_read_off_numfacven" class="css_read_off_numfacven<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numfacven; ?>">
 <input class="sc-js-input scFormObjectOdd css_numfacven_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numfacven" type=text name="numfacven" value="<?php echo $this->form_encode_input($numfacven) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numfacven']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numfacven']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numfacven']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numfacven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numfacven_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['elpedido']))
    {
        $this->nm_new_label['elpedido'] = "TRAER PEDIDO:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $elpedido = $this->elpedido;
   $sStyleHidden_elpedido = '';
   if (isset($this->nmgp_cmp_hidden['elpedido']) && $this->nmgp_cmp_hidden['elpedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['elpedido']);
       $sStyleHidden_elpedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_elpedido = 'display: none;';
   $sStyleReadInp_elpedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['elpedido']) && $this->nmgp_cmp_readonly['elpedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['elpedido']);
       $sStyleReadLab_elpedido = '';
       $sStyleReadInp_elpedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['elpedido']) && $this->nmgp_cmp_hidden['elpedido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="elpedido" value="<?php echo $this->form_encode_input($elpedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_elpedido_label" id="hidden_field_label_elpedido" style="<?php echo $sStyleHidden_elpedido; ?>"><span id="id_label_elpedido"><?php echo $this->nm_new_label['elpedido']; ?></span></TD>
    <TD class="scFormDataOdd css_elpedido_line" id="hidden_field_data_elpedido" style="<?php echo $sStyleHidden_elpedido; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_elpedido_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["elpedido"]) &&  $this->nmgp_cmp_readonly["elpedido"] == "on") { 

 ?>
<input type="hidden" name="elpedido" value="<?php echo $this->form_encode_input($elpedido) . "\">" . $elpedido . ""; ?>
<?php } else { ?>
<span id="id_read_on_elpedido" class="sc-ui-readonly-elpedido css_elpedido_line" style="<?php echo $sStyleReadLab_elpedido; ?>"><?php echo $this->form_format_readonly("elpedido", $this->form_encode_input($this->elpedido)); ?></span><span id="id_read_off_elpedido" class="css_read_off_elpedido<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_elpedido; ?>">
 <input class="sc-js-input scFormObjectOdd css_elpedido_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_elpedido" type=text name="elpedido" value="<?php echo $this->form_encode_input($elpedido) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['elpedido']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['elpedido']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['elpedido']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_facturaven*scout' : '';
   if (isset($this->Ini->sc_lig_md5["pedidos_sinfactura"]) && $this->Ini->sc_lig_md5["pedidos_sinfactura"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,elpedido,idpedido*scoutnm_evt_ret_busca*scinsc_form_facturaven_elpedido_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_facturaven@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,elpedido,idpedido*scoutnm_evt_ret_busca*scinsc_form_facturaven_elpedido_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_pedidos_sinfactura_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_pedidos_sinfactura_cons_psq. "', '" . $Md5_Lig . "')", "cap_elpedido", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_elpedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_elpedido_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pedido']))
    {
        $this->nm_new_label['pedido'] = "DOCUMENTO A CARGAR?:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pedido = $this->pedido;
   if (!isset($this->nmgp_cmp_hidden['pedido']))
   {
       $this->nmgp_cmp_hidden['pedido'] = 'off';
   }
   $sStyleHidden_pedido = '';
   if (isset($this->nmgp_cmp_hidden['pedido']) && $this->nmgp_cmp_hidden['pedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pedido']);
       $sStyleHidden_pedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pedido = 'display: none;';
   $sStyleReadInp_pedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pedido']) && $this->nmgp_cmp_readonly['pedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pedido']);
       $sStyleReadLab_pedido = '';
       $sStyleReadInp_pedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pedido']) && $this->nmgp_cmp_hidden['pedido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pedido" value="<?php echo $this->form_encode_input($pedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pedido_label" id="hidden_field_label_pedido" style="<?php echo $sStyleHidden_pedido; ?>"><span id="id_label_pedido"><?php echo $this->nm_new_label['pedido']; ?></span></TD>
    <TD class="scFormDataOdd css_pedido_line" id="hidden_field_data_pedido" style="<?php echo $sStyleHidden_pedido; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pedido_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="pedido" value="<?php echo $this->form_encode_input($pedido); ?>"><span id="id_ajax_label_pedido"><?php echo nl2br($pedido); ?></span>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('pedido')", "nm_mostra_mens('pedido')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pedido_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechaven']))
    {
        $this->nm_new_label['fechaven'] = "FECHA:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechaven_label" id="hidden_field_label_fechaven" style="<?php echo $sStyleHidden_fechaven; ?>"><span id="id_label_fechaven"><?php echo $this->nm_new_label['fechaven']; ?></span></TD>
    <TD class="scFormDataOdd css_fechaven_line" id="hidden_field_data_fechaven" style="<?php echo $sStyleHidden_fechaven; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaven_line" style="vertical-align: top;padding: 0px">
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechaven']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaven']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaven_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dias_decredito']))
    {
        $this->nm_new_label['dias_decredito'] = "DIAS CRÉDITO?:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dias_decredito_label" id="hidden_field_label_dias_decredito" style="<?php echo $sStyleHidden_dias_decredito; ?>"><span id="id_label_dias_decredito"><?php echo $this->nm_new_label['dias_decredito']; ?></span></TD>
    <TD class="scFormDataOdd css_dias_decredito_line" id="hidden_field_data_dias_decredito" style="<?php echo $sStyleHidden_dias_decredito; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dias_decredito_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dias_decredito"]) &&  $this->nmgp_cmp_readonly["dias_decredito"] == "on") { 

 ?>
<input type="hidden" name="dias_decredito" value="<?php echo $this->form_encode_input($dias_decredito) . "\">" . $dias_decredito . ""; ?>
<?php } else { ?>
<span id="id_read_on_dias_decredito" class="sc-ui-readonly-dias_decredito css_dias_decredito_line" style="<?php echo $sStyleReadLab_dias_decredito; ?>"><?php echo $this->form_format_readonly("dias_decredito", $this->form_encode_input($this->dias_decredito)); ?></span><span id="id_read_off_dias_decredito" class="css_read_off_dias_decredito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dias_decredito; ?>">
 <input class="sc-js-input scFormObjectOdd css_dias_decredito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dias_decredito" type=text name="dias_decredito" value="<?php echo $this->form_encode_input($dias_decredito) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dias_decredito']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dias_decredito']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dias_decredito']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dias_decredito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dias_decredito_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechavenc']))
    {
        $this->nm_new_label['fechavenc'] = "FECH: VENCIMIENTO:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechavenc = $this->fechavenc;
   $sStyleHidden_fechavenc = '';
   if (isset($this->nmgp_cmp_hidden['fechavenc']) && $this->nmgp_cmp_hidden['fechavenc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechavenc']);
       $sStyleHidden_fechavenc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechavenc = 'display: none;';
   $sStyleReadInp_fechavenc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechavenc']) && $this->nmgp_cmp_readonly['fechavenc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechavenc']);
       $sStyleReadLab_fechavenc = '';
       $sStyleReadInp_fechavenc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechavenc']) && $this->nmgp_cmp_hidden['fechavenc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechavenc" value="<?php echo $this->form_encode_input($fechavenc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechavenc_label" id="hidden_field_label_fechavenc" style="<?php echo $sStyleHidden_fechavenc; ?>"><span id="id_label_fechavenc"><?php echo $this->nm_new_label['fechavenc']; ?></span></TD>
    <TD class="scFormDataOdd css_fechavenc_line" id="hidden_field_data_fechavenc" style="<?php echo $sStyleHidden_fechavenc; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechavenc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechavenc"]) &&  $this->nmgp_cmp_readonly["fechavenc"] == "on") { 

 ?>
<input type="hidden" name="fechavenc" value="<?php echo $this->form_encode_input($fechavenc) . "\">" . $fechavenc . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechavenc" class="sc-ui-readonly-fechavenc css_fechavenc_line" style="<?php echo $sStyleReadLab_fechavenc; ?>"><?php echo $this->form_format_readonly("fechavenc", $this->form_encode_input($fechavenc)); ?></span><span id="id_read_off_fechavenc" class="css_read_off_fechavenc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechavenc; ?>"><?php
$tmp_form_data = $this->field_config['fechavenc']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechavenc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechavenc" type=text name="fechavenc" value="<?php echo $this->form_encode_input($fechavenc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechavenc']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechavenc']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechavenc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechavenc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pagada']))
    {
        $this->nm_new_label['pagada'] = "PAGADA?:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pagada = $this->pagada;
   $sStyleHidden_pagada = '';
   if (isset($this->nmgp_cmp_hidden['pagada']) && $this->nmgp_cmp_hidden['pagada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pagada']);
       $sStyleHidden_pagada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pagada = 'display: none;';
   $sStyleReadInp_pagada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pagada']) && $this->nmgp_cmp_readonly['pagada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pagada']);
       $sStyleReadLab_pagada = '';
       $sStyleReadInp_pagada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pagada']) && $this->nmgp_cmp_hidden['pagada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pagada" value="<?php echo $this->form_encode_input($pagada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pagada_label" id="hidden_field_label_pagada" style="<?php echo $sStyleHidden_pagada; ?>"><span id="id_label_pagada"><?php echo $this->nm_new_label['pagada']; ?></span></TD>
    <TD class="scFormDataOdd css_pagada_line" id="hidden_field_data_pagada" style="<?php echo $sStyleHidden_pagada; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pagada_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="pagada" value="<?php echo $this->form_encode_input($pagada); ?>"><span id="id_ajax_label_pagada"><?php echo nl2br($pagada); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pagada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pagada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pref_pedido']))
    {
        $this->nm_new_label['pref_pedido'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pref_pedido = $this->pref_pedido;
   $sStyleHidden_pref_pedido = '';
   if (isset($this->nmgp_cmp_hidden['pref_pedido']) && $this->nmgp_cmp_hidden['pref_pedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pref_pedido']);
       $sStyleHidden_pref_pedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pref_pedido = 'display: none;';
   $sStyleReadInp_pref_pedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pref_pedido']) && $this->nmgp_cmp_readonly['pref_pedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pref_pedido']);
       $sStyleReadLab_pref_pedido = '';
       $sStyleReadInp_pref_pedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pref_pedido']) && $this->nmgp_cmp_hidden['pref_pedido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pref_pedido" value="<?php echo $this->form_encode_input($pref_pedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pref_pedido_label" id="hidden_field_label_pref_pedido" style="<?php echo $sStyleHidden_pref_pedido; ?>"><span id="id_label_pref_pedido"><?php echo $this->nm_new_label['pref_pedido']; ?></span></TD>
    <TD class="scFormDataOdd css_pref_pedido_line" id="hidden_field_data_pref_pedido" style="<?php echo $sStyleHidden_pref_pedido; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pref_pedido_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pref_pedido"]) &&  $this->nmgp_cmp_readonly["pref_pedido"] == "on") { 

 ?>
<input type="hidden" name="pref_pedido" value="<?php echo $this->form_encode_input($pref_pedido) . "\">" . $pref_pedido . ""; ?>
<?php } else { ?>
<span id="id_read_on_pref_pedido" class="sc-ui-readonly-pref_pedido css_pref_pedido_line" style="<?php echo $sStyleReadLab_pref_pedido; ?>"><?php echo $this->form_format_readonly("pref_pedido", $this->form_encode_input($this->pref_pedido)); ?></span><span id="id_read_off_pref_pedido" class="css_read_off_pref_pedido<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pref_pedido; ?>">
 <input class="sc-js-input scFormObjectOdd css_pref_pedido_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pref_pedido" type=text name="pref_pedido" value="<?php echo $this->form_encode_input($pref_pedido) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pref_pedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pref_pedido_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="70%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcli']))
    {
        $this->nm_new_label['idcli'] = "EL CLIENTE:";
    }
?>
<?php
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
<?php if (isset($this->nmgp_cmp_hidden['idcli']) && $this->nmgp_cmp_hidden['idcli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcli" value="<?php echo $this->form_encode_input($idcli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idcli_label" id="hidden_field_label_idcli" style="<?php echo $sStyleHidden_idcli; ?>"><span id="id_label_idcli"><?php echo $this->nm_new_label['idcli']; ?></span></TD>
    <TD class="scFormDataOdd css_idcli_line" id="hidden_field_data_idcli" style="<?php echo $sStyleHidden_idcli; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcli_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcli"]) &&  $this->nmgp_cmp_readonly["idcli"] == "on") { 

 ?>
<input type="hidden" name="idcli" value="<?php echo $this->form_encode_input($idcli) . "\">" . $idcli . ""; ?>
<?php } else { ?>

<?php
$aRecData['idcli'] = $this->idcli;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,\" - \", nombres) FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   if ('' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idcli])) ? $aLookup[0][$this->idcli] : $this->idcli;
$idcli_look = (isset($aLookup[0][$this->idcli])) ? $aLookup[0][$this->idcli] : $this->idcli;
?>
<span id="id_read_on_idcli" class="sc-ui-readonly-idcli css_idcli_line" style="<?php echo $sStyleReadLab_idcli; ?>"><?php echo $this->form_format_readonly("idcli", str_replace("<", "&lt;", $idcli_look)); ?></span><span id="id_read_off_idcli" class="css_read_off_idcli<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idcli; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcli_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_idcli" type=text name="idcli" value="<?php echo $this->form_encode_input($idcli) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idcli'] = $this->idcli;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,\" - \", nombres) FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (cliente='SI') AND idtercero = " . substr($this->Db->qstr($this->idcli), 1, -1) . " ORDER BY documento, nombres, direccion, tel_cel";
   }

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   if ('' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli && '' != $this->idcli)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_idcli'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idcli])) ? $aLookup[0][$this->idcli] : '';
$idcli_look = (isset($aLookup[0][$this->idcli])) ? $aLookup[0][$this->idcli] : '';
?>
<select id="id_ac_idcli" class="scFormObjectOdd sc-ui-autocomp-idcli css_idcli_obj sc-js-input"><?php if ('' != $this->idcli) { ?><option value="<?php echo $this->idcli ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select>
<?php
   if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_idcli*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_facturaven@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_idcli*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
?>
<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_idcli", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_terceros_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_facturaven&KeepThis=true&TB_iframe=true&height=400&width=1100&modal=true", "");?>
<?php } ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcli_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcli_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['dircliente']))
   {
       $this->nm_new_label['dircliente'] = "DIRECCIÓN/SUCURSAL:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dircliente_label" id="hidden_field_label_dircliente" style="<?php echo $sStyleHidden_dircliente; ?>"><span id="id_label_dircliente"><?php echo $this->nm_new_label['dircliente']; ?></span></TD>
    <TD class="scFormDataOdd css_dircliente_line" id="hidden_field_data_dircliente" style="<?php echo $sStyleHidden_dircliente; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dircliente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dircliente"]) &&  $this->nmgp_cmp_readonly["dircliente"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT d.iddireccion,  d.direc + \" - \" + d.telefono + \" - \" + d.idmuni + \" \" + m.municipio FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT d.iddireccion,  concat(d.direc, \" - \",d.telefono,  \" - \",d.idmuni, \" \",m.municipio) FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT d.iddireccion,  d.direc&\" - \"&d.telefono&\" - \"&d.idmuni&\" \"&m.municipio FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT d.iddireccion,  d.direc||\" - \"||d.telefono||\" - \"||d.idmuni||\" \"||m.municipio FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT d.iddireccion,  d.direc + \" - \" + d.telefono + \" - \" + d.idmuni + \" \" + m.municipio FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT d.iddireccion,  d.direc||\" - \"||d.telefono||\" - \"||d.idmuni||\" \"||m.municipio FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }
   else
   {
       $nm_comando = "SELECT d.iddireccion,  d.direc||\" - \"||d.telefono||\" - \"||d.idmuni||\" \"||m.municipio FROM direccion d left join municipio m on  d.idmuni=m.idmun where idter=$this->idcli ORDER BY idter";
   }

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_dircliente'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_dircliente\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_dircliente_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_dircliente\" name=\"dircliente\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dircliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dircliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vendedor']))
    {
        $this->nm_new_label['vendedor'] = "LO ATIENDE:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vendedor = $this->vendedor;
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vendedor_label" id="hidden_field_label_vendedor" style="<?php echo $sStyleHidden_vendedor; ?>"><span id="id_label_vendedor"><?php echo $this->nm_new_label['vendedor']; ?></span></TD>
    <TD class="scFormDataOdd css_vendedor_line" id="hidden_field_data_vendedor" style="<?php echo $sStyleHidden_vendedor; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vendedor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vendedor"]) &&  $this->nmgp_cmp_readonly["vendedor"] == "on") { 

 ?>
<input type="hidden" name="vendedor" value="<?php echo $this->form_encode_input($vendedor) . "\">" . $vendedor . ""; ?>
<?php } else { ?>

<?php
$aRecData['vendedor'] = $this->vendedor;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres) FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   if ('' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->vendedor])) ? $aLookup[0][$this->vendedor] : $this->vendedor;
$vendedor_look = (isset($aLookup[0][$this->vendedor])) ? $aLookup[0][$this->vendedor] : $this->vendedor;
?>
<span id="id_read_on_vendedor" class="sc-ui-readonly-vendedor css_vendedor_line" style="<?php echo $sStyleReadLab_vendedor; ?>"><?php echo $this->form_format_readonly("vendedor", str_replace("<", "&lt;", $vendedor_look)); ?></span><span id="id_read_off_vendedor" class="css_read_off_vendedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vendedor; ?>">
 <input class="sc-js-input scFormObjectOdd css_vendedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_vendedor" type=text name="vendedor" value="<?php echo $this->form_encode_input($vendedor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['vendedor'] = $this->vendedor;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres) FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   if ('' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_vendedor'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->vendedor])) ? $aLookup[0][$this->vendedor] : '';
$vendedor_look = (isset($aLookup[0][$this->vendedor])) ? $aLookup[0][$this->vendedor] : '';
?>
<select id="id_ac_vendedor" class="scFormObjectOdd sc-ui-autocomp-vendedor css_vendedor_obj sc-js-input"><?php if ('' != $this->vendedor) { ?><option value="<?php echo $this->vendedor ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vendedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vendedor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['credito']))
   {
       $this->nm_new_label['credito'] = "CRÉDITO?:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_credito_label" id="hidden_field_label_credito" style="<?php echo $sStyleHidden_credito; ?>"><span id="id_label_credito"><?php echo $this->nm_new_label['credito']; ?></span></TD>
    <TD class="scFormDataOdd css_credito_line" id="hidden_field_data_credito" style="<?php echo $sStyleHidden_credito; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_credito_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["credito"]) &&  $this->nmgp_cmp_readonly["credito"] == "on") { 

$credito_look = "";
 if ($this->credito == "2") { $credito_look .= "No" ;} 
 if ($this->credito == "1") { $credito_look .= "Sí" ;} 
 if (empty($credito_look)) { $credito_look = $this->credito; }
?>
<input type="hidden" name="credito" value="<?php echo $this->form_encode_input($credito) . "\">" . $credito_look . ""; ?>
<?php } else { ?>
<?php

$credito_look = "";
 if ($this->credito == "2") { $credito_look .= "No" ;} 
 if ($this->credito == "1") { $credito_look .= "Sí" ;} 
 if (empty($credito_look)) { $credito_look = $this->credito; }
?>
<span id="id_read_on_credito" class="css_credito_line"  style="<?php echo $sStyleReadLab_credito; ?>"><?php echo $this->form_format_readonly("credito", $this->form_encode_input($credito_look)); ?></span><span id="id_read_off_credito" class="css_read_off_credito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_credito; ?>">
 <span id="idAjaxSelect_credito" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_credito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_credito" name="credito" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="2" <?php  if ($this->credito == "2") { echo " selected" ;} ?><?php  if (empty($this->credito)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_credito'][] = '2'; ?>
 <option  value="1" <?php  if ($this->credito == "1") { echo " selected" ;} ?>>Sí</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_credito'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_credito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_credito_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['asentada']))
   {
       $this->nm_new_label['asentada'] = "ASENTADA?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asentada = $this->asentada;
   $sStyleHidden_asentada = '';
   if (isset($this->nmgp_cmp_hidden['asentada']) && $this->nmgp_cmp_hidden['asentada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['asentada']);
       $sStyleHidden_asentada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_asentada = 'display: none;';
   $sStyleReadInp_asentada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['asentada']) && $this->nmgp_cmp_readonly['asentada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['asentada']);
       $sStyleReadLab_asentada = '';
       $sStyleReadInp_asentada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['asentada']) && $this->nmgp_cmp_hidden['asentada'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="asentada" value="<?php echo $this->form_encode_input($this->asentada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_asentada_label" id="hidden_field_label_asentada" style="<?php echo $sStyleHidden_asentada; ?>"><span id="id_label_asentada"><?php echo $this->nm_new_label['asentada']; ?></span></TD>
    <TD class="scFormDataOdd css_asentada_line" id="hidden_field_data_asentada" style="<?php echo $sStyleHidden_asentada; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asentada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asentada"]) &&  $this->nmgp_cmp_readonly["asentada"] == "on") { 

$asentada_look = "";
 if ($this->asentada == "0") { $asentada_look .= "No" ;} 
 if ($this->asentada == "1") { $asentada_look .= "Sí" ;} 
 if (empty($asentada_look)) { $asentada_look = $this->asentada; }
?>
<input type="hidden" name="asentada" value="<?php echo $this->form_encode_input($asentada) . "\">" . $asentada_look . ""; ?>
<?php } else { ?>
<?php

$asentada_look = "";
 if ($this->asentada == "0") { $asentada_look .= "No" ;} 
 if ($this->asentada == "1") { $asentada_look .= "Sí" ;} 
 if (empty($asentada_look)) { $asentada_look = $this->asentada; }
?>
<span id="id_read_on_asentada" class="css_asentada_line"  style="<?php echo $sStyleReadLab_asentada; ?>"><?php echo $this->form_format_readonly("asentada", $this->form_encode_input($asentada_look)); ?></span><span id="id_read_off_asentada" class="css_read_off_asentada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_asentada; ?>">
 <span id="idAjaxSelect_asentada" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_asentada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_asentada" name="asentada" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="0" <?php  if ($this->asentada == "0") { echo " selected" ;} ?><?php  if (empty($this->asentada)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_asentada'][] = '0'; ?>
 <option  value="1" <?php  if ($this->asentada == "1") { echo " selected" ;} ?>>Sí</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_asentada'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asentada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asentada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observaciones']))
    {
        $this->nm_new_label['observaciones'] = "OBSERVACIONES:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_observaciones_label" id="hidden_field_label_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></TD>
    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px">
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Observaciones sobre la venta', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nremision']))
    {
        $this->nm_new_label['nremision'] = "Remisión #";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nremision = $this->nremision;
   if (!isset($this->nmgp_cmp_hidden['nremision']))
   {
       $this->nmgp_cmp_hidden['nremision'] = 'off';
   }
   $sStyleHidden_nremision = '';
   if (isset($this->nmgp_cmp_hidden['nremision']) && $this->nmgp_cmp_hidden['nremision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nremision']);
       $sStyleHidden_nremision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nremision = 'display: none;';
   $sStyleReadInp_nremision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nremision']) && $this->nmgp_cmp_readonly['nremision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nremision']);
       $sStyleReadLab_nremision = '';
       $sStyleReadInp_nremision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nremision']) && $this->nmgp_cmp_hidden['nremision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nremision" value="<?php echo $this->form_encode_input($nremision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nremision_label" id="hidden_field_label_nremision" style="<?php echo $sStyleHidden_nremision; ?>"><span id="id_label_nremision"><?php echo $this->nm_new_label['nremision']; ?></span></TD>
    <TD class="scFormDataOdd css_nremision_line" id="hidden_field_data_nremision" style="<?php echo $sStyleHidden_nremision; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nremision_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nremision"]) &&  $this->nmgp_cmp_readonly["nremision"] == "on") { 

 ?>
<input type="hidden" name="nremision" value="<?php echo $this->form_encode_input($nremision) . "\">" . $nremision . ""; ?>
<?php } else { ?>
<span id="id_read_on_nremision" class="sc-ui-readonly-nremision css_nremision_line" style="<?php echo $sStyleReadLab_nremision; ?>"><?php echo $this->form_format_readonly("nremision", $this->form_encode_input($this->nremision)); ?></span><span id="id_read_off_nremision" class="css_read_off_nremision<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nremision; ?>">
 <input class="sc-js-input scFormObjectOdd css_nremision_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nremision" type=text name="nremision" value="<?php echo $this->form_encode_input($nremision) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['nremision']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['nremision']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['nremision']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nremision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nremision_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="30%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


    <TD class="scFormDataOdd" id="hidden_field_data_cree" style="<?php echo $sStyleHidden_cree; ?>vertical-align: top;">
   <?php
   if (!isset($this->nm_new_label['retefuente']))
   {
       $this->nm_new_label['retefuente'] = "RETEFUENTE % :";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $retefuente = $this->retefuente;
   $sStyleHidden_retefuente = '';
   if (isset($this->nmgp_cmp_hidden['retefuente']) && $this->nmgp_cmp_hidden['retefuente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['retefuente']);
       $sStyleHidden_retefuente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_retefuente = 'display: none;';
   $sStyleReadInp_retefuente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['retefuente']) && $this->nmgp_cmp_readonly['retefuente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['retefuente']);
       $sStyleReadLab_retefuente = '';
       $sStyleReadInp_retefuente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['retefuente']) && $this->nmgp_cmp_hidden['retefuente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="retefuente" value="<?php echo $this->form_encode_input($this->retefuente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_retefuente?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_retefuente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_retefuente_label" style=""><span id="id_label_retefuente"><?php echo $this->nm_new_label['retefuente']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["retefuente"]) &&  $this->nmgp_cmp_readonly["retefuente"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   $nm_comando = "SELECT  porrete  FROM tiporetefuente  ORDER BY id_tiporetefuente DESC";

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente'][] = $rs->fields[0];
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
   $retefuente_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->retefuente_1))
          {
              foreach ($this->retefuente_1 as $tmp_retefuente)
              {
                  if (trim($tmp_retefuente) === trim($cadaselect[1])) { $retefuente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->retefuente) === trim($cadaselect[1])) { $retefuente_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="retefuente" value="<?php echo $this->form_encode_input($retefuente) . "\">" . $retefuente_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_retefuente();
   $x = 0 ; 
   $retefuente_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->retefuente_1))
          {
              foreach ($this->retefuente_1 as $tmp_retefuente)
              {
                  if (trim($tmp_retefuente) === trim($cadaselect[1])) { $retefuente_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->retefuente) === trim($cadaselect[1])) { $retefuente_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($retefuente_look))
          {
              $retefuente_look = $this->retefuente;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_retefuente\" class=\"css_retefuente_line\" style=\"" .  $sStyleReadLab_retefuente . "\">" . $this->form_format_readonly("retefuente", $this->form_encode_input($retefuente_look)) . "</span><span id=\"id_read_off_retefuente\" class=\"css_read_off_retefuente" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_retefuente . "\">";
   echo " <span id=\"idAjaxSelect_retefuente\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_retefuente_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_retefuente\" name=\"retefuente\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_retefuente'][] = '0.000'; 
   echo "  <option value=\"0.000\">" . str_replace("<", "&lt;","%") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->retefuente) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->retefuente)) 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_retefuente*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_facturaven@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_retefuente*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_retefuente", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tiporetefuente_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_facturaven&KeepThis=true&TB_iframe=true&height=400&width=720&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_retefuente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_retefuente_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

   <?php
   if (!isset($this->nm_new_label['cree']))
   {
       $this->nm_new_label['cree'] = "AUTO RETENCIÓN %:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cree = $this->cree;
   $sStyleHidden_cree = '';
   if (isset($this->nmgp_cmp_hidden['cree']) && $this->nmgp_cmp_hidden['cree'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cree']);
       $sStyleHidden_cree = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cree = 'display: none;';
   $sStyleReadInp_cree = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cree']) && $this->nmgp_cmp_readonly['cree'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cree']);
       $sStyleReadLab_cree = '';
       $sStyleReadInp_cree = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cree']) && $this->nmgp_cmp_hidden['cree'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cree" value="<?php echo $this->form_encode_input($this->cree) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_cree?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cree_line" style="vertical-align: top;padding: 0px">&nbsp;<span class="scFormLabelOddFormat css_cree_label" style=""><span id="id_label_cree"><?php echo $this->nm_new_label['cree']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cree"]) &&  $this->nmgp_cmp_readonly["cree"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   $nm_comando = "SELECT  porcntajeauto  FROM tipoautoretencion  ORDER BY id_autoret DESC";

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_cree'][] = $rs->fields[0];
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
   $cree_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cree_1))
          {
              foreach ($this->cree_1 as $tmp_cree)
              {
                  if (trim($tmp_cree) === trim($cadaselect[1])) { $cree_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cree) === trim($cadaselect[1])) { $cree_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="cree" value="<?php echo $this->form_encode_input($cree) . "\">" . $cree_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_cree();
   $x = 0 ; 
   $cree_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cree_1))
          {
              foreach ($this->cree_1 as $tmp_cree)
              {
                  if (trim($tmp_cree) === trim($cadaselect[1])) { $cree_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cree) === trim($cadaselect[1])) { $cree_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($cree_look))
          {
              $cree_look = $this->cree;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_cree\" class=\"css_cree_line\" style=\"" .  $sStyleReadLab_cree . "\">" . $this->form_format_readonly("cree", $this->form_encode_input($cree_look)) . "</span><span id=\"id_read_off_cree\" class=\"css_read_off_cree" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_cree . "\">";
   echo " <span id=\"idAjaxSelect_cree\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_cree_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_cree\" name=\"cree\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->cree) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->cree)) 
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
   if (isset($this->Ini->sc_lig_md5["form_tipoautoretencion"]) && $this->Ini->sc_lig_md5["form_tipoautoretencion"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_cree*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_facturaven@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_cree*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_cree", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tipoautoretencion_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_facturaven&KeepThis=true&TB_iframe=true&height=400&width=720&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cree_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cree_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

    </TD>




<?php if ($sc_hidden_no > 0) { echo "</tr>"; } ?>


    <TD class="scFormDataOdd" >




   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="30%" height="">
   <a name="bloco_3"></a>
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['imconsumo']))
           {
               $this->nmgp_cmp_readonly['imconsumo'] = 'on';
           }
?>


    <TD class="scFormDataOdd" id="hidden_field_data_reteiva" style="<?php echo $sStyleHidden_reteiva; ?>vertical-align: top;">
   <?php
   if (!isset($this->nm_new_label['reteica']))
   {
       $this->nm_new_label['reteica'] = "RETEICA %:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $reteica = $this->reteica;
   $sStyleHidden_reteica = '';
   if (isset($this->nmgp_cmp_hidden['reteica']) && $this->nmgp_cmp_hidden['reteica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['reteica']);
       $sStyleHidden_reteica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_reteica = 'display: none;';
   $sStyleReadInp_reteica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['reteica']) && $this->nmgp_cmp_readonly['reteica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['reteica']);
       $sStyleReadLab_reteica = '';
       $sStyleReadInp_reteica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['reteica']) && $this->nmgp_cmp_hidden['reteica'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="reteica" value="<?php echo $this->form_encode_input($this->reteica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_reteica?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_reteica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_reteica_label" style=""><span id="id_label_reteica"><?php echo $this->nm_new_label['reteica']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["reteica"]) &&  $this->nmgp_cmp_readonly["reteica"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_elpedido = $this->elpedido;
   $old_value_pedido = $this->pedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_nremision = $this->nremision;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_elpedido = $this->elpedido;
   $unformatted_value_pedido = $this->pedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;

   $nm_comando = "SELECT  porcica  FROM tipoica  ORDER BY  id_ica DESC";

   $this->numfacven = $old_value_numfacven;
   $this->elpedido = $old_value_elpedido;
   $this->pedido = $old_value_pedido;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->nremision = $old_value_nremision;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lookup_reteica'][] = $rs->fields[0];
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
   $reteica_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->reteica_1))
          {
              foreach ($this->reteica_1 as $tmp_reteica)
              {
                  if (trim($tmp_reteica) === trim($cadaselect[1])) { $reteica_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->reteica) === trim($cadaselect[1])) { $reteica_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="reteica" value="<?php echo $this->form_encode_input($reteica) . "\">" . $reteica_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_reteica();
   $x = 0 ; 
   $reteica_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->reteica_1))
          {
              foreach ($this->reteica_1 as $tmp_reteica)
              {
                  if (trim($tmp_reteica) === trim($cadaselect[1])) { $reteica_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->reteica) === trim($cadaselect[1])) { $reteica_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($reteica_look))
          {
              $reteica_look = $this->reteica;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_reteica\" class=\"css_reteica_line\" style=\"" .  $sStyleReadLab_reteica . "\">" . $this->form_format_readonly("reteica", $this->form_encode_input($reteica_look)) . "</span><span id=\"id_read_off_reteica\" class=\"css_read_off_reteica" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_reteica . "\">";
   echo " <span id=\"idAjaxSelect_reteica\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_reteica_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_reteica\" name=\"reteica\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->reteica) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->reteica)) 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_reteica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_facturaven@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_facturaven_lkpedt_refresh_reteica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_reteica", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tipoica_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=form_facturaven&KeepThis=true&TB_iframe=true&height=400&width=720&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_reteica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_reteica_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

   <?php
    if (!isset($this->nm_new_label['reteiva']))
    {
        $this->nm_new_label['reteiva'] = "RETEIVA %:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $reteiva = $this->reteiva;
   $sStyleHidden_reteiva = '';
   if (isset($this->nmgp_cmp_hidden['reteiva']) && $this->nmgp_cmp_hidden['reteiva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['reteiva']);
       $sStyleHidden_reteiva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_reteiva = 'display: none;';
   $sStyleReadInp_reteiva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['reteiva']) && $this->nmgp_cmp_readonly['reteiva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['reteiva']);
       $sStyleReadLab_reteiva = '';
       $sStyleReadInp_reteiva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['reteiva']) && $this->nmgp_cmp_hidden['reteiva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="reteiva" value="<?php echo $this->form_encode_input($reteiva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_reteiva?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_reteiva_line" style="vertical-align: top;padding: 0px">&nbsp;<span class="scFormLabelOddFormat css_reteiva_label" style=""><span id="id_label_reteiva"><?php echo $this->nm_new_label['reteiva']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["reteiva"]) &&  $this->nmgp_cmp_readonly["reteiva"] == "on") { 

 ?>
<input type="hidden" name="reteiva" value="<?php echo $this->form_encode_input($reteiva) . "\">" . $reteiva . ""; ?>
<?php } else { ?>
<span id="id_read_on_reteiva" class="sc-ui-readonly-reteiva css_reteiva_line" style="<?php echo $sStyleReadLab_reteiva; ?>"><?php echo $this->form_format_readonly("reteiva", $this->form_encode_input($this->reteiva)); ?></span><span id="id_read_off_reteiva" class="css_read_off_reteiva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_reteiva; ?>">
 <input class="sc-js-input scFormObjectOdd css_reteiva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_reteiva" type=text name="reteiva" value="<?php echo $this->form_encode_input($reteiva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['reteiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['reteiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['reteiva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['reteiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_reteiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_reteiva_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

    </TD>




<?php if ($sc_hidden_no > 0) { echo "</tr>"; } ?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


    <TD class="scFormDataOdd" id="hidden_field_data_imconsumo" style="<?php echo $sStyleHidden_imconsumo; ?>vertical-align: top;">
   <?php
    if (!isset($this->nm_new_label['imconsumo']))
    {
        $this->nm_new_label['imconsumo'] = "Imconsumo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $imconsumo = $this->imconsumo;
   if (!isset($this->nmgp_cmp_hidden['imconsumo']))
   {
       $this->nmgp_cmp_hidden['imconsumo'] = 'off';
   }
   $sStyleHidden_imconsumo = '';
   if (isset($this->nmgp_cmp_hidden['imconsumo']) && $this->nmgp_cmp_hidden['imconsumo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['imconsumo']);
       $sStyleHidden_imconsumo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_imconsumo = 'display: none;';
   $sStyleReadInp_imconsumo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["imconsumo"]) &&  $this->nmgp_cmp_readonly["imconsumo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['imconsumo']);
       $sStyleReadLab_imconsumo = '';
       $sStyleReadInp_imconsumo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['imconsumo']) && $this->nmgp_cmp_hidden['imconsumo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imconsumo" value="<?php echo $this->form_encode_input($imconsumo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_imconsumo?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_imconsumo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_imconsumo_label" style=""><span id="id_label_imconsumo"><?php echo $this->nm_new_label['imconsumo']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["imconsumo"]) &&  $this->nmgp_cmp_readonly["imconsumo"] == "on")) { 

 ?>
<input type="hidden" name="imconsumo" value="<?php echo $this->form_encode_input($imconsumo) . "\"><span id=\"id_ajax_label_imconsumo\">" . $imconsumo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_imconsumo" class="sc-ui-readonly-imconsumo css_imconsumo_line" style="<?php echo $sStyleReadLab_imconsumo; ?>"><?php echo $this->form_format_readonly("imconsumo", $this->form_encode_input($this->imconsumo)); ?></span><span id="id_read_off_imconsumo" class="css_read_off_imconsumo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_imconsumo; ?>">
 <input class="sc-js-input scFormObjectOdd css_imconsumo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_imconsumo" type=text name="imconsumo" value="<?php echo $this->form_encode_input($imconsumo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['imconsumo']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['imconsumo']['format_pos'] || 3 == $this->field_config['imconsumo']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['imconsumo']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['imconsumo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['imconsumo']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['imconsumo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imconsumo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imconsumo_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

    </TD>




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
    if (!isset($this->nm_new_label['cupodis']))
    {
        $this->nm_new_label['cupodis'] = "Cupo Disponible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cupodis = $this->cupodis;
   $sStyleHidden_cupodis = '';
   if (isset($this->nmgp_cmp_hidden['cupodis']) && $this->nmgp_cmp_hidden['cupodis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cupodis']);
       $sStyleHidden_cupodis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cupodis = 'display: none;';
   $sStyleReadInp_cupodis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cupodis']) && $this->nmgp_cmp_readonly['cupodis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cupodis']);
       $sStyleReadLab_cupodis = '';
       $sStyleReadInp_cupodis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cupodis']) && $this->nmgp_cmp_hidden['cupodis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cupodis" value="<?php echo $this->form_encode_input($cupodis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cupodis_line" id="hidden_field_data_cupodis" style="<?php echo $sStyleHidden_cupodis; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cupodis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cupodis_label" style=""><span id="id_label_cupodis"><?php echo $this->nm_new_label['cupodis']; ?></span></span><br><input type="hidden" name="cupodis" value="<?php echo $this->form_encode_input($cupodis); ?>"><span id="id_ajax_label_cupodis"><?php echo nl2br($cupodis); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cupodis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cupodis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cupo']))
    {
        $this->nm_new_label['cupo'] = "Cupo Asignado al Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cupo = $this->cupo;
   $sStyleHidden_cupo = '';
   if (isset($this->nmgp_cmp_hidden['cupo']) && $this->nmgp_cmp_hidden['cupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cupo']);
       $sStyleHidden_cupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cupo = 'display: none;';
   $sStyleReadInp_cupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cupo']) && $this->nmgp_cmp_readonly['cupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cupo']);
       $sStyleReadLab_cupo = '';
       $sStyleReadInp_cupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cupo']) && $this->nmgp_cmp_hidden['cupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cupo" value="<?php echo $this->form_encode_input($cupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cupo_line" id="hidden_field_data_cupo" style="<?php echo $sStyleHidden_cupo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cupo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cupo_label" style=""><span id="id_label_cupo"><?php echo $this->nm_new_label['cupo']; ?></span></span><br><input type="hidden" name="cupo" value="<?php echo $this->form_encode_input($cupo); ?>"><span id="id_ajax_label_cupo"><?php echo nl2br($cupo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['subtotal']))
    {
        $this->nm_new_label['subtotal'] = "Subtotal";
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

    <TD class="scFormDataOdd css_subtotal_line" id="hidden_field_data_subtotal" style="<?php echo $sStyleHidden_subtotal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_subtotal_line" style="padding: 0px"><span class="scFormLabelOddFormat css_subtotal_label" style=""><span id="id_label_subtotal"><?php echo $this->nm_new_label['subtotal']; ?></span></span><br><input type="hidden" name="subtotal" value="<?php echo $this->form_encode_input($subtotal); ?>"><span id="id_ajax_label_subtotal"><?php echo nl2br($subtotal); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subtotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subtotal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['valoriva']))
    {
        $this->nm_new_label['valoriva'] = "Valor  del IVA";
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

    <TD class="scFormDataOdd css_valoriva_line" id="hidden_field_data_valoriva" style="<?php echo $sStyleHidden_valoriva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoriva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valoriva_label" style=""><span id="id_label_valoriva"><?php echo $this->nm_new_label['valoriva']; ?></span></span><br><input type="hidden" name="valoriva" value="<?php echo $this->form_encode_input($valoriva); ?>"><span id="id_ajax_label_valoriva"><?php echo nl2br($valoriva); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoriva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoriva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['total']))
    {
        $this->nm_new_label['total'] = "Total Compra";
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

    <TD class="scFormDataOdd css_total_line" id="hidden_field_data_total" style="<?php echo $sStyleHidden_total; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_total_line" style="padding: 0px"><span class="scFormLabelOddFormat css_total_label" style=""><span id="id_label_total"><?php echo $this->nm_new_label['total']; ?></span></span><br><input type="hidden" name="total" value="<?php echo $this->form_encode_input($total); ?>"><span id="id_ajax_label_total"><?php echo nl2br($total); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['adicional']))
    {
        $this->nm_new_label['adicional'] = "Descuento a factura";
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

    <TD class="scFormDataOdd css_adicional_line" id="hidden_field_data_adicional" style="<?php echo $sStyleHidden_adicional; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adicional_line" style="padding: 0px"><span class="scFormLabelOddFormat css_adicional_label" style=""><span id="id_label_adicional"><?php echo $this->nm_new_label['adicional']; ?></span></span><br><input type="hidden" name="adicional" value="<?php echo $this->form_encode_input($adicional); ?>"><span id="id_ajax_label_adicional"><?php echo nl2br($adicional); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['saldo']))
    {
        $this->nm_new_label['saldo'] = "Saldo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldo = $this->saldo;
   $sStyleHidden_saldo = '';
   if (isset($this->nmgp_cmp_hidden['saldo']) && $this->nmgp_cmp_hidden['saldo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldo']);
       $sStyleHidden_saldo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldo = 'display: none;';
   $sStyleReadInp_saldo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldo']) && $this->nmgp_cmp_readonly['saldo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldo']);
       $sStyleReadLab_saldo = '';
       $sStyleReadInp_saldo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldo']) && $this->nmgp_cmp_hidden['saldo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldo" value="<?php echo $this->form_encode_input($saldo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_saldo_line" id="hidden_field_data_saldo" style="<?php echo $sStyleHidden_saldo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_saldo_label" style=""><span id="id_label_saldo"><?php echo $this->nm_new_label['saldo']; ?></span></span><br><input type="hidden" name="saldo" value="<?php echo $this->form_encode_input($saldo); ?>"><span id="id_ajax_label_saldo"><?php echo nl2br($saldo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_cupodis_dumb = ('' == $sStyleHidden_cupodis) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cupodis_dumb" style="<?php echo $sStyleHidden_cupodis_dumb; ?>"></TD>
<?php $sStyleHidden_cupo_dumb = ('' == $sStyleHidden_cupo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cupo_dumb" style="<?php echo $sStyleHidden_cupo_dumb; ?>"></TD>
<?php $sStyleHidden_subtotal_dumb = ('' == $sStyleHidden_subtotal) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_subtotal_dumb" style="<?php echo $sStyleHidden_subtotal_dumb; ?>"></TD>
<?php $sStyleHidden_valoriva_dumb = ('' == $sStyleHidden_valoriva) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_valoriva_dumb" style="<?php echo $sStyleHidden_valoriva_dumb; ?>"></TD>
<?php $sStyleHidden_total_dumb = ('' == $sStyleHidden_total) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_total_dumb" style="<?php echo $sStyleHidden_total_dumb; ?>"></TD>
<?php $sStyleHidden_adicional_dumb = ('' == $sStyleHidden_adicional) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adicional_dumb" style="<?php echo $sStyleHidden_adicional_dumb; ?>"></TD>
<?php $sStyleHidden_saldo_dumb = ('' == $sStyleHidden_saldo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_saldo_dumb" style="<?php echo $sStyleHidden_saldo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="1000">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle']))
    {
        $this->nm_new_label['detalle'] = "detalle";
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

    <TD class="scFormDataOdd css_detalle_line" id="hidden_field_data_detalle" style="<?php echo $sStyleHidden_detalle; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_multi'] = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_grid_edit'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_grid_edit_link'] = '';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init'] ]['form_detalleventa']['embutida_parms'] = "par_numfacventa*scin" . $this->nmgp_dados_form['idfacven'] . "*scoutedit_cantidad*scin0*scoutsw*scin0*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_facturaven_empty.htm' : $this->Ini->link_form_detalleventa_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle']) && 'nmsc_iframe_liga_form_detalleventa' != $this->Ini->sc_lig_target['C_@scinf_detalle'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['form_detalleventa_script_case_init']);
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
<iframe border="0" id="nmsc_iframe_liga_form_detalleventa"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="1200" name="nmsc_iframe_liga_form_detalleventa"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['birpara'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_facturaven");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_facturaven");
 parent.scAjaxDetailHeight("form_facturaven", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_facturaven", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_facturaven", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['sc_modal'])
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
	function scBtnFn_Eliminar() {
		if ($("#sc_Eliminar_top").length && $("#sc_Eliminar_top").is(":visible")) {
		    if ($("#sc_Eliminar_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_Eliminar()
			 return;
		}
	}
	function scBtnFn_rc() {
		if ($("#sc_rc_top").length && $("#sc_rc_top").is(":visible")) {
		    if ($("#sc_rc_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_rc()
			 return;
		}
	}
	function scBtnFn_autorizar() {
		if ($("#sc_autorizar_top").length && $("#sc_autorizar_top").is(":visible")) {
		    if ($("#sc_autorizar_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_autorizar()
			 return;
		}
	}
	function scBtnFn_imprimir() {
		if ($("#sc_imprimir_top").length && $("#sc_imprimir_top").is(":visible")) {
		    if ($("#sc_imprimir_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_imprimir()
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven']['buttonStatus'] = $this->nmgp_botoes;
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
