<?php
$con = new mysqli('localhost','root','','ritik_ajax',4306);


function getPost($var){
	global $con;
	$var_check = $_POST[$var] ?? null;
	$tmp_var = htmlspecialchars($var_check, ENT_QUOTES, 'UTF-8');
	return $con->real_escape_string($tmp_var);
}
function getGet($var){
	global $con;
	$var_check = $_GET[$var] ?? null;
	$tmp_var = htmlspecialchars($var_check, ENT_QUOTES, 'UTF-8');
	return $con->real_escape_string($tmp_var);
}
?>