<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ReadWithMe</title>
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- JQuery and Bootstrap-js CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'readwithme');
    //mysqli_connect(hostname,username,password,dbname);

    //Check connection
    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
    ?>