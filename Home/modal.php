 <!-- MOdal code -->
 <div class="modal fade" role="dialog" tabindex="-1" id="signup">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In</h4><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="email" name="email" placeholder="User Name only">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-lock"></i></span></div><input class="form-control"
                                    type="password" name="pass" placeholder="Password">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;"
                                name="b1" type="submit">Log in</button></div>

                        <!-- Login code start -->
                        <?php 
                                if(isset($_POST["b1"])){
						            session_start();
                                    require("dbconnect.php");
                                    $id=$_POST["email"];
                                    $pass=$_POST["pass"];
                                    $sql="select * from teacher_login where user_id='$id' and user_password='$pass'";
						            $rs=mysqli_query($conn,$sql);
                                    $row=mysqli_fetch_array($rs);
                                    if(mysqli_num_rows($rs)>0){
                                        $_SESSION["user_id"]=$_POST["email"];
                                        $_SESSION["pic"]=$row["image"];
                                        header("location:../Teacher Module/index.php");
                                        // header("location:temp.php"); 
                                    }
                                    else{
                                        echo "Invalid User Name or Password";
                                    }
					            }	
			?>
                        <!-- Login code end  -->
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#forget" href="#">Forget password</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none"
                            data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal code end  -->

    <!-- modal code for forget password start -->
    <div class="modal fade" role="dialog" tabindex="-1" id="forget">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Forget Password</h4><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="email" name="email" placeholder="Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="email" name="pass" placeholder="Confirm Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;"
                                name="submit" type="submit">Forget</button></div>

                        <!-- Login code start -->
                        <?php 
                                 if(isset($_POST['submit']))
                                 { 
                                     require("dbconnect.php");
                                     $email=$_POST['email'];
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
             
                                         require '../Home/PHPMailer/PHPMailerAutoload.php';
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
                                         $mail->isHTML(true);                                  // Set email format to HTML
             
                                         $mail->Subject = $subject;
                                         $mail->Body    = $message;
                                         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             
                                         if(!$mail->send()) {
                                             echo 'Message could not be sent.';
                                             echo 'Mailer Error: ' . $mail->ErrorInfo;
                                         } else {
                                            ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Forget Password</strong> Your password has been sent to your registered email successfully.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                         }
                                     }
                                     else{
                                         echo'You entered mail id is not present';
                                     }
                                 }
			            ?>
                        <!-- Login code end  -->
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#sinup" href="#">Log In</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none"
                            data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- modal code for forget password end -->

    <!-- modal code for sinup start -->
    <div class="modal fade" role="dialog" tabindex="-1" id="signin">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up Now</h4><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="mt-4" action="" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" name="uid" placeholder="User Name">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" name="fname" placeholder="First Name">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" name="lname" placeholder="Last Name">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="email" required="" name="email" placeholder="Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-lock"></i></span></div><input class="form-control"
                                    type="password" required="" name="pass" placeholder="Password">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-lock"></i></span></div><input class="form-control"
                                    type="password" required="" name= "cpass"placeholder="Confirm Password">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"
                                    required="" checked=""><label class="form-check-label" for="formCheck-1">I agree all
                                    the terms and conditions.</label></div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;"
                                type="submit" name="b2" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Sign Up</button>
                        </div>

                        <?php 
                            if(isset($_POST["b2"])){
                                // session_start();
                                require("dbconnect.php");
                                $uid=$_POST["uid"];
                                $fname=$_POST["fname"];
                                $lname=$_POST["lname"];
                                $email=$_POST["email"];
                                $pass=$_POST["pass"];
                                $cpass=$_POST["cpass"];
                                $sql="INSERT INTO teacher_login (user_id,user_password,email,fname,lname) VALUES ('$uid','$pass','$email','$fname','$lname')";
                                $rs=mysqli_query($conn,$sql);
                                
                                // $row=mysqli_fetch_array($rs);
                                if(mysqli_affected_rows($rs)>0){
                                    // $_SESSION["user_id"]=$_POST["email"];
                                    // $_SESSION["pic"]=$row["image"];
                                    header("location:index.php");
                                    // header("location:temp.php"); 
                                }
                                else{
                                    echo "User Not Registered";
                                }
                            }	
                        ?>
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Already have an Account?&nbsp;<a class="text-decoration-none"
                            data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Log In</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- modal code end -->