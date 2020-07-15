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
                        $mail=$_POST['mail'];
                        $sql="select * from teacher_login where email='$mail'";
                        $rs=mysqli_query($conn,$sql);
                        $p=mysqli_affected_rows($conn);
                        if($p!=0) 
                        {
                            $res=mysqli_fetch_array($rs);
                            $to=$res['email'];
                            $subject='Remind password';
                            $message='Your password : '.$res['user_password']; 
                            $headers='From:shivam6072000@gmail.com';
                            $m=mail($to,$subject,$message,$headers);
                            if($m)
                            {
                                echo'Check your inbox in mail';
                            }
                            else{
                                echo'mail is not send';
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