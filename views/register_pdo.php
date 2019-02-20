<?php
session_start();
include '../includes_partials/database_connections.php';


//Save value in both $_POST["username"] and $username
$username = $_POST["username"];
$password = $_POST["password"];
$customer_name = $_POST["customer_name"];
$street_address = $_POST["street_address"];
$city = $_POST["city"];
$postal_zip_code = $_POST["postal_zip_code"];
$telephone_number = $_POST["telephone_number"];
$email = $_POST["email"];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//no white space between $pdo and prepare
$statement = $pdo->prepare("INSERT INTO users (username, password, customer_name, street_address, city, postal_zip_code, telephone_number, email) VALUES (:username, :password, :customer_name, :street_address, :city, :postal_zip_code, :telephone_number, :email)");
// Execute populates the statement and runs it
$statement->execute(
    [
        ":username" => $username,
        ":password" => $hashed_password,
        ":customer_name" => $customer_name,
        ":street_address" => $street_address,
        ":city" => $city,
        ":postal_zip_code" => $postal_zip_code,
        ":telephone_number" => $telephone_number,
        ":email" => $email
    ]
    );

$statement = $pdo->prepare("SELECT customer_id, username FROM users 
    WHERE username = :username");
$statement->execute(    
    [
        ":username" => $username
    ]
    );


$fetched_user = $statement->fetch();

//Save user globally to session
$_SESSION["username"] = $fetched_user["username"];
$_SESSION["customer_id"] = $fetched_user["customer_id"];


    header('Location: ../product_list.php');
    
?>