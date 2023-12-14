<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected table and primary key from the form
    $selectedTable = $_POST['selectedTable'];
    $primaryKey = mysqli_real_escape_string($conn, $_POST['primaryKey']);

    // Check if the primary key is not empty
    if (!empty($primaryKey)) {
        // Construct the SQL delete operation for the selected table
        $query = "DELETE FROM $selectedTable WHERE $selectedTable" . "ID = '$primaryKey'";
        $result = mysqli_query($conn, $query);

        // Check for success or failure and provide appropriate feedback to the user
        if ($result) {
            echo "Record deleted successfully from $selectedTable";
        } else {
            echo "Error deleting record from $selectedTable: " . mysqli_error($conn);
        }
    } else {
        echo "Primary key cannot be empty.";
    }
}

// Close the database connection
mysqli_close($conn);
?>