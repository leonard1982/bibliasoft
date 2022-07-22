<!DOCTYPE html>
<html lang="es">
<head>
	<META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
      
      <!-- Bootstrap css -->
<link href="<?php echo sc_url_library('prj', 'menu', 'assets/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="seg_login.css" />
	<title><?php echo "Facilweb"; ?></title>
</head>

<body>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex align-items-center banner">
          <img src="<?php echo sc_url_library('prj', 'menu', 'assets/images/icon-login/BANNER-FW.png') ?>" alt="Image" class="img-fluid" />
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
          		<img 
                     src="<?php echo sc_url_library('prj', 'menu', 'assets/images/icon-login/BARRA-1.png') ?>" 
                     alt="Image" class="logo-login" />
              <p class="mb-4">SOFTWARE CONTABLE Y ADMINISTRATIVO MULTIPROPÓSITO</p>
             </div>
              
            <form  name="F1" method="post" 
               action="./" 
               onsubmit="return false;" 
               target="_self">
              <input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />

              <div class="form-group first d-none">
                <!--SC_FIELD_INI_empresa-->
                <?php

$lookupInfo = $this->Form_lookup_empresa();
$_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'][] = '';

?>
<select id="id_sc_field_empresa" name="empresa" class="sc-js-input" size="1" alt="{type: 'select', enterTab: true}">
        <option value="">Seleccione Empresa</option>
<?php

foreach ($lookupInfo as $lookupOption) {
        if ('' != trim($lookupOption)) {
                $optionData = explode('?#?', $lookupOption);

?>
        <option value="<?php echo $optionData[1]; ?>"><?php echo $optionData[0]; ?></option>
<?php
        }
}

?>
</select>

                <!--SC_FIELD_END_empresa-->
              </div>
              <div class="form-group first d-none"> 
                <label for="id_sc_field_nit">Nit</label>
                <!--SC_FIELD_INI_nit-->
                <input  name="nit" id="id_sc_field_nit" value="<?php echo $this->form_encode_input($nit) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  class="form-control  sc-js-input " type="text" />
                <!--SC_FIELD_END_login-->
              </div>
              <div class="form-group"> 
                <label for="id_sc_field_login">Usuario</label>
                <!--SC_FIELD_INI_login-->
                <input  name="login" id="id_sc_field_login" value="<?php echo $this->form_encode_input($login) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  class="form-control  sc-js-input " type="text" />
                <!--SC_FIELD_END_login-->
              </div>
              <div class="form-group last mb-2">
                <label for="id_sc_field_pswd">Contraseña</label>
                <!--SC_FIELD_INI_pswd-->
                <input  name="pswd" id="id_sc_field_pswd" value="<?php echo $this->form_encode_input($pswd) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: true, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  class="form-control  sc-js-input " type="password" />
                        <!--SC_FIELD_END_pswd-->
                
              </div>
              
              <div class="d-flex mb-4 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Recordarme</span>
                  <input id="rememberme" type="checkbox" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="../control_recuperar_password" class="forgot-pass">¿Olvidó la contraseña?</a></span> 
              </div>

              <input type="button" class="btn btn-block btn-primary"  onclick="nm_atualiza('alterar');" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm_hint']; ?>" title=""  value="Entrar" />
              
              <div class="social-login mt-2">
                <a href="https://www.youtube.com/channel/UCFe8zYL0hV3G9fe1MbJdDBg?view_as=subscriber" target="_blank" class="youtube">
                  <span class="fab fa-youtube"></span> 
                </a>
				<a href="https://www.facebook.com/solucionesnavarro" class="facebook">
                  <span class="fab fa-facebook"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

    <!-- Cargar Libreria jQuery v3.6.0 -->
    <script src="<?=$this->Ini->path_prod;?>/third/jquery/js/jquery-3.6.0.min.js"></script> 
    <script src="<?php echo sc_url_library('prj', 'menu', 'assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

    <!-- Bootstrap4 js-->
    <script src="<?php echo sc_url_library('prj', 'menu', 'assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo sc_url_library('prj', 'menu', 'assets/plugins/bootstrap/popper.min.js') ?>"></script>
     <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("seg_login_sajax_js.php");
?>
<script type="text/javascript">
var Nm_Proc_Atualiz = false;
</script>
<script type="text/javascript">
<?php

include_once('seg_login_jquery.php');

?>
</script>
<script type="text/javascript">
 $(function() {
  scJQElementsAdd('');
  scJQGeneralAdd();
<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('nit');

<?php
}
?>
 });

</script>
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
 include_once("seg_login_js0.php");
?>
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
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['sc_modal'])
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
$sIconTitle = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
$sErrorIcon = (isset($_SESSION['scriptcase']['error_icon']['app_Login']) && '' != $_SESSION['scriptcase']['error_icon']['app_Login']) ? $_SESSION['scriptcase']['error_icon']['app_Login']  : "";
$sCloseIcon = (isset($_SESSION['scriptcase']['error_close']['app_Login']) && '' != trim($_SESSION['scriptcase']['error_close']['app_Login'])) ? $_SESSION['scriptcase']['error_close']['app_Login'] : "<td><input class=\"scButton_default\" type=\"button\" onClick=\"document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false\" value=\"X\" /></td>";
if ('' != $sIconTitle && '' != $sErrorIcon) {
    $sErrorIcon = '';
}
?>
<script type="text/javascript">
$(function() {
    $(document.F1).on("submit", function (e) {
        e.preventDefault();
    });
});

if (typeof scDisplayUserError === "undefined") {
    function scDisplayUserError(errorMessage) {
        scJs_alert("ERROR:\r\n" + errorMessage.replace(/<br \/>/gi, "<!--SC_NL-->"), function() {}, {type: "error"});
    }
}
if (typeof scDisplayUserDebug === "undefined") {
    function scDisplayUserDebug(debugMessage) {
        scJs_alert("DEBUG:\r\n" + debugMessage.replace(/<br \/>/gi, "<!--SC_NL-->"), function() {}, {type: "warning"});
    }
}
if (typeof scDisplayUserMessage === "undefined") {
    function scDisplayUserMessage(userMessage) {
        scJs_alert("MESSAGE:\r\n" + userMessage.replace(/<br \/>/gi, "<!--SC_NL-->"), function() {}, {type: "info"});
    }
}
</script>


    <script type="text/javascript" src="seg_login.js"></script>
  
</body>

</html>