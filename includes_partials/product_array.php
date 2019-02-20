<?php
              
include 'includes_partials/database_connections.php';
ini_set("display_errors", 1); ini_set("display_startup_errors", 1); error_reporting(E_ALL);    
$query = "SELECT * FROM products";
$statement = $pdo->prepare($query);
$statement->execute();

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as $single_product){ ?>
                 
  <div class="cards col-8 col-md-4 col-lg-3 text-center">
    <form action='views/customer_cart_pdo.php' method='POST'>
      <input type="hidden" name="product_id" value="<?= $single_product['product_id']; ?>">
        <img src="images/placeimg_300_250_tech.jpg">
        <h3><?= $single_product['name']; ?></h3>
        <h4><?= $single_product['price'] . ' kr'; ?></h4>
        <label for="quantity">How many?</label>
        <input id="quantity" name="quantity" type="number" value="<?= $single_product['quantity']; ?>">
        <input type="submit" class="btn btn-primary" value="Add to cart" id="add_to_cart" name="add_to_cart">
    </form>
  </div>
<?php   

}


    


?>