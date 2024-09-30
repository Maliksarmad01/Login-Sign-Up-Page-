<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName']; 
    $lastName = $_POST['lastName'];
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password']; // Hash the password
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $bio = $_POST['bio'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'register');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (firstName, middleName, lastName, username, email, password, phone, dob, gender, country, state, address, occupation, bio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $firstName, $middleName, $lastName, $username, $email, $password, $phone, $dob, $gender, $country, $state, $address, $occupation, $bio);

    // Execute the statement
    if ($stmt->execute()) {
        echo 'New record created successfully <a href="login.html">Back to Login page</a>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>