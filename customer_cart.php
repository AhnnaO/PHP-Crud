<?php
session_start();

include 'includes_partials/head.php';
include 'includes_partials/nav.php'; 
include 'includes_partials/database_connections.php';

 ?>

<div class="container-fluid">  
   
    <div class="row justify-content-center">
       <div class="col-12 text-center">
           <?php include 'includes_partials/header.php'; ?>
       </div>
    </div>    
   <!--greeting to logged in customer-->
   <div class="row justify-content-center">
       <div class="col-12 text-center">    
           <?php if(isset($_SESSION['username'])){ ?> 
           <h2>Hello <?= $_SESSION['username'] . "!"; 
           }
           ?>
           </h2>
       </div>
   </div>
   
   <div class="row justify-content-center">

        <table class="table text-center col-10 col-md-8">
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
                    <td><a href="views/remove_pdo.php?product_id=<?= $single_product['product_id']; ?>">Remove</a></td>
            
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
        <form class="col-4 text-center" action="checkout.php" method="POST">
            <input type="submit" value="Go to Checkout" id="go_to_checkout" name="go_to_checkout">
        </form>    
    </div>           
</div>
                
  


<?php include 'includes_partials/foot.php'; ?>