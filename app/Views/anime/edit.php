<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-danger" href="/anime/<?= $anime['slug']; ?>">Cancel</a>
            <h2 class="mx-auto" style="width: 200px;">Edit Data</h2>
            <form action="/anime/update/<?= $anime['id']; ?>" method="post" class="mt-3" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $anime['slug']; ?>">
                <input type="hidden" name="imageLama" value="<?= $anime['image']; ?>">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" placeholder="Masukkan judul!" autofocus="" value="<?= (old('judul')) ? old('judul') : $anime['judul']; ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rating" class="col-sm-2 col-form-label">Rating :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('rating')) ? 'is-invalid' : ''; ?>" id="rating" name="rating" placeholder="1.0" step="0.01" min="0" max="10" value="<?= (old('rating')) ? old('rating') : $anime['rating']; ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('rating'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="genre" class="col-sm-2 col-form-label">Genre :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : ''; ?>" id="genre" name="genre" placeholder="Masukkan genre!" value="<?= (old('genre')) ? old('genre') : $anime['genre']; ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('genre'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image :</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $anime['image']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" onchange="previewImg()">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('image'); ?>
                            </div>
                            <label class="custom-file-label" for="image"><?= $anime['image']; ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sinopsis" class="col-form-label">Sinopsis :</label>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $validation->getError('sinopsis'); ?>
                    </div>
                    <textarea type="text" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : ''; ?>" rows="6" id="sinopsis" name="sinopsis"><?= (old('sinopsis')) ? old('sinopsis') : $anime['sinopsis']; ?></textarea>
                </div>
                <div class="form-group row mt-5">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" style="width: 150px;">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>