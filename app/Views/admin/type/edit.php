<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
</div>

<h2><?= $title ?> Data</h2>
<div>
    <form action="/admin/type/update/<?= $type['id'] ?>" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= $type['nama'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control  <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= $type['harga'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('harga') ?>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="/admin/mobil/show/<?= $type['id_mobil'] ?>" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>