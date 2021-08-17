<?php

/*
|-------------------------------
|	GENERAL SETTINGS
|-------------------------------
*/

$imSettings['general'] = array(
	'site_id' => '64FDD1160A4825D09C9BAEDDA236C981',
	'url' => 'http://localhost:9192/tienda/',
	'homepage_url' => 'http://localhost:9192/tienda/index.html',
	'icon' => '',
	'version' => '2020.2.2.1',
	'sitename' => 'Tienda Facilweb',
	'lang_code' => 'es-ES',
	'public_folder' => '',
	'salt' => 'vmztql83h0o37m362d12kf5fnodp5tknvksu4wtyk888sdp935l0',
	'use_common_email_sender_address' => false,
	'common_email_sender_addres' => ''
);
/*
|-------------------------------
|	PASSWORD POLICY
|-------------------------------
*/

$imSettings['password_policy'] = array(
	'required_policy' => false,
	'minimum_characters' => '6',
	'include_uppercase' => false,
	'include_numeric' => false,
	'include_special' => false
);
/*
|-------------------------------
|	Captcha
|-------------------------------
*/ImTopic::$captcha_code = "		<div class=\"x5captcha-wrap\">
			<label>Palabra de control:</label><br />
			<input type=\"text\" class=\"imCpt\" name=\"imCpt\" maxlength=\"5\" />
		</div>
";


$imSettings['admin'] = array(
	'icon' => 'admin/images/logo_tcmzwy4i.png',
	'notification_public_key' => '4baff899e0c8c328',
	'notification_private_key' => '63927fea6a9e7fc1',
	'enable_manager_notifications' => false,
	'theme' => 'orange',
	'extra-dashboard' => array(),
	'extra-links' => array()
);


/*
|--------------------------------------------------------------------------------------
|	DATABASES SETTINGS
|--------------------------------------------------------------------------------------
*/

$imSettings['databases'] = array(
	'dvb9qbit' => array(
		'description' => 'facilweb',
		'host' => 'localhost:3311',
		'database' => 'facilweb_tienda',
		'user' => 'root',
		'password' => '.facilweb2020',
		'table_prefix' => ''
	)
);
$ecommerce = Configuration::getCart();
// Setup the coupon data
$couponData = array();
$couponData['products'] = array();
// Setup the cart
$ecommerce->setPublicFolder('');
$ecommerce->setCouponData($couponData);
$ecommerce->setSettings(array(
	'page_url' => 'http://localhost:9192/tienda/cart/index.html',
	'force_sender' => false,
	'mail_btn_css' => 'display: inline-block; text-decoration: none; color: rgba(255, 255, 255, 1); background-color: rgba(194, 212, 78, 1); padding: 6px 20px 6px 20px; border-style: solid; border-width: 2px 2px 2px 2px; border-color: rgba(255, 255, 255, 1) rgba(255, 255, 255, 1) rgba(255, 255, 255, 1) rgba(255, 255, 255, 1); border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;',
	'email_opening' => 'Estimado cliente,<br /><br />Gracias por su pedido Se le recordamos de que el pago no ha todavía sido recibido.<br /><br />A continuación encontrará una lista de los productos pedidos, la información de facturación y de envío y las instrucciones para efectuar el pago.',
	'email_closing' => 'Póngase en contacto con nosotros si requiere información adicional.<br /><br />Atentamente, el personal de Ventas.',
	'email_payment_opening' => 'Estimado cliente,<br /><br />Gracias por su compra. Se le confirmamos que el pago ha sido recibido y que el pedido será procesado lo antes posible.<br /><br />A continuación encontrará una lista de los productos pedidos y la información de facturación y de envío.',
	'email_payment_closing' => 'Estamos a su disposición si necesita más información.<br /><br />Un cordial saludo, el Equipo de Ventas',
	'email_digital_shipment_opening' => 'Estimado Cliente,<br /><br />muchas gracias por su compra. Aquí le presentamos la lista de enlaces de descarga correspondientes a los productos solicitados:',
	'email_digital_shipment_closing' => 'Estamos a su disposición si necesita más información.<br /><br />Un cordial saludo, el Equipo de Ventas',
	'email_physical_shipment_opening' => 'Estimado Cliente,<br /><br />muchas gracias por su compra. A continuación, la lista de productos enviados:',
	'email_physical_shipment_closing' => 'Estamos a su disposición si necesita más información.<br /><br />Un cordial saludo, el Equipo de Ventas',
	'sendEmailBeforePayment' => true,
	'sendEmailAfterPayment' => false,
	'useCSV' => false,
	'header_bg_color' => 'rgba(194, 212, 78, 1)',
	'header_text_color' => 'rgba(255, 255, 255, 1)',
	'cell_bg_color' => 'rgba(255, 255, 255, 1)',
	'cell_text_color' => 'rgba(0, 0, 0, 1)',
	'availability_reduction_type' => 1,
	'border_color' => 'rgba(239, 239, 239, 1)',
	'owner_email' => 'facilweb@solucionesnavarro.com',
	'vat_type' => 'included',
	'availability_image' => 'cart/images/cart-available.png'
));

