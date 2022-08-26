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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - etiquetas"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - etiquetas"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
 <style type="text/css">
  .scSpin_size_letra_descripcion_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_altura_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_anchura_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_size_letra_codigo_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_size_letra_precio_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_size_letra_perso1_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_size_letra_perso2_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_size_letra_perso3_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_posicion_codigo_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_posicion_descripcion_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_posicion_precio_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_posicion_perso1_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_posicion_perso2_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_posicion_perso3_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  .scSpin_copias_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_etiquetas/form_etiquetas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_etiquetas_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['last'] : 'off'); ?>";
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
<?php

include_once('form_etiquetas_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_etiquetas_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_etiquetas'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_etiquetas'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - etiquetas"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - etiquetas"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'][2] : "";
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idetiqueta']))
   {
       $this->nmgp_cmp_hidden['idetiqueta'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idetiqueta']))
           {
               $this->nmgp_cmp_readonly['idetiqueta'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idetiqueta']))
    {
        $this->nm_new_label['idetiqueta'] = "Idetiqueta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idetiqueta = $this->idetiqueta;
   if (!isset($this->nmgp_cmp_hidden['idetiqueta']))
   {
       $this->nmgp_cmp_hidden['idetiqueta'] = 'off';
   }
   $sStyleHidden_idetiqueta = '';
   if (isset($this->nmgp_cmp_hidden['idetiqueta']) && $this->nmgp_cmp_hidden['idetiqueta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idetiqueta']);
       $sStyleHidden_idetiqueta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idetiqueta = 'display: none;';
   $sStyleReadInp_idetiqueta = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idetiqueta"]) &&  $this->nmgp_cmp_readonly["idetiqueta"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idetiqueta']);
       $sStyleReadLab_idetiqueta = '';
       $sStyleReadInp_idetiqueta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idetiqueta']) && $this->nmgp_cmp_hidden['idetiqueta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idetiqueta" value="<?php echo $this->form_encode_input($idetiqueta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idetiqueta_label" id="hidden_field_label_idetiqueta" style="<?php echo $sStyleHidden_idetiqueta; ?>"><span id="id_label_idetiqueta"><?php echo $this->nm_new_label['idetiqueta']; ?></span></TD>
    <TD class="scFormDataOdd css_idetiqueta_line" id="hidden_field_data_idetiqueta" style="<?php echo $sStyleHidden_idetiqueta; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idetiqueta_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idetiqueta" class="css_idetiqueta_line" style="<?php echo $sStyleReadLab_idetiqueta; ?>"><?php echo $this->form_format_readonly("idetiqueta", $this->form_encode_input($this->idetiqueta)); ?></span><span id="id_read_off_idetiqueta" class="css_read_off_idetiqueta" style="<?php echo $sStyleReadInp_idetiqueta; ?>"><input type="hidden" name="idetiqueta" value="<?php echo $this->form_encode_input($idetiqueta) . "\">"?><span id="id_ajax_label_idetiqueta"><?php echo nl2br($idetiqueta); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idetiqueta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idetiqueta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_configuracion']))
    {
        $this->nm_new_label['nombre_configuracion'] = "Nombre Configuracion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_configuracion = $this->nombre_configuracion;
   $sStyleHidden_nombre_configuracion = '';
   if (isset($this->nmgp_cmp_hidden['nombre_configuracion']) && $this->nmgp_cmp_hidden['nombre_configuracion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_configuracion']);
       $sStyleHidden_nombre_configuracion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_configuracion = 'display: none;';
   $sStyleReadInp_nombre_configuracion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_configuracion']) && $this->nmgp_cmp_readonly['nombre_configuracion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_configuracion']);
       $sStyleReadLab_nombre_configuracion = '';
       $sStyleReadInp_nombre_configuracion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_configuracion']) && $this->nmgp_cmp_hidden['nombre_configuracion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_configuracion" value="<?php echo $this->form_encode_input($nombre_configuracion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_configuracion_label" id="hidden_field_label_nombre_configuracion" style="<?php echo $sStyleHidden_nombre_configuracion; ?>"><span id="id_label_nombre_configuracion"><?php echo $this->nm_new_label['nombre_configuracion']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_configuracion_line" id="hidden_field_data_nombre_configuracion" style="<?php echo $sStyleHidden_nombre_configuracion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_configuracion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_configuracion"]) &&  $this->nmgp_cmp_readonly["nombre_configuracion"] == "on") { 

 ?>
<input type="hidden" name="nombre_configuracion" value="<?php echo $this->form_encode_input($nombre_configuracion) . "\">" . $nombre_configuracion . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_configuracion" class="sc-ui-readonly-nombre_configuracion css_nombre_configuracion_line" style="<?php echo $sStyleReadLab_nombre_configuracion; ?>"><?php echo $this->form_format_readonly("nombre_configuracion", $this->form_encode_input($this->nombre_configuracion)); ?></span><span id="id_read_off_nombre_configuracion" class="css_read_off_nombre_configuracion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_configuracion; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_configuracion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_configuracion" type=text name="nombre_configuracion" value="<?php echo $this->form_encode_input($nombre_configuracion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_configuracion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_configuracion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['titulo']))
    {
        $this->nm_new_label['titulo'] = "Titulo Reporte";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $titulo = $this->titulo;
   $sStyleHidden_titulo = '';
   if (isset($this->nmgp_cmp_hidden['titulo']) && $this->nmgp_cmp_hidden['titulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['titulo']);
       $sStyleHidden_titulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_titulo = 'display: none;';
   $sStyleReadInp_titulo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['titulo']) && $this->nmgp_cmp_readonly['titulo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['titulo']);
       $sStyleReadLab_titulo = '';
       $sStyleReadInp_titulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['titulo']) && $this->nmgp_cmp_hidden['titulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="titulo" value="<?php echo $this->form_encode_input($titulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_titulo_label" id="hidden_field_label_titulo" style="<?php echo $sStyleHidden_titulo; ?>"><span id="id_label_titulo"><?php echo $this->nm_new_label['titulo']; ?></span></TD>
    <TD class="scFormDataOdd css_titulo_line" id="hidden_field_data_titulo" style="<?php echo $sStyleHidden_titulo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_titulo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["titulo"]) &&  $this->nmgp_cmp_readonly["titulo"] == "on") { 

 ?>
<input type="hidden" name="titulo" value="<?php echo $this->form_encode_input($titulo) . "\">" . $titulo . ""; ?>
<?php } else { ?>
<span id="id_read_on_titulo" class="sc-ui-readonly-titulo css_titulo_line" style="<?php echo $sStyleReadLab_titulo; ?>"><?php echo $this->form_format_readonly("titulo", $this->form_encode_input($this->titulo)); ?></span><span id="id_read_off_titulo" class="css_read_off_titulo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_titulo; ?>">
 <input class="sc-js-input scFormObjectOdd css_titulo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_titulo" type=text name="titulo" value="<?php echo $this->form_encode_input($titulo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_titulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_titulo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idfamilia']))
   {
       $this->nm_new_label['idfamilia'] = "Familia";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idfamilia = $this->idfamilia;
   $sStyleHidden_idfamilia = '';
   if (isset($this->nmgp_cmp_hidden['idfamilia']) && $this->nmgp_cmp_hidden['idfamilia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idfamilia']);
       $sStyleHidden_idfamilia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idfamilia = 'display: none;';
   $sStyleReadInp_idfamilia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idfamilia']) && $this->nmgp_cmp_readonly['idfamilia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idfamilia']);
       $sStyleReadLab_idfamilia = '';
       $sStyleReadInp_idfamilia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idfamilia']) && $this->nmgp_cmp_hidden['idfamilia'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idfamilia" value="<?php echo $this->form_encode_input($this->idfamilia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idfamilia_label" id="hidden_field_label_idfamilia" style="<?php echo $sStyleHidden_idfamilia; ?>"><span id="id_label_idfamilia"><?php echo $this->nm_new_label['idfamilia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['idfamilia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['idfamilia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idfamilia_line" id="hidden_field_data_idfamilia" style="<?php echo $sStyleHidden_idfamilia; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idfamilia_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idfamilia"]) &&  $this->nmgp_cmp_readonly["idfamilia"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array(); 
    }

   $old_value_idetiqueta = $this->idetiqueta;
   $old_value_size_letra_descripcion = $this->size_letra_descripcion;
   $old_value_columnas = $this->columnas;
   $old_value_altura = $this->altura;
   $old_value_anchura = $this->anchura;
   $old_value_espaciado = $this->espaciado;
   $old_value_ancho_descripcion = $this->ancho_descripcion;
   $old_value_size_letra_codigo = $this->size_letra_codigo;
   $old_value_size_letra_precio = $this->size_letra_precio;
   $old_value_size_letra_perso1 = $this->size_letra_perso1;
   $old_value_size_letra_perso2 = $this->size_letra_perso2;
   $old_value_size_letra_perso3 = $this->size_letra_perso3;
   $old_value_posicion_codigo = $this->posicion_codigo;
   $old_value_posicion_descripcion = $this->posicion_descripcion;
   $old_value_posicion_precio = $this->posicion_precio;
   $old_value_posicion_perso1 = $this->posicion_perso1;
   $old_value_posicion_perso2 = $this->posicion_perso2;
   $old_value_posicion_perso3 = $this->posicion_perso3;
   $old_value_copias = $this->copias;
   $this->nm_tira_formatacao();


   $unformatted_value_idetiqueta = $this->idetiqueta;
   $unformatted_value_size_letra_descripcion = $this->size_letra_descripcion;
   $unformatted_value_columnas = $this->columnas;
   $unformatted_value_altura = $this->altura;
   $unformatted_value_anchura = $this->anchura;
   $unformatted_value_espaciado = $this->espaciado;
   $unformatted_value_ancho_descripcion = $this->ancho_descripcion;
   $unformatted_value_size_letra_codigo = $this->size_letra_codigo;
   $unformatted_value_size_letra_precio = $this->size_letra_precio;
   $unformatted_value_size_letra_perso1 = $this->size_letra_perso1;
   $unformatted_value_size_letra_perso2 = $this->size_letra_perso2;
   $unformatted_value_size_letra_perso3 = $this->size_letra_perso3;
   $unformatted_value_posicion_codigo = $this->posicion_codigo;
   $unformatted_value_posicion_descripcion = $this->posicion_descripcion;
   $unformatted_value_posicion_precio = $this->posicion_precio;
   $unformatted_value_posicion_perso1 = $this->posicion_perso1;
   $unformatted_value_posicion_perso2 = $this->posicion_perso2;
   $unformatted_value_posicion_perso3 = $this->posicion_perso3;
   $unformatted_value_copias = $this->copias;

   $ver_codigo_val_str = "''";
   if (!empty($this->ver_codigo))
   {
       if (is_array($this->ver_codigo))
       {
           $Tmp_array = $this->ver_codigo;
       }
       else
       {
           $Tmp_array = explode(";", $this->ver_codigo);
       }
       $ver_codigo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ver_codigo_val_str)
          {
             $ver_codigo_val_str .= ", ";
          }
          $ver_codigo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $ver_descripcion_val_str = "''";
   if (!empty($this->ver_descripcion))
   {
       if (is_array($this->ver_descripcion))
       {
           $Tmp_array = $this->ver_descripcion;
       }
       else
       {
           $Tmp_array = explode(";", $this->ver_descripcion);
       }
       $ver_descripcion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ver_descripcion_val_str)
          {
             $ver_descripcion_val_str .= ", ";
          }
          $ver_descripcion_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->idetiqueta = $old_value_idetiqueta;
   $this->size_letra_descripcion = $old_value_size_letra_descripcion;
   $this->columnas = $old_value_columnas;
   $this->altura = $old_value_altura;
   $this->anchura = $old_value_anchura;
   $this->espaciado = $old_value_espaciado;
   $this->ancho_descripcion = $old_value_ancho_descripcion;
   $this->size_letra_codigo = $old_value_size_letra_codigo;
   $this->size_letra_precio = $old_value_size_letra_precio;
   $this->size_letra_perso1 = $old_value_size_letra_perso1;
   $this->size_letra_perso2 = $old_value_size_letra_perso2;
   $this->size_letra_perso3 = $old_value_size_letra_perso3;
   $this->posicion_codigo = $old_value_posicion_codigo;
   $this->posicion_descripcion = $old_value_posicion_descripcion;
   $this->posicion_precio = $old_value_posicion_precio;
   $this->posicion_perso1 = $old_value_posicion_perso1;
   $this->posicion_perso2 = $old_value_posicion_perso2;
   $this->posicion_perso3 = $old_value_posicion_perso3;
   $this->copias = $old_value_copias;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'][] = $rs->fields[0];
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
   $idfamilia_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfamilia_1))
          {
              foreach ($this->idfamilia_1 as $tmp_idfamilia)
              {
                  if (trim($tmp_idfamilia) === trim($cadaselect[1])) { $idfamilia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfamilia) === trim($cadaselect[1])) { $idfamilia_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idfamilia" value="<?php echo $this->form_encode_input($idfamilia) . "\">" . $idfamilia_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idfamilia();
   $x = 0 ; 
   $idfamilia_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idfamilia_1))
          {
              foreach ($this->idfamilia_1 as $tmp_idfamilia)
              {
                  if (trim($tmp_idfamilia) === trim($cadaselect[1])) { $idfamilia_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idfamilia) === trim($cadaselect[1])) { $idfamilia_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idfamilia_look))
          {
              $idfamilia_look = $this->idfamilia;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idfamilia\" class=\"css_idfamilia_line\" style=\"" .  $sStyleReadLab_idfamilia . "\">" . $this->form_format_readonly("idfamilia", $this->form_encode_input($idfamilia_look)) . "</span><span id=\"id_read_off_idfamilia\" class=\"css_read_off_idfamilia" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idfamilia . "\">";
   echo " <span id=\"idAjaxSelect_idfamilia\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idfamilia_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idfamilia\" name=\"idfamilia\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;","NINGUNA") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idfamilia) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idfamilia)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idfamilia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idfamilia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo']))
    {
        $this->nm_new_label['codigo'] = "Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo = $this->codigo;
   $sStyleHidden_codigo = '';
   if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo']);
       $sStyleHidden_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo = 'display: none;';
   $sStyleReadInp_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo']) && $this->nmgp_cmp_readonly['codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo']);
       $sStyleReadLab_codigo = '';
       $sStyleReadInp_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo']) && $this->nmgp_cmp_hidden['codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codigo_label" id="hidden_field_label_codigo" style="<?php echo $sStyleHidden_codigo; ?>"><span id="id_label_codigo"><?php echo $this->nm_new_label['codigo']; ?></span></TD>
    <TD class="scFormDataOdd css_codigo_line" id="hidden_field_data_codigo" style="<?php echo $sStyleHidden_codigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo"]) &&  $this->nmgp_cmp_readonly["codigo"] == "on") { 

 ?>
<input type="hidden" name="codigo" value="<?php echo $this->form_encode_input($codigo) . "\">" . $codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo" class="sc-ui-readonly-codigo css_codigo_line" style="<?php echo $sStyleReadLab_codigo; ?>"><?php echo $this->form_format_readonly("codigo", $this->form_encode_input($this->codigo)); ?></span><span id="id_read_off_codigo" class="css_read_off_codigo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo" type=text name="codigo" value="<?php echo $this->form_encode_input($codigo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_etiquetas*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_productos"]) && $this->Ini->sc_lig_md5["grid_productos"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,codigo,codigobar*scoutnm_evt_ret_busca*scinsc_form_etiquetas_codigo_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_etiquetas@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,codigo,codigobar*scoutnm_evt_ret_busca*scinsc_form_etiquetas_codigo_onchange(this)*scoutnmgp_perm_edit*scinN*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_productos_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_productos_cons_psq. "', '" . $Md5_Lig . "')", "cap_codigo", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nompro']))
    {
        $this->nm_new_label['nompro'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nompro = $this->nompro;
   $sStyleHidden_nompro = '';
   if (isset($this->nmgp_cmp_hidden['nompro']) && $this->nmgp_cmp_hidden['nompro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nompro']);
       $sStyleHidden_nompro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nompro = 'display: none;';
   $sStyleReadInp_nompro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nompro']) && $this->nmgp_cmp_readonly['nompro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nompro']);
       $sStyleReadLab_nompro = '';
       $sStyleReadInp_nompro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nompro']) && $this->nmgp_cmp_hidden['nompro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nompro" value="<?php echo $this->form_encode_input($nompro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nompro_label" id="hidden_field_label_nompro" style="<?php echo $sStyleHidden_nompro; ?>"><span id="id_label_nompro"><?php echo $this->nm_new_label['nompro']; ?></span></TD>
    <TD class="scFormDataOdd css_nompro_line" id="hidden_field_data_nompro" style="<?php echo $sStyleHidden_nompro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nompro_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="nompro" value="<?php echo $this->form_encode_input($nompro); ?>"><span id="id_ajax_label_nompro"><?php echo nl2br($nompro); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nompro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nompro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descripcion']))
    {
        $this->nm_new_label['descripcion'] = "Descripcion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descripcion = $this->descripcion;
   $sStyleHidden_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descripcion']);
       $sStyleHidden_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descripcion = 'display: none;';
   $sStyleReadInp_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descripcion']) && $this->nmgp_cmp_readonly['descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descripcion']);
       $sStyleReadLab_descripcion = '';
       $sStyleReadInp_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descripcion_label" id="hidden_field_label_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>"><span id="id_label_descripcion"><?php echo $this->nm_new_label['descripcion']; ?></span></TD>
    <TD class="scFormDataOdd css_descripcion_line" id="hidden_field_data_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descripcion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descripcion"]) &&  $this->nmgp_cmp_readonly["descripcion"] == "on") { 

 ?>
<input type="hidden" name="descripcion" value="<?php echo $this->form_encode_input($descripcion) . "\">" . $descripcion . ""; ?>
<?php } else { ?>
<span id="id_read_on_descripcion" class="sc-ui-readonly-descripcion css_descripcion_line" style="<?php echo $sStyleReadLab_descripcion; ?>"><?php echo $this->form_format_readonly("descripcion", $this->form_encode_input($this->descripcion)); ?></span><span id="id_read_off_descripcion" class="css_read_off_descripcion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descripcion; ?>">
 <input class="sc-js-input scFormObjectOdd css_descripcion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descripcion" type=text name="descripcion" value="<?php echo $this->form_encode_input($descripcion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['size_letra_descripcion']))
    {
        $this->nm_new_label['size_letra_descripcion'] = "Tamaño letra descripción";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $size_letra_descripcion = $this->size_letra_descripcion;
   $sStyleHidden_size_letra_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['size_letra_descripcion']) && $this->nmgp_cmp_hidden['size_letra_descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['size_letra_descripcion']);
       $sStyleHidden_size_letra_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_size_letra_descripcion = 'display: none;';
   $sStyleReadInp_size_letra_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['size_letra_descripcion']) && $this->nmgp_cmp_readonly['size_letra_descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['size_letra_descripcion']);
       $sStyleReadLab_size_letra_descripcion = '';
       $sStyleReadInp_size_letra_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['size_letra_descripcion']) && $this->nmgp_cmp_hidden['size_letra_descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="size_letra_descripcion" value="<?php echo $this->form_encode_input($size_letra_descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_size_letra_descripcion_label" id="hidden_field_label_size_letra_descripcion" style="<?php echo $sStyleHidden_size_letra_descripcion; ?>"><span id="id_label_size_letra_descripcion"><?php echo $this->nm_new_label['size_letra_descripcion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_descripcion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_size_letra_descripcion_line" id="hidden_field_data_size_letra_descripcion" style="<?php echo $sStyleHidden_size_letra_descripcion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_size_letra_descripcion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["size_letra_descripcion"]) &&  $this->nmgp_cmp_readonly["size_letra_descripcion"] == "on") { 

 ?>
<input type="hidden" name="size_letra_descripcion" value="<?php echo $this->form_encode_input($size_letra_descripcion) . "\">" . $size_letra_descripcion . ""; ?>
<?php } else { ?>
<span id="id_read_on_size_letra_descripcion" class="sc-ui-readonly-size_letra_descripcion css_size_letra_descripcion_line" style="<?php echo $sStyleReadLab_size_letra_descripcion; ?>"><?php echo $this->form_format_readonly("size_letra_descripcion", $this->form_encode_input($this->size_letra_descripcion)); ?></span><span id="id_read_off_size_letra_descripcion" class="css_read_off_size_letra_descripcion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_size_letra_descripcion; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_size_letra_descripcion_obj css_size_letra_descripcion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_size_letra_descripcion" type=text name="size_letra_descripcion" value="<?php echo $this->form_encode_input($size_letra_descripcion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['size_letra_descripcion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['size_letra_descripcion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['size_letra_descripcion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_size_letra_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_size_letra_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_letra']))
   {
       $this->nm_new_label['tipo_letra'] = "Tipo Letra";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_letra = $this->tipo_letra;
   $sStyleHidden_tipo_letra = '';
   if (isset($this->nmgp_cmp_hidden['tipo_letra']) && $this->nmgp_cmp_hidden['tipo_letra'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_letra']);
       $sStyleHidden_tipo_letra = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_letra = 'display: none;';
   $sStyleReadInp_tipo_letra = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_letra']) && $this->nmgp_cmp_readonly['tipo_letra'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_letra']);
       $sStyleReadLab_tipo_letra = '';
       $sStyleReadInp_tipo_letra = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_letra']) && $this->nmgp_cmp_hidden['tipo_letra'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_letra" value="<?php echo $this->form_encode_input($this->tipo_letra) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_letra_label" id="hidden_field_label_tipo_letra" style="<?php echo $sStyleHidden_tipo_letra; ?>"><span id="id_label_tipo_letra"><?php echo $this->nm_new_label['tipo_letra']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_letra']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_letra'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipo_letra_line" id="hidden_field_data_tipo_letra" style="<?php echo $sStyleHidden_tipo_letra; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_letra_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_letra"]) &&  $this->nmgp_cmp_readonly["tipo_letra"] == "on") { 

$tipo_letra_look = "";
 if ($this->tipo_letra == "Arial") { $tipo_letra_look .= "Arial" ;} 
 if ($this->tipo_letra == "Helvetica") { $tipo_letra_look .= "Helvetica" ;} 
 if ($this->tipo_letra == "sans") { $tipo_letra_look .= "sans-serif" ;} 
 if ($this->tipo_letra == "Tahoma") { $tipo_letra_look .= "Tahoma" ;} 
 if ($this->tipo_letra == "Georgia") { $tipo_letra_look .= "Georgia" ;} 
 if ($this->tipo_letra == "Verdana") { $tipo_letra_look .= "Verdana" ;} 
 if (empty($tipo_letra_look)) { $tipo_letra_look = $this->tipo_letra; }
?>
<input type="hidden" name="tipo_letra" value="<?php echo $this->form_encode_input($tipo_letra) . "\">" . $tipo_letra_look . ""; ?>
<?php } else { ?>
<?php

$tipo_letra_look = "";
 if ($this->tipo_letra == "Arial") { $tipo_letra_look .= "Arial" ;} 
 if ($this->tipo_letra == "Helvetica") { $tipo_letra_look .= "Helvetica" ;} 
 if ($this->tipo_letra == "sans") { $tipo_letra_look .= "sans-serif" ;} 
 if ($this->tipo_letra == "Tahoma") { $tipo_letra_look .= "Tahoma" ;} 
 if ($this->tipo_letra == "Georgia") { $tipo_letra_look .= "Georgia" ;} 
 if ($this->tipo_letra == "Verdana") { $tipo_letra_look .= "Verdana" ;} 
 if (empty($tipo_letra_look)) { $tipo_letra_look = $this->tipo_letra; }
?>
<span id="id_read_on_tipo_letra" class="css_tipo_letra_line"  style="<?php echo $sStyleReadLab_tipo_letra; ?>"><?php echo $this->form_format_readonly("tipo_letra", $this->form_encode_input($tipo_letra_look)); ?></span><span id="id_read_off_tipo_letra" class="css_read_off_tipo_letra<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_letra; ?>">
 <span id="idAjaxSelect_tipo_letra" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_letra_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_letra" name="tipo_letra" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="Arial" <?php  if ($this->tipo_letra == "Arial") { echo " selected" ;} ?>>Arial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Arial'; ?>
 <option  value="Helvetica" <?php  if ($this->tipo_letra == "Helvetica") { echo " selected" ;} ?>>Helvetica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Helvetica'; ?>
 <option  value="sans" <?php  if ($this->tipo_letra == "sans") { echo " selected" ;} ?>>sans-serif</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'sans'; ?>
 <option  value="Tahoma" <?php  if ($this->tipo_letra == "Tahoma") { echo " selected" ;} ?>>Tahoma</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Tahoma'; ?>
 <option  value="Georgia" <?php  if ($this->tipo_letra == "Georgia") { echo " selected" ;} ?>>Georgia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Georgia'; ?>
 <option  value="Verdana" <?php  if ($this->tipo_letra == "Verdana") { echo " selected" ;} ?>>Verdana</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Verdana'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_letra_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_letra_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['columnas']))
    {
        $this->nm_new_label['columnas'] = "Columnas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $columnas = $this->columnas;
   $sStyleHidden_columnas = '';
   if (isset($this->nmgp_cmp_hidden['columnas']) && $this->nmgp_cmp_hidden['columnas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['columnas']);
       $sStyleHidden_columnas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_columnas = 'display: none;';
   $sStyleReadInp_columnas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['columnas']) && $this->nmgp_cmp_readonly['columnas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['columnas']);
       $sStyleReadLab_columnas = '';
       $sStyleReadInp_columnas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['columnas']) && $this->nmgp_cmp_hidden['columnas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="columnas" value="<?php echo $this->form_encode_input($columnas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_columnas_label" id="hidden_field_label_columnas" style="<?php echo $sStyleHidden_columnas; ?>"><span id="id_label_columnas"><?php echo $this->nm_new_label['columnas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['columnas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['columnas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_columnas_line" id="hidden_field_data_columnas" style="<?php echo $sStyleHidden_columnas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_columnas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["columnas"]) &&  $this->nmgp_cmp_readonly["columnas"] == "on") { 

 ?>
<input type="hidden" name="columnas" value="<?php echo $this->form_encode_input($columnas) . "\">" . $columnas . ""; ?>
<?php } else { ?>
<span id="id_read_on_columnas" class="sc-ui-readonly-columnas css_columnas_line" style="<?php echo $sStyleReadLab_columnas; ?>"><?php echo $this->form_format_readonly("columnas", $this->form_encode_input($this->columnas)); ?></span><span id="id_read_off_columnas" class="css_read_off_columnas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_columnas; ?>">
 <input class="sc-js-input scFormObjectOdd css_columnas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_columnas" type=text name="columnas" value="<?php echo $this->form_encode_input($columnas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['columnas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['columnas']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['columnas']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_columnas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_columnas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_codigo']))
   {
       $this->nm_new_label['tipo_codigo'] = "Tipo Codigo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_codigo = $this->tipo_codigo;
   $sStyleHidden_tipo_codigo = '';
   if (isset($this->nmgp_cmp_hidden['tipo_codigo']) && $this->nmgp_cmp_hidden['tipo_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_codigo']);
       $sStyleHidden_tipo_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_codigo = 'display: none;';
   $sStyleReadInp_tipo_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_codigo']) && $this->nmgp_cmp_readonly['tipo_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_codigo']);
       $sStyleReadLab_tipo_codigo = '';
       $sStyleReadInp_tipo_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_codigo']) && $this->nmgp_cmp_hidden['tipo_codigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_codigo" value="<?php echo $this->form_encode_input($this->tipo_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_codigo_label" id="hidden_field_label_tipo_codigo" style="<?php echo $sStyleHidden_tipo_codigo; ?>"><span id="id_label_tipo_codigo"><?php echo $this->nm_new_label['tipo_codigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_codigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipo_codigo_line" id="hidden_field_data_tipo_codigo" style="<?php echo $sStyleHidden_tipo_codigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_codigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_codigo"]) &&  $this->nmgp_cmp_readonly["tipo_codigo"] == "on") { 

$tipo_codigo_look = "";
 if ($this->tipo_codigo == "TYPE_EAN_13") { $tipo_codigo_look .= "TYPE_EAN_13" ;} 
 if ($this->tipo_codigo == "TYPE_EAN_8") { $tipo_codigo_look .= "TYPE_EAN_8" ;} 
 if ($this->tipo_codigo == "TYPE_EAN_5") { $tipo_codigo_look .= "TYPE_EAN_5" ;} 
 if ($this->tipo_codigo == "TYPE_CODE_39") { $tipo_codigo_look .= "TYPE_CODE_39" ;} 
 if ($this->tipo_codigo == "TYPE_CODE_128") { $tipo_codigo_look .= "TYPE_CODE_128" ;} 
 if ($this->tipo_codigo == "TYPE_CODE_11") { $tipo_codigo_look .= "TYPE_CODE_11" ;} 
 if ($this->tipo_codigo == "TYPE_PHARMA_CODE") { $tipo_codigo_look .= "TYPE_PHARMA_CODE" ;} 
 if (empty($tipo_codigo_look)) { $tipo_codigo_look = $this->tipo_codigo; }
?>
<input type="hidden" name="tipo_codigo" value="<?php echo $this->form_encode_input($tipo_codigo) . "\">" . $tipo_codigo_look . ""; ?>
<?php } else { ?>
<?php

$tipo_codigo_look = "";
 if ($this->tipo_codigo == "TYPE_EAN_13") { $tipo_codigo_look .= "TYPE_EAN_13" ;} 
 if ($this->tipo_codigo == "TYPE_EAN_8") { $tipo_codigo_look .= "TYPE_EAN_8" ;} 
 if ($this->tipo_codigo == "TYPE_EAN_5") { $tipo_codigo_look .= "TYPE_EAN_5" ;} 
 if ($this->tipo_codigo == "TYPE_CODE_39") { $tipo_codigo_look .= "TYPE_CODE_39" ;} 
 if ($this->tipo_codigo == "TYPE_CODE_128") { $tipo_codigo_look .= "TYPE_CODE_128" ;} 
 if ($this->tipo_codigo == "TYPE_CODE_11") { $tipo_codigo_look .= "TYPE_CODE_11" ;} 
 if ($this->tipo_codigo == "TYPE_PHARMA_CODE") { $tipo_codigo_look .= "TYPE_PHARMA_CODE" ;} 
 if (empty($tipo_codigo_look)) { $tipo_codigo_look = $this->tipo_codigo; }
?>
<span id="id_read_on_tipo_codigo" class="css_tipo_codigo_line"  style="<?php echo $sStyleReadLab_tipo_codigo; ?>"><?php echo $this->form_format_readonly("tipo_codigo", $this->form_encode_input($tipo_codigo_look)); ?></span><span id="id_read_off_tipo_codigo" class="css_read_off_tipo_codigo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_codigo; ?>">
 <span id="idAjaxSelect_tipo_codigo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_codigo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_codigo" name="tipo_codigo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="TYPE_EAN_13" <?php  if ($this->tipo_codigo == "TYPE_EAN_13") { echo " selected" ;} ?>>TYPE_EAN_13</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_EAN_13'; ?>
 <option  value="TYPE_EAN_8" <?php  if ($this->tipo_codigo == "TYPE_EAN_8") { echo " selected" ;} ?>>TYPE_EAN_8</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_EAN_8'; ?>
 <option  value="TYPE_EAN_5" <?php  if ($this->tipo_codigo == "TYPE_EAN_5") { echo " selected" ;} ?>>TYPE_EAN_5</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_EAN_5'; ?>
 <option  value="TYPE_CODE_39" <?php  if ($this->tipo_codigo == "TYPE_CODE_39") { echo " selected" ;} ?>>TYPE_CODE_39</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_CODE_39'; ?>
 <option  value="TYPE_CODE_128" <?php  if ($this->tipo_codigo == "TYPE_CODE_128") { echo " selected" ;} ?>>TYPE_CODE_128</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_CODE_128'; ?>
 <option  value="TYPE_CODE_11" <?php  if ($this->tipo_codigo == "TYPE_CODE_11") { echo " selected" ;} ?>>TYPE_CODE_11</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_CODE_11'; ?>
 <option  value="TYPE_PHARMA_CODE" <?php  if ($this->tipo_codigo == "TYPE_PHARMA_CODE") { echo " selected" ;} ?>>TYPE_PHARMA_CODE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_PHARMA_CODE'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_codigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_imagen']))
   {
       $this->nm_new_label['tipo_imagen'] = "Tipo Imagen";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_imagen = $this->tipo_imagen;
   $sStyleHidden_tipo_imagen = '';
   if (isset($this->nmgp_cmp_hidden['tipo_imagen']) && $this->nmgp_cmp_hidden['tipo_imagen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_imagen']);
       $sStyleHidden_tipo_imagen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_imagen = 'display: none;';
   $sStyleReadInp_tipo_imagen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_imagen']) && $this->nmgp_cmp_readonly['tipo_imagen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_imagen']);
       $sStyleReadLab_tipo_imagen = '';
       $sStyleReadInp_tipo_imagen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_imagen']) && $this->nmgp_cmp_hidden['tipo_imagen'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_imagen" value="<?php echo $this->form_encode_input($this->tipo_imagen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_imagen_label" id="hidden_field_label_tipo_imagen" style="<?php echo $sStyleHidden_tipo_imagen; ?>"><span id="id_label_tipo_imagen"><?php echo $this->nm_new_label['tipo_imagen']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_imagen']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_imagen'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipo_imagen_line" id="hidden_field_data_tipo_imagen" style="<?php echo $sStyleHidden_tipo_imagen; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_imagen_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_imagen"]) &&  $this->nmgp_cmp_readonly["tipo_imagen"] == "on") { 

$tipo_imagen_look = "";
 if ($this->tipo_imagen == "BarcodeGeneratorPNG") { $tipo_imagen_look .= "PNG" ;} 
 if ($this->tipo_imagen == "BarcodeGeneratorSVG") { $tipo_imagen_look .= "SVG" ;} 
 if ($this->tipo_imagen == "BarcodeGeneratorJPG") { $tipo_imagen_look .= "JPG" ;} 
 if ($this->tipo_imagen == "BarcodeGeneratorHTML") { $tipo_imagen_look .= "HTML" ;} 
 if (empty($tipo_imagen_look)) { $tipo_imagen_look = $this->tipo_imagen; }
?>
<input type="hidden" name="tipo_imagen" value="<?php echo $this->form_encode_input($tipo_imagen) . "\">" . $tipo_imagen_look . ""; ?>
<?php } else { ?>
<?php

$tipo_imagen_look = "";
 if ($this->tipo_imagen == "BarcodeGeneratorPNG") { $tipo_imagen_look .= "PNG" ;} 
 if ($this->tipo_imagen == "BarcodeGeneratorSVG") { $tipo_imagen_look .= "SVG" ;} 
 if ($this->tipo_imagen == "BarcodeGeneratorJPG") { $tipo_imagen_look .= "JPG" ;} 
 if ($this->tipo_imagen == "BarcodeGeneratorHTML") { $tipo_imagen_look .= "HTML" ;} 
 if (empty($tipo_imagen_look)) { $tipo_imagen_look = $this->tipo_imagen; }
?>
<span id="id_read_on_tipo_imagen" class="css_tipo_imagen_line"  style="<?php echo $sStyleReadLab_tipo_imagen; ?>"><?php echo $this->form_format_readonly("tipo_imagen", $this->form_encode_input($tipo_imagen_look)); ?></span><span id="id_read_off_tipo_imagen" class="css_read_off_tipo_imagen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_imagen; ?>">
 <span id="idAjaxSelect_tipo_imagen" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_imagen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_imagen" name="tipo_imagen" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="BarcodeGeneratorPNG" <?php  if ($this->tipo_imagen == "BarcodeGeneratorPNG") { echo " selected" ;} ?>>PNG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorPNG'; ?>
 <option  value="BarcodeGeneratorSVG" <?php  if ($this->tipo_imagen == "BarcodeGeneratorSVG") { echo " selected" ;} ?>>SVG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorSVG'; ?>
 <option  value="BarcodeGeneratorJPG" <?php  if ($this->tipo_imagen == "BarcodeGeneratorJPG") { echo " selected" ;} ?>>JPG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorJPG'; ?>
 <option  value="BarcodeGeneratorHTML" <?php  if ($this->tipo_imagen == "BarcodeGeneratorHTML") { echo " selected" ;} ?>>HTML</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorHTML'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_imagen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_imagen_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['altura']))
    {
        $this->nm_new_label['altura'] = "Altura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $altura = $this->altura;
   $sStyleHidden_altura = '';
   if (isset($this->nmgp_cmp_hidden['altura']) && $this->nmgp_cmp_hidden['altura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['altura']);
       $sStyleHidden_altura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_altura = 'display: none;';
   $sStyleReadInp_altura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['altura']) && $this->nmgp_cmp_readonly['altura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['altura']);
       $sStyleReadLab_altura = '';
       $sStyleReadInp_altura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['altura']) && $this->nmgp_cmp_hidden['altura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="altura" value="<?php echo $this->form_encode_input($altura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_altura_label" id="hidden_field_label_altura" style="<?php echo $sStyleHidden_altura; ?>"><span id="id_label_altura"><?php echo $this->nm_new_label['altura']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['altura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['altura'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_altura_line" id="hidden_field_data_altura" style="<?php echo $sStyleHidden_altura; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_altura_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["altura"]) &&  $this->nmgp_cmp_readonly["altura"] == "on") { 

 ?>
<input type="hidden" name="altura" value="<?php echo $this->form_encode_input($altura) . "\">" . $altura . ""; ?>
<?php } else { ?>
<span id="id_read_on_altura" class="sc-ui-readonly-altura css_altura_line" style="<?php echo $sStyleReadLab_altura; ?>"><?php echo $this->form_format_readonly("altura", $this->form_encode_input($this->altura)); ?></span><span id="id_read_off_altura" class="css_read_off_altura<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_altura; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_altura_obj css_altura_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_altura" type=text name="altura" value="<?php echo $this->form_encode_input($altura) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['altura']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['altura']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['altura']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_altura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_altura_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anchura']))
    {
        $this->nm_new_label['anchura'] = "Anchura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anchura = $this->anchura;
   $sStyleHidden_anchura = '';
   if (isset($this->nmgp_cmp_hidden['anchura']) && $this->nmgp_cmp_hidden['anchura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anchura']);
       $sStyleHidden_anchura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anchura = 'display: none;';
   $sStyleReadInp_anchura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anchura']) && $this->nmgp_cmp_readonly['anchura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anchura']);
       $sStyleReadLab_anchura = '';
       $sStyleReadInp_anchura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anchura']) && $this->nmgp_cmp_hidden['anchura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anchura" value="<?php echo $this->form_encode_input($anchura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_anchura_label" id="hidden_field_label_anchura" style="<?php echo $sStyleHidden_anchura; ?>"><span id="id_label_anchura"><?php echo $this->nm_new_label['anchura']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['anchura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['anchura'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_anchura_line" id="hidden_field_data_anchura" style="<?php echo $sStyleHidden_anchura; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anchura_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anchura"]) &&  $this->nmgp_cmp_readonly["anchura"] == "on") { 

 ?>
<input type="hidden" name="anchura" value="<?php echo $this->form_encode_input($anchura) . "\">" . $anchura . ""; ?>
<?php } else { ?>
<span id="id_read_on_anchura" class="sc-ui-readonly-anchura css_anchura_line" style="<?php echo $sStyleReadLab_anchura; ?>"><?php echo $this->form_format_readonly("anchura", $this->form_encode_input($this->anchura)); ?></span><span id="id_read_off_anchura" class="css_read_off_anchura<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anchura; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_anchura_obj css_anchura_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anchura" type=text name="anchura" value="<?php echo $this->form_encode_input($anchura) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anchura']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anchura']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anchura']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anchura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anchura_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['precio']))
   {
       $this->nm_new_label['precio'] = "Precio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio = $this->precio;
   $sStyleHidden_precio = '';
   if (isset($this->nmgp_cmp_hidden['precio']) && $this->nmgp_cmp_hidden['precio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio']);
       $sStyleHidden_precio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio = 'display: none;';
   $sStyleReadInp_precio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio']) && $this->nmgp_cmp_readonly['precio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio']);
       $sStyleReadLab_precio = '';
       $sStyleReadInp_precio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio']) && $this->nmgp_cmp_hidden['precio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="precio" value="<?php echo $this->form_encode_input($this->precio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio_label" id="hidden_field_label_precio" style="<?php echo $sStyleHidden_precio; ?>"><span id="id_label_precio"><?php echo $this->nm_new_label['precio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['precio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['precio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_precio_line" id="hidden_field_data_precio" style="<?php echo $sStyleHidden_precio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio"]) &&  $this->nmgp_cmp_readonly["precio"] == "on") { 

$precio_look = "";
 if ($this->precio == "preciomen") { $precio_look .= "PRECIO1" ;} 
 if ($this->precio == "preciomen2") { $precio_look .= "PRECIO2" ;} 
 if ($this->precio == "preciomen3") { $precio_look .= "PRECIO3" ;} 
 if ($this->precio == "preciofull") { $precio_look .= "PRECIOM1" ;} 
 if ($this->precio == "precio2") { $precio_look .= "PRECIOM2" ;} 
 if ($this->precio == "preciomay") { $precio_look .= "PRECIOM3" ;} 
 if (empty($precio_look)) { $precio_look = $this->precio; }
?>
<input type="hidden" name="precio" value="<?php echo $this->form_encode_input($precio) . "\">" . $precio_look . ""; ?>
<?php } else { ?>
<?php

$precio_look = "";
 if ($this->precio == "preciomen") { $precio_look .= "PRECIO1" ;} 
 if ($this->precio == "preciomen2") { $precio_look .= "PRECIO2" ;} 
 if ($this->precio == "preciomen3") { $precio_look .= "PRECIO3" ;} 
 if ($this->precio == "preciofull") { $precio_look .= "PRECIOM1" ;} 
 if ($this->precio == "precio2") { $precio_look .= "PRECIOM2" ;} 
 if ($this->precio == "preciomay") { $precio_look .= "PRECIOM3" ;} 
 if (empty($precio_look)) { $precio_look = $this->precio; }
?>
<span id="id_read_on_precio" class="css_precio_line"  style="<?php echo $sStyleReadLab_precio; ?>"><?php echo $this->form_format_readonly("precio", $this->form_encode_input($precio_look)); ?></span><span id="id_read_off_precio" class="css_read_off_precio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_precio; ?>">
 <span id="idAjaxSelect_precio" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_precio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio" name="precio" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = ''; ?>
 <option value="">Ver Precio</option>
 <option  value="preciomen" <?php  if ($this->precio == "preciomen") { echo " selected" ;} ?>>PRECIO1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomen'; ?>
 <option  value="preciomen2" <?php  if ($this->precio == "preciomen2") { echo " selected" ;} ?>>PRECIO2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomen2'; ?>
 <option  value="preciomen3" <?php  if ($this->precio == "preciomen3") { echo " selected" ;} ?>>PRECIO3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomen3'; ?>
 <option  value="preciofull" <?php  if ($this->precio == "preciofull") { echo " selected" ;} ?>>PRECIOM1</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciofull'; ?>
 <option  value="precio2" <?php  if ($this->precio == "precio2") { echo " selected" ;} ?>>PRECIOM2</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'precio2'; ?>
 <option  value="preciomay" <?php  if ($this->precio == "preciomay") { echo " selected" ;} ?>>PRECIOM3</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomay'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_codigo']))
   {
       $this->nm_new_label['ver_codigo'] = "Ver Codigo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_codigo = $this->ver_codigo;
   $sStyleHidden_ver_codigo = '';
   if (isset($this->nmgp_cmp_hidden['ver_codigo']) && $this->nmgp_cmp_hidden['ver_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_codigo']);
       $sStyleHidden_ver_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_codigo = 'display: none;';
   $sStyleReadInp_ver_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_codigo']) && $this->nmgp_cmp_readonly['ver_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_codigo']);
       $sStyleReadLab_ver_codigo = '';
       $sStyleReadInp_ver_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_codigo']) && $this->nmgp_cmp_hidden['ver_codigo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_codigo" value="<?php echo $this->form_encode_input($this->ver_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_codigo_1 = explode(";", trim($this->ver_codigo));
  } 
  else
  {
      if (empty($this->ver_codigo))
      {
          $this->ver_codigo_1= array(); 
          $this->ver_codigo= "NO";
      } 
      else
      {
          $this->ver_codigo_1= $this->ver_codigo; 
          $this->ver_codigo= ""; 
          foreach ($this->ver_codigo_1 as $cada_ver_codigo)
          {
             if (!empty($ver_codigo))
             {
                 $this->ver_codigo.= ";"; 
             } 
             $this->ver_codigo.= $cada_ver_codigo; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ver_codigo_label" id="hidden_field_label_ver_codigo" style="<?php echo $sStyleHidden_ver_codigo; ?>"><span id="id_label_ver_codigo"><?php echo $this->nm_new_label['ver_codigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ver_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ver_codigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ver_codigo_line" id="hidden_field_data_ver_codigo" style="<?php echo $sStyleHidden_ver_codigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_codigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_codigo"]) &&  $this->nmgp_cmp_readonly["ver_codigo"] == "on") { 

$ver_codigo_look = "";
 if ($this->ver_codigo == "SI") { $ver_codigo_look .= "SI" ;} 
 if (empty($ver_codigo_look)) { $ver_codigo_look = $this->ver_codigo; }
?>
<input type="hidden" name="ver_codigo" value="<?php echo $this->form_encode_input($ver_codigo) . "\">" . $ver_codigo_look . ""; ?>
<?php } else { ?>

<?php

$ver_codigo_look = "";
 if ($this->ver_codigo == "SI") { $ver_codigo_look .= "SI" ;} 
 if (empty($ver_codigo_look)) { $ver_codigo_look = $this->ver_codigo; }
?>
<span id="id_read_on_ver_codigo" class="css_ver_codigo_line" style="<?php echo $sStyleReadLab_ver_codigo; ?>"><?php echo $this->form_format_readonly("ver_codigo", $this->form_encode_input($ver_codigo_look)); ?></span><span id="id_read_off_ver_codigo" class="css_read_off_ver_codigo css_ver_codigo_line" style="<?php echo $sStyleReadInp_ver_codigo; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_codigo\" style=\"display: inline-block\" class=\"css_ver_codigo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_codigo_line"><?php $tempOptionId = "id-opt-ver_codigo" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_codigo sc-ui-checkbox-ver_codigo" name="ver_codigo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_ver_codigo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_codigo_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_codigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_descripcion']))
   {
       $this->nm_new_label['ver_descripcion'] = "Ver Descripcion";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_descripcion = $this->ver_descripcion;
   $sStyleHidden_ver_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['ver_descripcion']) && $this->nmgp_cmp_hidden['ver_descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_descripcion']);
       $sStyleHidden_ver_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_descripcion = 'display: none;';
   $sStyleReadInp_ver_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_descripcion']) && $this->nmgp_cmp_readonly['ver_descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_descripcion']);
       $sStyleReadLab_ver_descripcion = '';
       $sStyleReadInp_ver_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_descripcion']) && $this->nmgp_cmp_hidden['ver_descripcion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_descripcion" value="<?php echo $this->form_encode_input($this->ver_descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_descripcion_1 = explode(";", trim($this->ver_descripcion));
  } 
  else
  {
      if (empty($this->ver_descripcion))
      {
          $this->ver_descripcion_1= array(); 
          $this->ver_descripcion= "NO";
      } 
      else
      {
          $this->ver_descripcion_1= $this->ver_descripcion; 
          $this->ver_descripcion= ""; 
          foreach ($this->ver_descripcion_1 as $cada_ver_descripcion)
          {
             if (!empty($ver_descripcion))
             {
                 $this->ver_descripcion.= ";"; 
             } 
             $this->ver_descripcion.= $cada_ver_descripcion; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ver_descripcion_label" id="hidden_field_label_ver_descripcion" style="<?php echo $sStyleHidden_ver_descripcion; ?>"><span id="id_label_ver_descripcion"><?php echo $this->nm_new_label['ver_descripcion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ver_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ver_descripcion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ver_descripcion_line" id="hidden_field_data_ver_descripcion" style="<?php echo $sStyleHidden_ver_descripcion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_descripcion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_descripcion"]) &&  $this->nmgp_cmp_readonly["ver_descripcion"] == "on") { 

$ver_descripcion_look = "";
 if ($this->ver_descripcion == "SI") { $ver_descripcion_look .= "SI" ;} 
 if (empty($ver_descripcion_look)) { $ver_descripcion_look = $this->ver_descripcion; }
?>
<input type="hidden" name="ver_descripcion" value="<?php echo $this->form_encode_input($ver_descripcion) . "\">" . $ver_descripcion_look . ""; ?>
<?php } else { ?>

<?php

$ver_descripcion_look = "";
 if ($this->ver_descripcion == "SI") { $ver_descripcion_look .= "SI" ;} 
 if (empty($ver_descripcion_look)) { $ver_descripcion_look = $this->ver_descripcion; }
?>
<span id="id_read_on_ver_descripcion" class="css_ver_descripcion_line" style="<?php echo $sStyleReadLab_ver_descripcion; ?>"><?php echo $this->form_format_readonly("ver_descripcion", $this->form_encode_input($ver_descripcion_look)); ?></span><span id="id_read_off_ver_descripcion" class="css_read_off_ver_descripcion css_ver_descripcion_line" style="<?php echo $sStyleReadInp_ver_descripcion; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_descripcion\" style=\"display: inline-block\" class=\"css_ver_descripcion_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_descripcion_line"><?php $tempOptionId = "id-opt-ver_descripcion" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_descripcion sc-ui-checkbox-ver_descripcion" name="ver_descripcion[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_ver_descripcion'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_descripcion_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['personalizado1']))
    {
        $this->nm_new_label['personalizado1'] = "Personalizado 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $personalizado1 = $this->personalizado1;
   $sStyleHidden_personalizado1 = '';
   if (isset($this->nmgp_cmp_hidden['personalizado1']) && $this->nmgp_cmp_hidden['personalizado1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['personalizado1']);
       $sStyleHidden_personalizado1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_personalizado1 = 'display: none;';
   $sStyleReadInp_personalizado1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['personalizado1']) && $this->nmgp_cmp_readonly['personalizado1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['personalizado1']);
       $sStyleReadLab_personalizado1 = '';
       $sStyleReadInp_personalizado1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['personalizado1']) && $this->nmgp_cmp_hidden['personalizado1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="personalizado1" value="<?php echo $this->form_encode_input($personalizado1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_personalizado1_label" id="hidden_field_label_personalizado1" style="<?php echo $sStyleHidden_personalizado1; ?>"><span id="id_label_personalizado1"><?php echo $this->nm_new_label['personalizado1']; ?></span></TD>
    <TD class="scFormDataOdd css_personalizado1_line" id="hidden_field_data_personalizado1" style="<?php echo $sStyleHidden_personalizado1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_personalizado1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["personalizado1"]) &&  $this->nmgp_cmp_readonly["personalizado1"] == "on") { 

 ?>
<input type="hidden" name="personalizado1" value="<?php echo $this->form_encode_input($personalizado1) . "\">" . $personalizado1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_personalizado1" class="sc-ui-readonly-personalizado1 css_personalizado1_line" style="<?php echo $sStyleReadLab_personalizado1; ?>"><?php echo $this->form_format_readonly("personalizado1", $this->form_encode_input($this->personalizado1)); ?></span><span id="id_read_off_personalizado1" class="css_read_off_personalizado1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_personalizado1; ?>">
 <input class="sc-js-input scFormObjectOdd css_personalizado1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_personalizado1" type=text name="personalizado1" value="<?php echo $this->form_encode_input($personalizado1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_personalizado1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_personalizado1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['personalizado2']))
    {
        $this->nm_new_label['personalizado2'] = "Personalizado 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $personalizado2 = $this->personalizado2;
   $sStyleHidden_personalizado2 = '';
   if (isset($this->nmgp_cmp_hidden['personalizado2']) && $this->nmgp_cmp_hidden['personalizado2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['personalizado2']);
       $sStyleHidden_personalizado2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_personalizado2 = 'display: none;';
   $sStyleReadInp_personalizado2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['personalizado2']) && $this->nmgp_cmp_readonly['personalizado2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['personalizado2']);
       $sStyleReadLab_personalizado2 = '';
       $sStyleReadInp_personalizado2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['personalizado2']) && $this->nmgp_cmp_hidden['personalizado2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="personalizado2" value="<?php echo $this->form_encode_input($personalizado2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_personalizado2_label" id="hidden_field_label_personalizado2" style="<?php echo $sStyleHidden_personalizado2; ?>"><span id="id_label_personalizado2"><?php echo $this->nm_new_label['personalizado2']; ?></span></TD>
    <TD class="scFormDataOdd css_personalizado2_line" id="hidden_field_data_personalizado2" style="<?php echo $sStyleHidden_personalizado2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_personalizado2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["personalizado2"]) &&  $this->nmgp_cmp_readonly["personalizado2"] == "on") { 

 ?>
<input type="hidden" name="personalizado2" value="<?php echo $this->form_encode_input($personalizado2) . "\">" . $personalizado2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_personalizado2" class="sc-ui-readonly-personalizado2 css_personalizado2_line" style="<?php echo $sStyleReadLab_personalizado2; ?>"><?php echo $this->form_format_readonly("personalizado2", $this->form_encode_input($this->personalizado2)); ?></span><span id="id_read_off_personalizado2" class="css_read_off_personalizado2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_personalizado2; ?>">
 <input class="sc-js-input scFormObjectOdd css_personalizado2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_personalizado2" type=text name="personalizado2" value="<?php echo $this->form_encode_input($personalizado2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_personalizado2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_personalizado2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['personalizado3']))
    {
        $this->nm_new_label['personalizado3'] = "Personalizado 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $personalizado3 = $this->personalizado3;
   $sStyleHidden_personalizado3 = '';
   if (isset($this->nmgp_cmp_hidden['personalizado3']) && $this->nmgp_cmp_hidden['personalizado3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['personalizado3']);
       $sStyleHidden_personalizado3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_personalizado3 = 'display: none;';
   $sStyleReadInp_personalizado3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['personalizado3']) && $this->nmgp_cmp_readonly['personalizado3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['personalizado3']);
       $sStyleReadLab_personalizado3 = '';
       $sStyleReadInp_personalizado3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['personalizado3']) && $this->nmgp_cmp_hidden['personalizado3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="personalizado3" value="<?php echo $this->form_encode_input($personalizado3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_personalizado3_label" id="hidden_field_label_personalizado3" style="<?php echo $sStyleHidden_personalizado3; ?>"><span id="id_label_personalizado3"><?php echo $this->nm_new_label['personalizado3']; ?></span></TD>
    <TD class="scFormDataOdd css_personalizado3_line" id="hidden_field_data_personalizado3" style="<?php echo $sStyleHidden_personalizado3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_personalizado3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["personalizado3"]) &&  $this->nmgp_cmp_readonly["personalizado3"] == "on") { 

 ?>
<input type="hidden" name="personalizado3" value="<?php echo $this->form_encode_input($personalizado3) . "\">" . $personalizado3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_personalizado3" class="sc-ui-readonly-personalizado3 css_personalizado3_line" style="<?php echo $sStyleReadLab_personalizado3; ?>"><?php echo $this->form_format_readonly("personalizado3", $this->form_encode_input($this->personalizado3)); ?></span><span id="id_read_off_personalizado3" class="css_read_off_personalizado3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_personalizado3; ?>">
 <input class="sc-js-input scFormObjectOdd css_personalizado3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_personalizado3" type=text name="personalizado3" value="<?php echo $this->form_encode_input($personalizado3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_personalizado3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_personalizado3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['espaciado']))
    {
        $this->nm_new_label['espaciado'] = "Espaciado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $espaciado = $this->espaciado;
   $sStyleHidden_espaciado = '';
   if (isset($this->nmgp_cmp_hidden['espaciado']) && $this->nmgp_cmp_hidden['espaciado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['espaciado']);
       $sStyleHidden_espaciado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_espaciado = 'display: none;';
   $sStyleReadInp_espaciado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['espaciado']) && $this->nmgp_cmp_readonly['espaciado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['espaciado']);
       $sStyleReadLab_espaciado = '';
       $sStyleReadInp_espaciado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['espaciado']) && $this->nmgp_cmp_hidden['espaciado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="espaciado" value="<?php echo $this->form_encode_input($espaciado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_espaciado_label" id="hidden_field_label_espaciado" style="<?php echo $sStyleHidden_espaciado; ?>"><span id="id_label_espaciado"><?php echo $this->nm_new_label['espaciado']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['espaciado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['espaciado'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_espaciado_line" id="hidden_field_data_espaciado" style="<?php echo $sStyleHidden_espaciado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_espaciado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["espaciado"]) &&  $this->nmgp_cmp_readonly["espaciado"] == "on") { 

 ?>
<input type="hidden" name="espaciado" value="<?php echo $this->form_encode_input($espaciado) . "\">" . $espaciado . ""; ?>
<?php } else { ?>
<span id="id_read_on_espaciado" class="sc-ui-readonly-espaciado css_espaciado_line" style="<?php echo $sStyleReadLab_espaciado; ?>"><?php echo $this->form_format_readonly("espaciado", $this->form_encode_input($this->espaciado)); ?></span><span id="id_read_off_espaciado" class="css_read_off_espaciado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_espaciado; ?>">
 <input class="sc-js-input scFormObjectOdd css_espaciado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_espaciado" type=text name="espaciado" value="<?php echo $this->form_encode_input($espaciado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['espaciado']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['espaciado']['format_pos'] || 3 == $this->field_config['espaciado']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['espaciado']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['espaciado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['espaciado']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['espaciado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_espaciado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_espaciado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ancho_descripcion']))
    {
        $this->nm_new_label['ancho_descripcion'] = "Ancho Descripcion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ancho_descripcion = $this->ancho_descripcion;
   $sStyleHidden_ancho_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['ancho_descripcion']) && $this->nmgp_cmp_hidden['ancho_descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ancho_descripcion']);
       $sStyleHidden_ancho_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ancho_descripcion = 'display: none;';
   $sStyleReadInp_ancho_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ancho_descripcion']) && $this->nmgp_cmp_readonly['ancho_descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ancho_descripcion']);
       $sStyleReadLab_ancho_descripcion = '';
       $sStyleReadInp_ancho_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ancho_descripcion']) && $this->nmgp_cmp_hidden['ancho_descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ancho_descripcion" value="<?php echo $this->form_encode_input($ancho_descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ancho_descripcion_label" id="hidden_field_label_ancho_descripcion" style="<?php echo $sStyleHidden_ancho_descripcion; ?>"><span id="id_label_ancho_descripcion"><?php echo $this->nm_new_label['ancho_descripcion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ancho_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ancho_descripcion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ancho_descripcion_line" id="hidden_field_data_ancho_descripcion" style="<?php echo $sStyleHidden_ancho_descripcion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ancho_descripcion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ancho_descripcion"]) &&  $this->nmgp_cmp_readonly["ancho_descripcion"] == "on") { 

 ?>
<input type="hidden" name="ancho_descripcion" value="<?php echo $this->form_encode_input($ancho_descripcion) . "\">" . $ancho_descripcion . ""; ?>
<?php } else { ?>
<span id="id_read_on_ancho_descripcion" class="sc-ui-readonly-ancho_descripcion css_ancho_descripcion_line" style="<?php echo $sStyleReadLab_ancho_descripcion; ?>"><?php echo $this->form_format_readonly("ancho_descripcion", $this->form_encode_input($this->ancho_descripcion)); ?></span><span id="id_read_off_ancho_descripcion" class="css_read_off_ancho_descripcion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ancho_descripcion; ?>">
 <input class="sc-js-input scFormObjectOdd css_ancho_descripcion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ancho_descripcion" type=text name="ancho_descripcion" value="<?php echo $this->form_encode_input($ancho_descripcion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ancho_descripcion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ancho_descripcion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ancho_descripcion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ancho_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ancho_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['size_letra_codigo']))
    {
        $this->nm_new_label['size_letra_codigo'] = "Size Letra Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $size_letra_codigo = $this->size_letra_codigo;
   $sStyleHidden_size_letra_codigo = '';
   if (isset($this->nmgp_cmp_hidden['size_letra_codigo']) && $this->nmgp_cmp_hidden['size_letra_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['size_letra_codigo']);
       $sStyleHidden_size_letra_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_size_letra_codigo = 'display: none;';
   $sStyleReadInp_size_letra_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['size_letra_codigo']) && $this->nmgp_cmp_readonly['size_letra_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['size_letra_codigo']);
       $sStyleReadLab_size_letra_codigo = '';
       $sStyleReadInp_size_letra_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['size_letra_codigo']) && $this->nmgp_cmp_hidden['size_letra_codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="size_letra_codigo" value="<?php echo $this->form_encode_input($size_letra_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_size_letra_codigo_label" id="hidden_field_label_size_letra_codigo" style="<?php echo $sStyleHidden_size_letra_codigo; ?>"><span id="id_label_size_letra_codigo"><?php echo $this->nm_new_label['size_letra_codigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_codigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_size_letra_codigo_line" id="hidden_field_data_size_letra_codigo" style="<?php echo $sStyleHidden_size_letra_codigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_size_letra_codigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["size_letra_codigo"]) &&  $this->nmgp_cmp_readonly["size_letra_codigo"] == "on") { 

 ?>
<input type="hidden" name="size_letra_codigo" value="<?php echo $this->form_encode_input($size_letra_codigo) . "\">" . $size_letra_codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_size_letra_codigo" class="sc-ui-readonly-size_letra_codigo css_size_letra_codigo_line" style="<?php echo $sStyleReadLab_size_letra_codigo; ?>"><?php echo $this->form_format_readonly("size_letra_codigo", $this->form_encode_input($this->size_letra_codigo)); ?></span><span id="id_read_off_size_letra_codigo" class="css_read_off_size_letra_codigo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_size_letra_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_size_letra_codigo_obj css_size_letra_codigo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_size_letra_codigo" type=text name="size_letra_codigo" value="<?php echo $this->form_encode_input($size_letra_codigo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['size_letra_codigo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['size_letra_codigo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['size_letra_codigo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_size_letra_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_size_letra_codigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['size_letra_precio']))
    {
        $this->nm_new_label['size_letra_precio'] = "Size Letra Precio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $size_letra_precio = $this->size_letra_precio;
   $sStyleHidden_size_letra_precio = '';
   if (isset($this->nmgp_cmp_hidden['size_letra_precio']) && $this->nmgp_cmp_hidden['size_letra_precio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['size_letra_precio']);
       $sStyleHidden_size_letra_precio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_size_letra_precio = 'display: none;';
   $sStyleReadInp_size_letra_precio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['size_letra_precio']) && $this->nmgp_cmp_readonly['size_letra_precio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['size_letra_precio']);
       $sStyleReadLab_size_letra_precio = '';
       $sStyleReadInp_size_letra_precio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['size_letra_precio']) && $this->nmgp_cmp_hidden['size_letra_precio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="size_letra_precio" value="<?php echo $this->form_encode_input($size_letra_precio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_size_letra_precio_label" id="hidden_field_label_size_letra_precio" style="<?php echo $sStyleHidden_size_letra_precio; ?>"><span id="id_label_size_letra_precio"><?php echo $this->nm_new_label['size_letra_precio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_precio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_precio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_size_letra_precio_line" id="hidden_field_data_size_letra_precio" style="<?php echo $sStyleHidden_size_letra_precio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_size_letra_precio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["size_letra_precio"]) &&  $this->nmgp_cmp_readonly["size_letra_precio"] == "on") { 

 ?>
<input type="hidden" name="size_letra_precio" value="<?php echo $this->form_encode_input($size_letra_precio) . "\">" . $size_letra_precio . ""; ?>
<?php } else { ?>
<span id="id_read_on_size_letra_precio" class="sc-ui-readonly-size_letra_precio css_size_letra_precio_line" style="<?php echo $sStyleReadLab_size_letra_precio; ?>"><?php echo $this->form_format_readonly("size_letra_precio", $this->form_encode_input($this->size_letra_precio)); ?></span><span id="id_read_off_size_letra_precio" class="css_read_off_size_letra_precio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_size_letra_precio; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_size_letra_precio_obj css_size_letra_precio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_size_letra_precio" type=text name="size_letra_precio" value="<?php echo $this->form_encode_input($size_letra_precio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['size_letra_precio']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['size_letra_precio']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['size_letra_precio']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_size_letra_precio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_size_letra_precio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['size_letra_perso1']))
    {
        $this->nm_new_label['size_letra_perso1'] = "Size Letra Perso 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $size_letra_perso1 = $this->size_letra_perso1;
   $sStyleHidden_size_letra_perso1 = '';
   if (isset($this->nmgp_cmp_hidden['size_letra_perso1']) && $this->nmgp_cmp_hidden['size_letra_perso1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['size_letra_perso1']);
       $sStyleHidden_size_letra_perso1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_size_letra_perso1 = 'display: none;';
   $sStyleReadInp_size_letra_perso1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['size_letra_perso1']) && $this->nmgp_cmp_readonly['size_letra_perso1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['size_letra_perso1']);
       $sStyleReadLab_size_letra_perso1 = '';
       $sStyleReadInp_size_letra_perso1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['size_letra_perso1']) && $this->nmgp_cmp_hidden['size_letra_perso1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="size_letra_perso1" value="<?php echo $this->form_encode_input($size_letra_perso1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_size_letra_perso1_label" id="hidden_field_label_size_letra_perso1" style="<?php echo $sStyleHidden_size_letra_perso1; ?>"><span id="id_label_size_letra_perso1"><?php echo $this->nm_new_label['size_letra_perso1']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso1'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_size_letra_perso1_line" id="hidden_field_data_size_letra_perso1" style="<?php echo $sStyleHidden_size_letra_perso1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_size_letra_perso1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["size_letra_perso1"]) &&  $this->nmgp_cmp_readonly["size_letra_perso1"] == "on") { 

 ?>
<input type="hidden" name="size_letra_perso1" value="<?php echo $this->form_encode_input($size_letra_perso1) . "\">" . $size_letra_perso1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_size_letra_perso1" class="sc-ui-readonly-size_letra_perso1 css_size_letra_perso1_line" style="<?php echo $sStyleReadLab_size_letra_perso1; ?>"><?php echo $this->form_format_readonly("size_letra_perso1", $this->form_encode_input($this->size_letra_perso1)); ?></span><span id="id_read_off_size_letra_perso1" class="css_read_off_size_letra_perso1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_size_letra_perso1; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_size_letra_perso1_obj css_size_letra_perso1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_size_letra_perso1" type=text name="size_letra_perso1" value="<?php echo $this->form_encode_input($size_letra_perso1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['size_letra_perso1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['size_letra_perso1']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['size_letra_perso1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_size_letra_perso1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_size_letra_perso1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['size_letra_perso2']))
    {
        $this->nm_new_label['size_letra_perso2'] = "Size Letra Perso 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $size_letra_perso2 = $this->size_letra_perso2;
   $sStyleHidden_size_letra_perso2 = '';
   if (isset($this->nmgp_cmp_hidden['size_letra_perso2']) && $this->nmgp_cmp_hidden['size_letra_perso2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['size_letra_perso2']);
       $sStyleHidden_size_letra_perso2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_size_letra_perso2 = 'display: none;';
   $sStyleReadInp_size_letra_perso2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['size_letra_perso2']) && $this->nmgp_cmp_readonly['size_letra_perso2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['size_letra_perso2']);
       $sStyleReadLab_size_letra_perso2 = '';
       $sStyleReadInp_size_letra_perso2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['size_letra_perso2']) && $this->nmgp_cmp_hidden['size_letra_perso2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="size_letra_perso2" value="<?php echo $this->form_encode_input($size_letra_perso2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_size_letra_perso2_label" id="hidden_field_label_size_letra_perso2" style="<?php echo $sStyleHidden_size_letra_perso2; ?>"><span id="id_label_size_letra_perso2"><?php echo $this->nm_new_label['size_letra_perso2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_size_letra_perso2_line" id="hidden_field_data_size_letra_perso2" style="<?php echo $sStyleHidden_size_letra_perso2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_size_letra_perso2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["size_letra_perso2"]) &&  $this->nmgp_cmp_readonly["size_letra_perso2"] == "on") { 

 ?>
<input type="hidden" name="size_letra_perso2" value="<?php echo $this->form_encode_input($size_letra_perso2) . "\">" . $size_letra_perso2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_size_letra_perso2" class="sc-ui-readonly-size_letra_perso2 css_size_letra_perso2_line" style="<?php echo $sStyleReadLab_size_letra_perso2; ?>"><?php echo $this->form_format_readonly("size_letra_perso2", $this->form_encode_input($this->size_letra_perso2)); ?></span><span id="id_read_off_size_letra_perso2" class="css_read_off_size_letra_perso2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_size_letra_perso2; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_size_letra_perso2_obj css_size_letra_perso2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_size_letra_perso2" type=text name="size_letra_perso2" value="<?php echo $this->form_encode_input($size_letra_perso2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['size_letra_perso2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['size_letra_perso2']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['size_letra_perso2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_size_letra_perso2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_size_letra_perso2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['size_letra_perso3']))
    {
        $this->nm_new_label['size_letra_perso3'] = "Size Letra Perso 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $size_letra_perso3 = $this->size_letra_perso3;
   $sStyleHidden_size_letra_perso3 = '';
   if (isset($this->nmgp_cmp_hidden['size_letra_perso3']) && $this->nmgp_cmp_hidden['size_letra_perso3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['size_letra_perso3']);
       $sStyleHidden_size_letra_perso3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_size_letra_perso3 = 'display: none;';
   $sStyleReadInp_size_letra_perso3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['size_letra_perso3']) && $this->nmgp_cmp_readonly['size_letra_perso3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['size_letra_perso3']);
       $sStyleReadLab_size_letra_perso3 = '';
       $sStyleReadInp_size_letra_perso3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['size_letra_perso3']) && $this->nmgp_cmp_hidden['size_letra_perso3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="size_letra_perso3" value="<?php echo $this->form_encode_input($size_letra_perso3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_size_letra_perso3_label" id="hidden_field_label_size_letra_perso3" style="<?php echo $sStyleHidden_size_letra_perso3; ?>"><span id="id_label_size_letra_perso3"><?php echo $this->nm_new_label['size_letra_perso3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_size_letra_perso3_line" id="hidden_field_data_size_letra_perso3" style="<?php echo $sStyleHidden_size_letra_perso3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_size_letra_perso3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["size_letra_perso3"]) &&  $this->nmgp_cmp_readonly["size_letra_perso3"] == "on") { 

 ?>
<input type="hidden" name="size_letra_perso3" value="<?php echo $this->form_encode_input($size_letra_perso3) . "\">" . $size_letra_perso3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_size_letra_perso3" class="sc-ui-readonly-size_letra_perso3 css_size_letra_perso3_line" style="<?php echo $sStyleReadLab_size_letra_perso3; ?>"><?php echo $this->form_format_readonly("size_letra_perso3", $this->form_encode_input($this->size_letra_perso3)); ?></span><span id="id_read_off_size_letra_perso3" class="css_read_off_size_letra_perso3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_size_letra_perso3; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_size_letra_perso3_obj css_size_letra_perso3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_size_letra_perso3" type=text name="size_letra_perso3" value="<?php echo $this->form_encode_input($size_letra_perso3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['size_letra_perso3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['size_letra_perso3']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['size_letra_perso3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_size_letra_perso3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_size_letra_perso3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion_codigo']))
    {
        $this->nm_new_label['posicion_codigo'] = "Posicion Codigo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion_codigo = $this->posicion_codigo;
   $sStyleHidden_posicion_codigo = '';
   if (isset($this->nmgp_cmp_hidden['posicion_codigo']) && $this->nmgp_cmp_hidden['posicion_codigo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion_codigo']);
       $sStyleHidden_posicion_codigo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion_codigo = 'display: none;';
   $sStyleReadInp_posicion_codigo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['posicion_codigo']) && $this->nmgp_cmp_readonly['posicion_codigo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion_codigo']);
       $sStyleReadLab_posicion_codigo = '';
       $sStyleReadInp_posicion_codigo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion_codigo']) && $this->nmgp_cmp_hidden['posicion_codigo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_codigo" value="<?php echo $this->form_encode_input($posicion_codigo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_posicion_codigo_label" id="hidden_field_label_posicion_codigo" style="<?php echo $sStyleHidden_posicion_codigo; ?>"><span id="id_label_posicion_codigo"><?php echo $this->nm_new_label['posicion_codigo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_codigo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_posicion_codigo_line" id="hidden_field_data_posicion_codigo" style="<?php echo $sStyleHidden_posicion_codigo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_codigo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_codigo"]) &&  $this->nmgp_cmp_readonly["posicion_codigo"] == "on") { 

 ?>
<input type="hidden" name="posicion_codigo" value="<?php echo $this->form_encode_input($posicion_codigo) . "\">" . $posicion_codigo . ""; ?>
<?php } else { ?>
<span id="id_read_on_posicion_codigo" class="sc-ui-readonly-posicion_codigo css_posicion_codigo_line" style="<?php echo $sStyleReadLab_posicion_codigo; ?>"><?php echo $this->form_format_readonly("posicion_codigo", $this->form_encode_input($this->posicion_codigo)); ?></span><span id="id_read_off_posicion_codigo" class="css_read_off_posicion_codigo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_posicion_codigo; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_posicion_codigo_obj css_posicion_codigo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_codigo" type=text name="posicion_codigo" value="<?php echo $this->form_encode_input($posicion_codigo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['posicion_codigo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['posicion_codigo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['posicion_codigo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_codigo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_codigo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion_descripcion']))
    {
        $this->nm_new_label['posicion_descripcion'] = "Posicion Descripcion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion_descripcion = $this->posicion_descripcion;
   $sStyleHidden_posicion_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['posicion_descripcion']) && $this->nmgp_cmp_hidden['posicion_descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion_descripcion']);
       $sStyleHidden_posicion_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion_descripcion = 'display: none;';
   $sStyleReadInp_posicion_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['posicion_descripcion']) && $this->nmgp_cmp_readonly['posicion_descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion_descripcion']);
       $sStyleReadLab_posicion_descripcion = '';
       $sStyleReadInp_posicion_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion_descripcion']) && $this->nmgp_cmp_hidden['posicion_descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_descripcion" value="<?php echo $this->form_encode_input($posicion_descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_posicion_descripcion_label" id="hidden_field_label_posicion_descripcion" style="<?php echo $sStyleHidden_posicion_descripcion; ?>"><span id="id_label_posicion_descripcion"><?php echo $this->nm_new_label['posicion_descripcion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_descripcion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_posicion_descripcion_line" id="hidden_field_data_posicion_descripcion" style="<?php echo $sStyleHidden_posicion_descripcion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_descripcion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_descripcion"]) &&  $this->nmgp_cmp_readonly["posicion_descripcion"] == "on") { 

 ?>
<input type="hidden" name="posicion_descripcion" value="<?php echo $this->form_encode_input($posicion_descripcion) . "\">" . $posicion_descripcion . ""; ?>
<?php } else { ?>
<span id="id_read_on_posicion_descripcion" class="sc-ui-readonly-posicion_descripcion css_posicion_descripcion_line" style="<?php echo $sStyleReadLab_posicion_descripcion; ?>"><?php echo $this->form_format_readonly("posicion_descripcion", $this->form_encode_input($this->posicion_descripcion)); ?></span><span id="id_read_off_posicion_descripcion" class="css_read_off_posicion_descripcion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_posicion_descripcion; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_posicion_descripcion_obj css_posicion_descripcion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_descripcion" type=text name="posicion_descripcion" value="<?php echo $this->form_encode_input($posicion_descripcion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['posicion_descripcion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['posicion_descripcion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['posicion_descripcion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion_precio']))
    {
        $this->nm_new_label['posicion_precio'] = "Posicion Precio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion_precio = $this->posicion_precio;
   $sStyleHidden_posicion_precio = '';
   if (isset($this->nmgp_cmp_hidden['posicion_precio']) && $this->nmgp_cmp_hidden['posicion_precio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion_precio']);
       $sStyleHidden_posicion_precio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion_precio = 'display: none;';
   $sStyleReadInp_posicion_precio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['posicion_precio']) && $this->nmgp_cmp_readonly['posicion_precio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion_precio']);
       $sStyleReadLab_posicion_precio = '';
       $sStyleReadInp_posicion_precio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion_precio']) && $this->nmgp_cmp_hidden['posicion_precio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_precio" value="<?php echo $this->form_encode_input($posicion_precio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_posicion_precio_label" id="hidden_field_label_posicion_precio" style="<?php echo $sStyleHidden_posicion_precio; ?>"><span id="id_label_posicion_precio"><?php echo $this->nm_new_label['posicion_precio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_precio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_precio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_posicion_precio_line" id="hidden_field_data_posicion_precio" style="<?php echo $sStyleHidden_posicion_precio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_precio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_precio"]) &&  $this->nmgp_cmp_readonly["posicion_precio"] == "on") { 

 ?>
<input type="hidden" name="posicion_precio" value="<?php echo $this->form_encode_input($posicion_precio) . "\">" . $posicion_precio . ""; ?>
<?php } else { ?>
<span id="id_read_on_posicion_precio" class="sc-ui-readonly-posicion_precio css_posicion_precio_line" style="<?php echo $sStyleReadLab_posicion_precio; ?>"><?php echo $this->form_format_readonly("posicion_precio", $this->form_encode_input($this->posicion_precio)); ?></span><span id="id_read_off_posicion_precio" class="css_read_off_posicion_precio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_posicion_precio; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_posicion_precio_obj css_posicion_precio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_precio" type=text name="posicion_precio" value="<?php echo $this->form_encode_input($posicion_precio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['posicion_precio']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['posicion_precio']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['posicion_precio']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_precio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_precio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion_perso1']))
    {
        $this->nm_new_label['posicion_perso1'] = "Posicion Perso 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion_perso1 = $this->posicion_perso1;
   $sStyleHidden_posicion_perso1 = '';
   if (isset($this->nmgp_cmp_hidden['posicion_perso1']) && $this->nmgp_cmp_hidden['posicion_perso1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion_perso1']);
       $sStyleHidden_posicion_perso1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion_perso1 = 'display: none;';
   $sStyleReadInp_posicion_perso1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['posicion_perso1']) && $this->nmgp_cmp_readonly['posicion_perso1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion_perso1']);
       $sStyleReadLab_posicion_perso1 = '';
       $sStyleReadInp_posicion_perso1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion_perso1']) && $this->nmgp_cmp_hidden['posicion_perso1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_perso1" value="<?php echo $this->form_encode_input($posicion_perso1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_posicion_perso1_label" id="hidden_field_label_posicion_perso1" style="<?php echo $sStyleHidden_posicion_perso1; ?>"><span id="id_label_posicion_perso1"><?php echo $this->nm_new_label['posicion_perso1']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso1'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_posicion_perso1_line" id="hidden_field_data_posicion_perso1" style="<?php echo $sStyleHidden_posicion_perso1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_perso1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_perso1"]) &&  $this->nmgp_cmp_readonly["posicion_perso1"] == "on") { 

 ?>
<input type="hidden" name="posicion_perso1" value="<?php echo $this->form_encode_input($posicion_perso1) . "\">" . $posicion_perso1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_posicion_perso1" class="sc-ui-readonly-posicion_perso1 css_posicion_perso1_line" style="<?php echo $sStyleReadLab_posicion_perso1; ?>"><?php echo $this->form_format_readonly("posicion_perso1", $this->form_encode_input($this->posicion_perso1)); ?></span><span id="id_read_off_posicion_perso1" class="css_read_off_posicion_perso1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_posicion_perso1; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_posicion_perso1_obj css_posicion_perso1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_perso1" type=text name="posicion_perso1" value="<?php echo $this->form_encode_input($posicion_perso1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['posicion_perso1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['posicion_perso1']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['posicion_perso1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_perso1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_perso1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion_perso2']))
    {
        $this->nm_new_label['posicion_perso2'] = "Posicion Perso 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion_perso2 = $this->posicion_perso2;
   $sStyleHidden_posicion_perso2 = '';
   if (isset($this->nmgp_cmp_hidden['posicion_perso2']) && $this->nmgp_cmp_hidden['posicion_perso2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion_perso2']);
       $sStyleHidden_posicion_perso2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion_perso2 = 'display: none;';
   $sStyleReadInp_posicion_perso2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['posicion_perso2']) && $this->nmgp_cmp_readonly['posicion_perso2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion_perso2']);
       $sStyleReadLab_posicion_perso2 = '';
       $sStyleReadInp_posicion_perso2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion_perso2']) && $this->nmgp_cmp_hidden['posicion_perso2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_perso2" value="<?php echo $this->form_encode_input($posicion_perso2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_posicion_perso2_label" id="hidden_field_label_posicion_perso2" style="<?php echo $sStyleHidden_posicion_perso2; ?>"><span id="id_label_posicion_perso2"><?php echo $this->nm_new_label['posicion_perso2']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso2'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_posicion_perso2_line" id="hidden_field_data_posicion_perso2" style="<?php echo $sStyleHidden_posicion_perso2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_perso2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_perso2"]) &&  $this->nmgp_cmp_readonly["posicion_perso2"] == "on") { 

 ?>
<input type="hidden" name="posicion_perso2" value="<?php echo $this->form_encode_input($posicion_perso2) . "\">" . $posicion_perso2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_posicion_perso2" class="sc-ui-readonly-posicion_perso2 css_posicion_perso2_line" style="<?php echo $sStyleReadLab_posicion_perso2; ?>"><?php echo $this->form_format_readonly("posicion_perso2", $this->form_encode_input($this->posicion_perso2)); ?></span><span id="id_read_off_posicion_perso2" class="css_read_off_posicion_perso2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_posicion_perso2; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_posicion_perso2_obj css_posicion_perso2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_perso2" type=text name="posicion_perso2" value="<?php echo $this->form_encode_input($posicion_perso2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['posicion_perso2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['posicion_perso2']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['posicion_perso2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_perso2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_perso2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['posicion_perso3']))
    {
        $this->nm_new_label['posicion_perso3'] = "Posicion Perso 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $posicion_perso3 = $this->posicion_perso3;
   $sStyleHidden_posicion_perso3 = '';
   if (isset($this->nmgp_cmp_hidden['posicion_perso3']) && $this->nmgp_cmp_hidden['posicion_perso3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['posicion_perso3']);
       $sStyleHidden_posicion_perso3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_posicion_perso3 = 'display: none;';
   $sStyleReadInp_posicion_perso3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['posicion_perso3']) && $this->nmgp_cmp_readonly['posicion_perso3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['posicion_perso3']);
       $sStyleReadLab_posicion_perso3 = '';
       $sStyleReadInp_posicion_perso3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['posicion_perso3']) && $this->nmgp_cmp_hidden['posicion_perso3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="posicion_perso3" value="<?php echo $this->form_encode_input($posicion_perso3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_posicion_perso3_label" id="hidden_field_label_posicion_perso3" style="<?php echo $sStyleHidden_posicion_perso3; ?>"><span id="id_label_posicion_perso3"><?php echo $this->nm_new_label['posicion_perso3']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso3'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_posicion_perso3_line" id="hidden_field_data_posicion_perso3" style="<?php echo $sStyleHidden_posicion_perso3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_posicion_perso3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posicion_perso3"]) &&  $this->nmgp_cmp_readonly["posicion_perso3"] == "on") { 

 ?>
<input type="hidden" name="posicion_perso3" value="<?php echo $this->form_encode_input($posicion_perso3) . "\">" . $posicion_perso3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_posicion_perso3" class="sc-ui-readonly-posicion_perso3 css_posicion_perso3_line" style="<?php echo $sStyleReadLab_posicion_perso3; ?>"><?php echo $this->form_format_readonly("posicion_perso3", $this->form_encode_input($this->posicion_perso3)); ?></span><span id="id_read_off_posicion_perso3" class="css_read_off_posicion_perso3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_posicion_perso3; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_posicion_perso3_obj css_posicion_perso3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_posicion_perso3" type=text name="posicion_perso3" value="<?php echo $this->form_encode_input($posicion_perso3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['posicion_perso3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['posicion_perso3']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['posicion_perso3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posicion_perso3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posicion_perso3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['alineacion']))
   {
       $this->nm_new_label['alineacion'] = "Alineacion";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alineacion = $this->alineacion;
   $sStyleHidden_alineacion = '';
   if (isset($this->nmgp_cmp_hidden['alineacion']) && $this->nmgp_cmp_hidden['alineacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alineacion']);
       $sStyleHidden_alineacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alineacion = 'display: none;';
   $sStyleReadInp_alineacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alineacion']) && $this->nmgp_cmp_readonly['alineacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alineacion']);
       $sStyleReadLab_alineacion = '';
       $sStyleReadInp_alineacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alineacion']) && $this->nmgp_cmp_hidden['alineacion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="alineacion" value="<?php echo $this->form_encode_input($this->alineacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_alineacion_label" id="hidden_field_label_alineacion" style="<?php echo $sStyleHidden_alineacion; ?>"><span id="id_label_alineacion"><?php echo $this->nm_new_label['alineacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['alineacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['alineacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_alineacion_line" id="hidden_field_data_alineacion" style="<?php echo $sStyleHidden_alineacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_alineacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alineacion"]) &&  $this->nmgp_cmp_readonly["alineacion"] == "on") { 

$alineacion_look = "";
 if ($this->alineacion == "center") { $alineacion_look .= "CENTER" ;} 
 if ($this->alineacion == "left") { $alineacion_look .= "LEFT" ;} 
 if ($this->alineacion == "right") { $alineacion_look .= "RIGHT" ;} 
 if (empty($alineacion_look)) { $alineacion_look = $this->alineacion; }
?>
<input type="hidden" name="alineacion" value="<?php echo $this->form_encode_input($alineacion) . "\">" . $alineacion_look . ""; ?>
<?php } else { ?>
<?php

$alineacion_look = "";
 if ($this->alineacion == "center") { $alineacion_look .= "CENTER" ;} 
 if ($this->alineacion == "left") { $alineacion_look .= "LEFT" ;} 
 if ($this->alineacion == "right") { $alineacion_look .= "RIGHT" ;} 
 if (empty($alineacion_look)) { $alineacion_look = $this->alineacion; }
?>
<span id="id_read_on_alineacion" class="css_alineacion_line"  style="<?php echo $sStyleReadLab_alineacion; ?>"><?php echo $this->form_format_readonly("alineacion", $this->form_encode_input($alineacion_look)); ?></span><span id="id_read_off_alineacion" class="css_read_off_alineacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_alineacion; ?>">
 <span id="idAjaxSelect_alineacion" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_alineacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_alineacion" name="alineacion" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="center" <?php  if ($this->alineacion == "center") { echo " selected" ;} ?>>CENTER</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_alineacion'][] = 'center'; ?>
 <option  value="left" <?php  if ($this->alineacion == "left") { echo " selected" ;} ?>>LEFT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_alineacion'][] = 'left'; ?>
 <option  value="right" <?php  if ($this->alineacion == "right") { echo " selected" ;} ?>>RIGHT</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_alineacion'][] = 'right'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alineacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alineacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['copias']))
    {
        $this->nm_new_label['copias'] = "No Copias";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $copias = $this->copias;
   $sStyleHidden_copias = '';
   if (isset($this->nmgp_cmp_hidden['copias']) && $this->nmgp_cmp_hidden['copias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['copias']);
       $sStyleHidden_copias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_copias = 'display: none;';
   $sStyleReadInp_copias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['copias']) && $this->nmgp_cmp_readonly['copias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['copias']);
       $sStyleReadLab_copias = '';
       $sStyleReadInp_copias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['copias']) && $this->nmgp_cmp_hidden['copias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="copias" value="<?php echo $this->form_encode_input($copias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_copias_label" id="hidden_field_label_copias" style="<?php echo $sStyleHidden_copias; ?>"><span id="id_label_copias"><?php echo $this->nm_new_label['copias']; ?></span></TD>
    <TD class="scFormDataOdd css_copias_line" id="hidden_field_data_copias" style="<?php echo $sStyleHidden_copias; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_copias_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["copias"]) &&  $this->nmgp_cmp_readonly["copias"] == "on") { 

 ?>
<input type="hidden" name="copias" value="<?php echo $this->form_encode_input($copias) . "\">" . $copias . ""; ?>
<?php } else { ?>
<span id="id_read_on_copias" class="sc-ui-readonly-copias css_copias_line" style="<?php echo $sStyleReadLab_copias; ?>"><?php echo $this->form_format_readonly("copias", $this->form_encode_input($this->copias)); ?></span><span id="id_read_off_copias" class="css_read_off_copias<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_copias; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_copias_obj css_copias_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_copias" type=text name="copias" value="<?php echo $this->form_encode_input($copias) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['copias']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['copias']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['copias']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_copias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_copias_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_etiquetas");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_etiquetas");
 parent.scAjaxDetailHeight("form_etiquetas", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_etiquetas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_etiquetas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['buttonStatus'] = $this->nmgp_botoes;
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
