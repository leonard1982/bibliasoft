<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Name', @$_POST['imObjectForm_66_1'], '', false);
	$form->setField('Email', @$_POST['imObjectForm_66_2'], '', false);
	$form->setField('Phone', @$_POST['imObjectForm_66_3'], '', false);
	$form->setField('Request type', @$_POST['imObjectForm_66_4'], '', false);
	$form->setField('Subject', @$_POST['imObjectForm_66_5'], '', false);
	$form->setField('Your message', @$_POST['imObjectForm_66_6'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != '861E0088EC044BEB819D2F70CE521858' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner('example@example.com', 'example@example.com', '', '', false);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file