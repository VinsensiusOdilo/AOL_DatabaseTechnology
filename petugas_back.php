<?php

$kodePetugas = $_POST["kodePetugas"];
$notlpn = filter_input(INPUT_POST, "noTelepon", FILTER_VALIDATE_INT);
$namaPetugas = $_POST["namaPetugas"];

$host = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection Error : " . mysqli_connect_error());
}

$sql = "INSERT INTO petugas (KodePetugas, NoTelepon, NamaPetugas)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sis", $kodePetugas, $notlpn, $namaPetugas);

mysqli_stmt_execute($stmt);

echo "Data petugas berhasil diinput";

?>