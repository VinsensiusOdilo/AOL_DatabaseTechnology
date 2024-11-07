<?php

$noDenda = filter_input(INPUT_POST, "noDenda", FILTER_VALIDATE_INT);
$tglkembali = strtotime($_POST["tglkembali"]);
$noAnggota = filter_input(INPUT_POST, "noAnggota", FILTER_VALIDATE_INT);
$todayDate = strtotime(date("Y-m-d"));

// hitung selisih tgl kembali dengan tanggal hari ini 
// NOTE : nilai input tarif dan lama keterlambatan akan menyesuaikan dengan tanggal hari ini (tanggal tugas dievaluasi)
if ($tglkembali < $todayDate) {
    $date1 = new DateTime(date("Y-m-d", $tglkembali));
    $date2 = new DateTime(date("Y-m-d", $todayDate));

    $dateDiff = $date1->diff($date2);

    $lamaTelat = $dateDiff->days;
}
else{
    die("Tanggal kembali belum lewat, denda tidak bisa diinput");
}

// tarif keterlambatan adalah 1000/hari
$tarif = $lamaTelat * 1000;

$host = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection Error : " . mysqli_connect_error());
}

$sql = "INSERT INTO denda (NoDenda, NoAnggota, LamaTelat, TarifDenda)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "iiii", $noDenda, $noAnggota, $lamaTelat, $tarif);

mysqli_stmt_execute($stmt);

echo "Data denda berhasil diinput";

?>