$ecommerce->setPriceFormatData(array(
	'decimals' => 2,
	'decimal_sep' => '.',
	'thousands_sep' => '',
	'currency_to_right' => true,
	'currency_separator' => ' ',
	'show_zero_as' => '0',
	'currency_symbol' => '$',
	'currency_code' => 'COP',
	'currency_name' => 'Colombia, Peso Colombiano',
));

$ecommerce->setProductsData(array(
	'e1hsqkqy' => array(
		'id' => 'e1hsqkqy',
		'singleFullPrice' => 336.13,
		'singleFullPricePlusVat' => 400,
		'image' => 'images/pr01.jpg',
		'digital' => false,
		'description' => ''
	),
	'gqxywa79' => array(
		'id' => 'gqxywa79',
		'singleFullPrice' => 193.28,
		'singleFullPricePlusVat' => 230,
		'image' => 'images/pr02.jpg',
		'digital' => false,
		'description' => ''
	),
	'pxpsobx2' => array(
		'id' => 'pxpsobx2',
		'singleFullPrice' => 462.18,
		'singleFullPricePlusVat' => 550,
		'image' => 'images/pr03.jpg',
		'digital' => false,
		'description' => ''
	),
	'hjqwjyrz' => array(
		'id' => 'hjqwjyrz',
		'singleFullPrice' => 588.24,
		'singleFullPricePlusVat' => 700,
		'image' => 'images/pr04.jpg',
		'digital' => false,
		'description' => '',
		'discount' => array(
			'type' => 'relative',
			'amount' => 0.5
		)
	),
	'bq6g9rbv' => array(
		'id' => 'bq6g9rbv',
		'singleFullPrice' => 142.86,
		'singleFullPricePlusVat' => 170,
		'image' => 'images/pr05.jpg',
		'digital' => false,
		'description' => ''
	),
	'l0b06r5n' => array(
		'id' => 'l0b06r5n',
		'singleFullPrice' => 193.28,
		'singleFullPricePlusVat' => 230,
		'image' => 'images/pr06.jpg',
		'digital' => false,
		'description' => ''
	),
	'8x0s1zqy' => array(
		'id' => '8x0s1zqy',
		'singleFullPrice' => 159.66,
		'singleFullPricePlusVat' => 190,
		'image' => 'images/pr12.jpg',
		'digital' => false,
		'description' => ''
	),
	'bogb4zox' => array(
		'id' => 'bogb4zox',
		'singleFullPrice' => 294.12,
		'singleFullPricePlusVat' => 350,
		'image' => 'images/pr13.jpg',
		'digital' => false,
		'description' => '',
		'discount' => array(
			'type' => 'relative',
			'amount' => 0.35
		)
	),
	'lilnmnel' => array(
		'id' => 'lilnmnel',
		'singleFullPrice' => 218.49,
		'singleFullPricePlusVat' => 260,
		'image' => 'images/pr14.jpg',
		'digital' => false,
		'description' => '',
		'discount' => array(
			'type' => 'relative',
			'amount' => 0.5
		)
	),
	'qpplxy27' => array(
		'id' => 'qpplxy27',
		'singleFullPrice' => 277.31,
		'singleFullPricePlusVat' => 330,
		'image' => 'images/pr07.jpg',
		'digital' => false,
		'description' => '',
		'discount' => array(
			'type' => 'relative',
			'amount' => 0.5
		)
	),
	'0ovw2yfc' => array(
		'id' => '0ovw2yfc',
		'singleFullPrice' => 75.63,
		'singleFullPricePlusVat' => 90,
		'image' => 'images/pr08.jpg',
		'digital' => false,
		'description' => ''
	),
	'93etb95m' => array(
		'id' => '93etb95m',
		'singleFullPrice' => 163.87,
		'singleFullPricePlusVat' => 195,
		'image' => 'images/pr09.jpg',
		'digital' => false,
		'description' => ''
	),
	'qn5ukhl1' => array(
		'id' => 'qn5ukhl1',
		'singleFullPrice' => 546.22,
		'singleFullPricePlusVat' => 650,
		'image' => 'images/pr09.jpg',
		'digital' => false,
		'description' => '',
		'discount' => array(
			'type' => 'relative',
			'amount' => 0.5
		)
	),
	'wf8g2cle' => array(
		'id' => 'wf8g2cle',
		'singleFullPrice' => 138.66,
		'singleFullPricePlusVat' => 165,
		'image' => 'images/pr10.jpg',
		'digital' => false,
		'description' => ''
	)
));
$ecommerce->setPaymentData(array(
	'8dkejfu5' => array(
		'id' => '8dkejfu5',
		'name' => 'Transferencia bancaria',
		'description' => 'Pague más tarde mediante transferencia bancaria.',
		'email_text' => 'Estos son los datos necesarios para realizar el pago por transferencia bancaria:

XXX YYY ZZZ

Tenga en cuenta que una vez completado el pago, debe enviar una copia del recibo junto con el número de pedido.',
		'enableAfterPaymentEmail' => false
	),
	'l40y53xi' => array(
		'id' => 'l40y53xi',
		'name' => 'Tarjeta de Crédito',
		'description' => ' Tarjétas de Crédito',
		'email_text' => '',
		'enableAfterPaymentEmail' => false
	)));
