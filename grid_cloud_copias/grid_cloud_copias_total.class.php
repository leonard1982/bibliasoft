<?php

class grid_cloud_copias_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_cloud_copias']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_cloud_copias']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_cloud_copias']['contr_total_geral'] = "OK";
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
function full_copy( $source, $target ) {
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                $this->full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function fGestionarFTP($rutaarchivo,$host,$port,$user,$password,$carpeta)
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  	
	$mensaje = "";
	
	try
	{
		if(is_readable($rutaarchivo))
		{
			$nombrearchivo = trim(basename($rutaarchivo).PHP_EOL);

			# Realizamos la conexion con el servidor
			$conn_id=@ftp_connect($host,$port);

			if($conn_id)
			{
				# Realizamos el login con nuestro usuario y contraseña
				if(@ftp_login($conn_id,$user,$password))
				{
					if (ftp_mkdir($conn_id, $carpeta)) 
					{
					} 
					else 
					{
					}
					
					# Cambiamos al directorio especificado
					if(@ftp_chdir($conn_id,$carpeta))
					{

						# Subimos el fichero
						if(@ftp_put($conn_id,$nombrearchivo,$rutaarchivo,FTP_ASCII))
						{
							$mensaje = "Fichero subido correctamente";
						}
						else
						{
							$mensaje = "No ha sido posible subir el fichero";
						}
						
					}
					else
					{
						$mensaje = "No existe el directorio especificado";
					}
				}
				else
				{
					$mensaje = "El usuario o la contraseña son incorrectos";
				}

				# Cerramos la conexion ftp
				ftp_close($conn_id);

			}
			else
			{
				$mensaje = "No ha sido posible conectar con el servidor";
			}
		}
		else
		{
		   $mensaje = "No existe o no es legible el archivo";
		}
		
		echo $mensaje." -- Cerre la ventana.";
		
		echo "<script>";
		echo "console.log('fGestionarFTP: ".$mensaje."');";
		echo "</script>";
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fGestionarFTP: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function ConectarFTP()
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
	define("SERVER","ftp.solucionesnavarro.com"); 
	define("PORT",21); 
	define("USER","p@gestionftpfacilweb.solucionesnavarro.com"); 
	define("PASSWORD",".facilweb2020"); 
	define("PASV",true); 
	
	$id_ftp=ftp_connect(SERVER,PORT); 
	ftp_login($id_ftp,USER,PASSWORD); 
	ftp_pasv($id_ftp,PASV); 
	return $id_ftp; 

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function SubirArchivo($archivo_local,$carpeta,$id_copia)
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
	$id_ftp=$this->ConectarFTP();
	
	$nombrearchivo = trim(basename($archivo_local).PHP_EOL);
	
	$directorios = ftp_nlist($id_ftp, "facilweb_fe");
	
	if(!in_array($carpeta,$directorios))
	{
		if (ftp_mkdir($id_ftp, 'facilweb_fe/'.$carpeta)) 
		{
			echo "Creado con exito ".$carpeta."<br>";
		} 
	}
	
	ftp_chdir($id_ftp,'facilweb_fe/'.$carpeta);
	ftp_put($id_ftp,$nombrearchivo,$archivo_local,FTP_BINARY);
	ftp_quit($id_ftp); 
	
	echo "Copia subida con éxito a la carpeta remota: facilweb_fe/".$carpeta."<br>";
	
	$vsql = "update cloud_copias set subida='SI' where id_copia='".$id_copia."'";
	
     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function ObtenerRuta(){
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP(); 
	$Directorio=ftp_pwd($id_ftp); 
	ftp_quit($id_ftp); 
	return $Directorio; 

$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
function fCopiasBD($ruta,$retorno=false)
{
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'on';
if (!isset($_SESSION['gidempresa'])) {$_SESSION['gidempresa'] = "";}
if (!isset($this->sc_temp_gidempresa)) {$this->sc_temp_gidempresa = (isset($_SESSION['gidempresa'])) ? $_SESSION['gidempresa'] : "";}
  
	try {
		$vruta = getcwd();
		
		if (!file_exists($ruta))
		{
			mkdir($ruta, 0777, true);
		}
		
		$vfecha  = date("Y-m-d H:i:s");
		$vfecha2 = date('Y-m-d');
		$vhora2  = date('H-i-s');
		$vnomcarpeta     = 'copia_facilweb_fe_fecha_'.$vfecha2.'_hora_'.$vhora2;
		if (!file_exists($vruta.'/copias/'.$vnomcarpeta))
		{
			mkdir($vruta.'/copias/'.$vnomcarpeta, 0777, true);
		}
		$vnomarchivo     = 'copia_facilweb_fe_fecha_'.$vfecha2.'_hora_'.$vhora2;
		$vnomarchivo_qr  = 'copia_facilweb_fe_fecha_qr_'.$vfecha2.'_hora_'.$vhora2.'.zip';
		$varchivocopia   = $ruta.'/'.$vnomcarpeta.'/'.$vnomarchivo.'.sql';
		
		$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port=3332 --user=root --password=.facilweb2020 --no-create-info --skip-triggers --extended-insert=true --complete-insert facilweb_cloud > "'.$varchivocopia.'"';
		
		shell_exec($vcmd);
		
		if(!is_dir($vruta.'/copias/'.$vnomcarpeta.'/qr'))
		{
			$source = $vruta.'/qr';
			$destination = $vruta.'/copias/'.$vnomcarpeta.'/qr';
			$this->full_copy($source, $destination);
		}
		
		if(!is_dir($vruta.'/copias/'.$vnomcarpeta.'/xmls'))
		{
			$source = $vruta.'/xmls';
			$destination = $vruta.'/copias/'.$vnomcarpeta.'/xmls';
			$this->full_copy($source, $destination);
		}
		
		$vnomcopia = $vruta.'/copias/'.$vnomcarpeta.'.zip';
		include_once($this->Ini->path_third . "/zipfile/zipfile.php");
$sc_Zip_files = new zipfile();
$sc_Zip_files->set_file($vnomcopia);
if (is_array($vruta.'/copias/'.$vnomcarpeta))
{
    foreach ($vruta.'/copias/'.$vnomcarpeta as $SC_cada_zip)
    {
        $sc_Zip_files->sc_zip_all($SC_cada_zip);
    }
}
else
{
    $sc_Zip_files->sc_zip_all($vruta.'/copias/'.$vnomcarpeta);
}
$sc_Zip_files->file();
;
		
		$vsql = "insert into cloud_copias set fecha='".$vfecha."',descripcion='".addslashes($vnomcopia)."',id_empresa='".$this->sc_temp_gidempresa."',nombre_archivo='".$vnomarchivo.".zip'";
		
		
     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		
		if($retorno)
		{
			return $varchivocopia;
		}
		
		unlink($vruta.'/copias/'.$vnomcarpeta.'/qr/*.*');
		rmdir($vruta.'/copias/'.$vnomcarpeta.'/qr');
		unlink($vruta.'/copias/'.$vnomcarpeta.'/xmls/*.*');
		rmdir($vruta.'/copias/'.$vnomcarpeta.'/xml');
		unlink($vruta.'/copias/'.$vnomcarpeta.'/*.*');
		rmdir($vruta.'/copias/'.$vnomcarpeta);
		
		echo "Copia finalizada con éxito!!!";
		
	} catch (Exception $e) {
		
	}
if (isset($this->sc_temp_gidempresa)) {$_SESSION['gidempresa'] = $this->sc_temp_gidempresa;}
$_SESSION['scriptcase']['grid_cloud_copias']['contr_erro'] = 'off';
}
}

?>
