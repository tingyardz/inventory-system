<?php
require_once("encrypt_decrypt_methods.php");

if(isset($_POST['login'])){

    $username = encryptthis($_POST['username'], $key);
    $password = encryptthis($_POST['password'], $key);

    if(decryptthis($username, $key) == decryptthis("RW9KejdkSGUwOXVOZVFSNnNwSHRTdz09OjrJpAUqeAOF4ajrLkUEytsn", $key)){

        if(decryptthis($password, $key) == decryptthis("SnYvcWFpNDBmRVcxdVRQRjVjc29LZz09OjqOkJtAQjFVVXb2DeXe2iUh", $key)){

            session_start();
            $_SESSION['ims-login'] = true;
            header("Location:index.php");
            exit();

        }

    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link rel="stylesheet" href="css/login.style.css">
    <link rel="shortcut icon" href="icon/inventory_icon.ico" type="image/x-icon">
</head>
<body>

<div class="container">

    <div class="wrapper">

        <h1>Inventory System</h1>

        <div class="sub-wrapper">
            <h2>Login</h2>
        
            <form action="" method="POST">
                <div class="username-error"><h4>Your username is incorrect!</h4></div>
                <div class="password-error"><h4>Your password is incorrect!</h4></div>
                <label for="">Username</label>
                <input type="text" name="username" autofocus required>
        
                <label for="">Password</label>
                <input type="password" name="password" required>
        
                <button type="submit" name="login">Login</button>
            </form>
        
        </div>

    </div>
</div>

    <?php

        if(isset($_POST['login'])){
        
            if(decryptthis($username, $key) != decryptthis("RW9KejdkSGUwOXVOZVFSNnNwSHRTdz09OjrJpAUqeAOF4ajrLkUEytsn", $key)){
            
                echo "
                    <script>
                        document.querySelector('.username-error').style = 'display:block;';
                    </script>
                ";
            
            }
            elseif(decryptthis($password, $key) != decryptthis("SnYvcWFpNDBmRVcxdVRQRjVjc29LZz09OjqOkJtAQjFVVXb2DeXe2iUh", $key)){
            
                echo "
                    <script>
                        document.querySelector('.password-error').style = 'display:block;';
                    </script>
                ";
            
            }
        
        }

    ?>


</body>
</html>