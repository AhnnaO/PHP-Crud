<?php
session_start();

include '../includes_partials/database_connections.php';

if(isset($_POST['add_to_cart'])){
    $quantity = $_POST["quantity"];
    $product_id = $_POST["product_id"];
    $customer_id = $_SESSION["customer_id"];

    $statement = $pdo->prepare("INSERT INTO orders (product_id, quantity, customer_id) VALUES (:product_id, :quantity, :customer_id)");
    $statement->execute([
        ":product_id" => $product_id,
        ":quantity" => $quantity,
        ":customer_id" => $customer_id
    ]);
}

header('Location: ../product_list.php');

?>



