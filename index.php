<?php
	
require_once "vendor/autoload.php";
require_once "homework_input.php";


$e = new EredmenyProcessor($exampleData);
$e->run();

	
?>