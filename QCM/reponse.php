<?php
session_start();
$idu =  $_SESSION["idu"];
//var_dump($_POST);
include "connect.php";
echo "Bonjour ".$_SESSION["pseudo"].", voici le résultat<br>";
$note = 0;
foreach($_POST as $cle=>$val){
    $requete = "select * from reponses where idr=$val";
    $resultat = mysqli_query($id, $requete);
    $ligne = mysqli_fetch_assoc($resultat);
    if($ligne["verite"] == 1) {
        $note += 2;
    }else{
        
        $requete2 = "select * from questions where idq=$cle";
        $resultat2 = mysqli_query($id, $requete2);
        $ligne2 = mysqli_fetch_assoc($resultat2);
        echo "<p>Tu t'es planté à la question <b>".$ligne2["libelleQ"]."</b>";
        $requete2 = "select * from reponses where idq=$cle and verite='1'";
        $resultat2 = mysqli_query($id, $requete2);
        $ligne2 = mysqli_fetch_assoc($resultat2);
        echo "<br>Il fallait répondre : <b>".$ligne2["libeller"]."</b></p>";
    }
}
echo "<h3>Note finale $note/20</h3>";

$req = "insert into resultats values (null, '$idu', '$note', now())";
mysqli_query($id, $req);
?>
<br><br>
<a href="deconnexion.php">Deconnexion</a>


