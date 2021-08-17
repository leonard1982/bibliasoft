<?php
session_cache_limiter('public');
echo session_cache_limiter();
//se la sesion es validada no reseteamos la conexion
if(!isset($_GET["validado"]))
{
//reseteamos la conexion
//$arr_conn = array(); 
//$arr_conn['user'] = "root";
//$arr_conn['password'] = ".facilweb2020";
//$arr_conn['database'] = "inventario_facturacion";
//sc_connection_edit("conn_mysql", $arr_conn); 
}

//Cargamos las librerias necesarias
//funcion para autocargar las clases
require_once 'php/autoload.php';

//cargamos las clases
require_once 'php/baseDeDatos.php';

//si hay conexion a la base de datos facilweb para traer la lista de empresas
$conexion = new dbMysql("localhost","root",".facilweb2020","facilweb",3311);

?>
<!DOCTYPE html>
<html>
<head>
  	<meta name="viewport" content="width=device-width,height=device-height, user-scalable=no" charset="UTF-8">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">

	<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" type="text/css" href="js/themes/my-custom-theme.css">
	<link rel="stylesheet" type="text/css" href="js/themes/jquery.mobile.icons.min.css">
	<script src="js/jquery-1.11.1.js"></script>
	<script src="js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
	
	<script src="js/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css">
	
	<script src="js/jquery-ui.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/jquery.blockUI.js"></script>
	<link rel="stylesheet" type="text/css" href="js/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="js/css/themes/default.min.css">
	<link rel="stylesheet" type="text/css" href="js/css/themes/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="js/css/themes/bootstrap.min.css">

	
	<style>
		body {
			overscroll-behavior: contain;
		}
		combo{
			color:blue;
		}
		
		#selectempresa{
			
			border: none;
            box-shadow: none;
		    border-radius: 50px !important;
            border: 1px solid #b1afae;
            background:white;
			padding: 8px;
			width:100%;
		}
		
		#idproductosporgrupo{
			
			overflow:auto;
			width:100%;
			height:200px;
		}
		
		#buscarproducto{
		
			text-align:center !important;
		}
		.formatotabla1{

			font-size:12px;
			font-family:Arial;
			border-collapse: collapse;
			width: 98%;
		}
		
		.formatotabla1 input{
			
			border: 1px solid white;
			text-align:center !important;
		}

		.formatotabla1 tr:nth-of-type(odd) { 
		  background: #fff; 
		}
		.formatotabla1 th { 
		  background: #333; 
		  color: white; 
		  font-weight: bold; 
		}
		.formatotabla1 td, th { 
		  padding: 2px; 
		  border: 1px solid #ccc; 
		  text-align: left;
		  cursor:pointer; 
		}
		
		
		.formatotabla2{

			font-size:10px;
			font-family:Arial;
			border-collapse: collapse;
		}
		
		.formatotabla2 input{
			
			border: 1px solid white;
			text-align:center !important;
		}

		.formatotabla2 tr:nth-of-type(odd) { 
		  background: #fff; 
		}
		.formatotabla2 th { 
		  background: #333; 
		  color: white; 
		  font-weight: bold; 
		}
		.formatotabla2 td, th { 
		  padding: 2px; 
		  border: 1px solid #ccc; 
		  text-align: left;
		  cursor:pointer; 
		}
		
		.tablatotal{
			
			padding: 5px;
			color: white;
			background: #29abe2;
			font-weight: bold;
			font-size: 18px;
		}
		
		.linea{
			
			width:100%;
			border-bottom: 1px solid #b1afae;
		}
		.mesas{
			border-radius: 5px;
			border: 4px solid #b1afae;
		}
		.bloque2{
			padding-left:10px;
		}
		.menus{
			
			border-radius: 50px;
			border: 4px solid white;
			margin: 5px;
		}
		.menus2{
			
			border-radius: 50px;
			border: 4px solid white;
		}
		.pie{
			
			overflow:auto;
			width: 100%;
			padding: 5px;
			
		}
		
		.pie div{
			height: 50px;
		}
		.centrarv{
			
			display: table-cell;
			vertical-align: middle;
		}
		.login{
			text-align:center !important;
		}
		#btnLogin{
			
			float:right;
		}
		#txtuser
		{
			background: url("../_lib/img/usuario.png") no-repeat scroll 0 0 transparent;
			background-size: 30px 30px;
			color: black;
			padding: 5px 5px 5px 25px;
		}
		
		#txtpassword
		{
			background: url("../_lib/img/password.png") no-repeat scroll 0 0 transparent;
			background-size: 30px 30px;
			color: black;
			padding: 5px 5px 5px 25px;
		}
		
		.ui-input-text.ui-custom {
            
           border: none;
           box-shadow: none;
		   border-radius: 50px !important;
           border: 1px solid #b1afae;
           background:white;
           
        }
		
		#tListaMesas{
			
			font-size:12px;
			font-family:Arial;
		}
	</style>
	
	<script>
		
	function fCerrarPedido()
	{
		if($("#detallepedido").html())
		{
			alertify.confirm('Alerta', 'Si cierra el pedido sólo podrá ser editado desde la caja.', 
				function(){ 

					var idpedido = $("#idpedido").val();

					$.post("php/cCerrarPedido.php",{

						idpedido:idpedido

					},function(r){

						//log
						console.log("Log data fCerrarPedido: ");
						console.log(r);

						var obj = JSON.parse(r);

						if(obj.cerrado=="SI")
						{
							//nos dirigimos a la lista de las mesas
							fCargarMesas();
							cambiarPagina("mesas");
						}
						else
						{
							alertify.alert('', 'Por alguna razón no se pudo cerrar el pedido!!!', function(){  });
						}
					});
				}
				,function(){ 

				}
			);			
		}
		else
		{
			alertify.alert('', 'No se puede cerrar un pedido sin detalle.', function(){  });
		}	
	}
		
	function mueveReloj()
	{
		momentoActual = new Date();
		hora = momentoActual.getHours();
		minuto = momentoActual.getMinutes();
		segundo = momentoActual.getSeconds();

		horaImprimible = hora + " : " + minuto + " : " + segundo;

		$("#reloj").text(horaImprimible);
		
		setTimeout("mueveReloj()",1000); 
	}
		
		$(document).ajaxStart(function(){
    
			$.blockUI({ 
				message: 'Cargando...', 
				css: { 
					border: 'none', 
					padding: '15px', 
					backgroundColor: '#000', 
					'-webkit-border-radius': '10px', 
					'-moz-border-radius': '10px', 
					opacity: .5, 
					color: '#fff'
				}
			});

		}).ajaxStop(function(){

			$.unblockUI();

		});
		
		//funcion para mostrar la informacion del producto y si es combo los items del combo
		function fMostrarInfoProd(idpro)
		{
			$.post("php/cInformacionProducto.php",{
		
				idpro:idpro
		
			},function(r){
				
				alertify.alert('Información', r, function(){  });
			});
		}
		
		//funcion para observaciones al pedido de la mesa
		function fObservacionPedidoMesa(idpedido,observacion)
		{
		
			//log
			console.log("fObservacionPedidoMesa: ");
			console.log("idpedido: "+idpedido+" observacion: "+observacion);
			
			if(!$.isEmptyObject(idpedido))
			{
				alertify.prompt( 'Observacion', '', observacion
				   , function(evt, value) 
					{ 
						var vsql = "update pedidos set observaciones='"+value+"' where idpedido='"+idpedido+"'";

						$.post("php/consulta.php",{sql:vsql},function(r){

							//log
							console.log("Log data fObservacionPedidoMesa: ");
							console.log(r);

							console.log("Log data fObservacionPedidoMesa parte 2: ");
							console.log(vsql);

							alertify.set('notifier','position', 'top-center');
							alertify.notify('Observación actualizada.');
		
							//actualizamos la lista
							fCargarMesas();

						});
					}
				   , function() 
					{ 
						alertify.set('notifier','position', 'top-center');
						alertify.error('Operacion cancelada.');
					}
				);
			}
			else
			{
				alertify.set('notifier','position', 'top-center');
				alertify.error('No se puede agregar una observacion a un pedido de otro usuario y/o a una mesa sin item.');
			}
		}
		
		//FUNCION PARA BUSCAR EN UNA TABLA
		function doSearch(e){

			var code = (e.keyCode ? e.keyCode : e.which);

			if(code == 13) {

				return false;

			}else{

				var tableReg = document.getElementById('tListaMesas');
				var searchText = document.getElementById('searchTerm').value.toLowerCase();
				var cellsOfRow="";
				var found=false;
				var compareWith="";

				// Recorremos todas las filas con contenido de la tabla
				for (var i = 0; i < tableReg.rows.length; i++)
				{
					cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
					found = false;
					// Recorremos todas las celdas
					for (var j = 0; j < cellsOfRow.length && !found; j++)
					{
						compareWith = cellsOfRow[j].innerHTML.toLowerCase();
						// Buscamos el texto en el contenido de la celda
						if (searchText.length === 0 || (compareWith.indexOf(searchText) > -1))
						{
							found = true;
						}
					}
					if(found)
					{
						tableReg.rows[i].style.display = '';
					} else {
						// si no ha encontrado ninguna coincidencia, esconde la
						// fila de la tabla
						tableReg.rows[i].style.display = 'none';
					}
				}
			}
		}
		
		//FUNCION PARA DESHABILITAR IR ATRAS
		function deshabilitaRetroceso()
		{

			window.location.hash="no-back-button";
			window.location.hash="Again-No-back-button"; //chrome
			window.onhashchange=function(){
				window.location.hash="no-back-button";
			}

		}
		
		//funcion para actualizar las observaciones de un item
		function fActualizarObs(iddet,idtextarea)
		{	
			var obs = $("#"+idtextarea).val().toUpperCase();
			var sql = "update detallepedido set observ='"+obs+"' where iddet='"+iddet+"'";
		
			//log
			console.log("Log fActualizarObs: ");
			console.log("obs: "+obs);
			console.log("sql: "+sql);
		
			$.post("php/consulta.php",{sql:sql},function(r){
		
				//log
				console.log("Log data fActualizarObs: ");
				console.log(r);
				
				alertify.set('notifier','position', 'top-center');
				alertify.notify('Observación actualizada.', 'success', 5, function(){  console.log('dismissed'); });
			});
		}
		
		//funcion para imprimir un item a comanda de manera individual
		function fImprimirComandaItem(iddet,idpedido)
		{
			alertify.confirm('Confirme', '¿Desea imprimir la comanda de ese item?', 
		
				function()
				{ 
					$.post("php/imprimir_comanda_item.php",{
			
						iddet: iddet,
						idpedido: idpedido

					},function(r){

						//log
						console.log("Log data fImprimirComandaItem: ");
						console.log(r);

						if(r==1)
						{
							alertify.set('notifier','position', 'top-center');
							alertify.error('El grupo del producto no tiene configurada una impresora.');
						}
						else
						{
							alertify.set('notifier','position', 'top-center');
							alertify.notify('Comanda enviada.', 'success', 5, function(){  console.log('dismissed'); });
						}
		
						//cargamos el detalle del pedido
						fCargarDetallePedido();
					});
				}
                , 
				function()
				{ 
					console.log("cancelado impresion de comanda");
				}
			);
		}
		
		//funcion para imprimir un item a comanda de manera individual
		function fImprimirComanda()
		{
		
			idpedido = $("#idpedido").val();
		
			alertify.confirm('Confirme', '¿Desea imprimir las comandas del pedido?', 
		
				function()
				{ 
					$.post("php/imprimir_comanda.php",{
			
						idpedido: idpedido

					},function(r){

						//log
						console.log("Log data fImprimirComanda: ");
						console.log(r);

						if(r==1)
						{
							alertify.set('notifier','position', 'top-center');
							alertify.error('El grupo del producto no tiene configurada una impresora.');
						}
						else
						{
							alertify.set('notifier','position', 'top-center');
							alertify.notify('Comanda enviada.', 'success', 5, function(){  console.log('dismissed'); });
						}
		
						//cargamos el detalle del pedido
						fCargarDetallePedido();
					});
				}
                , 
				function()
				{ 
					console.log("cancelado impresion de comanda");
				}
			);
		}
		
		/*
		$(function () {
		$("#dialog").dialog({
		autoOpen: false,
		modal: false,
		buttons: {
		"Cerrar": function () {
		$(this).dialog("close");
		}
		}
		});
		});
		*/
		
		//funcion para listar productos
		function fListarProductos(idgrupo)
		{
			//log
			console.log("Log fListarProductos: ");
			console.log("idgrupo: "+idgrupo);
			//$("#dialog").show();
			$.post("php/productosporGrupo.php",{idgrupo:idgrupo},function(r){
				
				//log
				console.log("Log DATA -- fListaProductos: ");
				console.log(r);
				
				if($.isEmptyObject(r))
				{
					alertify.set('notifier','position', 'top-center');
					alertify.error('No hay articulos en esta categoria.');
				}
				else
				{
					var anchopagina = $("#mesas").css("width");
		       			anchopagina = anchopagina.replace("px","");
						anchopagina = anchopagina-30;
		
					var altopagina = $( window ).height();
						altopagina = altopagina-100;
					
					$("#listaproductosgrupo").html(r);
					//$("#idproductosporgrupo").html(r);
					//$("#popupDialog").popup("open",{ x:0,y:0});
					//$("#popupDialog").css("width",anchopagina+"px");
					//$("#popupDialog").css("height",altopagina+"px");
					//$("#idproductosporgrupo").css("height",(altopagina-140));
				}
			});
		}
		
		//funcion para modificar los item del pedido borrando item, agregando y quitando cantidad
		function fModificarItem(iddet,accion,idpedido)
		{
			//log
			console.log("Log fModificarItem: ");
			console.log("iddet: "+iddet+" accion: "+accion);
		
		
			var idvendedor = localStorage.getItem("idvendedor");
			
			switch(accion)
			{
				case "borrar":
		
					var sql = "delete from detallepedido where iddet='"+iddet+"'";
		
				break;
		
				case "mas":
		
					var sql = "update detallepedido set cantidad=(cantidad+1),valorpar=(cantidad*valorunit),iva=(valorpar-(valorpar/((adicional/100)+1))) where iddet='"+iddet+"'";
		
				break;
		
				case "menos":
					
					var sql = "update detallepedido set cantidad=(cantidad-1),valorpar=(cantidad*valorunit),iva=(valorpar-(valorpar/((adicional/100)+1))) where iddet='"+iddet+"' and cantidad >1";
		
				break;
			}
		
			var sqlretorno = "select iddet from detallepedido where iddet='"+iddet+"'";
		
			$.post("php/consulta.php",{

				sql:sql,
		        accion:accion,
		        iddet:iddet

			},function(r){
				
				if(accion=="borrar")
				{
		
					//si se crea el log
					$.post("php/cCrearLogRestaurante.php",{

						idvendedor: idvendedor,
						accion: "ELIMINAR",
						observacion:"EL USUARIO ELIMINO ITEM IDPEDIDO: "+idpedido+", ITEM: "+iddet+" EN RESTAURANTE MOVIL."

					},function(r3){

						//log
						console.log("Log cCrearLogRestaurante Modificar Item: ");
						console.log(r3);
					});
				}
		
				if(accion=="mas")
				{
					var cantidad = parseInt($("#cantidaditem"+iddet).val());
						cantidad++;
		
					$("#cantidaditem"+iddet).val(cantidad);
					
					var valorunitario = $("#valorunitario"+iddet).val();
						valorunitario = valorunitario.replace(",","");
					    valorunitario = valorunitario.replace(",","");
						valorunitario = valorunitario.replace(",","");
						valorunitario = parseInt(valorunitario);
		
					$("#valorparcial"+iddet).val(formatNumber(cantidad*valorunitario));
		
					//si se crea el log
					$.post("php/cCrearLogRestaurante.php",{

						idvendedor: idvendedor,
						accion: "AGREGAR",
						observacion:"EL USUARIO AGREGO UNO AL ITEM: "+iddet+" EN RESTAURANTE MOVIL."

					},function(r3){

						//log
						console.log("Log cCrearLogRestaurante Mas: ");
						console.log(r3);
					});
				}
		
				if(accion=="menos")
				{
					var cantidad = parseInt($("#cantidaditem"+iddet).val());
		
					if(cantidad > 1)
					{
						cantidad--;
						$("#cantidaditem"+iddet).val(cantidad);
		
						var valorunitario = $("#valorunitario"+iddet).val();
						    valorunitario = valorunitario.replace(",","");
					    	valorunitario = valorunitario.replace(",","");
							valorunitario = valorunitario.replace(",","");
							valorunitario = parseInt(valorunitario);
		
						$("#valorparcial"+iddet).val(formatNumber(cantidad*valorunitario));
		
						//si se crea el log
						$.post("php/cCrearLogRestaurante.php",{

							idvendedor: idvendedor,
							accion: "ELIMINAR",
							observacion:"EL USUARIO RESTO UNO AL ITEM: "+iddet+" EN RESTAURANTE MOVIL."

						},function(r3){

							//log
							console.log("Log cCrearLogRestaurante Menos: ");
							console.log(r3);
						});
					}
				}
												
				//log
				console.log("Log JSON fModificarItem: ");
				console.log(r);
		
				//actualizamos los totales
				var sql2 = "update pedidos set subtotal=(select sum(valorpar)-sum(iva) from detallepedido where idpedid='"+idpedido+"'),valoriva=(select sum(iva) from detallepedido where idpedid='"+idpedido+"'),total=(select sum(valorpar) from detallepedido where idpedid='"+idpedido+"'), saldo=(select sum(valorpar) from detallepedido where idpedid='"+idpedido+"') where idpedido='"+idpedido+"'";
												
				$.post("php/consulta.php",{

					sql:sql2

				},function(r2){
												
					//log
					console.log("Se actualizó el total.");
					fCargarDetallePedido();
				
				});
			});
		}
		
		//FORMATEAR NUMEROS
		function formatNumber(amount, decimals) {

			amount += ''; // por si pasan un numero en vez de un string
			amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

			decimals = decimals || 0; // por si la variable no fue fue pasada

			// si no es un numero o es igual a cero retorno el mismo cero
			if (isNaN(amount) || amount === 0) 
				return parseFloat(0).toFixed(decimals);

			// si es mayor o menor que cero retorno el valor formateado como numero
			amount = '' + amount.toFixed(decimals);

			var amount_parts = amount.split('.'),
				regexp = /(\d+)(\d{3})/;

			while (regexp.test(amount_parts[0]))
				amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

			return amount_parts.join('.');
		}
		
		//function de carga y descarga
		function fCarga(estado,mensaje)
		{
			if(estado)
			{
				$.blockUI({ 
					message: mensaje, 
					css: { 
						border: 'none', 
						padding: '15px', 
						backgroundColor: '#000', 
						'-webkit-border-radius': '10px', 
						'-moz-border-radius': '10px', 
						opacity: .5, 
						color: '#fff'
					}
				});
			}
			else
			{
				$.unblockUI();
			}
		}
		
		//FUNCION PARA PASAR EL MENU
		function cambiarPagina(page) {

			$.mobile.changePage("#" + page, {
					transition: "none"
			});

		 }
		
		//FUNCION PARA TRAER DATOS JSON
		//funcion para traer datos en formato json
		function fTraerDatos(sql,funcion)
		{
			try
			{
				$.post("php/JSONtraerDatos.php",{

					sql:sql

				},function(r){

					//log
					//console.log("Log fTraerDatos - JSON: ");
					//console.log(r);
					
					//pasamos a fFuncionDatos los registros
					funcion(r);
					
					//console.log("ProductoCargado: ");
					//console.log(ProductoCargado);

				},"json").done(function(i,e) {

					//log
					//console.log("Log fTraerDatos - done: ");
					//console.log("i :");
					//console.log(i);
					//console.log("e :");
					//console.log(e);

				 }).fail(function(i,e) {

					//log
					//console.log("Log fTraerDatos- fail: ");
					//console.log("i: ");
					//console.log(i);
					//console.log("e: ");
					//console.log(e);

				});
			}
			catch(error)
			{
				console.log("Error fTraerDatos: ");
				console.error(error);
			}
		}
		
		//funcion para listar las mesas
		function fListarMesas(r)
		{
	
			//log
			//console.log("Log fListarMesas: ");
			//console.log(r);
		
			var vhtml     = "";
			var idvended = $("#idvendedor").val();
									
			if($.isEmptyObject(r))
			{
			vhtml = "<p>No resultados para la busqueda.</p>";
			}
			else
			{
				/*
				if($("#tListaMesas").length <=0)
				{
				*/
					vhtml += "<div style='overflow:auto;width:100%;'>";
					vhtml += "<table id='tListaMesas' border='0' width='100%'>";

					$.each(r,function(id,value)
					{

						//console.log("log primer each: id:"+id+" value:"+value[8]);

						vhtml += "<tr>";

						$.each(value,function(i,val)
						{

							//console.log("Log segundo each:  i:"+i+" val:"+val);

							switch(i)
							{
								case 0:

								break;

								case 1:

									vhtml += "<td width='80px'>";
									if(val == "DISPONIBLE")
									{
										vhtml += "<img id='img"+value[0]+"' class='mesas' src='../_lib/img/mesa3.jpeg' width='80px'/ onclick='fSeleccionarMesa("+value[0]+",\""+value[2]+"\",\""+value[1]+"\",\""+value[5]+"\",\""+value[7]+"\",\""+value[4]+"\");'>";
									}
									else
									{//si está ocupada la mesa
												
										if(value[7]==idvended)
										{
											vhtml += "<img id='img"+value[0]+"' class='mesas' src='../_lib/img/mesa1.jpeg' width='80px'/ onclick='fSeleccionarMesa("+value[0]+",\""+value[2]+"\",\""+value[1]+"\",\""+value[5]+"\",\""+value[7]+"\",\""+value[4]+"\");'>";
										}
										else
										{
											vhtml += "<img id='img"+value[0]+"' class='mesas' src='../_lib/img/mesa2.jpeg' width='80px'/ onclick='fSeleccionarMesa("+value[0]+",\""+value[2]+"\",\""+value[1]+"\",\""+value[5]+"\",\""+value[7]+"\",\""+value[4]+"\");'>";
										}
									}

									vhtml += "</td>";
								break;

								case 2:

									vhtml += "<td class='bloque2'>";
									vhtml += "<b>"+val+"</b>";
									vhtml += "<br>";

								break;
												
								case 3:

									vhtml += "<b>VENDEDOR:</b> "+val;
									vhtml += "<br>";

								break;
												
								case 4:

									vhtml += "<b>PEDIDO: </b>"+val;
									vhtml += "<br>";

								break;
												
								case 6:

									vhtml += "<b style='text-decoration:none;color:white;padding:3px;border-radius:3px;background:#29abe2;border: 1px solid #29abe2;'>A PAGAR:$ </b> "+formatNumber(val);
									vhtml += "<br>";
									vhtml += "<br>";

								break;
												
								case 8:
									
									//se trae la observacion si no es null y no está vacia
									var vobs = val;

									vhtml += "<a onclick='fObservacionPedidoMesa(\""+value[5]+"\",\""+vobs+"\");' style='text-decoration:none;color:white;padding:3px;border-radius:3px;background:#29abe2;border: 1px solid #29abe2;'><b>OBSERVACION:</b></a>  "+vobs;
									vhtml += "</td>";

								break;
							}
						});

						vhtml += "</tr>";
												
						vhtml += "<tr>";
						vhtml += "<td colspan='2' height='3px'>";
						vhtml += "<hr class='linea'>";
						vhtml += "</td>";
						vhtml += "</tr>";
					});

					vhtml += "</table>";
					vhtml += "</div>";
												
					$("#contenido").html(vhtml);
					
					//busqueda rapida
					doSearch(39);
				/*
				}
				else
				{
					console.log("La tabla tListaMesas ya existe.");		
												
					$.each(r,function(id,value)
					{
						if(value[1] == "DISPONIBLE")
						{
							$("#img"+value[0]).attr("src","../_lib/img/mesa3.jpeg");
						}
						else
						{//si está ocupada la mesa
							$("#img"+value[0]).attr("src","../_lib/img/mesa2.jpeg");
						}
					});
				}
				*/
			}
		}
		
		//funcion para cargar las mesas
		function fCargarMesas(funcion=function(){})
		{
												
			var idvendedor   = $("#idvendedor").val();
			var idresolucion = $("#idresolucion").val();
	
			/*
			var sql = "select idtercero, "+
					  "coalesce((select 'OCUPADA' from pedidos p where p.asentada='0' and p.idcli=idtercero limit 1),'DISPONIBLE') as estado, "+
					  "nombres, "+
					  "coalesce((select t.nombres from pedidos p inner join terceros t on p.vendedor=t.idtercero where p.idcli=c.idtercero  and p.asentada='0' order by p.idpedido desc limit 1),'') as vendedor, "+
					  "coalesce((select CONCAT(r.prefijo,' ', p.numpedido) from pedidos p inner join resdian r on p.prefijo_ped=r.Idres where p.vendedor='"+idvendedor+"' and p.prefijo_ped='"+idresolucion+"' and p.idcli=idtercero and p.asentada='0' order by p.idpedido desc limit 1),'') as pedido, "+
					  "coalesce((select p.idpedido from pedidos p inner join resdian r on p.prefijo_ped=r.Idres where p.vendedor='"+idvendedor+"' and p.prefijo_ped='"+idresolucion+"' and p.idcli=idtercero  and p.asentada='0' order by p.idpedido desc limit 1),'') as idpedido, "+
					 "coalesce((select p.total from pedidos p inner join resdian r on p.prefijo_ped=r.Idres where p.vendedor='"+idvendedor+"' and p.prefijo_ped='"+idresolucion+"' and p.idcli=idtercero  and p.asentada='0' and p.total>0 order by p.idpedido desc limit 1),'0') as total, "+
					 "coalesce((select t.idtercero from pedidos p inner join terceros t on p.vendedor=t.idtercero where p.idcli=c.idtercero and p.asentada='0' order by p.idpedido desc limit 1),'') as idvendedor, "+
					 "coalesce((select p.observaciones from pedidos p inner join resdian r on p.prefijo_ped=r.Idres where p.vendedor='"+idvendedor+"' and p.prefijo_ped='"+idresolucion+"' and p.idcli=idtercero  and p.asentada='0' order by p.idpedido desc limit 1),'') as observaciones "+
					 "from terceros c where c.es_restaurante = 'SI' order by c.idtercero desc";
												
			*/
												
			var sql = "select idtercero, "+
					  "if(disponible='SI','DISPONIBLE','OCUPADA') as estado, "+
					  "nombres, "+
					  "coalesce(vend_pedido_tmp,'')  as vendedor, "+
					  "coalesce(n_pedido_tmp,'') as pedido, "+
					  "id_pedido_tmp as idpedido, "+
					  "total_pedido_tmp  as total, "+
					  " '"+idvendedor+"' as idvendedor, "+
					  "coalesce(obs_pedido_tmp,'') as observaciones "+
					  "from terceros c where c.es_restaurante = 'SI' order by c.idtercero desc";
												
			//log
			//console.log("Log fCargarMesas: sql");
			//console.log(sql);
			
			//si el campo de busqueda está vacio ejecutamos la actualizacion de la lista de mesas sino no lo hacemos
			var searchText = document.getElementById('searchTerm').value;
			
			//limpiamos el el input
			document.getElementById('searchTerm').value = "";
			
			//listamos
			fTraerDatos(sql,fListarMesas);	
												
			//volvemos a poner el valor
			document.getElementById('searchTerm').value = searchText;
												
			//traemos la funcion como parametro
			funcion();
			
		}
		
		//funcion para seleccionar la mesa
		function fSeleccionarMesa(idmesa,descripcion,estado,idpedido,idvendedorpedido,pedido="")
		{
															
			var idvendedor   = $("#idvendedor").val();
			var idresolucion = $("#idresolucion").val();
												
			//poner el numero del pedido si lo hay
			$("#frmnumpedido").text("Pedido: "+pedido);
												
												
			//consultamos que la mesa/tercero no este ocupada sino lo creamos sino no dejamos ingresar
			$.post("php/cConsultarDisponibilidadMesa.php",{
												
				idvendedor:idvendedor,
				idtercero:idmesa,
				idresolucion:idresolucion,
				descripcion:descripcion
												
			},function(r){
												
				//log
				console.log("fSeleccionarMesa si no esta ocupada: ");	
				console.log(r);
												
				var obj = JSON.parse(r);
				if(obj.disponible=="SI")
				{
					//analizamos si esta disponible para editar o para crear
					if(obj.sieditar=="SI")
					{
						
						//log
						console.log("Al editar el pedido ");
						$("#idpedido").val(obj.idpedido);
						
						//si no esta disponible en el movil es porque ya ha sido cerrado el pedido
						if(obj.disponible_movil=="SI")
						{
												
							//ponemos el numero del nuevo pedido en la cabecera
							$("#frmnumpedido").text("Pedido: "+obj.numpedido);


							//si se crea el pedido creamos el log
							$.post("php/cCrearLogRestaurante.php",{

									idvendedor: idvendedor,
									accion: "CARGO",
									observacion:"EL USUARIO AGREGO: "+descripcion+" EN RESTAURANTE MOVIL."

							},function(r3){

										//log
										console.log("Log cCrearLogRestaurante Editar: ");
										console.log(r3);
							});


							//cargamos el detalle del pedido
							fCargarDetallePedido();


							$("#mesaseleccionada").text(descripcion);
							$("#idmesa").val(idmesa);
							cambiarPagina("frmmesa");					
						}
						else
						{
							alertify.alert('', 'Un pedido ya cerrado sólo se puede modificar por el administrador del sistema!!!', function(){  });							
						}
					}
					else
					{//si no hay para editar crea el pedido y se va para frm de agregar item
							
							$("#idpedido").val(obj.idpedido);
							$("#mesaseleccionada").text(descripcion);
							$("#idmesa").val(idmesa);
							//ponemos el numero del nuevo pedido en la cabecera
							$("#frmnumpedido").text("Pedido: "+obj.numpedido);
														
							//si se crea el pedido creamos el log
							$.post("php/cCrearLogRestaurante.php",{
														
								idvendedor: idvendedor,
								accion: "AGREGO",
								observacion:"EL USUARIO CARGO: "+descripcion+" EN RESTAURANTE MOVIL."
														
							},function(r3){
														
								//log
								console.log("Log cCrearLogRestaurante: Crear Pedido");
								console.log(r3);
							});

							//cargamos el detalle del pedido
							fCargarDetallePedido();

							//cambiamos al form mesa
							cambiarPagina("frmmesa");
					}
				}
				else
				{
					alertify.alert('', 'La mesa no esta disponible!!!', function(){  });	
												
					//cargamos los estados de las mesas
					fCargarMesas();
				}
			});
		}
		//***********************************************************
												
												
		//al levantar una tecla pulsada en el campo de busqueda manual
		function fBuscarProducto(e,value)
		{
												
			//si es mayor a 3 caracteres
			if(value.length>2)
			{
												
				//si el input no está vacio
				if(!$.isEmptyObject(value))
				{

					$.post("php/autocompletararticulos.php",{

						indicio:value

					},function(r){

						//log
						//console.log(r);

						//ponemos el resultado de autocompletar
						$("#rautocompletar").html(r);

					});
				}
				else
				{
					$("#rautocompletar").html("");								
				}	
			}
			else
			{
				$("#rautocompletar").html("");
			}
		}
		
		function fBuscarProducto2()
		{
			var valor = $("#buscarproducto").val();
		
			//si es mayor a 3 caracteres
			if(valor.length>2)
			{
												
				//si el input no está vacio
				if(!$.isEmptyObject(valor))
				{

					$.post("php/autocompletararticulos.php",{

						indicio:valor

					},function(r){

						//log
						//console.log(r);

						//ponemos el resultado de autocompletar
						$("#rautocompletar").html(r);

					});
				}
				else
				{
					$("#rautocompletar").html("");								
				}	
			}
			else
			{
				$("#rautocompletar").html("");
			}
		}
												
		//funcion para agregar un item al detalle del pedido
		function fAgregarItem(idproducto,costo,preciou,adicional)
		{
			//log
			console.log("Log fAgregarItem: ");
			console.log("idproducto: "+idproducto);
												
			var idpedido   = $("#idpedido").val();
			var sqlretorno = "select max(iddet) from detallepedido";

			var sql = "insert into detallepedido  (idpedid,numfac,remision,idpro,unidadmayor,idbod,costop,cantidad,valorunit,valorpar,iva,descuento,adicional,adicional1,devuelto,colores,tallas,sabor)values('"+idpedido+"','0','0','"+idproducto+"','NO','1','"+costo+"','1','"+preciou+"','"+preciou+"','"+(preciou-(preciou/((adicional/100)+1)))+"','0','"+adicional+"','0','0','0','0','0');";

			$.post("php/consulta.php",{

				sql:sql,
				sqlretorno:sqlretorno,
				pedidorestarexistencia:""

			},function(r){
				
												
				//actualizamos los totales
				var sql2 = "update pedidos set subtotal=(select sum(valorpar)-sum(iva) from detallepedido where idpedid='"+idpedido+"'),valoriva=(select sum(iva) from detallepedido where idpedid='"+idpedido+"'),total=(select sum(valorpar) from detallepedido where idpedid='"+idpedido+"'), saldo=(select sum(valorpar) from detallepedido where idpedid='"+idpedido+"') where idpedido='"+idpedido+"'";
												
				$.post("php/consulta.php",{

					sql:sql2

				},function(r2){
												
												
					var idvendedor = localStorage.getItem("idvendedor");
		
					//si se crea el log
					$.post("php/cCrearLogRestaurante.php",{

						idvendedor: idvendedor,
						accion: "AGREGAR",
						observacion:"EL USUARIO AGREGO ITEM IDPEDIDO: "+idpedido+", PRODUCTO: "+idproducto+" EN RESTAURANTE MOVIL."

					},function(r3){

						//log
						console.log("Log cCrearLogRestaurante: Agregar Item");
						console.log(r3);
					});
												
					fCargarDetallePedido();
												
					//log
					console.log("Log JSON AgregarItem: ");
					console.log(r);

					$("#rautocompletar").html("");
					$("#buscarproducto").val("");
				
				});
			});	
		}
												
		//funcion para cargar el detalle del pedido
		function fCargarDetallePedido()
		{
			
			//borramos la tabla del detalle
			$("#detallepedido").html("");
												
			
			var idpedido = $("#idpedido").val();
			$.post("php/cargarDetalle.php",{
				
				id:idpedido
												
			},function(r){
				
				//cargamos la tabla del detalle
				$("#detallepedido").html(r);								
			});
		}
												
		//funcion para eliminar pedidos temporales
		function fEliminarPedTemporales()
		{
												
			//log
			console.log("Log fEliminarPedTemporales.");
												
			var idvendedor   = $("#idvendedor").val();
			var idresolucion = $("#idresolucion").val();

			var sql = "delete from pedidos where vendedor='"+idvendedor+"' and prefijo_ped='"+idresolucion+"' and (total='0' or total is null) and (select d.iddet from detallepedido d where d.idpedid=idpedido limit 1) is null";

			$.post("php/consulta.php",{

				sql:sql

			},function(r){

				//log
				console.log("Log JSON btnmesasfrm: ");
				console.log(r);
												
				var idvendedor = localStorage.getItem("idvendedor");
				
				/*								
				//si se crea el log
				$.post("php/cCrearLogRestaurante.php",{

					idvendedor: idvendedor,
					accion: "ELIMINAR",
					observacion:"SE ELIMINO UN PEDIDO DE LA LISTA POR NO TENER DETALLE EN RESTAURANTE MOVIL."

				},function(r3){

					//log
					console.log("Log cCrearLogRestaurante Eliminar Temporales: ");
					console.log(r3);
				});
				*/

				//cargamos los estados de las mesas
				fCargarMesas();

				//nos dirigimos a la lista de las mesas
				//cambiarPagina("mesas");
			});										
		}
												
		//**********************************************************
		
		$(document).ready(function(){
						
			//para cerrar el pedido
			$("#cerrarpedido").click(function(e){
												
				e.preventDefault();
				fCerrarPedido();
			});
												
			//iniciamos el reloj
			setTimeout("mueveReloj()",1000);
											
												
			//para cobrar el pedido
			$("#cobrarpedido").click(function(e){
				
				e.preventDefault();
											
				console.log($("#detallepedido").html());
												
				if($("#detallepedido").html())
				{
				
					var idpedido = $("#idpedido").val();

					$.post("php/consultapedido.php",{

						idpedido:idpedido

					},function(r){

							var obj = JSON.parse(r);

							alertify.prompt( 'Cobrar', 'Total a pagar: '+formatNumber(obj.total), parseInt(obj.total)
							   , function(evt, value) 
							   { 						
									if(value<parseInt(obj.total))
									{
										alertify.error('El valor recibido es menor al total de la cuenta.'); 
										return false;
									}
									else
									{
										var vueltos = value-parseInt(obj.total);

										alertify.confirm('¿Desea pagar?','Vueltos: $'+formatNumber(vueltos),

											function()
											{ 
												//mandamos el pago
												var vsql2 = "update pedidos set asentada='1',saldo='0',adicional2='"+value+"',adicional3='"+vueltos+"',formapago='EFECTIVO' where idpedido='"+idpedido+"'";

												$.post("php/consulta.php",{sql:vsql2,caja:"",idpedido:idpedido},function(r){

													//log
													console.log("Al mandar el pago: ");
													console.log(r);
		
													//imprimimos
													$.post("php/frm_pos_impresion_pedidos.php",
													{idfactura:idpedido},
														function(r3)
														{
															//log
															console.log("Imprimió el pedido: "+idpedido);
															console.log(r3);
		
															//a tabla log
															$.post("php/log_movil.php",{
																
																funcion:"inprimir pedido",
																log: r3
		
															},function(r4){
																
																	//log del log
																	console.log("Log del log: ");
																	console.log(r4);
															});
														}
													);

													alertify.alert('Mensaje','Pagado con éxito.',function(){

														//nos dirigimos a la lista de las mesas
														cambiarPagina("mesas");

													});
												});
											}, 
											function()
											{ 
												alertify.error('Se detuvo el pago.');
											}

										).set('labels', {ok:'Pagar', cancel:'Cancelar'});
									}
							   }
							   , function() 
							   { 
									alertify.error('Cobro cancelado.'); 
							   }
							).set('labels', {ok:'Procesar', cancel:'Cancelar'});					
					});	
				}
				else
				{
					alertify.error('El pedido no tiene detalle.'); 											  
				}
			});
												
			//funcion para el boton comandapedido
			$("#comandapedido").click(function(e){
					
				e.preventDefault();
		
				if($("#detallepedido").html())
				{
					fImprimirComanda();
				}
				else
				{
					alertify.error('El pedido no tiene detalle.'); 
				}
			});
		
			//funcion para el boton de anular pedido para liberar la mesa
			$("#anularpedido").click(function(e){
				
				e.preventDefault();
		
				if($("#detallepedido").html())
				{
					alertify.error('El pedido tiene detalle no se puede liberar la mesa.'); 
				}
				else
				{
					
				}
		
			});
												
			//ampliamos el div del contenido donde van las mesas segun la pantalla
			var altop = $( window ).height();
			    altop = altop-100;
												
			$("#contenido").css("height",(altop-70));
												
			//deshabilitamos el retroceso
    		//deshabilitaRetroceso();
		
			var escuchaMesa;
												
			//localStorage
			var ucabecera  = localStorage.getItem("usuariocabecera");
			var nomempresa = localStorage.getItem("nombreempresa");
			var idvended   = localStorage.getItem("idvendedor");
			var idresol    = localStorage.getItem("idresolucion");
												
			//log recarga
			console.log("Log Regarga: ");
			console.log("ucabecera: "+ucabecera+" nomempresa: "+nomempresa+" idvended: "+idvended+" idresol: "+idresol);
			
			if(ucabecera !== "null" && nomempresa !== "null" && idvended !== "null"  && idresol !== "null" && ucabecera !== null && nomempresa !== null && idvended !== null  && idresol !== null)
			{
			
				//el nombre de la cabecera
				$(".usuariocabecera").text(ucabecera);

				//el nombre de la empresa
				$(".nombreempresa").text(nomempresa);

				//cargamos el id del vendedor
				$("#idvendedor").val(idvended);

				//cargamos el id de la resolucion(pj) del vendedor
				$("#idresolucion").val(idresol);
		
				//llamarcaja
				$("#llamarcaja").val(localStorage.getItem("llamarcaja"));
		
				//si llamarcaja es "SI" activamos el "boton cobrarpedido"
				if(localStorage.getItem("llamarcaja")=="SI")
				{	
					$("#cobrarpedido").css("display","block");
				}
				else
				{
					$("#cobrarpedido").css("display","none");
				}

				//eliminamos los pedidos temporales
				fEliminarPedTemporales();

				//cargamos las mesas
				//fCargarMesas();
				
				
				//limpiamos el interval si existe
				//clearInterval(escuchaMesa);
				//escuchaMesa = setInterval(function(){
					
					//analizamos los datos de sesion 
					$.post("php/cMantenerLaSesion.php",{

						idvendedor:localStorage.getItem("idvendedor")

					},function(r){

						//log
						//console.log("log data Mantener viva la sesion: ");
						//console.log(r);

						var obj = JSON.parse(r);

						if(obj.salir=="SI")
						{

							alertify.confirm('Advertencia', 'Se ha cerrado su sesión desde otro lugar.', 
								function()
								{ 
									//localStorage
									localStorage.setItem("usuariocabecera",null);
									localStorage.setItem("nombreempresa",null);
									localStorage.setItem("idvendedor",null);
									localStorage.setItem("idresolucion",null);

									location.href="../inicio/";

									//window.location.reload();
								}
								, function()
								{ 
									//localStorage
									localStorage.setItem("usuariocabecera",null);
									localStorage.setItem("nombreempresa",null);
									localStorage.setItem("idvendedor",null);
									localStorage.setItem("idresolucion",null);

									location.href="../inicio/";

									//window.location.reload();
								}
							);				
						}
						else
						{
							fCargarMesas();
							//limpiamos la consola
							//console.clear();
						}
					});
		
				//},3000);
				
				//redirigimos
				cambiarPagina("mesas");	
			}
			else
			{
				//redirigimos al inicio
				cambiarPagina("login");									
			}
		
		
			function fIngresoSesion(nomvendedor,razonsoc,idvendedor,idresolucion,llamarcaja)
			{
				//el nombre de la cabecera
				$(".usuariocabecera").text(nomvendedor);
				localStorage.usuariocabecera = nomvendedor;
	
				//el nombre de la empresa
				$(".nombreempresa").text(razonsoc);

				//cargamos el id del vendedor
				$("#idvendedor").val(idvendedor);

				//cargamos el id de la resolucion(pj) del vendedor
				$("#idresolucion").val(idresolucion);

				//ponemos llamarcaja
				$("#llamarcaja").val(llamarcaja);

				//localStorage
				localStorage.setItem("usuariocabecera",nomvendedor);
				localStorage.setItem("nombreempresa",razonsoc);
				localStorage.setItem("idvendedor",idvendedor);
				localStorage.setItem("idresolucion",idresolucion);
				localStorage.setItem("llamarcaja",llamarcaja);

				//si llamarcaja es "SI" activamos el "boton cobrarpedido"
				if(llamarcaja=="SI")
				{	
					$("#cobrarpedido").css("display","block");
				}
				else
				{
					$("#cobrarpedido").css("display","none");
				}

				//eliminamos los pedidos temporales
				fEliminarPedTemporales();

				//cargamos las mesas
				fCargarMesas();

				//limpiamos el interval si existe
				//clearInterval(escuchaMesa);
				//escuchaMesa = setInterval(function(){
					
					//analizamos los datos de sesion 
					$.post("php/cMantenerLaSesion.php",{

						idvendedor:localStorage.getItem("idvendedor")

					},function(r){

						//log
						//console.log("log data Mantener viva la sesion: ");
						//console.log(r);

						var obj = JSON.parse(r);

						if(obj.salir=="SI")
						{

							alertify.confirm('Advertencia', 'Se ha cerrado su sesión desde otro lugar.', 
								function()
								{ 
									//localStorage
									localStorage.setItem("usuariocabecera",null);
									localStorage.setItem("nombreempresa",null);
									localStorage.setItem("idvendedor",null);
									localStorage.setItem("idresolucion",null);

									location.href="../inicio/";

									//window.location.reload();
								}
								, function()
								{ 
									//localStorage
									localStorage.setItem("usuariocabecera",null);
									localStorage.setItem("nombreempresa",null);
									localStorage.setItem("idvendedor",null);
									localStorage.setItem("idresolucion",null);

									location.href="../inicio/";

									//window.location.reload();
								}
							);				
						}
						else
						{
							fCargarMesas();
							//limpiamos la consola
							//console.clear();
						}
					});
		
				//},3000);

				//redirigimos
				location.href = "../menu_principal_movil/";
			}
		
			//funcion para validar el inicio de sesion
			function fValidarInicioSesion(){
				
				var usuario  = $("#txtuser").val();
				var password = $("#txtpassword").val();
				var empresa  = $("#selectempresa").val();
												
				//la carga
				fCarga(true,"Cargando...");
		
				$.post("php/cValidarUsuario.php",{
					
					usuario:usuario,
					password: password,
					empresa:empresa
			
				},function(r){
		
					console.log("log inicio de sesion: ");
					console.log(r);
					
					var obj = JSON.parse(r);
												
					//quitamos la carga
					fCarga(false,"");
					
					switch(obj.estado){
						case 1:
							alertify.error('Las variables no fueron enviadas.');
						break;
						case 2:
							alertify.error('Credenciales inválidas.');
						break;
						case 3:
		
							//analizamos si la sesion ya fue iniciada
							if(obj.sesioniniciada=="SI")
							{
								alertify.confirm('Advertencia', 'Hay una sesión activa de este usuario, ¿desea cerrarla para poder ingresar?',
									
									function(){ 
		
										$.post("php/cValidarSesion.php",{
											
											idvendedor: obj.idvendedor
		
										},function(r2){
												
												//log
												console.log("log data validar sesion: ");
												console.log(r2);
		
												//ingresamos la sesion
												fIngresoSesion(obj.nomvendedor,obj.razonsoc,obj.idvendedor,obj.idresolucion,obj.llamarcaja);
										});
		
									}, function()
									{ 
										//salimos
										location.href = "../inicio/";
									}
								);
							}
							else
							{
								//si la sesion no esta  iniciada ingresamos la sesion
								fIngresoSesion(obj.nomvendedor,obj.razonsoc,obj.idvendedor,obj.idresolucion,obj.llamarcaja);
							}
						break;
					}
						
				});
			}
		
			//si damos enter en el input password
			$("#txtpassword").keypress(function(e){

				var code = (e.keyCode ? e.keyCode : e.which);

				if(code == 13) {

					fValidarInicioSesion();

					return false;
				}

			});
		
			//si damos enter en usuario
			$("#txtuser").keypress(function(e){

				var code = (e.keyCode ? e.keyCode : e.which);

				if(code == 13) {

					$("#txtpassword").focus();

					return false;
				}

			});
		
			//el foco en usuario
			$("#txtuser").focus();
			
			$("#btnLogin").click(function(e){
				
				e.preventDefault();
		
				fValidarInicioSesion();
			});
												
			//para el boton de volver a las mesas en el frm mesa
			$("#btnmesasfrm").click(function(e){

				e.preventDefault();

				//log
				console.log("Click btnmesasfrm.");

				//eliminamos los registros temporales
				fEliminarPedTemporales();
												
				//cambiamos la pagina
				cambiarPagina("mesas");
			});
		
			//para el boton de volver a las mesas desde el icono en el frm
			$(".irlistamesas").click(function(e){

				e.preventDefault();

				//log
				console.log("Click irlistamesas.");
		
				//eliminamos los registros temporales
				fEliminarPedTemporales();
												
				//cambiamos la pagina
				cambiarPagina("mesas");
		
				var idvendedor = localStorage.getItem("idvendedor");
		
				//si se crea el log
				$.post("php/cCrearLogRestaurante.php",{

					idvendedor: idvendedor,
					accion: "CARGAR",
					observacion:"EL USUARIO CARGO LA LISTA DE MESAS EN RESTAURANTE MOVIL."

				},function(r3){

					//log
					console.log("Log cCrearLogRestaurante Listar: ");
					console.log(r3);
				});

			});
												
			//funcion para el boton salir
			$(".mbtnsalir").click(function(e){
												
				e.preventDefault();
		
				//salimos de sesion
				$.post("php/cCerrarSesion.php",{
		
					idvendedor:	localStorage.getItem("idvendedor")		
		
				},function(r){
					
					//log
					console.log("Log Data mbtnsalir: ");
					console.log(r);
		
					//localStorage
					localStorage.setItem("usuariocabecera",null);
					localStorage.setItem("nombreempresa",null);
					localStorage.setItem("idvendedor",null);
					localStorage.setItem("idresolucion",null);

					location.href="../inicio/";

					//window.location.reload();
		
				});
											
			});
		
			$("#selectempresa").selectmenu({
			  nativeMenu: true
			});
		
			//funcion para cambiar (resetear) la conexion de la empresas con el selectempresa
			$("#selectempresa").change(function(){
		
				var empresa = $("#selectempresa").val();
				
				$.post("php/cambiarconexionbd.php",{empresa:empresa},function(r){
						
						//log
						console.log("Se cambió de empresa: "+empresa);
						console.log(r);
				});
			});
			$("#selectempresa").css("display","block");
			$("#selectempresa-button").css("display","none");
			
		});	
												
	</script>
	
	<title>Iniciar Sesión</title>
