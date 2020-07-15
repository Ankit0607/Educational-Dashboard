<?php
    require("configure.php");
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Educational Dashboard - Check Repository</title>
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
                                    <h6 class="text-primary font-weight-bold m-0">Show Repository</h6>

                                </div>

                                <table class="table table-borderless">
                                    <tr>
                                    <tr>
                                        <td>
                                            <?php
                                            $name=$_SESSION["user_id"];
                                            $sql="SELECT * from student_details where stdid='$name'";
                                            $rs=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($rs);
                                            $branch=$row["branch"];
                                            $year=$row["year"];
                                            $sql = "SELECT * FROM tbl_subject where branch_id=31 ORDER BY subject_name";
                                            try {
                                                $stmt = $DB->prepare($sql);
                                                $stmt->execute();
                                                $results = $stmt->fetchAll();
                                            } catch (Exception $ex) {
                                                echo($ex->getMessage());
                                            }
                                            ?>
                                            <label><br>Subject</label><select name="subject" class="form-control">
                                                <option value="">All Subjects</option>
                                                <?php foreach ($results as $rs) { ?>
                                                <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["subject_name"]; ?>
                                                </option>
                                                <?php } ?>
                                            </select>

                                        </td>

                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" value="Show" name="b1" class="btn btn-primary" /><br>
                                        </td>
                                    </tr>
                                </table>
                                <div class="card-body">
                            <div class="row">
                               
                                    <div class="col-md-6 text-nowrap">
                                        
                                    </div>
                                    <div class="col-md-6">
                                       
                                    </div>
                                </div>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info">
                                    <table class="table dataTable my-0 table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>S No.</th>
                                                <th>Subject Name</th>
                                                <th>Assignment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        require("dbconnect.php");
                                        session_start();
                                        $name=$_SESSION["user_id"];
                                        $query = "select * from upload_assignment where sid=$name";
                                        $res = mysqli_query($conn,$query);
                                        $count=0;
                                        while($row=mysqli_fetch_array($res)){
                                            $count=$count+1;
                                            $sid=$row["subject"];
                                            ?>
                                            <tr>
                                                <td> <?php echo $count; ?></td>
                                                <td><?php  $query1 = "select subject_name from tbl_subject where id=$sid";
                                                            $res1 = mysqli_query($conn,$query1);
                                                            echo mysqli_fetch_array($res1)["subject_name"]; ?></td>
                                                <td><?php echo $row["assignment"]; ?></td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>


                        </div>
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
                                                $sql="SELECT FROM upload_assignment (name, year, branch, assignment, colname, subject) VALUES ('$fname','$year',
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