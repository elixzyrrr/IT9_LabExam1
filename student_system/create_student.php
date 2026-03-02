<?php
include "../db.php";

$message = "";

if (isset($_POST['save'])) {

  $IdNumber = $_POST['IdNumber'] ?? '';
  $full_name = $_POST['Name'] ?? '';
  $email = $_POST['Email'] ?? '';
  $Course = $_POST['Course'] ?? '';

  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {

    $sql = "INSERT INTO student (IdNumber, Name, Email, Course)
            VALUES ('$IdNumber', '$full_name', '$email', '$Course')";
    mysqli_query($conn, $sql);
    header("Location: list_students.php");
    exit;
  }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Student</title>
</head>

<body>

<h2 id="page-title">Add Student</h2>

<p id="form-message"><?php echo $message; ?></p>

<form method="post" id="student-form">

  <label class="form-label">Full Name*</label><br>
  <input type="text" name="Name" class="form-input"><br><br>

  <label class="form-label">Email*</label><br>
  <input type="text" name="Email" class="form-input"><br><br>

  <label class="form-label">Course</label><br>
  <input type="text" name="Course" class="form-input"><br><br>

  <label class="form-label">Id Number</label><br>
  <input type="text" name="IdNumber" class="form-input"><br><br>

  <div class="form-actions">
    <button type="button" id="cancel-btn"
      onclick="window.location.href='list_students.php'">
      Cancel
    </button>

    <button type="submit" name="save" id="submit-btn">
      Save
    </button>
  </div>

</form>

</body>
</html>