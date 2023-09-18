<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('./css/style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="center">
        Create User
        <form action="<?= base_url('/user/store')?>" method="POST">
            <!-- <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control"> -->
            <label for="nama" class="form-label">Nama : </label>
            <input type="text" name="nama" class="form-control"><br>
            <label for="npm" class="form-label">NPM : </label>
            <input type="text" name="npm" class="form-control"><br>
            <label for="kelas" class="form-label">Kelas : </label>
            <input type="text" name="kelas" class="form-control"><br>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>