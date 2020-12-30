<?php include './includes/header.php'; ?>
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

    //Create the query
    $query = "SELECT * FROM `categories`";
    //Run the query
    $categories = $db->select($query);
?>
<?php
if (isset($_POST['submit'])){
    //Assign Vars
    $title = mysqli_real_escape_string($db->connection,$_POST['title']);
    $body = mysqli_real_escape_string($db->connection,$_POST['body']);
    $category = mysqli_real_escape_string($db->connection,$_POST['category']);
    $author = mysqli_real_escape_string($db->connection,$_POST['author']);
    $tags = mysqli_real_escape_string($db->connection,$_POST['tags']);

    //Simple validation
    if ($title =='' || $category =='' || $body =='' ){
        //Set Error
        $error = "please fill out all required fields";
    }else{
        $query = "UPDATE posts
                    SET 
                      title ='$title',
                      body ='$body',
                      category ='$category',
                      author ='$author',
                      tags ='$tags'
                    WHERE id= $post_id";
        $update_row = $db->update($query);
    }

}
?>
<?php
    //DELETE
    if(isset($_POST['delete'])){
        $query = "DELETE FROM posts
                  WHERE id=$post_id";
        $delete_row = $db->delete($query);
    }
?>
    <form method="post" action="edit_post.php?id=<?php echo $post_id; ?>">
        <div class="form-group">
            <label>Post Title</label>
            <input name="title" type="text" class="form-control" value="<?php echo $post['title']; ?>">
        </div>
        <script src="includes/ckeditor/ckeditor.js" type="text/javascript"></script>
        <div class="form-group">
            <label>Post Body</label>
            <textarea name="body" class="ckeditor form-control" rows="10">
                <?php echo $post['body']; ?>
            </textarea>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control">
                <?php while ($row = $categories->fetch_assoc()): ?>
                    <?php
                        if ($row['id'] == $post['category']){
                                $selected = "selected";
                        }else{
                            $selected = '';
                        }
                    ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo $selected;?>>
                        <?php echo $row['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Post Author</label>
            <input name="author" type="text" class="form-control" value="<?php echo $post['author']; ?>">
        </div>

        <div class="form-group">
            <label>Tags</label>
            <input name="tags" type="text" class="form-control" value="<?php echo $post['tags']; ?>">
        </div>
        <div>
            <input name="submit" type="submit" class="btn btn-primary" value="Update">
            <input name="delete" type="submit" class="btn btn-danger" value="Delete">
            <a href="index.php" class="btn btn-default">Cancel</a>
        </div><br>
    </form>

<?php include 'includes/footer.php'; ?>