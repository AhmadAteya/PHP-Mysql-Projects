<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to TalkingSpace</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URI?>templates/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo BASE_URI?>templates/css/custom.css" rel="stylesheet">
    <script src="<?php echo BASE_URI?>templates/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URI?>templates/js/ckeditor/ckeditor.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">TalkingSpace</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="register.php">Create an account</a></li>
                    <li><a href="create.php">Create a topic</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="main-col">
                    <div class="block">
                        <h1 class="pull-left">Welcome To TalkingSpace!</h1>
                        <h4 class="pull-right">A simple PHP forum engine!</h4>
                        <div class="clearfix"></div>
                        <hr>