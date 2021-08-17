<?php
//__NM__version 2 del webservice__NM__FUNCTION__NM__//
	class Extras {
    public $controlInterno1;
    public $controlInterno2;
    public $nombre;
    public $pdf;
    public $valor;
    public $xml;
   }
   // declaramos factura

   class FacturaGeneral
   {
   	
      public $cantidadDecimales;
	  public $cliente;	  
      public $consecutivoDocumento;
      public $documentosReferenciados = array();//es un array de tipo DocumentoReferenciado 
      public $detalleDeFactura = array();//es un array de tipo FacturaDetalle 
      public $fechaEmision;   
	  public $fechaVencimiento;
      public $impuestosGenerales = array();// almacenar todos los tipos de impuestos que estaran en la clase FacturaImpuestos
	  public $impuestosTotales = array();
      public $mediosDePago = array(); 
      public $moneda;
      public $redondeoAplicado;
      public $rangoNumeracion;
      public $tipoDocumento;
	  public $tipoOperacion;
      public $totalBaseImponible;
      public $totalBrutoConImpuesto;
	  public $totalMonto;
      public $totalProductos;
	  public $totalDescuentos;
      public $totalSinImpuestos;
	  public $cargosDescuentos;
	  public $informacionAdicional;
	  public $parametros = array();
	  
      public function __construct(){
        $this->cliente = new Cliente();	
      }
   }
   /*class FacturaGeneral
   {
   	
      public $cantidadDecimales;
	    public $cliente;	  
      public $consecutivoDocumento;
      public $documentosReferenciados = array();//es un array de tipo DocumentoReferenciado 
      public $detalleDeFactura = array();//es un array de tipo FacturaDetalle 
      public $fechaEmision;    
      public $impuestosGenerales = array();// almacenar todos los tipos de impuestos que estaran en la clase FacturaImpuestos
	  public $impuestosTotales = array();
      public $mediosDePago = array(); 
      public $moneda;
      public $redondeoAplicado;
      public $rangoNumeracion;
      public $tipoDocumento;
	  public $tipoOperacion;
      public $totalBaseImponible;
      public $totalBrutoConImpuesto;
	  public $totalMonto;
      public $totalProductos;
	  public $totalDescuentos;
      public $totalSinImpuestos;
	  
      public function __construct(){
        $this->cliente = new Cliente();	
      }
   }*/

	//cargosDescuentos
   class cargosDescuentos
   {
	   public $codigo;
	   public $descripcion;
	   public $extra = array();
	   public $indicador;
	   public $monto;
	   public $montoBase;
	   public $porcentaje;
	   public $secuencia;
   }
   
   //extras
   class extra
   {
   		public $controlInterno1;
		public $controlInterno2;
		public $nombre;
		public $valor;
   }
    
   // declaramos la clase 
   class Cliente
   {
       public $actividadEconomicaCIIU;
       public $destinatario = array();
       public $detallesTributarios = array();
       public $direccionFiscal;
       public $email;
       public $informacionLegalCliente;
       public $nombreRazonSocial;
       public $notificar;
       public $numeroDocumento;
       public $numeroIdentificacionDV;
       public $responsabilidadesRut = array();
       public $tipoIdentificacion;
       public $tipoPersona;    
	   public $telefono;
	   public $direccionCliente;
   }
   
   
   class Destinatario
   {
   	
		public $canalDeEntrega;
		public $email = array();
		public $nitProveedorReceptor;
		public $telefono;
	
   }
   
   class strings 
   {   		
   		public $string;	
   }
   
   class Tributos
   {
   		public $codigoImpuesto;	
      public $extras = array();
   }
   
   class Direccion
   {
   		public $aCuidadoDe;
		public $aLaAtencionDe;
		public $bloque;
		public $buzon;
		public $calle;
		public $calleAdicional;
		public $ciudad;
		public $codigoDepartamento;
		public $correccionHusoHorario;
		public $departamento;
		public $departamentoOrg;
		public $direccion;
		public $distrito;
		public $habitacion;
		public $lenguaje;
		public $municipio;
		public $nombreEdificio;
		public $numeroParcela;
		public $pais;
		public $piso;
		public $region;
		public $subDivision;
		public $ubicacion;
		public $zonaPostal;
   }
   
   class InformacionLegalCliente
   {
   		public $codigoEstablecimiento;
		public $nombreRegistroRUT;
		public $numeroIdentificacion;
		public $numeroIdentificacionDV;
		public $tipoIdentificacion;
   }
   
   class Obligaciones
   {
   		public $obligaciones;
		public $regimen;
   }
    
   class FacturaDetalle 
   {
      	public $cantidadPorEmpaque;
		public $cantidadReal;
		public $cantidadRealUnidadMedida;
		public $cantidadUnidades;
		public $codigoProducto;	
		public $descripcion;
		public $descripcionTecnica;
    	public $documentosReferenciados = array();//es un array de tipo DocumentoReferenciado 
		public $estandarCodigo;
		public $estandarCodigoProducto;
		public $impuestosDetalles = array();
		public $impuestosTotales = array();
		public $marca;
		public $muestraGratis;
		public $precioTotal;
		public $precioTotalSinImpuestos;
		public $precioVentaUnitario;
		public $secuencia;
		public $unidadMedida;
	    public $seriales;
	    public $mandatorioNumeroIdentificacion;
	    public $mandatorioNumeroIdentificacionDV;
	    public $mandatorioTipoIdentificacion;
	    public $nota;
	   	public $tax_rate;
	    public $tax_amount;
   }
   
   
   class FacturaImpuestos
   {
		public $baseImponibleTOTALImp;
		public $codigoTOTALImp;
		public $controlInterno;
		public $porcentajeTOTALImp;
		public $unidadMedida;
		public $unidadMedidaTributo;
	    public $valorTOTALImp;
		public $valorTributoUnidad;
   }
   
   class ImpuestosTotales
   {
   		public $codigoTOTALImp;
		public $montoTotal;
   }
   
   class MediosDePago
   {
		public $fechaDeVencimiento;
   		public $medioPago;
		public $metodoDePago;
		public $numeroDeReferencia;
   }
   /*{
   		public $medioPago;
		public $metodoDePago;
		public $numeroDeReferencia;
   }*/

   class uploadAttachment {
       public $archivo;
       public $numeroDocumento;
       public $nombre;
       public $formato;
       public $tokenEmpresa;
       public $tokenPassword;
       public $tipo;
       public $enviar;
	}


  class Extensibles {

        public $controlInterno1;
        public $controlInterno2;
        public $nombre;
        public $valor;
  }

  class DocumentoReferenciado{

        public $codigoEstatusDocumento;
        public $codigoInterno;
        public $cufeDocReferenciado;
        public $descripcion = Array();
        public $fecha;
        public $fechaFinValidez;
        public $fechaInicioValidez;
        public $numeroDocumento;
        public $tipoCUFE;
        public $tipoDocumento;
        public $tipoDocumentoCodigo;
        

  }

  class CargarAdjuntos{

      public $tokenEmpresa;
      public $tokenPassword;
      public $adjunto;
  }

  class adjunto{

      public $archivo;
      public $email =array();
      public $enviar;
      public $formato;
      public $nombre;
      public $numeroDocumento;
      public $tipo;

  }

  class Parametros{
  	
	  public $tokenEmpresa;
	  public $tokenPassword;
	  public $adjuntos;
	  public $servidor1;
	  public $servidor2;
  }
	
