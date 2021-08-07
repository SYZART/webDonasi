<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <?php foreach ($editUser as $dr) { ?>
            <?= form_open('admin/kelola_akun_aksi'); ?>
            <div class="form-group" hidden>
                <input type="hidden" class="form-control" name="id_usr" id="id_usr" value="<?= $dr->id_usr ?>">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Nama</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $dr->name  ?>">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= $dr->email ?>" readonly>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Status</label>
                <select class="form-control" name="role_id" id="role_id">
                    <option value="<?= $dr->role_id; ?>">---Pilih---</option>
                    <option value="1">Administrator</option>
                    <option value="2">Member</option>
                </select>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Active</label>
                <select class="form-control" name="is_active" id="is_active">
                    <option value="<?= $dr->is_active ?>">---Pilih---</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        <?php } ?>

    </div>
</div>