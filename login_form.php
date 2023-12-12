<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['usermail'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `user` WHERE email = :email";
    $stmt = $pdo->prepare($select);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $row['password'])){
            $_SESSION['usermail'] = $email;

            setcookie('last_login', time(), time() + 2 * 24 * 60 * 60);

            $_SESSION['password'] = $password;
            header('location:header.php');
        } else {
            $error[] = 'Incorrect password';
        }
    } else {
        $error[] = 'Incorrect email';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3 class="title">Login Now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $err){
                        echo '<span class="error-msg">'.$err.'</span>';
                    }
                }
            ?>
            <input type="email" name="usermail" placeholder="Enter your email" class="box" required>
            <input type="password" name="password" placeholder="Enter your password" class="box" required>
            
            <input type="submit" value="Login Now" class="form-btn" name="submit">
            <p>Don't have an account? <a href="register_form.php">Register Now!</a></p>
        </form>
    </div>
</body>
</html>
