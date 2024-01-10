<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('adminSection') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/admin/slider/create" class="btn btn-sm btn-outline-secondary">Create</a>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan') ?>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($slider as $s) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="/img/<?= $s['gambar'] ?>" alt="" width="100"></td>
                    <td><?= $s['title'] ?></td>
                    <td class="">
                        <a href="/admin/slider/edit/<?= $s['id'] ?>" class="btn btn-success">Edit</a>
                        <form action="/admin/slider/<?= $s['id'] ?>" method="POST">
                            <?= csrf_field() ?> 
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure want to delete this data?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>