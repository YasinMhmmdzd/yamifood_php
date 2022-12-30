<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['user_name']) || !isset($_SESSION['password'])){
        header('location:../login.php');
    }
    ?>
    <?php
    include  "../include/config.inc.php";
    $user_name = $_SESSION['user_name'];
    $password = $_SESSION['password'];
    $stmt = $connection -> query("SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'");
    foreach ($stmt as $user) {
        $user_id = $user['user_id'];
        $user_current_name = $user['current_name'];
        $user_app_name = $user['user_name'];
    }
    ?>
    <div class="app">
    <div class="left-panel">
        <div class="list">
            <ul>
                <li><h2><?=$user_current_name?></h2></li>
                <li><a href="../index.php" class="list-link">visit website</a></li>
                <li><a href="?add_post" class="list-link">Add post in blog</a></li>
                <li><a href="?add_category" class="list-link">Add Category in blog</a></li>
                <li><a href="?add_gallery_image" class="list-link">Add image to gallary</a></li>
                <li><a href="?add_special_menu" class="list-link">Add image to specail menu</a></li>
                <li><a href="?exit" class="list-link">exit</a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <?php
        if(isset($_GET['add_post'])){
            include "../include/admin/add_post.php";
        }
        elseif(isset($_GET['add_category'])){
            include "../include/admin/add_category.php";
        }
        elseif(isset($_GET['add_gallery_image'])){
            include "../include/admin/add_gallery_image.php";
        }
        elseif(isset($_GET['add_special_menu'])){
            include "../include/admin/add_specail_menu.php";
        }
        ?>
    </div>
    </div>
</body>
</html>
<?php
        if(isset($_GET['exit'])){
            session_destroy();
            header('location:../login.php');
        }
?>