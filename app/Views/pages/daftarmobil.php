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
            <?php foreach ($mobil as $m) : ?>

                <div class="col-12 col-xl-6">
                    <img src="/img/<?= $m['gambar'] ?>" alt="" class="daftar-mobil-grid">
                    <table class="table">
                        <thead>
                            <th><?= $m['nama'] ?></th>
                            <th class="text-end">Rp. <?= number_format($m['harga'], 0, ',', '.') ?></th>
                        </thead>
                        <tbody class="table-group-divider">

                            <?php foreach ($type as $t) : ?>

                                <?php if ($t['id_mobil'] == $m['id']) : ?>
                                    <tr>
                                        <td><?= $t['nama'] ?></td>
                                        <td class="text-end">Rp. <?= number_format($t['harga'], 0, ',', '.') ?></td>
                                    </tr>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="table-group-divider" colspan="2"></td>
                            </tr>
                            <?php foreach ($information as $i) : ?>

                                <?php if ($i['id_mobil'] == $m['id']) : ?>

                                    <tr>
                                        <td><?= $i['information'] ?></td>
                                    </tr>

                                <?php endif; ?>

                            <?php endforeach; ?>
                        </tfoot>
                    </table>
                </div>

            <?php endforeach; ?>
        </div>
</section>

<?php $this->endSection() ?>