//define("WSDL","http://testubl21.thefactoryhka.com.co/ws/v1.0/Service.svc?wsdl");
//define("WSDL","https://demoemision.thefactoryhka.com.co/ws/obj/v1.1/Service.svc?wsdl");
//define("WSANEXO","http://demoemision.thefactoryhka.com.co/wsEmision/Service.svc?wsdl");
//define("WSDL","http://demoemision.thefactoryhka.com.co/ws/obj/v1.1/Service.svc?wsdl");

define("WSDL","http://testubl21.thefactoryhka.com.co/ws/v1.0/Service.svc?wsdl");
define("WSANEXO","http://testubl21.thefactoryhka.com.co/ws/adjuntos/Service.svc?wsdl");

date_default_timezone_set("America/Bogota");
class WebService{
    /**
    * @author lrodriguez
    * Funcion que permite Cargar Certificado
    * @param string $wsdl
    * @param array $options
    * @param array $params
    * @return array $list
    */
    function loadCertificado($wsdl,$options,$params)
    {
        try
		{
            $soap = new SoapClient($wsdl, $options);
            $dat = $soap->CargarCertificado($params);
            $inter = $dat->CargarCertificadoResult;
            $list = (array) $inter;
            var_dump($list);
			return $list;
        }
        catch(Exception $e) 
		{
			if(isset($soap))
			{
            	var_dump($soap->__getLastResponse());
			}
        }
    }
    
