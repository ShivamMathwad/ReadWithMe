<?php include("./public/templates/header.php"); ?>

<style>
    <?php include("./public/stylesheets/index.css"); ?>
</style>

<script type="text/javascript">
    function validate() {
        let valid = true;
        let err_msg = "";

        let email = document.getElementsByName("email")[0].value;
        let password = document.getElementsByName("password")[0].value;

        if (email.length < 10 || !email.includes("@") || !email.includes(".")) {
            err_msg = "Invalid Email!";
            valid = false;
        }
        if (password.length < 2) {
            err_msg = "Invalid Password!";
            valid = false;
        }
        document.getElementById("err_msg").innerHTML = err_msg;

        return valid;
    };
</script>


<div align="center" class="login-form">
    <img src="./assets/logo.png">
    <form action="./public/Handlers/LoginClickHandler.php" method="post" onsubmit="return validate();">
        <div class="form-group">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <button class="btn px-4 mt-3">Login</button>
    </form><br/>
    <a href="./public/signup.php">Don't have an account? Sign up</a>
</div>
<p id="err_msg"></p>
<p> 
    <?php 
        session_start();
        (array_key_exists('err_msg',$_SESSION) && !empty($_SESSION['err_msg'])) ? print($_SESSION['err_msg']) : print(""); 
        unset($_SESSION['err_msg']);
    ?> 
</p>

<?php include("./public/templates/footer.php"); ?>