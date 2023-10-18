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

            if(isset($nom) && isset($nom) && isset($nom) && isset($nom) && isset($nom)){
                
                $sql = sprintf("INSERT INTO php VALUES ('%s','%s',%d,'%s','%s')",$nom,$prenom,$age,$telephone,$mail);

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
</head>
<body>
    <form action="add.php" method="POST">
        <div>
            <label for="">Nom</label>
            <input type="text" name="nom" value="<?=$_POST['nom']??''?>">
            <?php if(isset($_POST['nom']) && !empty($_POST['nom']) && !valideName($_POST['nom'])):?>
                <span><?=$errorValidation['nom']?></span>
            <?php endif?>
        </div>
        <div>
            <label for="">Prenomns</label>
            <input type="text" name="prenom" value="<?=$_POST['prenom']??''?>">
            <?php if(isset($_POST['prenom']) && !empty($_POST['prenom']) && !valideLastName($_POST['prenom'])):?>
                <span><?=$errorValidation['prenom']?></span>
            <?php endif?>
        </div>
        <div>
            <label for="">Age</label>
            <input type="text" name="age" value="<?=$_POST['age']??''?>">  
            <?php if(isset($_POST['age']) && !empty($_POST['age']) && !valideAge($_POST['age'])):?>
                <span><?=$errorValidation['age']?></span>
            <?php endif?>  
        </div>
        <div>
            <label for="">Telephone</label>
            <input type="text" name="telephone" value="<?=$_POST['telephone']??''?>">
            <?php if(isset($_POST['telephone']) && !empty($_POST['telephone']) && !validePhone($_POST['telephone'])):?>
                <span><?=$errorValidation['telephone']?></span>
            <?php endif?> 
        </div>
        <div>
            <label for="">Mail</label>
            <input type="text" name="mail" value="<?=$_POST['mail']??''?>">
            <?php if(isset($_POST['mail']) && !empty($_POST['mail']) && !filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL)):?>
                <span><?=$errorValidation['mail']?></span>
            <?php endif?> 
        </div>
        <div>
            <button name="submit" type="submit">Ajouter</button>
            <button name="reset" type="submit">Annuler</button>
        </div>
    </form>
</body>
</html>