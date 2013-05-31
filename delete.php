<?php

include("assets/lib.php");
include("assets/auth.php");
if($isLogged == false){ header("location:index.php"); }

$uid = $_SESSION["data"]["uid"];
$username = $_SESSION["data"]["username"];
$result = mysql_query("DELETE FROM usuaris WHERE uid='$uid'") or die("No s'han pogut borrar les dades.");
$result2 = mysql_query("DELETE FROM posts WHERE user='$username'") or die("No s'han pogut borrar les dades.");
chdir("files/") or die("No s'ha pogut anar al directori files/");

function eliminarDir($carpeta)
{
    foreach(glob($carpeta . "/*") as $archivos_carpeta){
     
    if (is_dir($archivos_carpeta)){
        eliminarDir($archivos_carpeta);
    }
    else{
        unlink($archivos_carpeta);
    }
}
 
rmdir($carpeta);
}

eliminarDir($username);

mysql_free_result($result);
session_destroy();

header("location:index.php");

?>