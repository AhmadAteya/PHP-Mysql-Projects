<?php include'includes/header.php';?>
<?php
    $post_id = urldecode($_GET['id']);

    //Create DB Object
    $db = new Database();

    //Create the query
    $query = "SELECT * FROM `posts` WHERE id= $post_id";

    //Run the query
    $post = $db->select($query);

    //Fetching the data from the object
    $post = $post->fetch_assoc();
?>

        <?php if($post):?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
                <p class="blog-post-meta"><?php echo formatDate($post['date']) . " ";?>
                    <a href="#"><?php echo $post['author'];?></a></p>
                <p><?php echo $post['body'];?></p>
            </div><!-- /.blog-post -->
      <?php else: ?>
        <p>There is no posts yet.</p>
    <?php endif ?>

<?php include'includes/footer.php';?>