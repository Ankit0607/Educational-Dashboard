<?php
    $id=$_GET['id'];
    require("dbconnect.php");
    $sql="delete from tbl_branch where id=$id";
    mysqli_query($conn,$sql);    
   if(mysqli_affected_rows($conn)>0){
    header("Location:branch.php");
   }
   else{
       echo "Record not deleted";
   }
?>