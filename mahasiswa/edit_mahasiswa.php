<?php
require_once "../koneksi.php";
$id = $_GET['id'];

$resultMhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$resultKelas = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama");
$resultMhs = mysqli_fetch_assoc($resultMhs);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Form Edit Mahasiswa</h2>
    <form action="proses_edit_mahasiswa.php?id=<?= $id ?>" method="post">
        <label for="nama">Input Nama : </label>
        <input type="text" name="nama" id="" value="<?= $resultMhs['nama'] ?>"><br>
        <label for="nim">Input NIM : </label>
        <input type="text" name="nim" id="" value="<?= $resultMhs['nim'] ?>"><br>
        <label for="Kelas">Input Kelas : </label>
        <select name="kelas">
            <?php
            while ($opsi = mysqli_fetch_assoc($resultKelas)) {
            ?>
                <option value="<?= htmlspecialchars($opsi['id']) ?>" <?php if ($opsi['id'] == $resultMhs['idKelas']) echo "selected" ?>><?= htmlspecialchars($opsi['nama']) ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>