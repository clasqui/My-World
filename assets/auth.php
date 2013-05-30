<?php

//Inicialització de la base de dades
mysql_connect("localhost","root","marc112009") or die("Could not connect to the MySQL Server");
mysql_select_db("myworld") or die("Could not connect to the DB myworld");
session_start();
if (isset($_SESSION["data"])) {
    $isLogged = true;
}else {
session_destroy();
//Comprobació de la sessió.  Està loguejat?
if (count($_POST) > 1) {
if (auth_user($_POST["user"], $_POST["password"]) == true) {
    session_start();
    session_name("usuari");
    $username = $_POST["user"];
    $resultat = mysql_query("SELECT * FROM usuaris WHERE username = '$username'") or die("No s'ha pogut consultar");
    $user_data = mysql_fetch_array($resultat, MYSQL_ASSOC);
    $_SESSION["data"] = $user_data;
    $isLogged = true;    
} else {
    $isLogged = false;
}
}else{
    $isLogged = false;
}

}

?>