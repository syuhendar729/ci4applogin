<?=$this->extend('templates/index');?>
<?=$this->section('page-content');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My profile</h1>
    <div class="row no-gutters">
	    <div class="col-md-4">
	      <img src="<?=base_url('/img/' . user()->user_image);?>" class="card-img" alt="...">
	    </div>
	    <div class="col-md-8">
	      <div class="card-body">
	        <ul class="list-group list-group-flush">
			    <h4 class="list-group-item"><?=user()->username;?></h4>
		    <?php if (user()->fullname): ?>
			    <li class="list-group-item"><?=user()->fullname;?></li>
			<?php endif;?>
			    <li class="list-group-item"><?=user()->email;?></li>
			    <li class="list-group-item"><span class="badge badge-success"><?=user()->name;?></span></li>
			</ul>
	      </div>
	    </div>
	</div>
</div>
<!-- /.container-fluid -->
<?=$this->endSection();?>