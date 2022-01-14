<?php
class form_detallenotamov_200421_form extends form_detallenotamov_200421_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Detalle Nota Inventario"); } else { echo strip_tags("Detalle Nota Inventario"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
.css_read_off_fechavenc_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detallenotamov_200421/form_detallenotamov_200421_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detallenotamov_200421_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['last'] : 'off'); ?>";
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
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
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "fechavenc_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "fechavenc_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
            cmp_name = "calendar_fechavenc_" + ii;
            $('input[id=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc) {
              $("#id_sc_field_fechavenc_" + ii).datepicker("destroy");
            }
            else {
              scJQCalendarAdd(ii);
            }
        }
     }
     if (F_name == "lote_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "lote_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "codigobar_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "codigobar_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "producto_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "producto_" + ii + "_autocomp";
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
            cmp_name = "producto_" + ii + "_autocomp_cap";
            $('input[id=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('#' + cmp_name).hide();
            }
            else {
                $('#' + cmp_name).show();
            }
        }
     }
     if (F_name == "colores_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "colores_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "tallas_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "tallas_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "sabor_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "sabor_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "destino_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "destino_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "cantidad_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "cantidad_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("producto_=enabled", "", i);
    nm_field_disabled("colores_=enabled", "", i);
    nm_field_disabled("tallas_=enabled", "", i);
    nm_field_disabled("sabor_=enabled", "", i);
    nm_field_disabled("destino_=enabled", "", i);
    nm_field_disabled("fechavenc_=enabled", "", i);
    nm_field_disabled("lote_=enabled", "", i);
    nm_field_disabled("codigobar_=enabled", "", i);
    nm_field_disabled("cantidad_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_detallenotamov_200421_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('producto_1');

<?php
}
?>
  addAutocomplete(this);

  sc_form_onload();

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

  var iSeq_producto_ = $(".sc-ui-autocomp-producto_", elem).attr("id").substr(15);

  $(".sc-ui-autocomp-producto_", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "producto_" != sId ? sId.substr(9) : "";
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
    url: "form_detallenotamov_200421.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_producto_",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "producto_" != sId ? sId.substr(9) : "";
   sc_form_detallenotamov_200421_producto__onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = 'margin-left: 0px; margin-top: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_detallenotamov_200421_js0.php");
?>
<script type="text/javascript"> 
nmdg_enter_tab = true;
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
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
<?php
$_SESSION['scriptcase']['error_span_title']['form_detallenotamov_200421'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detallenotamov_200421'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><td class="scFormErrorMessage scFormToastMessage"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorMessageFont" style="padding: 0px; vertical-align: top; width: 100%"><span id="id_error_display_table_text"></span></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['balterarsel'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['bexcluirsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['bexcluirsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['bexcluirsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['bexcluirsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['bexcluirsel'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluirsel", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['destino_']))
   {
       $this->nmgp_cmp_hidden['destino_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['producto_']) && $this->nmgp_cmp_hidden['producto_'] == 'off') { $sStyleHidden_producto_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['producto_']) || $this->nmgp_cmp_hidden['producto_'] == 'on') {
      if (!isset($this->nm_new_label['producto_'])) {
          $this->nm_new_label['producto_'] = "Producto"; } ?>

    <TD class="scFormLabelOddMult css_producto__label" id="hidden_field_label_producto_" style="<?php echo $sStyleHidden_producto_; ?>" > <?php echo $this->nm_new_label['producto_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['colores_']) && $this->nmgp_cmp_hidden['colores_'] == 'off') { $sStyleHidden_colores_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['colores_']) || $this->nmgp_cmp_hidden['colores_'] == 'on') {
      if (!isset($this->nm_new_label['colores_'])) {
          $this->nm_new_label['colores_'] = "Colores"; } ?>

    <TD class="scFormLabelOddMult css_colores__label" id="hidden_field_label_colores_" style="<?php echo $sStyleHidden_colores_; ?>" > <?php echo $this->nm_new_label['colores_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tallas_']) && $this->nmgp_cmp_hidden['tallas_'] == 'off') { $sStyleHidden_tallas_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tallas_']) || $this->nmgp_cmp_hidden['tallas_'] == 'on') {
      if (!isset($this->nm_new_label['tallas_'])) {
          $this->nm_new_label['tallas_'] = "Tallas"; } ?>

    <TD class="scFormLabelOddMult css_tallas__label" id="hidden_field_label_tallas_" style="<?php echo $sStyleHidden_tallas_; ?>" > <?php echo $this->nm_new_label['tallas_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sabor_']) && $this->nmgp_cmp_hidden['sabor_'] == 'off') { $sStyleHidden_sabor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sabor_']) || $this->nmgp_cmp_hidden['sabor_'] == 'on') {
      if (!isset($this->nm_new_label['sabor_'])) {
          $this->nm_new_label['sabor_'] = "Sabor"; } ?>

    <TD class="scFormLabelOddMult css_sabor__label" id="hidden_field_label_sabor_" style="<?php echo $sStyleHidden_sabor_; ?>" > <?php echo $this->nm_new_label['sabor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['destino_']) && $this->nmgp_cmp_hidden['destino_'] == 'off') { $sStyleHidden_destino_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['destino_']) || $this->nmgp_cmp_hidden['destino_'] == 'on') {
      if (!isset($this->nm_new_label['destino_'])) {
          $this->nm_new_label['destino_'] = "Destino"; } ?>

    <TD class="scFormLabelOddMult css_destino__label" id="hidden_field_label_destino_" style="<?php echo $sStyleHidden_destino_; ?>" > <?php echo $this->nm_new_label['destino_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fechavenc_']) && $this->nmgp_cmp_hidden['fechavenc_'] == 'off') { $sStyleHidden_fechavenc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fechavenc_']) || $this->nmgp_cmp_hidden['fechavenc_'] == 'on') {
      if (!isset($this->nm_new_label['fechavenc_'])) {
          $this->nm_new_label['fechavenc_'] = "F. Vencimiento"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['fechavenc_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_fechavenc__label" id="hidden_field_label_fechavenc_" style="<?php echo $sStyleHidden_fechavenc_; ?>" > <?php echo $this->nm_new_label['fechavenc_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lote_']) && $this->nmgp_cmp_hidden['lote_'] == 'off') { $sStyleHidden_lote_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lote_']) || $this->nmgp_cmp_hidden['lote_'] == 'on') {
      if (!isset($this->nm_new_label['lote_'])) {
          $this->nm_new_label['lote_'] = "Lote"; } ?>

    <TD class="scFormLabelOddMult css_lote__label" id="hidden_field_label_lote_" style="<?php echo $sStyleHidden_lote_; ?>" > <?php echo $this->nm_new_label['lote_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['codigobar_']) && $this->nmgp_cmp_hidden['codigobar_'] == 'off') { $sStyleHidden_codigobar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codigobar_']) || $this->nmgp_cmp_hidden['codigobar_'] == 'on') {
      if (!isset($this->nm_new_label['codigobar_'])) {
          $this->nm_new_label['codigobar_'] = "Cod barras o serial"; } ?>

    <TD class="scFormLabelOddMult css_codigobar__label" id="hidden_field_label_codigobar_" style="<?php echo $sStyleHidden_codigobar_; ?>" > <?php echo $this->nm_new_label['codigobar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['presentacion_']) && $this->nmgp_cmp_hidden['presentacion_'] == 'off') { $sStyleHidden_presentacion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['presentacion_']) || $this->nmgp_cmp_hidden['presentacion_'] == 'on') {
      if (!isset($this->nm_new_label['presentacion_'])) {
          $this->nm_new_label['presentacion_'] = "Presentacion"; } ?>

    <TD class="scFormLabelOddMult css_presentacion__label" id="hidden_field_label_presentacion_" style="<?php echo $sStyleHidden_presentacion_; ?>" > <?php echo $this->nm_new_label['presentacion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sStyleHidden_cantidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cantidad_']) || $this->nmgp_cmp_hidden['cantidad_'] == 'on') {
      if (!isset($this->nm_new_label['cantidad_'])) {
          $this->nm_new_label['cantidad_'] = "Cantidad"; } ?>

    <TD class="scFormLabelOddMult css_cantidad__label" id="hidden_field_label_cantidad_" style="<?php echo $sStyleHidden_cantidad_; ?>" > <?php echo $this->nm_new_label['cantidad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off') { $sStyleHidden_stock_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['stock_']) || $this->nmgp_cmp_hidden['stock_'] == 'on') {
      if (!isset($this->nm_new_label['stock_'])) {
          $this->nm_new_label['stock_'] = "Stock Origen"; } ?>

    <TD class="scFormLabelOddMult css_stock__label" id="hidden_field_label_stock_" style="<?php echo $sStyleHidden_stock_; ?>" > <?php echo $this->nm_new_label['stock_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_detallenotamov_200421);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detallenotamov_200421 = $this->form_vert_form_detallenotamov_200421;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detallenotamov_200421))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_detallenotamov_200421 as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idnota_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['idnota_'];
       $this->idmovi_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['idmovi_'];
       $this->descr_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['descr_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['producto_'] = true;
           $this->nmgp_cmp_readonly['colores_'] = true;
           $this->nmgp_cmp_readonly['tallas_'] = true;
           $this->nmgp_cmp_readonly['sabor_'] = true;
           $this->nmgp_cmp_readonly['destino_'] = true;
           $this->nmgp_cmp_readonly['fechavenc_'] = true;
           $this->nmgp_cmp_readonly['lote_'] = true;
           $this->nmgp_cmp_readonly['codigobar_'] = true;
           $this->nmgp_cmp_readonly['presentacion_'] = true;
           $this->nmgp_cmp_readonly['cantidad_'] = true;
           $this->nmgp_cmp_readonly['stock_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['producto_']) || $this->nmgp_cmp_readonly['producto_'] != "on") {$this->nmgp_cmp_readonly['producto_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['colores_']) || $this->nmgp_cmp_readonly['colores_'] != "on") {$this->nmgp_cmp_readonly['colores_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tallas_']) || $this->nmgp_cmp_readonly['tallas_'] != "on") {$this->nmgp_cmp_readonly['tallas_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sabor_']) || $this->nmgp_cmp_readonly['sabor_'] != "on") {$this->nmgp_cmp_readonly['sabor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['destino_']) || $this->nmgp_cmp_readonly['destino_'] != "on") {$this->nmgp_cmp_readonly['destino_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fechavenc_']) || $this->nmgp_cmp_readonly['fechavenc_'] != "on") {$this->nmgp_cmp_readonly['fechavenc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lote_']) || $this->nmgp_cmp_readonly['lote_'] != "on") {$this->nmgp_cmp_readonly['lote_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codigobar_']) || $this->nmgp_cmp_readonly['codigobar_'] != "on") {$this->nmgp_cmp_readonly['codigobar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['presentacion_']) || $this->nmgp_cmp_readonly['presentacion_'] != "on") {$this->nmgp_cmp_readonly['presentacion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cantidad_']) || $this->nmgp_cmp_readonly['cantidad_'] != "on") {$this->nmgp_cmp_readonly['cantidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['stock_']) || $this->nmgp_cmp_readonly['stock_'] != "on") {$this->nmgp_cmp_readonly['stock_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->producto_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['producto_']; 
       $producto_ = $this->producto_; 
       $sStyleHidden_producto_ = '';
       if (isset($sCheckRead_producto_))
       {
           unset($sCheckRead_producto_);
       }
       if (isset($this->nmgp_cmp_readonly['producto_']))
       {
           $sCheckRead_producto_ = $this->nmgp_cmp_readonly['producto_'];
       }
       if (isset($this->nmgp_cmp_hidden['producto_']) && $this->nmgp_cmp_hidden['producto_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['producto_']);
           $sStyleHidden_producto_ = 'display: none;';
       }
       $bTestReadOnly_producto_ = true;
       $sStyleReadLab_producto_ = 'display: none;';
       $sStyleReadInp_producto_ = '';
       if (isset($this->nmgp_cmp_readonly['producto_']) && $this->nmgp_cmp_readonly['producto_'] == 'on')
       {
           $bTestReadOnly_producto_ = false;
           unset($this->nmgp_cmp_readonly['producto_']);
           $sStyleReadLab_producto_ = '';
           $sStyleReadInp_producto_ = 'display: none;';
       }
       $this->colores_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['colores_']; 
       $colores_ = $this->colores_; 
       $sStyleHidden_colores_ = '';
       if (isset($sCheckRead_colores_))
       {
           unset($sCheckRead_colores_);
       }
       if (isset($this->nmgp_cmp_readonly['colores_']))
       {
           $sCheckRead_colores_ = $this->nmgp_cmp_readonly['colores_'];
       }
       if (isset($this->nmgp_cmp_hidden['colores_']) && $this->nmgp_cmp_hidden['colores_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['colores_']);
           $sStyleHidden_colores_ = 'display: none;';
       }
       $bTestReadOnly_colores_ = true;
       $sStyleReadLab_colores_ = 'display: none;';
       $sStyleReadInp_colores_ = '';
       if (isset($this->nmgp_cmp_readonly['colores_']) && $this->nmgp_cmp_readonly['colores_'] == 'on')
       {
           $bTestReadOnly_colores_ = false;
           unset($this->nmgp_cmp_readonly['colores_']);
           $sStyleReadLab_colores_ = '';
           $sStyleReadInp_colores_ = 'display: none;';
       }
       $this->tallas_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['tallas_']; 
       $tallas_ = $this->tallas_; 
       $sStyleHidden_tallas_ = '';
       if (isset($sCheckRead_tallas_))
       {
           unset($sCheckRead_tallas_);
       }
       if (isset($this->nmgp_cmp_readonly['tallas_']))
       {
           $sCheckRead_tallas_ = $this->nmgp_cmp_readonly['tallas_'];
       }
       if (isset($this->nmgp_cmp_hidden['tallas_']) && $this->nmgp_cmp_hidden['tallas_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tallas_']);
           $sStyleHidden_tallas_ = 'display: none;';
       }
       $bTestReadOnly_tallas_ = true;
       $sStyleReadLab_tallas_ = 'display: none;';
       $sStyleReadInp_tallas_ = '';
       if (isset($this->nmgp_cmp_readonly['tallas_']) && $this->nmgp_cmp_readonly['tallas_'] == 'on')
       {
           $bTestReadOnly_tallas_ = false;
           unset($this->nmgp_cmp_readonly['tallas_']);
           $sStyleReadLab_tallas_ = '';
           $sStyleReadInp_tallas_ = 'display: none;';
       }
       $this->sabor_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['sabor_']; 
       $sabor_ = $this->sabor_; 
       $sStyleHidden_sabor_ = '';
       if (isset($sCheckRead_sabor_))
       {
           unset($sCheckRead_sabor_);
       }
       if (isset($this->nmgp_cmp_readonly['sabor_']))
       {
           $sCheckRead_sabor_ = $this->nmgp_cmp_readonly['sabor_'];
       }
       if (isset($this->nmgp_cmp_hidden['sabor_']) && $this->nmgp_cmp_hidden['sabor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sabor_']);
           $sStyleHidden_sabor_ = 'display: none;';
       }
       $bTestReadOnly_sabor_ = true;
       $sStyleReadLab_sabor_ = 'display: none;';
       $sStyleReadInp_sabor_ = '';
       if (isset($this->nmgp_cmp_readonly['sabor_']) && $this->nmgp_cmp_readonly['sabor_'] == 'on')
       {
           $bTestReadOnly_sabor_ = false;
           unset($this->nmgp_cmp_readonly['sabor_']);
           $sStyleReadLab_sabor_ = '';
           $sStyleReadInp_sabor_ = 'display: none;';
       }
       $this->destino_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['destino_']; 
       $destino_ = $this->destino_; 
       if (!isset($this->nmgp_cmp_hidden['destino_']))
       {
           $this->nmgp_cmp_hidden['destino_'] = 'off';
       }
       $sStyleHidden_destino_ = '';
       if (isset($sCheckRead_destino_))
       {
           unset($sCheckRead_destino_);
       }
       if (isset($this->nmgp_cmp_readonly['destino_']))
       {
           $sCheckRead_destino_ = $this->nmgp_cmp_readonly['destino_'];
       }
       if (isset($this->nmgp_cmp_hidden['destino_']) && $this->nmgp_cmp_hidden['destino_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['destino_']);
           $sStyleHidden_destino_ = 'display: none;';
       }
       $bTestReadOnly_destino_ = true;
       $sStyleReadLab_destino_ = 'display: none;';
       $sStyleReadInp_destino_ = '';
       if (isset($this->nmgp_cmp_readonly['destino_']) && $this->nmgp_cmp_readonly['destino_'] == 'on')
       {
           $bTestReadOnly_destino_ = false;
           unset($this->nmgp_cmp_readonly['destino_']);
           $sStyleReadLab_destino_ = '';
           $sStyleReadInp_destino_ = 'display: none;';
       }
       $this->fechavenc_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['fechavenc_']; 
       $fechavenc_ = $this->fechavenc_; 
       $sStyleHidden_fechavenc_ = '';
       if (isset($sCheckRead_fechavenc_))
       {
           unset($sCheckRead_fechavenc_);
       }
       if (isset($this->nmgp_cmp_readonly['fechavenc_']))
       {
           $sCheckRead_fechavenc_ = $this->nmgp_cmp_readonly['fechavenc_'];
       }
       if (isset($this->nmgp_cmp_hidden['fechavenc_']) && $this->nmgp_cmp_hidden['fechavenc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fechavenc_']);
           $sStyleHidden_fechavenc_ = 'display: none;';
       }
       $bTestReadOnly_fechavenc_ = true;
       $sStyleReadLab_fechavenc_ = 'display: none;';
       $sStyleReadInp_fechavenc_ = '';
       if (isset($this->nmgp_cmp_readonly['fechavenc_']) && $this->nmgp_cmp_readonly['fechavenc_'] == 'on')
       {
           $bTestReadOnly_fechavenc_ = false;
           unset($this->nmgp_cmp_readonly['fechavenc_']);
           $sStyleReadLab_fechavenc_ = '';
           $sStyleReadInp_fechavenc_ = 'display: none;';
       }
       $this->lote_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['lote_']; 
       $lote_ = $this->lote_; 
       $sStyleHidden_lote_ = '';
       if (isset($sCheckRead_lote_))
       {
           unset($sCheckRead_lote_);
       }
       if (isset($this->nmgp_cmp_readonly['lote_']))
       {
           $sCheckRead_lote_ = $this->nmgp_cmp_readonly['lote_'];
       }
       if (isset($this->nmgp_cmp_hidden['lote_']) && $this->nmgp_cmp_hidden['lote_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lote_']);
           $sStyleHidden_lote_ = 'display: none;';
       }
       $bTestReadOnly_lote_ = true;
       $sStyleReadLab_lote_ = 'display: none;';
       $sStyleReadInp_lote_ = '';
       if (isset($this->nmgp_cmp_readonly['lote_']) && $this->nmgp_cmp_readonly['lote_'] == 'on')
       {
           $bTestReadOnly_lote_ = false;
           unset($this->nmgp_cmp_readonly['lote_']);
           $sStyleReadLab_lote_ = '';
           $sStyleReadInp_lote_ = 'display: none;';
       }
       $this->codigobar_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['codigobar_']; 
       $codigobar_ = $this->codigobar_; 
       $sStyleHidden_codigobar_ = '';
       if (isset($sCheckRead_codigobar_))
       {
           unset($sCheckRead_codigobar_);
       }
       if (isset($this->nmgp_cmp_readonly['codigobar_']))
       {
           $sCheckRead_codigobar_ = $this->nmgp_cmp_readonly['codigobar_'];
       }
       if (isset($this->nmgp_cmp_hidden['codigobar_']) && $this->nmgp_cmp_hidden['codigobar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codigobar_']);
           $sStyleHidden_codigobar_ = 'display: none;';
       }
       $bTestReadOnly_codigobar_ = true;
       $sStyleReadLab_codigobar_ = 'display: none;';
       $sStyleReadInp_codigobar_ = '';
       if (isset($this->nmgp_cmp_readonly['codigobar_']) && $this->nmgp_cmp_readonly['codigobar_'] == 'on')
       {
           $bTestReadOnly_codigobar_ = false;
           unset($this->nmgp_cmp_readonly['codigobar_']);
           $sStyleReadLab_codigobar_ = '';
           $sStyleReadInp_codigobar_ = 'display: none;';
       }
       $this->presentacion_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['presentacion_']; 
       $presentacion_ = $this->presentacion_; 
       $sStyleHidden_presentacion_ = '';
       if (isset($sCheckRead_presentacion_))
       {
           unset($sCheckRead_presentacion_);
       }
       if (isset($this->nmgp_cmp_readonly['presentacion_']))
       {
           $sCheckRead_presentacion_ = $this->nmgp_cmp_readonly['presentacion_'];
       }
       if (isset($this->nmgp_cmp_hidden['presentacion_']) && $this->nmgp_cmp_hidden['presentacion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['presentacion_']);
           $sStyleHidden_presentacion_ = 'display: none;';
       }
       $bTestReadOnly_presentacion_ = true;
       $sStyleReadLab_presentacion_ = 'display: none;';
       $sStyleReadInp_presentacion_ = '';
       if (isset($this->nmgp_cmp_readonly['presentacion_']) && $this->nmgp_cmp_readonly['presentacion_'] == 'on')
       {
           $bTestReadOnly_presentacion_ = false;
           unset($this->nmgp_cmp_readonly['presentacion_']);
           $sStyleReadLab_presentacion_ = '';
           $sStyleReadInp_presentacion_ = 'display: none;';
       }
       $this->cantidad_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['cantidad_']; 
       $cantidad_ = $this->cantidad_; 
       $sStyleHidden_cantidad_ = '';
       if (isset($sCheckRead_cantidad_))
       {
           unset($sCheckRead_cantidad_);
       }
       if (isset($this->nmgp_cmp_readonly['cantidad_']))
       {
           $sCheckRead_cantidad_ = $this->nmgp_cmp_readonly['cantidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cantidad_']);
           $sStyleHidden_cantidad_ = 'display: none;';
       }
       $bTestReadOnly_cantidad_ = true;
       $sStyleReadLab_cantidad_ = 'display: none;';
       $sStyleReadInp_cantidad_ = '';
       if (isset($this->nmgp_cmp_readonly['cantidad_']) && $this->nmgp_cmp_readonly['cantidad_'] == 'on')
       {
           $bTestReadOnly_cantidad_ = false;
           unset($this->nmgp_cmp_readonly['cantidad_']);
           $sStyleReadLab_cantidad_ = '';
           $sStyleReadInp_cantidad_ = 'display: none;';
       }
       $this->stock_ = $this->form_vert_form_detallenotamov_200421[$sc_seq_vert]['stock_']; 
       $stock_ = $this->stock_; 
       $sStyleHidden_stock_ = '';
       if (isset($sCheckRead_stock_))
       {
           unset($sCheckRead_stock_);
       }
       if (isset($this->nmgp_cmp_readonly['stock_']))
       {
           $sCheckRead_stock_ = $this->nmgp_cmp_readonly['stock_'];
       }
       if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['stock_']);
           $sStyleHidden_stock_ = 'display: none;';
       }
       $bTestReadOnly_stock_ = true;
       $sStyleReadLab_stock_ = 'display: none;';
       $sStyleReadInp_stock_ = '';
       if (isset($this->nmgp_cmp_readonly['stock_']) && $this->nmgp_cmp_readonly['stock_'] == 'on')
       {
           $bTestReadOnly_stock_ = false;
           unset($this->nmgp_cmp_readonly['stock_']);
           $sStyleReadLab_stock_ = '';
           $sStyleReadInp_stock_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: true}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: true}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detallenotamov_200421_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detallenotamov_200421_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallenotamov_200421_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detallenotamov_200421_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallenotamov_200421_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detallenotamov_200421_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['producto_']) && $this->nmgp_cmp_hidden['producto_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="producto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($producto_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_producto__line" id="hidden_field_data_producto_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_producto_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_producto__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_producto_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["producto_"]) &&  $this->nmgp_cmp_readonly["producto_"] == "on") { 

 ?>
<input type="hidden" name="producto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($producto_) . "\">" . $producto_ . ""; ?>
<?php } else { ?>

<?php
$aRecData['producto_'] = $this->producto_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_'] = array(); 
    }

   $old_value_destino_ = $this->destino_;
   $old_value_fechavenc_ = $this->fechavenc_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_stock_ = $this->stock_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_fechavenc_ = $this->fechavenc_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_stock_ = $this->stock_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \"  \" + nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \"  \",nompro) FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\"  \"&nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\"  \"||nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \"  \" + nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\"  \"||nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\"  \"||nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }

   $this->destino_ = $old_value_destino_;
   $this->fechavenc_ = $old_value_fechavenc_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->stock_ = $old_value_stock_;

   if ('' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'])
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->producto_])) ? $aLookup[0][$this->producto_] : $this->producto_;
$producto__look = (isset($aLookup[0][$this->producto_])) ? $aLookup[0][$this->producto_] : $this->producto_;
?>
<span id="id_read_on_producto_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-producto_<?php echo $sc_seq_vert ?> css_producto__line" style="<?php echo $sStyleReadLab_producto_; ?>"><?php echo $this->form_format_readonly("producto_", str_replace("<", "&lt;", $producto__look)); ?></span><span id="id_read_off_producto_<?php echo $sc_seq_vert ?>" class="css_read_off_producto_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_producto_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_producto__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_producto_<?php echo $sc_seq_vert ?>" type=text name="producto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($producto_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['producto_'] = $this->producto_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_'] = array(); 
    }

   $old_value_destino_ = $this->destino_;
   $old_value_fechavenc_ = $this->fechavenc_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_stock_ = $this->stock_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_fechavenc_ = $this->fechavenc_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_stock_ = $this->stock_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \"  \" + nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \"  \",nompro) FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\"  \"&nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\"  \"||nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \"  \" + nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\"  \"||nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\"  \"||nompro FROM productos WHERE idprod = " . $aRecData['producto_'] . " ORDER BY codigobar, nompro";
   }

   $this->destino_ = $old_value_destino_;
   $this->fechavenc_ = $old_value_fechavenc_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->stock_ = $old_value_stock_;

   if ('' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'] && '' != $aRecData['producto_'])
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_producto_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->producto_])) ? $aLookup[0][$this->producto_] : '';
$producto__look = (isset($aLookup[0][$this->producto_])) ? $aLookup[0][$this->producto_] : '';
?>
<select id="id_ac_producto_<?php echo $sc_seq_vert; ?>" class="scFormObjectOddMult sc-ui-autocomp-producto_ css_producto__obj sc-js-input"><?php if ('' != $this->producto_) { ?><option value="<?php echo $this->producto_ ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_producto_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_producto_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['colores_']) && $this->nmgp_cmp_hidden['colores_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="colores_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->colores_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_colores__line" id="hidden_field_data_colores_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_colores_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_colores__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_colores_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["colores_"]) &&  $this->nmgp_cmp_readonly["colores_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_'] = array(); 
}
if ($this->producto_ != "")
{ 
   $this->nm_clear_val("producto_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_'] = array(); 
    }

   $old_value_destino_ = $this->destino_;
   $old_value_fechavenc_ = $this->fechavenc_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_stock_ = $this->stock_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_fechavenc_ = $this->fechavenc_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_stock_ = $this->stock_;

   $nm_comando = "SELECT cp.idcol, c.color  FROM colorxproducto cp left join colores c on cp.idcol=c.idcolores where cp.idpr='$this->producto_' ORDER BY cp.idcol";

   $this->destino_ = $old_value_destino_;
   $this->fechavenc_ = $old_value_fechavenc_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->stock_ = $old_value_stock_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_'][] = $rs->fields[0];
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
   $colores__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->colores__1))
          {
              foreach ($this->colores__1 as $tmp_colores_)
              {
                  if (trim($tmp_colores_) === trim($cadaselect[1])) { $colores__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->colores_) === trim($cadaselect[1])) { $colores__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="colores_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($colores_) . "\">" . $colores__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_colores_();
   $x = 0 ; 
   $colores__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->colores__1))
          {
              foreach ($this->colores__1 as $tmp_colores_)
              {
                  if (trim($tmp_colores_) === trim($cadaselect[1])) { $colores__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->colores_) === trim($cadaselect[1])) { $colores__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($colores__look))
          {
              $colores__look = $this->colores_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_colores_" . $sc_seq_vert . "\" class=\"css_colores__line\" style=\"" .  $sStyleReadLab_colores_ . "\">" . $this->form_format_readonly("colores_", $this->form_encode_input($colores__look)) . "</span><span id=\"id_read_off_colores_" . $sc_seq_vert . "\" class=\"css_read_off_colores_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_colores_ . "\">";
   echo " <span id=\"idAjaxSelect_colores_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_colores__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_colores_" . $sc_seq_vert . "\" name=\"colores_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_colores_'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->colores_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->colores_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_colores_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_colores_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tallas_']) && $this->nmgp_cmp_hidden['tallas_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tallas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tallas_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tallas__line" id="hidden_field_data_tallas_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tallas_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tallas__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tallas_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tallas_"]) &&  $this->nmgp_cmp_readonly["tallas_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_'] = array(); 
}
if ($this->producto_ != "")
{ 
   $this->nm_clear_val("producto_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_'] = array(); 
    }

   $old_value_destino_ = $this->destino_;
   $old_value_fechavenc_ = $this->fechavenc_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_stock_ = $this->stock_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_fechavenc_ = $this->fechavenc_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_stock_ = $this->stock_;

   $nm_comando = "SELECT tp.idta, t.tamaño FROM tallaxproducto tp left join tallas t on tp.idta=t.idtallas where tp.idpr='$this->producto_' ORDER BY tp.idta";

   $this->destino_ = $old_value_destino_;
   $this->fechavenc_ = $old_value_fechavenc_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->stock_ = $old_value_stock_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_'][] = $rs->fields[0];
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
   $tallas__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tallas__1))
          {
              foreach ($this->tallas__1 as $tmp_tallas_)
              {
                  if (trim($tmp_tallas_) === trim($cadaselect[1])) { $tallas__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tallas_) === trim($cadaselect[1])) { $tallas__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tallas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tallas_) . "\">" . $tallas__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tallas_();
   $x = 0 ; 
   $tallas__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tallas__1))
          {
              foreach ($this->tallas__1 as $tmp_tallas_)
              {
                  if (trim($tmp_tallas_) === trim($cadaselect[1])) { $tallas__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tallas_) === trim($cadaselect[1])) { $tallas__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tallas__look))
          {
              $tallas__look = $this->tallas_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tallas_" . $sc_seq_vert . "\" class=\"css_tallas__line\" style=\"" .  $sStyleReadLab_tallas_ . "\">" . $this->form_format_readonly("tallas_", $this->form_encode_input($tallas__look)) . "</span><span id=\"id_read_off_tallas_" . $sc_seq_vert . "\" class=\"css_read_off_tallas_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tallas_ . "\">";
   echo " <span id=\"idAjaxSelect_tallas_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_tallas__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tallas_" . $sc_seq_vert . "\" name=\"tallas_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_tallas_'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tallas_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tallas_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tallas_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tallas_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sabor_']) && $this->nmgp_cmp_hidden['sabor_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sabor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->sabor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sabor__line" id="hidden_field_data_sabor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sabor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sabor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sabor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sabor_"]) &&  $this->nmgp_cmp_readonly["sabor_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_'] = array(); 
}
if ($this->producto_ != "")
{ 
   $this->nm_clear_val("producto_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_'] = array(); 
    }

   $old_value_destino_ = $this->destino_;
   $old_value_fechavenc_ = $this->fechavenc_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_stock_ = $this->stock_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_fechavenc_ = $this->fechavenc_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_stock_ = $this->stock_;

   $nm_comando = "SELECT p.idsa, t.tamaño FROM saborxproducto p left join tallas t on p.idsa=t.idtallas where idpr=$this->producto_ and tallasabor='S' ORDER BY p.idsa";

   $this->destino_ = $old_value_destino_;
   $this->fechavenc_ = $old_value_fechavenc_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->stock_ = $old_value_stock_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_'][] = $rs->fields[0];
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
   $sabor__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sabor__1))
          {
              foreach ($this->sabor__1 as $tmp_sabor_)
              {
                  if (trim($tmp_sabor_) === trim($cadaselect[1])) { $sabor__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sabor_) === trim($cadaselect[1])) { $sabor__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sabor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sabor_) . "\">" . $sabor__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sabor_();
   $x = 0 ; 
   $sabor__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sabor__1))
          {
              foreach ($this->sabor__1 as $tmp_sabor_)
              {
                  if (trim($tmp_sabor_) === trim($cadaselect[1])) { $sabor__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sabor_) === trim($cadaselect[1])) { $sabor__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sabor__look))
          {
              $sabor__look = $this->sabor_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sabor_" . $sc_seq_vert . "\" class=\"css_sabor__line\" style=\"" .  $sStyleReadLab_sabor_ . "\">" . $this->form_format_readonly("sabor_", $this->form_encode_input($sabor__look)) . "</span><span id=\"id_read_off_sabor_" . $sc_seq_vert . "\" class=\"css_read_off_sabor_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_sabor_ . "\">";
   echo " <span id=\"idAjaxSelect_sabor_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_sabor__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_sabor_" . $sc_seq_vert . "\" name=\"sabor_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['Lookup_sabor_'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sabor_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sabor_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sabor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sabor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['destino_']) && $this->nmgp_cmp_hidden['destino_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="destino_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($destino_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_destino__line" id="hidden_field_data_destino_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_destino_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_destino__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_destino_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["destino_"]) &&  $this->nmgp_cmp_readonly["destino_"] == "on") { 

 ?>
<input type="hidden" name="destino_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($destino_) . "\">" . $destino_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_destino_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-destino_<?php echo $sc_seq_vert ?> css_destino__line" style="<?php echo $sStyleReadLab_destino_; ?>"><?php echo $this->form_format_readonly("destino_", $this->form_encode_input($this->destino_)); ?></span><span id="id_read_off_destino_<?php echo $sc_seq_vert ?>" class="css_read_off_destino_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_destino_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_destino__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_destino_<?php echo $sc_seq_vert ?>" type=text name="destino_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($destino_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['destino_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['destino_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['destino_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_destino_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_destino_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fechavenc_']) && $this->nmgp_cmp_hidden['fechavenc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechavenc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fechavenc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fechavenc__line" id="hidden_field_data_fechavenc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fechavenc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fechavenc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fechavenc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechavenc_"]) &&  $this->nmgp_cmp_readonly["fechavenc_"] == "on") { 

 ?>
<input type="hidden" name="fechavenc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fechavenc_) . "\">" . $fechavenc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechavenc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fechavenc_<?php echo $sc_seq_vert ?> css_fechavenc__line" style="<?php echo $sStyleReadLab_fechavenc_; ?>"><?php echo $this->form_format_readonly("fechavenc_", $this->form_encode_input($fechavenc_)); ?></span><span id="id_read_off_fechavenc_<?php echo $sc_seq_vert ?>" class="css_read_off_fechavenc_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechavenc_; ?>"><?php
$tmp_form_data = $this->field_config['fechavenc_']['date_format'];
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

 <input class="sc-js-input scFormObjectOddMult css_fechavenc__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechavenc_<?php echo $sc_seq_vert ?>" type=text name="fechavenc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fechavenc_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechavenc_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechavenc_']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechavenc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechavenc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lote_']) && $this->nmgp_cmp_hidden['lote_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lote_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lote_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lote__line" id="hidden_field_data_lote_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lote_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_lote__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lote_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lote_"]) &&  $this->nmgp_cmp_readonly["lote_"] == "on") { 

 ?>
<input type="hidden" name="lote_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lote_) . "\">" . $lote_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_lote_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-lote_<?php echo $sc_seq_vert ?> css_lote__line" style="<?php echo $sStyleReadLab_lote_; ?>"><?php echo $this->form_format_readonly("lote_", $this->form_encode_input($this->lote_)); ?></span><span id="id_read_off_lote_<?php echo $sc_seq_vert ?>" class="css_read_off_lote_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lote_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_lote__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lote_<?php echo $sc_seq_vert ?>" type=text name="lote_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lote_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lote_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lote_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codigobar_']) && $this->nmgp_cmp_hidden['codigobar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigobar__line" id="hidden_field_data_codigobar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigobar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigobar__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codigobar_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigobar_"]) &&  $this->nmgp_cmp_readonly["codigobar_"] == "on") { 

 ?>
<input type="hidden" name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) . "\">" . $codigobar_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigobar_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-codigobar_<?php echo $sc_seq_vert ?> css_codigobar__line" style="<?php echo $sStyleReadLab_codigobar_; ?>"><?php echo $this->form_format_readonly("codigobar_", $this->form_encode_input($this->codigobar_)); ?></span><span id="id_read_off_codigobar_<?php echo $sc_seq_vert ?>" class="css_read_off_codigobar_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigobar_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_codigobar__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigobar_<?php echo $sc_seq_vert ?>" type=text name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['presentacion_']) && $this->nmgp_cmp_hidden['presentacion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="presentacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($presentacion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_presentacion__line" id="hidden_field_data_presentacion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_presentacion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_presentacion__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="presentacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($presentacion_); ?>"><span id="id_ajax_label_presentacion_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($presentacion_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_presentacion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_presentacion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cantidad__line" id="hidden_field_data_cantidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cantidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_cantidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cantidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad_"]) &&  $this->nmgp_cmp_readonly["cantidad_"] == "on") { 

 ?>
<input type="hidden" name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) . "\">" . $cantidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cantidad_<?php echo $sc_seq_vert ?> css_cantidad__line" style="<?php echo $sStyleReadLab_cantidad_; ?>"><?php echo $this->form_format_readonly("cantidad_", $this->form_encode_input($this->cantidad_)); ?></span><span id="id_read_off_cantidad_<?php echo $sc_seq_vert ?>" class="css_read_off_cantidad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cantidad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidad_<?php echo $sc_seq_vert ?>" type=text name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_stock__line" id="hidden_field_data_stock_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_stock_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_stock__line" style="padding: 0px"><input type="hidden" name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_); ?>"><span id="id_ajax_label_stock_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($stock_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stock_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stock_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_producto_))
       {
           $this->nmgp_cmp_readonly['producto_'] = $sCheckRead_producto_;
       }
       if ('display: none;' == $sStyleHidden_producto_)
       {
           $this->nmgp_cmp_hidden['producto_'] = 'off';
       }
       if (isset($sCheckRead_colores_))
       {
           $this->nmgp_cmp_readonly['colores_'] = $sCheckRead_colores_;
       }
       if ('display: none;' == $sStyleHidden_colores_)
       {
           $this->nmgp_cmp_hidden['colores_'] = 'off';
       }
       if (isset($sCheckRead_tallas_))
       {
           $this->nmgp_cmp_readonly['tallas_'] = $sCheckRead_tallas_;
       }
       if ('display: none;' == $sStyleHidden_tallas_)
       {
           $this->nmgp_cmp_hidden['tallas_'] = 'off';
       }
       if (isset($sCheckRead_sabor_))
       {
           $this->nmgp_cmp_readonly['sabor_'] = $sCheckRead_sabor_;
       }
       if ('display: none;' == $sStyleHidden_sabor_)
       {
           $this->nmgp_cmp_hidden['sabor_'] = 'off';
       }
       if (isset($sCheckRead_destino_))
       {
           $this->nmgp_cmp_readonly['destino_'] = $sCheckRead_destino_;
       }
       if ('display: none;' == $sStyleHidden_destino_)
       {
           $this->nmgp_cmp_hidden['destino_'] = 'off';
       }
       if (isset($sCheckRead_fechavenc_))
       {
           $this->nmgp_cmp_readonly['fechavenc_'] = $sCheckRead_fechavenc_;
       }
       if ('display: none;' == $sStyleHidden_fechavenc_)
       {
           $this->nmgp_cmp_hidden['fechavenc_'] = 'off';
       }
       if (isset($sCheckRead_lote_))
       {
           $this->nmgp_cmp_readonly['lote_'] = $sCheckRead_lote_;
       }
       if ('display: none;' == $sStyleHidden_lote_)
       {
           $this->nmgp_cmp_hidden['lote_'] = 'off';
       }
       if (isset($sCheckRead_codigobar_))
       {
           $this->nmgp_cmp_readonly['codigobar_'] = $sCheckRead_codigobar_;
       }
       if ('display: none;' == $sStyleHidden_codigobar_)
       {
           $this->nmgp_cmp_hidden['codigobar_'] = 'off';
       }
       if (isset($sCheckRead_presentacion_))
       {
           $this->nmgp_cmp_readonly['presentacion_'] = $sCheckRead_presentacion_;
       }
       if ('display: none;' == $sStyleHidden_presentacion_)
       {
           $this->nmgp_cmp_hidden['presentacion_'] = 'off';
       }
       if (isset($sCheckRead_cantidad_))
       {
           $this->nmgp_cmp_readonly['cantidad_'] = $sCheckRead_cantidad_;
       }
       if ('display: none;' == $sStyleHidden_cantidad_)
       {
           $this->nmgp_cmp_hidden['cantidad_'] = 'off';
       }
       if (isset($sCheckRead_stock_))
       {
           $this->nmgp_cmp_readonly['stock_'] = $sCheckRead_stock_;
       }
       if ('display: none;' == $sStyleHidden_stock_)
       {
           $this->nmgp_cmp_hidden['stock_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detallenotamov_200421 = $guarda_form_vert_form_detallenotamov_200421;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '100') ? " selected" : "";
?> 
           <option value="100" <?php echo $obj_sel ?>>100</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['back'];
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

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
   </td></tr></table>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detallenotamov_200421");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detallenotamov_200421");
 parent.scAjaxDetailHeight("form_detallenotamov_200421", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detallenotamov_200421", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detallenotamov_200421", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['sc_modal'])
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
			do_ajax_form_detallenotamov_200421_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
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
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-6").length && $("#sc_b_del_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-6").hasClass("disabled")) {
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
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
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
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-14").length && $("#sc_b_avc_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-15").length && $("#sc_b_fim_b.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenotamov_200421']['buttonStatus'] = $this->nmgp_botoes;
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
<?php 
 } 
} 
?> 
