<?php
    session_start();
    require("configure.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Educational Dashboard - Upload Assignments</title>
    <link rel="shortcut icon" href="../Teacher Module/assets/images/dlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">

    <div id="wrapper">
        <?php include "nav.php" ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav2.php" ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Upload Assignment</h6>
                                </div>
                                <div class="card-body">

                                    <?php
                                $name=$_SESSION["user_id"];
                                $sql="SELECT * from student_details where stdid='$name'";
                                $rs=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_array($rs);
                                $branch=$row["branch"];
                                $year=$row["year"];
                                //$sql_branch="SELECT id from tbl_branch where year_id=$year and branch_name='$branch'";
                                //$rs=mysqli_query($conn,$sql_branch);
                                //$row=mysqli_fetch_array($rs);
                                //$branchid=$row["id"];
                                
                                //$sql = "SELECT * FROM tbl_subject where branch_id=
                                            //(SELECT id from tbl_branch where year_id=$year and branch_name='$branch') ORDER BY subject_name";
                                $sql = "SELECT * FROM tbl_subject where branch_id=31 ORDER BY subject_name";
                                try {
                                    $stmt = $DB->prepare($sql);
                                    $stmt->execute();
                                    $results = $stmt->fetchAll();
                                } catch (Exception $ex) {
                                    echo($ex->getMessage());
                                }
                                ?>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <label>Subject</label>
                                    <select name="subject" class="form-control">
                                        <option value="">-- Please Select --</option>
                                        <?php foreach ($results as $rs) { ?>
                                        <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["subject_name"]; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    
                                    <br>
                                        <label>Choose Assignment File</label>
                                        <br><input type="file" name="file" accept="application/pdf"/><br>
                                        <br><input type="submit" value="Upload" name="b1" class="btn btn-primary">
                                        <input type="reset" value="Reset" name="b2" class="btn btn-danger float-right" />
                                    
                                        <?php
                                            if(isset($_POST["b1"]))	{
                                                $name=$_SESSION["user_id"];
                                                $sql="SELECT * from student_details where stdid='$name'";
                                                $rs=mysqli_query($conn,$sql);
                                                $row=mysqli_fetch_array($rs);
                                                $branch=$row["branch"];
                                                $year=$row["year"];
                                                $section=$row["section"];
                                                $college=$row["college"];
                                                $fname=$row["fname"];
                                                $lname=$row["lname"];
                                                $sub=$_POST["subject"];
                                                $a=$_FILES["file"]["name"];
                                                $sql="INSERT INTO upload_assignment (sid,name, year, branch, assignment, colname, subject) VALUES ($name,'$fname','$year',
                                                    '$branch','$a','$college','$sub')";
                                                if(mysqli_query($conn,$sql)>0){
                                                    echo "file uploaded";
                                                header("location:indexnew.php");
                                                }else{
                                                    echo mysqli_error($conn);
                                                }
                                            }else{
                                                echo " ";
                                            }
   
                                        ?>
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>

</html>