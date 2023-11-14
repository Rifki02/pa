<?php
session_start();
require '../connect/koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: ../user/user.php');
            exit;
        }
    }
    
    else if($username == "admin" && $password == "admin"){
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        header("Location: admin.php");
        exit;
    }   
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Login</title>
    <link rel="stylesheet" href="../style/login.css" />
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="form-box-login">
                <h2>Login</h2>
                <?php if(isset($error)){
                    echo "<p style='color:red;'>Username Atau Password Anda Salah</p>";
                } ?>
                <form action="" method="POST">
                    <div class="input-box">
                        <label for="username" id="UserLabel"></label>
                        <input type="text" name="username" maxlength="100" placeholder="username"/>
                    </div>
                    <div class="input-box">
                        <label for="password" id="password"></label>
                        <input type="password" name="password" maxlength="50" placeholder="password"/>
                    </div>
                    <div class="btn-submit">
                        <input type="submit" value="Login" name="login">
                    </div>
                    <div class="regis-link">
                        Tidak Punya Akun? <a href="register.php">Register</a><br>
                    </div>
                </form>
            </div>
        </div>
    </header>
</body>
</html>

