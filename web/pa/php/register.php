
<?php
require "../connect/koneksi.php";
session_start();

if (isset($_POST["Register"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];  // Corrected the input name
    $telepon = $_POST["telepon"];  // Corrected the input name
    $password = $_POST["password"];
    $foto = $_FILES["gambar"]["name"];
    $explode = explode('.', $foto);
    $ekstensi = strtolower(end($explode));
    $gambar = date("Y-m-d"). $foto;
    $temp = $_FILES['gambar']['tmp_name'];  

    $cek = mysqli_query($conn, "SELECT nama FROM pengguna WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($cek)) {
        echo "
        <script>
        alert('username telah di gunakan');
        document.location.href = 'Register.php';
        </script>
        ";
    }else{

        if($nama == "admin"){
            echo "
            <script>
            alert('username tidak boleh admin');
            document.location.href = 'Register.php';
            </script>
            ";
        }else{
            if (move_uploaded_file($temp,'../img/' . $gambar)) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $result = mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$nama', '$alamat', '$telepon', '$password' , '$gambar') ");
                    if ($result) {
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
    <link rel="stylesheet" href="register.css" />
</head>
<body>
    <header>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="wrapper">
                <div class="form-box-register">
                    <h2>Register</h2>
                    <div class="input-box">
                        <label for="nama" id="UserLabel"></label>
                        <input type="text" name="nama" maxlength="100" placeholder="nama"/>
                    </div>
                    <div class="input-box">
                        <label for="alamat" id="alamat"></label>
                        <input type="text" name="alamat" maxlength="50" placeholder="alamat"/>
                    </div>
                    <div class="input-box">
                        <label for="telepon" id="telepon"></label>
                        <input type="text" name="telepon" maxlength="50" placeholder="telepon"/>
                    </div>
                    <div class="input-box">
                        <label for="password" id="password"></label>
                        <input type="password" name="password" maxlength="50" placeholder="password"/>
                    </div>
                    <div class="inputBox">
                        <input type="file" name="gambar" class="textfield">
                    </div>
                    <div class="inputBox">
                        <button type="submit" name="Register" id="Register">Register</button>
                    </div>
                </div>
            </div>
        </form>
    </header>
</body>
</html>
