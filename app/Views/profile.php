<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class="center">
        <img class ='img' src="https://cdn.discordapp.com/attachments/857891537986781186/1129757556336754688/961783.jpg" alt="Ini Gambar" height=175px width=175px>
        <br><p class="p"><?= $nama ?></p>
        <p class="p"><?= $npm ?></p>
        <p class="p"><?= $kelas ?></p>
</div>
<?= $this->endSection() ?>