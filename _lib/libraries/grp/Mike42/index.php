<?php

require __DIR__ . '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea

use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

/*
Este ejemplo imprime un hola mundo en una impresora de tickets
en Windows.
La impresora debe estar instalada como genérica y debe estar
compartida
 */

/*
Conectamos con la impresora
 */

/*
Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
escribe el nombre de la tuya. Recuerda que debes compartirla
desde el panel de control
 */

$connector = new WindowsPrintConnector($vnombre_impresora);
$printer = new Printer($connector);


//$logo = EscposImage::load(__DIR__."/logo.jpg", false);
//$printer->bitImage($logo);

/*
Imprimimos un mensaje. Podemos usar
el salto de línea o llamar muchas
veces a $printer->text()
 */
//EMPRESA
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->setTextSize(2, 1);
$printer->text($vnomemp."\n");
$printer->text($vnitemp."\n");
$printer->text($vdiremp."\n");
$printer->text($vtelemp."\n");
if(!empty($vresponsable))
{
	$printer->text($vresponsable."\n");
}

//ENCABEZADO
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->setTextSize(2, 2);
$printer->feed();
$printer->text($vnufac."\n");
$printer->text("FECHA: ".$vfecha."\n");
$printer->text("F.PAGO: ".$vfpago."\n");
$printer->text("ATIENDE: ".$vatiende."\n");
$printer->text("CLIENTE: ".$vcliente."\n");
$printer->text("CC/NIT: ".$vnitcli."\n");
$printer->text("DIRECCIÓN: ".$vdircli."\n");
$printer->text("TELEFONO: ".$vtelcli."\n");

//DETALLE
if(count($vproductos)>0)
{
	$printer->text("__________________________________________\n");
	$printer->text("PRODUCTOS\n");
	$printer->text("------------------------------------------\n");
	
	for($i=0;$i<count($vproductos);$i++)
	{
		$printer->text(($i+1).". ".$vproductos[$i]."\n\n");
	}
	$printer->text("__________________________________________\n");
	$printer->feed();
}

//TOTALES
$printer->setTextSize(2, 2);
$printer->text("TOTAL: ".$vtotalfac."\n");
$printer->feed();

//VUELTOS
if(!empty($vrecibido) and !empty($vvueltos>0))
{
$printer->text("RECIBIDO: ".$vrecibido."\n");
$printer->text("VUELTOS: ".$vueltos."\n");
$printer->feed();
}

//DESCUENTO
if(!empty($vdescuento))
{
$printer->text("DESCUENTO: ".$vdescuento."\n");
$printer->feed();
}

//IMPUESTOS
if(!empty($vimpuesto))
{
$printer->text("DETALLE DEL IMPUESTO \n");
$printer->text("SUBTOTAL: ".$vbase."\n");
$printer->text("IMPUESTO: ".$vimpuesto."\n");
$printer->text("TOTAL: ".$vtotalfac."\n");
$printer->feed();
}

$printer->setJustification(Printer::JUSTIFY_CENTER);
//RESOLUCION
if(!empty($vresolucion))
{
$printer->text($vresolucion."\n");
$printer->feed();
}

//PIE DE PAGINA
$printer->text("¡Gracias por su compra!\n");
$printer->text("Hecho en FACILWEB\n");
$printer->text("facilweb@solucionesnavarro.com\n");
/*
Hacemos que el papel salga. Es como
dejar muchos saltos de línea sin escribir nada
 */
//$printer->feed(15);

/*
Cortamos el papel. Si nuestra impresora
no tiene soporte para ello, no generará
ningún error
 */
$printer->cut();

/*
Por medio de la impresora mandamos un pulso.
Esto es útil cuando la tenemos conectada
por ejemplo a un cajón
 */
$printer->pulse();

/*
Para imprimir realmente, tenemos que "cerrar"
la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
 */
$printer->close();
