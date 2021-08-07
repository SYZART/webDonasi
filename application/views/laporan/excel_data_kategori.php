<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attchment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires:0");

?>
<h3>
    <center>Laporan data kategori</center>
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