<?php
    session_start();
    $email = $_SESSION['user_email'];
    
    $title = $_POST['title'];

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $sql = "DELETE FROM Cart WHERE Email='$email' AND BookName='$title' ";

    if (!mysqli_query($conn, $sql)) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    header("Location: ../cart.php");
    exit();

    //Close db connection
    mysqli_close($conn);
?>