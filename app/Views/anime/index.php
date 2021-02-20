<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- <?php d($anime); ?> -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Anime List</h1>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-<?= session()->getFlashData('alert'); ?>" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Judul</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($anime as $anm) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><img src="<?= base_url('/img/' . $anm['image']); ?>" alt="<?= $anm['image'] ?>" class="sampul"></td>
                    <td><?= $anm['judul']; ?></td>
                    <td>
                        <a href="<?= base_url('/anime/' . $anm['slug']); ?>" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <?php if (in_groups('admin')) : ?>
        <a class="btn btn-primary" href="<?= base_url('/anime/create') ?>" role="button">Add List</a>
    <?php else : ?>
        <button type="button" class="btn btn-primary" disabled>Add List</button>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>