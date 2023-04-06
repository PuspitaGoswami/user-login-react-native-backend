<?php 
$CN = mysqli_connect("localhost", "root", "", "user-login");

$user_name = $_POST['user_name'];
$user_pass = $_POST['user_pass'];

$IQ = "SELECT user_name FROM user_list WHERE user_name = '$user_name' AND user_pass = '$user_pass'";

$R = mysqli_query($CN, $IQ);

if (mysqli_num_rows($R) > 0) {
    $token = uniqid();

    $Message = "Login successful";
    $response[] = array("Message" => $Message, "token" => $token);
} else {
    $Message = "Invalid credentials";
    $response[] = array("Message" => $Message);
}

echo json_encode($response);

?>