<?php
session_start();
include '../includes_partials/database_connections.php';

$username = $_POST["username"];
$password = $_POST["password"];


//no white space between $pdo and prepare
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
// Execute populates the statement and runs it
$statement->execute(
    [
        ":username" => $username,
    ]
    );
    //When select is used, fetch must happen
$fetched_user = $statement->fetch();
$_SESSION["username"] = $fetched_user["username"];
$_SESSION["customer_id"] = $fetched_user["customer_id"];

//var_dump($fetched_user["password"]);
    //4. Compare
$is_password_correct = password_verify($password, $fetched_user["password"]);

if($is_password_correct){
    
    header('Location: ../product_list.php');
} else {
    //handle errors, go bact to frontpage and populate $_GET
    header('Location: ../index.php?login_failed=true');
}
