<?php
include "db.php";

// Total Students
$students = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS c FROM students")
)['c'];
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Records Dashboard</title>
  <link rel="stylesheet" href="/student_records/styles.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
  <h2>Student Records Dashboard</h2>

  <ul>
    <li>Total Students: <b><?php echo $students; ?></b></li>
  </ul>

  <p>
    Quick links:
    <a href="/student_records/pages/student_list.php">Student List</a> |
    <a href="/student_records/pages/student_add.php">Add Student</a>
  </p>
</div>

</body>
</html>