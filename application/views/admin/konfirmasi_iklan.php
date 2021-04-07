<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

        </div>
    </div>
    <div class="col-sm-6">

        <?php foreach ($pengajuanIklan as $pi) : ?>
            <?= form_open_multipart('admin/konfirmasiIklanAksi'); ?>
            <div class="form-group" hidden>
                <label for="formGroupExampleInput">id</label>
                <input type="text" class="form-control" name="id" id="id" value="<?= $pi->id ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Kategori</label>
                <select name="kategori" id="kategori" class="form-control">
                    <option value="<?= $pi->id_kategori ?>"><?= $pi->nama_kategori ?></option>
                    <option name="kategori" id="kategori" value="<?= $pi->id_kategori ?>"><?= $pi->nama_kategori ?></option>
                </select>
            </div>
            <div class="form-group" hidden>
                <label for="formGroupExampleInput2">Email</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $pi->id_usr ?>" readonly>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="<?= $pi->judul ?>" readonly>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Durasi donasi</label>
                <input type="text" class="form-control" name="date_end" id="date_end" value="<?= $pi->date_end ?>" hidden>
                <input type="text" class="form-control" value="<?= date('d-F-Y', $pi->date_end) ?>" readonly>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Dana Yang dibutuhkan</label>
                <input type="text" class="form-control" name="total_dana" id="total_dana" value="<?= $pi->total_dana ?>" readonly>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Cerita</label>
                <textarea class="form-control" name="cerita" id="cerita" cols="30" rows="10" value="<?= $pi->cerita ?>"><?= $pi->cerita ?></textarea>
            </div>


            <div class="form-group">
                <label for="formGroupExampleInput2">Active</label>
                <select class="form-control" name="status" id="status">
                    <option value="<?= $pi->status ?>">---Pilih---</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Gambar</label>
                <input type="" name="gambar" id="gambar" value="<?= $pi->gambar ?>" hidden>
                <img width="300px" src="<?= base_url('assets/img/') . $pi->gambar ?>" alt="">
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= site_url('admin/pengajuanIklan') ?>" class="btn btn-danger">Kembali</a>
            </div>

            </form>
        <?php endforeach; ?>


    </div>
</div>
</div>