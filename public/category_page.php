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
    //$genre = $params['genre'];
    $genre = "Mystery";
?>

<div class="container">
    <h2 id="heading"><?php echo $genre ?></h2>
    <div>

    </div>
</div>

<?php include("./templates/footer.php"); ?>