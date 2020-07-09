<?php
    require("configure.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Educational Dashboard - Performance Report</title>
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
                                    <h6 class="text-primary font-weight-bold m-0">Performance Report</h6>

                                </div>

                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            <?php
                                $sql = "SELECT * FROM tbl_subject ORDER BY subject_name";
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
                                            <input type="submit" value="Generate Report" name="b1" class="btn btn-primary" />
                                            <input type="reset" value="Reset" name="b2" class="btn btn-danger float-right" />
                                        </td>
                                    </tr>
                                </table>
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