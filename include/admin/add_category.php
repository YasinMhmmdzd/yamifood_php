<h1>Add Category</h1>
<form method="post">
    <input type="text" name="category_name" placeholder="add category name">
    <button class="submit-btn" name="submit-btn">Submit</button>
</form>
<?php
include "../include/config.inc.php";
if(isset($_POST["submit-btn"])){
    $category_name = $_POST['category_name'];
    $stmt = $connection -> prepare("INSERT INTO blog_categories (name) VALUES (:name)");
    $stmt -> execute([
            "name" => $category_name,
    ]);
    echo "successfull";
}
?>