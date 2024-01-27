<?php $this->extend('layout/layout') ?>

<?php $this->section('content') ?>

<div class="text-center my-5">
    <h1 class="header">
        Daftar Harga Promo
    </h1>
</div>

<section class="container my-5 daftar-mobil">
    <div class="accordion" id="accordionExample">
        <?php
        $x = 1;
        foreach ($mobil as $m) :
        ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $x ?>" aria-expanded="false" aria-controls="collapse<?= $x ?>">
                        <?= $m['nama'] ?>
                    </button>
                </h2>
                <div id="collapse<?= $x ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="position-relative">
                            <img src="/img/<?= $m['gambar'] ?>" alt="" class="daftar-mobil-grid">
                            <!-- absolute price bottom right of the img -->
                            <div class="position-absolute bottom-0 end-0 p-3 fs-3 text-white rounded promo-price">Rp. <?= number_format($m['harga'], 0, ',', '.') ?></div>
                            <div class="position-absolute top-0 start-0 p-3 fs-3 fw-bold rounded"><?= $m['nama'] ?></div>

                        </div>
                        <table class="table mt-3">
                            <tbody class="table-group-divider">

                                <?php foreach ($type as $t) : ?>

                                    <?php if ($t['id_mobil'] == $m['id']) : ?>
                                        <tr>
                                            <td class="fs-5"><?= $t['nama'] ?></td>
                                            <td class="text-end fs-5">Rp. <?= number_format($t['harga'], 0, ',', '.') ?></td>
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
                </div>
            </div>
        <?php
            $x++;
        endforeach;
        ?>
</section>

<?php $this->endSection() ?>