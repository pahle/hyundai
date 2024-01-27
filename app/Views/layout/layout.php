<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Promo Hyundai Jogja merupakan website yang menyediakan informasi mengenai promo mobil Hyundai di Jogja.">
    <meta name="keywords" content="Hyundai, Mobil, Mobil Listrik, Promo, Harga Mobil, Mobil Terbaik, Yogyakarta">
    <title>Promo Hyundai Jogja</title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Style CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7a0040fe07.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?= $this->include('layout/navbar'); ?>

    <div>
        <!-- Header Title -->

        <div class="dynamic-container">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>

    <a href="https://wa.me/6281392666867" class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <?= $this->include('layout/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>