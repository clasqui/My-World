<?php

include("assets/lib.php");
include("assets/auth.php");

//Comprobació de uqe s'ha rebut el token
if(!isset($_GET["token"])) {
    header("location: index.php");
    exit(0);
}

//Assignació
$token = $_GET["token"];
?>
<html>
    <head>
        <title>Confirmació del compte</title>
    </head>
    <body>
        
    

<?php
//Busquem l'usuari
$resultat1 = mysql_query("SELECT * FROM usuaris WHERE security_token = '$token'");
    if (mysql_affected_rows() == 0) {
        header("location: index.php");
        exit(0);
    }else{
        $user = mysql_fetch_array($resultat1, MYSQL_ASSOC);
        if($user["active"] == 1){
            echo "Aquest usuari ja s'ha activat.  <a href='index.php'>Inici</a>";
        }else{
            $resultat2 = mysql_query("UPDATE usuaris SET active = 1 WHERE security_token = '$token'") or die("No s'ha pogut activar");
            echo "El teu compte ha estat activiat correctament!  <a href='index.php'>Inicia sessió</a> ara";
        }
    }

    



?>
    </body>
</html>
