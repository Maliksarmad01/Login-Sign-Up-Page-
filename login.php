<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'register');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        // Properly escape and quote the username
        $username = $conn->real_escape_string($username);
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = $conn->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $user_data = $result->fetch_assoc();

                if ($user_data['password'] == $password) {
                    // Correct the location header syntax
                    header("Location: dashboard.html");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'>alert('Wrong username or password');</script>";

    } else {
        echo "<script type='text/javascript'>alert('Wrong username or password');</script>";
    }
}
?>
