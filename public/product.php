<?php 
    session_start();
    include("./templates/header.php"); 
?>

<style>
    <?php include("./stylesheets/product.css"); ?>
</style>

<?php include("./templates/nav.php"); ?>

<?php
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url); 
    // Use parse_str() function to parse the string passed via URL 
    parse_str($url_components['query'], $params); 
    $title = $params['book'];
    $title = str_replace("'", "", $title);
    
    $sql = "SELECT * FROM Book_Data WHERE BookName='$title' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $author = $row['Author'];
    $price = $row['Price'];
    $image = $row['Image'];
    $description = $row['Description'];
    $genre = $row['Genre'];
?>

<div class="container">
    <form action="./Handlers/AddToCartHandler.php" method="post">
        <input type="text" name="title" value="<?php echo $title ?>" hidden/>  <!-- Send to AddToCartHandler.php -->
        <input type="text" name="genre" value="<?php echo $genre ?>" hidden/>  <!-- Send to AddToCartHandler.php -->
        <input type="number" name="price" value="<?php echo $price ?>" hidden/>  <!-- Send to AddToCartHandler.php -->
        
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img id="img" src="<?php echo 'data:image;base64,' . $image ?>"/>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p name="title" id="heading"><?php echo $title ?></p><br/>
                        <p id="author"><?php echo '-by ' . $author ?></p>
                        <p id="price"><b>&#8377 <?php echo $price . '.00' ?></b></p>
                        <p id="genre"><?php echo 'Genre: ' . $genre ?></p>
                        <p id="description"><?php echo $description ?></p>
                    </div>
                </div>
            </div>  
        </div><br/>
        <label id="qty">Select quantity: </label>
        <select name="qty">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        </select>
        <button class="btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>    
    </form>
    <p style="text-align: center; color: red; font-weight: bold;">
        <?php
            (array_key_exists('already_in_cart_err', $_SESSION) && !empty($_SESSION['already_in_cart_err'])) ? print($_SESSION['already_in_cart_err']) : print("");
            unset($_SESSION['already_in_cart_err']);
        ?>
    </p>
</div>

<?php include("./templates/footer.php"); ?>