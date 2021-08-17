<?php

include ("../res/x5engine.php");
$ecommerce = Configuration::getCart();
// Check the coupon code
if (@$_GET['action'] == 'chkcpn' && isset($_POST['coupon'])) {
	header('Content-type: application/json');
	echo $ecommerce->checkCoupon($_POST['coupon']);
	exit();
}
// Get the logged user
else if (@$_GET['action'] == 'userdata') {
	$data = Configuration::getPrivateArea()->whoIsLogged();
	if (strlen(@$data['email'])) {
		$order = $ecommerce->getOrders(0, 1, $data['email']);
		if (count($order['orders'])) {
			$order = $ecommerce->getOrder($order['orders'][0]['id']);
			echo '{ "success": true, "invoiceData": ' . json_encode($order['invoice']) . ', "shippingData": ' . json_encode($order['shipping']) . '}';
		}
		else {
			echo '{ "success": true, "invoiceData": [{ "field_id":"Email", "value": "' . $data['email'] . '"},{ "field_id":"Name", "value": "' . str_replace('"', '\\"', $data['firstname']) . '"},{ "field_id":"LastName", "value": "' . str_replace('"', '\\"', $data['lastname']) . '"}]}';
		}
	} else {
		echo '{ "success": false }';
	}
	exit();
}
// Check the dynamic products status
else if (@$_GET['action'] == 'productstatus' && !isset($_POST['product_id']) && ($headers = imRequestHeaders()) !== false) {
	$token = "";
	foreach ($headers as $key => $value) {
		if (strtolower($key) == 'x-incomedia-wsx5-token') {
			$token = $value;
		}
	}
	if ($token == '662hvmztql83h0o37m362d12kf5fnodp5tknvksu4wtyk888sdp935l0') {
		header('Content-type: application/json');
		echo json_encode(array('data' => $ecommerce->getDynamicProductsStatus()));
		exit();
	}
}
// Check a single dynamic products status
else if (@$_GET['action'] == 'productstatus' && isset($_POST['product_id'])) {
	header('Content-type: application/json');
	echo $ecommerce->getDynamicProductQuantity(@$_POST['product_id']);
	exit();
}
// Download a digital product
else if (isset($_GET['download'])) {
	try {
		$ecommerce->startProductDownload($_GET['download']);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	exit();
}
else if (@$_GET['action'] == 'uploadattachment') {
	global $imSettings;
	$result = '{ "status": "no", "error" : "fileMissing" }';
	if (!empty($_FILES['attachment']['name']) && !empty($_FILES['attachment']['type'])) {
		$fileName = time() . '_' . $_FILES['attachment']['name'];
		$sourcePath = $_FILES['attachment']['tmp_name'];
		$targetFolder = pathCombine(array('../', $imSettings['general']['public_folder']));
		$targetPath = pathCombine(array($targetFolder, $fileName));
		// If the folder doesn't exists, try to create it
		if ($targetFolder != "" && $targetFolder != "/" && $targetFolder != "." && $targetFolder != ".." && $targetFolder != "./" && !file_exists($targetFolder)) {
			@mkdir($targetFolder, 0777, true);
		}
		if (!is_dir($targetFolder))
			$result = '{ "status": "no", "error" : "folderMissing" }';
		else if (!is_writable($targetFolder))
			$result = '{ "status": "no", "error" : "folderUnwritable" }';
		else if (move_uploaded_file($sourcePath, $targetPath))
			$result = '{ "status": "ok", "fileName": "'. $fileName. '" }';
		else
			$result = '{ "status": "no", "error" : "genericError" }';
		}
	header('Content-type: application/json');
	echo $result;
	exit;
}
if (@$_GET['action'] == 'sndrdr' && isset($_POST['orderData'])) {
	$orderNo = $_POST['orderData']['orderNo'];
	$ecommerce->setOrderData($_POST['orderData']);
	$ecommerce->setEncodedOrderData();
	$ecommerce->sendOwnerEmail();
	$ecommerce->sendCustomerEmail();
	header('Content-type: application/json');
	echo '{ "status": "ok", "orderNumber": "' . $orderNo . '" }';
	exit;
} else if(@$_GET['action'] == 'prddnvl') {
	$availability_data = $ecommerce->get_products_dynamic_availability();
	header('Content-type: application/json');
	echo '{ "status": "ok", "data": ' . json_encode($availability_data) . ' }';
	exit;
} else if(@$_GET['action'] == 'dscprd') {
	$discounted_products = $ecommerce->get_discounted_products();
	header('Content-type: application/json');
	echo '{ "status": "ok", "data": ' . json_encode($discounted_products) . ' }';
	exit;
} else if(@$_GET['action'] == 'srcpg') {
	$availability_data = $ecommerce->get_products_dynamic_availability();
	$discounted_products = $ecommerce->get_discounted_products();
	header('Content-type: application/json');
	echo '{ "status": "ok", "data": { "discountedProducts": ' . json_encode($discounted_products) . ', "availabilityData": ' . json_encode($availability_data) . ' } }';
	exit;
}

// End of file x5cart.php
