<?php
class form_detallenota_convertir_form extends form_detallenota_convertir_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " detallenota_convertir"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detallenota_convertir"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['sc_redir_atualiz'] == 'ok')
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
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_detallenota_convertir/form_detallenota_convertir_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_detallenota_convertir_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_detallenota_convertir_jquery.php');

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

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
    return false;
}

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('id_prod_1');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_detallenota_convertir_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_detallenota_convertir'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_detallenota_convertir'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " detallenota_convertir"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " detallenota_convertir"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['fast_search'][2] : "";
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
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['balterarsel'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['bexcluirsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['bexcluirsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['bexcluirsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['bexcluirsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['bexcluirsel'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['id_detnc_']))
   {
       $this->nmgp_cmp_hidden['id_detnc_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_mov_']))
   {
       $this->nmgp_cmp_hidden['id_mov_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['origen_']))
   {
       $this->nmgp_cmp_hidden['origen_'] = 'off';
   }
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
   <?php if ((!isset($this->nmgp_cmp_hidden['id_detnc_']) || $this->nmgp_cmp_hidden['id_detnc_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_detnc_'])) {
          $this->nm_new_label['id_detnc_'] = "Id Detnc"; } ?>

    <TD class="scFormLabelOddMult css_id_detnc__label" id="hidden_field_label_id_detnc_" style="<?php echo $sStyleHidden_id_detnc_; ?>" > <?php echo $this->nm_new_label['id_detnc_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_mov_']) && $this->nmgp_cmp_hidden['id_mov_'] == 'off') { $sStyleHidden_id_mov_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_mov_']) || $this->nmgp_cmp_hidden['id_mov_'] == 'on') {
      if (!isset($this->nm_new_label['id_mov_'])) {
          $this->nm_new_label['id_mov_'] = "Id Mov"; } ?>

    <TD class="scFormLabelOddMult css_id_mov__label" id="hidden_field_label_id_mov_" style="<?php echo $sStyleHidden_id_mov_; ?>" > <?php echo $this->nm_new_label['id_mov_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_prod_']) && $this->nmgp_cmp_hidden['id_prod_'] == 'off') { $sStyleHidden_id_prod_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_prod_']) || $this->nmgp_cmp_hidden['id_prod_'] == 'on') {
      if (!isset($this->nm_new_label['id_prod_'])) {
          $this->nm_new_label['id_prod_'] = "Código P."; } ?>

    <TD class="scFormLabelOddMult css_id_prod__label" id="hidden_field_label_id_prod_" style="<?php echo $sStyleHidden_id_prod_; ?>" > <?php echo $this->nm_new_label['id_prod_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sStyleHidden_descripcion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['descripcion_']) || $this->nmgp_cmp_hidden['descripcion_'] == 'on') {
      if (!isset($this->nm_new_label['descripcion_'])) {
          $this->nm_new_label['descripcion_'] = "Descripción"; } ?>

    <TD class="scFormLabelOddMult css_descripcion__label" id="hidden_field_label_descripcion_" style="<?php echo $sStyleHidden_descripcion_; ?>" > <?php echo $this->nm_new_label['descripcion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['origen_']) && $this->nmgp_cmp_hidden['origen_'] == 'off') { $sStyleHidden_origen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['origen_']) || $this->nmgp_cmp_hidden['origen_'] == 'on') {
      if (!isset($this->nm_new_label['origen_'])) {
          $this->nm_new_label['origen_'] = "Origen"; } ?>

    <TD class="scFormLabelOddMult css_origen__label" id="hidden_field_label_origen_" style="<?php echo $sStyleHidden_origen_; ?>" > <?php echo $this->nm_new_label['origen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['destino_']) && $this->nmgp_cmp_hidden['destino_'] == 'off') { $sStyleHidden_destino_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['destino_']) || $this->nmgp_cmp_hidden['destino_'] == 'on') {
      if (!isset($this->nm_new_label['destino_'])) {
          $this->nm_new_label['destino_'] = "Destino"; } ?>

    <TD class="scFormLabelOddMult css_destino__label" id="hidden_field_label_destino_" style="<?php echo $sStyleHidden_destino_; ?>" > <?php echo $this->nm_new_label['destino_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off') { $sStyleHidden_stock_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['stock_']) || $this->nmgp_cmp_hidden['stock_'] == 'on') {
      if (!isset($this->nm_new_label['stock_'])) {
          $this->nm_new_label['stock_'] = "Stock"; } ?>

    <TD class="scFormLabelOddMult css_stock__label" id="hidden_field_label_stock_" style="<?php echo $sStyleHidden_stock_; ?>" > <?php echo $this->nm_new_label['stock_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cantidad_']) && $this->nmgp_cmp_hidden['cantidad_'] == 'off') { $sStyleHidden_cantidad_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cantidad_']) || $this->nmgp_cmp_hidden['cantidad_'] == 'on') {
      if (!isset($this->nm_new_label['cantidad_'])) {
          $this->nm_new_label['cantidad_'] = "Cantidad"; } ?>

    <TD class="scFormLabelOddMult css_cantidad__label" id="hidden_field_label_cantidad_" style="<?php echo $sStyleHidden_cantidad_; ?>" > <?php echo $this->nm_new_label['cantidad_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['escala_']) && $this->nmgp_cmp_hidden['escala_'] == 'off') { $sStyleHidden_escala_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['escala_']) || $this->nmgp_cmp_hidden['escala_'] == 'on') {
      if (!isset($this->nm_new_label['escala_'])) {
          $this->nm_new_label['escala_'] = "Escala"; } ?>

    <TD class="scFormLabelOddMult css_escala__label" id="hidden_field_label_escala_" style="<?php echo $sStyleHidden_escala_; ?>" > <?php echo $this->nm_new_label['escala_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['costo_']) && $this->nmgp_cmp_hidden['costo_'] == 'off') { $sStyleHidden_costo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['costo_']) || $this->nmgp_cmp_hidden['costo_'] == 'on') {
      if (!isset($this->nm_new_label['costo_'])) {
          $this->nm_new_label['costo_'] = "Costo"; } ?>

    <TD class="scFormLabelOddMult css_costo__label" id="hidden_field_label_costo_" style="<?php echo $sStyleHidden_costo_; ?>" > <?php echo $this->nm_new_label['costo_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_detallenota_convertir);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_detallenota_convertir = $this->form_vert_form_detallenota_convertir;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_detallenota_convertir))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_detnc_']))
           {
               $this->nmgp_cmp_readonly['id_detnc_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_mov_']))
           {
               $this->nmgp_cmp_readonly['id_mov_'] = 'on';
           }
   foreach ($this->form_vert_form_detallenota_convertir as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_detnc_'] = true;
           $this->nmgp_cmp_readonly['id_mov_'] = true;
           $this->nmgp_cmp_readonly['id_prod_'] = true;
           $this->nmgp_cmp_readonly['descripcion_'] = true;
           $this->nmgp_cmp_readonly['origen_'] = true;
           $this->nmgp_cmp_readonly['destino_'] = true;
           $this->nmgp_cmp_readonly['stock_'] = true;
           $this->nmgp_cmp_readonly['cantidad_'] = true;
           $this->nmgp_cmp_readonly['escala_'] = true;
           $this->nmgp_cmp_readonly['costo_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_detnc_']) || $this->nmgp_cmp_readonly['id_detnc_'] != "on") {$this->nmgp_cmp_readonly['id_detnc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_mov_']) || $this->nmgp_cmp_readonly['id_mov_'] != "on") {$this->nmgp_cmp_readonly['id_mov_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_prod_']) || $this->nmgp_cmp_readonly['id_prod_'] != "on") {$this->nmgp_cmp_readonly['id_prod_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['descripcion_']) || $this->nmgp_cmp_readonly['descripcion_'] != "on") {$this->nmgp_cmp_readonly['descripcion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['origen_']) || $this->nmgp_cmp_readonly['origen_'] != "on") {$this->nmgp_cmp_readonly['origen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['destino_']) || $this->nmgp_cmp_readonly['destino_'] != "on") {$this->nmgp_cmp_readonly['destino_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['stock_']) || $this->nmgp_cmp_readonly['stock_'] != "on") {$this->nmgp_cmp_readonly['stock_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cantidad_']) || $this->nmgp_cmp_readonly['cantidad_'] != "on") {$this->nmgp_cmp_readonly['cantidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['escala_']) || $this->nmgp_cmp_readonly['escala_'] != "on") {$this->nmgp_cmp_readonly['escala_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['costo_']) || $this->nmgp_cmp_readonly['costo_'] != "on") {$this->nmgp_cmp_readonly['costo_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->id_detnc_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['id_detnc_']; 
       $id_detnc_ = $this->id_detnc_; 
       if (!isset($this->nmgp_cmp_hidden['id_detnc_']))
       {
           $this->nmgp_cmp_hidden['id_detnc_'] = 'off';
       }
       $sStyleHidden_id_detnc_ = '';
       if (isset($sCheckRead_id_detnc_))
       {
           unset($sCheckRead_id_detnc_);
       }
       if (isset($this->nmgp_cmp_readonly['id_detnc_']))
       {
           $sCheckRead_id_detnc_ = $this->nmgp_cmp_readonly['id_detnc_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_detnc_']) && $this->nmgp_cmp_hidden['id_detnc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_detnc_']);
           $sStyleHidden_id_detnc_ = 'display: none;';
       }
       $bTestReadOnly_id_detnc_ = true;
       $sStyleReadLab_id_detnc_ = 'display: none;';
       $sStyleReadInp_id_detnc_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_detnc_"]) &&  $this->nmgp_cmp_readonly["id_detnc_"] == "on"))
       {
           $bTestReadOnly_id_detnc_ = false;
           unset($this->nmgp_cmp_readonly['id_detnc_']);
           $sStyleReadLab_id_detnc_ = '';
           $sStyleReadInp_id_detnc_ = 'display: none;';
       }
       $this->id_mov_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['id_mov_']; 
       $id_mov_ = $this->id_mov_; 
       if (!isset($this->nmgp_cmp_hidden['id_mov_']))
       {
           $this->nmgp_cmp_hidden['id_mov_'] = 'off';
       }
       $sStyleHidden_id_mov_ = '';
       if (isset($sCheckRead_id_mov_))
       {
           unset($sCheckRead_id_mov_);
       }
       if (isset($this->nmgp_cmp_readonly['id_mov_']))
       {
           $sCheckRead_id_mov_ = $this->nmgp_cmp_readonly['id_mov_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_mov_']) && $this->nmgp_cmp_hidden['id_mov_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_mov_']);
           $sStyleHidden_id_mov_ = 'display: none;';
       }
       $bTestReadOnly_id_mov_ = true;
       $sStyleReadLab_id_mov_ = 'display: none;';
       $sStyleReadInp_id_mov_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_mov_"]) &&  $this->nmgp_cmp_readonly["id_mov_"] == "on"))
       {
           $bTestReadOnly_id_mov_ = false;
           unset($this->nmgp_cmp_readonly['id_mov_']);
           $sStyleReadLab_id_mov_ = '';
           $sStyleReadInp_id_mov_ = 'display: none;';
       }
       $this->id_prod_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['id_prod_']; 
       $id_prod_ = $this->id_prod_; 
       $sStyleHidden_id_prod_ = '';
       if (isset($sCheckRead_id_prod_))
       {
           unset($sCheckRead_id_prod_);
       }
       if (isset($this->nmgp_cmp_readonly['id_prod_']))
       {
           $sCheckRead_id_prod_ = $this->nmgp_cmp_readonly['id_prod_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_prod_']) && $this->nmgp_cmp_hidden['id_prod_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_prod_']);
           $sStyleHidden_id_prod_ = 'display: none;';
       }
       $bTestReadOnly_id_prod_ = true;
       $sStyleReadLab_id_prod_ = 'display: none;';
       $sStyleReadInp_id_prod_ = '';
       if (isset($this->nmgp_cmp_readonly['id_prod_']) && $this->nmgp_cmp_readonly['id_prod_'] == 'on')
       {
           $bTestReadOnly_id_prod_ = false;
           unset($this->nmgp_cmp_readonly['id_prod_']);
           $sStyleReadLab_id_prod_ = '';
           $sStyleReadInp_id_prod_ = 'display: none;';
       }
       $this->descripcion_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['descripcion_']; 
       $descripcion_ = $this->descripcion_; 
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
       $this->origen_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['origen_']; 
       $origen_ = $this->origen_; 
       if (!isset($this->nmgp_cmp_hidden['origen_']))
       {
           $this->nmgp_cmp_hidden['origen_'] = 'off';
       }
       $sStyleHidden_origen_ = '';
       if (isset($sCheckRead_origen_))
       {
           unset($sCheckRead_origen_);
       }
       if (isset($this->nmgp_cmp_readonly['origen_']))
       {
           $sCheckRead_origen_ = $this->nmgp_cmp_readonly['origen_'];
       }
       if (isset($this->nmgp_cmp_hidden['origen_']) && $this->nmgp_cmp_hidden['origen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['origen_']);
           $sStyleHidden_origen_ = 'display: none;';
       }
       $bTestReadOnly_origen_ = true;
       $sStyleReadLab_origen_ = 'display: none;';
       $sStyleReadInp_origen_ = '';
       if (isset($this->nmgp_cmp_readonly['origen_']) && $this->nmgp_cmp_readonly['origen_'] == 'on')
       {
           $bTestReadOnly_origen_ = false;
           unset($this->nmgp_cmp_readonly['origen_']);
           $sStyleReadLab_origen_ = '';
           $sStyleReadInp_origen_ = 'display: none;';
       }
       $this->destino_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['destino_']; 
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
       $this->stock_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['stock_']; 
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
       $this->cantidad_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['cantidad_']; 
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
       $this->escala_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['escala_']; 
       $escala_ = $this->escala_; 
       $sStyleHidden_escala_ = '';
       if (isset($sCheckRead_escala_))
       {
           unset($sCheckRead_escala_);
       }
       if (isset($this->nmgp_cmp_readonly['escala_']))
       {
           $sCheckRead_escala_ = $this->nmgp_cmp_readonly['escala_'];
       }
       if (isset($this->nmgp_cmp_hidden['escala_']) && $this->nmgp_cmp_hidden['escala_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['escala_']);
           $sStyleHidden_escala_ = 'display: none;';
       }
       $bTestReadOnly_escala_ = true;
       $sStyleReadLab_escala_ = 'display: none;';
       $sStyleReadInp_escala_ = '';
       if (isset($this->nmgp_cmp_readonly['escala_']) && $this->nmgp_cmp_readonly['escala_'] == 'on')
       {
           $bTestReadOnly_escala_ = false;
           unset($this->nmgp_cmp_readonly['escala_']);
           $sStyleReadLab_escala_ = '';
           $sStyleReadInp_escala_ = 'display: none;';
       }
       $this->costo_ = $this->form_vert_form_detallenota_convertir[$sc_seq_vert]['costo_']; 
       $costo_ = $this->costo_; 
       $sStyleHidden_costo_ = '';
       if (isset($sCheckRead_costo_))
       {
           unset($sCheckRead_costo_);
       }
       if (isset($this->nmgp_cmp_readonly['costo_']))
       {
           $sCheckRead_costo_ = $this->nmgp_cmp_readonly['costo_'];
       }
       if (isset($this->nmgp_cmp_hidden['costo_']) && $this->nmgp_cmp_hidden['costo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['costo_']);
           $sStyleHidden_costo_ = 'display: none;';
       }
       $bTestReadOnly_costo_ = true;
       $sStyleReadLab_costo_ = 'display: none;';
       $sStyleReadInp_costo_ = '';
       if (isset($this->nmgp_cmp_readonly['costo_']) && $this->nmgp_cmp_readonly['costo_'] == 'on')
       {
           $bTestReadOnly_costo_ = false;
           unset($this->nmgp_cmp_readonly['costo_']);
           $sStyleReadLab_costo_ = '';
           $sStyleReadInp_costo_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_detallenota_convertir_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_detallenota_convertir_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallenota_convertir_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_detallenota_convertir_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_detallenota_convertir_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_detallenota_convertir_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_detnc_']) && $this->nmgp_cmp_hidden['id_detnc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_detnc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_detnc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id_detnc__line" id="hidden_field_data_id_detnc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_detnc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_detnc__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_detnc_<?php echo $sc_seq_vert ?>" class="css_id_detnc__line" style="<?php echo $sStyleReadLab_id_detnc_; ?>"><?php echo $this->form_format_readonly("id_detnc_", $this->form_encode_input($this->id_detnc_)); ?></span><span id="id_read_off_id_detnc_<?php echo $sc_seq_vert ?>" class="css_read_off_id_detnc_" style="<?php echo $sStyleReadInp_id_detnc_; ?>"><input type="hidden" id="id_sc_field_id_detnc_<?php echo $sc_seq_vert ?>" name="id_detnc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_detnc_) . "\">"?>
<span id="id_ajax_label_id_detnc_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_detnc_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_detnc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_detnc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_mov_']) && $this->nmgp_cmp_hidden['id_mov_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_mov_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_mov_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_mov__line" id="hidden_field_data_id_mov_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_mov_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_mov__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_mov_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["id_mov_"]) &&  $this->nmgp_cmp_readonly["id_mov_"] == "on")) { 

 ?>
<input type="hidden" name="id_mov_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_mov_) . "\"><span id=\"id_ajax_label_id_mov_" . $sc_seq_vert . "\">" . $id_mov_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_id_mov_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_mov_<?php echo $sc_seq_vert ?> css_id_mov__line" style="<?php echo $sStyleReadLab_id_mov_; ?>"><?php echo $this->form_format_readonly("id_mov_", $this->form_encode_input($this->id_mov_)); ?></span><span id="id_read_off_id_mov_<?php echo $sc_seq_vert ?>" class="css_read_off_id_mov_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_mov_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_mov__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_mov_<?php echo $sc_seq_vert ?>" type=text name="id_mov_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_mov_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_mov_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_mov_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id_mov_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_mov_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_mov_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_prod_']) && $this->nmgp_cmp_hidden['id_prod_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_prod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_prod_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_prod__line" id="hidden_field_data_id_prod_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_prod_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_prod__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_prod_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_prod_"]) &&  $this->nmgp_cmp_readonly["id_prod_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_'] = array(); 
    }

   $old_value_id_detnc_ = $this->id_detnc_;
   $old_value_id_mov_ = $this->id_mov_;
   $old_value_origen_ = $this->origen_;
   $old_value_destino_ = $this->destino_;
   $old_value_stock_ = $this->stock_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_escala_ = $this->escala_;
   $old_value_costo_ = $this->costo_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_detnc_ = $this->id_detnc_;
   $unformatted_value_id_mov_ = $this->id_mov_;
   $unformatted_value_origen_ = $this->origen_;
   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_escala_ = $this->escala_;
   $unformatted_value_costo_ = $this->costo_;

   $nm_comando = "SELECT idprod, codigobar  FROM productos  ORDER BY codigobar";

   $this->id_detnc_ = $old_value_id_detnc_;
   $this->id_mov_ = $old_value_id_mov_;
   $this->origen_ = $old_value_origen_;
   $this->destino_ = $old_value_destino_;
   $this->stock_ = $old_value_stock_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->escala_ = $old_value_escala_;
   $this->costo_ = $old_value_costo_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_id_prod_'][] = $rs->fields[0];
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
   $id_prod__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_prod__1))
          {
              foreach ($this->id_prod__1 as $tmp_id_prod_)
              {
                  if (trim($tmp_id_prod_) === trim($cadaselect[1])) { $id_prod__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_prod_) === trim($cadaselect[1])) { $id_prod__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_prod_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_prod_) . "\">" . $id_prod__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_prod_();
   $x = 0 ; 
   $id_prod__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_prod__1))
          {
              foreach ($this->id_prod__1 as $tmp_id_prod_)
              {
                  if (trim($tmp_id_prod_) === trim($cadaselect[1])) { $id_prod__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_prod_) === trim($cadaselect[1])) { $id_prod__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_prod__look))
          {
              $id_prod__look = $this->id_prod_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_prod_" . $sc_seq_vert . "\" class=\"css_id_prod__line\" style=\"" .  $sStyleReadLab_id_prod_ . "\">" . $this->form_format_readonly("id_prod_", $this->form_encode_input($id_prod__look)) . "</span><span id=\"id_read_off_id_prod_" . $sc_seq_vert . "\" class=\"css_read_off_id_prod_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_prod_ . "\">";
   echo " <span id=\"idAjaxSelect_id_prod_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_prod__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_prod_" . $sc_seq_vert . "\" name=\"id_prod_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_prod_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_prod_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_prod_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_prod_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['descripcion_']) && $this->nmgp_cmp_hidden['descripcion_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->descripcion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_descripcion__line" id="hidden_field_data_descripcion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_descripcion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_descripcion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_descripcion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion_"]) &&  $this->nmgp_cmp_readonly["descripcion_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_'] = array(); 
    }

   $old_value_id_detnc_ = $this->id_detnc_;
   $old_value_id_mov_ = $this->id_mov_;
   $old_value_origen_ = $this->origen_;
   $old_value_destino_ = $this->destino_;
   $old_value_stock_ = $this->stock_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_escala_ = $this->escala_;
   $old_value_costo_ = $this->costo_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_detnc_ = $this->id_detnc_;
   $unformatted_value_id_mov_ = $this->id_mov_;
   $unformatted_value_origen_ = $this->origen_;
   $unformatted_value_destino_ = $this->destino_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_escala_ = $this->escala_;
   $unformatted_value_costo_ = $this->costo_;

   $nm_comando = "SELECT idprod, nompro  FROM productos  ORDER BY nompro";

   $this->id_detnc_ = $old_value_id_detnc_;
   $this->id_mov_ = $old_value_id_mov_;
   $this->origen_ = $old_value_origen_;
   $this->destino_ = $old_value_destino_;
   $this->stock_ = $old_value_stock_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->escala_ = $old_value_escala_;
   $this->costo_ = $old_value_costo_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['Lookup_descripcion_'][] = $rs->fields[0];
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
   $descripcion__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->descripcion__1))
          {
              foreach ($this->descripcion__1 as $tmp_descripcion_)
              {
                  if (trim($tmp_descripcion_) === trim($cadaselect[1])) { $descripcion__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->descripcion_) === trim($cadaselect[1])) { $descripcion__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="descripcion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($descripcion_) . "\">" . $descripcion__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_descripcion_();
   $x = 0 ; 
   $descripcion__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->descripcion__1))
          {
              foreach ($this->descripcion__1 as $tmp_descripcion_)
              {
                  if (trim($tmp_descripcion_) === trim($cadaselect[1])) { $descripcion__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->descripcion_) === trim($cadaselect[1])) { $descripcion__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($descripcion__look))
          {
              $descripcion__look = $this->descripcion_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_descripcion_" . $sc_seq_vert . "\" class=\"css_descripcion__line\" style=\"" .  $sStyleReadLab_descripcion_ . "\">" . $this->form_format_readonly("descripcion_", $this->form_encode_input($descripcion__look)) . "</span><span id=\"id_read_off_descripcion_" . $sc_seq_vert . "\" class=\"css_read_off_descripcion_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_descripcion_ . "\">";
   echo " <span id=\"idAjaxSelect_descripcion_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_descripcion__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_descripcion_" . $sc_seq_vert . "\" name=\"descripcion_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->descripcion_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->descripcion_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['origen_']) && $this->nmgp_cmp_hidden['origen_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="origen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($origen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_origen__line" id="hidden_field_data_origen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_origen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_origen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_origen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["origen_"]) &&  $this->nmgp_cmp_readonly["origen_"] == "on") { 

 ?>
<input type="hidden" name="origen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($origen_) . "\">" . $origen_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_origen_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-origen_<?php echo $sc_seq_vert ?> css_origen__line" style="<?php echo $sStyleReadLab_origen_; ?>"><?php echo $this->form_format_readonly("origen_", $this->form_encode_input($this->origen_)); ?></span><span id="id_read_off_origen_<?php echo $sc_seq_vert ?>" class="css_read_off_origen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_origen_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_origen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_origen_<?php echo $sc_seq_vert ?>" type=text name="origen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($origen_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['origen_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['origen_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['origen_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_origen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_origen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['destino_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['destino_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['destino_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_destino_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_destino_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_stock__line" id="hidden_field_data_stock_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_stock_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_stock__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_); ?>"><span id="id_ajax_label_stock_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($stock_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stock_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stock_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantidad_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantidad_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantidad_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['escala_']) && $this->nmgp_cmp_hidden['escala_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="escala_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($escala_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_escala__line" id="hidden_field_data_escala_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_escala_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_escala__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_escala_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["escala_"]) &&  $this->nmgp_cmp_readonly["escala_"] == "on") { 

 ?>
<input type="hidden" name="escala_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($escala_) . "\">" . $escala_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_escala_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-escala_<?php echo $sc_seq_vert ?> css_escala__line" style="<?php echo $sStyleReadLab_escala_; ?>"><?php echo $this->form_format_readonly("escala_", $this->form_encode_input($this->escala_)); ?></span><span id="id_read_off_escala_<?php echo $sc_seq_vert ?>" class="css_read_off_escala_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_escala_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_escala__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_escala_<?php echo $sc_seq_vert ?>" type=text name="escala_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($escala_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['escala_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['escala_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['escala_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['escala_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_escala_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_escala_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['costo_']) && $this->nmgp_cmp_hidden['costo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_costo__line" id="hidden_field_data_costo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_costo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_costo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_costo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costo_"]) &&  $this->nmgp_cmp_readonly["costo_"] == "on") { 

 ?>
<input type="hidden" name="costo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costo_) . "\">" . $costo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_costo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-costo_<?php echo $sc_seq_vert ?> css_costo__line" style="<?php echo $sStyleReadLab_costo_; ?>"><?php echo $this->form_format_readonly("costo_", $this->form_encode_input($this->costo_)); ?></span><span id="id_read_off_costo_<?php echo $sc_seq_vert ?>" class="css_read_off_costo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_costo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costo_<?php echo $sc_seq_vert ?>" type=text name="costo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($costo_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['costo_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['costo_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['costo_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['costo_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_detnc_))
       {
           $this->nmgp_cmp_readonly['id_detnc_'] = $sCheckRead_id_detnc_;
       }
       if ('display: none;' == $sStyleHidden_id_detnc_)
       {
           $this->nmgp_cmp_hidden['id_detnc_'] = 'off';
       }
       if (isset($sCheckRead_id_mov_))
       {
           $this->nmgp_cmp_readonly['id_mov_'] = $sCheckRead_id_mov_;
       }
       if ('display: none;' == $sStyleHidden_id_mov_)
       {
           $this->nmgp_cmp_hidden['id_mov_'] = 'off';
       }
       if (isset($sCheckRead_id_prod_))
       {
           $this->nmgp_cmp_readonly['id_prod_'] = $sCheckRead_id_prod_;
       }
       if ('display: none;' == $sStyleHidden_id_prod_)
       {
           $this->nmgp_cmp_hidden['id_prod_'] = 'off';
       }
       if (isset($sCheckRead_descripcion_))
       {
           $this->nmgp_cmp_readonly['descripcion_'] = $sCheckRead_descripcion_;
       }
       if ('display: none;' == $sStyleHidden_descripcion_)
       {
           $this->nmgp_cmp_hidden['descripcion_'] = 'off';
       }
       if (isset($sCheckRead_origen_))
       {
           $this->nmgp_cmp_readonly['origen_'] = $sCheckRead_origen_;
       }
       if ('display: none;' == $sStyleHidden_origen_)
       {
           $this->nmgp_cmp_hidden['origen_'] = 'off';
       }
       if (isset($sCheckRead_destino_))
       {
           $this->nmgp_cmp_readonly['destino_'] = $sCheckRead_destino_;
       }
       if ('display: none;' == $sStyleHidden_destino_)
       {
           $this->nmgp_cmp_hidden['destino_'] = 'off';
       }
       if (isset($sCheckRead_stock_))
       {
           $this->nmgp_cmp_readonly['stock_'] = $sCheckRead_stock_;
       }
       if ('display: none;' == $sStyleHidden_stock_)
       {
           $this->nmgp_cmp_hidden['stock_'] = 'off';
       }
       if (isset($sCheckRead_cantidad_))
       {
           $this->nmgp_cmp_readonly['cantidad_'] = $sCheckRead_cantidad_;
       }
       if ('display: none;' == $sStyleHidden_cantidad_)
       {
           $this->nmgp_cmp_hidden['cantidad_'] = 'off';
       }
       if (isset($sCheckRead_escala_))
       {
           $this->nmgp_cmp_readonly['escala_'] = $sCheckRead_escala_;
       }
       if ('display: none;' == $sStyleHidden_escala_)
       {
           $this->nmgp_cmp_hidden['escala_'] = 'off';
       }
       if (isset($sCheckRead_costo_))
       {
           $this->nmgp_cmp_readonly['costo_'] = $sCheckRead_costo_;
       }
       if ('display: none;' == $sStyleHidden_costo_)
       {
           $this->nmgp_cmp_hidden['costo_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_detallenota_convertir = $guarda_form_vert_form_detallenota_convertir;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['birpara'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_detallenota_convertir");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_detallenota_convertir");
 parent.scAjaxDetailHeight("form_detallenota_convertir", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_detallenota_convertir", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_detallenota_convertir", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['sc_modal'])
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
			do_ajax_form_detallenota_convertir_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallenota_convertir']['buttonStatus'] = $this->nmgp_botoes;
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
