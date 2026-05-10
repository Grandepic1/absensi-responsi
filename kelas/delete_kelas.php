<?php
require_once "../koneksi.php";

$id = mysqli_real_escape_string($conn, trim($_GET['id']));

$sql = "DELETE FROM kelas WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
}
