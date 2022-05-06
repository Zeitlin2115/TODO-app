<?php
session_start();
require_once __DIR__.'/../database.php';

if(!isset($_SESSION['zalogowany']))
{
    header('Location: ../index.php');
    exit();
}


$id=$_GET['id'];
$postquery=$pdo->query("SELECT * FROM todos WHERE id='$id'");
$post=$postquery->fetchALL();

if(isset($_POST['new_post'])){
    if($_POST['title']){
    $title=$_POST['title'];
    $tittle = htmlentities($tittle, ENT_QUOTES, "UTF-8");
        $content=filter_input(INPUT_POST,'content');
            $content = htmlentities($content, ENT_QUOTES, "UTF-8");
        $createdby=$_SESSION['id'];

        $postQuery = $pdo->prepare("UPDATE todos SET title='$title', content = '$content', czas_upt = now() WHERE id = '$id'");
        $postQuery->execute();
        header('Location: gra.php'); 
}

}
if(isset($_POST['new_post'])){
    header("Location: /TODO/gra.php");
}


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>
<p class="logo">Edytuj TODO</p>
    <form method="post" class="logo">
        <input type="text" placeholder="TODO" class="neon-button" name="title" value="<?php foreach($post as $post){echo $post['title']; $content=$post['content'];}?>"><br>
        <textarea name="content" class="neon-button" cols="30" rows="10"><?php echo $content;?></textarea><br>
        <button class="neon-button" name="new_post">Dodaj Post</button>
        <a href="../gra.php"class="neon-button" >Powrót</a>
    </form>
</body>
</html>