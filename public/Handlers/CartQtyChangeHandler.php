<?php
    session_start();
    $email = $_SESSION['user_email'];
    
    $title = $_POST['title'];
    $qty = $_POST['qty'];

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $sql = "UPDATE Cart SET Qty=$qty WHERE Email='$email' AND BookName='$title' ";

    if (!mysqli_query($conn, $sql)) {
        echo "Error updating record: " . mysqli_error($conn);
    }
    header("Location: ../cart.php");
    exit();

    //Close db connection
    mysqli_close($conn);
?>