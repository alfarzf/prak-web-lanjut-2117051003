<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class='center'>
    <table class='table table-warning table-striped'>
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nama</th>
                <th scope='col'>NPM</th>
                <th scope='col'>Kelas</th>
                <th scope='col'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($users as $user){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user['nama']?></td>
                    <td><?= $user['npm']?></td>
                    <td><?= $user['nama_kelas']?></td>
                    <td><button type="button" class="btn btn-info">Edit</button> <button type="button" class="btn btn-warning">Hapus</button></td>
                </tr>
            <?php
            }?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>