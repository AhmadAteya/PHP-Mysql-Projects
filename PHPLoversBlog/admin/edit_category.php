<?php include 'includes/header.php'; ?>
<?php
    $id = urldecode($_GET['id']);

    // Create DB Object
    $db = new Database();

    // Create Query
    $query = "SELECT * FROM categories WHERE id = " . $id;
    // Run Query
    $category = $db->select($query)->fetch_assoc();

    // Create categories query
    $query = "SELECT * FROM categories";
    // Run Query
    $categories = $db->select($query);
?>
<?php
    if (isset($_POST['update'])){
        // Create DB Object
        $db = new Database();
        //Assign Vars
        $name = mysqli_real_escape_string($db->connection,$_POST['name']);
        //Simple validation
        if ($category =='' ){
            //Set Error
            $error = "please fill out all required fields";
        }else{
            $query = "UPDATE categories
                        SET name = '$name'
                         WHERE id= $id";
            $update_row = $db->update($query);
        }
    }
?>
<?php
    //DELETE
    if(isset($_POST['delete'])){
        $query = "DELETE FROM categories
                      WHERE id=$id";
        $delete_row = $db->delete($query);
    }
?>
    <form method="post" action="edit_category.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label>Category Name</label>
            <input name="name" type="text" class="form-control" value="<?php echo $category['name'] ?>">
        </div>

        <div>
            <input name="update" type="submit" class="btn btn-primary" value="Update">
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input name="delete" type="submit" class="btn btn-danger" value="Delete">
        </div><br>
    </form>
<?php include './includes/footer.php'; ?>