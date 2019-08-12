<?php
error_reporting(0);

$host="localhost";
$username="Rafael_Liu";
$password="123123";
$database="proshop";

$link = mysqli_connect($host,$username,$password,$database);
if($link == false){
    header("location:sitedown.php");
}
$link->autocommit(true);

error_reporting(E_ALL);



?>
