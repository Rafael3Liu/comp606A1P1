<?php
require('dbconnect.php');

session_start();

$id = $_SESSION['id'];
//echo $id;

$old_pwd=isset($_POST['old_pwd'])?$_POST['old_pwd']:"";

$new_pwd=isset($_POST['new_pwd'])?$_POST['new_pwd']:"";

$re_new_pwd=isset($_POST['re_new_pwd'])?$_POST['re_new_pwd']:"";


$sql = "SELECT `password` FROM `user` WHERE id = $id";
//echo $sql;

$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
if(empty($old_pwd)){
    echo "<script>
    alert('old password can not be empty');
    location.href='reset_pwd.php';
    </script>";
}
if(empty($new_pwd)){
    echo "<script>
    alert('new password can not be empty');
    location.href='reset_pwd.php';
    </script>";
}
if(empty($re_new_pwd)){
    echo "<script>
    alert('re_enter new password can not be empty');
    location.href='reset_pwd.php';
    </script>";
}
if($old_pwd == $new_pwd){
    echo "<script>
    alert('old password and new password can not be same');
    location.href='reset_pwd.php';
    </script>";
}

if($new_pwd != $re_new_pwd){
    echo "<script>
    alert('two times new password must be same');
    location.href='reset_pwd.php';
    </script>";
}

$old_pwd = sha1($old_pwd);

if($old_pwd != $row['password']){

    echo "<script>
    alert('Your old password is not right');
    location.href='reset_pwd.php ';
    </script>";


}else{

    $new_pwd=sha1($new_pwd);
    $sql = "UPDATE `user` SET `password`= '$new_pwd' WHERE id = $id";

    //echo $sql;
    //exit;
    $result= mysqli_query($link,$sql);
    if($result){
        echo "<script>
        alert('reset password successfully');
        location.href='index.php';
        </script>";
    }else{
        echo "<script>
        ('reset password failed,try it again');
        location.href='reset_pwd.php?id= $id ';
        </script>";
    } 

}











 

?>
