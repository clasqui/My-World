<?php
include("assets/lib.php");
include("assets/auth.php");

//variables
$uid = $_SESSION["data"]["uid"];

//Bio
if(isset($_REQUEST["bio"])){
    $bio = $_REQUEST["bio"];
    $resultat = mysql_query("UPDATE usuaris SET bio = '$bio' WHERE uid = '$uid'");
    mysql_free_result($resultat);
}

//password
if(isset($_REQUEST["password"])){
    $password = $_REQUEST["password"];
    $resultat = mysql_query("UPDATE usuaris SET password = '$password' WHERE uid = '$uid'");
    mysql_free_result($resultat);
}

//email
if(isset($_REQUEST["email"])) {
    $email = $_REQUEST["email"];
    $resultat = mysql_query("UPDATE usuaris SET email = '$email' WHERE uid = '$uid'");
    mysql_free_result($resultat);
}

//update user data
update_user_data();

//tornem a la pàgina de perfil
header("location:profile.php");

?>