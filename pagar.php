<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
$vdescripcion = "Soporte enero 2020 80 mas Desarrollo 50";
$vprecio      = 130;
?>

<div class="container">
<br>
<h1><?php echo $vdescripcion; ?></h1>
Precio: <?php echo $vprecio." USD"; ?>
<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/pb.zul" accept-charset="UTF-8">
<input type="image" border="0" alt="" src="https://www.payulatam.com/img-secure-2015/boton_pagar_pequeno.png" onClick="this.form.urlOrigen.value = window.location.href;"/>
<input name="buttonId" type="hidden" value="lJxY2sUne8djz829PoncMWiA9NofNU98rOxH1BS5NwWqfZ1Qd/8w0w=="/>
<input name="merchantId" type="hidden" value="558938"/>
<input name="accountId" type="hidden" value="561384"/>
<input name="description" type="hidden" value="<?php echo $vdescripcion; ?>"/>
<input name="referenceCode" type="hidden" value="<?php echo $vprecio; ?>"/>
<input name="amount" type="hidden" value="<?php echo floatval($vprecio); ?>"/>
<input name="tax" type="hidden" value="0.00"/>
<input name="taxReturnBase" type="hidden" value="0.00"/>
<input name="currency" type="hidden" value="USD"/>
<input name="lng" type="hidden" value="es"/>
<input name="sourceUrl" id="urlOrigen" value="" type="hidden"/>
<input name="buttonType" value="SIMPLE" type="hidden"/>
<input name="signature" value="05a78efcc98c9ae3e0ec94e4496f33f9f6caa50a98b92b42dc233ded3a240044" type="hidden"/>
</form>
</div>