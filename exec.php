<?php
	shell_exec("C:/xampp/htdocs/_lib/prod/third/wkhtmltopdf/win/wkhtmltopdf  --quiet --margin-top 0 --margin-left 3mm --margin-right 3 --page-width 80mm --page-height 200mm --margin-bottom 0  http://localhost:9192/frm_pos_impresion_html_pdf/index.php?idfactura=156 C:/xampp/htdocs/tmp/2.pdf");

	$nombre_archivo = "C:/xampp/htdocs/tmp/2.cmd";


	if($archivo = fopen($nombre_archivo, "a"))
	{
		if(fwrite($archivo,'"C:/Program Files (x86)/Adobe/Reader 9.0/Reader/AcroRd32.exe" /n /s /h /t "C:/xampp/htdocs/tmp/2.pdf" "\\\\solucionesn\\pos"'))
		{
			echo "Se ha ejecutado correctamente";
		}
		else
		{
			echo "Ha habido un problema al crear el archivo";
		}

		fclose($archivo);
	}


	//shell_exec('"C:/Program Files (x86)/Adobe/Reader 9.0/Reader/AcroRd32.exe" /n /s /h /t "C:/xampp/htdocs/tmp/2.pdf" "\\\\solucionesn\\pos"');
?>

<script language="javascript" type="text/javascript">
function openCalc()
{
       var shell = new ActiveXObject("Wscript.shell");
       shell.run("C:/xampp/htdocs/tmp/2.cmd");
}
openCalc();
</script> 