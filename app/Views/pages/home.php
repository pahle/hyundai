<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>
<section class="carousel hero">
    <div id="carouselExampleIndicators" class="carousel hero slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php foreach ($slider as $s) :  ?>
                <?php if ($s['id'] == $firstSliderId) : ?>
                    <div class="carousel-item active">
                        <img src="/img/<?= $s['gambar']; ?>" class="d-block w-100" alt="...">
                    </div>
                <?php else : ?>
                    <div class="carousel-item">
                        <img src="/img/<?= $s['gambar']; ?>" class="d-block w-100" alt="...">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="container my-5 text-center">
    <h1 class="fs-1 text-center fw-bold">Model</h1>
    <div class="container text-center pt-5">
        <div class="row">
            <?php foreach ($mobil as $m) : ?>
                <div class="col-12 col-sm-4">
                    <img src="/img/<?= $m['gambar'] ?>" alt="" class="w-100 mobil-grid">
                    <p class="mt-3 fs-4"><?= $m['nama'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- <div class="divider">
</div> -->
<section class="container my-5 text-center">
    <h1 class="fs-1 text-center fw-bold">Berita</h1>
    <div id="carouselExample" class="carousel slide d-flex align-items-center berita text-white text-center">
        <div class="carousel-inner">
            <?php foreach ($berita as $b) : ?>
                <?php if ($b['id'] == $firstBeritaId) : ?>
                    <div class="carousel-item active">
                        <h1 class="text-center"><?= $b['title'] ?></h1>
                        <p><?= $b['isi'] ?></p>
                    </div>
                <?php else : ?>
                    <div class="carousel-item">
                        <h1 class="text-center"><?= $b['title'] ?></h1>
                        <p><?= $b['isi'] ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- <button class="btn-muat-lainnya">Muat Lainnya</button> -->
</section>
<!-- <div class="divider">
</div> -->
<section class="grid mt-5">
    <div class="text-center">
        <div class="row">
            <div class="col-12 col-sm-6 p-0">
                <img src="https://placehold.co/300x150" alt="" class="w-100">
            </div>
            <div class="col-12 col-sm-6 p-0">
                <img src="https://placehold.co/300x150" alt="" class="w-100">
            </div>
        </div>
    </div>
    <div class="text-center">
        <div class="row">
            <div class="col-12 col-sm-6 p-0">
                <img src="https://placehold.co/300x150" alt="" class="w-100">
            </div>
            <div class="col-12 col-sm-6 p-0">
                <img src="https://placehold.co/300x150" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>

<?php $this->endSection(); ?>