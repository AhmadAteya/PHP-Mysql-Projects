            </div>
        </div>
    </div>
<div class="col-md-4">
    <div id="sidebar">
        <div class="block">
            <h3>Login Form</h3>
            <form>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary" name="do_login">login</button>
                <a href="register.php" class="btn btn-default">Register</a>
            </form>
        </div>
        <div class="block">
            <h3>Categories</h3>
            <div class="list-group">
                <a href="#" class="list-group-item <?php echo is_active(null); ?>">All topics<span class="badge">14</span></a>
                <?php foreach (getCategories() as $category):?>
                    <a href="topics.php?category=<?php echo $category->id?>"
                       class="list-group-item <?php echo is_active($category->category_name); ?>">
                        <?php echo $category->category_name?>
                        <span class="badge">14</span></a>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
</div>
</div><!-- /.container -->

</body>
</html>
