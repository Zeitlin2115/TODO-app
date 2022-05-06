<?php
    session_start();

        if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
        {
        header('Location: gra.php');   
        exit();
        }
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
        
        <h1 class="logo">TODO</h1><br>

        

        <form action="zaloguj.php" method="post">
            <h1>Login:</h1><br><input type="text" name="login" class="neon-button" ><br>
            <h1>Hasło:</h1><br><input type="password" name="haslo" class="neon-button"><br><br>
             
            <input type="submit" value="Zaloguj się" class="neon-button" />
            
           
        </form>
        <a href="rejestracja.php" class="neon-button"> Rejestracja - załóż darmowe konto! </a>
        <br><br>

    <?php
        if(isset($_SESSION['blad'])) echo $_SESSION['blad'];     
    ?>   

    </body>
</html>