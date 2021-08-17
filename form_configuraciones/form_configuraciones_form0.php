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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Configuraciones"); } else { echo strip_tags("Configuraciones"); } ?></TITLE>
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
.css_read_off_ultima_edicion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_activacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_configuraciones/form_configuraciones_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_configuraciones_sajax_js.php");
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

include_once('form_configuraciones_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

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

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_configuraciones_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_configuraciones'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_configuraciones'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="900">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Configuraciones"; } else { echo "Configuraciones"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['activar'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "activar", "scBtnFn_activar()", "scBtnFn_activar()", "sc_activar_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_configuraciones_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_configuraciones_form0' => array(
            'title' => "General",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_configuraciones_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_configuraciones_form1' => array(
            'title' => "Empresa",
            'class' => $nmgp_num_form == "form_configuraciones_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('General' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_configuraciones_form0']['class'] = 'scTabInactive';
                        }
                        if ('Empresa' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_configuraciones_form1']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["form_configuraciones_form0"]['class'];
?>
   <li id="id_form_configuraciones_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_configuraciones_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__gear_32.png" align="absmiddle">
     General
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_configuraciones_form1"]['class'];
?>
   <li id="id_form_configuraciones_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_configuraciones_form1')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__application_enterprise_edit_24.png" align="absmiddle">
     Empresa
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_configuraciones_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="30%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idconfiguraciones']))
   {
       $this->nmgp_cmp_hidden['idconfiguraciones'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lineasporfactura']))
    {
        $this->nm_new_label['lineasporfactura'] = "LINEAS X FACTURA:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lineasporfactura = $this->lineasporfactura;
   $sStyleHidden_lineasporfactura = '';
   if (isset($this->nmgp_cmp_hidden['lineasporfactura']) && $this->nmgp_cmp_hidden['lineasporfactura'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lineasporfactura']);
       $sStyleHidden_lineasporfactura = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lineasporfactura = 'display: none;';
   $sStyleReadInp_lineasporfactura = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lineasporfactura']) && $this->nmgp_cmp_readonly['lineasporfactura'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lineasporfactura']);
       $sStyleReadLab_lineasporfactura = '';
       $sStyleReadInp_lineasporfactura = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lineasporfactura']) && $this->nmgp_cmp_hidden['lineasporfactura'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lineasporfactura" value="<?php echo $this->form_encode_input($lineasporfactura) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lineasporfactura_label" id="hidden_field_label_lineasporfactura" style="<?php echo $sStyleHidden_lineasporfactura; ?>"><span id="id_label_lineasporfactura"><?php echo $this->nm_new_label['lineasporfactura']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['lineasporfactura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['lineasporfactura'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_lineasporfactura_line" id="hidden_field_data_lineasporfactura" style="<?php echo $sStyleHidden_lineasporfactura; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lineasporfactura_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lineasporfactura"]) &&  $this->nmgp_cmp_readonly["lineasporfactura"] == "on") { 

 ?>
<input type="hidden" name="lineasporfactura" value="<?php echo $this->form_encode_input($lineasporfactura) . "\">" . $lineasporfactura . ""; ?>
<?php } else { ?>
<span id="id_read_on_lineasporfactura" class="sc-ui-readonly-lineasporfactura css_lineasporfactura_line" style="<?php echo $sStyleReadLab_lineasporfactura; ?>"><?php echo $this->form_format_readonly("lineasporfactura", $this->form_encode_input($this->lineasporfactura)); ?></span><span id="id_read_off_lineasporfactura" class="css_read_off_lineasporfactura<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lineasporfactura; ?>">
 <input class="sc-js-input scFormObjectOdd css_lineasporfactura_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lineasporfactura" type=text name="lineasporfactura" value="<?php echo $this->form_encode_input($lineasporfactura) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'mask', maskList: '99', alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lineasporfactura_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lineasporfactura_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['consolidararticulos']))
   {
       $this->nm_new_label['consolidararticulos'] = "CONSOLIDAR ARTÍCULOS:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consolidararticulos = $this->consolidararticulos;
   $sStyleHidden_consolidararticulos = '';
   if (isset($this->nmgp_cmp_hidden['consolidararticulos']) && $this->nmgp_cmp_hidden['consolidararticulos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consolidararticulos']);
       $sStyleHidden_consolidararticulos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consolidararticulos = 'display: none;';
   $sStyleReadInp_consolidararticulos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consolidararticulos']) && $this->nmgp_cmp_readonly['consolidararticulos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consolidararticulos']);
       $sStyleReadLab_consolidararticulos = '';
       $sStyleReadInp_consolidararticulos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consolidararticulos']) && $this->nmgp_cmp_hidden['consolidararticulos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="consolidararticulos" value="<?php echo $this->form_encode_input($this->consolidararticulos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_consolidararticulos_label" id="hidden_field_label_consolidararticulos" style="<?php echo $sStyleHidden_consolidararticulos; ?>"><span id="id_label_consolidararticulos"><?php echo $this->nm_new_label['consolidararticulos']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['consolidararticulos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['consolidararticulos'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_consolidararticulos_line" id="hidden_field_data_consolidararticulos" style="<?php echo $sStyleHidden_consolidararticulos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_consolidararticulos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consolidararticulos"]) &&  $this->nmgp_cmp_readonly["consolidararticulos"] == "on") { 

$consolidararticulos_look = "";
 if ($this->consolidararticulos == "S") { $consolidararticulos_look .= "S" ;} 
 if ($this->consolidararticulos == "N") { $consolidararticulos_look .= "N" ;} 
 if (empty($consolidararticulos_look)) { $consolidararticulos_look = $this->consolidararticulos; }
?>
<input type="hidden" name="consolidararticulos" value="<?php echo $this->form_encode_input($consolidararticulos) . "\">" . $consolidararticulos_look . ""; ?>
<?php } else { ?>
<?php

$consolidararticulos_look = "";
 if ($this->consolidararticulos == "S") { $consolidararticulos_look .= "S" ;} 
 if ($this->consolidararticulos == "N") { $consolidararticulos_look .= "N" ;} 
 if (empty($consolidararticulos_look)) { $consolidararticulos_look = $this->consolidararticulos; }
?>
<span id="id_read_on_consolidararticulos" class="css_consolidararticulos_line"  style="<?php echo $sStyleReadLab_consolidararticulos; ?>"><?php echo $this->form_format_readonly("consolidararticulos", $this->form_encode_input($consolidararticulos_look)); ?></span><span id="id_read_off_consolidararticulos" class="css_read_off_consolidararticulos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_consolidararticulos; ?>">
 <span id="idAjaxSelect_consolidararticulos" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_consolidararticulos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_consolidararticulos" name="consolidararticulos" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="S" <?php  if ($this->consolidararticulos == "S") { echo " selected" ;} ?>>S</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_consolidararticulos'][] = 'S'; ?>
 <option  value="N" <?php  if ($this->consolidararticulos == "N") { echo " selected" ;} ?><?php  if (empty($this->consolidararticulos)) { echo " selected" ;} ?>>N</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_consolidararticulos'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consolidararticulos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consolidararticulos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['serial']))
    {
        $this->nm_new_label['serial'] = "SERIAL:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $serial = $this->serial;
   $sStyleHidden_serial = '';
   if (isset($this->nmgp_cmp_hidden['serial']) && $this->nmgp_cmp_hidden['serial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['serial']);
       $sStyleHidden_serial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_serial = 'display: none;';
   $sStyleReadInp_serial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['serial']) && $this->nmgp_cmp_readonly['serial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['serial']);
       $sStyleReadLab_serial = '';
       $sStyleReadInp_serial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['serial']) && $this->nmgp_cmp_hidden['serial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="serial" value="<?php echo $this->form_encode_input($serial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_serial_label" id="hidden_field_label_serial" style="<?php echo $sStyleHidden_serial; ?>"><span id="id_label_serial"><?php echo $this->nm_new_label['serial']; ?></span></TD>
    <TD class="scFormDataOdd css_serial_line" id="hidden_field_data_serial" style="<?php echo $sStyleHidden_serial; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_serial_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["serial"]) &&  $this->nmgp_cmp_readonly["serial"] == "on") { 

 ?>
<input type="hidden" name="serial" value="<?php echo $this->form_encode_input($serial) . "\">" . $serial . ""; ?>
<?php } else { ?>
<span id="id_read_on_serial" class="sc-ui-readonly-serial css_serial_line" style="<?php echo $sStyleReadLab_serial; ?>"><?php echo $this->form_format_readonly("serial", $this->form_encode_input($this->serial)); ?></span><span id="id_read_off_serial" class="css_read_off_serial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_serial; ?>">
 <input class="sc-js-input scFormObjectOdd css_serial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_serial" type=text name="serial" value="<?php echo $this->form_encode_input($serial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_serial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_serial_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha']))
    {
        $this->nm_new_label['fecha'] = "FECHA INICIO:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_label" id="hidden_field_label_fecha" style="<?php echo $sStyleHidden_fecha; ?>"><span id="id_label_fecha"><?php echo $this->nm_new_label['fecha']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_line" id="hidden_field_data_fecha" style="<?php echo $sStyleHidden_fecha; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="fecha" value="<?php echo $this->form_encode_input($fecha); ?>"><span id="id_ajax_label_fecha"><?php echo nl2br($fecha); ?></span>
<?php
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['activo']))
    {
        $this->nm_new_label['activo'] = "ACTIVO:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $activo = $this->activo;
   $sStyleHidden_activo = '';
   if (isset($this->nmgp_cmp_hidden['activo']) && $this->nmgp_cmp_hidden['activo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['activo']);
       $sStyleHidden_activo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_activo = 'display: none;';
   $sStyleReadInp_activo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['activo']) && $this->nmgp_cmp_readonly['activo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['activo']);
       $sStyleReadLab_activo = '';
       $sStyleReadInp_activo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['activo']) && $this->nmgp_cmp_hidden['activo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_activo_label" id="hidden_field_label_activo" style="<?php echo $sStyleHidden_activo; ?>"><span id="id_label_activo"><?php echo $this->nm_new_label['activo']; ?></span></TD>
    <TD class="scFormDataOdd css_activo_line" id="hidden_field_data_activo" style="<?php echo $sStyleHidden_activo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activo_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo); ?>"><span id="id_ajax_label_activo"><?php echo nl2br($activo); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['espaciado'] = "ESPACIADO DETALLE FACTURA:";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_espaciado_label" id="hidden_field_label_espaciado" style="<?php echo $sStyleHidden_espaciado; ?>"><span id="id_label_espaciado"><?php echo $this->nm_new_label['espaciado']; ?></span></TD>
    <TD class="scFormDataOdd css_espaciado_line" id="hidden_field_data_espaciado" style="<?php echo $sStyleHidden_espaciado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_espaciado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["espaciado"]) &&  $this->nmgp_cmp_readonly["espaciado"] == "on") { 

 ?>
<input type="hidden" name="espaciado" value="<?php echo $this->form_encode_input($espaciado) . "\">" . $espaciado . ""; ?>
<?php } else { ?>
<span id="id_read_on_espaciado" class="sc-ui-readonly-espaciado css_espaciado_line" style="<?php echo $sStyleReadLab_espaciado; ?>"><?php echo $this->form_format_readonly("espaciado", $this->form_encode_input($this->espaciado)); ?></span><span id="id_read_off_espaciado" class="css_read_off_espaciado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_espaciado; ?>">
 <input class="sc-js-input scFormObjectOdd css_espaciado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_espaciado" type=text name="espaciado" value="<?php echo $this->form_encode_input($espaciado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'decimal', maxLength: 12, precision: 1, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['espaciado']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['espaciado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['espaciado']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['espaciado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_espaciado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_espaciado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_pc']))
    {
        $this->nm_new_label['nombre_pc'] = "NOMBRE PC DE RED:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_pc = $this->nombre_pc;
   $sStyleHidden_nombre_pc = '';
   if (isset($this->nmgp_cmp_hidden['nombre_pc']) && $this->nmgp_cmp_hidden['nombre_pc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_pc']);
       $sStyleHidden_nombre_pc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_pc = 'display: none;';
   $sStyleReadInp_nombre_pc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_pc']) && $this->nmgp_cmp_readonly['nombre_pc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_pc']);
       $sStyleReadLab_nombre_pc = '';
       $sStyleReadInp_nombre_pc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_pc']) && $this->nmgp_cmp_hidden['nombre_pc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_pc" value="<?php echo $this->form_encode_input($nombre_pc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_pc_label" id="hidden_field_label_nombre_pc" style="<?php echo $sStyleHidden_nombre_pc; ?>"><span id="id_label_nombre_pc"><?php echo $this->nm_new_label['nombre_pc']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_pc_line" id="hidden_field_data_nombre_pc" style="<?php echo $sStyleHidden_nombre_pc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_pc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_pc"]) &&  $this->nmgp_cmp_readonly["nombre_pc"] == "on") { 

 ?>
<input type="hidden" name="nombre_pc" value="<?php echo $this->form_encode_input($nombre_pc) . "\">" . $nombre_pc . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_pc" class="sc-ui-readonly-nombre_pc css_nombre_pc_line" style="<?php echo $sStyleReadLab_nombre_pc; ?>"><?php echo $this->form_format_readonly("nombre_pc", $this->form_encode_input($this->nombre_pc)); ?></span><span id="id_read_off_nombre_pc" class="css_read_off_nombre_pc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_pc; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_pc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_pc" type=text name="nombre_pc" value="<?php echo $this->form_encode_input($nombre_pc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=32"; } ?> maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Coloque el nombre de RED del Computador donde está conectada la Impresora</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Coloque el nombre de RED del Computador donde está conectada la Impresora</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_pc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_pc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_impre']))
    {
        $this->nm_new_label['nombre_impre'] = "NOMBRE IMPRESORA DE RED:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_impre = $this->nombre_impre;
   $sStyleHidden_nombre_impre = '';
   if (isset($this->nmgp_cmp_hidden['nombre_impre']) && $this->nmgp_cmp_hidden['nombre_impre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_impre']);
       $sStyleHidden_nombre_impre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_impre = 'display: none;';
   $sStyleReadInp_nombre_impre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_impre']) && $this->nmgp_cmp_readonly['nombre_impre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_impre']);
       $sStyleReadLab_nombre_impre = '';
       $sStyleReadInp_nombre_impre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_impre']) && $this->nmgp_cmp_hidden['nombre_impre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_impre" value="<?php echo $this->form_encode_input($nombre_impre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_impre_label" id="hidden_field_label_nombre_impre" style="<?php echo $sStyleHidden_nombre_impre; ?>"><span id="id_label_nombre_impre"><?php echo $this->nm_new_label['nombre_impre']; ?></span></TD>
    <TD class="scFormDataOdd css_nombre_impre_line" id="hidden_field_data_nombre_impre" style="<?php echo $sStyleHidden_nombre_impre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_impre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_impre"]) &&  $this->nmgp_cmp_readonly["nombre_impre"] == "on") { 

 ?>
<input type="hidden" name="nombre_impre" value="<?php echo $this->form_encode_input($nombre_impre) . "\">" . $nombre_impre . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_impre" class="sc-ui-readonly-nombre_impre css_nombre_impre_line" style="<?php echo $sStyleReadLab_nombre_impre; ?>"><?php echo $this->form_format_readonly("nombre_impre", $this->form_encode_input($this->nombre_impre)); ?></span><span id="id_read_off_nombre_impre" class="css_read_off_nombre_impre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_impre; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_impre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_impre" type=text name="nombre_impre" value="<?php echo $this->form_encode_input($nombre_impre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=32"; } ?> maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Coloque el nombre de la Impresora donde se va a imprimir</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Coloque el nombre de la Impresora donde se va a imprimir</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_impre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_impre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['refresh_grid_doc']))
    {
        $this->nm_new_label['refresh_grid_doc'] = "ACTUALIZACIÓN COCINA SEGUNDOS:";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $refresh_grid_doc = $this->refresh_grid_doc;
   $sStyleHidden_refresh_grid_doc = '';
   if (isset($this->nmgp_cmp_hidden['refresh_grid_doc']) && $this->nmgp_cmp_hidden['refresh_grid_doc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['refresh_grid_doc']);
       $sStyleHidden_refresh_grid_doc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_refresh_grid_doc = 'display: none;';
   $sStyleReadInp_refresh_grid_doc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['refresh_grid_doc']) && $this->nmgp_cmp_readonly['refresh_grid_doc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['refresh_grid_doc']);
       $sStyleReadLab_refresh_grid_doc = '';
       $sStyleReadInp_refresh_grid_doc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['refresh_grid_doc']) && $this->nmgp_cmp_hidden['refresh_grid_doc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="refresh_grid_doc" value="<?php echo $this->form_encode_input($refresh_grid_doc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_refresh_grid_doc_label" id="hidden_field_label_refresh_grid_doc" style="<?php echo $sStyleHidden_refresh_grid_doc; ?>"><span id="id_label_refresh_grid_doc"><?php echo $this->nm_new_label['refresh_grid_doc']; ?></span></TD>
    <TD class="scFormDataOdd css_refresh_grid_doc_line" id="hidden_field_data_refresh_grid_doc" style="<?php echo $sStyleHidden_refresh_grid_doc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_refresh_grid_doc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["refresh_grid_doc"]) &&  $this->nmgp_cmp_readonly["refresh_grid_doc"] == "on") { 

 ?>
<input type="hidden" name="refresh_grid_doc" value="<?php echo $this->form_encode_input($refresh_grid_doc) . "\">" . $refresh_grid_doc . ""; ?>
<?php } else { ?>
<span id="id_read_on_refresh_grid_doc" class="sc-ui-readonly-refresh_grid_doc css_refresh_grid_doc_line" style="<?php echo $sStyleReadLab_refresh_grid_doc; ?>"><?php echo $this->form_format_readonly("refresh_grid_doc", $this->form_encode_input($this->refresh_grid_doc)); ?></span><span id="id_read_off_refresh_grid_doc" class="css_read_off_refresh_grid_doc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_refresh_grid_doc; ?>">
 <input class="sc-js-input scFormObjectOdd css_refresh_grid_doc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_refresh_grid_doc" type=text name="refresh_grid_doc" value="<?php echo $this->form_encode_input($refresh_grid_doc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> alt="{datatype: 'integer', maxLength: 4, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['refresh_grid_doc']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['refresh_grid_doc']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['refresh_grid_doc']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('refresh_grid_doc')", "nm_mostra_mens('refresh_grid_doc')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_refresh_grid_doc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_refresh_grid_doc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['desactivar_control_sesion']))
   {
       $this->nm_new_label['desactivar_control_sesion'] = "DESACTIVAR EL CONTROL DE SESIÓN";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desactivar_control_sesion = $this->desactivar_control_sesion;
   $sStyleHidden_desactivar_control_sesion = '';
   if (isset($this->nmgp_cmp_hidden['desactivar_control_sesion']) && $this->nmgp_cmp_hidden['desactivar_control_sesion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desactivar_control_sesion']);
       $sStyleHidden_desactivar_control_sesion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desactivar_control_sesion = 'display: none;';
   $sStyleReadInp_desactivar_control_sesion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desactivar_control_sesion']) && $this->nmgp_cmp_readonly['desactivar_control_sesion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desactivar_control_sesion']);
       $sStyleReadLab_desactivar_control_sesion = '';
       $sStyleReadInp_desactivar_control_sesion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desactivar_control_sesion']) && $this->nmgp_cmp_hidden['desactivar_control_sesion'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="desactivar_control_sesion" value="<?php echo $this->form_encode_input($this->desactivar_control_sesion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->desactivar_control_sesion_1 = explode(";", trim($this->desactivar_control_sesion));
  } 
  else
  {
      if (empty($this->desactivar_control_sesion))
      {
          $this->desactivar_control_sesion_1= array(); 
          $this->desactivar_control_sesion= "NO";
      } 
      else
      {
          $this->desactivar_control_sesion_1= $this->desactivar_control_sesion; 
          $this->desactivar_control_sesion= ""; 
          foreach ($this->desactivar_control_sesion_1 as $cada_desactivar_control_sesion)
          {
             if (!empty($desactivar_control_sesion))
             {
                 $this->desactivar_control_sesion.= ";"; 
             } 
             $this->desactivar_control_sesion.= $cada_desactivar_control_sesion; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_desactivar_control_sesion_label" id="hidden_field_label_desactivar_control_sesion" style="<?php echo $sStyleHidden_desactivar_control_sesion; ?>"><span id="id_label_desactivar_control_sesion"><?php echo $this->nm_new_label['desactivar_control_sesion']; ?></span></TD>
    <TD class="scFormDataOdd css_desactivar_control_sesion_line" id="hidden_field_data_desactivar_control_sesion" style="<?php echo $sStyleHidden_desactivar_control_sesion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desactivar_control_sesion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desactivar_control_sesion"]) &&  $this->nmgp_cmp_readonly["desactivar_control_sesion"] == "on") { 

$desactivar_control_sesion_look = "";
 if ($this->desactivar_control_sesion == "SI") { $desactivar_control_sesion_look .= "SI" ;} 
 if (empty($desactivar_control_sesion_look)) { $desactivar_control_sesion_look = $this->desactivar_control_sesion; }
?>
<input type="hidden" name="desactivar_control_sesion" value="<?php echo $this->form_encode_input($desactivar_control_sesion) . "\">" . $desactivar_control_sesion_look . ""; ?>
<?php } else { ?>

<?php

$desactivar_control_sesion_look = "";
 if ($this->desactivar_control_sesion == "SI") { $desactivar_control_sesion_look .= "SI" ;} 
 if (empty($desactivar_control_sesion_look)) { $desactivar_control_sesion_look = $this->desactivar_control_sesion; }
?>
<span id="id_read_on_desactivar_control_sesion" class="css_desactivar_control_sesion_line" style="<?php echo $sStyleReadLab_desactivar_control_sesion; ?>"><?php echo $this->form_format_readonly("desactivar_control_sesion", $this->form_encode_input($desactivar_control_sesion_look)); ?></span><span id="id_read_off_desactivar_control_sesion" class="css_read_off_desactivar_control_sesion css_desactivar_control_sesion_line" style="<?php echo $sStyleReadInp_desactivar_control_sesion; ?>"><?php echo "<div id=\"idAjaxCheckbox_desactivar_control_sesion\" style=\"display: inline-block\" class=\"css_desactivar_control_sesion_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_desactivar_control_sesion_line"><?php $tempOptionId = "id-opt-desactivar_control_sesion" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-desactivar_control_sesion sc-ui-checkbox-desactivar_control_sesion" name="desactivar_control_sesion[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_desactivar_control_sesion'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->desactivar_control_sesion_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('desactivar_control_sesion')", "nm_mostra_mens('desactivar_control_sesion')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desactivar_control_sesion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desactivar_control_sesion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['noborrar_tmp_enpos']))
   {
       $this->nm_new_label['noborrar_tmp_enpos'] = "NO BORRAR TEMPORALES EN VENTA RÁPIDA";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $noborrar_tmp_enpos = $this->noborrar_tmp_enpos;
   $sStyleHidden_noborrar_tmp_enpos = '';
   if (isset($this->nmgp_cmp_hidden['noborrar_tmp_enpos']) && $this->nmgp_cmp_hidden['noborrar_tmp_enpos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['noborrar_tmp_enpos']);
       $sStyleHidden_noborrar_tmp_enpos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_noborrar_tmp_enpos = 'display: none;';
   $sStyleReadInp_noborrar_tmp_enpos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['noborrar_tmp_enpos']) && $this->nmgp_cmp_readonly['noborrar_tmp_enpos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['noborrar_tmp_enpos']);
       $sStyleReadLab_noborrar_tmp_enpos = '';
       $sStyleReadInp_noborrar_tmp_enpos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['noborrar_tmp_enpos']) && $this->nmgp_cmp_hidden['noborrar_tmp_enpos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="noborrar_tmp_enpos" value="<?php echo $this->form_encode_input($this->noborrar_tmp_enpos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->noborrar_tmp_enpos_1 = explode(";", trim($this->noborrar_tmp_enpos));
  } 
  else
  {
      if (empty($this->noborrar_tmp_enpos))
      {
          $this->noborrar_tmp_enpos_1= array(); 
          $this->noborrar_tmp_enpos= "NO";
      } 
      else
      {
          $this->noborrar_tmp_enpos_1= $this->noborrar_tmp_enpos; 
          $this->noborrar_tmp_enpos= ""; 
          foreach ($this->noborrar_tmp_enpos_1 as $cada_noborrar_tmp_enpos)
          {
             if (!empty($noborrar_tmp_enpos))
             {
                 $this->noborrar_tmp_enpos.= ";"; 
             } 
             $this->noborrar_tmp_enpos.= $cada_noborrar_tmp_enpos; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_noborrar_tmp_enpos_label" id="hidden_field_label_noborrar_tmp_enpos" style="<?php echo $sStyleHidden_noborrar_tmp_enpos; ?>"><span id="id_label_noborrar_tmp_enpos"><?php echo $this->nm_new_label['noborrar_tmp_enpos']; ?></span></TD>
    <TD class="scFormDataOdd css_noborrar_tmp_enpos_line" id="hidden_field_data_noborrar_tmp_enpos" style="<?php echo $sStyleHidden_noborrar_tmp_enpos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_noborrar_tmp_enpos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["noborrar_tmp_enpos"]) &&  $this->nmgp_cmp_readonly["noborrar_tmp_enpos"] == "on") { 

$noborrar_tmp_enpos_look = "";
 if ($this->noborrar_tmp_enpos == "SI") { $noborrar_tmp_enpos_look .= "SI" ;} 
 if (empty($noborrar_tmp_enpos_look)) { $noborrar_tmp_enpos_look = $this->noborrar_tmp_enpos; }
?>
<input type="hidden" name="noborrar_tmp_enpos" value="<?php echo $this->form_encode_input($noborrar_tmp_enpos) . "\">" . $noborrar_tmp_enpos_look . ""; ?>
<?php } else { ?>

<?php

$noborrar_tmp_enpos_look = "";
 if ($this->noborrar_tmp_enpos == "SI") { $noborrar_tmp_enpos_look .= "SI" ;} 
 if (empty($noborrar_tmp_enpos_look)) { $noborrar_tmp_enpos_look = $this->noborrar_tmp_enpos; }
?>
<span id="id_read_on_noborrar_tmp_enpos" class="css_noborrar_tmp_enpos_line" style="<?php echo $sStyleReadLab_noborrar_tmp_enpos; ?>"><?php echo $this->form_format_readonly("noborrar_tmp_enpos", $this->form_encode_input($noborrar_tmp_enpos_look)); ?></span><span id="id_read_off_noborrar_tmp_enpos" class="css_read_off_noborrar_tmp_enpos css_noborrar_tmp_enpos_line" style="<?php echo $sStyleReadInp_noborrar_tmp_enpos; ?>"><?php echo "<div id=\"idAjaxCheckbox_noborrar_tmp_enpos\" style=\"display: inline-block\" class=\"css_noborrar_tmp_enpos_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_noborrar_tmp_enpos_line"><?php $tempOptionId = "id-opt-noborrar_tmp_enpos" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-noborrar_tmp_enpos sc-ui-checkbox-noborrar_tmp_enpos" name="noborrar_tmp_enpos[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_noborrar_tmp_enpos'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->noborrar_tmp_enpos_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('noborrar_tmp_enpos')", "nm_mostra_mens('noborrar_tmp_enpos')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_noborrar_tmp_enpos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_noborrar_tmp_enpos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['validar_correo_enlinea']))
   {
       $this->nm_new_label['validar_correo_enlinea'] = "Validar Correo en Línea";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $validar_correo_enlinea = $this->validar_correo_enlinea;
   $sStyleHidden_validar_correo_enlinea = '';
   if (isset($this->nmgp_cmp_hidden['validar_correo_enlinea']) && $this->nmgp_cmp_hidden['validar_correo_enlinea'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['validar_correo_enlinea']);
       $sStyleHidden_validar_correo_enlinea = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_validar_correo_enlinea = 'display: none;';
   $sStyleReadInp_validar_correo_enlinea = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['validar_correo_enlinea']) && $this->nmgp_cmp_readonly['validar_correo_enlinea'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['validar_correo_enlinea']);
       $sStyleReadLab_validar_correo_enlinea = '';
       $sStyleReadInp_validar_correo_enlinea = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['validar_correo_enlinea']) && $this->nmgp_cmp_hidden['validar_correo_enlinea'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="validar_correo_enlinea" value="<?php echo $this->form_encode_input($this->validar_correo_enlinea) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->validar_correo_enlinea_1 = explode(";", trim($this->validar_correo_enlinea));
  } 
  else
  {
      if (empty($this->validar_correo_enlinea))
      {
          $this->validar_correo_enlinea_1= array(); 
          $this->validar_correo_enlinea= "NO";
      } 
      else
      {
          $this->validar_correo_enlinea_1= $this->validar_correo_enlinea; 
          $this->validar_correo_enlinea= ""; 
          foreach ($this->validar_correo_enlinea_1 as $cada_validar_correo_enlinea)
          {
             if (!empty($validar_correo_enlinea))
             {
                 $this->validar_correo_enlinea.= ";"; 
             } 
             $this->validar_correo_enlinea.= $cada_validar_correo_enlinea; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_validar_correo_enlinea_label" id="hidden_field_label_validar_correo_enlinea" style="<?php echo $sStyleHidden_validar_correo_enlinea; ?>"><span id="id_label_validar_correo_enlinea"><?php echo $this->nm_new_label['validar_correo_enlinea']; ?></span></TD>
    <TD class="scFormDataOdd css_validar_correo_enlinea_line" id="hidden_field_data_validar_correo_enlinea" style="<?php echo $sStyleHidden_validar_correo_enlinea; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_validar_correo_enlinea_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["validar_correo_enlinea"]) &&  $this->nmgp_cmp_readonly["validar_correo_enlinea"] == "on") { 

$validar_correo_enlinea_look = "";
 if ($this->validar_correo_enlinea == "SI") { $validar_correo_enlinea_look .= "SI" ;} 
 if (empty($validar_correo_enlinea_look)) { $validar_correo_enlinea_look = $this->validar_correo_enlinea; }
?>
<input type="hidden" name="validar_correo_enlinea" value="<?php echo $this->form_encode_input($validar_correo_enlinea) . "\">" . $validar_correo_enlinea_look . ""; ?>
<?php } else { ?>

<?php

$validar_correo_enlinea_look = "";
 if ($this->validar_correo_enlinea == "SI") { $validar_correo_enlinea_look .= "SI" ;} 
 if (empty($validar_correo_enlinea_look)) { $validar_correo_enlinea_look = $this->validar_correo_enlinea; }
?>
<span id="id_read_on_validar_correo_enlinea" class="css_validar_correo_enlinea_line" style="<?php echo $sStyleReadLab_validar_correo_enlinea; ?>"><?php echo $this->form_format_readonly("validar_correo_enlinea", $this->form_encode_input($validar_correo_enlinea_look)); ?></span><span id="id_read_off_validar_correo_enlinea" class="css_read_off_validar_correo_enlinea css_validar_correo_enlinea_line" style="<?php echo $sStyleReadInp_validar_correo_enlinea; ?>"><?php echo "<div id=\"idAjaxCheckbox_validar_correo_enlinea\" style=\"display: inline-block\" class=\"css_validar_correo_enlinea_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_validar_correo_enlinea_line"><?php $tempOptionId = "id-opt-validar_correo_enlinea" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-validar_correo_enlinea sc-ui-checkbox-validar_correo_enlinea" name="validar_correo_enlinea[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_validar_correo_enlinea'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->validar_correo_enlinea_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('validar_correo_enlinea')", "nm_mostra_mens('validar_correo_enlinea')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_validar_correo_enlinea_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_validar_correo_enlinea_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="30%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['modificainvpedido']))
   {
       $this->nm_new_label['modificainvpedido'] = "MODIFICAR INVENTARIO DESDE PEDIDO?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modificainvpedido = $this->modificainvpedido;
   $sStyleHidden_modificainvpedido = '';
   if (isset($this->nmgp_cmp_hidden['modificainvpedido']) && $this->nmgp_cmp_hidden['modificainvpedido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modificainvpedido']);
       $sStyleHidden_modificainvpedido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modificainvpedido = 'display: none;';
   $sStyleReadInp_modificainvpedido = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modificainvpedido']) && $this->nmgp_cmp_readonly['modificainvpedido'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modificainvpedido']);
       $sStyleReadLab_modificainvpedido = '';
       $sStyleReadInp_modificainvpedido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modificainvpedido']) && $this->nmgp_cmp_hidden['modificainvpedido'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modificainvpedido" value="<?php echo $this->form_encode_input($this->modificainvpedido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->modificainvpedido_1 = explode(";", trim($this->modificainvpedido));
  } 
  else
  {
      if (empty($this->modificainvpedido))
      {
          $this->modificainvpedido_1= array(); 
          $this->modificainvpedido= "NO";
      } 
      else
      {
          $this->modificainvpedido_1= $this->modificainvpedido; 
          $this->modificainvpedido= ""; 
          foreach ($this->modificainvpedido_1 as $cada_modificainvpedido)
          {
             if (!empty($modificainvpedido))
             {
                 $this->modificainvpedido.= ";"; 
             } 
             $this->modificainvpedido.= $cada_modificainvpedido; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_modificainvpedido_label" id="hidden_field_label_modificainvpedido" style="<?php echo $sStyleHidden_modificainvpedido; ?>"><span id="id_label_modificainvpedido"><?php echo $this->nm_new_label['modificainvpedido']; ?></span></TD>
    <TD class="scFormDataOdd css_modificainvpedido_line" id="hidden_field_data_modificainvpedido" style="<?php echo $sStyleHidden_modificainvpedido; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modificainvpedido_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modificainvpedido"]) &&  $this->nmgp_cmp_readonly["modificainvpedido"] == "on") { 

$modificainvpedido_look = "";
 if ($this->modificainvpedido == "SI") { $modificainvpedido_look .= "" ;} 
 if (empty($modificainvpedido_look)) { $modificainvpedido_look = $this->modificainvpedido; }
?>
<input type="hidden" name="modificainvpedido" value="<?php echo $this->form_encode_input($modificainvpedido) . "\">" . $modificainvpedido_look . ""; ?>
<?php } else { ?>

<?php

$modificainvpedido_look = "";
 if ($this->modificainvpedido == "SI") { $modificainvpedido_look .= "" ;} 
 if (empty($modificainvpedido_look)) { $modificainvpedido_look = $this->modificainvpedido; }
?>
<span id="id_read_on_modificainvpedido" class="css_modificainvpedido_line" style="<?php echo $sStyleReadLab_modificainvpedido; ?>"><?php echo $this->form_format_readonly("modificainvpedido", $this->form_encode_input($modificainvpedido_look)); ?></span><span id="id_read_off_modificainvpedido" class="css_read_off_modificainvpedido css_modificainvpedido_line" style="<?php echo $sStyleReadInp_modificainvpedido; ?>"><?php echo "<div id=\"idAjaxCheckbox_modificainvpedido\" style=\"display: inline-block\" class=\"css_modificainvpedido_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_modificainvpedido_line"><?php $tempOptionId = "id-opt-modificainvpedido" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-modificainvpedido sc-ui-checkbox-modificainvpedido" name="modificainvpedido[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_modificainvpedido'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->modificainvpedido_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modificainvpedido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modificainvpedido_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['apertura_caja']))
   {
       $this->nm_new_label['apertura_caja'] = "MANEJAR APERTURA Y CIERRE DE CAJA?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $apertura_caja = $this->apertura_caja;
   $sStyleHidden_apertura_caja = '';
   if (isset($this->nmgp_cmp_hidden['apertura_caja']) && $this->nmgp_cmp_hidden['apertura_caja'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['apertura_caja']);
       $sStyleHidden_apertura_caja = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_apertura_caja = 'display: none;';
   $sStyleReadInp_apertura_caja = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['apertura_caja']) && $this->nmgp_cmp_readonly['apertura_caja'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['apertura_caja']);
       $sStyleReadLab_apertura_caja = '';
       $sStyleReadInp_apertura_caja = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['apertura_caja']) && $this->nmgp_cmp_hidden['apertura_caja'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="apertura_caja" value="<?php echo $this->form_encode_input($this->apertura_caja) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->apertura_caja_1 = explode(";", trim($this->apertura_caja));
  } 
  else
  {
      if (empty($this->apertura_caja))
      {
          $this->apertura_caja_1= array(); 
          $this->apertura_caja= "NO";
      } 
      else
      {
          $this->apertura_caja_1= $this->apertura_caja; 
          $this->apertura_caja= ""; 
          foreach ($this->apertura_caja_1 as $cada_apertura_caja)
          {
             if (!empty($apertura_caja))
             {
                 $this->apertura_caja.= ";"; 
             } 
             $this->apertura_caja.= $cada_apertura_caja; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_apertura_caja_label" id="hidden_field_label_apertura_caja" style="<?php echo $sStyleHidden_apertura_caja; ?>"><span id="id_label_apertura_caja"><?php echo $this->nm_new_label['apertura_caja']; ?></span></TD>
    <TD class="scFormDataOdd css_apertura_caja_line" id="hidden_field_data_apertura_caja" style="<?php echo $sStyleHidden_apertura_caja; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_apertura_caja_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apertura_caja"]) &&  $this->nmgp_cmp_readonly["apertura_caja"] == "on") { 

$apertura_caja_look = "";
 if ($this->apertura_caja == "SI") { $apertura_caja_look .= "" ;} 
 if (empty($apertura_caja_look)) { $apertura_caja_look = $this->apertura_caja; }
?>
<input type="hidden" name="apertura_caja" value="<?php echo $this->form_encode_input($apertura_caja) . "\">" . $apertura_caja_look . ""; ?>
<?php } else { ?>

<?php

$apertura_caja_look = "";
 if ($this->apertura_caja == "SI") { $apertura_caja_look .= "" ;} 
 if (empty($apertura_caja_look)) { $apertura_caja_look = $this->apertura_caja; }
?>
<span id="id_read_on_apertura_caja" class="css_apertura_caja_line" style="<?php echo $sStyleReadLab_apertura_caja; ?>"><?php echo $this->form_format_readonly("apertura_caja", $this->form_encode_input($apertura_caja_look)); ?></span><span id="id_read_off_apertura_caja" class="css_read_off_apertura_caja css_apertura_caja_line" style="<?php echo $sStyleReadInp_apertura_caja; ?>"><?php echo "<div id=\"idAjaxCheckbox_apertura_caja\" style=\"display: inline-block\" class=\"css_apertura_caja_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_apertura_caja_line"><?php $tempOptionId = "id-opt-apertura_caja" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-apertura_caja sc-ui-checkbox-apertura_caja" name="apertura_caja[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_apertura_caja'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->apertura_caja_1))  { echo " checked" ;} ?> onClick="do_ajax_form_configuraciones_event_apertura_caja_onclick();" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apertura_caja_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apertura_caja_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['caja_movil']))
   {
       $this->nm_new_label['caja_movil'] = "LLAMAR CAJA DESDE MÓVIL?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $caja_movil = $this->caja_movil;
   $sStyleHidden_caja_movil = '';
   if (isset($this->nmgp_cmp_hidden['caja_movil']) && $this->nmgp_cmp_hidden['caja_movil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['caja_movil']);
       $sStyleHidden_caja_movil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_caja_movil = 'display: none;';
   $sStyleReadInp_caja_movil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['caja_movil']) && $this->nmgp_cmp_readonly['caja_movil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['caja_movil']);
       $sStyleReadLab_caja_movil = '';
       $sStyleReadInp_caja_movil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['caja_movil']) && $this->nmgp_cmp_hidden['caja_movil'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="caja_movil" value="<?php echo $this->form_encode_input($this->caja_movil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->caja_movil_1 = explode(";", trim($this->caja_movil));
  } 
  else
  {
      if (empty($this->caja_movil))
      {
          $this->caja_movil_1= array(); 
          $this->caja_movil= "NO";
      } 
      else
      {
          $this->caja_movil_1= $this->caja_movil; 
          $this->caja_movil= ""; 
          foreach ($this->caja_movil_1 as $cada_caja_movil)
          {
             if (!empty($caja_movil))
             {
                 $this->caja_movil.= ";"; 
             } 
             $this->caja_movil.= $cada_caja_movil; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_caja_movil_label" id="hidden_field_label_caja_movil" style="<?php echo $sStyleHidden_caja_movil; ?>"><span id="id_label_caja_movil"><?php echo $this->nm_new_label['caja_movil']; ?></span></TD>
    <TD class="scFormDataOdd css_caja_movil_line" id="hidden_field_data_caja_movil" style="<?php echo $sStyleHidden_caja_movil; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_caja_movil_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["caja_movil"]) &&  $this->nmgp_cmp_readonly["caja_movil"] == "on") { 

$caja_movil_look = "";
 if ($this->caja_movil == "SI") { $caja_movil_look .= "" ;} 
 if (empty($caja_movil_look)) { $caja_movil_look = $this->caja_movil; }
?>
<input type="hidden" name="caja_movil" value="<?php echo $this->form_encode_input($caja_movil) . "\">" . $caja_movil_look . ""; ?>
<?php } else { ?>

<?php

$caja_movil_look = "";
 if ($this->caja_movil == "SI") { $caja_movil_look .= "" ;} 
 if (empty($caja_movil_look)) { $caja_movil_look = $this->caja_movil; }
?>
<span id="id_read_on_caja_movil" class="css_caja_movil_line" style="<?php echo $sStyleReadLab_caja_movil; ?>"><?php echo $this->form_format_readonly("caja_movil", $this->form_encode_input($caja_movil_look)); ?></span><span id="id_read_off_caja_movil" class="css_read_off_caja_movil css_caja_movil_line" style="<?php echo $sStyleReadInp_caja_movil; ?>"><?php echo "<div id=\"idAjaxCheckbox_caja_movil\" style=\"display: inline-block\" class=\"css_caja_movil_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_caja_movil_line"><?php $tempOptionId = "id-opt-caja_movil" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-caja_movil sc-ui-checkbox-caja_movil" name="caja_movil[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_caja_movil'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->caja_movil_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Para llamar caja desde el movil, para cobrar una cuenta desde restaurantes, pedidos, facturas, desde la aplicacion movil</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Para llamar caja desde el movil, para cobrar una cuenta desde restaurantes, pedidos, facturas, desde la aplicacion movil</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_caja_movil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_caja_movil_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['control_diasmora']))
   {
       $this->nm_new_label['control_diasmora'] = "CONTROL CARTERA CON DÍAS DE MORA?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $control_diasmora = $this->control_diasmora;
   $sStyleHidden_control_diasmora = '';
   if (isset($this->nmgp_cmp_hidden['control_diasmora']) && $this->nmgp_cmp_hidden['control_diasmora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['control_diasmora']);
       $sStyleHidden_control_diasmora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_control_diasmora = 'display: none;';
   $sStyleReadInp_control_diasmora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['control_diasmora']) && $this->nmgp_cmp_readonly['control_diasmora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['control_diasmora']);
       $sStyleReadLab_control_diasmora = '';
       $sStyleReadInp_control_diasmora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['control_diasmora']) && $this->nmgp_cmp_hidden['control_diasmora'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="control_diasmora" value="<?php echo $this->form_encode_input($this->control_diasmora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->control_diasmora_1 = explode(";", trim($this->control_diasmora));
  } 
  else
  {
      if (empty($this->control_diasmora))
      {
          $this->control_diasmora_1= array(); 
          $this->control_diasmora= "NO";
      } 
      else
      {
          $this->control_diasmora_1= $this->control_diasmora; 
          $this->control_diasmora= ""; 
          foreach ($this->control_diasmora_1 as $cada_control_diasmora)
          {
             if (!empty($control_diasmora))
             {
                 $this->control_diasmora.= ";"; 
             } 
             $this->control_diasmora.= $cada_control_diasmora; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_control_diasmora_label" id="hidden_field_label_control_diasmora" style="<?php echo $sStyleHidden_control_diasmora; ?>"><span id="id_label_control_diasmora"><?php echo $this->nm_new_label['control_diasmora']; ?></span></TD>
    <TD class="scFormDataOdd css_control_diasmora_line" id="hidden_field_data_control_diasmora" style="<?php echo $sStyleHidden_control_diasmora; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_control_diasmora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["control_diasmora"]) &&  $this->nmgp_cmp_readonly["control_diasmora"] == "on") { 

$control_diasmora_look = "";
 if ($this->control_diasmora == "SI") { $control_diasmora_look .= "" ;} 
 if (empty($control_diasmora_look)) { $control_diasmora_look = $this->control_diasmora; }
?>
<input type="hidden" name="control_diasmora" value="<?php echo $this->form_encode_input($control_diasmora) . "\">" . $control_diasmora_look . ""; ?>
<?php } else { ?>

<?php

$control_diasmora_look = "";
 if ($this->control_diasmora == "SI") { $control_diasmora_look .= "" ;} 
 if (empty($control_diasmora_look)) { $control_diasmora_look = $this->control_diasmora; }
?>
<span id="id_read_on_control_diasmora" class="css_control_diasmora_line" style="<?php echo $sStyleReadLab_control_diasmora; ?>"><?php echo $this->form_format_readonly("control_diasmora", $this->form_encode_input($control_diasmora_look)); ?></span><span id="id_read_off_control_diasmora" class="css_read_off_control_diasmora css_control_diasmora_line" style="<?php echo $sStyleReadInp_control_diasmora; ?>"><?php echo "<div id=\"idAjaxCheckbox_control_diasmora\" style=\"display: inline-block\" class=\"css_control_diasmora_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_control_diasmora_line"><?php $tempOptionId = "id-opt-control_diasmora" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-control_diasmora sc-ui-checkbox-control_diasmora" name="control_diasmora[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_control_diasmora'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->control_diasmora_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_control_diasmora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_control_diasmora_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['control_costo']))
   {
       $this->nm_new_label['control_costo'] = "CONTROLAR VENTAS CON VALOR DEL COSTO?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $control_costo = $this->control_costo;
   $sStyleHidden_control_costo = '';
   if (isset($this->nmgp_cmp_hidden['control_costo']) && $this->nmgp_cmp_hidden['control_costo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['control_costo']);
       $sStyleHidden_control_costo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_control_costo = 'display: none;';
   $sStyleReadInp_control_costo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['control_costo']) && $this->nmgp_cmp_readonly['control_costo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['control_costo']);
       $sStyleReadLab_control_costo = '';
       $sStyleReadInp_control_costo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['control_costo']) && $this->nmgp_cmp_hidden['control_costo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="control_costo" value="<?php echo $this->form_encode_input($this->control_costo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->control_costo_1 = explode(";", trim($this->control_costo));
  } 
  else
  {
      if (empty($this->control_costo))
      {
          $this->control_costo_1= array(); 
          $this->control_costo= "NO";
      } 
      else
      {
          $this->control_costo_1= $this->control_costo; 
          $this->control_costo= ""; 
          foreach ($this->control_costo_1 as $cada_control_costo)
          {
             if (!empty($control_costo))
             {
                 $this->control_costo.= ";"; 
             } 
             $this->control_costo.= $cada_control_costo; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_control_costo_label" id="hidden_field_label_control_costo" style="<?php echo $sStyleHidden_control_costo; ?>"><span id="id_label_control_costo"><?php echo $this->nm_new_label['control_costo']; ?></span></TD>
    <TD class="scFormDataOdd css_control_costo_line" id="hidden_field_data_control_costo" style="<?php echo $sStyleHidden_control_costo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_control_costo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["control_costo"]) &&  $this->nmgp_cmp_readonly["control_costo"] == "on") { 

$control_costo_look = "";
 if ($this->control_costo == "SI") { $control_costo_look .= "" ;} 
 if (empty($control_costo_look)) { $control_costo_look = $this->control_costo; }
?>
<input type="hidden" name="control_costo" value="<?php echo $this->form_encode_input($control_costo) . "\">" . $control_costo_look . ""; ?>
<?php } else { ?>

<?php

$control_costo_look = "";
 if ($this->control_costo == "SI") { $control_costo_look .= "" ;} 
 if (empty($control_costo_look)) { $control_costo_look = $this->control_costo; }
?>
<span id="id_read_on_control_costo" class="css_control_costo_line" style="<?php echo $sStyleReadLab_control_costo; ?>"><?php echo $this->form_format_readonly("control_costo", $this->form_encode_input($control_costo_look)); ?></span><span id="id_read_off_control_costo" class="css_read_off_control_costo css_control_costo_line" style="<?php echo $sStyleReadInp_control_costo; ?>"><?php echo "<div id=\"idAjaxCheckbox_control_costo\" style=\"display: inline-block\" class=\"css_control_costo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_control_costo_line"><?php $tempOptionId = "id-opt-control_costo" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-control_costo sc-ui-checkbox-control_costo" name="control_costo[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_control_costo'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->control_costo_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_control_costo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_control_costo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['activar_console_log']))
   {
       $this->nm_new_label['activar_console_log'] = "ACTIVAR CONSOLE LOG?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $activar_console_log = $this->activar_console_log;
   $sStyleHidden_activar_console_log = '';
   if (isset($this->nmgp_cmp_hidden['activar_console_log']) && $this->nmgp_cmp_hidden['activar_console_log'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['activar_console_log']);
       $sStyleHidden_activar_console_log = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_activar_console_log = 'display: none;';
   $sStyleReadInp_activar_console_log = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['activar_console_log']) && $this->nmgp_cmp_readonly['activar_console_log'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['activar_console_log']);
       $sStyleReadLab_activar_console_log = '';
       $sStyleReadInp_activar_console_log = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['activar_console_log']) && $this->nmgp_cmp_hidden['activar_console_log'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="activar_console_log" value="<?php echo $this->form_encode_input($this->activar_console_log) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->activar_console_log_1 = explode(";", trim($this->activar_console_log));
  } 
  else
  {
      if (empty($this->activar_console_log))
      {
          $this->activar_console_log_1= array(); 
          $this->activar_console_log= "NO";
      } 
      else
      {
          $this->activar_console_log_1= $this->activar_console_log; 
          $this->activar_console_log= ""; 
          foreach ($this->activar_console_log_1 as $cada_activar_console_log)
          {
             if (!empty($activar_console_log))
             {
                 $this->activar_console_log.= ";"; 
             } 
             $this->activar_console_log.= $cada_activar_console_log; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_activar_console_log_label" id="hidden_field_label_activar_console_log" style="<?php echo $sStyleHidden_activar_console_log; ?>"><span id="id_label_activar_console_log"><?php echo $this->nm_new_label['activar_console_log']; ?></span></TD>
    <TD class="scFormDataOdd css_activar_console_log_line" id="hidden_field_data_activar_console_log" style="<?php echo $sStyleHidden_activar_console_log; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activar_console_log_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activar_console_log"]) &&  $this->nmgp_cmp_readonly["activar_console_log"] == "on") { 

$activar_console_log_look = "";
 if ($this->activar_console_log == "SI") { $activar_console_log_look .= "" ;} 
 if (empty($activar_console_log_look)) { $activar_console_log_look = $this->activar_console_log; }
?>
<input type="hidden" name="activar_console_log" value="<?php echo $this->form_encode_input($activar_console_log) . "\">" . $activar_console_log_look . ""; ?>
<?php } else { ?>

<?php

$activar_console_log_look = "";
 if ($this->activar_console_log == "SI") { $activar_console_log_look .= "" ;} 
 if (empty($activar_console_log_look)) { $activar_console_log_look = $this->activar_console_log; }
?>
<span id="id_read_on_activar_console_log" class="css_activar_console_log_line" style="<?php echo $sStyleReadLab_activar_console_log; ?>"><?php echo $this->form_format_readonly("activar_console_log", $this->form_encode_input($activar_console_log_look)); ?></span><span id="id_read_off_activar_console_log" class="css_read_off_activar_console_log css_activar_console_log_line" style="<?php echo $sStyleReadInp_activar_console_log; ?>"><?php echo "<div id=\"idAjaxCheckbox_activar_console_log\" style=\"display: inline-block\" class=\"css_activar_console_log_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_activar_console_log_line"><?php $tempOptionId = "id-opt-activar_console_log" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-activar_console_log sc-ui-checkbox-activar_console_log" name="activar_console_log[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_activar_console_log'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->activar_console_log_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('activar_console_log')", "nm_mostra_mens('activar_console_log')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activar_console_log_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activar_console_log_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pago_automatico']))
   {
       $this->nm_new_label['pago_automatico'] = "COMPROBANTE DE EGRESO AUTOMÁTICO EN COMPRAS?:";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pago_automatico = $this->pago_automatico;
   $sStyleHidden_pago_automatico = '';
   if (isset($this->nmgp_cmp_hidden['pago_automatico']) && $this->nmgp_cmp_hidden['pago_automatico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pago_automatico']);
       $sStyleHidden_pago_automatico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pago_automatico = 'display: none;';
   $sStyleReadInp_pago_automatico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pago_automatico']) && $this->nmgp_cmp_readonly['pago_automatico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pago_automatico']);
       $sStyleReadLab_pago_automatico = '';
       $sStyleReadInp_pago_automatico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pago_automatico']) && $this->nmgp_cmp_hidden['pago_automatico'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pago_automatico" value="<?php echo $this->form_encode_input($this->pago_automatico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->pago_automatico_1 = explode(";", trim($this->pago_automatico));
  } 
  else
  {
      if (empty($this->pago_automatico))
      {
          $this->pago_automatico_1= array(); 
          $this->pago_automatico= "NO";
      } 
      else
      {
          $this->pago_automatico_1= $this->pago_automatico; 
          $this->pago_automatico= ""; 
          foreach ($this->pago_automatico_1 as $cada_pago_automatico)
          {
             if (!empty($pago_automatico))
             {
                 $this->pago_automatico.= ";"; 
             } 
             $this->pago_automatico.= $cada_pago_automatico; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pago_automatico_label" id="hidden_field_label_pago_automatico" style="<?php echo $sStyleHidden_pago_automatico; ?>"><span id="id_label_pago_automatico"><?php echo $this->nm_new_label['pago_automatico']; ?></span></TD>
    <TD class="scFormDataOdd css_pago_automatico_line" id="hidden_field_data_pago_automatico" style="<?php echo $sStyleHidden_pago_automatico; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pago_automatico_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pago_automatico"]) &&  $this->nmgp_cmp_readonly["pago_automatico"] == "on") { 

$pago_automatico_look = "";
 if ($this->pago_automatico == "SI") { $pago_automatico_look .= "" ;} 
 if (empty($pago_automatico_look)) { $pago_automatico_look = $this->pago_automatico; }
?>
<input type="hidden" name="pago_automatico" value="<?php echo $this->form_encode_input($pago_automatico) . "\">" . $pago_automatico_look . ""; ?>
<?php } else { ?>

<?php

$pago_automatico_look = "";
 if ($this->pago_automatico == "SI") { $pago_automatico_look .= "" ;} 
 if (empty($pago_automatico_look)) { $pago_automatico_look = $this->pago_automatico; }
?>
<span id="id_read_on_pago_automatico" class="css_pago_automatico_line" style="<?php echo $sStyleReadLab_pago_automatico; ?>"><?php echo $this->form_format_readonly("pago_automatico", $this->form_encode_input($pago_automatico_look)); ?></span><span id="id_read_off_pago_automatico" class="css_read_off_pago_automatico css_pago_automatico_line" style="<?php echo $sStyleReadInp_pago_automatico; ?>"><?php echo "<div id=\"idAjaxCheckbox_pago_automatico\" style=\"display: inline-block\" class=\"css_pago_automatico_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_pago_automatico_line"><?php $tempOptionId = "id-opt-pago_automatico" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-pago_automatico sc-ui-checkbox-pago_automatico" name="pago_automatico[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_pago_automatico'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->pago_automatico_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('pago_automatico')", "nm_mostra_mens('pago_automatico')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pago_automatico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pago_automatico_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipodoc_pordefecto_pos']))
   {
       $this->nm_new_label['tipodoc_pordefecto_pos'] = "DOCUMENTO POR DEFECTO EN POS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipodoc_pordefecto_pos = $this->tipodoc_pordefecto_pos;
   $sStyleHidden_tipodoc_pordefecto_pos = '';
   if (isset($this->nmgp_cmp_hidden['tipodoc_pordefecto_pos']) && $this->nmgp_cmp_hidden['tipodoc_pordefecto_pos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipodoc_pordefecto_pos']);
       $sStyleHidden_tipodoc_pordefecto_pos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipodoc_pordefecto_pos = 'display: none;';
   $sStyleReadInp_tipodoc_pordefecto_pos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipodoc_pordefecto_pos']) && $this->nmgp_cmp_readonly['tipodoc_pordefecto_pos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipodoc_pordefecto_pos']);
       $sStyleReadLab_tipodoc_pordefecto_pos = '';
       $sStyleReadInp_tipodoc_pordefecto_pos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipodoc_pordefecto_pos']) && $this->nmgp_cmp_hidden['tipodoc_pordefecto_pos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipodoc_pordefecto_pos" value="<?php echo $this->form_encode_input($this->tipodoc_pordefecto_pos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipodoc_pordefecto_pos_label" id="hidden_field_label_tipodoc_pordefecto_pos" style="<?php echo $sStyleHidden_tipodoc_pordefecto_pos; ?>"><span id="id_label_tipodoc_pordefecto_pos"><?php echo $this->nm_new_label['tipodoc_pordefecto_pos']; ?></span></TD>
    <TD class="scFormDataOdd css_tipodoc_pordefecto_pos_line" id="hidden_field_data_tipodoc_pordefecto_pos" style="<?php echo $sStyleHidden_tipodoc_pordefecto_pos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipodoc_pordefecto_pos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipodoc_pordefecto_pos"]) &&  $this->nmgp_cmp_readonly["tipodoc_pordefecto_pos"] == "on") { 

$tipodoc_pordefecto_pos_look = "";
 if ($this->tipodoc_pordefecto_pos == "FV") { $tipodoc_pordefecto_pos_look .= "FACTURA" ;} 
 if ($this->tipodoc_pordefecto_pos == "RS") { $tipodoc_pordefecto_pos_look .= "REMISIÓN" ;} 
 if (empty($tipodoc_pordefecto_pos_look)) { $tipodoc_pordefecto_pos_look = $this->tipodoc_pordefecto_pos; }
?>
<input type="hidden" name="tipodoc_pordefecto_pos" value="<?php echo $this->form_encode_input($tipodoc_pordefecto_pos) . "\">" . $tipodoc_pordefecto_pos_look . ""; ?>
<?php } else { ?>
<?php

$tipodoc_pordefecto_pos_look = "";
 if ($this->tipodoc_pordefecto_pos == "FV") { $tipodoc_pordefecto_pos_look .= "FACTURA" ;} 
 if ($this->tipodoc_pordefecto_pos == "RS") { $tipodoc_pordefecto_pos_look .= "REMISIÓN" ;} 
 if (empty($tipodoc_pordefecto_pos_look)) { $tipodoc_pordefecto_pos_look = $this->tipodoc_pordefecto_pos; }
?>
<span id="id_read_on_tipodoc_pordefecto_pos" class="css_tipodoc_pordefecto_pos_line"  style="<?php echo $sStyleReadLab_tipodoc_pordefecto_pos; ?>"><?php echo $this->form_format_readonly("tipodoc_pordefecto_pos", $this->form_encode_input($tipodoc_pordefecto_pos_look)); ?></span><span id="id_read_off_tipodoc_pordefecto_pos" class="css_read_off_tipodoc_pordefecto_pos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipodoc_pordefecto_pos; ?>">
 <span id="idAjaxSelect_tipodoc_pordefecto_pos" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipodoc_pordefecto_pos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipodoc_pordefecto_pos" name="tipodoc_pordefecto_pos" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="FV" <?php  if ($this->tipodoc_pordefecto_pos == "FV") { echo " selected" ;} ?><?php  if (empty($this->tipodoc_pordefecto_pos)) { echo " selected" ;} ?>>FACTURA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_tipodoc_pordefecto_pos'][] = 'FV'; ?>
 <option  value="RS" <?php  if ($this->tipodoc_pordefecto_pos == "RS") { echo " selected" ;} ?>>REMISIÓN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_tipodoc_pordefecto_pos'][] = 'RS'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('tipodoc_pordefecto_pos')", "nm_mostra_mens('tipodoc_pordefecto_pos')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipodoc_pordefecto_pos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipodoc_pordefecto_pos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['codproducto_en_facventa']))
   {
       $this->nm_new_label['codproducto_en_facventa'] = "MOSTRAR CODPRODUCTO EN POS";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codproducto_en_facventa = $this->codproducto_en_facventa;
   $sStyleHidden_codproducto_en_facventa = '';
   if (isset($this->nmgp_cmp_hidden['codproducto_en_facventa']) && $this->nmgp_cmp_hidden['codproducto_en_facventa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codproducto_en_facventa']);
       $sStyleHidden_codproducto_en_facventa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codproducto_en_facventa = 'display: none;';
   $sStyleReadInp_codproducto_en_facventa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codproducto_en_facventa']) && $this->nmgp_cmp_readonly['codproducto_en_facventa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codproducto_en_facventa']);
       $sStyleReadLab_codproducto_en_facventa = '';
       $sStyleReadInp_codproducto_en_facventa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codproducto_en_facventa']) && $this->nmgp_cmp_hidden['codproducto_en_facventa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codproducto_en_facventa" value="<?php echo $this->form_encode_input($this->codproducto_en_facventa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->codproducto_en_facventa_1 = explode(";", trim($this->codproducto_en_facventa));
  } 
  else
  {
      if (empty($this->codproducto_en_facventa))
      {
          $this->codproducto_en_facventa_1= array(); 
          $this->codproducto_en_facventa= "NO";
      } 
      else
      {
          $this->codproducto_en_facventa_1= $this->codproducto_en_facventa; 
          $this->codproducto_en_facventa= ""; 
          foreach ($this->codproducto_en_facventa_1 as $cada_codproducto_en_facventa)
          {
             if (!empty($codproducto_en_facventa))
             {
                 $this->codproducto_en_facventa.= ";"; 
             } 
             $this->codproducto_en_facventa.= $cada_codproducto_en_facventa; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codproducto_en_facventa_label" id="hidden_field_label_codproducto_en_facventa" style="<?php echo $sStyleHidden_codproducto_en_facventa; ?>"><span id="id_label_codproducto_en_facventa"><?php echo $this->nm_new_label['codproducto_en_facventa']; ?></span></TD>
    <TD class="scFormDataOdd css_codproducto_en_facventa_line" id="hidden_field_data_codproducto_en_facventa" style="<?php echo $sStyleHidden_codproducto_en_facventa; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codproducto_en_facventa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codproducto_en_facventa"]) &&  $this->nmgp_cmp_readonly["codproducto_en_facventa"] == "on") { 

$codproducto_en_facventa_look = "";
 if ($this->codproducto_en_facventa == "SI") { $codproducto_en_facventa_look .= "" ;} 
 if (empty($codproducto_en_facventa_look)) { $codproducto_en_facventa_look = $this->codproducto_en_facventa; }
?>
<input type="hidden" name="codproducto_en_facventa" value="<?php echo $this->form_encode_input($codproducto_en_facventa) . "\">" . $codproducto_en_facventa_look . ""; ?>
<?php } else { ?>

<?php

$codproducto_en_facventa_look = "";
 if ($this->codproducto_en_facventa == "SI") { $codproducto_en_facventa_look .= "" ;} 
 if (empty($codproducto_en_facventa_look)) { $codproducto_en_facventa_look = $this->codproducto_en_facventa; }
?>
<span id="id_read_on_codproducto_en_facventa" class="css_codproducto_en_facventa_line" style="<?php echo $sStyleReadLab_codproducto_en_facventa; ?>"><?php echo $this->form_format_readonly("codproducto_en_facventa", $this->form_encode_input($codproducto_en_facventa_look)); ?></span><span id="id_read_off_codproducto_en_facventa" class="css_read_off_codproducto_en_facventa css_codproducto_en_facventa_line" style="<?php echo $sStyleReadInp_codproducto_en_facventa; ?>"><?php echo "<div id=\"idAjaxCheckbox_codproducto_en_facventa\" style=\"display: inline-block\" class=\"css_codproducto_en_facventa_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_codproducto_en_facventa_line"><?php $tempOptionId = "id-opt-codproducto_en_facventa" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-codproducto_en_facventa sc-ui-checkbox-codproducto_en_facventa" name="codproducto_en_facventa[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_codproducto_en_facventa'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->codproducto_en_facventa_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>"></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('codproducto_en_facventa')", "nm_mostra_mens('codproducto_en_facventa')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codproducto_en_facventa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codproducto_en_facventa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dia_limite_pago']))
    {
        $this->nm_new_label['dia_limite_pago'] = "DÍA LÍMITE DE PAGO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dia_limite_pago = $this->dia_limite_pago;
   $sStyleHidden_dia_limite_pago = '';
   if (isset($this->nmgp_cmp_hidden['dia_limite_pago']) && $this->nmgp_cmp_hidden['dia_limite_pago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dia_limite_pago']);
       $sStyleHidden_dia_limite_pago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dia_limite_pago = 'display: none;';
   $sStyleReadInp_dia_limite_pago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dia_limite_pago']) && $this->nmgp_cmp_readonly['dia_limite_pago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dia_limite_pago']);
       $sStyleReadLab_dia_limite_pago = '';
       $sStyleReadInp_dia_limite_pago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dia_limite_pago']) && $this->nmgp_cmp_hidden['dia_limite_pago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dia_limite_pago" value="<?php echo $this->form_encode_input($dia_limite_pago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dia_limite_pago_label" id="hidden_field_label_dia_limite_pago" style="<?php echo $sStyleHidden_dia_limite_pago; ?>"><span id="id_label_dia_limite_pago"><?php echo $this->nm_new_label['dia_limite_pago']; ?></span></TD>
    <TD class="scFormDataOdd css_dia_limite_pago_line" id="hidden_field_data_dia_limite_pago" style="<?php echo $sStyleHidden_dia_limite_pago; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dia_limite_pago_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dia_limite_pago"]) &&  $this->nmgp_cmp_readonly["dia_limite_pago"] == "on") { 

 ?>
<input type="hidden" name="dia_limite_pago" value="<?php echo $this->form_encode_input($dia_limite_pago) . "\">" . $dia_limite_pago . ""; ?>
<?php } else { ?>
<span id="id_read_on_dia_limite_pago" class="sc-ui-readonly-dia_limite_pago css_dia_limite_pago_line" style="<?php echo $sStyleReadLab_dia_limite_pago; ?>"><?php echo $this->form_format_readonly("dia_limite_pago", $this->form_encode_input($this->dia_limite_pago)); ?></span><span id="id_read_off_dia_limite_pago" class="css_read_off_dia_limite_pago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dia_limite_pago; ?>">
 <input class="sc-js-input scFormObjectOdd css_dia_limite_pago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dia_limite_pago" type=text name="dia_limite_pago" value="<?php echo $this->form_encode_input($dia_limite_pago) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dia_limite_pago']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dia_limite_pago']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dia_limite_pago']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'center', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dia_limite_pago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dia_limite_pago_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_propina_sugerida']))
    {
        $this->nm_new_label['valor_propina_sugerida'] = "PORCENTAJE PROPINA SUGERIDA (Restaurantes)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_propina_sugerida = $this->valor_propina_sugerida;
   $sStyleHidden_valor_propina_sugerida = '';
   if (isset($this->nmgp_cmp_hidden['valor_propina_sugerida']) && $this->nmgp_cmp_hidden['valor_propina_sugerida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_propina_sugerida']);
       $sStyleHidden_valor_propina_sugerida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_propina_sugerida = 'display: none;';
   $sStyleReadInp_valor_propina_sugerida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_propina_sugerida']) && $this->nmgp_cmp_readonly['valor_propina_sugerida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_propina_sugerida']);
       $sStyleReadLab_valor_propina_sugerida = '';
       $sStyleReadInp_valor_propina_sugerida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_propina_sugerida']) && $this->nmgp_cmp_hidden['valor_propina_sugerida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_propina_sugerida" value="<?php echo $this->form_encode_input($valor_propina_sugerida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valor_propina_sugerida_label" id="hidden_field_label_valor_propina_sugerida" style="<?php echo $sStyleHidden_valor_propina_sugerida; ?>"><span id="id_label_valor_propina_sugerida"><?php echo $this->nm_new_label['valor_propina_sugerida']; ?></span></TD>
    <TD class="scFormDataOdd css_valor_propina_sugerida_line" id="hidden_field_data_valor_propina_sugerida" style="<?php echo $sStyleHidden_valor_propina_sugerida; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_propina_sugerida_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_propina_sugerida"]) &&  $this->nmgp_cmp_readonly["valor_propina_sugerida"] == "on") { 

 ?>
<input type="hidden" name="valor_propina_sugerida" value="<?php echo $this->form_encode_input($valor_propina_sugerida) . "\">" . $valor_propina_sugerida . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_propina_sugerida" class="sc-ui-readonly-valor_propina_sugerida css_valor_propina_sugerida_line" style="<?php echo $sStyleReadLab_valor_propina_sugerida; ?>"><?php echo $this->form_format_readonly("valor_propina_sugerida", $this->form_encode_input($this->valor_propina_sugerida)); ?></span><span id="id_read_off_valor_propina_sugerida" class="css_read_off_valor_propina_sugerida<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_propina_sugerida; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_propina_sugerida_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_propina_sugerida" type=text name="valor_propina_sugerida" value="<?php echo $this->form_encode_input($valor_propina_sugerida) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['valor_propina_sugerida']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['valor_propina_sugerida']['format_pos'] || 3 == $this->field_config['valor_propina_sugerida']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 15, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_propina_sugerida']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_propina_sugerida']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_propina_sugerida']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_propina_sugerida']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('valor_propina_sugerida')", "nm_mostra_mens('valor_propina_sugerida')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_propina_sugerida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_propina_sugerida_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['ver_xml_fe']))
   {
       $this->nm_new_label['ver_xml_fe'] = "Ver JSON FE";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ver_xml_fe = $this->ver_xml_fe;
   $sStyleHidden_ver_xml_fe = '';
   if (isset($this->nmgp_cmp_hidden['ver_xml_fe']) && $this->nmgp_cmp_hidden['ver_xml_fe'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ver_xml_fe']);
       $sStyleHidden_ver_xml_fe = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ver_xml_fe = 'display: none;';
   $sStyleReadInp_ver_xml_fe = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ver_xml_fe']) && $this->nmgp_cmp_readonly['ver_xml_fe'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ver_xml_fe']);
       $sStyleReadLab_ver_xml_fe = '';
       $sStyleReadInp_ver_xml_fe = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ver_xml_fe']) && $this->nmgp_cmp_hidden['ver_xml_fe'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ver_xml_fe" value="<?php echo $this->form_encode_input($this->ver_xml_fe) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->ver_xml_fe_1 = explode(";", trim($this->ver_xml_fe));
  } 
  else
  {
      if (empty($this->ver_xml_fe))
      {
          $this->ver_xml_fe_1= array(); 
          $this->ver_xml_fe= "NO";
      } 
      else
      {
          $this->ver_xml_fe_1= $this->ver_xml_fe; 
          $this->ver_xml_fe= ""; 
          foreach ($this->ver_xml_fe_1 as $cada_ver_xml_fe)
          {
             if (!empty($ver_xml_fe))
             {
                 $this->ver_xml_fe.= ";"; 
             } 
             $this->ver_xml_fe.= $cada_ver_xml_fe; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ver_xml_fe_label" id="hidden_field_label_ver_xml_fe" style="<?php echo $sStyleHidden_ver_xml_fe; ?>"><span id="id_label_ver_xml_fe"><?php echo $this->nm_new_label['ver_xml_fe']; ?></span></TD>
    <TD class="scFormDataOdd css_ver_xml_fe_line" id="hidden_field_data_ver_xml_fe" style="<?php echo $sStyleHidden_ver_xml_fe; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ver_xml_fe_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ver_xml_fe"]) &&  $this->nmgp_cmp_readonly["ver_xml_fe"] == "on") { 

$ver_xml_fe_look = "";
 if ($this->ver_xml_fe == "SI") { $ver_xml_fe_look .= "SI" ;} 
 if (empty($ver_xml_fe_look)) { $ver_xml_fe_look = $this->ver_xml_fe; }
?>
<input type="hidden" name="ver_xml_fe" value="<?php echo $this->form_encode_input($ver_xml_fe) . "\">" . $ver_xml_fe_look . ""; ?>
<?php } else { ?>

<?php

$ver_xml_fe_look = "";
 if ($this->ver_xml_fe == "SI") { $ver_xml_fe_look .= "SI" ;} 
 if (empty($ver_xml_fe_look)) { $ver_xml_fe_look = $this->ver_xml_fe; }
?>
<span id="id_read_on_ver_xml_fe" class="css_ver_xml_fe_line" style="<?php echo $sStyleReadLab_ver_xml_fe; ?>"><?php echo $this->form_format_readonly("ver_xml_fe", $this->form_encode_input($ver_xml_fe_look)); ?></span><span id="id_read_off_ver_xml_fe" class="css_read_off_ver_xml_fe css_ver_xml_fe_line" style="<?php echo $sStyleReadInp_ver_xml_fe; ?>"><?php echo "<div id=\"idAjaxCheckbox_ver_xml_fe\" style=\"display: inline-block\" class=\"css_ver_xml_fe_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ver_xml_fe_line"><?php $tempOptionId = "id-opt-ver_xml_fe" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-ver_xml_fe sc-ui-checkbox-ver_xml_fe" name="ver_xml_fe[]" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_xml_fe'][] = 'SI'; ?>
<?php  if (in_array("SI", $this->ver_xml_fe_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">SI</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('ver_xml_fe')", "nm_mostra_mens('ver_xml_fe')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ver_xml_fe_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ver_xml_fe_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idconfiguraciones']))
           {
               $this->nmgp_cmp_readonly['idconfiguraciones'] = 'on';
           }
?>


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
