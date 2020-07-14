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
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        session_start();
        $name=$_SESSION["user_id"];
        // $pic=$_SESSION["pic"];
        // $ip="useruploads/".$_SESSION["pic"]; 
        require("dbconnect.php");
        $sql="select * from teacher_login where user_id='$name'";
        $rs=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($rs);
        $pic=$row["image"];
        // $ip="useruploads/".$pic; 
        $ip="assets/img/$pic";
        $email=$row["email"];
        $fname=$row["fname"];
        $lname=$row["lname"];
        $address=$row["address"];
        $city=$row["city"];
        $country=$row["country"];

    ?>
        <?php include "nav.php" ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav2.php" ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                            <form action="upload_pic.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="<?php echo $ip; ?>" width="160" height="160">
                                    <div class="mb-3">
                                        <label> <input type="file" name="f1" style="align-content: center;"/></label>
                                        <br/>
                                        <label><input type="submit" value="Upload" name="b6" class="btn btn-primary float-left"/></label>
                                    </div>
                                </div>

                            </form>
                        </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Subject Results&nbsp;</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Operating System<span
                                            class="float-right">20%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Discrete Mathematics<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold"> Database<span class="float-right">60%</span>
                                    </h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Overall Result<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account setup<span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            
                                                <div class="form-row">
                                                    <div class="col">
                                                    <form action="" method="POST" >
                                                        <div class="form-group"><label
                                                                for="username"><strong>Username</strong></label>
                                                            <input class="form-control" type="text"
                                                                value="<?php echo $name; ?>" name="username" readonly>

                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Email
                                                                    Address</strong></label><input class="form-control"
                                                                type="email" value="<?php echo $email; ?>" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>First
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" value="<?php echo $fname; ?>"
                                                                name="first_name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Last
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" value="<?php echo $lname; ?>"
                                                                name="last_name"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <input type="submit" value="Save" class="btn btn-primary"
                                                        name="b1" />
                                                    <input type="reset" value="Reset" class="btn btn-danger float-right"
                                                        name="b3" />
                                                </div>
                                                <!-- ############### -->
                                                <?php
                                                    if(isset($_POST["b1"])){
                                                        $username=$_POST["username"];
                                                        $email=$_POST["email"];
                                                        $fname=$_POST["first_name"];
                                                        $lname=$_POST["last_name"];
                                                        $sql="UPDATE teacher_login SET email='$email',fname='$fname',lname='$lname' where user_id='$username'";
                                                        if(mysqli_query($conn,$sql)>0){
                                                            header("location:index.php");
                                                        }else{
                                                            echo mysqli_error($conn);
                                                        }
                                                        
                                                    }
                                                   
                                                ?>
                                                <!-- ############## -->

                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group"><label
                                                    for="address"><strong>Address</strong></label><input
                                                    class="form-control" type="text" value="<?php echo $address; ?>"
                                                    name="address"></div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="city"><strong>City</strong></label><input
                                                            class="form-control" type="text"
                                                            value="<?php echo $city; ?>" name="city"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="country"><strong>Country</strong></label><input
                                                            class="form-control" type="text"
                                                            value="<?php echo $country; ?>" name="country"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><input type="submit" value="Save"
                                                    class="btn btn-primary" name="b2" />
                                                <input type="reset" value="Reset" class="btn btn-danger float-right"
                                                    name="b4" />
                                            </div>
                                            <!-- ############## -->
                                            <?php
                                                    if(isset($_POST["b2"])){
                                                        $username=$_POST["username"];
                                                        $address=$_POST["address"];
                                                        $city=$_POST["city"];
                                                        $country=$_POST["country"];
                                                        $query="UPDATE teacher_login SET address='$address',city='$city',country='$country' where user_id='$username'";
                                                        if(mysqli_query($conn,$query)>0){
                                                            header("location:index.php");
                                                        }else{
                                                            echo mysqli_error($conn);
                                                        }
                                                        
                                                    }
                                                ?>
                                            <!-- ############## -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Change Password</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <tr>
                                        <td>
                                            <div class="form-group"><label for="address"><strong>Old
                                                        Password</strong></label><input class="form-control" type="password"
                                                    value="" name="old_password"></div>
                                        </td>

                                        <td>
                                            <div class="form-group"><label for="address"><strong>New
                                                        Password</strong></label><input class="form-control" type="password"
                                                    value="" name="new_password"></div>
                                        </td>

                                        <td>
                                            <div class="form-group"><label for="address"><strong>Confirm New
                                                        Password</strong></label><input class="form-control" type="password"
                                                    value="" name="c_n_password"></div>
                                        </td>

                                        <td>
                                            <input type="submit" value="Update" name="b5" class="btn btn-success" />
                                        </td>
                                    </tr>
                                    <!-- ############ -->
                                    <?php
                                                    if(isset($_POST["b5"])){
                                                        $username=$_POST["username"];
                                                        $opass=$_POST["old_password"];
                                                        $npass=$_POST["new_password"];
                                                        $cnpass=$_POST["c_n_password"];
                                                        $sql="select * from teacher_login where user_id='$name'";
                                                        $rs=mysqli_query($conn,$sql);
                                                        $row=mysqli_fetch_array($rs);
                                                        $pass=$row["user_password"];
                                                        
                                                        if(($pass == $opass) && ($npass == $cnpass)){
                                                            $query="UPDATE teacher_login SET user_password='$npass' where user_id='$username'";
                                                            if(mysqli_query($conn,$query)>0){
                                                                // header("location:index.php");
                                                                echo "<h6 style='color:green;'>"."Password Updated Successfully"."</h6>";
                                                            }else{
                                                                echo mysqli_error($conn);
                                                                echo "<h6 style='color:red;'>"."Password Cannot be changed!!!"."</h6>";
                                                            }
                                                            
                                                        }
                                                       
                                                    }
                                                    mysqli_close($conn);
                                                ?>
                                    <!-- ############ -->
                                    </form>
                                </div>
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
    <script src="assets/js/theme.js"></script>
</body>

</html>