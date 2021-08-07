<div class="container mt-4">
    <h2 class="mb-4">Informasi Penggalangan Dana</h2>
    <?= $this->session->flashdata('message') ?>


    <div class="row">
        <div class="col-md-7">

            <div class="cause shadow-sm">

                <?php foreach ($totalDonasi as $td) : ?>
                    <?php foreach ($donasi as $d) : ?>
                        <a href="#" class="cause-link d-block">
                            <img src="<?= base_url('assets/') ?>images/img_1.jpg" alt="Image" class="img-fluid">
                            <div class="custom-progress-wrap">
                                <?php
                                $dana = $td->total;
                                $terkumpul =  $d->total_dana;
                                $hasil = ($dana / $terkumpul) * 100;

                                ?>
                                <div class="custom-progress-inner">

                                    <div class="custom-progress bg-warning" style="max-width: <?= $hasil ?>%;"></div>
                                </div>
                            </div>
                        </a>
                        <div class="px-3 pt-3 border-top-0 border border ">
                            <h3 class="mb-4">Penggalangan Dana Banjir Bandang</h3>
                            <p><?= $d->cerita ?></p>
                            <div class="border-top border-light py-2 d-flex" style="margin-bottom: -20px;">
                                <div>Donasi yang dibutuhkan : </div>
                                <div><strong class="text-primary">Rp. <?= number_format($d->total_dana); ?> </strong></div>
                            <?php endforeach; ?>
                            </div>


                            <div class="border-light border-bottom py-2 d-flex">
                                <div>Total Donasi : </div>
                                <div><strong class="text-primary position-absolute top-0 end-0">Rp. <?= number_format($td->total); ?></strong></div>

                            <?php endforeach; ?>

                            </div>
                            <div class="py-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url("assets/images/person_1.jpg") ?>" alt="Image" class="rounded-circle mr-3" width="50">
                                    <div class="">James Smith</div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row border">
                                <?php foreach ($totalPendonasi as $pd) : ?>
                                    <div class="col-sm-5 col-md-6 border">Jumlah Pendonasi</div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 border"><?= $pd->pendonasi     ?>&nbsp;orang</div>
                                <?php endforeach; ?>
                            </div>
                            <div class="row border">
                                <div class="col-sm-5 col-md-6 border">Judul</div>
                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 border"><?= $d->judul ?></div>
                            </div>
                            <div class="row border">
                                <?php
                                $tgl_ini = date('Y-m-d');
                                $date_end = $d->date_end;
                                $selisih = $date_end - strtotime($tgl_ini);
                                $hari = $selisih / (60 * 60 * 24);
                                ?>
                                <div class="col-sm-5 col-md-6 border">Sisa Waktu</div>
                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 border"><?= $hari; ?> Hari</div>
                            </div>
                        </div>
            </div>

        </div>
        <div class="col-md-5">

            <?php foreach ($donasi as $d) : ?>
                <form method="POST" action="<?= base_url('welcome/donasi/' . $d->id); ?>">
                    <div class="form-group" hidden>
                        <input type="text" id="id_iklan" name="id_iklan" class="form-control" placeholder="Name" value="<?= $d->id ?>">
                    </div>
                <?php endforeach; ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                </div>

                <div class="mb-3">
                    <label for="nominal" class="form-label">Jumlah Donasi</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" aria-describedby="emailHelp">
                    <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>

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