<?php
include("lib.php");
include("auth.php");

$file = $_POST["file"];
if(!chdir("../files/" . $_SESSION["data"]["username"] . "/")){
    $response = "No s'ha pogut accedir al directori de l'usuari";
}else{
if(!unlink($file)){
    $response = "No s'ha pogut borrar l'arxiu";
}else{
    $response = "Arxiu $file borrat correctament";
}
}
echo $response;

?>