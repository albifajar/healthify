<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data User - Healthify</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #DDDDDD;
        }

        th {
            background-color: #F2F2F2;
        }

        h2 {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
        }
    </style>
</head>

<body>
    <table class="mahasiswa">
        <h2>Database User</h2>
        <thead>
            <tr>
                <th>ID USER</th>
                <th>NAMA LENGKAP</th>
                <th>JENIS KELAMIN</th>
                <th>NOMOR TELEPON</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $query = mysqli_query($koneksi, "SELECT * FROM user");
            while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['nama_lengkap']; ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    <td><?php echo $data['no_telepon']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td> <a href="../../../profile.php?id=<?php echo $data['id_user']; ?>">Edit</a> | <a href="prosesHapus.php?id=<?php echo $data['id_user']; ?>">Hapus</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>