<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/admin/article/create" class="btn btn-sm btn-outline-secondary">Create</a>
        </div>
    </div>
</div>

<h2><?= $title ?> Data</h2>

<?= $validation->listErrors(); ?>

<div>
    <form action="/admin/article/update/<?= $article['id'] ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= $article['title'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('title') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <input type="text" class="form-control <?= $validation->hasError('isi') ? 'is-invalid' : '' ?>" id="isi" name="isi" value="<?= $article['isi'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('isi') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control <?= $validation->hasError('gambar') ? 'is-invalid' : '' ?>" id="gambar" name="gambar" value="<?= $article['gambar'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('gambar') ?>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
        <a href="/admin/article" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>