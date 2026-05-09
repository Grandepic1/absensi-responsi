<?php
require_once "koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama");

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
    <form action="proses_create_absensi.php" method="post">
        <label for="mata kuliah">Input Mata Kuliah : </label>
        <input type="text" name="matkul" id=""><br>
        <label for="dosen">Input Dosen : </label>
        <input type="text" name="dosen" id=""><br>
        <label for="nama">Input Nama Mahasiswa : </label>
        <select name="nama">
            <?php
            while ($opsi = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?= htmlspecialchars($opsi['id']) ?>"><?= htmlspecialchars($opsi['nama']) ?></option>
            <?php } ?>
        </select><br>
        <label for="tanggal">Input Tanggal Absensi : </label>
        <input type="datetime-local" name="tanggal" id="">
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>