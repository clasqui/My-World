<?php
//Conexió
mysql_connect("localhost","root","marc112009");
mysql_select_db("myworld");

//Traspas de variables
$username = $_POST["user"];
$password = $_POST["password"];
$email = $_POST["email"];
$name = $_POST["name"];

//Comprobació de existencia username i email
$resultat1 = mysql_query("SELECT * FROM usuaris WHERE username = '$username'") or die("No s'ha pogut consultar");
if(mysql_affected_rows() > 0){
    header("location:index.php?register=true&error=username");
    exit();
}
mysql_free_result($resultat1);

$resultat2 = mysql_query("SELECT * FROM usuaris WHERE email = '$email'") or die("No s'ha pogut consultar");
if(mysql_affected_rows() > 0){
    header("location:index.php?register=true&error=email");
    exit();
}
mysql_free_result($resultat2);


//Inserim les dades a la base de dades
mysql_query("INSERT INTO usuaris (username, password, name, email) VALUES ('$username', '$password', '$name', '$email')") or die("No s'han pogut inserir les dades a la base de dades.");

//enviem correu electrònic
$missatge = "
Hola $name, i benvingut a MY WORLD! <br>
Acabes de registrar-te correctament a MY WORLD amb les següents dades:<br>
Nom d'usuari: $username<br>
Nom complet: $name<br>
Contrassenya: $password<br>
Correu electrònic: $email<br>
Ara ja pots anar a la pàgina de login de MY WORLD i entrar!";

$titol = "Benvingut a MY WORLD";

mail($email, $titol, $missatge);

//Creació carpeta d'arxius
if(!mkdir("files/" . $username)) {
    die("no sha pogut crear el directori");
}

?>
<html>
    <head>
        <title>Registra't correctament!</title>
        <link type="text/css" href="assets/style.css" />
    </head>
    <body>
        T'has registrat correctament!  
        T'hem enviat un correu amb les teves dades perquè no te n'oblidis.<br>
        Ara ja pots iniciar sessió desde <a href="index.php">la pàgina de login</a>.
    </body>
</html>