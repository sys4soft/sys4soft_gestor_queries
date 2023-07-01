<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;700&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">

    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

</head>
<body>

    <?= $this->renderSection('content') ?>

    <!-- bootstrap js -->
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>

    <!-- app.js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>