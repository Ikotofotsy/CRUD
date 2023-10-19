<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo CRUD PHP-DTC</title>
     <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body class="container">
    <div class="d-grid">
        <button class="btn btn-secondary btn-block">
            <a style="text-decoration:none;color:white"href="add.php">AJOUT</a>
        </button>
    </div>
    
    
    <table class="table table-hover">
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

                        echo sprintf('<td><a class="btn btn-info" href="%s">MAJ</a></td><td><a class="btn btn-danger" onClick="return confirm(\'Etes-vous sure de supprimer cet element?\');" href="%s">SUP</a></td>',"update.php?id=".$ligne['id'],"delete.php?id=".$ligne['id']);

                        echo "</tr>";
                    }
                }

            ?>
        </tbody>
    </table>
</body>
</html>