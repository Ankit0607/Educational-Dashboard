<?php
    session_start();
    require("dbconnect.php");
    $id=$_SESSION["user_id"];
    $pic=$_FILES["f1"];
    $tfn=$pic["tmp_name"];
    $fn=$pic["name"];
    if(move_uploaded_file($tfn,'uploads/img/'.$fn)){
        // echo "File UPloaded";
        $sql="UPDATE student_details SET image='$fn' where stdid='$id'";
        if(mysqli_query($conn,$sql)>0){
        header("location:indexnew.php");
        }else{
            echo mysqli_error($conn);
        }
    }else{
        echo "file not uploaded";
    }
   
?>