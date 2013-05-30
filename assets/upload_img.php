<?php
include("lib.php");
include("auth.php");

$allowedExts = array("jpg");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["size"] < 10000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Codi d'error: " . $_FILES["file"]["error"] . "<br>";
    echo "Parla amb l'administrador";
    }
  else
    {
    echo "Arxiu: " . $_FILES["file"]["name"] . "<br>";
    echo "Tipus: " . $_FILES["file"]["type"] . "<br>";
    echo "Tamany: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Arxiu Temporal: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../profile_images/" . $_SESSION["data"]["username"] . ".jpg"))
      {
      unlink("../profile_images/" . $_SESSION["data"]["username"] . ".jpg");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../profile_images/" . $_SESSION["data"]["username"] . ".jpg");
      header("location:../profile.php");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../profile_images/" . $_SESSION["data"]["username"] . ".jpg");
      header("location:../profile.php");
      }
    }
  }
else
  {
  echo "L'arxiu que has penjat ha de ser una imatge emb extensió .jpg";
  }
?>
<html>
    <head>
        <link type="text/css" href="assets/style.css" />
    </head>
</html>