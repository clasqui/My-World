<?php
include("lib.php");
include("auth.php");

$message = $_REQUEST["message"];
$user = $_SESSION["data"]["username"];
$day = date("Y/m/d");

if(strlen($message) == 0){
    header("location:../index.php?error=publi");
    exit();
}

if(!mysql_query("INSERT INTO posts (content, user, date) VALUES ('$message', '$user', '$day')")){
    header("location:../index.php?error=publi");
    exit();
}else{
    header("location:../index.php");
}

?>