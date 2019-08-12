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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="content"> 
    <h1>
    Hi,Dear <?php echo $row['username'] ?> welcome to our website!
    </h1>
    <a href="reset_pwd.php?id=<?php echo $row['id'] ?>" style="color:yellow;font-size:20">Reset Password</a>
    </div>
   
</body>
 
</html>

