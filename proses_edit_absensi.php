<?php
require_once "koneksi.php";

$id = mysqli_real_escape_string($conn, trim($_GET['id']));
$nama = mysqli_real_escape_string($conn, trim($_POST['nama']));
$kelas = mysqli_real_escape_string($conn, trim($_POST['kelas']));
$nim = mysqli_real_escape_string($conn, trim($_POST['nim']));

function ifEmpty($data, $input)
{
    if (empty($input)) {
        echo $data . " is required";
        exit();
    }
}

ifEmpty("nama", $nama);
ifEmpty("kelas", $kelas);
ifEmpty("nim", $nim);


$sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', idKelas='$kelas' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header("Location: mahasiswa.php");
}
