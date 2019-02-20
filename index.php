<?php
session_start();
ini_set("display_errors", 1); ini_set("display_startup_errors", 1); error_reporting(E_ALL);
include 'includes_partials/head.php';
include 'includes_partials/nav.php'; ?>

<div class="container-fluid">  
   
    <div class="row justify-content-center">
        <?php include 'includes_partials/header.php'; ?>
        
    </div>    

    <main>
        <div class="row justify-content-center">
            <div class="col-8 text-center">

<?php //not finished
    /*if(isset($_GET["error2"])){
        echo ($_GET["error2"]);
    }*/
?>    
                <h2>Like our Stuff? To start your order log in here:</h2>

                    <form action="views/login_pdo.php" method="POST">
                    <label for="login_username">Username</label>
                    <input type="text" id="login_username" name="username">
                    <label for="login_password">Password</label>
                    <input type="password" id="login_password" name="password">
                    <input type="submit" value="Log In">
                    </form>
                               
            </div>
        </div>                
        
        <div class="row justify-content-center">
            <div col-8 text-center>        
                <h4>New Customer? Click here to register!</h4>
                <a href="new_customer_registration.php"><button>Register Now!</button></a> 
            </div>
        </div>        

                   
        
        <div class="row justify-content-center">
           
            <div class="row justify-content-center">

                <?php
              
              include 'includes_partials/database_connections.php';
              ini_set("display_errors", 1); ini_set("display_startup_errors", 1); error_reporting(E_ALL);    
              $query = "SELECT * FROM products";
              $statement = $pdo->prepare($query);
              $statement->execute();
              
              $products = $statement->fetchAll(PDO::FETCH_ASSOC);
              
              foreach ($products as $single_product){ ?>
                               
                <div class="cards col-8 col-md-4 col-lg-3 text-center">
                                          
                        <img src="images/placeimg_300_250_tech.jpg">
                        <h3><?= $single_product['name']; ?></h3>
                        <h4><?= $single_product['price'] . ' kr'; ?></h4>
                  
                </div>
              <?php   
              
              }
              
              ?>
            
            </div>
        
            </div>
        
    </main>

<?php include 'includes_partials/foot.php'; ?>