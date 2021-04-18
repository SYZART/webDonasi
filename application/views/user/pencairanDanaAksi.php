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

                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>






    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Galang Dana Saya</h2>
            </div>
        </div>
        <?= $this->session->flashdata('message') ?>
        <div class="row mt-3 ">

            <?php foreach ($iklan as $ik) : ?>
                <?= form_open_multipart('user/pencairanDanaAksi/' . $ik->id); ?>

        </div>
        <div class="form-group">

            <div class="form-grup" hidden>
                <label>iklan.id</label>
                <input type="text" name="id" class="form-control" value="<?= $ik->id ?>" readonly>
            </div>
            <?php foreach ($donasi as $d) : ?>
                <div class="form-grup" hidden>
                    <label>donasi.id_iklan</label>
                    <input type="text" name="id_iklan" class="form-control" value="<?= $d->id_iklan ?>" readonly>
                </div>
            <?php endforeach; ?>
            <div class="form-grup">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= $ik->judul ?>" disabled readonly>
            </div>


            <div class="form-grup">
                <label>Jumlah pencairan</label>
                <?php
                $danaTerkumpul = "SELECT SUM(nominal) as total 
                FROM donasi WHERE id_iklan= $ik->id ";
                $dana = $this->db->query($danaTerkumpul)->result_array();
                $a = $ik->total_dana;
                ?>
                <?php foreach ($dana as $d) : ?>
                    <input type="number" class="form-control" value="<?= $d['total']  ?>" readonly>
                    <input type="number" name="total_dana" class="form-control" value="<?= $a - $d['total']  ?>" hidden>
                <?php endforeach; ?>

            </div>
            <div class="form-grup">
                <label>No Rekening</label>
                <input type="text" name="rekening" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary mt-3">Ajukan Permintaan</button>
        </div>
    <?php endforeach; ?>

    <?= form_close(); ?>
    </div>
</div>