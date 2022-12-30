<h1>Add post</h1>
<form method="post"  enctype="multipart/form-data">
    <input type="text" name="post_title" placeholder="post title">
    <input type="text" name="post_description" placeholder="post description">
    <input type="file" name="post_image">
    <?php
    include "../include/config.inc.php";
    $get_cats = "SELECT * FROM blog_categories";
    $result = $connection -> query($get_cats);
    ?>
    Select a category : <select name="category">
        <?php
        foreach($result as $categories):
        ?>
        <option value="<?=$categories['id']?>"><?=$categories['name']?></option>
        <?php
        endforeach;
        ?>
    </select>
    <br>
    <button class="submit-btn" name="submit-btn">Submit</button>
    <?php
    if(isset($_POST['submit-btn'])){
        $post_title = $_POST['post_title'];
        $post_description = $_POST['post_description'];
        $post_category = $_POST['category'];
        $allowed_types = array('jpg' , 'png' , 'gif');
        $post_image = $_FILES['post_image']['name'];
        $ext = pathinfo($post_image, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed_types) || empty($post_title) || empty($post_description) || empty($post_image)) {
            echo 'error';
        }
        else{
            $stmt = $connection -> prepare("INSERT INTO blog_posts (title , category , description , image , date , time , author) VALUES (:post_title , :post_category , :post_description , :post_image , :date , :time , :author)");
            $stmt -> execute([
                    "post_title" => $post_title ,
                    "post_category" => $post_category ,
                    "post_description" => $post_description ,
                    "post_image" => $post_image,
                    "date" => date("Y/m/d"),
                    "time" => date("h:i:sa"),
                    "author" => $user_id
            ]);
            move_uploaded_file($_FILES['post_image']['tmp_name'] , "../images/uploads/" . $post_image);
            echo "Successfull";
        }
    }
    ?>
</form>