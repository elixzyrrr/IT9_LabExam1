<?php
include "../db.php";

$message = "";

// Check if id_number is provided in URL
if (!isset($_GET['id_number'])) {
    die("No student selected.");
}

$id = $_GET['id_number'];

// Get student data
$get = mysqli_query($conn, "SELECT * FROM students WHERE id_number='$id'");
$student = mysqli_fetch_assoc($get);

if (!$student) {
    die("Student not found.");
}

// Update process
if (isset($_POST['update'])) {

    $original_id = $_POST['original_id'];
    $id_number = $_POST['id_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if ($id_number == "" || $name == "" || $email == "") {
        $message = "ID Number, Name and Email are required!";
    } else {

        $sql = "UPDATE students
                SET id_number='$id_number',
                    name='$name',
                    email='$email',
                    course='$course'
                WHERE id_number='$original_id'";

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
  <title>Edit Student</title>
  <link rel="stylesheet" href="/student_records/styles.css">
</head>
<body>

<?php include "../nav.php"; ?>

<div class="container">
  <h2>Edit Student</h2>

  <form method="post">
    <p style="color:red;"><?php echo $message; ?></p>

    <input type="hidden" name="original_id" value="<?php echo $student['id_number']; ?>">

    <label>ID Number*</label>
    <input type="text" name="id_number" value="<?php echo $student['id_number']; ?>">

    <label>Full Name*</label>
    <input type="text" name="name" value="<?php echo $student['name']; ?>">

    <label>Email*</label>
    <input type="text" name="email" value="<?php echo $student['email']; ?>">

    <label>Course</label>
    <input type="text" name="course" value="<?php echo $student['course']; ?>">

    <div class="form-actions">
        <button type="button" onclick="window.location='student_list.php'">Cancel</button>
        <button type="submit" name="update">Update</button>
    </div>
  </form>
</div>

</body>
</html>