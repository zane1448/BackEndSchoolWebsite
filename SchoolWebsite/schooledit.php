<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school2.0";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the selected table
  $selectedTable = $_POST['SelectedTable'];

  // Check the selected table and update the data accordingly
  switch ($selectedTable) {
    case 'class':
      updateTableData('class', [ 'ClassType', 'ClassSize']);
      break;
    case 'parent':
      updateTableData('parent', [ 'Name', 'PhoneNum', ]);
      break;
    case 'staff':
      updateTableData('staff', ['Name', 'Age', 'Pay']);
      break;
    case 'student':
      updateTableData('student', ['Name', 'Year', 'Age', 'ParentID']);
      break;
    default:
      echo 'Invalid table selected';
  }
}

// Function to update data for the selected table
function updateTableData($tableName, $editableFields) {
  global $conn;

  // Retrieve the primary key and other form data
  $primaryKey = $_POST['PrimaryKey'];

  // Construct the SQL update operation for the selected table
  $updateFields = [];
  foreach ($editableFields as $field) {
    // Check if the key is set in the $_POST array
    if (isset($_POST[$field])) {
      $updateFields[] = "$field='" . mysqli_real_escape_string($conn, $_POST[$field]) . "'";
    }
  }

  $updateFieldsString = implode(', ', $updateFields);

  $query = "UPDATE $tableName SET $updateFieldsString WHERE $editableFields[0] = " . mysqli_real_escape_string($conn, $primaryKey);
  $result = mysqli_query($conn, $query);

  // Check for success or failure and provide appropriate feedback to the user
  if ($result) {
    echo "$tableName data updated successfully";
  } else {
    echo "Error updating $tableName data: " . mysqli_error($conn);
  }
}
?>
