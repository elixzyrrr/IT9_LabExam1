<?php
include "../db.php";

// Run the query and check for errors
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id_number DESC");

if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // This will display the MySQL error if there's a problem
}
?>