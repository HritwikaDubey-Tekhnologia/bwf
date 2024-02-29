<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');
require_once '../includes/db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['email']) || !isset($data['password'])) {
    echo json_encode(['msg' => 'Email and password are required!', 'status' => false]);
    exit;
}

$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

$sql = "SELECT * FROM tblUser WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $user = mysqli_fetch_assoc($result);

    if ($user && $password === $user['password']) {
        echo json_encode(['msg' => 'Login successful!', 'status' => true, 'data' => $user]);
    } else {
        echo json_encode(['msg' => 'Invalid Email or Password!', 'status' => false]);
    }
} else {
    echo json_encode(['msg' => 'Query failed!', 'status' => false]);
}

mysqli_close($conn);
?>