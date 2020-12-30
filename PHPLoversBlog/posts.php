<?php include'includes/header.php';?>
<?php
    //Create DB Object
    $db = new Database();
    //check URL for category
    if (isset($_GET['category'])){
        $category_id = $_GET['category'];

        //Create the query
        $query = "SELECT * FROM `posts` WHERE category=$category_id";

        //Run the query
        $posts = $db->select($query);
    }else{
        //Create the query
        $query = "SELECT * FROM `posts`";

        //Run the query
        $posts = $db->select($query);
    }
?>
    <?php if($posts):?>
        <?php while ($row = $posts->fetch_assoc()): ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
                <p class="blog-post-meta"><?php echo formatDate($row['date']) . " ";?>
                    <a href="#"><?php echo $row['author'];?></a></p>
                <p><?php echo shortenText($row['body']);?></p>
                <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read More</a>
            </div><!-- /.blog-post -->
        <?php endwhile; ?>
    <?php else: ?>
        <p>There is no posts yet.</p>
    <?php endif ?>
<?php include'includes/footer.php';?>