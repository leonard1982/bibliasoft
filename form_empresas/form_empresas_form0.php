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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Gestionar Empresas"); } else { echo strip_tags("Gestionar Empresas"); } ?></TITLE>
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
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_actualizada button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_empresas/form_empresas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_empresas_sajax_js.php");
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
<?php

include_once('form_empresas_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_empresas_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_empresas'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_empresas'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['maximized']))
  {
?>
<tr><td>
   <TABLE width="100%" class="scFormHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR valign="middle">
        <TD align="left" rowspan="3" class="scFormHeaderFont">
          <?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__companies.png';echo '<IMG SRC="scriptcase__NM__ico__NM__companies.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__companies.png';}?>" BORDER="0"/>
        </TD>
        <TD align="left" class="scFormHeaderFont">
          <?php if ($this->nmgp_opcao == "novo") { echo "Gestionar Empresas"; } else { echo "Gestionar Empresas"; } ?>
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
          <?php echo date($this->dateDefaultFormat()); ?>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['fast_search'][2] : "";
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
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idempresa']))
   {
       $this->nmgp_cmp_hidden['idempresa'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nombre']))
   {
       $this->nmgp_cmp_hidden['nombre'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['observaciones']))
   {
       $this->nmgp_cmp_hidden['observaciones'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idempresa']))
           {
               $this->nmgp_cmp_readonly['idempresa'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idempresa']))
    {
        $this->nm_new_label['idempresa'] = "Id";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idempresa = $this->idempresa;
   if (!isset($this->nmgp_cmp_hidden['idempresa']))
   {
       $this->nmgp_cmp_hidden['idempresa'] = 'off';
   }
   $sStyleHidden_idempresa = '';
   if (isset($this->nmgp_cmp_hidden['idempresa']) && $this->nmgp_cmp_hidden['idempresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idempresa']);
       $sStyleHidden_idempresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idempresa = 'display: none;';
   $sStyleReadInp_idempresa = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idempresa"]) &&  $this->nmgp_cmp_readonly["idempresa"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idempresa']);
       $sStyleReadLab_idempresa = '';
       $sStyleReadInp_idempresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idempresa']) && $this->nmgp_cmp_hidden['idempresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idempresa" value="<?php echo $this->form_encode_input($idempresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idempresa_label" id="hidden_field_label_idempresa" style="<?php echo $sStyleHidden_idempresa; ?>"><span id="id_label_idempresa"><?php echo $this->nm_new_label['idempresa']; ?></span></TD>
    <TD class="scFormDataOdd css_idempresa_line" id="hidden_field_data_idempresa" style="<?php echo $sStyleHidden_idempresa; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idempresa_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idempresa" class="css_idempresa_line" style="<?php echo $sStyleReadLab_idempresa; ?>"><?php echo $this->form_format_readonly("idempresa", $this->form_encode_input($this->idempresa)); ?></span><span id="id_read_off_idempresa" class="css_read_off_idempresa" style="<?php echo $sStyleReadInp_idempresa; ?>"><input type="hidden" name="idempresa" value="<?php echo $this->form_encode_input($idempresa) . "\">"?><span id="id_ajax_label_idempresa"><?php echo nl2br($idempresa); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idempresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idempresa_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['nit']))
    {
        $this->nm_new_label['nit'] = "CC/NIT";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nit = $this->nit;
   $sStyleHidden_nit = '';
   if (isset($this->nmgp_cmp_hidden['nit']) && $this->nmgp_cmp_hidden['nit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nit']);
       $sStyleHidden_nit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nit = 'display: none;';
   $sStyleReadInp_nit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nit']) && $this->nmgp_cmp_readonly['nit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nit']);
       $sStyleReadLab_nit = '';
       $sStyleReadInp_nit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nit']) && $this->nmgp_cmp_hidden['nit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nit" value="<?php echo $this->form_encode_input($nit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nit_label" id="hidden_field_label_nit" style="<?php echo $sStyleHidden_nit; ?>"><span id="id_label_nit"><?php echo $this->nm_new_label['nit']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['nit']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['nit'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nit_line" id="hidden_field_data_nit" style="<?php echo $sStyleHidden_nit; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nit_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nit"]) &&  $this->nmgp_cmp_readonly["nit"] == "on") { 

 ?>
<input type="hidden" name="nit" value="<?php echo $this->form_encode_input($nit) . "\">" . $nit . ""; ?>
<?php } else { ?>
<span id="id_read_on_nit" class="sc-ui-readonly-nit css_nit_line" style="<?php echo $sStyleReadLab_nit; ?>"><?php echo $this->form_format_readonly("nit", $this->form_encode_input($this->nit)); ?></span><span id="id_read_off_nit" class="css_read_off_nit<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nit; ?>">
 <input class="sc-js-input scFormObjectOdd css_nit_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nit" type=text name="nit" value="<?php echo $this->form_encode_input($nit) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=14"; } ?> maxlength=14 alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nit_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre']))
    {
        $this->nm_new_label['nombre'] = "Nombre Archivo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre = $this->nombre;
   if (!isset($this->nmgp_cmp_hidden['nombre']))
   {
       $this->nmgp_cmp_hidden['nombre'] = 'off';
   }
   $sStyleHidden_nombre = '';
   if (isset($this->nmgp_cmp_hidden['nombre']) && $this->nmgp_cmp_hidden['nombre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre']);
       $sStyleHidden_nombre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre = 'display: none;';
   $sStyleReadInp_nombre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre']) && $this->nmgp_cmp_readonly['nombre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre']);
       $sStyleReadLab_nombre = '';
       $sStyleReadInp_nombre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre']) && $this->nmgp_cmp_hidden['nombre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre" value="<?php echo $this->form_encode_input($nombre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_label" id="hidden_field_label_nombre" style="<?php echo $sStyleHidden_nombre; ?>"><span id="id_label_nombre"><?php echo $this->nm_new_label['nombre']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_line" id="hidden_field_data_nombre" style="<?php echo $sStyleHidden_nombre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="nombre" value="<?php echo $this->form_encode_input($nombre); ?>"><span id="id_ajax_label_nombre"><?php echo nl2br($nombre); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_empresa']))
    {
        $this->nm_new_label['nombre_empresa'] = "Nombre Empresa (BD)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_empresa = $this->nombre_empresa;
   $sStyleHidden_nombre_empresa = '';
   if (isset($this->nmgp_cmp_hidden['nombre_empresa']) && $this->nmgp_cmp_hidden['nombre_empresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_empresa']);
       $sStyleHidden_nombre_empresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_empresa = 'display: none;';
   $sStyleReadInp_nombre_empresa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_empresa']) && $this->nmgp_cmp_readonly['nombre_empresa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_empresa']);
       $sStyleReadLab_nombre_empresa = '';
       $sStyleReadInp_nombre_empresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_empresa']) && $this->nmgp_cmp_hidden['nombre_empresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_empresa" value="<?php echo $this->form_encode_input($nombre_empresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_empresa_label" id="hidden_field_label_nombre_empresa" style="<?php echo $sStyleHidden_nombre_empresa; ?>"><span id="id_label_nombre_empresa"><?php echo $this->nm_new_label['nombre_empresa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['nombre_empresa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['nombre_empresa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nombre_empresa_line" id="hidden_field_data_nombre_empresa" style="<?php echo $sStyleHidden_nombre_empresa; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_empresa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_empresa"]) &&  $this->nmgp_cmp_readonly["nombre_empresa"] == "on") { 

 ?>
<input type="hidden" name="nombre_empresa" value="<?php echo $this->form_encode_input($nombre_empresa) . "\">" . $nombre_empresa . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_empresa" class="sc-ui-readonly-nombre_empresa css_nombre_empresa_line" style="<?php echo $sStyleReadLab_nombre_empresa; ?>"><?php echo $this->form_format_readonly("nombre_empresa", $this->form_encode_input($this->nombre_empresa)); ?></span><span id="id_read_off_nombre_empresa" class="css_read_off_nombre_empresa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_empresa; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_empresa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_empresa" type=text name="nombre_empresa" value="<?php echo $this->form_encode_input($nombre_empresa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz ") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('nombre_empresa')", "nm_mostra_mens('nombre_empresa')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_empresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_empresa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['observaciones']))
    {
        $this->nm_new_label['observaciones'] = "Observaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $observaciones = $this->observaciones;
   if (!isset($this->nmgp_cmp_hidden['observaciones']))
   {
       $this->nmgp_cmp_hidden['observaciones'] = 'off';
   }
   $sStyleHidden_observaciones = '';
   if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['observaciones']);
       $sStyleHidden_observaciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_observaciones = 'display: none;';
   $sStyleReadInp_observaciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['observaciones']) && $this->nmgp_cmp_readonly['observaciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['observaciones']);
       $sStyleReadLab_observaciones = '';
       $sStyleReadInp_observaciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['observaciones']) && $this->nmgp_cmp_hidden['observaciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_observaciones_label" id="hidden_field_label_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></TD>
    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px">
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="2" cols="30"
 alt="{datatype: 'text', maxLength: 500, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['creada']))
    {
        $this->nm_new_label['creada'] = "Creada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $creada = $this->creada;
   $creada_hora = $this->creada_hora;
   $guarda_datahora = $this->field_config['creada']['date_format'];
   $this->field_config['creada']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
   $sStyleHidden_creada = '';
   if (isset($this->nmgp_cmp_hidden['creada']) && $this->nmgp_cmp_hidden['creada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['creada']);
       $sStyleHidden_creada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_creada = 'display: none;';
   $sStyleReadInp_creada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['creada']) && $this->nmgp_cmp_readonly['creada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['creada']);
       $sStyleReadLab_creada = '';
       $sStyleReadInp_creada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['creada']) && $this->nmgp_cmp_hidden['creada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="creada" value="<?php echo $this->form_encode_input($creada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_creada_hora_label" id="hidden_field_label_creada" style="<?php echo $sStyleHidden_creada; ?>"><span id="id_label_creada"><?php echo $this->nm_new_label['creada']; ?></span></TD>
    <TD class="scFormDataOdd css_creada_hora_line" id="hidden_field_data_creada" style="<?php echo $sStyleHidden_creada; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_creada_hora_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="creada" value="<?php echo $this->form_encode_input($creada); ?>"><span id="id_ajax_label_creada"><?php echo nl2br($creada); ?></span>
<?php
$tmp_form_data = $this->field_config['creada']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

<input type="hidden" name="creada_hora" value="<?php echo $this->form_encode_input($creada_hora); ?>"><span id="id_ajax_label_creada_hora"><?php echo nl2br($creada_hora); ?></span>
<?php
$tmp_form_data = $this->field_config['creada_hora']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_creada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_creada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sinmovimiento']))
   {
       $this->nm_new_label['sinmovimiento'] = "Sin movimientos";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sinmovimiento = $this->sinmovimiento;
   $sStyleHidden_sinmovimiento = '';
   if (isset($this->nmgp_cmp_hidden['sinmovimiento']) && $this->nmgp_cmp_hidden['sinmovimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sinmovimiento']);
       $sStyleHidden_sinmovimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sinmovimiento = 'display: none;';
   $sStyleReadInp_sinmovimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sinmovimiento']) && $this->nmgp_cmp_readonly['sinmovimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sinmovimiento']);
       $sStyleReadLab_sinmovimiento = '';
       $sStyleReadInp_sinmovimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sinmovimiento']) && $this->nmgp_cmp_hidden['sinmovimiento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sinmovimiento" value="<?php echo $this->form_encode_input($this->sinmovimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->sinmovimiento_1 = explode(";", trim($this->sinmovimiento));
  } 
  else
  {
      if (empty($this->sinmovimiento))
      {
          $this->sinmovimiento_1= array(); 
          $this->sinmovimiento= "NO";
      } 
      else
      {
          $this->sinmovimiento_1= $this->sinmovimiento; 
          $this->sinmovimiento= ""; 
          foreach ($this->sinmovimiento_1 as $cada_sinmovimiento)
          {
             if (!empty($sinmovimiento))
             {
                 $this->sinmovimiento.= ";"; 
             } 
             $this->sinmovimiento.= $cada_sinmovimiento; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sinmovimiento_label" id="hidden_field_label_sinmovimiento" style="<?php echo $sStyleHidden_sinmovimiento; ?>"><span id="id_label_sinmovimiento"><?php echo $this->nm_new_label['sinmovimiento']; ?></span></TD>
    <TD class="scFormDataOdd css_sinmovimiento_line" id="hidden_field_data_sinmovimiento" style="<?php echo $sStyleHidden_sinmovimiento; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sinmovimiento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sinmovimiento"]) &&  $this->nmgp_cmp_readonly["sinmovimiento"] == "on") { 

$sinmovimiento_look = "";
 if ($this->sinmovimiento == "SI") { $sinmovimiento_look .= "" ;} 
 if (empty($sinmovimiento_look)) { $sinmovimiento_look = $this->sinmovimiento; }
?>
<input type="hidden" name="sinmovimiento" value="<?php echo $this->form_encode_input($sinmovimiento) . "\">" . $sinmovimiento_look . ""; ?>
<?php } else { ?>

<?php

$sinmovimiento_look = "";
 if ($this->sinmovimiento == "SI") { $sinmovimiento_look .= "" ;} 
 if (empty($sinmovimiento_look)) { $sinmovimiento_look = $this->sinmovimiento; }
?>
<span id="id_read_on_sinmovimiento" class="css_sinmovimiento_line" style="<?php echo $sStyleReadLab_sinmovimiento; ?>"><?php echo $this->form_format_readonly("sinmovimiento", $this->form_encode_input($sinmovimiento_look)); ?></span><span id="id_read_off_sinmovimiento" class="css_read_off_sinmovimiento css_sinmovimiento_line" style="<?php echo $sStyleReadInp_sinmovimiento; ?>"><?php echo "<div id=\"idAjaxCheckbox_sinmovimiento\" style=\"display: inline-block\" class=\"css_sinmovimiento_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_sinmovimiento_line"><?php $tempOptionId = "id-opt-sinmovimiento" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-sinmovimiento sc-ui-checkbox-sinmovimiento" name="sinmovimiento[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_sinmovimiento'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->sinmovimiento_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sinmovimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sinmovimiento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['copiada_como']))
   {
       $this->nm_new_label['copiada_como'] = " Copiada como";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $copiada_como = $this->copiada_como;
   $sStyleHidden_copiada_como = '';
   if (isset($this->nmgp_cmp_hidden['copiada_como']) && $this->nmgp_cmp_hidden['copiada_como'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['copiada_como']);
       $sStyleHidden_copiada_como = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_copiada_como = 'display: none;';
   $sStyleReadInp_copiada_como = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['copiada_como']) && $this->nmgp_cmp_readonly['copiada_como'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['copiada_como']);
       $sStyleReadLab_copiada_como = '';
       $sStyleReadInp_copiada_como = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['copiada_como']) && $this->nmgp_cmp_hidden['copiada_como'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="copiada_como" value="<?php echo $this->form_encode_input($this->copiada_como) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_copiada_como_label" id="hidden_field_label_copiada_como" style="<?php echo $sStyleHidden_copiada_como; ?>"><span id="id_label_copiada_como"><?php echo $this->nm_new_label['copiada_como']; ?></span></TD>
    <TD class="scFormDataOdd css_copiada_como_line" id="hidden_field_data_copiada_como" style="<?php echo $sStyleHidden_copiada_como; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_copiada_como_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["copiada_como"]) &&  $this->nmgp_cmp_readonly["copiada_como"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como'] = array(); 
    }

   $old_value_idempresa = $this->idempresa;
   $old_value_creada = $this->creada;
   $old_value_creada_hora = $this->creada_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idempresa = $this->idempresa;
   $unformatted_value_creada = $this->creada;
   $unformatted_value_creada_hora = $this->creada_hora;

   $sinmovimiento_val_str = "''";
   if (!empty($this->sinmovimiento))
   {
       if (is_array($this->sinmovimiento))
       {
           $Tmp_array = $this->sinmovimiento;
       }
       else
       {
           $Tmp_array = explode(";", $this->sinmovimiento);
       }
       $sinmovimiento_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $sinmovimiento_val_str)
          {
             $sinmovimiento_val_str .= ", ";
          }
          $sinmovimiento_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $predeterminada_val_str = "''";
   if (!empty($this->predeterminada))
   {
       if (is_array($this->predeterminada))
       {
           $Tmp_array = $this->predeterminada;
       }
       else
       {
           $Tmp_array = explode(";", $this->predeterminada);
       }
       $predeterminada_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $predeterminada_val_str)
          {
             $predeterminada_val_str .= ", ";
          }
          $predeterminada_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT nombre, nombre_empresa  FROM empresas  ORDER BY nombre_empresa";

   $this->idempresa = $old_value_idempresa;
   $this->creada = $old_value_creada;
   $this->creada_hora = $old_value_creada_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como'][] = $rs->fields[0];
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
   $copiada_como_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->copiada_como_1))
          {
              foreach ($this->copiada_como_1 as $tmp_copiada_como)
              {
                  if (trim($tmp_copiada_como) === trim($cadaselect[1])) { $copiada_como_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->copiada_como) === trim($cadaselect[1])) { $copiada_como_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="copiada_como" value="<?php echo $this->form_encode_input($copiada_como) . "\">" . $copiada_como_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_copiada_como();
   $x = 0 ; 
   $copiada_como_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->copiada_como_1))
          {
              foreach ($this->copiada_como_1 as $tmp_copiada_como)
              {
                  if (trim($tmp_copiada_como) === trim($cadaselect[1])) { $copiada_como_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->copiada_como) === trim($cadaselect[1])) { $copiada_como_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($copiada_como_look))
          {
              $copiada_como_look = $this->copiada_como;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_copiada_como\" class=\"css_copiada_como_line\" style=\"" .  $sStyleReadLab_copiada_como . "\">" . $this->form_format_readonly("copiada_como", $this->form_encode_input($copiada_como_look)) . "</span><span id=\"id_read_off_copiada_como\" class=\"css_read_off_copiada_como" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_copiada_como . "\">";
   echo " <span id=\"idAjaxSelect_copiada_como\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_copiada_como_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_copiada_como\" name=\"copiada_como\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_copiada_como'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Empresa") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->copiada_como) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->copiada_como)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_copiada_como_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_copiada_como_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_negocio']))
   {
       $this->nm_new_label['tipo_negocio'] = "Tipo Negocio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_negocio = $this->tipo_negocio;
   $sStyleHidden_tipo_negocio = '';
   if (isset($this->nmgp_cmp_hidden['tipo_negocio']) && $this->nmgp_cmp_hidden['tipo_negocio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_negocio']);
       $sStyleHidden_tipo_negocio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_negocio = 'display: none;';
   $sStyleReadInp_tipo_negocio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_negocio']) && $this->nmgp_cmp_readonly['tipo_negocio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_negocio']);
       $sStyleReadLab_tipo_negocio = '';
       $sStyleReadInp_tipo_negocio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_negocio']) && $this->nmgp_cmp_hidden['tipo_negocio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_negocio" value="<?php echo $this->form_encode_input($this->tipo_negocio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_negocio_label" id="hidden_field_label_tipo_negocio" style="<?php echo $sStyleHidden_tipo_negocio; ?>"><span id="id_label_tipo_negocio"><?php echo $this->nm_new_label['tipo_negocio']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_negocio_line" id="hidden_field_data_tipo_negocio" style="<?php echo $sStyleHidden_tipo_negocio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_negocio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_negocio"]) &&  $this->nmgp_cmp_readonly["tipo_negocio"] == "on") { 

$tipo_negocio_look = "";
 if ($this->tipo_negocio == "GENERAL") { $tipo_negocio_look .= "GENERAL" ;} 
 if ($this->tipo_negocio == "FERRETERIA") { $tipo_negocio_look .= "FERRETERIA" ;} 
 if ($this->tipo_negocio == "ELECTRICO") { $tipo_negocio_look .= "ELECTRICO" ;} 
 if ($this->tipo_negocio == "RESTAURANTE") { $tipo_negocio_look .= "RESTAURANTE" ;} 
 if ($this->tipo_negocio == "ZAPATERIA") { $tipo_negocio_look .= "ZAPATERIA" ;} 
 if ($this->tipo_negocio == "BOUTIQUE") { $tipo_negocio_look .= "BOUTIQUE" ;} 
 if ($this->tipo_negocio == "LAVAUTOS") { $tipo_negocio_look .= "LAVAUTOS" ;} 
 if ($this->tipo_negocio == "DROGUERIA") { $tipo_negocio_look .= "DROGUERIA" ;} 
 if ($this->tipo_negocio == "SUPERMERCADO") { $tipo_negocio_look .= "SUPERMERCADO" ;} 
 if ($this->tipo_negocio == "INTERNET") { $tipo_negocio_look .= "INTERNET" ;} 
 if (empty($tipo_negocio_look)) { $tipo_negocio_look = $this->tipo_negocio; }
?>
<input type="hidden" name="tipo_negocio" value="<?php echo $this->form_encode_input($tipo_negocio) . "\">" . $tipo_negocio_look . ""; ?>
<?php } else { ?>
<?php

$tipo_negocio_look = "";
 if ($this->tipo_negocio == "GENERAL") { $tipo_negocio_look .= "GENERAL" ;} 
 if ($this->tipo_negocio == "FERRETERIA") { $tipo_negocio_look .= "FERRETERIA" ;} 
 if ($this->tipo_negocio == "ELECTRICO") { $tipo_negocio_look .= "ELECTRICO" ;} 
 if ($this->tipo_negocio == "RESTAURANTE") { $tipo_negocio_look .= "RESTAURANTE" ;} 
 if ($this->tipo_negocio == "ZAPATERIA") { $tipo_negocio_look .= "ZAPATERIA" ;} 
 if ($this->tipo_negocio == "BOUTIQUE") { $tipo_negocio_look .= "BOUTIQUE" ;} 
 if ($this->tipo_negocio == "LAVAUTOS") { $tipo_negocio_look .= "LAVAUTOS" ;} 
 if ($this->tipo_negocio == "DROGUERIA") { $tipo_negocio_look .= "DROGUERIA" ;} 
 if ($this->tipo_negocio == "SUPERMERCADO") { $tipo_negocio_look .= "SUPERMERCADO" ;} 
 if ($this->tipo_negocio == "INTERNET") { $tipo_negocio_look .= "INTERNET" ;} 
 if (empty($tipo_negocio_look)) { $tipo_negocio_look = $this->tipo_negocio; }
?>
<span id="id_read_on_tipo_negocio" class="css_tipo_negocio_line"  style="<?php echo $sStyleReadLab_tipo_negocio; ?>"><?php echo $this->form_format_readonly("tipo_negocio", $this->form_encode_input($tipo_negocio_look)); ?></span><span id="id_read_off_tipo_negocio" class="css_read_off_tipo_negocio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_negocio; ?>">
 <span id="idAjaxSelect_tipo_negocio" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_negocio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_negocio" name="tipo_negocio" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="GENERAL" <?php  if ($this->tipo_negocio == "GENERAL") { echo " selected" ;} ?><?php  if (empty($this->tipo_negocio)) { echo " selected" ;} ?>>GENERAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'GENERAL'; ?>
 <option  value="FERRETERIA" <?php  if ($this->tipo_negocio == "FERRETERIA") { echo " selected" ;} ?>>FERRETERIA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'FERRETERIA'; ?>
 <option  value="ELECTRICO" <?php  if ($this->tipo_negocio == "ELECTRICO") { echo " selected" ;} ?>>ELECTRICO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'ELECTRICO'; ?>
 <option  value="RESTAURANTE" <?php  if ($this->tipo_negocio == "RESTAURANTE") { echo " selected" ;} ?>>RESTAURANTE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'RESTAURANTE'; ?>
 <option  value="ZAPATERIA" <?php  if ($this->tipo_negocio == "ZAPATERIA") { echo " selected" ;} ?>>ZAPATERIA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'ZAPATERIA'; ?>
 <option  value="BOUTIQUE" <?php  if ($this->tipo_negocio == "BOUTIQUE") { echo " selected" ;} ?>>BOUTIQUE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'BOUTIQUE'; ?>
 <option  value="LAVAUTOS" <?php  if ($this->tipo_negocio == "LAVAUTOS") { echo " selected" ;} ?>>LAVAUTOS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'LAVAUTOS'; ?>
 <option  value="DROGUERIA" <?php  if ($this->tipo_negocio == "DROGUERIA") { echo " selected" ;} ?>>DROGUERIA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'DROGUERIA'; ?>
 <option  value="SUPERMERCADO" <?php  if ($this->tipo_negocio == "SUPERMERCADO") { echo " selected" ;} ?>>SUPERMERCADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'SUPERMERCADO'; ?>
 <option  value="INTERNET" <?php  if ($this->tipo_negocio == "INTERNET") { echo " selected" ;} ?>>INTERNET</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_tipo_negocio'][] = 'INTERNET'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_negocio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_negocio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['predeterminada']))
   {
       $this->nm_new_label['predeterminada'] = "Predeterminada";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $predeterminada = $this->predeterminada;
   $sStyleHidden_predeterminada = '';
   if (isset($this->nmgp_cmp_hidden['predeterminada']) && $this->nmgp_cmp_hidden['predeterminada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['predeterminada']);
       $sStyleHidden_predeterminada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_predeterminada = 'display: none;';
   $sStyleReadInp_predeterminada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['predeterminada']) && $this->nmgp_cmp_readonly['predeterminada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['predeterminada']);
       $sStyleReadLab_predeterminada = '';
       $sStyleReadInp_predeterminada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['predeterminada']) && $this->nmgp_cmp_hidden['predeterminada'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="predeterminada" value="<?php echo $this->form_encode_input($this->predeterminada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->predeterminada_1 = explode(";", trim($this->predeterminada));
  } 
  else
  {
      if (empty($this->predeterminada))
      {
          $this->predeterminada_1= array(); 
          $this->predeterminada= "NO";
      } 
      else
      {
          $this->predeterminada_1= $this->predeterminada; 
          $this->predeterminada= ""; 
          foreach ($this->predeterminada_1 as $cada_predeterminada)
          {
             if (!empty($predeterminada))
             {
                 $this->predeterminada.= ";"; 
             } 
             $this->predeterminada.= $cada_predeterminada; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_predeterminada_label" id="hidden_field_label_predeterminada" style="<?php echo $sStyleHidden_predeterminada; ?>"><span id="id_label_predeterminada"><?php echo $this->nm_new_label['predeterminada']; ?></span></TD>
    <TD class="scFormDataOdd css_predeterminada_line" id="hidden_field_data_predeterminada" style="<?php echo $sStyleHidden_predeterminada; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_predeterminada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["predeterminada"]) &&  $this->nmgp_cmp_readonly["predeterminada"] == "on") { 

$predeterminada_look = "";
 if ($this->predeterminada == "SI") { $predeterminada_look .= "" ;} 
 if (empty($predeterminada_look)) { $predeterminada_look = $this->predeterminada; }
?>
<input type="hidden" name="predeterminada" value="<?php echo $this->form_encode_input($predeterminada) . "\">" . $predeterminada_look . ""; ?>
<?php } else { ?>

<?php

$predeterminada_look = "";
 if ($this->predeterminada == "SI") { $predeterminada_look .= "" ;} 
 if (empty($predeterminada_look)) { $predeterminada_look = $this->predeterminada; }
?>
<span id="id_read_on_predeterminada" class="css_predeterminada_line" style="<?php echo $sStyleReadLab_predeterminada; ?>"><?php echo $this->form_format_readonly("predeterminada", $this->form_encode_input($predeterminada_look)); ?></span><span id="id_read_off_predeterminada" class="css_read_off_predeterminada css_predeterminada_line" style="<?php echo $sStyleReadInp_predeterminada; ?>"><?php echo "<div id=\"idAjaxCheckbox_predeterminada\" style=\"display: inline-block\" class=\"css_predeterminada_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_predeterminada_line"><?php $tempOptionId = "id-opt-predeterminada" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-predeterminada sc-ui-checkbox-predeterminada" name="predeterminada[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_predeterminada'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->predeterminada_1))  { echo " checked" ;} ?> onClick="do_ajax_form_empresas_event_predeterminada_onclick();" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_predeterminada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_predeterminada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['password']))
    {
        $this->nm_new_label['password'] = "Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $password = $this->password;
   $sStyleHidden_password = '';
   if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['password']);
       $sStyleHidden_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_password = 'display: none;';
   $sStyleReadInp_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['password']) && $this->nmgp_cmp_readonly['password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['password']);
       $sStyleReadLab_password = '';
       $sStyleReadInp_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['password']) && $this->nmgp_cmp_hidden['password'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_password_label" id="hidden_field_label_password" style="<?php echo $sStyleHidden_password; ?>"><span id="id_label_password"><?php echo $this->nm_new_label['password']; ?></span></TD>
    <TD class="scFormDataOdd css_password_line" id="hidden_field_data_password" style="<?php echo $sStyleHidden_password; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_password_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["password"]) &&  $this->nmgp_cmp_readonly["password"] == "on") { 

 ?>
<input type="hidden" name="password" value="<?php echo $this->form_encode_input($password) . "\">" . $password . ""; ?>
<?php } else { ?>
<span id="id_read_on_password" class="sc-ui-readonly-password css_password_line" style="<?php echo $sStyleReadLab_password; ?>"><?php echo $this->form_format_readonly("password", $this->form_encode_input($this->password)); ?></span><span id="id_read_off_password" class="css_read_off_password<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_password; ?>">
 <input class="sc-js-input scFormObjectOdd css_password_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_password" type=text name="password" value="<?php echo $this->form_encode_input($password) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_password_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_password_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['celular']))
    {
        $this->nm_new_label['celular'] = "Celular";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $celular = $this->celular;
   $sStyleHidden_celular = '';
   if (isset($this->nmgp_cmp_hidden['celular']) && $this->nmgp_cmp_hidden['celular'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['celular']);
       $sStyleHidden_celular = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_celular = 'display: none;';
   $sStyleReadInp_celular = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['celular']) && $this->nmgp_cmp_readonly['celular'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['celular']);
       $sStyleReadLab_celular = '';
       $sStyleReadInp_celular = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['celular']) && $this->nmgp_cmp_hidden['celular'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="celular" value="<?php echo $this->form_encode_input($celular) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_celular_label" id="hidden_field_label_celular" style="<?php echo $sStyleHidden_celular; ?>"><span id="id_label_celular"><?php echo $this->nm_new_label['celular']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['celular']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['celular'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_celular_line" id="hidden_field_data_celular" style="<?php echo $sStyleHidden_celular; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_celular_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["celular"]) &&  $this->nmgp_cmp_readonly["celular"] == "on") { 

 ?>
<input type="hidden" name="celular" value="<?php echo $this->form_encode_input($celular) . "\">" . $celular . ""; ?>
<?php } else { ?>
<span id="id_read_on_celular" class="sc-ui-readonly-celular css_celular_line" style="<?php echo $sStyleReadLab_celular; ?>"><?php echo $this->form_format_readonly("celular", $this->form_encode_input($this->celular)); ?></span><span id="id_read_off_celular" class="css_read_off_celular<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_celular; ?>">
 <input class="sc-js-input scFormObjectOdd css_celular_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_celular" type=text name="celular" value="<?php echo $this->form_encode_input($celular) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('celular')", "nm_mostra_mens('celular')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_celular_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_celular_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['correo']))
    {
        $this->nm_new_label['correo'] = "Correo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $correo = $this->correo;
   $sStyleHidden_correo = '';
   if (isset($this->nmgp_cmp_hidden['correo']) && $this->nmgp_cmp_hidden['correo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['correo']);
       $sStyleHidden_correo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_correo = 'display: none;';
   $sStyleReadInp_correo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['correo']) && $this->nmgp_cmp_readonly['correo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['correo']);
       $sStyleReadLab_correo = '';
       $sStyleReadInp_correo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['correo']) && $this->nmgp_cmp_hidden['correo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_correo_label" id="hidden_field_label_correo" style="<?php echo $sStyleHidden_correo; ?>"><span id="id_label_correo"><?php echo $this->nm_new_label['correo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['correo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['php_cmp_required']['correo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_correo_line" id="hidden_field_data_correo" style="<?php echo $sStyleHidden_correo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo"]) &&  $this->nmgp_cmp_readonly["correo"] == "on") { 

 ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">" . $correo . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo" class="sc-ui-readonly-correo css_correo_line" style="<?php echo $sStyleReadLab_correo; ?>"><?php echo $this->form_format_readonly("correo", $this->form_encode_input($this->correo)); ?></span><span id="id_read_off_correo" class="css_read_off_correo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo" type=text name="correo" value="<?php echo $this->form_encode_input($correo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><img src="../_lib/img/scriptcase__NM__nm_transparent.gif" style="vertical-align: middle; display: none" class="sc-js-ui-statusimg" id="id_sc_status_correo" />&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.correo.value != '') {window.open('mailto:' + document.F1.correo.value); }", "if (document.F1.correo.value != '') {window.open('mailto:' + document.F1.correo.value); }", "correo_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['comentario']))
    {
        $this->nm_new_label['comentario'] = "Comentarios";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $comentario = $this->comentario;
   $sStyleHidden_comentario = '';
   if (isset($this->nmgp_cmp_hidden['comentario']) && $this->nmgp_cmp_hidden['comentario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['comentario']);
       $sStyleHidden_comentario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_comentario = 'display: none;';
   $sStyleReadInp_comentario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['comentario']) && $this->nmgp_cmp_readonly['comentario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['comentario']);
       $sStyleReadLab_comentario = '';
       $sStyleReadInp_comentario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['comentario']) && $this->nmgp_cmp_hidden['comentario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comentario" value="<?php echo $this->form_encode_input($comentario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_comentario_label" id="hidden_field_label_comentario" style="<?php echo $sStyleHidden_comentario; ?>"><span id="id_label_comentario"><?php echo $this->nm_new_label['comentario']; ?></span></TD>
    <TD class="scFormDataOdd css_comentario_line" id="hidden_field_data_comentario" style="<?php echo $sStyleHidden_comentario; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_comentario_line" style="vertical-align: top;padding: 0px">
<?php
$comentario_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($comentario));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comentario"]) &&  $this->nmgp_cmp_readonly["comentario"] == "on") { 

 ?>
<input type="hidden" name="comentario" value="<?php echo $this->form_encode_input($comentario) . "\">" . $comentario_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_comentario" class="sc-ui-readonly-comentario css_comentario_line" style="<?php echo $sStyleReadLab_comentario; ?>"><?php echo $this->form_format_readonly("comentario", $this->form_encode_input($comentario_val)); ?></span><span id="id_read_off_comentario" class="css_read_off_comentario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_comentario; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_comentario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="comentario" id="id_sc_field_comentario" rows="5" cols="80"
 alt="{datatype: 'text', maxLength: 500, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $comentario; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comentario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comentario_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['entorno']))
   {
       $this->nm_new_label['entorno'] = "Entorno";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $entorno = $this->entorno;
   $sStyleHidden_entorno = '';
   if (isset($this->nmgp_cmp_hidden['entorno']) && $this->nmgp_cmp_hidden['entorno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['entorno']);
       $sStyleHidden_entorno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_entorno = 'display: none;';
   $sStyleReadInp_entorno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['entorno']) && $this->nmgp_cmp_readonly['entorno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['entorno']);
       $sStyleReadLab_entorno = '';
       $sStyleReadInp_entorno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['entorno']) && $this->nmgp_cmp_hidden['entorno'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="entorno" value="<?php echo $this->form_encode_input($this->entorno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_entorno_label" id="hidden_field_label_entorno" style="<?php echo $sStyleHidden_entorno; ?>"><span id="id_label_entorno"><?php echo $this->nm_new_label['entorno']; ?></span></TD>
    <TD class="scFormDataOdd css_entorno_line" id="hidden_field_data_entorno" style="<?php echo $sStyleHidden_entorno; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_entorno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entorno"]) &&  $this->nmgp_cmp_readonly["entorno"] == "on") { 

$entorno_look = "";
 if ($this->entorno == "escritorio") { $entorno_look .= "Escritorio" ;} 
 if ($this->entorno == "nube") { $entorno_look .= "Nube" ;} 
 if (empty($entorno_look)) { $entorno_look = $this->entorno; }
?>
<input type="hidden" name="entorno" value="<?php echo $this->form_encode_input($entorno) . "\">" . $entorno_look . ""; ?>
<?php } else { ?>
<?php

$entorno_look = "";
 if ($this->entorno == "escritorio") { $entorno_look .= "Escritorio" ;} 
 if ($this->entorno == "nube") { $entorno_look .= "Nube" ;} 
 if (empty($entorno_look)) { $entorno_look = $this->entorno; }
?>
<span id="id_read_on_entorno" class="css_entorno_line"  style="<?php echo $sStyleReadLab_entorno; ?>"><?php echo $this->form_format_readonly("entorno", $this->form_encode_input($entorno_look)); ?></span><span id="id_read_off_entorno" class="css_read_off_entorno<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_entorno; ?>">
 <span id="idAjaxSelect_entorno" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_entorno_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_entorno" name="entorno" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_entorno'][] = ''; ?>
 <option value="">Entorno</option>
 <option  value="escritorio" <?php  if ($this->entorno == "escritorio") { echo " selected" ;} ?>>Escritorio</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_entorno'][] = 'escritorio'; ?>
 <option  value="nube" <?php  if ($this->entorno == "nube") { echo " selected" ;} ?>>Nube</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['Lookup_entorno'][] = 'nube'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entorno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entorno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_empresas");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_empresas");
 parent.scAjaxDetailHeight("form_empresas", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_empresas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_empresas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['sc_modal'])
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
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-3").length && $("#sc_b_upd_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-4").length && $("#sc_b_del_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('excluir');
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
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_empresas']['buttonStatus'] = $this->nmgp_botoes;
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
