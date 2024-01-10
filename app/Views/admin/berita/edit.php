<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/admin/berita/create" class="btn btn-sm btn-outline-secondary">Create</a>
        </div>
    </div>
</div>

<h2><?= $title ?> Data</h2>
<div>
    <form action="/admin/berita/update/<?= $berita['id'] ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= $berita['title'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('title') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <input type="text" class="form-control <?= $validation->hasError('isi') ? 'is-invalid' : '' ?>" id="isi" name="isi" value="<?= $berita['isi'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('isi') ?>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="/admin/berita" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>