<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>

<div class="text-center my-5">
    <h1 class="header">
        Kontak Kami
    </h1>
</div>

<section class="container my-5 kontak">
    <h1 class="fs-1 fw-bold mb-5 text-center">Kontak Kami</h1>

    <div class="d-flex">
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15812.22838212184!2d110.4282296!3d-7.7837715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a02c2feb0f5%3A0x5f1db084fe25de44!2sHyundai%20Adisucipto%20Official!5e0!3m2!1sid!2sid!4v1704189232944!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="contact">
            <div class="d-flex">
                <h1><i class="fa-solid fa-envelope"></i></h1>
                <p>adisucipto.hyundai@gmail.com</p>
            </div>
            <div class="d-flex mt-3">
                <h1><i class="fa-solid fa-location-dot"></i></h1>
                <p>
                    Jl. Laksda Adisucipto Jl. Kembang Raya No.KM, RW.9, Karangploso, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                </p>
            </div>
            <div class="d-flex mt-3">
                <h1><i class="fa-brands fa-square-whatsapp"></i></h1>
                <p><a href="wa.me/6281392666867">0813-9266-6867</a></p>
            </div>
        </div>
    </div>
</section>

<?php $this->endSection() ?>