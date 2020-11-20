<?php
    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    session_start();
    $_SESSION['user_email'] = $email;

    $sql = "SELECT * FROM Account WHERE Email='$email' AND Password='$password' ";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 0) {  //User not found in db
        $_SESSION['err_msg'] = "Invalid User credentials!";
        header("Location: ../../index.php");
        exit();
    } else if($email == "admin@readwithme.com" && $password == "admin") {
        header("Location: ../admin_login.php");
        exit();
    } else {
        header("Location: ../main_page.php");
        exit();
    }

    //Close db connection
    mysqli_close($conn);
?>