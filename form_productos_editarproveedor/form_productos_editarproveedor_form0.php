<?php
class form_productos_editarproveedor_form extends form_productos_editarproveedor_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Actualizar Proveedor Y Costo"); } else { echo strip_tags("Actualizar Proveedor Y Costo"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_productos_editarproveedor/form_productos_editarproveedor_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_productos_editarproveedor_sajax_js.php");
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

include_once('form_productos_editarproveedor_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_productos_editarproveedor_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_productos_editarproveedor'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_productos_editarproveedor'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Actualizar Proveedor Y Costo"; } else { echo "Actualizar Proveedor Y Costo"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['fast_search'][2] : "";
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
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['idpro2_']))
   {
       $this->nmgp_cmp_hidden['idpro2_'] = 'off';
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
          $this->nm_new_label['codigobar_'] = "CodBarra"; } ?>

    <TD class="scFormLabelOddMult css_codigobar__label" id="hidden_field_label_codigobar_" style="<?php echo $sStyleHidden_codigobar_; ?>" > <?php echo $this->nm_new_label['codigobar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['codigoprod_']) && $this->nmgp_cmp_hidden['codigoprod_'] == 'off') { $sStyleHidden_codigoprod_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codigoprod_']) || $this->nmgp_cmp_hidden['codigoprod_'] == 'on') {
      if (!isset($this->nm_new_label['codigoprod_'])) {
          $this->nm_new_label['codigoprod_'] = "Código o Ref"; } ?>

    <TD class="scFormLabelOddMult css_codigoprod__label" id="hidden_field_label_codigoprod_" style="<?php echo $sStyleHidden_codigoprod_; ?>" > <?php echo $this->nm_new_label['codigoprod_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nompro_']) && $this->nmgp_cmp_hidden['nompro_'] == 'off') { $sStyleHidden_nompro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nompro_']) || $this->nmgp_cmp_hidden['nompro_'] == 'on') {
      if (!isset($this->nm_new_label['nompro_'])) {
          $this->nm_new_label['nompro_'] = "Descripción"; } ?>

    <TD class="scFormLabelOddMult css_nompro__label" id="hidden_field_label_nompro_" style="<?php echo $sStyleHidden_nompro_; ?>" > <?php echo $this->nm_new_label['nompro_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idpro1_']) && $this->nmgp_cmp_hidden['idpro1_'] == 'off') { $sStyleHidden_idpro1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idpro1_']) || $this->nmgp_cmp_hidden['idpro1_'] == 'on') {
      if (!isset($this->nm_new_label['idpro1_'])) {
          $this->nm_new_label['idpro1_'] = "Proveedor"; } ?>

    <TD class="scFormLabelOddMult css_idpro1__label" id="hidden_field_label_idpro1_" style="<?php echo $sStyleHidden_idpro1_; ?>" > <?php echo $this->nm_new_label['idpro1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idpro2_']) && $this->nmgp_cmp_hidden['idpro2_'] == 'off') { $sStyleHidden_idpro2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idpro2_']) || $this->nmgp_cmp_hidden['idpro2_'] == 'on') {
      if (!isset($this->nm_new_label['idpro2_'])) {
          $this->nm_new_label['idpro2_'] = "Proveedor secundario"; } ?>

    <TD class="scFormLabelOddMult css_idpro2__label" id="hidden_field_label_idpro2_" style="<?php echo $sStyleHidden_idpro2_; ?>" > <?php echo $this->nm_new_label['idpro2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['costomen_']) && $this->nmgp_cmp_hidden['costomen_'] == 'off') { $sStyleHidden_costomen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['costomen_']) || $this->nmgp_cmp_hidden['costomen_'] == 'on') {
      if (!isset($this->nm_new_label['costomen_'])) {
          $this->nm_new_label['costomen_'] = "Costo"; } ?>

    <TD class="scFormLabelOddMult css_costomen__label" id="hidden_field_label_costomen_" style="<?php echo $sStyleHidden_costomen_; ?>" > <?php echo $this->nm_new_label['costomen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['unimay_']) && $this->nmgp_cmp_hidden['unimay_'] == 'off') { $sStyleHidden_unimay_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['unimay_']) || $this->nmgp_cmp_hidden['unimay_'] == 'on') {
      if (!isset($this->nm_new_label['unimay_'])) {
          $this->nm_new_label['unimay_'] = "UND Mayor"; } ?>

    <TD class="scFormLabelOddMult css_unimay__label" id="hidden_field_label_unimay_" style="<?php echo $sStyleHidden_unimay_; ?>" > <?php echo $this->nm_new_label['unimay_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_productos_editarproveedor);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_productos_editarproveedor = $this->form_vert_form_productos_editarproveedor;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_productos_editarproveedor))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['unimay_']))
           {
               $this->nmgp_cmp_readonly['unimay_'] = 'on';
           }
   foreach ($this->form_vert_form_productos_editarproveedor as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idprod_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['idprod_'];
       $this->unidmaymen_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['unidmaymen_'];
       $this->unimen_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['unimen_'];
       $this->costomay_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['costomay_'];
       $this->recmayamen_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['recmayamen_'];
       $this->preciomen_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['preciomen_'];
       $this->preciomen2_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['preciomen2_'];
       $this->preciomen3_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['preciomen3_'];
       $this->precio2_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['precio2_'];
       $this->preciomay_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['preciomay_'];
       $this->preciofull_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['preciofull_'];
       $this->stockmay_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['stockmay_'];
       $this->stockmen_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['stockmen_'];
       $this->idgrup_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['idgrup_'];
       $this->idiva_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['idiva_'];
       $this->otro_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['otro_'];
       $this->otro2_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['otro2_'];
       $this->colores_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['colores_'];
       $this->tallas_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['tallas_'];
       $this->sabores_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['sabores_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['codigobar_'] = true;
           $this->nmgp_cmp_readonly['codigoprod_'] = true;
           $this->nmgp_cmp_readonly['nompro_'] = true;
           $this->nmgp_cmp_readonly['idpro1_'] = true;
           $this->nmgp_cmp_readonly['idpro2_'] = true;
           $this->nmgp_cmp_readonly['costomen_'] = true;
           $this->nmgp_cmp_readonly['unimay_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['codigobar_']) || $this->nmgp_cmp_readonly['codigobar_'] != "on") {$this->nmgp_cmp_readonly['codigobar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codigoprod_']) || $this->nmgp_cmp_readonly['codigoprod_'] != "on") {$this->nmgp_cmp_readonly['codigoprod_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nompro_']) || $this->nmgp_cmp_readonly['nompro_'] != "on") {$this->nmgp_cmp_readonly['nompro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idpro1_']) || $this->nmgp_cmp_readonly['idpro1_'] != "on") {$this->nmgp_cmp_readonly['idpro1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idpro2_']) || $this->nmgp_cmp_readonly['idpro2_'] != "on") {$this->nmgp_cmp_readonly['idpro2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['costomen_']) || $this->nmgp_cmp_readonly['costomen_'] != "on") {$this->nmgp_cmp_readonly['costomen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['unimay_']) || $this->nmgp_cmp_readonly['unimay_'] != "on") {$this->nmgp_cmp_readonly['unimay_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->codigobar_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['codigobar_']; 
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
       $this->codigoprod_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['codigoprod_']; 
       $codigoprod_ = $this->codigoprod_; 
       $sStyleHidden_codigoprod_ = '';
       if (isset($sCheckRead_codigoprod_))
       {
           unset($sCheckRead_codigoprod_);
       }
       if (isset($this->nmgp_cmp_readonly['codigoprod_']))
       {
           $sCheckRead_codigoprod_ = $this->nmgp_cmp_readonly['codigoprod_'];
       }
       if (isset($this->nmgp_cmp_hidden['codigoprod_']) && $this->nmgp_cmp_hidden['codigoprod_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codigoprod_']);
           $sStyleHidden_codigoprod_ = 'display: none;';
       }
       $bTestReadOnly_codigoprod_ = true;
       $sStyleReadLab_codigoprod_ = 'display: none;';
       $sStyleReadInp_codigoprod_ = '';
       if (isset($this->nmgp_cmp_readonly['codigoprod_']) && $this->nmgp_cmp_readonly['codigoprod_'] == 'on')
       {
           $bTestReadOnly_codigoprod_ = false;
           unset($this->nmgp_cmp_readonly['codigoprod_']);
           $sStyleReadLab_codigoprod_ = '';
           $sStyleReadInp_codigoprod_ = 'display: none;';
       }
       $this->nompro_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['nompro_']; 
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
       $this->idpro1_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['idpro1_']; 
       $idpro1_ = $this->idpro1_; 
       $sStyleHidden_idpro1_ = '';
       if (isset($sCheckRead_idpro1_))
       {
           unset($sCheckRead_idpro1_);
       }
       if (isset($this->nmgp_cmp_readonly['idpro1_']))
       {
           $sCheckRead_idpro1_ = $this->nmgp_cmp_readonly['idpro1_'];
       }
       if (isset($this->nmgp_cmp_hidden['idpro1_']) && $this->nmgp_cmp_hidden['idpro1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idpro1_']);
           $sStyleHidden_idpro1_ = 'display: none;';
       }
       $bTestReadOnly_idpro1_ = true;
       $sStyleReadLab_idpro1_ = 'display: none;';
       $sStyleReadInp_idpro1_ = '';
       if (isset($this->nmgp_cmp_readonly['idpro1_']) && $this->nmgp_cmp_readonly['idpro1_'] == 'on')
       {
           $bTestReadOnly_idpro1_ = false;
           unset($this->nmgp_cmp_readonly['idpro1_']);
           $sStyleReadLab_idpro1_ = '';
           $sStyleReadInp_idpro1_ = 'display: none;';
       }
       $this->idpro2_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['idpro2_']; 
       $idpro2_ = $this->idpro2_; 
       if (!isset($this->nmgp_cmp_hidden['idpro2_']))
       {
           $this->nmgp_cmp_hidden['idpro2_'] = 'off';
       }
       $sStyleHidden_idpro2_ = '';
       if (isset($sCheckRead_idpro2_))
       {
           unset($sCheckRead_idpro2_);
       }
       if (isset($this->nmgp_cmp_readonly['idpro2_']))
       {
           $sCheckRead_idpro2_ = $this->nmgp_cmp_readonly['idpro2_'];
       }
       if (isset($this->nmgp_cmp_hidden['idpro2_']) && $this->nmgp_cmp_hidden['idpro2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idpro2_']);
           $sStyleHidden_idpro2_ = 'display: none;';
       }
       $bTestReadOnly_idpro2_ = true;
       $sStyleReadLab_idpro2_ = 'display: none;';
       $sStyleReadInp_idpro2_ = '';
       if (isset($this->nmgp_cmp_readonly['idpro2_']) && $this->nmgp_cmp_readonly['idpro2_'] == 'on')
       {
           $bTestReadOnly_idpro2_ = false;
           unset($this->nmgp_cmp_readonly['idpro2_']);
           $sStyleReadLab_idpro2_ = '';
           $sStyleReadInp_idpro2_ = 'display: none;';
       }
       $this->costomen_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['costomen_']; 
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
       $this->unimay_ = $this->form_vert_form_productos_editarproveedor[$sc_seq_vert]['unimay_']; 
       $unimay_ = $this->unimay_; 
       $sStyleHidden_unimay_ = '';
       if (isset($sCheckRead_unimay_))
       {
           unset($sCheckRead_unimay_);
       }
       if (isset($this->nmgp_cmp_readonly['unimay_']))
       {
           $sCheckRead_unimay_ = $this->nmgp_cmp_readonly['unimay_'];
       }
       if (isset($this->nmgp_cmp_hidden['unimay_']) && $this->nmgp_cmp_hidden['unimay_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['unimay_']);
           $sStyleHidden_unimay_ = 'display: none;';
       }
       $bTestReadOnly_unimay_ = true;
       $sStyleReadLab_unimay_ = 'display: none;';
       $sStyleReadInp_unimay_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["unimay_"]) &&  $this->nmgp_cmp_readonly["unimay_"] == "on"))
       {
           $bTestReadOnly_unimay_ = false;
           unset($this->nmgp_cmp_readonly['unimay_']);
           $sStyleReadLab_unimay_ = '';
           $sStyleReadInp_unimay_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_productos_editarproveedor_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_productos_editarproveedor_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_productos_editarproveedor_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_productos_editarproveedor_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_productos_editarproveedor_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_productos_editarproveedor_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['codigobar_']) && $this->nmgp_cmp_hidden['codigobar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigobar__line" id="hidden_field_data_codigobar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigobar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigobar__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="codigobar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigobar_); ?>"><span id="id_ajax_label_codigobar_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($codigobar_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigobar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigobar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codigoprod_']) && $this->nmgp_cmp_hidden['codigoprod_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigoprod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigoprod_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codigoprod__line" id="hidden_field_data_codigoprod_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codigoprod_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codigoprod__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="codigoprod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codigoprod_); ?>"><span id="id_ajax_label_codigoprod_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($codigoprod_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigoprod_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigoprod_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nompro_']) && $this->nmgp_cmp_hidden['nompro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nompro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nompro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nompro__line" id="hidden_field_data_nompro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nompro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nompro__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="nompro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nompro_); ?>"><span id="id_ajax_label_nompro_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($nompro_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nompro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nompro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idpro1_']) && $this->nmgp_cmp_hidden['idpro1_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idpro1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idpro1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idpro1__line" id="hidden_field_data_idpro1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idpro1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idpro1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idpro1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro1_"]) &&  $this->nmgp_cmp_readonly["idpro1_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_'] = array(); 
    }

   $old_value_idpro2_ = $this->idpro2_;
   $old_value_costomen_ = $this->costomen_;
   $this->nm_tira_formatacao();


   $unformatted_value_idpro2_ = $this->idpro2_;
   $unformatted_value_costomen_ = $this->costomen_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + nombres  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, nombres)  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&nombres  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||nombres  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + nombres  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||nombres  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||nombres  FROM terceros WHERE proveedor='SI' ORDER BY documento, nombres";
   }

   $this->idpro2_ = $old_value_idpro2_;
   $this->costomen_ = $old_value_costomen_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lookup_idpro1_'][] = $rs->fields[0];
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
   $idpro1__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpro1__1))
          {
              foreach ($this->idpro1__1 as $tmp_idpro1_)
              {
                  if (trim($tmp_idpro1_) === trim($cadaselect[1])) { $idpro1__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpro1_) === trim($cadaselect[1])) { $idpro1__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idpro1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro1_) . "\">" . $idpro1__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idpro1_();
   $x = 0 ; 
   $idpro1__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpro1__1))
          {
              foreach ($this->idpro1__1 as $tmp_idpro1_)
              {
                  if (trim($tmp_idpro1_) === trim($cadaselect[1])) { $idpro1__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpro1_) === trim($cadaselect[1])) { $idpro1__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idpro1__look))
          {
              $idpro1__look = $this->idpro1_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idpro1_" . $sc_seq_vert . "\" class=\"css_idpro1__line\" style=\"" .  $sStyleReadLab_idpro1_ . "\">" . $this->form_format_readonly("idpro1_", $this->form_encode_input($idpro1__look)) . "</span><span id=\"id_read_off_idpro1_" . $sc_seq_vert . "\" class=\"css_read_off_idpro1_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idpro1_ . "\">";
   echo " <span id=\"idAjaxSelect_idpro1_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idpro1__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idpro1_" . $sc_seq_vert . "\" name=\"idpro1_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idpro1_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idpro1_)) 
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
   if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_editarproveedor_lkpedt_refresh_idpro1_*scoutnmgp_url_saida*scin*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_productos_editarproveedor@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_productos_editarproveedor_lkpedt_refresh_idpro1_*scoutnmgp_url_saida*scin*scoutnm_evt_ret_row*scin" . $sc_seq_vert . "*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "fldedt_idpro1_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idpro2_']) && $this->nmgp_cmp_hidden['idpro2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpro2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idpro2__line" id="hidden_field_data_idpro2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idpro2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idpro2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idpro2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpro2_"]) &&  $this->nmgp_cmp_readonly["idpro2_"] == "on") { 

 ?>
<input type="hidden" name="idpro2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro2_) . "\">" . $idpro2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_idpro2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idpro2_<?php echo $sc_seq_vert ?> css_idpro2__line" style="<?php echo $sStyleReadLab_idpro2_; ?>"><?php echo $this->form_format_readonly("idpro2_", $this->form_encode_input($this->idpro2_)); ?></span><span id="id_read_off_idpro2_<?php echo $sc_seq_vert ?>" class="css_read_off_idpro2_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idpro2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idpro2__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idpro2_<?php echo $sc_seq_vert ?>" type=text name="idpro2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpro2_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idpro2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idpro2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idpro2_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['costomen_']) && $this->nmgp_cmp_hidden['costomen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costomen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_costomen__line" id="hidden_field_data_costomen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_costomen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_costomen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_costomen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costomen_"]) &&  $this->nmgp_cmp_readonly["costomen_"] == "on") { 

 ?>
<input type="hidden" name="costomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costomen_) . "\">" . $costomen_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_costomen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-costomen_<?php echo $sc_seq_vert ?> css_costomen__line" style="<?php echo $sStyleReadLab_costomen_; ?>"><?php echo $this->form_format_readonly("costomen_", $this->form_encode_input($this->costomen_)); ?></span><span id="id_read_off_costomen_<?php echo $sc_seq_vert ?>" class="css_read_off_costomen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costomen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_costomen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costomen_<?php echo $sc_seq_vert ?>" type=text name="costomen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costomen_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['costomen_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['costomen_']['format_pos'] || 3 == $this->field_config['costomen_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 10, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['costomen_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['costomen_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['costomen_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['costomen_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('costomen_')", "nm_mostra_mens('costomen_')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costomen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costomen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['unimay_']) && $this->nmgp_cmp_hidden['unimay_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unimay_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unimay_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_unimay__line" id="hidden_field_data_unimay_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_unimay_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_unimay__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_unimay_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["unimay_"]) &&  $this->nmgp_cmp_readonly["unimay_"] == "on")) { 

 ?>
<input type="hidden" name="unimay_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unimay_) . "\"><span id=\"id_ajax_label_unimay_" . $sc_seq_vert . "\">" . $unimay_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_unimay_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-unimay_<?php echo $sc_seq_vert ?> css_unimay__line" style="<?php echo $sStyleReadLab_unimay_; ?>"><?php echo $this->form_format_readonly("unimay_", $this->form_encode_input($this->unimay_)); ?></span><span id="id_read_off_unimay_<?php echo $sc_seq_vert ?>" class="css_read_off_unimay_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unimay_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_unimay__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unimay_<?php echo $sc_seq_vert ?>" type=text name="unimay_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unimay_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unimay_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unimay_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
       if (isset($sCheckRead_codigoprod_))
       {
           $this->nmgp_cmp_readonly['codigoprod_'] = $sCheckRead_codigoprod_;
       }
       if ('display: none;' == $sStyleHidden_codigoprod_)
       {
           $this->nmgp_cmp_hidden['codigoprod_'] = 'off';
       }
       if (isset($sCheckRead_nompro_))
       {
           $this->nmgp_cmp_readonly['nompro_'] = $sCheckRead_nompro_;
       }
       if ('display: none;' == $sStyleHidden_nompro_)
       {
           $this->nmgp_cmp_hidden['nompro_'] = 'off';
       }
       if (isset($sCheckRead_idpro1_))
       {
           $this->nmgp_cmp_readonly['idpro1_'] = $sCheckRead_idpro1_;
       }
       if ('display: none;' == $sStyleHidden_idpro1_)
       {
           $this->nmgp_cmp_hidden['idpro1_'] = 'off';
       }
       if (isset($sCheckRead_idpro2_))
       {
           $this->nmgp_cmp_readonly['idpro2_'] = $sCheckRead_idpro2_;
       }
       if ('display: none;' == $sStyleHidden_idpro2_)
       {
           $this->nmgp_cmp_hidden['idpro2_'] = 'off';
       }
       if (isset($sCheckRead_costomen_))
       {
           $this->nmgp_cmp_readonly['costomen_'] = $sCheckRead_costomen_;
       }
       if ('display: none;' == $sStyleHidden_costomen_)
       {
           $this->nmgp_cmp_hidden['costomen_'] = 'off';
       }
       if (isset($sCheckRead_unimay_))
       {
           $this->nmgp_cmp_readonly['unimay_'] = $sCheckRead_unimay_;
       }
       if ('display: none;' == $sStyleHidden_unimay_)
       {
           $this->nmgp_cmp_hidden['unimay_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_productos_editarproveedor = $guarda_form_vert_form_productos_editarproveedor;
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R")
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
              $obj_sel = ($this->sc_max_reg == '25') ? " selected" : "";
?> 
           <option value="25" <?php echo $obj_sel ?>>25</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '100') ? " selected" : "";
?> 
           <option value="100" <?php echo $obj_sel ?>>100</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '200') ? " selected" : "";
?> 
           <option value="200" <?php echo $obj_sel ?>>200</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '300') ? " selected" : "";
?> 
           <option value="300" <?php echo $obj_sel ?>>300</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '500') ? " selected" : "";
?> 
           <option value="500" <?php echo $obj_sel ?>>500</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '1000') ? " selected" : "";
?> 
           <option value="1000" <?php echo $obj_sel ?>>1000</option>
<?php 
              $obj_sel = ($this->form_paginacao == 'total') ? " selected" : "";
?> 
           <option value="all" <?php echo $obj_sel ?>>all</option>
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_productos_editarproveedor");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_productos_editarproveedor");
 parent.scAjaxDetailHeight("form_productos_editarproveedor", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_productos_editarproveedor", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_productos_editarproveedor", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['sc_modal'])
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-2").length && $("#sys_separator.sc-unique-btn-2").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-6").length && $("#sc_b_ini_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-7").length && $("#sc_b_ret_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-8").length && $("#sc_b_avc_b.sc-unique-btn-8").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-9").length && $("#sc_b_fim_b.sc-unique-btn-9").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_editarproveedor']['buttonStatus'] = $this->nmgp_botoes;
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
