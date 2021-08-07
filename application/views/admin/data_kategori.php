<!-- Begin Page Content -->
<div class="container-fluid">

    <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahkategori">Tambah Kategori</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <div class="card-body">
            <a href="<?= site_url('laporan/print_data_kategori') ?>" class="btn btn-primary  mb-2"><i class="fas fa-print"></i></a>
            <a href="<?= site_url('laporan/pdf_data_kategori') ?> " class="btn btn-warning   mb-2"><i class="fas fa-file-pdf"></i></a>
            <a href="<?= site_url('laporan/excel_data_kategori') ?> " class="btn btn-success  mb-2"><i class="fas fa-file-excel"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataKategori as $dk) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dk->nama_kategori ?></td>
                                <td><a href="<?= site_url('admin/hapus_kategori/') . $dk->id ?>" class="btn btn-danger" onclick="javascript: return confirm('Yakin hapus data ini?')">Hapus</a></td>

                            <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->
<!-- modal -->
<?= form_open('admin/tambahKategori'); ?>

<div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="form-grup">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- </form> -->
<?= form_close(); ?>