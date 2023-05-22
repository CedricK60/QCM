<?php
session_start();
echo $_SESSION["pseudo"]." a été deconnecté...";
session_destroy();
header("refresh:3;url=connexion.php");
//header("location:connexion.php");
?>