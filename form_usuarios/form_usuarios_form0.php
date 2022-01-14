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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Usuario"); } else { echo strip_tags("Usuario"); } ?></TITLE>
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
.css_read_off_creacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_ultima_actualizacion button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_usuarios/form_usuarios_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_usuarios_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['last'] : 'off'); ?>";
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
     if (F_name == "grupo")
     {
        $('select[name="grupo"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="grupo"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="grupo"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "usuario")
     {
        $('input[name="usuario"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="usuario"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="usuario"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "activo")
     {
        $('input[name="activo[]"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="activo[]"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="activo[]"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_usuarios_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2").each(function() {
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
    "hidden_bloco_1": true,
    "hidden_bloco_2": true
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("form_usuarios_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_usuarios'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_usuarios'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Usuario"; } else { echo "Usuario"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php if ($this->Ini->Export_img_zip) {$this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . '/scriptcase__NM__ico__NM__user_32.png';echo '<IMG SRC="scriptcase__NM__ico__NM__user_32.png';}else{ echo '<IMG SRC="' . $this->Ini->path_imag_cab  . '/scriptcase__NM__ico__NM__user_32.png';}?>" BORDER="0"/></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'][2] : "";
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['new'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['insert'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['bcancelar'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['update'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['permisos'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['permisos']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['permisos']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['permisos']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['permisos']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['permisos'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "permisos", "scBtnFn_permisos()", "scBtnFn_permisos()", "sc_permisos_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['permisos'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['permisos']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['permisos']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['permisos']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['permisos']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['permisos'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "permisos", "scBtnFn_permisos()", "scBtnFn_permisos()", "sc_permisos_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['copy']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['copy']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['copy']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['copy']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['copy'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_usuarios_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_usuarios_form0' => array(
            'title' => "Datos del usuario",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_usuarios_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_usuarios_form1' => array(
            'title' => "Configuración de acceso móvil",
            'class' => $nmgp_num_form == "form_usuarios_form1" ? "scTabActive" : "scTabInactive",
        ),
        'form_usuarios_form2' => array(
            'title' => "Impresora",
            'class' => $nmgp_num_form == "form_usuarios_form2" ? "scTabActive" : "scTabInactive",
        ),
        'form_usuarios_form3' => array(
            'title' => "Ubicacion",
            'class' => $nmgp_num_form == "form_usuarios_form3" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Datos del usuario' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_usuarios_form0']['class'] = 'scTabInactive';
                        }
                        if ('Configuración de acceso móvil' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_usuarios_form1']['class'] = 'scTabInactive';
                        }
                        if ('Impresora' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_usuarios_form2']['class'] = 'scTabInactive';
                        }
                        if ('Ubicacion' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_usuarios_form3']['class'] = 'scTabInactive';
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
    $css_celula = $this->tabCssClass["form_usuarios_form0"]['class'];
?>
   <li id="id_form_usuarios_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_usuarios_form0')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__user_information_32.png" align="absmiddle">
     Datos del usuario
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_usuarios_form1"]['class'];
?>
   <li id="id_form_usuarios_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_usuarios_form1')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__gears_32.png" align="absmiddle">
     Configuración de acceso móvil
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_usuarios_form2"]['class'];
?>
   <li id="id_form_usuarios_form2" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_usuarios_form2')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__printer3_32.png" align="absmiddle">
     Impresora
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_usuarios_form3"]['class'];
?>
   <li id="id_form_usuarios_form3" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_usuarios_form3')">
     <img src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ico__NM__earth_location_32.png" align="absmiddle">
     Ubicacion
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_usuarios_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idusuarios']))
   {
       $this->nmgp_cmp_hidden['idusuarios'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idusuarios']))
           {
               $this->nmgp_cmp_readonly['idusuarios'] = 'on';
           }
?>
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Datos del usuario<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idusuarios']))
    {
        $this->nm_new_label['idusuarios'] = "Idusuarios";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idusuarios = $this->idusuarios;
   if (!isset($this->nmgp_cmp_hidden['idusuarios']))
   {
       $this->nmgp_cmp_hidden['idusuarios'] = 'off';
   }
   $sStyleHidden_idusuarios = '';
   if (isset($this->nmgp_cmp_hidden['idusuarios']) && $this->nmgp_cmp_hidden['idusuarios'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idusuarios']);
       $sStyleHidden_idusuarios = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idusuarios = 'display: none;';
   $sStyleReadInp_idusuarios = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idusuarios"]) &&  $this->nmgp_cmp_readonly["idusuarios"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idusuarios']);
       $sStyleReadLab_idusuarios = '';
       $sStyleReadInp_idusuarios = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idusuarios']) && $this->nmgp_cmp_hidden['idusuarios'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idusuarios" value="<?php echo $this->form_encode_input($idusuarios) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idusuarios_label" id="hidden_field_label_idusuarios" style="<?php echo $sStyleHidden_idusuarios; ?>"><span id="id_label_idusuarios"><?php echo $this->nm_new_label['idusuarios']; ?></span></TD>
    <TD class="scFormDataOdd css_idusuarios_line" id="hidden_field_data_idusuarios" style="<?php echo $sStyleHidden_idusuarios; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idusuarios_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idusuarios" class="css_idusuarios_line" style="<?php echo $sStyleReadLab_idusuarios; ?>"><?php echo $this->form_format_readonly("idusuarios", $this->form_encode_input($this->idusuarios)); ?></span><span id="id_read_off_idusuarios" class="css_read_off_idusuarios" style="<?php echo $sStyleReadInp_idusuarios; ?>"><input type="hidden" name="idusuarios" value="<?php echo $this->form_encode_input($idusuarios) . "\">"?><span id="id_ajax_label_idusuarios"><?php echo nl2br($idusuarios); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idusuarios_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idusuarios_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['usuario']))
    {
        $this->nm_new_label['usuario'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario = $this->usuario;
   $sStyleHidden_usuario = '';
   if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario']);
       $sStyleHidden_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario = 'display: none;';
   $sStyleReadInp_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario']) && $this->nmgp_cmp_readonly['usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario']);
       $sStyleReadLab_usuario = '';
       $sStyleReadInp_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario_label" id="hidden_field_label_usuario" style="<?php echo $sStyleHidden_usuario; ?>"><span id="id_label_usuario"><?php echo $this->nm_new_label['usuario']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['usuario']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['usuario'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_usuario_line" id="hidden_field_data_usuario" style="<?php echo $sStyleHidden_usuario; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario"]) &&  $this->nmgp_cmp_readonly["usuario"] == "on") { 

 ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">" . $usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario" class="sc-ui-readonly-usuario css_usuario_line" style="<?php echo $sStyleReadLab_usuario; ?>"><?php echo $this->form_format_readonly("usuario", $this->form_encode_input($this->usuario)); ?></span><span id="id_read_off_usuario" class="css_read_off_usuario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario" type=text name="usuario" value="<?php echo $this->form_encode_input($usuario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_text"></span></td></tr></table></td></tr></table></TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_password_label" id="hidden_field_label_password" style="<?php echo $sStyleHidden_password; ?>"><span id="id_label_password"><?php echo $this->nm_new_label['password']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['password']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['password'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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
    if (!isset($this->nm_new_label['nombre']))
    {
        $this->nm_new_label['nombre'] = "Nombre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombre = $this->nombre;
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombre_label" id="hidden_field_label_nombre" style="<?php echo $sStyleHidden_nombre; ?>"><span id="id_label_nombre"><?php echo $this->nm_new_label['nombre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['nombre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['nombre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nombre_line" id="hidden_field_data_nombre" style="<?php echo $sStyleHidden_nombre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre"]) &&  $this->nmgp_cmp_readonly["nombre"] == "on") { 

 ?>
<input type="hidden" name="nombre" value="<?php echo $this->form_encode_input($nombre) . "\">" . $nombre . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre" class="sc-ui-readonly-nombre css_nombre_line" style="<?php echo $sStyleReadLab_nombre; ?>"><?php echo $this->form_format_readonly("nombre", $this->form_encode_input($this->nombre)); ?></span><span id="id_read_off_nombre" class="css_read_off_nombre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre" type=text name="nombre" value="<?php echo $this->form_encode_input($nombre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre_text"></span></td></tr></table></td></tr></table></TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_correo_label" id="hidden_field_label_correo" style="<?php echo $sStyleHidden_correo; ?>"><span id="id_label_correo"><?php echo $this->nm_new_label['correo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['correo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['correo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_correo_line" id="hidden_field_data_correo" style="<?php echo $sStyleHidden_correo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_correo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["correo"]) &&  $this->nmgp_cmp_readonly["correo"] == "on") { 

 ?>
<input type="hidden" name="correo" value="<?php echo $this->form_encode_input($correo) . "\">" . $correo . ""; ?>
<?php } else { ?>
<span id="id_read_on_correo" class="sc-ui-readonly-correo css_correo_line" style="<?php echo $sStyleReadLab_correo; ?>"><?php echo $this->form_format_readonly("correo", $this->form_encode_input($this->correo)); ?></span><span id="id_read_off_correo" class="css_read_off_correo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_correo; ?>">
 <input class="sc-js-input scFormObjectOdd css_correo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_correo" type=text name="correo" value="<?php echo $this->form_encode_input($correo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'lower', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_correo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_correo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefono']))
    {
        $this->nm_new_label['telefono'] = "Telefono";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefono = $this->telefono;
   $sStyleHidden_telefono = '';
   if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefono']);
       $sStyleHidden_telefono = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefono = 'display: none;';
   $sStyleReadInp_telefono = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefono']) && $this->nmgp_cmp_readonly['telefono'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefono']);
       $sStyleReadLab_telefono = '';
       $sStyleReadInp_telefono = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefono']) && $this->nmgp_cmp_hidden['telefono'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_telefono_label" id="hidden_field_label_telefono" style="<?php echo $sStyleHidden_telefono; ?>"><span id="id_label_telefono"><?php echo $this->nm_new_label['telefono']; ?></span></TD>
    <TD class="scFormDataOdd css_telefono_line" id="hidden_field_data_telefono" style="<?php echo $sStyleHidden_telefono; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefono_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefono"]) &&  $this->nmgp_cmp_readonly["telefono"] == "on") { 

 ?>
<input type="hidden" name="telefono" value="<?php echo $this->form_encode_input($telefono) . "\">" . $telefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefono" class="sc-ui-readonly-telefono css_telefono_line" style="<?php echo $sStyleReadLab_telefono; ?>"><?php echo $this->form_format_readonly("telefono", $this->form_encode_input($this->telefono)); ?></span><span id="id_read_off_telefono" class="css_read_off_telefono<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefono; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefono_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefono" type=text name="telefono" value="<?php echo $this->form_encode_input($telefono) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789ç-") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefono_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tercero']))
   {
       $this->nm_new_label['tercero'] = "Tercero";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tercero = $this->tercero;
   $sStyleHidden_tercero = '';
   if (isset($this->nmgp_cmp_hidden['tercero']) && $this->nmgp_cmp_hidden['tercero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tercero']);
       $sStyleHidden_tercero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tercero = 'display: none;';
   $sStyleReadInp_tercero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tercero']) && $this->nmgp_cmp_readonly['tercero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tercero']);
       $sStyleReadLab_tercero = '';
       $sStyleReadInp_tercero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tercero']) && $this->nmgp_cmp_hidden['tercero'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tercero" value="<?php echo $this->form_encode_input($this->tercero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tercero_label" id="hidden_field_label_tercero" style="<?php echo $sStyleHidden_tercero; ?>"><span id="id_label_tercero"><?php echo $this->nm_new_label['tercero']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['tercero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['tercero'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tercero_line" id="hidden_field_data_tercero" style="<?php echo $sStyleHidden_tercero; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tercero_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tercero"]) &&  $this->nmgp_cmp_readonly["tercero"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + ' --  ' + nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,' --  ' ,nombres)  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&' --  '&nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + ' --  ' + nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'][] = $rs->fields[0];
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
   $tercero_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tercero_1))
          {
              foreach ($this->tercero_1 as $tmp_tercero)
              {
                  if (trim($tmp_tercero) === trim($cadaselect[1])) { $tercero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tercero) === trim($cadaselect[1])) { $tercero_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tercero" value="<?php echo $this->form_encode_input($tercero) . "\">" . $tercero_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tercero();
   $x = 0 ; 
   $tercero_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tercero_1))
          {
              foreach ($this->tercero_1 as $tmp_tercero)
              {
                  if (trim($tmp_tercero) === trim($cadaselect[1])) { $tercero_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tercero) === trim($cadaselect[1])) { $tercero_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tercero_look))
          {
              $tercero_look = $this->tercero;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tercero\" class=\"css_tercero_line\" style=\"" .  $sStyleReadLab_tercero . "\">" . $this->form_format_readonly("tercero", $this->form_encode_input($tercero_look)) . "</span><span id=\"id_read_off_tercero\" class=\"css_read_off_tercero" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_tercero . "\">";
   echo " <span id=\"idAjaxSelect_tercero\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_tercero_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_tercero\" name=\"tercero\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tercero) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tercero)) 
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
   if (isset($this->Ini->sc_lig_md5["terceros"]) && $this->Ini->sc_lig_md5["terceros"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_tercero*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_usuarios@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_tercero*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_terceros_edit. "', '" . $Md5_Lig . "')", "fldedt_tercero", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tercero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tercero_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['resolucion']))
   {
       $this->nm_new_label['resolucion'] = "Prefijo";
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_resolucion_label" id="hidden_field_label_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>"><span id="id_label_resolucion"><?php echo $this->nm_new_label['resolucion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['resolucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['resolucion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_resolucion_line" id="hidden_field_data_resolucion" style="<?php echo $sStyleHidden_resolucion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resolucion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resolucion"]) &&  $this->nmgp_cmp_readonly["resolucion"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY prefijo";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'][] = $rs->fields[0];
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
   echo " <span id=\"idAjaxSelect_resolucion\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_resolucion_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_resolucion\" name=\"resolucion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
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
   if (isset($this->Ini->sc_lig_md5["form_prefijos_documentos"]) && $this->Ini->sc_lig_md5["form_prefijos_documentos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_resolucion*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_usuarios@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_resolucion*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_prefijos_documentos_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_prefijos_documentos_edit. "', '" . $Md5_Lig . "')", "fldedt_resolucion", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Se le asigna a los vendedores, meseros, cajeros, entre otros para discriminar sus documentos de los otros terceros. Para usuarios que no cumplen esos roles se recomienda dejar en 00.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Se le asigna a los vendedores, meseros, cajeros, entre otros para discriminar sus documentos de los otros terceros. Para usuarios que no cumplen esos roles se recomienda dejar en 00.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resolucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resolucion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['grupo']))
   {
       $this->nm_new_label['grupo'] = "Grupo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grupo = $this->grupo;
   $sStyleHidden_grupo = '';
   if (isset($this->nmgp_cmp_hidden['grupo']) && $this->nmgp_cmp_hidden['grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grupo']);
       $sStyleHidden_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grupo = 'display: none;';
   $sStyleReadInp_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grupo']) && $this->nmgp_cmp_readonly['grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grupo']);
       $sStyleReadLab_grupo = '';
       $sStyleReadInp_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grupo']) && $this->nmgp_cmp_hidden['grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grupo" value="<?php echo $this->form_encode_input($this->grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_grupo_label" id="hidden_field_label_grupo" style="<?php echo $sStyleHidden_grupo; ?>"><span id="id_label_grupo"><?php echo $this->nm_new_label['grupo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['grupo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['grupo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_grupo_line" id="hidden_field_data_grupo" style="<?php echo $sStyleHidden_grupo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_grupo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grupo"]) &&  $this->nmgp_cmp_readonly["grupo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idusuarios_grupos, descripcion  FROM usuarios_grupos  ORDER BY descripcion";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'][] = $rs->fields[0];
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
   $grupo_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupo_1))
          {
              foreach ($this->grupo_1 as $tmp_grupo)
              {
                  if (trim($tmp_grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="grupo" value="<?php echo $this->form_encode_input($grupo) . "\">" . $grupo_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_grupo();
   $x = 0 ; 
   $grupo_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupo_1))
          {
              foreach ($this->grupo_1 as $tmp_grupo)
              {
                  if (trim($tmp_grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grupo) === trim($cadaselect[1])) { $grupo_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($grupo_look))
          {
              $grupo_look = $this->grupo;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_grupo\" class=\"css_grupo_line\" style=\"" .  $sStyleReadLab_grupo . "\">" . $this->form_format_readonly("grupo", $this->form_encode_input($grupo_look)) . "</span><span id=\"id_read_off_grupo\" class=\"css_read_off_grupo" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_grupo . "\">";
   echo " <span id=\"idAjaxSelect_grupo\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_grupo_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_grupo\" name=\"grupo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grupo) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grupo)) 
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
   if (isset($this->Ini->sc_lig_md5["form_usuarios_grupos"]) && $this->Ini->sc_lig_md5["form_usuarios_grupos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_grupo*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_usuarios@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_grupo*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_usuarios_grupos_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_usuarios_grupos_edit. "', '" . $Md5_Lig . "')", "fldedt_grupo", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Al grupo de administrativo y de permisos que pertenece.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Al grupo de administrativo y de permisos que pertenece.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grupo_text"></span></td></tr></table></td></tr></table></TD>
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
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->activo_1 = explode(";", trim($this->activo));
  } 
  else
  {
      if (empty($this->activo))
      {
          $this->activo_1= array(); 
          $this->activo= "N";
      } 
      else
      {
          $this->activo_1= $this->activo; 
          $this->activo= ""; 
          foreach ($this->activo_1 as $cada_activo)
          {
             if (!empty($activo))
             {
                 $this->activo.= ";"; 
             } 
             $this->activo.= $cada_activo; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_activo_label" id="hidden_field_label_activo" style="<?php echo $sStyleHidden_activo; ?>"><span id="id_label_activo"><?php echo $this->nm_new_label['activo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['activo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['activo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_activo_line" id="hidden_field_data_activo" style="<?php echo $sStyleHidden_activo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activo"]) &&  $this->nmgp_cmp_readonly["activo"] == "on") { 

$activo_look = "";
 if ($this->activo == "S") { $activo_look .= "SI" ;} 
 if (empty($activo_look)) { $activo_look = $this->activo; }
?>
<input type="hidden" name="activo" value="<?php echo $this->form_encode_input($activo) . "\">" . $activo_look . ""; ?>
<?php } else { ?>

<?php

$activo_look = "";
 if ($this->activo == "S") { $activo_look .= "SI" ;} 
 if (empty($activo_look)) { $activo_look = $this->activo; }
?>
<span id="id_read_on_activo" class="css_activo_line" style="<?php echo $sStyleReadLab_activo; ?>"><?php echo $this->form_format_readonly("activo", $this->form_encode_input($activo_look)); ?></span><span id="id_read_off_activo" class="css_read_off_activo css_activo_line" style="<?php echo $sStyleReadInp_activo; ?>"><?php echo "<div id=\"idAjaxCheckbox_activo\" style=\"display: inline-block\" class=\"css_activo_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_activo_line"><?php $tempOptionId = "id-opt-activo" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-activo sc-ui-checkbox-activo" name="activo[]" value="S"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_activo'][] = 'S'; ?>
<?php  if (in_array("S", $this->activo_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['grupocomanda']))
   {
       $this->nm_new_label['grupocomanda'] = "Grupo Comanda";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grupocomanda = $this->grupocomanda;
   $sStyleHidden_grupocomanda = '';
   if (isset($this->nmgp_cmp_hidden['grupocomanda']) && $this->nmgp_cmp_hidden['grupocomanda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grupocomanda']);
       $sStyleHidden_grupocomanda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grupocomanda = 'display: none;';
   $sStyleReadInp_grupocomanda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grupocomanda']) && $this->nmgp_cmp_readonly['grupocomanda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grupocomanda']);
       $sStyleReadLab_grupocomanda = '';
       $sStyleReadInp_grupocomanda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grupocomanda']) && $this->nmgp_cmp_hidden['grupocomanda'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grupocomanda" value="<?php echo $this->form_encode_input($this->grupocomanda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_grupocomanda_label" id="hidden_field_label_grupocomanda" style="<?php echo $sStyleHidden_grupocomanda; ?>"><span id="id_label_grupocomanda"><?php echo $this->nm_new_label['grupocomanda']; ?></span></TD>
    <TD class="scFormDataOdd css_grupocomanda_line" id="hidden_field_data_grupocomanda" style="<?php echo $sStyleHidden_grupocomanda; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_grupocomanda_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grupocomanda"]) &&  $this->nmgp_cmp_readonly["grupocomanda"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idgrupo, codigogru + ' -- ' + nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idgrupo, concat(codigogru,' -- ',nomgrupo)  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idgrupo, codigogru&' -- '&nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idgrupo, codigogru + ' -- ' + nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   else
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'][] = $rs->fields[0];
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
   $grupocomanda_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupocomanda_1))
          {
              foreach ($this->grupocomanda_1 as $tmp_grupocomanda)
              {
                  if (trim($tmp_grupocomanda) === trim($cadaselect[1])) { $grupocomanda_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grupocomanda) === trim($cadaselect[1])) { $grupocomanda_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="grupocomanda" value="<?php echo $this->form_encode_input($grupocomanda) . "\">" . $grupocomanda_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_grupocomanda();
   $x = 0 ; 
   $grupocomanda_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupocomanda_1))
          {
              foreach ($this->grupocomanda_1 as $tmp_grupocomanda)
              {
                  if (trim($tmp_grupocomanda) === trim($cadaselect[1])) { $grupocomanda_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->grupocomanda) === trim($cadaselect[1])) { $grupocomanda_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($grupocomanda_look))
          {
              $grupocomanda_look = $this->grupocomanda;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_grupocomanda\" class=\"css_grupocomanda_line\" style=\"" .  $sStyleReadLab_grupocomanda . "\">" . $this->form_format_readonly("grupocomanda", $this->form_encode_input($grupocomanda_look)) . "</span><span id=\"id_read_off_grupocomanda\" class=\"css_read_off_grupocomanda" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_grupocomanda . "\">";
   echo " <span id=\"idAjaxSelect_grupocomanda\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_grupocomanda_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_grupocomanda\" name=\"grupocomanda\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","SELECCIONE") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grupocomanda) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grupocomanda)) 
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
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">El grupo de comanda se asigna a los usuarios de cocina, bebidas entre otros que serán encargados de recibir las comandas de los pedidos.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">El grupo de comanda se asigna a los usuarios de cocina, bebidas entre otros que serán encargados de recibir las comandas de los pedidos.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grupocomanda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grupocomanda_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['banco_movil']))
   {
       $this->nm_new_label['banco_movil'] = "Caja Predeterminada";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banco_movil = $this->banco_movil;
   $sStyleHidden_banco_movil = '';
   if (isset($this->nmgp_cmp_hidden['banco_movil']) && $this->nmgp_cmp_hidden['banco_movil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banco_movil']);
       $sStyleHidden_banco_movil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banco_movil = 'display: none;';
   $sStyleReadInp_banco_movil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banco_movil']) && $this->nmgp_cmp_readonly['banco_movil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banco_movil']);
       $sStyleReadLab_banco_movil = '';
       $sStyleReadInp_banco_movil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banco_movil']) && $this->nmgp_cmp_hidden['banco_movil'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="banco_movil" value="<?php echo $this->form_encode_input($this->banco_movil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_banco_movil_label" id="hidden_field_label_banco_movil" style="<?php echo $sStyleHidden_banco_movil; ?>"><span id="id_label_banco_movil"><?php echo $this->nm_new_label['banco_movil']; ?></span></TD>
    <TD class="scFormDataOdd css_banco_movil_line" id="hidden_field_data_banco_movil" style="<?php echo $sStyleHidden_banco_movil; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco_movil_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_movil"]) &&  $this->nmgp_cmp_readonly["banco_movil"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'][] = $rs->fields[0];
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
   $banco_movil_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->banco_movil_1))
          {
              foreach ($this->banco_movil_1 as $tmp_banco_movil)
              {
                  if (trim($tmp_banco_movil) === trim($cadaselect[1])) { $banco_movil_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->banco_movil) === trim($cadaselect[1])) { $banco_movil_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="banco_movil" value="<?php echo $this->form_encode_input($banco_movil) . "\">" . $banco_movil_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_banco_movil();
   $x = 0 ; 
   $banco_movil_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->banco_movil_1))
          {
              foreach ($this->banco_movil_1 as $tmp_banco_movil)
              {
                  if (trim($tmp_banco_movil) === trim($cadaselect[1])) { $banco_movil_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->banco_movil) === trim($cadaselect[1])) { $banco_movil_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($banco_movil_look))
          {
              $banco_movil_look = $this->banco_movil;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_banco_movil\" class=\"css_banco_movil_line\" style=\"" .  $sStyleReadLab_banco_movil . "\">" . $this->form_format_readonly("banco_movil", $this->form_encode_input($banco_movil_look)) . "</span><span id=\"id_read_off_banco_movil\" class=\"css_read_off_banco_movil" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_banco_movil . "\">";
   echo " <span id=\"idAjaxSelect_banco_movil\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_banco_movil_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_banco_movil\" name=\"banco_movil\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->banco_movil) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->banco_movil)) 
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
   if (isset($this->Ini->sc_lig_md5["form_bancos"]) && $this->Ini->sc_lig_md5["form_bancos"] == "S") {
       $Parms_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_banco_movil*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_usuarios@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nm_evt_ret_edit*scindo_ajax_form_usuarios_lkpedt_refresh_banco_movil*scoutnmgp_url_saida*scin*scoutsc_redir_atualiz*scinok*scout";
   }
 ?><?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "nm_submit_cap('" . $this->Ini->link_form_bancos_edit. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_form_bancos_edit. "', '" . $Md5_Lig . "')", "fldedt_banco_movil", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
<span style="display: inline-block"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "nm_mostra_mens('banco_movil')", "nm_mostra_mens('banco_movil')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_movil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_movil_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idbod']))
   {
       $this->nm_new_label['idbod'] = "Bodega";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idbod = $this->idbod;
   $sStyleHidden_idbod = '';
   if (isset($this->nmgp_cmp_hidden['idbod']) && $this->nmgp_cmp_hidden['idbod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idbod']);
       $sStyleHidden_idbod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idbod = 'display: none;';
   $sStyleReadInp_idbod = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idbod']) && $this->nmgp_cmp_readonly['idbod'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idbod']);
       $sStyleReadLab_idbod = '';
       $sStyleReadInp_idbod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idbod']) && $this->nmgp_cmp_hidden['idbod'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idbod" value="<?php echo $this->form_encode_input($this->idbod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idbod_label" id="hidden_field_label_idbod" style="<?php echo $sStyleHidden_idbod; ?>"><span id="id_label_idbod"><?php echo $this->nm_new_label['idbod']; ?></span></TD>
    <TD class="scFormDataOdd css_idbod_line" id="hidden_field_data_idbod" style="<?php echo $sStyleHidden_idbod; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idbod_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idbod"]) &&  $this->nmgp_cmp_readonly["idbod"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'][] = $rs->fields[0];
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
   $idbod_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbod_1))
          {
              foreach ($this->idbod_1 as $tmp_idbod)
              {
                  if (trim($tmp_idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idbod" value="<?php echo $this->form_encode_input($idbod) . "\">" . $idbod_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idbod();
   $x = 0 ; 
   $idbod_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idbod_1))
          {
              foreach ($this->idbod_1 as $tmp_idbod)
              {
                  if (trim($tmp_idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idbod) === trim($cadaselect[1])) { $idbod_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idbod_look))
          {
              $idbod_look = $this->idbod;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idbod\" class=\"css_idbod_line\" style=\"" .  $sStyleReadLab_idbod . "\">" . $this->form_format_readonly("idbod", $this->form_encode_input($idbod_look)) . "</span><span id=\"id_read_off_idbod\" class=\"css_read_off_idbod" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idbod . "\">";
   echo " <span id=\"idAjaxSelect_idbod\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idbod_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idbod\" name=\"idbod\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'][] = '0'; 
   echo "  <option value=\"0\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idbod) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idbod)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idbod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idbod_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ocultar_bod']))
    {
        $this->nm_new_label['ocultar_bod'] = "Ver Bodegas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocultar_bod = $this->ocultar_bod;
   $sStyleHidden_ocultar_bod = '';
   if (isset($this->nmgp_cmp_hidden['ocultar_bod']) && $this->nmgp_cmp_hidden['ocultar_bod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocultar_bod']);
       $sStyleHidden_ocultar_bod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocultar_bod = 'display: none;';
   $sStyleReadInp_ocultar_bod = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ocultar_bod']) && $this->nmgp_cmp_readonly['ocultar_bod'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocultar_bod']);
       $sStyleReadLab_ocultar_bod = '';
       $sStyleReadInp_ocultar_bod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocultar_bod']) && $this->nmgp_cmp_hidden['ocultar_bod'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocultar_bod" value="<?php echo $this->form_encode_input($ocultar_bod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ocultar_bod_label" id="hidden_field_label_ocultar_bod" style="<?php echo $sStyleHidden_ocultar_bod; ?>"><span id="id_label_ocultar_bod"><?php echo $this->nm_new_label['ocultar_bod']; ?></span></TD>
    <TD class="scFormDataOdd css_ocultar_bod_line" id="hidden_field_data_ocultar_bod" style="<?php echo $sStyleHidden_ocultar_bod; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocultar_bod_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ocultar_bod"]) &&  $this->nmgp_cmp_readonly["ocultar_bod"] == "on") { 

 if ("SI" == $this->ocultar_bod) { $ocultar_bod_look = "MOSTRAR";} 
 if ("NO" == $this->ocultar_bod) { $ocultar_bod_look = "NO MOSTRAR";} 
?>
<input type="hidden" name="ocultar_bod" value="<?php echo $this->form_encode_input($ocultar_bod) . "\">" . $ocultar_bod_look . ""; ?>
<?php } else { ?>

<?php

 if ("SI" == $this->ocultar_bod) { $ocultar_bod_look = "MOSTRAR";} 
 if ("NO" == $this->ocultar_bod) { $ocultar_bod_look = "NO MOSTRAR";} 
?>
<span id="id_read_on_ocultar_bod"  class="css_ocultar_bod_line" style="<?php echo $sStyleReadLab_ocultar_bod; ?>"><?php echo $this->form_format_readonly("ocultar_bod", $this->form_encode_input($ocultar_bod_look)); ?></span><span id="id_read_off_ocultar_bod" class="css_read_off_ocultar_bod css_ocultar_bod_line" style="<?php echo $sStyleReadInp_ocultar_bod; ?>"><div id="idAjaxRadio_ocultar_bod" style="display: inline-block"  class="css_ocultar_bod_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_ocultar_bod_line"><?php $tempOptionId = "id-opt-ocultar_bod" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-ocultar_bod sc-ui-radio-ocultar_bod" type=radio name="ocultar_bod" value="SI"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_ocultar_bod'][] = 'SI'; ?>
<?php  if ("SI" == $this->ocultar_bod)  { echo " checked" ;} ?><?php  if (empty($this->ocultar_bod)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">MOSTRAR</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_ocultar_bod_line"><?php $tempOptionId = "id-opt-ocultar_bod" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-ocultar_bod sc-ui-radio-ocultar_bod" type=radio name="ocultar_bod" value="NO"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_ocultar_bod'][] = 'NO'; ?>
<?php  if ("NO" == $this->ocultar_bod)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO MOSTRAR</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocultar_bod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocultar_bod_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
