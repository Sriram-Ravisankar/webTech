<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "company");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle Insert
if (isset($_POST['insert'])) {
  $emp_no = $_POST['emp_no'];
  $emp_name = $_POST['emp_name'];
  $date_of_birth = $_POST['date_of_birth'];
  $salary = $_POST['salary'];
  $designation = $_POST['designation'];

  $sql = "INSERT INTO emp_details (emp_no, emp_name, date_of_birth, salary, designation)
          VALUES ('$emp_no', '$emp_name', '$date_of_birth', '$salary', '$designation')";
  $conn->query($sql);
}

// Handle Update
if (isset($_POST['update'])) {
  $emp_no = $_POST['emp_no'];
  $salary = $_POST['salary'];
  $designation = $_POST['designation'];

  $sql = "UPDATE emp_details SET salary='$salary', designation='$designation' WHERE emp_no='$emp_no'";
  $conn->query($sql);
}

// Handle Delete
if (isset($_POST['delete'])) {
  $emp_no = $_POST['emp_no'];
  $sql = "DELETE FROM emp_details WHERE emp_no='$emp_no'";
  $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Employee CRUD</title>
  <style>
    body { font-family: Arial; margin: 20px; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    form { margin-bottom: 20px; }
    input, button { margin: 5px; padding: 5px; }
  </style>
</head>
<body>

<h2>Insert New Employee</h2>
<form method="POST">
  <input name="emp_no" placeholder="Emp No" required>
  <input name="emp_name" placeholder="Name" required>
  <input name="date_of_birth" type="date" required>
  <input name="salary" placeholder="Salary" required>
  <input name="designation" placeholder="Designation" required>
  <button type="submit" name="insert">Insert</button>
</form>

<h2>Update Employee</h2>
<form method="POST">
  <input name="emp_no" placeholder="Emp No" required>
  <input name="salary" placeholder="New Salary" required>
  <input name="designation" placeholder="New Designation" required>
  <button type="submit" name="update">Update</button>
</form>

<h2>Delete Employee</h2>
<form method="POST">
  <input name="emp_no" placeholder="Emp No" required>
  <button type="submit" name="delete">Delete</button>
</form>

<h2>All Employees</h2>
<table>
  <tr>
    <th>Emp No</th>
    <th>Name</th>
    <th>Date of Join</th>
    <th>Salary</th>
    <th>Designation</th>
  </tr>
  <?php
  $result = $conn->query("SELECT * FROM emp_details");
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
  $conn->close();
  ?>
</table>

</body>
</html>
