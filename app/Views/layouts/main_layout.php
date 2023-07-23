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

    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css') ?>">
    <script src="<?= base_url('assets/datatables/jquery.min.js') ?>"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

</head>
<body>

    <!-- user bar -->
    <?php if(session()->has('id')): ?>
        <?= $this->include('layouts/user_bar') ?>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

    <!-- bootstrap js -->
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>

    <!-- datatables -->
    <script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>

    <!-- app.js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>