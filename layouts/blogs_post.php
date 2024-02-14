<section class="all_post section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
// Pagination variables
$results_per_page = 6;
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$offset = ($page - 1) * $results_per_page;

// Search functionality
$search_query = '';
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM posts WHERE post_name LIKE '%$search_query%' AND status = 'approved' LIMIT $offset, $results_per_page";
} else {
    $sql = "SELECT * FROM posts WHERE status = 'approved' LIMIT $offset, $results_per_page";
}

// Execute query
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Access individual columns of each row using $row['column_name']
        $post_img = $row['images'];
        $post_category = $row['post_type'];
        $post_title = $row['post_name'];
        $post_date = $row['date'];
        ?>
                    <div class="col-lg-6">
                        <div class="single_post post_1 feature_post">
                            <div class="single_post_img">
                                <img src="<?php echo $post_img; ?>" width="400px" height="300px" alt="Post Image">
                            </div>
                            <div class="single_post_text text-center">
                                <a href="category.php">
                                    <h5><?php echo $post_category; ?></h5>
                                </a>
                                <a href="single-blog.php">
                                    <h2><?php echo $post_title; ?></h2>
                                </a>
                                <p>Posted on <?php echo $post_date; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
}
} else {
    // No data found message
    echo "No posts found";
}
?>
                </div>
                <!-- Pagination -->
                <div class="page_pageniation">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
// Count total number of pages
$sql = "SELECT COUNT(*) AS total FROM posts WHERE status = 'approved'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row['total'] / $results_per_page);

// Display pagination links
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li class='page-item'><a class='page-link' href='?page=$i&search=$search_query'>$i</a></li>";
}
?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar_widget">
                    <div class="single_sidebar_wiget search_form_widget">
                        <form action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Search Keyword"
                                    value="<?php echo $search_query; ?>" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Search Keyword'" />
                                <button type="submit" class="btn_1">search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Other sidebar content -->
                </div>
            </div>
        </div>
    </div>
</section>