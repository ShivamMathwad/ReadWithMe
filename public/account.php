<?php 
    session_start();
    include("./templates/header.php"); 
?>

<style>
    <?php include("./stylesheets/account.css"); ?>
</style>

<?php include("./templates/nav.php"); ?>

<script type="text/javascript">
    function validate() {
        let password = document.getElementsByName("password")[0].value;
        let confirm_password = document.getElementsByName("cpassword")[0].value;

        if (password !== confirm_password) {
            document.getElementById("err_msg").innerHTML = "Passwords don't match!";
            return false;
        } else {
            return true;
        }
    }
</script>

<?php
    $email = $_SESSION['user_email'];

    $sql = "SELECT * FROM Account WHERE Email='$email' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $first_name = $row['First_name'];
    $last_name = $row['Last_name'];
    $address = $row['Address'];
    $pincode = $row['Pincode'];
?>

<div class="container">
    <img id="img" src="../assets/account_logo.png"/>
    <h5 id="email"><?php echo $email; ?></h5>

    <div id="acc_details">
        <h5 id="heading">Personal Details</h5>
        <label class="label"><i>Name:</i></label>
        <p class="details"><?php echo $first_name . " " . $last_name; ?></p><br/>
        <label class="label"><i>Address:</i></label>
        <p class="details"><?php echo $address; ?></p><br/>
        <label class="label"><i>Pincode:</i></label>
        <p class="details"><?php echo $pincode; ?></p>
    </div>

    <div id="update_personal">
        <h5 class="below_heading">Update Personal Details</h5>
        <div align="center">
            <form action="./Handlers/UpdateInfoHandler.php" method="post">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo $first_name; ?>" required/><br/>
                <label>Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $last_name; ?>" required/><br/>
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo $address; ?>" required/><br/>
                <label>Pincode:</label>
                <input type="number" name="pincode" value="<?php echo $pincode; ?>" required/><br/>
                <button class="btn btn-success mt-3">Update info</button>
            </form>
        </div>
    </div>

    <div id="update_password">
        <h5 class="below_heading">Update Password</h5>
        <div align="center">
            <form action="./Handlers/UpdatePasswordHandler.php" method="post" onsubmit="return validate();">
                <input type="password" style="width:290px;" name="password" placeholder="Enter new password" required/><br/>
                <input type="password" style="width:290px;" name="cpassword" placeholder="Confirm password" required/><br/>
                <button class="btn btn-success mt-4">Update info</button><br/>
            </form>
            <p id="err_msg"></p>
        </div>
    </div>
</div>

<?php include("./templates/footer.php"); ?>