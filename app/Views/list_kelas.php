<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class='center'>
<div class=''>
<a href="<?= base_url('/kelas/create') ?>" class='btn btn-info'>Tambah Data</a>
    <table class='table table-warning table-striped'>
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nama Kelas</th>
                <th scope='col'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($kelas as $k){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['nama_kelas']?></td>
                    <td><a href="<?= base_url('kelas/'.$k['id']. '/edit') ?>" class="btn btn-warning">Edit</a> 
                        <form action="<?= base_url('kelas/' . $k['id']) ?>" method="post" style="display:inline-block;">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type='submit' class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }?>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>