<?php
    header("Content-Type:text/html;charyset=utf-8");
    include "common.php";
    $name=$_POST["username"];
    $gender=$_POST["gender"];
    $age = $_POST["age"];
    // print_r($_FILES);
    //把文件存储
    $filename= uniqid().strrchr($_FILES["file"]["name"],".");
    move_uploaded_file($_FILES["file"]["tmp_name"],"img/{$filename}");
    $conn = connect("fuxi");
    $sql = "insert into student value(null,'{$name}','{$gender}','{$age}','img/{$filename}')";
    execute($conn,$sql);
    header("Location:01index.html");  
?>