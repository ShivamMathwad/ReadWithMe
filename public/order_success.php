<?php 
    session_start();
    include("./templates/header.php"); 
?>

<style>
    <?php include("./stylesheets/order_success.css"); ?>
</style>

<?php include("./templates/nav.php"); ?>

<div align="center">
    <img src="../assets/tick.png">
    <h2>Order Successful</h2>
    <p>Your order will be delivered to your address within 2-3 Business days!</p>
</div>

<?php include("./templates/footer.php"); ?>