$ecommerce->setShippingData(array(
	'j48dn4la' => array(
		'id' => 'j48dn4la',
		'name' => 'Correo',
		'description' => 'La mercancía se entregará en 3-5 días.',
		'email_text' => 'Envío por Correo.\\nLa mercancía se entregará en 3-5 días.'
	),
	'hdj47dut' => array(
		'id' => 'hdj47dut',
		'name' => 'Envío urgente',
		'description' => 'La mercancía se entregará en 1-2 días.',
		'email_text' => 'Envío por Envío urgente.\\nLa mercancía se entregará en 1-2 días.'
	)));

/*
|-------------------------------------------------------------------------------------------
|	GUESTBOOK SETTINGS
|-------------------------------------------------------------------------------------------
*/

$imSettings['guestbooks'] = array();

/*
|-------------------------------------------------------------------------------------------
|	Dynamic Objects SETTINGS
|-------------------------------------------------------------------------------------------
*/

$imSettings['dynamicobjects'] = array(	'template' => array(
),
	'pages' => array(

	));


/*
|-------------------------------
|	EMAIL SETTINGS
|-------------------------------
*/

$ImMailer->emailType = 'phpmailer';
$ImMailer->exposeWsx5 = true;
$ImMailer->header = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . "\n" . '<html>' . "\n" . '<head>' . "\n" . '<meta http-equiv="content-type" content="text/html; charset=utf-8">' . "\n" . '<meta name="generator" content="Incomedia WebSite X5 Professional 2020.2.2 - www.websitex5.com">' . "\n" . '</head>' . "\n" . '<body bgcolor="#37474F" style="background-color: #37474F;">' . "\n\t" . '<table border="0" cellpadding="0" align="center" cellspacing="0" style="padding: 0; margin: 0 auto; width: 700px;">' . "\n\t" . '<tr><td id="imEmailContent" style="min-height: 300px; padding: 10px; font: normal normal normal 12pt \'Poppins\'; color: #000000; background-color: #FFFFFF; text-decoration: none; text-align: left; width: 700px; border-style: solid; border-color: #000000; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; background-color: #FFFFFF" width="700px">' . "\n\t\t";
$ImMailer->footer = "\n\t" . '</td></tr>' . "\n\t" . '</table>' . "\n" . '<table width="100%"><tr><td id="imEmailFooter" style="font: normal normal normal 9pt \'Poppins\'; color: #FFFFFF; background-color: transparent; text-decoration: none; text-align: center;  padding: 10px; margin-top: 5px;background-color: transparent">' . "\n\t\t" . 'Este e-mail incluye información exclusiva para el destinatario mencionado anteriormente.<br>Si lo ha recibido por error, notifíqueselo inmediatamente al remitente y destrúyalo sin copiarlo.' . "\n\t" . '</td></tr></table>' . "\n\t" . '</body>' . "\n" . '</html>';
$ImMailer->bodyBackground = '#FFFFFF';
$ImMailer->bodyBackgroundEven = '#FFFFFF';
$ImMailer->bodyBackgroundOdd = '#F0F0F0';
$ImMailer->bodyBackgroundBorder = '#CDCDCD';
$ImMailer->bodyTextColorOdd = '#000000';
$ImMailer->bodySeparatorBorderColor = '#000000';
$ImMailer->emailBackground = '#37474F';
$ImMailer->emailContentStyle = 'font: normal normal normal 12pt \'Poppins\'; color: #000000; background-color: #FFFFFF; text-decoration: none; text-align: left; ';
$ImMailer->emailContentFontFamily = 'font-family: Poppins;';

// End of file x5settings.php