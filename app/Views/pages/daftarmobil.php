<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>
<section class="container my-5 daftar-mobil">
    <h1 class="fs-1 fw-bold mb-5 text-center">Daftar Mobil</h1>
    <div class="grid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <img src="https://placehold.co/600x400" alt="" class="object-fit-cover w-100">
                <div class="container mt-2">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header text-center" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                STARGAZER <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <span class="desc-text">Tipe Dan Harga Hyundai Stargazer</span>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tipe</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>New Active MT</td>
                                                <td>Rp 250.200.000</td>
                                            </tr>
                                            <tr>
                                                <td>New Active IVT</td>
                                                <td>Rp 263.000.000</td>
                                            </tr>
                                            <tr>
                                                <td>Essential MT</td>
                                                <td>Rp 261.800.000</td>
                                            </tr>
                                            <tr>
                                                <td>Essential IVT</td>
                                                <td>Rp 275.500.000</td>
                                            </tr>
                                            <tr>
                                                <td>New Prime IVT</td>
                                                <td>Rp 319.200.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w-100 text-center">
                                        <a href="#" class="">Lihat Detail Mobil <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <img src="https://placehold.co/600x400" alt="" class="object-fit-cover w-100">
                <div class="container mt-2">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header text-center" id="headingTwo">
                                <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                CRETA <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <span class="desc-text">Tipe Dan Harga Hyundai Stargazer</span>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tipe</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Active MT</td>
                                                <td>Rp 294.300.000</td>
                                            </tr>
                                            <tr>
                                                <td>Trend MT</td>
                                                <td>Rp 316.000.000</td>
                                            </tr>
                                            <tr>
                                                <td>Trend IVT</td>
                                                <td>Rp 336.500.000</td>
                                            </tr>
                                            <tr>
                                                <td>Style IVT</td>
                                                <td>Rp 379.000.000</td>
                                            </tr>
                                            <tr>
                                                <td>Prime IVT</td>
                                                <td>Rp 411.300.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w-100">
                                        <p class="text-start">*Additional Rp 3.000.000 untuk warna two-tone</p>
                                        <!-- <a href="#">Lihat Detail Mobil <i class="fa-solid fa-arrow-right-long"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <div class="whatsapp-kami text-center">
            <a href="wa.me/6289504910753"><i class="fa-brands fa-whatsapp"></i> Konsultasi Pembelian</a>
        </div>
    </div>
</section>
<?php $this->endSection() ?>