
<?php

 require('connect.php');

 if (isset($_POST['login']) and isset($_POST['password'])){

 $username = $_POST['login'];
 $password = $_POST['password'];

 $query = "SELECT * FROM `login` WHERE login='$username' and password='$password'";

 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 $count = mysqli_num_rows($result);

 if ($count == 1){
 session_start();
  $_SESSION['login']=$username;
    $_SESSION['password']=$password;

header('Location:accueil2.php');
 }else{

 echo "Login ou mdp incorrect";
 }
 }
 ?>
