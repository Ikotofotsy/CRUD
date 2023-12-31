<?php

    require 'database.php';
    require 'validation.php';
    require 'error.php';

    

    if(isset($_POST['reset'])){
        header('location:index.php');
    }

    if(isset($_POST['submit']))
    {
        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['age']) && !empty($_POST['age']) && isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['mail']) && !empty($_POST['mail']))
        {
            if(valideName($_POST['nom'])) $nom = $_POST['nom'];
            if(valideLastName($_POST['prenom'])) $prenom = $_POST['prenom'];
            if(valideAge($_POST['age'])) $age = $_POST['age'];
            if(validePhone($_POST['telephone'])) $telephone = $_POST['telephone'];
            if(filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL)) $mail =$_POST['mail'];

            if(isset($nom) && isset($prenom) && isset($age) && isset($telephone) && isset($mail)){
                $sql = sprintf("INSERT INTO php(nom,prenom,age,telephone,adresse) VALUES ('%s','%s',%d,'%s','%s')",$nom,$prenom,$age,$telephone,$mail);

                if(mysqli_query($connexion,$sql)) header('location:index.php');
                else alertError($errorRequest['insert']);

            }
            
        }
        else alertError($errorValidation['empty']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body class="container pt-5">
    <form action="add.php" method="POST">
        <div>
            <label for="" class="form-label">Nom</label>
            <input class="form-control" type="text" name="nom" value="<?=$_POST['nom']??''?>">
            <?php if(isset($_POST['nom']) && !empty($_POST['nom']) && !valideName($_POST['nom'])):?>
                <div class="alert alert-warning"><?=$errorValidation['nom']?></div>
            <?php endif?>
        </div>
        <div>
            <label for="" class="form-label">Prenomns</label>
            <input class="form-control" type="text" name="prenom" value="<?=$_POST['prenom']??''?>">
            <?php if(isset($_POST['prenom']) && !empty($_POST['prenom']) && !valideLastName($_POST['prenom'])):?>
                <div class="alert alert-warning"><?=$errorValidation['prenom']?></div>
            <?php endif?>
        </div>
        <div>
            <label for="" class="form-label">Age</label>
            <input class="form-control" type="text" name="age" value="<?=$_POST['age']??''?>">  
            <?php if(isset($_POST['age']) && !empty($_POST['age']) && !valideAge($_POST['age'])):?>
                <div class="alert alert-warning"><?=$errorValidation['age']?></div>
            <?php endif?>  
        </div>
        <div>
            <label for="" class="form-label">Telephone</label>
            <input class="form-control" type="text" name="telephone" value="<?=$_POST['telephone']??''?>">
            <?php if(isset($_POST['telephone']) && !empty($_POST['telephone']) && !validePhone($_POST['telephone'])):?>
                <div class="alert alert-warning"><?=$errorValidation['telephone']?></div>
            <?php endif?> 
        </div>
        <div>
            <label for="" class="form-label">Mail</label>
            <input class="form-control" type="text" name="mail" value="<?=$_POST['mail']??''?>">
            <?php if(isset($_POST['mail']) && !empty($_POST['mail']) && !filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL)):?>
                <div class="alert alert-warning"><?=$errorValidation['mail']?></div>
            <?php endif?> 
        </div>
        <div>
            <button class="btn btn-info" name="submit" type="submit">Ajouter</button>
            <button class="btn btn-danger" name="reset" type="submit">Annuler</button>
        </div>
    </form>
</body>
</html>