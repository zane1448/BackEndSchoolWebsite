<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);

    $query = "SELECT * FROM student WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Login successful
        header("Location: studentparenthomepage.html"); // Redirect to student dashboard
        exit();
    } else {
        // Login failed
        echo "Invalid credentials. Please try again.";
    }
}

mysqli_close($conn);
?>
