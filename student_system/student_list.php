<?php
include "../db.php";

// Change table name to 'student' (singular) as per your clarification
$result = mysqli_query($conn, "SELECT * FROM student ORDER BY id_number DESC");

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Students</title>
  <link rel="stylesheet" href="/assessment_beginner/styles.css">
</head>
<body>

<?php include "../nav.php"; ?>

<div class="container">

  <div class="page-header">
    <h2>Students</h2>
    <a href="students_add.php" class="btn-primary">+ Add Student</a>
  </div>

  <div class="table-card">
    <table class="modern-table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Course</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['id_number']; ?></td> <!-- Use 'id_number' column -->
                <td><?php echo $row['name']; ?></td>     <!-- Use 'name' column -->
                <td><?php echo $row['email']; ?></td>    <!-- Use 'email' column -->
                <td><?php echo $row['course']; ?></td>   <!-- Use 'course' column -->
                <td>
                  <a href="students_edit.php?id=<?php echo $row['id_number']; ?>" class="btn-edit">Edit</a> <!-- Use 'id_number' for editing -->
                </td>
              </tr>
        <?php } 
        } else {
            echo "<tr><td colspan='5'>No students found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</div>

</body>
</html>