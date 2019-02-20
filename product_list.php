<?php
session_start();
ini_set("display_errors", 1); ini_set("display_startup_errors", 1); error_reporting(E_ALL);
include 'includes_partials/head.php';
include 'includes_partials/nav.php'; ?>

<div class="container-fluid">  
   
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <?php include 'includes_partials/header.php'; ?>
        </div>
    
    <div class="row justify-content-center">
        <div class="col-12 text-center">    
            <?php if(isset($_SESSION['username'])){ ?> 
            <h2>Hello <?= $_SESSION['username'] . "!"; 
            } 
            
            ?>
            </h2>
        </div>
    </div>    

    <main>
    <div class="row justify-content-center product_cards">
           
           <div class="row justify-content-center">

               <?php include 'includes_partials/product_array.php'; ?>
           
           </div>
        </div>
    <div class="row justify-content-center product_cards">
           
        <div class="row justify-content-center">         
        <form action="customer_cart.php">
            <input type="submit" value="Submit Order" name="submit_order">
        </form>

   </main>

<?php include 'includes_partials/foot.php'; ?>