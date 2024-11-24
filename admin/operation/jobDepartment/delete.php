<?php
include '../../../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_GET['deletejob_ID'])){
    $emp_ID=$_GET['deletejob_ID'];
    $sql="DELETE FROM job_department WHERE deletejob_ID='$job_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location:../../../admin/jobDepartment.php");
    }else{
        die(mysqli_errno($con));
    }
}
?>