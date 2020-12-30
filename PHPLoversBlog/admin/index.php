<?php include 'includes/header.php'; ?>
<?php
    //Create DB Object
    $db = new Database();

    //Create the query
    $query = "SELECT posts.*, categories.name FROM posts 
          INNER JOIN categories ON posts.category = categories.id 
          ORDER BY posts.id DESC";

    //Run the query
    $posts = $db->select($query);

    //Create the query
    $query = "SELECT * FROM `categories`";
    //Run the query
    $categories = $db->select($query);
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Post #ID</th>
                <th>Post Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post):?>
                <tr>
                    <td><?php echo $post['id']; ?></td>
                    <td><a href="edit_post.php?id=<?php echo urlencode($post['id']); ?>"><?php echo $post['title']; ?></a></td>
                    <td><?php echo $post['name']; ?></td>
                    <td><?php echo $post['author']; ?></td>
                    <td><?php echo formatDate($post['date']); ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Category #ID</th>
            <th>Category Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category):?>
            <tr>
                <td><?php echo $category['id']; ?>
                <td><a href="edit_category.php?id=<?php echo urlencode($category['id']); ?>"><?php echo $category['name']; ?></a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php include 'includes/footer.php'; ?>