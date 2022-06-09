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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("INGRESAR DOCUMENTOS EN COMPRA"); } else { echo strip_tags("EDITAR DOCUMENTOS EN COMPRA"); } ?></TITLE>
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
.css_read_off_fechacom button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['embutida_pdf']))
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
 <STYLE>
     .scTabLine li {
         display: inline-block !important;
         text-align: center !important;
         overflow: hidden !important;
         vertical-align:top !important;
         height: auto !important;
         min-width: 70 !important;
         max-width: 70 !important;
     }
 </STYLE>
 <style type="text/css">
  .scTabInactive { background-color: #CFCFCF; }
 </style>
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>fac_compras_new03062022/fac_compras_new03062022_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("fac_compras_new03062022_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "anulada")
     {
        $('select[name="anulada"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="anulada"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="anulada"]').removeClass("scFormInputDisabled");
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
     if (F_name == "banco")
     {
        $('select[name="banco"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="banco"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="banco"]').removeClass("scFormInputDisabled");
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
     if (F_name == "id_pedidocom")
     {
        $('select[name="id_pedidocom"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="id_pedidocom"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="id_pedidocom"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "es_remision")
     {
        $('select[name="es_remision"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="es_remision"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="es_remision"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "idprov")
     {
        $('input[name="idprov_autocomp"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="idprov_autocomp"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="idprov_autocomp"]').removeClass("scFormInputDisabled");
        }
        $('input[id="idprov_autocomp_cap"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('#idprov_autocomp_cap').hide();
        }
        else {
            $('#idprov_autocomp_cap').show();
        }
     }
     if (F_name == "fechacom")
     {
        $('input[name="fechacom"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fechacom"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fechacom"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_fechacom"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_fechacom").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "numfacom")
     {
        $('input[name="numfacom"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="numfacom"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="numfacom"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "formapago")
     {
        $('select[name="formapago"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="formapago"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="formapago"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "asentada")
     {
        $('select[name="asentada"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="asentada"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="asentada"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('fac_compras_new03062022_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('tipo_com');

<?php
}
?>
  addAutocomplete(this);

  $("#hidden_bloco_4").each(function() {
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
    "hidden_bloco_4": true
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
      scAjaxDetailHeight("detallecompra_new", "600");
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


  $(".sc-ui-autocomp-idprov", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idprov" != sId ? sId.substr(6) : "";
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
    url: "fac_compras_new03062022.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idprov",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "idprov" != sId ? sId.substr(6) : "";
   sc_fac_compras_new03062022_idprov_onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("fac_compras_new03062022_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['fac_compras_new03062022'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['fac_compras_new03062022'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="70%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['maximized']))
  {
?>
<tr><td>
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scFormHeaderFont">
          
        </TD>
        <TD class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "INGRESAR DOCUMENTOS EN COMPRA"; } else { echo "EDITAR DOCUMENTOS EN COMPRA"; } ?>
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scFormHeaderFont">
          
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['eliminar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['eliminar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['eliminar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['eliminar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['eliminar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['eliminar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['eliminar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['eliminar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['eliminar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['eliminar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "eliminar", "scBtnFn_Eliminar()", "scBtnFn_Eliminar()", "sc_Eliminar_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['sc_btn_0']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['sc_btn_0']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['sc_btn_0']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['sc_btn_0']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['sc_btn_0'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "scBtnFn_sc_btn_0()", "scBtnFn_sc_btn_0()", "sc_sc_btn_0_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['sc_btn_0']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['sc_btn_0']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['sc_btn_0']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['sc_btn_0']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['sc_btn_0'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "scBtnFn_sc_btn_0()", "scBtnFn_sc_btn_0()", "sc_sc_btn_0_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "fac_compras_new03062022_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'fac_compras_new03062022_form0' => array(
            'title' => "Datos generales",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "fac_compras_new03062022_form0" ? "scTabActive" : "scTabInactive",
        ),
        'fac_compras_new03062022_form1' => array(
            'title' => "Detalle Compra",
            'class' => $nmgp_num_form == "fac_compras_new03062022_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Datos generales' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['fac_compras_new03062022_form0']['class'] = 'scTabInactive';
                        }
                        if ('Detalle Compra' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['fac_compras_new03062022_form1']['class'] = 'scTabInactive';
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
    $css_celula = $this->tabCssClass["fac_compras_new03062022_form0"]['class'];
?>
   <li id="id_fac_compras_new03062022_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('fac_compras_new03062022_form0')">
     Datos generales
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["fac_compras_new03062022_form1"]['class'];
?>
   <li id="id_fac_compras_new03062022_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('fac_compras_new03062022_form1')">
     Detalle Compra
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="fac_compras_new03062022_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="33%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idfaccom']))
   {
       $this->nmgp_cmp_hidden['idfaccom'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['control']))
   {
       $this->nmgp_cmp_hidden['control'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['usuario']))
   {
       $this->nmgp_cmp_hidden['usuario'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['creado']))
   {
       $this->nmgp_cmp_hidden['creado'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['editado']))
   {
       $this->nmgp_cmp_hidden['editado'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['cod_cuenta']))
   {
       $this->nmgp_cmp_hidden['cod_cuenta'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['es_remision']))
   {
       $this->nm_new_label['es_remision'] = "ES REMISIÓN?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $es_remision = $this->es_remision;
   $sStyleHidden_es_remision = '';
   if (isset($this->nmgp_cmp_hidden['es_remision']) && $this->nmgp_cmp_hidden['es_remision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['es_remision']);
       $sStyleHidden_es_remision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_es_remision = 'display: none;';
   $sStyleReadInp_es_remision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['es_remision']) && $this->nmgp_cmp_readonly['es_remision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['es_remision']);
       $sStyleReadLab_es_remision = '';
       $sStyleReadInp_es_remision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['es_remision']) && $this->nmgp_cmp_hidden['es_remision'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="es_remision" value="<?php echo $this->form_encode_input($this->es_remision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_es_remision_label" id="hidden_field_label_es_remision" style="<?php echo $sStyleHidden_es_remision; ?>"><span id="id_label_es_remision"><?php echo $this->nm_new_label['es_remision']; ?></span></TD>
    <TD class="scFormDataOdd css_es_remision_line" id="hidden_field_data_es_remision" style="<?php echo $sStyleHidden_es_remision; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_es_remision_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_remision"]) &&  $this->nmgp_cmp_readonly["es_remision"] == "on") { 

$es_remision_look = "";
 if ($this->es_remision == "NO") { $es_remision_look .= "NO" ;} 
 if ($this->es_remision == "SI") { $es_remision_look .= "SI" ;} 
 if (empty($es_remision_look)) { $es_remision_look = $this->es_remision; }
?>
<input type="hidden" name="es_remision" value="<?php echo $this->form_encode_input($es_remision) . "\">" . $es_remision_look . ""; ?>
<?php } else { ?>
<?php

$es_remision_look = "";
 if ($this->es_remision == "NO") { $es_remision_look .= "NO" ;} 
 if ($this->es_remision == "SI") { $es_remision_look .= "SI" ;} 
 if (empty($es_remision_look)) { $es_remision_look = $this->es_remision; }
?>
<span id="id_read_on_es_remision" class="css_es_remision_line"  style="<?php echo $sStyleReadLab_es_remision; ?>"><?php echo $this->form_format_readonly("es_remision", $this->form_encode_input($es_remision_look)); ?></span><span id="id_read_off_es_remision" class="css_read_off_es_remision<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_es_remision; ?>">
 <span id="idAjaxSelect_es_remision" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_es_remision_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_es_remision" name="es_remision" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NO" <?php  if ($this->es_remision == "NO") { echo " selected" ;} ?><?php  if (empty($this->es_remision)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_es_remision'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->es_remision == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_es_remision'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_remision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_remision_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_pedidocom']))
   {
       $this->nm_new_label['id_pedidocom'] = "CARGAR DESDE PEDIDO N°";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_pedidocom = $this->id_pedidocom;
   $sStyleHidden_id_pedidocom = '';
   if (isset($this->nmgp_cmp_hidden['id_pedidocom']) && $this->nmgp_cmp_hidden['id_pedidocom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_pedidocom']);
       $sStyleHidden_id_pedidocom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_pedidocom = 'display: none;';
   $sStyleReadInp_id_pedidocom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_pedidocom']) && $this->nmgp_cmp_readonly['id_pedidocom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_pedidocom']);
       $sStyleReadLab_id_pedidocom = '';
       $sStyleReadInp_id_pedidocom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_pedidocom']) && $this->nmgp_cmp_hidden['id_pedidocom'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_pedidocom" value="<?php echo $this->form_encode_input($this->id_pedidocom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_pedidocom_label" id="hidden_field_label_id_pedidocom" style="<?php echo $sStyleHidden_id_pedidocom; ?>"><span id="id_label_id_pedidocom"><?php echo $this->nm_new_label['id_pedidocom']; ?></span></TD>
    <TD class="scFormDataOdd css_id_pedidocom_line" id="hidden_field_data_id_pedidocom" style="<?php echo $sStyleHidden_id_pedidocom; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_pedidocom_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_pedidocom"]) &&  $this->nmgp_cmp_readonly["id_pedidocom"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idpedido, concat(resdian.prefijo, \" - \", pedidos.numpedido)  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo&\" - \"&pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   else
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom'][] = $rs->fields[0];
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
   $id_pedidocom_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pedidocom_1))
          {
              foreach ($this->id_pedidocom_1 as $tmp_id_pedidocom)
              {
                  if (trim($tmp_id_pedidocom) === trim($cadaselect[1])) { $id_pedidocom_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pedidocom) === trim($cadaselect[1])) { $id_pedidocom_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_pedidocom" value="<?php echo $this->form_encode_input($id_pedidocom) . "\">" . $id_pedidocom_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_pedidocom();
   $x = 0 ; 
   $id_pedidocom_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_pedidocom_1))
          {
              foreach ($this->id_pedidocom_1 as $tmp_id_pedidocom)
              {
                  if (trim($tmp_id_pedidocom) === trim($cadaselect[1])) { $id_pedidocom_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_pedidocom) === trim($cadaselect[1])) { $id_pedidocom_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_pedidocom_look))
          {
              $id_pedidocom_look = $this->id_pedidocom;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_pedidocom\" class=\"css_id_pedidocom_line\" style=\"" .  $sStyleReadLab_id_pedidocom . "\">" . $this->form_format_readonly("id_pedidocom", $this->form_encode_input($id_pedidocom_look)) . "</span><span id=\"id_read_off_id_pedidocom\" class=\"css_read_off_id_pedidocom" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_pedidocom . "\">";
   echo " <span id=\"idAjaxSelect_id_pedidocom\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_pedidocom_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_pedidocom\" name=\"id_pedidocom\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_pedidocom'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_pedidocom) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_pedidocom)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_pedidocom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_pedidocom_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_com']))
   {
       $this->nm_new_label['tipo_com'] = "TIPO:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_com = $this->tipo_com;
   $sStyleHidden_tipo_com = '';
   if (isset($this->nmgp_cmp_hidden['tipo_com']) && $this->nmgp_cmp_hidden['tipo_com'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_com']);
       $sStyleHidden_tipo_com = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_com = 'display: none;';
   $sStyleReadInp_tipo_com = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_com']) && $this->nmgp_cmp_readonly['tipo_com'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_com']);
       $sStyleReadLab_tipo_com = '';
       $sStyleReadInp_tipo_com = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_com']) && $this->nmgp_cmp_hidden['tipo_com'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_com" value="<?php echo $this->form_encode_input($this->tipo_com) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_com_label" id="hidden_field_label_tipo_com" style="<?php echo $sStyleHidden_tipo_com; ?>"><span id="id_label_tipo_com"><?php echo $this->nm_new_label['tipo_com']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_com_line" id="hidden_field_data_tipo_com" style="<?php echo $sStyleHidden_tipo_com; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_com_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_com"]) &&  $this->nmgp_cmp_readonly["tipo_com"] == "on") { 

$tipo_com_look = "";
 if ($this->tipo_com == "FC") { $tipo_com_look .= "COMPRA" ;} 
 if ($this->tipo_com == "RE") { $tipo_com_look .= "REMISION" ;} 
 if ($this->tipo_com == "NC") { $tipo_com_look .= "NOTA C" ;} 
 if ($this->tipo_com == "ND") { $tipo_com_look .= "NOTA D" ;} 
 if ($this->tipo_com == "AF") { $tipo_com_look .= "AUTO F" ;} 
 if (empty($tipo_com_look)) { $tipo_com_look = $this->tipo_com; }
?>
<input type="hidden" name="tipo_com" value="<?php echo $this->form_encode_input($tipo_com) . "\">" . $tipo_com_look . ""; ?>
<?php } else { ?>
<?php

$tipo_com_look = "";
 if ($this->tipo_com == "FC") { $tipo_com_look .= "COMPRA" ;} 
 if ($this->tipo_com == "RE") { $tipo_com_look .= "REMISION" ;} 
 if ($this->tipo_com == "NC") { $tipo_com_look .= "NOTA C" ;} 
 if ($this->tipo_com == "ND") { $tipo_com_look .= "NOTA D" ;} 
 if ($this->tipo_com == "AF") { $tipo_com_look .= "AUTO F" ;} 
 if (empty($tipo_com_look)) { $tipo_com_look = $this->tipo_com; }
?>
<span id="id_read_on_tipo_com" class="css_tipo_com_line"  style="<?php echo $sStyleReadLab_tipo_com; ?>"><?php echo $this->form_format_readonly("tipo_com", $this->form_encode_input($tipo_com_look)); ?></span><span id="id_read_off_tipo_com" class="css_read_off_tipo_com<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_com; ?>">
 <span id="idAjaxSelect_tipo_com" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_com_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_com" name="tipo_com" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="FC" <?php  if ($this->tipo_com == "FC") { echo " selected" ;} ?><?php  if (empty($this->tipo_com)) { echo " selected" ;} ?>>COMPRA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_tipo_com'][] = 'FC'; ?>
 <option  value="RE" <?php  if ($this->tipo_com == "RE") { echo " selected" ;} ?>>REMISION</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_tipo_com'][] = 'RE'; ?>
 <option  value="NC" <?php  if ($this->tipo_com == "NC") { echo " selected" ;} ?>>NOTA C</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_tipo_com'][] = 'NC'; ?>
 <option  value="ND" <?php  if ($this->tipo_com == "ND") { echo " selected" ;} ?>>NOTA D</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_tipo_com'][] = 'ND'; ?>
 <option  value="AF" <?php  if ($this->tipo_com == "AF") { echo " selected" ;} ?>>AUTO F</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_tipo_com'][] = 'AF'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_com_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_com_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['prefijo_com']))
   {
       $this->nm_new_label['prefijo_com'] = "PREFIJO:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prefijo_com = $this->prefijo_com;
   $sStyleHidden_prefijo_com = '';
   if (isset($this->nmgp_cmp_hidden['prefijo_com']) && $this->nmgp_cmp_hidden['prefijo_com'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prefijo_com']);
       $sStyleHidden_prefijo_com = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prefijo_com = 'display: none;';
   $sStyleReadInp_prefijo_com = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prefijo_com']) && $this->nmgp_cmp_readonly['prefijo_com'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prefijo_com']);
       $sStyleReadLab_prefijo_com = '';
       $sStyleReadInp_prefijo_com = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prefijo_com']) && $this->nmgp_cmp_hidden['prefijo_com'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="prefijo_com" value="<?php echo $this->form_encode_input($this->prefijo_com) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prefijo_com_label" id="hidden_field_label_prefijo_com" style="<?php echo $sStyleHidden_prefijo_com; ?>"><span id="id_label_prefijo_com"><?php echo $this->nm_new_label['prefijo_com']; ?></span></TD>
    <TD class="scFormDataOdd css_prefijo_com_line" id="hidden_field_data_prefijo_com" style="<?php echo $sStyleHidden_prefijo_com; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prefijo_com_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prefijo_com"]) &&  $this->nmgp_cmp_readonly["prefijo_com"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT elprefijo, elprefijo  FROM prefijos  ORDER BY elprefijo";

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_prefijo_com'][] = $rs->fields[0];
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
   $prefijo_com_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prefijo_com_1))
          {
              foreach ($this->prefijo_com_1 as $tmp_prefijo_com)
              {
                  if (trim($tmp_prefijo_com) === trim($cadaselect[1])) { $prefijo_com_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prefijo_com) === trim($cadaselect[1])) { $prefijo_com_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="prefijo_com" value="<?php echo $this->form_encode_input($prefijo_com) . "\">" . $prefijo_com_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_prefijo_com();
   $x = 0 ; 
   $prefijo_com_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prefijo_com_1))
          {
              foreach ($this->prefijo_com_1 as $tmp_prefijo_com)
              {
                  if (trim($tmp_prefijo_com) === trim($cadaselect[1])) { $prefijo_com_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prefijo_com) === trim($cadaselect[1])) { $prefijo_com_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($prefijo_com_look))
          {
              $prefijo_com_look = $this->prefijo_com;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_prefijo_com\" class=\"css_prefijo_com_line\" style=\"" .  $sStyleReadLab_prefijo_com . "\">" . $this->form_format_readonly("prefijo_com", $this->form_encode_input($prefijo_com_look)) . "</span><span id=\"id_read_off_prefijo_com\" class=\"css_read_off_prefijo_com" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_prefijo_com . "\">";
   echo " <span id=\"idAjaxSelect_prefijo_com\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_prefijo_com_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_prefijo_com\" name=\"prefijo_com\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->prefijo_com) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->prefijo_com)) 
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
   if (isset($this->Ini->sc_lig_md5["form_prefijos"]) && $this->Ini->sc_lig_md5["form_prefijos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_prefijo_com*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@fac_compras_new03062022@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_prefijo_com*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_prefijos_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_prefijos_edit. "', '" . $Md5_Lig . "')", "fldedt_prefijo_com", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prefijo_com_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prefijo_com_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_com']))
    {
        $this->nm_new_label['numero_com'] = "NÚMERO:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_com = $this->numero_com;
   $sStyleHidden_numero_com = '';
   if (isset($this->nmgp_cmp_hidden['numero_com']) && $this->nmgp_cmp_hidden['numero_com'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_com']);
       $sStyleHidden_numero_com = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_com = 'display: none;';
   $sStyleReadInp_numero_com = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_com']) && $this->nmgp_cmp_readonly['numero_com'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_com']);
       $sStyleReadLab_numero_com = '';
       $sStyleReadInp_numero_com = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_com']) && $this->nmgp_cmp_hidden['numero_com'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_com" value="<?php echo $this->form_encode_input($numero_com) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numero_com_label" id="hidden_field_label_numero_com" style="<?php echo $sStyleHidden_numero_com; ?>"><span id="id_label_numero_com"><?php echo $this->nm_new_label['numero_com']; ?></span></TD>
    <TD class="scFormDataOdd css_numero_com_line" id="hidden_field_data_numero_com" style="<?php echo $sStyleHidden_numero_com; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_com_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_com"]) &&  $this->nmgp_cmp_readonly["numero_com"] == "on") { 

 ?>
<input type="hidden" name="numero_com" value="<?php echo $this->form_encode_input($numero_com) . "\">" . $numero_com . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_com" class="sc-ui-readonly-numero_com css_numero_com_line" style="<?php echo $sStyleReadLab_numero_com; ?>"><?php echo $this->form_format_readonly("numero_com", $this->form_encode_input($this->numero_com)); ?></span><span id="id_read_off_numero_com" class="css_read_off_numero_com<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_com; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_com_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_com" type=text name="numero_com" value="<?php echo $this->form_encode_input($numero_com) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['numero_com']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numero_com']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_com_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_com_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_comafec']))
   {
       $this->nm_new_label['id_comafec'] = "FACTURA AFECTADA:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_comafec = $this->id_comafec;
   $sStyleHidden_id_comafec = '';
   if (isset($this->nmgp_cmp_hidden['id_comafec']) && $this->nmgp_cmp_hidden['id_comafec'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_comafec']);
       $sStyleHidden_id_comafec = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_comafec = 'display: none;';
   $sStyleReadInp_id_comafec = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_comafec']) && $this->nmgp_cmp_readonly['id_comafec'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_comafec']);
       $sStyleReadLab_id_comafec = '';
       $sStyleReadInp_id_comafec = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_comafec']) && $this->nmgp_cmp_hidden['id_comafec'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_comafec" value="<?php echo $this->form_encode_input($this->id_comafec) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_comafec_label" id="hidden_field_label_id_comafec" style="<?php echo $sStyleHidden_id_comafec; ?>"><span id="id_label_id_comafec"><?php echo $this->nm_new_label['id_comafec']; ?></span></TD>
    <TD class="scFormDataOdd css_id_comafec_line" id="hidden_field_data_id_comafec" style="<?php echo $sStyleHidden_id_comafec; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_comafec_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_comafec"]) &&  $this->nmgp_cmp_readonly["id_comafec"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT idfaccom, numfacom  FROM facturacom  ORDER BY numfacom";

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec'][] = $rs->fields[0];
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
   $id_comafec_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_comafec_1))
          {
              foreach ($this->id_comafec_1 as $tmp_id_comafec)
              {
                  if (trim($tmp_id_comafec) === trim($cadaselect[1])) { $id_comafec_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_comafec) === trim($cadaselect[1])) { $id_comafec_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_comafec" value="<?php echo $this->form_encode_input($id_comafec) . "\">" . $id_comafec_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_comafec();
   $x = 0 ; 
   $id_comafec_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_comafec_1))
          {
              foreach ($this->id_comafec_1 as $tmp_id_comafec)
              {
                  if (trim($tmp_id_comafec) === trim($cadaselect[1])) { $id_comafec_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_comafec) === trim($cadaselect[1])) { $id_comafec_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_comafec_look))
          {
              $id_comafec_look = $this->id_comafec;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_comafec\" class=\"css_id_comafec_line\" style=\"" .  $sStyleReadLab_id_comafec . "\">" . $this->form_format_readonly("id_comafec", $this->form_encode_input($id_comafec_look)) . "</span><span id=\"id_read_off_id_comafec\" class=\"css_read_off_id_comafec" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_comafec . "\">";
   echo " <span id=\"idAjaxSelect_id_comafec\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_comafec_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_comafec\" name=\"id_comafec\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_id_comafec'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_comafec) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_comafec)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_comafec_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_comafec_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numfacom']))
    {
        $this->nm_new_label['numfacom'] = "REFERENCIA  DE LA COMPRA:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numfacom = $this->numfacom;
   $sStyleHidden_numfacom = '';
   if (isset($this->nmgp_cmp_hidden['numfacom']) && $this->nmgp_cmp_hidden['numfacom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numfacom']);
       $sStyleHidden_numfacom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numfacom = 'display: none;';
   $sStyleReadInp_numfacom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numfacom']) && $this->nmgp_cmp_readonly['numfacom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numfacom']);
       $sStyleReadLab_numfacom = '';
       $sStyleReadInp_numfacom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numfacom']) && $this->nmgp_cmp_hidden['numfacom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numfacom" value="<?php echo $this->form_encode_input($numfacom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numfacom_label" id="hidden_field_label_numfacom" style="<?php echo $sStyleHidden_numfacom; ?>"><span id="id_label_numfacom"><?php echo $this->nm_new_label['numfacom']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['php_cmp_required']['numfacom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['php_cmp_required']['numfacom'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_numfacom_line" id="hidden_field_data_numfacom" style="<?php echo $sStyleHidden_numfacom; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numfacom_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numfacom"]) &&  $this->nmgp_cmp_readonly["numfacom"] == "on") { 

 ?>
<input type="hidden" name="numfacom" value="<?php echo $this->form_encode_input($numfacom) . "\">" . $numfacom . ""; ?>
<?php } else { ?>
<span id="id_read_on_numfacom" class="sc-ui-readonly-numfacom css_numfacom_line" style="<?php echo $sStyleReadLab_numfacom; ?>"><?php echo $this->form_format_readonly("numfacom", $this->form_encode_input($this->numfacom)); ?></span><span id="id_read_off_numfacom" class="css_read_off_numfacom<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numfacom; ?>">
 <input class="sc-js-input scFormObjectOdd css_numfacom_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numfacom" type=text name="numfacom" value="<?php echo $this->form_encode_input($numfacom) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: 'Número factura o entrada', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numfacom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numfacom_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="34%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idprov']))
    {
        $this->nm_new_label['idprov'] = "EL PROVEEDOR:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idprov = $this->idprov;
   $sStyleHidden_idprov = '';
   if (isset($this->nmgp_cmp_hidden['idprov']) && $this->nmgp_cmp_hidden['idprov'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idprov']);
       $sStyleHidden_idprov = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idprov = 'display: none;';
   $sStyleReadInp_idprov = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idprov']) && $this->nmgp_cmp_readonly['idprov'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idprov']);
       $sStyleReadLab_idprov = '';
       $sStyleReadInp_idprov = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idprov']) && $this->nmgp_cmp_hidden['idprov'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idprov" value="<?php echo $this->form_encode_input($idprov) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idprov_label" id="hidden_field_label_idprov" style="<?php echo $sStyleHidden_idprov; ?>"><span id="id_label_idprov"><?php echo $this->nm_new_label['idprov']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['php_cmp_required']['idprov']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['php_cmp_required']['idprov'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idprov_line" id="hidden_field_data_idprov" style="<?php echo $sStyleHidden_idprov; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idprov_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idprov"]) &&  $this->nmgp_cmp_readonly["idprov"] == "on") { 

 ?>
<input type="hidden" name="idprov" value="<?php echo $this->form_encode_input($idprov) . "\">" . $idprov . ""; ?>
<?php } else { ?>

<?php
$aRecData['idprov'] = $this->idprov;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \" - \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   if ('' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idprov])) ? $aLookup[0][$this->idprov] : $this->idprov;
$idprov_look = (isset($aLookup[0][$this->idprov])) ? $aLookup[0][$this->idprov] : $this->idprov;
?>
<span id="id_read_on_idprov" class="sc-ui-readonly-idprov css_idprov_line" style="<?php echo $sStyleReadLab_idprov; ?>"><?php echo $this->form_format_readonly("idprov", str_replace("<", "&lt;", $idprov_look)); ?></span><span id="id_read_off_idprov" class="css_read_off_idprov<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idprov; ?>">
 <input class="sc-js-input scFormObjectOdd css_idprov_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_idprov" type=text name="idprov" value="<?php echo $this->form_encode_input($idprov) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idprov'] = $this->idprov;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \" - \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   if ('' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov)
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_idprov'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idprov])) ? $aLookup[0][$this->idprov] : '';
$idprov_look = (isset($aLookup[0][$this->idprov])) ? $aLookup[0][$this->idprov] : '';
?>
<select id="id_ac_idprov" class="scFormObjectOdd sc-ui-autocomp-idprov css_idprov_obj sc-js-input"><?php if ('' != $this->idprov) { ?><option value="<?php echo $this->idprov ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select>
<?php
   if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_idprov*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@fac_compras_new03062022@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_idprov*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
?>
<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "fldedt_idprov", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idprov_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idprov_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['formapago']))
   {
       $this->nm_new_label['formapago'] = "FORMA DE PAGO:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_formapago_label" id="hidden_field_label_formapago" style="<?php echo $sStyleHidden_formapago; ?>"><span id="id_label_formapago"><?php echo $this->nm_new_label['formapago']; ?></span></TD>
    <TD class="scFormDataOdd css_formapago_line" id="hidden_field_data_formapago" style="<?php echo $sStyleHidden_formapago; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_formapago_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["formapago"]) &&  $this->nmgp_cmp_readonly["formapago"] == "on") { 

$formapago_look = "";
 if ($this->formapago == "CONTADO") { $formapago_look .= "CONTADO" ;} 
 if ($this->formapago == "CRÉDITO") { $formapago_look .= "CRÉDITO" ;} 
 if ($this->formapago == "DEPÓSITO") { $formapago_look .= "DEPOSITO" ;} 
 if ($this->formapago == "OTRO") { $formapago_look .= "OTRO" ;} 
 if (empty($formapago_look)) { $formapago_look = $this->formapago; }
?>
<input type="hidden" name="formapago" value="<?php echo $this->form_encode_input($formapago) . "\">" . $formapago_look . ""; ?>
<?php } else { ?>
<?php

$formapago_look = "";
 if ($this->formapago == "CONTADO") { $formapago_look .= "CONTADO" ;} 
 if ($this->formapago == "CRÉDITO") { $formapago_look .= "CRÉDITO" ;} 
 if ($this->formapago == "DEPÓSITO") { $formapago_look .= "DEPOSITO" ;} 
 if ($this->formapago == "OTRO") { $formapago_look .= "OTRO" ;} 
 if (empty($formapago_look)) { $formapago_look = $this->formapago; }
?>
<span id="id_read_on_formapago" class="css_formapago_line"  style="<?php echo $sStyleReadLab_formapago; ?>"><?php echo $this->form_format_readonly("formapago", $this->form_encode_input($formapago_look)); ?></span><span id="id_read_off_formapago" class="css_read_off_formapago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_formapago; ?>">
 <span id="idAjaxSelect_formapago" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_formapago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_formapago" name="formapago" size="1" alt="{type: 'select', enterTab: true}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_formapago'][] = ''; ?>
 <option value="">FORMA DE PAGO</option>
 <option  value="CONTADO" <?php  if ($this->formapago == "CONTADO") { echo " selected" ;} ?>>CONTADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_formapago'][] = 'CONTADO'; ?>
 <option  value="CRÉDITO" <?php  if ($this->formapago == "CRÉDITO") { echo " selected" ;} ?>>CRÉDITO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_formapago'][] = 'CRÉDITO'; ?>
 <option  value="DEPÓSITO" <?php  if ($this->formapago == "DEPÓSITO") { echo " selected" ;} ?>>DEPOSITO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_formapago'][] = 'DEPÓSITO'; ?>
 <option  value="OTRO" <?php  if ($this->formapago == "OTRO") { echo " selected" ;} ?>>OTRO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_formapago'][] = 'OTRO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_formapago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_formapago_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechacom']))
    {
        $this->nm_new_label['fechacom'] = "FECHA COMPRA:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechacom = $this->fechacom;
   $sStyleHidden_fechacom = '';
   if (isset($this->nmgp_cmp_hidden['fechacom']) && $this->nmgp_cmp_hidden['fechacom'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechacom']);
       $sStyleHidden_fechacom = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechacom = 'display: none;';
   $sStyleReadInp_fechacom = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechacom']) && $this->nmgp_cmp_readonly['fechacom'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechacom']);
       $sStyleReadLab_fechacom = '';
       $sStyleReadInp_fechacom = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechacom']) && $this->nmgp_cmp_hidden['fechacom'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechacom" value="<?php echo $this->form_encode_input($fechacom) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fechacom_label" id="hidden_field_label_fechacom" style="<?php echo $sStyleHidden_fechacom; ?>"><span id="id_label_fechacom"><?php echo $this->nm_new_label['fechacom']; ?></span></TD>
    <TD class="scFormDataOdd css_fechacom_line" id="hidden_field_data_fechacom" style="<?php echo $sStyleHidden_fechacom; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechacom_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechacom"]) &&  $this->nmgp_cmp_readonly["fechacom"] == "on") { 

 ?>
<input type="hidden" name="fechacom" value="<?php echo $this->form_encode_input($fechacom) . "\">" . $fechacom . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechacom" class="sc-ui-readonly-fechacom css_fechacom_line" style="<?php echo $sStyleReadLab_fechacom; ?>"><?php echo $this->form_format_readonly("fechacom", $this->form_encode_input($fechacom)); ?></span><span id="id_read_off_fechacom" class="css_read_off_fechacom<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechacom; ?>"><?php
$tmp_form_data = $this->field_config['fechacom']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechacom_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechacom" type=text name="fechacom" value="<?php echo $this->form_encode_input($fechacom) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechacom']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechacom']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechacom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechacom_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['fechavenc'] = "FECHA DE VENCIMIENTO:";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechavenc']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechavenc']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
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
    if (!isset($this->nm_new_label['total']))
    {
        $this->nm_new_label['total'] = "COSTO TOTAL COMPRA:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_total_label" id="hidden_field_label_total" style="<?php echo $sStyleHidden_total; ?>"><span id="id_label_total"><?php echo $this->nm_new_label['total']; ?></span></TD>
    <TD class="scFormDataOdd css_total_line" id="hidden_field_data_total" style="<?php echo $sStyleHidden_total; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_total_line" style="padding: 0px"><input type="hidden" name="total" value="<?php echo $this->form_encode_input($total); ?>"><span id="id_ajax_label_total"><?php echo nl2br($total); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="33%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldo']))
    {
        $this->nm_new_label['saldo'] = "SALDO POR PAGAR:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saldo_label" id="hidden_field_label_saldo" style="<?php echo $sStyleHidden_saldo; ?>"><span id="id_label_saldo"><?php echo $this->nm_new_label['saldo']; ?></span></TD>
    <TD class="scFormDataOdd css_saldo_line" id="hidden_field_data_saldo" style="<?php echo $sStyleHidden_saldo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldo_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="saldo" value="<?php echo $this->form_encode_input($saldo); ?>"><span id="id_ajax_label_saldo"><?php echo nl2br($saldo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldo_text"></span></td></tr></table></td></tr></table></TD>
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
   if (!isset($this->nm_new_label['anulada']))
   {
       $this->nm_new_label['anulada'] = "ESTADO:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anulada = $this->anulada;
   $sStyleHidden_anulada = '';
   if (isset($this->nmgp_cmp_hidden['anulada']) && $this->nmgp_cmp_hidden['anulada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anulada']);
       $sStyleHidden_anulada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anulada = 'display: none;';
   $sStyleReadInp_anulada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anulada']) && $this->nmgp_cmp_readonly['anulada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anulada']);
       $sStyleReadLab_anulada = '';
       $sStyleReadInp_anulada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anulada']) && $this->nmgp_cmp_hidden['anulada'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="anulada" value="<?php echo $this->form_encode_input($this->anulada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_anulada_label" id="hidden_field_label_anulada" style="<?php echo $sStyleHidden_anulada; ?>"><span id="id_label_anulada"><?php echo $this->nm_new_label['anulada']; ?></span></TD>
    <TD class="scFormDataOdd css_anulada_line" id="hidden_field_data_anulada" style="<?php echo $sStyleHidden_anulada; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anulada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anulada"]) &&  $this->nmgp_cmp_readonly["anulada"] == "on") { 

$anulada_look = "";
 if ($this->anulada == "") { $anulada_look .= "" ;} 
 if ($this->anulada == "DEVUELTA") { $anulada_look .= "DEVUELTA" ;} 
 if (empty($anulada_look)) { $anulada_look = $this->anulada; }
?>
<input type="hidden" name="anulada" value="<?php echo $this->form_encode_input($anulada) . "\">" . $anulada_look . ""; ?>
<?php } else { ?>
<?php

$anulada_look = "";
 if ($this->anulada == "") { $anulada_look .= "" ;} 
 if ($this->anulada == "DEVUELTA") { $anulada_look .= "DEVUELTA" ;} 
 if (empty($anulada_look)) { $anulada_look = $this->anulada; }
?>
<span id="id_read_on_anulada" class="css_anulada_line"  style="<?php echo $sStyleReadLab_anulada; ?>"><?php echo $this->form_format_readonly("anulada", $this->form_encode_input($anulada_look)); ?></span><span id="id_read_off_anulada" class="css_read_off_anulada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_anulada; ?>">
 <span id="idAjaxSelect_anulada" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_anulada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anulada" name="anulada" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="" <?php  if ($this->anulada == "") { echo " selected" ;} ?><?php  if (empty($this->anulada)) { echo " selected" ;} ?>></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_anulada'][] = ''; ?>
 <option  value="DEVUELTA" <?php  if ($this->anulada == "DEVUELTA") { echo " selected" ;} ?>>DEVUELTA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_anulada'][] = 'DEVUELTA'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anulada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anulada_text"></span></td></tr></table></td></tr></table></TD>
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
       $this->nm_new_label['asentada'] = "ASENTAR COMPRA:";
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
 if ($this->asentada == "0") { $asentada_look .= "NO" ;} 
 if ($this->asentada == "1") { $asentada_look .= "SI" ;} 
 if (empty($asentada_look)) { $asentada_look = $this->asentada; }
?>
<input type="hidden" name="asentada" value="<?php echo $this->form_encode_input($asentada) . "\">" . $asentada_look . ""; ?>
<?php } else { ?>
<?php

$asentada_look = "";
 if ($this->asentada == "0") { $asentada_look .= "NO" ;} 
 if ($this->asentada == "1") { $asentada_look .= "SI" ;} 
 if (empty($asentada_look)) { $asentada_look = $this->asentada; }
?>
<span id="id_read_on_asentada" class="css_asentada_line"  style="<?php echo $sStyleReadLab_asentada; ?>"><?php echo $this->form_format_readonly("asentada", $this->form_encode_input($asentada_look)); ?></span><span id="id_read_off_asentada" class="css_read_off_asentada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_asentada; ?>">
 <span id="idAjaxSelect_asentada" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_asentada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_asentada" name="asentada" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="0" <?php  if ($this->asentada == "0") { echo " selected" ;} ?><?php  if (empty($this->asentada)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_asentada'][] = '0'; ?>
 <option  value="1" <?php  if ($this->asentada == "1") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_asentada'][] = '1'; ?>
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
    if (!isset($this->nm_new_label['subtotal']))
    {
        $this->nm_new_label['subtotal'] = "SUBTOTAL:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_subtotal_label" id="hidden_field_label_subtotal" style="<?php echo $sStyleHidden_subtotal; ?>"><span id="id_label_subtotal"><?php echo $this->nm_new_label['subtotal']; ?></span></TD>
    <TD class="scFormDataOdd css_subtotal_line" id="hidden_field_data_subtotal" style="<?php echo $sStyleHidden_subtotal; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_subtotal_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="subtotal" value="<?php echo $this->form_encode_input($subtotal); ?>"><span id="id_ajax_label_subtotal"><?php echo nl2br($subtotal); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subtotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subtotal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valoriva']))
    {
        $this->nm_new_label['valoriva'] = "IMPUESTO:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valoriva_label" id="hidden_field_label_valoriva" style="<?php echo $sStyleHidden_valoriva; ?>"><span id="id_label_valoriva"><?php echo $this->nm_new_label['valoriva']; ?></span></TD>
    <TD class="scFormDataOdd css_valoriva_line" id="hidden_field_data_valoriva" style="<?php echo $sStyleHidden_valoriva; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoriva_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="valoriva" value="<?php echo $this->form_encode_input($valoriva); ?>"><span id="id_ajax_label_valoriva"><?php echo nl2br($valoriva); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoriva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoriva_text"></span></td></tr></table></td></tr></table></TD>
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
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idfaccom']))
           {
               $this->nmgp_cmp_readonly['idfaccom'] = 'on';
           }
?>


    <TD class="scFormDataOdd" id="hidden_field_data_banco" style="<?php echo $sStyleHidden_banco; ?>vertical-align: top;">
   <?php
   if (!isset($this->nm_new_label['retencion']))
   {
       $this->nm_new_label['retencion'] = "RETENCIÓN %:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $retencion = $this->retencion;
   $sStyleHidden_retencion = '';
   if (isset($this->nmgp_cmp_hidden['retencion']) && $this->nmgp_cmp_hidden['retencion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['retencion']);
       $sStyleHidden_retencion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_retencion = 'display: none;';
   $sStyleReadInp_retencion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['retencion']) && $this->nmgp_cmp_readonly['retencion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['retencion']);
       $sStyleReadLab_retencion = '';
       $sStyleReadInp_retencion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['retencion']) && $this->nmgp_cmp_hidden['retencion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="retencion" value="<?php echo $this->form_encode_input($this->retencion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_retencion?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_retencion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_retencion_label" style=""><span id="id_label_retencion"><?php echo $this->nm_new_label['retencion']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["retencion"]) &&  $this->nmgp_cmp_readonly["retencion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT porrete  FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion'][] = $rs->fields[0];
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
   $retencion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->retencion_1))
          {
              foreach ($this->retencion_1 as $tmp_retencion)
              {
                  if (trim($tmp_retencion) === trim($cadaselect[1])) { $retencion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->retencion) === trim($cadaselect[1])) { $retencion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="retencion" value="<?php echo $this->form_encode_input($retencion) . "\">" . $retencion_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_retencion();
   $x = 0 ; 
   $retencion_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->retencion_1))
          {
              foreach ($this->retencion_1 as $tmp_retencion)
              {
                  if (trim($tmp_retencion) === trim($cadaselect[1])) { $retencion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->retencion) === trim($cadaselect[1])) { $retencion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($retencion_look))
          {
              $retencion_look = $this->retencion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_retencion\" class=\"css_retencion_line\" style=\"" .  $sStyleReadLab_retencion . "\">" . $this->form_format_readonly("retencion", $this->form_encode_input($retencion_look)) . "</span><span id=\"id_read_off_retencion\" class=\"css_read_off_retencion" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_retencion . "\">";
   echo " <span id=\"idAjaxSelect_retencion\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_retencion_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_retencion\" name=\"retencion\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_retencion'][] = '0.00'; 
   echo "  <option value=\"0.00\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->retencion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->retencion)) 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_retencion*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@fac_compras_new03062022@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_retencion*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_retencion", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tiporetefuente_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=fac_compras_new03062022&KeepThis=true&TB_iframe=true&height=450&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_retencion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_retencion_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

   <?php
   if (!isset($this->nm_new_label['reteica']))
   {
       $this->nm_new_label['reteica'] = "RETE ICA %:";
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
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_reteica_line" style="vertical-align: top;padding: 0px">&nbsp;<span class="scFormLabelOddFormat css_reteica_label" style=""><span id="id_label_reteica"><?php echo $this->nm_new_label['reteica']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["reteica"]) &&  $this->nmgp_cmp_readonly["reteica"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT  porcica  FROM tipoica  ORDER BY id_ica DESC";

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_reteica'][] = '0.00'; 
   echo "  <option value=\"0.00\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
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
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_reteica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@fac_compras_new03062022@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_fac_compras_new03062022_lkpedt_refresh_reteica*scoutnmgp_url_saida*scinmodal*scoutnmgp_outra_jan*scintrue*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_reteica", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_tipoica_edit . "?script_case_init=" . $this->Ini->sc_page . "&nmgp_parms=" . $Md5_Lig . "&SC_lig_apl_orig=fac_compras_new03062022&KeepThis=true&TB_iframe=true&height=400&width=700&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_reteica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_reteica_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

   <?php
    if (!isset($this->nm_new_label['reteiva']))
    {
        $this->nm_new_label['reteiva'] = "RETE IVA %:";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['reteiva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['reteiva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['reteiva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['reteiva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_reteiva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_reteiva_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

   <?php
   if (!isset($this->nm_new_label['banco']))
   {
       $this->nm_new_label['banco'] = "CAJA N°";
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
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_banco?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco_line" style="vertical-align: top;padding: 0px">&nbsp;<span class="scFormLabelOddFormat css_banco_label" style=""><span id="id_label_banco"><?php echo $this->nm_new_label['banco']; ?></span></span>&nbsp;
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco"]) &&  $this->nmgp_cmp_readonly["banco"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco'] = array(); 
    }

   $old_value_numero_com = $this->numero_com;
   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero_com = $this->numero_com;
   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->numero_com = $old_value_numero_com;
   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_new03062022']['Lookup_banco'][] = $rs->fields[0];
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
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_text"></span></td></tr></table></td></tr></table>
   </td><?php }?>

    </TD>




<?php if ($sc_hidden_no > 0) { echo "</tr>"; } ?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


    <TD class="scFormDataOdd" id="hidden_field_data_idfaccom" style="<?php echo $sStyleHidden_idfaccom; ?>vertical-align: top;">
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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idfaccom"]) &&  $this->nmgp_cmp_readonly["idfaccom"] == "on"))
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
<td style="padding: 0px; spacing: 0px; <?php echo $sStyleHidden_idfaccom?>">
   <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfaccom_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idfaccom_label" style=""><span id="id_label_idfaccom"><?php echo $this->nm_new_label['idfaccom']; ?></span></span>&nbsp;
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_idfaccom" css_idfaccom_line" style="<?php echo $sStyleReadLab_idfaccom; ?>"><?php echo $this->form_format_readonly("idfaccom", $this->form_encode_input($this->idfaccom)); ?></span><span id="id_read_off_idfaccom" class="css_read_off_idfaccom" style="<?php echo $sStyleReadInp_idfaccom; ?>"><input type="hidden" name="idfaccom" value="<?php echo $this->form_encode_input($idfaccom) . "\">"?><span id="id_ajax_label_idfaccom"><?php echo nl2br($idfaccom); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfaccom_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfaccom_text"></span></td></tr></table></td></tr></table>
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
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Observaciones<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prefijo_delpedido']))
    {
        $this->nm_new_label['prefijo_delpedido'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prefijo_delpedido = $this->prefijo_delpedido;
   $sStyleHidden_prefijo_delpedido = '';
   if (isset($this->nmgp_cmp_hidden['prefijo_delpedido']) && $this->nmgp_cmp_hidden['prefijo_delpedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prefijo_delpedido']);
       $sStyleHidden_prefijo_delpedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prefijo_delpedido = 'display: none;';
   $sStyleReadInp_prefijo_delpedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prefijo_delpedido']) && $this->nmgp_cmp_readonly['prefijo_delpedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prefijo_delpedido']);
       $sStyleReadLab_prefijo_delpedido = '';
       $sStyleReadInp_prefijo_delpedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prefijo_delpedido']) && $this->nmgp_cmp_hidden['prefijo_delpedido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prefijo_delpedido" value="<?php echo $this->form_encode_input($prefijo_delpedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prefijo_delpedido_label" id="hidden_field_label_prefijo_delpedido" style="<?php echo $sStyleHidden_prefijo_delpedido; ?>"><span id="id_label_prefijo_delpedido"><?php echo $this->nm_new_label['prefijo_delpedido']; ?></span></TD>
    <TD class="scFormDataOdd css_prefijo_delpedido_line" id="hidden_field_data_prefijo_delpedido" style="<?php echo $sStyleHidden_prefijo_delpedido; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prefijo_delpedido_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prefijo_delpedido"]) &&  $this->nmgp_cmp_readonly["prefijo_delpedido"] == "on") { 

 ?>
<input type="hidden" name="prefijo_delpedido" value="<?php echo $this->form_encode_input($prefijo_delpedido) . "\">" . $prefijo_delpedido . ""; ?>
<?php } else { ?>
<span id="id_read_on_prefijo_delpedido" class="sc-ui-readonly-prefijo_delpedido css_prefijo_delpedido_line" style="<?php echo $sStyleReadLab_prefijo_delpedido; ?>"><?php echo $this->form_format_readonly("prefijo_delpedido", $this->form_encode_input($this->prefijo_delpedido)); ?></span><span id="id_read_off_prefijo_delpedido" class="css_read_off_prefijo_delpedido<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prefijo_delpedido; ?>">
 <input class="sc-js-input scFormObjectOdd css_prefijo_delpedido_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_prefijo_delpedido" type=text name="prefijo_delpedido" value="<?php echo $this->form_encode_input($prefijo_delpedido) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prefijo_delpedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prefijo_delpedido_text"></span></td></tr></table></td></tr></table></TD>
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
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="4" cols="70"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
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
    if (!isset($this->nm_new_label['control']))
    {
        $this->nm_new_label['control'] = "Control";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $control = $this->control;
   if (!isset($this->nmgp_cmp_hidden['control']))
   {
       $this->nmgp_cmp_hidden['control'] = 'off';
   }
   $sStyleHidden_control = '';
   if (isset($this->nmgp_cmp_hidden['control']) && $this->nmgp_cmp_hidden['control'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['control']);
       $sStyleHidden_control = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_control = 'display: none;';
   $sStyleReadInp_control = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['control']) && $this->nmgp_cmp_readonly['control'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['control']);
       $sStyleReadLab_control = '';
       $sStyleReadInp_control = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['control']) && $this->nmgp_cmp_hidden['control'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="control" value="<?php echo $this->form_encode_input($control) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_control_label" id="hidden_field_label_control" style="<?php echo $sStyleHidden_control; ?>"><span id="id_label_control"><?php echo $this->nm_new_label['control']; ?></span></TD>
    <TD class="scFormDataOdd css_control_line" id="hidden_field_data_control" style="<?php echo $sStyleHidden_control; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_control_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["control"]) &&  $this->nmgp_cmp_readonly["control"] == "on") { 

 ?>
<input type="hidden" name="control" value="<?php echo $this->form_encode_input($control) . "\">" . $control . ""; ?>
<?php } else { ?>
<span id="id_read_on_control" class="sc-ui-readonly-control css_control_line" style="<?php echo $sStyleReadLab_control; ?>"><?php echo $this->form_format_readonly("control", $this->form_encode_input($this->control)); ?></span><span id="id_read_off_control" class="css_read_off_control<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_control; ?>">
 <input class="sc-js-input scFormObjectOdd css_control_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_control" type=text name="control" value="<?php echo $this->form_encode_input($control) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 1, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['control']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['control']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['control']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_control_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_control_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuario']))
    {
        $this->nm_new_label['usuario'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario = $this->usuario;
   if (!isset($this->nmgp_cmp_hidden['usuario']))
   {
       $this->nmgp_cmp_hidden['usuario'] = 'off';
   }
   $sStyleHidden_usuario = '';
   if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario']);
       $sStyleHidden_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario = 'display: none;';
   $sStyleReadInp_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario']) && $this->nmgp_cmp_readonly['usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario']);
       $sStyleReadLab_usuario = '';
       $sStyleReadInp_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario_label" id="hidden_field_label_usuario" style="<?php echo $sStyleHidden_usuario; ?>"><span id="id_label_usuario"><?php echo $this->nm_new_label['usuario']; ?></span></TD>
    <TD class="scFormDataOdd css_usuario_line" id="hidden_field_data_usuario" style="<?php echo $sStyleHidden_usuario; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario"]) &&  $this->nmgp_cmp_readonly["usuario"] == "on") { 

 ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">" . $usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario" class="sc-ui-readonly-usuario css_usuario_line" style="<?php echo $sStyleReadLab_usuario; ?>"><?php echo $this->form_format_readonly("usuario", $this->form_encode_input($this->usuario)); ?></span><span id="id_read_off_usuario" class="css_read_off_usuario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario" type=text name="usuario" value="<?php echo $this->form_encode_input($usuario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['usuario']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['usuario']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['usuario']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cod_cuenta_label" id="hidden_field_label_cod_cuenta" style="<?php echo $sStyleHidden_cod_cuenta; ?>"><span id="id_label_cod_cuenta"><?php echo $this->nm_new_label['cod_cuenta']; ?></span></TD>
    <TD class="scFormDataOdd css_cod_cuenta_line" id="hidden_field_data_cod_cuenta" style="<?php echo $sStyleHidden_cod_cuenta; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_cuenta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_cuenta"]) &&  $this->nmgp_cmp_readonly["cod_cuenta"] == "on") { 

 ?>
<input type="hidden" name="cod_cuenta" value="<?php echo $this->form_encode_input($cod_cuenta) . "\">" . $cod_cuenta . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_cuenta" class="sc-ui-readonly-cod_cuenta css_cod_cuenta_line" style="<?php echo $sStyleReadLab_cod_cuenta; ?>"><?php echo $this->form_format_readonly("cod_cuenta", $this->form_encode_input($this->cod_cuenta)); ?></span><span id="id_read_off_cod_cuenta" class="css_read_off_cod_cuenta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_cuenta; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_cuenta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_cuenta" type=text name="cod_cuenta" value="<?php echo $this->form_encode_input($cod_cuenta) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_cuenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_cuenta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['creado']))
    {
        $this->nm_new_label['creado'] = "Creado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_creado = $this->creado;
   if (strlen($this->creado_hora) > 8 ) {$this->creado_hora = substr($this->creado_hora, 0, 8);}
   $this->creado .= ' ' . $this->creado_hora;
   $this->creado  = trim($this->creado);
   $creado = $this->creado;
   if (!isset($this->nmgp_cmp_hidden['creado']))
   {
       $this->nmgp_cmp_hidden['creado'] = 'off';
   }
   $sStyleHidden_creado = '';
   if (isset($this->nmgp_cmp_hidden['creado']) && $this->nmgp_cmp_hidden['creado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['creado']);
       $sStyleHidden_creado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_creado = 'display: none;';
   $sStyleReadInp_creado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['creado']) && $this->nmgp_cmp_readonly['creado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['creado']);
       $sStyleReadLab_creado = '';
       $sStyleReadInp_creado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['creado']) && $this->nmgp_cmp_hidden['creado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="creado" value="<?php echo $this->form_encode_input($creado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_creado_label" id="hidden_field_label_creado" style="<?php echo $sStyleHidden_creado; ?>"><span id="id_label_creado"><?php echo $this->nm_new_label['creado']; ?></span></TD>
    <TD class="scFormDataOdd css_creado_line" id="hidden_field_data_creado" style="<?php echo $sStyleHidden_creado; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_creado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["creado"]) &&  $this->nmgp_cmp_readonly["creado"] == "on") { 

 ?>
<input type="hidden" name="creado" value="<?php echo $this->form_encode_input($creado) . "\">" . $creado . ""; ?>
<?php } else { ?>
<span id="id_read_on_creado" class="sc-ui-readonly-creado css_creado_line" style="<?php echo $sStyleReadLab_creado; ?>"><?php echo $this->form_format_readonly("creado", $this->form_encode_input($creado)); ?></span><span id="id_read_off_creado" class="css_read_off_creado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_creado; ?>"><?php
$tmp_form_data = $this->field_config['creado']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_creado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_creado" type=text name="creado" value="<?php echo $this->form_encode_input($creado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['creado']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['creado']['date_format']; ?>', timeSep: '<?php echo $this->field_config['creado']['time_sep']; ?>', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_creado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_creado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->creado = $old_dt_creado;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['editado']))
    {
        $this->nm_new_label['editado'] = "Editado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_editado = $this->editado;
   if (strlen($this->editado_hora) > 8 ) {$this->editado_hora = substr($this->editado_hora, 0, 8);}
   $this->editado .= ' ' . $this->editado_hora;
   $this->editado  = trim($this->editado);
   $editado = $this->editado;
   if (!isset($this->nmgp_cmp_hidden['editado']))
   {
       $this->nmgp_cmp_hidden['editado'] = 'off';
   }
   $sStyleHidden_editado = '';
   if (isset($this->nmgp_cmp_hidden['editado']) && $this->nmgp_cmp_hidden['editado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['editado']);
       $sStyleHidden_editado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_editado = 'display: none;';
   $sStyleReadInp_editado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['editado']) && $this->nmgp_cmp_readonly['editado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['editado']);
       $sStyleReadLab_editado = '';
       $sStyleReadInp_editado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['editado']) && $this->nmgp_cmp_hidden['editado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="editado" value="<?php echo $this->form_encode_input($editado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_editado_label" id="hidden_field_label_editado" style="<?php echo $sStyleHidden_editado; ?>"><span id="id_label_editado"><?php echo $this->nm_new_label['editado']; ?></span></TD>
    <TD class="scFormDataOdd css_editado_line" id="hidden_field_data_editado" style="<?php echo $sStyleHidden_editado; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_editado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["editado"]) &&  $this->nmgp_cmp_readonly["editado"] == "on") { 

 ?>
<input type="hidden" name="editado" value="<?php echo $this->form_encode_input($editado) . "\">" . $editado . ""; ?>
<?php } else { ?>
<span id="id_read_on_editado" class="sc-ui-readonly-editado css_editado_line" style="<?php echo $sStyleReadLab_editado; ?>"><?php echo $this->form_format_readonly("editado", $this->form_encode_input($editado)); ?></span><span id="id_read_off_editado" class="css_read_off_editado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_editado; ?>"><?php
$tmp_form_data = $this->field_config['editado']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_editado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_editado" type=text name="editado" value="<?php echo $this->form_encode_input($editado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['editado']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['editado']['date_format']; ?>', timeSep: '<?php echo $this->field_config['editado']['time_sep']; ?>', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_editado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_editado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->editado = $old_dt_editado;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
