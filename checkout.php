<?php
session_start();

include 'includes_partials/head.php';
include 'includes_partials/nav.php';
include 'includes_partials/database_connections.php'; 
?>

<div class="container">  
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <?php include 'includes_partials/header.php'; ?>
        </div>
   
    <div class="row justify-content-center">
        <div class="col-12 text-center">    
            <?php if(isset($_SESSION['username'])){ ?> 
            <h2><?= $_SESSION['username'] . "<br>" . "Here's your order information, please confirm and submit your order below."; 
            }
            ?>
            </h2>
        </div>
    </div>    
<?php
$username = $_SESSION["username"];

$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->execute([
    ":username" => $username
]
);

$fetched_user = $statement->fetch();
?>
    <table class="table text-center">
        <div class="col-10 text-center">
            <tr>
                <td>Name</td>
                <td><?= $fetched_user['customer_name']; ?></td> 
            </tr> 
            <tr>
                <td>Street Address</td>   
                <td><?= $fetched_user['street_address']; ?></td>
            </tr>
            <tr>
                <td>City</td>    
                <td><?= $fetched_user['city']; ?></td>
            </tr>    
            <tr>
                <td>Zip Code</td>
                <td><?= $fetched_user['postal_zip_code']; ?></td>
            </tr>
            <tr>
                <td>Telephone Number</td>
                <td><?= $fetched_user['telephone_number']; ?></td>
            </tr>
            <tr>
                <td>Email</td>    
                <td><?= $fetched_user['email']; ?></td> 
            </tr>
        </div>
    </table>
    
    <table class="table text-center">

        <div class="col-10 col-md-8">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <?php
$total = 0;
$sum = 0;
$customer_id = $_SESSION["customer_id"];
$statement = $pdo->prepare("SELECT orders.product_id, products.name, products.price, orders.quantity  FROM products 
    INNER JOIN orders 
    JOIN users 
    ON products.product_id = orders.product_id 
    AND orders.customer_id = users.customer_id 
    WHERE orders.customer_id = $customer_id
    ORDER BY products.product_id ASC");
$statement->execute();

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $single_product){ ?>          
    
                <tr>    
                    <th scope="row"><?= $single_product['quantity']; ?></th> 
                    <td><?= $single_product['name']; ?></td>
                    <td><?= $single_product['price'] . ' kr'; ?></td>
                    <td><?php $total = $single_product['price'] * $single_product['quantity']; 
                        echo $total?></td>    
                    <!--<td><a href="views/remove_pdo.php?product_id=<?= $single_product['product_id']; ?>">Remove</a></td>
    -->            
<?php
    
$sum += $total;
    }
?>        
                </tr>
            <thead class="thead-light">
                <tr>
                    <th scope="row">Your Total Price Today is:  </th>
                    <td><?= $sum; ?></td>
                </tr>
            </thead>            
        </table>
    </div>
    
    <div class="row justify-content-center">
        <form action="thanks.php">
            <input type="submit" value="Confirm and Submit">
        </form>    
    </div>
    
</div>
</div>
<?php
include 'includes_partials/foot.php';
?>