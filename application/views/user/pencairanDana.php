<div class="card-body">
    <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Gambar</th>
                    <th>Dana Terkumpul</th>
                    <th>Total Dana</th>
                    <th>Is Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($iklan as $ik) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ik->judul ?></td>
                        <td><?= date('d F Y', $ik->date_created); ?></td>
                        <td><?= date('d F Y', $ik->date_end); ?></td>
                        <td><img width="40px" src="<?= base_url('assets/img/') . $ik->gambar ?>" alt=""></td>
                        <?php
                        $danaTerkumpul = "SELECT SUM(nominal) as total 
		                FROM donasi WHERE id_iklan= $ik->id ";
                        $dana = $this->db->query($danaTerkumpul)->result_array();


                        ?>

                        <td><?php foreach ($dana as $d) : ?>
                                Rp. <?= number_format($d['total']); ?>
                            <?php endforeach; ?></td>
                        <td>Rp <?= number_format($ik->total_dana);  ?></td>
                        <td value="<?= $ik->is_active ?>"> <?php if ($ik->status == "0") {
                                                                echo "<span class='btn btn-warning'>Diperiksa</span>";
                                                            } else {
                                                                echo "<span class='btn btn-secondary'>Tampil</span>";
                                                            } ?></td>
                        <td><a href="<?= base_url('user/pencairanDanaAksi/') . $ik->id ?>"><span class='btn btn-success'>Cairkan Dana</span> </a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>


</div>