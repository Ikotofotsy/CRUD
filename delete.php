<?php 

    require 'database.php';

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = sprintf('DELETE FROM php WHERE id=%d', $id);

        if(mysqli_query($connexion,$sql)) header('location:index.php');
            else alertError($errorRequest['delete']);
    }