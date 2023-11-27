<?php
$username = 'root';
$password = '';
$server = 'localhost';
$dbname = '6thsem';

$connection = new mysqli($server,$username,$password,$dbname);
if($connection->connect_errno != 0){
	die('connection error');
}

?>