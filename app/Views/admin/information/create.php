<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
</div>

<h2><?= $title ?> Data</h2>
<div>
    <form action="/admin/information/save" method="POST" class="needs-validation" novalidate>
        <!-- id_mobil hidden -->
        <input type="hidden" name="id_mobil" value="<?= $id_mobil ?>">
        <div class="mb-3">
            <label for="information" class="form-label">Information</label>
            <input type="text" class="form-control  <?= $validation->hasError('information') ? 'is-invalid' : '' ?>" id="information" name="information">
            <div class="invalid-feedback">
                <?= $validation->getError('information') ?>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="/admin/mobil/show/<?= $id_mobil ?>" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>