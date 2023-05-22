<?php
session_start();
$idu = $_SESSION["idu"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <h1>Liste des résultats</h1><hr>
    <table>
        <tr>
        <th> # </th><th>ID User</th><th>Note</th>
        <th>Date</th>
        </tr>
    <?php
       include "connect.php";
        //Execution d'une requete sur le serveur
        $resultat = mysqli_query($id, "select * from resultats order by date desc");
        if($_SESSION["niveau"] == 1){
            $resultat = mysqli_query($id, "select * from resultats 
                                             where idu = $idu
                                             order by date desc");
        }
        
        while($ligne = mysqli_fetch_assoc($resultat))
        {
        echo "<tr class='lignes'>
                <td>".$ligne["idqcm"]."</td>
                <td>".$ligne["idu"]."</td>
                <td>".$ligne["note"]."</td>
                <td>".$ligne["date"]."</td>    
            </tr>";
        }
        
    ?>
    </table>
</body>
</html>