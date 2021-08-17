<?php



?>

<html>
	<head></head>
	<body>

		<h1>DEMO PHP FEL CO 2.1</h1></br>
		
		<form method="post" action = "Procesar.php" enctype="multipart/form-data">
			
			
			Token Empresa: <input type="text" name="tokenEmpresa" value = "5976f83acd3a4422baba73c81190c6bbe6bf2352"></br></br>

			Token Password: <input type="text" name="tokenPassword" value = "2a25e9acd1ee4a70ae931535dc4e7bfff052a631"></br></br>

			Rango de Numeración: <input type="text" name="RangoNumeracion" value = "F4NN-1"></br></br>

			Número de Consecutivo: <input type="text" name="consecutivoDocumento" value = ""></br></br>

			Fecha de emisión: <input type="date" name="Fecha" value="<?php echo date('Y-m-d'); ?>"></br></br>	

			Correo Adquiriente: <input type="text" name="correo" value = "servicio@solucionesnavarro.com"></br></br>

			Enviar Adjunto: <input type="checkbox" name="Check" value= "TRUE"></br>

			Seleccionar archivo adjunto: <input type="file" name="archivo" id ="archivo" ></br></br>	

			<input type="submit" name="Enviar" value="Enviar factura">

			<input type="submit" name="EnviarNC" value="Enviar Nota Crédito">

			<input type="submit" name="EnviarND" value="Enviar Nota Débito"></br></br></br>

			<input type="submit" name="Folios" value="Consultar Folios"></br></br></br>

			Documento a consultar: <input type="text" name="ConsultaDoc" value = ""></br></br>

			<input type="submit" name="EstadoDoc" value="Estado Documento" ></br></br>

			</form>
			

	
	</body>

</html>		