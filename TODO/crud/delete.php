<?php
session_start();
require_once __DIR__.'/../database.php';

if(!isset($_SESSION['zalogowany']))
{
    header('Location: ../index.php');
    exit();
}



$id=$_GET['id'];
$querydelet=$pdo->query("DELETE FROM todos WHERE id='$id'");
$querydelet->execute();
header("Location: /TODO/gra.php");
exit();
