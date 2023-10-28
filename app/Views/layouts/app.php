<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('./css/style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body class='body'>
    <div class='fixed-top'>
        <ul class="nav justify-content-center top">
            <li class="nav-item">
                <a class="btn btn-dark" href="<?= base_url('/user') ?>">User</a>
            </li>
            <li class="nav-item left">
                <a class="btn btn-dark" href="<?= base_url('/kelas') ?>">Kelas</a>
            </li>
        </ul>
    </div>
    <?= $this->renderSection('content') ?>
</body>
</html>