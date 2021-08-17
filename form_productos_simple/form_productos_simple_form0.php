<?php
class form_productos_simple_form extends form_productos_simple_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Craeación rápida de productos"); } else { echo strip_tags("Edición rápida de productos"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['sc_redir_atualiz'] == 'ok')
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_productos_simple/form_productos_simple_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_productos_simple_sajax_js.php");
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
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
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
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
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

include_once('form_productos_simple_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  scJQPopupAdd('');

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('codigobar_1');

<?php
}
?>
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_productos_simple_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="upload_file_row" value="">
<?php
$_SESSION['scriptcase']['error_span_title']['form_productos_simple'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_productos_simple'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Craeación rápida de productos"; } else { echo "Edición rápida de productos"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['fast_search'][2] : "";
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
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluirsel", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['unimen_']))
   {
       $this->nmgp_cmp_hidden['unimen_'] = 'off';
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
   <?php if (isset($this->nmgp_cmp_hidden['codigobar_']) && $this->nmgp_cmp_hidden['codigobar_'] == 'off') { $sStyleHidden_codigobar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codigobar_']) || $this->nmgp_cmp_hidden['codigobar_'] == 'on') {
      if (!isset($this->nm_new_label['codigobar_'])) {
          $this->nm_new_label['codigobar_'] = "Código de barras"; } ?>

    <TD class="scFormLabelOddMult css_codigobar__label" id="hidden_field_label_codigobar_" style="<?php echo $sStyleHidden_codigobar_; ?>" > <?php echo $this->nm_new_label['codigobar_'] ?> <span class="scFormRequiredOddMult">*</span><span class="scFormPopupBubble sc-help-in-header" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><style type="text/css">.sc-help-in-header > span > a > img { opacity: 100}</style><table class="scFormPopup"><tbody><?php
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
</tbody></table></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nompro_']) && $this->nmgp_cmp_hidden['nompro_'] == 'off') { $sStyleHidden_nompro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nompro_']) || $this->nmgp_cmp_hidden['nompro_'] == 'on') {
      if (!isset($this->nm_new_label['nompro_'])) {
          $this->nm_new_label['nompro_'] = "Descripción"; } ?>

    <TD class="scFormLabelOddMult css_nompro__label" id="hidden_field_label_nompro_" style="<?php echo $sStyleHidden_nompro_; ?>" > <?php echo $this->nm_new_label['nompro_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['unimen_']) && $this->nmgp_cmp_hidden['unimen_'] == 'off') { $sStyleHidden_unimen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['unimen_']) || $this->nmgp_cmp_hidden['unimen_'] == 'on') {
      if (!isset($this->nm_new_label['unimen_'])) {
          $this->nm_new_label['unimen_'] = "Unidad"; } ?>

    <TD class="scFormLabelOddMult css_unimen__label" id="hidden_field_label_unimen_" style="<?php echo $sStyleHidden_unimen_; ?>" > <?php echo $this->nm_new_label['unimen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['unidad__']) && $this->nmgp_cmp_hidden['unidad__'] == 'off') { $sStyleHidden_unidad__ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['unidad__']) || $this->nmgp_cmp_hidden['unidad__'] == 'on') {
      if (!isset($this->nm_new_label['unidad__'])) {
          $this->nm_new_label['unidad__'] = "Unidad Pr."; } ?>

    <TD class="scFormLabelOddMult css_unidad___label" id="hidden_field_label_unidad__" style="<?php echo $sStyleHidden_unidad__; ?>" > <?php echo $this->nm_new_label['unidad__'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['costomen_']) && $this->nmgp_cmp_hidden['costomen_'] == 'off') { $sStyleHidden_costomen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['costomen_']) || $this->nmgp_cmp_hidden['costomen_'] == 'on') {
      if (!isset($this->nm_new_label['costomen_'])) {
          $this->nm_new_label['costomen_'] = "Costo compra"; } ?>

    <TD class="scFormLabelOddMult css_costomen__label" id="hidden_field_label_costomen_" style="<?php echo $sStyleHidden_costomen_; ?>" > <?php echo $this->nm_new_label['costomen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['preciomen_']) && $this->nmgp_cmp_hidden['preciomen_'] == 'off') { $sStyleHidden_preciomen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['preciomen_']) || $this->nmgp_cmp_hidden['preciomen_'] == 'on') {
      if (!isset($this->nm_new_label['preciomen_'])) {
          $this->nm_new_label['preciomen_'] = "Precio venta menudeo"; } ?>

    <TD class="scFormLabelOddMult css_preciomen__label" id="hidden_field_label_preciomen_" style="<?php echo $sStyleHidden_preciomen_; ?>" > <?php echo $this->nm_new_label['preciomen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idgrup_']) && $this->nmgp_cmp_hidden['idgrup_'] == 'off') { $sStyleHidden_idgrup_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idgrup_']) || $this->nmgp_cmp_hidden['idgrup_'] == 'on') {
      if (!isset($this->nm_new_label['idgrup_'])) {
          $this->nm_new_label['idgrup_'] = "Familia o grupo"; } ?>

    <TD class="scFormLabelOddMult css_idgrup__label" id="hidden_field_label_idgrup_" style="<?php echo $sStyleHidden_idgrup_; ?>" > <?php echo $this->nm_new_label['idgrup_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idiva_']) && $this->nmgp_cmp_hidden['idiva_'] == 'off') { $sStyleHidden_idiva_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idiva_']) || $this->nmgp_cmp_hidden['idiva_'] == 'on') {
      if (!isset($this->nm_new_label['idiva_'])) {
          $this->nm_new_label['idiva_'] = "IVA"; } ?>

    <TD class="scFormLabelOddMult css_idiva__label" id="hidden_field_label_idiva_" style="<?php echo $sStyleHidden_idiva_; ?>" > <?php echo $this->nm_new_label['idiva_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['imagenprod_']) && $this->nmgp_cmp_hidden['imagenprod_'] == 'off') { $sStyleHidden_imagenprod_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['imagenprod_']) || $this->nmgp_cmp_hidden['imagenprod_'] == 'on') {
      if (!isset($this->nm_new_label['imagenprod_'])) {
          $this->nm_new_label['imagenprod_'] = "Imágen"; } ?>

    <TD class="scFormLabelOddMult css_imagenprod__label" id="hidden_field_label_imagenprod_" style="<?php echo $sStyleHidden_imagenprod_; ?>" > <?php echo $this->nm_new_label['imagenprod_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_productos_simple);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_productos_simple = $this->form_vert_form_productos_simple;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_productos_simple))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_productos_simple as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idprod_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['idprod_'];
       $this->codigoprod_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['codigoprod_'];
       $this->unidmaymen_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['unidmaymen_'];
       $this->unimay_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['unimay_'];
       $this->costomay_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['costomay_'];
       $this->recmayamen_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['recmayamen_'];
       $this->preciomen2_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['preciomen2_'];
       $this->preciomen3_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['preciomen3_'];
       $this->precio2_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['precio2_'];
       $this->preciomay_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['preciomay_'];
       $this->preciofull_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['preciofull_'];
       $this->stockmay_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['stockmay_'];
       $this->stockmen_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['stockmen_'];
       $this->idpro1_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['idpro1_'];
       $this->idpro2_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['idpro2_'];
       $this->otro_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['otro_'];
       $this->otro2_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['otro2_'];
       $this->colores_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['colores_'];
       $this->tallas_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['tallas_'];
       $this->sabores_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['sabores_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['codigobar_'] = true;
           $this->nmgp_cmp_readonly['nompro_'] = true;
           $this->nmgp_cmp_readonly['unimen_'] = true;
           $this->nmgp_cmp_readonly['unidad__'] = true;
           $this->nmgp_cmp_readonly['costomen_'] = true;
           $this->nmgp_cmp_readonly['preciomen_'] = true;
           $this->nmgp_cmp_readonly['idgrup_'] = true;
           $this->nmgp_cmp_readonly['idiva_'] = true;
           $this->nmgp_cmp_readonly['imagenprod_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['codigobar_']) || $this->nmgp_cmp_readonly['codigobar_'] != "on") {$this->nmgp_cmp_readonly['codigobar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nompro_']) || $this->nmgp_cmp_readonly['nompro_'] != "on") {$this->nmgp_cmp_readonly['nompro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['unimen_']) || $this->nmgp_cmp_readonly['unimen_'] != "on") {$this->nmgp_cmp_readonly['unimen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['unidad__']) || $this->nmgp_cmp_readonly['unidad__'] != "on") {$this->nmgp_cmp_readonly['unidad__'] = false;}
           if (!isset($this->nmgp_cmp_readonly['costomen_']) || $this->nmgp_cmp_readonly['costomen_'] != "on") {$this->nmgp_cmp_readonly['costomen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['preciomen_']) || $this->nmgp_cmp_readonly['preciomen_'] != "on") {$this->nmgp_cmp_readonly['preciomen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idgrup_']) || $this->nmgp_cmp_readonly['idgrup_'] != "on") {$this->nmgp_cmp_readonly['idgrup_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idiva_']) || $this->nmgp_cmp_readonly['idiva_'] != "on") {$this->nmgp_cmp_readonly['idiva_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['imagenprod_']) || $this->nmgp_cmp_readonly['imagenprod_'] != "on") {$this->nmgp_cmp_readonly['imagenprod_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->codigobar_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['codigobar_']; 
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
       $this->nompro_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['nompro_']; 
       $nompro_ = $this->nompro_; 
       $sStyleHidden_nompro_ = '';
       if (isset($sCheckRead_nompro_))
       {
           unset($sCheckRead_nompro_);
       }
       if (isset($this->nmgp_cmp_readonly['nompro_']))
       {
           $sCheckRead_nompro_ = $this->nmgp_cmp_readonly['nompro_'];
       }
       if (isset($this->nmgp_cmp_hidden['nompro_']) && $this->nmgp_cmp_hidden['nompro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nompro_']);
           $sStyleHidden_nompro_ = 'display: none;';
       }
       $bTestReadOnly_nompro_ = true;
       $sStyleReadLab_nompro_ = 'display: none;';
       $sStyleReadInp_nompro_ = '';
       if (isset($this->nmgp_cmp_readonly['nompro_']) && $this->nmgp_cmp_readonly['nompro_'] == 'on')
       {
           $bTestReadOnly_nompro_ = false;
           unset($this->nmgp_cmp_readonly['nompro_']);
           $sStyleReadLab_nompro_ = '';
           $sStyleReadInp_nompro_ = 'display: none;';
       }
       $this->unimen_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['unimen_']; 
       $unimen_ = $this->unimen_; 
       if (!isset($this->nmgp_cmp_hidden['unimen_']))
       {
           $this->nmgp_cmp_hidden['unimen_'] = 'off';
       }
       $sStyleHidden_unimen_ = '';
       if (isset($sCheckRead_unimen_))
       {
           unset($sCheckRead_unimen_);
       }
       if (isset($this->nmgp_cmp_readonly['unimen_']))
       {
           $sCheckRead_unimen_ = $this->nmgp_cmp_readonly['unimen_'];
       }
       if (isset($this->nmgp_cmp_hidden['unimen_']) && $this->nmgp_cmp_hidden['unimen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['unimen_']);
           $sStyleHidden_unimen_ = 'display: none;';
       }
       $bTestReadOnly_unimen_ = true;
       $sStyleReadLab_unimen_ = 'display: none;';
       $sStyleReadInp_unimen_ = '';
       if (isset($this->nmgp_cmp_readonly['unimen_']) && $this->nmgp_cmp_readonly['unimen_'] == 'on')
       {
           $bTestReadOnly_unimen_ = false;
           unset($this->nmgp_cmp_readonly['unimen_']);
           $sStyleReadLab_unimen_ = '';
           $sStyleReadInp_unimen_ = 'display: none;';
       }
       $this->unidad__ = $this->form_vert_form_productos_simple[$sc_seq_vert]['unidad__']; 
       $unidad__ = $this->unidad__; 
       $sStyleHidden_unidad__ = '';
       if (isset($sCheckRead_unidad__))
       {
           unset($sCheckRead_unidad__);
       }
       if (isset($this->nmgp_cmp_readonly['unidad__']))
       {
           $sCheckRead_unidad__ = $this->nmgp_cmp_readonly['unidad__'];
       }
       if (isset($this->nmgp_cmp_hidden['unidad__']) && $this->nmgp_cmp_hidden['unidad__'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['unidad__']);
           $sStyleHidden_unidad__ = 'display: none;';
       }
       $bTestReadOnly_unidad__ = true;
       $sStyleReadLab_unidad__ = 'display: none;';
       $sStyleReadInp_unidad__ = '';
       if (isset($this->nmgp_cmp_readonly['unidad__']) && $this->nmgp_cmp_readonly['unidad__'] == 'on')
       {
           $bTestReadOnly_unidad__ = false;
           unset($this->nmgp_cmp_readonly['unidad__']);
           $sStyleReadLab_unidad__ = '';
           $sStyleReadInp_unidad__ = 'display: none;';
       }
       $this->costomen_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['costomen_']; 
       $costomen_ = $this->costomen_; 
       $sStyleHidden_costomen_ = '';
       if (isset($sCheckRead_costomen_))
       {
           unset($sCheckRead_costomen_);
       }
       if (isset($this->nmgp_cmp_readonly['costomen_']))
       {
           $sCheckRead_costomen_ = $this->nmgp_cmp_readonly['costomen_'];
       }
       if (isset($this->nmgp_cmp_hidden['costomen_']) && $this->nmgp_cmp_hidden['costomen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['costomen_']);
           $sStyleHidden_costomen_ = 'display: none;';
       }
       $bTestReadOnly_costomen_ = true;
       $sStyleReadLab_costomen_ = 'display: none;';
       $sStyleReadInp_costomen_ = '';
       if (isset($this->nmgp_cmp_readonly['costomen_']) && $this->nmgp_cmp_readonly['costomen_'] == 'on')
       {
           $bTestReadOnly_costomen_ = false;
           unset($this->nmgp_cmp_readonly['costomen_']);
           $sStyleReadLab_costomen_ = '';
           $sStyleReadInp_costomen_ = 'display: none;';
       }
       $this->preciomen_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['preciomen_']; 
       $preciomen_ = $this->preciomen_; 
       $sStyleHidden_preciomen_ = '';
       if (isset($sCheckRead_preciomen_))
       {
           unset($sCheckRead_preciomen_);
       }
       if (isset($this->nmgp_cmp_readonly['preciomen_']))
       {
           $sCheckRead_preciomen_ = $this->nmgp_cmp_readonly['preciomen_'];
       }
       if (isset($this->nmgp_cmp_hidden['preciomen_']) && $this->nmgp_cmp_hidden['preciomen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['preciomen_']);
           $sStyleHidden_preciomen_ = 'display: none;';
       }
       $bTestReadOnly_preciomen_ = true;
       $sStyleReadLab_preciomen_ = 'display: none;';
       $sStyleReadInp_preciomen_ = '';
       if (isset($this->nmgp_cmp_readonly['preciomen_']) && $this->nmgp_cmp_readonly['preciomen_'] == 'on')
       {
           $bTestReadOnly_preciomen_ = false;
           unset($this->nmgp_cmp_readonly['preciomen_']);
           $sStyleReadLab_preciomen_ = '';
           $sStyleReadInp_preciomen_ = 'display: none;';
       }
       $this->idgrup_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['idgrup_']; 
       $idgrup_ = $this->idgrup_; 
       $sStyleHidden_idgrup_ = '';
       if (isset($sCheckRead_idgrup_))
       {
           unset($sCheckRead_idgrup_);
       }
       if (isset($this->nmgp_cmp_readonly['idgrup_']))
       {
           $sCheckRead_idgrup_ = $this->nmgp_cmp_readonly['idgrup_'];
       }
       if (isset($this->nmgp_cmp_hidden['idgrup_']) && $this->nmgp_cmp_hidden['idgrup_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idgrup_']);
           $sStyleHidden_idgrup_ = 'display: none;';
       }
       $bTestReadOnly_idgrup_ = true;
       $sStyleReadLab_idgrup_ = 'display: none;';
       $sStyleReadInp_idgrup_ = '';
       if (isset($this->nmgp_cmp_readonly['idgrup_']) && $this->nmgp_cmp_readonly['idgrup_'] == 'on')
       {
           $bTestReadOnly_idgrup_ = false;
           unset($this->nmgp_cmp_readonly['idgrup_']);
           $sStyleReadLab_idgrup_ = '';
           $sStyleReadInp_idgrup_ = 'display: none;';
       }
       $this->idiva_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['idiva_']; 
       $idiva_ = $this->idiva_; 
       $sStyleHidden_idiva_ = '';
       if (isset($sCheckRead_idiva_))
       {
           unset($sCheckRead_idiva_);
       }
       if (isset($this->nmgp_cmp_readonly['idiva_']))
       {
           $sCheckRead_idiva_ = $this->nmgp_cmp_readonly['idiva_'];
       }
       if (isset($this->nmgp_cmp_hidden['idiva_']) && $this->nmgp_cmp_hidden['idiva_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idiva_']);
           $sStyleHidden_idiva_ = 'display: none;';
       }
       $bTestReadOnly_idiva_ = true;
       $sStyleReadLab_idiva_ = 'display: none;';
       $sStyleReadInp_idiva_ = '';
       if (isset($this->nmgp_cmp_readonly['idiva_']) && $this->nmgp_cmp_readonly['idiva_'] == 'on')
       {
           $bTestReadOnly_idiva_ = false;
           unset($this->nmgp_cmp_readonly['idiva_']);
           $sStyleReadLab_idiva_ = '';
           $sStyleReadInp_idiva_ = 'display: none;';
       }
       $this->imagenprod_ = $this->form_vert_form_productos_simple[$sc_seq_vert]['imagenprod_']; 
       $imagenprod_ = $this->imagenprod_; 
       $this->imagenprod__limpa = $this->form_vert_form_productos_simple[$sc_seq_vert]['imagenprod__limpa']; 
       $imagenprod__limpa = $this->imagenprod__limpa; 
       $sStyleHidden_imagenprod_ = '';
       if (isset($sCheckRead_imagenprod_))
       {
           unset($sCheckRead_imagenprod_);
       }
       if (isset($this->nmgp_cmp_readonly['imagenprod_']))
       {
           $sCheckRead_imagenprod_ = $this->nmgp_cmp_readonly['imagenprod_'];
       }
       if (isset($this->nmgp_cmp_hidden['imagenprod_']) && $this->nmgp_cmp_hidden['imagenprod_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['imagenprod_']);
           $sStyleHidden_imagenprod_ = 'display: none;';
       }
       $bTestReadOnly_imagenprod_ = true;
       $sStyleReadLab_imagenprod_ = 'display: none;';
       $sStyleReadInp_imagenprod_ = '';
       if (isset($this->nmgp_cmp_readonly['imagenprod_']) && $this->nmgp_cmp_readonly['imagenprod_'] == 'on')
       {
           $bTestReadOnly_imagenprod_ = false;
           unset($this->nmgp_cmp_readonly['imagenprod_']);
           $sStyleReadLab_imagenprod_ = '';
           $sStyleReadInp_imagenprod_ = 'display: none;';
       }

       if ($this->nmgp_opcao == "novo")
       { 
           $out_imagenprod_   = "";  
           $this->imagenprod_ = "";  
       } 
       else 
       { 
           $out_imagenprod_ = $this->imagenprod_;  
       } 
       if ($this->imagenprod_ != "" && $this->imagenprod_ != "none")   
       { 
           $out_imagenprod_ = $this->Ini->path_imag_temp . "/sc_imagenprod__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
           $_SESSION['scriptcase']['sc_num_img']++ ; 
           $arq_imagenprod_ = fopen($this->Ini->root . $out_imagenprod_, "w") ;  
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
           { 
               $nm_tmp = nm_conv_img_access(substr($this->imagenprod_, 0, 12));
               if (substr($this->imagenprod_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
               { 
                   $this->imagenprod_ = nm_conv_img_access($this->imagenprod_);
               } 
           } 
           if (substr($this->imagenprod_, 0, 4) == "*nm*") 
           { 
               $this->imagenprod_ = substr($this->imagenprod_, 4) ; 
               $this->imagenprod_ = base64_decode($this->imagenprod_) ; 
           } 
           $img_pos_bm = strpos($this->imagenprod_, "BM") ; 
           if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
           { 
               $this->imagenprod_ = substr($this->imagenprod_, $img_pos_bm) ; 
           } 
           fwrite($arq_imagenprod_, $this->imagenprod_) ;  
           fclose($arq_imagenprod_) ;  
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_imagenprod_, true);
           $this->nmgp_return_img['imagenprod_'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['imagenprod_'][1] = $sc_obj_img->getWidth();
           $out1_imagenprod_ = $out_imagenprod_; 
           $out_imagenprod_ = $this->Ini->path_imag_temp . "/sc_" . "imagenprod__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
           $_SESSION['scriptcase']['sc_num_img']++ ; 
           if (!$this->Ini->Gd_missing)
           { 
               $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_imagenprod_, true);
               $sc_obj_img->setWidth(50);
               $sc_obj_img->setHeight(50);
               $sc_obj_img->setManterAspecto(true);
               $sc_obj_img->createImg($this->Ini->root . $out_imagenprod_);
           } 
           else 
           { 
               $out_imagenprod_ = $out1_imagenprod_;
           } 
       } 
       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>
<input type="hidden" name="imagenprod__ul_name<?php echo $sc_seq_vert; ?>" id="id_sc_field_imagenprod__ul_name<?php echo $sc_seq_vert; ?>" value="<?php echo $this->form_encode_input($this->imagenprod__ul_name);?>">
<input type="hidden" name="imagenprod__ul_type<?php echo $sc_seq_vert; ?>" id="id_sc_field_imagenprod__ul_type<?php echo $sc_seq_vert; ?>" value="<?php echo $this->form_encode_input($this->imagenprod__ul_type);?>">


   
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_productos_simple_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_productos_simple_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_productos_simple_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_productos_simple_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_productos_simple_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_productos_simple_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['codigobar_']) && $this->nmgp_cmp_hidden['codigobar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigobar__line" id="hidden_field_data_codigobar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigobar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigobar__line" style="padding: 0px">
<?php if ($bTestReadOnly_codigobar_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigobar_"]) &&  $this->nmgp_cmp_readonly["codigobar_"] == "on") { 

 ?>
<input type="hidden" name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) . "\">" . $codigobar_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigobar_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-codigobar_<?php echo $sc_seq_vert ?> css_codigobar__line" style="<?php echo $sStyleReadLab_codigobar_; ?>"><?php echo $this->form_format_readonly("codigobar_", $this->form_encode_input($this->codigobar_)); ?></span><span id="id_read_off_codigobar_<?php echo $sc_seq_vert ?>" class="css_read_off_codigobar_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigobar_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_codigobar__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigobar_<?php echo $sc_seq_vert ?>" type=text name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789 .-_") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ingrese Código', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nompro_']) && $this->nmgp_cmp_hidden['nompro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nompro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nompro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nompro__line" id="hidden_field_data_nompro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nompro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nompro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nompro_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nompro_"]) &&  $this->nmgp_cmp_readonly["nompro_"] == "on") { 

 ?>
<input type="hidden" name="nompro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nompro_) . "\">" . $nompro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nompro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nompro_<?php echo $sc_seq_vert ?> css_nompro__line" style="<?php echo $sStyleReadLab_nompro_; ?>"><?php echo $this->form_format_readonly("nompro_", $this->form_encode_input($this->nompro_)); ?></span><span id="id_read_off_nompro_<?php echo $sc_seq_vert ?>" class="css_read_off_nompro_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nompro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nompro__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nompro_<?php echo $sc_seq_vert ?>" type=text name="nompro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nompro_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nompro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nompro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['unimen_']) && $this->nmgp_cmp_hidden['unimen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unimen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unimen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_unimen__line" id="hidden_field_data_unimen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_unimen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_unimen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_unimen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unimen_"]) &&  $this->nmgp_cmp_readonly["unimen_"] == "on") { 

 ?>
<input type="hidden" name="unimen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unimen_) . "\">" . $unimen_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_unimen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-unimen_<?php echo $sc_seq_vert ?> css_unimen__line" style="<?php echo $sStyleReadLab_unimen_; ?>"><?php echo $this->form_format_readonly("unimen_", $this->form_encode_input($this->unimen_)); ?></span><span id="id_read_off_unimen_<?php echo $sc_seq_vert ?>" class="css_read_off_unimen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unimen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_unimen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unimen_<?php echo $sc_seq_vert ?>" type=text name="unimen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unimen_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Ej: UND, KILO, etc', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unimen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unimen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['unidad__']) && $this->nmgp_cmp_hidden['unidad__'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="unidad__<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->unidad__) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_unidad___line" id="hidden_field_data_unidad__<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_unidad__; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_unidad___line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_unidad__ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidad__"]) &&  $this->nmgp_cmp_readonly["unidad__"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__'] = array(); 
    }

   $old_value_costomen_ = $this->costomen_;
   $old_value_preciomen_ = $this->preciomen_;
   $this->nm_tira_formatacao();


   $unformatted_value_costomen_ = $this->costomen_;
   $unformatted_value_preciomen_ = $this->preciomen_;

   $nm_comando = "SELECT codigo_um, descripcion_um  FROM unidades_medida  ORDER BY descripcion_um";

   $this->costomen_ = $old_value_costomen_;
   $this->preciomen_ = $old_value_preciomen_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__'][] = $rs->fields[0];
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
   $unidad___look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->unidad___1))
          {
              foreach ($this->unidad___1 as $tmp_unidad__)
              {
                  if (trim($tmp_unidad__) === trim($cadaselect[1])) { $unidad___look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->unidad__) === trim($cadaselect[1])) { $unidad___look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="unidad__<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidad__) . "\">" . $unidad___look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_unidad__();
   $x = 0 ; 
   $unidad___look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->unidad___1))
          {
              foreach ($this->unidad___1 as $tmp_unidad__)
              {
                  if (trim($tmp_unidad__) === trim($cadaselect[1])) { $unidad___look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->unidad__) === trim($cadaselect[1])) { $unidad___look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($unidad___look))
          {
              $unidad___look = $this->unidad__;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_unidad__" . $sc_seq_vert . "\" class=\"css_unidad___line\" style=\"" .  $sStyleReadLab_unidad__ . "\">" . $this->form_format_readonly("unidad__", $this->form_encode_input($unidad___look)) . "</span><span id=\"id_read_off_unidad__" . $sc_seq_vert . "\" class=\"css_read_off_unidad__" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_unidad__ . "\">";
   echo " <span id=\"idAjaxSelect_unidad__" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_unidad___obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_unidad__" . $sc_seq_vert . "\" name=\"unidad__" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_unidad__'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->unidad__) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->unidad__)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad__<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad__<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['costomen_']) && $this->nmgp_cmp_hidden['costomen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costomen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_costomen__line" id="hidden_field_data_costomen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_costomen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_costomen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_costomen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costomen_"]) &&  $this->nmgp_cmp_readonly["costomen_"] == "on") { 

 ?>
<input type="hidden" name="costomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costomen_) . "\">" . $costomen_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_costomen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-costomen_<?php echo $sc_seq_vert ?> css_costomen__line" style="<?php echo $sStyleReadLab_costomen_; ?>"><?php echo $this->form_format_readonly("costomen_", $this->form_encode_input($this->costomen_)); ?></span><span id="id_read_off_costomen_<?php echo $sc_seq_vert ?>" class="css_read_off_costomen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costomen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_costomen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costomen_<?php echo $sc_seq_vert ?>" type=text name="costomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costomen_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['costomen_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['costomen_']['format_pos'] || 3 == $this->field_config['costomen_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['costomen_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['costomen_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['costomen_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['costomen_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Valor de compra antes de IVA', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costomen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costomen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['preciomen_']) && $this->nmgp_cmp_hidden['preciomen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="preciomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($preciomen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_preciomen__line" id="hidden_field_data_preciomen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_preciomen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_preciomen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_preciomen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["preciomen_"]) &&  $this->nmgp_cmp_readonly["preciomen_"] == "on") { 

 ?>
<input type="hidden" name="preciomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($preciomen_) . "\">" . $preciomen_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_preciomen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-preciomen_<?php echo $sc_seq_vert ?> css_preciomen__line" style="<?php echo $sStyleReadLab_preciomen_; ?>"><?php echo $this->form_format_readonly("preciomen_", $this->form_encode_input($this->preciomen_)); ?></span><span id="id_read_off_preciomen_<?php echo $sc_seq_vert ?>" class="css_read_off_preciomen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_preciomen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_preciomen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_preciomen_<?php echo $sc_seq_vert ?>" type=text name="preciomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($preciomen_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['preciomen_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['preciomen_']['format_pos'] || 3 == $this->field_config['preciomen_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['preciomen_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['preciomen_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['preciomen_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_preciomen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_preciomen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idgrup_']) && $this->nmgp_cmp_hidden['idgrup_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idgrup_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idgrup_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idgrup__line" id="hidden_field_data_idgrup_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idgrup_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idgrup__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idgrup_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idgrup_"]) &&  $this->nmgp_cmp_readonly["idgrup_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_'] = array(); 
    }

   $old_value_costomen_ = $this->costomen_;
   $old_value_preciomen_ = $this->preciomen_;
   $this->nm_tira_formatacao();


   $unformatted_value_costomen_ = $this->costomen_;
   $unformatted_value_preciomen_ = $this->preciomen_;

   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->costomen_ = $old_value_costomen_;
   $this->preciomen_ = $old_value_preciomen_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idgrup_'][] = $rs->fields[0];
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
   $idgrup__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idgrup__1))
          {
              foreach ($this->idgrup__1 as $tmp_idgrup_)
              {
                  if (trim($tmp_idgrup_) === trim($cadaselect[1])) { $idgrup__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idgrup_) === trim($cadaselect[1])) { $idgrup__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idgrup_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idgrup_) . "\">" . $idgrup__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idgrup_();
   $x = 0 ; 
   $idgrup__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idgrup__1))
          {
              foreach ($this->idgrup__1 as $tmp_idgrup_)
              {
                  if (trim($tmp_idgrup_) === trim($cadaselect[1])) { $idgrup__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idgrup_) === trim($cadaselect[1])) { $idgrup__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idgrup__look))
          {
              $idgrup__look = $this->idgrup_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idgrup_" . $sc_seq_vert . "\" class=\"css_idgrup__line\" style=\"" .  $sStyleReadLab_idgrup_ . "\">" . $this->form_format_readonly("idgrup_", $this->form_encode_input($idgrup__look)) . "</span><span id=\"id_read_off_idgrup_" . $sc_seq_vert . "\" class=\"css_read_off_idgrup_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idgrup_ . "\">";
   echo " <span id=\"idAjaxSelect_idgrup_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idgrup__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idgrup_" . $sc_seq_vert . "\" name=\"idgrup_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idgrup_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idgrup_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idgrup_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idgrup_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idiva_']) && $this->nmgp_cmp_hidden['idiva_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idiva_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idiva__line" id="hidden_field_data_idiva_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idiva_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idiva__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idiva_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idiva_"]) &&  $this->nmgp_cmp_readonly["idiva_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_'] = array(); 
    }

   $old_value_costomen_ = $this->costomen_;
   $old_value_preciomen_ = $this->preciomen_;
   $this->nm_tira_formatacao();


   $unformatted_value_costomen_ = $this->costomen_;
   $unformatted_value_preciomen_ = $this->preciomen_;

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

   $this->costomen_ = $old_value_costomen_;
   $this->preciomen_ = $old_value_preciomen_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['Lookup_idiva_'][] = $rs->fields[0];
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
   $idiva__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idiva__1))
          {
              foreach ($this->idiva__1 as $tmp_idiva_)
              {
                  if (trim($tmp_idiva_) === trim($cadaselect[1])) { $idiva__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idiva_) === trim($cadaselect[1])) { $idiva__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idiva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idiva_) . "\">" . $idiva__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idiva_();
   $x = 0 ; 
   $idiva__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idiva__1))
          {
              foreach ($this->idiva__1 as $tmp_idiva_)
              {
                  if (trim($tmp_idiva_) === trim($cadaselect[1])) { $idiva__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idiva_) === trim($cadaselect[1])) { $idiva__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idiva__look))
          {
              $idiva__look = $this->idiva_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idiva_" . $sc_seq_vert . "\" class=\"css_idiva__line\" style=\"" .  $sStyleReadLab_idiva_ . "\">" . $this->form_format_readonly("idiva_", $this->form_encode_input($idiva__look)) . "</span><span id=\"id_read_off_idiva_" . $sc_seq_vert . "\" class=\"css_read_off_idiva_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idiva_ . "\">";
   echo " <span id=\"idAjaxSelect_idiva_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idiva__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idiva_" . $sc_seq_vert . "\" name=\"idiva_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idiva_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idiva_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idiva_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idiva_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['imagenprod_']) && $this->nmgp_cmp_hidden['imagenprod_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imagenprod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($imagenprod_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_imagenprod__line" id="hidden_field_data_imagenprod_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_imagenprod_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_imagenprod__line" style="vertical-align: top;padding: 0px">
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_imagenprod_" . $sc_seq_vert . "" => $out1_imagenprod_); ?><script>var var_ajax_img_imagenprod_<?php echo $sc_seq_vert; ?> = '<?php echo $out1_imagenprod_; ?>';</script><input type="hidden" name="temp_out_imagenprod_" value="<?php echo $this->form_encode_input($out_imagenprod_); ?>" /><input type="hidden" name="temp_out1_imagenprod_" value="<?php echo $this->form_encode_input($out1_imagenprod_); ?>" /><?php if (!empty($out_imagenprod_)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_imagenprod_" . $sc_seq_vert . ", '" . $this->nmgp_return_img['imagenprod_'][0] . "', '" . $this->nmgp_return_img['imagenprod_'][1] . "')\"><img id=\"id_ajax_img_imagenprod_" . $sc_seq_vert . "\"  border=\"0\" src=\"$out_imagenprod_\"></a>"; } else {  echo "<img id=\"id_ajax_img_imagenprod_" . $sc_seq_vert . "\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly_imagenprod_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imagenprod_"]) &&  $this->nmgp_cmp_readonly["imagenprod_"] == "on") { 

 ?>
<img id=\"imagenprod_<?php echo $sc_seq_vert ?><?php echo $sc_seq_vert; ?>_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="imagenprod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($imagenprod_) . "\">" . $imagenprod_ . ""; ?>
<?php } else { ?>
<span id="id_read_off_imagenprod_<?php echo $sc_seq_vert ?>" class="css_read_off_imagenprod_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_imagenprod_; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-imagenprod_<?php echo $sc_seq_vert ?>" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOddMult css_imagenprod__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" type="file" name="imagenprod_<?php echo $sc_seq_vert ?>[]" id="id_sc_field_imagenprod_<?php echo $sc_seq_vert ?>" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "nm_check_insert(" . $sc_seq_vert . ");";
?>
<span id="chk_ajax_img_imagenprod_<?php echo $sc_seq_vert; ?>"<?php if ($this->nmgp_opcao == "novo" || empty($imagenprod_)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="imagenprod__limpa<?php echo $sc_seq_vert ?>" value="<?php echo $imagenprod__limpa . '" '; if ($imagenprod__limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="imagenprod_<?php echo $sc_seq_vert ?><?php echo $sc_seq_vert; ?>_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_imagenprod_<?php echo $sc_seq_vert; ?>" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_imagenprod_<?php echo $sc_seq_vert; ?>" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_imagenprod_<?php echo $sc_seq_vert; ?>" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_imagenprod_ ?>"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imagenprod_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imagenprod_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_codigobar_))
       {
           $this->nmgp_cmp_readonly['codigobar_'] = $sCheckRead_codigobar_;
       }
       if ('display: none;' == $sStyleHidden_codigobar_)
       {
           $this->nmgp_cmp_hidden['codigobar_'] = 'off';
       }
       if (isset($sCheckRead_nompro_))
       {
           $this->nmgp_cmp_readonly['nompro_'] = $sCheckRead_nompro_;
       }
       if ('display: none;' == $sStyleHidden_nompro_)
       {
           $this->nmgp_cmp_hidden['nompro_'] = 'off';
       }
       if (isset($sCheckRead_unimen_))
       {
           $this->nmgp_cmp_readonly['unimen_'] = $sCheckRead_unimen_;
       }
       if ('display: none;' == $sStyleHidden_unimen_)
       {
           $this->nmgp_cmp_hidden['unimen_'] = 'off';
       }
       if (isset($sCheckRead_unidad__))
       {
           $this->nmgp_cmp_readonly['unidad__'] = $sCheckRead_unidad__;
       }
       if ('display: none;' == $sStyleHidden_unidad__)
       {
           $this->nmgp_cmp_hidden['unidad__'] = 'off';
       }
       if (isset($sCheckRead_costomen_))
       {
           $this->nmgp_cmp_readonly['costomen_'] = $sCheckRead_costomen_;
       }
       if ('display: none;' == $sStyleHidden_costomen_)
       {
           $this->nmgp_cmp_hidden['costomen_'] = 'off';
       }
       if (isset($sCheckRead_preciomen_))
       {
           $this->nmgp_cmp_readonly['preciomen_'] = $sCheckRead_preciomen_;
       }
       if ('display: none;' == $sStyleHidden_preciomen_)
       {
           $this->nmgp_cmp_hidden['preciomen_'] = 'off';
       }
       if (isset($sCheckRead_idgrup_))
       {
           $this->nmgp_cmp_readonly['idgrup_'] = $sCheckRead_idgrup_;
       }
       if ('display: none;' == $sStyleHidden_idgrup_)
       {
           $this->nmgp_cmp_hidden['idgrup_'] = 'off';
       }
       if (isset($sCheckRead_idiva_))
       {
           $this->nmgp_cmp_readonly['idiva_'] = $sCheckRead_idiva_;
       }
       if ('display: none;' == $sStyleHidden_idiva_)
       {
           $this->nmgp_cmp_hidden['idiva_'] = 'off';
       }
       if (isset($sCheckRead_imagenprod_))
       {
           $this->nmgp_cmp_readonly['imagenprod_'] = $sCheckRead_imagenprod_;
       }
       if ('display: none;' == $sStyleHidden_imagenprod_)
       {
           $this->nmgp_cmp_hidden['imagenprod_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_productos_simple = $guarda_form_vert_form_productos_simple;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_productos_simple");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_productos_simple");
 parent.scAjaxDetailHeight("form_productos_simple", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_productos_simple", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_productos_simple", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['sc_modal'])
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
			do_ajax_form_productos_simple_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-6").length && $("#sc_b_del_t.sc-unique-btn-6").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-14").length && $("#sc_b_avc_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-15").length && $("#sc_b_fim_b.sc-unique-btn-15").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_simple']['buttonStatus'] = $this->nmgp_botoes;
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
