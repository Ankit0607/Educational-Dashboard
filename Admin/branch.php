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
        <script>
function openWin() {
  window.open("add_branch.php");
}
</script>


</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "nav.php" ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include "nav2.php" ?>
                <div class="container-fluid">
                    <h3 class="mb-4">
                        <a class="btn btn-primary d-none d-sm-inline-block float-right" role="button" href="add_branch.php"><i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Add Branch</a><br/>
                    </h3>
                            
                    <div class="card shadow mb-4">
                    
                        <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">Manage Branch&nbsp;</h6>
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
                                            <th>S No.</th>
                                            <th>Branch ID</th>
                                            <th>Branch Name</th>
                                            <th>Year ID</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require("dbconnect.php");
                                        $query = "select * from tbl_branch";
                                        $res = mysqli_query($conn,$query);
                                        $count=0;
                                        while($row=mysqli_fetch_array($res)){
                                            $count=$count+1;
                                            ?>
                                        <tr>
                                            <td> <?php echo $count; ?></td>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["branch_name"]; ?></td>
                                            <td><?php echo $row["year_id"]; ?></td>
                                            <td>
                                                <a href="edit_branch.php?id=<?php echo $row['id']; ?>">
                                                <i class="fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <a href="del_branch.php?id=<?php echo $row['id']; ?>">
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
        <!-- </div> -->



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