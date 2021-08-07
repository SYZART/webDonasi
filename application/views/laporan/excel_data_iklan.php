<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attchment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires:0");

?>
<h3>
    <center>Laporan data iklan</center>
</h3>
<br>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Nama Pembuat</th>
            <th>Is Active</th>

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
                <td><?= $dk->name ?></td>
                <td value="<?= $dk->is_active ?>"> <?php if ($dk->date_end < time()) {
                                                        echo "Not Active";
                                                    } else {
                                                        echo "Active";
                                                    } ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>