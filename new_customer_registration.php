<?php
session_start();

include 'includes_partials/head.php';
include 'includes_partials/nav.php';
?>
<div class="container-fluid">  
   
    <div class="row justify-content-center">
       <?php include 'includes_partials/header.php'; ?>
    </div>
    
    <div class="row justify-content-center">
        <h2>Register</h2>
    </div>    
    <div class="row justify-content-center">
        <div class="cards col-8">
            <form action="views/register_pdo.php" method="POST">
                <label for="register_username" >Username</label>
                <input type="text" id="register_username" name="username">
                <br>
                <label for="register_password">Password</label>
                <input type="password" id="register_password" name="password">
                <br>
                 
                <!-- Customer information form --> 
                <label for="customer_name">Name</label>
                <input id="customer_name" name="customer_name" type="text" placeholder="Name">
                <br>
                <label for="street_address">Street Address</label>
                <input id="street_address" name="street_address" type="text" placeholder="Street Address">
                <br>
                <label for="city">City</label>
                <input id="city" name="city" type="text" placeholder="City">
                <br>
                <label for="postal_zip_code">Zip Code</label>
                <input id="postal_zip_code" name="postal_zip_code" type="text" placeholder="Zip Code">
                <br>
                <label for="telephone_number">Telephone</label>
                <input id="telephone_number" name="telephone_number" type="tel" placeholder="Telephone Number">
                <br>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="Email"> 
                <br> 
                <input type="submit" value="Register"></a>
            </form>
        </div>
    </div>
        
    

<?php include 'includes_partials/foot.php'; ?>