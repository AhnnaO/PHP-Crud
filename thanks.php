<?php
session_start();
include 'includes_partials/head.php';
include 'includes_partials/nav.php';

?>
<div class="row justify-content-center">
        <div class="col-12 text-center">
            <?php include 'includes_partials/header.php'; ?>
        </div>
   
    <div class="row justify-content-center">
        <div class="col-12 text-center">    
            <?php if(isset($_SESSION['username'])){ ?> 
            <h2><?= $_SESSION['username'] . "<br>"; 
            }
            ?>
            </h2>
            <h3>Thank you for your order!</h3>
        </div>
    </div>
<?php
include 'includes_partials/foot.php';
?>