<?php
include '../connection/connection.php';

// Check if the ID parameter is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $post_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Update the status of the post to "rejected" in the database
    $update_query = "UPDATE posts SET status = 'rejected' WHERE post_id = '$post_id'";
    $result = mysqli_query($conn, $update_query);

    // Check if the update query was successful
    if ($result) {
        // Redirect back to the post request page after updating
        header("Location: post_request_page.php");
        exit;
    } else {
        // If update query failed, display an error message
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    // If ID parameter is not set or empty, display an error message
    echo "Invalid post ID.";
}

// Close the database connection
mysqli_close($conn);