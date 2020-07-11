<?php 
    ob_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Educational Dashbord</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/x.y.z/evil-icons.min.css">

</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                </div>
                <div class="header-bottom header-sticky">
                    <!-- Logo -->
                    <div class="logo d-none d-lg-block">
                        <a href="index.php"><img src="assets/img/logo/logo.png" alt="" width="230px;"></a>
                    </div>
                    <div class="container-fluid">
                        <div class="menu-wrapper">
                            <!-- Logo -->
                            <div class="logo logo2 d-block d-lg-none">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <!-- <li><a href="login.php">Login</a></li> -->
                                        <li><a href="" data-toggle="modal" data-target="#signup">Login</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#signin">sinup</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Developers</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-search d-none d-lg-block">
                                <form action="#" class="form-box f-right ">
                                    <input type="text" name="Search" placeholder="Search for...">
                                    <div class="search-icon">
                                        <i class="fas fa-search special-tag"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
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
                                    type="email" name="email" placeholder="Email">
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
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none" href="#">Forget password</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none"
                            data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="signin">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up Now</h4><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="text-center"><button class="btn btn-primary text-left" style="width: 100%;" type="button"><i class="fa fa-facebook"></i>&nbsp; Continue with Facebook</button></div>
                        <div class="text-center mt-2"><button class="btn btn-light text-left border-dark" style="width: 100%;" type="button"><i class="fa fa-google"></i>&nbsp; Continue with Google</button></div> -->
                    <form class="mt-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" placeholder="User Name">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" placeholder="First Name">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-user-o"></i></span></div><input class="form-control"
                                    type="text" required="" placeholder="Last Name">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-envelope-o"></i></span></div><input class="form-control"
                                    type="email" required="" placeholder="Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i
                                            class="fa fa-lock"></i></span></div><input class="form-control"
                                    type="password" required="" placeholder="Password">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"
                                    required="" checked=""><label class="form-check-label" for="formCheck-1">I agree all
                                    the terms and conditions.</label></div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;"
                                type="button">Sign Up</button></div>
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


    <main>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".2s">Educational Dashboard</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">The New Way To Teach Students With
                                        Us!</h1>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn">
                                        <a href="login.php" class="btn hero-btn" data-animation="fadeInLeft"
                                            data-delay=".8s">Get Started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="hero-man d-none d-lg-block f-right" data-animation="jello" data-delay=".4s">
                                    <img src="assets/img/hero/heroman.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".2s">Educational Dashboard</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">The New Way To Teach Students With
                                        Us!</h1>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn">
                                        <a href="industries.html" class="btn hero-btn" data-animation="fadeInLeft"
                                            data-delay=".8s">Get Started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="hero-man d-none d-lg-block f-right" data-animation="jello" data-delay=".4s">
                                    <img src="assets/img/hero/heroman.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? Categories Area Start -->
        <div class="categories-area section-padding30">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-70">
                            <span>Our Poratal Features</span>
                            <h2>Lets Brows All Catagories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-web-design"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Upload Notes</a></h5>
                                <p>Here you can upload notes as per subject wise for the students studying in any
                                    stream.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-education"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Upload Assignments</a></h5>
                                <p>Here We can upload Assignments as per subject wise for the students studying in any
                                    stream</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-communications"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Online Test</a></h5>
                                <p>You can organise online test for the class and evaluate as well. Better time
                                    organisation.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Count Down End -->
            <!--? Popular Course Start -->
            <div class="popular-course section-padding30">
                <div class="container">
                    <div class="row justify-content-sm-center">
                        <div class="cl-xl-7 col-lg-8 col-md-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle text-center mb-70">
                                <span>Most Effective Analysis of Result Result</span>
                                <h2>Our Analysis Categories</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <!-- Single course -->
                            <div class="single-course mb-40">
                                <div class="course-img">
                                    <img src="assets/img/gallery/popular_sub1.png" alt="">
                                </div>
                                <div class="course-caption">
                                    <div class="course-cap-top">
                                        <h4><a href="#">Marks Analysis</a></h4>
                                    </div>
                                    <div class="course-cap-mid d-flex justify-content-between">
                                        <div class="course-ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <!-- Single course -->
                            <div class="single-course mb-40">
                                <div class="course-img">
                                    <img src="assets/img/gallery/popular_sub2.png" alt="">
                                </div>
                                <div class="course-caption">
                                    <div class="course-cap-top">
                                        <h4><a href="#">Subject Analysis</a> </h4>
                                    </div>
                                    <div class="course-cap-mid d-flex justify-content-between">
                                        <div class="course-ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <!-- Single course -->
                            <div class="single-course mb-40">
                                <div class="course-img">
                                    <img src="assets/img/gallery/popular_sub3.png" alt="">
                                </div>
                                <div class="course-caption">
                                    <div class="course-cap-top">
                                        <h4><a href="#">Graphical Analysis</a></h4>
                                    </div>
                                    <div class="course-cap-mid d-flex justify-content-between">
                                        <div class="course-ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-area section-padding2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="about-caption mb-50">
                                <!-- Section Tittle -->
                                <div class="section-tittle mb-35">
                                    <span>More About Our Website</span>
                                    <h2>Want to know more</h2>
                                </div>
                                <p>We have created this website for uploading notes, assignments and taking test via
                                    online mode. This provide simplicity for both students and Teachers as well.</p>
                                <ul>
                                    <li><span class="flaticon-business"></span> Creative ideas base</li>
                                    <li><span class="flaticon-communications-1"></span>Realiable for Teachers</li>
                                    <li><span class="flaticon-graduated"></span> Relaible for students</li>
                                    <li><span class="flaticon-tools-and-utensils"></span>Deep Analysis of class tests
                                    </li>
                                </ul>
                                <a href="about.php" class="btn">More About Us</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- about-img -->
                            <div class="about-img ">
                                <div class="about-font-img d-none d-lg-block">
                                    <img src="assets/img/gallery/about2.png" alt="">
                                </div>
                                <div class="about-back-img ">
                                    <img src="assets/img/gallery/about1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="back-top">
                    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
                </div>
            </div>
           
        </div>

    </main>
    <footer style="position: sticky;"><?php include "footer.php" ?></footer>
    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/x.y.z/evil-icons.min.js"></script>


</body>

</html>