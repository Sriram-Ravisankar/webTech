<?php
include 'connect.php';

$sql = "SELECT * FROM emp_details";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
  <th>Emp No</th>
  <th>Name</th>
  <th>Date of Join</th>
  <th>Salary</th>
  <th>Designation</th>
</tr>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>{$row['emp_no']}</td>
      <td>{$row['emp_name']}</td>
      <td>{$row['date_of_birth']}</td>
      <td>{$row['salary']}</td>
      <td>{$row['designation']}</td>
    </tr>";
  }
} else {
  echo "<tr><td colspan='5'>No employees found</td></tr>";
}

echo "</table>";
$conn->close();
?>
