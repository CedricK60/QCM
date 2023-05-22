<?php
session_start();
if(isset($_POST["bout"])){
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    include "connect.php";
    $req = "select * from user
            where pseudo = '$pseudo'
            and mdp = '$mdp'";
    $res = mysqli_query($id, $req);
    
    if(mysqli_num_rows($res) > 0){
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["idu"] = $ligne["idu"];
        $_SESSION["niveau"] = $ligne["niveau"];
        
       header("location:questions.php");
    }else $erreur = "<h3>Erreur de pseudo ou de mot de passe!!!</h3>";
}
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
    <h1>Connexion au QCM</h1><hr>
    <form action="" method="post">
        <p><input type="text" name="pseudo" placeholder="Pseudo :" required></p>
        <p><input type="password" name="mdp" placeholder="Mot de passe :" required></p>
        <?php if(isset($erreur)) echo $erreur;?>
        <p><input type="submit" value="Connexion" name="bout"></p>
    </form><hr>
</body>
</html>