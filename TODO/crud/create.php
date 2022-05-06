<?php
session_start();
require_once __DIR__.'/../database.php';

if(!isset($_SESSION['zalogowany']))
{
    header('Location: ../index.php');
    exit();
}

    if(isset($_POST['new_post'])){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $created_by=$_SESSION['id'];

        $querytodo=$pdo->query("INSERT INTO todos VALUES (NULL,'$title','$content','$created_by',now(),now())");

        header('Location: /TODO/gra.php');
        exit();
    }
    
    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj TODO</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <p class="logo">Dodaj nowe TODO</p>
    
        <form method="POST" class="dodaj">
            <input type="text" placeholder="TODO" class="neon-button" name="title"><br>
            <textarea name="content" class="neon-button" cols="30" rows="10"></textarea><br>
            <button class="neon-button" name="new_post">Dodaj Post</button>
            <a href="../gra.php"class="neon-button" >Powrót</a>
        </form>
    </div>
</body>
</html>
