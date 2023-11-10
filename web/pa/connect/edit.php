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
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];
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
        </script>
        ";
    }else{
        if (move_uploaded_file($temp,'../img/' . $gambar)){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "UPDATE pengguna SET nama = '$nama', alamat='$alamat', telepon='$telepon', password='$password', gambar ='$gambar' WHERE id = '$id' ");
        
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
                            <label for="nama" id="UserLabel"></label>
                            <input type="text" name="nama" maxlength="100" placeholder="nama"/>
                        </div>
                        <div class="input-box">
                            <label for="SignAlamat" id="alamat"></label>
                            <input type="alamat" name="alamat" maxlength="50" placeholder="alamat"/>
                        </div>
                        <div class="input-box">
                            <label for="SignTelepon" id="telepon"></label>
                            <input type="text" name="telepon" maxlength="50" placeholder="telepon"/>
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