<?php
require_once "../koneksi.php";

$kelas = mysqli_real_escape_string($conn, trim($_POST['kelas']));
$id = mysqli_real_escape_string($conn, trim($_GET['id']));

if (empty($kelas)) {
    echo "Kelas is required";
    exit();
}
if (strlen($kelas) != 10) {
    echo "Kelas harus 10 karakter";
    exit();
}

$kelasUpper = strtoupper($kelas);


$sql = "UPDATE kelas SET nama='$kelas' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
}
