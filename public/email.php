<?php
    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;
    require '../../PHPMailer-master/src/Exception.php';
    require '../../PHPMailer-master/src/PHPMailer.php';
    require '../../PHPMailer-master/src/SMTP.php';


    function init() {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "readwithme.bookstore@gmail.com";
        $mail->Password   = "readwithmeadmin";
        $mail->SetFrom("readwithme.bookstore@gmail.com", "ReadWithMe");
        $mail->IsHTML(true);

        return $mail;
    }

    function signup_mail($to, $username) {
        $mail = init();

        $mail->AddAddress($to, $username);
        $mail->Subject = "Welcome to the ReadWithMe community!";
        $message = "Hi $username,<br/>Thank you for signing up and welcome to the ReadWithMe family. ReadWithMe offers a wide variety of books across various categories, so dive in and find your next great read with us!<br/><br/>Regards,<br/>ReadWithMe support team";

        $mail->MsgHTML($message);

        if (!$mail->Send()) {
            echo "<script>console.log('Error while sending Email !');</script>";
        } else {
            echo "<script>console.log('Email sent successfully !');</script>";
        }
    }

    //signup_mail("shivammathwad2017.it@mmcoe.edu.in", "Shivam");
?>