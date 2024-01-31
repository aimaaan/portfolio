<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "contact";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect and sanitize input data
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert data into the database
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // Not a POST request, show error message
    echo "There was a problem with your submission, please try again.";
}
?>
