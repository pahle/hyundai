<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
</div>

<h2><?= $title ?> Data</h2>
<div>
    <form action="/admin/type/save" method="POST" class="needs-validation" novalidate>
        <!-- id_mobil hidden -->
        <input type="hidden" name="id_mobil" value="<?= $id_mobil ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control  <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" autofocus>
            <div class="invalid-feedback">
                <?= $validation->getError('nama') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control  <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" id="harga" name="harga">
            <div class="invalid-feedback">
                <?= $validation->getError('harga') ?>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="/admin/mobil/show/<?= $id_mobil ?>" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>