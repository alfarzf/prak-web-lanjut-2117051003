<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
    <div class="center">
        <h3>Create User</h3>
        <form action="<?= base_url('/user/store');?>" method="POST">
            <!-- <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control"> -->
            <label for="nama" class="form-label">Nama : </label>
            <input type="text" name="nama" class="form-control <?= (empty(validation_show_error('nama'))) ? '' : 'is-invalid' ?>" value='<?= old('nama');?>'>
            <div class='invalid-feedback'><?= validation_show_error('nama'); ?></div>
            <label for="npm" class="form-label">NPM : </label>
            <input type="text" name="npm" class="form-control <?= (empty(validation_show_error('npm'))) ? '' : 'is-invalid' ?>" value='<?= old('npm');?>'>
            <div class='invalid-feedback'><?= validation_show_error('npm'); ?></div>
            <label for="kelas" class="form-label">Kelas : </label>
            <!-- <input type="text" name="kelas" class="form-control"><br> -->
            <select name="kelas" id="kelas" class="form-select <?= (empty(validation_show_error('kelas'))) ? '' : 'is-invalid' ?>">
                <option selected hidden value="<?= old('kelas');?>">Pilih Kelas</option>
                <?php foreach($kelas as $item){
                    ?>
                    <option value="<?= $item['id']?>">
                        <?= $item['nama_kelas']?>
                    </option>
                <?php
                }?>
            </select>
            <div class='invalid-feedback'><?= validation_show_error('kelas'); ?></div><br>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
<?= $this->endSection() ?>