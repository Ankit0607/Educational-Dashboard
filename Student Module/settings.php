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
        //$pic=$_SESSION["pic"];
        //$ip="uploads/img/".$_SESSION["pic"]; 
        require("dbconnect.php");
        $sql="select * from student_details where stdid='$name'";
        $rs=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($rs);
        $pic=$row["image"];
        $ip="uploads/img/".$pic; 
        //$ip="assets/img/$pic";
        $email=$row["email"];
        $fname=$row["fname"];
        $lname=$row["lname"];
        $branch=$row["branch"];
        $year=$row["year"];
        $section=$row["section"];
        $phno=$row["phoneno"];
        $college=$row["college"];
        $dob=$row["dob"];
        $gender=$row["gender"];
        $course=$row["course"];

    ?>
        <?php include "nav.php" ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav2.php" ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                            <form action="upload_pic.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-6 mt-4 float-left" src="<?php echo $ip; ?>" alt="pic here" width="95" height="95">
                                    <div class="mb-3">
                                        <label> <input type="file" name="f1"/></label>
                                        <br/>
                                        <label><input type="submit" value="Update" name="b6" class="btn btn-primary float-right"/></label>
                                    </div>
                                </div>

                            </form>
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
                                                        <div class="form-group"><label for="name"><strong>Name</strong></label><input class="form-control"
                                                                type="text" value="<?php echo $fname.' '.$lname; ?>"
                                                                name="name" readonly></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="gender"><strong>Gender</strong></label><input class="form-control"
                                                                type="text" value="<?php echo $gender; ?>"
                                                                name="gender" readonly></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                    <form action="" method="POST" >
                                                        <div class="form-group"><label
                                                                for="id"><strong>I.D.</strong></label>
                                                            <input class="form-control" type="text"
                                                                value="<?php echo $name; ?>" name="id" readonly>

                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>E-Mail
                                                                    I.D.</strong></label><input class="form-control"
                                                                type="email" value="<?php echo $email; ?>" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                    <form action="" method="POST" >
                                                        <div class="form-group"><label
                                                                for="dob"><strong>D.O.B.</strong></label>
                                                            <input class="form-control" type="date"
                                                                value="<?php echo $dob; ?>" name="dob">

                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                            <div class="form-group"><label for="phno"><strong>Phone Number</strong></label><input class="form-control"
                                                                    type="number" value="<?php echo $phno; ?>" name="phno">
                                                            </div>
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
                                                        $id=$_POST["id"];
                                                        $email=$_POST["email"];
                                                        $dob=$_POST["dob"];
                                                        $phno=$_POST["phno"];
                                                        $sql="UPDATE student_details SET email='$email',dob='$dob',phoneno='$phno' where stdid='$id'";
                                                        if(mysqli_query($conn,$sql)>0){
                                                            header("location:indexnew.php");
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

                    <!--change password code-->
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
                                                        $id=$_POST["id"];
                                                        $opass=$_POST["old_password"];
                                                        $npass=$_POST["new_password"];
                                                        $cnpass=$_POST["c_n_password"];
                                                        $sql="select * from student_details where stdid='$name'";
                                                        $rs=mysqli_query($conn,$sql);
                                                        $row=mysqli_fetch_array($rs);
                                                        $pass=$row["pass"];
                                                        
                                                        if(($pass == $opass) && ($npass == $cnpass)){
                                                            $query="UPDATE student_details SET pass='$npass' where stdid='$id'";
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