<?php
    session_start();
    $email = $_SESSION['user_email'];

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $genre = $_POST['genre'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $select_sql = "SELECT * FROM Cart WHERE BookName='$title' AND Email='$email' ";
    $result = mysqli_query($conn, $select_sql);

    if (mysqli_num_rows($result) == 0) {  //i.e not in cart, hence, can be added to cart
        $sql = "INSERT INTO Cart(Email,BookName,BookPrice,Qty) VALUES ('$email', '$title', $price, $qty)";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        header("Location: ../category_page.php?genre=$genre");
        exit();
    } else {  //i.e book already in cart, hence, show error
        $_SESSION['already_in_cart_err'] = "Book already in cart!";
        header("Location: ../product.php?book=$title");
        exit();
    }

    //Close db connection
    mysqli_close($conn);
?>