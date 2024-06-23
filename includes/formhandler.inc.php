<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["fname"]
    $lastName = $_POST["lname"]
    $username = $_POST["username"]
    $email = $_POST["email"]
    $password = $_POST["password"]

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO User_Details.user_credentials (first_name, last_name, username, email, user_password) VALUES (?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$firstName, $lastName, $username, $email, $password]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.html");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.html")
}