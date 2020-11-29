<?php 
    session_start();
    include("./templates/header.php"); 
?>

<style>
    <?php include("./stylesheets/cart.css"); ?>
</style>

<?php include("./templates/nav.php"); ?>

<?php
    $email = $_SESSION['user_email'];
    $total_price = 0;
    $books_bought = array();

    $sql = "SELECT * FROM Cart WHERE Email='$email' ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $oneBookTotalPrice = $row['BookPrice'] * $row['Qty'];
        $total_price += $oneBookTotalPrice;

        array_push($books_bought,$row['BookName']);
    }

    $books_bought_str = implode(';', $books_bought);  //Convert array to comma separated string 

    $sql = "SELECT * FROM Cart WHERE Email='$email' ";
    $result = mysqli_query($conn, $sql);
?>


<div class="container">
    <div id="main_block">
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['BookName'];
                $qty = $row['Qty'];

                $select_sql = "SELECT * FROM Book_Data WHERE BookName='$title' ";
                $select_result = mysqli_query($conn, $select_sql);
                $new_row = mysqli_fetch_assoc($select_result);

                $author = $new_row['Author'];
                $price = $new_row['Price'];
                $img_src = 'data:image;base64,' . $new_row['Image'];

                $option1 = $option2 = $option3 = $option4 = $option5 = $option6 = $option7 = "";
                $option8 = $option9 = $option10 = $option11 = $option12 = $option13 = "";

                switch ($qty) {
                    case "1": $option1 = 'selected'; break;
                    case "2": $option2 = 'selected'; break;
                    case "3": $option3 = 'selected'; break;
                    case "4": $option4 = 'selected'; break;
                    case "5": $option5 = 'selected'; break;
                    case "6": $option6 = 'selected'; break;
                    case "7": $option7 = 'selected'; break;
                    case "8": $option8 = 'selected'; break;
                    case "9": $option9 = 'selected'; break;
                    case "10": $option10 = 'selected'; break;
                    case "11": $option11 = 'selected'; break;
                    case "12": $option12 = 'selected'; break;
                    case "13": $option13 = 'selected'; break;
                }

                echo <<<HTML
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <img src="$img_src" height="170px" class="card-img" alt="Image">
                            </div>
                            <div class="col-6">
                                <div class="card-body" style="padding-top:11px">
                                    <p id="title"><b>{$title}</b></p>
                                    <p id="author">-by {$author}</p>
                                    <p id="price"><b>&#x20B9; {$price}.00</b></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <form action="./Handlers/CartQtyChangeHandler.php" method="post">
                                    <input type="text" name="title" value="$title" hidden/>
                                    <label>Qty: </label>
                                    <select id="dropdown" name="qty" onchange="this.form.submit()">
                                        <option value="1" {$option1}>1</option>
                                        <option value="2" {$option2}>2</option>
                                        <option value="3" {$option3}>3</option>
                                        <option value="4" {$option4}>4</option>
                                        <option value="5" {$option5}>5</option>
                                        <option value="6" {$option6}>6</option>
                                        <option value="7" {$option7}>7</option>
                                        <option value="8" {$option8}>8</option>
                                        <option value="9" {$option9}>9</option>
                                        <option value="10" {$option10}>10</option>
                                        <option value="11" {$option11}>11</option>
                                        <option value="12" {$option12}>12</option>
                                        <option value="13" {$option13}>13</option>
                                    </select>
                                </form>
                                <form action="./Handlers/DeleteFromCartHandler.php" method="post">
                                    <input type="text" name="title" value="$title" hidden/>
                                    <button id="rm_button" onclick="#">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                HTML;
            }
        ?>
        
        <hr>
        <form action="./Handlers/OrderHandler.php" method="post">
            <input type="number" name="total_price" value="<?php echo $total_price ?>" hidden/>
            <input type="text" name="books_bought" value="<?php echo $books_bought_str ?>" hidden/>
            <p id="total_price">Total Price:  &#x20B9;<?php echo $total_price ?>.00</p>
            <button class="btn btn-success">Proceed to Buy</button>
        </form>
    </div>
</div>

<?php include("./templates/footer.php"); ?>