<?php
include("assets/lib.php");
include("assets/auth.php");

/*
 *Comprobació tipus mime per la pujada d'arxius.  eliminat perque no ho entenc.  ara només amb extensions.
 *(($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "video/x-mpeg")
|| ($_FILES["file"]["type"] == "video/quicktime")
|| ($_FILES["file"]["type"] == "audio/mpeg3")
|| ($_FILES["file"]["type"] == "video/msvideo")
|| ($_FILES["file"]["type"] == "video/avi")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/mspowerpoint")
|| ($_FILES["file"]["type"] == "audio/x-wav")
|| ($_FILES["file"]["type"] == "audio/wav")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
|| ($_FILES["file"]["type"] == "application/zip")
|| ($_FILES["file"]["type"] == "multipart/x-zip")
|| ($_FILES["file"]["type"] == "application/x-compressed"))
*/

$allowedExts = array("gif", "jpeg", "jpg", "png", "txt", "mp3", "mov", "avi", "doc", "ppt", "pps", "wav", "zip", "docx", "odt", "pdf");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["size"] < 1000000000)
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

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "files/" . $_SESSION["data"]["username"] . "/" . $_FILES["file"]["name"]);
      echo "Guardat a: " . "files/" . $_SESSION["data"]["username"] . "/" . $_FILES["file"]["name"];
      echo "<br><a href='index.php'>Torna</a>";
      }
    }
  }
else
  {
  echo "L'arxiu que intentes pujar no compleix algun dels següents requisits:<br>";
  echo "<ul><li>Tamany màxim: 1GB</li><li>Extensions permeses: gif, jpeg, jpg, png, txt, mp3, mov, avi, doc, ppt, pps, wav, zip, docx</li></ul>";
  echo "<br><a href='index.php'>Torna</a>";
  }
?>
<html>
<head>
    <link type="text/css" href="assets/style.css" />
</head>
</html>