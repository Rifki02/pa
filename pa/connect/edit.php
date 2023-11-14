<?php
    require "koneksi.php";
    $id = $_GET["id"];
    
    $result = mysqli_query($conn, "SELECT * FROM pengguna where id='$id'");

    $pengguna = [];

    while ($row = mysqli_fetch_assoc($result)){
        $pengguna[] = $row;
}

$pengguna = $pengguna[0];


if (isset($_POST['edit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $foto = $_FILES["gambar"]["name"];
    $explode = explode('.', $foto);
    $ekstensi = strtolower(end($explode));
    $gambar = date("Y-m-d"). $foto;
    $temp = $_FILES['gambar']['tmp_name'];

    $cek = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");

        if (move_uploaded_file($temp,'../img/' . $gambar)){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "UPDATE pengguna SET username = '$username', email='$email', password='$password', gambar ='$gambar' WHERE id = '$id' ");
        
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil Diubah!');
                    document.location.href = '../php/admin.php'
                </script>";
            } else {
                echo "
                <script>
                    alert('Data Gagal Diubah!');
                    document.location.href = 'edit.php'
                </script>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-box">
                    <label for="username" id="UserLabel"></label>
                    <input type="text" name="username" maxlength="100" placeholder="Username"/>
                </div>
                <div class="input-box">
                    <label for="SignEmail" id="email"></label>
                    <input type="email" name="email" maxlength="50" placeholder="Email"/>
                </div>
                <div class="input-box">
                    <label for="SignPassword" id="password"></label>
                    <input type="password" name="password" maxlength="50" placeholder="password"/>
                </div>
                <div class="inputBox">
                    <input type="file" name="gambar" class="textfield">
                </div>
                <input type="submit" name="edit" value="Edit Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>