<?php
//__NM__para conectarse externamente a una base de datos mysql__NM__FUNCTION__NM__//
define("vserver_nube", "www.solucionesnavarro.net");
define("vusuario_nube", "solunava_soluweb");
define("vpassword_nube", "_leo88261176");
define("vbd_nube", "nube_facilweb");

function checkPuerto2($dominio,$puerto)
{
    
    $starttime = microtime(true);
    $file      = @fsockopen ($dominio, $puerto, $errno, $errstr, 3);
    $stoptime  = microtime(true);
    $status    = 0;
  
    if (!$file){    
        $status = -1;  // Sitio caído
    } else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
     
    if ($status <> -1) {
        return true;
    } else {
        return false;
    }
     
}

function checkPuerto($dominio,$puerto)
{
    
    $starttime = microtime(true);
    $file      = @fsockopen ($dominio, $puerto, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;
  
    if (!$file){    
        $status = -1;  // Sitio caído
    } else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
     
    if ($status <> -1) {
        return true;
    } else {
        return false;
    }
     
}

class dbMysql{

	private $conexion;
	private $servidor;
	private $usuario;
	private $password;
	private $puerto;
	private $db;
	private $resultado;
	
	public function __construct($servidor,$usuario,$password,$db,$puerto=3306){

		$this->servidor=$servidor;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->db=$db;
		$this->puerto=$puerto;
		$this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->password,$this->db,$this->puerto);
		$this->conexion->set_charset('utf8');
	}
	
	public function consulta($sql){
		
		return $this->resultado = mysqli_query($this->conexion,$sql);

	}	
	
	public function __destruct(){

		$this->conexion->close();
	}
}

class dbMysql2{

	private $conexion;
	private $servidor;
	private $usuario;
	private $password;
	private $puerto;
	private $db;
	private $resultado;
	private $arreglo;
	private $contador;
	private $consultar;
	private $columnas;
	private $registros;
	private $tipo_retorno;//para saber si el tipo de retorno es array o json o xml
	private $siconexion;
	
	
	public function __construct($servidor,$usuario,$password,$db,$puerto=3306,$tipo_retorno='array'){
		//iniciamos el buffer
		ob_start();
		
		//tomamos las variables
		$this->siconexion = false;
		$this->servidor=$servidor;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->db=$db;
		$this->puerto=$puerto;
		$this->tipo_retorno = $tipo_retorno;
		if($this->conexion = mysqli_connect($this->servidor, $this->usuario,$this->password,$this->db,$this->puerto))
		{
			$this->conexion->set_charset('utf8');
			$this->siconexion = true;
		}
		else
		{//si falló la conexion almacenamos el buffer y limpiamos
			
			$output = ob_get_contents();
			ob_end_clean();
			
			echo json_encode(
				
				array(
					'error'=>'No se pudo conectar al servidor.',
					'datos'=>'',
					'ncolumnas'=>'0',
					'nregistros'=>'0'
					 
				)
			);
		}
	}
	
	public function consulta($sql){
		
		if($this->siconexion)
		{
			$this->consultar = mysqli_query($this->conexion,$sql);
			$this->contador  = 0;

			while($this->resultado = mysqli_fetch_array($this->consultar))
			{
				$columnas = count($this->resultado);
				$columnas = ($columnas/2);

				//tomamos la cantidad de columnas de la consulta
				if($this->contador==0)
				{
					$this->columnas = $columnas;
				}

				for($i=0;$i<$columnas;$i++)
				{
					if(isset($this->resultado[$i]))
					{
						$this->arreglo[$this->contador][$i] =  $this->resultado[$i];
					}
					else
					{
						$this->arreglo[$this->contador][$i] =  '';
					}
				}
				$this->contador++;
			}

			$this->registros = $this->contador;

			switch($this->tipo_retorno)
			{
				case 'json':
					return json_encode(

						array(
							'datos'=>$this->arreglo,
							'ncolumnas'=>$this->columnas,
							'nregistros'=>$this->registros
						)
					);
				break;

				case 'array':
					return $this->arreglo;
				break;

				case 'xml':

				break;
			}
		}
	}	
	
	public function __destruct(){
		
		if($this->siconexion)
		{
			$this->conexion->close();
		}
	}
}

class dbFirebirdPDO{

	private $conexion;
	private $servidor;
	private $db;
	private $resultado;
	
	public function __construct($servidor,$db){

		$this->servidor = $servidor;
		$this->db       = $db;
		$this->conexion = new PDO("firebird:dbname=".$this->servidor.":".$db, "SYSDBA", "masterkey");
	}
	
	public function consulta($sql){
		
		return $this->resultado = $this->conexion->query($sql);

	}	
	
	public function __destruct(){

	}
}

class dbSqlite{

	private $ruta;
	private $conexion;
	private $idConsulta;
	
	public function __construct($ruta){
		$this->ruta=$ruta;
		$this->conexion=sqlite_open($ruta,'777',$error);
		if (!$this->$conexion)die($error);
	}
	public function consulta($query){
		$this->idConsulta=sqlite_query($this->conexion,$query);	
	}	
	public function arrayConsulta(){
		return sqlite_fetch_array($this->idConsulta);
	}
	public function consultarArray($ruta,$query){
		return sqlite_array_query($ruta,$query,SQLITE_ASSOC);
	}
}

class dbFirebird{

	private $servidor;
	private $usuario;
	private $password;
	private $ruta;
	private $conexion;
	private $idConsulta;
	
	public function __construct($ruta){

		$this->servidor = "localhost";
		$this->usuario  = "SYSDBA";
		$this->password = "masterkey";
		$this->ruta     = $ruta;
		
		$this->conexion = ibase_connect($this->servidor.":".$this->ruta,$this->usuario,$this->password);
	}
	public function consulta($query){
			return $this->idConsulta = ibase_query($this->conexion,$query);
	}
	
	public function consulta_retorno($query){
			return $this->idConsulta = ibase_prepare($this->conexion,$query) or die(ibase_errmsg());
	}
}

class dbFirebird2{

	private $servidor;
	private $usuario;
	private $password;
	private $ruta;
	private $conexion;
	private $idConsulta;
	
	public function __construct($ruta){

		$this->servidor = "localhost";
		$this->usuario  = "SYSDBA";
		$this->password = "masterkey";
		$this->ruta     = $ruta;
		
		$this->conexion = ibase_connect($this->servidor.":".$this->ruta,$this->usuario,$this->password);
	}
	public function consulta($query){
			return $this->idConsulta = ibase_query($this->conexion,$query);
	}
	
	public function consulta_retorno($query){
			return $this->idConsulta = ibase_prepare($this->conexion,$query) or die(ibase_errmsg());
	}
}
?>