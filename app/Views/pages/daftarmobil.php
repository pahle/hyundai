<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>
<div class="text-center my-5">
    <h1 class="header">
        Daftar Mobil
    </h1>
</div>

<section class="container my-5 daftar-mobil">
    <div class="grid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <img src="https://placehold.co/600x400" alt="" class="object-fit-cover w-100">
                <table class="table">
                    <thead>
                        <th>Creta</th>
                        <th class="text-end">Rp 300.000.000</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <td>New Active MT</td>
                            <td class="text-end">Rp. 250.000.000</td>
                        </tr>
                        <tr>
                            <td>New Active AT</td>
                            <td class="text-end">Rp. 260.000.000</td>
                        </tr>
                        <tr>
                            <td>New Elite AT</td>
                            <td class="text-end">Rp. 275.000.000</td>
                        </tr>
                        <tr>
                            <td>New Limited AT</td>
                            <td class="text-end">Rp. 300.000.000</td>
                        </tr>
                    </tbody>
                    <!-- <tbody class="table-group-divider">
                        <tr>
                            <td>*Additional Rp 3.000.000 untuk warna two-tone</td>
                        </tr>
                        <tr>
                            <td>*Additional Rp 1.500.000 untuk Warna two tone (Prime, New Prime, X)</td>
                        </tr>
                        <tr>
                            <td>*Additional Rp 3.500.000 untuk Warna Gold Matte & White Matte</td>
                        </tr>
                    </tbody> -->
                    <tfoot class="table-group-divider">
                        <tr>
                            <td colspan="2">
                                *Additional Rp 1.000.000 untuk Captain Seat (Essential, Prime, New Prime, X)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                *Additional Rp 1.500.000 untuk Warna two tone (Prime, New Prime, X)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                *Additional Rp 3.500.000 untuk Warna Gold Matte & White Matte
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
</section>

<?php $this->endSection() ?>