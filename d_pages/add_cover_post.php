<?php include '../connection/connection.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'css.php';?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include 'sidebar.php';?>

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <?php include 'navbar.php';?>

        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-lg-12 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex flex-column">
                                        <h1 class="font-weight-bolder mb-0 text-center underline-text">Add Cover Post
                                        </h1>
                                    </div>


                                    <!-- content section  -->
                                    <div class="col-md-9">
                                        <form class="form-contact contact_form" enctype="multipart/form-data" action=""
                                            method="post" id="contactForm" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="">Post Name</label>
                                                <input type="text" name="post_name" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Post Name</label>
                                                <select name="post_type" id="" class="form-control">
                                                    <option value="news">News</option>
                                                    <option value="fashion">Fashion</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Post Description</label>
                                                <input type="text" name="post_description" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" id="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Post Subject</label>
                                                <input type="text" name="post_subject" id="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Post Name</label>
                                                <input type="file" name="images" id="" class="form-control">
                                            </div>

                                            <div class="form-group">

                                                <input type="submit" name="submit" id="" class="btn btn-primary">
                                            </div>


                                        </form>
                                    </div>

                                    <?php

if (isset($_POST['submit'])) {
    // Retrieve form data
    $post_name = $_POST['post_name'];
    $post_type = $_POST['post_type'];
    $post_description = $_POST['post_description'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $post_subject = $_POST['post_subject'];

    // Handle file upload
    $image = $_FILES['images']['name'];
    $image_temp = $_FILES['images']['tmp_name'];
    $image_path = "../cover_posts/" . $image; // Adjust the directory path as needed

    // Move uploaded file to the desired location
    move_uploaded_file($image_temp, $image_path);

    // Set the current date
    $post_date = date('Y-m-d');

    // SQL injection prevention (you can enhance this based on your specific requirements)

    // Insert data into the database
    $sql = "INSERT INTO `cover_posts`(`post_name`, `post_type`, `post_description`, `name`, `email`, `post_subject`, `images`, `post_date`)
            VALUES ('$post_name', '$post_type', '$post_description', '$name', '$email', '$post_subject', '$image_path', '$post_date')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        // Display error message using JavaScript alert
        echo "<script>alert('Data insertion failed');</script>";
    }
}
?>
                                    <!-- content senton end -->
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>


        </div>


    </main>



    <?php include 'script.php';?>
</body>

</html>