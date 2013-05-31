<?php
//include llibreria
include("assets/lib.php");
include("assets/auth.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>MY WORLD</title>
        <link type="text/css" rel="stylesheet" href="assets/style.css" />
        <script type="text/javascript" src="assets/basic.js"></script>
        <script type="text/javascript" src="assets/jquery-1.9.1.min.js"></script>
        
    </head>
    <body>
        <?php
        if($isLogged == false){
            
            if(isset($_GET["register"])){
                include("views/registre.php");
            }else{
                include("views/login.php");
            }
        }else{              
                
        ?>
        <header id="header"><div id="logo"><a href="/">MY WORLD</a></div><div id="nom"><?php echo $_SESSION["data"]["name"]; ?></div></header>
        
        <div id="main">
        <p>
        <?php
        echo $_SESSION["data"]["bio"];
        ?>
        <br>
        Penja un arxiu:<br>
        <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Arxiu:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
        </form>
        <P>
            Els meus arxius:<br>
        <?php
        $directorio=opendir("files/" . $_SESSION["data"]["username"] . "/");  
        while ($archivo = readdir($directorio))
            if ($archivo == "." or $archivo == ".."){
                continue;
            }else{ ?>
            <a class="file" title="Descarrega l'arxiu" href="files/<?php echo $_SESSION["data"]["username"] . "/" . $archivo; ?>"><?php echo $archivo; ?></a>&nbsp;&nbsp;&nbsp;<img src="assets/delete.png" title="Elimina l'arxiu" onclick="$.post('assets/delfile.php', {file: '<?php echo $archivo; ?>'}, function(responseTxt){ alert(responseTxt);window.location='index.php';} )" /><br>
         <?php   }
        closedir($directorio);
        ?>
        </P>

        </p>
        <p>
            <form action="assets/publicacio.php" method="post">
                <input type="text" name="message" id="post" />
                <input type="submit" value="Publica!" id="bt-publicar" />
            </form>
        </p>
        <div id="posts">
            <h2>Últimes publicacions</h2>
            <?php
            
            $posts = mysql_query("SELECT content, user, time FROM posts ORDER BY time DESC");
            while ($post = mysql_fetch_array($posts,MYSQLI_ASSOC)){
                $post_user = $post['user'];
                $post_content = $post['content'];
                $post_date = $post['time'];
                echo "<a class='unlink' href='profile.php?public=$post_user'><h4> $post_user </h4></a>";
                echo "<div class='post'> $post_content </div>";
                echo "<small class='datapost'> $post_date </small><br>";
            }
            
            mysql_free_result($posts);
            
            ?>
            
        </div>
        <p>
        <a href="profile.php">Perfil</a> | <a href="sortir.php">Sortir</a>
        </p>
        </div>
        
        <?php
        }
        ?>
    </body>
</html>