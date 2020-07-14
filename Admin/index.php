<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Educational Dashboard</title>
    <link rel="shortcut icon" href="assets/img/dlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md fixed-top text-white bg-dark text-capitalize navigation-clean-button" data-aos="fade">
        <div class="container-fluid">
            <span class="navbar-logo">
                <a href="login.php">
                     <img src="assets/img/dlogo.png" alt="Mobirise" style="height: 3.8rem;">
                </a>
            </span>
            <a class="navbar-brand" data-aos="flip-left" role="presentation" href="#">Educational Dashboard</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">About US</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Developers</a></li>
                    </ul><span class="navbar-text actions"> <a class="login" href="login.php">Log In</a>
                    <a class="btn btn-light action-button" role="button" href="#">Sign Up</a></span>
                </div>
        </div>
    </nav>
    
  

    <div class="login-dark">
        <form method="post" action="">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" name="b1" type="submit">Log In</button></div>
            <a class="forgot" href="#">Forgot your email or password?</a>

            <?php 
                    if(isset($_POST["b1"])){
						session_start();
                        require("dbconnect.php");
                        $id=$_POST["email"];
						$pass=$_POST["password"];
                        $sql="select * from teacher_login where user_id='$id' and user_password='$pass'";
						$rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        if(mysqli_num_rows($rs)>0){
                            $_SESSION["user_id"]=$_POST["email"];
                            $_SESSION["pic"]=$row["image"];
                            header("location:./Teacher Module/index.php");
                            // header("location:temp.php");
                            ?>
							// ob_end_flush();
							// echo "valid user";
                            <?php
                              }
                        else{
                            echo "Invalid User Name or Password";
                        }
					}
					
			?>		
        </form>
    </div>
    <div class="row login-form">
        <div class="col">
            <footer id="myFooter">
                <div class="container-fluid">
                    <div class="row text-center">
                        <!-- <div class="col-12 col-sm-6 col-md-3">
                            <h1 class="logo" style="margin-top:30px;"><a href="#">&nbsp;Educational Dashboard&nbsp;</a></h1>
                        </div> -->
                        <div class="col-12 col-sm-6 col-md-3 img-logo"style="margin-top:30px;>
                            <a href="teacher.php"><img src="assets/img/dlogo.png" width="150px;"alt="Mobirise"></a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2">
                            <h5>Get started</h5>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us<br></a></li>
                                <li><a href="#">Sign Up</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2">
                            <h5>E Dashboard</h5>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Developers<br></a></li>
                                <li><a href="#">Reviews</a></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <h5>Support</h5>
                            <ul>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Help Desk<br></a></li>
                                <li><a href="#">Forums</a></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="col-md-3 social-networks">
                            <div></div><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <button
                                class="btn btn-primary" style="margin-top:20px;" type="button">Contact us</button>
                        </div>
                    </div>
                    <div class="row footer-copyright">
                        <div class="col">
                            <p>© 2020 Copyright Educational Dashboard</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>