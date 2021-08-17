<?php
include("../res/x5engine.php");
$nameList = array("tay","kgw","636","6cg","43p","djl","7n6","tz7","dsr","84a");
$charList = array("J","G","Z","F","V","T","Z","X","G","2");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
