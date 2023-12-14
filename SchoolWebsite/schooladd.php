<?php
$servername = "localhost";
$username = "root"; // Assuming the default root user
$password = ""; // Assuming no password
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTable = $_POST['table'];

    if ($selectedTable == "class") {
        $ClassID = $_POST['ClassID'];
        $ClassType = $_POST['ClassType'];
        $ClassSize = $_POST['ClassSize'];

        $sql = "INSERT INTO class (ClassID, ClassType, ClassSize) VALUES ('$ClassID', '$ClassType', '$ClassSize')";
    } elseif ($selectedTable == "student") {
        $StudentID = $_POST['StudentID'];
        $Name = $_POST['Name'];
        $Year = $_POST['Year'];
        $Age = $_POST['Age'];

        $sql = "INSERT INTO student (StudentID, Name, Year, Age) VALUES ('$StudentID','$Name', '$Year', '$Age')";
    } elseif ($selectedTable == "parent") {
        $ParentID = $_POST['ParentID'];
        $Name     = $_POST['Name'];
        $PhoneNum = $_POST['PhoneNum'];
        

        // Insert into the parent table
        $sql = "INSERT INTO parent (ParentID, Name, PhoneNum) VALUES ('$ParentID', '$Name', '$PhoneNum',)";
    } elseif ($selectedTable == "staff") {
        $StaffID = $_POST['StaffID'];
        $Name = $_POST['Name'];
        $Age = $_POST['Age'];
        $Pay = $_POST['Pay'];

        // Insert into the staff table
        $sql = "INSERT INTO staff (StaffID, Name, Age, Pay) VALUES ('$StaffID', '$Name', '$Age', '$Pay')";
    } else {
        echo "Invalid table selected!";
        exit;
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        // Display specific error for the current query
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>