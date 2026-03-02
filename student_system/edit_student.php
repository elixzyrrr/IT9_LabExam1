<?php
include "../db.php";


$id = $_GET['id_number'] ?? '';

if (!$id) {
    die("No student ID provided.");
}


$get = mysqli_query($conn, "SELECT * FROM student WHERE id_number = $id");
$student = mysqli_fetch_assoc($get);

if (!$student) {
    die("Student not found.");
}

$message = "";


if (isset($_POST['update'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';
    $id_number = $_POST['id_number'] ?? '';

    if ($name == "" || $email == "") {
        $message = "Name and Email are required!";
    } else {
        $sql = "UPDATE student
                SET name='$name', email='$email', course='$course', id_number='$id_number'
                WHERE id_number=$id";
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
    <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>
<body>

<h2 id="title">Edit Student</h2>

<form id="form" method="post">
    <p id="form-message"><?php echo $message; ?></p>

    <label>Full Name*</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>">

    <label>Email*</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($student['email']); ?>">

    <label>Course</label>
    <input type="text" name="course" value="<?php echo htmlspecialchars($student['course']); ?>">

    <label>Id Number</label>
    <input type="text" name="id_number" value="<?php echo htmlspecialchars($student['id_number']); ?>">

    <div class="form-actions">
        <button type="button" id="cancel-btn" onclick="window.location='student_list.php'">Cancel</button>
        <button type="submit" name="update" id="update-btn">Update</button>
    </div>
</form>

</body>
</html>