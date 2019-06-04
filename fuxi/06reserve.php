<?php
    include "common.php";
    print_r($_POST);  //打印这个可以看到前端的数据有没传递过来
    $id = $_POST["id"];
    $name = $_POST["username"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    print_r($_FILES);
    $conn = connect("fuxi");
   
    if($_FILES["file"]["error"] == 0 ){//已经上传新图片
        //设置图片的完整路径
        $filename="img/".uniqid().strrchr($_FILES["file"]["name"],".");
        echo $filename;
        //把图片保存到本地地址
        move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
        $sql ="update student set stu_name='{$name}',gender='{$gender}',age ='{$age}',pics = '{$filename}'where id='{$id}'";
        execute($conn,$sql);
        echo "修改成功...正在跳回主页...";
        header("Refresh:1;url=01index.html");

    }else{
        $sql = "update student set stu_name='{$name}',gender='{$gender}',age='{$age}' where id='{$id}'";
        execute($conn,$sql);
        echo "执行成功";
        echo "修改成功...正在跳回主页...";
        header("Location:./01index.html");
    }
   
?>

