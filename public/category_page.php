<?php include("./templates/header.php"); ?>

<style>
    <?php include("./stylesheets/category_page.css"); ?>
</style>

<?php include("./templates/nav.php"); ?>

<?php
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url); 
    // Use parse_str() function to parse the string passed via URL 
    parse_str($url_components['query'], $params); 
    $genre = $params['genre'];
    //$genre = "Mystery";

    $sql = "SELECT * FROM Book_Data WHERE Genre='$genre' ";
    $result = mysqli_query($conn, $sql);
?>

<h2 id="heading"><?php echo $genre ?></h2>
<div class="row" id="book_list">
    <?php
        while ($row = mysqli_fetch_assoc($result)) {

            $img_src = "data:image;base64,".$row['Image'];
            $title = $row['BookName'];
            $author = $row['Author'];
            $price = $row['Price'];

            echo <<<HTML
                <div class="col-3">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-4">
                                <img src="$img_src" height="160px" class="card-img" alt="Image">
                            </div>
                            <div class="col-8">
                                <div class="card-body" style="padding-top:10px">
                                <form action="./product.php?book='$title'" method="post">
                                    <small>
                                    <p id="title"><b>{$title}</b></p>
                                    <p id="author">-by {$author}</p>
                                    <p id="price"><b>&#x20B9; {$price}.00</b></p>
                                    <button id="button"><small>More info</small></button>
                                    </small>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;
        }
    ?>
</div>

<?php include("./templates/footer.php"); ?>