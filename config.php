<?php
$host ="localhost";
$dbname ="club";
$dbuser ="root";
$dbpass ="";

$conn = mysqli_connect($host, $dbuser, $dbpass,$dbname);

if(!$conn){
    exit("Error:connection not established!!");
}
?>