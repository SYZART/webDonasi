<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Galang Dana Saya</h2>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="row mt-3 ">

        <?= form_open_multipart('user/pengajuanDonasi'); ?>
        <div class="form-group">
            <label> Kategori</label>
            <select name="id_kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach ($dataKategori as $dt) : ?>
                    <option value="<?= $dt->id_kategori ?>"><?= $dt->nama_kategori ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>

        </div>
        <div class="form-group">

            <div class="form-grup" hidden>
                <label>ID USER</label>
                <input type="text" name="id_user" class="form-control" value="<?= $user['id_usr']; ?>">
            </div>
            <div class="form-grup">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control">
                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-grup" hidden>
                <label>Tanggal mulai</label>
                <input type="text" name="date" class="form-control" value="<?= time(); ?>">
            </div>
            <div class="form-grup">
                <label>Tanggal Akhir</label>
                <input type="date" name="date_end" class="form-control">
                <?= form_error('date_end', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-grup">
                <label>Total Dana</label>
                <input type="number" name="total_dana" class="form-control">
                <?= form_error('total_dana', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-grup">
                <label>Cerita</label>
                <input type="text" name="cerita" class="form-control">
                <?= form_error('cerita', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-grup" hidden>
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="0">
            </div>
            <div class="form-grup">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">

            </div>
            <button type="submit" class="btn btn-primary mt-3">Ajukan Permintaan</button>
        </div>

        <?= form_close(); ?>
    </div>
</div>



</div>