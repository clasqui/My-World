<?php
//Inicialització de la base de dades
mysql_connect("localhost","root","marc112009");
mysql_select_db("webapp");

/*
function get_user_data($username){
    $resultat = mysql_query("SELECT * FROM usuaris WHERE username = '$username'") or die("No s'ha pogut consultar");
    $user_data = mysql_fetch_array($resultat);
    return $user_data;
    
}
*/

function auth_user($user, $password){
    $resultat = mysql_query("SELECT * FROM usuaris WHERE username ='$user' AND password ='$password' AND active =1");
    if (mysql_affected_rows() != 0) {
        return true;
    }else{
        return false;
    }
    
}

function update_user_data(){
    $uid = $_SESSION["data"]["uid"];
    $resultat = mysql_query("SELECT * FROM usuaris WHERE uid = '$uid'") or die("No s'ha pogut consultar");
    $user_data = mysql_fetch_array($resultat, MYSQL_ASSOC);
    $_SESSION["data"] = $user_data;
    mysql_free_result($resultat);
}

function get_public_data($user){
    $resultat = mysql_query("SELECT * FROM usuaris WHERE username = '$user'") or die("No s'ha pogut consultar");
    if(mysql_affected_rows() == 0){
        return false;
    }else{
    $public_data = mysql_fetch_array($resultat, MYSQLI_ASSOC);
    return $public_data;
    mysql_free_result($resultat);
    }
}

function howmany_files($user)  {
    $directorio=opendir("files/$user/");
    $count = 0;
        while ($archivo = readdir($directorio))
            if ($archivo == "." or $archivo == ".."){
                continue;
            }else{
            $count = ++$count;
            }
        closedir($directorio);
    return $count;
}

function show_profile_img($user){
    return "<img class='profile_img' src='/profile_images/" . $user . ".jpg' />";
}
?>