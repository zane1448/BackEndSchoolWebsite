<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $parent_id = mysqli_real_escape_string($conn, $_POST['parent_id']);
    $relation = mysqli_real_escape_string($conn, $_POST['relation']);

    $query = "INSERT INTO studentparentrelationship (StudentID, ParentID, Relation)
              VALUES ('$student_id', '$parent_id', '$relation')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Relationship added successfully!";
        // You can redirect to another page if needed
        // header("Location: success_page.php");
        // exit();
    } else {
        echo "Error adding relationship: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
