<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class='center'>
        <div class="">
                <div class='center1'>
                        <img class ='img' src="<?= $user['foto'] ?? 'https://e7.pngegg.com/pngimages/8/232/png-clipart-computer-icons-man-avatar-male-login-man-people-monochrome.png' ?>" alt="Ini Gambar" height=165px width=165px>
                </div>
                <div class='center1'>
                        <div class='p'><?= $user['nama'] ?></div>
                        <div class='p'><?= $user['npm'] ?></div>
                        <div class='p'><?= $user['nama_kelas'] ?></div>
                </div>
        </div>
</div>
<?= $this->endSection() ?>