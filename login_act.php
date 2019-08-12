<?php
require('dbconnect.php');
session_start();


//receive values from login form
$username=isset($_POST['username'])?$_POST['username']:"";

$password=isset($_POST['password'])?$_POST['password']:"";
//encode password
$password=sha1($password);
//judge username and password,can not be empty
if(empty($username)){
    echo "<script>
    alert('username can not be empty');
    location.href='login.php';
    </script>";
}
if(empty($password)){
    echo "<script>
    alert('password can not be empty');
    location.href='login.php';
    </script>";
}


//look for user's information in database
$sql = "select * from user where username = '$username' and password = '$password'";

$result = mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
//var_dump($row);

//judge if user's information is right
if($row){

    $_SESSION['id'] = $row['id'];

    echo "<script>
    alert('login successfully');
    location.href='index.php';
    </script>";
}else{
    echo "<script>
    alert('incorrect username or password');
    location.href='login.php';
    </script>";
}









?>