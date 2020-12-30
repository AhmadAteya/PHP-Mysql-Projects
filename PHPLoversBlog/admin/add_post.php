<?php include './includes/header.php'; ?>
<?php
    // Create DB Object
    $db = new Database();
    // Create categories query
    $query = "SELECT * FROM categories";
    // Run Query
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
            $query = "INSERT INTO posts(title, body,category,author, tags)
                      VALUES ('$title','$body','$category','$author','$tags')";
            $insert_row = $db->insert($query);
        }

    }
?>


    <form method="post" action="">
        <div class="form-group">
            <label>Post Title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter Title">
        </div>
        <script src="includes/ckeditor/ckeditor.js" type="text/javascript"></script>
        <div class="form-group">
            <label>Post Body</label>
            <textarea name="body" class="ckeditor form-control" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control">
                <?php while($row = $categories->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Post Author</label>
            <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
        </div>

        <div class="form-group">
            <label>Tags</label>
            <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
        </div>
        <div>
            <input name="submit" type="submit" class="btn btn-primary" value="Add">
            <a href="index.php" class="btn btn-default">Cancel</a>
        </div><br>
    </form>

<?php include 'includes/footer.php'; ?>