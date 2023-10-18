<?php
    $errorValidation = [
        'nom'=> 'Veuillez saisir un nom tout en majuscule!',
        'prenom'=> 'Votre prenom doit comporter uniquement des lettres de l\'alphabet',
        'age'=> 'Age invalide',
        'telephone'=> 'Telephone invalide',
        'mail'=> 'Mail invalide',
        'empty'=> 'Veuillez remplir toutes les champs'
    ];

    $errorRequest = [
        'insert'=> 'Erreur d\'insertion!'
    ];
    function alertError($error)
    {
        echo sprintf("<script>alert('%s');</script>",$error);
    }