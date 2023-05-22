<?php
session_start();
if(!isset($_SESSION["pseudo"])){
    header("location:connexion.php");
}
$idu = $_SESSION["idu"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bonjour <?=$_SESSION["pseudo"]?>,<br>
    <a href="affichage.php">Historique des tests</a>
         <br>
    <a href="deconnexion.php">Deconnexion</a>
    <h1>QCM : REPONDEZ AUX QUESTIONS</h1><hr>
    <form action="reponse.php" method="post">
    <?php
    include "connect.php";
    $requete = "select * from questions order by rand() limit 10";
    $resultat = mysqli_query($id, $requete); //execution de la requete
    $i = 1;

    while($ligne = mysqli_fetch_assoc($resultat)){
        echo "<p>$i) ".$ligne["libelleQ"]."</p>";
        $idq = $ligne["idq"];
        $requete2 = "select * from reponses where idq = $idq";
        $resultat2 = mysqli_query($id, $requete2);
        while($ligne2 = mysqli_fetch_assoc($resultat2)){
            $idr = $ligne2["idr"];
            echo '<input type="radio" name="'.$idq.'" value="'.$idr.'" checked>'.$ligne2["libeller"]."<br>";
        }
        $i++; 
    }

    ?>
    <p><input type="submit" value="Valider"></p>
    </form>
    
</body>
</html>