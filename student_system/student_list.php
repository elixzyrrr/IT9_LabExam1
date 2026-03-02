<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM student ORDER BY id_number DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Records</title>
      <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>

<body>

<div class="container">

  <div class="page-header">
    <h2>Students</h2>
    <a href="Add_student.php" class="btn-primary">+ Add Student</a>
  </div>

  <div class="table-card">
    <table class="modern-table" border="1" cellpadding="8">
      <thead>
        <tr>
          <th>Email</th>
          <th>ID Number</th>
          <th>Course</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['id_number']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td>
              <a href="edit_student.php?id_number=<?php echo $row['id_number']; ?>" class="btn-edit">
                Edit
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  </div>

</div>

</body>
</html>