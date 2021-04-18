<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
        }
    </style>
    <h3>
        <center>Laporan data donasi</center>
    </h3>
    <br>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Gambar</th>
                <th>Nama Pembuat</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($donasi as $d) {
            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $d['judul']; ?></td>
                    <td><?= $d['date']; ?></td>
                    <td><?= $d['date_end']; ?></td>
                    <td><?= $d['gambar']; ?></td>
                    <td>User</td>
                    <td>Active</td>
                    <td>Edit</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>