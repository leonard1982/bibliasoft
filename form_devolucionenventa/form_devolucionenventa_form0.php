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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Devolución de Facturas Venta"); } else { echo strip_tags("Devolución de Facturas Venta"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_devolucionenventa/form_devolucionenventa_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_devolucionenventa_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "fecha")
     {
        $('input[name="fecha"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="fecha"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="fecha"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "resolucion")
     {
        $('select[name="resolucion"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="resolucion"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="resolucion"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "numfacven")
     {
        $('select[name="numfacven"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="numfacven"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="numfacven"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "observa")
     {
        $('textarea[name="observa"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('textarea[name="observa"]').addClass("scFormInputDisabled");
        }
        else {
            $('textarea[name="observa"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_devolucionenventa_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('resolucion');

<?php
}
?>
  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("grid_corregir_devoluciones", "600");
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_devolucionenventa_js0.php");
?>
<script type="text/javascript"> 
nmdg_enter_tab = true;
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
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_devolucionenventa'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_devolucionenventa'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Devolución de Facturas Venta"; } else { echo "Devolución de Facturas Venta"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['fast_search'][2] : "";
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numerodev']))
    {
        $this->nm_new_label['numerodev'] = "Devolución";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numerodev = $this->numerodev;
   $sStyleHidden_numerodev = '';
   if (isset($this->nmgp_cmp_hidden['numerodev']) && $this->nmgp_cmp_hidden['numerodev'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numerodev']);
       $sStyleHidden_numerodev = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numerodev = 'display: none;';
   $sStyleReadInp_numerodev = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numerodev']) && $this->nmgp_cmp_readonly['numerodev'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numerodev']);
       $sStyleReadLab_numerodev = '';
       $sStyleReadInp_numerodev = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numerodev']) && $this->nmgp_cmp_hidden['numerodev'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numerodev" value="<?php echo $this->form_encode_input($numerodev) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numerodev_line" id="hidden_field_data_numerodev" style="<?php echo $sStyleHidden_numerodev; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numerodev_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numerodev_label" style=""><span id="id_label_numerodev"><?php echo $this->nm_new_label['numerodev']; ?></span></span><br><input type="hidden" name="numerodev" value="<?php echo $this->form_encode_input($numerodev); ?>"><span id="id_ajax_label_numerodev"><?php echo nl2br($numerodev); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numerodev_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numerodev_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['fecha']))
    {
        $this->nm_new_label['fecha'] = "Fecha Dev.";
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

    <TD class="scFormDataOdd css_fecha_line" id="hidden_field_data_fecha" style="<?php echo $sStyleHidden_fecha; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecha_label" style=""><span id="id_label_fecha"><?php echo $this->nm_new_label['fecha']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['fecha']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['fecha'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
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

 <input class="sc-js-input scFormObjectOdd css_fecha_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha" type=text name="fecha" value="<?php echo $this->form_encode_input($fecha) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha']['date_format']; ?>', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['resolucion']))
   {
       $this->nm_new_label['resolucion'] = "Prefijo Factura";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resolucion = $this->resolucion;
   $sStyleHidden_resolucion = '';
   if (isset($this->nmgp_cmp_hidden['resolucion']) && $this->nmgp_cmp_hidden['resolucion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resolucion']);
       $sStyleHidden_resolucion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resolucion = 'display: none;';
   $sStyleReadInp_resolucion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resolucion']) && $this->nmgp_cmp_readonly['resolucion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resolucion']);
       $sStyleReadLab_resolucion = '';
       $sStyleReadInp_resolucion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resolucion']) && $this->nmgp_cmp_hidden['resolucion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="resolucion" value="<?php echo $this->form_encode_input($this->resolucion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_resolucion_line" id="hidden_field_data_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resolucion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_resolucion_label" style=""><span id="id_label_resolucion"><?php echo $this->nm_new_label['resolucion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['resolucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['resolucion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resolucion"]) &&  $this->nmgp_cmp_readonly["resolucion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion'] = array(); 
    }

   $old_value_numerodev = $this->numerodev;
   $old_value_fecha = $this->fecha;
   $old_value_fechafactura = $this->fechafactura;
   $old_value_vdesc = $this->vdesc;
   $old_value_vparc = $this->vparc;
   $old_value_viva = $this->viva;
   $old_value_vunit = $this->vunit;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numerodev = $this->numerodev;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fechafactura = $this->fechafactura;
   $unformatted_value_vdesc = $this->vdesc;
   $unformatted_value_vparc = $this->vparc;
   $unformatted_value_viva = $this->viva;
   $unformatted_value_vunit = $this->vunit;

   $actualiza_val_str = "''";
   if (!empty($this->actualiza))
   {
       if (is_array($this->actualiza))
       {
           $Tmp_array = $this->actualiza;
       }
       else
       {
           $Tmp_array = explode(";", $this->actualiza);
       }
       $actualiza_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $actualiza_val_str)
          {
             $actualiza_val_str .= ", ";
          }
          $actualiza_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY Idres";

   $this->numerodev = $old_value_numerodev;
   $this->fecha = $old_value_fecha;
   $this->fechafactura = $old_value_fechafactura;
   $this->vdesc = $old_value_vdesc;
   $this->vparc = $old_value_vparc;
   $this->viva = $old_value_viva;
   $this->vunit = $old_value_vunit;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion'][] = $rs->fields[0];
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
   $resolucion_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->resolucion_1))
          {
              foreach ($this->resolucion_1 as $tmp_resolucion)
              {
                  if (trim($tmp_resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="resolucion" value="<?php echo $this->form_encode_input($resolucion) . "\">" . $resolucion_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_resolucion();
   $x = 0 ; 
   $resolucion_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->resolucion_1))
          {
              foreach ($this->resolucion_1 as $tmp_resolucion)
              {
                  if (trim($tmp_resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->resolucion) === trim($cadaselect[1])) { $resolucion_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($resolucion_look))
          {
              $resolucion_look = $this->resolucion;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_resolucion\" class=\"css_resolucion_line\" style=\"" .  $sStyleReadLab_resolucion . "\">" . $this->form_format_readonly("resolucion", $this->form_encode_input($resolucion_look)) . "</span><span id=\"id_read_off_resolucion\" class=\"css_read_off_resolucion" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_resolucion . "\">";
   echo " <span id=\"idAjaxSelect_resolucion\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_resolucion_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_resolucion\" name=\"resolucion\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_resolucion'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Seleccione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->resolucion) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->resolucion)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resolucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resolucion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['numfacven']))
   {
       $this->nm_new_label['numfacven'] = "Factura N°.";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numfacven = $this->numfacven;
   $sStyleHidden_numfacven = '';
   if (isset($this->nmgp_cmp_hidden['numfacven']) && $this->nmgp_cmp_hidden['numfacven'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numfacven']);
       $sStyleHidden_numfacven = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numfacven = 'display: none;';
   $sStyleReadInp_numfacven = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numfacven']) && $this->nmgp_cmp_readonly['numfacven'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numfacven']);
       $sStyleReadLab_numfacven = '';
       $sStyleReadInp_numfacven = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numfacven']) && $this->nmgp_cmp_hidden['numfacven'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="numfacven" value="<?php echo $this->form_encode_input($this->numfacven) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numfacven_line" id="hidden_field_data_numfacven" style="<?php echo $sStyleHidden_numfacven; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numfacven_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numfacven_label" style=""><span id="id_label_numfacven"><?php echo $this->nm_new_label['numfacven']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['numfacven']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['numfacven'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numfacven"]) &&  $this->nmgp_cmp_readonly["numfacven"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven'] = array(); 
}
if ($this->resolucion != "")
{ 
   $this->nm_clear_val("resolucion");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven'] = array(); 
    }

   $old_value_numerodev = $this->numerodev;
   $old_value_fecha = $this->fecha;
   $old_value_fechafactura = $this->fechafactura;
   $old_value_vdesc = $this->vdesc;
   $old_value_vparc = $this->vparc;
   $old_value_viva = $this->viva;
   $old_value_vunit = $this->vunit;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numerodev = $this->numerodev;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fechafactura = $this->fechafactura;
   $unformatted_value_vdesc = $this->vdesc;
   $unformatted_value_vparc = $this->vparc;
   $unformatted_value_viva = $this->viva;
   $unformatted_value_vunit = $this->vunit;

   $nm_comando = "SELECT idfacven, numfacven  FROM facturaven  WHERE resolucion=$this->resolucion ORDER BY numfacven";

   $this->numerodev = $old_value_numerodev;
   $this->fecha = $old_value_fecha;
   $this->fechafactura = $old_value_fechafactura;
   $this->vdesc = $old_value_vdesc;
   $this->vparc = $old_value_vparc;
   $this->viva = $old_value_viva;
   $this->vunit = $old_value_vunit;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_numfacven'][] = $rs->fields[0];
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
   $numfacven_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->numfacven_1))
          {
              foreach ($this->numfacven_1 as $tmp_numfacven)
              {
                  if (trim($tmp_numfacven) === trim($cadaselect[1])) { $numfacven_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->numfacven) === trim($cadaselect[1])) { $numfacven_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="numfacven" value="<?php echo $this->form_encode_input($numfacven) . "\">" . $numfacven_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_numfacven();
   $x = 0 ; 
   $numfacven_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->numfacven_1))
          {
              foreach ($this->numfacven_1 as $tmp_numfacven)
              {
                  if (trim($tmp_numfacven) === trim($cadaselect[1])) { $numfacven_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->numfacven) === trim($cadaselect[1])) { $numfacven_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($numfacven_look))
          {
              $numfacven_look = $this->numfacven;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_numfacven\" class=\"css_numfacven_line\" style=\"" .  $sStyleReadLab_numfacven . "\">" . $this->form_format_readonly("numfacven", $this->form_encode_input($numfacven_look)) . "</span><span id=\"id_read_off_numfacven\" class=\"css_read_off_numfacven" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_numfacven . "\">";
   echo " <span id=\"idAjaxSelect_numfacven\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_numfacven_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_numfacven\" name=\"numfacven\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->numfacven) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->numfacven)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numfacven_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numfacven_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['costopro']))
    {
        $this->nm_new_label['costopro'] = "Confirmar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $costopro = $this->costopro;
   $sStyleHidden_costopro = '';
   if (isset($this->nmgp_cmp_hidden['costopro']) && $this->nmgp_cmp_hidden['costopro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['costopro']);
       $sStyleHidden_costopro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_costopro = 'display: none;';
   $sStyleReadInp_costopro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['costopro']) && $this->nmgp_cmp_readonly['costopro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['costopro']);
       $sStyleReadLab_costopro = '';
       $sStyleReadInp_costopro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['costopro']) && $this->nmgp_cmp_hidden['costopro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="costopro" value="<?php echo $this->form_encode_input($costopro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_costopro_line" id="hidden_field_data_costopro" style="<?php echo $sStyleHidden_costopro; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_costopro_line" style="padding: 0px"><span class="scFormLabelOddFormat css_costopro_label" style=""><span id="id_label_costopro"><?php echo $this->nm_new_label['costopro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["costopro"]) &&  $this->nmgp_cmp_readonly["costopro"] == "on") { 

 ?>
<input type="hidden" name="costopro" value="<?php echo $this->form_encode_input($costopro) . "\">" . $costopro . ""; ?>
<?php } else { ?>
<span id="id_read_on_costopro" class="sc-ui-readonly-costopro css_costopro_line" style="<?php echo $sStyleReadLab_costopro; ?>"><?php echo $this->form_format_readonly("costopro", $this->form_encode_input($this->costopro)); ?></span><span id="id_read_off_costopro" class="css_read_off_costopro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_costopro; ?>">
 <input class="sc-js-input scFormObjectOdd css_costopro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_costopro" type=text name="costopro" value="<?php echo $this->form_encode_input($costopro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_costopro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_costopro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_numerodev_dumb = ('' == $sStyleHidden_numerodev) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numerodev_dumb" style="<?php echo $sStyleHidden_numerodev_dumb; ?>"></TD>
<?php $sStyleHidden_fecha_dumb = ('' == $sStyleHidden_fecha) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fecha_dumb" style="<?php echo $sStyleHidden_fecha_dumb; ?>"></TD>
<?php $sStyleHidden_resolucion_dumb = ('' == $sStyleHidden_resolucion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_resolucion_dumb" style="<?php echo $sStyleHidden_resolucion_dumb; ?>"></TD>
<?php $sStyleHidden_numfacven_dumb = ('' == $sStyleHidden_numfacven) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numfacven_dumb" style="<?php echo $sStyleHidden_numfacven_dumb; ?>"></TD>
<?php $sStyleHidden_costopro_dumb = ('' == $sStyleHidden_costopro) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_costopro_dumb" style="<?php echo $sStyleHidden_costopro_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechafactura']))
    {
        $this->nm_new_label['fechafactura'] = "Fecha de la factura";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechafactura = $this->fechafactura;
   $sStyleHidden_fechafactura = '';
   if (isset($this->nmgp_cmp_hidden['fechafactura']) && $this->nmgp_cmp_hidden['fechafactura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechafactura']);
       $sStyleHidden_fechafactura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechafactura = 'display: none;';
   $sStyleReadInp_fechafactura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechafactura']) && $this->nmgp_cmp_readonly['fechafactura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechafactura']);
       $sStyleReadLab_fechafactura = '';
       $sStyleReadInp_fechafactura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechafactura']) && $this->nmgp_cmp_hidden['fechafactura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechafactura" value="<?php echo $this->form_encode_input($fechafactura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechafactura_line" id="hidden_field_data_fechafactura" style="<?php echo $sStyleHidden_fechafactura; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechafactura_line" style="padding: 0px"><span class="scFormLabelOddFormat css_fechafactura_label" style=""><span id="id_label_fechafactura"><?php echo $this->nm_new_label['fechafactura']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['fechafactura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['fechafactura'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="fechafactura" value="<?php echo $this->form_encode_input($fechafactura); ?>"><span id="id_ajax_label_fechafactura"><?php echo nl2br($fechafactura); ?></span>
<?php
$tmp_form_data = $this->field_config['fechafactura']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechafactura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechafactura_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="4" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_fechafactura_dumb = ('' == $sStyleHidden_fechafactura) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_fechafactura_dumb" style="<?php echo $sStyleHidden_fechafactura_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['vdesc']))
    {
        $this->nm_new_label['vdesc'] = "Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vdesc = $this->vdesc;
   $sStyleHidden_vdesc = '';
   if (isset($this->nmgp_cmp_hidden['vdesc']) && $this->nmgp_cmp_hidden['vdesc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vdesc']);
       $sStyleHidden_vdesc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vdesc = 'display: none;';
   $sStyleReadInp_vdesc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vdesc']) && $this->nmgp_cmp_readonly['vdesc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vdesc']);
       $sStyleReadLab_vdesc = '';
       $sStyleReadInp_vdesc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vdesc']) && $this->nmgp_cmp_hidden['vdesc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vdesc" value="<?php echo $this->form_encode_input($vdesc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vdesc_line" id="hidden_field_data_vdesc" style="<?php echo $sStyleHidden_vdesc; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vdesc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vdesc_label" style=""><span id="id_label_vdesc"><?php echo $this->nm_new_label['vdesc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['vdesc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['vdesc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="vdesc" value="<?php echo $this->form_encode_input($vdesc); ?>"><span id="id_ajax_label_vdesc"><?php echo nl2br($vdesc); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vdesc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vdesc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vparc']))
    {
        $this->nm_new_label['vparc'] = "Subtotal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vparc = $this->vparc;
   $sStyleHidden_vparc = '';
   if (isset($this->nmgp_cmp_hidden['vparc']) && $this->nmgp_cmp_hidden['vparc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vparc']);
       $sStyleHidden_vparc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vparc = 'display: none;';
   $sStyleReadInp_vparc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vparc']) && $this->nmgp_cmp_readonly['vparc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vparc']);
       $sStyleReadLab_vparc = '';
       $sStyleReadInp_vparc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vparc']) && $this->nmgp_cmp_hidden['vparc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vparc" value="<?php echo $this->form_encode_input($vparc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vparc_line" id="hidden_field_data_vparc" style="<?php echo $sStyleHidden_vparc; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vparc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vparc_label" style=""><span id="id_label_vparc"><?php echo $this->nm_new_label['vparc']; ?></span></span><br><input type="hidden" name="vparc" value="<?php echo $this->form_encode_input($vparc); ?>"><span id="id_ajax_label_vparc"><?php echo nl2br($vparc); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vparc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vparc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['viva']))
    {
        $this->nm_new_label['viva'] = "Total IVA";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $viva = $this->viva;
   $sStyleHidden_viva = '';
   if (isset($this->nmgp_cmp_hidden['viva']) && $this->nmgp_cmp_hidden['viva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['viva']);
       $sStyleHidden_viva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_viva = 'display: none;';
   $sStyleReadInp_viva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['viva']) && $this->nmgp_cmp_readonly['viva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['viva']);
       $sStyleReadLab_viva = '';
       $sStyleReadInp_viva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['viva']) && $this->nmgp_cmp_hidden['viva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="viva" value="<?php echo $this->form_encode_input($viva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_viva_line" id="hidden_field_data_viva" style="<?php echo $sStyleHidden_viva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_viva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_viva_label" style=""><span id="id_label_viva"><?php echo $this->nm_new_label['viva']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['viva']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['viva'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br><input type="hidden" name="viva" value="<?php echo $this->form_encode_input($viva); ?>"><span id="id_ajax_label_viva"><?php echo nl2br($viva); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_viva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_viva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vunit']))
    {
        $this->nm_new_label['vunit'] = "Valor total dev";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vunit = $this->vunit;
   $sStyleHidden_vunit = '';
   if (isset($this->nmgp_cmp_hidden['vunit']) && $this->nmgp_cmp_hidden['vunit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vunit']);
       $sStyleHidden_vunit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vunit = 'display: none;';
   $sStyleReadInp_vunit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vunit']) && $this->nmgp_cmp_readonly['vunit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vunit']);
       $sStyleReadLab_vunit = '';
       $sStyleReadInp_vunit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vunit']) && $this->nmgp_cmp_hidden['vunit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vunit" value="<?php echo $this->form_encode_input($vunit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vunit_line" id="hidden_field_data_vunit" style="<?php echo $sStyleHidden_vunit; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vunit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vunit_label" style=""><span id="id_label_vunit"><?php echo $this->nm_new_label['vunit']; ?></span></span><br><input type="hidden" name="vunit" value="<?php echo $this->form_encode_input($vunit); ?>"><span id="id_ajax_label_vunit"><?php echo nl2br($vunit); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vunit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vunit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observa']))
    {
        $this->nm_new_label['observa'] = "Observaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observa = $this->observa;
   $sStyleHidden_observa = '';
   if (isset($this->nmgp_cmp_hidden['observa']) && $this->nmgp_cmp_hidden['observa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observa']);
       $sStyleHidden_observa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observa = 'display: none;';
   $sStyleReadInp_observa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observa']) && $this->nmgp_cmp_readonly['observa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observa']);
       $sStyleReadLab_observa = '';
       $sStyleReadInp_observa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observa']) && $this->nmgp_cmp_hidden['observa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observa" value="<?php echo $this->form_encode_input($observa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_observa_line" id="hidden_field_data_observa" style="<?php echo $sStyleHidden_observa; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observa_label" style=""><span id="id_label_observa"><?php echo $this->nm_new_label['observa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['observa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['php_cmp_required']['observa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$observa_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observa));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observa"]) &&  $this->nmgp_cmp_readonly["observa"] == "on") { 

 ?>
<input type="hidden" name="observa" value="<?php echo $this->form_encode_input($observa) . "\">" . $observa_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observa" class="sc-ui-readonly-observa css_observa_line" style="<?php echo $sStyleReadLab_observa; ?>"><?php echo $this->form_format_readonly("observa", $this->form_encode_input($observa_val)); ?></span><span id="id_read_off_observa" class="css_read_off_observa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observa; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observa" id="id_sc_field_observa" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Motivo de la devolución', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observa; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['actualiza']))
   {
       $this->nm_new_label['actualiza'] = "Hacer Click después de eliminar items";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $actualiza = $this->actualiza;
   $sStyleHidden_actualiza = '';
   if (isset($this->nmgp_cmp_hidden['actualiza']) && $this->nmgp_cmp_hidden['actualiza'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['actualiza']);
       $sStyleHidden_actualiza = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_actualiza = 'display: none;';
   $sStyleReadInp_actualiza = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['actualiza']) && $this->nmgp_cmp_readonly['actualiza'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['actualiza']);
       $sStyleReadLab_actualiza = '';
       $sStyleReadInp_actualiza = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['actualiza']) && $this->nmgp_cmp_hidden['actualiza'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="actualiza" value="<?php echo $this->form_encode_input($this->actualiza) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->actualiza_1 = explode(";", trim($this->actualiza));
  } 
  else
  {
      if (empty($this->actualiza))
      {
          $this->actualiza_1= array(); 
          $this->actualiza= "";
      } 
      else
      {
          $this->actualiza_1= $this->actualiza; 
          $this->actualiza= ""; 
          foreach ($this->actualiza_1 as $cada_actualiza)
          {
             if (!empty($actualiza))
             {
                 $this->actualiza.= ";"; 
             } 
             $this->actualiza.= $cada_actualiza; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_actualiza_line" id="hidden_field_data_actualiza" style="<?php echo $sStyleHidden_actualiza; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_actualiza_line" style="padding: 0px"><span class="scFormLabelOddFormat css_actualiza_label" style=""><span id="id_label_actualiza"><?php echo $this->nm_new_label['actualiza']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["actualiza"]) &&  $this->nmgp_cmp_readonly["actualiza"] == "on") { 

$actualiza_look = "";
 if ($this->actualiza == "NULL") { $actualiza_look .= "Actualizar $$" ;} 
 if (empty($actualiza_look)) { $actualiza_look = $this->actualiza; }
?>
<input type="hidden" name="actualiza" value="<?php echo $this->form_encode_input($actualiza) . "\">" . $actualiza_look . ""; ?>
<?php } else { ?>

<?php

$actualiza_look = "";
 if ($this->actualiza == "NULL") { $actualiza_look .= "Actualizar $$" ;} 
 if (empty($actualiza_look)) { $actualiza_look = $this->actualiza; }
?>
<span id="id_read_on_actualiza" class="css_actualiza_line" style="<?php echo $sStyleReadLab_actualiza; ?>"><?php echo $this->form_format_readonly("actualiza", $this->form_encode_input($actualiza_look)); ?></span><span id="id_read_off_actualiza" class="css_read_off_actualiza css_actualiza_line" style="<?php echo $sStyleReadInp_actualiza; ?>"><?php echo "<div id=\"idAjaxCheckbox_actualiza\" style=\"display: inline-block\" class=\"css_actualiza_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_actualiza_line"><?php $tempOptionId = "id-opt-actualiza" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-actualiza sc-ui-checkbox-actualiza sc-js-input" name="actualiza[]" value="NULL"
 alt="{type: 'checkbox', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lookup_actualiza'][] = 'NULL'; ?>
<?php  if (in_array("NULL", $this->actualiza_1))  { echo " checked" ;} ?> onClick="do_ajax_form_devolucionenventa_event_actualiza_onclick();" ><label for="<?php echo $tempOptionId ?>">Actualizar $$</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_actualiza_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_actualiza_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_actualiza_dumb = ('' == $sStyleHidden_actualiza) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_actualiza_dumb" style="<?php echo $sStyleHidden_actualiza_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['detalle']))
    {
        $this->nm_new_label['detalle'] = "detalle";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle = $this->detalle;
   $sStyleHidden_detalle = '';
   if (isset($this->nmgp_cmp_hidden['detalle']) && $this->nmgp_cmp_hidden['detalle'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle']);
       $sStyleHidden_detalle = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle = 'display: none;';
   $sStyleReadInp_detalle = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle']) && $this->nmgp_cmp_readonly['detalle'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle']);
       $sStyleReadLab_detalle = '';
       $sStyleReadInp_detalle = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle']) && $this->nmgp_cmp_hidden['detalle'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle" value="<?php echo $this->form_encode_input($detalle) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_line" id="hidden_field_data_detalle" style="<?php echo $sStyleHidden_detalle; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init'] ]['grid_corregir_devoluciones']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init'] ]['grid_corregir_devoluciones']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init'] ]['grid_corregir_devoluciones']['embutida_pai']        = "form_devolucionenventa";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init'] ]['grid_corregir_devoluciones']['embutida_form_parms'] = "idfac*scin" . $this->nmgp_dados_form['numfacven'] . "*scoutpar_numerodev*scin" . $this->nmgp_dados_form['numerodev'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
 if (isset($this->Ini->sc_lig_md5["grid_corregir_devoluciones"]) && $this->Ini->sc_lig_md5["grid_corregir_devoluciones"] == "S") {
     $Parms_Lig  = "idfac*scin" . $this->nmgp_dados_form['numfacven'] . "*scoutpar_numerodev*scin" . $this->nmgp_dados_form['numerodev'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_devolucionenventa@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "idfac*scin" . $this->nmgp_dados_form['numfacven'] . "*scoutpar_numerodev*scin" . $this->nmgp_dados_form['numerodev'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_devolucionenventa_empty.htm' : $this->Ini->link_grid_corregir_devoluciones_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=600' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle']) && 'nmsc_iframe_liga_grid_corregir_devoluciones' != $this->Ini->sc_lig_target['C_@scinf_detalle'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['grid_corregir_devoluciones_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detalle'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_corregir_devoluciones"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="600" width="1200" name="nmsc_iframe_liga_grid_corregir_devoluciones"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['birpara'];
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
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['back'];
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
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_devolucionenventa");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_devolucionenventa");
 parent.scAjaxDetailHeight("form_devolucionenventa", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_devolucionenventa", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_devolucionenventa", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['sc_modal'])
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
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-9").length && $("#sc_b_ini_b.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-10").length && $("#sc_b_ret_b.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-11").length && $("#sc_b_avc_b.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-12").length && $("#sc_b_fim_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-12").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devolucionenventa']['buttonStatus'] = $this->nmgp_botoes;
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
