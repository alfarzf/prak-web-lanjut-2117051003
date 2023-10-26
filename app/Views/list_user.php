<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class=''>
<a href="<?= base_url('/user/create') ?>" class='btn btn-info'>Tambah Data</a>
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
                    <td><a href="<?= base_url('user/'.$user['id']) ?>" class="btn btn-info">Detail</a> 
                    <a href="<?= base_url('user/'.$user['id']. '/edit') ?>" class="btn btn-info">Edit</a> 
                        <form action="<?= base_url('user/' . $user['id']) ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type='submit' class="btn btn-warning">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }?>
        </tbody>
    </table>
    
</div>
<?= $this->endSection() ?>