<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "php crud";

$con = mysqli_connect($host,$user,$pass,$dbname);

if($con){

	//echo "Connection Established";

}else{
	echo "Connection Failed";
}