</head>
<body onload="deshabilitaRetroceso();">
	<div id="login" data-role="page" data-theme="a">
        <header data-role="header">
            <h1>FACILWEB</h1>
        </header>
        <div data-role="content">
			
			<center>
					<img src="../_lib/img/Logo Nuevo-STN_1_5cm.png" width="180px"/>
			</center>
			<br>
            <form id="form_login">
				
				<input type="hidden" id="idvendedor" />
				<input type="hidden" id="idresolucion" />
				<input type="hidden" id="llamarcaja" />
				
				<select id="selectempresa" name="selectempresa" style="text-align:center;">
				<?php
				if($consulta = $conexion->consulta("select nombre,nombre_empresa from empresas"))
				{
					while($r = mysqli_fetch_array($consulta))
					{
						echo "<option value='".$r[0]."'>".$r[1]."</option>";
					}
				}
				?>
				</select>
				<br>
				
				<!--<div data-role="fieldcontain" class="ui-hide-label"></div>-->
					
                 <label for="txtuser">Usuario:</label>
                 <input class="login" data-wrapper-class="ui-custom" type="text" name="txtuser" id="txtuser" value="" placeholder="Usuario"  autocomplete="off" autofocus="autofocus"/>

				
                 <label for="txtpassword">Contraseña:</label>
                 <input class="login" data-wrapper-class="ui-custom" type="password" name="txtpassword" id="txtpassword" value="" placeholder="Contraseña"   autocomplete="off"/>

				 <input  type="button" value="Ingresar" id="btnLogin" >
            </form>
             <!--<div id="errorMsg" style="background-color:red;color: #FFFFFF;">Usuario o Contraseña no valida</div>-->
			
        </div>
		
		<div data-role="footer" data-position="fixed">
	    	
		</div>
    </div>
	
    <!-- Aqui nuestro dialog con el mensaje de error  -->
    <section id="pageError" data-role="dialog">
        <header data-role="header">
            <h1>Error</h1>
        </header>
        <article data-role="content">
            <p>Usuario o contraseña no valida</p>
            <a href="#" data-role="button" data-rel="back">Aceptar</a>
        </article>
    </section>
	
	<!--INICIO PAGINA MESAS -->
	<div data-role="page" id="mesas">
		
		<!--panel -->
		<div data-role="panel" id="mypanel" data-position="left" data-display="overlay">
			<!--usuario -->
			
			<table border="0" width="100%">
				<tr>
					<td width="60px">
						<img class="menus2" src='../_lib/img/usuario.png' width='40px'/>
					</td>
					<td>
						<a class="usuariocabecera">Usuario</a>
					</td>
				</tr>
				<tr>
					<td>
						<img class="menus2" src='../_lib/img/empresa.png' width='40px'/>
					</td>
					<td>
						<a class="nombreempresa">Empresa</a>
					</td>
				</tr>
			</table>	
			<a href="#panelmenu" data-role="button" data-icon="bars" data-iconpos="right"  >La Carta - Menu</a>
			<a data-role="button" data-icon="delete" data-iconpos="right"  data-rel="close" >Cerrar panel</a>
			<a class="mbtnsalir" data-role="button"  data-icon="power" data-iconpos="right" >Salir</a>

		</div><!-- /panel -->
		
		<!--panel -->
		<div data-role="panel" id="panelmenu" data-position="right" data-display="overlay">
			<!--usuario -->
				
			<a data-role="button" data-icon="back" data-iconpos="notext"  data-rel="close" >Volver</a>
			
			<!-- POPUP PRODUCTOS -->
			<div data-role="popup" id="popupDialog" data-overlay-theme="b" data-theme="b" data-dismissible="true" >
				<div data-role="header" data-theme="a">
					<h1>Productos</h1>
				</div>
				<div role="main" class="ui-content">

					<p id="idproductosporgrupo">Aquí va la lista de productos por el grupo seleccinado.</p>
					<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cerrar</a>
				</div>
			</div>
			<center>
				<div >
					<?php
					if($consulta = $conexion->consulta("select * from grupo where mostrar='SI'"))
					{
						while($r = mysqli_fetch_array($consulta))
						{
							$idgrupo   = $r[0];
							$nomgrupo  = $r[1];
							$codigogru = $r[2];
							$imagen    = $r[3];
							
							if(!empty($imagen)){
								
								$sql = "select imagen from grupo where idgrupo=$idgrupo";
								echo "<img onclick='fListarProductos(\"".$idgrupo."\");' class='menus' src='php/cImagenMostrar.php?sql=".$sql."' width='40px'/>";
							}
						}
					}
					?>
				</div>
			</center>
			
			<div id="listaproductosgrupo" style="height:130px;"></div>
			
		</div><!-- /panel -->
		
		<div data-role="header" data-position="fixed">
			<div class="ui-grid-b">
				<div class="ui-block-a">
					<!--boton panel principal -->
					<a href="#mypanel" data-role="button" data-icon="bars" data-iconpos="notext"></a>
				</div>
				<div class="ui-block-b" style="text-align:center;padding-top:10px;">
					<span style="font-size:20px;">MESAS</span>
				</div>
				<div class="ui-block-c">
					<div class="ui-grid-a">
							<p class="status" ></p>
							<div class="container">
							  <div class="battery">
								<div class="charge"></div>
							  </div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div data-role="content" >
			
			<table border="0" width="100%">
			<tr>
			<td>
				Buscar Mesa
			</td>
			<td>
				<label id="reloj"></label>
			</td>
			<td style="text-align:right;">
				<input type="button" value="Actualizar Lista" class="btn btn-primary"  onclick="fCargarMesas();"/>
			</td>
			</tr>
			<tr>
			<td colspan="3">
			<input id='searchTerm' type='text' onkeyup='doSearch(event);' placeholder="Buscar Mesa"/>
			</td>
			</tr>
			</table>
						
			<!-- EN ESTE DIV CARGAMOS LA LISTA DE MESAS -->
			<div id="contenido" style="height:150px;"></div>
			
		</div>
		<!--
		<div data-role="footer" data-position="fixed" data-theme="a" class="pie" style="posicion:absolute;z-index:100;">
		</div>
		-->
	</div>
	<!--FIN PAGINA MESAS -->
	
	
	<!--INICIO PAGINA FRM MESA -->
	<div data-role="page" id="frmmesa">
		
		<!--panel -->
		<div data-role="panel" id="panelmesa" data-position="left" data-display="overlay">
			<!--usuario -->
			
			<table border="0" width="100%">
				<tr>
					<td width="60px">
						<img class="menus2" src='../_lib/img/usuario.png' width='40px'/>
					</td>
					<td>
						<a class="usuariocabecera">Usuario</a>
					</td>
				</tr>
				<tr>
					<td>
						<img class="menus2" src='../_lib/img/empresa.png' width='40px'/>
					</td>
					<td>
						<a class="nombreempresa">Empresa</a>
					</td>
				</tr>
			</table>	
			
			<a id="btnmesasfrm" data-role="button" data-icon="back" data-iconpos="right" >Mesas</a>
			<a data-role="button" data-icon="delete" data-iconpos="right"  data-rel="close" >Cerrar panel</a>
			<a class="mbtnsalir" data-role="button" data-icon="power" data-iconpos="right" >Salir</a>

		</div><!-- /panel -->
		
		<div data-role="header" data-position="fixed">

					<table border="0" width="100%" style="padding:0px !important;">
						<tr>
							<td width="30px">
								<!--boton panel principal -->
								<a href="#panelmesa" data-role="button" data-icon="bars" data-iconpos="notext" style="margin:0px !important;"></a>
							</td>
							<td style="text-align:center;">
								<center style="margin:0px !important;">
								<fieldset data-role="controlgroup" data-type="horizontal"  style="margin:0px !important;">
								<a class="irlistamesas" data-role="button"  data-mini="true" style="border-radius:5px;margin:3px;"><img src="../_lib/img/scriptcase__NM__ico__NM__document_out_32.png"  width="30px"/></a>
								<a id="anularpedido" data-role="button"  data-mini="true" style="border-radius:5px;margin:3px;"><img src="../_lib/img/scriptcase__NM__ico__NM__clipboard_delete_32.png"  width="30px"/></a>
								<a id="comandapedido" data-role="button"  data-mini="true" style="border-radius:5px;margin:3px;"><img src="../_lib/img/scriptcase__NM__ico__NM__printer3_32.png"  width="30px"/></a>
								<a id="cobrarpedido" data-role="button"  data-mini="true" style="display:none;border-radius:5px;margin:3px;"><img src="../_lib/img/scriptcase__NM__ico__NM__cashier_32.png"  width="30px"/></a>
								<input id="cerrarpedido" type="button" value="Cerrar Pedido" class="btn btn-primary"/>
								</fieldset>
								</center>
							</td>
						</tr>
					</table>
		</div>
		<div data-role="content" >
			
			<!-- EN ESTE DIV CARGAMOS EL DETALLE DEL PEDIDO DE LA MESA -->
			<div id="contenidomesa">
				<input type="hidden" id="idmesa" />
				<input type="hidden" id="idpedido" />
				
				<table border="0" width="100%">
					<tr>
						<td colspan="3">
							<b><span id="frmnumpedido"></span></b>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<b><span id="mesaseleccionada"></span></b>
						</td>
					</tr>
					<tr>
						<td>
							<input type="button" value="X" class="btn btn-danger" onclick="$('#rautocompletar').html('');$('#buscarproducto').val('');"/>
						</td>
						<td>
							<input type="text" id="buscarproducto" name="buscarproducto"  placeholder="DIGITE MINIMO 3 CARACTERES" />
						</td>
						<td style="text-align:right;">
							<input type="button" value="Buscar" class="btn btn-primary" onclick="fBuscarProducto2();"/>
						</td>
					</tr>
				</table>
				
				
				<div id="rautocompletar"></div>
				<div id="detallepedido" style='overflow:auto;width:100%;height:460px;'></div>
			</div>
			
		</div>
		<!--
		<div data-role="footer" data-position="fixed" data-theme="a" class="pie">
			<center>
				<div>

				</div>
			</center>
		</div>
		-->
	</div>
	<!--FIN PAGINA FRM MESA -->
</body>
</html>