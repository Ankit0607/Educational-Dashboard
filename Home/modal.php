 <!-- MOdal code -->
 <div class="modal fade" role="dialog" tabindex="-1" id="signup">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In Here</h4><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="text" name="sid" placeholder="I.D.">
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
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="usertype" id="student" value="Student" checked>
                            <label class="form-check-label" for="student">Student</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="usertype" id="teacher" value="Teacher">
                            <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;"
                                name="b1" type="submit">Log In</button></div>

                        <!-- Login code start -->
                        <?php 
                                if(isset($_POST["b1"])){
						            session_start();
                                    require("dbconnect.php");
                                    $id=$_POST["sid"];
                                    $pass=$_POST["pass"];
                                    if(isset($_POST["usertype"])=="Student")    {
                                        $sql="select * from student_details where stdid='$id' and pass='$pass'";
                                        $rs=mysqli_query($conn,$sql);
                                        $row=mysqli_fetch_array($rs);
                                        if(mysqli_num_rows($rs)>0){
                                            $_SESSION["user_id"]=$_POST["sid"];
                                            header("location:../Student Module/indexnew.php");
                                        }
                                    else    {
                                        $sql="select * from teacher_login where user_id='$id' and user_password='$pass'";
                                        $rs=mysqli_query($conn,$sql);
                                        $row=mysqli_fetch_array($rs);
                                        if(mysqli_num_rows($rs)>0){
                                            $_SESSION["user_id"]=$_POST["sid"];
                                            header("location:../Teacher Module/index.php");
                                        }
                                        
                                    }
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
                                    type="email" name="email" placeholder="E-Mail I.D.">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="email" name="pass" placeholder="Confirm E-Mail I.D.">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;"
                                name="submit" type="submit">Send</button></div>

                        <!-- Login code start -->
                        <?php 
                                 if(isset($_POST['submit']))
                                 { 
                                     require("dbconnect.php");
                                     $email=$_POST['email'];
                                     $sql="select * from student_details where email='$email'";
                                     $rs=mysqli_query($conn,$sql);
                                     $p=mysqli_affected_rows($conn);
                                     if($p!=0) 
                                     {
                                         $res=mysqli_fetch_array($rs);
                                         $to=$res['email'];
                                         $subject='Remind password';
                                         $message='Your password : '.$res['pass']; 
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
                                                <strong>Successfully Sent</strong> Your password has been sent to your registered email successfully.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                         }
                                     }
                                     else{
                                         echo 'You entered E-Mail I.D. is not present!';
                                     }
                                 }
			            ?>
                        <!-- Login code end  -->
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#sinup" href="#">Log In</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none"
                            data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Sign-Up Here</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- modal code for forget password end -->

    <!-- modal code for signup start -->
    <div class="modal fade" role="dialog" tabindex="-1" id="signin">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign-Up Here</h4><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="mt-4" action="" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" name="sid" placeholder="Student I.D.">
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
                                <div class="input-group-prepend">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="g" id="male" value="Male" checked>
                                        <label class="form-check-label" for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="g" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="form-row">
                                    <div class="col-auto">
                                        <select class="custom-select" name="course" required>
                                            <option selected disabled value="">Course</option>
                                            <option>B.Tech.</option>
                                            <option>M.Tech.</option>
                                            <option>M.B.A.</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="custom-select" name="college" required>
                                            <option selected disabled value="">College</option>
                                            <option>U.C.E.R.</option>
                                            <option>U.I.T</option>
                                            <option>U.C.E.M.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="form-row">
                                    <div class="col-auto">
                                        <select class="custom-select" name="year" required>
                                            <option selected disabled value="">Year</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="custom-select" name="section" required>
                                            <option selected disabled value="">Section</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="form-row">
                                    <div class="col-auto">
                                        <select class="custom-select" name="branch" required>
                                            <option selected disabled value="">Branch</option>
                                            <option>Computer Science/Information Technology</option>
                                            <option>Electrical Engineering</option>
                                            <option>Mechanical Engineering</option>
                                            <option>Electronics Engineering</option>
                                            <option>Civil Engineering</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-lock"></i></span></div><input class="form-control"
                                    type="email" required="" name="email" placeholder="E-Mail I.D.">
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
                                type="submit" name="b2">Sign Up</button>
                        </div>

                        <?php 
                            if(isset($_POST["b2"])){
                                // session_start();
                                require("dbconnect.php");
                                $sid=$_POST["sid"];
                                $fname=$_POST["fname"];
                                $lname=$_POST["lname"];
                                $course=$_POST["course"];
                                $gender=$_POST["g"];
                                $branch=$_POST["branch"];
                                $college=$_POST["college"];
                                $year=$_POST["year"];
                                $section=$_POST["section"];
                                $email=$_POST["email"];
                                $pass=$_POST["pass"];
                                $cpass=$_POST["cpass"];

                                $sql="INSERT INTO student_details (stdid,fname,lname,course,gender,branch,college,year,section,email,pass,cpass) VALUES 
                                    ($sid,'$fname','$lname','$course','$gender','$branch','$college',$year,'$section','$email','$pass','$cpass')";
                                $rs=mysqli_query($conn,$sql);
                                if($rs>0){
                                    header("location:index.php");
                                }
                                else{
                                    echo "User Not Registered";
                                }
                            }	
                        ?>
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Already have an Account?&nbsp;<a class="text-decoration-none"
                            data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Log In Here</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- modal code end -->