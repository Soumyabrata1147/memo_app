<?php
session_start();
$servername='localhost';
$user='root';
$password='';
$dbname='memo';
$con=mysqli_connect($servername,$user,$password,$dbname);
if(!$con){
    die("cannot connect".mysqli_connect_error());
}else{
//echo "success";
}
if(isset($_POST['save'])){
$name=$_SESSION['name'];
$heading=$_POST['heading'];
$message=$_POST['message'];
$sql="INSERT INTO memolist (name,heading,message) VALUES ('$name','$heading','$message')";
$query=mysqli_query($con,$sql);
$_SESSION['name']=$name;
header('location:getmemo.php');
}
?>