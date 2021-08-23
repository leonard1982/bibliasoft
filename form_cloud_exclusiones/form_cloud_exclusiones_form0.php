<?php
class form_cloud_exclusiones_form extends form_cloud_exclusiones_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Exclusiones"); } else { echo strip_tags("Exclusiones"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['sc_redir_atualiz'] == 'ok')
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
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
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
.css_read_off_editado_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cloud_exclusiones/form_cloud_exclusiones_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cloud_exclusiones_sajax_js.php");
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

include_once('form_cloud_exclusiones_jquery.php');

?>
var applicationKeys = "";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
    return false;
}

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_cloud_exclusiones_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
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
$_SESSION['scriptcase']['error_span_title']['form_cloud_exclusiones'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cloud_exclusiones'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['maximized']))
  {
?>
<tr><td>
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR valign="middle">
        <TD align="left" rowspan="3" class="scFormHeaderFont">
          
        </TD>
        <TD align="left" class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "Exclusiones"; } else { echo "Exclusiones"; } ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          <?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__exit_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__exit_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__exit_32.png';}?>" BORDER="0"/>
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scFormHeaderFont">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scFormHeaderFont">
          
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['fast_search'][2] : "";
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
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="20" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
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
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_exclusion_']))
   {
       $this->nmgp_cmp_hidden['id_exclusion_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['descripcion_']))
   {
       $this->nmgp_cmp_hidden['descripcion_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_empresa_']))
   {
       $this->nmgp_cmp_hidden['id_empresa_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['deslinea_']))
   {
       $this->nmgp_cmp_hidden['deslinea_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['creado_']))
   {
       $this->nmgp_cmp_hidden['creado_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['editado_']))
   {
       $this->nmgp_cmp_hidden['editado_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
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
   <?php if ((!isset($this->nmgp_cmp_hidden['id_exclusion_']) || $this->nmgp_cmp_hidden['id_exclusion_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_exclusion_'])) {
          $this->nm_new_label['id_exclusion_'] = "Id Exclusion"; } ?>

    <TD class="scFormLabelOddMult css_id_exclusion__label" id="hidden_field_label_id_exclusion_" style="<?php echo $sStyleHidden_id_exclusion_; ?>" > <?php echo $this->nm_new_label['id_exclusion_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codproducto_']) && $this->nmgp_cmp_hidden['codproducto_'] == 'off') { $sStyleHidden_codproducto_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codproducto_']) || $this->nmgp_cmp_hidden['codproducto_'] == 'on') {
      if (!isset($this->nm_new_label['codproducto_'])) {
          $this->nm_new_label['codproducto_'] = "Producto"; } ?>

    <TD class="scFormLabelOddMult css_codproducto__label" id="hidden_field_label_codproducto_" style="<?php echo $sStyleHidden_codproducto_; ?>" > <?php echo $this->nm_new_label['codproducto_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sStyleHidden_descripcion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descripcion_']) || $this->nmgp_cmp_hidden['descripcion_'] == 'on') {
      if (!isset($this->nm_new_label['descripcion_'])) {
          $this->nm_new_label['descripcion_'] = "Descripcion"; } ?>

    <TD class="scFormLabelOddMult css_descripcion__label" id="hidden_field_label_descripcion_" style="<?php echo $sStyleHidden_descripcion_; ?>" > <?php echo $this->nm_new_label['descripcion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_empresa_']) && $this->nmgp_cmp_hidden['id_empresa_'] == 'off') { $sStyleHidden_id_empresa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_empresa_']) || $this->nmgp_cmp_hidden['id_empresa_'] == 'on') {
      if (!isset($this->nm_new_label['id_empresa_'])) {
          $this->nm_new_label['id_empresa_'] = "Id Empresa"; } ?>

    <TD class="scFormLabelOddMult css_id_empresa__label" id="hidden_field_label_id_empresa_" style="<?php echo $sStyleHidden_id_empresa_; ?>" > <?php echo $this->nm_new_label['id_empresa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sStyleHidden_tipo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_']) || $this->nmgp_cmp_hidden['tipo_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_'])) {
          $this->nm_new_label['tipo_'] = "Tipo"; } ?>

    <TD class="scFormLabelOddMult css_tipo__label" id="hidden_field_label_tipo_" style="<?php echo $sStyleHidden_tipo_; ?>" > <?php echo $this->nm_new_label['tipo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_mandatorio_']) && $this->nmgp_cmp_hidden['id_mandatorio_'] == 'off') { $sStyleHidden_id_mandatorio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_mandatorio_']) || $this->nmgp_cmp_hidden['id_mandatorio_'] == 'on') {
      if (!isset($this->nm_new_label['id_mandatorio_'])) {
          $this->nm_new_label['id_mandatorio_'] = "Id Mandatorio"; } ?>

    <TD class="scFormLabelOddMult css_id_mandatorio__label" id="hidden_field_label_id_mandatorio_" style="<?php echo $sStyleHidden_id_mandatorio_; ?>" > <?php echo $this->nm_new_label['id_mandatorio_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dv_mandatorio_']) && $this->nmgp_cmp_hidden['dv_mandatorio_'] == 'off') { $sStyleHidden_dv_mandatorio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dv_mandatorio_']) || $this->nmgp_cmp_hidden['dv_mandatorio_'] == 'on') {
      if (!isset($this->nm_new_label['dv_mandatorio_'])) {
          $this->nm_new_label['dv_mandatorio_'] = "Dv"; } ?>

    <TD class="scFormLabelOddMult css_dv_mandatorio__label" id="hidden_field_label_dv_mandatorio_" style="<?php echo $sStyleHidden_dv_mandatorio_; ?>" > <?php echo $this->nm_new_label['dv_mandatorio_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_id_']) && $this->nmgp_cmp_hidden['tipo_id_'] == 'off') { $sStyleHidden_tipo_id_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_id_']) || $this->nmgp_cmp_hidden['tipo_id_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_id_'])) {
          $this->nm_new_label['tipo_id_'] = "Tipo Id"; } ?>

    <TD class="scFormLabelOddMult css_tipo_id__label" id="hidden_field_label_tipo_id_" style="<?php echo $sStyleHidden_tipo_id_; ?>" > <?php echo $this->nm_new_label['tipo_id_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['codlinea_']) && $this->nmgp_cmp_hidden['codlinea_'] == 'off') { $sStyleHidden_codlinea_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['codlinea_']) || $this->nmgp_cmp_hidden['codlinea_'] == 'on') {
      if (!isset($this->nm_new_label['codlinea_'])) {
          $this->nm_new_label['codlinea_'] = "Linea"; } ?>

    <TD class="scFormLabelOddMult css_codlinea__label" id="hidden_field_label_codlinea_" style="<?php echo $sStyleHidden_codlinea_; ?>" > <?php echo $this->nm_new_label['codlinea_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['deslinea_']) && $this->nmgp_cmp_hidden['deslinea_'] == 'off') { $sStyleHidden_deslinea_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['deslinea_']) || $this->nmgp_cmp_hidden['deslinea_'] == 'on') {
      if (!isset($this->nm_new_label['deslinea_'])) {
          $this->nm_new_label['deslinea_'] = "Deslinea"; } ?>

    <TD class="scFormLabelOddMult css_deslinea__label" id="hidden_field_label_deslinea_" style="<?php echo $sStyleHidden_deslinea_; ?>" > <?php echo $this->nm_new_label['deslinea_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['creado_']) && $this->nmgp_cmp_hidden['creado_'] == 'off') { $sStyleHidden_creado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['creado_']) || $this->nmgp_cmp_hidden['creado_'] == 'on') {
      if (!isset($this->nm_new_label['creado_'])) {
          $this->nm_new_label['creado_'] = "Creado"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['creado_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_creado__label" id="hidden_field_label_creado_" style="<?php echo $sStyleHidden_creado_; ?>" > <?php echo $this->nm_new_label['creado_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['editado_']) && $this->nmgp_cmp_hidden['editado_'] == 'off') { $sStyleHidden_editado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['editado_']) || $this->nmgp_cmp_hidden['editado_'] == 'on') {
      if (!isset($this->nm_new_label['editado_'])) {
          $this->nm_new_label['editado_'] = "Editado"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['editado_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_editado__label" id="hidden_field_label_editado_" style="<?php echo $sStyleHidden_editado_; ?>" > <?php echo $this->nm_new_label['editado_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
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
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_cloud_exclusiones);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_cloud_exclusiones = $this->form_vert_form_cloud_exclusiones;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_cloud_exclusiones))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_exclusion_']))
           {
               $this->nmgp_cmp_readonly['id_exclusion_'] = 'on';
           }
   foreach ($this->form_vert_form_cloud_exclusiones as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_exclusion_'] = true;
           $this->nmgp_cmp_readonly['codproducto_'] = true;
           $this->nmgp_cmp_readonly['descripcion_'] = true;
           $this->nmgp_cmp_readonly['id_empresa_'] = true;
           $this->nmgp_cmp_readonly['tipo_'] = true;
           $this->nmgp_cmp_readonly['id_mandatorio_'] = true;
           $this->nmgp_cmp_readonly['dv_mandatorio_'] = true;
           $this->nmgp_cmp_readonly['tipo_id_'] = true;
           $this->nmgp_cmp_readonly['codlinea_'] = true;
           $this->nmgp_cmp_readonly['deslinea_'] = true;
           $this->nmgp_cmp_readonly['creado_'] = true;
           $this->nmgp_cmp_readonly['editado_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_exclusion_']) || $this->nmgp_cmp_readonly['id_exclusion_'] != "on") {$this->nmgp_cmp_readonly['id_exclusion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codproducto_']) || $this->nmgp_cmp_readonly['codproducto_'] != "on") {$this->nmgp_cmp_readonly['codproducto_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descripcion_']) || $this->nmgp_cmp_readonly['descripcion_'] != "on") {$this->nmgp_cmp_readonly['descripcion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_empresa_']) || $this->nmgp_cmp_readonly['id_empresa_'] != "on") {$this->nmgp_cmp_readonly['id_empresa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_']) || $this->nmgp_cmp_readonly['tipo_'] != "on") {$this->nmgp_cmp_readonly['tipo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_mandatorio_']) || $this->nmgp_cmp_readonly['id_mandatorio_'] != "on") {$this->nmgp_cmp_readonly['id_mandatorio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dv_mandatorio_']) || $this->nmgp_cmp_readonly['dv_mandatorio_'] != "on") {$this->nmgp_cmp_readonly['dv_mandatorio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_id_']) || $this->nmgp_cmp_readonly['tipo_id_'] != "on") {$this->nmgp_cmp_readonly['tipo_id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['codlinea_']) || $this->nmgp_cmp_readonly['codlinea_'] != "on") {$this->nmgp_cmp_readonly['codlinea_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['deslinea_']) || $this->nmgp_cmp_readonly['deslinea_'] != "on") {$this->nmgp_cmp_readonly['deslinea_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['creado_']) || $this->nmgp_cmp_readonly['creado_'] != "on") {$this->nmgp_cmp_readonly['creado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['editado_']) || $this->nmgp_cmp_readonly['editado_'] != "on") {$this->nmgp_cmp_readonly['editado_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_exclusion_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['id_exclusion_']; 
       $id_exclusion_ = $this->id_exclusion_; 
       if (!isset($this->nmgp_cmp_hidden['id_exclusion_']))
       {
           $this->nmgp_cmp_hidden['id_exclusion_'] = 'off';
       }
       $sStyleHidden_id_exclusion_ = '';
       if (isset($sCheckRead_id_exclusion_))
       {
           unset($sCheckRead_id_exclusion_);
       }
       if (isset($this->nmgp_cmp_readonly['id_exclusion_']))
       {
           $sCheckRead_id_exclusion_ = $this->nmgp_cmp_readonly['id_exclusion_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_exclusion_']) && $this->nmgp_cmp_hidden['id_exclusion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_exclusion_']);
           $sStyleHidden_id_exclusion_ = 'display: none;';
       }
       $bTestReadOnly_id_exclusion_ = true;
       $sStyleReadLab_id_exclusion_ = 'display: none;';
       $sStyleReadInp_id_exclusion_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_exclusion_"]) &&  $this->nmgp_cmp_readonly["id_exclusion_"] == "on"))
       {
           $bTestReadOnly_id_exclusion_ = false;
           unset($this->nmgp_cmp_readonly['id_exclusion_']);
           $sStyleReadLab_id_exclusion_ = '';
           $sStyleReadInp_id_exclusion_ = 'display: none;';
       }
       $this->codproducto_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['codproducto_']; 
       $codproducto_ = $this->codproducto_; 
       $sStyleHidden_codproducto_ = '';
       if (isset($sCheckRead_codproducto_))
       {
           unset($sCheckRead_codproducto_);
       }
       if (isset($this->nmgp_cmp_readonly['codproducto_']))
       {
           $sCheckRead_codproducto_ = $this->nmgp_cmp_readonly['codproducto_'];
       }
       if (isset($this->nmgp_cmp_hidden['codproducto_']) && $this->nmgp_cmp_hidden['codproducto_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codproducto_']);
           $sStyleHidden_codproducto_ = 'display: none;';
       }
       $bTestReadOnly_codproducto_ = true;
       $sStyleReadLab_codproducto_ = 'display: none;';
       $sStyleReadInp_codproducto_ = '';
       if (isset($this->nmgp_cmp_readonly['codproducto_']) && $this->nmgp_cmp_readonly['codproducto_'] == 'on')
       {
           $bTestReadOnly_codproducto_ = false;
           unset($this->nmgp_cmp_readonly['codproducto_']);
           $sStyleReadLab_codproducto_ = '';
           $sStyleReadInp_codproducto_ = 'display: none;';
       }
       $this->descripcion_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['descripcion_']; 
       $descripcion_ = $this->descripcion_; 
       if (!isset($this->nmgp_cmp_hidden['descripcion_']))
       {
           $this->nmgp_cmp_hidden['descripcion_'] = 'off';
       }
       $sStyleHidden_descripcion_ = '';
       if (isset($sCheckRead_descripcion_))
       {
           unset($sCheckRead_descripcion_);
       }
       if (isset($this->nmgp_cmp_readonly['descripcion_']))
       {
           $sCheckRead_descripcion_ = $this->nmgp_cmp_readonly['descripcion_'];
       }
       if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['descripcion_']);
           $sStyleHidden_descripcion_ = 'display: none;';
       }
       $bTestReadOnly_descripcion_ = true;
       $sStyleReadLab_descripcion_ = 'display: none;';
       $sStyleReadInp_descripcion_ = '';
       if (isset($this->nmgp_cmp_readonly['descripcion_']) && $this->nmgp_cmp_readonly['descripcion_'] == 'on')
       {
           $bTestReadOnly_descripcion_ = false;
           unset($this->nmgp_cmp_readonly['descripcion_']);
           $sStyleReadLab_descripcion_ = '';
           $sStyleReadInp_descripcion_ = 'display: none;';
       }
       $this->id_empresa_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['id_empresa_']; 
       $id_empresa_ = $this->id_empresa_; 
       if (!isset($this->nmgp_cmp_hidden['id_empresa_']))
       {
           $this->nmgp_cmp_hidden['id_empresa_'] = 'off';
       }
       $sStyleHidden_id_empresa_ = '';
       if (isset($sCheckRead_id_empresa_))
       {
           unset($sCheckRead_id_empresa_);
       }
       if (isset($this->nmgp_cmp_readonly['id_empresa_']))
       {
           $sCheckRead_id_empresa_ = $this->nmgp_cmp_readonly['id_empresa_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_empresa_']) && $this->nmgp_cmp_hidden['id_empresa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_empresa_']);
           $sStyleHidden_id_empresa_ = 'display: none;';
       }
       $bTestReadOnly_id_empresa_ = true;
       $sStyleReadLab_id_empresa_ = 'display: none;';
       $sStyleReadInp_id_empresa_ = '';
       if (isset($this->nmgp_cmp_readonly['id_empresa_']) && $this->nmgp_cmp_readonly['id_empresa_'] == 'on')
       {
           $bTestReadOnly_id_empresa_ = false;
           unset($this->nmgp_cmp_readonly['id_empresa_']);
           $sStyleReadLab_id_empresa_ = '';
           $sStyleReadInp_id_empresa_ = 'display: none;';
       }
       $this->tipo_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['tipo_']; 
       $tipo_ = $this->tipo_; 
       $sStyleHidden_tipo_ = '';
       if (isset($sCheckRead_tipo_))
       {
           unset($sCheckRead_tipo_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_']))
       {
           $sCheckRead_tipo_ = $this->nmgp_cmp_readonly['tipo_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_']);
           $sStyleHidden_tipo_ = 'display: none;';
       }
       $bTestReadOnly_tipo_ = true;
       $sStyleReadLab_tipo_ = 'display: none;';
       $sStyleReadInp_tipo_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_']) && $this->nmgp_cmp_readonly['tipo_'] == 'on')
       {
           $bTestReadOnly_tipo_ = false;
           unset($this->nmgp_cmp_readonly['tipo_']);
           $sStyleReadLab_tipo_ = '';
           $sStyleReadInp_tipo_ = 'display: none;';
       }
       $this->id_mandatorio_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['id_mandatorio_']; 
       $id_mandatorio_ = $this->id_mandatorio_; 
       $sStyleHidden_id_mandatorio_ = '';
       if (isset($sCheckRead_id_mandatorio_))
       {
           unset($sCheckRead_id_mandatorio_);
       }
       if (isset($this->nmgp_cmp_readonly['id_mandatorio_']))
       {
           $sCheckRead_id_mandatorio_ = $this->nmgp_cmp_readonly['id_mandatorio_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_mandatorio_']) && $this->nmgp_cmp_hidden['id_mandatorio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_mandatorio_']);
           $sStyleHidden_id_mandatorio_ = 'display: none;';
       }
       $bTestReadOnly_id_mandatorio_ = true;
       $sStyleReadLab_id_mandatorio_ = 'display: none;';
       $sStyleReadInp_id_mandatorio_ = '';
       if (isset($this->nmgp_cmp_readonly['id_mandatorio_']) && $this->nmgp_cmp_readonly['id_mandatorio_'] == 'on')
       {
           $bTestReadOnly_id_mandatorio_ = false;
           unset($this->nmgp_cmp_readonly['id_mandatorio_']);
           $sStyleReadLab_id_mandatorio_ = '';
           $sStyleReadInp_id_mandatorio_ = 'display: none;';
       }
       $this->dv_mandatorio_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['dv_mandatorio_']; 
       $dv_mandatorio_ = $this->dv_mandatorio_; 
       $sStyleHidden_dv_mandatorio_ = '';
       if (isset($sCheckRead_dv_mandatorio_))
       {
           unset($sCheckRead_dv_mandatorio_);
       }
       if (isset($this->nmgp_cmp_readonly['dv_mandatorio_']))
       {
           $sCheckRead_dv_mandatorio_ = $this->nmgp_cmp_readonly['dv_mandatorio_'];
       }
       if (isset($this->nmgp_cmp_hidden['dv_mandatorio_']) && $this->nmgp_cmp_hidden['dv_mandatorio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dv_mandatorio_']);
           $sStyleHidden_dv_mandatorio_ = 'display: none;';
       }
       $bTestReadOnly_dv_mandatorio_ = true;
       $sStyleReadLab_dv_mandatorio_ = 'display: none;';
       $sStyleReadInp_dv_mandatorio_ = '';
       if (isset($this->nmgp_cmp_readonly['dv_mandatorio_']) && $this->nmgp_cmp_readonly['dv_mandatorio_'] == 'on')
       {
           $bTestReadOnly_dv_mandatorio_ = false;
           unset($this->nmgp_cmp_readonly['dv_mandatorio_']);
           $sStyleReadLab_dv_mandatorio_ = '';
           $sStyleReadInp_dv_mandatorio_ = 'display: none;';
       }
       $this->tipo_id_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['tipo_id_']; 
       $tipo_id_ = $this->tipo_id_; 
       $sStyleHidden_tipo_id_ = '';
       if (isset($sCheckRead_tipo_id_))
       {
           unset($sCheckRead_tipo_id_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_id_']))
       {
           $sCheckRead_tipo_id_ = $this->nmgp_cmp_readonly['tipo_id_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_id_']) && $this->nmgp_cmp_hidden['tipo_id_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_id_']);
           $sStyleHidden_tipo_id_ = 'display: none;';
       }
       $bTestReadOnly_tipo_id_ = true;
       $sStyleReadLab_tipo_id_ = 'display: none;';
       $sStyleReadInp_tipo_id_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_id_']) && $this->nmgp_cmp_readonly['tipo_id_'] == 'on')
       {
           $bTestReadOnly_tipo_id_ = false;
           unset($this->nmgp_cmp_readonly['tipo_id_']);
           $sStyleReadLab_tipo_id_ = '';
           $sStyleReadInp_tipo_id_ = 'display: none;';
       }
       $this->codlinea_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['codlinea_']; 
       $codlinea_ = $this->codlinea_; 
       $sStyleHidden_codlinea_ = '';
       if (isset($sCheckRead_codlinea_))
       {
           unset($sCheckRead_codlinea_);
       }
       if (isset($this->nmgp_cmp_readonly['codlinea_']))
       {
           $sCheckRead_codlinea_ = $this->nmgp_cmp_readonly['codlinea_'];
       }
       if (isset($this->nmgp_cmp_hidden['codlinea_']) && $this->nmgp_cmp_hidden['codlinea_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['codlinea_']);
           $sStyleHidden_codlinea_ = 'display: none;';
       }
       $bTestReadOnly_codlinea_ = true;
       $sStyleReadLab_codlinea_ = 'display: none;';
       $sStyleReadInp_codlinea_ = '';
       if (isset($this->nmgp_cmp_readonly['codlinea_']) && $this->nmgp_cmp_readonly['codlinea_'] == 'on')
       {
           $bTestReadOnly_codlinea_ = false;
           unset($this->nmgp_cmp_readonly['codlinea_']);
           $sStyleReadLab_codlinea_ = '';
           $sStyleReadInp_codlinea_ = 'display: none;';
       }
       $this->deslinea_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['deslinea_']; 
       $deslinea_ = $this->deslinea_; 
       if (!isset($this->nmgp_cmp_hidden['deslinea_']))
       {
           $this->nmgp_cmp_hidden['deslinea_'] = 'off';
       }
       $sStyleHidden_deslinea_ = '';
       if (isset($sCheckRead_deslinea_))
       {
           unset($sCheckRead_deslinea_);
       }
       if (isset($this->nmgp_cmp_readonly['deslinea_']))
       {
           $sCheckRead_deslinea_ = $this->nmgp_cmp_readonly['deslinea_'];
       }
       if (isset($this->nmgp_cmp_hidden['deslinea_']) && $this->nmgp_cmp_hidden['deslinea_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['deslinea_']);
           $sStyleHidden_deslinea_ = 'display: none;';
       }
       $bTestReadOnly_deslinea_ = true;
       $sStyleReadLab_deslinea_ = 'display: none;';
       $sStyleReadInp_deslinea_ = '';
       if (isset($this->nmgp_cmp_readonly['deslinea_']) && $this->nmgp_cmp_readonly['deslinea_'] == 'on')
       {
           $bTestReadOnly_deslinea_ = false;
           unset($this->nmgp_cmp_readonly['deslinea_']);
           $sStyleReadLab_deslinea_ = '';
           $sStyleReadInp_deslinea_ = 'display: none;';
       }
       $this->creado_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['creado_'] . ' ' . $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['creado__hora']; 
       $creado_ = $this->creado_; 
       if (!isset($this->nmgp_cmp_hidden['creado_']))
       {
           $this->nmgp_cmp_hidden['creado_'] = 'off';
       }
       $sStyleHidden_creado_ = '';
       if (isset($sCheckRead_creado_))
       {
           unset($sCheckRead_creado_);
       }
       if (isset($this->nmgp_cmp_readonly['creado_']))
       {
           $sCheckRead_creado_ = $this->nmgp_cmp_readonly['creado_'];
       }
       if (isset($this->nmgp_cmp_hidden['creado_']) && $this->nmgp_cmp_hidden['creado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['creado_']);
           $sStyleHidden_creado_ = 'display: none;';
       }
       $bTestReadOnly_creado_ = true;
       $sStyleReadLab_creado_ = 'display: none;';
       $sStyleReadInp_creado_ = '';
       if (isset($this->nmgp_cmp_readonly['creado_']) && $this->nmgp_cmp_readonly['creado_'] == 'on')
       {
           $bTestReadOnly_creado_ = false;
           unset($this->nmgp_cmp_readonly['creado_']);
           $sStyleReadLab_creado_ = '';
           $sStyleReadInp_creado_ = 'display: none;';
       }
       $this->editado_ = $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['editado_'] . ' ' . $this->form_vert_form_cloud_exclusiones[$sc_seq_vert]['editado__hora']; 
       $editado_ = $this->editado_; 
       if (!isset($this->nmgp_cmp_hidden['editado_']))
       {
           $this->nmgp_cmp_hidden['editado_'] = 'off';
       }
       $sStyleHidden_editado_ = '';
       if (isset($sCheckRead_editado_))
       {
           unset($sCheckRead_editado_);
       }
       if (isset($this->nmgp_cmp_readonly['editado_']))
       {
           $sCheckRead_editado_ = $this->nmgp_cmp_readonly['editado_'];
       }
       if (isset($this->nmgp_cmp_hidden['editado_']) && $this->nmgp_cmp_hidden['editado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['editado_']);
           $sStyleHidden_editado_ = 'display: none;';
       }
       $bTestReadOnly_editado_ = true;
       $sStyleReadLab_editado_ = 'display: none;';
       $sStyleReadInp_editado_ = '';
       if (isset($this->nmgp_cmp_readonly['editado_']) && $this->nmgp_cmp_readonly['editado_'] == 'on')
       {
           $bTestReadOnly_editado_ = false;
           unset($this->nmgp_cmp_readonly['editado_']);
           $sStyleReadLab_editado_ = '';
           $sStyleReadInp_editado_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_cloud_exclusiones_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_cloud_exclusiones_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cloud_exclusiones_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_cloud_exclusiones_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cloud_exclusiones_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_cloud_exclusiones_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_exclusion_']) && $this->nmgp_cmp_hidden['id_exclusion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_exclusion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_exclusion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id_exclusion__line" id="hidden_field_data_id_exclusion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_exclusion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_exclusion__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_exclusion_<?php echo $sc_seq_vert ?>" class="css_id_exclusion__line" style="<?php echo $sStyleReadLab_id_exclusion_; ?>"><?php echo $this->form_format_readonly("id_exclusion_", $this->form_encode_input($this->id_exclusion_)); ?></span><span id="id_read_off_id_exclusion_<?php echo $sc_seq_vert ?>" class="css_read_off_id_exclusion_" style="<?php echo $sStyleReadInp_id_exclusion_; ?>"><input type="hidden" id="id_sc_field_id_exclusion_<?php echo $sc_seq_vert ?>" name="id_exclusion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_exclusion_) . "\">"?>
<span id="id_ajax_label_id_exclusion_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_exclusion_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_exclusion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_exclusion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codproducto_']) && $this->nmgp_cmp_hidden['codproducto_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codproducto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codproducto_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codproducto__line" id="hidden_field_data_codproducto_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codproducto_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codproducto__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codproducto_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codproducto_"]) &&  $this->nmgp_cmp_readonly["codproducto_"] == "on") { 

 ?>
<input type="hidden" name="codproducto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codproducto_) . "\">" . $codproducto_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_codproducto_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-codproducto_<?php echo $sc_seq_vert ?> css_codproducto__line" style="<?php echo $sStyleReadLab_codproducto_; ?>"><?php echo $this->form_format_readonly("codproducto_", $this->form_encode_input($this->codproducto_)); ?></span><span id="id_read_off_codproducto_<?php echo $sc_seq_vert ?>" class="css_read_off_codproducto_" style="white-space: nowrap;<?php echo $sStyleReadInp_codproducto_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_codproducto__obj" style="" id="id_sc_field_codproducto_<?php echo $sc_seq_vert ?>" type=text name="codproducto_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codproducto_) ?>"
 size=120 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codproducto_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codproducto_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_descripcion__line" id="hidden_field_data_descripcion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descripcion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_descripcion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_descripcion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion_"]) &&  $this->nmgp_cmp_readonly["descripcion_"] == "on") { 

 ?>
<input type="hidden" name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) . "\">" . $descripcion_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-descripcion_<?php echo $sc_seq_vert ?> css_descripcion__line" style="<?php echo $sStyleReadLab_descripcion_; ?>"><?php echo $this->form_format_readonly("descripcion_", $this->form_encode_input($this->descripcion_)); ?></span><span id="id_read_off_descripcion_<?php echo $sc_seq_vert ?>" class="css_read_off_descripcion_" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_descripcion__obj" style="" id="id_sc_field_descripcion_<?php echo $sc_seq_vert ?>" type=text name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) ?>"
 size=50 maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_empresa_']) && $this->nmgp_cmp_hidden['id_empresa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_empresa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_empresa__line" id="hidden_field_data_id_empresa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_empresa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_empresa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_empresa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_empresa_"]) &&  $this->nmgp_cmp_readonly["id_empresa_"] == "on") { 

 ?>
