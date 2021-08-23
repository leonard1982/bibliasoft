<?php

class grid_cloud_kardex_regenerar_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_cloud_kardex_regenerar']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_cloud_kardex_regenerar']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha_validacion = $Busca_temp['fecha_validacion']; 
          $tmp_pos = strpos($this->fecha_validacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_validacion))
          {
              $this->fecha_validacion = substr($this->fecha_validacion, 0, $tmp_pos);
          }
          $fecha_validacion_2 = $Busca_temp['fecha_validacion_input_2']; 
          $this->fecha_validacion_2 = $Busca_temp['fecha_validacion_input_2']; 
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->prefijo = $Busca_temp['prefijo']; 
          $tmp_pos = strpos($this->prefijo, "##@@");
          if ($tmp_pos !== false && !is_array($this->prefijo))
          {
              $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_kardex_regenerar']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function fCrearQR($vnombrearchivo,$vcontenido='Prueba qr',$vdirectorio='',$vmargin=0,$vtamanio=2,$vcalidad=20)
	{
$_SESSION['scriptcase']['grid_cloud_kardex_regenerar']['contr_erro'] = 'on';
if (!isset($_SESSION['gidempresa'])) {$_SESSION['gidempresa'] = "";}
if (!isset($this->sc_temp_gidempresa)) {$this->sc_temp_gidempresa = (isset($_SESSION['gidempresa'])) ? $_SESSION['gidempresa'] : "";}
  
		sc_include_library("prj", "qr", "qrlib.php", true, true);

		$tempDir       = $vdirectorio;
		$fileName      = $vnombrearchivo;
		$outerFrame    = $vmargin;
		$pixelPerPoint = $vtamanio;
		$jpegQuality   = $vcalidad;
		$codeContents  = $vcontenido;

		$frame = QRcode::text($codeContents, false, QR_ECLEVEL_M);

		$h = count($frame);
		$w = strlen($frame[0]);

		$imgW = $w + 2*$outerFrame;
		$imgH = $h + 2*$outerFrame;

		$base_image = imagecreate($imgW, $imgH);

		$col[0] = imagecolorallocate($base_image,255,255,255); 
		$col[1] = imagecolorallocate($base_image,0,0,0);     

		imagefill($base_image, 0, 0, $col[0]);

		for($y=0; $y<$h; $y++) {
			for($x=0; $x<$w; $x++) {
				if ($frame[$y][$x] == '1') {
					imagesetpixel($base_image,$x+$outerFrame,$y+$outerFrame,$col[1]); 
				}
			}
		}

		$target_image = imagecreate($imgW * $pixelPerPoint, $imgH * $pixelPerPoint);
		imagecopyresized(
			$target_image, 
			$base_image, 
			0, 0, 0, 0, 
			$imgW * $pixelPerPoint, $imgH * $pixelPerPoint, $imgW, $imgH
		);
		imagedestroy($base_image);
		imagejpeg($target_image, $tempDir.$fileName, $jpegQuality);
		imagedestroy($target_image);
		
		$vnombre_pc_red = "";
		$vsql = "select nombre_pc_red from cloud_empresas where id_empresa='".$this->sc_temp_gidempresa."'";
		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNPC = array();
      $this->vnpc = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vNPC[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnpc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNPC = false;
          $this->vNPC_erro = $this->Db->ErrorMsg();
          $this->vnpc = false;
          $this->vnpc_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->vnpc[0][0]))
		{
			$vnombre_pc_red = $this->vnpc[0][0];
		}

		if(file_exists($tempDir.$fileName))
		{
			if(!empty($vnombre_pc_red))
			{
				$vrutaqr3 = '\\\\'.$vnombre_pc_red.'\\qr\\'.$this->numero_fe .'.jpg';
				$vsql_update = "update kardex set sn_rutaqr='".$vrutaqr3."' where codcomp='".$this->tipo ."' and codprefijo='".$this->prefijo ."' and numero='".$this->numero ."'";
				
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;
				echo "QR DEL DOCUMENTO: ".$this->numero_fe ." FUE ACTUALIZADO EN LA BASE DE DATOS.<BR>";
			}
			else
			{
				echo "NO HAY NOMBRE DE PC.<BR>";
			}
			echo "QR DEL DOCUMENTO: ".$this->numero_fe ." FUE GENERADO.<BR><hr>";
		}
		else
		{
			echo "QR DEL DOCUMENTO: ".$this->numero_fe ." NO FUE CREADO.<BR><hr>";
		}
if (isset($this->sc_temp_gidempresa)) {$_SESSION['gidempresa'] = $this->sc_temp_gidempresa;}
$_SESSION['scriptcase']['grid_cloud_kardex_regenerar']['contr_erro'] = 'off';
}
}

?>
