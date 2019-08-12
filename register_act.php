<?php
require('dbconnect.php');

//receive values from register form
$username=isset($_POST['username'])?$_POST['username']:"";

//echo $username;
//exit;
$password=isset($_POST['password'])?$_POST['password']:"";



$re_password=isset($_POST['re_password'])?$_POST['re_password']:"";

$email=isset($_POST['email'])?$_POST['email']:"";
$mobile=isset($_POST['mobile'])?$_POST['mobile']:"";




//judge the values can not be empty
if(empty($username)){
   

    echo "<script>
    alert('username can not be empty');
    location.href='register.php';
    </script>";
    exit;
}
if(empty($password)){
    

    echo "<script>
    alert('password can not be empty');
    location.href='register.php';
    </script>";
    exit; 
}
if(empty($re_password)){
    

    echo "<script>
    alert('re_enter password can not be empty');
    location.href='register.php';
    </script>";
    exit;
}
if(empty($email )){
   

    echo "<script>
    alert('email can not be empty');
    location.href='register.php';
    </script>";
    exit;
}
if(empty($mobile)){
    

    echo "<script>
    alert('mobile can not be empty');
    location.href='register.php';
    </script>";
    exit;
}
//judge two times password same or not
if($password != $re_password){
    echo "<script>
    alert('two times password must be same');
    location.href='register.php';
    </script>";
    exit;
}
    


//search in database to judge if the username exists or not 
$sql="select * from user where username ='$username'"; 
//echo $sql;
//exit;
$result=mysqli_query($link,$sql);


$row=mysqli_fetch_assoc($result);
//var_dump($row);
//exit;

if(!empty($row)){
    echo "<script>
    alert('A duplicate username');
    location.href='register.php';
    </script>";
    exit;
} 


$password=sha1($password);
$re_password=sha1($re_password);

$sql="INSERT INTO `user`( `username`, `password`, `email`, `mobile`) 
VALUES ('$username','$password','$email','$mobile')"; 
$result=mysqli_query($link,$sql);
if($result){
    echo "<script>
    alert('Congratulations,You have registered successfully');
    location.href='login.php';
    </script>";
}













?>

