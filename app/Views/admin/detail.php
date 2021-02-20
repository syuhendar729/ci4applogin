<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">User List</h1>
	<div class="card mb-3" style="max-width: 540px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('/img/' . $user->user_image); ?>" class="card-img" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<h4 class="list-group-item"><?= $user->username; ?></h4>
						<?php if ($user->fullname) : ?>
							<li class="list-group-item"><?= $user->fullname; ?></li>
						<?php endif; ?>
						<li class="list-group-item"><?= $user->email; ?></li>
						<li class="list-group-item"><?= $user->userid; ?></li>
						<li class="list-group-item"><span class="badge badge-success"><?= $user->name; ?></span></li>
						<li class="list-group-item">
							<small><a href="<?= base_url('/admin'); ?>">&laquo; back to user list</a></small>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-danger" data-toggle="modal" data-target="#confirm">Delete user</button>
</div>
<!-- /.container-fluid -->
<div class="modal" tabindex="-1" id="confirm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Confirm</h5>
				<button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete it?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<form action="/admin/delete/<?= $user->userid; ?>" method="post" class="d-inline">
					<?= csrf_field(); ?>
					<input type="hidden" name="_method" value="DELETE">
					<button class="btn btn-danger">Yes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>