<?php

$KodeBuku = $_POST["Kode"];
$Judul = $_POST["Judul"];
$Penulis = $_POST["Author"];
$Penerbit = $_POST["Penerbit"];
$Tahun = filter_input(INPUT_POST, "Jumlah", FILTER_VALIDATE_INT);
$Kategori = $_POST["Kategori"];
$Jumlah = filter_input(INPUT_POST, "Jumlah", FILTER_VALIDATE_INT);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection Error : " . mysqli_connect_error());
}

$sql = "INSERT INTO buku (KodeBuku, Judul, Penulis, Penerbit, Tahun, Kategori, Jumlah)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssisi", $KodeBuku, $Judul, $Penulis, $Penerbit, $Tahun, $Kategori, $Jumlah);

mysqli_stmt_execute($stmt);

echo "Data buku berhasil diinput";

?>