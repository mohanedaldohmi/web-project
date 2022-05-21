<?php

define("DSN","mysql:host=localhost;dbname=games;charset=utf8");
define("USER","root");
define("PASS","");


$opts=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");

try{
	$con=new PDO(DSN,USER,PASS,$opts);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}
?>