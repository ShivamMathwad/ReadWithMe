<?php include("./templates/header.php"); ?>

<style>
    <?php include("./stylesheets/signup.css"); ?>
</style>

<script type="text/javascript">
    function validate() {
        let valid = true;
        let err_msg = "";

        let email = document.getElementsByName("email")[0].value;
        let first_name = document.getElementsByName("first_name")[0].value;
        let last_name = document.getElementsByName("last_name")[0].value;
        let address = document.getElementsByName("address")[0].value;
        let pincode = document.getElementsByName("pincode")[0].value;
        let password = document.getElementsByName("password")[0].value;
        let confirm_password = document.getElementsByName("confirm_password")[0].value;

        if (email.length < 10 || !email.includes("@") || !email.includes(".")) {
            err_msg = "Invalid Email!";
            valid = false;
        }
        if (first_name.length < 2 || last_name.length < 2) {
            err_msg = "Name is invalid!";
            valid = false;
        }
        if (address.length < 5) {
            err_msg = "Invalid Address!";
            valid = false;
        }
        if (pincode.toString().length < 4) {
            err_msg = "Area Pincode is invalid!";
            valid = false;
        }
        if (password.length < 2) {
            err_msg = "Invalid Password!";
            valid = false;
        }
        if (confirm_password !== password) {
            err_msg = "Passwords don't match!";
            valid = false;
        }
        document.getElementById("err_msg").innerHTML = err_msg;

        return valid;
    };
</script>

<div align="center">
    <h1><i>Create your account</i></h1>
    <div class="signup-form">
        <form action="./Handlers/SignupHandler.php" method="post" onsubmit="return validate();">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
                <input type="number" name="pincode" class="form-control" placeholder="Area pincode">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>
            <button class="btn mt-4">Submit</button>
        </form><br />
        <p id="err_msg"></p>
    </div>
</div>

<?php include("./templates/footer.php"); ?>