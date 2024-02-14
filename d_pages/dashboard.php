<?php include '../connection/connection.php';?>

<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>
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
                                        <h1 class="font-weight-bolder mb-0 text-center underline-text">Welcome To
                                            Dashboard
                                        </h1>
                                    </div>


                                    <!-- content section  -->


                                    <!-- content senton end  -->
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
