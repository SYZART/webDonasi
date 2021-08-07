<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>
<style type="text/css">
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        border: 1px solid black;
        font-size: 11pt;
        font-family: Verdana;
        padding: 10px 10px 10px 10px;
    }

    .table-data th {
        background-color: grey;
    }

    h3 {
        font-family: Verdana;
    }
</style>

<body>
    <h3>
        <center>Laporan data donasi</center>
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