<?php
include '../../../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_GET['deletequal_ID'])){
    $qual_ID=$_GET['deletequal_ID'];
    $sql="DELETE FROM payroll WHERE qual_ID='$qual_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location:../../../admin/qualification.php");
    }else{
        die(mysqli_errno($con));
    }
}
?>