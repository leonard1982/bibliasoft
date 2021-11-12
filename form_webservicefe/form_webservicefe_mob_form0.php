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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("WebService Proveedor FE "); } else { echo strip_tags("WebService Proveedor FE "); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_webservicefe/form_webservicefe_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_webservicefe_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['last'] : 'off'); ?>";
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
<?php

include_once('form_webservicefe_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_webservicefe']['error_buffer']) && '' != $_SESSION['scriptcase']['form_webservicefe']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_webservicefe']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_webservicefe_mob_js0.php");
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
               action="form_webservicefe_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['insert_validation']; ?>">
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
<input type="hidden" name="idwebservicefe" value="<?php  echo $this->form_encode_input($this->idwebservicefe) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_webservicefe_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_webservicefe_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "WebService Proveedor FE "; } else { echo "WebService Proveedor FE "; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_webservicefe_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_webservicefe_mob_form0' => array(
            'title' => "Producción",
            'class' => $nmgp_num_form == "form_webservicefe_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_webservicefe_mob_form1' => array(
            'title' => "Pruebas",
            'class' => $nmgp_num_form == "form_webservicefe_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
        'form_webservicefe_mob_form2' => array(
            'title' => "Proveedor Anterior",
            'class' => $nmgp_num_form == "form_webservicefe_mob_form2" ? "scTabActive" : "scTabInactive",
        ),
        'form_webservicefe_mob_form3' => array(
            'title' => "Adicionales",
            'class' => $nmgp_num_form == "form_webservicefe_mob_form3" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Producción' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_webservicefe_mob_form0']['class'] = 'scTabInactive';
                        }
                        if ('Pruebas' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_webservicefe_mob_form1']['class'] = 'scTabInactive';
                        }
                        if ('Proveedor Anterior' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_webservicefe_mob_form2']['class'] = 'scTabInactive';
                        }
                        if ('Adicionales' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_webservicefe_mob_form3']['class'] = 'scTabInactive';
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
    $css_celula = $this->tabCssClass["form_webservicefe_mob_form0"]['class'];
?>
   <li id="id_form_webservicefe_mob_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_webservicefe_mob_form0')">
     Producción
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_webservicefe_mob_form1"]['class'];
?>
   <li id="id_form_webservicefe_mob_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_webservicefe_mob_form1')">
     Pruebas
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_webservicefe_mob_form2"]['class'];
?>
   <li id="id_form_webservicefe_mob_form2" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_webservicefe_mob_form2')">
     Proveedor Anterior
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_webservicefe_mob_form3"]['class'];
?>
   <li id="id_form_webservicefe_mob_form3" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_webservicefe_mob_form3')">
     Adicionales
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_webservicefe_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Producción</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['proveedor']))
   {
       $this->nm_new_label['proveedor'] = "Proveedor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proveedor = $this->proveedor;
   $sStyleHidden_proveedor = '';
   if (isset($this->nmgp_cmp_hidden['proveedor']) && $this->nmgp_cmp_hidden['proveedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proveedor']);
       $sStyleHidden_proveedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proveedor = 'display: none;';
   $sStyleReadInp_proveedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proveedor']) && $this->nmgp_cmp_readonly['proveedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proveedor']);
       $sStyleReadLab_proveedor = '';
       $sStyleReadInp_proveedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proveedor']) && $this->nmgp_cmp_hidden['proveedor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="proveedor" value="<?php echo $this->form_encode_input($this->proveedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_proveedor_line" id="hidden_field_data_proveedor" style="<?php echo $sStyleHidden_proveedor; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proveedor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_proveedor_label" style=""><span id="id_label_proveedor"><?php echo $this->nm_new_label['proveedor']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proveedor"]) &&  $this->nmgp_cmp_readonly["proveedor"] == "on") { 

$proveedor_look = "";
 if ($this->proveedor == "FACILWEB") { $proveedor_look .= "FACILWEB" ;} 
 if ($this->proveedor == "DATAICO") { $proveedor_look .= "DATAICO" ;} 
 if ($this->proveedor == "CADENA S. A.") { $proveedor_look .= "CADENA S. A." ;} 
 if ($this->proveedor == "THE FACTORY HKA") { $proveedor_look .= "THE FACTORY HKA" ;} 
 if (empty($proveedor_look)) { $proveedor_look = $this->proveedor; }
?>
<input type="hidden" name="proveedor" value="<?php echo $this->form_encode_input($proveedor) . "\">" . $proveedor_look . ""; ?>
<?php } else { ?>
<?php

$proveedor_look = "";
 if ($this->proveedor == "FACILWEB") { $proveedor_look .= "FACILWEB" ;} 
 if ($this->proveedor == "DATAICO") { $proveedor_look .= "DATAICO" ;} 
 if ($this->proveedor == "CADENA S. A.") { $proveedor_look .= "CADENA S. A." ;} 
 if ($this->proveedor == "THE FACTORY HKA") { $proveedor_look .= "THE FACTORY HKA" ;} 
 if (empty($proveedor_look)) { $proveedor_look = $this->proveedor; }
?>
<span id="id_read_on_proveedor" class="css_proveedor_line"  style="<?php echo $sStyleReadLab_proveedor; ?>"><?php echo $this->form_format_readonly("proveedor", $this->form_encode_input($proveedor_look)); ?></span><span id="id_read_off_proveedor" class="css_read_off_proveedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_proveedor; ?>">
 <span id="idAjaxSelect_proveedor" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_proveedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_proveedor" name="proveedor" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_proveedor'][] = ''; ?>
 <option value=""></option>
 <option  value="FACILWEB" <?php  if ($this->proveedor == "FACILWEB") { echo " selected" ;} ?>>FACILWEB</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_proveedor'][] = 'FACILWEB'; ?>
 <option  value="DATAICO" <?php  if ($this->proveedor == "DATAICO") { echo " selected" ;} ?>>DATAICO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_proveedor'][] = 'DATAICO'; ?>
 <option  value="CADENA S. A." <?php  if ($this->proveedor == "CADENA S. A.") { echo " selected" ;} ?>>CADENA S. A.</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_proveedor'][] = 'CADENA S. A.'; ?>
 <option  value="THE FACTORY HKA" <?php  if ($this->proveedor == "THE FACTORY HKA") { echo " selected" ;} ?>>THE FACTORY HKA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_proveedor'][] = 'THE FACTORY HKA'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proveedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proveedor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['modo']))
   {
       $this->nm_new_label['modo'] = "Modo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modo = $this->modo;
   $sStyleHidden_modo = '';
   if (isset($this->nmgp_cmp_hidden['modo']) && $this->nmgp_cmp_hidden['modo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modo']);
       $sStyleHidden_modo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modo = 'display: none;';
   $sStyleReadInp_modo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modo']) && $this->nmgp_cmp_readonly['modo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modo']);
       $sStyleReadLab_modo = '';
       $sStyleReadInp_modo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modo']) && $this->nmgp_cmp_hidden['modo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modo" value="<?php echo $this->form_encode_input($this->modo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_modo_line" id="hidden_field_data_modo" style="<?php echo $sStyleHidden_modo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_modo_label" style=""><span id="id_label_modo"><?php echo $this->nm_new_label['modo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modo"]) &&  $this->nmgp_cmp_readonly["modo"] == "on") { 

$modo_look = "";
 if ($this->modo == "PRUEBAS") { $modo_look .= "PRUEBAS" ;} 
 if ($this->modo == "PRODUCCION") { $modo_look .= "PRODUCCIÓN" ;} 
 if (empty($modo_look)) { $modo_look = $this->modo; }
?>
<input type="hidden" name="modo" value="<?php echo $this->form_encode_input($modo) . "\">" . $modo_look . ""; ?>
<?php } else { ?>
<?php

$modo_look = "";
 if ($this->modo == "PRUEBAS") { $modo_look .= "PRUEBAS" ;} 
 if ($this->modo == "PRODUCCION") { $modo_look .= "PRODUCCIÓN" ;} 
 if (empty($modo_look)) { $modo_look = $this->modo; }
?>
<span id="id_read_on_modo" class="css_modo_line"  style="<?php echo $sStyleReadLab_modo; ?>"><?php echo $this->form_format_readonly("modo", $this->form_encode_input($modo_look)); ?></span><span id="id_read_off_modo" class="css_read_off_modo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_modo; ?>">
 <span id="idAjaxSelect_modo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_modo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_modo" name="modo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="PRUEBAS" <?php  if ($this->modo == "PRUEBAS") { echo " selected" ;} ?>>PRUEBAS</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_modo'][] = 'PRUEBAS'; ?>
 <option  value="PRODUCCION" <?php  if ($this->modo == "PRODUCCION") { echo " selected" ;} ?>>PRODUCCIÓN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_webservicefe_mob']['Lookup_modo'][] = 'PRODUCCION'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor1']))
    {
        $this->nm_new_label['servidor1'] = "Servidor 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor1 = $this->servidor1;
   $sStyleHidden_servidor1 = '';
   if (isset($this->nmgp_cmp_hidden['servidor1']) && $this->nmgp_cmp_hidden['servidor1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor1']);
       $sStyleHidden_servidor1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor1 = 'display: none;';
   $sStyleReadInp_servidor1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor1']) && $this->nmgp_cmp_readonly['servidor1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor1']);
       $sStyleReadLab_servidor1 = '';
       $sStyleReadInp_servidor1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor1']) && $this->nmgp_cmp_hidden['servidor1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor1" value="<?php echo $this->form_encode_input($servidor1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor1_line" id="hidden_field_data_servidor1" style="<?php echo $sStyleHidden_servidor1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor1_label" style=""><span id="id_label_servidor1"><?php echo $this->nm_new_label['servidor1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor1"]) &&  $this->nmgp_cmp_readonly["servidor1"] == "on") { 

 ?>
<input type="hidden" name="servidor1" value="<?php echo $this->form_encode_input($servidor1) . "\">" . $servidor1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor1" class="sc-ui-readonly-servidor1 css_servidor1_line" style="<?php echo $sStyleReadLab_servidor1; ?>"><?php echo $this->form_format_readonly("servidor1", $this->form_encode_input($this->servidor1)); ?></span><span id="id_read_off_servidor1" class="css_read_off_servidor1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor1; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor1" type=text name="servidor1" value="<?php echo $this->form_encode_input($servidor1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor2']))
    {
        $this->nm_new_label['servidor2'] = "Servidor 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor2 = $this->servidor2;
   $sStyleHidden_servidor2 = '';
   if (isset($this->nmgp_cmp_hidden['servidor2']) && $this->nmgp_cmp_hidden['servidor2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor2']);
       $sStyleHidden_servidor2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor2 = 'display: none;';
   $sStyleReadInp_servidor2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor2']) && $this->nmgp_cmp_readonly['servidor2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor2']);
       $sStyleReadLab_servidor2 = '';
       $sStyleReadInp_servidor2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor2']) && $this->nmgp_cmp_hidden['servidor2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor2" value="<?php echo $this->form_encode_input($servidor2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor2_line" id="hidden_field_data_servidor2" style="<?php echo $sStyleHidden_servidor2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor2_label" style=""><span id="id_label_servidor2"><?php echo $this->nm_new_label['servidor2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor2"]) &&  $this->nmgp_cmp_readonly["servidor2"] == "on") { 

 ?>
<input type="hidden" name="servidor2" value="<?php echo $this->form_encode_input($servidor2) . "\">" . $servidor2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor2" class="sc-ui-readonly-servidor2 css_servidor2_line" style="<?php echo $sStyleReadLab_servidor2; ?>"><?php echo $this->form_format_readonly("servidor2", $this->form_encode_input($this->servidor2)); ?></span><span id="id_read_off_servidor2" class="css_read_off_servidor2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor2; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor2" type=text name="servidor2" value="<?php echo $this->form_encode_input($servidor2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor3']))
    {
        $this->nm_new_label['servidor3'] = "Servidor 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor3 = $this->servidor3;
   $sStyleHidden_servidor3 = '';
   if (isset($this->nmgp_cmp_hidden['servidor3']) && $this->nmgp_cmp_hidden['servidor3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor3']);
       $sStyleHidden_servidor3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor3 = 'display: none;';
   $sStyleReadInp_servidor3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor3']) && $this->nmgp_cmp_readonly['servidor3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor3']);
       $sStyleReadLab_servidor3 = '';
       $sStyleReadInp_servidor3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor3']) && $this->nmgp_cmp_hidden['servidor3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor3" value="<?php echo $this->form_encode_input($servidor3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor3_line" id="hidden_field_data_servidor3" style="<?php echo $sStyleHidden_servidor3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servidor3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor3_label" style=""><span id="id_label_servidor3"><?php echo $this->nm_new_label['servidor3']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servidor3"]) &&  $this->nmgp_cmp_readonly["servidor3"] == "on") { 

 ?>
<input type="hidden" name="servidor3" value="<?php echo $this->form_encode_input($servidor3) . "\">" . $servidor3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_servidor3" class="sc-ui-readonly-servidor3 css_servidor3_line" style="<?php echo $sStyleReadLab_servidor3; ?>"><?php echo $this->form_format_readonly("servidor3", $this->form_encode_input($this->servidor3)); ?></span><span id="id_read_off_servidor3" class="css_read_off_servidor3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_servidor3; ?>">
 <input class="sc-js-input scFormObjectOdd css_servidor3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_servidor3" type=text name="servidor3" value="<?php echo $this->form_encode_input($servidor3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tokenempresa']))
    {
        $this->nm_new_label['tokenempresa'] = "Token Empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tokenempresa = $this->tokenempresa;
   $sStyleHidden_tokenempresa = '';
   if (isset($this->nmgp_cmp_hidden['tokenempresa']) && $this->nmgp_cmp_hidden['tokenempresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tokenempresa']);
       $sStyleHidden_tokenempresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tokenempresa = 'display: none;';
   $sStyleReadInp_tokenempresa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tokenempresa']) && $this->nmgp_cmp_readonly['tokenempresa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tokenempresa']);
       $sStyleReadLab_tokenempresa = '';
       $sStyleReadInp_tokenempresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tokenempresa']) && $this->nmgp_cmp_hidden['tokenempresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokenempresa" value="<?php echo $this->form_encode_input($tokenempresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tokenempresa_line" id="hidden_field_data_tokenempresa" style="<?php echo $sStyleHidden_tokenempresa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tokenempresa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tokenempresa_label" style=""><span id="id_label_tokenempresa"><?php echo $this->nm_new_label['tokenempresa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokenempresa"]) &&  $this->nmgp_cmp_readonly["tokenempresa"] == "on") { 

 ?>
<input type="hidden" name="tokenempresa" value="<?php echo $this->form_encode_input($tokenempresa) . "\">" . $tokenempresa . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokenempresa" class="sc-ui-readonly-tokenempresa css_tokenempresa_line" style="<?php echo $sStyleReadLab_tokenempresa; ?>"><?php echo $this->form_format_readonly("tokenempresa", $this->form_encode_input($this->tokenempresa)); ?></span><span id="id_read_off_tokenempresa" class="css_read_off_tokenempresa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokenempresa; ?>">
 <input class="sc-js-input scFormObjectOdd css_tokenempresa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokenempresa" type=text name="tokenempresa" value="<?php echo $this->form_encode_input($tokenempresa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=52"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokenempresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokenempresa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tokenpassword']))
    {
        $this->nm_new_label['tokenpassword'] = "Token Password";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tokenpassword = $this->tokenpassword;
   $sStyleHidden_tokenpassword = '';
   if (isset($this->nmgp_cmp_hidden['tokenpassword']) && $this->nmgp_cmp_hidden['tokenpassword'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tokenpassword']);
       $sStyleHidden_tokenpassword = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tokenpassword = 'display: none;';
   $sStyleReadInp_tokenpassword = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tokenpassword']) && $this->nmgp_cmp_readonly['tokenpassword'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tokenpassword']);
       $sStyleReadLab_tokenpassword = '';
       $sStyleReadInp_tokenpassword = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tokenpassword']) && $this->nmgp_cmp_hidden['tokenpassword'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokenpassword" value="<?php echo $this->form_encode_input($tokenpassword) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tokenpassword_line" id="hidden_field_data_tokenpassword" style="<?php echo $sStyleHidden_tokenpassword; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tokenpassword_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tokenpassword_label" style=""><span id="id_label_tokenpassword"><?php echo $this->nm_new_label['tokenpassword']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokenpassword"]) &&  $this->nmgp_cmp_readonly["tokenpassword"] == "on") { 

 ?>
<input type="hidden" name="tokenpassword" value="<?php echo $this->form_encode_input($tokenpassword) . "\">" . $tokenpassword . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokenpassword" class="sc-ui-readonly-tokenpassword css_tokenpassword_line" style="<?php echo $sStyleReadLab_tokenpassword; ?>"><?php echo $this->form_format_readonly("tokenpassword", $this->form_encode_input($this->tokenpassword)); ?></span><span id="id_read_off_tokenpassword" class="css_read_off_tokenpassword<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokenpassword; ?>">
 <input class="sc-js-input scFormObjectOdd css_tokenpassword_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokenpassword" type=text name="tokenpassword" value="<?php echo $this->form_encode_input($tokenpassword) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=52"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokenpassword_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokenpassword_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_api_pdfs']))
    {
        $this->nm_new_label['url_api_pdfs'] = "URL API PDFs";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_api_pdfs = $this->url_api_pdfs;
   $sStyleHidden_url_api_pdfs = '';
   if (isset($this->nmgp_cmp_hidden['url_api_pdfs']) && $this->nmgp_cmp_hidden['url_api_pdfs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_api_pdfs']);
       $sStyleHidden_url_api_pdfs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_api_pdfs = 'display: none;';
   $sStyleReadInp_url_api_pdfs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_api_pdfs']) && $this->nmgp_cmp_readonly['url_api_pdfs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_api_pdfs']);
       $sStyleReadLab_url_api_pdfs = '';
       $sStyleReadInp_url_api_pdfs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_api_pdfs']) && $this->nmgp_cmp_hidden['url_api_pdfs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_api_pdfs" value="<?php echo $this->form_encode_input($url_api_pdfs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_api_pdfs_line" id="hidden_field_data_url_api_pdfs" style="<?php echo $sStyleHidden_url_api_pdfs; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_api_pdfs_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_api_pdfs_label" style=""><span id="id_label_url_api_pdfs"><?php echo $this->nm_new_label['url_api_pdfs']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_api_pdfs"]) &&  $this->nmgp_cmp_readonly["url_api_pdfs"] == "on") { 

 ?>
<input type="hidden" name="url_api_pdfs" value="<?php echo $this->form_encode_input($url_api_pdfs) . "\">" . $url_api_pdfs . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_api_pdfs" class="sc-ui-readonly-url_api_pdfs css_url_api_pdfs_line" style="<?php echo $sStyleReadLab_url_api_pdfs; ?>"><?php echo $this->form_format_readonly("url_api_pdfs", $this->form_encode_input($this->url_api_pdfs)); ?></span><span id="id_read_off_url_api_pdfs" class="css_read_off_url_api_pdfs<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_api_pdfs; ?>">
 <input class="sc-js-input scFormObjectOdd css_url_api_pdfs_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url_api_pdfs" type=text name="url_api_pdfs" value="<?php echo $this->form_encode_input($url_api_pdfs) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('url_api_pdfs')", "nm_mostra_mens('url_api_pdfs')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_api_pdfs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_api_pdfs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_api_sendmail']))
    {
        $this->nm_new_label['url_api_sendmail'] = "URL API SENDMAIL";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_api_sendmail = $this->url_api_sendmail;
   $sStyleHidden_url_api_sendmail = '';
   if (isset($this->nmgp_cmp_hidden['url_api_sendmail']) && $this->nmgp_cmp_hidden['url_api_sendmail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_api_sendmail']);
       $sStyleHidden_url_api_sendmail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_api_sendmail = 'display: none;';
   $sStyleReadInp_url_api_sendmail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_api_sendmail']) && $this->nmgp_cmp_readonly['url_api_sendmail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_api_sendmail']);
       $sStyleReadLab_url_api_sendmail = '';
       $sStyleReadInp_url_api_sendmail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_api_sendmail']) && $this->nmgp_cmp_hidden['url_api_sendmail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_api_sendmail" value="<?php echo $this->form_encode_input($url_api_sendmail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_api_sendmail_line" id="hidden_field_data_url_api_sendmail" style="<?php echo $sStyleHidden_url_api_sendmail; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_api_sendmail_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_api_sendmail_label" style=""><span id="id_label_url_api_sendmail"><?php echo $this->nm_new_label['url_api_sendmail']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_api_sendmail"]) &&  $this->nmgp_cmp_readonly["url_api_sendmail"] == "on") { 

 ?>
<input type="hidden" name="url_api_sendmail" value="<?php echo $this->form_encode_input($url_api_sendmail) . "\">" . $url_api_sendmail . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_api_sendmail" class="sc-ui-readonly-url_api_sendmail css_url_api_sendmail_line" style="<?php echo $sStyleReadLab_url_api_sendmail; ?>"><?php echo $this->form_format_readonly("url_api_sendmail", $this->form_encode_input($this->url_api_sendmail)); ?></span><span id="id_read_off_url_api_sendmail" class="css_read_off_url_api_sendmail<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_api_sendmail; ?>">
 <input class="sc-js-input scFormObjectOdd css_url_api_sendmail_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url_api_sendmail" type=text name="url_api_sendmail" value="<?php echo $this->form_encode_input($url_api_sendmail) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=80"; } ?> maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('url_api_sendmail')", "nm_mostra_mens('url_api_sendmail')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_api_sendmail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_api_sendmail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
