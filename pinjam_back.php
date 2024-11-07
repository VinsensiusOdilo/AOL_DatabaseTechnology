<?php

date_default_timezone_set('Asia/Jakarta');
$kodePinjam = $_POST["kodePinjam"];
$tglPinjam = $_POST["tglPinjam"];
$kodeBuku = $_POST["kodeBuku"];
$kodePetugas = $_POST["KodePetugas"];
$noAnggota = filter_input(INPUT_POST, "noAnggota", FILTER_VALIDATE_INT);
$judulBuku = $_POST["judulBuku"];
$today = date("Y-m-d");

$tglKembali = date('Y-m-d', strtotime(date('Y-m-d', strtotime($tglPinjam)).'+'.'7'.'days'));

// jika tgl kembali masih di masa depan maka status diset 0 (tepat waktu)
// jika tidak maka status = 1 (telat)
if(strtotime($tglKembali) > strtotime($today)){
    $status = '0';
}
else{
    $status = '1';
}

$host = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection Error : " . mysqli_connect_error());
}

$sql = "INSERT INTO meminjam (KodePinjam, TglPinjam, TglKembali, KodeBuku, KodePetugas, Status, NoAnggota, JudulBuku)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssssis", $kodePinjam, $tglPinjam, $tglKembali, $kodeBuku, $kodePetugas, $status, $noAnggota, $judulBuku);

mysqli_stmt_execute($stmt);

echo "Data meminjam berhasil diinput";

?>