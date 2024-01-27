<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>

<div class="text-center my-5">
    <h1 class="header">
        Kontak Kami
    </h1>
</div>

<section class="container my-5 kontak">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15812.22838212184!2d110.4282296!3d-7.7837715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a02c2feb0f5%3A0x5f1db084fe25de44!2sHyundai%20Adisucipto%20Official!5e0!3m2!1sid!2sid!4v1704189232944!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-3 w-100 h-100">
            </iframe>
        </div>
        <div class="col-12 col-md-3 p-3 p-md-0">
            <img src="<?= base_url('assets/img/contact.jpeg') ?>" alt="" class="w-100 rounded-top object-fit-cover">
            <!-- absolute card body profile containing name and phone number -->
            <div class="contact-card text-white text-decoration-none text-center p-3 rounded-bottom">
                <h5 class="card-title">Yoana</h5>
                <a href="https://wa.me/6281392666867" class="card-text alert-contact text-decoration-none">+62 877-1808-2511</a>
                <br>
                <a href="https://wa.me/6281228080040" class="card-text alert-contact text-decoration-none">+62 812-2808-0040</a>
            </div>
        </div>
    </div>
</section>

<?php $this->endSection() ?>