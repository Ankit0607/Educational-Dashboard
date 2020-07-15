<?php
    require("configure.php");
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Educational Dashboard - Download Area</title>
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
                                    <h6 class="text-primary font-weight-bold m-0">Download</h6>

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
                                            try {
                                                $stmt = $DB->prepare($sql);
                                                $stmt->execute();
                                                $results = $stmt->fetchAll();
                                            } catch (Exception $ex) {
                                                echo($ex->getMessage());
                                            }
                                            ?>
                                            <label><br>Select Here</label><select name="subject" class="form-control">
                                                <option value="note">Notes</option>
                                                <option value="assignment">Assignment</option>
                                            </select>

                                        </td>

                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" value="Show" name="b1" class="btn btn-primary" /><br>
                                        </td>
                                    </tr>
                                </table>

                                <!-- notes table-->
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
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        require("dbconnect.php");
                                        $name=$_SESSION["user_id"];
                                            $sql="SELECT * from student_details where stdid='$name'";
                                            $rs=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                                            $row=mysqli_fetch_array($rs);
                                            $branch=$row["branch"];
                                            $year=$row["year"];

                                        $query = "SELECT * from notes where year=$year";
                                        $res1 = mysqli_query($conn,$query);
                                        $count=0;
                                        while($row=mysqli_fetch_array($res1)){
                                            $count=$count+1;
                                            ?>
                                            <tr>
                                                <td> <?php echo $count; ?></td>
                                                <td><?php  echo $row["subject"]; ?></td>
                                                <td><a href="#"><?php echo $row["notes"]; ?></a></td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        <!--Notes table ends-->

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