<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo CRUD PHP-DTC</title>
</head>
<body>
    <a href="add.php">Add</a>
    <table>
        <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <?php
             
                require 'database.php';

                $sql = "SELECT * FROM php";

                $result = mysqli_query($connexion, $sql);

                if (mysqli_num_rows($result) > 0) 
                {
                    while($ligne = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                         
                        echo sprintf("<td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td>",$ligne['nom'],$ligne['prenom'],$ligne['age'],$ligne['telephone'],$ligne['adresse']);

                        echo sprintf('<td><a href="%s">update</a></td><td><a href="%s">delete</a></td>',"update.php","delete.php");

                        echo "</tr>";
                    }
                }

            ?>
        </tbody>
    </table>
</body>
</html>