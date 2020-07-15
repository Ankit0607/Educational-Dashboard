<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap"></div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
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
                                                while($row=mysqli_fetch_array($res1))   {
                                                    $count=$count+1;
                                            ?>
                                                <tr>
                                                    <td> <?php echo $count; ?></td>
                                                    <td><?php  echo $row["subject"]; ?></td>
                                                    <td><a href="<?php echo $row["notes"]; ?>" download target="_blank"><?php echo $row["notes"]; ?></a></td>
                                                </tr>
                                            <?php
                                                    }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--Notes table ends-->