<input type="hidden" name="id_empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_empresa_) . "\">" . $id_empresa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_empresa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_empresa_<?php echo $sc_seq_vert ?> css_id_empresa__line" style="<?php echo $sStyleReadLab_id_empresa_; ?>"><?php echo $this->form_format_readonly("id_empresa_", $this->form_encode_input($this->id_empresa_)); ?></span><span id="id_read_off_id_empresa_<?php echo $sc_seq_vert ?>" class="css_read_off_id_empresa_" style="white-space: nowrap;<?php echo $sStyleReadInp_id_empresa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_empresa__obj" style="" id="id_sc_field_id_empresa_<?php echo $sc_seq_vert ?>" type=text name="id_empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_empresa_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_empresa_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_empresa_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id_empresa_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_empresa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_empresa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo__line" id="hidden_field_data_tipo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_"]) &&  $this->nmgp_cmp_readonly["tipo_"] == "on") { 

$tipo__look = "";
 if ($this->tipo_ == "OCULTO") { $tipo__look .= "OCULTO" ;} 
 if ($this->tipo_ == "MANDATORIO") { $tipo__look .= "MANDATORIO" ;} 
 if ($this->tipo_ == "EXTENSIBLE") { $tipo__look .= "EXTENSIBLE" ;} 
 if ($this->tipo_ == "DESCUENTO") { $tipo__look .= "DESCUENTO" ;} 
 if (empty($tipo__look)) { $tipo__look = $this->tipo_; }
