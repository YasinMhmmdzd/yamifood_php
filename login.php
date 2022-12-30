<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <form method="post">
            <h1>Login</h1>
            <input type="text" name="user_name" placeholder="user name">
            <input type="password" name="password" placeholder="password">
            <button class="login-btn" name="login-btn">Login</button>
            <?php
            if(isset($_POST['login-btn'])){
                function null_input(){
                    ?>
                    <p class="err">You should type in inputs</p>
                    <?php
                }
                function unkown_user(){
                    ?>
                    <p class="err">Your Wrong</p>
                    <?php
                }
                include "./include/config.inc.php";
                $user_name = htmlspecialchars($_POST['user_name']);
                $password = htmlspecialchars($_POST['password']);
                if(empty($user_name) || empty($password)){
                    null_input();
                }
                else{
                    $get_users = "SELECT * FROM users";
                    $result = $connection -> query($get_users);
                    foreach($result as $users){
                        if($users['user_name'] == $user_name && $users['password'] == $password){
                            session_start();
                            $_SESSION['user_name'] = $user_name;
                            $_SESSION['password'] = $password;
                            header('location:./admin');
                        }
                        else{
                            unkown_user();
                        }
                    }
                }
            }
            ?>
        </form>
    </div>
</body>
</html>