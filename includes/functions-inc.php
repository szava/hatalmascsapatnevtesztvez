<?php

function emptyInputRegister($name, $email, $password, $passwordagain){
    $result;
    if(empty($name) || empty($email) || empty($password) || empty($passwordagain)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidname($name){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidemail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function passwordmatch($password, $passwordagain){
    $result;
    if($password !== $passwordagain){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function nameexists($conn, $name, $email){
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?; " ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $name, $email, $password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?); " ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}

function emptyInputLogin($name, $password){
    $result;
    if(empty($name) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $name, $password){
    $nameExists = nameexists($conn, $name, $name);

    if($nameExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordhashed = $nameExists["usersPwd"];
    $checkPassword = password_verify($password, $passwordhashed);

    if($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPassword === true){
        session_start();
        $_SESSION["userID"] = $nameExists["usersID"];
        $_SESSION["userName"] = $nameExists["usersName"];
        header("location: ../game.html");
        exit();
    }
}