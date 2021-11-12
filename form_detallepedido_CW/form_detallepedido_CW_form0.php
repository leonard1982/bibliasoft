<?php
class form_detallepedido_CW_form extends form_detallepedido_CW_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Detalle venta"); } else { echo strip_tags("Detalle venta"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['sc_redir_atualiz'] == 'ok')
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
.css_read_off_hora_inicio_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_hora_final_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detallepedido_CW/form_detallepedido_CW_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detallepedido_CW_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "idpro_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "idpro_" + ii + "_autocomp";
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
            cmp_name = "idpro_" + ii + "_autocomp_cap";
            $('input[id=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('#' + cmp_name).hide();
            }
            else {
                $('#' + cmp_name).show();
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("idpro_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_detallepedido_CW_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('cod_barras_1');

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

  var iSeq_idpro_ = $(".sc-ui-autocomp-idpro_", elem).attr("id").substr(12);

  $(".sc-ui-autocomp-idpro_", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "idpro_" != sId ? sId.substr(6) : "";
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
    url: "form_detallepedido_CW.php",
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
      nmgp_parms: "NM_ajax_opcao?#?autocomp_idpro_",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "idpro_" != sId ? sId.substr(6) : "";
   sc_form_detallepedido_CW_idpro__onfocus("id_sc_field_" + sId, sRow);
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
 include_once("form_detallepedido_CW_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
$_SESSION['scriptcase']['error_span_title']['form_detallepedido_CW'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detallepedido_CW'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php echo "Venta N°: " . $_SESSION['numventa'] . "" ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R")
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['balterarsel'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['bexcluirsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['bexcluirsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['bexcluirsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['bexcluirsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['bexcluirsel'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['iddet_']))
   {
       $this->nmgp_cmp_hidden['iddet_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unidadmayor_']))
   {
       $this->nmgp_cmp_hidden['unidadmayor_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['factor_']))
   {
       $this->nmgp_cmp_hidden['factor_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['costop_']))
   {
       $this->nmgp_cmp_hidden['costop_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['adicional_']))
   {
       $this->nmgp_cmp_hidden['adicional_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['adicional1_']))
   {
       $this->nmgp_cmp_hidden['adicional1_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['stockubica_']))
   {
       $this->nmgp_cmp_hidden['stockubica_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['unidad_']))
   {
       $this->nmgp_cmp_hidden['unidad_'] = 'off';
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
   <?php if ((!isset($this->nmgp_cmp_hidden['iddet_']) || $this->nmgp_cmp_hidden['iddet_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['iddet_'])) {
          $this->nm_new_label['iddet_'] = "Iddet"; } ?>

    <TD class="scFormLabelOddMult css_iddet__label" id="hidden_field_label_iddet_" style="<?php echo $sStyleHidden_iddet_; ?>" > <?php echo $this->nm_new_label['iddet_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cod_barras_']) && $this->nmgp_cmp_hidden['cod_barras_'] == 'off') { $sStyleHidden_cod_barras_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cod_barras_']) || $this->nmgp_cmp_hidden['cod_barras_'] == 'on') {
      if (!isset($this->nm_new_label['cod_barras_'])) {
          $this->nm_new_label['cod_barras_'] = "Código de barras"; } ?>

    <TD class="scFormLabelOddMult css_cod_barras__label" id="hidden_field_label_cod_barras_" style="<?php echo $sStyleHidden_cod_barras_; ?>" > <?php echo $this->nm_new_label['cod_barras_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idpro_']) && $this->nmgp_cmp_hidden['idpro_'] == 'off') { $sStyleHidden_idpro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idpro_']) || $this->nmgp_cmp_hidden['idpro_'] == 'on') {
      if (!isset($this->nm_new_label['idpro_'])) {
          $this->nm_new_label['idpro_'] = "Artículo"; } ?>

    <TD class="scFormLabelOddMult css_idpro__label" id="hidden_field_label_idpro_" style="<?php echo $sStyleHidden_idpro_; ?>" > <?php echo $this->nm_new_label['idpro_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['colores_']) && $this->nmgp_cmp_hidden['colores_'] == 'off') { $sStyleHidden_colores_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['colores_']) || $this->nmgp_cmp_hidden['colores_'] == 'on') {
      if (!isset($this->nm_new_label['colores_'])) {
          $this->nm_new_label['colores_'] = "Color"; } ?>

    <TD class="scFormLabelOddMult css_colores__label" id="hidden_field_label_colores_" style="<?php echo $sStyleHidden_colores_; ?>" > <?php echo $this->nm_new_label['colores_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tallas_']) && $this->nmgp_cmp_hidden['tallas_'] == 'off') { $sStyleHidden_tallas_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tallas_']) || $this->nmgp_cmp_hidden['tallas_'] == 'on') {
      if (!isset($this->nm_new_label['tallas_'])) {
          $this->nm_new_label['tallas_'] = "Talla"; } ?>

    <TD class="scFormLabelOddMult css_tallas__label" id="hidden_field_label_tallas_" style="<?php echo $sStyleHidden_tallas_; ?>" > <?php echo $this->nm_new_label['tallas_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sabor_']) && $this->nmgp_cmp_hidden['sabor_'] == 'off') { $sStyleHidden_sabor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sabor_']) || $this->nmgp_cmp_hidden['sabor_'] == 'on') {
      if (!isset($this->nm_new_label['sabor_'])) {
          $this->nm_new_label['sabor_'] = "Sabor"; } ?>

    <TD class="scFormLabelOddMult css_sabor__label" id="hidden_field_label_sabor_" style="<?php echo $sStyleHidden_sabor_; ?>" > <?php echo $this->nm_new_label['sabor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idbod_']) && $this->nmgp_cmp_hidden['idbod_'] == 'off') { $sStyleHidden_idbod_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idbod_']) || $this->nmgp_cmp_hidden['idbod_'] == 'on') {
      if (!isset($this->nm_new_label['idbod_'])) {
          $this->nm_new_label['idbod_'] = "Pista"; } ?>

    <TD class="scFormLabelOddMult css_idbod__label" id="hidden_field_label_idbod_" style="<?php echo $sStyleHidden_idbod_; ?>" > <span class="scFormRequiredOddMult">*</span> <?php echo $this->nm_new_label['idbod_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['observ_']) && $this->nmgp_cmp_hidden['observ_'] == 'off') { $sStyleHidden_observ_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['observ_']) || $this->nmgp_cmp_hidden['observ_'] == 'on') {
      if (!isset($this->nm_new_label['observ_'])) {
          $this->nm_new_label['observ_'] = "N° Recibo"; } ?>

    <TD class="scFormLabelOddMult css_observ__label" id="hidden_field_label_observ_" style="<?php echo $sStyleHidden_observ_; ?>" > <span class="scFormRequiredOddMult">*</span> <?php echo $this->nm_new_label['observ_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['unidadmayor_']) && $this->nmgp_cmp_hidden['unidadmayor_'] == 'off') { $sStyleHidden_unidadmayor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['unidadmayor_']) || $this->nmgp_cmp_hidden['unidadmayor_'] == 'on') {
      if (!isset($this->nm_new_label['unidadmayor_'])) {
          $this->nm_new_label['unidadmayor_'] = "Unidad Mayor"; } ?>

    <TD class="scFormLabelOddMult css_unidadmayor__label" id="hidden_field_label_unidadmayor_" style="<?php echo $sStyleHidden_unidadmayor_; ?>" > <?php echo $this->nm_new_label['unidadmayor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['stockubica_']) && $this->nmgp_cmp_hidden['stockubica_'] == 'off') { $sStyleHidden_stockubica_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['stockubica_']) || $this->nmgp_cmp_hidden['stockubica_'] == 'on') {
      if (!isset($this->nm_new_label['stockubica_'])) {
          $this->nm_new_label['stockubica_'] = "Stock Ubicación"; } ?>

    <TD class="scFormLabelOddMult css_stockubica__label" id="hidden_field_label_stockubica_" style="<?php echo $sStyleHidden_stockubica_; ?>" > <?php echo $this->nm_new_label['stockubica_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off') { $sStyleHidden_unidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['unidad_']) || $this->nmgp_cmp_hidden['unidad_'] == 'on') {
      if (!isset($this->nm_new_label['unidad_'])) {
          $this->nm_new_label['unidad_'] = "Unidad"; } ?>

    <TD class="scFormLabelOddMult css_unidad__label" id="hidden_field_label_unidad_" style="<?php echo $sStyleHidden_unidad_; ?>" > <?php echo $this->nm_new_label['unidad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sStyleHidden_cantidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cantidad_']) || $this->nmgp_cmp_hidden['cantidad_'] == 'on') {
      if (!isset($this->nm_new_label['cantidad_'])) {
          $this->nm_new_label['cantidad_'] = "Cantidad"; } ?>

    <TD class="scFormLabelOddMult css_cantidad__label" id="hidden_field_label_cantidad_" style="<?php echo $sStyleHidden_cantidad_; ?>" > <?php echo $this->nm_new_label['cantidad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valorunit_']) && $this->nmgp_cmp_hidden['valorunit_'] == 'off') { $sStyleHidden_valorunit_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valorunit_']) || $this->nmgp_cmp_hidden['valorunit_'] == 'on') {
      if (!isset($this->nm_new_label['valorunit_'])) {
          $this->nm_new_label['valorunit_'] = "Valor unit."; } ?>

    <TD class="scFormLabelOddMult css_valorunit__label" id="hidden_field_label_valorunit_" style="<?php echo $sStyleHidden_valorunit_; ?>" > <?php echo $this->nm_new_label['valorunit_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['valorpar_']) && $this->nmgp_cmp_hidden['valorpar_'] == 'off') { $sStyleHidden_valorpar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valorpar_']) || $this->nmgp_cmp_hidden['valorpar_'] == 'on') {
      if (!isset($this->nm_new_label['valorpar_'])) {
          $this->nm_new_label['valorpar_'] = "Valor parcial"; } ?>

    <TD class="scFormLabelOddMult css_valorpar__label" id="hidden_field_label_valorpar_" style="<?php echo $sStyleHidden_valorpar_; ?>" > <?php echo $this->nm_new_label['valorpar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descuento_']) && $this->nmgp_cmp_hidden['descuento_'] == 'off') { $sStyleHidden_descuento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descuento_']) || $this->nmgp_cmp_hidden['descuento_'] == 'on') {
      if (!isset($this->nm_new_label['descuento_'])) {
          $this->nm_new_label['descuento_'] = "Descuento"; } ?>

    <TD class="scFormLabelOddMult css_descuento__label" id="hidden_field_label_descuento_" style="<?php echo $sStyleHidden_descuento_; ?>" > <?php echo $this->nm_new_label['descuento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['adicional_']) && $this->nmgp_cmp_hidden['adicional_'] == 'off') { $sStyleHidden_adicional_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['adicional_']) || $this->nmgp_cmp_hidden['adicional_'] == 'on') {
      if (!isset($this->nm_new_label['adicional_'])) {
          $this->nm_new_label['adicional_'] = "Tasa de IVA"; } ?>

    <TD class="scFormLabelOddMult css_adicional__label" id="hidden_field_label_adicional_" style="<?php echo $sStyleHidden_adicional_; ?>" > <?php echo $this->nm_new_label['adicional_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['adicional1_']) && $this->nmgp_cmp_hidden['adicional1_'] == 'off') { $sStyleHidden_adicional1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['adicional1_']) || $this->nmgp_cmp_hidden['adicional1_'] == 'on') {
      if (!isset($this->nm_new_label['adicional1_'])) {
          $this->nm_new_label['adicional1_'] = "Tasa de descuento"; } ?>

    <TD class="scFormLabelOddMult css_adicional1__label" id="hidden_field_label_adicional1_" style="<?php echo $sStyleHidden_adicional1_; ?>" > <?php echo $this->nm_new_label['adicional1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['factor_']) && $this->nmgp_cmp_hidden['factor_'] == 'off') { $sStyleHidden_factor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['factor_']) || $this->nmgp_cmp_hidden['factor_'] == 'on') {
      if (!isset($this->nm_new_label['factor_'])) {
          $this->nm_new_label['factor_'] = "Factor"; } ?>

    <TD class="scFormLabelOddMult css_factor__label" id="hidden_field_label_factor_" style="<?php echo $sStyleHidden_factor_; ?>" > <?php echo $this->nm_new_label['factor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['iva_']) && $this->nmgp_cmp_hidden['iva_'] == 'off') { $sStyleHidden_iva_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['iva_']) || $this->nmgp_cmp_hidden['iva_'] == 'on') {
      if (!isset($this->nm_new_label['iva_'])) {
          $this->nm_new_label['iva_'] = "Iva"; } ?>

    <TD class="scFormLabelOddMult css_iva__label" id="hidden_field_label_iva_" style="<?php echo $sStyleHidden_iva_; ?>" > <?php echo $this->nm_new_label['iva_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['costop_']) && $this->nmgp_cmp_hidden['costop_'] == 'off') { $sStyleHidden_costop_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['costop_']) || $this->nmgp_cmp_hidden['costop_'] == 'on') {
      if (!isset($this->nm_new_label['costop_'])) {
          $this->nm_new_label['costop_'] = "Costop"; } ?>

    <TD class="scFormLabelOddMult css_costop__label" id="hidden_field_label_costop_" style="<?php echo $sStyleHidden_costop_; ?>" > <?php echo $this->nm_new_label['costop_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_detallepedido_CW);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detallepedido_CW = $this->form_vert_form_detallepedido_CW;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detallepedido_CW))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['iddet_']))
           {
               $this->nmgp_cmp_readonly['iddet_'] = 'on';
           }
   foreach ($this->form_vert_form_detallepedido_CW as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idpedid_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['idpedid_'];
       $this->numfac_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['numfac_'];
       $this->remision_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['remision_'];
       $this->devuelto_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['devuelto_'];
       $this->estado_comanda_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['estado_comanda_'];
       $this->usuario_comanda_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['usuario_comanda_'];
       $this->tercero_comanda_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['tercero_comanda_'];
       $this->hora_inicio_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['hora_inicio_'];
       $this->hora_final_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['hora_final_'];
       $this->cerrado_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['cerrado_'];
       $this->codbarra_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['codbarra_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['iddet_'] = true;
           $this->nmgp_cmp_readonly['cod_barras_'] = true;
           $this->nmgp_cmp_readonly['idpro_'] = true;
           $this->nmgp_cmp_readonly['colores_'] = true;
           $this->nmgp_cmp_readonly['tallas_'] = true;
           $this->nmgp_cmp_readonly['sabor_'] = true;
           $this->nmgp_cmp_readonly['idbod_'] = true;
           $this->nmgp_cmp_readonly['observ_'] = true;
           $this->nmgp_cmp_readonly['unidadmayor_'] = true;
           $this->nmgp_cmp_readonly['stockubica_'] = true;
           $this->nmgp_cmp_readonly['unidad_'] = true;
           $this->nmgp_cmp_readonly['cantidad_'] = true;
           $this->nmgp_cmp_readonly['valorunit_'] = true;
           $this->nmgp_cmp_readonly['valorpar_'] = true;
           $this->nmgp_cmp_readonly['descuento_'] = true;
           $this->nmgp_cmp_readonly['adicional_'] = true;
           $this->nmgp_cmp_readonly['adicional1_'] = true;
           $this->nmgp_cmp_readonly['factor_'] = true;
           $this->nmgp_cmp_readonly['iva_'] = true;
           $this->nmgp_cmp_readonly['costop_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['iddet_']) || $this->nmgp_cmp_readonly['iddet_'] != "on") {$this->nmgp_cmp_readonly['iddet_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cod_barras_']) || $this->nmgp_cmp_readonly['cod_barras_'] != "on") {$this->nmgp_cmp_readonly['cod_barras_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idpro_']) || $this->nmgp_cmp_readonly['idpro_'] != "on") {$this->nmgp_cmp_readonly['idpro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['colores_']) || $this->nmgp_cmp_readonly['colores_'] != "on") {$this->nmgp_cmp_readonly['colores_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tallas_']) || $this->nmgp_cmp_readonly['tallas_'] != "on") {$this->nmgp_cmp_readonly['tallas_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sabor_']) || $this->nmgp_cmp_readonly['sabor_'] != "on") {$this->nmgp_cmp_readonly['sabor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idbod_']) || $this->nmgp_cmp_readonly['idbod_'] != "on") {$this->nmgp_cmp_readonly['idbod_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['observ_']) || $this->nmgp_cmp_readonly['observ_'] != "on") {$this->nmgp_cmp_readonly['observ_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['unidadmayor_']) || $this->nmgp_cmp_readonly['unidadmayor_'] != "on") {$this->nmgp_cmp_readonly['unidadmayor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['stockubica_']) || $this->nmgp_cmp_readonly['stockubica_'] != "on") {$this->nmgp_cmp_readonly['stockubica_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['unidad_']) || $this->nmgp_cmp_readonly['unidad_'] != "on") {$this->nmgp_cmp_readonly['unidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cantidad_']) || $this->nmgp_cmp_readonly['cantidad_'] != "on") {$this->nmgp_cmp_readonly['cantidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valorunit_']) || $this->nmgp_cmp_readonly['valorunit_'] != "on") {$this->nmgp_cmp_readonly['valorunit_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valorpar_']) || $this->nmgp_cmp_readonly['valorpar_'] != "on") {$this->nmgp_cmp_readonly['valorpar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descuento_']) || $this->nmgp_cmp_readonly['descuento_'] != "on") {$this->nmgp_cmp_readonly['descuento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['adicional_']) || $this->nmgp_cmp_readonly['adicional_'] != "on") {$this->nmgp_cmp_readonly['adicional_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['adicional1_']) || $this->nmgp_cmp_readonly['adicional1_'] != "on") {$this->nmgp_cmp_readonly['adicional1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['factor_']) || $this->nmgp_cmp_readonly['factor_'] != "on") {$this->nmgp_cmp_readonly['factor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['iva_']) || $this->nmgp_cmp_readonly['iva_'] != "on") {$this->nmgp_cmp_readonly['iva_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['costop_']) || $this->nmgp_cmp_readonly['costop_'] != "on") {$this->nmgp_cmp_readonly['costop_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->iddet_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['iddet_']; 
       $iddet_ = $this->iddet_; 
       if (!isset($this->nmgp_cmp_hidden['iddet_']))
       {
           $this->nmgp_cmp_hidden['iddet_'] = 'off';
       }
       $sStyleHidden_iddet_ = '';
       if (isset($sCheckRead_iddet_))
       {
           unset($sCheckRead_iddet_);
       }
       if (isset($this->nmgp_cmp_readonly['iddet_']))
       {
           $sCheckRead_iddet_ = $this->nmgp_cmp_readonly['iddet_'];
       }
       if (isset($this->nmgp_cmp_hidden['iddet_']) && $this->nmgp_cmp_hidden['iddet_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['iddet_']);
           $sStyleHidden_iddet_ = 'display: none;';
       }
       $bTestReadOnly_iddet_ = true;
       $sStyleReadLab_iddet_ = 'display: none;';
       $sStyleReadInp_iddet_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["iddet_"]) &&  $this->nmgp_cmp_readonly["iddet_"] == "on"))
       {
           $bTestReadOnly_iddet_ = false;
           unset($this->nmgp_cmp_readonly['iddet_']);
           $sStyleReadLab_iddet_ = '';
           $sStyleReadInp_iddet_ = 'display: none;';
       }
       $this->cod_barras_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['cod_barras_']; 
       $cod_barras_ = $this->cod_barras_; 
       $sStyleHidden_cod_barras_ = '';
       if (isset($sCheckRead_cod_barras_))
       {
           unset($sCheckRead_cod_barras_);
       }
       if (isset($this->nmgp_cmp_readonly['cod_barras_']))
       {
           $sCheckRead_cod_barras_ = $this->nmgp_cmp_readonly['cod_barras_'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_barras_']) && $this->nmgp_cmp_hidden['cod_barras_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_barras_']);
           $sStyleHidden_cod_barras_ = 'display: none;';
       }
       $bTestReadOnly_cod_barras_ = true;
       $sStyleReadLab_cod_barras_ = 'display: none;';
       $sStyleReadInp_cod_barras_ = '';
       if (isset($this->nmgp_cmp_readonly['cod_barras_']) && $this->nmgp_cmp_readonly['cod_barras_'] == 'on')
       {
           $bTestReadOnly_cod_barras_ = false;
           unset($this->nmgp_cmp_readonly['cod_barras_']);
           $sStyleReadLab_cod_barras_ = '';
           $sStyleReadInp_cod_barras_ = 'display: none;';
       }
       $this->idpro_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['idpro_']; 
       $idpro_ = $this->idpro_; 
       $sStyleHidden_idpro_ = '';
       if (isset($sCheckRead_idpro_))
       {
           unset($sCheckRead_idpro_);
       }
       if (isset($this->nmgp_cmp_readonly['idpro_']))
       {
           $sCheckRead_idpro_ = $this->nmgp_cmp_readonly['idpro_'];
       }
       if (isset($this->nmgp_cmp_hidden['idpro_']) && $this->nmgp_cmp_hidden['idpro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idpro_']);
           $sStyleHidden_idpro_ = 'display: none;';
       }
       $bTestReadOnly_idpro_ = true;
       $sStyleReadLab_idpro_ = 'display: none;';
       $sStyleReadInp_idpro_ = '';
       if (isset($this->nmgp_cmp_readonly['idpro_']) && $this->nmgp_cmp_readonly['idpro_'] == 'on')
       {
           $bTestReadOnly_idpro_ = false;
           unset($this->nmgp_cmp_readonly['idpro_']);
           $sStyleReadLab_idpro_ = '';
           $sStyleReadInp_idpro_ = 'display: none;';
       }
       $this->colores_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['colores_']; 
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
       $this->tallas_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['tallas_']; 
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
       $this->sabor_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['sabor_']; 
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
       $this->idbod_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['idbod_']; 
       $idbod_ = $this->idbod_; 
       $sStyleHidden_idbod_ = '';
       if (isset($sCheckRead_idbod_))
       {
           unset($sCheckRead_idbod_);
       }
       if (isset($this->nmgp_cmp_readonly['idbod_']))
       {
           $sCheckRead_idbod_ = $this->nmgp_cmp_readonly['idbod_'];
       }
       if (isset($this->nmgp_cmp_hidden['idbod_']) && $this->nmgp_cmp_hidden['idbod_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idbod_']);
           $sStyleHidden_idbod_ = 'display: none;';
       }
       $bTestReadOnly_idbod_ = true;
       $sStyleReadLab_idbod_ = 'display: none;';
       $sStyleReadInp_idbod_ = '';
       if (isset($this->nmgp_cmp_readonly['idbod_']) && $this->nmgp_cmp_readonly['idbod_'] == 'on')
       {
           $bTestReadOnly_idbod_ = false;
           unset($this->nmgp_cmp_readonly['idbod_']);
           $sStyleReadLab_idbod_ = '';
           $sStyleReadInp_idbod_ = 'display: none;';
       }
       $this->observ_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['observ_']; 
       $observ_ = $this->observ_; 
       $sStyleHidden_observ_ = '';
       if (isset($sCheckRead_observ_))
       {
           unset($sCheckRead_observ_);
       }
       if (isset($this->nmgp_cmp_readonly['observ_']))
       {
           $sCheckRead_observ_ = $this->nmgp_cmp_readonly['observ_'];
       }
       if (isset($this->nmgp_cmp_hidden['observ_']) && $this->nmgp_cmp_hidden['observ_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['observ_']);
           $sStyleHidden_observ_ = 'display: none;';
       }
       $bTestReadOnly_observ_ = true;
       $sStyleReadLab_observ_ = 'display: none;';
       $sStyleReadInp_observ_ = '';
       if (isset($this->nmgp_cmp_readonly['observ_']) && $this->nmgp_cmp_readonly['observ_'] == 'on')
       {
           $bTestReadOnly_observ_ = false;
           unset($this->nmgp_cmp_readonly['observ_']);
           $sStyleReadLab_observ_ = '';
           $sStyleReadInp_observ_ = 'display: none;';
       }
       $this->unidadmayor_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['unidadmayor_']; 
       $unidadmayor_ = $this->unidadmayor_; 
       if (!isset($this->nmgp_cmp_hidden['unidadmayor_']))
       {
           $this->nmgp_cmp_hidden['unidadmayor_'] = 'off';
       }
       $sStyleHidden_unidadmayor_ = '';
       if (isset($sCheckRead_unidadmayor_))
       {
           unset($sCheckRead_unidadmayor_);
       }
       if (isset($this->nmgp_cmp_readonly['unidadmayor_']))
       {
           $sCheckRead_unidadmayor_ = $this->nmgp_cmp_readonly['unidadmayor_'];
       }
       if (isset($this->nmgp_cmp_hidden['unidadmayor_']) && $this->nmgp_cmp_hidden['unidadmayor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['unidadmayor_']);
           $sStyleHidden_unidadmayor_ = 'display: none;';
       }
       $bTestReadOnly_unidadmayor_ = true;
       $sStyleReadLab_unidadmayor_ = 'display: none;';
       $sStyleReadInp_unidadmayor_ = '';
       if (isset($this->nmgp_cmp_readonly['unidadmayor_']) && $this->nmgp_cmp_readonly['unidadmayor_'] == 'on')
       {
           $bTestReadOnly_unidadmayor_ = false;
           unset($this->nmgp_cmp_readonly['unidadmayor_']);
           $sStyleReadLab_unidadmayor_ = '';
           $sStyleReadInp_unidadmayor_ = 'display: none;';
       }
       $this->stockubica_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['stockubica_']; 
       $stockubica_ = $this->stockubica_; 
       if (!isset($this->nmgp_cmp_hidden['stockubica_']))
       {
           $this->nmgp_cmp_hidden['stockubica_'] = 'off';
       }
       $sStyleHidden_stockubica_ = '';
       if (isset($sCheckRead_stockubica_))
       {
           unset($sCheckRead_stockubica_);
       }
       if (isset($this->nmgp_cmp_readonly['stockubica_']))
       {
           $sCheckRead_stockubica_ = $this->nmgp_cmp_readonly['stockubica_'];
       }
       if (isset($this->nmgp_cmp_hidden['stockubica_']) && $this->nmgp_cmp_hidden['stockubica_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['stockubica_']);
           $sStyleHidden_stockubica_ = 'display: none;';
       }
       $bTestReadOnly_stockubica_ = true;
       $sStyleReadLab_stockubica_ = 'display: none;';
       $sStyleReadInp_stockubica_ = '';
       if (isset($this->nmgp_cmp_readonly['stockubica_']) && $this->nmgp_cmp_readonly['stockubica_'] == 'on')
       {
           $bTestReadOnly_stockubica_ = false;
           unset($this->nmgp_cmp_readonly['stockubica_']);
           $sStyleReadLab_stockubica_ = '';
           $sStyleReadInp_stockubica_ = 'display: none;';
       }
       $this->unidad_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['unidad_']; 
       $unidad_ = $this->unidad_; 
       if (!isset($this->nmgp_cmp_hidden['unidad_']))
       {
           $this->nmgp_cmp_hidden['unidad_'] = 'off';
       }
       $sStyleHidden_unidad_ = '';
       if (isset($sCheckRead_unidad_))
       {
           unset($sCheckRead_unidad_);
       }
       if (isset($this->nmgp_cmp_readonly['unidad_']))
       {
           $sCheckRead_unidad_ = $this->nmgp_cmp_readonly['unidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['unidad_']);
           $sStyleHidden_unidad_ = 'display: none;';
       }
       $bTestReadOnly_unidad_ = true;
       $sStyleReadLab_unidad_ = 'display: none;';
       $sStyleReadInp_unidad_ = '';
       if (isset($this->nmgp_cmp_readonly['unidad_']) && $this->nmgp_cmp_readonly['unidad_'] == 'on')
       {
           $bTestReadOnly_unidad_ = false;
           unset($this->nmgp_cmp_readonly['unidad_']);
           $sStyleReadLab_unidad_ = '';
           $sStyleReadInp_unidad_ = 'display: none;';
       }
       $this->cantidad_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['cantidad_']; 
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
       $this->valorunit_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['valorunit_']; 
       $valorunit_ = $this->valorunit_; 
       $sStyleHidden_valorunit_ = '';
       if (isset($sCheckRead_valorunit_))
       {
           unset($sCheckRead_valorunit_);
       }
       if (isset($this->nmgp_cmp_readonly['valorunit_']))
       {
           $sCheckRead_valorunit_ = $this->nmgp_cmp_readonly['valorunit_'];
       }
       if (isset($this->nmgp_cmp_hidden['valorunit_']) && $this->nmgp_cmp_hidden['valorunit_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valorunit_']);
           $sStyleHidden_valorunit_ = 'display: none;';
       }
       $bTestReadOnly_valorunit_ = true;
       $sStyleReadLab_valorunit_ = 'display: none;';
       $sStyleReadInp_valorunit_ = '';
       if (isset($this->nmgp_cmp_readonly['valorunit_']) && $this->nmgp_cmp_readonly['valorunit_'] == 'on')
       {
           $bTestReadOnly_valorunit_ = false;
           unset($this->nmgp_cmp_readonly['valorunit_']);
           $sStyleReadLab_valorunit_ = '';
           $sStyleReadInp_valorunit_ = 'display: none;';
       }
       $this->valorpar_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['valorpar_']; 
       $valorpar_ = $this->valorpar_; 
       $sStyleHidden_valorpar_ = '';
       if (isset($sCheckRead_valorpar_))
       {
           unset($sCheckRead_valorpar_);
       }
       if (isset($this->nmgp_cmp_readonly['valorpar_']))
       {
           $sCheckRead_valorpar_ = $this->nmgp_cmp_readonly['valorpar_'];
       }
       if (isset($this->nmgp_cmp_hidden['valorpar_']) && $this->nmgp_cmp_hidden['valorpar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valorpar_']);
           $sStyleHidden_valorpar_ = 'display: none;';
       }
       $bTestReadOnly_valorpar_ = true;
       $sStyleReadLab_valorpar_ = 'display: none;';
       $sStyleReadInp_valorpar_ = '';
       if (isset($this->nmgp_cmp_readonly['valorpar_']) && $this->nmgp_cmp_readonly['valorpar_'] == 'on')
       {
           $bTestReadOnly_valorpar_ = false;
           unset($this->nmgp_cmp_readonly['valorpar_']);
           $sStyleReadLab_valorpar_ = '';
           $sStyleReadInp_valorpar_ = 'display: none;';
       }
       $this->descuento_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['descuento_']; 
       $descuento_ = $this->descuento_; 
       $sStyleHidden_descuento_ = '';
       if (isset($sCheckRead_descuento_))
       {
           unset($sCheckRead_descuento_);
       }
       if (isset($this->nmgp_cmp_readonly['descuento_']))
       {
           $sCheckRead_descuento_ = $this->nmgp_cmp_readonly['descuento_'];
       }
       if (isset($this->nmgp_cmp_hidden['descuento_']) && $this->nmgp_cmp_hidden['descuento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['descuento_']);
           $sStyleHidden_descuento_ = 'display: none;';
       }
       $bTestReadOnly_descuento_ = true;
       $sStyleReadLab_descuento_ = 'display: none;';
       $sStyleReadInp_descuento_ = '';
       if (isset($this->nmgp_cmp_readonly['descuento_']) && $this->nmgp_cmp_readonly['descuento_'] == 'on')
       {
           $bTestReadOnly_descuento_ = false;
           unset($this->nmgp_cmp_readonly['descuento_']);
           $sStyleReadLab_descuento_ = '';
           $sStyleReadInp_descuento_ = 'display: none;';
       }
       $this->adicional_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['adicional_']; 
       $adicional_ = $this->adicional_; 
       if (!isset($this->nmgp_cmp_hidden['adicional_']))
       {
           $this->nmgp_cmp_hidden['adicional_'] = 'off';
       }
       $sStyleHidden_adicional_ = '';
       if (isset($sCheckRead_adicional_))
       {
           unset($sCheckRead_adicional_);
       }
       if (isset($this->nmgp_cmp_readonly['adicional_']))
       {
           $sCheckRead_adicional_ = $this->nmgp_cmp_readonly['adicional_'];
       }
       if (isset($this->nmgp_cmp_hidden['adicional_']) && $this->nmgp_cmp_hidden['adicional_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['adicional_']);
           $sStyleHidden_adicional_ = 'display: none;';
       }
       $bTestReadOnly_adicional_ = true;
       $sStyleReadLab_adicional_ = 'display: none;';
       $sStyleReadInp_adicional_ = '';
       if (isset($this->nmgp_cmp_readonly['adicional_']) && $this->nmgp_cmp_readonly['adicional_'] == 'on')
       {
           $bTestReadOnly_adicional_ = false;
           unset($this->nmgp_cmp_readonly['adicional_']);
           $sStyleReadLab_adicional_ = '';
           $sStyleReadInp_adicional_ = 'display: none;';
       }
       $this->adicional1_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['adicional1_']; 
       $adicional1_ = $this->adicional1_; 
       if (!isset($this->nmgp_cmp_hidden['adicional1_']))
       {
           $this->nmgp_cmp_hidden['adicional1_'] = 'off';
       }
       $sStyleHidden_adicional1_ = '';
       if (isset($sCheckRead_adicional1_))
       {
           unset($sCheckRead_adicional1_);
       }
       if (isset($this->nmgp_cmp_readonly['adicional1_']))
       {
           $sCheckRead_adicional1_ = $this->nmgp_cmp_readonly['adicional1_'];
       }
       if (isset($this->nmgp_cmp_hidden['adicional1_']) && $this->nmgp_cmp_hidden['adicional1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['adicional1_']);
           $sStyleHidden_adicional1_ = 'display: none;';
       }
       $bTestReadOnly_adicional1_ = true;
       $sStyleReadLab_adicional1_ = 'display: none;';
       $sStyleReadInp_adicional1_ = '';
       if (isset($this->nmgp_cmp_readonly['adicional1_']) && $this->nmgp_cmp_readonly['adicional1_'] == 'on')
       {
           $bTestReadOnly_adicional1_ = false;
           unset($this->nmgp_cmp_readonly['adicional1_']);
           $sStyleReadLab_adicional1_ = '';
           $sStyleReadInp_adicional1_ = 'display: none;';
       }
       $this->factor_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['factor_']; 
       $factor_ = $this->factor_; 
       if (!isset($this->nmgp_cmp_hidden['factor_']))
       {
           $this->nmgp_cmp_hidden['factor_'] = 'off';
       }
       $sStyleHidden_factor_ = '';
       if (isset($sCheckRead_factor_))
       {
           unset($sCheckRead_factor_);
       }
       if (isset($this->nmgp_cmp_readonly['factor_']))
       {
           $sCheckRead_factor_ = $this->nmgp_cmp_readonly['factor_'];
       }
       if (isset($this->nmgp_cmp_hidden['factor_']) && $this->nmgp_cmp_hidden['factor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['factor_']);
           $sStyleHidden_factor_ = 'display: none;';
       }
       $bTestReadOnly_factor_ = true;
       $sStyleReadLab_factor_ = 'display: none;';
       $sStyleReadInp_factor_ = '';
       if (isset($this->nmgp_cmp_readonly['factor_']) && $this->nmgp_cmp_readonly['factor_'] == 'on')
       {
           $bTestReadOnly_factor_ = false;
           unset($this->nmgp_cmp_readonly['factor_']);
           $sStyleReadLab_factor_ = '';
           $sStyleReadInp_factor_ = 'display: none;';
       }
       $this->iva_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['iva_']; 
       $iva_ = $this->iva_; 
       $sStyleHidden_iva_ = '';
       if (isset($sCheckRead_iva_))
       {
           unset($sCheckRead_iva_);
       }
       if (isset($this->nmgp_cmp_readonly['iva_']))
       {
           $sCheckRead_iva_ = $this->nmgp_cmp_readonly['iva_'];
       }
       if (isset($this->nmgp_cmp_hidden['iva_']) && $this->nmgp_cmp_hidden['iva_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['iva_']);
           $sStyleHidden_iva_ = 'display: none;';
       }
       $bTestReadOnly_iva_ = true;
       $sStyleReadLab_iva_ = 'display: none;';
       $sStyleReadInp_iva_ = '';
       if (isset($this->nmgp_cmp_readonly['iva_']) && $this->nmgp_cmp_readonly['iva_'] == 'on')
       {
           $bTestReadOnly_iva_ = false;
           unset($this->nmgp_cmp_readonly['iva_']);
           $sStyleReadLab_iva_ = '';
           $sStyleReadInp_iva_ = 'display: none;';
       }
       $this->costop_ = $this->form_vert_form_detallepedido_CW[$sc_seq_vert]['costop_']; 
       $costop_ = $this->costop_; 
       if (!isset($this->nmgp_cmp_hidden['costop_']))
       {
           $this->nmgp_cmp_hidden['costop_'] = 'off';
       }
       $sStyleHidden_costop_ = '';
       if (isset($sCheckRead_costop_))
       {
           unset($sCheckRead_costop_);
       }
       if (isset($this->nmgp_cmp_readonly['costop_']))
       {
           $sCheckRead_costop_ = $this->nmgp_cmp_readonly['costop_'];
       }
       if (isset($this->nmgp_cmp_hidden['costop_']) && $this->nmgp_cmp_hidden['costop_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['costop_']);
           $sStyleHidden_costop_ = 'display: none;';
       }
       $bTestReadOnly_costop_ = true;
       $sStyleReadLab_costop_ = 'display: none;';
       $sStyleReadInp_costop_ = '';
       if (isset($this->nmgp_cmp_readonly['costop_']) && $this->nmgp_cmp_readonly['costop_'] == 'on')
       {
           $bTestReadOnly_costop_ = false;
           unset($this->nmgp_cmp_readonly['costop_']);
           $sStyleReadLab_costop_ = '';
           $sStyleReadInp_costop_ = 'display: none;';
       }

       $this->lookup_cod_barras_($look_rpc_cod_barras_);
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detallepedido_CW_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detallepedido_CW_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallepedido_CW_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detallepedido_CW_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallepedido_CW_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detallepedido_CW_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['iddet_']) && $this->nmgp_cmp_hidden['iddet_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iddet_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iddet_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_iddet__line" id="hidden_field_data_iddet_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_iddet_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_iddet__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_iddet_<?php echo $sc_seq_vert ?>" class="css_iddet__line" style="<?php echo $sStyleReadLab_iddet_; ?>"><?php echo $this->form_format_readonly("iddet_", $this->form_encode_input($this->iddet_)); ?></span><span id="id_read_off_iddet_<?php echo $sc_seq_vert ?>" class="css_read_off_iddet_" style="<?php echo $sStyleReadInp_iddet_; ?>"><input type="hidden" id="id_sc_field_iddet_<?php echo $sc_seq_vert ?>" name="iddet_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iddet_) . "\">"?>
<span id="id_ajax_label_iddet_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($iddet_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddet_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddet_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cod_barras_']) && $this->nmgp_cmp_hidden['cod_barras_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_barras_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_barras_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cod_barras__line" id="hidden_field_data_cod_barras_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_barras_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_cod_barras__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cod_barras_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_barras_"]) &&  $this->nmgp_cmp_readonly["cod_barras_"] == "on") { 

 ?>
<input type="hidden" name="cod_barras_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_barras_) . "\">" . $cod_barras_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_barras_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cod_barras_<?php echo $sc_seq_vert ?> css_cod_barras__line" style="<?php echo $sStyleReadLab_cod_barras_; ?>"><?php echo $this->form_format_readonly("cod_barras_", $this->form_encode_input($this->cod_barras_)); ?></span><span id="id_read_off_cod_barras_<?php echo $sc_seq_vert ?>" class="css_read_off_cod_barras_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_barras_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cod_barras__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_barras_<?php echo $sc_seq_vert ?>" type=text name="cod_barras_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_barras_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 <SPAN id="id_lookup_cod_barras_<?php echo $sc_seq_vert ?>"><?php echo $look_rpc_cod_barras_; ?></SPAN></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_barras_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_barras_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idpro_']) && $this->nmgp_cmp_hidden['idpro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idpro__line" id="hidden_field_data_idpro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idpro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idpro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idpro_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro_"]) &&  $this->nmgp_cmp_readonly["idpro_"] == "on") { 

 ?>
<input type="hidden" name="idpro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro_) . "\">" . $idpro_ . ""; ?>
<?php } else { ?>

<?php
$aRecData['idpro_'] = $this->idpro_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_'] = array(); 
    }

   $old_value_iddet_ = $this->iddet_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $this->nm_tira_formatacao();


   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }

   $this->iddet_ = $old_value_iddet_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;

   if ('' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'])
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro_])) ? $aLookup[0][$this->idpro_] : $this->idpro_;
$idpro__look = (isset($aLookup[0][$this->idpro_])) ? $aLookup[0][$this->idpro_] : $this->idpro_;
?>
<span id="id_read_on_idpro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idpro_<?php echo $sc_seq_vert ?> css_idpro__line" style="<?php echo $sStyleReadLab_idpro_; ?>"><?php echo $this->form_format_readonly("idpro_", str_replace("<", "&lt;", $idpro__look)); ?></span><span id="id_read_off_idpro_<?php echo $sc_seq_vert ?>" class="css_read_off_idpro_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idpro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idpro__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_idpro_<?php echo $sc_seq_vert ?>" type=text name="idpro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 style="display: none" alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['idpro_'] = $this->idpro_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_'] = array(); 
    }

   $old_value_iddet_ = $this->iddet_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $this->nm_tira_formatacao();


   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE (activo like 'SI') AND idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }

   $this->iddet_ = $old_value_iddet_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;

   if ('' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'])
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idpro_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->idpro_])) ? $aLookup[0][$this->idpro_] : '';
$idpro__look = (isset($aLookup[0][$this->idpro_])) ? $aLookup[0][$this->idpro_] : '';
?>
<select id="id_ac_idpro_<?php echo $sc_seq_vert; ?>" class="scFormObjectOddMult sc-ui-autocomp-idpro_ css_idpro__obj sc-js-input"><?php if ('' != $this->idpro_) { ?><option value="<?php echo $this->idpro_ ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['colores_']) && $this->nmgp_cmp_hidden['colores_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="colores_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->colores_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_colores__line" id="hidden_field_data_colores_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_colores_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_colores__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_colores_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["colores_"]) &&  $this->nmgp_cmp_readonly["colores_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_'] = array(); 
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_'] = array(); 
    }

   $old_value_iddet_ = $this->iddet_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $this->nm_tira_formatacao();


   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;

   $nm_comando = "SELECT f.idcol, c.color  FROM colorxproducto f left join colores c on f.idcol=c.idcolores where idpr=$this->idpro_ ORDER BY f.idcol";

   $this->iddet_ = $old_value_iddet_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_colores_'][] = '0'; 
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_'] = array(); 
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_'] = array(); 
    }

   $old_value_iddet_ = $this->iddet_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $this->nm_tira_formatacao();


   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas where idpr=$this->idpro_ ORDER BY f.idta";

   $this->iddet_ = $old_value_iddet_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_tallas_'][] = '0'; 
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_'] = array(); 
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_'] = array(); 
    }

   $old_value_iddet_ = $this->iddet_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $this->nm_tira_formatacao();


   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas where idpr=$this->idpro_ and tallasabor='S' ORDER BY f.idsa";

   $this->iddet_ = $old_value_iddet_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_sabor_'][] = '0'; 
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

   <?php if (isset($this->nmgp_cmp_hidden['idbod_']) && $this->nmgp_cmp_hidden['idbod_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idbod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idbod_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idbod__line" id="hidden_field_data_idbod_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idbod_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idbod__line" style="padding: 0px">
<?php if ($bTestReadOnly_idbod_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idbod_"]) &&  $this->nmgp_cmp_readonly["idbod_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_'] = array(); 
    }

   $old_value_iddet_ = $this->iddet_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $this->nm_tira_formatacao();


   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->iddet_ = $old_value_iddet_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_'][] = $rs->fields[0];
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
   $idbod__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbod__1))
          {
              foreach ($this->idbod__1 as $tmp_idbod_)
              {
                  if (trim($tmp_idbod_) === trim($cadaselect[1])) { $idbod__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbod_) === trim($cadaselect[1])) { $idbod__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idbod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idbod_) . "\">" . $idbod__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idbod_();
   $x = 0 ; 
   $idbod__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbod__1))
          {
              foreach ($this->idbod__1 as $tmp_idbod_)
              {
                  if (trim($tmp_idbod_) === trim($cadaselect[1])) { $idbod__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbod_) === trim($cadaselect[1])) { $idbod__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idbod__look))
          {
              $idbod__look = $this->idbod_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idbod_" . $sc_seq_vert . "\" class=\"css_idbod__line\" style=\"" .  $sStyleReadLab_idbod_ . "\">" . $this->form_format_readonly("idbod_", $this->form_encode_input($idbod__look)) . "</span><span id=\"id_read_off_idbod_" . $sc_seq_vert . "\" class=\"css_read_off_idbod_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idbod_ . "\">";
   echo " <span id=\"idAjaxSelect_idbod_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idbod__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idbod_" . $sc_seq_vert . "\" name=\"idbod_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_idbod_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idbod_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idbod_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idbod_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idbod_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['observ_']) && $this->nmgp_cmp_hidden['observ_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observ_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($observ_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_observ__line" id="hidden_field_data_observ_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_observ_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_observ__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_observ_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observ_"]) &&  $this->nmgp_cmp_readonly["observ_"] == "on") { 

 ?>
<input type="hidden" name="observ_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($observ_) . "\">" . $observ_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_observ_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-observ_<?php echo $sc_seq_vert ?> css_observ__line" style="<?php echo $sStyleReadLab_observ_; ?>"><?php echo $this->form_format_readonly("observ_", $this->form_encode_input($this->observ_)); ?></span><span id="id_read_off_observ_<?php echo $sc_seq_vert ?>" class="css_read_off_observ_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observ_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_observ__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_observ_<?php echo $sc_seq_vert ?>" type=text name="observ_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($observ_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observ_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observ_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['unidadmayor_']) && $this->nmgp_cmp_hidden['unidadmayor_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="unidadmayor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->unidadmayor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_unidadmayor__line" id="hidden_field_data_unidadmayor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_unidadmayor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_unidadmayor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_unidadmayor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidadmayor_"]) &&  $this->nmgp_cmp_readonly["unidadmayor_"] == "on") { 

$unidadmayor__look = "";
 if ($this->unidadmayor_ == "NO") { $unidadmayor__look .= "NO" ;} 
 if ($this->unidadmayor_ == "SI") { $unidadmayor__look .= "SI" ;} 
 if (empty($unidadmayor__look)) { $unidadmayor__look = $this->unidadmayor_; }
?>
<input type="hidden" name="unidadmayor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidadmayor_) . "\">" . $unidadmayor__look . ""; ?>
<?php } else { ?>
<?php

$unidadmayor__look = "";
 if ($this->unidadmayor_ == "NO") { $unidadmayor__look .= "NO" ;} 
 if ($this->unidadmayor_ == "SI") { $unidadmayor__look .= "SI" ;} 
 if (empty($unidadmayor__look)) { $unidadmayor__look = $this->unidadmayor_; }
?>
<span id="id_read_on_unidadmayor_<?php echo $sc_seq_vert ; ?>" class="css_unidadmayor__line"  style="<?php echo $sStyleReadLab_unidadmayor_; ?>"><?php echo $this->form_format_readonly("unidadmayor_", $this->form_encode_input($unidadmayor__look)); ?></span><span id="id_read_off_unidadmayor_<?php echo $sc_seq_vert ; ?>" class="css_read_off_unidadmayor_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_unidadmayor_; ?>">
 <span id="idAjaxSelect_unidadmayor_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_unidadmayor__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unidadmayor_<?php echo $sc_seq_vert ?>" name="unidadmayor_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NO" <?php  if ($this->unidadmayor_ == "NO") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_unidadmayor_'][] = 'NO'; ?>
 <option  value="SI" <?php  if ($this->unidadmayor_ == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['Lookup_unidadmayor_'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidadmayor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidadmayor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['stockubica_']) && $this->nmgp_cmp_hidden['stockubica_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stockubica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stockubica_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_stockubica__line" id="hidden_field_data_stockubica_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_stockubica_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_stockubica__line" style="padding: 0px"><input type="hidden" name="stockubica_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stockubica_); ?>"><span id="id_ajax_label_stockubica_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($stockubica_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stockubica_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stockubica_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_unidad__line" id="hidden_field_data_unidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_unidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_unidad__line" style="padding: 0px"><input type="hidden" name="unidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidad_); ?>"><span id="id_ajax_label_unidad_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($unidad_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cantidad__line" id="hidden_field_data_cantidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cantidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cantidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cantidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantidad_"]) &&  $this->nmgp_cmp_readonly["cantidad_"] == "on") { 

 ?>
<input type="hidden" name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) . "\">" . $cantidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cantidad_<?php echo $sc_seq_vert ?> css_cantidad__line" style="<?php echo $sStyleReadLab_cantidad_; ?>"><?php echo $this->form_format_readonly("cantidad_", $this->form_encode_input($this->cantidad_)); ?></span><span id="id_read_off_cantidad_<?php echo $sc_seq_vert ?>" class="css_read_off_cantidad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cantidad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantidad_<?php echo $sc_seq_vert ?>" type=text name="cantidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cantidad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valorunit_']) && $this->nmgp_cmp_hidden['valorunit_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorunit_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valorunit_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valorunit__line" id="hidden_field_data_valorunit_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valorunit_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valorunit__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_valorunit_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorunit_"]) &&  $this->nmgp_cmp_readonly["valorunit_"] == "on") { 

 ?>
<input type="hidden" name="valorunit_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valorunit_) . "\">" . $valorunit_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorunit_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-valorunit_<?php echo $sc_seq_vert ?> css_valorunit__line" style="<?php echo $sStyleReadLab_valorunit_; ?>"><?php echo $this->form_format_readonly("valorunit_", $this->form_encode_input($this->valorunit_)); ?></span><span id="id_read_off_valorunit_<?php echo $sc_seq_vert ?>" class="css_read_off_valorunit_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valorunit_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_valorunit__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valorunit_<?php echo $sc_seq_vert ?>" type=text name="valorunit_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valorunit_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valorunit_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valorunit_']['format_pos'] || 3 == $this->field_config['valorunit_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorunit_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorunit_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorunit_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valorunit_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorunit_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorunit_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valorpar_']) && $this->nmgp_cmp_hidden['valorpar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorpar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valorpar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_valorpar__line" id="hidden_field_data_valorpar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valorpar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_valorpar__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="valorpar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($valorpar_); ?>"><span id="id_ajax_label_valorpar_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($valorpar_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorpar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorpar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descuento_']) && $this->nmgp_cmp_hidden['descuento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descuento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_descuento__line" id="hidden_field_data_descuento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descuento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_descuento__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="descuento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descuento_); ?>"><span id="id_ajax_label_descuento_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($descuento_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descuento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descuento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['adicional_']) && $this->nmgp_cmp_hidden['adicional_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($adicional_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_adicional__line" id="hidden_field_data_adicional_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_adicional_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_adicional__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_adicional_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional_"]) &&  $this->nmgp_cmp_readonly["adicional_"] == "on") { 

 ?>
<input type="hidden" name="adicional_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($adicional_) . "\">" . $adicional_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-adicional_<?php echo $sc_seq_vert ?> css_adicional__line" style="<?php echo $sStyleReadLab_adicional_; ?>"><?php echo $this->form_format_readonly("adicional_", $this->form_encode_input($this->adicional_)); ?></span><span id="id_read_off_adicional_<?php echo $sc_seq_vert ?>" class="css_read_off_adicional_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_adicional__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional_<?php echo $sc_seq_vert ?>" type=text name="adicional_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($adicional_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['adicional_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['adicional_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['adicional1_']) && $this->nmgp_cmp_hidden['adicional1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($adicional1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_adicional1__line" id="hidden_field_data_adicional1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_adicional1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_adicional1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_adicional1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional1_"]) &&  $this->nmgp_cmp_readonly["adicional1_"] == "on") { 

 ?>
<input type="hidden" name="adicional1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($adicional1_) . "\">" . $adicional1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-adicional1_<?php echo $sc_seq_vert ?> css_adicional1__line" style="<?php echo $sStyleReadLab_adicional1_; ?>"><?php echo $this->form_format_readonly("adicional1_", $this->form_encode_input($this->adicional1_)); ?></span><span id="id_read_off_adicional1_<?php echo $sc_seq_vert ?>" class="css_read_off_adicional1_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_adicional1__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional1_<?php echo $sc_seq_vert ?>" type=text name="adicional1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($adicional1_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['adicional1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['adicional1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['adicional1_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['factor_']) && $this->nmgp_cmp_hidden['factor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($factor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_factor__line" id="hidden_field_data_factor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_factor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_factor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_factor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factor_"]) &&  $this->nmgp_cmp_readonly["factor_"] == "on") { 

 ?>
<input type="hidden" name="factor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($factor_) . "\">" . $factor_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_factor_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-factor_<?php echo $sc_seq_vert ?> css_factor__line" style="<?php echo $sStyleReadLab_factor_; ?>"><?php echo $this->form_format_readonly("factor_", $this->form_encode_input($this->factor_)); ?></span><span id="id_read_off_factor_<?php echo $sc_seq_vert ?>" class="css_read_off_factor_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_factor_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_factor__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_factor_<?php echo $sc_seq_vert ?>" type=text name="factor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($factor_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['factor_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['factor_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['factor_']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['factor_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['iva_']) && $this->nmgp_cmp_hidden['iva_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iva_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_iva__line" id="hidden_field_data_iva_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_iva_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_iva__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="iva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($iva_); ?>"><span id="id_ajax_label_iva_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($iva_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iva_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iva_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['costop_']) && $this->nmgp_cmp_hidden['costop_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costop_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costop_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_costop__line" id="hidden_field_data_costop_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_costop_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_costop__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_costop_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costop_"]) &&  $this->nmgp_cmp_readonly["costop_"] == "on") { 

 ?>
<input type="hidden" name="costop_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costop_) . "\">" . $costop_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_costop_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-costop_<?php echo $sc_seq_vert ?> css_costop__line" style="<?php echo $sStyleReadLab_costop_; ?>"><?php echo $this->form_format_readonly("costop_", $this->form_encode_input($this->costop_)); ?></span><span id="id_read_off_costop_<?php echo $sc_seq_vert ?>" class="css_read_off_costop_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costop_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_costop__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costop_<?php echo $sc_seq_vert ?>" type=text name="costop_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costop_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['costop_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['costop_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['costop_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['costop_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costop_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costop_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_iddet_))
       {
           $this->nmgp_cmp_readonly['iddet_'] = $sCheckRead_iddet_;
       }
       if ('display: none;' == $sStyleHidden_iddet_)
       {
           $this->nmgp_cmp_hidden['iddet_'] = 'off';
       }
       if (isset($sCheckRead_cod_barras_))
       {
           $this->nmgp_cmp_readonly['cod_barras_'] = $sCheckRead_cod_barras_;
       }
       if ('display: none;' == $sStyleHidden_cod_barras_)
       {
           $this->nmgp_cmp_hidden['cod_barras_'] = 'off';
       }
       if (isset($sCheckRead_idpro_))
       {
           $this->nmgp_cmp_readonly['idpro_'] = $sCheckRead_idpro_;
       }
       if ('display: none;' == $sStyleHidden_idpro_)
       {
           $this->nmgp_cmp_hidden['idpro_'] = 'off';
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
       if (isset($sCheckRead_idbod_))
       {
           $this->nmgp_cmp_readonly['idbod_'] = $sCheckRead_idbod_;
       }
       if ('display: none;' == $sStyleHidden_idbod_)
       {
           $this->nmgp_cmp_hidden['idbod_'] = 'off';
       }
       if (isset($sCheckRead_observ_))
       {
           $this->nmgp_cmp_readonly['observ_'] = $sCheckRead_observ_;
       }
       if ('display: none;' == $sStyleHidden_observ_)
       {
           $this->nmgp_cmp_hidden['observ_'] = 'off';
       }
       if (isset($sCheckRead_unidadmayor_))
       {
           $this->nmgp_cmp_readonly['unidadmayor_'] = $sCheckRead_unidadmayor_;
       }
       if ('display: none;' == $sStyleHidden_unidadmayor_)
       {
           $this->nmgp_cmp_hidden['unidadmayor_'] = 'off';
       }
       if (isset($sCheckRead_stockubica_))
       {
           $this->nmgp_cmp_readonly['stockubica_'] = $sCheckRead_stockubica_;
       }
       if ('display: none;' == $sStyleHidden_stockubica_)
       {
           $this->nmgp_cmp_hidden['stockubica_'] = 'off';
       }
       if (isset($sCheckRead_unidad_))
       {
           $this->nmgp_cmp_readonly['unidad_'] = $sCheckRead_unidad_;
       }
       if ('display: none;' == $sStyleHidden_unidad_)
       {
           $this->nmgp_cmp_hidden['unidad_'] = 'off';
       }
       if (isset($sCheckRead_cantidad_))
       {
           $this->nmgp_cmp_readonly['cantidad_'] = $sCheckRead_cantidad_;
       }
       if ('display: none;' == $sStyleHidden_cantidad_)
       {
           $this->nmgp_cmp_hidden['cantidad_'] = 'off';
       }
       if (isset($sCheckRead_valorunit_))
       {
           $this->nmgp_cmp_readonly['valorunit_'] = $sCheckRead_valorunit_;
       }
       if ('display: none;' == $sStyleHidden_valorunit_)
       {
           $this->nmgp_cmp_hidden['valorunit_'] = 'off';
       }
       if (isset($sCheckRead_valorpar_))
       {
           $this->nmgp_cmp_readonly['valorpar_'] = $sCheckRead_valorpar_;
       }
       if ('display: none;' == $sStyleHidden_valorpar_)
       {
           $this->nmgp_cmp_hidden['valorpar_'] = 'off';
       }
       if (isset($sCheckRead_descuento_))
       {
           $this->nmgp_cmp_readonly['descuento_'] = $sCheckRead_descuento_;
       }
       if ('display: none;' == $sStyleHidden_descuento_)
       {
           $this->nmgp_cmp_hidden['descuento_'] = 'off';
       }
       if (isset($sCheckRead_adicional_))
       {
           $this->nmgp_cmp_readonly['adicional_'] = $sCheckRead_adicional_;
       }
       if ('display: none;' == $sStyleHidden_adicional_)
       {
           $this->nmgp_cmp_hidden['adicional_'] = 'off';
       }
       if (isset($sCheckRead_adicional1_))
       {
           $this->nmgp_cmp_readonly['adicional1_'] = $sCheckRead_adicional1_;
       }
       if ('display: none;' == $sStyleHidden_adicional1_)
       {
           $this->nmgp_cmp_hidden['adicional1_'] = 'off';
       }
       if (isset($sCheckRead_factor_))
       {
           $this->nmgp_cmp_readonly['factor_'] = $sCheckRead_factor_;
       }
       if ('display: none;' == $sStyleHidden_factor_)
       {
           $this->nmgp_cmp_hidden['factor_'] = 'off';
       }
       if (isset($sCheckRead_iva_))
       {
           $this->nmgp_cmp_readonly['iva_'] = $sCheckRead_iva_;
       }
       if ('display: none;' == $sStyleHidden_iva_)
       {
           $this->nmgp_cmp_hidden['iva_'] = 'off';
       }
       if (isset($sCheckRead_costop_))
       {
           $this->nmgp_cmp_readonly['costop_'] = $sCheckRead_costop_;
       }
       if ('display: none;' == $sStyleHidden_costop_)
       {
           $this->nmgp_cmp_hidden['costop_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detallepedido_CW = $guarda_form_vert_form_detallepedido_CW;
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
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['birpara'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detallepedido_CW");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detallepedido_CW");
 parent.scAjaxDetailHeight("form_detallepedido_CW", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detallepedido_CW", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detallepedido_CW", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['sc_modal'])
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
			do_ajax_form_detallepedido_CW_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_CW']['buttonStatus'] = $this->nmgp_botoes;
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
