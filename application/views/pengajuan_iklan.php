<div class="container mt-4">
  <div class="row">
    <div class="col">
      <h2 class="text-center">Tambah Iklan</h2>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col col-6">
    </div>
    <div class="col col-6">
      <?= form_open_multipart('user/pengajuanIklan'); ?>
      <div class="mb-3">
        <label for="kategori" class="form-label ">Kategori</label>
        <select class="form-select mb-3 form-control" name="kategori" aria-label="Default select example">
          <option selected>Pilih Kategori</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>

      <div class="mb-3" hidden>
        <label for="id_user" class="form-label">ID USER</label>
        <input type="text" name="id_user" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul">
      </div>
      <div class="mb-3" hidden>
        <label for="date" class="form-label">Tanggal mulai</label>
        <input type="text" name="date" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Akhir</label>
        <input type="date" class="form-control" id="tanggalAkhir" name="date_end">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Total Dana</label>
        <input type="number" class="form-control" id="totalDana" name="totalDana">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Cerita</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="form-grup" hidden>
        <label for="status" class="form-label">Status</label>
        <input type="text" name="status" class="form-control" value="0">
      </div>
      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload Gambar</label>
        <input class="form-control" type="file" id="gambar" name="gambar" multiple>
      </div>
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>