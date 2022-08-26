<?php
   include_once('grid_reporte_caja_020521_session.php');
   session_start();
   $_SESSION['scriptcase']['grid_reporte_caja_020521']['glo_nm_path_imag_temp']  = "";
   //check tmp
   if(empty($_SESSION['scriptcase']['grid_reporte_caja_020521']['glo_nm_path_imag_temp']))
   {
       $str_path_apl_url = $_SERVER['PHP_SELF'];
       $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
       /*check tmp*/$_SESSION['scriptcase']['grid_reporte_caja_020521']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   if (!isset($_SESSION['sc_session']))
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys  = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web    = $_SERVER['PHP_SELF'];
       $str_path_web    = str_replace("\\", '/', $str_path_web);
       $str_path_web    = str_replace('//', '/', $str_path_web);
       $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       if (is_file($root . $_SESSION['scriptcase']['grid_reporte_caja_020521']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv_2022.txt"))
       {
?>
           <script language="javascript">
            nm_move();
           </script>
<?php
           exit;
       }
   }
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   $Ord_Cmp = new grid_reporte_caja_020521_Ord_cmp(); 
   $Ord_Cmp->Ord_cmp_init();
   
class grid_reporte_caja_020521_Ord_cmp
{
function Ord_cmp_init()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_def_seq, $tab_labels, $embbed, $tbar_pos, $_POST, $_GET;
   if (isset($_POST['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_POST, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_POST, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_POST['use_alias']))  ? filter_input(INPUT_POST, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_POST, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_POST, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_POST, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_POST['embbed_groupby']) && 'Y' == $_POST['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_POST, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   elseif (isset($_GET['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_GET, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_GET, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_GET['use_alias']))  ? filter_input(INPUT_GET, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_GET, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_GET, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_GET, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_GET['embbed_groupby']) && 'Y' == $_GET['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_GET, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $this->Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       include_once($NM_arq_lang);
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select_orig']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select_orig'] = array();
   }
   $this->restore = isset($_POST['restore']) ? true : false;
   if ($this->restore && !class_exists('Services_JSON')) {
       include_once("grid_reporte_caja_020521_json.php");
   }
   $this->Arr_result = array();
   
   $tab_ger_campos = array();
   $tab_def_campos = array();
   $tab_labels     = array();
   $tab_ger_campos['nom_docu'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nom_docu'] = "Nom_docu";
   }
   else
   {
       $tab_def_campos['nom_docu'] = "";
   }
   $tab_labels["nom_docu"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["nom_docu"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["nom_docu"] : "Nom_docu";
   $tab_ger_campos['fecha'] = "on";
   $tab_def_campos['fecha'] = "fecha";
   $tab_labels["fecha"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["fecha"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["fecha"] : "Fecha";
   $tab_ger_campos['nom_empresa'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nom_empresa'] = "nom_empresa";
   }
   else
   {
       $tab_def_campos['nom_empresa'] = "";
   }
   $tab_labels["nom_empresa"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["nom_empresa"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["nom_empresa"] : "nom_empresa";
   $tab_ger_campos['direccion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['direccion'] = "direccion";
   }
   else
   {
       $tab_def_campos['direccion'] = "";
   }
   $tab_labels["direccion"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["direccion"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["direccion"] : "direccion";
   $tab_ger_campos['correo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['correo'] = "correo";
   }
   else
   {
       $tab_def_campos['correo'] = "";
   }
   $tab_labels["correo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["correo"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["correo"] : "correo";
   $tab_ger_campos['telefono'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['telefono'] = "telefono";
   }
   else
   {
       $tab_def_campos['telefono'] = "";
   }
   $tab_labels["telefono"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["telefono"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["telefono"] : "telefono";
   $tab_ger_campos['et1'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et1'] = "et1";
   }
   else
   {
       $tab_def_campos['et1'] = "";
   }
   $tab_labels["et1"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et1"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et1"] : "et1";
   $tab_ger_campos['res'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['res'] = "res";
   }
   else
   {
       $tab_def_campos['res'] = "";
   }
   $tab_labels["res"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["res"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["res"] : "res";
   $tab_ger_campos['et2'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et2'] = "et2";
   }
   else
   {
       $tab_def_campos['et2'] = "";
   }
   $tab_labels["et2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et2"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et2"] : "et2";
   $tab_ger_campos['documento'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['documento'] = "documento";
   }
   else
   {
       $tab_def_campos['documento'] = "";
   }
   $tab_labels["documento"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["documento"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["documento"] : "documento";
   $tab_ger_campos['et3'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et3'] = "et3";
   }
   else
   {
       $tab_def_campos['et3'] = "";
   }
   $tab_labels["et3"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et3"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et3"] : "et3";
   $tab_ger_campos['rango'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['rango'] = "rango";
   }
   else
   {
       $tab_def_campos['rango'] = "";
   }
   $tab_labels["rango"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["rango"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["rango"] : "rango";
   $tab_ger_campos['et4'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et4'] = "et4";
   }
   else
   {
       $tab_def_campos['et4'] = "";
   }
   $tab_labels["et4"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et4"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et4"] : "et4";
   $tab_ger_campos['cant_fact'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['cant_fact'] = "cant_fact";
   }
   else
   {
       $tab_def_campos['cant_fact'] = "";
   }
   $tab_labels["cant_fact"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["cant_fact"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["cant_fact"] : "cant_fact";
   $tab_ger_campos['et5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et5'] = "et5";
   }
   else
   {
       $tab_def_campos['et5'] = "";
   }
   $tab_labels["et5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et5"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et5"] : "et5";
   $tab_ger_campos['total'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['total'] = "total";
   }
   else
   {
       $tab_def_campos['total'] = "";
   }
   $tab_labels["total"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["total"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["total"] : "total";
   $tab_ger_campos['et6'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et6'] = "et6";
   }
   else
   {
       $tab_def_campos['et6'] = "";
   }
   $tab_labels["et6"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et6"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et6"] : "et6";
   $tab_ger_campos['et7'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et7'] = "et7";
   }
   else
   {
       $tab_def_campos['et7'] = "";
   }
   $tab_labels["et7"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et7"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et7"] : "et7";
   $tab_ger_campos['et8'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et8'] = "et8";
   }
   else
   {
       $tab_def_campos['et8'] = "";
   }
   $tab_labels["et8"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et8"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et8"] : "et8";
   $tab_ger_campos['et9'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et9'] = "et9";
   }
   else
   {
       $tab_def_campos['et9'] = "";
   }
   $tab_labels["et9"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et9"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et9"] : "et9";
   $tab_ger_campos['can_efec'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['can_efec'] = "can_efec";
   }
   else
   {
       $tab_def_campos['can_efec'] = "";
   }
   $tab_labels["can_efec"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["can_efec"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["can_efec"] : "can_efec";
   $tab_ger_campos['med_efec'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['med_efec'] = "med_efec";
   }
   else
   {
       $tab_def_campos['med_efec'] = "";
   }
   $tab_labels["med_efec"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_efec"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_efec"] : "med_efec";
   $tab_ger_campos['porc_efec'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['porc_efec'] = "porc_efec";
   }
   else
   {
       $tab_def_campos['porc_efec'] = "";
   }
   $tab_labels["porc_efec"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_efec"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_efec"] : "porc_efec";
   $tab_ger_campos['tot_efec'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tot_efec'] = "tot_efec";
   }
   else
   {
       $tab_def_campos['tot_efec'] = "";
   }
   $tab_labels["tot_efec"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_efec"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_efec"] : "tot_efec";
   $tab_ger_campos['c_tarj'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['c_tarj'] = "c_tarj";
   }
   else
   {
       $tab_def_campos['c_tarj'] = "";
   }
   $tab_labels["c_tarj"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["c_tarj"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["c_tarj"] : "c_tarj";
   $tab_ger_campos['med_tarj'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['med_tarj'] = "med_tarj";
   }
   else
   {
       $tab_def_campos['med_tarj'] = "";
   }
   $tab_labels["med_tarj"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_tarj"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_tarj"] : "med_tarj";
   $tab_ger_campos['porc_tarj'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['porc_tarj'] = "porc_tarj";
   }
   else
   {
       $tab_def_campos['porc_tarj'] = "";
   }
   $tab_labels["porc_tarj"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_tarj"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_tarj"] : "porc_tarj";
   $tab_ger_campos['tarjeta'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tarjeta'] = "tarjeta";
   }
   else
   {
       $tab_def_campos['tarjeta'] = "";
   }
   $tab_labels["tarjeta"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tarjeta"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tarjeta"] : "tarjeta";
   $tab_ger_campos['c_cheq'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['c_cheq'] = "c_cheq";
   }
   else
   {
       $tab_def_campos['c_cheq'] = "";
   }
   $tab_labels["c_cheq"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["c_cheq"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["c_cheq"] : "c_cheq";
   $tab_ger_campos['med_cheq'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['med_cheq'] = "med_cheq";
   }
   else
   {
       $tab_def_campos['med_cheq'] = "";
   }
   $tab_labels["med_cheq"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_cheq"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_cheq"] : "med_cheq";
   $tab_ger_campos['porc_cheq'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['porc_cheq'] = "porc_cheq";
   }
   else
   {
       $tab_def_campos['porc_cheq'] = "";
   }
   $tab_labels["porc_cheq"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_cheq"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_cheq"] : "porc_cheq";
   $tab_ger_campos['cheque'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['cheque'] = "cheque";
   }
   else
   {
       $tab_def_campos['cheque'] = "";
   }
   $tab_labels["cheque"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["cheque"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["cheque"] : "cheque";
   $tab_ger_campos['c_credito'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['c_credito'] = "c_credito";
   }
   else
   {
       $tab_def_campos['c_credito'] = "";
   }
   $tab_labels["c_credito"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["c_credito"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["c_credito"] : "c_credito";
   $tab_ger_campos['med_cred'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['med_cred'] = "med_cred";
   }
   else
   {
       $tab_def_campos['med_cred'] = "";
   }
   $tab_labels["med_cred"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_cred"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["med_cred"] : "med_cred";
   $tab_ger_campos['porc_credito'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['porc_credito'] = "porc_credito";
   }
   else
   {
       $tab_def_campos['porc_credito'] = "";
   }
   $tab_labels["porc_credito"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_credito"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["porc_credito"] : "porc_credito";
   $tab_ger_campos['credito'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['credito'] = "credito";
   }
   else
   {
       $tab_def_campos['credito'] = "";
   }
   $tab_labels["credito"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["credito"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["credito"] : "credito";
   $tab_ger_campos['et10'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et10'] = "et10";
   }
   else
   {
       $tab_def_campos['et10'] = "";
   }
   $tab_labels["et10"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et10"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et10"] : "et10";
   $tab_ger_campos['total_vtas'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['total_vtas'] = "total_vtas";
   }
   else
   {
       $tab_def_campos['total_vtas'] = "";
   }
   $tab_labels["total_vtas"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["total_vtas"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["total_vtas"] : "total_vtas";
   $tab_ger_campos['et_iva'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_iva'] = "et_iva";
   }
   else
   {
       $tab_def_campos['et_iva'] = "";
   }
   $tab_labels["et_iva"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_iva"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_iva"] : "et_iva";
   $tab_ger_campos['et_base'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_base'] = "et_base";
   }
   else
   {
       $tab_def_campos['et_base'] = "";
   }
   $tab_labels["et_base"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_base"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_base"] : "et_base";
   $tab_ger_campos['et_val_iva'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_val_iva'] = "et_val_iva";
   }
   else
   {
       $tab_def_campos['et_val_iva'] = "";
   }
   $tab_labels["et_val_iva"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_val_iva"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_val_iva"] : "et_val_iva";
   $tab_ger_campos['etiva_19'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['etiva_19'] = "etiva_19";
   }
   else
   {
       $tab_def_campos['etiva_19'] = "";
   }
   $tab_labels["etiva_19"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["etiva_19"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["etiva_19"] : "etiva_19";
   $tab_ger_campos['base19'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['base19'] = "base19";
   }
   else
   {
       $tab_def_campos['base19'] = "";
   }
   $tab_labels["base19"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["base19"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["base19"] : "base19";
   $tab_ger_campos['iva_19'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['iva_19'] = "iva_19";
   }
   else
   {
       $tab_def_campos['iva_19'] = "";
   }
   $tab_labels["iva_19"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["iva_19"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["iva_19"] : "iva_19";
   $tab_ger_campos['etiva_5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['etiva_5'] = "etiva_5";
   }
   else
   {
       $tab_def_campos['etiva_5'] = "";
   }
   $tab_labels["etiva_5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["etiva_5"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["etiva_5"] : "etiva_5";
   $tab_ger_campos['base5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['base5'] = "base5";
   }
   else
   {
       $tab_def_campos['base5'] = "";
   }
   $tab_labels["base5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["base5"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["base5"] : "base5";
   $tab_ger_campos['iva_5'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['iva_5'] = "iva_5";
   }
   else
   {
       $tab_def_campos['iva_5'] = "";
   }
   $tab_labels["iva_5"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["iva_5"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["iva_5"] : "iva_5";
   $tab_ger_campos['etexc_0'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['etexc_0'] = "etexc_0";
   }
   else
   {
       $tab_def_campos['etexc_0'] = "";
   }
   $tab_labels["etexc_0"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["etexc_0"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["etexc_0"] : "etexc_0";
   $tab_ger_campos['base0'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['base0'] = "base0";
   }
   else
   {
       $tab_def_campos['base0'] = "";
   }
   $tab_labels["base0"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["base0"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["base0"] : "base0";
   $tab_ger_campos['iva_0'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['iva_0'] = "iva_0";
   }
   else
   {
       $tab_def_campos['iva_0'] = "";
   }
   $tab_labels["iva_0"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["iva_0"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["iva_0"] : "iva_0";
   $tab_ger_campos['et_tot'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_tot'] = "et_tot";
   }
   else
   {
       $tab_def_campos['et_tot'] = "";
   }
   $tab_labels["et_tot"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_tot"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_tot"] : "et_tot";
   $tab_ger_campos['tot_base'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tot_base'] = "tot_base";
   }
   else
   {
       $tab_def_campos['tot_base'] = "";
   }
   $tab_labels["tot_base"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_base"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_base"] : "tot_base";
   $tab_ger_campos['tot_iva'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tot_iva'] = "tot_iva";
   }
   else
   {
       $tab_def_campos['tot_iva'] = "";
   }
   $tab_labels["tot_iva"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_iva"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_iva"] : "tot_iva";
   $tab_ger_campos['et20'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et20'] = "et20";
   }
   else
   {
       $tab_def_campos['et20'] = "";
   }
   $tab_labels["et20"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et20"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et20"] : "et20";
   $tab_ger_campos['et_vac'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_vac'] = "et_vac";
   }
   else
   {
       $tab_def_campos['et_vac'] = "";
   }
   $tab_labels["et_vac"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_vac"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_vac"] : "et_vac";
   $tab_ger_campos['et_ic'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_ic'] = "et_ic";
   }
   else
   {
       $tab_def_campos['et_ic'] = "";
   }
   $tab_labels["et_ic"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_ic"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_ic"] : "et_ic";
   $tab_ger_campos['imp_consumo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['imp_consumo'] = "imp_consumo";
   }
   else
   {
       $tab_def_campos['imp_consumo'] = "";
   }
   $tab_labels["imp_consumo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["imp_consumo"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["imp_consumo"] : "imp_consumo";
   $tab_ger_campos['et_ic_dev'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_ic_dev'] = "et_ic_dev";
   }
   else
   {
       $tab_def_campos['et_ic_dev'] = "";
   }
   $tab_labels["et_ic_dev"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_ic_dev"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_ic_dev"] : "et_ic_dev";
   $tab_ger_campos['imp_consumo_dev'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['imp_consumo_dev'] = "imp_consumo_dev";
   }
   else
   {
       $tab_def_campos['imp_consumo_dev'] = "";
   }
   $tab_labels["imp_consumo_dev"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["imp_consumo_dev"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["imp_consumo_dev"] : "imp_consumo_dev";
   $tab_ger_campos['et_tot_inc'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_tot_inc'] = "et_tot_inc";
   }
   else
   {
       $tab_def_campos['et_tot_inc'] = "";
   }
   $tab_labels["et_tot_inc"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_tot_inc"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_tot_inc"] : "et_tot_inc";
   $tab_ger_campos['tot_inc'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['tot_inc'] = "tot_inc";
   }
   else
   {
       $tab_def_campos['tot_inc'] = "";
   }
   $tab_labels["tot_inc"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_inc"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["tot_inc"] : "tot_inc";
   $tab_ger_campos['et_vn'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_vn'] = "et_vn";
   }
   else
   {
       $tab_def_campos['et_vn'] = "";
   }
   $tab_labels["et_vn"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_vn"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_vn"] : "et_vn";
   $tab_ger_campos['venta_netas'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['venta_netas'] = "venta_netas";
   }
   else
   {
       $tab_def_campos['venta_netas'] = "";
   }
   $tab_labels["venta_netas"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["venta_netas"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["venta_netas"] : "venta_netas";
   $tab_ger_campos['et_reg'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_reg'] = "et_reg";
   }
   else
   {
       $tab_def_campos['et_reg'] = "";
   }
   $tab_labels["et_reg"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_reg"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_reg"] : "et_reg";
   $tab_ger_campos['vent_reg'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['vent_reg'] = "vent_reg";
   }
   else
   {
       $tab_def_campos['vent_reg'] = "";
   }
   $tab_labels["vent_reg"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["vent_reg"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["vent_reg"] : "vent_reg";
   $tab_ger_campos['fac_anuladas'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['fac_anuladas'] = "fac_anuladas";
   }
   else
   {
       $tab_def_campos['fac_anuladas'] = "";
   }
   $tab_labels["fac_anuladas"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["fac_anuladas"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["fac_anuladas"] : "fac_anuladas";
   $tab_ger_campos['f_anul'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['f_anul'] = "f_anul";
   }
   else
   {
       $tab_def_campos['f_anul'] = "";
   }
   $tab_labels["f_anul"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["f_anul"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["f_anul"] : "f_anul";
   $tab_ger_campos['et_obs'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_obs'] = "et_obs";
   }
   else
   {
       $tab_def_campos['et_obs'] = "";
   }
   $tab_labels["et_obs"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_obs"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_obs"] : "et_obs";
   $tab_ger_campos['obs'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['obs'] = "obs";
   }
   else
   {
       $tab_def_campos['obs'] = "";
   }
   $tab_labels["obs"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["obs"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["obs"] : "obs";
   $tab_ger_campos['et_fech_imp'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_fech_imp'] = "et_fech_imp";
   }
   else
   {
       $tab_def_campos['et_fech_imp'] = "";
   }
   $tab_labels["et_fech_imp"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_fech_imp"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_fech_imp"] : "et_fech_imp";
   $tab_ger_campos['fecha_imp'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['fecha_imp'] = "fecha_imp";
   }
   else
   {
       $tab_def_campos['fecha_imp'] = "";
   }
   $tab_labels["fecha_imp"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["fecha_imp"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["fecha_imp"] : "fecha_imp";
   $tab_ger_campos['et_ubic'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_ubic'] = "et_ubic";
   }
   else
   {
       $tab_def_campos['et_ubic'] = "";
   }
   $tab_labels["et_ubic"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_ubic"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_ubic"] : "et_ubic";
   $tab_ger_campos['ubicacion'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['ubicacion'] = "ubicacion";
   }
   else
   {
       $tab_def_campos['ubicacion'] = "";
   }
   $tab_labels["ubicacion"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["ubicacion"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["ubicacion"] : "ubicacion";
   $tab_ger_campos['et_equipo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_equipo'] = "et_equipo";
   }
   else
   {
       $tab_def_campos['et_equipo'] = "";
   }
   $tab_labels["et_equipo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_equipo"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_equipo"] : "et_equipo";
   $tab_ger_campos['nom_equipo'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['nom_equipo'] = "nom_equipo";
   }
   else
   {
       $tab_def_campos['nom_equipo'] = "";
   }
   $tab_labels["nom_equipo"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["nom_equipo"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["nom_equipo"] : "nom_equipo";
   $tab_ger_campos['et_serial'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_serial'] = "et_serial";
   }
   else
   {
       $tab_def_campos['et_serial'] = "";
   }
   $tab_labels["et_serial"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_serial"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_serial"] : "et_serial";
   $tab_ger_campos['serial'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['serial'] = "serial";
   }
   else
   {
       $tab_def_campos['serial'] = "";
   }
   $tab_labels["serial"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["serial"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["serial"] : "serial";
   $tab_ger_campos['et_fin2'] = "on";
   if ($use_alias == "S")
   {
       $tab_def_campos['et_fin2'] = "et_fin2";
   }
   else
   {
       $tab_def_campos['et_fin2'] = "";
   }
   $tab_labels["et_fin2"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_fin2"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['labels']["et_fin2"] : "et_fin2";
   $tab_ger_campos['nom_docu'] = "none";
   $tab_ger_campos['nom_empresa'] = "none";
   $tab_ger_campos['direccion'] = "none";
   $tab_ger_campos['correo'] = "none";
   $tab_ger_campos['telefono'] = "none";
   $tab_ger_campos['et1'] = "none";
   $tab_ger_campos['res'] = "none";
   $tab_ger_campos['et2'] = "none";
   $tab_ger_campos['documento'] = "none";
   $tab_ger_campos['et3'] = "none";
   $tab_ger_campos['rango'] = "none";
   $tab_ger_campos['et4'] = "none";
   $tab_ger_campos['cant_fact'] = "none";
   $tab_ger_campos['et5'] = "none";
   $tab_ger_campos['total'] = "none";
   $tab_ger_campos['et6'] = "none";
   $tab_ger_campos['et7'] = "none";
   $tab_ger_campos['et8'] = "none";
   $tab_ger_campos['et9'] = "none";
   $tab_ger_campos['can_efec'] = "none";
   $tab_ger_campos['med_efec'] = "none";
   $tab_ger_campos['porc_efec'] = "none";
   $tab_ger_campos['tot_efec'] = "none";
   $tab_ger_campos['c_tarj'] = "none";
   $tab_ger_campos['med_tarj'] = "none";
   $tab_ger_campos['porc_tarj'] = "none";
   $tab_ger_campos['tarjeta'] = "none";
   $tab_ger_campos['c_cheq'] = "none";
   $tab_ger_campos['med_cheq'] = "none";
   $tab_ger_campos['porc_cheq'] = "none";
   $tab_ger_campos['cheque'] = "none";
   $tab_ger_campos['c_credito'] = "none";
   $tab_ger_campos['med_cred'] = "none";
   $tab_ger_campos['porc_credito'] = "none";
   $tab_ger_campos['credito'] = "none";
   $tab_ger_campos['et10'] = "none";
   $tab_ger_campos['total_vtas'] = "none";
   $tab_ger_campos['et_iva'] = "none";
   $tab_ger_campos['et_base'] = "none";
   $tab_ger_campos['et_val_iva'] = "none";
   $tab_ger_campos['etiva_19'] = "none";
   $tab_ger_campos['base19'] = "none";
   $tab_ger_campos['iva_19'] = "none";
   $tab_ger_campos['etiva_5'] = "none";
   $tab_ger_campos['base5'] = "none";
   $tab_ger_campos['iva_5'] = "none";
   $tab_ger_campos['etexc_0'] = "none";
   $tab_ger_campos['base0'] = "none";
   $tab_ger_campos['iva_0'] = "none";
   $tab_ger_campos['et_tot'] = "none";
   $tab_ger_campos['tot_base'] = "none";
   $tab_ger_campos['tot_iva'] = "none";
   $tab_ger_campos['et20'] = "none";
   $tab_ger_campos['et_vac'] = "none";
   $tab_ger_campos['et_ic'] = "none";
   $tab_ger_campos['imp_consumo'] = "none";
   $tab_ger_campos['et_ic_dev'] = "none";
   $tab_ger_campos['imp_consumo_dev'] = "none";
   $tab_ger_campos['et_tot_inc'] = "none";
   $tab_ger_campos['tot_inc'] = "none";
   $tab_ger_campos['et_vn'] = "none";
   $tab_ger_campos['venta_netas'] = "none";
   $tab_ger_campos['et_reg'] = "none";
   $tab_ger_campos['vent_reg'] = "none";
   $tab_ger_campos['fac_anuladas'] = "none";
   $tab_ger_campos['f_anul'] = "none";
   $tab_ger_campos['et_obs'] = "none";
   $tab_ger_campos['obs'] = "none";
   $tab_ger_campos['et_fech_imp'] = "none";
   $tab_ger_campos['fecha_imp'] = "none";
   $tab_ger_campos['et_ubic'] = "none";
   $tab_ger_campos['ubicacion'] = "none";
   $tab_ger_campos['et_equipo'] = "none";
   $tab_ger_campos['nom_equipo'] = "none";
   $tab_ger_campos['et_serial'] = "none";
   $tab_ger_campos['serial'] = "none";
   $tab_ger_campos['et_fin2'] = "none";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja_020521']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja_020521']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja_020521']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select'] = array();
   }
   
   if ($fsel_ok == "cmp" && !$this->restore)
   {
       $this->Sel_processa_out_sel($campos_sel);
   }
   else
   {
       if ($embbed)
       {
           ob_start();
           $this->Sel_processa_form();
           $Temp = ob_get_clean();
           echo NM_charset_to_utf8($Temp);
       }
       else
       {
           if ($this->restore)
           {
               ob_start();
           }
           $this->Sel_processa_form();
       }
   }
   exit;
   
}
function Sel_processa_out_sel($campos_sel)
{
   global $tab_ger_campos, $sc_init, $tab_def_campos, $embbed;
   $arr_temp = array();
   $campos_sel = explode("@?@", $campos_sel);
   $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_def_campos[$campo]))
       {
           $Ordem_tem_quebra = false;
           if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_quebra']))
           {
               foreach($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_quebra'] as $campo_quebra => $resto) 
               {
                   foreach($resto as $sqldef => $ordem_ant) 
                   {
                       if ($sqldef == $tab_def_campos[$campo]) 
                       { 
                           $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_quebra'][$campo][$sqldef] = $ordem;
                           $Ordem_tem_quebra = true;
                       }   
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select'][$tab_def_campos[$campo]] = $ordem;
           }   
       }
   }
?>
    <script language="javascript"> 
<?php
   if (!$embbed)
   {
?>
      self.parent.tb_remove(); 
      parent.nm_gp_submit_ajax('inicio', ''); 
<?php
   }
   else
   {
?>
      nm_gp_submit_ajax('inicio', ''); 
<?php
   }
?>
   </script>
<?php
}
   
function Sel_processa_form()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_labels, $embbed, $tbar_pos;
   $size = 10;
   $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
   foreach ($this->Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
      {
          $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
          $this->Nm_lang[$ind] = $dados;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
   include("../_lib/css/" . $str_schema_all . "_grid.php");
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
   if (!$embbed)
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Nm_lang['lang_othr_grid_titl'] ?> - </TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" /> 
 <?php
 if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts'] ?>" />
 <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
</HEAD>
<BODY class="scGridPage" style="margin: 0px; overflow-x: hidden">
<script language="javascript" type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
<?php
   }
?>
<script language="javascript"> 
<?php
if ($embbed)
{
?>
  function scSubmitOrderCampos(sPos, sType) {
    $("#id_fsel_ok_sel_ord").val(sType);
    if(sType == 'cmp')
    {
       scPackSelectedOrd();
    }
   return new Promise(function(resolve, reject) {$.ajax({
    type: "POST",
    url: "grid_reporte_caja_020521_order_campos.php",
    data: {
     script_case_init: $("#id_script_case_init_sel_ord").val(),
     path_img: $("#id_path_img_sel_ord").val(),
     path_btn: $("#id_path_btn_sel_ord").val(),
     use_alias: $("#id_use_alias").val(),
     campos_sel: $("#id_campos_sel_sel_ord").val(),
     sel_regra: $("#id_sel_regra_sel_ord").val(),
     fsel_ok: $("#id_fsel_ok_sel_ord").val(),
     embbed_groupby: 'Y'
    }
   }).done(function(data) {
    scBtnOrderCamposHide(sPos);
    buttonunselectedOF();
    $("#sc_id_order_campos_placeholder_" + sPos).find("td").html("");
    var execString = data.toString().replace(/(\<.*?\>)/g, '');
    eval(execString).then(function(){resolve()});
   });});
  }
<?php
}
?>
 // Submeter o formularior
 //-------------------------------------
 function submit_form_Fsel_ord()
 {
     scPackSelectedOrd();
      buttonunselectedOF();
      document.Fsel_ord.submit();
 }
 function scPackSelectedOrd() {
  var fieldList, fieldName, i, selectedFields = new Array;
 fieldList = $("#sc_id_fldord_selected").sortable("toArray");
 for (i = 0; i < fieldList.length; i++) {
  fieldName  = fieldList[i].substr(14);
  selectedFields.push($("#sc_id_class_" + fieldName).val() + fieldName);
 }
 $("#id_campos_sel_sel_ord").val( selectedFields.join("@?@") );
 }
 </script>
<FORM name="Fsel_ord" method="POST">
  <INPUT type="hidden" name="script_case_init"    id="id_script_case_init_sel_ord"    value="<?php echo NM_encode_input($sc_init); ?>"> 
  <INPUT type="hidden" name="path_img"            id="id_path_img_sel_ord"            value="<?php echo NM_encode_input($path_img); ?>"> 
  <INPUT type="hidden" name="path_btn"            id="id_path_btn_sel_ord"            value="<?php echo NM_encode_input($path_btn); ?>"> 
  <INPUT type="hidden" name="use_alias"           id="id_use_alias"                   value="<?php echo NM_encode_input($use_alias); ?>"> 
  <INPUT type="hidden" name="fsel_ok"             id="id_fsel_ok_sel_ord"             value=""> 
<?php
if ($embbed)
{
    echo "<div class='scAppDivMoldura'>";
    echo "<table id=\"main_table\" style=\"width: 100%\" cellspacing=0 cellpadding=0>";
}
elseif ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px\">";
}
?>
<?php
if (!$embbed)
{
?>
<tr>
<td>
<div class="scGridBorder">
<table width='100%' cellspacing=0 cellpadding=0>
<?php
}
$disp_rest = "none";
?>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivHeader scAppDivHeaderText':'scGridLabelVert'; ?>">
   <?php echo $this->Nm_lang['lang_btns_sort_hint']; ?>
  </td>
 </tr>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivContent css_scAppDivContentText':'scGridTabelaTd'; ?>">
   <table class="<?php echo ($embbed)? '':'scGridTabela'; ?>" style="border-width: 0; border-collapse: collapse; width:100%;" cellspacing=0 cellpadding=0>
    <tr class="<?php echo ($embbed)? '':'scGridFieldOddVert'; ?>">
     <td style="vertical-align: top">
     <table>
   <tr><td style="vertical-align: top">
 <script language="javascript" type="text/javascript">
  $(function() {
   $(".sc_ui_litem").mouseover(function() {
    $(this).css("cursor", "all-scroll");
   });
   $("#sc_id_fldord_available").sortable({
    connectWith: ".sc_ui_fldord_selected",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).show();
     $('#f_sel_sub').css('display', 'inline-block');
    }
   }).disableSelection();
   $("#sc_id_fldord_selected").sortable({
    connectWith: ".sc_ui_fldord_available",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).hide();
     $('#f_sel_sub').css('display', 'inline-block');
     display_btn_restore_ord();
    },
    change: function( event, ui ) {
     $('#f_sel_sub').css('display', 'inline-block');
      display_btn_restore_ord();
    },
    receive: function( event, ui ) {
     $('#f_sel_sub').css('display', 'inline-block');
     display_btn_restore_ord();
    }
   });
   scUpdateListHeight();
  });
  function scUpdateListHeight() {
   $("#sc_id_fldord_available").css("min-height", "<?php echo sizeof($tab_ger_campos) * 26 ?>px");
   $("#sc_id_fldord_selected").css("min-height", "<?php echo sizeof($tab_ger_campos) * 26 ?>px");
  }
 </script>
 <style type="text/css">
  .sc_ui_sortable_ord {
   list-style-type: none;
   margin: 0;
   min-width: 120px;
  }
  .sc_ui_sortable_ord li {
   margin: 0 3px 3px 3px;
   padding: 1px 3px 1px 15px;
   min-height: 18px;
  }
  .sc_ui_sortable_ord li span {
   position: absolute;
   margin-left: -1.3em;
  }
 </style>
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_available scAppDivSelectFields" id="sc_id_fldord_available">
<?php
   if ($this->restore) {
        ob_end_clean();
        ob_start();
   }
   $arr_order = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select_orig'] : $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select'];
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (!isset($arr_order[$tab_def_campos[$NM_cada_field]]))
           {
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo NM_encode_input($NM_cada_field); ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($NM_cada_field); ?>" class="scAppDivToolbarInput" style="display: none" onchange="display_btn_restore_ord();">
       <option value="+">Asc</option>
       <option value="-">Desc</option>
      </select><br/>
     </li>
<?php
           }
       }
   }
   if ($this->restore) {
       $this->Arr_result['fldord_available'] = NM_charset_to_utf8(ob_get_clean());
   }
?>
    </ul>
   </td>
   <td style="vertical-align: top">
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_selected scAppDivSelectFields" id="sc_id_fldord_selected">
<?php
   if ($this->restore) {
       ob_end_clean();
       ob_start();
   }
   $arr_order = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select_orig'] : $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select'];
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (isset($arr_order[$tab_def_campos[$NM_cada_field]]))
           {
               $sAscSelected  = " selected";
               $sDescSelected = "";
               if ($arr_order[$tab_def_campos[$NM_cada_field]] == "desc")
               {
                   $sAscSelected  = "";
                   $sDescSelected = " selected";
               }
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo $NM_cada_field; ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($NM_cada_field); ?>" class="scAppDivToolbarInput" onchange="$('#f_sel_sub').css('display', 'inline-block');display_btn_restore_ord();">
       <option value="+"<?php echo $sAscSelected; ?>>Asc</option>
       <option value="-"<?php echo $sDescSelected; ?>>Desc</option>
      </select>
     </li>
<?php
          }
       }
   }
   if ($this->restore) {
       $this->Arr_result['fldord_selected'] = NM_charset_to_utf8(ob_get_clean());
       $oJson = new Services_JSON();
       echo $oJson->encode($this->Arr_result);
       exit;
   }
?>
    </ul>
    <input type="hidden" name="campos_sel" id="id_campos_sel_sel_ord" value="">
   </td>
   </tr>
   </table>
   </td>
   </tr>
   </table>
  </td>
 </tr>
   <tr><td class="<?php echo ($embbed)? 'scAppDivToolbar':'scGridToolbar'; ?>">
<?php
  if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select']) && $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select'] != $_SESSION['sc_session'][$sc_init]['grid_reporte_caja_020521']['ordem_select_orig']) {
      $disp_rest = "";
  }
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok_appdiv", "document.Fsel_ord.fsel_ok.value='cmp';proc_btn_ord('f_sel_sub','submit_form_Fsel_ord()')", "document.Fsel_ord.fsel_ok.value='cmp';proc_btn_ord('f_sel_sub','submit_form_Fsel_ord()')", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "proc_btn_ord('f_sel_sub','scSubmitOrderCampos(\\'" . NM_encode_input($tbar_pos) . "\\', \\'cmp\\')')", "proc_btn_ord('f_sel_sub','scSubmitOrderCampos(\\'" . NM_encode_input($tbar_pos) . "\\', \\'cmp\\')')", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_ord('Brestore_ord','restore_ord()')", "proc_btn_ord('Brestore_ord','restore_ord()')", "Brestore_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_ord('Brestore_ord','restore_ord()')", "proc_btn_ord('Brestore_ord','restore_ord()')", "Brestore_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove(); buttonunselectedOF();", "self.parent.tb_remove(); buttonunselectedOF();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   elseif ($_SESSION['scriptcase']['proc_mobile'])
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "closeAllModalPanes();", "closeAllModalPanes();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
   </td>
   </tr>
<?php
if (!$embbed)
{
?>
</table>
</div>
</td>
</tr>
<?php
}
?>
</table>
<?php
if ($embbed)
{
?>
    </div>
<?php
}
?>
</FORM>
<script language="javascript"> 
function buttonDisable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", true).addClass("disabled");
}
function buttonEnable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", false).removeClass("disabled");
}
function restore_ord() {
    $.ajax({
        type: 'POST',
        url: "grid_reporte_caja_020521_order_campos.php",
        data: {
           script_case_init: $("#id_script_case_init_sel_ord").val(),
           restore: 'ok',
        }
    })
    .done(function(retcombos) {
       eval("Combos = " + retcombos);
       $("#sc_id_fldord_available").html(Combos["fldord_available"]);
       $("#sc_id_fldord_selected").html(Combos["fldord_selected"]);
       buttonDisable_ord("Brestore_ord");
       buttonEnable_ord("f_sel_sub");
       $('#f_sel_sub').css('display', 'inline-block');
    });
}
function buttonSelectedOF() {
   $("#ordcmp_top").addClass("selected");
   $("#ordcmp_bottom").addClass("selected");
}
function buttonunselectedOF() {
   $("#ordcmp_top").removeClass("selected");
   $("#ordcmp_bottom").removeClass("selected");
}
function display_btn_restore_ord() {
    buttonEnable_ord("Brestore_ord");
    buttonEnable_ord("f_sel_sub");
}
function proc_btn_ord(btn, proc) {
    if (
        (document.Fsel_ord.fsel_ok.value != 'regra' && $("#" + btn).prop("disabled") == true) || 
        (document.Fsel_ord.fsel_ok.value == 'regra' && $("#id_sel_regra_sel_ord").val() == '')
    )
    {
        return;
    }
    eval (proc);
}
$( document ).ready(function() {
   buttonDisable_ord("f_sel_sub");
   buttonSelectedOF();
<?php
   if ($disp_rest == "none") {
?>
   buttonDisable_ord("Brestore_ord");
<?php
   }
?>
});
var bFixed = false;
function ajusta_window_Fsel_ord()
{
<?php
   if ($embbed)
   {
?>
  return false;
<?php
   }
?>
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window_Fsel_ord()", 50);
    return;
  }
  else if(!bFixed)
  {
    var oOrig = $(document.Fsel_ord.sel_orig),
        oDest = $(document.Fsel_ord.sel_dest),
        mHeight = Math.max(oOrig.height(), oDest.height()),
        mWidth = Math.max(oOrig.width() + 5, oDest.width() + 5);
    oOrig.height(mHeight);
    oOrig.width(mWidth);
    oDest.height(mHeight);
    oDest.width(mWidth + 15);
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
      self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
      setTimeout("ajusta_window_Fsel_ord()", 50);
      return;
    }
  }
  strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
  self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
}
$( document ).ready(function() {
   ajusta_window_Fsel_ord();
});
</script>
<script>
    ajusta_window_Fsel_ord();
</script>
</BODY>
</HTML>
<?php
}
}
