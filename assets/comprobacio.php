<?php

mysql_connect("localhost","root","marc112009");
mysql_select_db("webapp");

$user = $_GET["qu"];
$email = $_GET["qe"];

$result = mysql_query("SELECT * FROM usuaris WHERE username = '$user'");
if (mysql_affected_rows() > 0){
    echo "El nom d'usuari ja existeix";
    mysql_free_result($result);
}else{
    echo "El nom d'usuari està disponible!"
    mysql_free_result($result);
}

$result = mysql_query("SELECT * FROM usuaris WHERE email = '$email'");
if (mysql_affected_rows() > 0){
    echo "El correu electrònic ja està utilitzat";
    mysql_free_result($result);
}else{
    echo "El correu electrònic està disponible!"
    mysql_free_result($result);
}


?>