
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
require('db.php');
//if form submitted,insert values into the database.
if (isset($_REQUEST['username'])){
    $username=stripslashes($_REQUEST['username']);//removes backslashes
    $username=mysqli_real_escape_string($con,$username);//escapes special characters in a string 

    $email=stripslashes($_REQUEST['email']);
    $email=mysqli_real_escape_string($con,$email);
    $password=stripslashes($_REQUEST['password']);
    $password=mysqli_real_escape_string($con,$password);
    $trn_date=date("y-m-d H:i:s");
    $query="INSERT into detail(username,password,email,trn_date)VALUES ('$username','".md5($password)."','$email','$trn_date')";
    $result=mysqli_query($con,$query);
    if($result){
        echo "<div class='form'><h3>you are registerd sucessfully</h3><br/>click here to <a href='login.php'>Login</a></div>";
        }
}
else{
     ?>
    <div class="form">
     <h1>Registration</h1>
     <form name="registration" action="" method="post">
        <input type="text" name="username" placeholder="username" required/>
        <input type="eamil" name="email" placeholder="eamil" required/>
        <input type="password" name="password" placeholder="password" required/>
        <input type="submit" name="submit" value="register">
    </form>
</div>
<?php
}
?>
</body>
</html>



    


