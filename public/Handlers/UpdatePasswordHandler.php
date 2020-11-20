<?php
    session_start();

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $email = $_SESSION['user_email'];
    $password = $_POST['password'];

    $sql = "UPDATE Account SET Password='$password' WHERE Email='$email' ";

    if (!mysqli_query($conn, $sql)) {
        echo "Error updating record: " . mysqli_error($conn);
    }

    header("Location: ../account.php");
    exit();
?>