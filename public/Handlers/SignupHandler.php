<?php
    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name']; 
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $password = $_POST['password'];

    $select_sql = "SELECT * FROM Account WHERE Email='$email' ";
    $result = mysqli_query($conn, $select_sql);

    if (mysqli_num_rows($result) == 0) {  //Email not found in db i.e it can be inserted
        $sql = "INSERT INTO Account VALUES ('$email', '$first_name', '$last_name', '$password', '$address', $pincode)";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        echo 'Success !!';
    } else {
        session_start();
        $_SESSION['error'] = "User email already exists!";
        header("Location: ../signup.php");
        exit();
    }

    //Close db connection
    mysqli_close($conn);
?>