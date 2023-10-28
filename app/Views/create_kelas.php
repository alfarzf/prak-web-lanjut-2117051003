<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class='center'>
    <div class="">
        <h3>Create Kelas</h3>
        <form action="<?= base_url('/kelas/store');?>" method="POST" enctype="multipart/form-data">
            <!-- <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control"> -->
            <label for="nama_kelas" class="form-label">Nama Kelas : </label>
            <input type="text" name="nama_kelas" class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>" value='<?= old('nama_kelas');?>'>
            <div class='invalid-feedback'><?= validation_show_error('nama_kelas'); ?></div><br>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>
<?= $this->endSection() ?>