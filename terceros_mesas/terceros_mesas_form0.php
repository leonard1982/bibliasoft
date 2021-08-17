<?php
class terceros_mesas_form extends terceros_mesas_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Crear nueva ubicación o mesa"); } else { echo strip_tags("Actualización datos ubicación o mesa"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_atualiz'] == 'ok')
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
.css_read_off_nacimiento_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechault_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_afiliacion_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_con_actual_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>terceros_mesas/terceros_mesas_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("terceros_mesas_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
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
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "cliente_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "cliente_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "documento_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "documento_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "tipo_documento_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "tipo_documento_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "nombres_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "nombres_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "regimen_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "regimen_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("tipo_documento_=enabled", "", i);
    nm_field_disabled("documento_=enabled", "", i);
    nm_field_disabled("nombres_=enabled", "", i);
    nm_field_disabled("regimen_=enabled", "", i);
    nm_field_disabled("cliente_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('terceros_mesas_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('tipo_documento_1');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
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
 include_once("terceros_mesas_js0.php");
?>
<script type="text/javascript"> 
nmdg_enter_tab = true;
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               onsubmit="return false;" 
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="upload_file_row" value="">
<?php
$_SESSION['scriptcase']['error_span_title']['terceros_mesas'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['terceros_mesas'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['maximized']))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Crear nueva ubicación o mesa"; } else { echo "Actualización datos ubicación o mesa"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'][2] : "";
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
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['direccion_']))
   {
       $this->nmgp_cmp_hidden['direccion_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['sexo_']))
   {
       $this->nmgp_cmp_hidden['sexo_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idmuni_']))
   {
       $this->nmgp_cmp_hidden['idmuni_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['observaciones_']))
   {
       $this->nmgp_cmp_hidden['observaciones_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['regimen_']))
   {
       $this->nmgp_cmp_hidden['regimen_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tipo_']))
   {
       $this->nmgp_cmp_hidden['tipo_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['cliente_']))
   {
       $this->nmgp_cmp_hidden['cliente_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['tipo_documento_']))
   {
       $this->nmgp_cmp_hidden['tipo_documento_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['dv_']))
   {
       $this->nmgp_cmp_hidden['dv_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nombre1_']))
   {
       $this->nmgp_cmp_hidden['nombre1_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['nombre2_']))
   {
       $this->nmgp_cmp_hidden['nombre2_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['apellido1_']))
   {
       $this->nmgp_cmp_hidden['apellido1_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['apellido2_']))
   {
       $this->nmgp_cmp_hidden['apellido2_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['representante_']))
   {
       $this->nmgp_cmp_hidden['representante_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['imagenter_']))
   {
       $this->nmgp_cmp_hidden['imagenter_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['es_restaurante_']))
   {
       $this->nmgp_cmp_hidden['es_restaurante_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['departamento_']))
   {
       $this->nmgp_cmp_hidden['departamento_'] = 'off';
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['tipo_documento_']) && $this->nmgp_cmp_hidden['tipo_documento_'] == 'off') { $sStyleHidden_tipo_documento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_documento_']) || $this->nmgp_cmp_hidden['tipo_documento_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_documento_'])) {
          $this->nm_new_label['tipo_documento_'] = "Tipo Documento"; } ?>

    <TD class="scFormLabelOddMult css_tipo_documento__label" id="hidden_field_label_tipo_documento_" style="<?php echo $sStyleHidden_tipo_documento_; ?>" > <?php echo $this->nm_new_label['tipo_documento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['documento_']) && $this->nmgp_cmp_hidden['documento_'] == 'off') { $sStyleHidden_documento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['documento_']) || $this->nmgp_cmp_hidden['documento_'] == 'on') {
      if (!isset($this->nm_new_label['documento_'])) {
          $this->nm_new_label['documento_'] = "Código de Ubicación o mesa"; } ?>

    <TD class="scFormLabelOddMult css_documento__label" id="hidden_field_label_documento_" style="<?php echo $sStyleHidden_documento_; ?>" > <?php echo $this->nm_new_label['documento_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dv_']) && $this->nmgp_cmp_hidden['dv_'] == 'off') { $sStyleHidden_dv_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dv_']) || $this->nmgp_cmp_hidden['dv_'] == 'on') {
      if (!isset($this->nm_new_label['dv_'])) {
          $this->nm_new_label['dv_'] = "DV"; } ?>

    <TD class="scFormLabelOddMult css_dv__label" id="hidden_field_label_dv_" style="<?php echo $sStyleHidden_dv_; ?>" > <?php echo $this->nm_new_label['dv_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['imagenter_']) && $this->nmgp_cmp_hidden['imagenter_'] == 'off') { $sStyleHidden_imagenter_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['imagenter_']) || $this->nmgp_cmp_hidden['imagenter_'] == 'on') {
      if (!isset($this->nm_new_label['imagenter_'])) {
          $this->nm_new_label['imagenter_'] = "Foto"; } ?>

    <TD class="scFormLabelOddMult css_imagenter__label" id="hidden_field_label_imagenter_" style="<?php echo $sStyleHidden_imagenter_; ?>" > <?php echo $this->nm_new_label['imagenter_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre1_']) && $this->nmgp_cmp_hidden['nombre1_'] == 'off') { $sStyleHidden_nombre1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nombre1_']) || $this->nmgp_cmp_hidden['nombre1_'] == 'on') {
      if (!isset($this->nm_new_label['nombre1_'])) {
          $this->nm_new_label['nombre1_'] = "Primer Nombre"; } ?>

    <TD class="scFormLabelOddMult css_nombre1__label" id="hidden_field_label_nombre1_" style="<?php echo $sStyleHidden_nombre1_; ?>" > <?php echo $this->nm_new_label['nombre1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre2_']) && $this->nmgp_cmp_hidden['nombre2_'] == 'off') { $sStyleHidden_nombre2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nombre2_']) || $this->nmgp_cmp_hidden['nombre2_'] == 'on') {
      if (!isset($this->nm_new_label['nombre2_'])) {
          $this->nm_new_label['nombre2_'] = "Otros Nombres"; } ?>

    <TD class="scFormLabelOddMult css_nombre2__label" id="hidden_field_label_nombre2_" style="<?php echo $sStyleHidden_nombre2_; ?>" > <?php echo $this->nm_new_label['nombre2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['apellido1_']) && $this->nmgp_cmp_hidden['apellido1_'] == 'off') { $sStyleHidden_apellido1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['apellido1_']) || $this->nmgp_cmp_hidden['apellido1_'] == 'on') {
      if (!isset($this->nm_new_label['apellido1_'])) {
          $this->nm_new_label['apellido1_'] = "Primer Apellido"; } ?>

    <TD class="scFormLabelOddMult css_apellido1__label" id="hidden_field_label_apellido1_" style="<?php echo $sStyleHidden_apellido1_; ?>" > <?php echo $this->nm_new_label['apellido1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['apellido2_']) && $this->nmgp_cmp_hidden['apellido2_'] == 'off') { $sStyleHidden_apellido2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['apellido2_']) || $this->nmgp_cmp_hidden['apellido2_'] == 'on') {
      if (!isset($this->nm_new_label['apellido2_'])) {
          $this->nm_new_label['apellido2_'] = "Segundo Apellido"; } ?>

    <TD class="scFormLabelOddMult css_apellido2__label" id="hidden_field_label_apellido2_" style="<?php echo $sStyleHidden_apellido2_; ?>" > <?php echo $this->nm_new_label['apellido2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nombres_']) && $this->nmgp_cmp_hidden['nombres_'] == 'off') { $sStyleHidden_nombres_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nombres_']) || $this->nmgp_cmp_hidden['nombres_'] == 'on') {
      if (!isset($this->nm_new_label['nombres_'])) {
          $this->nm_new_label['nombres_'] = "Nombre de Mesa o ubicación"; } ?>

    <TD class="scFormLabelOddMult css_nombres__label" id="hidden_field_label_nombres_" style="<?php echo $sStyleHidden_nombres_; ?>" > <?php echo $this->nm_new_label['nombres_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['representante_']) && $this->nmgp_cmp_hidden['representante_'] == 'off') { $sStyleHidden_representante_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['representante_']) || $this->nmgp_cmp_hidden['representante_'] == 'on') {
      if (!isset($this->nm_new_label['representante_'])) {
          $this->nm_new_label['representante_'] = "Representante Legal"; } ?>

    <TD class="scFormLabelOddMult css_representante__label" id="hidden_field_label_representante_" style="<?php echo $sStyleHidden_representante_; ?>" > <?php echo $this->nm_new_label['representante_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sexo_']) && $this->nmgp_cmp_hidden['sexo_'] == 'off') { $sStyleHidden_sexo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sexo_']) || $this->nmgp_cmp_hidden['sexo_'] == 'on') {
      if (!isset($this->nm_new_label['sexo_'])) {
          $this->nm_new_label['sexo_'] = "Género"; } ?>

    <TD class="scFormLabelOddMult css_sexo__label" id="hidden_field_label_sexo_" style="<?php echo $sStyleHidden_sexo_; ?>" > <?php echo $this->nm_new_label['sexo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sStyleHidden_tipo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_']) || $this->nmgp_cmp_hidden['tipo_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_'])) {
          $this->nm_new_label['tipo_'] = "Tipo persona"; } ?>

    <TD class="scFormLabelOddMult css_tipo__label" id="hidden_field_label_tipo_" style="<?php echo $sStyleHidden_tipo_; ?>" > <?php echo $this->nm_new_label['tipo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['regimen_']) && $this->nmgp_cmp_hidden['regimen_'] == 'off') { $sStyleHidden_regimen_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['regimen_']) || $this->nmgp_cmp_hidden['regimen_'] == 'on') {
      if (!isset($this->nm_new_label['regimen_'])) {
          $this->nm_new_label['regimen_'] = "Régimen"; } ?>

    <TD class="scFormLabelOddMult css_regimen__label" id="hidden_field_label_regimen_" style="<?php echo $sStyleHidden_regimen_; ?>" > <?php echo $this->nm_new_label['regimen_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['direccion_']) && $this->nmgp_cmp_hidden['direccion_'] == 'off') { $sStyleHidden_direccion_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['direccion_']) || $this->nmgp_cmp_hidden['direccion_'] == 'on') {
      if (!isset($this->nm_new_label['direccion_'])) {
          $this->nm_new_label['direccion_'] = "Dirección"; } ?>

    <TD class="scFormLabelOddMult css_direccion__label" id="hidden_field_label_direccion_" style="<?php echo $sStyleHidden_direccion_; ?>" > <?php echo $this->nm_new_label['direccion_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['departamento_']) && $this->nmgp_cmp_hidden['departamento_'] == 'off') { $sStyleHidden_departamento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['departamento_']) || $this->nmgp_cmp_hidden['departamento_'] == 'on') {
      if (!isset($this->nm_new_label['departamento_'])) {
          $this->nm_new_label['departamento_'] = "Departamento"; } ?>

    <TD class="scFormLabelOddMult css_departamento__label" id="hidden_field_label_departamento_" style="<?php echo $sStyleHidden_departamento_; ?>" > <?php echo $this->nm_new_label['departamento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idmuni_']) && $this->nmgp_cmp_hidden['idmuni_'] == 'off') { $sStyleHidden_idmuni_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idmuni_']) || $this->nmgp_cmp_hidden['idmuni_'] == 'on') {
      if (!isset($this->nm_new_label['idmuni_'])) {
          $this->nm_new_label['idmuni_'] = "Ciudad"; } ?>

    <TD class="scFormLabelOddMult css_idmuni__label" id="hidden_field_label_idmuni_" style="<?php echo $sStyleHidden_idmuni_; ?>" > <?php echo $this->nm_new_label['idmuni_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['observaciones_']) && $this->nmgp_cmp_hidden['observaciones_'] == 'off') { $sStyleHidden_observaciones_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['observaciones_']) || $this->nmgp_cmp_hidden['observaciones_'] == 'on') {
      if (!isset($this->nm_new_label['observaciones_'])) {
          $this->nm_new_label['observaciones_'] = "Observaciones"; } ?>

    <TD class="scFormLabelOddMult css_observaciones__label" id="hidden_field_label_observaciones_" style="<?php echo $sStyleHidden_observaciones_; ?>" > <?php echo $this->nm_new_label['observaciones_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cliente_']) && $this->nmgp_cmp_hidden['cliente_'] == 'off') { $sStyleHidden_cliente_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cliente_']) || $this->nmgp_cmp_hidden['cliente_'] == 'on') {
      if (!isset($this->nm_new_label['cliente_'])) {
          $this->nm_new_label['cliente_'] = "Cliente"; } ?>

    <TD class="scFormLabelOddMult css_cliente__label" id="hidden_field_label_cliente_" style="<?php echo $sStyleHidden_cliente_; ?>" > <?php echo $this->nm_new_label['cliente_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['es_restaurante_']) && $this->nmgp_cmp_hidden['es_restaurante_'] == 'off') { $sStyleHidden_es_restaurante_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['es_restaurante_']) || $this->nmgp_cmp_hidden['es_restaurante_'] == 'on') {
      if (!isset($this->nm_new_label['es_restaurante_'])) {
          $this->nm_new_label['es_restaurante_'] = "Utilizar en Restaurante"; } ?>

    <TD class="scFormLabelOddMult css_es_restaurante__label" id="hidden_field_label_es_restaurante_" style="<?php echo $sStyleHidden_es_restaurante_; ?>" > <?php echo $this->nm_new_label['es_restaurante_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_terceros_mesas);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_terceros_mesas = $this->form_vert_terceros_mesas;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_terceros_mesas))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_terceros_mesas as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->idtercero_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['idtercero_'];
       $this->tel_cel_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['tel_cel_'];
       $this->nacimiento_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['nacimiento_'];
       $this->urlmail_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['urlmail_'];
       $this->fechault_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['fechault_'];
       $this->saldo_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['saldo_'];
       $this->afiliacion_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['afiliacion_'];
       $this->credito_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['credito_'];
       $this->cupo_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['cupo_'];
       $this->listaprecios_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['listaprecios_'];
       $this->loatiende_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['loatiende_'];
       $this->con_actual_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual_'];
       $this->efec_retencion_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['efec_retencion_'];
       $this->empleado_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['empleado_'];
       $this->proveedor_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['proveedor_'];
       $this->contacto_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['contacto_'];
       $this->telefonos_prov_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['telefonos_prov_'];
       $this->email_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['email_'];
       $this->url_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['url_'];
       $this->creditoprov_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['creditoprov_'];
       $this->dias_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['dias_'];
       $this->fechultcomp_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['fechultcomp_'];
       $this->saldoapagar_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['saldoapagar_'];
       $this->autoretenedor_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['autoretenedor_'];
       $this->sucur_cliente_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['sucur_cliente_'];
       $this->cupodis_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['cupodis_'];
       $this->relleno2_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['relleno2_'];
       $this->sucursales_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['sucursales_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['tipo_documento_'] = true;
           $this->nmgp_cmp_readonly['documento_'] = true;
           $this->nmgp_cmp_readonly['dv_'] = true;
           $this->nmgp_cmp_readonly['imagenter_'] = true;
           $this->nmgp_cmp_readonly['nombre1_'] = true;
           $this->nmgp_cmp_readonly['nombre2_'] = true;
           $this->nmgp_cmp_readonly['apellido1_'] = true;
           $this->nmgp_cmp_readonly['apellido2_'] = true;
           $this->nmgp_cmp_readonly['nombres_'] = true;
           $this->nmgp_cmp_readonly['representante_'] = true;
           $this->nmgp_cmp_readonly['sexo_'] = true;
           $this->nmgp_cmp_readonly['tipo_'] = true;
           $this->nmgp_cmp_readonly['regimen_'] = true;
           $this->nmgp_cmp_readonly['direccion_'] = true;
           $this->nmgp_cmp_readonly['departamento_'] = true;
           $this->nmgp_cmp_readonly['idmuni_'] = true;
           $this->nmgp_cmp_readonly['observaciones_'] = true;
           $this->nmgp_cmp_readonly['cliente_'] = true;
           $this->nmgp_cmp_readonly['es_restaurante_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['tipo_documento_']) || $this->nmgp_cmp_readonly['tipo_documento_'] != "on") {$this->nmgp_cmp_readonly['tipo_documento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['documento_']) || $this->nmgp_cmp_readonly['documento_'] != "on") {$this->nmgp_cmp_readonly['documento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dv_']) || $this->nmgp_cmp_readonly['dv_'] != "on") {$this->nmgp_cmp_readonly['dv_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['imagenter_']) || $this->nmgp_cmp_readonly['imagenter_'] != "on") {$this->nmgp_cmp_readonly['imagenter_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nombre1_']) || $this->nmgp_cmp_readonly['nombre1_'] != "on") {$this->nmgp_cmp_readonly['nombre1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nombre2_']) || $this->nmgp_cmp_readonly['nombre2_'] != "on") {$this->nmgp_cmp_readonly['nombre2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['apellido1_']) || $this->nmgp_cmp_readonly['apellido1_'] != "on") {$this->nmgp_cmp_readonly['apellido1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['apellido2_']) || $this->nmgp_cmp_readonly['apellido2_'] != "on") {$this->nmgp_cmp_readonly['apellido2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nombres_']) || $this->nmgp_cmp_readonly['nombres_'] != "on") {$this->nmgp_cmp_readonly['nombres_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['representante_']) || $this->nmgp_cmp_readonly['representante_'] != "on") {$this->nmgp_cmp_readonly['representante_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sexo_']) || $this->nmgp_cmp_readonly['sexo_'] != "on") {$this->nmgp_cmp_readonly['sexo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_']) || $this->nmgp_cmp_readonly['tipo_'] != "on") {$this->nmgp_cmp_readonly['tipo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['regimen_']) || $this->nmgp_cmp_readonly['regimen_'] != "on") {$this->nmgp_cmp_readonly['regimen_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['direccion_']) || $this->nmgp_cmp_readonly['direccion_'] != "on") {$this->nmgp_cmp_readonly['direccion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['departamento_']) || $this->nmgp_cmp_readonly['departamento_'] != "on") {$this->nmgp_cmp_readonly['departamento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idmuni_']) || $this->nmgp_cmp_readonly['idmuni_'] != "on") {$this->nmgp_cmp_readonly['idmuni_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['observaciones_']) || $this->nmgp_cmp_readonly['observaciones_'] != "on") {$this->nmgp_cmp_readonly['observaciones_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cliente_']) || $this->nmgp_cmp_readonly['cliente_'] != "on") {$this->nmgp_cmp_readonly['cliente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['es_restaurante_']) || $this->nmgp_cmp_readonly['es_restaurante_'] != "on") {$this->nmgp_cmp_readonly['es_restaurante_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->tipo_documento_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_documento_']; 
       $tipo_documento_ = $this->tipo_documento_; 
       if (!isset($this->nmgp_cmp_hidden['tipo_documento_']))
       {
           $this->nmgp_cmp_hidden['tipo_documento_'] = 'off';
       }
       $sStyleHidden_tipo_documento_ = '';
       if (isset($sCheckRead_tipo_documento_))
       {
           unset($sCheckRead_tipo_documento_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_documento_']))
       {
           $sCheckRead_tipo_documento_ = $this->nmgp_cmp_readonly['tipo_documento_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_documento_']) && $this->nmgp_cmp_hidden['tipo_documento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_documento_']);
           $sStyleHidden_tipo_documento_ = 'display: none;';
       }
       $bTestReadOnly_tipo_documento_ = true;
       $sStyleReadLab_tipo_documento_ = 'display: none;';
       $sStyleReadInp_tipo_documento_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_documento_']) && $this->nmgp_cmp_readonly['tipo_documento_'] == 'on')
       {
           $bTestReadOnly_tipo_documento_ = false;
           unset($this->nmgp_cmp_readonly['tipo_documento_']);
           $sStyleReadLab_tipo_documento_ = '';
           $sStyleReadInp_tipo_documento_ = 'display: none;';
       }
       $this->documento_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['documento_']; 
       $documento_ = $this->documento_; 
       $sStyleHidden_documento_ = '';
       if (isset($sCheckRead_documento_))
       {
           unset($sCheckRead_documento_);
       }
       if (isset($this->nmgp_cmp_readonly['documento_']))
       {
           $sCheckRead_documento_ = $this->nmgp_cmp_readonly['documento_'];
       }
       if (isset($this->nmgp_cmp_hidden['documento_']) && $this->nmgp_cmp_hidden['documento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['documento_']);
           $sStyleHidden_documento_ = 'display: none;';
       }
       $bTestReadOnly_documento_ = true;
       $sStyleReadLab_documento_ = 'display: none;';
       $sStyleReadInp_documento_ = '';
       if (isset($this->nmgp_cmp_readonly['documento_']) && $this->nmgp_cmp_readonly['documento_'] == 'on')
       {
           $bTestReadOnly_documento_ = false;
           unset($this->nmgp_cmp_readonly['documento_']);
           $sStyleReadLab_documento_ = '';
           $sStyleReadInp_documento_ = 'display: none;';
       }
       $this->dv_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['dv_']; 
       $dv_ = $this->dv_; 
       if (!isset($this->nmgp_cmp_hidden['dv_']))
       {
           $this->nmgp_cmp_hidden['dv_'] = 'off';
       }
       $sStyleHidden_dv_ = '';
       if (isset($sCheckRead_dv_))
       {
           unset($sCheckRead_dv_);
       }
       if (isset($this->nmgp_cmp_readonly['dv_']))
       {
           $sCheckRead_dv_ = $this->nmgp_cmp_readonly['dv_'];
       }
       if (isset($this->nmgp_cmp_hidden['dv_']) && $this->nmgp_cmp_hidden['dv_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dv_']);
           $sStyleHidden_dv_ = 'display: none;';
       }
       $bTestReadOnly_dv_ = true;
       $sStyleReadLab_dv_ = 'display: none;';
       $sStyleReadInp_dv_ = '';
       if (isset($this->nmgp_cmp_readonly['dv_']) && $this->nmgp_cmp_readonly['dv_'] == 'on')
       {
           $bTestReadOnly_dv_ = false;
           unset($this->nmgp_cmp_readonly['dv_']);
           $sStyleReadLab_dv_ = '';
           $sStyleReadInp_dv_ = 'display: none;';
       }
       $this->imagenter_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter_']; 
       $imagenter_ = $this->imagenter_; 
       $this->imagenter__limpa = $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter__limpa']; 
       $imagenter__limpa = $this->imagenter__limpa; 
       if (!isset($this->nmgp_cmp_hidden['imagenter_']))
       {
           $this->nmgp_cmp_hidden['imagenter_'] = 'off';
       }
       $sStyleHidden_imagenter_ = '';
       if (isset($sCheckRead_imagenter_))
       {
           unset($sCheckRead_imagenter_);
       }
       if (isset($this->nmgp_cmp_readonly['imagenter_']))
       {
           $sCheckRead_imagenter_ = $this->nmgp_cmp_readonly['imagenter_'];
       }
       if (isset($this->nmgp_cmp_hidden['imagenter_']) && $this->nmgp_cmp_hidden['imagenter_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['imagenter_']);
           $sStyleHidden_imagenter_ = 'display: none;';
       }
       $bTestReadOnly_imagenter_ = true;
       $sStyleReadLab_imagenter_ = 'display: none;';
       $sStyleReadInp_imagenter_ = '';
       if (isset($this->nmgp_cmp_readonly['imagenter_']) && $this->nmgp_cmp_readonly['imagenter_'] == 'on')
       {
           $bTestReadOnly_imagenter_ = false;
           unset($this->nmgp_cmp_readonly['imagenter_']);
           $sStyleReadLab_imagenter_ = '';
           $sStyleReadInp_imagenter_ = 'display: none;';
       }
       $this->nombre1_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre1_']; 
       $nombre1_ = $this->nombre1_; 
       if (!isset($this->nmgp_cmp_hidden['nombre1_']))
       {
           $this->nmgp_cmp_hidden['nombre1_'] = 'off';
       }
       $sStyleHidden_nombre1_ = '';
       if (isset($sCheckRead_nombre1_))
       {
           unset($sCheckRead_nombre1_);
       }
       if (isset($this->nmgp_cmp_readonly['nombre1_']))
       {
           $sCheckRead_nombre1_ = $this->nmgp_cmp_readonly['nombre1_'];
       }
       if (isset($this->nmgp_cmp_hidden['nombre1_']) && $this->nmgp_cmp_hidden['nombre1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nombre1_']);
           $sStyleHidden_nombre1_ = 'display: none;';
       }
       $bTestReadOnly_nombre1_ = true;
       $sStyleReadLab_nombre1_ = 'display: none;';
       $sStyleReadInp_nombre1_ = '';
       if (isset($this->nmgp_cmp_readonly['nombre1_']) && $this->nmgp_cmp_readonly['nombre1_'] == 'on')
       {
           $bTestReadOnly_nombre1_ = false;
           unset($this->nmgp_cmp_readonly['nombre1_']);
           $sStyleReadLab_nombre1_ = '';
           $sStyleReadInp_nombre1_ = 'display: none;';
       }
       $this->nombre2_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre2_']; 
       $nombre2_ = $this->nombre2_; 
       if (!isset($this->nmgp_cmp_hidden['nombre2_']))
       {
           $this->nmgp_cmp_hidden['nombre2_'] = 'off';
       }
       $sStyleHidden_nombre2_ = '';
       if (isset($sCheckRead_nombre2_))
       {
           unset($sCheckRead_nombre2_);
       }
       if (isset($this->nmgp_cmp_readonly['nombre2_']))
       {
           $sCheckRead_nombre2_ = $this->nmgp_cmp_readonly['nombre2_'];
       }
       if (isset($this->nmgp_cmp_hidden['nombre2_']) && $this->nmgp_cmp_hidden['nombre2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nombre2_']);
           $sStyleHidden_nombre2_ = 'display: none;';
       }
       $bTestReadOnly_nombre2_ = true;
       $sStyleReadLab_nombre2_ = 'display: none;';
       $sStyleReadInp_nombre2_ = '';
       if (isset($this->nmgp_cmp_readonly['nombre2_']) && $this->nmgp_cmp_readonly['nombre2_'] == 'on')
       {
           $bTestReadOnly_nombre2_ = false;
           unset($this->nmgp_cmp_readonly['nombre2_']);
           $sStyleReadLab_nombre2_ = '';
           $sStyleReadInp_nombre2_ = 'display: none;';
       }
       $this->apellido1_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido1_']; 
       $apellido1_ = $this->apellido1_; 
       if (!isset($this->nmgp_cmp_hidden['apellido1_']))
       {
           $this->nmgp_cmp_hidden['apellido1_'] = 'off';
       }
       $sStyleHidden_apellido1_ = '';
       if (isset($sCheckRead_apellido1_))
       {
           unset($sCheckRead_apellido1_);
       }
       if (isset($this->nmgp_cmp_readonly['apellido1_']))
       {
           $sCheckRead_apellido1_ = $this->nmgp_cmp_readonly['apellido1_'];
       }
       if (isset($this->nmgp_cmp_hidden['apellido1_']) && $this->nmgp_cmp_hidden['apellido1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['apellido1_']);
           $sStyleHidden_apellido1_ = 'display: none;';
       }
       $bTestReadOnly_apellido1_ = true;
       $sStyleReadLab_apellido1_ = 'display: none;';
       $sStyleReadInp_apellido1_ = '';
       if (isset($this->nmgp_cmp_readonly['apellido1_']) && $this->nmgp_cmp_readonly['apellido1_'] == 'on')
       {
           $bTestReadOnly_apellido1_ = false;
           unset($this->nmgp_cmp_readonly['apellido1_']);
           $sStyleReadLab_apellido1_ = '';
           $sStyleReadInp_apellido1_ = 'display: none;';
       }
       $this->apellido2_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido2_']; 
       $apellido2_ = $this->apellido2_; 
       if (!isset($this->nmgp_cmp_hidden['apellido2_']))
       {
           $this->nmgp_cmp_hidden['apellido2_'] = 'off';
       }
       $sStyleHidden_apellido2_ = '';
       if (isset($sCheckRead_apellido2_))
       {
           unset($sCheckRead_apellido2_);
       }
       if (isset($this->nmgp_cmp_readonly['apellido2_']))
       {
           $sCheckRead_apellido2_ = $this->nmgp_cmp_readonly['apellido2_'];
       }
       if (isset($this->nmgp_cmp_hidden['apellido2_']) && $this->nmgp_cmp_hidden['apellido2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['apellido2_']);
           $sStyleHidden_apellido2_ = 'display: none;';
       }
       $bTestReadOnly_apellido2_ = true;
       $sStyleReadLab_apellido2_ = 'display: none;';
       $sStyleReadInp_apellido2_ = '';
       if (isset($this->nmgp_cmp_readonly['apellido2_']) && $this->nmgp_cmp_readonly['apellido2_'] == 'on')
       {
           $bTestReadOnly_apellido2_ = false;
           unset($this->nmgp_cmp_readonly['apellido2_']);
           $sStyleReadLab_apellido2_ = '';
           $sStyleReadInp_apellido2_ = 'display: none;';
       }
       $this->nombres_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['nombres_']; 
       $nombres_ = $this->nombres_; 
       $sStyleHidden_nombres_ = '';
       if (isset($sCheckRead_nombres_))
       {
           unset($sCheckRead_nombres_);
       }
       if (isset($this->nmgp_cmp_readonly['nombres_']))
       {
           $sCheckRead_nombres_ = $this->nmgp_cmp_readonly['nombres_'];
       }
       if (isset($this->nmgp_cmp_hidden['nombres_']) && $this->nmgp_cmp_hidden['nombres_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nombres_']);
           $sStyleHidden_nombres_ = 'display: none;';
       }
       $bTestReadOnly_nombres_ = true;
       $sStyleReadLab_nombres_ = 'display: none;';
       $sStyleReadInp_nombres_ = '';
       if (isset($this->nmgp_cmp_readonly['nombres_']) && $this->nmgp_cmp_readonly['nombres_'] == 'on')
       {
           $bTestReadOnly_nombres_ = false;
           unset($this->nmgp_cmp_readonly['nombres_']);
           $sStyleReadLab_nombres_ = '';
           $sStyleReadInp_nombres_ = 'display: none;';
       }
       $this->representante_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['representante_']; 
       $representante_ = $this->representante_; 
       if (!isset($this->nmgp_cmp_hidden['representante_']))
       {
           $this->nmgp_cmp_hidden['representante_'] = 'off';
       }
       $sStyleHidden_representante_ = '';
       if (isset($sCheckRead_representante_))
       {
           unset($sCheckRead_representante_);
       }
       if (isset($this->nmgp_cmp_readonly['representante_']))
       {
           $sCheckRead_representante_ = $this->nmgp_cmp_readonly['representante_'];
       }
       if (isset($this->nmgp_cmp_hidden['representante_']) && $this->nmgp_cmp_hidden['representante_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['representante_']);
           $sStyleHidden_representante_ = 'display: none;';
       }
       $bTestReadOnly_representante_ = true;
       $sStyleReadLab_representante_ = 'display: none;';
       $sStyleReadInp_representante_ = '';
       if (isset($this->nmgp_cmp_readonly['representante_']) && $this->nmgp_cmp_readonly['representante_'] == 'on')
       {
           $bTestReadOnly_representante_ = false;
           unset($this->nmgp_cmp_readonly['representante_']);
           $sStyleReadLab_representante_ = '';
           $sStyleReadInp_representante_ = 'display: none;';
       }
       $this->sexo_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['sexo_']; 
       $sexo_ = $this->sexo_; 
       if (!isset($this->nmgp_cmp_hidden['sexo_']))
       {
           $this->nmgp_cmp_hidden['sexo_'] = 'off';
       }
       $sStyleHidden_sexo_ = '';
       if (isset($sCheckRead_sexo_))
       {
           unset($sCheckRead_sexo_);
       }
       if (isset($this->nmgp_cmp_readonly['sexo_']))
       {
           $sCheckRead_sexo_ = $this->nmgp_cmp_readonly['sexo_'];
       }
       if (isset($this->nmgp_cmp_hidden['sexo_']) && $this->nmgp_cmp_hidden['sexo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sexo_']);
           $sStyleHidden_sexo_ = 'display: none;';
       }
       $bTestReadOnly_sexo_ = true;
       $sStyleReadLab_sexo_ = 'display: none;';
       $sStyleReadInp_sexo_ = '';
       if (isset($this->nmgp_cmp_readonly['sexo_']) && $this->nmgp_cmp_readonly['sexo_'] == 'on')
       {
           $bTestReadOnly_sexo_ = false;
           unset($this->nmgp_cmp_readonly['sexo_']);
           $sStyleReadLab_sexo_ = '';
           $sStyleReadInp_sexo_ = 'display: none;';
       }
       $this->tipo_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_']; 
       $tipo_ = $this->tipo_; 
       if (!isset($this->nmgp_cmp_hidden['tipo_']))
       {
           $this->nmgp_cmp_hidden['tipo_'] = 'off';
       }
       $sStyleHidden_tipo_ = '';
       if (isset($sCheckRead_tipo_))
       {
           unset($sCheckRead_tipo_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_']))
       {
           $sCheckRead_tipo_ = $this->nmgp_cmp_readonly['tipo_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_']);
           $sStyleHidden_tipo_ = 'display: none;';
       }
       $bTestReadOnly_tipo_ = true;
       $sStyleReadLab_tipo_ = 'display: none;';
       $sStyleReadInp_tipo_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_']) && $this->nmgp_cmp_readonly['tipo_'] == 'on')
       {
           $bTestReadOnly_tipo_ = false;
           unset($this->nmgp_cmp_readonly['tipo_']);
           $sStyleReadLab_tipo_ = '';
           $sStyleReadInp_tipo_ = 'display: none;';
       }
       $this->regimen_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['regimen_']; 
       $regimen_ = $this->regimen_; 
       if (!isset($this->nmgp_cmp_hidden['regimen_']))
       {
           $this->nmgp_cmp_hidden['regimen_'] = 'off';
       }
       $sStyleHidden_regimen_ = '';
       if (isset($sCheckRead_regimen_))
       {
           unset($sCheckRead_regimen_);
       }
       if (isset($this->nmgp_cmp_readonly['regimen_']))
       {
           $sCheckRead_regimen_ = $this->nmgp_cmp_readonly['regimen_'];
       }
       if (isset($this->nmgp_cmp_hidden['regimen_']) && $this->nmgp_cmp_hidden['regimen_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['regimen_']);
           $sStyleHidden_regimen_ = 'display: none;';
       }
       $bTestReadOnly_regimen_ = true;
       $sStyleReadLab_regimen_ = 'display: none;';
       $sStyleReadInp_regimen_ = '';
       if (isset($this->nmgp_cmp_readonly['regimen_']) && $this->nmgp_cmp_readonly['regimen_'] == 'on')
       {
           $bTestReadOnly_regimen_ = false;
           unset($this->nmgp_cmp_readonly['regimen_']);
           $sStyleReadLab_regimen_ = '';
           $sStyleReadInp_regimen_ = 'display: none;';
       }
       $this->direccion_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['direccion_']; 
       $direccion_ = $this->direccion_; 
       if (!isset($this->nmgp_cmp_hidden['direccion_']))
       {
           $this->nmgp_cmp_hidden['direccion_'] = 'off';
       }
       $sStyleHidden_direccion_ = '';
       if (isset($sCheckRead_direccion_))
       {
           unset($sCheckRead_direccion_);
       }
       if (isset($this->nmgp_cmp_readonly['direccion_']))
       {
           $sCheckRead_direccion_ = $this->nmgp_cmp_readonly['direccion_'];
       }
       if (isset($this->nmgp_cmp_hidden['direccion_']) && $this->nmgp_cmp_hidden['direccion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['direccion_']);
           $sStyleHidden_direccion_ = 'display: none;';
       }
       $bTestReadOnly_direccion_ = true;
       $sStyleReadLab_direccion_ = 'display: none;';
       $sStyleReadInp_direccion_ = '';
       if (isset($this->nmgp_cmp_readonly['direccion_']) && $this->nmgp_cmp_readonly['direccion_'] == 'on')
       {
           $bTestReadOnly_direccion_ = false;
           unset($this->nmgp_cmp_readonly['direccion_']);
           $sStyleReadLab_direccion_ = '';
           $sStyleReadInp_direccion_ = 'display: none;';
       }
       $this->departamento_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['departamento_']; 
       $departamento_ = $this->departamento_; 
       if (!isset($this->nmgp_cmp_hidden['departamento_']))
       {
           $this->nmgp_cmp_hidden['departamento_'] = 'off';
       }
       $sStyleHidden_departamento_ = '';
       if (isset($sCheckRead_departamento_))
       {
           unset($sCheckRead_departamento_);
       }
       if (isset($this->nmgp_cmp_readonly['departamento_']))
       {
           $sCheckRead_departamento_ = $this->nmgp_cmp_readonly['departamento_'];
       }
       if (isset($this->nmgp_cmp_hidden['departamento_']) && $this->nmgp_cmp_hidden['departamento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['departamento_']);
           $sStyleHidden_departamento_ = 'display: none;';
       }
       $bTestReadOnly_departamento_ = true;
       $sStyleReadLab_departamento_ = 'display: none;';
       $sStyleReadInp_departamento_ = '';
       if (isset($this->nmgp_cmp_readonly['departamento_']) && $this->nmgp_cmp_readonly['departamento_'] == 'on')
       {
           $bTestReadOnly_departamento_ = false;
           unset($this->nmgp_cmp_readonly['departamento_']);
           $sStyleReadLab_departamento_ = '';
           $sStyleReadInp_departamento_ = 'display: none;';
       }
       $this->idmuni_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['idmuni_']; 
       $idmuni_ = $this->idmuni_; 
       if (!isset($this->nmgp_cmp_hidden['idmuni_']))
       {
           $this->nmgp_cmp_hidden['idmuni_'] = 'off';
       }
       $sStyleHidden_idmuni_ = '';
       if (isset($sCheckRead_idmuni_))
       {
           unset($sCheckRead_idmuni_);
       }
       if (isset($this->nmgp_cmp_readonly['idmuni_']))
       {
           $sCheckRead_idmuni_ = $this->nmgp_cmp_readonly['idmuni_'];
       }
       if (isset($this->nmgp_cmp_hidden['idmuni_']) && $this->nmgp_cmp_hidden['idmuni_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idmuni_']);
           $sStyleHidden_idmuni_ = 'display: none;';
       }
       $bTestReadOnly_idmuni_ = true;
       $sStyleReadLab_idmuni_ = 'display: none;';
       $sStyleReadInp_idmuni_ = '';
       if (isset($this->nmgp_cmp_readonly['idmuni_']) && $this->nmgp_cmp_readonly['idmuni_'] == 'on')
       {
           $bTestReadOnly_idmuni_ = false;
           unset($this->nmgp_cmp_readonly['idmuni_']);
           $sStyleReadLab_idmuni_ = '';
           $sStyleReadInp_idmuni_ = 'display: none;';
       }
       $this->observaciones_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['observaciones_']; 
       $observaciones_ = $this->observaciones_; 
       $observaciones__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $observaciones_);
       $observaciones__val = $observaciones__tmp;
       if (!isset($this->nmgp_cmp_hidden['observaciones_']))
       {
           $this->nmgp_cmp_hidden['observaciones_'] = 'off';
       }
       $sStyleHidden_observaciones_ = '';
       if (isset($sCheckRead_observaciones_))
       {
           unset($sCheckRead_observaciones_);
       }
       if (isset($this->nmgp_cmp_readonly['observaciones_']))
       {
           $sCheckRead_observaciones_ = $this->nmgp_cmp_readonly['observaciones_'];
       }
       if (isset($this->nmgp_cmp_hidden['observaciones_']) && $this->nmgp_cmp_hidden['observaciones_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['observaciones_']);
           $sStyleHidden_observaciones_ = 'display: none;';
       }
       $bTestReadOnly_observaciones_ = true;
       $sStyleReadLab_observaciones_ = 'display: none;';
       $sStyleReadInp_observaciones_ = '';
       if (isset($this->nmgp_cmp_readonly['observaciones_']) && $this->nmgp_cmp_readonly['observaciones_'] == 'on')
       {
           $bTestReadOnly_observaciones_ = false;
           unset($this->nmgp_cmp_readonly['observaciones_']);
           $sStyleReadLab_observaciones_ = '';
           $sStyleReadInp_observaciones_ = 'display: none;';
       }
       $this->cliente_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['cliente_']; 
       $cliente_ = $this->cliente_; 
       if (!isset($this->nmgp_cmp_hidden['cliente_']))
       {
           $this->nmgp_cmp_hidden['cliente_'] = 'off';
       }
       $sStyleHidden_cliente_ = '';
       if (isset($sCheckRead_cliente_))
       {
           unset($sCheckRead_cliente_);
       }
       if (isset($this->nmgp_cmp_readonly['cliente_']))
       {
           $sCheckRead_cliente_ = $this->nmgp_cmp_readonly['cliente_'];
       }
       if (isset($this->nmgp_cmp_hidden['cliente_']) && $this->nmgp_cmp_hidden['cliente_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cliente_']);
           $sStyleHidden_cliente_ = 'display: none;';
       }
       $bTestReadOnly_cliente_ = true;
       $sStyleReadLab_cliente_ = 'display: none;';
       $sStyleReadInp_cliente_ = '';
       if (isset($this->nmgp_cmp_readonly['cliente_']) && $this->nmgp_cmp_readonly['cliente_'] == 'on')
       {
           $bTestReadOnly_cliente_ = false;
           unset($this->nmgp_cmp_readonly['cliente_']);
           $sStyleReadLab_cliente_ = '';
           $sStyleReadInp_cliente_ = 'display: none;';
       }
       $this->es_restaurante_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['es_restaurante_']; 
       $es_restaurante_ = $this->es_restaurante_; 
       if (!isset($this->nmgp_cmp_hidden['es_restaurante_']))
       {
           $this->nmgp_cmp_hidden['es_restaurante_'] = 'off';
       }
       $sStyleHidden_es_restaurante_ = '';
       if (isset($sCheckRead_es_restaurante_))
       {
           unset($sCheckRead_es_restaurante_);
       }
       if (isset($this->nmgp_cmp_readonly['es_restaurante_']))
       {
           $sCheckRead_es_restaurante_ = $this->nmgp_cmp_readonly['es_restaurante_'];
       }
       if (isset($this->nmgp_cmp_hidden['es_restaurante_']) && $this->nmgp_cmp_hidden['es_restaurante_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['es_restaurante_']);
           $sStyleHidden_es_restaurante_ = 'display: none;';
       }
       $bTestReadOnly_es_restaurante_ = true;
       $sStyleReadLab_es_restaurante_ = 'display: none;';
       $sStyleReadInp_es_restaurante_ = '';
       if (isset($this->nmgp_cmp_readonly['es_restaurante_']) && $this->nmgp_cmp_readonly['es_restaurante_'] == 'on')
       {
           $bTestReadOnly_es_restaurante_ = false;
           unset($this->nmgp_cmp_readonly['es_restaurante_']);
           $sStyleReadLab_es_restaurante_ = '';
           $sStyleReadInp_es_restaurante_ = 'display: none;';
       }

       if ($this->nmgp_opcao == "novo")
       { 
           $out_imagenter_   = "";  
           $this->imagenter_ = "";  
       } 
       else 
       { 
           $out_imagenter_ = $this->imagenter_;  
       } 
       if ($this->imagenter_ != "" && $this->imagenter_ != "none")   
       { 
           $out_imagenter_ = $this->Ini->path_imag_temp . "/sc_imagenter__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
           $_SESSION['scriptcase']['sc_num_img']++ ; 
           $arq_imagenter_ = fopen($this->Ini->root . $out_imagenter_, "w") ;  
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
           { 
               $nm_tmp = nm_conv_img_access(substr($this->imagenter_, 0, 12));
               if (substr($this->imagenter_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
               { 
                   $this->imagenter_ = nm_conv_img_access($this->imagenter_);
               } 
           } 
           if (substr($this->imagenter_, 0, 4) == "*nm*") 
           { 
               $this->imagenter_ = substr($this->imagenter_, 4) ; 
               $this->imagenter_ = base64_decode($this->imagenter_) ; 
           } 
           $img_pos_bm = strpos($this->imagenter_, "BM") ; 
           if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
           { 
               $this->imagenter_ = substr($this->imagenter_, $img_pos_bm) ; 
           } 
           fwrite($arq_imagenter_, $this->imagenter_) ;  
           fclose($arq_imagenter_) ;  
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_imagenter_, true);
           $this->nmgp_return_img['imagenter_'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['imagenter_'][1] = $sc_obj_img->getWidth();
       } 
       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>
<input type="hidden" name="imagenter__ul_name<?php echo $sc_seq_vert; ?>" id="id_sc_field_imagenter__ul_name<?php echo $sc_seq_vert; ?>" value="<?php echo $this->form_encode_input($this->imagenter__ul_name);?>">
<input type="hidden" name="imagenter__ul_type<?php echo $sc_seq_vert; ?>" id="id_sc_field_imagenter__ul_type<?php echo $sc_seq_vert; ?>" value="<?php echo $this->form_encode_input($this->imagenter__ul_type);?>">


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: true}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: true}"> </TD>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_terceros_mesas_add_new_line(" . $sc_seq_vert . ")", "do_ajax_terceros_mesas_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_terceros_mesas_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_terceros_mesas_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_terceros_mesas_cancel_update(" . $sc_seq_vert . ")", "do_ajax_terceros_mesas_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['tipo_documento_']) && $this->nmgp_cmp_hidden['tipo_documento_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_documento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo_documento__line" id="hidden_field_data_tipo_documento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_documento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_documento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_documento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_documento_"]) &&  $this->nmgp_cmp_readonly["tipo_documento_"] == "on") { 

$tipo_documento__look = "";
 if ($this->tipo_documento_ == "11") { $tipo_documento__look .= "Registtro civil de nacimiento" ;} 
 if ($this->tipo_documento_ == "12") { $tipo_documento__look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento_ == "13") { $tipo_documento__look .= "Cédula de ciudadanía" ;} 
 if ($this->tipo_documento_ == "21") { $tipo_documento__look .= "Tarjeta de Extranjería" ;} 
 if ($this->tipo_documento_ == "22") { $tipo_documento__look .= "Cédula de extranjería" ;} 
 if ($this->tipo_documento_ == "31") { $tipo_documento__look .= "Nit" ;} 
 if ($this->tipo_documento_ == "41") { $tipo_documento__look .= "Pasaporte" ;} 
 if ($this->tipo_documento_ == "42") { $tipo_documento__look .= "Tipo de documento extranjero" ;} 
 if ($this->tipo_documento_ == "43") { $tipo_documento__look .= "Definido por la DIAN" ;} 
 if (empty($tipo_documento__look)) { $tipo_documento__look = $this->tipo_documento_; }
?>
<input type="hidden" name="tipo_documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_documento_) . "\">" . $tipo_documento__look . ""; ?>
<?php } else { ?>
<?php

$tipo_documento__look = "";
 if ($this->tipo_documento_ == "11") { $tipo_documento__look .= "Registtro civil de nacimiento" ;} 
 if ($this->tipo_documento_ == "12") { $tipo_documento__look .= "Tarjeta de identidad" ;} 
 if ($this->tipo_documento_ == "13") { $tipo_documento__look .= "Cédula de ciudadanía" ;} 
 if ($this->tipo_documento_ == "21") { $tipo_documento__look .= "Tarjeta de Extranjería" ;} 
 if ($this->tipo_documento_ == "22") { $tipo_documento__look .= "Cédula de extranjería" ;} 
 if ($this->tipo_documento_ == "31") { $tipo_documento__look .= "Nit" ;} 
 if ($this->tipo_documento_ == "41") { $tipo_documento__look .= "Pasaporte" ;} 
 if ($this->tipo_documento_ == "42") { $tipo_documento__look .= "Tipo de documento extranjero" ;} 
 if ($this->tipo_documento_ == "43") { $tipo_documento__look .= "Definido por la DIAN" ;} 
 if (empty($tipo_documento__look)) { $tipo_documento__look = $this->tipo_documento_; }
?>
<span id="id_read_on_tipo_documento_<?php echo $sc_seq_vert ; ?>" class="css_tipo_documento__line"  style="<?php echo $sStyleReadLab_tipo_documento_; ?>"><?php echo $this->form_format_readonly("tipo_documento_", $this->form_encode_input($tipo_documento__look)); ?></span><span id="id_read_off_tipo_documento_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_documento_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_documento_; ?>">
 <span id="idAjaxSelect_tipo_documento_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_tipo_documento__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_documento_<?php echo $sc_seq_vert ?>" name="tipo_documento_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="11" <?php  if ($this->tipo_documento_ == "11") { echo " selected" ;} ?>>Registtro civil de nacimiento</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '11'; ?>
 <option  value="12" <?php  if ($this->tipo_documento_ == "12") { echo " selected" ;} ?>>Tarjeta de identidad</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '12'; ?>
 <option  value="13" <?php  if ($this->tipo_documento_ == "13") { echo " selected" ;} ?><?php  if (empty($this->tipo_documento_)) { echo " selected" ;} ?>>Cédula de ciudadanía</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '13'; ?>
 <option  value="21" <?php  if ($this->tipo_documento_ == "21") { echo " selected" ;} ?>>Tarjeta de Extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '21'; ?>
 <option  value="22" <?php  if ($this->tipo_documento_ == "22") { echo " selected" ;} ?>>Cédula de extranjería</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '22'; ?>
 <option  value="31" <?php  if ($this->tipo_documento_ == "31") { echo " selected" ;} ?>>Nit</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '31'; ?>
 <option  value="41" <?php  if ($this->tipo_documento_ == "41") { echo " selected" ;} ?>>Pasaporte</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '41'; ?>
 <option  value="42" <?php  if ($this->tipo_documento_ == "42") { echo " selected" ;} ?>>Tipo de documento extranjero</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '42'; ?>
 <option  value="43" <?php  if ($this->tipo_documento_ == "43") { echo " selected" ;} ?>>Definido por la DIAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '43'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_documento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_documento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['documento_']) && $this->nmgp_cmp_hidden['documento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_documento__line" id="hidden_field_data_documento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_documento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_documento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_documento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["documento_"]) &&  $this->nmgp_cmp_readonly["documento_"] == "on") { 

 ?>
<input type="hidden" name="documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_) . "\">" . $documento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_documento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-documento_<?php echo $sc_seq_vert ?> css_documento__line" style="<?php echo $sStyleReadLab_documento_; ?>"><?php echo $this->form_format_readonly("documento_", $this->form_encode_input($this->documento_)); ?></span><span id="id_read_off_documento_<?php echo $sc_seq_vert ?>" class="css_read_off_documento_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_documento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_documento__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_documento_<?php echo $sc_seq_vert ?>" type=text name="documento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($documento_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=14"; } ?> maxlength=14 alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '1 - 100 - 001', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_documento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_documento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dv_']) && $this->nmgp_cmp_hidden['dv_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dv_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dv_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dv__line" id="hidden_field_data_dv_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dv_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dv__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dv_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dv_"]) &&  $this->nmgp_cmp_readonly["dv_"] == "on") { 

 ?>
<input type="hidden" name="dv_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dv_) . "\">" . $dv_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dv_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dv_<?php echo $sc_seq_vert ?> css_dv__line" style="<?php echo $sStyleReadLab_dv_; ?>"><?php echo $this->form_format_readonly("dv_", $this->form_encode_input($this->dv_)); ?></span><span id="id_read_off_dv_<?php echo $sc_seq_vert ?>" class="css_read_off_dv_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dv_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dv__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dv_<?php echo $sc_seq_vert ?>" type=text name="dv_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dv_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> alt="{datatype: 'integer', maxLength: 1, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dv_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dv_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dv_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dv_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dv_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['imagenter_']) && $this->nmgp_cmp_hidden['imagenter_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imagenter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($imagenter_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_imagenter__line" id="hidden_field_data_imagenter_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_imagenter_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_imagenter__line" style="padding: 0px">
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_imagenter_" . $sc_seq_vert . "" => $out_imagenter_); ?><script>var var_ajax_img_imagenter_<?php echo $sc_seq_vert; ?> = '<?php echo $out_imagenter_; ?>';</script><input type="hidden" name="temp_out_imagenter_" value="<?php echo $this->form_encode_input($out_imagenter_); ?>" /><?php if (!empty($out_imagenter_)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_imagenter_" . $sc_seq_vert . ", '" . $this->nmgp_return_img['imagenter_'][0] . "', '" . $this->nmgp_return_img['imagenter_'][1] . "')\"><img id=\"id_ajax_img_imagenter_" . $sc_seq_vert . "\"  border=\"0\" src=\"$out_imagenter_\"></a>"; } else {  echo "<img id=\"id_ajax_img_imagenter_" . $sc_seq_vert . "\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly_imagenter_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imagenter_"]) &&  $this->nmgp_cmp_readonly["imagenter_"] == "on") { 

 ?>
<img id=\"imagenter_<?php echo $sc_seq_vert ?><?php echo $sc_seq_vert; ?>_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="imagenter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($imagenter_) . "\">" . $imagenter_ . ""; ?>
<?php } else { ?>
<span id="id_read_off_imagenter_<?php echo $sc_seq_vert ?>" class="css_read_off_imagenter_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_imagenter_; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-imagenter_<?php echo $sc_seq_vert ?>" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOddMult css_imagenter__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" type="file" name="imagenter_<?php echo $sc_seq_vert ?>[]" id="id_sc_field_imagenter_<?php echo $sc_seq_vert ?>" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
   if ('novo' == $this->nmgp_opcao)
   {
      $sCheckInsert = "nm_check_insert(" . $sc_seq_vert . ");";
   }
?>
<span id="chk_ajax_img_imagenter_<?php echo $sc_seq_vert; ?>"<?php if ($this->nmgp_opcao == "novo" || empty($imagenter_)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="imagenter__limpa<?php echo $sc_seq_vert ?>" value="<?php echo $imagenter__limpa . '" '; if ($imagenter__limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="imagenter_<?php echo $sc_seq_vert ?><?php echo $sc_seq_vert; ?>_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_imagenter_<?php echo $sc_seq_vert; ?>" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_imagenter_<?php echo $sc_seq_vert; ?>" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<span class="scFormPopupBubble<?php echo $sc_seq_vert; ?>" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">La imágen debe cumplir las siguiente especificaciones:  altura 150px, ancho 150 px como máximo. La imagen puede ser jpg, png ogif.</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">La imágen debe cumplir las siguiente especificaciones:  altura 150px, ancho 150 px como máximo. La imagen puede ser jpg, png ogif.</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span><div id="id_sc_dragdrop_imagenter_<?php echo $sc_seq_vert; ?>" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_imagenter_ ?>"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imagenter_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imagenter_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre1_']) && $this->nmgp_cmp_hidden['nombre1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nombre1__line" id="hidden_field_data_nombre1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nombre1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nombre1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nombre1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre1_"]) &&  $this->nmgp_cmp_readonly["nombre1_"] == "on") { 

 ?>
<input type="hidden" name="nombre1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre1_) . "\">" . $nombre1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nombre1_<?php echo $sc_seq_vert ?> css_nombre1__line" style="<?php echo $sStyleReadLab_nombre1_; ?>"><?php echo $this->form_format_readonly("nombre1_", $this->form_encode_input($this->nombre1_)); ?></span><span id="id_read_off_nombre1_<?php echo $sc_seq_vert ?>" class="css_read_off_nombre1_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nombre1__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre1_<?php echo $sc_seq_vert ?>" type=text name="nombre1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre1_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nombre2_']) && $this->nmgp_cmp_hidden['nombre2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombre2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nombre2__line" id="hidden_field_data_nombre2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nombre2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nombre2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nombre2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombre2_"]) &&  $this->nmgp_cmp_readonly["nombre2_"] == "on") { 

 ?>
<input type="hidden" name="nombre2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre2_) . "\">" . $nombre2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombre2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nombre2_<?php echo $sc_seq_vert ?> css_nombre2__line" style="<?php echo $sStyleReadLab_nombre2_; ?>"><?php echo $this->form_format_readonly("nombre2_", $this->form_encode_input($this->nombre2_)); ?></span><span id="id_read_off_nombre2_<?php echo $sc_seq_vert ?>" class="css_read_off_nombre2_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombre2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nombre2__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombre2_<?php echo $sc_seq_vert ?>" type=text name="nombre2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombre2_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombre2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombre2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['apellido1_']) && $this->nmgp_cmp_hidden['apellido1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="apellido1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($apellido1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_apellido1__line" id="hidden_field_data_apellido1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_apellido1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_apellido1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_apellido1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apellido1_"]) &&  $this->nmgp_cmp_readonly["apellido1_"] == "on") { 

 ?>
<input type="hidden" name="apellido1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($apellido1_) . "\">" . $apellido1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_apellido1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-apellido1_<?php echo $sc_seq_vert ?> css_apellido1__line" style="<?php echo $sStyleReadLab_apellido1_; ?>"><?php echo $this->form_format_readonly("apellido1_", $this->form_encode_input($this->apellido1_)); ?></span><span id="id_read_off_apellido1_<?php echo $sc_seq_vert ?>" class="css_read_off_apellido1_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_apellido1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_apellido1__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_apellido1_<?php echo $sc_seq_vert ?>" type=text name="apellido1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($apellido1_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apellido1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apellido1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['apellido2_']) && $this->nmgp_cmp_hidden['apellido2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="apellido2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($apellido2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_apellido2__line" id="hidden_field_data_apellido2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_apellido2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_apellido2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_apellido2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["apellido2_"]) &&  $this->nmgp_cmp_readonly["apellido2_"] == "on") { 

 ?>
<input type="hidden" name="apellido2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($apellido2_) . "\">" . $apellido2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_apellido2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-apellido2_<?php echo $sc_seq_vert ?> css_apellido2__line" style="<?php echo $sStyleReadLab_apellido2_; ?>"><?php echo $this->form_format_readonly("apellido2_", $this->form_encode_input($this->apellido2_)); ?></span><span id="id_read_off_apellido2_<?php echo $sc_seq_vert ?>" class="css_read_off_apellido2_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_apellido2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_apellido2__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_apellido2_<?php echo $sc_seq_vert ?>" type=text name="apellido2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($apellido2_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyzáéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç ") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_apellido2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_apellido2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nombres_']) && $this->nmgp_cmp_hidden['nombres_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombres_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombres_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nombres__line" id="hidden_field_data_nombres_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nombres_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nombres__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nombres_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombres_"]) &&  $this->nmgp_cmp_readonly["nombres_"] == "on") { 

 ?>
<input type="hidden" name="nombres_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombres_) . "\">" . $nombres_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombres_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nombres_<?php echo $sc_seq_vert ?> css_nombres__line" style="<?php echo $sStyleReadLab_nombres_; ?>"><?php echo $this->form_format_readonly("nombres_", $this->form_encode_input($this->nombres_)); ?></span><span id="id_read_off_nombres_<?php echo $sc_seq_vert ?>" class="css_read_off_nombres_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombres_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nombres__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombres_<?php echo $sc_seq_vert ?>" type=text name="nombres_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombres_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=60"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Mesa 1 - Zona VIP', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombres_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombres_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['representante_']) && $this->nmgp_cmp_hidden['representante_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="representante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($representante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_representante__line" id="hidden_field_data_representante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_representante_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_representante__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_representante_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["representante_"]) &&  $this->nmgp_cmp_readonly["representante_"] == "on") { 

 ?>
<input type="hidden" name="representante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($representante_) . "\">" . $representante_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_representante_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-representante_<?php echo $sc_seq_vert ?> css_representante__line" style="<?php echo $sStyleReadLab_representante_; ?>"><?php echo $this->form_format_readonly("representante_", $this->form_encode_input($this->representante_)); ?></span><span id="id_read_off_representante_<?php echo $sc_seq_vert ?>" class="css_read_off_representante_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_representante_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_representante__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_representante_<?php echo $sc_seq_vert ?>" type=text name="representante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($representante_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿ¨´`^~ç .-") ?>', lettersCase: 'upper', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_representante_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_representante_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sexo_']) && $this->nmgp_cmp_hidden['sexo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sexo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->sexo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sexo__line" id="hidden_field_data_sexo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sexo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sexo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sexo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sexo_"]) &&  $this->nmgp_cmp_readonly["sexo_"] == "on") { 

$sexo__look = "";
 if ($this->sexo_ == "M") { $sexo__look .= "Masculino" ;} 
 if ($this->sexo_ == "F") { $sexo__look .= "Femenino" ;} 
 if ($this->sexo_ == "O") { $sexo__look .= "Otro" ;} 
 if (empty($sexo__look)) { $sexo__look = $this->sexo_; }
?>
<input type="hidden" name="sexo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sexo_) . "\">" . $sexo__look . ""; ?>
<?php } else { ?>
<?php

$sexo__look = "";
 if ($this->sexo_ == "M") { $sexo__look .= "Masculino" ;} 
 if ($this->sexo_ == "F") { $sexo__look .= "Femenino" ;} 
 if ($this->sexo_ == "O") { $sexo__look .= "Otro" ;} 
 if (empty($sexo__look)) { $sexo__look = $this->sexo_; }
?>
<span id="id_read_on_sexo_<?php echo $sc_seq_vert ; ?>" class="css_sexo__line"  style="<?php echo $sStyleReadLab_sexo_; ?>"><?php echo $this->form_format_readonly("sexo_", $this->form_encode_input($sexo__look)); ?></span><span id="id_read_off_sexo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_sexo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_sexo_; ?>">
 <span id="idAjaxSelect_sexo_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_sexo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sexo_<?php echo $sc_seq_vert ?>" name="sexo_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="M" <?php  if ($this->sexo_ == "M") { echo " selected" ;} ?><?php  if (empty($this->sexo_)) { echo " selected" ;} ?>>Masculino</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'M'; ?>
 <option  value="F" <?php  if ($this->sexo_ == "F") { echo " selected" ;} ?>>Femenino</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'F'; ?>
 <option  value="O" <?php  if ($this->sexo_ == "O") { echo " selected" ;} ?>>Otro</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'O'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sexo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sexo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo__line" id="hidden_field_data_tipo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_"]) &&  $this->nmgp_cmp_readonly["tipo_"] == "on") { 

$tipo__look = "";
 if ($this->tipo_ == "NAT") { $tipo__look .= "NATURAL" ;} 
 if ($this->tipo_ == "JUR") { $tipo__look .= "JURÍDICA" ;} 
 if (empty($tipo__look)) { $tipo__look = $this->tipo_; }
?>
<input type="hidden" name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_) . "\">" . $tipo__look . ""; ?>
<?php } else { ?>
<?php

$tipo__look = "";
 if ($this->tipo_ == "NAT") { $tipo__look .= "NATURAL" ;} 
 if ($this->tipo_ == "JUR") { $tipo__look .= "JURÍDICA" ;} 
 if (empty($tipo__look)) { $tipo__look = $this->tipo_; }
?>
<span id="id_read_on_tipo_<?php echo $sc_seq_vert ; ?>" class="css_tipo__line"  style="<?php echo $sStyleReadLab_tipo_; ?>"><?php echo $this->form_format_readonly("tipo_", $this->form_encode_input($tipo__look)); ?></span><span id="id_read_off_tipo_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tipo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_; ?>">
 <span id="idAjaxSelect_tipo_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_tipo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_<?php echo $sc_seq_vert ?>" name="tipo_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="NAT" <?php  if ($this->tipo_ == "NAT") { echo " selected" ;} ?><?php  if (empty($this->tipo_)) { echo " selected" ;} ?>>NATURAL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_'][] = 'NAT'; ?>
 <option  value="JUR" <?php  if ($this->tipo_ == "JUR") { echo " selected" ;} ?>>JURÍDICA</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_'][] = 'JUR'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['regimen_']) && $this->nmgp_cmp_hidden['regimen_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="regimen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->regimen_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_regimen__line" id="hidden_field_data_regimen_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_regimen_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_regimen__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_regimen_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regimen_"]) &&  $this->nmgp_cmp_readonly["regimen_"] == "on") { 

$regimen__look = "";
 if ($this->regimen_ == "SIM") { $regimen__look .= "SIMPLIFICADO" ;} 
 if ($this->regimen_ == "COMUN") { $regimen__look .= "COMÚN" ;} 
 if (empty($regimen__look)) { $regimen__look = $this->regimen_; }
?>
<input type="hidden" name="regimen_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($regimen_) . "\">" . $regimen__look . ""; ?>
<?php } else { ?>
<?php

$regimen__look = "";
 if ($this->regimen_ == "SIM") { $regimen__look .= "SIMPLIFICADO" ;} 
 if ($this->regimen_ == "COMUN") { $regimen__look .= "COMÚN" ;} 
 if (empty($regimen__look)) { $regimen__look = $this->regimen_; }
?>
<span id="id_read_on_regimen_<?php echo $sc_seq_vert ; ?>" class="css_regimen__line"  style="<?php echo $sStyleReadLab_regimen_; ?>"><?php echo $this->form_format_readonly("regimen_", $this->form_encode_input($regimen__look)); ?></span><span id="id_read_off_regimen_<?php echo $sc_seq_vert ; ?>" class="css_read_off_regimen_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_regimen_; ?>">
 <span id="idAjaxSelect_regimen_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_regimen__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_regimen_<?php echo $sc_seq_vert ?>" name="regimen_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: true}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = ''; ?>
 <option value="">SELECCIONE</option>
 <option  value="SIM" <?php  if ($this->regimen_ == "SIM") { echo " selected" ;} ?><?php  if (empty($this->regimen_)) { echo " selected" ;} ?>>SIMPLIFICADO</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = 'SIM'; ?>
 <option  value="COMUN" <?php  if ($this->regimen_ == "COMUN") { echo " selected" ;} ?>>COMÚN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = 'COMUN'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regimen_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regimen_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['direccion_']) && $this->nmgp_cmp_hidden['direccion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direccion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_direccion__line" id="hidden_field_data_direccion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_direccion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_direccion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_direccion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion_"]) &&  $this->nmgp_cmp_readonly["direccion_"] == "on") { 

 ?>
<input type="hidden" name="direccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direccion_) . "\">" . $direccion_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-direccion_<?php echo $sc_seq_vert ?> css_direccion__line" style="<?php echo $sStyleReadLab_direccion_; ?>"><?php echo $this->form_format_readonly("direccion_", $this->form_encode_input($this->direccion_)); ?></span><span id="id_read_off_direccion_<?php echo $sc_seq_vert ?>" class="css_read_off_direccion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_direccion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direccion_<?php echo $sc_seq_vert ?>" type=text name="direccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direccion_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Dirección...', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['departamento_']) && $this->nmgp_cmp_hidden['departamento_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="departamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->departamento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_departamento__line" id="hidden_field_data_departamento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_departamento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_departamento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_departamento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["departamento_"]) &&  $this->nmgp_cmp_readonly["departamento_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array(); 
    }

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv_ = $old_value_dv_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'][] = $rs->fields[0];
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
   $departamento__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->departamento__1))
          {
              foreach ($this->departamento__1 as $tmp_departamento_)
              {
                  if (trim($tmp_departamento_) === trim($cadaselect[1])) { $departamento__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->departamento_) === trim($cadaselect[1])) { $departamento__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="departamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($departamento_) . "\">" . $departamento__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_departamento_();
   $x = 0 ; 
   $departamento__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->departamento__1))
          {
              foreach ($this->departamento__1 as $tmp_departamento_)
              {
                  if (trim($tmp_departamento_) === trim($cadaselect[1])) { $departamento__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->departamento_) === trim($cadaselect[1])) { $departamento__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($departamento__look))
          {
              $departamento__look = $this->departamento_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_departamento_" . $sc_seq_vert . "\" class=\"css_departamento__line\" style=\"" .  $sStyleReadLab_departamento_ . "\">" . $this->form_format_readonly("departamento_", $this->form_encode_input($departamento__look)) . "</span><span id=\"id_read_off_departamento_" . $sc_seq_vert . "\" class=\"css_read_off_departamento_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_departamento_ . "\">";
   echo " <span id=\"idAjaxSelect_departamento_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_departamento__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_departamento_" . $sc_seq_vert . "\" name=\"departamento_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->departamento_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->departamento_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_departamento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_departamento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idmuni_']) && $this->nmgp_cmp_hidden['idmuni_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idmuni_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idmuni_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idmuni__line" id="hidden_field_data_idmuni_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idmuni_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idmuni__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idmuni_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idmuni_"]) &&  $this->nmgp_cmp_readonly["idmuni_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array(); 
    }

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento_ ORDER BY municipio";

   $this->dv_ = $old_value_dv_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'][] = $rs->fields[0];
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
   $idmuni__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmuni__1))
          {
              foreach ($this->idmuni__1 as $tmp_idmuni_)
              {
                  if (trim($tmp_idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idmuni_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idmuni_) . "\">" . $idmuni__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idmuni_();
   $x = 0 ; 
   $idmuni__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmuni__1))
          {
              foreach ($this->idmuni__1 as $tmp_idmuni_)
              {
                  if (trim($tmp_idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmuni_) === trim($cadaselect[1])) { $idmuni__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idmuni__look))
          {
              $idmuni__look = $this->idmuni_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idmuni_" . $sc_seq_vert . "\" class=\"css_idmuni__line\" style=\"" .  $sStyleReadLab_idmuni_ . "\">" . $this->form_format_readonly("idmuni_", $this->form_encode_input($idmuni__look)) . "</span><span id=\"id_read_off_idmuni_" . $sc_seq_vert . "\" class=\"css_read_off_idmuni_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idmuni_ . "\">";
   echo " <span id=\"idAjaxSelect_idmuni_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idmuni__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idmuni_" . $sc_seq_vert . "\" name=\"idmuni_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: true}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idmuni_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idmuni_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmuni_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmuni_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['observaciones_']) && $this->nmgp_cmp_hidden['observaciones_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="observaciones_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($observaciones_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_observaciones__line" id="hidden_field_data_observaciones_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_observaciones_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_observaciones__line" style="vertical-align: top;padding: 0px">
<?php
$observaciones__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($observaciones_));

?>

<?php if ($bTestReadOnly_observaciones_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["observaciones_"]) &&  $this->nmgp_cmp_readonly["observaciones_"] == "on") { 

 ?>
<input type="hidden" name="observaciones_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($observaciones_) . "\">" . $observaciones__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_observaciones_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-observaciones_<?php echo $sc_seq_vert ?> css_observaciones__line" style="<?php echo $sStyleReadLab_observaciones_; ?>"><?php echo $this->form_format_readonly("observaciones_", $this->form_encode_input($observaciones__val)); ?></span><span id="id_read_off_observaciones_<?php echo $sc_seq_vert ?>" class="css_read_off_observaciones_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_observaciones_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_observaciones__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="observaciones_<?php echo $sc_seq_vert ?>" id="id_sc_field_observaciones_<?php echo $sc_seq_vert ?>" rows="4" cols="50"
 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: 'Coloque aquí observación sobre el tercero', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $observaciones_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_observaciones_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_observaciones_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cliente_']) && $this->nmgp_cmp_hidden['cliente_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->cliente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cliente__line" id="hidden_field_data_cliente_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cliente_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cliente__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cliente_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cliente_"]) &&  $this->nmgp_cmp_readonly["cliente_"] == "on") { 

$cliente__look = "";
 if ($this->cliente_ == "SI") { $cliente__look .= "SI" ;} 
 if (empty($cliente__look)) { $cliente__look = $this->cliente_; }
?>
<input type="hidden" name="cliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cliente_) . "\">" . $cliente__look . ""; ?>
<?php } else { ?>
<?php

$cliente__look = "";
 if ($this->cliente_ == "SI") { $cliente__look .= "SI" ;} 
 if (empty($cliente__look)) { $cliente__look = $this->cliente_; }
?>
<span id="id_read_on_cliente_<?php echo $sc_seq_vert ; ?>" class="css_cliente__line"  style="<?php echo $sStyleReadLab_cliente_; ?>"><?php echo $this->form_format_readonly("cliente_", $this->form_encode_input($cliente__look)); ?></span><span id="id_read_off_cliente_<?php echo $sc_seq_vert ; ?>" class="css_read_off_cliente_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_cliente_; ?>">
 <span id="idAjaxSelect_cliente_<?php echo $sc_seq_vert ?>" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOddMult css_cliente__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cliente_<?php echo $sc_seq_vert ?>" name="cliente_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: true}">
 <option  value="SI" <?php  if ($this->cliente_ == "SI") { echo " selected" ;} ?><?php  if (empty($this->cliente_)) { echo " selected" ;} ?>>SI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_cliente_'][] = 'SI'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cliente_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cliente_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['es_restaurante_']) && $this->nmgp_cmp_hidden['es_restaurante_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="es_restaurante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($es_restaurante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_es_restaurante__line" id="hidden_field_data_es_restaurante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_es_restaurante_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_es_restaurante__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_es_restaurante_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_restaurante_"]) &&  $this->nmgp_cmp_readonly["es_restaurante_"] == "on") { 

 if ("NO" == $this->es_restaurante_) { $es_restaurante__look = "NO";} 
 if ("SI" == $this->es_restaurante_) { $es_restaurante__look = "SI";} 
?>
<input type="hidden" name="es_restaurante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($es_restaurante_) . "\">" . $es_restaurante__look . ""; ?>
<?php } else { ?>

<?php

 if ("NO" == $this->es_restaurante_) { $es_restaurante__look = "NO";} 
 if ("SI" == $this->es_restaurante_) { $es_restaurante__look = "SI";} 
?>
<span id="id_read_on_es_restaurante_<?php echo $sc_seq_vert ; ?>"  class="css_es_restaurante__line" style="<?php echo $sStyleReadLab_es_restaurante_; ?>"><?php echo $this->form_format_readonly("es_restaurante_", $this->form_encode_input($es_restaurante__look)); ?></span><span id="id_read_off_es_restaurante_<?php echo $sc_seq_vert ; ?>" class="css_read_off_es_restaurante_ css_es_restaurante__line" style="<?php echo $sStyleReadInp_es_restaurante_; ?>"><div id="idAjaxRadio_es_restaurante_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_es_restaurante__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_es_restaurante__line"><?php $tempOptionId = "id-opt-es_restaurante_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-es_restaurante_ sc-ui-radio-es_restaurante_<?php echo $sc_seq_vert ?> sc-js-input" type=radio name="es_restaurante_<?php echo $sc_seq_vert ?>" value="NO"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_'][] = 'NO'; ?>
<?php  if ("NO" == $this->es_restaurante_)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_es_restaurante__line"><?php $tempOptionId = "id-opt-es_restaurante_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-es_restaurante_ sc-ui-radio-es_restaurante_<?php echo $sc_seq_vert ?> sc-js-input" type=radio name="es_restaurante_<?php echo $sc_seq_vert ?>" value="SI"
 alt="{type: 'radio', enterTab: true}"<?php $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_'][] = 'SI'; ?>
<?php  if ("SI" == $this->es_restaurante_)  { echo " checked" ;} ?><?php  if (empty($this->es_restaurante_)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
<span class="scFormPopupBubble<?php echo $sc_seq_vert; ?>" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Si se utilizará como mesa en el área del restaurante o cafetería</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Si se utilizará como mesa en el área del restaurante o cafetería</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_restaurante_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_restaurante_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_tipo_documento_))
       {
           $this->nmgp_cmp_readonly['tipo_documento_'] = $sCheckRead_tipo_documento_;
       }
       if ('display: none;' == $sStyleHidden_tipo_documento_)
       {
           $this->nmgp_cmp_hidden['tipo_documento_'] = 'off';
       }
       if (isset($sCheckRead_documento_))
       {
           $this->nmgp_cmp_readonly['documento_'] = $sCheckRead_documento_;
       }
       if ('display: none;' == $sStyleHidden_documento_)
       {
           $this->nmgp_cmp_hidden['documento_'] = 'off';
       }
       if (isset($sCheckRead_dv_))
       {
           $this->nmgp_cmp_readonly['dv_'] = $sCheckRead_dv_;
       }
       if ('display: none;' == $sStyleHidden_dv_)
       {
           $this->nmgp_cmp_hidden['dv_'] = 'off';
       }
       if (isset($sCheckRead_imagenter_))
       {
           $this->nmgp_cmp_readonly['imagenter_'] = $sCheckRead_imagenter_;
       }
       if ('display: none;' == $sStyleHidden_imagenter_)
       {
           $this->nmgp_cmp_hidden['imagenter_'] = 'off';
       }
       if (isset($sCheckRead_nombre1_))
       {
           $this->nmgp_cmp_readonly['nombre1_'] = $sCheckRead_nombre1_;
       }
       if ('display: none;' == $sStyleHidden_nombre1_)
       {
           $this->nmgp_cmp_hidden['nombre1_'] = 'off';
       }
       if (isset($sCheckRead_nombre2_))
       {
           $this->nmgp_cmp_readonly['nombre2_'] = $sCheckRead_nombre2_;
       }
       if ('display: none;' == $sStyleHidden_nombre2_)
       {
           $this->nmgp_cmp_hidden['nombre2_'] = 'off';
       }
       if (isset($sCheckRead_apellido1_))
       {
           $this->nmgp_cmp_readonly['apellido1_'] = $sCheckRead_apellido1_;
       }
       if ('display: none;' == $sStyleHidden_apellido1_)
       {
           $this->nmgp_cmp_hidden['apellido1_'] = 'off';
       }
       if (isset($sCheckRead_apellido2_))
       {
           $this->nmgp_cmp_readonly['apellido2_'] = $sCheckRead_apellido2_;
       }
       if ('display: none;' == $sStyleHidden_apellido2_)
       {
           $this->nmgp_cmp_hidden['apellido2_'] = 'off';
       }
       if (isset($sCheckRead_nombres_))
       {
           $this->nmgp_cmp_readonly['nombres_'] = $sCheckRead_nombres_;
       }
       if ('display: none;' == $sStyleHidden_nombres_)
       {
           $this->nmgp_cmp_hidden['nombres_'] = 'off';
       }
       if (isset($sCheckRead_representante_))
       {
           $this->nmgp_cmp_readonly['representante_'] = $sCheckRead_representante_;
       }
       if ('display: none;' == $sStyleHidden_representante_)
       {
           $this->nmgp_cmp_hidden['representante_'] = 'off';
       }
       if (isset($sCheckRead_sexo_))
       {
           $this->nmgp_cmp_readonly['sexo_'] = $sCheckRead_sexo_;
       }
       if ('display: none;' == $sStyleHidden_sexo_)
       {
           $this->nmgp_cmp_hidden['sexo_'] = 'off';
       }
       if (isset($sCheckRead_tipo_))
       {
           $this->nmgp_cmp_readonly['tipo_'] = $sCheckRead_tipo_;
       }
       if ('display: none;' == $sStyleHidden_tipo_)
       {
           $this->nmgp_cmp_hidden['tipo_'] = 'off';
       }
       if (isset($sCheckRead_regimen_))
       {
           $this->nmgp_cmp_readonly['regimen_'] = $sCheckRead_regimen_;
       }
       if ('display: none;' == $sStyleHidden_regimen_)
       {
           $this->nmgp_cmp_hidden['regimen_'] = 'off';
       }
       if (isset($sCheckRead_direccion_))
       {
           $this->nmgp_cmp_readonly['direccion_'] = $sCheckRead_direccion_;
       }
       if ('display: none;' == $sStyleHidden_direccion_)
       {
           $this->nmgp_cmp_hidden['direccion_'] = 'off';
       }
       if (isset($sCheckRead_departamento_))
       {
           $this->nmgp_cmp_readonly['departamento_'] = $sCheckRead_departamento_;
       }
       if ('display: none;' == $sStyleHidden_departamento_)
       {
           $this->nmgp_cmp_hidden['departamento_'] = 'off';
       }
       if (isset($sCheckRead_idmuni_))
       {
           $this->nmgp_cmp_readonly['idmuni_'] = $sCheckRead_idmuni_;
       }
       if ('display: none;' == $sStyleHidden_idmuni_)
       {
           $this->nmgp_cmp_hidden['idmuni_'] = 'off';
       }
       if (isset($sCheckRead_observaciones_))
       {
           $this->nmgp_cmp_readonly['observaciones_'] = $sCheckRead_observaciones_;
       }
       if ('display: none;' == $sStyleHidden_observaciones_)
       {
           $this->nmgp_cmp_hidden['observaciones_'] = 'off';
       }
       if (isset($sCheckRead_cliente_))
       {
           $this->nmgp_cmp_readonly['cliente_'] = $sCheckRead_cliente_;
       }
       if ('display: none;' == $sStyleHidden_cliente_)
       {
           $this->nmgp_cmp_hidden['cliente_'] = 'off';
       }
       if (isset($sCheckRead_es_restaurante_))
       {
           $this->nmgp_cmp_readonly['es_restaurante_'] = $sCheckRead_es_restaurante_;
       }
       if ('display: none;' == $sStyleHidden_es_restaurante_)
       {
           $this->nmgp_cmp_hidden['es_restaurante_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_terceros_mesas = $guarda_form_vert_terceros_mesas;
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
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_modal'])
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
   </td></tr></table>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("terceros_mesas");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("terceros_mesas");
 parent.scAjaxDetailHeight("terceros_mesas", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("terceros_mesas", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("terceros_mesas", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_modal'])
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
			do_ajax_terceros_mesas_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
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
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['buttonStatus'] = $this->nmgp_botoes;
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
