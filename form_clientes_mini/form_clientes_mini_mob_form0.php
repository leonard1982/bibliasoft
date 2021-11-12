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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Nuevo Cliente"); } else { echo strip_tags("Editar Cliente"); } ?></TITLE>
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
.css_read_off_nacimiento button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechault button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_afiliacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_con_actual button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_creado button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_clientes_mini/form_clientes_mini_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_clientes_mini_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "documento")
     {
        $('input[name="documento"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="documento"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="documento"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "tipo_documento")
     {
        $('select[name="tipo_documento"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="tipo_documento"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="tipo_documento"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "nombres")
     {
        $('input[name="nombres"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="nombres"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="nombres"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "regimen")
     {
        $('select[name="regimen"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="regimen"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="regimen"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_clientes_mini_mob_jquery.php');

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

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('tipo_documento');

<?php
}
?>
  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $("#hidden_bloco_0,#hidden_bloco_3").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
    "hidden_bloco_0": true,
    "hidden_bloco_3": true
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_clientes_mini']['error_buffer']) && '' != $_SESSION['scriptcase']['form_clientes_mini']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_clientes_mini']['error_buffer'];
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
 include_once("form_clientes_mini_mob_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="form_clientes_mini_mob.php" 
               onsubmit="return false;" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['insert_validation']; ?>">
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
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_clientes_mini_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_clientes_mini_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Nuevo Cliente"; } else { echo "Editar Cliente"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/usr__NM__bg__NM__groups_people_people_1715.png';echo '<IMG SRC="usr__NM__bg__NM__groups_people_people_1715.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/usr__NM__bg__NM__groups_people_people_1715.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "" . $this->Ini->Nm_lang['lang_btns_options'] . "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['group_group_2']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['group_group_2']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['group_group_2']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['group_group_2']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['group_group_2'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $buttonMacroDisabled . "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
echo nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 't', '', 'ini');
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['new'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['insert'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['bcancelar'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['update'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['delete'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label'][''];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['copy']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['copy']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['copy']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['copy']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['copy'];
        }
?>
  <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
echo nmButtonGroupTableOutput($this->arr_buttons, "", '', '', '', 'fim');
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idtercero']))
   {
       $this->nmgp_cmp_hidden['idtercero'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['sexo']))
   {
       $this->nmgp_cmp_hidden['sexo'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idmuni']))
   {
       $this->nmgp_cmp_hidden['idmuni'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nombre1']))
   {
       $this->nmgp_cmp_hidden['nombre1'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nombre2']))
   {
       $this->nmgp_cmp_hidden['nombre2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['apellido1']))
   {
       $this->nmgp_cmp_hidden['apellido1'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['apellido2']))
   {
       $this->nmgp_cmp_hidden['apellido2'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['representante']))
   {
       $this->nmgp_cmp_hidden['representante'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['imagenter']))
   {
       $this->nmgp_cmp_hidden['imagenter'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['es_restaurante']))
   {
       $this->nmgp_cmp_hidden['es_restaurante'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['ciudad']))
   {
       $this->nmgp_cmp_hidden['ciudad'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['codigo_postal']))
   {
       $this->nmgp_cmp_hidden['codigo_postal'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['lenguaje']))
   {
       $this->nmgp_cmp_hidden['lenguaje'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nombre_comercil']))
   {
       $this->nmgp_cmp_hidden['nombre_comercil'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['notificar']))
   {
       $this->nmgp_cmp_hidden['notificar'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['codigo_tercero']))
   {
       $this->nmgp_cmp_hidden['codigo_tercero'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['departamento']))
   {
       $this->nmgp_cmp_hidden['departamento'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['r_social']))
   {
       $this->nmgp_cmp_hidden['r_social'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="imagenter_ul_name" id="id_sc_field_imagenter_ul_name" value="<?php echo $this->form_encode_input($this->imagenter_ul_name);?>">
<input type="hidden" name="imagenter_ul_type" id="id_sc_field_imagenter_ul_type" value="<?php echo $this->form_encode_input($this->imagenter_ul_type);?>">
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['imagenter']))
    {
        $this->nm_new_label['imagenter'] = "Foto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $imagenter = $this->imagenter;
   if (!isset($this->nmgp_cmp_hidden['imagenter']))
   {
       $this->nmgp_cmp_hidden['imagenter'] = 'off';
   }
   $sStyleHidden_imagenter = '';
   if (isset($this->nmgp_cmp_hidden['imagenter']) && $this->nmgp_cmp_hidden['imagenter'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['imagenter']);
       $sStyleHidden_imagenter = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_imagenter = 'display: none;';
   $sStyleReadInp_imagenter = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['imagenter']) && $this->nmgp_cmp_readonly['imagenter'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['imagenter']);
       $sStyleReadLab_imagenter = '';
       $sStyleReadInp_imagenter = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['imagenter']) && $this->nmgp_cmp_hidden['imagenter'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imagenter" value="<?php echo $this->form_encode_input($imagenter) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_imagenter_line" id="hidden_field_data_imagenter" style="<?php echo $sStyleHidden_imagenter; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_imagenter_line" style="padding: 0px"><span class="scFormLabelOddFormat css_imagenter_label" style=""><span id="id_label_imagenter"><?php echo $this->nm_new_label['imagenter']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_imagenter" => $out1_imagenter); ?><script>var var_ajax_img_imagenter = '<?php echo $out1_imagenter; ?>';</script><input type="hidden" name="temp_out_imagenter" value="<?php echo $this->form_encode_input($out_imagenter); ?>" /><input type="hidden" name="temp_out1_imagenter" value="<?php echo $this->form_encode_input($out1_imagenter); ?>" /><?php if (!empty($out_imagenter)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_imagenter, '" . $this->nmgp_return_img['imagenter'][0] . "', '" . $this->nmgp_return_img['imagenter'][1] . "')\"><img id=\"id_ajax_img_imagenter\"  border=\"0\" src=\"$out_imagenter\"></a>"; } else {  echo "<img id=\"id_ajax_img_imagenter\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imagenter"]) &&  $this->nmgp_cmp_readonly["imagenter"] == "on") { 

 ?>
<img id=\"imagenter_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="imagenter" value="<?php echo $this->form_encode_input($imagenter) . "\">" . $imagenter . ""; ?>
<?php } else { ?>
<span id="id_read_off_imagenter" class="css_read_off_imagenter<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_imagenter; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-imagenter" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_imagenter_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="imagenter[]" id="id_sc_field_imagenter" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_imagenter"<?php if ($this->nmgp_opcao == "novo" || empty($imagenter)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="imagenter_limpa" value="<?php echo $imagenter_limpa . '" '; if ($imagenter_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="imagenter_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_imagenter" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_imagenter" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('imagenter')", "nm_mostra_mens('imagenter')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imagenter_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imagenter_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_documento']))
   {
       $this->nm_new_label['tipo_documento'] = "Tipo Documento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_documento = $this->tipo_documento;
   $sStyleHidden_tipo_documento = '';
   if (isset($this->nmgp_cmp_hidden['tipo_documento']) && $this->nmgp_cmp_hidden['tipo_documento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_documento']);
       $sStyleHidden_tipo_documento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_documento = 'display: none;';
   $sStyleReadInp_tipo_documento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_documento']) && $this->nmgp_cmp_readonly['tipo_documento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_documento']);
       $sStyleReadLab_tipo_documento = '';
       $sStyleReadInp_tipo_documento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_documento']) && $this->nmgp_cmp_hidden['tipo_documento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_documento" value="<?php echo $this->form_encode_input($this->tipo_documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_documento_line" id="hidden_field_data_tipo_documento" style="<?php echo $sStyleHidden_tipo_documento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_documento_line" style="padding: 0px"><span class="scFormLabelOddFormat css_tipo_documento_label" style=""><span id="id_label_tipo_documento"><?php echo $this->nm_new_label['tipo_documento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_documento"]) &&  $this->nmgp_cmp_readonly["tipo_documento"] == "on") { 

$tipo_documento_look = "";
 if ($this->tipo_documento == "11") { $tipo_documento_look .= "Registtro civil de nacimiento" ;} 
 if ($this->tipo_documento == "12") { $tipo_documento_look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento == "13") { $tipo_documento_look .= "Cédula de ciudadanía" ;} 
 if ($this->tipo_documento == "21") { $tipo_documento_look .= "Tarjeta de Extranjería" ;} 
 if ($this->tipo_documento == "22") { $tipo_documento_look .= "Cédula de extranjería" ;} 
 if ($this->tipo_documento == "31") { $tipo_documento_look .= "Nit" ;} 
 if ($this->tipo_documento == "41") { $tipo_documento_look .= "Pasaporte" ;} 
 if ($this->tipo_documento == "42") { $tipo_documento_look .= "Tipo de documento extranjero" ;} 
 if ($this->tipo_documento == "43") { $tipo_documento_look .= "Definido por la DIAN" ;} 
 if (empty($tipo_documento_look)) { $tipo_documento_look = $this->tipo_documento; }
?>
<input type="hidden" name="tipo_documento" value="<?php echo $this->form_encode_input($tipo_documento) . "\">" . $tipo_documento_look . ""; ?>
<?php } else { ?>
<?php

$tipo_documento_look = "";
 if ($this->tipo_documento == "11") { $tipo_documento_look .= "Registtro civil de nacimiento" ;} 
 if ($this->tipo_documento == "12") { $tipo_documento_look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento == "13") { $tipo_documento_look .= "Cédula de ciudadanía" ;} 
 if ($this->tipo_documento == "21") { $tipo_documento_look .= "Tarjeta de Extranjería" ;} 
 if ($this->tipo_documento == "22") { $tipo_documento_look .= "Cédula de extranjería" ;} 
 if ($this->tipo_documento == "31") { $tipo_documento_look .= "Nit" ;} 
 if ($this->tipo_documento == "41") { $tipo_documento_look .= "Pasaporte" ;} 
 if ($this->tipo_documento == "42") { $tipo_documento_look .= "Tipo de documento extranjero" ;} 
 if ($this->tipo_documento == "43") { $tipo_documento_look .= "Definido por la DIAN" ;} 
 if (empty($tipo_documento_look)) { $tipo_documento_look = $this->tipo_documento; }
?>
<span id="id_read_on_tipo_documento" class="css_tipo_documento_line"  style="<?php echo $sStyleReadLab_tipo_documento; ?>"><?php echo $this->form_format_readonly("tipo_documento", $this->form_encode_input($tipo_documento_look)); ?></span><span id="id_read_off_tipo_documento" class="css_read_off_tipo_documento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_documento; ?>">
 <span id="idAjaxSelect_tipo_documento" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_documento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_documento" name="tipo_documento" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="11" <?php  if ($this->tipo_documento == "11") { echo " selected" ;} ?>>Registtro civil de nacimiento</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '11'; ?>
 <option  value="12" <?php  if ($this->tipo_documento == "12") { echo " selected" ;} ?>>Tarjeta de identidad</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '12'; ?>
 <option  value="13" <?php  if ($this->tipo_documento == "13") { echo " selected" ;} ?><?php  if (empty($this->tipo_documento)) { echo " selected" ;} ?>>Cédula de ciudadanía</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '13'; ?>
 <option  value="21" <?php  if ($this->tipo_documento == "21") { echo " selected" ;} ?>>Tarjeta de Extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '21'; ?>
 <option  value="22" <?php  if ($this->tipo_documento == "22") { echo " selected" ;} ?>>Cédula de extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '22'; ?>
 <option  value="31" <?php  if ($this->tipo_documento == "31") { echo " selected" ;} ?>>Nit</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '31'; ?>
 <option  value="41" <?php  if ($this->tipo_documento == "41") { echo " selected" ;} ?>>Pasaporte</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '41'; ?>
 <option  value="42" <?php  if ($this->tipo_documento == "42") { echo " selected" ;} ?>>Tipo de documento extranjero</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '42'; ?>
 <option  value="43" <?php  if ($this->tipo_documento == "43") { echo " selected" ;} ?>>Definido por la DIAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo_documento'][] = '43'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_documento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_documento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['documento']))
    {
        $this->nm_new_label['documento'] = "No Documento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $documento = $this->documento;
   $sStyleHidden_documento = '';
   if (isset($this->nmgp_cmp_hidden['documento']) && $this->nmgp_cmp_hidden['documento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['documento']);
       $sStyleHidden_documento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_documento = 'display: none;';
   $sStyleReadInp_documento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['documento']) && $this->nmgp_cmp_readonly['documento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['documento']);
       $sStyleReadLab_documento = '';
       $sStyleReadInp_documento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['documento']) && $this->nmgp_cmp_hidden['documento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="documento" value="<?php echo $this->form_encode_input($documento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_documento_line" id="hidden_field_data_documento" style="<?php echo $sStyleHidden_documento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_documento_line" style="padding: 0px"><span class="scFormLabelOddFormat css_documento_label" style=""><span id="id_label_documento"><?php echo $this->nm_new_label['documento']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['documento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['documento'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["documento"]) &&  $this->nmgp_cmp_readonly["documento"] == "on") { 

 ?>
<input type="hidden" name="documento" value="<?php echo $this->form_encode_input($documento) . "\">" . $documento . ""; ?>
<?php } else { ?>
<span id="id_read_on_documento" class="sc-ui-readonly-documento css_documento_line" style="<?php echo $sStyleReadLab_documento; ?>"><?php echo $this->form_format_readonly("documento", $this->form_encode_input($this->documento)); ?></span><span id="id_read_off_documento" class="css_read_off_documento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_documento; ?>">
 <input class="sc-js-input scFormObjectOdd css_documento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_documento" type=text name="documento" value="<?php echo $this->form_encode_input($documento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=14"; } ?> maxlength=14 alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Cédula o Nit', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_documento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_documento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dv']))
    {
        $this->nm_new_label['dv'] = "DV";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dv = $this->dv;
   $sStyleHidden_dv = '';
   if (isset($this->nmgp_cmp_hidden['dv']) && $this->nmgp_cmp_hidden['dv'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dv']);
       $sStyleHidden_dv = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dv = 'display: none;';
   $sStyleReadInp_dv = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dv']) && $this->nmgp_cmp_readonly['dv'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dv']);
       $sStyleReadLab_dv = '';
       $sStyleReadInp_dv = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dv']) && $this->nmgp_cmp_hidden['dv'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dv" value="<?php echo $this->form_encode_input($dv) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dv_line" id="hidden_field_data_dv" style="<?php echo $sStyleHidden_dv; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dv_line" style="padding: 0px"><span class="scFormLabelOddFormat css_dv_label" style=""><span id="id_label_dv"><?php echo $this->nm_new_label['dv']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dv"]) &&  $this->nmgp_cmp_readonly["dv"] == "on") { 

 ?>
<input type="hidden" name="dv" value="<?php echo $this->form_encode_input($dv) . "\">" . $dv . ""; ?>
<?php } else { ?>
<span id="id_read_on_dv" class="sc-ui-readonly-dv css_dv_line" style="<?php echo $sStyleReadLab_dv; ?>"><?php echo $this->form_format_readonly("dv", $this->form_encode_input($this->dv)); ?></span><span id="id_read_off_dv" class="css_read_off_dv<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dv; ?>">
 <input class="sc-js-input scFormObjectOdd css_dv_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dv" type=text name="dv" value="<?php echo $this->form_encode_input($dv) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 1, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dv']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dv']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dv']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dv_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dv_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo']))
   {
       $this->nm_new_label['tipo'] = "Tipo persona";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo = $this->tipo;
   $sStyleHidden_tipo = '';
   if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo']);
       $sStyleHidden_tipo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo = 'display: none;';
   $sStyleReadInp_tipo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo']) && $this->nmgp_cmp_readonly['tipo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo']);
       $sStyleReadLab_tipo = '';
       $sStyleReadInp_tipo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo" value="<?php echo $this->form_encode_input($this->tipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_line" id="hidden_field_data_tipo" style="<?php echo $sStyleHidden_tipo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_label" style=""><span id="id_label_tipo"><?php echo $this->nm_new_label['tipo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['tipo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo"]) &&  $this->nmgp_cmp_readonly["tipo"] == "on") { 

$tipo_look = "";
 if ($this->tipo == "NAT") { $tipo_look .= "NATURAL" ;} 
 if ($this->tipo == "JUR") { $tipo_look .= "JURÍDICA" ;} 
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">" . $tipo_look . ""; ?>
<?php } else { ?>
<?php

$tipo_look = "";
 if ($this->tipo == "NAT") { $tipo_look .= "NATURAL" ;} 
 if ($this->tipo == "JUR") { $tipo_look .= "JURÍDICA" ;} 
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<span id="id_read_on_tipo" class="css_tipo_line"  style="<?php echo $sStyleReadLab_tipo; ?>"><?php echo $this->form_format_readonly("tipo", $this->form_encode_input($tipo_look)); ?></span><span id="id_read_off_tipo" class="css_read_off_tipo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo; ?>">
 <span id="idAjaxSelect_tipo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo" name="tipo" size="1" alt="{type: 'select', enterTab: true}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo'][] = ''; ?>
 <option value=""></option>
 <option  value="NAT" <?php  if ($this->tipo == "NAT") { echo " selected" ;} ?>>NATURAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo'][] = 'NAT'; ?>
 <option  value="JUR" <?php  if ($this->tipo == "JUR") { echo " selected" ;} ?>>JURÍDICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_tipo'][] = 'JUR'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_text"></span></td></tr></table></td></tr></table> </TD>
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
       $this->nm_new_label['regimen'] = "Régimen";
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

    <TD class="scFormDataOdd css_regimen_line" id="hidden_field_data_regimen" style="<?php echo $sStyleHidden_regimen; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regimen_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regimen_label" style=""><span id="id_label_regimen"><?php echo $this->nm_new_label['regimen']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['regimen']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['regimen'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regimen"]) &&  $this->nmgp_cmp_readonly["regimen"] == "on") { 

$regimen_look = "";
 if ($this->regimen == "SIM") { $regimen_look .= "NO RESPONSABLE" ;} 
 if ($this->regimen == "COMUN") { $regimen_look .= "RESPONSABLE" ;} 
 if (empty($regimen_look)) { $regimen_look = $this->regimen; }
?>
<input type="hidden" name="regimen" value="<?php echo $this->form_encode_input($regimen) . "\">" . $regimen_look . ""; ?>
<?php } else { ?>
<?php

$regimen_look = "";
 if ($this->regimen == "SIM") { $regimen_look .= "NO RESPONSABLE" ;} 
 if ($this->regimen == "COMUN") { $regimen_look .= "RESPONSABLE" ;} 
 if (empty($regimen_look)) { $regimen_look = $this->regimen; }
?>
<span id="id_read_on_regimen" class="css_regimen_line"  style="<?php echo $sStyleReadLab_regimen; ?>"><?php echo $this->form_format_readonly("regimen", $this->form_encode_input($regimen_look)); ?></span><span id="id_read_off_regimen" class="css_read_off_regimen<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_regimen; ?>">
 <span id="idAjaxSelect_regimen" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_regimen_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_regimen" name="regimen" size="1" alt="{type: 'select', enterTab: true}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_regimen'][] = ''; ?>
 <option value="">SELECCIONE</option>
 <option  value="SIM" <?php  if ($this->regimen == "SIM") { echo " selected" ;} ?>>NO RESPONSABLE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_regimen'][] = 'SIM'; ?>
 <option  value="COMUN" <?php  if ($this->regimen == "COMUN") { echo " selected" ;} ?>>RESPONSABLE</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_regimen'][] = 'COMUN'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regimen_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regimen_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_regimen_dumb = ('' == $sStyleHidden_regimen) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_regimen_dumb" style="<?php echo $sStyleHidden_regimen_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['nombres']))
    {
        $this->nm_new_label['nombres'] = "Nombre ó Razón Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombres = $this->nombres;
   $sStyleHidden_nombres = '';
   if (isset($this->nmgp_cmp_hidden['nombres']) && $this->nmgp_cmp_hidden['nombres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombres']);
       $sStyleHidden_nombres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombres = 'display: none;';
   $sStyleReadInp_nombres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombres']) && $this->nmgp_cmp_readonly['nombres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombres']);
       $sStyleReadLab_nombres = '';
       $sStyleReadInp_nombres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombres']) && $this->nmgp_cmp_hidden['nombres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombres" value="<?php echo $this->form_encode_input($nombres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombres_line" id="hidden_field_data_nombres" style="<?php echo $sStyleHidden_nombres; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombres_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombres_label" style=""><span id="id_label_nombres"><?php echo $this->nm_new_label['nombres']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombres"]) &&  $this->nmgp_cmp_readonly["nombres"] == "on") { 

 ?>
<input type="hidden" name="nombres" value="<?php echo $this->form_encode_input($nombres) . "\">" . $nombres . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombres" class="sc-ui-readonly-nombres css_nombres_line" style="<?php echo $sStyleReadLab_nombres; ?>"><?php echo $this->form_format_readonly("nombres", $this->form_encode_input($this->nombres)); ?></span><span id="id_read_off_nombres" class="css_read_off_nombres<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombres; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombres_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombres" type=text name="nombres" value="<?php echo $this->form_encode_input($nombres) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombres_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['direccion'] = "Dirección";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Dirección...', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_direccion_dumb = ('' == $sStyleHidden_direccion) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_direccion_dumb" style="<?php echo $sStyleHidden_direccion_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['codigo_tercero']))
    {
        $this->nm_new_label['codigo_tercero'] = "Código Tercero";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_tercero = $this->codigo_tercero;
   if (!isset($this->nmgp_cmp_hidden['codigo_tercero']))
   {
       $this->nmgp_cmp_hidden['codigo_tercero'] = 'off';
   }
   $sStyleHidden_codigo_tercero = '';
   if (isset($this->nmgp_cmp_hidden['codigo_tercero']) && $this->nmgp_cmp_hidden['codigo_tercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_tercero']);
       $sStyleHidden_codigo_tercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_tercero = 'display: none;';
   $sStyleReadInp_codigo_tercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_tercero']) && $this->nmgp_cmp_readonly['codigo_tercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_tercero']);
       $sStyleReadLab_codigo_tercero = '';
       $sStyleReadInp_codigo_tercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_tercero']) && $this->nmgp_cmp_hidden['codigo_tercero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_tercero" value="<?php echo $this->form_encode_input($codigo_tercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_tercero_line" id="hidden_field_data_codigo_tercero" style="<?php echo $sStyleHidden_codigo_tercero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_tercero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_tercero_label" style=""><span id="id_label_codigo_tercero"><?php echo $this->nm_new_label['codigo_tercero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_tercero"]) &&  $this->nmgp_cmp_readonly["codigo_tercero"] == "on") { 

 ?>
<input type="hidden" name="codigo_tercero" value="<?php echo $this->form_encode_input($codigo_tercero) . "\">" . $codigo_tercero . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_tercero" class="sc-ui-readonly-codigo_tercero css_codigo_tercero_line" style="<?php echo $sStyleReadLab_codigo_tercero; ?>"><?php echo $this->form_format_readonly("codigo_tercero", $this->form_encode_input($this->codigo_tercero)); ?></span><span id="id_read_off_codigo_tercero" class="css_read_off_codigo_tercero<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_tercero; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_tercero_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_tercero" type=text name="codigo_tercero" value="<?php echo $this->form_encode_input($codigo_tercero) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~.-_") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_tercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['sexo']))
   {
       $this->nm_new_label['sexo'] = "Género";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sexo = $this->sexo;
   if (!isset($this->nmgp_cmp_hidden['sexo']))
   {
       $this->nmgp_cmp_hidden['sexo'] = 'off';
   }
   $sStyleHidden_sexo = '';
   if (isset($this->nmgp_cmp_hidden['sexo']) && $this->nmgp_cmp_hidden['sexo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sexo']);
       $sStyleHidden_sexo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sexo = 'display: none;';
   $sStyleReadInp_sexo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sexo']) && $this->nmgp_cmp_readonly['sexo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sexo']);
       $sStyleReadLab_sexo = '';
       $sStyleReadInp_sexo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sexo']) && $this->nmgp_cmp_hidden['sexo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sexo" value="<?php echo $this->form_encode_input($this->sexo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sexo_line" id="hidden_field_data_sexo" style="<?php echo $sStyleHidden_sexo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sexo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sexo_label" style=""><span id="id_label_sexo"><?php echo $this->nm_new_label['sexo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['sexo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['php_cmp_required']['sexo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sexo"]) &&  $this->nmgp_cmp_readonly["sexo"] == "on") { 

$sexo_look = "";
 if ($this->sexo == "M") { $sexo_look .= "Masculino" ;} 
 if ($this->sexo == "F") { $sexo_look .= "Femenino" ;} 
 if ($this->sexo == "O") { $sexo_look .= "Otro" ;} 
 if (empty($sexo_look)) { $sexo_look = $this->sexo; }
?>
<input type="hidden" name="sexo" value="<?php echo $this->form_encode_input($sexo) . "\">" . $sexo_look . ""; ?>
<?php } else { ?>
<?php

$sexo_look = "";
 if ($this->sexo == "M") { $sexo_look .= "Masculino" ;} 
 if ($this->sexo == "F") { $sexo_look .= "Femenino" ;} 
 if ($this->sexo == "O") { $sexo_look .= "Otro" ;} 
 if (empty($sexo_look)) { $sexo_look = $this->sexo; }
?>
<span id="id_read_on_sexo" class="css_sexo_line"  style="<?php echo $sStyleReadLab_sexo; ?>"><?php echo $this->form_format_readonly("sexo", $this->form_encode_input($sexo_look)); ?></span><span id="id_read_off_sexo" class="css_read_off_sexo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_sexo; ?>">
 <span id="idAjaxSelect_sexo" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_sexo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sexo" name="sexo" size="1" alt="{type: 'select', enterTab: true}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_sexo'][] = ''; ?>
 <option value=""></option>
 <option  value="M" <?php  if ($this->sexo == "M") { echo " selected" ;} ?>>Masculino</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_sexo'][] = 'M'; ?>
 <option  value="F" <?php  if ($this->sexo == "F") { echo " selected" ;} ?>>Femenino</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_sexo'][] = 'F'; ?>
 <option  value="O" <?php  if ($this->sexo == "O") { echo " selected" ;} ?>>Otro</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_sexo'][] = 'O'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sexo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sexo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['notificar']))
   {
       $this->nm_new_label['notificar'] = "Notificar **";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notificar = $this->notificar;
   if (!isset($this->nmgp_cmp_hidden['notificar']))
   {
       $this->nmgp_cmp_hidden['notificar'] = 'off';
   }
   $sStyleHidden_notificar = '';
   if (isset($this->nmgp_cmp_hidden['notificar']) && $this->nmgp_cmp_hidden['notificar'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notificar']);
       $sStyleHidden_notificar = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notificar = 'display: none;';
   $sStyleReadInp_notificar = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notificar']) && $this->nmgp_cmp_readonly['notificar'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notificar']);
       $sStyleReadLab_notificar = '';
       $sStyleReadInp_notificar = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notificar']) && $this->nmgp_cmp_hidden['notificar'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="notificar" value="<?php echo $this->form_encode_input($this->notificar) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_notificar_line" id="hidden_field_data_notificar" style="<?php echo $sStyleHidden_notificar; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_notificar_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_notificar_label" style=""><span id="id_label_notificar"><?php echo $this->nm_new_label['notificar']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["notificar"]) &&  $this->nmgp_cmp_readonly["notificar"] == "on") { 

$notificar_look = "";
 if ($this->notificar == "SI") { $notificar_look .= "SI" ;} 
 if ($this->notificar == "NO") { $notificar_look .= "NO" ;} 
 if (empty($notificar_look)) { $notificar_look = $this->notificar; }
?>
<input type="hidden" name="notificar" value="<?php echo $this->form_encode_input($notificar) . "\">" . $notificar_look . ""; ?>
<?php } else { ?>
<?php

$notificar_look = "";
 if ($this->notificar == "SI") { $notificar_look .= "SI" ;} 
 if ($this->notificar == "NO") { $notificar_look .= "NO" ;} 
 if (empty($notificar_look)) { $notificar_look = $this->notificar; }
?>
<span id="id_read_on_notificar" class="css_notificar_line"  style="<?php echo $sStyleReadLab_notificar; ?>"><?php echo $this->form_format_readonly("notificar", $this->form_encode_input($notificar_look)); ?></span><span id="id_read_off_notificar" class="css_read_off_notificar<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_notificar; ?>">
 <span id="idAjaxSelect_notificar" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_notificar_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_notificar" name="notificar" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="SI" <?php  if ($this->notificar == "SI") { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_notificar'][] = 'SI'; ?>
 <option  value="NO" <?php  if ($this->notificar == "NO") { echo " selected" ;} ?><?php  if (empty($this->notificar)) { echo " selected" ;} ?>>NO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_notificar'][] = 'NO'; ?>
 </select></span>
</span><?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('notificar')", "nm_mostra_mens('notificar')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_notificar_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_notificar_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_notificar_dumb = ('' == $sStyleHidden_notificar) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_notificar_dumb" style="<?php echo $sStyleHidden_notificar_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Contacto<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre1']))
    {
        $this->nm_new_label['nombre1'] = "Primer Nombre **";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre1 = $this->nombre1;
   if (!isset($this->nmgp_cmp_hidden['nombre1']))
   {
       $this->nmgp_cmp_hidden['nombre1'] = 'off';
   }
   $sStyleHidden_nombre1 = '';
   if (isset($this->nmgp_cmp_hidden['nombre1']) && $this->nmgp_cmp_hidden['nombre1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre1']);
       $sStyleHidden_nombre1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre1 = 'display: none;';
   $sStyleReadInp_nombre1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre1']) && $this->nmgp_cmp_readonly['nombre1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre1']);
       $sStyleReadLab_nombre1 = '';
       $sStyleReadInp_nombre1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre1']) && $this->nmgp_cmp_hidden['nombre1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre1" value="<?php echo $this->form_encode_input($nombre1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre1_line" id="hidden_field_data_nombre1" style="<?php echo $sStyleHidden_nombre1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre1_label" style=""><span id="id_label_nombre1"><?php echo $this->nm_new_label['nombre1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre1"]) &&  $this->nmgp_cmp_readonly["nombre1"] == "on") { 

 ?>
<input type="hidden" name="nombre1" value="<?php echo $this->form_encode_input($nombre1) . "\">" . $nombre1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre1" class="sc-ui-readonly-nombre1 css_nombre1_line" style="<?php echo $sStyleReadLab_nombre1; ?>"><?php echo $this->form_format_readonly("nombre1", $this->form_encode_input($this->nombre1)); ?></span><span id="id_read_off_nombre1" class="css_read_off_nombre1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre1; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre1" type=text name="nombre1" value="<?php echo $this->form_encode_input($nombre1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('nombre1')", "nm_mostra_mens('nombre1')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre2']))
    {
        $this->nm_new_label['nombre2'] = "Otros Nombres";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre2 = $this->nombre2;
   if (!isset($this->nmgp_cmp_hidden['nombre2']))
   {
       $this->nmgp_cmp_hidden['nombre2'] = 'off';
   }
   $sStyleHidden_nombre2 = '';
   if (isset($this->nmgp_cmp_hidden['nombre2']) && $this->nmgp_cmp_hidden['nombre2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre2']);
       $sStyleHidden_nombre2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre2 = 'display: none;';
   $sStyleReadInp_nombre2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre2']) && $this->nmgp_cmp_readonly['nombre2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre2']);
       $sStyleReadLab_nombre2 = '';
       $sStyleReadInp_nombre2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre2']) && $this->nmgp_cmp_hidden['nombre2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre2" value="<?php echo $this->form_encode_input($nombre2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre2_line" id="hidden_field_data_nombre2" style="<?php echo $sStyleHidden_nombre2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre2_label" style=""><span id="id_label_nombre2"><?php echo $this->nm_new_label['nombre2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre2"]) &&  $this->nmgp_cmp_readonly["nombre2"] == "on") { 

 ?>
<input type="hidden" name="nombre2" value="<?php echo $this->form_encode_input($nombre2) . "\">" . $nombre2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre2" class="sc-ui-readonly-nombre2 css_nombre2_line" style="<?php echo $sStyleReadLab_nombre2; ?>"><?php echo $this->form_format_readonly("nombre2", $this->form_encode_input($this->nombre2)); ?></span><span id="id_read_off_nombre2" class="css_read_off_nombre2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre2; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre2" type=text name="nombre2" value="<?php echo $this->form_encode_input($nombre2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['apellido1']))
    {
        $this->nm_new_label['apellido1'] = "Primer Apellido **";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $apellido1 = $this->apellido1;
   if (!isset($this->nmgp_cmp_hidden['apellido1']))
   {
       $this->nmgp_cmp_hidden['apellido1'] = 'off';
   }
   $sStyleHidden_apellido1 = '';
   if (isset($this->nmgp_cmp_hidden['apellido1']) && $this->nmgp_cmp_hidden['apellido1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['apellido1']);
       $sStyleHidden_apellido1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_apellido1 = 'display: none;';
   $sStyleReadInp_apellido1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['apellido1']) && $this->nmgp_cmp_readonly['apellido1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['apellido1']);
       $sStyleReadLab_apellido1 = '';
       $sStyleReadInp_apellido1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['apellido1']) && $this->nmgp_cmp_hidden['apellido1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="apellido1" value="<?php echo $this->form_encode_input($apellido1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_apellido1_line" id="hidden_field_data_apellido1" style="<?php echo $sStyleHidden_apellido1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_apellido1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_apellido1_label" style=""><span id="id_label_apellido1"><?php echo $this->nm_new_label['apellido1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apellido1"]) &&  $this->nmgp_cmp_readonly["apellido1"] == "on") { 

 ?>
<input type="hidden" name="apellido1" value="<?php echo $this->form_encode_input($apellido1) . "\">" . $apellido1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_apellido1" class="sc-ui-readonly-apellido1 css_apellido1_line" style="<?php echo $sStyleReadLab_apellido1; ?>"><?php echo $this->form_format_readonly("apellido1", $this->form_encode_input($this->apellido1)); ?></span><span id="id_read_off_apellido1" class="css_read_off_apellido1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_apellido1; ?>">
 <input class="sc-js-input scFormObjectOdd css_apellido1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_apellido1" type=text name="apellido1" value="<?php echo $this->form_encode_input($apellido1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('apellido1')", "nm_mostra_mens('apellido1')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apellido1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apellido1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['apellido2']))
    {
        $this->nm_new_label['apellido2'] = "Segundo Apellido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $apellido2 = $this->apellido2;
   if (!isset($this->nmgp_cmp_hidden['apellido2']))
   {
       $this->nmgp_cmp_hidden['apellido2'] = 'off';
   }
   $sStyleHidden_apellido2 = '';
   if (isset($this->nmgp_cmp_hidden['apellido2']) && $this->nmgp_cmp_hidden['apellido2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['apellido2']);
       $sStyleHidden_apellido2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_apellido2 = 'display: none;';
   $sStyleReadInp_apellido2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['apellido2']) && $this->nmgp_cmp_readonly['apellido2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['apellido2']);
       $sStyleReadLab_apellido2 = '';
       $sStyleReadInp_apellido2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['apellido2']) && $this->nmgp_cmp_hidden['apellido2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="apellido2" value="<?php echo $this->form_encode_input($apellido2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_apellido2_line" id="hidden_field_data_apellido2" style="<?php echo $sStyleHidden_apellido2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_apellido2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_apellido2_label" style=""><span id="id_label_apellido2"><?php echo $this->nm_new_label['apellido2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apellido2"]) &&  $this->nmgp_cmp_readonly["apellido2"] == "on") { 

 ?>
<input type="hidden" name="apellido2" value="<?php echo $this->form_encode_input($apellido2) . "\">" . $apellido2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_apellido2" class="sc-ui-readonly-apellido2 css_apellido2_line" style="<?php echo $sStyleReadLab_apellido2; ?>"><?php echo $this->form_format_readonly("apellido2", $this->form_encode_input($this->apellido2)); ?></span><span id="id_read_off_apellido2" class="css_read_off_apellido2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_apellido2; ?>">
 <input class="sc-js-input scFormObjectOdd css_apellido2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_apellido2" type=text name="apellido2" value="<?php echo $this->form_encode_input($apellido2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apellido2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apellido2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tel_cel']))
    {
        $this->nm_new_label['tel_cel'] = "Teléfono o celular";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tel_cel = $this->tel_cel;
   $sStyleHidden_tel_cel = '';
   if (isset($this->nmgp_cmp_hidden['tel_cel']) && $this->nmgp_cmp_hidden['tel_cel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tel_cel']);
       $sStyleHidden_tel_cel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tel_cel = 'display: none;';
   $sStyleReadInp_tel_cel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tel_cel']) && $this->nmgp_cmp_readonly['tel_cel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tel_cel']);
       $sStyleReadLab_tel_cel = '';
       $sStyleReadInp_tel_cel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tel_cel']) && $this->nmgp_cmp_hidden['tel_cel'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tel_cel" value="<?php echo $this->form_encode_input($tel_cel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tel_cel_line" id="hidden_field_data_tel_cel" style="<?php echo $sStyleHidden_tel_cel; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tel_cel_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tel_cel_label" style=""><span id="id_label_tel_cel"><?php echo $this->nm_new_label['tel_cel']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tel_cel"]) &&  $this->nmgp_cmp_readonly["tel_cel"] == "on") { 

 ?>
<input type="hidden" name="tel_cel" value="<?php echo $this->form_encode_input($tel_cel) . "\">" . $tel_cel . ""; ?>
<?php } else { ?>
<span id="id_read_on_tel_cel" class="sc-ui-readonly-tel_cel css_tel_cel_line" style="<?php echo $sStyleReadLab_tel_cel; ?>"><?php echo $this->form_format_readonly("tel_cel", $this->form_encode_input($this->tel_cel)); ?></span><span id="id_read_off_tel_cel" class="css_read_off_tel_cel<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tel_cel; ?>">
 <input class="sc-js-input scFormObjectOdd css_tel_cel_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tel_cel" type=text name="tel_cel" value="<?php echo $this->form_encode_input($tel_cel) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=14 alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Teléfono', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('tel_cel')", "nm_mostra_mens('tel_cel')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tel_cel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tel_cel_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['urlmail']))
    {
        $this->nm_new_label['urlmail'] = "email **";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $urlmail = $this->urlmail;
   $sStyleHidden_urlmail = '';
   if (isset($this->nmgp_cmp_hidden['urlmail']) && $this->nmgp_cmp_hidden['urlmail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['urlmail']);
       $sStyleHidden_urlmail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_urlmail = 'display: none;';
   $sStyleReadInp_urlmail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['urlmail']) && $this->nmgp_cmp_readonly['urlmail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['urlmail']);
       $sStyleReadLab_urlmail = '';
       $sStyleReadInp_urlmail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['urlmail']) && $this->nmgp_cmp_hidden['urlmail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="urlmail" value="<?php echo $this->form_encode_input($urlmail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_urlmail_line" id="hidden_field_data_urlmail" style="<?php echo $sStyleHidden_urlmail; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_urlmail_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_urlmail_label" style=""><span id="id_label_urlmail"><?php echo $this->nm_new_label['urlmail']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["urlmail"]) &&  $this->nmgp_cmp_readonly["urlmail"] == "on") { 

 ?>
<input type="hidden" name="urlmail" value="<?php echo $this->form_encode_input($urlmail) . "\">" . $urlmail . ""; ?>
<?php } else { ?>
<span id="id_read_on_urlmail" class="sc-ui-readonly-urlmail css_urlmail_line" style="<?php echo $sStyleReadLab_urlmail; ?>"><?php echo $this->form_format_readonly("urlmail", $this->form_encode_input($this->urlmail)); ?></span><span id="id_read_off_urlmail" class="css_read_off_urlmail<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_urlmail; ?>">
 <input class="sc-js-input scFormObjectOdd css_urlmail_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_urlmail" type=text name="urlmail" value="<?php echo $this->form_encode_input($urlmail) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'registre email o url del cliente', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.urlmail.value != '') {window.open('mailto:' + document.F1.urlmail.value); }", "if (document.F1.urlmail.value != '') {window.open('mailto:' + document.F1.urlmail.value); }", "urlmail_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('urlmail')", "nm_mostra_mens('urlmail')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_urlmail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_urlmail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idtercero']))
    {
        $this->nm_new_label['idtercero'] = "Idtercero";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idtercero = $this->idtercero;
   if (!isset($this->nmgp_cmp_hidden['idtercero']))
   {
       $this->nmgp_cmp_hidden['idtercero'] = 'off';
   }
   $sStyleHidden_idtercero = '';
   if (isset($this->nmgp_cmp_hidden['idtercero']) && $this->nmgp_cmp_hidden['idtercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idtercero']);
       $sStyleHidden_idtercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idtercero = 'display: none;';
   $sStyleReadInp_idtercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idtercero']) && $this->nmgp_cmp_readonly['idtercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idtercero']);
       $sStyleReadLab_idtercero = '';
       $sStyleReadInp_idtercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idtercero']) && $this->nmgp_cmp_hidden['idtercero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idtercero" value="<?php echo $this->form_encode_input($idtercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idtercero_line" id="hidden_field_data_idtercero" style="<?php echo $sStyleHidden_idtercero; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idtercero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idtercero_label" style=""><span id="id_label_idtercero"><?php echo $this->nm_new_label['idtercero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idtercero"]) &&  $this->nmgp_cmp_readonly["idtercero"] == "on") { 

 ?>
<input type="hidden" name="idtercero" value="<?php echo $this->form_encode_input($idtercero) . "\">" . $idtercero . ""; ?>
<?php } else { ?>
<span id="id_read_on_idtercero" class="sc-ui-readonly-idtercero css_idtercero_line" style="<?php echo $sStyleReadLab_idtercero; ?>"><?php echo $this->form_format_readonly("idtercero", $this->form_encode_input($this->idtercero)); ?></span><span id="id_read_off_idtercero" class="css_read_off_idtercero<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idtercero; ?>">
 <input class="sc-js-input scFormObjectOdd css_idtercero_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idtercero" type=text name="idtercero" value="<?php echo $this->form_encode_input($idtercero) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idtercero']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idtercero']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idtercero']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idtercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idtercero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_idtercero_dumb = ('' == $sStyleHidden_idtercero) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idtercero_dumb" style="<?php echo $sStyleHidden_idtercero_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombre_comercil']))
    {
        $this->nm_new_label['nombre_comercil'] = "Nombre Comercial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre_comercil = $this->nombre_comercil;
   if (!isset($this->nmgp_cmp_hidden['nombre_comercil']))
   {
       $this->nmgp_cmp_hidden['nombre_comercil'] = 'off';
   }
   $sStyleHidden_nombre_comercil = '';
   if (isset($this->nmgp_cmp_hidden['nombre_comercil']) && $this->nmgp_cmp_hidden['nombre_comercil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombre_comercil']);
       $sStyleHidden_nombre_comercil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombre_comercil = 'display: none;';
   $sStyleReadInp_nombre_comercil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombre_comercil']) && $this->nmgp_cmp_readonly['nombre_comercil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombre_comercil']);
       $sStyleReadLab_nombre_comercil = '';
       $sStyleReadInp_nombre_comercil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombre_comercil']) && $this->nmgp_cmp_hidden['nombre_comercil'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre_comercil" value="<?php echo $this->form_encode_input($nombre_comercil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombre_comercil_line" id="hidden_field_data_nombre_comercil" style="<?php echo $sStyleHidden_nombre_comercil; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_comercil_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombre_comercil_label" style=""><span id="id_label_nombre_comercil"><?php echo $this->nm_new_label['nombre_comercil']; ?></span></span><br>
<?php
$nombre_comercil_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($nombre_comercil));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre_comercil"]) &&  $this->nmgp_cmp_readonly["nombre_comercil"] == "on") { 

 ?>
<input type="hidden" name="nombre_comercil" value="<?php echo $this->form_encode_input($nombre_comercil) . "\">" . $nombre_comercil_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre_comercil" class="sc-ui-readonly-nombre_comercil css_nombre_comercil_line" style="<?php echo $sStyleReadLab_nombre_comercil; ?>"><?php echo $this->form_format_readonly("nombre_comercil", $this->form_encode_input($nombre_comercil_val)); ?></span><span id="id_read_off_nombre_comercil" class="css_read_off_nombre_comercil<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre_comercil; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_nombre_comercil_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="nombre_comercil" id="id_sc_field_nombre_comercil" rows="2" cols="58"
 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ .,-_") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'SOLO PERSONAS JURÍDICAS', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $nombre_comercil; ?>
</textarea>
</span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('nombre_comercil')", "nm_mostra_mens('nombre_comercil')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_comercil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_comercil_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['representante']))
    {
        $this->nm_new_label['representante'] = "Representante Legal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $representante = $this->representante;
   if (!isset($this->nmgp_cmp_hidden['representante']))
   {
       $this->nmgp_cmp_hidden['representante'] = 'off';
   }
   $sStyleHidden_representante = '';
   if (isset($this->nmgp_cmp_hidden['representante']) && $this->nmgp_cmp_hidden['representante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['representante']);
       $sStyleHidden_representante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_representante = 'display: none;';
   $sStyleReadInp_representante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['representante']) && $this->nmgp_cmp_readonly['representante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['representante']);
       $sStyleReadLab_representante = '';
       $sStyleReadInp_representante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['representante']) && $this->nmgp_cmp_hidden['representante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="representante" value="<?php echo $this->form_encode_input($representante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_representante_line" id="hidden_field_data_representante" style="<?php echo $sStyleHidden_representante; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_representante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_representante_label" style=""><span id="id_label_representante"><?php echo $this->nm_new_label['representante']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["representante"]) &&  $this->nmgp_cmp_readonly["representante"] == "on") { 

 ?>
<input type="hidden" name="representante" value="<?php echo $this->form_encode_input($representante) . "\">" . $representante . ""; ?>
<?php } else { ?>
<span id="id_read_on_representante" class="sc-ui-readonly-representante css_representante_line" style="<?php echo $sStyleReadLab_representante; ?>"><?php echo $this->form_format_readonly("representante", $this->form_encode_input($this->representante)); ?></span><span id="id_read_off_representante" class="css_read_off_representante<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_representante; ?>">
 <input class="sc-js-input scFormObjectOdd css_representante_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_representante" type=text name="representante" value="<?php echo $this->form_encode_input($representante) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=62"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç .-") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_representante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_representante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['departamento']))
   {
       $this->nm_new_label['departamento'] = "Departamento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $departamento = $this->departamento;
   if (!isset($this->nmgp_cmp_hidden['departamento']))
   {
       $this->nmgp_cmp_hidden['departamento'] = 'off';
   }
   $sStyleHidden_departamento = '';
   if (isset($this->nmgp_cmp_hidden['departamento']) && $this->nmgp_cmp_hidden['departamento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['departamento']);
       $sStyleHidden_departamento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_departamento = 'display: none;';
   $sStyleReadInp_departamento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['departamento']) && $this->nmgp_cmp_readonly['departamento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['departamento']);
       $sStyleReadLab_departamento = '';
       $sStyleReadInp_departamento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['departamento']) && $this->nmgp_cmp_hidden['departamento'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="departamento" value="<?php echo $this->form_encode_input($this->departamento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_departamento_line" id="hidden_field_data_departamento" style="<?php echo $sStyleHidden_departamento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_departamento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_departamento_label" style=""><span id="id_label_departamento"><?php echo $this->nm_new_label['departamento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["departamento"]) &&  $this->nmgp_cmp_readonly["departamento"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;

   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_departamento'][] = $rs->fields[0];
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
   $departamento_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->departamento_1))
          {
              foreach ($this->departamento_1 as $tmp_departamento)
              {
                  if (trim($tmp_departamento) === trim($cadaselect[1])) { $departamento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->departamento) === trim($cadaselect[1])) { $departamento_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="departamento" value="<?php echo $this->form_encode_input($departamento) . "\">" . $departamento_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_departamento();
   $x = 0 ; 
   $departamento_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->departamento_1))
          {
              foreach ($this->departamento_1 as $tmp_departamento)
              {
                  if (trim($tmp_departamento) === trim($cadaselect[1])) { $departamento_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->departamento) === trim($cadaselect[1])) { $departamento_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($departamento_look))
          {
              $departamento_look = $this->departamento;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_departamento\" class=\"css_departamento_line\" style=\"" .  $sStyleReadLab_departamento . "\">" . $this->form_format_readonly("departamento", $this->form_encode_input($departamento_look)) . "</span><span id=\"id_read_off_departamento\" class=\"css_read_off_departamento" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_departamento . "\">";
   echo " <span id=\"idAjaxSelect_departamento\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_departamento_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_departamento\" name=\"departamento\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->departamento) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->departamento)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_departamento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_departamento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idmuni']))
   {
       $this->nm_new_label['idmuni'] = "Municipio";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idmuni = $this->idmuni;
   if (!isset($this->nmgp_cmp_hidden['idmuni']))
   {
       $this->nmgp_cmp_hidden['idmuni'] = 'off';
   }
   $sStyleHidden_idmuni = '';
   if (isset($this->nmgp_cmp_hidden['idmuni']) && $this->nmgp_cmp_hidden['idmuni'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idmuni']);
       $sStyleHidden_idmuni = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idmuni = 'display: none;';
   $sStyleReadInp_idmuni = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idmuni']) && $this->nmgp_cmp_readonly['idmuni'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idmuni']);
       $sStyleReadLab_idmuni = '';
       $sStyleReadInp_idmuni = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idmuni']) && $this->nmgp_cmp_hidden['idmuni'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idmuni" value="<?php echo $this->form_encode_input($this->idmuni) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idmuni_line" id="hidden_field_data_idmuni" style="<?php echo $sStyleHidden_idmuni; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idmuni_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idmuni_label" style=""><span id="id_label_idmuni"><?php echo $this->nm_new_label['idmuni']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idmuni"]) &&  $this->nmgp_cmp_readonly["idmuni"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_idmuni'][] = $rs->fields[0];
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
   $idmuni_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmuni_1))
          {
              foreach ($this->idmuni_1 as $tmp_idmuni)
              {
                  if (trim($tmp_idmuni) === trim($cadaselect[1])) { $idmuni_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmuni) === trim($cadaselect[1])) { $idmuni_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idmuni" value="<?php echo $this->form_encode_input($idmuni) . "\">" . $idmuni_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idmuni();
   $x = 0 ; 
   $idmuni_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmuni_1))
          {
              foreach ($this->idmuni_1 as $tmp_idmuni)
              {
                  if (trim($tmp_idmuni) === trim($cadaselect[1])) { $idmuni_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmuni) === trim($cadaselect[1])) { $idmuni_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idmuni_look))
          {
              $idmuni_look = $this->idmuni;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idmuni\" class=\"css_idmuni_line\" style=\"" .  $sStyleReadLab_idmuni . "\">" . $this->form_format_readonly("idmuni", $this->form_encode_input($idmuni_look)) . "</span><span id=\"id_read_off_idmuni\" class=\"css_read_off_idmuni" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idmuni . "\">";
   echo " <span id=\"idAjaxSelect_idmuni\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idmuni_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idmuni\" name=\"idmuni\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idmuni) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idmuni)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmuni_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmuni_text"></span></td></tr></table></td></tr></table> </TD>
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
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ciudad = $this->ciudad;
   if (!isset($this->nmgp_cmp_hidden['ciudad']))
   {
       $this->nmgp_cmp_hidden['ciudad'] = 'off';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['ciudad']) && $this->nmgp_cmp_hidden['ciudad'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ciudad" value="<?php echo $this->form_encode_input($this->ciudad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ciudad_line" id="hidden_field_data_ciudad" style="<?php echo $sStyleHidden_ciudad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ciudad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ciudad_label" style=""><span id="id_label_ciudad"><?php echo $this->nm_new_label['ciudad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ciudad"]) &&  $this->nmgp_cmp_readonly["ciudad"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad'] = array(); 
}
if ($this->idmuni != "")
{ 
   $this->nm_clear_val("idmuni");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;

   $nm_comando = "SELECT municipio FROM municipio  WHERE idmun=$this->idmuni ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_ciudad'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
   $ciudad_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ciudad_1))
          {
              foreach ($this->ciudad_1 as $tmp_ciudad)
              {
                  if (trim($tmp_ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ciudad" value="<?php echo $this->form_encode_input($ciudad) . "\">" . $ciudad_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ciudad();
   $x = 0 ; 
   $ciudad_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ciudad_1))
          {
              foreach ($this->ciudad_1 as $tmp_ciudad)
              {
                  if (trim($tmp_ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ciudad) === trim($cadaselect[1])) { $ciudad_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ciudad_look))
          {
              $ciudad_look = $this->ciudad;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ciudad\" class=\"css_ciudad_line\" style=\"" .  $sStyleReadLab_ciudad . "\">" . $this->form_format_readonly("ciudad", $this->form_encode_input($ciudad_look)) . "</span><span id=\"id_read_off_ciudad\" class=\"css_read_off_ciudad" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_ciudad . "\">";
   echo " <span id=\"idAjaxSelect_ciudad\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_ciudad_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_ciudad\" name=\"ciudad\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ciudad) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ciudad)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ciudad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ciudad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['codigo_postal']))
   {
       $this->nm_new_label['codigo_postal'] = "Código Postal **";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_postal = $this->codigo_postal;
   if (!isset($this->nmgp_cmp_hidden['codigo_postal']))
   {
       $this->nmgp_cmp_hidden['codigo_postal'] = 'off';
   }
   $sStyleHidden_codigo_postal = '';
   if (isset($this->nmgp_cmp_hidden['codigo_postal']) && $this->nmgp_cmp_hidden['codigo_postal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_postal']);
       $sStyleHidden_codigo_postal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_postal = 'display: none;';
   $sStyleReadInp_codigo_postal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_postal']) && $this->nmgp_cmp_readonly['codigo_postal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_postal']);
       $sStyleReadLab_codigo_postal = '';
       $sStyleReadInp_codigo_postal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_postal']) && $this->nmgp_cmp_hidden['codigo_postal'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="codigo_postal" value="<?php echo $this->form_encode_input($this->codigo_postal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_postal_line" id="hidden_field_data_codigo_postal" style="<?php echo $sStyleHidden_codigo_postal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_postal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_postal_label" style=""><span id="id_label_codigo_postal"><?php echo $this->nm_new_label['codigo_postal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_postal"]) &&  $this->nmgp_cmp_readonly["codigo_postal"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal'] = array(); 
}
if ($this->idmuni != "")
{ 
   $this->nm_clear_val("idmuni");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;

   $nm_comando = "SELECT codigo_postal  FROM codigo_postal  WHERE idmuni=$this->idmuni ORDER BY codigo_postal";

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_codigo_postal'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
   $codigo_postal_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigo_postal_1))
          {
              foreach ($this->codigo_postal_1 as $tmp_codigo_postal)
              {
                  if (trim($tmp_codigo_postal) === trim($cadaselect[1])) { $codigo_postal_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigo_postal) === trim($cadaselect[1])) { $codigo_postal_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="codigo_postal" value="<?php echo $this->form_encode_input($codigo_postal) . "\">" . $codigo_postal_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_codigo_postal();
   $x = 0 ; 
   $codigo_postal_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->codigo_postal_1))
          {
              foreach ($this->codigo_postal_1 as $tmp_codigo_postal)
              {
                  if (trim($tmp_codigo_postal) === trim($cadaselect[1])) { $codigo_postal_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->codigo_postal) === trim($cadaselect[1])) { $codigo_postal_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($codigo_postal_look))
          {
              $codigo_postal_look = $this->codigo_postal;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_codigo_postal\" class=\"css_codigo_postal_line\" style=\"" .  $sStyleReadLab_codigo_postal . "\">" . $this->form_format_readonly("codigo_postal", $this->form_encode_input($codigo_postal_look)) . "</span><span id=\"id_read_off_codigo_postal\" class=\"css_read_off_codigo_postal" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_codigo_postal . "\">";
   echo " <span id=\"idAjaxSelect_codigo_postal\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_codigo_postal_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_codigo_postal\" name=\"codigo_postal\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->codigo_postal) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->codigo_postal)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_postal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_postal_text"></span></td></tr></table></td></tr></table> </TD>
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

    <TD class="scFormDataOdd css_observaciones_line" id="hidden_field_data_observaciones" style="<?php echo $sStyleHidden_observaciones; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_observaciones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_observaciones_label" style=""><span id="id_label_observaciones"><?php echo $this->nm_new_label['observaciones']; ?></span></span><br>
<?php
$observaciones_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones"]) &&  $this->nmgp_cmp_readonly["observaciones"] == "on") { 

 ?>
<input type="hidden" name="observaciones" value="<?php echo $this->form_encode_input($observaciones) . "\">" . $observaciones_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones" class="sc-ui-readonly-observaciones css_observaciones_line" style="<?php echo $sStyleReadLab_observaciones; ?>"><?php echo $this->form_format_readonly("observaciones", $this->form_encode_input($observaciones_val)); ?></span><span id="id_read_off_observaciones" class="css_read_off_observaciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_observaciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones" id="id_sc_field_observaciones" rows="1" cols="50"
 alt="{datatype: 'text', maxLength: 20000, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Coloque aquí observación sobre el cliente', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['lenguaje']))
   {
       $this->nm_new_label['lenguaje'] = "Lenguaje **";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lenguaje = $this->lenguaje;
   if (!isset($this->nmgp_cmp_hidden['lenguaje']))
   {
       $this->nmgp_cmp_hidden['lenguaje'] = 'off';
   }
   $sStyleHidden_lenguaje = '';
   if (isset($this->nmgp_cmp_hidden['lenguaje']) && $this->nmgp_cmp_hidden['lenguaje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lenguaje']);
       $sStyleHidden_lenguaje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lenguaje = 'display: none;';
   $sStyleReadInp_lenguaje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lenguaje']) && $this->nmgp_cmp_readonly['lenguaje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lenguaje']);
       $sStyleReadLab_lenguaje = '';
       $sStyleReadInp_lenguaje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lenguaje']) && $this->nmgp_cmp_hidden['lenguaje'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="lenguaje" value="<?php echo $this->form_encode_input($this->lenguaje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lenguaje_line" id="hidden_field_data_lenguaje" style="<?php echo $sStyleHidden_lenguaje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lenguaje_line" style="padding: 0px"><span class="scFormLabelOddFormat css_lenguaje_label" style=""><span id="id_label_lenguaje"><?php echo $this->nm_new_label['lenguaje']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lenguaje"]) &&  $this->nmgp_cmp_readonly["lenguaje"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_idtercero = $this->idtercero;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_idtercero = $this->idtercero;

   $es_cajero_val_str = "''";
   if (!empty($this->es_cajero))
   {
       if (is_array($this->es_cajero))
       {
           $Tmp_array = $this->es_cajero;
       }
       else
       {
           $Tmp_array = explode(";", $this->es_cajero);
       }
       $es_cajero_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $es_cajero_val_str)
          {
             $es_cajero_val_str .= ", ";
          }
          $es_cajero_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $autorizado_val_str = "''";
   if (!empty($this->autorizado))
   {
       if (is_array($this->autorizado))
       {
           $Tmp_array = $this->autorizado;
       }
       else
       {
           $Tmp_array = explode(";", $this->autorizado);
       }
       $autorizado_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $autorizado_val_str)
          {
             $autorizado_val_str .= ", ";
          }
          $autorizado_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT lenguaje, lenguaje  FROM lenguas  ORDER BY lenguaje";

   $this->dv = $old_value_dv;
   $this->idtercero = $old_value_idtercero;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje'][] = $rs->fields[0];
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
   $lenguaje_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lenguaje_1))
          {
              foreach ($this->lenguaje_1 as $tmp_lenguaje)
              {
                  if (trim($tmp_lenguaje) === trim($cadaselect[1])) { $lenguaje_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lenguaje) === trim($cadaselect[1])) { $lenguaje_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="lenguaje" value="<?php echo $this->form_encode_input($lenguaje) . "\">" . $lenguaje_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_lenguaje();
   $x = 0 ; 
   $lenguaje_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lenguaje_1))
          {
              foreach ($this->lenguaje_1 as $tmp_lenguaje)
              {
                  if (trim($tmp_lenguaje) === trim($cadaselect[1])) { $lenguaje_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lenguaje) === trim($cadaselect[1])) { $lenguaje_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($lenguaje_look))
          {
              $lenguaje_look = $this->lenguaje;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_lenguaje\" class=\"css_lenguaje_line\" style=\"" .  $sStyleReadLab_lenguaje . "\">" . $this->form_format_readonly("lenguaje", $this->form_encode_input($lenguaje_look)) . "</span><span id=\"id_read_off_lenguaje\" class=\"css_read_off_lenguaje" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_lenguaje . "\">";
   echo " <span id=\"idAjaxSelect_lenguaje\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_lenguaje_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_lenguaje\" name=\"lenguaje\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_lenguaje'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->lenguaje) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->lenguaje)) 
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
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('lenguaje')", "nm_mostra_mens('lenguaje')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lenguaje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lenguaje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['es_restaurante']))
    {
        $this->nm_new_label['es_restaurante'] = "Utilizar en Restaurante";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $es_restaurante = $this->es_restaurante;
   if (!isset($this->nmgp_cmp_hidden['es_restaurante']))
   {
       $this->nmgp_cmp_hidden['es_restaurante'] = 'off';
   }
   $sStyleHidden_es_restaurante = '';
   if (isset($this->nmgp_cmp_hidden['es_restaurante']) && $this->nmgp_cmp_hidden['es_restaurante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['es_restaurante']);
       $sStyleHidden_es_restaurante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_es_restaurante = 'display: none;';
   $sStyleReadInp_es_restaurante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['es_restaurante']) && $this->nmgp_cmp_readonly['es_restaurante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['es_restaurante']);
       $sStyleReadLab_es_restaurante = '';
       $sStyleReadInp_es_restaurante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['es_restaurante']) && $this->nmgp_cmp_hidden['es_restaurante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="es_restaurante" value="<?php echo $this->form_encode_input($es_restaurante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_es_restaurante_line" id="hidden_field_data_es_restaurante" style="<?php echo $sStyleHidden_es_restaurante; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_es_restaurante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_es_restaurante_label" style=""><span id="id_label_es_restaurante"><?php echo $this->nm_new_label['es_restaurante']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_restaurante"]) &&  $this->nmgp_cmp_readonly["es_restaurante"] == "on") { 

 if ("NO" == $this->es_restaurante) { $es_restaurante_look = "NO";} 
 if ("SI" == $this->es_restaurante) { $es_restaurante_look = "SI";} 
?>
<input type="hidden" name="es_restaurante" value="<?php echo $this->form_encode_input($es_restaurante) . "\">" . $es_restaurante_look . ""; ?>
<?php } else { ?>

<?php

 if ("NO" == $this->es_restaurante) { $es_restaurante_look = "NO";} 
 if ("SI" == $this->es_restaurante) { $es_restaurante_look = "SI";} 
?>
<span id="id_read_on_es_restaurante"  class="css_es_restaurante_line" style="<?php echo $sStyleReadLab_es_restaurante; ?>"><?php echo $this->form_format_readonly("es_restaurante", $this->form_encode_input($es_restaurante_look)); ?></span><span id="id_read_off_es_restaurante" class="css_read_off_es_restaurante css_es_restaurante_line" style="<?php echo $sStyleReadInp_es_restaurante; ?>"><div id="idAjaxRadio_es_restaurante" style="display: inline-block"  class="css_es_restaurante_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_es_restaurante_line"><?php $tempOptionId = "id-opt-es_restaurante" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-es_restaurante sc-ui-radio-es_restaurante sc-js-input" type=radio name="es_restaurante" value="NO"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_es_restaurante'][] = 'NO'; ?>
<?php  if ("NO" == $this->es_restaurante)  { echo " checked" ;} ?><?php  if (empty($this->es_restaurante)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_es_restaurante_line"><?php $tempOptionId = "id-opt-es_restaurante" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-es_restaurante sc-ui-radio-es_restaurante sc-js-input" type=radio name="es_restaurante" value="SI"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['Lookup_es_restaurante'][] = 'SI'; ?>
<?php  if ("SI" == $this->es_restaurante)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Si se utilizará como mesa en el área del restaurante o cafetería</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Si se utilizará como mesa en el área del restaurante o cafetería</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_restaurante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_restaurante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['r_social']))
    {
        $this->nm_new_label['r_social'] = "Nombre/Razón Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $r_social = $this->r_social;
   if (!isset($this->nmgp_cmp_hidden['r_social']))
   {
       $this->nmgp_cmp_hidden['r_social'] = 'off';
   }
   $sStyleHidden_r_social = '';
   if (isset($this->nmgp_cmp_hidden['r_social']) && $this->nmgp_cmp_hidden['r_social'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['r_social']);
       $sStyleHidden_r_social = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_r_social = 'display: none;';
   $sStyleReadInp_r_social = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['r_social']) && $this->nmgp_cmp_readonly['r_social'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['r_social']);
       $sStyleReadLab_r_social = '';
       $sStyleReadInp_r_social = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['r_social']) && $this->nmgp_cmp_hidden['r_social'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="r_social" value="<?php echo $this->form_encode_input($r_social) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_r_social_line" id="hidden_field_data_r_social" style="<?php echo $sStyleHidden_r_social; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_r_social_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_r_social_label" style=""><span id="id_label_r_social"><?php echo $this->nm_new_label['r_social']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["r_social"]) &&  $this->nmgp_cmp_readonly["r_social"] == "on") { 

 ?>
<input type="hidden" name="r_social" value="<?php echo $this->form_encode_input($r_social) . "\">" . $r_social . ""; ?>
<?php } else { ?>
<span id="id_read_on_r_social" class="sc-ui-readonly-r_social css_r_social_line" style="<?php echo $sStyleReadLab_r_social; ?>"><?php echo $this->form_format_readonly("r_social", $this->form_encode_input($this->r_social)); ?></span><span id="id_read_off_r_social" class="css_read_off_r_social<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_r_social; ?>">
 <input class="sc-js-input scFormObjectOdd css_r_social_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_r_social" type=text name="r_social" value="<?php echo $this->form_encode_input($r_social) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('r_social')", "nm_mostra_mens('r_social')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_r_social_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_r_social_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-29';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-30';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_clientes_mini_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clientes_mini_mob");
 parent.scAjaxDetailHeight("form_clientes_mini_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_clientes_mini_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_clientes_mini_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-15").length && $("#sc_b_new_t.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-16").length && $("#sc_b_ins_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-16").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-17").length && $("#sc_b_sai_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-17").hasClass("disabled")) {
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
		if ($("#sc_b_upd_t.sc-unique-btn-18").length && $("#sc_b_upd_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-18").hasClass("disabled")) {
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
		if ($("#sc_b_del_t.sc-unique-btn-19").length && $("#sc_b_del_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-19").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-22").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-23").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-25").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-26").length && $("#sc_b_sai_t.sc-unique-btn-26").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-26").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-27").length && $("#sc_b_ini_b.sc-unique-btn-27").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-27").hasClass("disabled")) {
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
		if ($("#sc_b_ret_b.sc-unique-btn-28").length && $("#sc_b_ret_b.sc-unique-btn-28").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-28").hasClass("disabled")) {
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
		if ($("#sc_b_avc_b.sc-unique-btn-29").length && $("#sc_b_avc_b.sc-unique-btn-29").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-29").hasClass("disabled")) {
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
		if ($("#sc_b_fim_b.sc-unique-btn-30").length && $("#sc_b_fim_b.sc-unique-btn-30").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-30").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-20").length && $("#sys_separator.sc-unique-btn-20").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-21").length && $("#sc_b_clone_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-21").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clientes_mini_mob']['buttonStatus'] = $this->nmgp_botoes;
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
