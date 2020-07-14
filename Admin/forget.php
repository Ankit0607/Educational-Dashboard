<html>

<head>
    <style type="text/css">
        input {
            border: 1px solid olive;
            border-radius: 5px;
        }

        h1 {
            color: darkgreen;
            font-size: 22px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Forgot Password<h1>
            <form action='#' method='post'>
                <table cellspacing='5' align='center'>
                    <tr>
                        <td>Email id:</td>
                        <td><input type='text' name='mail' /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' name='submit' value='Submit' /></td>
                    </tr>
                </table>

                <?php
                    if(isset($_POST['submit']))
                    { 
                        require("dbconnect.php");
                        $email=$_POST['mail'];
                        $sql="select * from teacher_login where email='$email'";
                        $rs=mysqli_query($conn,$sql);
                        $p=mysqli_affected_rows($conn);
                        if($p!=0) 
                        {
                            $res=mysqli_fetch_array($rs);
                            $to=$res['email'];
                            $subject='Remind password';
                            $message='Your password : '.$res['user_password']; 
                            $header='educationaldashboard.me@gmail.com';

                            require '../Teacher Module/PHPMailer/PHPMailerAutoload.php';
                            $mail = new PHPMailer;
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = $header;                 // SMTP username
                            $mail->Password = 'educationaldashboard';                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            $mail->setFrom($header, 'Educational Dashboard');
                            $mail->addAddress($to, 'Ankit Mishra');     // Add a recipient
                            // $mail->addAddress('ellen@example.com');               // Name is optional
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');

                            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = $subject;
                            $mail->Body    = $message;
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            if(!$mail->send()) {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                                echo 'Message has been sent';
                            }
                        }
                        else{
                            echo'You entered mail id is not present';
                        }
                    }
                ?>
            </form>

</body>

</html>