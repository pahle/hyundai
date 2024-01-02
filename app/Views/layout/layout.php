<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Style CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7a0040fe07.js" crossorigin="anonymous"></script>
</head>

<body>
    <?= $this->include('layout/navbar'); ?>

    <div>
        <?= $this->renderSection('content'); ?>
    </div>
    
    <a href="https://wa.me/1234567890" class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
    <i class="fa-brands fa-whatsapp"></i>
    </a>

    <?= $this->include('layout/footer'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>