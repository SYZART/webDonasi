<div class="owl-carousel-wrapper">
    <div class="box-92819">
        <h1 class="text-white mb-3">Mari bergabung menjadi Relawan Donasi</h1>
        <p><a href="#" class="btn btn-primary py-3 px-4 rounded-0">Donasi</a></p>
    </div>

    <div class="owl-carousel owl-1 ">
        <div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/') ?>images/hero_1.jpg');"></div>
        <div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/') ?>images/hero_2.jpg');"></div>
        <div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/') ?>images/hero_3.jpg');"></div>

    </div>
</div>

<div class="container">
    <div class="feature-29192-wrap d-md-flex" style="margin-top: -20px; position: relative; z-index: 2;">

        <a href="#" class="feature-29192 overlay-danger" style="background-image: url('<?= base_url('assets/') ?>images/img_3_gray.jpg');">
            <div class="text">
                <span class="meta">Bencana</span>
                <h3 class="text-cursive text-white h1">Sandang Pangan</h3>
            </div>
        </a>

        <a class="feature-29192 overlay-success" style="background-image: url('<?= base_url('assets/') ?>images/img_2_gray.jpg');">
            <div class="text">
                <span class="meta">Kesehatan</span>
                <h3 class="text-cursive text-white h1">Pengobatan</h3>
            </div>
        </a>

        <div class="feature-29192 overlay-warning" style="background-image: url('<?= base_url('assets/') ?>images/img_1_gray.jpg');">
            <div class="text">
                <span class="meta">Pendidikan</span>
                <h3 class="text-cursive text-white h1">Ruang Kelas Baru</h3>
            </div>
        </div>

    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5 align-items-st">
            <div class="col-md-3">
                <div class="heading-20219">
                    <h2 class="title text-cursive">Donasi yuk</h2>
                </div>
            </div>
            <div class="col-md-9">
                <p>Mari bergabung untuk memberikan donasi terbaikmu, berapapun donasi yang kamu berikan sangat membantu untuk mereka.</p>
            </div>
        </div>

        <div class="row">
            <?php foreach ($iklan as $ik) : ?>
                <div class="col-md-4">
                    <div class="cause shadow-sm">
                        <!-- <?php $tgl_ini = date('Y-m-d');
                                $date_end = $ik->date_end;
                                if ($tgl_ini > $date_end) {
                                } else {
                                    echo "iklan ini tak tampil";
                                }
                                ?> -->


                        <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                            <a href="#" class="cause-link d-block">
                                <img src="<?= base_url('assets/images/') . $ik->gambar ?>" alt="Image" class="img-fluid">
                                <div class="custom-progress-wrap">
                                    <span class="caption">80% complete</span>
                                    <div class="custom-progress-inner">
                                        <div class="custom-progress bg-danger" style="width: 90%;"></div>
                                    </div>
                                </div>
                            </a>
                            <span class="badge-danger py-1 small px-2 rounded mb-3 d-inline-block mt-2"><?= $ik->nama_kategori ?></span>
                            <h3 class="mb-4"><a href="<?= base_url('welcome/donasi/') . $ik->id; ?>"><?= $ik->judul ?></a></h3>
                            <div class="border-top border-light py-2 d-flex">
                                <p>Dana yang dibutuhkan :</p>
                                <div class="ml-auto"><strong class="text-primary"><?= "Rp " . number_format($ik->total_dana, 2, ',', '.'); ?></strong></div>
                            </div>
                            <div style="margin-top: -30px;" class="border-light border-bottom py-2 d-flex">
                                <p>Dana terkumpul :</p>

                                <?php $data = "SELECT SUM(nominal) as total 
                                        FROM donasi WHERE id_iklan= $ik->id";
                                $menu = $this->db->query($data)->result_array();
                                ?>
                                <?php foreach ($menu as $m) :   ?>
                                    <!-- <?= $m['total']; ?> -->
                                    <div class="ml-auto"><strong class="text-primary"><?= "Rp " . number_format($m['total'], 2, ',', '.'); ?></strong></div>
                                <?php endforeach; ?>

                            </div>

                            <div class="py-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('assets/img/profile/') . $ik->image ?>" alt="Image" class="rounded-circle mr-3" width="50">
                                    <div class=""><?= $ik->name ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<div class="bg-image overlay site-section" style="background-image: url('<?= base_url('assets/') ?>images/hero_1.jpg');">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-12">
                <div class="row mb-5">
                    <div class="col-md-7">
                        <div class="heading-20219">
                            <h2 class="title text-white mb-4 text-cursive">Why Choose Us</h2>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ipsam repellendus voluptatum, totam magni iusto numquam quo eos dolor perferendis.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>1</span></div>
                            <div>
                                <h3>Odit Reiciendis</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>2</span></div>
                            <div>
                                <h3>Nisi Sint Explicabo</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>3</span></div>
                            <div>
                                <h3>Accusamus Labore Necessitatibus</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>4</span></div>
                            <div>
                                <h3>Consectetur Dolor Elit</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>