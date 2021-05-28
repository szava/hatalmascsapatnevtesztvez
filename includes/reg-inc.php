<?php

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordagain = $_POST["passwordagain"];

    require_once 'db-inc.php';
    require_once 'functions-inc.php';

    if(emptyInputRegister($name, $email, $password, $passwordagain) !==false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidname($name) !==false){
        header("location: ../register.php?error=invalidname");
        exit();
    }
    if(invalidemail($email) !==false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if(passwordmatch($password, $passwordagain) !==false){
        header("location: ../register.php?error=passwordnotmatch");
        exit();
    }
    if(nameexists($conn, $name, $email) !==false){
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $password);
}
else {
    header("location: ../register.php");
}