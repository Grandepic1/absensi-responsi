<?php
require_once "../koneksi.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM kelas WHERE id = '$id'");
$result = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Form Edit Kelas</h2>
    <form action="proses_update_kelas.php?id=<?= $id ?>" method="post">
        <label for="Kelas">Input Kelas : </label>
        <input type="text" name="kelas" id="" value="<?= $result['nama'] ?>">
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>