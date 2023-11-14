<?php 
$conn = mysqli_connect('localhost','root','','toko_hp');

if (!$conn){
    die("Gagal terhubung ke database : " . mysqli_connect_error());
}
?>