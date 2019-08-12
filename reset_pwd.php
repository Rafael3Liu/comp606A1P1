<?php   

require('dbconnect.php');



session_start();
$id = $_SESSION['id'];

$sql="select * from user where id = '$id'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);



//var_dump($row);
//exit;


?>




<html>
<head>
<link rel = "stylesheet" href = "css/repwd.css">
</head>
<body>
    <div class="rpwd">
    <h2  class="rtitle"> Hi,<?php echo $row['username']?></h2><br>
      
    <form action="reset_pwd_act.php" method="post" class="rcontent">
    <input type="password" name="old_pwd" placeholder="enter your old password" class="input1"><br>
    <input type="password" name="new_pwd" placeholder="enter your new password" class="input2"><br>
    <input type="password" name="re_new_pwd" placeholder="re_enter your new password" class="input3"><br>
    <input type="submit" value="Reset">
    </form>
    </div>
    
    

</body>
</html>