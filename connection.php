<?php
session_start();

$conn = mysqli_connect("localhost","root","","WebProject");
if(!$conn){
die("connection not esablished");
}else{
    echo "connection established";
}
?>