?>
<input type="hidden" name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_) . "\">" . $tipo__look . ""; ?>
<?php } else { ?>
<?php

$tipo__look = "";
 if ($this->tipo_ == "OCULTO") { $tipo__look .= "OCULTO" ;} 
 if ($this->tipo_ == "MANDATORIO") { $tipo__look .= "MANDATORIO" ;} 
 if ($this->tipo_ == "EXTENSIBLE") { $tipo__look .= "EXTENSIBLE" ;} 
 if ($this->tipo_ == "DESCUENTO") { $tipo__look .= "DESCUENTO" ;} 
 if (empty($tipo__look)) { $tipo__look = $this->tipo_; }
?>
<span id="id_read_on_tipo_<?php echo $sc_seq_vert ; ?>" class="css_tipo__line"  style="<?php echo $sStyleReadLab_tipo_; ?>"><?php echo $this->form_format_readonly("tipo_", $this->form_encode_input($tipo__look)); ?></span><span id="id_read_off_tipo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_; ?>">
 <span id="idAjaxSelect_tipo_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_tipo__obj" style="" id="id_sc_field_tipo_<?php echo $sc_seq_vert ?>" name="tipo_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="OCULTO" <?php  if ($this->tipo_ == "OCULTO") { echo " selected" ;} ?>>OCULTO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_'][] = 'OCULTO'; ?>
 <option  value="MANDATORIO" <?php  if ($this->tipo_ == "MANDATORIO") { echo " selected" ;} ?>>MANDATORIO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_'][] = 'MANDATORIO'; ?>
 <option  value="EXTENSIBLE" <?php  if ($this->tipo_ == "EXTENSIBLE") { echo " selected" ;} ?>>EXTENSIBLE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_'][] = 'EXTENSIBLE'; ?>
 <option  value="DESCUENTO" <?php  if ($this->tipo_ == "DESCUENTO") { echo " selected" ;} ?>>DESCUENTO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_'][] = 'DESCUENTO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_mandatorio_']) && $this->nmgp_cmp_hidden['id_mandatorio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_mandatorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_mandatorio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_mandatorio__line" id="hidden_field_data_id_mandatorio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_mandatorio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_mandatorio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_mandatorio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_mandatorio_"]) &&  $this->nmgp_cmp_readonly["id_mandatorio_"] == "on") { 

 ?>
<input type="hidden" name="id_mandatorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_mandatorio_) . "\">" . $id_mandatorio_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_mandatorio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_mandatorio_<?php echo $sc_seq_vert ?> css_id_mandatorio__line" style="<?php echo $sStyleReadLab_id_mandatorio_; ?>"><?php echo $this->form_format_readonly("id_mandatorio_", $this->form_encode_input($this->id_mandatorio_)); ?></span><span id="id_read_off_id_mandatorio_<?php echo $sc_seq_vert ?>" class="css_read_off_id_mandatorio_" style="white-space: nowrap;<?php echo $sStyleReadInp_id_mandatorio_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_mandatorio__obj" style="" id="id_sc_field_id_mandatorio_<?php echo $sc_seq_vert ?>" type=text name="id_mandatorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_mandatorio_) ?>"
 size=12 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_mandatorio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_mandatorio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dv_mandatorio_']) && $this->nmgp_cmp_hidden['dv_mandatorio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dv_mandatorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dv_mandatorio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dv_mandatorio__line" id="hidden_field_data_dv_mandatorio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dv_mandatorio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dv_mandatorio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dv_mandatorio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dv_mandatorio_"]) &&  $this->nmgp_cmp_readonly["dv_mandatorio_"] == "on") { 

 ?>
