<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ReadWithMe</title>
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- JQuery and Bootstrap-js CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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