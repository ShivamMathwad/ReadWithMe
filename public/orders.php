<?php
    session_start();
    include("./templates/header.php"); 
?>

<style>
    <?php include("./stylesheets/orders.css"); ?>
</style>

<?php include("./templates/nav.php"); ?>

<?php
    $email = $_SESSION['user_email'];

    $sql = "SELECT * FROM Orders WHERE Email='$email' ORDER BY OrderID DESC";
    $result = mysqli_query($conn, $sql);
?>

<div class="container" style="margin-top: 50px;">
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['OrderID'];
            $price = $row['TotalPrice'];

            $time = strtotime($row['Date']);
            $date = date("d/m/y g:i A", $time);

            $books_bought = explode (";", $row['BooksBought']);  //Convert comma separated string to array
            $books_html = "";
            $i = 1;

            foreach($books_bought as $value) {
                $books_html .= "<li>" . $i . ") " . $value . "</li>";
                $i++;
            }

            echo <<<HTML
                <div class="order">
                    <p id="order_id">Order Id: S{$order_id}</p>
                    <p id="date">Date: {$date}</p>
                    <p id="books">Books Bought : </p>
                    <ul id="list">
                        {$books_html}
                    </ul>
                    <p id="price">Total price: &#x20B9;{$price}.00</p>
                </div>
            HTML;
        }
    ?>
    
</div>

<?php include("./templates/footer.php"); ?>