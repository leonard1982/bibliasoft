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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Realizar Pago"); } else { echo strip_tags("Realizar Pago"); } ?></TITLE>
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
.css_read_off_fechavenc button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechadocu button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_pagar_pedido_CW_210422/form_pagar_pedido_CW_210422_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_pagar_pedido_CW_210422_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "fechaven")
     {
        $('input[name="fechaven"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fechaven"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fechaven"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "numpedido")
     {
        $('input[name="numpedido"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="numpedido"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="numpedido"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "adicional")
     {
        $('input[name="adicional"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="adicional"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="adicional"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "total")
     {
        $('input[name="total"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="total"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="total"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "idcli")
     {
        $('select[name="idcli"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="idcli"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="idcli"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_pagar_pedido_CW_210422_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('adicional2');

<?php
}
?>
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

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_pagar_pedido_CW_210422_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_pagar_pedido_CW_210422'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_pagar_pedido_CW_210422'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Realizar Pago"; } else { echo "Realizar Pago"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['pagar'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['pagar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['pagar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['pagar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['pagar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['pagar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "pagar", "scBtnFn_pagar()", "scBtnFn_pagar()", "sc_pagar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['volver'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['volver']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['volver']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['volver']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['volver']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['volver'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "volver", "scBtnFn_volver()", "scBtnFn_volver()", "sc_volver_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idpedido']))
   {
       $this->nmgp_cmp_hidden['idpedido'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['asentada']))
   {
       $this->nmgp_cmp_hidden['asentada'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['creado_en_movil']))
   {
       $this->nmgp_cmp_hidden['creado_en_movil'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['disponible_en_movil']))
   {
       $this->nmgp_cmp_hidden['disponible_en_movil'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idpedido']))
           {
               $this->nmgp_cmp_readonly['idpedido'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpedido']))
    {
        $this->nm_new_label['idpedido'] = "Idpedido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpedido = $this->idpedido;
   if (!isset($this->nmgp_cmp_hidden['idpedido']))
   {
       $this->nmgp_cmp_hidden['idpedido'] = 'off';
   }
   $sStyleHidden_idpedido = '';
   if (isset($this->nmgp_cmp_hidden['idpedido']) && $this->nmgp_cmp_hidden['idpedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpedido']);
       $sStyleHidden_idpedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpedido = 'display: none;';
   $sStyleReadInp_idpedido = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idpedido"]) &&  $this->nmgp_cmp_readonly["idpedido"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpedido']);
       $sStyleReadLab_idpedido = '';
       $sStyleReadInp_idpedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpedido']) && $this->nmgp_cmp_hidden['idpedido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpedido" value="<?php echo $this->form_encode_input($idpedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpedido_line" id="hidden_field_data_idpedido" style="<?php echo $sStyleHidden_idpedido; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpedido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpedido_label" style=""><span id="id_label_idpedido"><?php echo $this->nm_new_label['idpedido']; ?></span></span><br>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_idpedido" css_idpedido_line" style="<?php echo $sStyleReadLab_idpedido; ?>"><?php echo $this->form_format_readonly("idpedido", $this->form_encode_input($this->idpedido)); ?></span><span id="id_read_off_idpedido" class="css_read_off_idpedido" style="<?php echo $sStyleReadInp_idpedido; ?>"><input type="hidden" name="idpedido" value="<?php echo $this->form_encode_input($idpedido) . "\">"?><span id="id_ajax_label_idpedido"><?php echo nl2br($idpedido); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpedido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fechaven']))
    {
        $this->nm_new_label['fechaven'] = "Fecha";
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

    <TD class="scFormDataOdd css_fechaven_line" id="hidden_field_data_fechaven" style="<?php echo $sStyleHidden_fechaven; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaven_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechaven_label" style=""><span id="id_label_fechaven"><?php echo $this->nm_new_label['fechaven']; ?></span></span><br>
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

 <input class="sc-js-input scFormObjectOdd css_fechaven_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechaven" type=text name="fechaven" value="<?php echo $this->form_encode_input($fechaven) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechaven']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaven']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaven_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['prefijo_ped']))
   {
       $this->nm_new_label['prefijo_ped'] = "Prefijo Ped";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prefijo_ped = $this->prefijo_ped;
   $sStyleHidden_prefijo_ped = '';
   if (isset($this->nmgp_cmp_hidden['prefijo_ped']) && $this->nmgp_cmp_hidden['prefijo_ped'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prefijo_ped']);
       $sStyleHidden_prefijo_ped = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prefijo_ped = 'display: none;';
   $sStyleReadInp_prefijo_ped = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prefijo_ped']) && $this->nmgp_cmp_readonly['prefijo_ped'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prefijo_ped']);
       $sStyleReadLab_prefijo_ped = '';
       $sStyleReadInp_prefijo_ped = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prefijo_ped']) && $this->nmgp_cmp_hidden['prefijo_ped'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="prefijo_ped" value="<?php echo $this->form_encode_input($this->prefijo_ped) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_prefijo_ped_line" id="hidden_field_data_prefijo_ped" style="<?php echo $sStyleHidden_prefijo_ped; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prefijo_ped_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_prefijo_ped_label" style=""><span id="id_label_prefijo_ped"><?php echo $this->nm_new_label['prefijo_ped']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['prefijo_ped']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['prefijo_ped'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prefijo_ped"]) &&  $this->nmgp_cmp_readonly["prefijo_ped"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped'] = array(); 
    }

   $old_value_idpedido = $this->idpedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_numpedido = $this->numpedido;
   $old_value_adicional = $this->adicional;
   $old_value_total = $this->total;
   $old_value_asentada = $this->asentada;
   $old_value_adicional2 = $this->adicional2;
   $old_value_adicional3 = $this->adicional3;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpedido = $this->idpedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_numpedido = $this->numpedido;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_total = $this->total;
   $unformatted_value_asentada = $this->asentada;
   $unformatted_value_adicional2 = $this->adicional2;
   $unformatted_value_adicional3 = $this->adicional3;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian where prefijo like '%PED%' or prefijo like '%cot%' or prefijo like '%prof%' and resolucion=0";

   $this->idpedido = $old_value_idpedido;
   $this->fechaven = $old_value_fechaven;
   $this->numpedido = $old_value_numpedido;
   $this->adicional = $old_value_adicional;
   $this->total = $old_value_total;
   $this->asentada = $old_value_asentada;
   $this->adicional2 = $old_value_adicional2;
   $this->adicional3 = $old_value_adicional3;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_prefijo_ped'][] = $rs->fields[0];
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
   $prefijo_ped_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prefijo_ped_1))
          {
              foreach ($this->prefijo_ped_1 as $tmp_prefijo_ped)
              {
                  if (trim($tmp_prefijo_ped) === trim($cadaselect[1])) { $prefijo_ped_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prefijo_ped) === trim($cadaselect[1])) { $prefijo_ped_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="prefijo_ped" value="<?php echo $this->form_encode_input($prefijo_ped) . "\">" . $prefijo_ped_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_prefijo_ped();
   $x = 0 ; 
   $prefijo_ped_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prefijo_ped_1))
          {
              foreach ($this->prefijo_ped_1 as $tmp_prefijo_ped)
              {
                  if (trim($tmp_prefijo_ped) === trim($cadaselect[1])) { $prefijo_ped_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prefijo_ped) === trim($cadaselect[1])) { $prefijo_ped_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($prefijo_ped_look))
          {
              $prefijo_ped_look = $this->prefijo_ped;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_prefijo_ped\" class=\"css_prefijo_ped_line\" style=\"" .  $sStyleReadLab_prefijo_ped . "\">" . $this->form_format_readonly("prefijo_ped", $this->form_encode_input($prefijo_ped_look)) . "</span><span id=\"id_read_off_prefijo_ped\" class=\"css_read_off_prefijo_ped" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_prefijo_ped . "\">";
   echo " <span id=\"idAjaxSelect_prefijo_ped\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_prefijo_ped_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_prefijo_ped\" name=\"prefijo_ped\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->prefijo_ped) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->prefijo_ped)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prefijo_ped_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prefijo_ped_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['numpedido']))
    {
        $this->nm_new_label['numpedido'] = "Pedido #";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numpedido = $this->numpedido;
   $sStyleHidden_numpedido = '';
   if (isset($this->nmgp_cmp_hidden['numpedido']) && $this->nmgp_cmp_hidden['numpedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numpedido']);
       $sStyleHidden_numpedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numpedido = 'display: none;';
   $sStyleReadInp_numpedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numpedido']) && $this->nmgp_cmp_readonly['numpedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numpedido']);
       $sStyleReadLab_numpedido = '';
       $sStyleReadInp_numpedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numpedido']) && $this->nmgp_cmp_hidden['numpedido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numpedido" value="<?php echo $this->form_encode_input($numpedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numpedido_line" id="hidden_field_data_numpedido" style="<?php echo $sStyleHidden_numpedido; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numpedido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numpedido_label" style=""><span id="id_label_numpedido"><?php echo $this->nm_new_label['numpedido']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['numpedido']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['numpedido'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numpedido"]) &&  $this->nmgp_cmp_readonly["numpedido"] == "on") { 

 ?>
<input type="hidden" name="numpedido" value="<?php echo $this->form_encode_input($numpedido) . "\">" . $numpedido . ""; ?>
<?php } else { ?>
<span id="id_read_on_numpedido" class="sc-ui-readonly-numpedido css_numpedido_line" style="<?php echo $sStyleReadLab_numpedido; ?>"><?php echo $this->form_format_readonly("numpedido", $this->form_encode_input($this->numpedido)); ?></span><span id="id_read_off_numpedido" class="css_read_off_numpedido<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numpedido; ?>">
 <input class="sc-js-input scFormObjectOdd css_numpedido_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numpedido" type=text name="numpedido" value="<?php echo $this->form_encode_input($numpedido) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['numpedido']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numpedido']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numpedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numpedido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['adicional']))
    {
        $this->nm_new_label['adicional'] = "Descuento Aplicado";
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

    <TD class="scFormDataOdd css_adicional_line" id="hidden_field_data_adicional" style="<?php echo $sStyleHidden_adicional; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adicional_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_adicional_label" style=""><span id="id_label_adicional"><?php echo $this->nm_new_label['adicional']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['adicional']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['adicional'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional"]) &&  $this->nmgp_cmp_readonly["adicional"] == "on") { 

 ?>
<input type="hidden" name="adicional" value="<?php echo $this->form_encode_input($adicional) . "\">" . $adicional . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional" class="sc-ui-readonly-adicional css_adicional_line" style="<?php echo $sStyleReadLab_adicional; ?>"><?php echo $this->form_format_readonly("adicional", $this->form_encode_input($this->adicional)); ?></span><span id="id_read_off_adicional" class="css_read_off_adicional<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional; ?>">
 <input class="sc-js-input scFormObjectOdd css_adicional_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional" type=text name="adicional" value="<?php echo $this->form_encode_input($adicional) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['adicional']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['adicional']['format_pos'] || 3 == $this->field_config['adicional']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 11, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['adicional']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['adicional']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_idpedido_dumb = ('' == $sStyleHidden_idpedido) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idpedido_dumb" style="<?php echo $sStyleHidden_idpedido_dumb; ?>"></TD>
<?php $sStyleHidden_fechaven_dumb = ('' == $sStyleHidden_fechaven) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechaven_dumb" style="<?php echo $sStyleHidden_fechaven_dumb; ?>"></TD>
<?php $sStyleHidden_prefijo_ped_dumb = ('' == $sStyleHidden_prefijo_ped) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_prefijo_ped_dumb" style="<?php echo $sStyleHidden_prefijo_ped_dumb; ?>"></TD>
<?php $sStyleHidden_numpedido_dumb = ('' == $sStyleHidden_numpedido) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numpedido_dumb" style="<?php echo $sStyleHidden_numpedido_dumb; ?>"></TD>
<?php $sStyleHidden_adicional_dumb = ('' == $sStyleHidden_adicional) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adicional_dumb" style="<?php echo $sStyleHidden_adicional_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['total']))
    {
        $this->nm_new_label['total'] = "Total Venta";
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

    <TD class="scFormDataOdd css_total_line" id="hidden_field_data_total" style="<?php echo $sStyleHidden_total; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_total_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_total_label" style=""><span id="id_label_total"><?php echo $this->nm_new_label['total']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["total"]) &&  $this->nmgp_cmp_readonly["total"] == "on") { 

 ?>
<input type="hidden" name="total" value="<?php echo $this->form_encode_input($total) . "\">" . $total . ""; ?>
<?php } else { ?>
<span id="id_read_on_total" class="sc-ui-readonly-total css_total_line" style="<?php echo $sStyleReadLab_total; ?>"><?php echo $this->form_format_readonly("total", $this->form_encode_input($this->total)); ?></span><span id="id_read_off_total" class="css_read_off_total<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_total; ?>">
 <input class="sc-js-input scFormObjectOdd css_total_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_total" type=text name="total" value="<?php echo $this->form_encode_input($total) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['total']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['total']['format_pos'] || 3 == $this->field_config['total']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['total']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['total']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="4" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_total_dumb = ('' == $sStyleHidden_total) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_total_dumb" style="<?php echo $sStyleHidden_total_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_idcli_line" id="hidden_field_data_idcli" style="<?php echo $sStyleHidden_idcli; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcli_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcli_label" style=""><span id="id_label_idcli"><?php echo $this->nm_new_label['idcli']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcli"]) &&  $this->nmgp_cmp_readonly["idcli"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli'] = array(); 
    }

   $old_value_idpedido = $this->idpedido;
   $old_value_fechaven = $this->fechaven;
   $old_value_numpedido = $this->numpedido;
   $old_value_adicional = $this->adicional;
   $old_value_total = $this->total;
   $old_value_asentada = $this->asentada;
   $old_value_adicional2 = $this->adicional2;
   $old_value_adicional3 = $this->adicional3;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpedido = $this->idpedido;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_numpedido = $this->numpedido;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_total = $this->total;
   $unformatted_value_asentada = $this->asentada;
   $unformatted_value_adicional2 = $this->adicional2;
   $unformatted_value_adicional3 = $this->adicional3;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres  FROM terceros  ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \" - \",nombres)  FROM terceros  ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres  FROM terceros  ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres  FROM terceros  ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres  FROM terceros  ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres  FROM terceros  ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres  FROM terceros  ORDER BY documento, nombres";
   }

   $this->idpedido = $old_value_idpedido;
   $this->fechaven = $old_value_fechaven;
   $this->numpedido = $old_value_numpedido;
   $this->adicional = $old_value_adicional;
   $this->total = $old_value_total;
   $this->asentada = $old_value_asentada;
   $this->adicional2 = $old_value_adicional2;
   $this->adicional3 = $old_value_adicional3;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_idcli'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_idcli\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idcli_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idcli\" name=\"idcli\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
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

   <?php
    if (!isset($this->nm_new_label['obspago']))
    {
        $this->nm_new_label['obspago'] = "Notas del Pago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obspago = $this->obspago;
   $sStyleHidden_obspago = '';
   if (isset($this->nmgp_cmp_hidden['obspago']) && $this->nmgp_cmp_hidden['obspago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obspago']);
       $sStyleHidden_obspago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obspago = 'display: none;';
   $sStyleReadInp_obspago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obspago']) && $this->nmgp_cmp_readonly['obspago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obspago']);
       $sStyleReadLab_obspago = '';
       $sStyleReadInp_obspago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obspago']) && $this->nmgp_cmp_hidden['obspago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obspago" value="<?php echo $this->form_encode_input($obspago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_obspago_line" id="hidden_field_data_obspago" style="<?php echo $sStyleHidden_obspago; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obspago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_obspago_label" style=""><span id="id_label_obspago"><?php echo $this->nm_new_label['obspago']; ?></span></span><br>
<?php
$obspago_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obspago));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obspago"]) &&  $this->nmgp_cmp_readonly["obspago"] == "on") { 

 ?>
<input type="hidden" name="obspago" value="<?php echo $this->form_encode_input($obspago) . "\">" . $obspago_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obspago" class="sc-ui-readonly-obspago css_obspago_line" style="<?php echo $sStyleReadLab_obspago; ?>"><?php echo $this->form_format_readonly("obspago", $this->form_encode_input($obspago_val)); ?></span><span id="id_read_off_obspago" class="css_read_off_obspago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obspago; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_obspago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obspago" id="id_sc_field_obspago" rows="3" cols="50"
 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Si pago es múltiple relacione forma y monto', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obspago; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obspago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obspago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_idcli_dumb = ('' == $sStyleHidden_idcli) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idcli_dumb" style="<?php echo $sStyleHidden_idcli_dumb; ?>"></TD>
<?php $sStyleHidden_obspago_dumb = ('' == $sStyleHidden_obspago) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_obspago_dumb" style="<?php echo $sStyleHidden_obspago_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['asentada']))
    {
        $this->nm_new_label['asentada'] = "Asentada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $asentada = $this->asentada;
   if (!isset($this->nmgp_cmp_hidden['asentada']))
   {
       $this->nmgp_cmp_hidden['asentada'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['asentada']) && $this->nmgp_cmp_hidden['asentada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="asentada" value="<?php echo $this->form_encode_input($asentada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_asentada_line" id="hidden_field_data_asentada" style="<?php echo $sStyleHidden_asentada; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_asentada_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_asentada_label" style=""><span id="id_label_asentada"><?php echo $this->nm_new_label['asentada']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["asentada"]) &&  $this->nmgp_cmp_readonly["asentada"] == "on") { 

 ?>
<input type="hidden" name="asentada" value="<?php echo $this->form_encode_input($asentada) . "\">" . $asentada . ""; ?>
<?php } else { ?>
<span id="id_read_on_asentada" class="sc-ui-readonly-asentada css_asentada_line" style="<?php echo $sStyleReadLab_asentada; ?>"><?php echo $this->form_format_readonly("asentada", $this->form_encode_input($this->asentada)); ?></span><span id="id_read_off_asentada" class="css_read_off_asentada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_asentada; ?>">
 <input class="sc-js-input scFormObjectOdd css_asentada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_asentada" type=text name="asentada" value="<?php echo $this->form_encode_input($asentada) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 1, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['asentada']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['asentada']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['asentada']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_asentada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_asentada_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_asentada_dumb = ('' == $sStyleHidden_asentada) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_asentada_dumb" style="<?php echo $sStyleHidden_asentada_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['formapago']))
   {
       $this->nm_new_label['formapago'] = "Formapago";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $formapago = $this->formapago;
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
<?php if (isset($this->nmgp_cmp_hidden['formapago']) && $this->nmgp_cmp_hidden['formapago'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="formapago" value="<?php echo $this->form_encode_input($this->formapago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_formapago_line" id="hidden_field_data_formapago" style="<?php echo $sStyleHidden_formapago; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_formapago_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_formapago_label" style=""><span id="id_label_formapago"><?php echo $this->nm_new_label['formapago']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["formapago"]) &&  $this->nmgp_cmp_readonly["formapago"] == "on") { 

$formapago_look = "";
 if ($this->formapago == "EFECTIVO") { $formapago_look .= "EFECTIVO" ;} 
 if ($this->formapago == "TARJETA") { $formapago_look .= "TARJETA DB/CRE" ;} 
 if ($this->formapago == "CHEQUE") { $formapago_look .= "CHEQUE" ;} 
 if ($this->formapago == "MULTIPLE") { $formapago_look .= "MULTIPLE" ;} 
 if (empty($formapago_look)) { $formapago_look = $this->formapago; }
?>
<input type="hidden" name="formapago" value="<?php echo $this->form_encode_input($formapago) . "\">" . $formapago_look . ""; ?>
<?php } else { ?>
<?php

$formapago_look = "";
 if ($this->formapago == "EFECTIVO") { $formapago_look .= "EFECTIVO" ;} 
 if ($this->formapago == "TARJETA") { $formapago_look .= "TARJETA DB/CRE" ;} 
 if ($this->formapago == "CHEQUE") { $formapago_look .= "CHEQUE" ;} 
 if ($this->formapago == "MULTIPLE") { $formapago_look .= "MULTIPLE" ;} 
 if (empty($formapago_look)) { $formapago_look = $this->formapago; }
?>
<span id="id_read_on_formapago" class="css_formapago_line"  style="<?php echo $sStyleReadLab_formapago; ?>"><?php echo $this->form_format_readonly("formapago", $this->form_encode_input($formapago_look)); ?></span><span id="id_read_off_formapago" class="css_read_off_formapago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_formapago; ?>">
 <span id="idAjaxSelect_formapago" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_formapago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_formapago" name="formapago" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="EFECTIVO" <?php  if ($this->formapago == "EFECTIVO") { echo " selected" ;} ?><?php  if (empty($this->formapago)) { echo " selected" ;} ?>>EFECTIVO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_formapago'][] = 'EFECTIVO'; ?>
 <option  value="TARJETA" <?php  if ($this->formapago == "TARJETA") { echo " selected" ;} ?>>TARJETA DB/CRE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_formapago'][] = 'TARJETA'; ?>
 <option  value="CHEQUE" <?php  if ($this->formapago == "CHEQUE") { echo " selected" ;} ?>>CHEQUE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_formapago'][] = 'CHEQUE'; ?>
 <option  value="MULTIPLE" <?php  if ($this->formapago == "MULTIPLE") { echo " selected" ;} ?>>MULTIPLE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['Lookup_formapago'][] = 'MULTIPLE'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_formapago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_formapago_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['adicional2']))
    {
        $this->nm_new_label['adicional2'] = "Ingresar Cantidad Pagada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adicional2 = $this->adicional2;
   $sStyleHidden_adicional2 = '';
   if (isset($this->nmgp_cmp_hidden['adicional2']) && $this->nmgp_cmp_hidden['adicional2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adicional2']);
       $sStyleHidden_adicional2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adicional2 = 'display: none;';
   $sStyleReadInp_adicional2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adicional2']) && $this->nmgp_cmp_readonly['adicional2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adicional2']);
       $sStyleReadLab_adicional2 = '';
       $sStyleReadInp_adicional2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adicional2']) && $this->nmgp_cmp_hidden['adicional2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional2" value="<?php echo $this->form_encode_input($adicional2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adicional2_line" id="hidden_field_data_adicional2" style="<?php echo $sStyleHidden_adicional2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adicional2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_adicional2_label" style=""><span id="id_label_adicional2"><?php echo $this->nm_new_label['adicional2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['adicional2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['adicional2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional2"]) &&  $this->nmgp_cmp_readonly["adicional2"] == "on") { 

 ?>
<input type="hidden" name="adicional2" value="<?php echo $this->form_encode_input($adicional2) . "\">" . $adicional2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional2" class="sc-ui-readonly-adicional2 css_adicional2_line" style="<?php echo $sStyleReadLab_adicional2; ?>"><?php echo $this->form_format_readonly("adicional2", $this->form_encode_input($this->adicional2)); ?></span><span id="id_read_off_adicional2" class="css_read_off_adicional2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional2; ?>">
 <input class="sc-js-input scFormObjectOdd css_adicional2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional2" type=text name="adicional2" value="<?php echo $this->form_encode_input($adicional2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['adicional2']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['adicional2']['format_pos'] || 3 == $this->field_config['adicional2']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 11, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['adicional2']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['adicional2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['adicional3']))
    {
        $this->nm_new_label['adicional3'] = "Cambio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adicional3 = $this->adicional3;
   $sStyleHidden_adicional3 = '';
   if (isset($this->nmgp_cmp_hidden['adicional3']) && $this->nmgp_cmp_hidden['adicional3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adicional3']);
       $sStyleHidden_adicional3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adicional3 = 'display: none;';
   $sStyleReadInp_adicional3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adicional3']) && $this->nmgp_cmp_readonly['adicional3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adicional3']);
       $sStyleReadLab_adicional3 = '';
       $sStyleReadInp_adicional3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adicional3']) && $this->nmgp_cmp_hidden['adicional3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional3" value="<?php echo $this->form_encode_input($adicional3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adicional3_line" id="hidden_field_data_adicional3" style="<?php echo $sStyleHidden_adicional3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adicional3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_adicional3_label" style=""><span id="id_label_adicional3"><?php echo $this->nm_new_label['adicional3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['adicional3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['php_cmp_required']['adicional3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional3"]) &&  $this->nmgp_cmp_readonly["adicional3"] == "on") { 

 ?>
<input type="hidden" name="adicional3" value="<?php echo $this->form_encode_input($adicional3) . "\">" . $adicional3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional3" class="sc-ui-readonly-adicional3 css_adicional3_line" style="<?php echo $sStyleReadLab_adicional3; ?>"><?php echo $this->form_format_readonly("adicional3", $this->form_encode_input($this->adicional3)); ?></span><span id="id_read_off_adicional3" class="css_read_off_adicional3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional3; ?>">
 <input class="sc-js-input scFormObjectOdd css_adicional3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional3" type=text name="adicional3" value="<?php echo $this->form_encode_input($adicional3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['adicional3']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['adicional3']['format_pos'] || 3 == $this->field_config['adicional3']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 11, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional3']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['adicional3']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['adicional3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_formapago_dumb = ('' == $sStyleHidden_formapago) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_formapago_dumb" style="<?php echo $sStyleHidden_formapago_dumb; ?>"></TD>
<?php $sStyleHidden_adicional2_dumb = ('' == $sStyleHidden_adicional2) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adicional2_dumb" style="<?php echo $sStyleHidden_adicional2_dumb; ?>"></TD>
<?php $sStyleHidden_adicional3_dumb = ('' == $sStyleHidden_adicional3) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adicional3_dumb" style="<?php echo $sStyleHidden_adicional3_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['creado_en_movil']))
    {
        $this->nm_new_label['creado_en_movil'] = "Creado En Movil";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $creado_en_movil = $this->creado_en_movil;
   if (!isset($this->nmgp_cmp_hidden['creado_en_movil']))
   {
       $this->nmgp_cmp_hidden['creado_en_movil'] = 'off';
   }
   $sStyleHidden_creado_en_movil = '';
   if (isset($this->nmgp_cmp_hidden['creado_en_movil']) && $this->nmgp_cmp_hidden['creado_en_movil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['creado_en_movil']);
       $sStyleHidden_creado_en_movil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_creado_en_movil = 'display: none;';
   $sStyleReadInp_creado_en_movil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['creado_en_movil']) && $this->nmgp_cmp_readonly['creado_en_movil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['creado_en_movil']);
       $sStyleReadLab_creado_en_movil = '';
       $sStyleReadInp_creado_en_movil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['creado_en_movil']) && $this->nmgp_cmp_hidden['creado_en_movil'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="creado_en_movil" value="<?php echo $this->form_encode_input($creado_en_movil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_creado_en_movil_line" id="hidden_field_data_creado_en_movil" style="<?php echo $sStyleHidden_creado_en_movil; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_creado_en_movil_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_creado_en_movil_label" style=""><span id="id_label_creado_en_movil"><?php echo $this->nm_new_label['creado_en_movil']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["creado_en_movil"]) &&  $this->nmgp_cmp_readonly["creado_en_movil"] == "on") { 

 ?>
<input type="hidden" name="creado_en_movil" value="<?php echo $this->form_encode_input($creado_en_movil) . "\">" . $creado_en_movil . ""; ?>
<?php } else { ?>
<span id="id_read_on_creado_en_movil" class="sc-ui-readonly-creado_en_movil css_creado_en_movil_line" style="<?php echo $sStyleReadLab_creado_en_movil; ?>"><?php echo $this->form_format_readonly("creado_en_movil", $this->form_encode_input($this->creado_en_movil)); ?></span><span id="id_read_off_creado_en_movil" class="css_read_off_creado_en_movil<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_creado_en_movil; ?>">
 <input class="sc-js-input scFormObjectOdd css_creado_en_movil_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_creado_en_movil" type=text name="creado_en_movil" value="<?php echo $this->form_encode_input($creado_en_movil) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_creado_en_movil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_creado_en_movil_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['disponible_en_movil']))
    {
        $this->nm_new_label['disponible_en_movil'] = "Disponible En Movil";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $disponible_en_movil = $this->disponible_en_movil;
   if (!isset($this->nmgp_cmp_hidden['disponible_en_movil']))
   {
       $this->nmgp_cmp_hidden['disponible_en_movil'] = 'off';
   }
   $sStyleHidden_disponible_en_movil = '';
   if (isset($this->nmgp_cmp_hidden['disponible_en_movil']) && $this->nmgp_cmp_hidden['disponible_en_movil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['disponible_en_movil']);
       $sStyleHidden_disponible_en_movil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_disponible_en_movil = 'display: none;';
   $sStyleReadInp_disponible_en_movil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['disponible_en_movil']) && $this->nmgp_cmp_readonly['disponible_en_movil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['disponible_en_movil']);
       $sStyleReadLab_disponible_en_movil = '';
       $sStyleReadInp_disponible_en_movil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['disponible_en_movil']) && $this->nmgp_cmp_hidden['disponible_en_movil'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disponible_en_movil" value="<?php echo $this->form_encode_input($disponible_en_movil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_disponible_en_movil_line" id="hidden_field_data_disponible_en_movil" style="<?php echo $sStyleHidden_disponible_en_movil; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_disponible_en_movil_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_disponible_en_movil_label" style=""><span id="id_label_disponible_en_movil"><?php echo $this->nm_new_label['disponible_en_movil']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disponible_en_movil"]) &&  $this->nmgp_cmp_readonly["disponible_en_movil"] == "on") { 

 ?>
<input type="hidden" name="disponible_en_movil" value="<?php echo $this->form_encode_input($disponible_en_movil) . "\">" . $disponible_en_movil . ""; ?>
<?php } else { ?>
<span id="id_read_on_disponible_en_movil" class="sc-ui-readonly-disponible_en_movil css_disponible_en_movil_line" style="<?php echo $sStyleReadLab_disponible_en_movil; ?>"><?php echo $this->form_format_readonly("disponible_en_movil", $this->form_encode_input($this->disponible_en_movil)); ?></span><span id="id_read_off_disponible_en_movil" class="css_read_off_disponible_en_movil<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_disponible_en_movil; ?>">
 <input class="sc-js-input scFormObjectOdd css_disponible_en_movil_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_disponible_en_movil" type=text name="disponible_en_movil" value="<?php echo $this->form_encode_input($disponible_en_movil) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disponible_en_movil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disponible_en_movil_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['last'];
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
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['run_iframe'] != "R")
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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_pagar_pedido_CW_210422");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_pagar_pedido_CW_210422");
 parent.scAjaxDetailHeight("form_pagar_pedido_CW_210422", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_pagar_pedido_CW_210422", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_pagar_pedido_CW_210422", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['sc_modal'])
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
	function scBtnFn_pagar() {
		if ($("#sc_pagar_top").length && $("#sc_pagar_top").is(":visible")) {
		    if ($("#sc_pagar_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_pagar()
			 return;
		}
	}
	function scBtnFn_volver() {
		if ($("#sc_volver_top").length && $("#sc_volver_top").is(":visible")) {
		    if ($("#sc_volver_top").hasClass("disabled")) {
		        return;
		    }
			sc_btn_volver()
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-1").length && $("#sc_b_fim_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-2").length && $("#sc_b_sai_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-2").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pagar_pedido_CW_210422']['buttonStatus'] = $this->nmgp_botoes;
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