    /**
    * Funcion para generar descargas en PDF o XML
    * @param string $wsdl
    * @param array $options
    * @param array $params
    * @return array $list
    */
    function Descargas($wsdl,$options,$params,$tipoDescarga){
        //print("<pre>".var_export(func_get_args(),true)."</pre>");
		$list;
        try{
            $soap = new SoapClient($wsdl, $options);
            if($tipoDescarga=="pdf"){
                $dat = $soap->DescargaPDF($params);
                $inter = $dat->DescargaPDFResult;
            }else if($tipoDescarga=="xml"){
                $dat = $soap->DescargaXML($params);
                $inter = $dat->DescargaXMLResult;
            }
            $list = (array) $inter;
			return $list;

        } 
		catch(Exception $e)
		{
			if(isset($soap))
			{
            	var_dump($soap->__getLastResponse());
			}
        }
    } 
    // declaramos las funciones que se conectan al web service
    
    function enviar($wsdl,$options,$params)
    {
        try {
            //set_time_limit(300);
            $soap  = new SoapClient($wsdl, $options);
            $dat   = $soap->Enviar($params);
            $inter = $dat->EnviarResult;
            $list  = (array) $inter;
            return $list;
        }
        catch(Exception $e)
		{
			if(isset($soap))
			{
				var_dump($soap->__getLastResponse());
			}
        }
    }
    
    function enviocorreo($wsdl,$options,$params)
    {
		$list;
        try {
            $soap = new SoapClient($wsdl, $options);
            $dat = $soap->EnvioCorreo($params);
            $inter = $dat->EnvioCorreoResult;
            $list = (array) $inter;
			return $list;
        }
        catch(Exception $e)
		{
			if(isset($soap))
			{
				var_dump($soap->__getLastResponse());
			}
        }
    }
    
    
    function getEstadoDocumento($wsdl,$options,$params)
    {
		$list;
        try {
            $soap = new SoapClient($wsdl, $options);
            $dat = $soap->EstadoDocumento($params);
            $inter = $dat->EstadoDocumentoResult;
            $list = (array) $inter;
			return $list;
        }
        catch(Exception $e)
		{
			if(isset($soap))
			{
				var_dump($soap->__getLastResponse());
			}
        }
    }
    
    function foliosrestantes($wsdl,$options,$params){
        $list;
        try {
            $soap = new SoapClient($wsdl, $options);
            $dat = $soap->FoliosRestantes($params);
            $inter = $dat->FoliosRestantesResult;
            $list = (array) $inter; 
            //var_dump($list); 
			return $list;
        }
        catch(Exception $e)
		{
            var_dump($soap->__getLastResponse());
        }
    }
    
    function estructura($wsdl,$options,$params){
        $list;
        try {
            $soap = new SoapClient($wsdl, $options);
            $tipos = $soap->__getTypes();
            //var_dump($tipos);
			return $list;
            
        }
        catch(Exception $e) {
            var_dump($soap->__getLastResponse());
        }
    }
    
    function validarxml($wsdl,$options,$params){
        $list;
        try {
            $soap = new SoapClient($wsdl, $options);
            $dat = $soap->ValidarXml($params);
            $inter = $dat->ValidarXmlResult;
            $list = (array) $inter;  
			return $list;
        }
        catch(Exception $e) {
            var_dump($soap->__getLastResponse());
        }
    }

    function CargarAdjuntos($wsdl,$options,$params)
	{
        $list;
        //var_dump($params);
        try {
            $soap = new SoapClient(WSANEXO, $options);
            $dat = $soap->CargarAdjuntos($params);
            $inter = $dat->CargarAdjuntosResult;
            $list = (array) $inter;  
			return $list;
        }
        catch(Exception $e) {
            var_dump($soap->__getLastResponse());
        }
	}
}
?>