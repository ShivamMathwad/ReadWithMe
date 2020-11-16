<?php
    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Account WHERE Email='$email' AND Password='$password' ";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 0) {  //User not found in db
        session_start();
        $_SESSION['err_msg'] = "Invalid User credentials!";
        header("Location: ../../index.php");
        exit();
    } else if($email == "admin@readwithme.com" && $password == "admin") {
        echo "<h2>Admin Login Success!</h2>";
    } else {
        echo "Success !";
    }

    //Close db connection
    mysqli_close($conn);
?>