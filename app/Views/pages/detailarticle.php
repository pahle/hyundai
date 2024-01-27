<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>

<div class="text-center my-5">
    <h1 class="header">
        <?= $article['title'] ?>
    </h1>
</div>

<section class="container my-5">
    <!-- center image w-50 -->
    <div class="text-center">
        <img src="/img/<?= $article['gambar'] ?>" class="w-50" alt="gambar">
    </div>
    <div class="mt-5">
        <?= $article['isi'] ?>
    </div>
</section>

<?php $this->endSection() ?>