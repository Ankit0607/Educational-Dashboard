<?php
    ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Educational Dashboard</title>
    <link rel="shortcut icon" href="../Teacher Module/assets/images/dlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/x.y.z/evil-icons.min.css"> -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>

<body id="page-top">

    <div id="wrapper">
        <?php include "nav.php" ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav2.php" ?>
                <div class="container-fluid">
                <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST">
                    <div class="card shadow mb-" style="margin-top:30px;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Teacher's Sinup</h6>
                        </div>
                        <div class="card-body">
                            <?php
                                $id=$_GET['id'];
                                require("dbconnect.php");
                                $query="select * from teacher_login where user_id='$id'";
                                $rs=mysqli_query($conn,$query);
                                $row=mysqli_fetch_array($rs);
                            ?>
                            <label>User Name</label>
                            <input type="text" name="uid" class="form-control" value="<?php echo $row['user_id']; ?>"readonly />
                            <label><br/>First Name</label>
                            <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control"/>
                            <label><br/>Last Name</label>
                            <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control"/>
                            <label><br/>Email Address</label>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control"/>
                            <label><br/>Password</label>
                            <input type="text" name="pass" value="<?php echo $row['user_password']; ?>" class="form-control" />
                            <label><br/>Address</label>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control"/>
                            <label><br/>City</label>
                            <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control"/>
                            <label><br/>Country</label>
                            <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control"/>
                            <br/>
                            <button type="submit" class="btn btn-primary" name="b1">Update</button>
                            <input type="reset" value="Reset" class="btn btn-danger float-right" name="b2"/>

                            <?php
                                if(isset($_POST["b1"])){
                                    // session_start();
                                    require("dbconnect.php");
                                    $uid=$_POST["uid"];
                                    $fname=$_POST["fname"];
                                    $lname=$_POST["lname"];
                                    $email=$_POST["email"];
                                    $pass=$_POST["pass"];
                                    // $cpass=$_POST["cpass"];
                                    $sql="update teacher_login set user_id='$uid',user_password='$pass',email='$email',fname='$fname',lname='$lname',address='$address',city='$city',country='$country' where user_id='$id'";
                                    $rs=mysqli_query($conn,$sql);
                                    if($rs>0){
                                        header("location:teacher_login.php");
                                    }
                                    else{
                                        echo "User Not Registered";
                                    }
                                }	
                            ?>
                            </form>
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
    </div> 
                </div>
               
            </div>

            <footer class="bg-white sticky-footer">

                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>© 2020 Copyright Educational Dashboard</span></div>
                </div>
            </footer>

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/x.y.z/evil-icons.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>