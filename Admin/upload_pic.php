<?php
    session_start();
    require("dbconnect.php");
    $username=$_SESSION["user_id"];
    $pic=$_FILES["f1"];
    $tfn=$pic["tmp_name"];
    $fn=$pic["name"];
    if(move_uploaded_file($tfn,'assets/img/'.$fn)){
        // echo "File UPloaded";
        $sql="UPDATE teacher_login SET image='$fn' where user_id='$username'";
        if(mysqli_query($conn,$sql)>0){
        header("location:index.php");
        }else{
            echo mysqli_error($conn);
        }
    }else{
        echo "file not uploaded";
    }
    // $username=$_SESSION["user_id"];
    // $pic1=$_FILES["f1"];
    
    // $sql="UPDATE teacher_login SET image='$pic1' where user_id='$username'";
    // if(mysqli_query($conn,$sql)>0){
    //     header("location:index.php");
    // }else{
    //     echo mysqli_error($conn);
    // }

?>