<?php
    $hostname = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'dtc';

    $connexion = mysqli_connect($hostname,$user,$pass,$database);
    
    if(!$connexion) die();

    