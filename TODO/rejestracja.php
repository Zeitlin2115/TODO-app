 <?php
    session_start();
    require_once "database.php";

    if (isset($_POST['email'])) 
    {

        //Udana walidacja

        $wszystko_ok=true;


        //sprawdz ncik

        $login=$_POST['login'];


        //sprawdzenie dlugosci nicku

        if ((strlen($login)<3) || (strlen($login)>20)) 
        {
            $wszystko_ok=false;
            $_SESSION['e_login']="Login musi posiadac od 3 do 20 znakow";
        }

        if (ctype_alnum($login)==false) 
        {
            $wszystko_ok=false;
            $_SESSION['e_login']="Login moze skaldac sie tylko z liter i cyfr";
        }


        //sprawdz poprawnosc adsresu email

        $email=$_POST['email'];
        $emailB=filter_var($email,FILTER_SANITIZE_EMAIL);

       if ((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
       {
         $wszystko_ok=false;
         $_SESSION['e_email']="Podaj poprawny adres email";
       }


       //sprawdz poprawnosc hasel

       $haslo1=$_POST['haslo1'];
       $haslo2=$_POST['haslo2'];

       if((strlen($haslo1)<8)||(strlen($haslo1)>20))
       {
            $wszystko_ok=false;
            $_SESSION['e_haslo']="Haslo musi posiadac min 8 znakow do 20 znakow";

       }

       if($haslo1!=$haslo2)
        {
            $wszystko_ok=false;
            $_SESSION['e_haslo']="Podane hasla nie sa identyczne";

       }

       $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT); 


       //czy zaakceptowano rwgulamin?
       if(!isset($_POST['regulamin']))
       {
        $wszystko_ok=false;
        $_SESSION['e_regulamin']="Potwierdz akceptacje regulaminu";
       }


       //Bot or not?
       $sekret="6LeJ93YfAAAAAGV90Rw7DBI9RKzEPfr3lb23trwX";

       $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

       $odpowiedz= json_decode($sprawdz);

       if($odpowiedz->success==false)
       {
        $wszystko_ok=false;
        $_SESSION['e_bot']="Potwierdz ze  nie jestes botem";

       }

       //zapamietaj wprowadzone dane
        $_SESSION['fr_login']=$login;
        $_SESSION['fr_email']=$email;
        $_SESSION['fr_haslo1']=$haslo1;
        $_SESSION['fr_haslo2']=$haslo2;
        if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;


                    //czy email juz istnieje
                    $rezultat = $pdo->prepare("SELECT id FROM users WHERE email='$email'");

                    if(!$rezultat) throw new Exception($pdo->error);
                    $rezultat->execute();
                    
                if($rezultat->rowCount()>0)
                    {
                        $wszystko_ok=false;
                        $_SESSION['e_email']="Istnieje juz konto do tego adresu email";

                    }

                    //czy uzytkownik juz istnieje
                    $rezultat = $pdo->prepare("SELECT id FROM users WHERE login='$login'");

                    if(!$rezultat) throw new Exception($pdo->error);
                    $rezultat->execute();
                    
                    if($rezultat->rowCount()>0)
                    {
                        $wszystko_ok=false;
                        $_SESSION['e_login']="Istnieje juz konto o takim loginie";

                    }

                    if ($wszystko_ok==true) 
                    {
                        //dodajemy gracza do bazy wszystko ok
                        if($pdo->query("INSERT INTO users VALUES (NULL,'$login','$haslo_hash','$email')"))
                        {
                            $_SESSION['udanarejestracja']=true;
                            header('Location: witamy.php');
                        }
                       else
                        {
                          throw new Exception($pdo->error);  
                        }

                    }

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


    <title>TODO - załóż darmowe konto!</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>

     <style>
         .error
         {
            color:red;
            margin-top:10px;
            margin-bottom: 10px; 
         }

     </style>

</head>

    <body>

    <a href="index.php" class="neon-button"> TODO</a>
        
        <form method="post">

            Login: <br> <input type="text" class="neon-button" value="<?php
                if(isset($_SESSION['fr_login']))
                {
                    echo $_SESSION['fr_login'];
                    unset($_SESSION['fr_login']);
                }   
                     
                ?>" name="login"><br>

                <?php

                if (isset($_SESSION['e_login'])) 
                {
                    echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                    unset($_SESSION['e_login']);
                }

                ?>

            E-mail: <br> <input type="text" class="neon-button" value="<?php
                if(isset($_SESSION['fr_email']))
                {
                    echo $_SESSION['fr_email'];
                    unset($_SESSION['fr_email']);
                }   
                     
                ?>" name="email"><br>

                <?php

                if (isset($_SESSION['e_email'])) 
                {
                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                    unset($_SESSION['e_email']);
                }

                ?>


            Twoje hasło:<br> <input type="password" class="neon-button" value="<?php
                if(isset($_SESSION['fr_haslo1']))
                {
                    echo $_SESSION['fr_haslo1'];
                    unset($_SESSION['fr_haslo1']);
                }   
                     
                ?>" name="haslo1"><br>

                <?php

                if (isset($_SESSION['e_haslo'])) 
                {
                    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                    unset($_SESSION['e_haslo']);
                }

                ?>



            Powtórz hasło:<br> <input type="password" class="neon-button" value="<?php
                if(isset($_SESSION['fr_haslo2']))
                {
                    echo $_SESSION['fr_haslo2'];
                    unset($_SESSION['fr_haslo2']);
                }   
                     
                ?>" name="haslo2"><br>





            <label>
            <input type="checkbox" class="neon-button" name="regulamin" <?php 
                   if (isset($_SESSION['fr_regulamin']))
                   {
                    echo "checked";   
                       unset($_SESSION['fr_regulamin']);
                   }
                   
                   ?>>Akceptuje regulamin
            </label>

                <?php

                if (isset($_SESSION['e_regulamin'])) 
                {
                    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                    unset($_SESSION['e_regulamin']);
                }

                ?>


            <div class="g-recaptcha" data-sitekey="6LeJ93YfAAAAALVxDVtweBSCw5vGOJ8FTAGzNEDx"></div>

                <?php

                if (isset($_SESSION['e_bot'])) 
                {
                    echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                    unset($_SESSION['e_bot']);
                }

                ?>




        <br>
        <input type="submit" class="neon-button" value="zarejestruj sie">
        </form>
  

    </body>
</html>
