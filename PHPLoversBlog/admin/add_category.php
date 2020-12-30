<?php include 'includes/header.php'; ?>
<?php
    if (isset($_POST['submit'])){
        // Create DB Object
        $db = new Database();
        //Assign Vars
        $category = mysqli_real_escape_string($db->connection,$_POST['category']);
        //Simple validation
        if ($category =='' ){
            //Set Error
            $error = "please fill out all required fields";
        }else{
            $query = "INSERT INTO categories(name)
                          VALUES ('$category')";
            $insert_row = $db->insert($query);
        }

    }
?>
    <form method="post" action="">
        <div class="form-group">
            <label>Category Name</label>
            <input name="category" type="text" class="form-control" placeholder="Enter Category">
        </div>

        <div>
            <button name="submit" type="submit" class="btn btn-primary">Add</button>
            <a href="index.php" class="btn btn-default">Cancel</a>
        </div><br>
    </form>
<?php include 'includes/footer.php'; ?>