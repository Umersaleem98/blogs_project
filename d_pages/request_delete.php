<?php
include '../connection/connection.php';

$id = $_GET['id'];

// Construct the DELETE query
$query = "DELETE FROM `posts` WHERE post_id='$id'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the deletion was successful
if ($result) {
    echo "<script>
    alert('Data inserted successfully');
    </script>";
    // If successful, redirect back to the post request page
    header("Location: post_request_page.php");
    exit; // Make sure to stop execution after redirecting
} else {
    // If deletion failed, show an error message
    echo "<script>alert('Data deletion failed');</script>";
}