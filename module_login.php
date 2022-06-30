<?php 
include "config.php"; 
$username = $_POST['username']; 
$pass     = $_POST['password']; 
$login = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username' AND password='$pass'"); 
$row=mysqli_fetch_array($login,MYSQLI_ASSOC); 
if ($row['username'] == $username AND $row['password'] == $pass) 
{ 
  session_start(); 
  $_SESSION['username'] = $row['username']; 
  $_SESSION['password'] = $row['password']; 
  header('location:index.php'); 
} 
else 
{ 
    echo "<script>alert('Username atau Password Salah!');window.location.href='login.php';</script>";
} 
?> 