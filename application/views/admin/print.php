<!DOCTYPE html>
<html lang="en">
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>No Kursi</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($dataIklan as $di) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <!-- <td><?= $tr->name ?></td>
                    <td><?= $tr->email ?></td>
                    <td><?= $tr->judul ?></td>
                    <td><?= $tr->kategori ?></td>
                    <td><?= $tr->kursi ?></td>
                    <td><?= $tr->harga ?></td>
                    <td><?= $tr->tanggal ?></td> -->

                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>
<script>
    window.print()
</script>

</html>