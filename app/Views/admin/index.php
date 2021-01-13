<?=$this->extend('templates/index');?>
<?=$this->section('page-content');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">No.</th>
	      <th scope="col">Username</th>
	      <th scope="col">Email</th>
	      <th scope="col">Role</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i = 1;?>
	  	<?php foreach ($users as $usr): ?>
	    <tr>
	      <th scope="row"><?=$i++;?></th>
	      <td><?=$usr->username;?></td>
	      <td><?=$usr->email;?></td>
	      <td><?=$usr->name;?></td>
	      <td>
	      	<a href="<?=base_url('/admin/' . $usr->userid);?>" class="btn btn-info">Detail</a>
	      </td>
	    </tr>
		<?php endforeach;?>
	  </tbody>
	</table>

</div>
<!-- /.container-fluid -->
<?=$this->endSection();?>