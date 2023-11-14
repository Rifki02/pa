
<?php
require "../connect/koneksi.php";
session_start();

if (isset($_POST["Register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];  // Corrected the input name
    $password = $_POST["password"];
    $foto = $_FILES["gambar"]["name"];
    $explode = explode('.', $foto);
    $ekstensi = strtolower(end($explode));
    $gambar = date("Y-m-d"). $foto;
    $temp = $_FILES['gambar']['tmp_name'];  

    $cek = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek)) {
        echo "
        <script>
        alert('username telah di gunakan');
        document.location.href = 'Register.php';
        </script>
        ";
    }else{

        if($username == "admin"){
            echo "
            <script>
            alert('username tidak boleh admin');
            document.location.href = 'Register.php';
            </script>
            ";
        }else{
            if (move_uploaded_file($temp,'../img/' . $gambar)) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $result = mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$username', '$email', '$password' , '$gambar') ");
                    if (mysqli_affected_rows($conn) > 0) {
                    echo "
                        <script>
                            alert('Registrasi Berhasil!');
                            document.location.href = 'login.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                        alert('Registrasi Gagal!');
                        document.location.href = 'Register.php';
                        </script>
                        ";
                    }
                }
        }
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/register.css" />
</head>
<body>
    <header>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="wrapper">
                <div class="form-box-register">
                    <h2>Register</h2>
                    <div class="input-box">
                        <label for="username" id="UserLabel"></label>
                        <input type="text" name="username" maxlength="100" placeholder="Username"/>
                    </div>
                    <div class="input-box">
                        <label for="email" id="email"></label>
                        <input type="text" name="email" maxlength="50" placeholder="Email"/>
                    </div>
                    <div class="input-box">
                        <label for="password" id="password"></label>
                        <input type="password" name="password" maxlength="50" placeholder="Password"/>
                    </div>
                    <div class="btn-file">
                        <input type="file" name="gambar" class="textfield">
                    </div>
                    <div class="btn-submit">
                        <button type="submit" name="Register" id="Register">Register</button>
                    </div>
                    <div class="login-link">
                        Sudah Punya Akun? <a href="login.php">Login</a><br>
                    </div>
                </div>
            </div>
        </form>
    </header>
</body>
</html>
