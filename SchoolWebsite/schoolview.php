<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTable = $_POST['table'];

    if ($selectedTable == "class") {
        $result = $conn->query("SELECT ClassID, ClassType, ClassSize FROM class");

        if ($result) {
            // Loop through the result set and display data
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['ClassID'] . " - Type: " . $row['ClassType'] . " - Size: " . $row['ClassSize'] . "<br>";
            }
        } else {
            // Display an error message for the class table
            echo "Error: " . $conn->error;
        }
    } elseif ($selectedTable == "student") {
        $result = $conn->query("SELECT StudentID, Name, Year, Age FROM student");

        if ($result) {
            // Loop through the result set and display data
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['StudentID'] . " - Name: " . $row['Name'] . " - Year: " . $row['Year'] . " - Age: " . $row['Age'] . "<br>";
            }
        } else {
            // Display an error message for the student table
            echo "Error: " . $conn->error;
        }
    } elseif ($selectedTable == "parent") {
        $result = $conn->query("SELECT ParentID, Name, PhoneNum, Relation FROM parent");

        if ($result) {
            // Loop through the result set and display data
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['ParentID'] . " - Name: " . $row['Name'] . " - Phone Number: " . $row['PhoneNum'] .  "<br>";
            }
        } else {
            // Display an error message for the parent table
            echo "Error: " . $conn->error;
        }
    } elseif ($selectedTable == "staff") {
        $result = $conn->query("SELECT StaffID, Name, Age, Pay FROM staff");

        if ($result) {
            // Loop through the result set and display data
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['StaffID'] . " - Name: " . $row['Name'] . " - Age: " . $row['Age'] . " - Pay: " . $row['Pay'] . "<br>";
            }
        } else {
            // Display an error message for the staff table
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid table selected!";
        exit;
    }
}

$conn->close();
?>