<?php
	session_start();

	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "database.php";

		if(!isset($_SESSION['id'])){
			if(isset($_POST['login'])){
				$login=$_POST['login'];
				$login = htmlentities($login,ENT_QUOTES, "UTF-8");
    			$haslo=$_POST['haslo'];	

				$ueserquer=$pdo->prepare(" SELECT * FROM users WHERE login=:login");
				$ueserquer->bindValue(':login', $login, PDO::PARAM_STR);
				$ueserquer->execute();
				$user=$ueserquer->fetch();

				if($user && password_verify($haslo, $user['pass'])){
					$_SESSION['id']=$user['id'];
					$_SESSION['zalogowany']=true;
					$_SESSION['login']=$user['login'];
					unset($_SESSION['blad']);
					header('Location: gra.php');
					exit();
				}
				else{
					$_SESSION['blad']=true;
					$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
			}

		}

?>