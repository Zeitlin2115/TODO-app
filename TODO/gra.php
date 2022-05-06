
<?php
    session_start();
    require_once "database.php";

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location:index.php');
        exit();
    }

    if(isset($_SESSION['id'])){
        $userid=$_SESSION['id'];
 
         $todosQuery=$pdo->query("SELECT * FROM todos WHERE created_by='$userid'");
         $todos=$todosQuery->fetchAll(); 
     }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php

    echo "<p class='logo'>Witaj ".$_SESSION['login'].'! [<a href="logout.php" class="wyloguj">Wyloguj się</a>]</p>';

    ?>
    
        <a href="crud/create.php" class="butt2">Dodaj nowe zadanie</a>
        <form method="post" class="all">
            <?php
                foreach ($todos as $todo) {
                    $todoid=$todo['id'];
                        
                    echo '<div class="todo">';
                        echo '<h2>'.$todo['title'].'</h2><br>'.$todo['content'].'<br><br>';
                        echo '<a href="crud/delete.php?id='.$todoid.'" class="butt">Usuń</a>';
                        echo '<a href="crud/edit.php?id='.$todoid.'" class="butt">Edit</a>';
                    echo '</div>';
                }
            ?>
        </form>
   
</body>
</html>