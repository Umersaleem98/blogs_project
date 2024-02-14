<?php include 'connection/connection.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include 'layouts/css.php';?>
</head>

<body>
    <!--::header part start::-->
    <?php
include 'layouts/header.php';

?>
    <!-- Header part end-->

    <!-- banner post start-->

    <?php
include 'layouts/banner.php';
?>
    <!-- banner post end-->

    <!-- subscribe form start-->
    <?php
include 'layouts/subscribe.php';
?>
    <!-- subscribe form end-->

    <!-- feature_post start-->
    <?php include 'layouts/blogs_post.php'?>
    <!-- feature_post end-->

    <!-- social_connect_part part start-->
    <?php include 'layouts/social_media_post.php';?>
    <!-- social_connect_part part end-->

    <!-- footer part start-->
    <?php include 'layouts/footer.php';?>
    <!-- footer part end-->
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