<input type="hidden" name="dv_mandatorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dv_mandatorio_) . "\">" . $dv_mandatorio_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dv_mandatorio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dv_mandatorio_<?php echo $sc_seq_vert ?> css_dv_mandatorio__line" style="<?php echo $sStyleReadLab_dv_mandatorio_; ?>"><?php echo $this->form_format_readonly("dv_mandatorio_", $this->form_encode_input($this->dv_mandatorio_)); ?></span><span id="id_read_off_dv_mandatorio_<?php echo $sc_seq_vert ?>" class="css_read_off_dv_mandatorio_" style="white-space: nowrap;<?php echo $sStyleReadInp_dv_mandatorio_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dv_mandatorio__obj" style="" id="id_sc_field_dv_mandatorio_<?php echo $sc_seq_vert ?>" type=text name="dv_mandatorio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dv_mandatorio_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dv_mandatorio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dv_mandatorio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_id_']) && $this->nmgp_cmp_hidden['tipo_id_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo_id__line" id="hidden_field_data_tipo_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_id__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_id_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_id_"]) &&  $this->nmgp_cmp_readonly["tipo_id_"] == "on") { 

$tipo_id__look = "";
 if ($this->tipo_id_ == "13") { $tipo_id__look .= "CEDULA" ;} 
 if ($this->tipo_id_ == "31") { $tipo_id__look .= "NIT" ;} 
 if (empty($tipo_id__look)) { $tipo_id__look = $this->tipo_id_; }
