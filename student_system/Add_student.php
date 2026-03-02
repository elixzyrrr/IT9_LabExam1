<?php
include "../db.php";

$message = "";

if (isset($_POST['save'])) {

  $id_number = $_POST['id_number'] ?? '';
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $course = $_POST['course'] ?? '';

  if ($name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "INSERT INTO student (id_number, name, email, course)
            VALUES ('$id_number', '$name', '$email', '$course')";
    mysqli_query($conn, $sql);
    header("Location: student_list.php");
    exit;
  }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Student</title>
    <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>

<body>

<h2 id="page-title">Add Student</h2>

<p id="form-message"><?php echo $message; ?></p>

<form method="post" id="student-form">

  <label class="form-label">Full Name*</label><br>
  <input type="text" name="name" class="form-input"><br><br>

  <label class="form-label">Email*</label><br>
  <input type="text" name="email" class="form-input"><br><br>

  <label class="form-label">Course</label><br>
  <input type="text" name="course" class="form-input"><br><br>

  <label class="form-label">Id Number</label><br>
  <input type="text" name="id_number" class="form-input"><br><br>

  <div class="form-actions">
    <button type="button" id="cancel-btn"
      onclick="window.location.href='student_list.php'">
      Cancel
    </button>

    <button type="submit" name="save" id="submit-btn">
      Save
    </button>
  </div>

</form>

</body>
</html>