<?php

$serverName="msql.omega";
$dBUserName="users5";
$dBPassword="";
$dBName="users5";

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);

$queryCreateUsersTable = "CREATE TABLE IF NOT EXISTS `users` (
    `usersID` int(11) PRIMARY KEY auto_increment,
    `usersName` varchar(255) NOT NULL default '',
    `usersEmail` varchar(255) NOT NULL default '',
    `usersPWD` varchar(255) NOT NULL default '')";

if(!$conn->query($queryCreateUsersTable)){
    die("Connection failed: " . mysqli_connect_error());
 }


