<?php
//__NM__para consultar base de datos mysql, sqlite y firebird__NM__FUNCTION__NM__//
// Desactivar toda notificación de error
//error_reporting(0);

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
		$this->conexion = mysqli_connect($this->servidor.":".$this->puerto, $this->usuario, $this->password,$this->db);
	}
	
	public function consulta($sql){
		
		return $this->resultado = mysqli_query($this->conexion,$sql);

	}	
	
	public function consulta_multiple($sql){
		
		return $this->resultado = mysqli_multi_query($this->conexion,$sql);

	}
	
	public function __destruct(){

		$this->conexion->close();
	}
}

class dbSqlite{

	private $ruta;
	private $conexion;
	private $idConsulta;
	
	public function __construct($ruta){
		$this->ruta=$ruta;
		$this->conexion=sqlite_open($ruta,'777',$error);
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
	
	public function __construct($servidor,$usuario,$password,$ruta){

		$this->servidor=$servidor;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->ruta=$ruta;

		if(!($this->conexion = ibase_connect($this->servidor.":".$this->ruta,$this->usuario,$this->password))){

			die("No se pudo conectar al servidor de datos, intentelo mas tarde. ".  ibase_errmsg());
		}

	}
	public function consulta($query){

		return $this->idConsulta = ibase_query($this->conexion,$query);
	}
	
	public function consulta_retorno($query){

		return $this->idConsulta = ibase_prepare($this->conexion,$query) or die(ibase_errmsg());
	}
}
?>