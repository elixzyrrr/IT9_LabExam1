<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<nav>
    <a href="student_list.php">Student List</a> |
    <a href="Add_student.php">Add Student</a> |
    <a href="logout.php">Logout</a>
</nav>
<hr>