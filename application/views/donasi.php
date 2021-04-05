<div class="container mt-4">
    <h2 class="mb-4">Informasi Penggalangan Dana</h2>


    <div class="row">
        <div class="col-md-7">

            <div class="cause shadow-sm">

                <a href="#" class="cause-link d-block">
                    <img src="<?= base_url('assets/') ?>images/img_1.jpg" alt="Image" class="img-fluid">
                    <div class="custom-progress-wrap">
                        <span class="caption">80% complete</span>
                        <div class="custom-progress-inner">
                            <div class="custom-progress bg-warning" style="width: 80%;"></div>
                        </div>
                    </div>
                </a>
                <div class="px-3 pt-3 border-top-0 border border ">
                    <h3 class="mb-4">Penggalangan Dana Banjir Bandang</h3>
                    <p></p>
                    <div class="border-top border-light py-2 d-flex" style="margin-bottom: -20px;">
                        <div>Donasi yang dibutuhkan : </div>
                        <?php foreach ($donasi as $d) : ?>
                            <div><strong class="text-primary">Rp. <?= number_format($d->total_dana, 0, '.', '.'); ?> </strong></div>
                        <?php endforeach; ?>
                    </div>


                    <div class="border-light border-bottom py-2 d-flex">
                        <div>Total Donasi : </div>
                        <?php foreach ($totalDonasi as $td) : ?>
                            <div><strong class="text-primary position-absolute top-0 end-0"><?= number_format($td->total, 0, '.', '.'); ?></strong></div>

                        <?php endforeach; ?>
                    </div>
                    <div class="py-4">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url("assets/images/person_1.jpg") ?>" alt="Image" class="rounded-circle mr-3" width="50">
                            <div class="">James Smith</div>
                        </div>
                    </div>
                </div>
                <?php foreach ($totalPendonasi as $pd) : ?>
                    <div><?= "Jumlah Pendonasi " . $pd->pendonasi . " orang" ?></div>
                <?php endforeach; ?>
                <?php foreach ($donasi as $d) : ?>
                    <h3><?= $d->judul ?></h3>
                    <?php
                    $tgl_ini = date('Y-m-d');
                    $date_end = $d->date_end;
                    $selisih = strtotime($date_end) - strtotime($tgl_ini);
                    $hari = $selisih / (60 * 60 * 24);
                    echo "Sisa Waktu $hari hari";
                    ?>
                <?php endforeach; ?>
            </div>

        </div>
        <div class="col-md-5">

            <form method="POST" action="<?= base_url('user/inputDonasi'); ?>">
                <?php foreach ($donasi as $d) : ?>
                    <div class="form-group" hidden>
                        <input type="text" id="id_iklan" name="id_iklan" class="form-control" placeholder="Name" value="<?= $d->id ?>">
                    </div>
                <?php endforeach; ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                </div>
                <!-- <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div> -->
                <!-- <div class="mb-3">
                    <label for="handphone" class="form-label">No Handphone</label>
                    <input type="text" class="form-control" id="handphone" name="handphone" aria-describedby="emailHelp">
                </div> -->
                <div class="mb-3">
                    <label for="nominal" class="form-label">Jumlah Donasi</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" aria-describedby="emailHelp">
                </div>
                <div class="form-group" hidden>
                    <input type="text" id="date" name="date" class="form-control" value="<?= time(); ?>">
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Donasi</button>
            </form>
        </div>
    </div>

</div>