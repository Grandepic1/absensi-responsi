<?php
require_once "../koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Form Tambah Mahasiswa</h2>
    <form action="proses_create_mahasiswa.php" method="post">
        <label for="nama">Input Nama : </label>
        <input type="text" name="nama" id=""><br>
        <label for="nim">Input NIM : </label>
        <input type="text" name="nim" id=""><br>
        <label for="Kelas">Input Kelas : </label>
        <select name="kelas">
            <?php
            while ($opsi = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?= htmlspecialchars($opsi['id']) ?>"><?= htmlspecialchars($opsi['nama']) ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>