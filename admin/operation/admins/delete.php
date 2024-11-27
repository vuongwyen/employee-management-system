<?php
include '../../../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_GET['deleteadmin_ID'])){
    $admin_ID=$_GET['deleteadmin_ID'];
    $sql="DELETE FROM users WHERE admin_ID='$admin_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location:../../../admin/admins.php");
    }else{
        die(mysqli_errno($con));
    }
}
?>