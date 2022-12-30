<h1>Add image gallary</h1>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image_gallary">
    <button name="add_image_btn">Add Image</button>
    <?php
    if(isset($_POST['add_image_btn'])){

        include "../include/config.inc.php";
        $image = $_FILES['image_gallary']['name'];
        $image_tmp = $_FILES['image_gallary']['tmp_name'];
        $stmt = $connection -> prepare("INSERT INTO gallary (image) VALUES (:image)");
        $stmt -> execute([
                "image" => $image,
        ]);
        move_uploaded_file($image_tmp , "../images/uploads/" . $image);
    }
    ?>

</form>