<?php
    session_start();

        if((!isset($_SESSION['udanarejestracja'])))
        {
        header('Location: index.php');   
        exit();
        }
        else
        {
            unset($_SESSION['udanarejestracja']);
        }

        //usuwamy zmienne pamietyajcych wartosci wpsiane do formularza
if(isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);

//usuwanbue bledow rejestracji
if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
if(isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
    <title>TODO</title>
</head>

    <body>
        <h1 class="logo">Dziękujemy za rejestracje w serwisie! Możesz juz zalogowac sie na swoje konto</h1>
        <br><br>

        <a href="index.php" class="neon-button"> Zaloguj sie na swoje konto </a>
        <br><br>

    </body>
</html>