<?php
//Conexi�
mysql_connect("localhost","root","marc112009");
mysql_select_db("myworld");

//Traspas de variables
$username = $_POST["user"];
$password = $_POST["password"];
$email = $_POST["email"];
$name = $_POST["name"];

//Comprobaci� de existencia username i email
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

//Creaci� security_token
$st = uniqid(md5($user), FALSE);  // Unique ID amb prefix md5 del nom d'usuari.

//Inserim les dades a la base de dades
mysql_query("INSERT INTO usuaris (username, password, name, email, security_token) VALUES ('$username', '$password', '$name', '$email', '$st')") or die("No s'han pogut inserir les dades a la base de dades.");

//enviem correu electr�nic
$missatge = "
Hola $name, i benvingut a MY WORLD!
Acabes de registrar-te correctament a MY WORLD amb les seg�ents dades:
Nom d'usuari: $username
Nom complet: $name
Contrassenya: $password
Correu electr�nic: $email
Ara nom�s falta que segueixis aquest enlla� per activar el teu compte:
127.0.0.1/myworld/confirmar.php?token=$st
";

$titol = "Benvingut a MY WORLD";

mail($email, $titol, $missatge);

//Creaci� carpeta d'arxius
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
        T'has registrat correctament!<br>
        Them enviat un crreu amb les dades i amb el link per activar el compte.  <br>Fins que no l'hagis activat no podr�s iniciar sessi�.
    </body>
</html>