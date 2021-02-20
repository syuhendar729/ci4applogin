<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!--  -->

<?php #$user->user_image;
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <?php if (session()->getFlashData('pesanEdit')) : ?>
        <div class="alert alert-<?= session()->getFlashData('alert'); ?>" role="alert">
            <?= session()->getFlashData('pesanEdit'); ?>
        </div>
    <?php endif; ?>
    <h1 class="h3 mb-4 text-gray-800">Edit profile</h1>
    <div class="row no-gutters">
        <form action="/user/update/<?= $user->id; ?>" method="post" class="mt-3" enctype="multipart/form-data">
            <input type="hidden" name="imageLama" value="<?= $user->user_image; ?>">
            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= (old('username')) ? old('username') : $user->username; ?>" id="username">
                </div>
                <br><br><br>
                <div class="col-sm-10">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= (old('email')) ? old('email') : $user->email; ?>" id="email">
                </div>
                <br><br><br>
                <div class="col-sm-10">
                    <label for="fullname">Fullname :</label>
                    <input type="fullname" class="form-control form-control-user <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="fullname" value="<?= (old('fullname')) ? old('fullname') : $user->fullname; ?>" id="fullname">
                </div>
                <br><br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <label>Photo Profile :</label>
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="image" onchange="previewImg()">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            </div>
                            <label class="custom-file-label" for="image"><?= $user->user_image; ?></label>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4">
                        <img src="/img/<?= $user->user_image; ?>" class="img-thumbnail img-preview card-img">
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" style="width: 150px;" disabled>Edit</button>
                    </div>
                </div>

            </div>
        </form>
        </ul>
    </div>
</div>


<?= $this->endSection(); ?>