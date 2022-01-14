<?php
class form_permisos_form extends form_permisos_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Permisos"); } else { echo strip_tags("Permisos"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_atualiz'] == 'ok')
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_permisos/form_permisos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_permisos_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['last'] : 'off'); ?>";
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

 function fMensaje(titulo, mensaje, app="") {
  alertify.set('notifier','position', 'top-center');
  alertify.alert(titulo,mensaje,function(){
  	if(!$.isEmptyObject(app)){
  		window.location.href = "../"+app+"/";
  	}
  });
 } // fMensaje
<?php

include_once('form_permisos_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_permisos_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_permisos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_permisos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Permisos"; } else { echo "Permisos"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'][2] : "";
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label'][''];
        }
?>
<?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter'] = true;
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
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
<?php
     $Span = 0;
     if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Span = 2; }
     if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Span = 2; }
     $Col_span = ($Span == 0) ? "" : " colspan=$Span";
 ?>
    <TR class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['pdf_view'])
     { 
 ?>
     <TD class="scFormLabelOddMult" <?php echo $Col_span ?>>&nbsp;</TD>
<?php
     } 
 ?>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Terceros</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Productos</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Grupos</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Usuarios</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Compras</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Ventas</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Cartera</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Caja</TD>
     <TD class="scFormLabelOddMult" colspan=2 style="text-align:center;vertical-align:middle;">Configuracion</TD>
     <TD class="scFormLabelOddMult">&nbsp;</TD>
    </TR>
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
   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sStyleHidden_usuario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usuario_']) || $this->nmgp_cmp_hidden['usuario_'] == 'on') {
      if (!isset($this->nm_new_label['usuario_'])) {
          $this->nm_new_label['usuario_'] = "Usuario"; } ?>

    <TD class="scFormLabelOddMult css_usuario__label" id="hidden_field_label_usuario_" style="<?php echo $sStyleHidden_usuario_; ?>" > <?php echo $this->nm_new_label['usuario_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['terceros_lista_']) && $this->nmgp_cmp_hidden['terceros_lista_'] == 'off') { $sStyleHidden_terceros_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['terceros_lista_']) || $this->nmgp_cmp_hidden['terceros_lista_'] == 'on') {
      if (!isset($this->nm_new_label['terceros_lista_'])) {
          $this->nm_new_label['terceros_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_terceros_lista__label" id="hidden_field_label_terceros_lista_" style="<?php echo $sStyleHidden_terceros_lista_; ?>" > <?php echo $this->nm_new_label['terceros_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['terceros_frm_']) && $this->nmgp_cmp_hidden['terceros_frm_'] == 'off') { $sStyleHidden_terceros_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['terceros_frm_']) || $this->nmgp_cmp_hidden['terceros_frm_'] == 'on') {
      if (!isset($this->nm_new_label['terceros_frm_'])) {
          $this->nm_new_label['terceros_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_terceros_frm__label" id="hidden_field_label_terceros_frm_" style="<?php echo $sStyleHidden_terceros_frm_; ?>" > <?php echo $this->nm_new_label['terceros_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['productos_lista_']) && $this->nmgp_cmp_hidden['productos_lista_'] == 'off') { $sStyleHidden_productos_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['productos_lista_']) || $this->nmgp_cmp_hidden['productos_lista_'] == 'on') {
      if (!isset($this->nm_new_label['productos_lista_'])) {
          $this->nm_new_label['productos_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_productos_lista__label" id="hidden_field_label_productos_lista_" style="<?php echo $sStyleHidden_productos_lista_; ?>" > <?php echo $this->nm_new_label['productos_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['productos_frm_']) && $this->nmgp_cmp_hidden['productos_frm_'] == 'off') { $sStyleHidden_productos_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['productos_frm_']) || $this->nmgp_cmp_hidden['productos_frm_'] == 'on') {
      if (!isset($this->nm_new_label['productos_frm_'])) {
          $this->nm_new_label['productos_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_productos_frm__label" id="hidden_field_label_productos_frm_" style="<?php echo $sStyleHidden_productos_frm_; ?>" > <?php echo $this->nm_new_label['productos_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['grupos_lista_']) && $this->nmgp_cmp_hidden['grupos_lista_'] == 'off') { $sStyleHidden_grupos_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['grupos_lista_']) || $this->nmgp_cmp_hidden['grupos_lista_'] == 'on') {
      if (!isset($this->nm_new_label['grupos_lista_'])) {
          $this->nm_new_label['grupos_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_grupos_lista__label" id="hidden_field_label_grupos_lista_" style="<?php echo $sStyleHidden_grupos_lista_; ?>" > <?php echo $this->nm_new_label['grupos_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['grupos_frm_']) && $this->nmgp_cmp_hidden['grupos_frm_'] == 'off') { $sStyleHidden_grupos_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['grupos_frm_']) || $this->nmgp_cmp_hidden['grupos_frm_'] == 'on') {
      if (!isset($this->nm_new_label['grupos_frm_'])) {
          $this->nm_new_label['grupos_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_grupos_frm__label" id="hidden_field_label_grupos_frm_" style="<?php echo $sStyleHidden_grupos_frm_; ?>" > <?php echo $this->nm_new_label['grupos_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usuarios_lista_']) && $this->nmgp_cmp_hidden['usuarios_lista_'] == 'off') { $sStyleHidden_usuarios_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usuarios_lista_']) || $this->nmgp_cmp_hidden['usuarios_lista_'] == 'on') {
      if (!isset($this->nm_new_label['usuarios_lista_'])) {
          $this->nm_new_label['usuarios_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_usuarios_lista__label" id="hidden_field_label_usuarios_lista_" style="<?php echo $sStyleHidden_usuarios_lista_; ?>" > <?php echo $this->nm_new_label['usuarios_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usuarios_frm_']) && $this->nmgp_cmp_hidden['usuarios_frm_'] == 'off') { $sStyleHidden_usuarios_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usuarios_frm_']) || $this->nmgp_cmp_hidden['usuarios_frm_'] == 'on') {
      if (!isset($this->nm_new_label['usuarios_frm_'])) {
          $this->nm_new_label['usuarios_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_usuarios_frm__label" id="hidden_field_label_usuarios_frm_" style="<?php echo $sStyleHidden_usuarios_frm_; ?>" > <?php echo $this->nm_new_label['usuarios_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['compras_lista_']) && $this->nmgp_cmp_hidden['compras_lista_'] == 'off') { $sStyleHidden_compras_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['compras_lista_']) || $this->nmgp_cmp_hidden['compras_lista_'] == 'on') {
      if (!isset($this->nm_new_label['compras_lista_'])) {
          $this->nm_new_label['compras_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_compras_lista__label" id="hidden_field_label_compras_lista_" style="<?php echo $sStyleHidden_compras_lista_; ?>" > <?php echo $this->nm_new_label['compras_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['compras_frm_']) && $this->nmgp_cmp_hidden['compras_frm_'] == 'off') { $sStyleHidden_compras_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['compras_frm_']) || $this->nmgp_cmp_hidden['compras_frm_'] == 'on') {
      if (!isset($this->nm_new_label['compras_frm_'])) {
          $this->nm_new_label['compras_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_compras_frm__label" id="hidden_field_label_compras_frm_" style="<?php echo $sStyleHidden_compras_frm_; ?>" > <?php echo $this->nm_new_label['compras_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ventas_lista_']) && $this->nmgp_cmp_hidden['ventas_lista_'] == 'off') { $sStyleHidden_ventas_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ventas_lista_']) || $this->nmgp_cmp_hidden['ventas_lista_'] == 'on') {
      if (!isset($this->nm_new_label['ventas_lista_'])) {
          $this->nm_new_label['ventas_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_ventas_lista__label" id="hidden_field_label_ventas_lista_" style="<?php echo $sStyleHidden_ventas_lista_; ?>" > <?php echo $this->nm_new_label['ventas_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ventas_frm_']) && $this->nmgp_cmp_hidden['ventas_frm_'] == 'off') { $sStyleHidden_ventas_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ventas_frm_']) || $this->nmgp_cmp_hidden['ventas_frm_'] == 'on') {
      if (!isset($this->nm_new_label['ventas_frm_'])) {
          $this->nm_new_label['ventas_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_ventas_frm__label" id="hidden_field_label_ventas_frm_" style="<?php echo $sStyleHidden_ventas_frm_; ?>" > <?php echo $this->nm_new_label['ventas_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cartera_lista_']) && $this->nmgp_cmp_hidden['cartera_lista_'] == 'off') { $sStyleHidden_cartera_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cartera_lista_']) || $this->nmgp_cmp_hidden['cartera_lista_'] == 'on') {
      if (!isset($this->nm_new_label['cartera_lista_'])) {
          $this->nm_new_label['cartera_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_cartera_lista__label" id="hidden_field_label_cartera_lista_" style="<?php echo $sStyleHidden_cartera_lista_; ?>" > <?php echo $this->nm_new_label['cartera_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cartera_frm_']) && $this->nmgp_cmp_hidden['cartera_frm_'] == 'off') { $sStyleHidden_cartera_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cartera_frm_']) || $this->nmgp_cmp_hidden['cartera_frm_'] == 'on') {
      if (!isset($this->nm_new_label['cartera_frm_'])) {
          $this->nm_new_label['cartera_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_cartera_frm__label" id="hidden_field_label_cartera_frm_" style="<?php echo $sStyleHidden_cartera_frm_; ?>" > <?php echo $this->nm_new_label['cartera_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['caja_lista_']) && $this->nmgp_cmp_hidden['caja_lista_'] == 'off') { $sStyleHidden_caja_lista_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['caja_lista_']) || $this->nmgp_cmp_hidden['caja_lista_'] == 'on') {
      if (!isset($this->nm_new_label['caja_lista_'])) {
          $this->nm_new_label['caja_lista_'] = "Lista"; } ?>

    <TD class="scFormLabelOddMult css_caja_lista__label" id="hidden_field_label_caja_lista_" style="<?php echo $sStyleHidden_caja_lista_; ?>" > <?php echo $this->nm_new_label['caja_lista_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['caja_frm_']) && $this->nmgp_cmp_hidden['caja_frm_'] == 'off') { $sStyleHidden_caja_frm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['caja_frm_']) || $this->nmgp_cmp_hidden['caja_frm_'] == 'on') {
      if (!isset($this->nm_new_label['caja_frm_'])) {
          $this->nm_new_label['caja_frm_'] = "Frm"; } ?>

    <TD class="scFormLabelOddMult css_caja_frm__label" id="hidden_field_label_caja_frm_" style="<?php echo $sStyleHidden_caja_frm_; ?>" > <?php echo $this->nm_new_label['caja_frm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['mantenimiento_']) && $this->nmgp_cmp_hidden['mantenimiento_'] == 'off') { $sStyleHidden_mantenimiento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['mantenimiento_']) || $this->nmgp_cmp_hidden['mantenimiento_'] == 'on') {
      if (!isset($this->nm_new_label['mantenimiento_'])) {
          $this->nm_new_label['mantenimiento_'] = "Mantenimiento"; } ?>

    <TD class="scFormLabelOddMult css_mantenimiento__label" id="hidden_field_label_mantenimiento_" style="<?php echo $sStyleHidden_mantenimiento_; ?>" > <?php echo $this->nm_new_label['mantenimiento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['empresa_']) && $this->nmgp_cmp_hidden['empresa_'] == 'off') { $sStyleHidden_empresa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['empresa_']) || $this->nmgp_cmp_hidden['empresa_'] == 'on') {
      if (!isset($this->nm_new_label['empresa_'])) {
          $this->nm_new_label['empresa_'] = "Empresa"; } ?>

    <TD class="scFormLabelOddMult css_empresa__label" id="hidden_field_label_empresa_" style="<?php echo $sStyleHidden_empresa_; ?>" > <?php echo $this->nm_new_label['empresa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inventario_']) && $this->nmgp_cmp_hidden['inventario_'] == 'off') { $sStyleHidden_inventario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inventario_']) || $this->nmgp_cmp_hidden['inventario_'] == 'on') {
      if (!isset($this->nm_new_label['inventario_'])) {
          $this->nm_new_label['inventario_'] = "Inventario"; } ?>

    <TD class="scFormLabelOddMult css_inventario__label" id="hidden_field_label_inventario_" style="<?php echo $sStyleHidden_inventario_; ?>" > <?php echo $this->nm_new_label['inventario_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_permisos);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_permisos = $this->form_vert_form_permisos;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_permisos))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_permisos as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idpermisos_ = $this->form_vert_form_permisos[$sc_seq_vert]['idpermisos_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['usuario_'] = true;
           $this->nmgp_cmp_readonly['terceros_lista_'] = true;
           $this->nmgp_cmp_readonly['terceros_frm_'] = true;
           $this->nmgp_cmp_readonly['productos_lista_'] = true;
           $this->nmgp_cmp_readonly['productos_frm_'] = true;
           $this->nmgp_cmp_readonly['grupos_lista_'] = true;
           $this->nmgp_cmp_readonly['grupos_frm_'] = true;
           $this->nmgp_cmp_readonly['usuarios_lista_'] = true;
           $this->nmgp_cmp_readonly['usuarios_frm_'] = true;
           $this->nmgp_cmp_readonly['compras_lista_'] = true;
           $this->nmgp_cmp_readonly['compras_frm_'] = true;
           $this->nmgp_cmp_readonly['ventas_lista_'] = true;
           $this->nmgp_cmp_readonly['ventas_frm_'] = true;
           $this->nmgp_cmp_readonly['cartera_lista_'] = true;
           $this->nmgp_cmp_readonly['cartera_frm_'] = true;
           $this->nmgp_cmp_readonly['caja_lista_'] = true;
           $this->nmgp_cmp_readonly['caja_frm_'] = true;
           $this->nmgp_cmp_readonly['mantenimiento_'] = true;
           $this->nmgp_cmp_readonly['empresa_'] = true;
           $this->nmgp_cmp_readonly['inventario_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['usuario_']) || $this->nmgp_cmp_readonly['usuario_'] != "on") {$this->nmgp_cmp_readonly['usuario_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['terceros_lista_']) || $this->nmgp_cmp_readonly['terceros_lista_'] != "on") {$this->nmgp_cmp_readonly['terceros_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['terceros_frm_']) || $this->nmgp_cmp_readonly['terceros_frm_'] != "on") {$this->nmgp_cmp_readonly['terceros_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['productos_lista_']) || $this->nmgp_cmp_readonly['productos_lista_'] != "on") {$this->nmgp_cmp_readonly['productos_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['productos_frm_']) || $this->nmgp_cmp_readonly['productos_frm_'] != "on") {$this->nmgp_cmp_readonly['productos_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['grupos_lista_']) || $this->nmgp_cmp_readonly['grupos_lista_'] != "on") {$this->nmgp_cmp_readonly['grupos_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['grupos_frm_']) || $this->nmgp_cmp_readonly['grupos_frm_'] != "on") {$this->nmgp_cmp_readonly['grupos_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usuarios_lista_']) || $this->nmgp_cmp_readonly['usuarios_lista_'] != "on") {$this->nmgp_cmp_readonly['usuarios_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usuarios_frm_']) || $this->nmgp_cmp_readonly['usuarios_frm_'] != "on") {$this->nmgp_cmp_readonly['usuarios_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['compras_lista_']) || $this->nmgp_cmp_readonly['compras_lista_'] != "on") {$this->nmgp_cmp_readonly['compras_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['compras_frm_']) || $this->nmgp_cmp_readonly['compras_frm_'] != "on") {$this->nmgp_cmp_readonly['compras_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ventas_lista_']) || $this->nmgp_cmp_readonly['ventas_lista_'] != "on") {$this->nmgp_cmp_readonly['ventas_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ventas_frm_']) || $this->nmgp_cmp_readonly['ventas_frm_'] != "on") {$this->nmgp_cmp_readonly['ventas_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cartera_lista_']) || $this->nmgp_cmp_readonly['cartera_lista_'] != "on") {$this->nmgp_cmp_readonly['cartera_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cartera_frm_']) || $this->nmgp_cmp_readonly['cartera_frm_'] != "on") {$this->nmgp_cmp_readonly['cartera_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['caja_lista_']) || $this->nmgp_cmp_readonly['caja_lista_'] != "on") {$this->nmgp_cmp_readonly['caja_lista_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['caja_frm_']) || $this->nmgp_cmp_readonly['caja_frm_'] != "on") {$this->nmgp_cmp_readonly['caja_frm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['mantenimiento_']) || $this->nmgp_cmp_readonly['mantenimiento_'] != "on") {$this->nmgp_cmp_readonly['mantenimiento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['empresa_']) || $this->nmgp_cmp_readonly['empresa_'] != "on") {$this->nmgp_cmp_readonly['empresa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inventario_']) || $this->nmgp_cmp_readonly['inventario_'] != "on") {$this->nmgp_cmp_readonly['inventario_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->usuario_ = $this->form_vert_form_permisos[$sc_seq_vert]['usuario_']; 
       $usuario_ = $this->usuario_; 
       $sStyleHidden_usuario_ = '';
       if (isset($sCheckRead_usuario_))
       {
           unset($sCheckRead_usuario_);
       }
       if (isset($this->nmgp_cmp_readonly['usuario_']))
       {
           $sCheckRead_usuario_ = $this->nmgp_cmp_readonly['usuario_'];
       }
       if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usuario_']);
           $sStyleHidden_usuario_ = 'display: none;';
       }
       $bTestReadOnly_usuario_ = true;
       $sStyleReadLab_usuario_ = 'display: none;';
       $sStyleReadInp_usuario_ = '';
       if (isset($this->nmgp_cmp_readonly['usuario_']) && $this->nmgp_cmp_readonly['usuario_'] == 'on')
       {
           $bTestReadOnly_usuario_ = false;
           unset($this->nmgp_cmp_readonly['usuario_']);
           $sStyleReadLab_usuario_ = '';
           $sStyleReadInp_usuario_ = 'display: none;';
       }
       $this->terceros_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['terceros_lista_']; 
       $terceros_lista_ = $this->terceros_lista_; 
       $sStyleHidden_terceros_lista_ = '';
       if (isset($sCheckRead_terceros_lista_))
       {
           unset($sCheckRead_terceros_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['terceros_lista_']))
       {
           $sCheckRead_terceros_lista_ = $this->nmgp_cmp_readonly['terceros_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['terceros_lista_']) && $this->nmgp_cmp_hidden['terceros_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['terceros_lista_']);
           $sStyleHidden_terceros_lista_ = 'display: none;';
       }
       $bTestReadOnly_terceros_lista_ = true;
       $sStyleReadLab_terceros_lista_ = 'display: none;';
       $sStyleReadInp_terceros_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['terceros_lista_']) && $this->nmgp_cmp_readonly['terceros_lista_'] == 'on')
       {
           $bTestReadOnly_terceros_lista_ = false;
           unset($this->nmgp_cmp_readonly['terceros_lista_']);
           $sStyleReadLab_terceros_lista_ = '';
           $sStyleReadInp_terceros_lista_ = 'display: none;';
       }
       $this->terceros_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['terceros_frm_']; 
       $terceros_frm_ = $this->terceros_frm_; 
       $sStyleHidden_terceros_frm_ = '';
       if (isset($sCheckRead_terceros_frm_))
       {
           unset($sCheckRead_terceros_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['terceros_frm_']))
       {
           $sCheckRead_terceros_frm_ = $this->nmgp_cmp_readonly['terceros_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['terceros_frm_']) && $this->nmgp_cmp_hidden['terceros_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['terceros_frm_']);
           $sStyleHidden_terceros_frm_ = 'display: none;';
       }
       $bTestReadOnly_terceros_frm_ = true;
       $sStyleReadLab_terceros_frm_ = 'display: none;';
       $sStyleReadInp_terceros_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['terceros_frm_']) && $this->nmgp_cmp_readonly['terceros_frm_'] == 'on')
       {
           $bTestReadOnly_terceros_frm_ = false;
           unset($this->nmgp_cmp_readonly['terceros_frm_']);
           $sStyleReadLab_terceros_frm_ = '';
           $sStyleReadInp_terceros_frm_ = 'display: none;';
       }
       $this->productos_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['productos_lista_']; 
       $productos_lista_ = $this->productos_lista_; 
       $sStyleHidden_productos_lista_ = '';
       if (isset($sCheckRead_productos_lista_))
       {
           unset($sCheckRead_productos_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['productos_lista_']))
       {
           $sCheckRead_productos_lista_ = $this->nmgp_cmp_readonly['productos_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['productos_lista_']) && $this->nmgp_cmp_hidden['productos_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['productos_lista_']);
           $sStyleHidden_productos_lista_ = 'display: none;';
       }
       $bTestReadOnly_productos_lista_ = true;
       $sStyleReadLab_productos_lista_ = 'display: none;';
       $sStyleReadInp_productos_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['productos_lista_']) && $this->nmgp_cmp_readonly['productos_lista_'] == 'on')
       {
           $bTestReadOnly_productos_lista_ = false;
           unset($this->nmgp_cmp_readonly['productos_lista_']);
           $sStyleReadLab_productos_lista_ = '';
           $sStyleReadInp_productos_lista_ = 'display: none;';
       }
       $this->productos_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['productos_frm_']; 
       $productos_frm_ = $this->productos_frm_; 
       $sStyleHidden_productos_frm_ = '';
       if (isset($sCheckRead_productos_frm_))
       {
           unset($sCheckRead_productos_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['productos_frm_']))
       {
           $sCheckRead_productos_frm_ = $this->nmgp_cmp_readonly['productos_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['productos_frm_']) && $this->nmgp_cmp_hidden['productos_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['productos_frm_']);
           $sStyleHidden_productos_frm_ = 'display: none;';
       }
       $bTestReadOnly_productos_frm_ = true;
       $sStyleReadLab_productos_frm_ = 'display: none;';
       $sStyleReadInp_productos_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['productos_frm_']) && $this->nmgp_cmp_readonly['productos_frm_'] == 'on')
       {
           $bTestReadOnly_productos_frm_ = false;
           unset($this->nmgp_cmp_readonly['productos_frm_']);
           $sStyleReadLab_productos_frm_ = '';
           $sStyleReadInp_productos_frm_ = 'display: none;';
       }
       $this->grupos_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['grupos_lista_']; 
       $grupos_lista_ = $this->grupos_lista_; 
       $sStyleHidden_grupos_lista_ = '';
       if (isset($sCheckRead_grupos_lista_))
       {
           unset($sCheckRead_grupos_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['grupos_lista_']))
       {
           $sCheckRead_grupos_lista_ = $this->nmgp_cmp_readonly['grupos_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['grupos_lista_']) && $this->nmgp_cmp_hidden['grupos_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['grupos_lista_']);
           $sStyleHidden_grupos_lista_ = 'display: none;';
       }
       $bTestReadOnly_grupos_lista_ = true;
       $sStyleReadLab_grupos_lista_ = 'display: none;';
       $sStyleReadInp_grupos_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['grupos_lista_']) && $this->nmgp_cmp_readonly['grupos_lista_'] == 'on')
       {
           $bTestReadOnly_grupos_lista_ = false;
           unset($this->nmgp_cmp_readonly['grupos_lista_']);
           $sStyleReadLab_grupos_lista_ = '';
           $sStyleReadInp_grupos_lista_ = 'display: none;';
       }
       $this->grupos_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['grupos_frm_']; 
       $grupos_frm_ = $this->grupos_frm_; 
       $sStyleHidden_grupos_frm_ = '';
       if (isset($sCheckRead_grupos_frm_))
       {
           unset($sCheckRead_grupos_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['grupos_frm_']))
       {
           $sCheckRead_grupos_frm_ = $this->nmgp_cmp_readonly['grupos_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['grupos_frm_']) && $this->nmgp_cmp_hidden['grupos_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['grupos_frm_']);
           $sStyleHidden_grupos_frm_ = 'display: none;';
       }
       $bTestReadOnly_grupos_frm_ = true;
       $sStyleReadLab_grupos_frm_ = 'display: none;';
       $sStyleReadInp_grupos_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['grupos_frm_']) && $this->nmgp_cmp_readonly['grupos_frm_'] == 'on')
       {
           $bTestReadOnly_grupos_frm_ = false;
           unset($this->nmgp_cmp_readonly['grupos_frm_']);
           $sStyleReadLab_grupos_frm_ = '';
           $sStyleReadInp_grupos_frm_ = 'display: none;';
       }
       $this->usuarios_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_lista_']; 
       $usuarios_lista_ = $this->usuarios_lista_; 
       $sStyleHidden_usuarios_lista_ = '';
       if (isset($sCheckRead_usuarios_lista_))
       {
           unset($sCheckRead_usuarios_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['usuarios_lista_']))
       {
           $sCheckRead_usuarios_lista_ = $this->nmgp_cmp_readonly['usuarios_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['usuarios_lista_']) && $this->nmgp_cmp_hidden['usuarios_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usuarios_lista_']);
           $sStyleHidden_usuarios_lista_ = 'display: none;';
       }
       $bTestReadOnly_usuarios_lista_ = true;
       $sStyleReadLab_usuarios_lista_ = 'display: none;';
       $sStyleReadInp_usuarios_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['usuarios_lista_']) && $this->nmgp_cmp_readonly['usuarios_lista_'] == 'on')
       {
           $bTestReadOnly_usuarios_lista_ = false;
           unset($this->nmgp_cmp_readonly['usuarios_lista_']);
           $sStyleReadLab_usuarios_lista_ = '';
           $sStyleReadInp_usuarios_lista_ = 'display: none;';
       }
       $this->usuarios_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_frm_']; 
       $usuarios_frm_ = $this->usuarios_frm_; 
       $sStyleHidden_usuarios_frm_ = '';
       if (isset($sCheckRead_usuarios_frm_))
       {
           unset($sCheckRead_usuarios_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['usuarios_frm_']))
       {
           $sCheckRead_usuarios_frm_ = $this->nmgp_cmp_readonly['usuarios_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['usuarios_frm_']) && $this->nmgp_cmp_hidden['usuarios_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usuarios_frm_']);
           $sStyleHidden_usuarios_frm_ = 'display: none;';
       }
       $bTestReadOnly_usuarios_frm_ = true;
       $sStyleReadLab_usuarios_frm_ = 'display: none;';
       $sStyleReadInp_usuarios_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['usuarios_frm_']) && $this->nmgp_cmp_readonly['usuarios_frm_'] == 'on')
       {
           $bTestReadOnly_usuarios_frm_ = false;
           unset($this->nmgp_cmp_readonly['usuarios_frm_']);
           $sStyleReadLab_usuarios_frm_ = '';
           $sStyleReadInp_usuarios_frm_ = 'display: none;';
       }
       $this->compras_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['compras_lista_']; 
       $compras_lista_ = $this->compras_lista_; 
       $sStyleHidden_compras_lista_ = '';
       if (isset($sCheckRead_compras_lista_))
       {
           unset($sCheckRead_compras_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['compras_lista_']))
       {
           $sCheckRead_compras_lista_ = $this->nmgp_cmp_readonly['compras_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['compras_lista_']) && $this->nmgp_cmp_hidden['compras_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['compras_lista_']);
           $sStyleHidden_compras_lista_ = 'display: none;';
       }
       $bTestReadOnly_compras_lista_ = true;
       $sStyleReadLab_compras_lista_ = 'display: none;';
       $sStyleReadInp_compras_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['compras_lista_']) && $this->nmgp_cmp_readonly['compras_lista_'] == 'on')
       {
           $bTestReadOnly_compras_lista_ = false;
           unset($this->nmgp_cmp_readonly['compras_lista_']);
           $sStyleReadLab_compras_lista_ = '';
           $sStyleReadInp_compras_lista_ = 'display: none;';
       }
       $this->compras_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['compras_frm_']; 
       $compras_frm_ = $this->compras_frm_; 
       $sStyleHidden_compras_frm_ = '';
       if (isset($sCheckRead_compras_frm_))
       {
           unset($sCheckRead_compras_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['compras_frm_']))
       {
           $sCheckRead_compras_frm_ = $this->nmgp_cmp_readonly['compras_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['compras_frm_']) && $this->nmgp_cmp_hidden['compras_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['compras_frm_']);
           $sStyleHidden_compras_frm_ = 'display: none;';
       }
       $bTestReadOnly_compras_frm_ = true;
       $sStyleReadLab_compras_frm_ = 'display: none;';
       $sStyleReadInp_compras_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['compras_frm_']) && $this->nmgp_cmp_readonly['compras_frm_'] == 'on')
       {
           $bTestReadOnly_compras_frm_ = false;
           unset($this->nmgp_cmp_readonly['compras_frm_']);
           $sStyleReadLab_compras_frm_ = '';
           $sStyleReadInp_compras_frm_ = 'display: none;';
       }
       $this->ventas_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['ventas_lista_']; 
       $ventas_lista_ = $this->ventas_lista_; 
       $sStyleHidden_ventas_lista_ = '';
       if (isset($sCheckRead_ventas_lista_))
       {
           unset($sCheckRead_ventas_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['ventas_lista_']))
       {
           $sCheckRead_ventas_lista_ = $this->nmgp_cmp_readonly['ventas_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['ventas_lista_']) && $this->nmgp_cmp_hidden['ventas_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ventas_lista_']);
           $sStyleHidden_ventas_lista_ = 'display: none;';
       }
       $bTestReadOnly_ventas_lista_ = true;
       $sStyleReadLab_ventas_lista_ = 'display: none;';
       $sStyleReadInp_ventas_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['ventas_lista_']) && $this->nmgp_cmp_readonly['ventas_lista_'] == 'on')
       {
           $bTestReadOnly_ventas_lista_ = false;
           unset($this->nmgp_cmp_readonly['ventas_lista_']);
           $sStyleReadLab_ventas_lista_ = '';
           $sStyleReadInp_ventas_lista_ = 'display: none;';
       }
       $this->ventas_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['ventas_frm_']; 
       $ventas_frm_ = $this->ventas_frm_; 
       $sStyleHidden_ventas_frm_ = '';
       if (isset($sCheckRead_ventas_frm_))
       {
           unset($sCheckRead_ventas_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['ventas_frm_']))
       {
           $sCheckRead_ventas_frm_ = $this->nmgp_cmp_readonly['ventas_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['ventas_frm_']) && $this->nmgp_cmp_hidden['ventas_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ventas_frm_']);
           $sStyleHidden_ventas_frm_ = 'display: none;';
       }
       $bTestReadOnly_ventas_frm_ = true;
       $sStyleReadLab_ventas_frm_ = 'display: none;';
       $sStyleReadInp_ventas_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['ventas_frm_']) && $this->nmgp_cmp_readonly['ventas_frm_'] == 'on')
       {
           $bTestReadOnly_ventas_frm_ = false;
           unset($this->nmgp_cmp_readonly['ventas_frm_']);
           $sStyleReadLab_ventas_frm_ = '';
           $sStyleReadInp_ventas_frm_ = 'display: none;';
       }
       $this->cartera_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['cartera_lista_']; 
       $cartera_lista_ = $this->cartera_lista_; 
       $sStyleHidden_cartera_lista_ = '';
       if (isset($sCheckRead_cartera_lista_))
       {
           unset($sCheckRead_cartera_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['cartera_lista_']))
       {
           $sCheckRead_cartera_lista_ = $this->nmgp_cmp_readonly['cartera_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['cartera_lista_']) && $this->nmgp_cmp_hidden['cartera_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cartera_lista_']);
           $sStyleHidden_cartera_lista_ = 'display: none;';
       }
       $bTestReadOnly_cartera_lista_ = true;
       $sStyleReadLab_cartera_lista_ = 'display: none;';
       $sStyleReadInp_cartera_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['cartera_lista_']) && $this->nmgp_cmp_readonly['cartera_lista_'] == 'on')
       {
           $bTestReadOnly_cartera_lista_ = false;
           unset($this->nmgp_cmp_readonly['cartera_lista_']);
           $sStyleReadLab_cartera_lista_ = '';
           $sStyleReadInp_cartera_lista_ = 'display: none;';
       }
       $this->cartera_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['cartera_frm_']; 
       $cartera_frm_ = $this->cartera_frm_; 
       $sStyleHidden_cartera_frm_ = '';
       if (isset($sCheckRead_cartera_frm_))
       {
           unset($sCheckRead_cartera_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['cartera_frm_']))
       {
           $sCheckRead_cartera_frm_ = $this->nmgp_cmp_readonly['cartera_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['cartera_frm_']) && $this->nmgp_cmp_hidden['cartera_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cartera_frm_']);
           $sStyleHidden_cartera_frm_ = 'display: none;';
       }
       $bTestReadOnly_cartera_frm_ = true;
       $sStyleReadLab_cartera_frm_ = 'display: none;';
       $sStyleReadInp_cartera_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['cartera_frm_']) && $this->nmgp_cmp_readonly['cartera_frm_'] == 'on')
       {
           $bTestReadOnly_cartera_frm_ = false;
           unset($this->nmgp_cmp_readonly['cartera_frm_']);
           $sStyleReadLab_cartera_frm_ = '';
           $sStyleReadInp_cartera_frm_ = 'display: none;';
       }
       $this->caja_lista_ = $this->form_vert_form_permisos[$sc_seq_vert]['caja_lista_']; 
       $caja_lista_ = $this->caja_lista_; 
       $sStyleHidden_caja_lista_ = '';
       if (isset($sCheckRead_caja_lista_))
       {
           unset($sCheckRead_caja_lista_);
       }
       if (isset($this->nmgp_cmp_readonly['caja_lista_']))
       {
           $sCheckRead_caja_lista_ = $this->nmgp_cmp_readonly['caja_lista_'];
       }
       if (isset($this->nmgp_cmp_hidden['caja_lista_']) && $this->nmgp_cmp_hidden['caja_lista_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['caja_lista_']);
           $sStyleHidden_caja_lista_ = 'display: none;';
       }
       $bTestReadOnly_caja_lista_ = true;
       $sStyleReadLab_caja_lista_ = 'display: none;';
       $sStyleReadInp_caja_lista_ = '';
       if (isset($this->nmgp_cmp_readonly['caja_lista_']) && $this->nmgp_cmp_readonly['caja_lista_'] == 'on')
       {
           $bTestReadOnly_caja_lista_ = false;
           unset($this->nmgp_cmp_readonly['caja_lista_']);
           $sStyleReadLab_caja_lista_ = '';
           $sStyleReadInp_caja_lista_ = 'display: none;';
       }
       $this->caja_frm_ = $this->form_vert_form_permisos[$sc_seq_vert]['caja_frm_']; 
       $caja_frm_ = $this->caja_frm_; 
       $sStyleHidden_caja_frm_ = '';
       if (isset($sCheckRead_caja_frm_))
       {
           unset($sCheckRead_caja_frm_);
       }
       if (isset($this->nmgp_cmp_readonly['caja_frm_']))
       {
           $sCheckRead_caja_frm_ = $this->nmgp_cmp_readonly['caja_frm_'];
       }
       if (isset($this->nmgp_cmp_hidden['caja_frm_']) && $this->nmgp_cmp_hidden['caja_frm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['caja_frm_']);
           $sStyleHidden_caja_frm_ = 'display: none;';
       }
       $bTestReadOnly_caja_frm_ = true;
       $sStyleReadLab_caja_frm_ = 'display: none;';
       $sStyleReadInp_caja_frm_ = '';
       if (isset($this->nmgp_cmp_readonly['caja_frm_']) && $this->nmgp_cmp_readonly['caja_frm_'] == 'on')
       {
           $bTestReadOnly_caja_frm_ = false;
           unset($this->nmgp_cmp_readonly['caja_frm_']);
           $sStyleReadLab_caja_frm_ = '';
           $sStyleReadInp_caja_frm_ = 'display: none;';
       }
       $this->mantenimiento_ = $this->form_vert_form_permisos[$sc_seq_vert]['mantenimiento_']; 
       $mantenimiento_ = $this->mantenimiento_; 
       $sStyleHidden_mantenimiento_ = '';
       if (isset($sCheckRead_mantenimiento_))
       {
           unset($sCheckRead_mantenimiento_);
       }
       if (isset($this->nmgp_cmp_readonly['mantenimiento_']))
       {
           $sCheckRead_mantenimiento_ = $this->nmgp_cmp_readonly['mantenimiento_'];
       }
       if (isset($this->nmgp_cmp_hidden['mantenimiento_']) && $this->nmgp_cmp_hidden['mantenimiento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['mantenimiento_']);
           $sStyleHidden_mantenimiento_ = 'display: none;';
       }
       $bTestReadOnly_mantenimiento_ = true;
       $sStyleReadLab_mantenimiento_ = 'display: none;';
       $sStyleReadInp_mantenimiento_ = '';
       if (isset($this->nmgp_cmp_readonly['mantenimiento_']) && $this->nmgp_cmp_readonly['mantenimiento_'] == 'on')
       {
           $bTestReadOnly_mantenimiento_ = false;
           unset($this->nmgp_cmp_readonly['mantenimiento_']);
           $sStyleReadLab_mantenimiento_ = '';
           $sStyleReadInp_mantenimiento_ = 'display: none;';
       }
       $this->empresa_ = $this->form_vert_form_permisos[$sc_seq_vert]['empresa_']; 
       $empresa_ = $this->empresa_; 
       $sStyleHidden_empresa_ = '';
       if (isset($sCheckRead_empresa_))
       {
           unset($sCheckRead_empresa_);
       }
       if (isset($this->nmgp_cmp_readonly['empresa_']))
       {
           $sCheckRead_empresa_ = $this->nmgp_cmp_readonly['empresa_'];
       }
       if (isset($this->nmgp_cmp_hidden['empresa_']) && $this->nmgp_cmp_hidden['empresa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['empresa_']);
           $sStyleHidden_empresa_ = 'display: none;';
       }
       $bTestReadOnly_empresa_ = true;
       $sStyleReadLab_empresa_ = 'display: none;';
       $sStyleReadInp_empresa_ = '';
       if (isset($this->nmgp_cmp_readonly['empresa_']) && $this->nmgp_cmp_readonly['empresa_'] == 'on')
       {
           $bTestReadOnly_empresa_ = false;
           unset($this->nmgp_cmp_readonly['empresa_']);
           $sStyleReadLab_empresa_ = '';
           $sStyleReadInp_empresa_ = 'display: none;';
       }
       $this->inventario_ = $this->form_vert_form_permisos[$sc_seq_vert]['inventario_']; 
       $inventario_ = $this->inventario_; 
       $sStyleHidden_inventario_ = '';
       if (isset($sCheckRead_inventario_))
       {
           unset($sCheckRead_inventario_);
       }
       if (isset($this->nmgp_cmp_readonly['inventario_']))
       {
           $sCheckRead_inventario_ = $this->nmgp_cmp_readonly['inventario_'];
       }
       if (isset($this->nmgp_cmp_hidden['inventario_']) && $this->nmgp_cmp_hidden['inventario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inventario_']);
           $sStyleHidden_inventario_ = 'display: none;';
       }
       $bTestReadOnly_inventario_ = true;
       $sStyleReadLab_inventario_ = 'display: none;';
       $sStyleReadInp_inventario_ = '';
       if (isset($this->nmgp_cmp_readonly['inventario_']) && $this->nmgp_cmp_readonly['inventario_'] == 'on')
       {
           $bTestReadOnly_inventario_ = false;
           unset($this->nmgp_cmp_readonly['inventario_']);
           $sStyleReadLab_inventario_ = '';
           $sStyleReadInp_inventario_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_permisos_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_permisos_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_permisos_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_permisos_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_permisos_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_permisos_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_usuario__line" id="hidden_field_data_usuario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usuario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usuario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_"]) &&  $this->nmgp_cmp_readonly["usuario_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array(); 
    }
   $nm_comando = "SELECT idusuarios, usuario  FROM usuarios  WHERE idusuarios != 1 ORDER BY usuario";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'][] = $rs->fields[0];
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
   $usuario__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->usuario__1))
          {
              foreach ($this->usuario__1 as $tmp_usuario_)
              {
                  if (trim($tmp_usuario_) === trim($cadaselect[1])) { $usuario__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->usuario_) === trim($cadaselect[1])) { $usuario__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">" . $usuario__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_usuario_();
   $x = 0 ; 
   $usuario__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->usuario__1))
          {
              foreach ($this->usuario__1 as $tmp_usuario_)
              {
                  if (trim($tmp_usuario_) === trim($cadaselect[1])) { $usuario__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->usuario_) === trim($cadaselect[1])) { $usuario__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($usuario__look))
          {
              $usuario__look = $this->usuario_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_usuario_" . $sc_seq_vert . "\" class=\"css_usuario__line\" style=\"" .  $sStyleReadLab_usuario_ . "\">" . $this->form_format_readonly("usuario_", $this->form_encode_input($usuario__look)) . "</span><span id=\"id_read_off_usuario_" . $sc_seq_vert . "\" class=\"css_read_off_usuario_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_usuario_ . "\">";
   echo " <span id=\"idAjaxSelect_usuario_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_usuario__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_usuario_" . $sc_seq_vert . "\" name=\"usuario_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->usuario_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->usuario_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['terceros_lista_']) && $this->nmgp_cmp_hidden['terceros_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="terceros_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->terceros_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->terceros_lista__1 = explode(";", trim($this->terceros_lista_));
  } 
  else
  {
      if (empty($this->terceros_lista_))
      {
          $this->terceros_lista__1= array(); 
          $this->terceros_lista_= "N";
      } 
      else
      {
          $this->terceros_lista__1= $this->terceros_lista_; 
          $this->terceros_lista_= ""; 
          foreach ($this->terceros_lista__1 as $cada_terceros_lista_)
          {
             if (!empty($terceros_lista_))
             {
                 $this->terceros_lista_.= ";"; 
             } 
             $this->terceros_lista_.= $cada_terceros_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_terceros_lista__line" id="hidden_field_data_terceros_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_terceros_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_terceros_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_terceros_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["terceros_lista_"]) &&  $this->nmgp_cmp_readonly["terceros_lista_"] == "on") { 

$terceros_lista__look = "";
 if ($this->terceros_lista_ == "S") { $terceros_lista__look .= "" ;} 
 if (empty($terceros_lista__look)) { $terceros_lista__look = $this->terceros_lista_; }
?>
<input type="hidden" name="terceros_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($terceros_lista_) . "\">" . $terceros_lista__look . ""; ?>
<?php } else { ?>

<?php

$terceros_lista__look = "";
 if ($this->terceros_lista_ == "S") { $terceros_lista__look .= "" ;} 
 if (empty($terceros_lista__look)) { $terceros_lista__look = $this->terceros_lista_; }
?>
<span id="id_read_on_terceros_lista_<?php echo $sc_seq_vert ; ?>" class="css_terceros_lista__line" style="<?php echo $sStyleReadLab_terceros_lista_; ?>"><?php echo $this->form_format_readonly("terceros_lista_", $this->form_encode_input($terceros_lista__look)); ?></span><span id="id_read_off_terceros_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_terceros_lista_ css_terceros_lista__line" style="<?php echo $sStyleReadInp_terceros_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_terceros_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_terceros_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_terceros_lista__line"><?php $tempOptionId = "id-opt-terceros_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-terceros_lista_ sc-ui-checkbox-terceros_lista_<?php echo $sc_seq_vert ?>" name="terceros_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_terceros_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->terceros_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_terceros_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_terceros_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['terceros_frm_']) && $this->nmgp_cmp_hidden['terceros_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="terceros_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->terceros_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->terceros_frm__1 = explode(";", trim($this->terceros_frm_));
  } 
  else
  {
      if (empty($this->terceros_frm_))
      {
          $this->terceros_frm__1= array(); 
          $this->terceros_frm_= "N";
      } 
      else
      {
          $this->terceros_frm__1= $this->terceros_frm_; 
          $this->terceros_frm_= ""; 
          foreach ($this->terceros_frm__1 as $cada_terceros_frm_)
          {
             if (!empty($terceros_frm_))
             {
                 $this->terceros_frm_.= ";"; 
             } 
             $this->terceros_frm_.= $cada_terceros_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_terceros_frm__line" id="hidden_field_data_terceros_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_terceros_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_terceros_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_terceros_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["terceros_frm_"]) &&  $this->nmgp_cmp_readonly["terceros_frm_"] == "on") { 

$terceros_frm__look = "";
 if ($this->terceros_frm_ == "S") { $terceros_frm__look .= "" ;} 
 if (empty($terceros_frm__look)) { $terceros_frm__look = $this->terceros_frm_; }
?>
<input type="hidden" name="terceros_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($terceros_frm_) . "\">" . $terceros_frm__look . ""; ?>
<?php } else { ?>

<?php

$terceros_frm__look = "";
 if ($this->terceros_frm_ == "S") { $terceros_frm__look .= "" ;} 
 if (empty($terceros_frm__look)) { $terceros_frm__look = $this->terceros_frm_; }
?>
<span id="id_read_on_terceros_frm_<?php echo $sc_seq_vert ; ?>" class="css_terceros_frm__line" style="<?php echo $sStyleReadLab_terceros_frm_; ?>"><?php echo $this->form_format_readonly("terceros_frm_", $this->form_encode_input($terceros_frm__look)); ?></span><span id="id_read_off_terceros_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_terceros_frm_ css_terceros_frm__line" style="<?php echo $sStyleReadInp_terceros_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_terceros_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_terceros_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_terceros_frm__line"><?php $tempOptionId = "id-opt-terceros_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-terceros_frm_ sc-ui-checkbox-terceros_frm_<?php echo $sc_seq_vert ?>" name="terceros_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_terceros_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->terceros_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_terceros_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_terceros_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['productos_lista_']) && $this->nmgp_cmp_hidden['productos_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="productos_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->productos_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->productos_lista__1 = explode(";", trim($this->productos_lista_));
  } 
  else
  {
      if (empty($this->productos_lista_))
      {
          $this->productos_lista__1= array(); 
          $this->productos_lista_= "N";
      } 
      else
      {
          $this->productos_lista__1= $this->productos_lista_; 
          $this->productos_lista_= ""; 
          foreach ($this->productos_lista__1 as $cada_productos_lista_)
          {
             if (!empty($productos_lista_))
             {
                 $this->productos_lista_.= ";"; 
             } 
             $this->productos_lista_.= $cada_productos_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_productos_lista__line" id="hidden_field_data_productos_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_productos_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_productos_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_productos_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["productos_lista_"]) &&  $this->nmgp_cmp_readonly["productos_lista_"] == "on") { 

$productos_lista__look = "";
 if ($this->productos_lista_ == "S") { $productos_lista__look .= "" ;} 
 if (empty($productos_lista__look)) { $productos_lista__look = $this->productos_lista_; }
?>
<input type="hidden" name="productos_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($productos_lista_) . "\">" . $productos_lista__look . ""; ?>
<?php } else { ?>

<?php

$productos_lista__look = "";
 if ($this->productos_lista_ == "S") { $productos_lista__look .= "" ;} 
 if (empty($productos_lista__look)) { $productos_lista__look = $this->productos_lista_; }
?>
<span id="id_read_on_productos_lista_<?php echo $sc_seq_vert ; ?>" class="css_productos_lista__line" style="<?php echo $sStyleReadLab_productos_lista_; ?>"><?php echo $this->form_format_readonly("productos_lista_", $this->form_encode_input($productos_lista__look)); ?></span><span id="id_read_off_productos_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_productos_lista_ css_productos_lista__line" style="<?php echo $sStyleReadInp_productos_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_productos_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_productos_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_productos_lista__line"><?php $tempOptionId = "id-opt-productos_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-productos_lista_ sc-ui-checkbox-productos_lista_<?php echo $sc_seq_vert ?>" name="productos_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_productos_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->productos_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_productos_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_productos_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['productos_frm_']) && $this->nmgp_cmp_hidden['productos_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="productos_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->productos_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->productos_frm__1 = explode(";", trim($this->productos_frm_));
  } 
  else
  {
      if (empty($this->productos_frm_))
      {
          $this->productos_frm__1= array(); 
          $this->productos_frm_= "N";
      } 
      else
      {
          $this->productos_frm__1= $this->productos_frm_; 
          $this->productos_frm_= ""; 
          foreach ($this->productos_frm__1 as $cada_productos_frm_)
          {
             if (!empty($productos_frm_))
             {
                 $this->productos_frm_.= ";"; 
             } 
             $this->productos_frm_.= $cada_productos_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_productos_frm__line" id="hidden_field_data_productos_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_productos_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_productos_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_productos_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["productos_frm_"]) &&  $this->nmgp_cmp_readonly["productos_frm_"] == "on") { 

$productos_frm__look = "";
 if ($this->productos_frm_ == "S") { $productos_frm__look .= "" ;} 
 if (empty($productos_frm__look)) { $productos_frm__look = $this->productos_frm_; }
?>
<input type="hidden" name="productos_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($productos_frm_) . "\">" . $productos_frm__look . ""; ?>
<?php } else { ?>

<?php

$productos_frm__look = "";
 if ($this->productos_frm_ == "S") { $productos_frm__look .= "" ;} 
 if (empty($productos_frm__look)) { $productos_frm__look = $this->productos_frm_; }
?>
<span id="id_read_on_productos_frm_<?php echo $sc_seq_vert ; ?>" class="css_productos_frm__line" style="<?php echo $sStyleReadLab_productos_frm_; ?>"><?php echo $this->form_format_readonly("productos_frm_", $this->form_encode_input($productos_frm__look)); ?></span><span id="id_read_off_productos_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_productos_frm_ css_productos_frm__line" style="<?php echo $sStyleReadInp_productos_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_productos_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_productos_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_productos_frm__line"><?php $tempOptionId = "id-opt-productos_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-productos_frm_ sc-ui-checkbox-productos_frm_<?php echo $sc_seq_vert ?>" name="productos_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_productos_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->productos_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_productos_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_productos_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['grupos_lista_']) && $this->nmgp_cmp_hidden['grupos_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grupos_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->grupos_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->grupos_lista__1 = explode(";", trim($this->grupos_lista_));
  } 
  else
  {
      if (empty($this->grupos_lista_))
      {
          $this->grupos_lista__1= array(); 
          $this->grupos_lista_= "N";
      } 
      else
      {
          $this->grupos_lista__1= $this->grupos_lista_; 
          $this->grupos_lista_= ""; 
          foreach ($this->grupos_lista__1 as $cada_grupos_lista_)
          {
             if (!empty($grupos_lista_))
             {
                 $this->grupos_lista_.= ";"; 
             } 
             $this->grupos_lista_.= $cada_grupos_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_grupos_lista__line" id="hidden_field_data_grupos_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_grupos_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_grupos_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_grupos_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grupos_lista_"]) &&  $this->nmgp_cmp_readonly["grupos_lista_"] == "on") { 

$grupos_lista__look = "";
 if ($this->grupos_lista_ == "S") { $grupos_lista__look .= "" ;} 
 if (empty($grupos_lista__look)) { $grupos_lista__look = $this->grupos_lista_; }
?>
<input type="hidden" name="grupos_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($grupos_lista_) . "\">" . $grupos_lista__look . ""; ?>
<?php } else { ?>

<?php

$grupos_lista__look = "";
 if ($this->grupos_lista_ == "S") { $grupos_lista__look .= "" ;} 
 if (empty($grupos_lista__look)) { $grupos_lista__look = $this->grupos_lista_; }
?>
<span id="id_read_on_grupos_lista_<?php echo $sc_seq_vert ; ?>" class="css_grupos_lista__line" style="<?php echo $sStyleReadLab_grupos_lista_; ?>"><?php echo $this->form_format_readonly("grupos_lista_", $this->form_encode_input($grupos_lista__look)); ?></span><span id="id_read_off_grupos_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_grupos_lista_ css_grupos_lista__line" style="<?php echo $sStyleReadInp_grupos_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_grupos_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_grupos_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_grupos_lista__line"><?php $tempOptionId = "id-opt-grupos_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-grupos_lista_ sc-ui-checkbox-grupos_lista_<?php echo $sc_seq_vert ?>" name="grupos_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_grupos_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->grupos_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grupos_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grupos_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['grupos_frm_']) && $this->nmgp_cmp_hidden['grupos_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grupos_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->grupos_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->grupos_frm__1 = explode(";", trim($this->grupos_frm_));
  } 
  else
  {
      if (empty($this->grupos_frm_))
      {
          $this->grupos_frm__1= array(); 
          $this->grupos_frm_= "N";
      } 
      else
      {
          $this->grupos_frm__1= $this->grupos_frm_; 
          $this->grupos_frm_= ""; 
          foreach ($this->grupos_frm__1 as $cada_grupos_frm_)
          {
             if (!empty($grupos_frm_))
             {
                 $this->grupos_frm_.= ";"; 
             } 
             $this->grupos_frm_.= $cada_grupos_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_grupos_frm__line" id="hidden_field_data_grupos_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_grupos_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_grupos_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_grupos_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grupos_frm_"]) &&  $this->nmgp_cmp_readonly["grupos_frm_"] == "on") { 

$grupos_frm__look = "";
 if ($this->grupos_frm_ == "S") { $grupos_frm__look .= "" ;} 
 if (empty($grupos_frm__look)) { $grupos_frm__look = $this->grupos_frm_; }
?>
<input type="hidden" name="grupos_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($grupos_frm_) . "\">" . $grupos_frm__look . ""; ?>
<?php } else { ?>

<?php

$grupos_frm__look = "";
 if ($this->grupos_frm_ == "S") { $grupos_frm__look .= "" ;} 
 if (empty($grupos_frm__look)) { $grupos_frm__look = $this->grupos_frm_; }
?>
<span id="id_read_on_grupos_frm_<?php echo $sc_seq_vert ; ?>" class="css_grupos_frm__line" style="<?php echo $sStyleReadLab_grupos_frm_; ?>"><?php echo $this->form_format_readonly("grupos_frm_", $this->form_encode_input($grupos_frm__look)); ?></span><span id="id_read_off_grupos_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_grupos_frm_ css_grupos_frm__line" style="<?php echo $sStyleReadInp_grupos_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_grupos_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_grupos_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_grupos_frm__line"><?php $tempOptionId = "id-opt-grupos_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-grupos_frm_ sc-ui-checkbox-grupos_frm_<?php echo $sc_seq_vert ?>" name="grupos_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_grupos_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->grupos_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grupos_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grupos_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['usuarios_lista_']) && $this->nmgp_cmp_hidden['usuarios_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="usuarios_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->usuarios_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->usuarios_lista__1 = explode(";", trim($this->usuarios_lista_));
  } 
  else
  {
      if (empty($this->usuarios_lista_))
      {
          $this->usuarios_lista__1= array(); 
          $this->usuarios_lista_= "N";
      } 
      else
      {
          $this->usuarios_lista__1= $this->usuarios_lista_; 
          $this->usuarios_lista_= ""; 
          foreach ($this->usuarios_lista__1 as $cada_usuarios_lista_)
          {
             if (!empty($usuarios_lista_))
             {
                 $this->usuarios_lista_.= ";"; 
             } 
             $this->usuarios_lista_.= $cada_usuarios_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_usuarios_lista__line" id="hidden_field_data_usuarios_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usuarios_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usuarios_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usuarios_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuarios_lista_"]) &&  $this->nmgp_cmp_readonly["usuarios_lista_"] == "on") { 

$usuarios_lista__look = "";
 if ($this->usuarios_lista_ == "S") { $usuarios_lista__look .= "" ;} 
 if (empty($usuarios_lista__look)) { $usuarios_lista__look = $this->usuarios_lista_; }
?>
<input type="hidden" name="usuarios_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuarios_lista_) . "\">" . $usuarios_lista__look . ""; ?>
<?php } else { ?>

<?php

$usuarios_lista__look = "";
 if ($this->usuarios_lista_ == "S") { $usuarios_lista__look .= "" ;} 
 if (empty($usuarios_lista__look)) { $usuarios_lista__look = $this->usuarios_lista_; }
?>
<span id="id_read_on_usuarios_lista_<?php echo $sc_seq_vert ; ?>" class="css_usuarios_lista__line" style="<?php echo $sStyleReadLab_usuarios_lista_; ?>"><?php echo $this->form_format_readonly("usuarios_lista_", $this->form_encode_input($usuarios_lista__look)); ?></span><span id="id_read_off_usuarios_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_usuarios_lista_ css_usuarios_lista__line" style="<?php echo $sStyleReadInp_usuarios_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_usuarios_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_usuarios_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_usuarios_lista__line"><?php $tempOptionId = "id-opt-usuarios_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-usuarios_lista_ sc-ui-checkbox-usuarios_lista_<?php echo $sc_seq_vert ?>" name="usuarios_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuarios_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->usuarios_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuarios_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuarios_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['usuarios_frm_']) && $this->nmgp_cmp_hidden['usuarios_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="usuarios_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->usuarios_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->usuarios_frm__1 = explode(";", trim($this->usuarios_frm_));
  } 
  else
  {
      if (empty($this->usuarios_frm_))
      {
          $this->usuarios_frm__1= array(); 
          $this->usuarios_frm_= "N";
      } 
      else
      {
          $this->usuarios_frm__1= $this->usuarios_frm_; 
          $this->usuarios_frm_= ""; 
          foreach ($this->usuarios_frm__1 as $cada_usuarios_frm_)
          {
             if (!empty($usuarios_frm_))
             {
                 $this->usuarios_frm_.= ";"; 
             } 
             $this->usuarios_frm_.= $cada_usuarios_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_usuarios_frm__line" id="hidden_field_data_usuarios_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usuarios_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usuarios_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usuarios_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuarios_frm_"]) &&  $this->nmgp_cmp_readonly["usuarios_frm_"] == "on") { 

$usuarios_frm__look = "";
 if ($this->usuarios_frm_ == "S") { $usuarios_frm__look .= "" ;} 
 if (empty($usuarios_frm__look)) { $usuarios_frm__look = $this->usuarios_frm_; }
?>
<input type="hidden" name="usuarios_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuarios_frm_) . "\">" . $usuarios_frm__look . ""; ?>
<?php } else { ?>

<?php

$usuarios_frm__look = "";
 if ($this->usuarios_frm_ == "S") { $usuarios_frm__look .= "" ;} 
 if (empty($usuarios_frm__look)) { $usuarios_frm__look = $this->usuarios_frm_; }
?>
<span id="id_read_on_usuarios_frm_<?php echo $sc_seq_vert ; ?>" class="css_usuarios_frm__line" style="<?php echo $sStyleReadLab_usuarios_frm_; ?>"><?php echo $this->form_format_readonly("usuarios_frm_", $this->form_encode_input($usuarios_frm__look)); ?></span><span id="id_read_off_usuarios_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_usuarios_frm_ css_usuarios_frm__line" style="<?php echo $sStyleReadInp_usuarios_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_usuarios_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_usuarios_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_usuarios_frm__line"><?php $tempOptionId = "id-opt-usuarios_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-usuarios_frm_ sc-ui-checkbox-usuarios_frm_<?php echo $sc_seq_vert ?>" name="usuarios_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuarios_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->usuarios_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuarios_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuarios_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['compras_lista_']) && $this->nmgp_cmp_hidden['compras_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="compras_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->compras_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->compras_lista__1 = explode(";", trim($this->compras_lista_));
  } 
  else
  {
      if (empty($this->compras_lista_))
      {
          $this->compras_lista__1= array(); 
          $this->compras_lista_= "N";
      } 
      else
      {
          $this->compras_lista__1= $this->compras_lista_; 
          $this->compras_lista_= ""; 
          foreach ($this->compras_lista__1 as $cada_compras_lista_)
          {
             if (!empty($compras_lista_))
             {
                 $this->compras_lista_.= ";"; 
             } 
             $this->compras_lista_.= $cada_compras_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_compras_lista__line" id="hidden_field_data_compras_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_compras_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_compras_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_compras_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["compras_lista_"]) &&  $this->nmgp_cmp_readonly["compras_lista_"] == "on") { 

$compras_lista__look = "";
 if ($this->compras_lista_ == "S") { $compras_lista__look .= "" ;} 
 if (empty($compras_lista__look)) { $compras_lista__look = $this->compras_lista_; }
?>
<input type="hidden" name="compras_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($compras_lista_) . "\">" . $compras_lista__look . ""; ?>
<?php } else { ?>

<?php

$compras_lista__look = "";
 if ($this->compras_lista_ == "S") { $compras_lista__look .= "" ;} 
 if (empty($compras_lista__look)) { $compras_lista__look = $this->compras_lista_; }
?>
<span id="id_read_on_compras_lista_<?php echo $sc_seq_vert ; ?>" class="css_compras_lista__line" style="<?php echo $sStyleReadLab_compras_lista_; ?>"><?php echo $this->form_format_readonly("compras_lista_", $this->form_encode_input($compras_lista__look)); ?></span><span id="id_read_off_compras_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_compras_lista_ css_compras_lista__line" style="<?php echo $sStyleReadInp_compras_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_compras_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_compras_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_compras_lista__line"><?php $tempOptionId = "id-opt-compras_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-compras_lista_ sc-ui-checkbox-compras_lista_<?php echo $sc_seq_vert ?>" name="compras_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_compras_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->compras_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_compras_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_compras_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['compras_frm_']) && $this->nmgp_cmp_hidden['compras_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="compras_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->compras_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->compras_frm__1 = explode(";", trim($this->compras_frm_));
  } 
  else
  {
      if (empty($this->compras_frm_))
      {
          $this->compras_frm__1= array(); 
          $this->compras_frm_= "N";
      } 
      else
      {
          $this->compras_frm__1= $this->compras_frm_; 
          $this->compras_frm_= ""; 
          foreach ($this->compras_frm__1 as $cada_compras_frm_)
          {
             if (!empty($compras_frm_))
             {
                 $this->compras_frm_.= ";"; 
             } 
             $this->compras_frm_.= $cada_compras_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_compras_frm__line" id="hidden_field_data_compras_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_compras_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_compras_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_compras_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["compras_frm_"]) &&  $this->nmgp_cmp_readonly["compras_frm_"] == "on") { 

$compras_frm__look = "";
 if ($this->compras_frm_ == "S") { $compras_frm__look .= "" ;} 
 if (empty($compras_frm__look)) { $compras_frm__look = $this->compras_frm_; }
?>
<input type="hidden" name="compras_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($compras_frm_) . "\">" . $compras_frm__look . ""; ?>
<?php } else { ?>

<?php

$compras_frm__look = "";
 if ($this->compras_frm_ == "S") { $compras_frm__look .= "" ;} 
 if (empty($compras_frm__look)) { $compras_frm__look = $this->compras_frm_; }
?>
<span id="id_read_on_compras_frm_<?php echo $sc_seq_vert ; ?>" class="css_compras_frm__line" style="<?php echo $sStyleReadLab_compras_frm_; ?>"><?php echo $this->form_format_readonly("compras_frm_", $this->form_encode_input($compras_frm__look)); ?></span><span id="id_read_off_compras_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_compras_frm_ css_compras_frm__line" style="<?php echo $sStyleReadInp_compras_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_compras_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_compras_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_compras_frm__line"><?php $tempOptionId = "id-opt-compras_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-compras_frm_ sc-ui-checkbox-compras_frm_<?php echo $sc_seq_vert ?>" name="compras_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_compras_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->compras_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_compras_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_compras_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ventas_lista_']) && $this->nmgp_cmp_hidden['ventas_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ventas_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->ventas_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ventas_lista__1 = explode(";", trim($this->ventas_lista_));
  } 
  else
  {
      if (empty($this->ventas_lista_))
      {
          $this->ventas_lista__1= array(); 
          $this->ventas_lista_= "N";
      } 
      else
      {
          $this->ventas_lista__1= $this->ventas_lista_; 
          $this->ventas_lista_= ""; 
          foreach ($this->ventas_lista__1 as $cada_ventas_lista_)
          {
             if (!empty($ventas_lista_))
             {
                 $this->ventas_lista_.= ";"; 
             } 
             $this->ventas_lista_.= $cada_ventas_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_ventas_lista__line" id="hidden_field_data_ventas_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ventas_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ventas_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ventas_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ventas_lista_"]) &&  $this->nmgp_cmp_readonly["ventas_lista_"] == "on") { 

$ventas_lista__look = "";
 if ($this->ventas_lista_ == "S") { $ventas_lista__look .= "" ;} 
 if (empty($ventas_lista__look)) { $ventas_lista__look = $this->ventas_lista_; }
?>
<input type="hidden" name="ventas_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ventas_lista_) . "\">" . $ventas_lista__look . ""; ?>
<?php } else { ?>

<?php

$ventas_lista__look = "";
 if ($this->ventas_lista_ == "S") { $ventas_lista__look .= "" ;} 
 if (empty($ventas_lista__look)) { $ventas_lista__look = $this->ventas_lista_; }
?>
<span id="id_read_on_ventas_lista_<?php echo $sc_seq_vert ; ?>" class="css_ventas_lista__line" style="<?php echo $sStyleReadLab_ventas_lista_; ?>"><?php echo $this->form_format_readonly("ventas_lista_", $this->form_encode_input($ventas_lista__look)); ?></span><span id="id_read_off_ventas_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_ventas_lista_ css_ventas_lista__line" style="<?php echo $sStyleReadInp_ventas_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_ventas_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_ventas_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_ventas_lista__line"><?php $tempOptionId = "id-opt-ventas_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ventas_lista_ sc-ui-checkbox-ventas_lista_<?php echo $sc_seq_vert ?>" name="ventas_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_ventas_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->ventas_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ventas_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ventas_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ventas_frm_']) && $this->nmgp_cmp_hidden['ventas_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ventas_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->ventas_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ventas_frm__1 = explode(";", trim($this->ventas_frm_));
  } 
  else
  {
      if (empty($this->ventas_frm_))
      {
          $this->ventas_frm__1= array(); 
          $this->ventas_frm_= "N";
      } 
      else
      {
          $this->ventas_frm__1= $this->ventas_frm_; 
          $this->ventas_frm_= ""; 
          foreach ($this->ventas_frm__1 as $cada_ventas_frm_)
          {
             if (!empty($ventas_frm_))
             {
                 $this->ventas_frm_.= ";"; 
             } 
             $this->ventas_frm_.= $cada_ventas_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_ventas_frm__line" id="hidden_field_data_ventas_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ventas_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ventas_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ventas_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ventas_frm_"]) &&  $this->nmgp_cmp_readonly["ventas_frm_"] == "on") { 

$ventas_frm__look = "";
 if ($this->ventas_frm_ == "S") { $ventas_frm__look .= "" ;} 
 if (empty($ventas_frm__look)) { $ventas_frm__look = $this->ventas_frm_; }
?>
<input type="hidden" name="ventas_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ventas_frm_) . "\">" . $ventas_frm__look . ""; ?>
<?php } else { ?>

<?php

$ventas_frm__look = "";
 if ($this->ventas_frm_ == "S") { $ventas_frm__look .= "" ;} 
 if (empty($ventas_frm__look)) { $ventas_frm__look = $this->ventas_frm_; }
?>
<span id="id_read_on_ventas_frm_<?php echo $sc_seq_vert ; ?>" class="css_ventas_frm__line" style="<?php echo $sStyleReadLab_ventas_frm_; ?>"><?php echo $this->form_format_readonly("ventas_frm_", $this->form_encode_input($ventas_frm__look)); ?></span><span id="id_read_off_ventas_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_ventas_frm_ css_ventas_frm__line" style="<?php echo $sStyleReadInp_ventas_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_ventas_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_ventas_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_ventas_frm__line"><?php $tempOptionId = "id-opt-ventas_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ventas_frm_ sc-ui-checkbox-ventas_frm_<?php echo $sc_seq_vert ?>" name="ventas_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_ventas_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->ventas_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ventas_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ventas_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cartera_lista_']) && $this->nmgp_cmp_hidden['cartera_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cartera_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->cartera_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->cartera_lista__1 = explode(";", trim($this->cartera_lista_));
  } 
  else
  {
      if (empty($this->cartera_lista_))
      {
          $this->cartera_lista__1= array(); 
          $this->cartera_lista_= "N";
      } 
      else
      {
          $this->cartera_lista__1= $this->cartera_lista_; 
          $this->cartera_lista_= ""; 
          foreach ($this->cartera_lista__1 as $cada_cartera_lista_)
          {
             if (!empty($cartera_lista_))
             {
                 $this->cartera_lista_.= ";"; 
             } 
             $this->cartera_lista_.= $cada_cartera_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_cartera_lista__line" id="hidden_field_data_cartera_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cartera_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cartera_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cartera_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cartera_lista_"]) &&  $this->nmgp_cmp_readonly["cartera_lista_"] == "on") { 

$cartera_lista__look = "";
 if ($this->cartera_lista_ == "S") { $cartera_lista__look .= "" ;} 
 if (empty($cartera_lista__look)) { $cartera_lista__look = $this->cartera_lista_; }
?>
<input type="hidden" name="cartera_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cartera_lista_) . "\">" . $cartera_lista__look . ""; ?>
<?php } else { ?>

<?php

$cartera_lista__look = "";
 if ($this->cartera_lista_ == "S") { $cartera_lista__look .= "" ;} 
 if (empty($cartera_lista__look)) { $cartera_lista__look = $this->cartera_lista_; }
?>
<span id="id_read_on_cartera_lista_<?php echo $sc_seq_vert ; ?>" class="css_cartera_lista__line" style="<?php echo $sStyleReadLab_cartera_lista_; ?>"><?php echo $this->form_format_readonly("cartera_lista_", $this->form_encode_input($cartera_lista__look)); ?></span><span id="id_read_off_cartera_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_cartera_lista_ css_cartera_lista__line" style="<?php echo $sStyleReadInp_cartera_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_cartera_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_cartera_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_cartera_lista__line"><?php $tempOptionId = "id-opt-cartera_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-cartera_lista_ sc-ui-checkbox-cartera_lista_<?php echo $sc_seq_vert ?>" name="cartera_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_cartera_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->cartera_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cartera_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cartera_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cartera_frm_']) && $this->nmgp_cmp_hidden['cartera_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cartera_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->cartera_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->cartera_frm__1 = explode(";", trim($this->cartera_frm_));
  } 
  else
  {
      if (empty($this->cartera_frm_))
      {
          $this->cartera_frm__1= array(); 
          $this->cartera_frm_= "N";
      } 
      else
      {
          $this->cartera_frm__1= $this->cartera_frm_; 
          $this->cartera_frm_= ""; 
          foreach ($this->cartera_frm__1 as $cada_cartera_frm_)
          {
             if (!empty($cartera_frm_))
             {
                 $this->cartera_frm_.= ";"; 
             } 
             $this->cartera_frm_.= $cada_cartera_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_cartera_frm__line" id="hidden_field_data_cartera_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cartera_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cartera_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cartera_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cartera_frm_"]) &&  $this->nmgp_cmp_readonly["cartera_frm_"] == "on") { 

$cartera_frm__look = "";
 if ($this->cartera_frm_ == "S") { $cartera_frm__look .= "" ;} 
 if (empty($cartera_frm__look)) { $cartera_frm__look = $this->cartera_frm_; }
?>
<input type="hidden" name="cartera_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cartera_frm_) . "\">" . $cartera_frm__look . ""; ?>
<?php } else { ?>

<?php

$cartera_frm__look = "";
 if ($this->cartera_frm_ == "S") { $cartera_frm__look .= "" ;} 
 if (empty($cartera_frm__look)) { $cartera_frm__look = $this->cartera_frm_; }
?>
<span id="id_read_on_cartera_frm_<?php echo $sc_seq_vert ; ?>" class="css_cartera_frm__line" style="<?php echo $sStyleReadLab_cartera_frm_; ?>"><?php echo $this->form_format_readonly("cartera_frm_", $this->form_encode_input($cartera_frm__look)); ?></span><span id="id_read_off_cartera_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_cartera_frm_ css_cartera_frm__line" style="<?php echo $sStyleReadInp_cartera_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_cartera_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_cartera_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_cartera_frm__line"><?php $tempOptionId = "id-opt-cartera_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-cartera_frm_ sc-ui-checkbox-cartera_frm_<?php echo $sc_seq_vert ?>" name="cartera_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_cartera_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->cartera_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cartera_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cartera_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['caja_lista_']) && $this->nmgp_cmp_hidden['caja_lista_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="caja_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->caja_lista_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->caja_lista__1 = explode(";", trim($this->caja_lista_));
  } 
  else
  {
      if (empty($this->caja_lista_))
      {
          $this->caja_lista__1= array(); 
          $this->caja_lista_= "N";
      } 
      else
      {
          $this->caja_lista__1= $this->caja_lista_; 
          $this->caja_lista_= ""; 
          foreach ($this->caja_lista__1 as $cada_caja_lista_)
          {
             if (!empty($caja_lista_))
             {
                 $this->caja_lista_.= ";"; 
             } 
             $this->caja_lista_.= $cada_caja_lista_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_caja_lista__line" id="hidden_field_data_caja_lista_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_caja_lista_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_caja_lista__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_caja_lista_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caja_lista_"]) &&  $this->nmgp_cmp_readonly["caja_lista_"] == "on") { 

$caja_lista__look = "";
 if ($this->caja_lista_ == "S") { $caja_lista__look .= "" ;} 
 if (empty($caja_lista__look)) { $caja_lista__look = $this->caja_lista_; }
?>
<input type="hidden" name="caja_lista_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($caja_lista_) . "\">" . $caja_lista__look . ""; ?>
<?php } else { ?>

<?php

$caja_lista__look = "";
 if ($this->caja_lista_ == "S") { $caja_lista__look .= "" ;} 
 if (empty($caja_lista__look)) { $caja_lista__look = $this->caja_lista_; }
?>
<span id="id_read_on_caja_lista_<?php echo $sc_seq_vert ; ?>" class="css_caja_lista__line" style="<?php echo $sStyleReadLab_caja_lista_; ?>"><?php echo $this->form_format_readonly("caja_lista_", $this->form_encode_input($caja_lista__look)); ?></span><span id="id_read_off_caja_lista_<?php echo $sc_seq_vert ; ?>" class="css_read_off_caja_lista_ css_caja_lista__line" style="<?php echo $sStyleReadInp_caja_lista_; ?>"><?php echo "<div id=\"idAjaxCheckbox_caja_lista_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_caja_lista__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_caja_lista__line"><?php $tempOptionId = "id-opt-caja_lista_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-caja_lista_ sc-ui-checkbox-caja_lista_<?php echo $sc_seq_vert ?>" name="caja_lista_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_caja_lista_'][] = 'S'; ?>
<?php  if (in_array("S", $this->caja_lista__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_caja_lista_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_caja_lista_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['caja_frm_']) && $this->nmgp_cmp_hidden['caja_frm_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="caja_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->caja_frm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->caja_frm__1 = explode(";", trim($this->caja_frm_));
  } 
  else
  {
      if (empty($this->caja_frm_))
      {
          $this->caja_frm__1= array(); 
          $this->caja_frm_= "N";
      } 
      else
      {
          $this->caja_frm__1= $this->caja_frm_; 
          $this->caja_frm_= ""; 
          foreach ($this->caja_frm__1 as $cada_caja_frm_)
          {
             if (!empty($caja_frm_))
             {
                 $this->caja_frm_.= ";"; 
             } 
             $this->caja_frm_.= $cada_caja_frm_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_caja_frm__line" id="hidden_field_data_caja_frm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_caja_frm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_caja_frm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_caja_frm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caja_frm_"]) &&  $this->nmgp_cmp_readonly["caja_frm_"] == "on") { 

$caja_frm__look = "";
 if ($this->caja_frm_ == "S") { $caja_frm__look .= "" ;} 
 if (empty($caja_frm__look)) { $caja_frm__look = $this->caja_frm_; }
?>
<input type="hidden" name="caja_frm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($caja_frm_) . "\">" . $caja_frm__look . ""; ?>
<?php } else { ?>

<?php

$caja_frm__look = "";
 if ($this->caja_frm_ == "S") { $caja_frm__look .= "" ;} 
 if (empty($caja_frm__look)) { $caja_frm__look = $this->caja_frm_; }
?>
<span id="id_read_on_caja_frm_<?php echo $sc_seq_vert ; ?>" class="css_caja_frm__line" style="<?php echo $sStyleReadLab_caja_frm_; ?>"><?php echo $this->form_format_readonly("caja_frm_", $this->form_encode_input($caja_frm__look)); ?></span><span id="id_read_off_caja_frm_<?php echo $sc_seq_vert ; ?>" class="css_read_off_caja_frm_ css_caja_frm__line" style="<?php echo $sStyleReadInp_caja_frm_; ?>"><?php echo "<div id=\"idAjaxCheckbox_caja_frm_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_caja_frm__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_caja_frm__line"><?php $tempOptionId = "id-opt-caja_frm_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-caja_frm_ sc-ui-checkbox-caja_frm_<?php echo $sc_seq_vert ?>" name="caja_frm_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_caja_frm_'][] = 'S'; ?>
<?php  if (in_array("S", $this->caja_frm__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_caja_frm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_caja_frm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['mantenimiento_']) && $this->nmgp_cmp_hidden['mantenimiento_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="mantenimiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->mantenimiento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->mantenimiento__1 = explode(";", trim($this->mantenimiento_));
  } 
  else
  {
      if (empty($this->mantenimiento_))
      {
          $this->mantenimiento__1= array(); 
          $this->mantenimiento_= "N";
      } 
      else
      {
          $this->mantenimiento__1= $this->mantenimiento_; 
          $this->mantenimiento_= ""; 
          foreach ($this->mantenimiento__1 as $cada_mantenimiento_)
          {
             if (!empty($mantenimiento_))
             {
                 $this->mantenimiento_.= ";"; 
             } 
             $this->mantenimiento_.= $cada_mantenimiento_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_mantenimiento__line" id="hidden_field_data_mantenimiento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_mantenimiento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_mantenimiento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_mantenimiento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mantenimiento_"]) &&  $this->nmgp_cmp_readonly["mantenimiento_"] == "on") { 

$mantenimiento__look = "";
 if ($this->mantenimiento_ == "S") { $mantenimiento__look .= "" ;} 
 if (empty($mantenimiento__look)) { $mantenimiento__look = $this->mantenimiento_; }
?>
<input type="hidden" name="mantenimiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mantenimiento_) . "\">" . $mantenimiento__look . ""; ?>
<?php } else { ?>

<?php

$mantenimiento__look = "";
 if ($this->mantenimiento_ == "S") { $mantenimiento__look .= "" ;} 
 if (empty($mantenimiento__look)) { $mantenimiento__look = $this->mantenimiento_; }
?>
<span id="id_read_on_mantenimiento_<?php echo $sc_seq_vert ; ?>" class="css_mantenimiento__line" style="<?php echo $sStyleReadLab_mantenimiento_; ?>"><?php echo $this->form_format_readonly("mantenimiento_", $this->form_encode_input($mantenimiento__look)); ?></span><span id="id_read_off_mantenimiento_<?php echo $sc_seq_vert ; ?>" class="css_read_off_mantenimiento_ css_mantenimiento__line" style="<?php echo $sStyleReadInp_mantenimiento_; ?>"><?php echo "<div id=\"idAjaxCheckbox_mantenimiento_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_mantenimiento__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_mantenimiento__line"><?php $tempOptionId = "id-opt-mantenimiento_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-mantenimiento_ sc-ui-checkbox-mantenimiento_<?php echo $sc_seq_vert ?>" name="mantenimiento_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_mantenimiento_'][] = 'S'; ?>
<?php  if (in_array("S", $this->mantenimiento__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mantenimiento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mantenimiento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['empresa_']) && $this->nmgp_cmp_hidden['empresa_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->empresa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->empresa__1 = explode(";", trim($this->empresa_));
  } 
  else
  {
      if (empty($this->empresa_))
      {
          $this->empresa__1= array(); 
          $this->empresa_= "N";
      } 
      else
      {
          $this->empresa__1= $this->empresa_; 
          $this->empresa_= ""; 
          foreach ($this->empresa__1 as $cada_empresa_)
          {
             if (!empty($empresa_))
             {
                 $this->empresa_.= ";"; 
             } 
             $this->empresa_.= $cada_empresa_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_empresa__line" id="hidden_field_data_empresa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_empresa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_empresa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_empresa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["empresa_"]) &&  $this->nmgp_cmp_readonly["empresa_"] == "on") { 

$empresa__look = "";
 if ($this->empresa_ == "S") { $empresa__look .= "" ;} 
 if (empty($empresa__look)) { $empresa__look = $this->empresa_; }
?>
<input type="hidden" name="empresa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($empresa_) . "\">" . $empresa__look . ""; ?>
<?php } else { ?>

<?php

$empresa__look = "";
 if ($this->empresa_ == "S") { $empresa__look .= "" ;} 
 if (empty($empresa__look)) { $empresa__look = $this->empresa_; }
?>
<span id="id_read_on_empresa_<?php echo $sc_seq_vert ; ?>" class="css_empresa__line" style="<?php echo $sStyleReadLab_empresa_; ?>"><?php echo $this->form_format_readonly("empresa_", $this->form_encode_input($empresa__look)); ?></span><span id="id_read_off_empresa_<?php echo $sc_seq_vert ; ?>" class="css_read_off_empresa_ css_empresa__line" style="<?php echo $sStyleReadInp_empresa_; ?>"><?php echo "<div id=\"idAjaxCheckbox_empresa_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_empresa__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_empresa__line"><?php $tempOptionId = "id-opt-empresa_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-empresa_ sc-ui-checkbox-empresa_<?php echo $sc_seq_vert ?>" name="empresa_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_empresa_'][] = 'S'; ?>
<?php  if (in_array("S", $this->empresa__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_empresa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_empresa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inventario_']) && $this->nmgp_cmp_hidden['inventario_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="inventario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->inventario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->inventario__1 = explode(";", trim($this->inventario_));
  } 
  else
  {
      if (empty($this->inventario_))
      {
          $this->inventario__1= array(); 
          $this->inventario_= "N";
      } 
      else
      {
          $this->inventario__1= $this->inventario_; 
          $this->inventario_= ""; 
          foreach ($this->inventario__1 as $cada_inventario_)
          {
             if (!empty($inventario_))
             {
                 $this->inventario_.= ";"; 
             } 
             $this->inventario_.= $cada_inventario_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_inventario__line" id="hidden_field_data_inventario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inventario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inventario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inventario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inventario_"]) &&  $this->nmgp_cmp_readonly["inventario_"] == "on") { 

$inventario__look = "";
 if ($this->inventario_ == "S") { $inventario__look .= "" ;} 
 if (empty($inventario__look)) { $inventario__look = $this->inventario_; }
?>
<input type="hidden" name="inventario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inventario_) . "\">" . $inventario__look . ""; ?>
<?php } else { ?>

<?php

$inventario__look = "";
 if ($this->inventario_ == "S") { $inventario__look .= "" ;} 
 if (empty($inventario__look)) { $inventario__look = $this->inventario_; }
?>
<span id="id_read_on_inventario_<?php echo $sc_seq_vert ; ?>" class="css_inventario__line" style="<?php echo $sStyleReadLab_inventario_; ?>"><?php echo $this->form_format_readonly("inventario_", $this->form_encode_input($inventario__look)); ?></span><span id="id_read_off_inventario_<?php echo $sc_seq_vert ; ?>" class="css_read_off_inventario_ css_inventario__line" style="<?php echo $sStyleReadInp_inventario_; ?>"><?php echo "<div id=\"idAjaxCheckbox_inventario_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_inventario__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_inventario__line"><?php $tempOptionId = "id-opt-inventario_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-inventario_ sc-ui-checkbox-inventario_<?php echo $sc_seq_vert ?>" name="inventario_<?php echo $sc_seq_vert ?>[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_inventario_'][] = 'S'; ?>
<?php  if (in_array("S", $this->inventario__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inventario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inventario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_usuario_))
       {
           $this->nmgp_cmp_readonly['usuario_'] = $sCheckRead_usuario_;
       }
       if ('display: none;' == $sStyleHidden_usuario_)
       {
           $this->nmgp_cmp_hidden['usuario_'] = 'off';
       }
       if (isset($sCheckRead_terceros_lista_))
       {
           $this->nmgp_cmp_readonly['terceros_lista_'] = $sCheckRead_terceros_lista_;
       }
       if ('display: none;' == $sStyleHidden_terceros_lista_)
       {
           $this->nmgp_cmp_hidden['terceros_lista_'] = 'off';
       }
       if (isset($sCheckRead_terceros_frm_))
       {
           $this->nmgp_cmp_readonly['terceros_frm_'] = $sCheckRead_terceros_frm_;
       }
       if ('display: none;' == $sStyleHidden_terceros_frm_)
       {
           $this->nmgp_cmp_hidden['terceros_frm_'] = 'off';
       }
       if (isset($sCheckRead_productos_lista_))
       {
           $this->nmgp_cmp_readonly['productos_lista_'] = $sCheckRead_productos_lista_;
       }
       if ('display: none;' == $sStyleHidden_productos_lista_)
       {
           $this->nmgp_cmp_hidden['productos_lista_'] = 'off';
       }
       if (isset($sCheckRead_productos_frm_))
       {
           $this->nmgp_cmp_readonly['productos_frm_'] = $sCheckRead_productos_frm_;
       }
       if ('display: none;' == $sStyleHidden_productos_frm_)
       {
           $this->nmgp_cmp_hidden['productos_frm_'] = 'off';
       }
       if (isset($sCheckRead_grupos_lista_))
       {
           $this->nmgp_cmp_readonly['grupos_lista_'] = $sCheckRead_grupos_lista_;
       }
       if ('display: none;' == $sStyleHidden_grupos_lista_)
       {
           $this->nmgp_cmp_hidden['grupos_lista_'] = 'off';
       }
       if (isset($sCheckRead_grupos_frm_))
       {
           $this->nmgp_cmp_readonly['grupos_frm_'] = $sCheckRead_grupos_frm_;
       }
       if ('display: none;' == $sStyleHidden_grupos_frm_)
       {
           $this->nmgp_cmp_hidden['grupos_frm_'] = 'off';
       }
       if (isset($sCheckRead_usuarios_lista_))
       {
           $this->nmgp_cmp_readonly['usuarios_lista_'] = $sCheckRead_usuarios_lista_;
       }
       if ('display: none;' == $sStyleHidden_usuarios_lista_)
       {
           $this->nmgp_cmp_hidden['usuarios_lista_'] = 'off';
       }
       if (isset($sCheckRead_usuarios_frm_))
       {
           $this->nmgp_cmp_readonly['usuarios_frm_'] = $sCheckRead_usuarios_frm_;
       }
       if ('display: none;' == $sStyleHidden_usuarios_frm_)
       {
           $this->nmgp_cmp_hidden['usuarios_frm_'] = 'off';
       }
       if (isset($sCheckRead_compras_lista_))
       {
           $this->nmgp_cmp_readonly['compras_lista_'] = $sCheckRead_compras_lista_;
       }
       if ('display: none;' == $sStyleHidden_compras_lista_)
       {
           $this->nmgp_cmp_hidden['compras_lista_'] = 'off';
       }
       if (isset($sCheckRead_compras_frm_))
       {
           $this->nmgp_cmp_readonly['compras_frm_'] = $sCheckRead_compras_frm_;
       }
       if ('display: none;' == $sStyleHidden_compras_frm_)
       {
           $this->nmgp_cmp_hidden['compras_frm_'] = 'off';
       }
       if (isset($sCheckRead_ventas_lista_))
       {
           $this->nmgp_cmp_readonly['ventas_lista_'] = $sCheckRead_ventas_lista_;
       }
       if ('display: none;' == $sStyleHidden_ventas_lista_)
       {
           $this->nmgp_cmp_hidden['ventas_lista_'] = 'off';
       }
       if (isset($sCheckRead_ventas_frm_))
       {
           $this->nmgp_cmp_readonly['ventas_frm_'] = $sCheckRead_ventas_frm_;
       }
       if ('display: none;' == $sStyleHidden_ventas_frm_)
       {
           $this->nmgp_cmp_hidden['ventas_frm_'] = 'off';
       }
       if (isset($sCheckRead_cartera_lista_))
       {
           $this->nmgp_cmp_readonly['cartera_lista_'] = $sCheckRead_cartera_lista_;
       }
       if ('display: none;' == $sStyleHidden_cartera_lista_)
       {
           $this->nmgp_cmp_hidden['cartera_lista_'] = 'off';
       }
       if (isset($sCheckRead_cartera_frm_))
       {
           $this->nmgp_cmp_readonly['cartera_frm_'] = $sCheckRead_cartera_frm_;
       }
       if ('display: none;' == $sStyleHidden_cartera_frm_)
       {
           $this->nmgp_cmp_hidden['cartera_frm_'] = 'off';
       }
       if (isset($sCheckRead_caja_lista_))
       {
           $this->nmgp_cmp_readonly['caja_lista_'] = $sCheckRead_caja_lista_;
       }
       if ('display: none;' == $sStyleHidden_caja_lista_)
       {
           $this->nmgp_cmp_hidden['caja_lista_'] = 'off';
       }
       if (isset($sCheckRead_caja_frm_))
       {
           $this->nmgp_cmp_readonly['caja_frm_'] = $sCheckRead_caja_frm_;
       }
       if ('display: none;' == $sStyleHidden_caja_frm_)
       {
           $this->nmgp_cmp_hidden['caja_frm_'] = 'off';
       }
       if (isset($sCheckRead_mantenimiento_))
       {
           $this->nmgp_cmp_readonly['mantenimiento_'] = $sCheckRead_mantenimiento_;
       }
       if ('display: none;' == $sStyleHidden_mantenimiento_)
       {
           $this->nmgp_cmp_hidden['mantenimiento_'] = 'off';
       }
       if (isset($sCheckRead_empresa_))
       {
           $this->nmgp_cmp_readonly['empresa_'] = $sCheckRead_empresa_;
       }
       if ('display: none;' == $sStyleHidden_empresa_)
       {
           $this->nmgp_cmp_hidden['empresa_'] = 'off';
       }
       if (isset($sCheckRead_inventario_))
       {
           $this->nmgp_cmp_readonly['inventario_'] = $sCheckRead_inventario_;
       }
       if ('display: none;' == $sStyleHidden_inventario_)
       {
           $this->nmgp_cmp_hidden['inventario_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_permisos = $guarda_form_vert_form_permisos;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['birpara'];
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
              $obj_sel = ($this->sc_max_reg == '5') ? " selected" : "";
?> 
           <option value="5" <?php echo $obj_sel ?>>5</option>
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_modal'])
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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_permisos");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_permisos");
 parent.scAjaxDetailHeight("form_permisos", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_permisos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_permisos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_modal'])
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
			do_ajax_form_permisos_add_new_line(); return false;
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
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-6").length && $("#sys_separator.sc-unique-btn-6").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['buttonStatus'] = $this->nmgp_botoes;
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
