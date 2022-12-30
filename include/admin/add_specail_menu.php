<h1>Add special menu</h1>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="name">
    <input type="number" name="price" placeholder="price">
    <input type="file" name="image">
    <select name="type">
        <option value="dinner">Dinners</option>
        <option value="drink">Drinks</option>
        <option value="lunch">Lunchs</option>
    </select>
    <input type="text" name="description" placeholder="description">
    <button name="add_image_btn">Add image</button>
    <?php
    if(isset($_POST['add_image_btn'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $type = $_POST['type'];
        $stmt = $connection -> prepare("INSERT INTO special_menu (name , description , price , type , image) VALUES (:name , :description , :price , :type , :image)");
        $stmt -> execute([
                "name" => $name ,
                "description" => $description ,
                "price" => $price ,
                "type" => $type ,
                "image" => $image
        ]);
        move_uploaded_file($image_tmp , "../images/uploads/" . $image);
    }
    ?>
</form>