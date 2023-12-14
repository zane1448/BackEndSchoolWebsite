<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $PhoneNum = mysqli_real_escape_string($conn, $_POST['PhoneNum']);
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $query = "INSERT INTO parent (Name, PhoneNum, Username, Password)
              VALUES ('$Name', '$PhoneNum', '$Username', '$Password')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Parent registration successful! Redirecting...";
        echo '<script>
                setTimeout(function() {
                    window.location.href = "studentparenthomepage.html";
                }, 2000); // 2000 milliseconds = 2 seconds
              </script>';
    } else {
        echo "Error registering parent: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
