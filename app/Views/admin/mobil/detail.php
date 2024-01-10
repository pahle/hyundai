<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/admin/mobil/create" class="btn btn-sm btn-outline-secondary">Create</a>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan') ?>
    </div>
<?php endif; ?>
<!-- Detail Page -->
<div class="border border-1 p-5">
    <div class="row">
        <div class="col-6">
            <a href="/admin/mobil" class="text-black text-decoration-none">Back</a>
            <br><br>
            <h3 class="fw-light">Nama</h3>
            <h1><?= $mobil['nama'] ?></h1>
            <h3 class="fw-light">Harga</h3>
            <h1>Rp. <?= number_format($mobil['harga'], 0, ',', '.') ?></h1>
        </div>
        <div class="col-6">
            <img src="/img/<?= $mobil['gambar'] ?>" alt="Mobil" class="col-12">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-6">
            <h1>Type</h1>
            <table class="table">
                <thead>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($type as $t) : ?>
                        <tr>
                            <td><?= $t['nama'] ?></td>
                            <td>Rp. <?= number_format($t['harga'], 0, ',', '.') ?></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <!-- edit -->
                                    <a href="/admin/type/edit/<?= $t['id'] ?>" class="btn btn-success">Edit</a>
                                    <!-- delete -->
                                    <form action="/admin/type/<?= $t['id'] ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure want to delete this data?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            <a href="/admin/type/create/<?= $mobil['id'] ?>" class="btn btn-primary">Tambah +</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-6">
            <h1>Information</h1>
            <table class="table">
                <thead>
                    <th>Additional Information</th>
                    <th>Actions</th>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($information as $i) : ?>
                        <tr>
                            <td><?= $i['information'] ?></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <!-- edit -->
                                    <a href="/admin/information/edit/<?= $i['id'] ?>" class="btn btn-success">Edit</a>
                                    <!-- delete -->
                                    <form action="/admin/information/<?= $i['id'] ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure want to delete this data?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="/admin/information/create/<?= $mobil['id'] ?>" class="btn btn-primary">Tambah +</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>