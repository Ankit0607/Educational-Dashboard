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
                <h3 class="mb-4">
                        <a class="btn btn-primary d-none d-sm-inline-block float-right" role="button" href="add_teacher.php"><i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;New Account</a><br/>
                    </h3>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Teacher's Login Information&nbsp;</h6>
                        </div>
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
                                            <!-- <th>Serial NO.</th> -->
                                            <th>Profile Picture</th>
                                            <th>User's Name</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email Address</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require("dbconnect.php");
                                        $query = "select * from teacher_login";
                                        $res = mysqli_query($conn,$query);
                                        // $count=0;
                                        while($row=mysqli_fetch_array($res)){
                                            // $count=$count+1;
                                            $pic=$row["image"];
                                            $ip="../Teacher Module/assets/img/$pic";
                                            ?>
                                        <tr>
                                            <!-- <td> <?php echo $count; ?></td> -->
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="<?php echo $ip; ?>" /></td>
                                            <td><?php echo $row["user_id"]; ?> </td>
                                            <td><?php echo $row["fname"]; ?></td>
                                            <td><?php echo $row["lname"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["user_password"]; ?></td>
                                            <td><?php echo $row["address"]; ?></td>
                                            <td><?php echo $row["city"]; ?></td>
                                            <td><?php echo $row["country"]; ?></td>
                                            <td>
                                                <a href="edit_teacher.php?id=<?php echo $row['user_id']; ?>">
                                                <i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="del_teacher.php?id=<?php echo $row['user_id']; ?>">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                    </tbody>

                                </table>
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