<?php
include '../../../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_GET['updatepayroll_ID'])){
    $payroll_ID=$_GET['updatepayroll_ID'];
    $sql="DELETE FROM payroll WHERE payroll_ID='$payroll_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location:../../../admin/payRoll.php");
    }else{
        die(mysqli_errno($con));
    }
}
?>