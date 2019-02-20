<?php

include '../includes_partials/database_connections.php';

$statement = $pdo->prepare("DELETE FROM orders WHERE product_id = :product_id");
$statement->execute([
    ":product_id" => $_GET["product_id"],
]);
    header('Location: ../customer_cart.php')
?>