<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class='center'>
    <div class="">
        <h3>Edit Kelas</h3>
        <form action="<?= base_url('/kelas/' . $kelas['id']);?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <!-- <label for="nama_kelas" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control"> -->
            <input type="hidden" name="_method" value='PUT'>
            <label for="nama_kelas" class="form-label">Nama Kelas : </label>
            <input type="text" name="nama_kelas" class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>" value='<?= $kelas['nama_kelas'];?>'>
            <div class='invalid-feedback'><?= validation_show_error('nama_kelas'); ?></div><br>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>
<?= $this->endSection() ?>