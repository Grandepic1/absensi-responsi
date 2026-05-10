<?php
require_once "../koneksi.php";

$sql = "SELECT a.matkul, a.dosen, a.tanggal, m.nama FROM mahasiswa_absensi ma INNER JOIN mahasiswa m ON ma.idMahasiswa = m.id INNER JOIN absensi a ON a.id = ma.idAbsensi";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <script>
        function confirmationDelete(id) {
            if (confirm("Apakah anda yakin?")) {
                window.location.href = "delete_Absensi.php?id=" + id;
            }
        }
    </script>
</head>

<body>
    <h1>Data Absensi</h1>
    <a href="create_matkul.php">Tambah Matkul</a><br>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Mata Kuliah</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $nomor++;
            ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $row['matkul'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                <?php } ?>
                </tr>
        </tbody>
    </table>
</body>

</html>