<?php

$CN=mysqli_connect("localhost","root","");
$DB= mysqli_select_db($CN,"user-login");

$user_name=$_POST['user_name'];
$user_pass=$_POST['user_pass'];

$IQ="insert into user_list(user_name, user_pass) values('$user_name','$user_pass')";

$R = mysqli_query($CN,$IQ);

if($R){
    $Message="User registered";
}
else{
    $Message="Server Error!";
}

echo($Message);
?>