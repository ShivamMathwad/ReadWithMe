<?php
    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;
    require '../../PHPMailer-master/src/Exception.php';
    require '../../PHPMailer-master/src/PHPMailer.php';
    require '../../PHPMailer-master/src/SMTP.php';
    include("../../abc.php");

    
    function init() {
        global $EMAIL, $PASSWORD;

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = $EMAIL;
        $mail->Password   = $PASSWORD;
        $mail->SetFrom($EMAIL, "ReadWithMe");
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


    function order_mail($to, $books_bought, $total_price, $date) {
        $mail = init();

        $mail->AddAddress($to);
        $mail->Subject = "Order Invoice";

        $books_html = "";

        foreach($books_bought as $value) {
            $books_html .= "<li>" . $value . "</li>";
        }

        $message = "Hi,<br/>Thank you for your order. Your package will be delivered by our ReadWithMe 
        Delivery Agent within 2-3 business days.<br/>
        Books ordered are:
        <ul style='margin-top:3px;margin-bottom:3px;'>
        <b>$books_html</b>
        </ul>
        The total price of your order is: <b>&#x20B9;$total_price.00</b>, ordered on $date.<br/><br/>
        Regards,<br/>ReadWithMe support team";

        $mail->MsgHTML($message);

        if (!$mail->Send()) {
            echo "<script>console.log('Error while sending Email !');</script>";
        } else {
            echo "<script>console.log('Email sent successfully !');</script>";
        }
    }
?>