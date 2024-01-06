<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<div class="row text-center">
    <div class="col-sm-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Slider</h5>
                <h2 class="card-text"><?= $slider ?></h2>
                <span>Data</span>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mobil</h5>
                <h2 class="card-text"><?= $mobil ?></h2>
                <span>Data</span>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Berita</h5>
                <h2 class="card-text"><?= $berita ?></h2>
                <span>Data</span>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Article</h5>
                <h2 class="card-text"><?= $article ?></h2>
                <span>Data</span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>