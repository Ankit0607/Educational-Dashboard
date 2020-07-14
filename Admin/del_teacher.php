<?php
    $id=$_GET['id'];
    require("dbconnect.php");
    $sql="delete from teacher_login where user_id='$id'";
    mysqli_query($conn,$sql);    
   if(mysqli_affected_rows($conn)>0){
    header("Location:teacher_login.php");
   }
   else{
       echo "Record not deleted";
   }
?>