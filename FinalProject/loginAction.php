<?php
session_start();
require_once ("connection.php");

$request=$_GET['q'];

if($request=="login")
{
    $username = $_POST["login-username"];
    $password = $_POST["login-password"];
    
    if(checklogin($username, $password))
    {
        $_SESSION["username"] = $username;
        header("location:index.php");
    }
    else
    {
        header("location:index.php?q=error");
    }
}
elseif($request=="logout")
{
    session_destroy();
    header("location:index.php");
}
elseif($request=="register")
{
    $username = $_POST["register-username"];
    $password = $_POST["register-password"];
    $repeatpassword = $_POST["register-repeat-password"];
    $email = $_POST["register-email"];
    $firstname = $_POST["register-first-name"];
    $lastname = $_POST["register-last-name"];
    $phonenumber = $_POST["register-tel"];
    $photoID = $_POST["register-photo"];
    
    if($password==$repeatpassword)
    {
        addNewUser( $username, $password, $email, $firstname, $lastname, $phonenumber, $photoID);
        $_SESSION["username"] = $username;
        header("location:index.php");
    }
    else
    {
    }
}
?>