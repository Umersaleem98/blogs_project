<?php include 'connection/connection.php';?>
<!doctype html>
<html lang="en">

<head>
    <?php include 'layouts/css.php';?>
</head>

<body>
    <!--::header part start::-->
    <?php include 'layouts/header.php'?>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>Contact us</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>contact us</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <!-- <div id="map" style="height: 10px;"></div> -->


            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" enctype="multipart/form-data" action="" method="post"
                        id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="post_name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder='Enter your Post name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <select name="post_type" id="" class="form-control">
                                        <option value="News">News</option>
                                        <option value="Fachion">Fachion</option>
                                        <option value="Beauty_Product">Beauty Product</option>
                                        <option value="Sports">Sports</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">

                                    <textarea class="form-control w-100" name="post_description" id="message" cols="30"
                                        rows="9" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Message'"
                                        placeholder='Enter Post Description'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder='Enter your name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'"
                                        placeholder='Enter email address'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="post_subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                        placeholder='Enter Subject'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="images" id="subject" type="file"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                        placeholder='Enter Subject'>
                                </div>
                            </div>
                        </div>

                        <div class="load_btn">
                            <input type="submit" class="btn_1" name="submit">
                            <!-- <a href="#" class="btn_1">Send Message </a> -->
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
    $image_path = "uploads/" . $image; // Adjust the directory path as needed

    // Move uploaded file to the desired location
    move_uploaded_file($image_temp, $image_path);

    // SQL injection prevention (you can enhance this based on your specific requirements)

    // Insert data into the database
    $sql = "INSERT INTO `posts`(`post_name`, `post_type`, `post_description`, `name`, `email`, `post_subject`, `images`)
            VALUES ('$post_name', '$post_type', '$post_description', '$name', '$email', '$post_subject', '$image_path')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        // Display error message using JavaScript alert
        echo "<script>alert('Data insertion failed');</script>";
    }

}

?>


                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>00 (440) 9865 562</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@colorlib.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- ================ contact section end ================= -->

    <!-- social_connect_part part start-->
    <?php include 'layouts/social_media_post.php';?>
    <!-- social_connect_part part end-->

    <!-- footer part start-->
    <?php include 'layouts/footer.php';?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
