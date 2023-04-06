<?php 
$CN = mysqli_connect("localhost", "root", "", "user-login");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_data = json_decode(file_get_contents('php://input'), true);

    if (isset($post_data['user_name']) && isset($post_data['user_pass'])) {
        $user_name = $post_data['user_name'];
        $user_pass = $post_data['user_pass'];

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
    } else {
        $Message = "Please provide user_name and user_pass values.";
        $response[] = array("Message" => $Message);

        echo json_encode($response);
    }
} else {
    $Message = "Invalid request method.";
    $response[] = array("Message" => $Message);

    echo json_encode($response);
}
?>
