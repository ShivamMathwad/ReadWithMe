<?php include("./templates/header.php"); ?>

<style>
    <?php include("./stylesheets/admin_login.css"); ?>
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">ReadWithMe</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div align="center" class="container">
    <h1>Add new book to database</h1><br />
    <form method="post" enctype="multipart/form-data"> 
        <input type="text" name="title" placeholder="Title of Book" required/>
        <input type="text" name="author" placeholder="Author" required/>
        <input type="number" name="price" placeholder="Book Price" required/>
        <textarea rows="3" name="description" placeholder="Enter Book description" required></textarea>
        <label><strong>Genre</strong></label>
        <select name="genre">
            <option value="Classic" selected>Classic</option>
            <option value="Mystery">Mystery</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Poetry">Poetry</option>
            <option value="Biography">Biography</option>
            <option value="Mythology">Mythology</option>
            <option value="Romance">Romance</option>
        </select><br />
        <label><b>Upload Book Image</b></label>
        <input type="file" name="image" required /><br />
        <button name="submit">Add</button>
    </form>
    <?php 
        $validation_msg = "";

        if (isset($_POST['submit'])) {
            $title = $_REQUEST['title'];
            $author = $_REQUEST['author'];
            $price = $_REQUEST['price'];
            $description = $_REQUEST['description'];
            $genre = $_REQUEST['genre'];

            $image = addslashes($_FILES['image']['tmp_name']);
            $img_name = addslashes($_FILES['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);

            $select_sql = "SELECT * FROM Book_Data WHERE BookName='$title' ";
            $result = mysqli_query($conn, $select_sql);

            if (mysqli_num_rows($result) > 0) { //i.e Book already exists in db, hence, send invalid msg
                $validation_msg = "Book already exists in DB";
            } else {
                $sql = "INSERT INTO Book_Data VALUES ('$title', '$author', $price, '$description', '$img_name', '$image', '$genre')";

                if (!mysqli_query($conn, $sql)) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                } else {
                    $validation_msg = "Added successfully!";
                }
            }
        }
    ?>
    <p style="color: white;" id="validation_msg"><b><?php echo $validation_msg; ?></b></p>
</div>

<?php include("./templates/footer.php"); ?>