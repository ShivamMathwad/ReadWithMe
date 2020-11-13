<?php include("./public/templates/header.php"); ?>

<style>
    <?php include("./public/stylesheets/index.css"); ?>
</style>

<script type="text/javascript">
    function validate() {
        let valid = true;
        let err_msg = "";

        <?php 
            
        ?>

        let email = document.getElementsByName("email")[0].value;
        let password = document.getElementsByName("password")[0].value;
        let check_db_bool = <?php echo $val ?>;

        if (email.length < 10 || !email.includes("@") || !email.includes(".")) {
            err_msg = "Invalid Email!";
            valid = false;
        }
        if (password.length < 2) {
            err_msg = "Invalid Password!";
            valid = false;
        }
        if (true) {
            err_msg = "Invalid User credentials!";
            valid = false;
        }
        document.getElementById("err_msg").innerHTML = err_msg;

        return valid;
    };
</script>

<div align="center" class="login-form">
    <img src="./assets/logo.png">
    <form>
        <div class="form-group">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <button type="submit" class="btn px-4 mt-3">Login</button>
    </form><br />
    <a href="./public/signup.php">Don't have an account? Sign up</a>
</div>

<?php include("./public/templates/footer.php"); ?>