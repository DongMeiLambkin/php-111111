<?php
    header("Content-Type:tsxt/html;chartset=utf-8");
    include "common.php";
    $id = $_GET["id"];
    $conn = connect("fuxi");
    $sql = "delete from student where id = '{$id}'";
    execute($conn,$sql);
    header("Location:01index.html");
?>