?>
<input type="hidden" name="tipo_id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_id_) . "\">" . $tipo_id__look . ""; ?>
<?php } else { ?>
<?php

$tipo_id__look = "";
 if ($this->tipo_id_ == "13") { $tipo_id__look .= "CEDULA" ;} 
 if ($this->tipo_id_ == "31") { $tipo_id__look .= "NIT" ;} 
 if (empty($tipo_id__look)) { $tipo_id__look = $this->tipo_id_; }
?>
<span id="id_read_on_tipo_id_<?php echo $sc_seq_vert ; ?>" class="css_tipo_id__line"  style="<?php echo $sStyleReadLab_tipo_id_; ?>"><?php echo $this->form_format_readonly("tipo_id_", $this->form_encode_input($tipo_id__look)); ?></span><span id="id_read_off_tipo_id_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_id_" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_id_; ?>">
 <span id="idAjaxSelect_tipo_id_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_tipo_id__obj" style="" id="id_sc_field_tipo_id_<?php echo $sc_seq_vert ?>" name="tipo_id_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_id_'][] = ''; ?>
 <option value=""></option>
 <option  value="13" <?php  if ($this->tipo_id_ == "13") { echo " selected" ;} ?>>CEDULA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_id_'][] = '13'; ?>
 <option  value="31" <?php  if ($this->tipo_id_ == "31") { echo " selected" ;} ?>>NIT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_tipo_id_'][] = '31'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['codlinea_']) && $this->nmgp_cmp_hidden['codlinea_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codlinea_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->codlinea_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_codlinea__line" id="hidden_field_data_codlinea_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_codlinea_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_codlinea__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_codlinea_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codlinea_"]) &&  $this->nmgp_cmp_readonly["codlinea_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_con_conn_firebird['tpbanco']), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_'] = array(); 
    }

   $old_value_id_exclusion_ = $this->id_exclusion_;
   $old_value_id_empresa_ = $this->id_empresa_;
   $old_value_creado_ = $this->creado_;
   $old_value_creado__hora = $this->creado__hora;
   $old_value_editado_ = $this->editado_;
   $old_value_editado__hora = $this->editado__hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_exclusion_ = $this->id_exclusion_;
   $unformatted_value_id_empresa_ = $this->id_empresa_;
   $unformatted_value_creado_ = $this->creado_;
   $unformatted_value_creado__hora = $this->creado__hora;
   $unformatted_value_editado_ = $this->editado_;
   $unformatted_value_editado__hora = $this->editado__hora;

   if (in_array(strtolower($this->Ini->nm_con_conn_firebird['tpbanco']), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT CODIGO, CODIGO + ' - ' + DESCRIP  FROM LINEAMAT  ORDER BY CODIGO, DESCRIP";
   }
   elseif (in_array(strtolower($this->Ini->nm_con_conn_firebird['tpbanco']), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT CODIGO, concat(CODIGO,' - ',DESCRIP)  FROM LINEAMAT  ORDER BY CODIGO, DESCRIP";
   }
   elseif (in_array(strtolower($this->Ini->nm_con_conn_firebird['tpbanco']), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT CODIGO, CODIGO&' - '&DESCRIP  FROM LINEAMAT  ORDER BY CODIGO, DESCRIP";
   }
   elseif (in_array(strtolower($this->Ini->nm_con_conn_firebird['tpbanco']), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT CODIGO, CODIGO||' - '||DESCRIP  FROM LINEAMAT  ORDER BY CODIGO, DESCRIP";
   }
   else
   {
       $nm_comando = "SELECT CODIGO, CODIGO||' - '||DESCRIP  FROM LINEAMAT  ORDER BY CODIGO, DESCRIP";
   }

   $this->id_exclusion_ = $old_value_id_exclusion_;
   $this->id_empresa_ = $old_value_id_empresa_;
   $this->creado_ = $old_value_creado_;
   $this->creado__hora = $old_value_creado__hora;
   $this->editado_ = $old_value_editado_;
   $this->editado__hora = $old_value_editado__hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Ini->nm_db_conn_firebird->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['Lookup_codlinea_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $codlinea__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codlinea__1))
          {
              foreach ($this->codlinea__1 as $tmp_codlinea_)
              {
                  if (trim($tmp_codlinea_) === trim($cadaselect[1])) { $codlinea__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codlinea_) === trim($cadaselect[1])) { $codlinea__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="codlinea_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($codlinea_) . "\">" . $codlinea__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_codlinea_();
   $x = 0 ; 
   $codlinea__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codlinea__1))
          {
              foreach ($this->codlinea__1 as $tmp_codlinea_)
              {
                  if (trim($tmp_codlinea_) === trim($cadaselect[1])) { $codlinea__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codlinea_) === trim($cadaselect[1])) { $codlinea__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($codlinea__look))
          {
              $codlinea__look = $this->codlinea_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_codlinea_" . $sc_seq_vert . "\" class=\"css_codlinea__line\" style=\"" .  $sStyleReadLab_codlinea_ . "\">" . $this->form_format_readonly("codlinea_", $this->form_encode_input($codlinea__look)) . "</span><span id=\"id_read_off_codlinea_" . $sc_seq_vert . "\" class=\"css_read_off_codlinea_\" style=\"white-space: nowrap; " . $sStyleReadInp_codlinea_ . "\">";
   echo " <span id=\"idAjaxSelect_codlinea_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_codlinea__obj\" style=\"\" id=\"id_sc_field_codlinea_" . $sc_seq_vert . "\" name=\"codlinea_" . $sc_seq_vert . "\" size=\"7\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->codlinea_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->codlinea_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codlinea_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codlinea_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['deslinea_']) && $this->nmgp_cmp_hidden['deslinea_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="deslinea_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($deslinea_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_deslinea__line" id="hidden_field_data_deslinea_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_deslinea_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_deslinea__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_deslinea_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["deslinea_"]) &&  $this->nmgp_cmp_readonly["deslinea_"] == "on") { 

 ?>
<input type="hidden" name="deslinea_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($deslinea_) . "\">" . $deslinea_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_deslinea_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-deslinea_<?php echo $sc_seq_vert ?> css_deslinea__line" style="<?php echo $sStyleReadLab_deslinea_; ?>"><?php echo $this->form_format_readonly("deslinea_", $this->form_encode_input($this->deslinea_)); ?></span><span id="id_read_off_deslinea_<?php echo $sc_seq_vert ?>" class="css_read_off_deslinea_" style="white-space: nowrap;<?php echo $sStyleReadInp_deslinea_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_deslinea__obj" style="" id="id_sc_field_deslinea_<?php echo $sc_seq_vert ?>" type=text name="deslinea_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($deslinea_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_deslinea_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_deslinea_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['creado_']) && $this->nmgp_cmp_hidden['creado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="creado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($creado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_creado__line" id="hidden_field_data_creado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_creado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_creado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_creado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["creado_"]) &&  $this->nmgp_cmp_readonly["creado_"] == "on") { 

 ?>
<input type="hidden" name="creado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($creado_) . "\">" . $creado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_creado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-creado_<?php echo $sc_seq_vert ?> css_creado__line" style="<?php echo $sStyleReadLab_creado_; ?>"><?php echo $this->form_format_readonly("creado_", $this->form_encode_input($creado_)); ?></span><span id="id_read_off_creado_<?php echo $sc_seq_vert ?>" class="css_read_off_creado_" style="white-space: nowrap;<?php echo $sStyleReadInp_creado_; ?>"><?php
$tmp_form_data = $this->field_config['creado_']['date_format'];
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

 <input class="sc-js-input scFormObjectOddMult css_creado__obj" style="" id="id_sc_field_creado_<?php echo $sc_seq_vert ?>" type=text name="creado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($creado_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['creado_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['creado_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['creado_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_creado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_creado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->creado_ = $old_dt_creado_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['editado_']) && $this->nmgp_cmp_hidden['editado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="editado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($editado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_editado__line" id="hidden_field_data_editado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_editado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_editado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_editado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["editado_"]) &&  $this->nmgp_cmp_readonly["editado_"] == "on") { 

 ?>
<input type="hidden" name="editado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($editado_) . "\">" . $editado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_editado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-editado_<?php echo $sc_seq_vert ?> css_editado__line" style="<?php echo $sStyleReadLab_editado_; ?>"><?php echo $this->form_format_readonly("editado_", $this->form_encode_input($editado_)); ?></span><span id="id_read_off_editado_<?php echo $sc_seq_vert ?>" class="css_read_off_editado_" style="white-space: nowrap;<?php echo $sStyleReadInp_editado_; ?>"><?php
$tmp_form_data = $this->field_config['editado_']['date_format'];
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

 <input class="sc-js-input scFormObjectOddMult css_editado__obj" style="" id="id_sc_field_editado_<?php echo $sc_seq_vert ?>" type=text name="editado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($editado_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['editado_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['editado_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['editado_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_editado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_editado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->editado_ = $old_dt_editado_;
?>





   </tr>
<?php   
        if (isset($sCheckRead_id_exclusion_))
       {
           $this->nmgp_cmp_readonly['id_exclusion_'] = $sCheckRead_id_exclusion_;
       }
       if ('display: none;' == $sStyleHidden_id_exclusion_)
       {
           $this->nmgp_cmp_hidden['id_exclusion_'] = 'off';
       }
       if (isset($sCheckRead_codproducto_))
       {
           $this->nmgp_cmp_readonly['codproducto_'] = $sCheckRead_codproducto_;
       }
       if ('display: none;' == $sStyleHidden_codproducto_)
       {
           $this->nmgp_cmp_hidden['codproducto_'] = 'off';
       }
       if (isset($sCheckRead_descripcion_))
       {
           $this->nmgp_cmp_readonly['descripcion_'] = $sCheckRead_descripcion_;
       }
       if ('display: none;' == $sStyleHidden_descripcion_)
       {
           $this->nmgp_cmp_hidden['descripcion_'] = 'off';
       }
       if (isset($sCheckRead_id_empresa_))
       {
           $this->nmgp_cmp_readonly['id_empresa_'] = $sCheckRead_id_empresa_;
       }
       if ('display: none;' == $sStyleHidden_id_empresa_)
       {
           $this->nmgp_cmp_hidden['id_empresa_'] = 'off';
       }
       if (isset($sCheckRead_tipo_))
       {
           $this->nmgp_cmp_readonly['tipo_'] = $sCheckRead_tipo_;
       }
       if ('display: none;' == $sStyleHidden_tipo_)
       {
           $this->nmgp_cmp_hidden['tipo_'] = 'off';
       }
       if (isset($sCheckRead_id_mandatorio_))
       {
           $this->nmgp_cmp_readonly['id_mandatorio_'] = $sCheckRead_id_mandatorio_;
       }
       if ('display: none;' == $sStyleHidden_id_mandatorio_)
       {
           $this->nmgp_cmp_hidden['id_mandatorio_'] = 'off';
       }
       if (isset($sCheckRead_dv_mandatorio_))
       {
           $this->nmgp_cmp_readonly['dv_mandatorio_'] = $sCheckRead_dv_mandatorio_;
       }
       if ('display: none;' == $sStyleHidden_dv_mandatorio_)
       {
           $this->nmgp_cmp_hidden['dv_mandatorio_'] = 'off';
       }
       if (isset($sCheckRead_tipo_id_))
       {
           $this->nmgp_cmp_readonly['tipo_id_'] = $sCheckRead_tipo_id_;
       }
       if ('display: none;' == $sStyleHidden_tipo_id_)
       {
           $this->nmgp_cmp_hidden['tipo_id_'] = 'off';
       }
       if (isset($sCheckRead_codlinea_))
       {
           $this->nmgp_cmp_readonly['codlinea_'] = $sCheckRead_codlinea_;
       }
       if ('display: none;' == $sStyleHidden_codlinea_)
       {
           $this->nmgp_cmp_hidden['codlinea_'] = 'off';
       }
       if (isset($sCheckRead_deslinea_))
       {
           $this->nmgp_cmp_readonly['deslinea_'] = $sCheckRead_deslinea_;
       }
       if ('display: none;' == $sStyleHidden_deslinea_)
       {
           $this->nmgp_cmp_hidden['deslinea_'] = 'off';
       }
       if (isset($sCheckRead_creado_))
       {
           $this->nmgp_cmp_readonly['creado_'] = $sCheckRead_creado_;
       }
       if ('display: none;' == $sStyleHidden_creado_)
       {
           $this->nmgp_cmp_hidden['creado_'] = 'off';
       }
       if (isset($sCheckRead_editado_))
       {
           $this->nmgp_cmp_readonly['editado_'] = $sCheckRead_editado_;
       }
       if ('display: none;' == $sStyleHidden_editado_)
       {
           $this->nmgp_cmp_hidden['editado_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_cloud_exclusiones = $guarda_form_vert_form_cloud_exclusiones;
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
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R")
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_cloud_exclusiones");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cloud_exclusiones");
 parent.scAjaxDetailHeight("form_cloud_exclusiones", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cloud_exclusiones", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cloud_exclusiones", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['sc_modal'])
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
			do_ajax_form_cloud_exclusiones_add_new_line(); return false;
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
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
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
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_exclusiones']['buttonStatus'] = $this->nmgp_botoes;
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
