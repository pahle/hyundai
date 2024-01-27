<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>

<div class="text-center my-5">
    <h1 class="header">
        Artikel
    </h1>
</div>

<section class="container my-5 article">
    <div class="grid gap-3">
        <div class="row ">
            <?php foreach ($article as $a) : ?>
                <div class="p-3 col-12 col-md-4">
                    <div class="card">
                        <img src="/img/<?= $a['gambar'] ?>" class="card-img-top" alt="gambar">
                        <div class="card-body">
                            <h5 class="card-title"><?= $a['title'] ?></h5>
                            <?php
                            $string = $a['isi'];
                            $string = strip_tags($string);
                            if (strlen($string) > 80) {
                                $stringCut = substr($string, 0, 80);
                                $endPoint = strrpos($stringCut, ' ');
                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '...';
                            }
                            ?>
                            <p class="card-text"><?= $string ?></p>
                            <a href="/detailarticle/<?= $a['id'] ?>" class="btn btn-dark">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php $this->endSection() ?>