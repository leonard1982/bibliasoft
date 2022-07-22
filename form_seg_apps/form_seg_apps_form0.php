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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Aplicación"); } else { echo strip_tags("Aplicación"); } ?></TITLE>
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
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_create_in button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_seg_apps/form_seg_apps_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_seg_apps_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_seg_apps_jquery.php');

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

  scJQElementsAdd('');

  scJQGeneralAdd();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_seg_apps_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_seg_apps'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_seg_apps'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['maximized']))
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
          <?php if ($this->nmgp_opcao == "novo") { echo "Aplicación"; } else { echo "Aplicación"; } ?>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['fast_search'][2] : "";
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['delete'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idapp']))
           {
               $this->nmgp_cmp_readonly['idapp'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idapp']))
    {
        $this->nm_new_label['idapp'] = "Idapp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idapp = $this->idapp;
   $sStyleHidden_idapp = '';
   if (isset($this->nmgp_cmp_hidden['idapp']) && $this->nmgp_cmp_hidden['idapp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idapp']);
       $sStyleHidden_idapp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idapp = 'display: none;';
   $sStyleReadInp_idapp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idapp"]) &&  $this->nmgp_cmp_readonly["idapp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idapp']);
       $sStyleReadLab_idapp = '';
       $sStyleReadInp_idapp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idapp']) && $this->nmgp_cmp_hidden['idapp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idapp" value="<?php echo $this->form_encode_input($idapp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idapp_label" id="hidden_field_label_idapp" style="<?php echo $sStyleHidden_idapp; ?>"><span id="id_label_idapp"><?php echo $this->nm_new_label['idapp']; ?></span></TD>
    <TD class="scFormDataOdd css_idapp_line" id="hidden_field_data_idapp" style="<?php echo $sStyleHidden_idapp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idapp_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idapp" class="css_idapp_line" style="<?php echo $sStyleReadLab_idapp; ?>"><?php echo $this->form_format_readonly("idapp", $this->form_encode_input($this->idapp)); ?></span><span id="id_read_off_idapp" class="css_read_off_idapp" style="<?php echo $sStyleReadInp_idapp; ?>"><input type="hidden" name="idapp" value="<?php echo $this->form_encode_input($idapp) . "\">"?><span id="id_ajax_label_idapp"><?php echo nl2br($idapp); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idapp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idapp_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['app_name']))
    {
        $this->nm_new_label['app_name'] = "App Name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_name = $this->app_name;
   $sStyleHidden_app_name = '';
   if (isset($this->nmgp_cmp_hidden['app_name']) && $this->nmgp_cmp_hidden['app_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_name']);
       $sStyleHidden_app_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_name = 'display: none;';
   $sStyleReadInp_app_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_name']) && $this->nmgp_cmp_readonly['app_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_name']);
       $sStyleReadLab_app_name = '';
       $sStyleReadInp_app_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_name']) && $this->nmgp_cmp_hidden['app_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_name" value="<?php echo $this->form_encode_input($app_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_name_label" id="hidden_field_label_app_name" style="<?php echo $sStyleHidden_app_name; ?>"><span id="id_label_app_name"><?php echo $this->nm_new_label['app_name']; ?></span></TD>
    <TD class="scFormDataOdd css_app_name_line" id="hidden_field_data_app_name" style="<?php echo $sStyleHidden_app_name; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_name"]) &&  $this->nmgp_cmp_readonly["app_name"] == "on") { 

 ?>
<input type="hidden" name="app_name" value="<?php echo $this->form_encode_input($app_name) . "\">" . $app_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_app_name" class="sc-ui-readonly-app_name css_app_name_line" style="<?php echo $sStyleReadLab_app_name; ?>"><?php echo $this->form_format_readonly("app_name", $this->form_encode_input($this->app_name)); ?></span><span id="id_read_off_app_name" class="css_read_off_app_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_app_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_app_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_app_name" type=text name="app_name" value="<?php echo $this->form_encode_input($app_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=128 alt="{datatype: 'text', maxLength: 128, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_name_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['app_name2']))
    {
        $this->nm_new_label['app_name2'] = "App Name 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_name2 = $this->app_name2;
   $sStyleHidden_app_name2 = '';
   if (isset($this->nmgp_cmp_hidden['app_name2']) && $this->nmgp_cmp_hidden['app_name2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_name2']);
       $sStyleHidden_app_name2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_name2 = 'display: none;';
   $sStyleReadInp_app_name2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_name2']) && $this->nmgp_cmp_readonly['app_name2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_name2']);
       $sStyleReadLab_app_name2 = '';
       $sStyleReadInp_app_name2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_name2']) && $this->nmgp_cmp_hidden['app_name2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_name2" value="<?php echo $this->form_encode_input($app_name2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_name2_label" id="hidden_field_label_app_name2" style="<?php echo $sStyleHidden_app_name2; ?>"><span id="id_label_app_name2"><?php echo $this->nm_new_label['app_name2']; ?></span></TD>
    <TD class="scFormDataOdd css_app_name2_line" id="hidden_field_data_app_name2" style="<?php echo $sStyleHidden_app_name2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_name2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_name2"]) &&  $this->nmgp_cmp_readonly["app_name2"] == "on") { 

 ?>
<input type="hidden" name="app_name2" value="<?php echo $this->form_encode_input($app_name2) . "\">" . $app_name2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_app_name2" class="sc-ui-readonly-app_name2 css_app_name2_line" style="<?php echo $sStyleReadLab_app_name2; ?>"><?php echo $this->form_format_readonly("app_name2", $this->form_encode_input($this->app_name2)); ?></span><span id="id_read_off_app_name2" class="css_read_off_app_name2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_app_name2; ?>">
 <input class="sc-js-input scFormObjectOdd css_app_name2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_app_name2" type=text name="app_name2" value="<?php echo $this->form_encode_input($app_name2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=128 alt="{datatype: 'text', maxLength: 128, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_name2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_name2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['app_link']))
    {
        $this->nm_new_label['app_link'] = "App Link";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_link = $this->app_link;
   $sStyleHidden_app_link = '';
   if (isset($this->nmgp_cmp_hidden['app_link']) && $this->nmgp_cmp_hidden['app_link'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_link']);
       $sStyleHidden_app_link = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_link = 'display: none;';
   $sStyleReadInp_app_link = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_link']) && $this->nmgp_cmp_readonly['app_link'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_link']);
       $sStyleReadLab_app_link = '';
       $sStyleReadInp_app_link = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_link']) && $this->nmgp_cmp_hidden['app_link'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_link" value="<?php echo $this->form_encode_input($app_link) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_link_label" id="hidden_field_label_app_link" style="<?php echo $sStyleHidden_app_link; ?>"><span id="id_label_app_link"><?php echo $this->nm_new_label['app_link']; ?></span></TD>
    <TD class="scFormDataOdd css_app_link_line" id="hidden_field_data_app_link" style="<?php echo $sStyleHidden_app_link; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_link_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_link"]) &&  $this->nmgp_cmp_readonly["app_link"] == "on") { 

 ?>
<input type="hidden" name="app_link" value="<?php echo $this->form_encode_input($app_link) . "\">" . $app_link . ""; ?>
<?php } else { ?>
<span id="id_read_on_app_link" class="sc-ui-readonly-app_link css_app_link_line" style="<?php echo $sStyleReadLab_app_link; ?>"><?php echo $this->form_format_readonly("app_link", $this->form_encode_input($this->app_link)); ?></span><span id="id_read_off_app_link" class="css_read_off_app_link<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_app_link; ?>">
 <input class="sc-js-input scFormObjectOdd css_app_link_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_app_link" type=text name="app_link" value="<?php echo $this->form_encode_input($app_link) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_link_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_link_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idapptype']))
   {
       $this->nm_new_label['idapptype'] = "Tipo Aplicación";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idapptype = $this->idapptype;
   $sStyleHidden_idapptype = '';
   if (isset($this->nmgp_cmp_hidden['idapptype']) && $this->nmgp_cmp_hidden['idapptype'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idapptype']);
       $sStyleHidden_idapptype = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idapptype = 'display: none;';
   $sStyleReadInp_idapptype = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idapptype']) && $this->nmgp_cmp_readonly['idapptype'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idapptype']);
       $sStyleReadLab_idapptype = '';
       $sStyleReadInp_idapptype = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idapptype']) && $this->nmgp_cmp_hidden['idapptype'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idapptype" value="<?php echo $this->form_encode_input($this->idapptype) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idapptype_label" id="hidden_field_label_idapptype" style="<?php echo $sStyleHidden_idapptype; ?>"><span id="id_label_idapptype"><?php echo $this->nm_new_label['idapptype']; ?></span></TD>
    <TD class="scFormDataOdd css_idapptype_line" id="hidden_field_data_idapptype" style="<?php echo $sStyleHidden_idapptype; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idapptype_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idapptype"]) &&  $this->nmgp_cmp_readonly["idapptype"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype'] = array(); 
    }

   $old_value_idapp = $this->idapp;
   $old_value_app_order = $this->app_order;
   $this->nm_tira_formatacao();


   $unformatted_value_idapp = $this->idapp;
   $unformatted_value_app_order = $this->app_order;

   $nm_comando = "SELECT idapptype, description  FROM seg_app_type  ORDER BY description";

   $this->idapp = $old_value_idapp;
   $this->app_order = $old_value_app_order;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_idapptype'][] = $rs->fields[0];
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
   $idapptype_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idapptype_1))
          {
              foreach ($this->idapptype_1 as $tmp_idapptype)
              {
                  if (trim($tmp_idapptype) === trim($cadaselect[1])) { $idapptype_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idapptype) === trim($cadaselect[1])) { $idapptype_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idapptype" value="<?php echo $this->form_encode_input($idapptype) . "\">" . $idapptype_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idapptype();
   $x = 0 ; 
   $idapptype_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idapptype_1))
          {
              foreach ($this->idapptype_1 as $tmp_idapptype)
              {
                  if (trim($tmp_idapptype) === trim($cadaselect[1])) { $idapptype_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idapptype) === trim($cadaselect[1])) { $idapptype_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idapptype_look))
          {
              $idapptype_look = $this->idapptype;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idapptype\" class=\"css_idapptype_line\" style=\"" .  $sStyleReadLab_idapptype . "\">" . $this->form_format_readonly("idapptype", $this->form_encode_input($idapptype_look)) . "</span><span id=\"id_read_off_idapptype\" class=\"css_read_off_idapptype" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idapptype . "\">";
   echo " <span id=\"idAjaxSelect_idapptype\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idapptype_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idapptype\" name=\"idapptype\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idapptype) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idapptype)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idapptype_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idapptype_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['description']))
    {
        $this->nm_new_label['description'] = "Description";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $description = $this->description;
   $sStyleHidden_description = '';
   if (isset($this->nmgp_cmp_hidden['description']) && $this->nmgp_cmp_hidden['description'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['description']);
       $sStyleHidden_description = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_description = 'display: none;';
   $sStyleReadInp_description = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['description']) && $this->nmgp_cmp_readonly['description'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['description']);
       $sStyleReadLab_description = '';
       $sStyleReadInp_description = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['description']) && $this->nmgp_cmp_hidden['description'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="description" value="<?php echo $this->form_encode_input($description) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_description_label" id="hidden_field_label_description" style="<?php echo $sStyleHidden_description; ?>"><span id="id_label_description"><?php echo $this->nm_new_label['description']; ?></span></TD>
    <TD class="scFormDataOdd css_description_line" id="hidden_field_data_description" style="<?php echo $sStyleHidden_description; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_description_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["description"]) &&  $this->nmgp_cmp_readonly["description"] == "on") { 

 ?>
<input type="hidden" name="description" value="<?php echo $this->form_encode_input($description) . "\">" . $description . ""; ?>
<?php } else { ?>
<span id="id_read_on_description" class="sc-ui-readonly-description css_description_line" style="<?php echo $sStyleReadLab_description; ?>"><?php echo $this->form_format_readonly("description", $this->form_encode_input($this->description)); ?></span><span id="id_read_off_description" class="css_read_off_description<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_description; ?>">
 <input class="sc-js-input scFormObjectOdd css_description_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_description" type=text name="description" value="<?php echo $this->form_encode_input($description) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_description_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_description_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['app_parentid']))
   {
       $this->nm_new_label['app_parentid'] = "Modulo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_parentid = $this->app_parentid;
   $sStyleHidden_app_parentid = '';
   if (isset($this->nmgp_cmp_hidden['app_parentid']) && $this->nmgp_cmp_hidden['app_parentid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_parentid']);
       $sStyleHidden_app_parentid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_parentid = 'display: none;';
   $sStyleReadInp_app_parentid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_parentid']) && $this->nmgp_cmp_readonly['app_parentid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_parentid']);
       $sStyleReadLab_app_parentid = '';
       $sStyleReadInp_app_parentid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_parentid']) && $this->nmgp_cmp_hidden['app_parentid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="app_parentid" value="<?php echo $this->form_encode_input($this->app_parentid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_parentid_label" id="hidden_field_label_app_parentid" style="<?php echo $sStyleHidden_app_parentid; ?>"><span id="id_label_app_parentid"><?php echo $this->nm_new_label['app_parentid']; ?></span></TD>
    <TD class="scFormDataOdd css_app_parentid_line" id="hidden_field_data_app_parentid" style="<?php echo $sStyleHidden_app_parentid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_parentid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_parentid"]) &&  $this->nmgp_cmp_readonly["app_parentid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid'] = array(); 
    }

   $old_value_idapp = $this->idapp;
   $old_value_app_order = $this->app_order;
   $this->nm_tira_formatacao();


   $unformatted_value_idapp = $this->idapp;
   $unformatted_value_app_order = $this->app_order;

   $nm_comando = "SELECT idapp, description FROM seg_apps WHERE level = 0 ORDER BY idapp";

   $this->idapp = $old_value_idapp;
   $this->app_order = $old_value_app_order;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid'][] = $rs->fields[0];
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
   $app_parentid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->app_parentid_1))
          {
              foreach ($this->app_parentid_1 as $tmp_app_parentid)
              {
                  if (trim($tmp_app_parentid) === trim($cadaselect[1])) { $app_parentid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->app_parentid) === trim($cadaselect[1])) { $app_parentid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="app_parentid" value="<?php echo $this->form_encode_input($app_parentid) . "\">" . $app_parentid_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_app_parentid();
   $x = 0 ; 
   $app_parentid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->app_parentid_1))
          {
              foreach ($this->app_parentid_1 as $tmp_app_parentid)
              {
                  if (trim($tmp_app_parentid) === trim($cadaselect[1])) { $app_parentid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->app_parentid) === trim($cadaselect[1])) { $app_parentid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($app_parentid_look))
          {
              $app_parentid_look = $this->app_parentid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_app_parentid\" class=\"css_app_parentid_line\" style=\"" .  $sStyleReadLab_app_parentid . "\">" . $this->form_format_readonly("app_parentid", $this->form_encode_input($app_parentid_look)) . "</span><span id=\"id_read_off_app_parentid\" class=\"css_read_off_app_parentid" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_app_parentid . "\">";
   echo " <span id=\"idAjaxSelect_app_parentid\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_app_parentid_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_app_parentid\" name=\"app_parentid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_app_parentid'][] = 'NULL'; 
   echo "  <option value=\"NULL\">" . str_replace("<", "&lt;","--- seleccione ---") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->app_parentid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->app_parentid)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_parentid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_parentid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['app_order']))
    {
        $this->nm_new_label['app_order'] = "App Order";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_order = $this->app_order;
   $sStyleHidden_app_order = '';
   if (isset($this->nmgp_cmp_hidden['app_order']) && $this->nmgp_cmp_hidden['app_order'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_order']);
       $sStyleHidden_app_order = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_order = 'display: none;';
   $sStyleReadInp_app_order = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_order']) && $this->nmgp_cmp_readonly['app_order'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_order']);
       $sStyleReadLab_app_order = '';
       $sStyleReadInp_app_order = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_order']) && $this->nmgp_cmp_hidden['app_order'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_order" value="<?php echo $this->form_encode_input($app_order) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_order_label" id="hidden_field_label_app_order" style="<?php echo $sStyleHidden_app_order; ?>"><span id="id_label_app_order"><?php echo $this->nm_new_label['app_order']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['php_cmp_required']['app_order']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['php_cmp_required']['app_order'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_app_order_line" id="hidden_field_data_app_order" style="<?php echo $sStyleHidden_app_order; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_order_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_order"]) &&  $this->nmgp_cmp_readonly["app_order"] == "on") { 

 ?>
<input type="hidden" name="app_order" value="<?php echo $this->form_encode_input($app_order) . "\">" . $app_order . ""; ?>
<?php } else { ?>
<span id="id_read_on_app_order" class="sc-ui-readonly-app_order css_app_order_line" style="<?php echo $sStyleReadLab_app_order; ?>"><?php echo $this->form_format_readonly("app_order", $this->form_encode_input($this->app_order)); ?></span><span id="id_read_off_app_order" class="css_read_off_app_order<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_app_order; ?>">
 <input class="sc-js-input scFormObjectOdd css_app_order_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_app_order" type=text name="app_order" value="<?php echo $this->form_encode_input($app_order) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['app_order']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['app_order']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['app_order']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_order_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_order_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['app_icon']))
    {
        $this->nm_new_label['app_icon'] = "App Icon";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_icon = $this->app_icon;
   $sStyleHidden_app_icon = '';
   if (isset($this->nmgp_cmp_hidden['app_icon']) && $this->nmgp_cmp_hidden['app_icon'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_icon']);
       $sStyleHidden_app_icon = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_icon = 'display: none;';
   $sStyleReadInp_app_icon = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_icon']) && $this->nmgp_cmp_readonly['app_icon'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_icon']);
       $sStyleReadLab_app_icon = '';
       $sStyleReadInp_app_icon = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_icon']) && $this->nmgp_cmp_hidden['app_icon'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_icon" value="<?php echo $this->form_encode_input($app_icon) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_icon_label" id="hidden_field_label_app_icon" style="<?php echo $sStyleHidden_app_icon; ?>"><span id="id_label_app_icon"><?php echo $this->nm_new_label['app_icon']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['php_cmp_required']['app_icon']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['php_cmp_required']['app_icon'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_app_icon_line" id="hidden_field_data_app_icon" style="<?php echo $sStyleHidden_app_icon; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_icon_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_icon"]) &&  $this->nmgp_cmp_readonly["app_icon"] == "on") { 

 ?>
<input type="hidden" name="app_icon" value="<?php echo $this->form_encode_input($app_icon) . "\">" . $app_icon . ""; ?>
<?php } else { ?>
<span id="id_read_on_app_icon" class="sc-ui-readonly-app_icon css_app_icon_line" style="<?php echo $sStyleReadLab_app_icon; ?>"><?php echo $this->form_format_readonly("app_icon", $this->form_encode_input($this->app_icon)); ?></span><span id="id_read_off_app_icon" class="css_read_off_app_icon<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_app_icon; ?>">
 <input class="sc-js-input scFormObjectOdd css_app_icon_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_app_icon" type=text name="app_icon" value="<?php echo $this->form_encode_input($app_icon) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_icon_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_icon_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['app_badge']))
    {
        $this->nm_new_label['app_badge'] = "App Badge";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $app_badge = $this->app_badge;
   $sStyleHidden_app_badge = '';
   if (isset($this->nmgp_cmp_hidden['app_badge']) && $this->nmgp_cmp_hidden['app_badge'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['app_badge']);
       $sStyleHidden_app_badge = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_app_badge = 'display: none;';
   $sStyleReadInp_app_badge = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['app_badge']) && $this->nmgp_cmp_readonly['app_badge'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['app_badge']);
       $sStyleReadLab_app_badge = '';
       $sStyleReadInp_app_badge = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['app_badge']) && $this->nmgp_cmp_hidden['app_badge'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="app_badge" value="<?php echo $this->form_encode_input($app_badge) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_app_badge_label" id="hidden_field_label_app_badge" style="<?php echo $sStyleHidden_app_badge; ?>"><span id="id_label_app_badge"><?php echo $this->nm_new_label['app_badge']; ?></span></TD>
    <TD class="scFormDataOdd css_app_badge_line" id="hidden_field_data_app_badge" style="<?php echo $sStyleHidden_app_badge; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_app_badge_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["app_badge"]) &&  $this->nmgp_cmp_readonly["app_badge"] == "on") { 

 ?>
<input type="hidden" name="app_badge" value="<?php echo $this->form_encode_input($app_badge) . "\">" . $app_badge . ""; ?>
<?php } else { ?>
<span id="id_read_on_app_badge" class="sc-ui-readonly-app_badge css_app_badge_line" style="<?php echo $sStyleReadLab_app_badge; ?>"><?php echo $this->form_format_readonly("app_badge", $this->form_encode_input($this->app_badge)); ?></span><span id="id_read_off_app_badge" class="css_read_off_app_badge<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_app_badge; ?>">
 <input class="sc-js-input scFormObjectOdd css_app_badge_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_app_badge" type=text name="app_badge" value="<?php echo $this->form_encode_input($app_badge) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_app_badge_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_app_badge_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['color']))
    {
        $this->nm_new_label['color'] = "Color";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $color = $this->color;
   $sStyleHidden_color = '';
   if (isset($this->nmgp_cmp_hidden['color']) && $this->nmgp_cmp_hidden['color'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['color']);
       $sStyleHidden_color = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_color = 'display: none;';
   $sStyleReadInp_color = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['color']) && $this->nmgp_cmp_readonly['color'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['color']);
       $sStyleReadLab_color = '';
       $sStyleReadInp_color = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['color']) && $this->nmgp_cmp_hidden['color'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="color" value="<?php echo $this->form_encode_input($color) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_color_label" id="hidden_field_label_color" style="<?php echo $sStyleHidden_color; ?>"><span id="id_label_color"><?php echo $this->nm_new_label['color']; ?></span></TD>
    <TD class="scFormDataOdd css_color_line" id="hidden_field_data_color" style="<?php echo $sStyleHidden_color; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_color_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["color"]) &&  $this->nmgp_cmp_readonly["color"] == "on") { 

 if ("success" == $this->color) { $color_look = "success";} 
 if ("warning" == $this->color) { $color_look = "warning";} 
 if ("danger" == $this->color) { $color_look = "danger";} 
 if ("info" == $this->color) { $color_look = "info";} 
 if ("primary" == $this->color) { $color_look = "primary";} 
 if ("blue" == $this->color) { $color_look = "blue";} 
 if ("indigo" == $this->color) { $color_look = "indigo";} 
 if ("purple" == $this->color) { $color_look = "purple";} 
 if ("pink" == $this->color) { $color_look = "pink";} 
 if ("red" == $this->color) { $color_look = "red";} 
 if ("orange" == $this->color) { $color_look = "orange";} 
 if ("yellow" == $this->color) { $color_look = "yellow";} 
 if ("green" == $this->color) { $color_look = "green";} 
 if ("teal" == $this->color) { $color_look = "teal";} 
 if ("cyan" == $this->color) { $color_look = "cyan";} 
 if ("gray" == $this->color) { $color_look = "gray";} 
 if ("azure" == $this->color) { $color_look = "azure";} 
 if ("dark" == $this->color) { $color_look = "dark";} 
 if ("lime" == $this->color) { $color_look = "lime";} 
?>
<input type="hidden" name="color" value="<?php echo $this->form_encode_input($color) . "\">" . $color_look . ""; ?>
<?php } else { ?>

<?php

 if ("success" == $this->color) { $color_look = "success";} 
 if ("warning" == $this->color) { $color_look = "warning";} 
 if ("danger" == $this->color) { $color_look = "danger";} 
 if ("info" == $this->color) { $color_look = "info";} 
 if ("primary" == $this->color) { $color_look = "primary";} 
 if ("blue" == $this->color) { $color_look = "blue";} 
 if ("indigo" == $this->color) { $color_look = "indigo";} 
 if ("purple" == $this->color) { $color_look = "purple";} 
 if ("pink" == $this->color) { $color_look = "pink";} 
 if ("red" == $this->color) { $color_look = "red";} 
 if ("orange" == $this->color) { $color_look = "orange";} 
 if ("yellow" == $this->color) { $color_look = "yellow";} 
 if ("green" == $this->color) { $color_look = "green";} 
 if ("teal" == $this->color) { $color_look = "teal";} 
 if ("cyan" == $this->color) { $color_look = "cyan";} 
 if ("gray" == $this->color) { $color_look = "gray";} 
 if ("azure" == $this->color) { $color_look = "azure";} 
 if ("dark" == $this->color) { $color_look = "dark";} 
 if ("lime" == $this->color) { $color_look = "lime";} 
?>
<span id="id_read_on_color"  class="css_color_line" style="<?php echo $sStyleReadLab_color; ?>"><?php echo $this->form_format_readonly("color", $this->form_encode_input($color_look)); ?></span><span id="id_read_off_color" class="css_read_off_color css_color_line" style="<?php echo $sStyleReadInp_color; ?>"><div id="idAjaxRadio_color" style="display: inline-block"  class="css_color_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="success"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'success'; ?>
<?php  if ("success" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">success</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="warning"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'warning'; ?>
<?php  if ("warning" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">warning</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-3"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="danger"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'danger'; ?>
<?php  if ("danger" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">danger</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-4"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="info"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'info'; ?>
<?php  if ("info" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">info</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-5"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="primary"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'primary'; ?>
<?php  if ("primary" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">primary</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-6"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="blue"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'blue'; ?>
<?php  if ("blue" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">blue</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-7"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="indigo"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'indigo'; ?>
<?php  if ("indigo" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">indigo</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-8"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="purple"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'purple'; ?>
<?php  if ("purple" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">purple</label> </div>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-9"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="pink"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'pink'; ?>
<?php  if ("pink" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">pink</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-10"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="red"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'red'; ?>
<?php  if ("red" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">red</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-11"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="orange"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'orange'; ?>
<?php  if ("orange" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">orange</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-12"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="yellow"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'yellow'; ?>
<?php  if ("yellow" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">yellow</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-13"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="green"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'green'; ?>
<?php  if ("green" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">green</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-14"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="teal"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'teal'; ?>
<?php  if ("teal" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">teal</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-15"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="cyan"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'cyan'; ?>
<?php  if ("cyan" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">cyan</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-16"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="gray"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'gray'; ?>
<?php  if ("gray" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">gray</label> </div>
</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-17"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="azure"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'azure'; ?>
<?php  if ("azure" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">azure</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-18"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="dark"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'dark'; ?>
<?php  if ("dark" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">dark</label> </div>
</TD>
  <TD class="scFormDataFontOdd css_color_line"> <div class="sc radio">
<?php $tempOptionId = "id-opt-color" . $sc_seq_vert . "-19"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-color sc-ui-radio-color" type=radio name="color" value="lime"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['Lookup_color'][] = 'lime'; ?>
<?php  if ("lime" == $this->color)  { echo " checked" ;} ?>  onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">lime</label> </div>
</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_color_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_color_text"></span></td></tr></table></td></tr></table></TD>
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['birpara'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['first'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['back'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['forward'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_seg_apps");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_seg_apps");
 parent.scAjaxDetailHeight("form_seg_apps", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_seg_apps", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_seg_apps", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_seg_apps']['buttonStatus'] = $this->nmgp_botoes;
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
