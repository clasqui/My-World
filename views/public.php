<?php
$public_profile = get_public_data($_GET["public"]);
$public_username = $public_profile["username"];
?>
<?php echo show_profile_img($public_username); ?><h1><?php echo "Perfil de " . $public_profile['name']; ?></h1><br>
<p><?php echo $public_profile["bio"]; ?></p>
<p>Nom d'usuari: <?php echo $public_profile["username"]; ?></p>
<p>Correu electrònic: <?php echo $public_profile["email"]; ?></p>
<p>Arxius Pujats: <?php echo howmany_files($public_profile["username"]) ?></p>
<div id="posts">
        <h2>Últimes publicacions</h2>
        <?php
        
        $posts = mysql_query("SELECT content, user, time FROM posts WHERE user = '$public_username' ORDER BY time DESC");
        while ($post = mysql_fetch_array($posts,MYSQLI_ASSOC)){
            $post_user = $post['user'];
            $post_content = $post['content'];
            $post_date = $post['time'];
            echo "<h4> $post_user </h4>";
            echo "<div id ='post'> $post_content </div>";
            echo "<small> $post_date </small><br>";
        }
            
        mysql_free_result($posts);
            
        ?>
            
</div>