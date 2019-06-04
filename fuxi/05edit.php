<?php
    include "common.php";
    // print_r($_GET);
    $id = $_GET["id"];
    $conn = connect("fuxi");
    $sql = "select * from student where id='{$id}' ";
    $res = query($conn,$sql);
    // print_r($res);
    $data =$res["data"][0];
    // print_r($data)  //得到对应的数组
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="06reserve.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id?>" >
        学生姓名<input type="text" name="username" value="<?php echo $data["stu_name"]?>"><br>
        性别：
        <input type="radio" name="gender"  value="男" <?php echo $data["gender"] == "男" ? "checked":"" ?> >男
        <input type="radio" name="gender"  value="女" <?php echo $data["gender"] == "女" ? "checked":"" ?>>女<br>
        年龄:<input type="text" name="age" id="age"value="<?php echo $data["age"]?>"><br>
        头像：<input type="file" name="file" id="file" value="<?php echo $data["pics"]?>"><br>
        <input type="submit" value="修改">
    </form>
</body>
</html>