<?php
require_once "../koneksi.php";

$sql = "SELECT m.id,m.nama as 'nama_mhs', m.nim, k.nama as 'nama_kls' FROM mahasiswa m INNER JOIN kelas k ON m.idKelas = k.id";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <script>
        function confirmationDelete(id) {
            if (confirm("Apakah anda yakin?")) {
                window.location.href = "delete_mahasiswa.php?id=" + id;
            }
        }
    </script>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <a href="create_mahasiswa.php">Tambah Mahasiswa</a><br>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Kelas</th>
                <th>Aksi</th>
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
                    <td><?= $row['nama_mhs'] ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama_kls'] ?></td>
                    <td><a href="edit_mahasiswa.php?id=<?= $row['id'] ?>">Edit</a>|<a href="#" onclick="confirmationDelete(<?= $row['id'] ?>)">Hapus</a></td>
                <?php } ?>
                </tr>
        </tbody>
    </table>
</body>

</html>