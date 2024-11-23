<?php
include '../../../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_GET['deleteemp_ID'])){
    $emp_ID=$_GET['deleteemp_ID'];
    $sql="DELETE FROM employee WHERE emp_ID='$emp_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location:../../../admin/employee.php");
    }else{
        die(mysqli_errno($con));
    }
}
?>