<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

    <?php
    require('db.php');
    session_start();
    // if form submitted,insert values into the database.
    
    if (isset($_POST['username'])){
$username=stripslashes($_REQUEST['username']);//removes blackslashes
$username=mysqli_real_escape_string($con,$username);//escape special characters in a string
$password=stripslashes($_REQUEST['password']);
$password=mysqli_real_escape_string($con,$password);
//checking is user existing in the database or not 
$query="SELECT *FROM detail WHERE username='$username' and password='".md5($password)."'";
$result=mysqli_query($con,$query) or die(mysqli_error());
$rows=mysqli_num_rows($result);


//echo $rows,$password,$username;

if($rows==1){
    $_SESSION['username']=$username;
    header("location:index.php");//Redirect user to index.php
}
else{
    echo"<div class='form'><h3>Username/password is incorrect.</h3></br>click here to <a href='login.php'></a></div>";

}
}
else{
    ?>
    <div class="form">
        <h1>Log in </h1>
        <form action=""method="post" name="login">
            <input type="text" name="username" placeholder="username" required/>
            <input type="password" name="password" placeholder="password" required/>
            <input type="submit" type="submit" value="Login"/>
</form>
<p>Not registeredyet? <a href='registration.php'>Register Here</a></p>
</div>
<?php
}
?>
            
    