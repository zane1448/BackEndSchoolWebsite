<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Remove $StaffID from the list of values
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Age = mysqli_real_escape_string($conn, $_POST['Age']);
    $Pay = mysqli_real_escape_string($conn, $_POST['Pay']);
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $query = "INSERT INTO staff (Name, Age, Pay, Username, Password)
              VALUES ('$Name', '$Age', '$Pay', '$Username', '$Password')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Display a message
        echo "Staff registration successful! Redirecting...";
        // Redirect using JavaScript after 2 seconds
        echo '<script>
                setTimeout(function() {
                    window.location.href = "stafflogin.html";
                }, 2000);
              </script>';
        exit();
    } else {
        echo "Error registering staff: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
