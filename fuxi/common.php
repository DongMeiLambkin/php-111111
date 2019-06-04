<?php
    header("Content-Type:text/html;charset=utf-8");
    //封装函数 
    function connect($bdName){
        $conn = mysqli_connect("localhost","root","root",$bdName);
        if(!$conn){
            die("连接失败");
        }
        return $conn;
    }
    function execute($conn,$sql){
        //执行增删改sql语句
        $res= mysqli_query($conn,$sql);
        if(!$res){
            die("执行出差:".mysqli_error($conn));
        }
        mysqli_close($conn);
        return $res;
    }
    function query($conn,$sql){
        //执行查询sql语句
        $res = mysqli_query($conn,$sql);
        //用一个数组来接受数据
        $result=[];
        if(!$res){
            $result=["code"=>0,"msg"=>"查询失败：".mysqli_error($conn),"data"=>[]];
        }else if(mysqli_num_rows($res) == 0){
            $result = ["code" =>0,"msg"=> "没找到数据","data"=>[] ];
        }else{
            //循环遍历数组
            while($row =mysqli_fetch_assoc($res)){
                $data[]=$row;
            }
            $result = ["code" =>1,"msg"=>"查询成功","data"=>$data];
        }
        mysqli_close($conn);
        return $result;
    }
?>