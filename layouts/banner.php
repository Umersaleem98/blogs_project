<section class="banner_post">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <?php
// Fetch data from your database
$query = "SELECT * FROM cover_posts ORDER BY post_date DESC LIMIT 3"; // Adjust the query as needed
$result = mysqli_query($conn, $query);

// Loop through the fetched data and populate the HTML structure
while ($row = mysqli_fetch_assoc($result)) {
    $post_title = $row['post_name'];
    $post_category = $row['post_type'];
    $post_date = $row['post_date'];
    $image_path = $row['images']; // Assuming 'images' is the column containing image file paths

    ?>
            <div class="banner_post_1" style="background-image: url('cover_posts/<?php echo $image_path; ?>');">
                <div class="banner_post_iner text-center">
                    <a href="category.php">
                        <h5><?php echo $post_category; ?></h5>
                    </a>
                    <a href="single-blog.php">
                        <h2><?php echo $post_title; ?></h2>
                    </a>
                    <p>Posted on <?php echo $post_date; ?></p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>