<?php 
    class Email {
        public $to, $subject, $message;
        public $headers = 'From: readwithme.bookstore@gmail.com' . "\r\n" . 
                        "MIME-Version: 1.0" . "\r\n" . "Content-type:text/html;charset=UTF-8" . "\r\n";

        function signup_mail($to, $username) {
            $this->subject = "Welcome to the ReadWithMe community!";
            $this->to = $to;

            $this->message = "Hi $username,<br/>Thank you for signing up and welcome to the ReadWithMe family. ReadWithMe offers a wide variety of books across various categories, so dive in and find your next great read with us!<br/><br/>Regards,<br/>ReadWithMe support team";

            $retval = mail($this->to, $this->subject, $this->message, $this->headers);
            
            if ($retval == true) {
                echo "Message sent successfully...";
            } else {
                echo "Message could not be sent...";
            }
        }
    }

    $new_user = new Email();
    $new_user->signup_mail("shivam25.mathwad@gmail.com", "Shivam");

    echo "hello world";
?>