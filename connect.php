<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database connection
    try {
        $conn = new mysqli('localhost', 'root', '', 'User_Details');
        $stmt = $conn->prepare("insert into user(first_name, last_name, username, email, user_password) 
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $fname, $lname, $username, $email, $password);
        $stmt->execute();
        echo "Registration successful"
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        die('Connection Failed : '.$conn->connection_aborted);
    }
?>