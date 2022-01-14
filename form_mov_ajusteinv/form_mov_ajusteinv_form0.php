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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Movimiento de Ajuste al Inventario"); } else { echo strip_tags("Ver Movimiento de Ajuste al Inventario"); } ?></TITLE>
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
.css_read_off_vence button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_mov_ajusteinv/form_mov_ajusteinv_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_mov_ajusteinv_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "prefijonota")
     {
        $('select[name="prefijonota"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="prefijonota"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="prefijonota"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "numeronota")
     {
        $('input[name="numeronota"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="numeronota"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="numeronota"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "idtipotran")
     {
        $('select[name="idtipotran"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="idtipotran"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="idtipotran"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "fecha")
     {
        $('input[name="fecha"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fecha"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fecha"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_fecha"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_fecha").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "idpro")
     {
        $('select[name="idpro"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="idpro"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="idpro"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "colores")
     {
        $('select[name="colores"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="colores"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="colores"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "tallas")
     {
        $('select[name="tallas"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="tallas"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="tallas"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "sabor")
     {
        $('select[name="sabor"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="sabor"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="sabor"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "presentacion")
     {
        $('input[name="presentacion"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="presentacion"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="presentacion"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "cantidad")
     {
        $('input[name="cantidad"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="cantidad"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="cantidad"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "idbodorig")
     {
        $('select[name="idbodorig"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="idbodorig"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="idbodorig"]').removeClass("scFormInputDisabled");
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
  }
 } // nm_field_disabled
<?php

include_once('form_mov_ajusteinv_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_mov_ajusteinv_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_mov_ajusteinv'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_mov_ajusteinv'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Movimiento de Ajuste al Inventario"; } else { echo "Ver Movimiento de Ajuste al Inventario"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
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
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['prefijonota']))
   {
       $this->nm_new_label['prefijonota'] = "Prefijo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prefijonota = $this->prefijonota;
   $sStyleHidden_prefijonota = '';
   if (isset($this->nmgp_cmp_hidden['prefijonota']) && $this->nmgp_cmp_hidden['prefijonota'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prefijonota']);
       $sStyleHidden_prefijonota = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prefijonota = 'display: none;';
   $sStyleReadInp_prefijonota = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prefijonota']) && $this->nmgp_cmp_readonly['prefijonota'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prefijonota']);
       $sStyleReadLab_prefijonota = '';
       $sStyleReadInp_prefijonota = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prefijonota']) && $this->nmgp_cmp_hidden['prefijonota'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="prefijonota" value="<?php echo $this->form_encode_input($this->prefijonota) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_prefijonota_line" id="hidden_field_data_prefijonota" style="<?php echo $sStyleHidden_prefijonota; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prefijonota_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_prefijonota_label" style=""><span id="id_label_prefijonota"><?php echo $this->nm_new_label['prefijonota']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prefijonota"]) &&  $this->nmgp_cmp_readonly["prefijonota"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  WHERE prefijo like '%not%' or prefijo like '%inv%'  and resolucion=0";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_prefijonota'][] = $rs->fields[0];
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
   $prefijonota_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prefijonota_1))
          {
              foreach ($this->prefijonota_1 as $tmp_prefijonota)
              {
                  if (trim($tmp_prefijonota) === trim($cadaselect[1])) { $prefijonota_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prefijonota) === trim($cadaselect[1])) { $prefijonota_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="prefijonota" value="<?php echo $this->form_encode_input($prefijonota) . "\">" . $prefijonota_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_prefijonota();
   $x = 0 ; 
   $prefijonota_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->prefijonota_1))
          {
              foreach ($this->prefijonota_1 as $tmp_prefijonota)
              {
                  if (trim($tmp_prefijonota) === trim($cadaselect[1])) { $prefijonota_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->prefijonota) === trim($cadaselect[1])) { $prefijonota_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($prefijonota_look))
          {
              $prefijonota_look = $this->prefijonota;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_prefijonota\" class=\"css_prefijonota_line\" style=\"" .  $sStyleReadLab_prefijonota . "\">" . $this->form_format_readonly("prefijonota", $this->form_encode_input($prefijonota_look)) . "</span><span id=\"id_read_off_prefijonota\" class=\"css_read_off_prefijonota" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_prefijonota . "\">";
   echo " <span id=\"idAjaxSelect_prefijonota\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_prefijonota_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_prefijonota\" name=\"prefijonota\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->prefijonota) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->prefijonota)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prefijonota_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prefijonota_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['numeronota']))
    {
        $this->nm_new_label['numeronota'] = "No. Nota:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numeronota = $this->numeronota;
   $sStyleHidden_numeronota = '';
   if (isset($this->nmgp_cmp_hidden['numeronota']) && $this->nmgp_cmp_hidden['numeronota'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numeronota']);
       $sStyleHidden_numeronota = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numeronota = 'display: none;';
   $sStyleReadInp_numeronota = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numeronota']) && $this->nmgp_cmp_readonly['numeronota'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numeronota']);
       $sStyleReadLab_numeronota = '';
       $sStyleReadInp_numeronota = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numeronota']) && $this->nmgp_cmp_hidden['numeronota'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numeronota" value="<?php echo $this->form_encode_input($numeronota) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numeronota_line" id="hidden_field_data_numeronota" style="<?php echo $sStyleHidden_numeronota; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numeronota_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numeronota_label" style=""><span id="id_label_numeronota"><?php echo $this->nm_new_label['numeronota']; ?></span></span><br><input type="hidden" name="numeronota" value="<?php echo $this->form_encode_input($numeronota); ?>"><span id="id_ajax_label_numeronota"><?php echo nl2br($numeronota); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numeronota_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numeronota_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_prefijonota_dumb = ('' == $sStyleHidden_prefijonota) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_prefijonota_dumb" style="<?php echo $sStyleHidden_prefijonota_dumb; ?>"></TD>
<?php $sStyleHidden_numeronota_dumb = ('' == $sStyleHidden_numeronota) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numeronota_dumb" style="<?php echo $sStyleHidden_numeronota_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idtipotran']))
   {
       $this->nm_new_label['idtipotran'] = "Concepto del ajuste";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtipotran = $this->idtipotran;
   $sStyleHidden_idtipotran = '';
   if (isset($this->nmgp_cmp_hidden['idtipotran']) && $this->nmgp_cmp_hidden['idtipotran'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtipotran']);
       $sStyleHidden_idtipotran = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtipotran = 'display: none;';
   $sStyleReadInp_idtipotran = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtipotran']) && $this->nmgp_cmp_readonly['idtipotran'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtipotran']);
       $sStyleReadLab_idtipotran = '';
       $sStyleReadInp_idtipotran = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtipotran']) && $this->nmgp_cmp_hidden['idtipotran'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idtipotran" value="<?php echo $this->form_encode_input($this->idtipotran) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idtipotran_line" id="hidden_field_data_idtipotran" style="<?php echo $sStyleHidden_idtipotran; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtipotran_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idtipotran_label" style=""><span id="id_label_idtipotran"><?php echo $this->nm_new_label['idtipotran']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtipotran"]) &&  $this->nmgp_cmp_readonly["idtipotran"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT idtipo, nombre  FROM tipotransfe WHERE idtipo !=2 ORDER BY nombre";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idtipotran'][] = $rs->fields[0];
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
   $idtipotran_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipotran_1))
          {
              foreach ($this->idtipotran_1 as $tmp_idtipotran)
              {
                  if (trim($tmp_idtipotran) === trim($cadaselect[1])) { $idtipotran_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipotran) === trim($cadaselect[1])) { $idtipotran_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idtipotran" value="<?php echo $this->form_encode_input($idtipotran) . "\">" . $idtipotran_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idtipotran();
   $x = 0 ; 
   $idtipotran_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idtipotran_1))
          {
              foreach ($this->idtipotran_1 as $tmp_idtipotran)
              {
                  if (trim($tmp_idtipotran) === trim($cadaselect[1])) { $idtipotran_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idtipotran) === trim($cadaselect[1])) { $idtipotran_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idtipotran_look))
          {
              $idtipotran_look = $this->idtipotran;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idtipotran\" class=\"css_idtipotran_line\" style=\"" .  $sStyleReadLab_idtipotran . "\">" . $this->form_format_readonly("idtipotran", $this->form_encode_input($idtipotran_look)) . "</span><span id=\"id_read_off_idtipotran\" class=\"css_read_off_idtipotran" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idtipotran . "\">";
   echo " <span id=\"idAjaxSelect_idtipotran\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idtipotran_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idtipotran\" name=\"idtipotran\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idtipotran) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idtipotran)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idtipotran_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtipotran_text"></span></td></tr></table></td></tr></table> </TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_idtipotran_dumb = ('' == $sStyleHidden_idtipotran) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idtipotran_dumb" style="<?php echo $sStyleHidden_idtipotran_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_dumb = ('' == $sStyleHidden_fecha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_dumb" style="<?php echo $sStyleHidden_fecha_dumb; ?>"></TD>
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
   if (!isset($this->nm_new_label['idpro']))
   {
       $this->nm_new_label['idpro'] = "Producto";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['idpro']) && $this->nmgp_cmp_hidden['idpro'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idpro" value="<?php echo $this->form_encode_input($this->idpro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idpro_label" id="hidden_field_label_idpro" style="<?php echo $sStyleHidden_idpro; ?>"><span id="id_label_idpro"><?php echo $this->nm_new_label['idpro']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['php_cmp_required']['idpro']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['php_cmp_required']['idpro'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idpro_line" id="hidden_field_data_idpro" style="<?php echo $sStyleHidden_idpro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro"]) &&  $this->nmgp_cmp_readonly["idpro"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

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

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_idpro\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idpro_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idpro\" name=\"idpro\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idpro'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione producto a ajustar") . "</option>" ; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_colores_label" id="hidden_field_label_colores" style="<?php echo $sStyleHidden_colores; ?>"><span id="id_label_colores"><?php echo $this->nm_new_label['colores']; ?></span></TD>
    <TD class="scFormDataOdd css_colores_line" id="hidden_field_data_colores" style="<?php echo $sStyleHidden_colores; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_colores_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["colores"]) &&  $this->nmgp_cmp_readonly["colores"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT f.idcol, c.color  FROM colorxproducto f left join colores c on f.idcol=c.idcolores where idpr=$this->idpro ORDER BY f.idcol";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_colores\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_colores_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_colores\" name=\"colores\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_colores'][] = '0'; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_colores_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_colores_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tallas_label" id="hidden_field_label_tallas" style="<?php echo $sStyleHidden_tallas; ?>"><span id="id_label_tallas"><?php echo $this->nm_new_label['tallas']; ?></span></TD>
    <TD class="scFormDataOdd css_tallas_line" id="hidden_field_data_tallas" style="<?php echo $sStyleHidden_tallas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tallas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tallas"]) &&  $this->nmgp_cmp_readonly["tallas"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas where idpr=$this->idpro ORDER BY f.idta";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_tallas\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tallas_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tallas\" name=\"tallas\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_tallas'][] = '0'; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tallas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tallas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sabor_label" id="hidden_field_label_sabor" style="<?php echo $sStyleHidden_sabor; ?>"><span id="id_label_sabor"><?php echo $this->nm_new_label['sabor']; ?></span></TD>
    <TD class="scFormDataOdd css_sabor_line" id="hidden_field_data_sabor" style="<?php echo $sStyleHidden_sabor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sabor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sabor"]) &&  $this->nmgp_cmp_readonly["sabor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas where idpr=$this->idpro ORDER BY f.idsa";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_sabor\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_sabor_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_sabor\" name=\"sabor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_sabor'][] = '0'; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sabor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sabor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_presentacion_label" id="hidden_field_label_presentacion" style="<?php echo $sStyleHidden_presentacion; ?>"><span id="id_label_presentacion"><?php echo $this->nm_new_label['presentacion']; ?></span></TD>
    <TD class="scFormDataOdd css_presentacion_line" id="hidden_field_data_presentacion" style="<?php echo $sStyleHidden_presentacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_presentacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["presentacion"]) &&  $this->nmgp_cmp_readonly["presentacion"] == "on") { 

 ?>
<input type="hidden" name="presentacion" value="<?php echo $this->form_encode_input($presentacion) . "\">" . $presentacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_presentacion" class="sc-ui-readonly-presentacion css_presentacion_line" style="<?php echo $sStyleReadLab_presentacion; ?>"><?php echo $this->form_format_readonly("presentacion", $this->form_encode_input($this->presentacion)); ?></span><span id="id_read_off_presentacion" class="css_read_off_presentacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_presentacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_presentacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_presentacion" type=text name="presentacion" value="<?php echo $this->form_encode_input($presentacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_presentacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_presentacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['seleccionarlfs']))
   {
       $this->nm_new_label['seleccionarlfs'] = "Seleccione";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $seleccionarlfs = $this->seleccionarlfs;
   $sStyleHidden_seleccionarlfs = '';
   if (isset($this->nmgp_cmp_hidden['seleccionarlfs']) && $this->nmgp_cmp_hidden['seleccionarlfs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['seleccionarlfs']);
       $sStyleHidden_seleccionarlfs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_seleccionarlfs = 'display: none;';
   $sStyleReadInp_seleccionarlfs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['seleccionarlfs']) && $this->nmgp_cmp_readonly['seleccionarlfs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['seleccionarlfs']);
       $sStyleReadLab_seleccionarlfs = '';
       $sStyleReadInp_seleccionarlfs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['seleccionarlfs']) && $this->nmgp_cmp_hidden['seleccionarlfs'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="seleccionarlfs" value="<?php echo $this->form_encode_input($this->seleccionarlfs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_seleccionarlfs_label" id="hidden_field_label_seleccionarlfs" style="<?php echo $sStyleHidden_seleccionarlfs; ?>"><span id="id_label_seleccionarlfs"><?php echo $this->nm_new_label['seleccionarlfs']; ?></span></TD>
    <TD class="scFormDataOdd css_seleccionarlfs_line" id="hidden_field_data_seleccionarlfs" style="<?php echo $sStyleHidden_seleccionarlfs; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_seleccionarlfs_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seleccionarlfs"]) &&  $this->nmgp_cmp_readonly["seleccionarlfs"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT vl.idvenclote,concat('Vence: ',coalesce(vl.fecha_vencimiento,''),' -- Lote: ',coalesce(vl.lote,''),' -- Bodega: ',b.bodega,' -- Existencia: ',vl.existencia) as descripcion FROM vencimiento_lote vl LEFT JOIN productos p on vl.idproducto=p.idprod LEFT JOIN bodegas b on vl.idbodega=b.idbodega where         p.maneja_tcs_lfs = 'LFS' and vl.idproducto='$this->idpro' and vl.existencia <> 0";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs'][] = $rs->fields[0];
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
   $seleccionarlfs_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->seleccionarlfs_1))
          {
              foreach ($this->seleccionarlfs_1 as $tmp_seleccionarlfs)
              {
                  if (trim($tmp_seleccionarlfs) === trim($cadaselect[1])) { $seleccionarlfs_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->seleccionarlfs) === trim($cadaselect[1])) { $seleccionarlfs_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="seleccionarlfs" value="<?php echo $this->form_encode_input($seleccionarlfs) . "\">" . $seleccionarlfs_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_seleccionarlfs();
   $x = 0 ; 
   $seleccionarlfs_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->seleccionarlfs_1))
          {
              foreach ($this->seleccionarlfs_1 as $tmp_seleccionarlfs)
              {
                  if (trim($tmp_seleccionarlfs) === trim($cadaselect[1])) { $seleccionarlfs_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->seleccionarlfs) === trim($cadaselect[1])) { $seleccionarlfs_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($seleccionarlfs_look))
          {
              $seleccionarlfs_look = $this->seleccionarlfs;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_seleccionarlfs\" class=\"css_seleccionarlfs_line\" style=\"" .  $sStyleReadLab_seleccionarlfs . "\">" . $this->form_format_readonly("seleccionarlfs", $this->form_encode_input($seleccionarlfs_look)) . "</span><span id=\"id_read_off_seleccionarlfs\" class=\"css_read_off_seleccionarlfs" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_seleccionarlfs . "\">";
   echo " <span id=\"idAjaxSelect_seleccionarlfs\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_seleccionarlfs_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_seleccionarlfs\" name=\"seleccionarlfs\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_seleccionarlfs'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Vencimiento/Lote/Bodega") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->seleccionarlfs) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->seleccionarlfs)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_seleccionarlfs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_seleccionarlfs_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantidad_label" id="hidden_field_label_cantidad" style="<?php echo $sStyleHidden_cantidad; ?>"><span id="id_label_cantidad"><?php echo $this->nm_new_label['cantidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['php_cmp_required']['cantidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['php_cmp_required']['cantidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cantidad_line" id="hidden_field_data_cantidad" style="<?php echo $sStyleHidden_cantidad; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantidad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad"]) &&  $this->nmgp_cmp_readonly["cantidad"] == "on") { 

 ?>
<input type="hidden" name="cantidad" value="<?php echo $this->form_encode_input($cantidad) . "\">" . $cantidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad" class="sc-ui-readonly-cantidad css_cantidad_line" style="<?php echo $sStyleReadLab_cantidad; ?>"><?php echo $this->form_format_readonly("cantidad", $this->form_encode_input($this->cantidad)); ?></span><span id="id_read_off_cantidad" class="css_read_off_cantidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidad" type=text name="cantidad" value="<?php echo $this->form_encode_input($cantidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_text"></span></td></tr></table></td></tr></table></TD>
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
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idbodorig']))
   {
       $this->nm_new_label['idbodorig'] = "Ubicación";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idbodorig = $this->idbodorig;
   $sStyleHidden_idbodorig = '';
   if (isset($this->nmgp_cmp_hidden['idbodorig']) && $this->nmgp_cmp_hidden['idbodorig'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idbodorig']);
       $sStyleHidden_idbodorig = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idbodorig = 'display: none;';
   $sStyleReadInp_idbodorig = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idbodorig']) && $this->nmgp_cmp_readonly['idbodorig'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idbodorig']);
       $sStyleReadLab_idbodorig = '';
       $sStyleReadInp_idbodorig = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idbodorig']) && $this->nmgp_cmp_hidden['idbodorig'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idbodorig" value="<?php echo $this->form_encode_input($this->idbodorig) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idbodorig_line" id="hidden_field_data_idbodorig" style="<?php echo $sStyleHidden_idbodorig; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idbodorig_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idbodorig_label" style=""><span id="id_label_idbodorig"><?php echo $this->nm_new_label['idbodorig']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['php_cmp_required']['idbodorig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['php_cmp_required']['idbodorig'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idbodorig"]) &&  $this->nmgp_cmp_readonly["idbodorig"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig'] = array(); 
    }

   $old_value_numeronota = $this->numeronota;
   $old_value_fecha = $this->fecha;
   $old_value_cantidad = $this->cantidad;
   $old_value_stcock = $this->stcock;
   $old_value_vence = $this->vence;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numeronota = $this->numeronota;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_stcock = $this->stcock;
   $unformatted_value_vence = $this->vence;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->numeronota = $old_value_numeronota;
   $this->fecha = $old_value_fecha;
   $this->cantidad = $old_value_cantidad;
   $this->stcock = $old_value_stcock;
   $this->vence = $old_value_vence;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig'][] = $rs->fields[0];
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
   $idbodorig_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbodorig_1))
          {
              foreach ($this->idbodorig_1 as $tmp_idbodorig)
              {
                  if (trim($tmp_idbodorig) === trim($cadaselect[1])) { $idbodorig_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbodorig) === trim($cadaselect[1])) { $idbodorig_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idbodorig" value="<?php echo $this->form_encode_input($idbodorig) . "\">" . $idbodorig_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idbodorig();
   $x = 0 ; 
   $idbodorig_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbodorig_1))
          {
              foreach ($this->idbodorig_1 as $tmp_idbodorig)
              {
                  if (trim($tmp_idbodorig) === trim($cadaselect[1])) { $idbodorig_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbodorig) === trim($cadaselect[1])) { $idbodorig_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idbodorig_look))
          {
              $idbodorig_look = $this->idbodorig;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idbodorig\" class=\"css_idbodorig_line\" style=\"" .  $sStyleReadLab_idbodorig . "\">" . $this->form_format_readonly("idbodorig", $this->form_encode_input($idbodorig_look)) . "</span><span id=\"id_read_off_idbodorig\" class=\"css_read_off_idbodorig" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idbodorig . "\">";
   echo " <span id=\"idAjaxSelect_idbodorig\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idbodorig_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idbodorig\" name=\"idbodorig\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['Lookup_idbodorig'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione Ubicación") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idbodorig) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idbodorig)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idbodorig_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idbodorig_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['stcock']))
    {
        $this->nm_new_label['stcock'] = "Existencia en ubicación";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $stcock = $this->stcock;
   $sStyleHidden_stcock = '';
   if (isset($this->nmgp_cmp_hidden['stcock']) && $this->nmgp_cmp_hidden['stcock'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['stcock']);
       $sStyleHidden_stcock = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_stcock = 'display: none;';
   $sStyleReadInp_stcock = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['stcock']) && $this->nmgp_cmp_readonly['stcock'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['stcock']);
       $sStyleReadLab_stcock = '';
       $sStyleReadInp_stcock = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['stcock']) && $this->nmgp_cmp_hidden['stcock'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stcock" value="<?php echo $this->form_encode_input($stcock) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_stcock_line" id="hidden_field_data_stcock" style="<?php echo $sStyleHidden_stcock; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_stcock_line" style="padding: 0px"><span class="scFormLabelOddFormat css_stcock_label" style=""><span id="id_label_stcock"><?php echo $this->nm_new_label['stcock']; ?></span></span><br><input type="hidden" name="stcock" value="<?php echo $this->form_encode_input($stcock); ?>"><span id="id_ajax_label_stcock"><?php echo nl2br($stcock); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stcock_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stcock_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_idbodorig_dumb = ('' == $sStyleHidden_idbodorig) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idbodorig_dumb" style="<?php echo $sStyleHidden_idbodorig_dumb; ?>"></TD>
<?php $sStyleHidden_stcock_dumb = ('' == $sStyleHidden_stcock) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_stcock_dumb" style="<?php echo $sStyleHidden_stcock_dumb; ?>"></TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lote_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lote_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vence']))
    {
        $this->nm_new_label['vence'] = "Vence";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vence = $this->vence;
   $sStyleHidden_vence = '';
   if (isset($this->nmgp_cmp_hidden['vence']) && $this->nmgp_cmp_hidden['vence'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vence']);
       $sStyleHidden_vence = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vence = 'display: none;';
   $sStyleReadInp_vence = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vence']) && $this->nmgp_cmp_readonly['vence'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vence']);
       $sStyleReadLab_vence = '';
       $sStyleReadInp_vence = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vence']) && $this->nmgp_cmp_hidden['vence'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vence" value="<?php echo $this->form_encode_input($vence) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vence_line" id="hidden_field_data_vence" style="<?php echo $sStyleHidden_vence; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vence_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vence_label" style=""><span id="id_label_vence"><?php echo $this->nm_new_label['vence']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vence"]) &&  $this->nmgp_cmp_readonly["vence"] == "on") { 

 ?>
<input type="hidden" name="vence" value="<?php echo $this->form_encode_input($vence) . "\">" . $vence . ""; ?>
<?php } else { ?>
<span id="id_read_on_vence" class="sc-ui-readonly-vence css_vence_line" style="<?php echo $sStyleReadLab_vence; ?>"><?php echo $this->form_format_readonly("vence", $this->form_encode_input($vence)); ?></span><span id="id_read_off_vence" class="css_read_off_vence<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vence; ?>"><?php
$tmp_form_data = $this->field_config['vence']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_vence_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_vence" type=text name="vence" value="<?php echo $this->form_encode_input($vence) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['vence']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['vence']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vence_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vence_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_lote_dumb = ('' == $sStyleHidden_lote) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_lote_dumb" style="<?php echo $sStyleHidden_lote_dumb; ?>"></TD>
<?php $sStyleHidden_vence_dumb = ('' == $sStyleHidden_vence) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_vence_dumb" style="<?php echo $sStyleHidden_vence_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label" style=""><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br>
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="2" cols="70"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R")
{
    $NM_btn = false;
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['btn_label']['last'];
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
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_mov_ajusteinv");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_mov_ajusteinv");
 parent.scAjaxDetailHeight("form_mov_ajusteinv", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_mov_ajusteinv", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_mov_ajusteinv", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_mov_ajusteinv']['buttonStatus'] = $this->nmgp_botoes;
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
