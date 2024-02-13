<?php include '../connection/connection.php';?>

<html lang="en">

<head>
    <?php include 'css.php';?>
    <style>
    /* CSS to make all table columns have the same width */
    .card {
        overflow-y: auto;
        /* Display vertical scrollbar only when necessary */
        scrollbar-width: thin;
        /* Make the horizontal scrollbar thinner */
    }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
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
                                        <h2 class="font-weight-bolder mb-0 text-center">
                                            Post Requests</h2>
                                        <!-- content section  -->

                                        <div class="card my-4">
                                            <div class="card-body col-md-12">
                                                <table class="table table-sm  my-3">

                                                    <tr>
                                                        <th>P-Name</th>
                                                        <th>P-Type</th>
                                                        <th>P-Description</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>P-Subject</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>

                                                    <?php
$fetchquery = "SELECT * FROM posts";
$result = mysqli_query($conn, $fetchquery);
while ($data = mysqli_fetch_array($result)) {
    ?>
                                                    <tr>
                                                        <td><?php echo $data['post_name']; ?></td>
                                                        <td><?php echo $data['post_type']; ?></td>
                                                        <td><?php echo $data['post_description']; ?></td>
                                                        <td><?php echo $data['name']; ?></td>
                                                        <td><?php echo $data['email']; ?></td>
                                                        <td><?php echo $data['post_subject']; ?></td>
                                                        <td><img src="../<?php echo $data['images']; ?>" width="50px"
                                                                height="50px" alt=""></td>

                                                        <td><?php echo $data['status']; ?></td>
                                                        <td><?php echo $data['date']; ?></td>
                                                        <td>

                                                            <a href="request_delete.php?id=<?php echo $data["post_id"]; ?>"
                                                                value="approve"><i class="fas fa-trash-alt"></i>
                                                                <!-- Font Awesome trash icon -->
                                                            </a>
                                                            &nbsp; &nbsp;

                                                            <a href="approve.php?id=<?php echo $data["post_id"]; ?>"><i
                                                                    class="fas fa-check-circle"></i></a>
                                                            <!-- Font Awesome approve icon -->
                                                            </a>
                                                            &nbsp; &nbsp;
                                                            <a href="reject.php?id=<?php echo $data["post_id"]; ?>"><i
                                                                    class="fas fa-times-circle"></i></a>

                                                        </td>
                                                    </tr>
                                                    <?php
}
?>

                                                </table>
                                            </div>
                                        </div>
                                        <!-- content section end  -->
                                    </div>
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