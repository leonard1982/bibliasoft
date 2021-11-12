<?php
class form_menu_movil_form extends form_menu_movil_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Crear Menú Movil"); } else { echo strip_tags("Crear Menú Movil"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['sc_redir_atualiz'] == 'ok')
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
.css_read_off_creado_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_actualizado_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_menu_movil/form_menu_movil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_menu_movil_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['last'] : 'off'); ?>";
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
<?php

include_once('form_menu_movil_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
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
$str_iframe_body = 'margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_menu_movil_js0.php");
?>
<script type="text/javascript"> 
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
$_SESSION['scriptcase']['error_span_title']['form_menu_movil'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_menu_movil'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Crear Menú Movil"; } else { echo "Crear Menú Movil"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['fast_search'][2] : "";
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
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="30" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['idmenu_movil_']))
   {
       $this->nmgp_cmp_hidden['idmenu_movil_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['aplicacion_']))
   {
       $this->nmgp_cmp_hidden['aplicacion_'] = 'off';
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['idmenu_movil_']) || $this->nmgp_cmp_hidden['idmenu_movil_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['idmenu_movil_'])) {
          $this->nm_new_label['idmenu_movil_'] = "Idmenu Movil"; } ?>

    <TD class="scFormLabelOddMult css_idmenu_movil__label" id="hidden_field_label_idmenu_movil_" style="<?php echo $sStyleHidden_idmenu_movil_; ?>" > <?php echo $this->nm_new_label['idmenu_movil_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aplicacion_']) && $this->nmgp_cmp_hidden['aplicacion_'] == 'off') { $sStyleHidden_aplicacion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aplicacion_']) || $this->nmgp_cmp_hidden['aplicacion_'] == 'on') {
      if (!isset($this->nm_new_label['aplicacion_'])) {
          $this->nm_new_label['aplicacion_'] = "Aplicacion Destino"; } ?>

    <TD class="scFormLabelOddMult css_aplicacion__label" id="hidden_field_label_aplicacion_" style="<?php echo $sStyleHidden_aplicacion_; ?>" > <?php echo $this->nm_new_label['aplicacion_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sStyleHidden_id_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') {
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['clase_css_']) && $this->nmgp_cmp_hidden['clase_css_'] == 'off') { $sStyleHidden_clase_css_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['clase_css_']) || $this->nmgp_cmp_hidden['clase_css_'] == 'on') {
      if (!isset($this->nm_new_label['clase_css_'])) {
          $this->nm_new_label['clase_css_'] = "Clase Css"; } ?>

    <TD class="scFormLabelOddMult css_clase_css__label" id="hidden_field_label_clase_css_" style="<?php echo $sStyleHidden_clase_css_; ?>" > <?php echo $this->nm_new_label['clase_css_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['comportamiento_']) && $this->nmgp_cmp_hidden['comportamiento_'] == 'off') { $sStyleHidden_comportamiento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['comportamiento_']) || $this->nmgp_cmp_hidden['comportamiento_'] == 'on') {
      if (!isset($this->nm_new_label['comportamiento_'])) {
          $this->nm_new_label['comportamiento_'] = "Comportamiento"; } ?>

    <TD class="scFormLabelOddMult css_comportamiento__label" id="hidden_field_label_comportamiento_" style="<?php echo $sStyleHidden_comportamiento_; ?>" > <?php echo $this->nm_new_label['comportamiento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ruta_imagen_']) && $this->nmgp_cmp_hidden['ruta_imagen_'] == 'off') { $sStyleHidden_ruta_imagen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ruta_imagen_']) || $this->nmgp_cmp_hidden['ruta_imagen_'] == 'on') {
      if (!isset($this->nm_new_label['ruta_imagen_'])) {
          $this->nm_new_label['ruta_imagen_'] = "Nombre Imagen"; } ?>

    <TD class="scFormLabelOddMult css_ruta_imagen__label" id="hidden_field_label_ruta_imagen_" style="<?php echo $sStyleHidden_ruta_imagen_; ?>" > <?php echo $this->nm_new_label['ruta_imagen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['enlace_']) && $this->nmgp_cmp_hidden['enlace_'] == 'off') { $sStyleHidden_enlace_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['enlace_']) || $this->nmgp_cmp_hidden['enlace_'] == 'on') {
      if (!isset($this->nm_new_label['enlace_'])) {
          $this->nm_new_label['enlace_'] = "URL"; } ?>

    <TD class="scFormLabelOddMult css_enlace__label" id="hidden_field_label_enlace_" style="<?php echo $sStyleHidden_enlace_; ?>" > <?php echo $this->nm_new_label['enlace_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['titulo_']) && $this->nmgp_cmp_hidden['titulo_'] == 'off') { $sStyleHidden_titulo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['titulo_']) || $this->nmgp_cmp_hidden['titulo_'] == 'on') {
      if (!isset($this->nm_new_label['titulo_'])) {
          $this->nm_new_label['titulo_'] = "Titulo"; } ?>

    <TD class="scFormLabelOddMult css_titulo__label" id="hidden_field_label_titulo_" style="<?php echo $sStyleHidden_titulo_; ?>" > <?php echo $this->nm_new_label['titulo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off') { $sStyleHidden_posicion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['posicion_']) || $this->nmgp_cmp_hidden['posicion_'] == 'on') {
      if (!isset($this->nm_new_label['posicion_'])) {
          $this->nm_new_label['posicion_'] = "Posicion"; } ?>

    <TD class="scFormLabelOddMult css_posicion__label" id="hidden_field_label_posicion_" style="<?php echo $sStyleHidden_posicion_; ?>" > <?php echo $this->nm_new_label['posicion_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tema_']) && $this->nmgp_cmp_hidden['tema_'] == 'off') { $sStyleHidden_tema_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tema_']) || $this->nmgp_cmp_hidden['tema_'] == 'on') {
      if (!isset($this->nm_new_label['tema_'])) {
          $this->nm_new_label['tema_'] = "Tema"; } ?>

    <TD class="scFormLabelOddMult css_tema__label" id="hidden_field_label_tema_" style="<?php echo $sStyleHidden_tema_; ?>" > <?php echo $this->nm_new_label['tema_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['icono_']) && $this->nmgp_cmp_hidden['icono_'] == 'off') { $sStyleHidden_icono_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['icono_']) || $this->nmgp_cmp_hidden['icono_'] == 'on') {
      if (!isset($this->nm_new_label['icono_'])) {
          $this->nm_new_label['icono_'] = "Icono"; } ?>

    <TD class="scFormLabelOddMult css_icono__label" id="hidden_field_label_icono_" style="<?php echo $sStyleHidden_icono_; ?>" > <?php echo $this->nm_new_label['icono_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_icono_']) && $this->nmgp_cmp_hidden['posicion_icono_'] == 'off') { $sStyleHidden_posicion_icono_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['posicion_icono_']) || $this->nmgp_cmp_hidden['posicion_icono_'] == 'on') {
      if (!isset($this->nm_new_label['posicion_icono_'])) {
          $this->nm_new_label['posicion_icono_'] = "Pos"; } ?>

    <TD class="scFormLabelOddMult css_posicion_icono__label" id="hidden_field_label_posicion_icono_" style="<?php echo $sStyleHidden_posicion_icono_; ?>" > <?php echo $this->nm_new_label['posicion_icono_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sStyleHidden_sc_field_0_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_0_']) || $this->nmgp_cmp_hidden['sc_field_0_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_0_'])) {
          $this->nm_new_label['sc_field_0_'] = "Target"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_0__label" id="hidden_field_label_sc_field_0_" style="<?php echo $sStyleHidden_sc_field_0_; ?>" > <?php echo $this->nm_new_label['sc_field_0_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['activo_']) && $this->nmgp_cmp_hidden['activo_'] == 'off') { $sStyleHidden_activo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['activo_']) || $this->nmgp_cmp_hidden['activo_'] == 'on') {
      if (!isset($this->nm_new_label['activo_'])) {
          $this->nm_new_label['activo_'] = "Activo"; } ?>

    <TD class="scFormLabelOddMult css_activo__label" id="hidden_field_label_activo_" style="<?php echo $sStyleHidden_activo_; ?>" > <?php echo $this->nm_new_label['activo_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_menu_movil);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_menu_movil = $this->form_vert_form_menu_movil;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_menu_movil))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idmenu_movil_']))
           {
               $this->nmgp_cmp_readonly['idmenu_movil_'] = 'on';
           }
   foreach ($this->form_vert_form_menu_movil as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->creado_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['creado_'];
       $this->actualizado_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['actualizado_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['idmenu_movil_'] = true;
           $this->nmgp_cmp_readonly['aplicacion_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
           $this->nmgp_cmp_readonly['clase_css_'] = true;
           $this->nmgp_cmp_readonly['comportamiento_'] = true;
           $this->nmgp_cmp_readonly['ruta_imagen_'] = true;
           $this->nmgp_cmp_readonly['enlace_'] = true;
           $this->nmgp_cmp_readonly['titulo_'] = true;
           $this->nmgp_cmp_readonly['posicion_'] = true;
           $this->nmgp_cmp_readonly['tema_'] = true;
           $this->nmgp_cmp_readonly['icono_'] = true;
           $this->nmgp_cmp_readonly['posicion_icono_'] = true;
           $this->nmgp_cmp_readonly['sc_field_0_'] = true;
           $this->nmgp_cmp_readonly['activo_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['idmenu_movil_']) || $this->nmgp_cmp_readonly['idmenu_movil_'] != "on") {$this->nmgp_cmp_readonly['idmenu_movil_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aplicacion_']) || $this->nmgp_cmp_readonly['aplicacion_'] != "on") {$this->nmgp_cmp_readonly['aplicacion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['clase_css_']) || $this->nmgp_cmp_readonly['clase_css_'] != "on") {$this->nmgp_cmp_readonly['clase_css_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['comportamiento_']) || $this->nmgp_cmp_readonly['comportamiento_'] != "on") {$this->nmgp_cmp_readonly['comportamiento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ruta_imagen_']) || $this->nmgp_cmp_readonly['ruta_imagen_'] != "on") {$this->nmgp_cmp_readonly['ruta_imagen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['enlace_']) || $this->nmgp_cmp_readonly['enlace_'] != "on") {$this->nmgp_cmp_readonly['enlace_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['titulo_']) || $this->nmgp_cmp_readonly['titulo_'] != "on") {$this->nmgp_cmp_readonly['titulo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['posicion_']) || $this->nmgp_cmp_readonly['posicion_'] != "on") {$this->nmgp_cmp_readonly['posicion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tema_']) || $this->nmgp_cmp_readonly['tema_'] != "on") {$this->nmgp_cmp_readonly['tema_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['icono_']) || $this->nmgp_cmp_readonly['icono_'] != "on") {$this->nmgp_cmp_readonly['icono_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['posicion_icono_']) || $this->nmgp_cmp_readonly['posicion_icono_'] != "on") {$this->nmgp_cmp_readonly['posicion_icono_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_0_']) || $this->nmgp_cmp_readonly['sc_field_0_'] != "on") {$this->nmgp_cmp_readonly['sc_field_0_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['activo_']) || $this->nmgp_cmp_readonly['activo_'] != "on") {$this->nmgp_cmp_readonly['activo_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->idmenu_movil_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['idmenu_movil_']; 
       $idmenu_movil_ = $this->idmenu_movil_; 
       if (!isset($this->nmgp_cmp_hidden['idmenu_movil_']))
       {
           $this->nmgp_cmp_hidden['idmenu_movil_'] = 'off';
       }
       $sStyleHidden_idmenu_movil_ = '';
       if (isset($sCheckRead_idmenu_movil_))
       {
           unset($sCheckRead_idmenu_movil_);
       }
       if (isset($this->nmgp_cmp_readonly['idmenu_movil_']))
       {
           $sCheckRead_idmenu_movil_ = $this->nmgp_cmp_readonly['idmenu_movil_'];
       }
       if (isset($this->nmgp_cmp_hidden['idmenu_movil_']) && $this->nmgp_cmp_hidden['idmenu_movil_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idmenu_movil_']);
           $sStyleHidden_idmenu_movil_ = 'display: none;';
       }
       $bTestReadOnly_idmenu_movil_ = true;
       $sStyleReadLab_idmenu_movil_ = 'display: none;';
       $sStyleReadInp_idmenu_movil_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idmenu_movil_"]) &&  $this->nmgp_cmp_readonly["idmenu_movil_"] == "on"))
       {
           $bTestReadOnly_idmenu_movil_ = false;
           unset($this->nmgp_cmp_readonly['idmenu_movil_']);
           $sStyleReadLab_idmenu_movil_ = '';
           $sStyleReadInp_idmenu_movil_ = 'display: none;';
       }
       $this->aplicacion_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['aplicacion_']; 
       $aplicacion_ = $this->aplicacion_; 
       if (!isset($this->nmgp_cmp_hidden['aplicacion_']))
       {
           $this->nmgp_cmp_hidden['aplicacion_'] = 'off';
       }
       $sStyleHidden_aplicacion_ = '';
       if (isset($sCheckRead_aplicacion_))
       {
           unset($sCheckRead_aplicacion_);
       }
       if (isset($this->nmgp_cmp_readonly['aplicacion_']))
       {
           $sCheckRead_aplicacion_ = $this->nmgp_cmp_readonly['aplicacion_'];
       }
       if (isset($this->nmgp_cmp_hidden['aplicacion_']) && $this->nmgp_cmp_hidden['aplicacion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aplicacion_']);
           $sStyleHidden_aplicacion_ = 'display: none;';
       }
       $bTestReadOnly_aplicacion_ = true;
       $sStyleReadLab_aplicacion_ = 'display: none;';
       $sStyleReadInp_aplicacion_ = '';
       if (isset($this->nmgp_cmp_readonly['aplicacion_']) && $this->nmgp_cmp_readonly['aplicacion_'] == 'on')
       {
           $bTestReadOnly_aplicacion_ = false;
           unset($this->nmgp_cmp_readonly['aplicacion_']);
           $sStyleReadLab_aplicacion_ = '';
           $sStyleReadInp_aplicacion_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['id_']; 
       $id_ = $this->id_; 
       $sStyleHidden_id_ = '';
       if (isset($sCheckRead_id_))
       {
           unset($sCheckRead_id_);
       }
       if (isset($this->nmgp_cmp_readonly['id_']))
       {
           $sCheckRead_id_ = $this->nmgp_cmp_readonly['id_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_']);
           $sStyleHidden_id_ = 'display: none;';
       }
       $bTestReadOnly_id_ = true;
       $sStyleReadLab_id_ = 'display: none;';
       $sStyleReadInp_id_ = '';
       if (isset($this->nmgp_cmp_readonly['id_']) && $this->nmgp_cmp_readonly['id_'] == 'on')
       {
           $bTestReadOnly_id_ = false;
           unset($this->nmgp_cmp_readonly['id_']);
           $sStyleReadLab_id_ = '';
           $sStyleReadInp_id_ = 'display: none;';
       }
       $this->clase_css_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['clase_css_']; 
       $clase_css_ = $this->clase_css_; 
       $sStyleHidden_clase_css_ = '';
       if (isset($sCheckRead_clase_css_))
       {
           unset($sCheckRead_clase_css_);
       }
       if (isset($this->nmgp_cmp_readonly['clase_css_']))
       {
           $sCheckRead_clase_css_ = $this->nmgp_cmp_readonly['clase_css_'];
       }
       if (isset($this->nmgp_cmp_hidden['clase_css_']) && $this->nmgp_cmp_hidden['clase_css_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['clase_css_']);
           $sStyleHidden_clase_css_ = 'display: none;';
       }
       $bTestReadOnly_clase_css_ = true;
       $sStyleReadLab_clase_css_ = 'display: none;';
       $sStyleReadInp_clase_css_ = '';
       if (isset($this->nmgp_cmp_readonly['clase_css_']) && $this->nmgp_cmp_readonly['clase_css_'] == 'on')
       {
           $bTestReadOnly_clase_css_ = false;
           unset($this->nmgp_cmp_readonly['clase_css_']);
           $sStyleReadLab_clase_css_ = '';
           $sStyleReadInp_clase_css_ = 'display: none;';
       }
       $this->comportamiento_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['comportamiento_']; 
       $comportamiento_ = $this->comportamiento_; 
       $sStyleHidden_comportamiento_ = '';
       if (isset($sCheckRead_comportamiento_))
       {
           unset($sCheckRead_comportamiento_);
       }
       if (isset($this->nmgp_cmp_readonly['comportamiento_']))
       {
           $sCheckRead_comportamiento_ = $this->nmgp_cmp_readonly['comportamiento_'];
       }
       if (isset($this->nmgp_cmp_hidden['comportamiento_']) && $this->nmgp_cmp_hidden['comportamiento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['comportamiento_']);
           $sStyleHidden_comportamiento_ = 'display: none;';
       }
       $bTestReadOnly_comportamiento_ = true;
       $sStyleReadLab_comportamiento_ = 'display: none;';
       $sStyleReadInp_comportamiento_ = '';
       if (isset($this->nmgp_cmp_readonly['comportamiento_']) && $this->nmgp_cmp_readonly['comportamiento_'] == 'on')
       {
           $bTestReadOnly_comportamiento_ = false;
           unset($this->nmgp_cmp_readonly['comportamiento_']);
           $sStyleReadLab_comportamiento_ = '';
           $sStyleReadInp_comportamiento_ = 'display: none;';
       }
       $this->ruta_imagen_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['ruta_imagen_']; 
       $ruta_imagen_ = $this->ruta_imagen_; 
       $sStyleHidden_ruta_imagen_ = '';
       if (isset($sCheckRead_ruta_imagen_))
       {
           unset($sCheckRead_ruta_imagen_);
       }
       if (isset($this->nmgp_cmp_readonly['ruta_imagen_']))
       {
           $sCheckRead_ruta_imagen_ = $this->nmgp_cmp_readonly['ruta_imagen_'];
       }
       if (isset($this->nmgp_cmp_hidden['ruta_imagen_']) && $this->nmgp_cmp_hidden['ruta_imagen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ruta_imagen_']);
           $sStyleHidden_ruta_imagen_ = 'display: none;';
       }
       $bTestReadOnly_ruta_imagen_ = true;
       $sStyleReadLab_ruta_imagen_ = 'display: none;';
       $sStyleReadInp_ruta_imagen_ = '';
       if (isset($this->nmgp_cmp_readonly['ruta_imagen_']) && $this->nmgp_cmp_readonly['ruta_imagen_'] == 'on')
       {
           $bTestReadOnly_ruta_imagen_ = false;
           unset($this->nmgp_cmp_readonly['ruta_imagen_']);
           $sStyleReadLab_ruta_imagen_ = '';
           $sStyleReadInp_ruta_imagen_ = 'display: none;';
       }
       $this->enlace_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['enlace_']; 
       $enlace_ = $this->enlace_; 
       $sStyleHidden_enlace_ = '';
       if (isset($sCheckRead_enlace_))
       {
           unset($sCheckRead_enlace_);
       }
       if (isset($this->nmgp_cmp_readonly['enlace_']))
       {
           $sCheckRead_enlace_ = $this->nmgp_cmp_readonly['enlace_'];
       }
       if (isset($this->nmgp_cmp_hidden['enlace_']) && $this->nmgp_cmp_hidden['enlace_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['enlace_']);
           $sStyleHidden_enlace_ = 'display: none;';
       }
       $bTestReadOnly_enlace_ = true;
       $sStyleReadLab_enlace_ = 'display: none;';
       $sStyleReadInp_enlace_ = '';
       if (isset($this->nmgp_cmp_readonly['enlace_']) && $this->nmgp_cmp_readonly['enlace_'] == 'on')
       {
           $bTestReadOnly_enlace_ = false;
           unset($this->nmgp_cmp_readonly['enlace_']);
           $sStyleReadLab_enlace_ = '';
           $sStyleReadInp_enlace_ = 'display: none;';
       }
       $this->titulo_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['titulo_']; 
       $titulo_ = $this->titulo_; 
       $sStyleHidden_titulo_ = '';
       if (isset($sCheckRead_titulo_))
       {
           unset($sCheckRead_titulo_);
       }
       if (isset($this->nmgp_cmp_readonly['titulo_']))
       {
           $sCheckRead_titulo_ = $this->nmgp_cmp_readonly['titulo_'];
       }
       if (isset($this->nmgp_cmp_hidden['titulo_']) && $this->nmgp_cmp_hidden['titulo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['titulo_']);
           $sStyleHidden_titulo_ = 'display: none;';
       }
       $bTestReadOnly_titulo_ = true;
       $sStyleReadLab_titulo_ = 'display: none;';
       $sStyleReadInp_titulo_ = '';
       if (isset($this->nmgp_cmp_readonly['titulo_']) && $this->nmgp_cmp_readonly['titulo_'] == 'on')
       {
           $bTestReadOnly_titulo_ = false;
           unset($this->nmgp_cmp_readonly['titulo_']);
           $sStyleReadLab_titulo_ = '';
           $sStyleReadInp_titulo_ = 'display: none;';
       }
       $this->posicion_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['posicion_']; 
       $posicion_ = $this->posicion_; 
       $sStyleHidden_posicion_ = '';
       if (isset($sCheckRead_posicion_))
       {
           unset($sCheckRead_posicion_);
       }
       if (isset($this->nmgp_cmp_readonly['posicion_']))
       {
           $sCheckRead_posicion_ = $this->nmgp_cmp_readonly['posicion_'];
       }
       if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['posicion_']);
           $sStyleHidden_posicion_ = 'display: none;';
       }
       $bTestReadOnly_posicion_ = true;
       $sStyleReadLab_posicion_ = 'display: none;';
       $sStyleReadInp_posicion_ = '';
       if (isset($this->nmgp_cmp_readonly['posicion_']) && $this->nmgp_cmp_readonly['posicion_'] == 'on')
       {
           $bTestReadOnly_posicion_ = false;
           unset($this->nmgp_cmp_readonly['posicion_']);
           $sStyleReadLab_posicion_ = '';
           $sStyleReadInp_posicion_ = 'display: none;';
       }
       $this->tema_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['tema_']; 
       $tema_ = $this->tema_; 
       $sStyleHidden_tema_ = '';
       if (isset($sCheckRead_tema_))
       {
           unset($sCheckRead_tema_);
       }
       if (isset($this->nmgp_cmp_readonly['tema_']))
       {
           $sCheckRead_tema_ = $this->nmgp_cmp_readonly['tema_'];
       }
       if (isset($this->nmgp_cmp_hidden['tema_']) && $this->nmgp_cmp_hidden['tema_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tema_']);
           $sStyleHidden_tema_ = 'display: none;';
       }
       $bTestReadOnly_tema_ = true;
       $sStyleReadLab_tema_ = 'display: none;';
       $sStyleReadInp_tema_ = '';
       if (isset($this->nmgp_cmp_readonly['tema_']) && $this->nmgp_cmp_readonly['tema_'] == 'on')
       {
           $bTestReadOnly_tema_ = false;
           unset($this->nmgp_cmp_readonly['tema_']);
           $sStyleReadLab_tema_ = '';
           $sStyleReadInp_tema_ = 'display: none;';
       }
       $this->icono_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['icono_']; 
       $icono_ = $this->icono_; 
       $sStyleHidden_icono_ = '';
       if (isset($sCheckRead_icono_))
       {
           unset($sCheckRead_icono_);
       }
       if (isset($this->nmgp_cmp_readonly['icono_']))
       {
           $sCheckRead_icono_ = $this->nmgp_cmp_readonly['icono_'];
       }
       if (isset($this->nmgp_cmp_hidden['icono_']) && $this->nmgp_cmp_hidden['icono_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['icono_']);
           $sStyleHidden_icono_ = 'display: none;';
       }
       $bTestReadOnly_icono_ = true;
       $sStyleReadLab_icono_ = 'display: none;';
       $sStyleReadInp_icono_ = '';
       if (isset($this->nmgp_cmp_readonly['icono_']) && $this->nmgp_cmp_readonly['icono_'] == 'on')
       {
           $bTestReadOnly_icono_ = false;
           unset($this->nmgp_cmp_readonly['icono_']);
           $sStyleReadLab_icono_ = '';
           $sStyleReadInp_icono_ = 'display: none;';
       }
       $this->posicion_icono_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['posicion_icono_']; 
       $posicion_icono_ = $this->posicion_icono_; 
       $sStyleHidden_posicion_icono_ = '';
       if (isset($sCheckRead_posicion_icono_))
       {
           unset($sCheckRead_posicion_icono_);
       }
       if (isset($this->nmgp_cmp_readonly['posicion_icono_']))
       {
           $sCheckRead_posicion_icono_ = $this->nmgp_cmp_readonly['posicion_icono_'];
       }
       if (isset($this->nmgp_cmp_hidden['posicion_icono_']) && $this->nmgp_cmp_hidden['posicion_icono_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['posicion_icono_']);
           $sStyleHidden_posicion_icono_ = 'display: none;';
       }
       $bTestReadOnly_posicion_icono_ = true;
       $sStyleReadLab_posicion_icono_ = 'display: none;';
       $sStyleReadInp_posicion_icono_ = '';
       if (isset($this->nmgp_cmp_readonly['posicion_icono_']) && $this->nmgp_cmp_readonly['posicion_icono_'] == 'on')
       {
           $bTestReadOnly_posicion_icono_ = false;
           unset($this->nmgp_cmp_readonly['posicion_icono_']);
           $sStyleReadLab_posicion_icono_ = '';
           $sStyleReadInp_posicion_icono_ = 'display: none;';
       }
       $this->sc_field_0_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['sc_field_0_']; 
       $sc_field_0_ = $this->sc_field_0_; 
       $sStyleHidden_sc_field_0_ = '';
       if (isset($sCheckRead_sc_field_0_))
       {
           unset($sCheckRead_sc_field_0_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']))
       {
           $sCheckRead_sc_field_0_ = $this->nmgp_cmp_readonly['sc_field_0_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_0_']);
           $sStyleHidden_sc_field_0_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_0_ = true;
       $sStyleReadLab_sc_field_0_ = 'display: none;';
       $sStyleReadInp_sc_field_0_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']) && $this->nmgp_cmp_readonly['sc_field_0_'] == 'on')
       {
           $bTestReadOnly_sc_field_0_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_0_']);
           $sStyleReadLab_sc_field_0_ = '';
           $sStyleReadInp_sc_field_0_ = 'display: none;';
       }
       $this->activo_ = $this->form_vert_form_menu_movil[$sc_seq_vert]['activo_']; 
       $activo_ = $this->activo_; 
       $sStyleHidden_activo_ = '';
       if (isset($sCheckRead_activo_))
       {
           unset($sCheckRead_activo_);
       }
       if (isset($this->nmgp_cmp_readonly['activo_']))
       {
           $sCheckRead_activo_ = $this->nmgp_cmp_readonly['activo_'];
       }
       if (isset($this->nmgp_cmp_hidden['activo_']) && $this->nmgp_cmp_hidden['activo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['activo_']);
           $sStyleHidden_activo_ = 'display: none;';
       }
       $bTestReadOnly_activo_ = true;
       $sStyleReadLab_activo_ = 'display: none;';
       $sStyleReadInp_activo_ = '';
       if (isset($this->nmgp_cmp_readonly['activo_']) && $this->nmgp_cmp_readonly['activo_'] == 'on')
       {
           $bTestReadOnly_activo_ = false;
           unset($this->nmgp_cmp_readonly['activo_']);
           $sStyleReadLab_activo_ = '';
           $sStyleReadInp_activo_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_menu_movil_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_menu_movil_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_menu_movil_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_menu_movil_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_menu_movil_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_menu_movil_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['idmenu_movil_']) && $this->nmgp_cmp_hidden['idmenu_movil_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idmenu_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idmenu_movil_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_idmenu_movil__line" id="hidden_field_data_idmenu_movil_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idmenu_movil_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idmenu_movil__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idmenu_movil_<?php echo $sc_seq_vert ?>" class="css_idmenu_movil__line" style="<?php echo $sStyleReadLab_idmenu_movil_; ?>"><?php echo $this->form_format_readonly("idmenu_movil_", $this->form_encode_input($this->idmenu_movil_)); ?></span><span id="id_read_off_idmenu_movil_<?php echo $sc_seq_vert ?>" class="css_read_off_idmenu_movil_" style="<?php echo $sStyleReadInp_idmenu_movil_; ?>"><input type="hidden" id="id_sc_field_idmenu_movil_<?php echo $sc_seq_vert ?>" name="idmenu_movil_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idmenu_movil_) . "\">"?>
<span id="id_ajax_label_idmenu_movil_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($idmenu_movil_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmenu_movil_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmenu_movil_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aplicacion_']) && $this->nmgp_cmp_hidden['aplicacion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aplicacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aplicacion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aplicacion__line" id="hidden_field_data_aplicacion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aplicacion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aplicacion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aplicacion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aplicacion_"]) &&  $this->nmgp_cmp_readonly["aplicacion_"] == "on") { 

 ?>
<input type="hidden" name="aplicacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aplicacion_) . "\">" . $aplicacion_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aplicacion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aplicacion_<?php echo $sc_seq_vert ?> css_aplicacion__line" style="<?php echo $sStyleReadLab_aplicacion_; ?>"><?php echo $this->form_format_readonly("aplicacion_", $this->form_encode_input($this->aplicacion_)); ?></span><span id="id_read_off_aplicacion_<?php echo $sc_seq_vert ?>" class="css_read_off_aplicacion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_aplicacion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aplicacion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_aplicacion_<?php echo $sc_seq_vert ?>" type=text name="aplicacion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aplicacion_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aplicacion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aplicacion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id__line" id="hidden_field_data_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_"]) &&  $this->nmgp_cmp_readonly["id_"] == "on") { 

 ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">" . $id_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_<?php echo $sc_seq_vert ?> css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_format_readonly("id_", $this->form_encode_input($this->id_)); ?></span><span id="id_read_off_id_<?php echo $sc_seq_vert ?>" class="css_read_off_id_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_<?php echo $sc_seq_vert ?>" type=text name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('id_')", "nm_mostra_mens('id_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['clase_css_']) && $this->nmgp_cmp_hidden['clase_css_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clase_css_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($clase_css_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_clase_css__line" id="hidden_field_data_clase_css_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_clase_css_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_clase_css__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_clase_css_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clase_css_"]) &&  $this->nmgp_cmp_readonly["clase_css_"] == "on") { 

 ?>
<input type="hidden" name="clase_css_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($clase_css_) . "\">" . $clase_css_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_clase_css_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-clase_css_<?php echo $sc_seq_vert ?> css_clase_css__line" style="<?php echo $sStyleReadLab_clase_css_; ?>"><?php echo $this->form_format_readonly("clase_css_", $this->form_encode_input($this->clase_css_)); ?></span><span id="id_read_off_clase_css_<?php echo $sc_seq_vert ?>" class="css_read_off_clase_css_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_clase_css_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_clase_css__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_clase_css_<?php echo $sc_seq_vert ?>" type=text name="clase_css_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($clase_css_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clase_css_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clase_css_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['comportamiento_']) && $this->nmgp_cmp_hidden['comportamiento_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="comportamiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->comportamiento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_comportamiento__line" id="hidden_field_data_comportamiento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_comportamiento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_comportamiento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_comportamiento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comportamiento_"]) &&  $this->nmgp_cmp_readonly["comportamiento_"] == "on") { 

$comportamiento__look = "";
 if ($this->comportamiento_ == "button") { $comportamiento__look .= "BOTON" ;} 
 if ($this->comportamiento_ == "IMAGEN") { $comportamiento__look .= "IMAGEN" ;} 
 if ($this->comportamiento_ == "") { $comportamiento__look .= "" ;} 
 if (empty($comportamiento__look)) { $comportamiento__look = $this->comportamiento_; }
?>
<input type="hidden" name="comportamiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comportamiento_) . "\">" . $comportamiento__look . ""; ?>
<?php } else { ?>
<?php

$comportamiento__look = "";
 if ($this->comportamiento_ == "button") { $comportamiento__look .= "BOTON" ;} 
 if ($this->comportamiento_ == "IMAGEN") { $comportamiento__look .= "IMAGEN" ;} 
 if ($this->comportamiento_ == "") { $comportamiento__look .= "" ;} 
 if (empty($comportamiento__look)) { $comportamiento__look = $this->comportamiento_; }
?>
<span id="id_read_on_comportamiento_<?php echo $sc_seq_vert ; ?>" class="css_comportamiento__line"  style="<?php echo $sStyleReadLab_comportamiento_; ?>"><?php echo $this->form_format_readonly("comportamiento_", $this->form_encode_input($comportamiento__look)); ?></span><span id="id_read_off_comportamiento_<?php echo $sc_seq_vert ; ?>" class="css_read_off_comportamiento_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_comportamiento_; ?>">
 <span id="idAjaxSelect_comportamiento_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_comportamiento__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_comportamiento_<?php echo $sc_seq_vert ?>" name="comportamiento_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="button" <?php  if ($this->comportamiento_ == "button") { echo " selected" ;} ?><?php  if (empty($this->comportamiento_)) { echo " selected" ;} ?>>BOTON</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_comportamiento_'][] = 'button'; ?>
 <option  value="IMAGEN" <?php  if ($this->comportamiento_ == "IMAGEN") { echo " selected" ;} ?>>IMAGEN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_comportamiento_'][] = 'IMAGEN'; ?>
 <option  value="" <?php  if ($this->comportamiento_ == "") { echo " selected" ;} ?>></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_comportamiento_'][] = ''; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comportamiento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comportamiento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ruta_imagen_']) && $this->nmgp_cmp_hidden['ruta_imagen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ruta_imagen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ruta_imagen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ruta_imagen__line" id="hidden_field_data_ruta_imagen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ruta_imagen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ruta_imagen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ruta_imagen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ruta_imagen_"]) &&  $this->nmgp_cmp_readonly["ruta_imagen_"] == "on") { 

 ?>
<input type="hidden" name="ruta_imagen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ruta_imagen_) . "\">" . $ruta_imagen_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ruta_imagen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ruta_imagen_<?php echo $sc_seq_vert ?> css_ruta_imagen__line" style="<?php echo $sStyleReadLab_ruta_imagen_; ?>"><?php echo $this->form_format_readonly("ruta_imagen_", $this->form_encode_input($this->ruta_imagen_)); ?></span><span id="id_read_off_ruta_imagen_<?php echo $sc_seq_vert ?>" class="css_read_off_ruta_imagen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ruta_imagen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ruta_imagen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ruta_imagen_<?php echo $sc_seq_vert ?>" type=text name="ruta_imagen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ruta_imagen_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ruta_imagen_')", "nm_mostra_mens('ruta_imagen_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ruta_imagen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ruta_imagen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['enlace_']) && $this->nmgp_cmp_hidden['enlace_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enlace_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enlace_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_enlace__line" id="hidden_field_data_enlace_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_enlace_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_enlace__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_enlace_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enlace_"]) &&  $this->nmgp_cmp_readonly["enlace_"] == "on") { 

 ?>
<input type="hidden" name="enlace_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enlace_) . "\">" . $enlace_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_enlace_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-enlace_<?php echo $sc_seq_vert ?> css_enlace__line" style="<?php echo $sStyleReadLab_enlace_; ?>"><?php echo $this->form_format_readonly("enlace_", $this->form_encode_input($this->enlace_)); ?></span><span id="id_read_off_enlace_<?php echo $sc_seq_vert ?>" class="css_read_off_enlace_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_enlace_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_enlace__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_enlace_<?php echo $sc_seq_vert ?>" type=text name="enlace_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enlace_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enlace_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enlace_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['titulo_']) && $this->nmgp_cmp_hidden['titulo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="titulo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($titulo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_titulo__line" id="hidden_field_data_titulo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_titulo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_titulo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_titulo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["titulo_"]) &&  $this->nmgp_cmp_readonly["titulo_"] == "on") { 

 ?>
<input type="hidden" name="titulo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($titulo_) . "\">" . $titulo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_titulo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-titulo_<?php echo $sc_seq_vert ?> css_titulo__line" style="<?php echo $sStyleReadLab_titulo_; ?>"><?php echo $this->form_format_readonly("titulo_", $this->form_encode_input($this->titulo_)); ?></span><span id="id_read_off_titulo_<?php echo $sc_seq_vert ?>" class="css_read_off_titulo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_titulo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_titulo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_titulo_<?php echo $sc_seq_vert ?>" type=text name="titulo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($titulo_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_titulo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_titulo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_']) && $this->nmgp_cmp_hidden['posicion_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="posicion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->posicion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_posicion__line" id="hidden_field_data_posicion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_posicion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_posicion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_posicion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_"]) &&  $this->nmgp_cmp_readonly["posicion_"] == "on") { 

$posicion__look = "";
 if ($this->posicion_ == "1") { $posicion__look .= "1" ;} 
 if ($this->posicion_ == "2") { $posicion__look .= "2" ;} 
 if ($this->posicion_ == "3") { $posicion__look .= "3" ;} 
 if ($this->posicion_ == "4") { $posicion__look .= "4" ;} 
 if ($this->posicion_ == "5") { $posicion__look .= "5" ;} 
 if ($this->posicion_ == "6") { $posicion__look .= "6" ;} 
 if ($this->posicion_ == "7") { $posicion__look .= "7" ;} 
 if ($this->posicion_ == "8") { $posicion__look .= "8" ;} 
 if ($this->posicion_ == "9") { $posicion__look .= "9" ;} 
 if ($this->posicion_ == "10") { $posicion__look .= "10" ;} 
 if ($this->posicion_ == "11") { $posicion__look .= "11" ;} 
 if ($this->posicion_ == "12") { $posicion__look .= "12" ;} 
 if ($this->posicion_ == "13") { $posicion__look .= "13" ;} 
 if ($this->posicion_ == "14") { $posicion__look .= "14" ;} 
 if ($this->posicion_ == "15") { $posicion__look .= "15" ;} 
 if ($this->posicion_ == "16") { $posicion__look .= "16" ;} 
 if ($this->posicion_ == "17") { $posicion__look .= "17" ;} 
 if ($this->posicion_ == "18") { $posicion__look .= "18" ;} 
 if ($this->posicion_ == "19") { $posicion__look .= "19" ;} 
 if ($this->posicion_ == "20") { $posicion__look .= "20" ;} 
 if (empty($posicion__look)) { $posicion__look = $this->posicion_; }
?>
<input type="hidden" name="posicion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posicion_) . "\">" . $posicion__look . ""; ?>
<?php } else { ?>
<?php

$posicion__look = "";
 if ($this->posicion_ == "1") { $posicion__look .= "1" ;} 
 if ($this->posicion_ == "2") { $posicion__look .= "2" ;} 
 if ($this->posicion_ == "3") { $posicion__look .= "3" ;} 
 if ($this->posicion_ == "4") { $posicion__look .= "4" ;} 
 if ($this->posicion_ == "5") { $posicion__look .= "5" ;} 
 if ($this->posicion_ == "6") { $posicion__look .= "6" ;} 
 if ($this->posicion_ == "7") { $posicion__look .= "7" ;} 
 if ($this->posicion_ == "8") { $posicion__look .= "8" ;} 
 if ($this->posicion_ == "9") { $posicion__look .= "9" ;} 
 if ($this->posicion_ == "10") { $posicion__look .= "10" ;} 
 if ($this->posicion_ == "11") { $posicion__look .= "11" ;} 
 if ($this->posicion_ == "12") { $posicion__look .= "12" ;} 
 if ($this->posicion_ == "13") { $posicion__look .= "13" ;} 
 if ($this->posicion_ == "14") { $posicion__look .= "14" ;} 
 if ($this->posicion_ == "15") { $posicion__look .= "15" ;} 
 if ($this->posicion_ == "16") { $posicion__look .= "16" ;} 
 if ($this->posicion_ == "17") { $posicion__look .= "17" ;} 
 if ($this->posicion_ == "18") { $posicion__look .= "18" ;} 
 if ($this->posicion_ == "19") { $posicion__look .= "19" ;} 
 if ($this->posicion_ == "20") { $posicion__look .= "20" ;} 
 if (empty($posicion__look)) { $posicion__look = $this->posicion_; }
?>
<span id="id_read_on_posicion_<?php echo $sc_seq_vert ; ?>" class="css_posicion__line"  style="<?php echo $sStyleReadLab_posicion_; ?>"><?php echo $this->form_format_readonly("posicion_", $this->form_encode_input($posicion__look)); ?></span><span id="id_read_off_posicion_<?php echo $sc_seq_vert ; ?>" class="css_read_off_posicion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_posicion_; ?>">
 <span id="idAjaxSelect_posicion_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_posicion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_<?php echo $sc_seq_vert ?>" name="posicion_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = ''; ?>
 <option value=""></option>
 <option  value="1" <?php  if ($this->posicion_ == "1") { echo " selected" ;} ?>>1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '1'; ?>
 <option  value="2" <?php  if ($this->posicion_ == "2") { echo " selected" ;} ?>>2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '2'; ?>
 <option  value="3" <?php  if ($this->posicion_ == "3") { echo " selected" ;} ?>>3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '3'; ?>
 <option  value="4" <?php  if ($this->posicion_ == "4") { echo " selected" ;} ?>>4</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '4'; ?>
 <option  value="5" <?php  if ($this->posicion_ == "5") { echo " selected" ;} ?>>5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '5'; ?>
 <option  value="6" <?php  if ($this->posicion_ == "6") { echo " selected" ;} ?>>6</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '6'; ?>
 <option  value="7" <?php  if ($this->posicion_ == "7") { echo " selected" ;} ?>>7</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '7'; ?>
 <option  value="8" <?php  if ($this->posicion_ == "8") { echo " selected" ;} ?>>8</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '8'; ?>
 <option  value="9" <?php  if ($this->posicion_ == "9") { echo " selected" ;} ?>>9</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '9'; ?>
 <option  value="10" <?php  if ($this->posicion_ == "10") { echo " selected" ;} ?>>10</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '10'; ?>
 <option  value="11" <?php  if ($this->posicion_ == "11") { echo " selected" ;} ?>>11</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '11'; ?>
 <option  value="12" <?php  if ($this->posicion_ == "12") { echo " selected" ;} ?>>12</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '12'; ?>
 <option  value="13" <?php  if ($this->posicion_ == "13") { echo " selected" ;} ?>>13</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '13'; ?>
 <option  value="14" <?php  if ($this->posicion_ == "14") { echo " selected" ;} ?>>14</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '14'; ?>
 <option  value="15" <?php  if ($this->posicion_ == "15") { echo " selected" ;} ?>>15</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '15'; ?>
 <option  value="16" <?php  if ($this->posicion_ == "16") { echo " selected" ;} ?>>16</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '16'; ?>
 <option  value="17" <?php  if ($this->posicion_ == "17") { echo " selected" ;} ?>>17</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '17'; ?>
 <option  value="18" <?php  if ($this->posicion_ == "18") { echo " selected" ;} ?>>18</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '18'; ?>
 <option  value="19" <?php  if ($this->posicion_ == "19") { echo " selected" ;} ?>>19</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '19'; ?>
 <option  value="20" <?php  if ($this->posicion_ == "20") { echo " selected" ;} ?>>20</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_'][] = '20'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('posicion_')", "nm_mostra_mens('posicion_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tema_']) && $this->nmgp_cmp_hidden['tema_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tema_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tema_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tema__line" id="hidden_field_data_tema_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tema_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tema__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tema_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tema_"]) &&  $this->nmgp_cmp_readonly["tema_"] == "on") { 

$tema__look = "";
 if ($this->tema_ == "a") { $tema__look .= "A" ;} 
 if ($this->tema_ == "b") { $tema__look .= "B" ;} 
 if ($this->tema_ == "c") { $tema__look .= "C" ;} 
 if ($this->tema_ == "d") { $tema__look .= "D" ;} 
 if ($this->tema_ == "e") { $tema__look .= "E" ;} 
 if (empty($tema__look)) { $tema__look = $this->tema_; }
?>
<input type="hidden" name="tema_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tema_) . "\">" . $tema__look . ""; ?>
<?php } else { ?>
<?php

$tema__look = "";
 if ($this->tema_ == "a") { $tema__look .= "A" ;} 
 if ($this->tema_ == "b") { $tema__look .= "B" ;} 
 if ($this->tema_ == "c") { $tema__look .= "C" ;} 
 if ($this->tema_ == "d") { $tema__look .= "D" ;} 
 if ($this->tema_ == "e") { $tema__look .= "E" ;} 
 if (empty($tema__look)) { $tema__look = $this->tema_; }
?>
<span id="id_read_on_tema_<?php echo $sc_seq_vert ; ?>" class="css_tema__line"  style="<?php echo $sStyleReadLab_tema_; ?>"><?php echo $this->form_format_readonly("tema_", $this->form_encode_input($tema__look)); ?></span><span id="id_read_off_tema_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tema_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tema_; ?>">
 <span id="idAjaxSelect_tema_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_tema__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tema_<?php echo $sc_seq_vert ?>" name="tema_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_tema_'][] = ''; ?>
 <option value=""></option>
 <option  value="a" <?php  if ($this->tema_ == "a") { echo " selected" ;} ?><?php  if (empty($this->tema_)) { echo " selected" ;} ?>>A</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_tema_'][] = 'a'; ?>
 <option  value="b" <?php  if ($this->tema_ == "b") { echo " selected" ;} ?>>B</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_tema_'][] = 'b'; ?>
 <option  value="c" <?php  if ($this->tema_ == "c") { echo " selected" ;} ?>>C</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_tema_'][] = 'c'; ?>
 <option  value="d" <?php  if ($this->tema_ == "d") { echo " selected" ;} ?>>D</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_tema_'][] = 'd'; ?>
 <option  value="e" <?php  if ($this->tema_ == "e") { echo " selected" ;} ?>>E</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_tema_'][] = 'e'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tema_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tema_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['icono_']) && $this->nmgp_cmp_hidden['icono_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="icono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->icono_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_icono__line" id="hidden_field_data_icono_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_icono_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_icono__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_icono_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icono_"]) &&  $this->nmgp_cmp_readonly["icono_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_'] = array(); 
    }

   $old_value_idmenu_movil_ = $this->idmenu_movil_;
   $this->nm_tira_formatacao();


   $unformatted_value_idmenu_movil_ = $this->idmenu_movil_;

   $activo__val_str = "''";
   if (!empty($this->activo_))
   {
       if (is_array($this->activo_))
       {
           $Tmp_array = $this->activo_;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo_);
       }
       $activo__val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo__val_str)
          {
             $activo__val_str .= ", ";
          }
          $activo__val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT icono, icono  FROM menu_movil_iconos  ORDER BY icono";

   $this->idmenu_movil_ = $old_value_idmenu_movil_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_'][] = $rs->fields[0];
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
   $icono__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->icono__1))
          {
              foreach ($this->icono__1 as $tmp_icono_)
              {
                  if (trim($tmp_icono_) === trim($cadaselect[1])) { $icono__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->icono_) === trim($cadaselect[1])) { $icono__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="icono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($icono_) . "\">" . $icono__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_icono_();
   $x = 0 ; 
   $icono__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->icono__1))
          {
              foreach ($this->icono__1 as $tmp_icono_)
              {
                  if (trim($tmp_icono_) === trim($cadaselect[1])) { $icono__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->icono_) === trim($cadaselect[1])) { $icono__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($icono__look))
          {
              $icono__look = $this->icono_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_icono_" . $sc_seq_vert . "\" class=\"css_icono__line\" style=\"" .  $sStyleReadLab_icono_ . "\">" . $this->form_format_readonly("icono_", $this->form_encode_input($icono__look)) . "</span><span id=\"id_read_off_icono_" . $sc_seq_vert . "\" class=\"css_read_off_icono_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_icono_ . "\">";
   echo " <span id=\"idAjaxSelect_icono_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_icono__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_icono_" . $sc_seq_vert . "\" name=\"icono_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_icono_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->icono_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->icono_)) 
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
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('icono_')", "nm_mostra_mens('icono_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_icono_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_icono_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['posicion_icono_']) && $this->nmgp_cmp_hidden['posicion_icono_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="posicion_icono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->posicion_icono_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_posicion_icono__line" id="hidden_field_data_posicion_icono_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_posicion_icono_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_posicion_icono__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_posicion_icono_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_icono_"]) &&  $this->nmgp_cmp_readonly["posicion_icono_"] == "on") { 

$posicion_icono__look = "";
 if ($this->posicion_icono_ == "right") { $posicion_icono__look .= "Derecha" ;} 
 if ($this->posicion_icono_ == "left") { $posicion_icono__look .= "Izquierda" ;} 
 if ($this->posicion_icono_ == "notext") { $posicion_icono__look .= "No Texto" ;} 
 if (empty($posicion_icono__look)) { $posicion_icono__look = $this->posicion_icono_; }
?>
<input type="hidden" name="posicion_icono_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posicion_icono_) . "\">" . $posicion_icono__look . ""; ?>
<?php } else { ?>
<?php

$posicion_icono__look = "";
 if ($this->posicion_icono_ == "right") { $posicion_icono__look .= "Derecha" ;} 
 if ($this->posicion_icono_ == "left") { $posicion_icono__look .= "Izquierda" ;} 
 if ($this->posicion_icono_ == "notext") { $posicion_icono__look .= "No Texto" ;} 
 if (empty($posicion_icono__look)) { $posicion_icono__look = $this->posicion_icono_; }
?>
<span id="id_read_on_posicion_icono_<?php echo $sc_seq_vert ; ?>" class="css_posicion_icono__line"  style="<?php echo $sStyleReadLab_posicion_icono_; ?>"><?php echo $this->form_format_readonly("posicion_icono_", $this->form_encode_input($posicion_icono__look)); ?></span><span id="id_read_off_posicion_icono_<?php echo $sc_seq_vert ; ?>" class="css_read_off_posicion_icono_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_posicion_icono_; ?>">
 <span id="idAjaxSelect_posicion_icono_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_posicion_icono__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_icono_<?php echo $sc_seq_vert ?>" name="posicion_icono_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="right" <?php  if ($this->posicion_icono_ == "right") { echo " selected" ;} ?>>Derecha</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_icono_'][] = 'right'; ?>
 <option  value="left" <?php  if ($this->posicion_icono_ == "left") { echo " selected" ;} ?>>Izquierda</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_icono_'][] = 'left'; ?>
 <option  value="notext" <?php  if ($this->posicion_icono_ == "notext") { echo " selected" ;} ?>>No Texto</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_posicion_icono_'][] = 'notext'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_icono_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_icono_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->sc_field_0_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_0__line" id="hidden_field_data_sc_field_0_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_0_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_0__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_0_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0_"]) &&  $this->nmgp_cmp_readonly["sc_field_0_"] == "on") { 

$sc_field_0__look = "";
 if ($this->sc_field_0_ == "_blank") { $sc_field_0__look .= "_blank" ;} 
 if ($this->sc_field_0_ == "_parent") { $sc_field_0__look .= "_parent" ;} 
 if ($this->sc_field_0_ == "_self") { $sc_field_0__look .= "_self" ;} 
 if ($this->sc_field_0_ == "_top") { $sc_field_0__look .= "_top" ;} 
 if (empty($sc_field_0__look)) { $sc_field_0__look = $this->sc_field_0_; }
?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\">" . $sc_field_0__look . ""; ?>
<?php } else { ?>
<?php

$sc_field_0__look = "";
 if ($this->sc_field_0_ == "_blank") { $sc_field_0__look .= "_blank" ;} 
 if ($this->sc_field_0_ == "_parent") { $sc_field_0__look .= "_parent" ;} 
 if ($this->sc_field_0_ == "_self") { $sc_field_0__look .= "_self" ;} 
 if ($this->sc_field_0_ == "_top") { $sc_field_0__look .= "_top" ;} 
 if (empty($sc_field_0__look)) { $sc_field_0__look = $this->sc_field_0_; }
?>
<span id="id_read_on_sc_field_0_<?php echo $sc_seq_vert ; ?>" class="css_sc_field_0__line"  style="<?php echo $sStyleReadLab_sc_field_0_; ?>"><?php echo $this->form_format_readonly("sc_field_0_", $this->form_encode_input($sc_field_0__look)); ?></span><span id="id_read_off_sc_field_0_<?php echo $sc_seq_vert ; ?>" class="css_read_off_sc_field_0_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_sc_field_0_; ?>">
 <span id="idAjaxSelect_sc_field_0_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_sc_field_0__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sc_field_0_<?php echo $sc_seq_vert ?>" name="sc_field_0_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_sc_field_0_'][] = ''; ?>
 <option value=""></option>
 <option  value="_blank" <?php  if ($this->sc_field_0_ == "_blank") { echo " selected" ;} ?>>_blank</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_sc_field_0_'][] = '_blank'; ?>
 <option  value="_parent" <?php  if ($this->sc_field_0_ == "_parent") { echo " selected" ;} ?>>_parent</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_sc_field_0_'][] = '_parent'; ?>
 <option  value="_self" <?php  if ($this->sc_field_0_ == "_self") { echo " selected" ;} ?><?php  if (empty($this->sc_field_0_)) { echo " selected" ;} ?>>_self</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_sc_field_0_'][] = '_self'; ?>
 <option  value="_top" <?php  if ($this->sc_field_0_ == "_top") { echo " selected" ;} ?>>_top</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_sc_field_0_'][] = '_top'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['activo_']) && $this->nmgp_cmp_hidden['activo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->activo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->activo__1 = explode(";", trim($this->activo_));
  } 
  else
  {
      if (empty($this->activo_))
      {
          $this->activo__1= array(); 
          $this->activo_= "NO";
      } 
      else
      {
          $this->activo__1= $this->activo_; 
          $this->activo_= ""; 
          foreach ($this->activo__1 as $cada_activo_)
          {
             if (!empty($activo_))
             {
                 $this->activo_.= ";"; 
             } 
             $this->activo_.= $cada_activo_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_activo__line" id="hidden_field_data_activo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_activo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_activo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_activo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activo_"]) &&  $this->nmgp_cmp_readonly["activo_"] == "on") { 

$activo__look = "";
 if ($this->activo_ == "SI") { $activo__look .= "" ;} 
 if (empty($activo__look)) { $activo__look = $this->activo_; }
?>
<input type="hidden" name="activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($activo_) . "\">" . $activo__look . ""; ?>
<?php } else { ?>

<?php

$activo__look = "";
 if ($this->activo_ == "SI") { $activo__look .= "" ;} 
 if (empty($activo__look)) { $activo__look = $this->activo_; }
?>
<span id="id_read_on_activo_<?php echo $sc_seq_vert ; ?>" class="css_activo__line" style="<?php echo $sStyleReadLab_activo_; ?>"><?php echo $this->form_format_readonly("activo_", $this->form_encode_input($activo__look)); ?></span><span id="id_read_off_activo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_activo_ css_activo__line" style="<?php echo $sStyleReadInp_activo_; ?>"><?php echo "<div id=\"idAjaxCheckbox_activo_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_activo__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_activo__line"><?php $tempOptionId = "id-opt-activo_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-activo_ sc-ui-checkbox-activo_<?php echo $sc_seq_vert ?>" name="activo_<?php echo $sc_seq_vert ?>[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['Lookup_activo_'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->activo__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_idmenu_movil_))
       {
           $this->nmgp_cmp_readonly['idmenu_movil_'] = $sCheckRead_idmenu_movil_;
       }
       if ('display: none;' == $sStyleHidden_idmenu_movil_)
       {
           $this->nmgp_cmp_hidden['idmenu_movil_'] = 'off';
       }
       if (isset($sCheckRead_aplicacion_))
       {
           $this->nmgp_cmp_readonly['aplicacion_'] = $sCheckRead_aplicacion_;
       }
       if ('display: none;' == $sStyleHidden_aplicacion_)
       {
           $this->nmgp_cmp_hidden['aplicacion_'] = 'off';
       }
       if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       if (isset($sCheckRead_clase_css_))
       {
           $this->nmgp_cmp_readonly['clase_css_'] = $sCheckRead_clase_css_;
       }
       if ('display: none;' == $sStyleHidden_clase_css_)
       {
           $this->nmgp_cmp_hidden['clase_css_'] = 'off';
       }
       if (isset($sCheckRead_comportamiento_))
       {
           $this->nmgp_cmp_readonly['comportamiento_'] = $sCheckRead_comportamiento_;
       }
       if ('display: none;' == $sStyleHidden_comportamiento_)
       {
           $this->nmgp_cmp_hidden['comportamiento_'] = 'off';
       }
       if (isset($sCheckRead_ruta_imagen_))
       {
           $this->nmgp_cmp_readonly['ruta_imagen_'] = $sCheckRead_ruta_imagen_;
       }
       if ('display: none;' == $sStyleHidden_ruta_imagen_)
       {
           $this->nmgp_cmp_hidden['ruta_imagen_'] = 'off';
       }
       if (isset($sCheckRead_enlace_))
       {
           $this->nmgp_cmp_readonly['enlace_'] = $sCheckRead_enlace_;
       }
       if ('display: none;' == $sStyleHidden_enlace_)
       {
           $this->nmgp_cmp_hidden['enlace_'] = 'off';
       }
       if (isset($sCheckRead_titulo_))
       {
           $this->nmgp_cmp_readonly['titulo_'] = $sCheckRead_titulo_;
       }
       if ('display: none;' == $sStyleHidden_titulo_)
       {
           $this->nmgp_cmp_hidden['titulo_'] = 'off';
       }
       if (isset($sCheckRead_posicion_))
       {
           $this->nmgp_cmp_readonly['posicion_'] = $sCheckRead_posicion_;
       }
       if ('display: none;' == $sStyleHidden_posicion_)
       {
           $this->nmgp_cmp_hidden['posicion_'] = 'off';
       }
       if (isset($sCheckRead_tema_))
       {
           $this->nmgp_cmp_readonly['tema_'] = $sCheckRead_tema_;
       }
       if ('display: none;' == $sStyleHidden_tema_)
       {
           $this->nmgp_cmp_hidden['tema_'] = 'off';
       }
       if (isset($sCheckRead_icono_))
       {
           $this->nmgp_cmp_readonly['icono_'] = $sCheckRead_icono_;
       }
       if ('display: none;' == $sStyleHidden_icono_)
       {
           $this->nmgp_cmp_hidden['icono_'] = 'off';
       }
       if (isset($sCheckRead_posicion_icono_))
       {
           $this->nmgp_cmp_readonly['posicion_icono_'] = $sCheckRead_posicion_icono_;
       }
       if ('display: none;' == $sStyleHidden_posicion_icono_)
       {
           $this->nmgp_cmp_hidden['posicion_icono_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_0_))
       {
           $this->nmgp_cmp_readonly['sc_field_0_'] = $sCheckRead_sc_field_0_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_0_)
       {
           $this->nmgp_cmp_hidden['sc_field_0_'] = 'off';
       }
       if (isset($sCheckRead_activo_))
       {
           $this->nmgp_cmp_readonly['activo_'] = $sCheckRead_activo_;
       }
       if ('display: none;' == $sStyleHidden_activo_)
       {
           $this->nmgp_cmp_hidden['activo_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_menu_movil = $guarda_form_vert_form_menu_movil;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['birpara'];
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
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['back'];
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
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_menu_movil");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_menu_movil");
 parent.scAjaxDetailHeight("form_menu_movil", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_menu_movil", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_menu_movil", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['sc_modal'])
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
			do_ajax_form_menu_movil_add_new_line(); return false;
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_menu_movil']['buttonStatus'] = $this->nmgp_botoes;
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
