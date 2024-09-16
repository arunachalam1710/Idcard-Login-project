<?php
session_start();
if (session_destroy())// destroying All sessions
{
    header("location:login.php");//Redirectiong To Home Page
}
?>