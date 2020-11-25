<?php
    session_start();
    include("../email.php"); 

    $email = $_SESSION['user_email'];
    $total_price = $_POST['total_price'];
    $books_bought = $_POST['books_bought'];

    $books_bought_arr = explode (";", $string); //Convert comma separated string to array

    //Connect to database 
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $sql = "INSERT INTO Orders(Email,BooksBought,TotalPrice) VALUES ('$email','$books_bought',$total_price)";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $delete_sql = "DELETE FROM Cart WHERE Email='$email' ";  //Delete all entries of user in Cart table after ordering
    if (!mysqli_query($conn, $delete_sql)) {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    //order_mail($email, $first_name);  //Send order mail to user

    header("Location: ../order_success.php");
    exit();

    //Close db connection
    mysqli_close($conn);
?>