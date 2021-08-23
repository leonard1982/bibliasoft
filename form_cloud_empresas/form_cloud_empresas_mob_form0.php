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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Empresas"); } else { echo strip_tags("Empresas"); } ?></TITLE>
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
.css_read_off_creado button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_editado button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cloud_empresas/form_cloud_empresas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>"></SCRIPT>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>
 <STYLE>
  .mce-toolbar-grp .mce-container-body {text-align: left !important}
 </STYLE>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cloud_empresas_mob_sajax_js.php");
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
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
<?php

include_once('form_cloud_empresas_mob_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if(event.target !== event.currentTarget) return;
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });
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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_cloud_empresas']['error_buffer']) && '' != $_SESSION['scriptcase']['form_cloud_empresas']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_cloud_empresas']['error_buffer'];
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
 include_once("form_cloud_empresas_mob_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="form_cloud_empresas_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="logo_salva" value="<?php  echo $this->form_encode_input($this->logo) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cloud_empresas_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cloud_empresas_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="800">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['maximized']))
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
          <?php if ($this->nmgp_opcao == "novo") { echo "Empresas"; } else { echo "Empresas"; } ?>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
echo nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 't', '', 'ini');
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
echo nmButtonGroupTableOutput($this->arr_buttons, "", '', '', '', 'fim');
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_cloud_empresas_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_cloud_empresas_mob_form0' => array(
            'title' => "Empresa",
            'class' => $nmgp_num_form == "form_cloud_empresas_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_cloud_empresas_mob_form1' => array(
            'title' => "WebService",
            'class' => $nmgp_num_form == "form_cloud_empresas_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
        'form_cloud_empresas_mob_form2' => array(
            'title' => "Configuración Envío",
            'class' => $nmgp_num_form == "form_cloud_empresas_mob_form2" ? "scTabActive" : "scTabInactive",
        ),
        'form_cloud_empresas_mob_form3' => array(
            'title' => "Más Configuraciones",
            'class' => $nmgp_num_form == "form_cloud_empresas_mob_form3" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Empresa' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_cloud_empresas_mob_form0']['class'] = 'scTabInactive';
                        }
                        if ('WebService' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_cloud_empresas_mob_form1']['class'] = 'scTabInactive';
                        }
                        if ('Configuración Envío' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_cloud_empresas_mob_form2']['class'] = 'scTabInactive';
                        }
                        if ('Más Configuraciones' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_cloud_empresas_mob_form3']['class'] = 'scTabInactive';
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
    $css_celula = $this->tabCssClass["form_cloud_empresas_mob_form0"]['class'];
?>
   <li id="id_form_cloud_empresas_mob_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_cloud_empresas_mob_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__companies.png" align="absmiddle">
     Empresa
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_cloud_empresas_mob_form1"]['class'];
?>
   <li id="id_form_cloud_empresas_mob_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_cloud_empresas_mob_form1')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__server_32.png" align="absmiddle">
     WebService
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_cloud_empresas_mob_form2"]['class'];
?>
   <li id="id_form_cloud_empresas_mob_form2" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_cloud_empresas_mob_form2')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__server_mail_download_32.png" align="absmiddle">
     Configuración Envío
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_cloud_empresas_mob_form3"]['class'];
?>
   <li id="id_form_cloud_empresas_mob_form3" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_cloud_empresas_mob_form3')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__gear_32.png" align="absmiddle">
     Más Configuraciones
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_cloud_empresas_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_empresa']))
   {
       $this->nmgp_cmp_hidden['id_empresa'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['url_validar_licencia']))
   {
       $this->nmgp_cmp_hidden['url_validar_licencia'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="logo_ul_name" id="id_sc_field_logo_ul_name" value="<?php echo $this->form_encode_input($this->logo_ul_name);?>">
<input type="hidden" name="logo_ul_type" id="id_sc_field_logo_ul_type" value="<?php echo $this->form_encode_input($this->logo_ul_type);?>">
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_empresa']))
           {
               $this->nmgp_cmp_readonly['id_empresa'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Datos Generales</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_empresa']))
    {
        $this->nm_new_label['id_empresa'] = "Id Empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_empresa = $this->id_empresa;
   if (!isset($this->nmgp_cmp_hidden['id_empresa']))
   {
       $this->nmgp_cmp_hidden['id_empresa'] = 'off';
   }
   $sStyleHidden_id_empresa = '';
   if (isset($this->nmgp_cmp_hidden['id_empresa']) && $this->nmgp_cmp_hidden['id_empresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_empresa']);
       $sStyleHidden_id_empresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_empresa = 'display: none;';
   $sStyleReadInp_id_empresa = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_empresa"]) &&  $this->nmgp_cmp_readonly["id_empresa"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_empresa']);
       $sStyleReadLab_id_empresa = '';
       $sStyleReadInp_id_empresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_empresa']) && $this->nmgp_cmp_hidden['id_empresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_empresa" value="<?php echo $this->form_encode_input($id_empresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_id_empresa_line" id="hidden_field_data_id_empresa" style="<?php echo $sStyleHidden_id_empresa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_empresa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_empresa_label" style=""><span id="id_label_id_empresa"><?php echo $this->nm_new_label['id_empresa']; ?></span></span><br><span id="id_read_on_id_empresa" class="css_id_empresa_line" style="<?php echo $sStyleReadLab_id_empresa; ?>"><?php echo $this->form_format_readonly("id_empresa", $this->form_encode_input($this->id_empresa)); ?></span><span id="id_read_off_id_empresa" class="css_read_off_id_empresa" style="<?php echo $sStyleReadInp_id_empresa; ?>"><input type="hidden" name="id_empresa" value="<?php echo $this->form_encode_input($id_empresa) . "\">"?><span id="id_ajax_label_id_empresa"><?php echo nl2br($id_empresa); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_empresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_empresa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ccnit']))
    {
        $this->nm_new_label['ccnit'] = "Código Empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ccnit = $this->ccnit;
   $sStyleHidden_ccnit = '';
   if (isset($this->nmgp_cmp_hidden['ccnit']) && $this->nmgp_cmp_hidden['ccnit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ccnit']);
       $sStyleHidden_ccnit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ccnit = 'display: none;';
   $sStyleReadInp_ccnit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ccnit']) && $this->nmgp_cmp_readonly['ccnit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ccnit']);
       $sStyleReadLab_ccnit = '';
       $sStyleReadInp_ccnit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ccnit']) && $this->nmgp_cmp_hidden['ccnit'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ccnit" value="<?php echo $this->form_encode_input($ccnit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ccnit_line" id="hidden_field_data_ccnit" style="<?php echo $sStyleHidden_ccnit; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ccnit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ccnit_label" style=""><span id="id_label_ccnit"><?php echo $this->nm_new_label['ccnit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ccnit"]) &&  $this->nmgp_cmp_readonly["ccnit"] == "on") { 

 ?>
<input type="hidden" name="ccnit" value="<?php echo $this->form_encode_input($ccnit) . "\">" . $ccnit . ""; ?>
<?php } else { ?>
<span id="id_read_on_ccnit" class="sc-ui-readonly-ccnit css_ccnit_line" style="<?php echo $sStyleReadLab_ccnit; ?>"><?php echo $this->form_format_readonly("ccnit", $this->form_encode_input($this->ccnit)); ?></span><span id="id_read_off_ccnit" class="css_read_off_ccnit<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ccnit; ?>">
 <input class="sc-js-input scFormObjectOdd css_ccnit_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ccnit" type=text name="ccnit" value="<?php echo $this->form_encode_input($ccnit) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789.-") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ccnit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ccnit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_razonsocial']))
    {
        $this->nm_new_label['nombre_razonsocial'] = "Nombre para mostrar";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_razonsocial = $this->nombre_razonsocial;
   $sStyleHidden_nombre_razonsocial = '';
   if (isset($this->nmgp_cmp_hidden['nombre_razonsocial']) && $this->nmgp_cmp_hidden['nombre_razonsocial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_razonsocial']);
       $sStyleHidden_nombre_razonsocial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_razonsocial = 'display: none;';
   $sStyleReadInp_nombre_razonsocial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_razonsocial']) && $this->nmgp_cmp_readonly['nombre_razonsocial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_razonsocial']);
       $sStyleReadLab_nombre_razonsocial = '';
       $sStyleReadInp_nombre_razonsocial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_razonsocial']) && $this->nmgp_cmp_hidden['nombre_razonsocial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_razonsocial" value="<?php echo $this->form_encode_input($nombre_razonsocial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_razonsocial_line" id="hidden_field_data_nombre_razonsocial" style="<?php echo $sStyleHidden_nombre_razonsocial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_razonsocial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_razonsocial_label" style=""><span id="id_label_nombre_razonsocial"><?php echo $this->nm_new_label['nombre_razonsocial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_razonsocial"]) &&  $this->nmgp_cmp_readonly["nombre_razonsocial"] == "on") { 

 ?>
<input type="hidden" name="nombre_razonsocial" value="<?php echo $this->form_encode_input($nombre_razonsocial) . "\">" . $nombre_razonsocial . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_razonsocial" class="sc-ui-readonly-nombre_razonsocial css_nombre_razonsocial_line" style="<?php echo $sStyleReadLab_nombre_razonsocial; ?>"><?php echo $this->form_format_readonly("nombre_razonsocial", $this->form_encode_input($this->nombre_razonsocial)); ?></span><span id="id_read_off_nombre_razonsocial" class="css_read_off_nombre_razonsocial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_razonsocial; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_razonsocial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre_razonsocial" type=text name="nombre_razonsocial" value="<?php echo $this->form_encode_input($nombre_razonsocial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_razonsocial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_razonsocial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['serial']))
    {
        $this->nm_new_label['serial'] = "Serial";
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

    <TD class="scFormDataOdd css_serial_line" id="hidden_field_data_serial" style="<?php echo $sStyleHidden_serial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_serial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_serial_label" style=""><span id="id_label_serial"><?php echo $this->nm_new_label['serial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["serial"]) &&  $this->nmgp_cmp_readonly["serial"] == "on") { 

 ?>
<input type="hidden" name="serial" value="<?php echo $this->form_encode_input($serial) . "\">" . $serial . ""; ?>
<?php } else { ?>
<span id="id_read_on_serial" class="sc-ui-readonly-serial css_serial_line" style="<?php echo $sStyleReadLab_serial; ?>"><?php echo $this->form_format_readonly("serial", $this->form_encode_input($this->serial)); ?></span><span id="id_read_off_serial" class="css_read_off_serial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_serial; ?>">
 <input class="sc-js-input scFormObjectOdd css_serial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_serial" type=text name="serial" value="<?php echo $this->form_encode_input($serial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_serial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_serial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['activo']))
   {
       $this->nm_new_label['activo'] = "Activo";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['activo']) && $this->nmgp_cmp_hidden['activo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="activo" value="<?php echo $this->form_encode_input($this->activo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_activo_line" id="hidden_field_data_activo" style="<?php echo $sStyleHidden_activo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_activo_label" style=""><span id="id_label_activo"><?php echo $this->nm_new_label['activo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activo"]) &&  $this->nmgp_cmp_readonly["activo"] == "on") { 

$activo_look = "";
 if ($this->activo == "SI") { $activo_look .= "SI" ;} 
 if ($this->activo == "NO") { $activo_look .= "NO" ;} 
 if (empty($activo_look)) { $activo_look = $this->activo; }
?>
<input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo) . "\">" . $activo_look . ""; ?>
<?php } else { ?>
<?php

$activo_look = "";
 if ($this->activo == "SI") { $activo_look .= "SI" ;} 
 if ($this->activo == "NO") { $activo_look .= "NO" ;} 
 if (empty($activo_look)) { $activo_look = $this->activo; }
?>
<span id="id_read_on_activo" class="css_activo_line"  style="<?php echo $sStyleReadLab_activo; ?>"><?php echo $this->form_format_readonly("activo", $this->form_encode_input($activo_look)); ?></span><span id="id_read_off_activo" class="css_read_off_activo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_activo; ?>">
 <span id="idAjaxSelect_activo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_activo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_activo" name="activo" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="SI" <?php  if ($this->activo == "SI") { echo " selected" ;} ?><?php  if (empty($this->activo)) { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_activo'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->activo == "NO") { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_activo'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_activo_dumb = ('' == $sStyleHidden_activo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_activo_dumb" style="<?php echo $sStyleHidden_activo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Datos del Establecimiento Comercial</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_nit_line" id="hidden_field_data_nit" style="<?php echo $sStyleHidden_nit; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nit_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nit_label" style=""><span id="id_label_nit"><?php echo $this->nm_new_label['nit']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nit"]) &&  $this->nmgp_cmp_readonly["nit"] == "on") { 

 ?>
<input type="hidden" name="nit" value="<?php echo $this->form_encode_input($nit) . "\">" . $nit . ""; ?>
<?php } else { ?>
<span id="id_read_on_nit" class="sc-ui-readonly-nit css_nit_line" style="<?php echo $sStyleReadLab_nit; ?>"><?php echo $this->form_format_readonly("nit", $this->form_encode_input($this->nit)); ?></span><span id="id_read_off_nit" class="css_read_off_nit<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nit; ?>">
 <input class="sc-js-input scFormObjectOdd css_nit_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nit" type=text name="nit" value="<?php echo $this->form_encode_input($nit) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('nit')", "nm_mostra_mens('nit')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nit_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razon_social']))
    {
        $this->nm_new_label['razon_social'] = "Nombre/Razón Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razon_social = $this->razon_social;
   $sStyleHidden_razon_social = '';
   if (isset($this->nmgp_cmp_hidden['razon_social']) && $this->nmgp_cmp_hidden['razon_social'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razon_social']);
       $sStyleHidden_razon_social = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razon_social = 'display: none;';
   $sStyleReadInp_razon_social = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razon_social']) && $this->nmgp_cmp_readonly['razon_social'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razon_social']);
       $sStyleReadLab_razon_social = '';
       $sStyleReadInp_razon_social = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razon_social']) && $this->nmgp_cmp_hidden['razon_social'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razon_social" value="<?php echo $this->form_encode_input($razon_social) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_razon_social_line" id="hidden_field_data_razon_social" style="<?php echo $sStyleHidden_razon_social; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razon_social_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_razon_social_label" style=""><span id="id_label_razon_social"><?php echo $this->nm_new_label['razon_social']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razon_social"]) &&  $this->nmgp_cmp_readonly["razon_social"] == "on") { 

 ?>
<input type="hidden" name="razon_social" value="<?php echo $this->form_encode_input($razon_social) . "\">" . $razon_social . ""; ?>
<?php } else { ?>
<span id="id_read_on_razon_social" class="sc-ui-readonly-razon_social css_razon_social_line" style="<?php echo $sStyleReadLab_razon_social; ?>"><?php echo $this->form_format_readonly("razon_social", $this->form_encode_input($this->razon_social)); ?></span><span id="id_read_off_razon_social" class="css_read_off_razon_social<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razon_social; ?>">
 <input class="sc-js-input scFormObjectOdd css_razon_social_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_razon_social" type=text name="razon_social" value="<?php echo $this->form_encode_input($razon_social) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('razon_social')", "nm_mostra_mens('razon_social')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razon_social_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razon_social_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['celular']))
    {
        $this->nm_new_label['celular'] = "Tel/Cel";
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

    <TD class="scFormDataOdd css_celular_line" id="hidden_field_data_celular" style="<?php echo $sStyleHidden_celular; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_celular_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_celular_label" style=""><span id="id_label_celular"><?php echo $this->nm_new_label['celular']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["celular"]) &&  $this->nmgp_cmp_readonly["celular"] == "on") { 

 ?>
<input type="hidden" name="celular" value="<?php echo $this->form_encode_input($celular) . "\">" . $celular . ""; ?>
<?php } else { ?>
<span id="id_read_on_celular" class="sc-ui-readonly-celular css_celular_line" style="<?php echo $sStyleReadLab_celular; ?>"><?php echo $this->form_format_readonly("celular", $this->form_encode_input($this->celular)); ?></span><span id="id_read_off_celular" class="css_read_off_celular<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_celular; ?>">
 <input class="sc-js-input scFormObjectOdd css_celular_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_celular" type=text name="celular" value="<?php echo $this->form_encode_input($celular) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789ç -EXT()") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_celular_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_celular_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_correo_line" id="hidden_field_data_correo" style="<?php echo $sStyleHidden_correo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_correo_label" style=""><span id="id_label_correo"><?php echo $this->nm_new_label['correo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo"]) &&  $this->nmgp_cmp_readonly["correo"] == "on") { 

 ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">" . $correo . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo" class="sc-ui-readonly-correo css_correo_line" style="<?php echo $sStyleReadLab_correo; ?>"><?php echo $this->form_format_readonly("correo", $this->form_encode_input($this->correo)); ?></span><span id="id_read_off_correo" class="css_read_off_correo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo" type=text name="correo" value="<?php echo $this->form_encode_input($correo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=90 alt="{datatype: 'text', maxLength: 90, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codsucursal']))
    {
        $this->nm_new_label['codsucursal'] = "Codigo Establecimiento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codsucursal = $this->codsucursal;
   $sStyleHidden_codsucursal = '';
   if (isset($this->nmgp_cmp_hidden['codsucursal']) && $this->nmgp_cmp_hidden['codsucursal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codsucursal']);
       $sStyleHidden_codsucursal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codsucursal = 'display: none;';
   $sStyleReadInp_codsucursal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codsucursal']) && $this->nmgp_cmp_readonly['codsucursal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codsucursal']);
       $sStyleReadLab_codsucursal = '';
       $sStyleReadInp_codsucursal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codsucursal']) && $this->nmgp_cmp_hidden['codsucursal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codsucursal" value="<?php echo $this->form_encode_input($codsucursal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codsucursal_line" id="hidden_field_data_codsucursal" style="<?php echo $sStyleHidden_codsucursal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codsucursal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codsucursal_label" style=""><span id="id_label_codsucursal"><?php echo $this->nm_new_label['codsucursal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codsucursal"]) &&  $this->nmgp_cmp_readonly["codsucursal"] == "on") { 

 ?>
<input type="hidden" name="codsucursal" value="<?php echo $this->form_encode_input($codsucursal) . "\">" . $codsucursal . ""; ?>
<?php } else { ?>
<span id="id_read_on_codsucursal" class="sc-ui-readonly-codsucursal css_codsucursal_line" style="<?php echo $sStyleReadLab_codsucursal; ?>"><?php echo $this->form_format_readonly("codsucursal", $this->form_encode_input($this->codsucursal)); ?></span><span id="id_read_off_codsucursal" class="css_read_off_codsucursal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codsucursal; ?>">
 <input class="sc-js-input scFormObjectOdd css_codsucursal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codsucursal" type=text name="codsucursal" value="<?php echo $this->form_encode_input($codsucursal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codsucursal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codsucursal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direccion']))
    {
        $this->nm_new_label['direccion'] = "Direccion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $direccion = $this->direccion;
   $sStyleHidden_direccion = '';
   if (isset($this->nmgp_cmp_hidden['direccion']) && $this->nmgp_cmp_hidden['direccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['direccion']);
       $sStyleHidden_direccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_direccion = 'display: none;';
   $sStyleReadInp_direccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['direccion']) && $this->nmgp_cmp_readonly['direccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['direccion']);
       $sStyleReadLab_direccion = '';
       $sStyleReadInp_direccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['direccion']) && $this->nmgp_cmp_hidden['direccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_direccion_line" id="hidden_field_data_direccion" style="<?php echo $sStyleHidden_direccion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_direccion_label" style=""><span id="id_label_direccion"><?php echo $this->nm_new_label['direccion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion"]) &&  $this->nmgp_cmp_readonly["direccion"] == "on") { 

 ?>
<input type="hidden" name="direccion" value="<?php echo $this->form_encode_input($direccion) . "\">" . $direccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion" class="sc-ui-readonly-direccion css_direccion_line" style="<?php echo $sStyleReadLab_direccion; ?>"><?php echo $this->form_format_readonly("direccion", $this->form_encode_input($this->direccion)); ?></span><span id="id_read_off_direccion" class="css_read_off_direccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_direccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direccion" type=text name="direccion" value="<?php echo $this->form_encode_input($direccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ciudad']))
    {
        $this->nm_new_label['ciudad'] = "Ciudad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ciudad = $this->ciudad;
   $sStyleHidden_ciudad = '';
   if (isset($this->nmgp_cmp_hidden['ciudad']) && $this->nmgp_cmp_hidden['ciudad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ciudad']);
       $sStyleHidden_ciudad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ciudad = 'display: none;';
   $sStyleReadInp_ciudad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ciudad']) && $this->nmgp_cmp_readonly['ciudad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ciudad']);
       $sStyleReadLab_ciudad = '';
       $sStyleReadInp_ciudad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ciudad']) && $this->nmgp_cmp_hidden['ciudad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ciudad" value="<?php echo $this->form_encode_input($ciudad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ciudad_line" id="hidden_field_data_ciudad" style="<?php echo $sStyleHidden_ciudad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ciudad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ciudad_label" style=""><span id="id_label_ciudad"><?php echo $this->nm_new_label['ciudad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciudad"]) &&  $this->nmgp_cmp_readonly["ciudad"] == "on") { 

 ?>
<input type="hidden" name="ciudad" value="<?php echo $this->form_encode_input($ciudad) . "\">" . $ciudad . ""; ?>
<?php } else { ?>
<span id="id_read_on_ciudad" class="sc-ui-readonly-ciudad css_ciudad_line" style="<?php echo $sStyleReadLab_ciudad; ?>"><?php echo $this->form_format_readonly("ciudad", $this->form_encode_input($this->ciudad)); ?></span><span id="id_read_off_ciudad" class="css_read_off_ciudad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ciudad; ?>">
 <input class="sc-js-input scFormObjectOdd css_ciudad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ciudad" type=text name="ciudad" value="<?php echo $this->form_encode_input($ciudad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciudad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciudad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pagina_web']))
    {
        $this->nm_new_label['pagina_web'] = "Pagina Web";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pagina_web = $this->pagina_web;
   $sStyleHidden_pagina_web = '';
   if (isset($this->nmgp_cmp_hidden['pagina_web']) && $this->nmgp_cmp_hidden['pagina_web'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pagina_web']);
       $sStyleHidden_pagina_web = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pagina_web = 'display: none;';
   $sStyleReadInp_pagina_web = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pagina_web']) && $this->nmgp_cmp_readonly['pagina_web'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pagina_web']);
       $sStyleReadLab_pagina_web = '';
       $sStyleReadInp_pagina_web = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pagina_web']) && $this->nmgp_cmp_hidden['pagina_web'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pagina_web" value="<?php echo $this->form_encode_input($pagina_web) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pagina_web_line" id="hidden_field_data_pagina_web" style="<?php echo $sStyleHidden_pagina_web; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pagina_web_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pagina_web_label" style=""><span id="id_label_pagina_web"><?php echo $this->nm_new_label['pagina_web']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pagina_web"]) &&  $this->nmgp_cmp_readonly["pagina_web"] == "on") { 

 ?>
<input type="hidden" name="pagina_web" value="<?php echo $this->form_encode_input($pagina_web) . "\">" . $pagina_web . ""; ?>
<?php } else { ?>
<span id="id_read_on_pagina_web" class="sc-ui-readonly-pagina_web css_pagina_web_line" style="<?php echo $sStyleReadLab_pagina_web; ?>"><?php echo $this->form_format_readonly("pagina_web", $this->form_encode_input($this->pagina_web)); ?></span><span id="id_read_off_pagina_web" class="css_read_off_pagina_web<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pagina_web; ?>">
 <input class="sc-js-input scFormObjectOdd css_pagina_web_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pagina_web" type=text name="pagina_web" value="<?php echo $this->form_encode_input($pagina_web) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pagina_web_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pagina_web_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['actividad_principal']))
    {
        $this->nm_new_label['actividad_principal'] = "Actividad Principal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $actividad_principal = $this->actividad_principal;
   $sStyleHidden_actividad_principal = '';
   if (isset($this->nmgp_cmp_hidden['actividad_principal']) && $this->nmgp_cmp_hidden['actividad_principal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['actividad_principal']);
       $sStyleHidden_actividad_principal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_actividad_principal = 'display: none;';
   $sStyleReadInp_actividad_principal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['actividad_principal']) && $this->nmgp_cmp_readonly['actividad_principal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['actividad_principal']);
       $sStyleReadLab_actividad_principal = '';
       $sStyleReadInp_actividad_principal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['actividad_principal']) && $this->nmgp_cmp_hidden['actividad_principal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="actividad_principal" value="<?php echo $this->form_encode_input($actividad_principal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_actividad_principal_line" id="hidden_field_data_actividad_principal" style="<?php echo $sStyleHidden_actividad_principal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_actividad_principal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_actividad_principal_label" style=""><span id="id_label_actividad_principal"><?php echo $this->nm_new_label['actividad_principal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["actividad_principal"]) &&  $this->nmgp_cmp_readonly["actividad_principal"] == "on") { 

 ?>
<input type="hidden" name="actividad_principal" value="<?php echo $this->form_encode_input($actividad_principal) . "\">" . $actividad_principal . ""; ?>
<?php } else { ?>
<span id="id_read_on_actividad_principal" class="sc-ui-readonly-actividad_principal css_actividad_principal_line" style="<?php echo $sStyleReadLab_actividad_principal; ?>"><?php echo $this->form_format_readonly("actividad_principal", $this->form_encode_input($this->actividad_principal)); ?></span><span id="id_read_off_actividad_principal" class="css_read_off_actividad_principal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_actividad_principal; ?>">
 <input class="sc-js-input scFormObjectOdd css_actividad_principal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_actividad_principal" type=text name="actividad_principal" value="<?php echo $this->form_encode_input($actividad_principal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_actividad_principal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_actividad_principal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['regimen']))
   {
       $this->nm_new_label['regimen'] = "Regimen";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regimen = $this->regimen;
   $sStyleHidden_regimen = '';
   if (isset($this->nmgp_cmp_hidden['regimen']) && $this->nmgp_cmp_hidden['regimen'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regimen']);
       $sStyleHidden_regimen = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regimen = 'display: none;';
   $sStyleReadInp_regimen = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regimen']) && $this->nmgp_cmp_readonly['regimen'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regimen']);
       $sStyleReadLab_regimen = '';
       $sStyleReadInp_regimen = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regimen']) && $this->nmgp_cmp_hidden['regimen'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="regimen" value="<?php echo $this->form_encode_input($this->regimen) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_regimen_line" id="hidden_field_data_regimen" style="<?php echo $sStyleHidden_regimen; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regimen_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regimen_label" style=""><span id="id_label_regimen"><?php echo $this->nm_new_label['regimen']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regimen"]) &&  $this->nmgp_cmp_readonly["regimen"] == "on") { 

$regimen_look = "";
 if ($this->regimen == "RESPONSABLE DE IVA") { $regimen_look .= "RESPONSABLE DE IVA" ;} 
 if ($this->regimen == "NO RESPONSABLE DE IVA") { $regimen_look .= "NO RESPONSABLE DE IVA" ;} 
 if (empty($regimen_look)) { $regimen_look = $this->regimen; }
?>
<input type="hidden" name="regimen" value="<?php echo $this->form_encode_input($regimen) . "\">" . $regimen_look . ""; ?>
<?php } else { ?>
<?php

$regimen_look = "";
 if ($this->regimen == "RESPONSABLE DE IVA") { $regimen_look .= "RESPONSABLE DE IVA" ;} 
 if ($this->regimen == "NO RESPONSABLE DE IVA") { $regimen_look .= "NO RESPONSABLE DE IVA" ;} 
 if (empty($regimen_look)) { $regimen_look = $this->regimen; }
?>
<span id="id_read_on_regimen" class="css_regimen_line"  style="<?php echo $sStyleReadLab_regimen; ?>"><?php echo $this->form_format_readonly("regimen", $this->form_encode_input($regimen_look)); ?></span><span id="id_read_off_regimen" class="css_read_off_regimen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_regimen; ?>">
 <span id="idAjaxSelect_regimen" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_regimen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_regimen" name="regimen" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="RESPONSABLE DE IVA" <?php  if ($this->regimen == "RESPONSABLE DE IVA") { echo " selected" ;} ?>>RESPONSABLE DE IVA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_regimen'][] = 'RESPONSABLE DE IVA'; ?>
 <option  value="NO RESPONSABLE DE IVA" <?php  if ($this->regimen == "NO RESPONSABLE DE IVA") { echo " selected" ;} ?>>NO RESPONSABLE DE IVA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_regimen'][] = 'NO RESPONSABLE DE IVA'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regimen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regimen_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label" style=""><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br><span id="id_read_on_observaciones" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", sc_strip_script($this->observaciones)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones" style="<?php echo $sStyleReadInp_observaciones; ?>"><textarea id="observaciones" name="observaciones" cols="50" rows="10" class="mceEditor_observaciones" style="width: 100%; height:200px;"><?php echo $this->form_encode_input($this->observaciones); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
