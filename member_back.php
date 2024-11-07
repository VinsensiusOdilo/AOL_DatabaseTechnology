<?php

$namaAnggota = $_POST["nama"];
$notlpn = filter_input(INPUT_POST, "noTelepon", FILTER_VALIDATE_INT);
$noAnggota = filter_input(INPUT_POST, "noAnggota", FILTER_VALIDATE_INT);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection Error : " . mysqli_connect_error());
}

$sql = "INSERT INTO anggota (NoAnggota, Nama, NoTelepon)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "isi", $noAnggota, $namaAnggota, $notlpn);

mysqli_stmt_execute($stmt);

echo "Data member berhasil diinput";

?>