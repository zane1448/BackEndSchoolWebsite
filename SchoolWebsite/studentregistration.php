<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Remove $StaffID from the list of values
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Year = mysqli_real_escape_string($conn, $_POST['Year']);
    $Age = mysqli_real_escape_string($conn, $_POST['Age']);
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $query = "INSERT INTO student (Name, Year, Age, Username, Password)
              VALUES ('$Name', '$Year', '$Age', '$Username', '$Password')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Display a message
        echo "Student registration successful! Redirecting...";
        // Redirect using JavaScript after 2 seconds
        echo '<script>
                setTimeout(function() {
                    window.location.href = "studentlogin.html";
                }, 2000);
              </script>';
        exit();
    } else {
        echo "Error registering student: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
