<?php
    session_start();

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $email = $_SESSION['user_email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];

    $sql = "UPDATE Account SET First_name='$first_name', Last_name='$last_name', Address='$address', Pincode='$pincode' WHERE Email='$email' ";

    if (!mysqli_query($conn, $sql)) {
        echo "Error updating record: " . mysqli_error($conn);
    }

    header("Location: ../account.php");
    exit();
?>