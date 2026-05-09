<?php
require_once "koneksi.php";

$sql = "SELECT * FROM kelas";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <script>
        function confirmationDelete(id){
            if (confirm("Apakah anda yakin?")){
                window.location.href = "delete_kelas.php?id="+id;
            }
        }
    </script>
</head>

<body>
    <h1>Data Kelas</h1>
    <a href="create_kelas.php">Tambah Kelas</a><br>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
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
                    <td><a href="kelas.php?id=<?= htmlspecialchars($row['nama']) ?>"><?= htmlspecialchars($row['nama']) ?></a></td>
                    <td><a href="edit_kelas.php?id=<?= $row['id'] ?>">Edit</a>|<a href="#" onclick="confirmationDelete(<?= $row['id'] ?>)">Hapus</a></td>
                <?php } ?>
                </tr>
        </tbody>
    </table>
</body>

</html>