<?php

function test($checked){
	echo("test");
	echo($checked);
}

if($_POST['action'] == 'test'){
	$checked = $_POST['list'];
	test($checked);
}

?>