<!DOCTYPE html>
<html lang="en"><head>
    <title>Document</title>
</head><body>
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
        <?php $no = 1;
                        foreach ($dataIklan as $dk) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dk->judul ?></td>
                                <td><?= date('d F Y', $dk->date_created); ?></td>
                                <td><?= date('d F Y', $dk->date_end); ?></td>
                                <td><img width="40px" src="<?= base_url('assets/img/') . $dk->gambar ?>" alt=""></td>
                                <td><?= $dk->name ?></td>
                                <td value="<?= $dk->is_active ?>"> <?php if ($dk->status == "0") {
                                                                        echo "Not Active";
                                                                    } else {
                                                                        echo "Active";
                                                                    } ?></td>
                                <td><a href="<?= site_url('admin/') . $dk->id ?>">edit</a></td>
                            </tr>
                        <?php endforeach; ?>
        </tbody>
    </table>
</body></html>