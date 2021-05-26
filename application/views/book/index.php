<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/css.css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	</head>
	<body>
		<!-- Modal HTML -->
		<div class="container" style="margin-top: 5%;">
			<div class="row col-md-12 col-md-offset-2 custyle">
				<div class="col-md-12">
					<a href="<?= base_url() ?>book_category" class="btn btn-warning btn-xs pull-left">Jenis Buku</a>

					<a href="<?= base_url() ?>logout" class="btn btn-danger btn-xs pull-right" style="margin-left: 10px">Logout</a>
					<a href="<?= base_url() ?>book_create" class="btn btn-primary btn-xs pull-right"><b>+</b> Tambah Data Buku</a>
				</div>
				<table class="table table-striped custab" style="margin-top: 1%;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Foto</th>
							<th>Nama Buku</th>
							<th>Jenis Buku</th>
							<th>Penginput</th>
							<th>Tanggal Input</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<?php foreach($posts as $post) : ?>
						<tr>
							<td><?= $post->id; ?></td>
							<td>
								<?php if($post->cover != null) : ?>
									<img src="<?= base_url(); ?>pictures/<?= $post->cover; ?>" alt="Rounded image" class="img-fluid rounded shadow" width="30">
								<?php else : ?>
									<img src="<?= base_url(); ?>pictures/default_book.png" alt="Rounded image" class="img-fluid rounded shadow"width="30">
								<?php endif; ?>
							</td>
							<td><?= $post->nama_buku; ?></td>
							<td><?= $post->jenis_buku; ?></td>
							<td><?= $post->created_by; ?></td>
							<td><?= $post->created_on; ?></td>
							<td class="text-center">
								<a href="book_update/<?php echo $post->id; ?>" class='btn btn-info btn-xs'>
									<span class="glyphicon glyphicon-edit"></span> Edit
								</a> 
								<a href="book_delete/<?php echo $post->id; ?>" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-remove"></span> Del
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>

	</body>	
</html>