<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <h3>
        <center>Laporan Data Kategori</center>
    </h3>
    <br>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataKategori as $dk) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dk->nama_kategori ?></td>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>