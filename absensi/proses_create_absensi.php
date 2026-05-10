<?php
require_once "../koneksi.php";

$nama = mysqli_real_escape_string($conn, trim($_POST['nama']));
$matkul = mysqli_real_escape_string($conn, trim($_POST['matkul']));
$dosen = mysqli_real_escape_string($conn, trim($_POST['dosen']));
$tanggal = mysqli_real_escape_string($conn, trim($_POST['tanggal']));

function ifEmpty($data, $input)
{
    if (empty($input)) {
        echo $data . " is required";
        exit();
    }
}

ifEmpty("nama", $nama);
ifEmpty("matkul", $matkul);
ifEmpty("dosen", $dosen);
ifEmpty("tanggal", $tanggal);


$sql = "INSERT INTO absensi (matkul, dosen, tanggal) VALUE ('$matkul', '$dosen', '$tanggal')";

$result = mysqli_query($conn, $sql);
$result = mysqli_insert_id($conn);

$sql = "INSERT INTO mahasiswa_absensi (idMahasiswa, idAbsensi) VALUE ('$nama','$result')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
}
