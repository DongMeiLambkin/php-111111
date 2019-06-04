<?php 
    header("Content-Type:text/html;charset=utf-8");
    include "common.php";
    $conn = connect("fuxi");
    $sql = "select * from student order by id";
    $res=query($conn,$sql);
    echo json_encode($res);  
?>
