<?php
include("assets/lib.php");
include("assets/auth.php");
if ( $isLogged == false ){ header("location: index.php"); }

?>
<html>
    <head>
        <title>MY PROFILE</title>
        <link type="text/css" rel="stylesheet" href="assets/style.css" />
        <script type="text/javascript" src="assets/basic.js"></script>
        <script type="text/javascript" src="assets/jquery-1.9.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#ch-bio").click(function(){
                    document.getElementById("prof-bio").innerHTML = "<form action='change.php' method='post'><textarea name='bio' cols='45' rows='5'><?= $_SESSION["data"]["bio"]; ?></textarea><input type='submit' value='Canvia' /></form>";
                });
            });
        </script>
    </head>
    <body>
        <header id="header"><div id="logo"><a href="/">MY WORLD</a></div><div id="nom"><?php echo $_SESSION["data"]["name"]; ?></div></header>
        <div id="main">
            <?php
            if(isset($_GET["public"]) && $_GET["public"] != "" && get_public_data($_GET["public"]) != false){
                include("views/public.php");
            }else if(isset($_GET["public"]) && $_GET["public"] != "" && get_public_data($_GET["public"]) == false){
                echo "<h2>Aquest usuari no existeix</h2>";
                
            }else{
            
            ?>
        <p>
            Nom d'usuari: <?php echo $_SESSION["data"]["username"]; ?>
        </p>
        <p>
            Correu electrònic: <span id="prof-email"><?php echo $_SESSION["data"]["email"]; ?> <button value="Canvia" id="ch-email" onclick="modify('prof-email','<?php echo$_SESSION["data"]["email"]; ?>', 'email');">Canvia</button></span>
        </p>
        <p>
            Contrassenya: <span id="prof-password"><?php echo $_SESSION["data"]["password"]; ?> <button value="Canvia" id="ch-pass" onclick="modify('prof-password','<?php echo $_SESSION["data"]["password"]; ?>', 'password');">Canvia</button></span>
        </p>
        <p>
            <?php
            
            if (strlen($_SESSION["data"]["bio"]) == 0){
                echo "
                <form action='change.php' method='post'> 
                <textarea name='bio'>My bio</textarea>
                <input type='submit' value='Envia' />
                </form>
                ";
            }else{
                echo "<span id='prof-bio'>";
                echo $_SESSION["data"]["bio"];
                echo "<button value='Canvia' id='ch-bio'>Canvia</button>";
                echo "</span>";
            }
            
            
            ?>
        </p>
        
        <p>Arxius Pujats: <?php echo howmany_files($_SESSION["data"]["username"]) ?></p>
        
        <div id="upload_img">
            <?php echo show_profile_img($_SESSION["data"]["username"]); ?>&nbsp;
        <form action="assets/upload_img.php" method="post" enctype="multipart/form-data">
        <label for="file">Puja una imatge de perfil:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
        </form><br>
        </div><br>
        <p></p>
        <p>
            <a href="delete.php" id="delete" style="color:red; text-decoration: none;" onclick="return confirm('Estàs segur que vols eliminar el compte? Aquesta acció és irreversible!');">Elimina el teu compte!</a>
        </p>
        <p>
            <a href="index.php">Inici</a>
        </p>
        <?php } ?>
        </div>
    </body>
</html>