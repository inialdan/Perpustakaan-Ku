<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Data Jenis Buku</title>
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/css.css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	</head>
	<body>
		<!-- Modal HTML -->
		<div class="container" style="margin-top: 3%;">
			<div class="row">
				<div class="col-md-12">
					<center>
							<h4 class="modal-title">Data Jenis Buku Perpustakaan Ku</h4>
					</center>
				</div>
			</div>
			<br><br>
			<div class="row col-md-12 col-md-offset-2 custyle">
				<div class="col-md-12">
					<a href="<?= base_url() ?>book" class="btn btn-warning btn-xs pull-left">Data Buku</a>
					<a href="<?= base_url() ?>book_category_create" class="btn btn-primary btn-xs pull-right"><b>+</b> Tambah Jenis Buku</a>
				</div>
				<table class="table table-striped custab" style="margin-top: 1%;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Jenis Buku</th>
							<th>Penginput</th>
							<th>Tanggal Input</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<?php foreach($posts as $post) : ?>
						<tr>
							<td><?= $post->id; ?></td>
							<td><?= $post->jenis; ?></td>
							<td><?= $post->created_by; ?></td>
							<td><?= $post->created_on; ?></td>
							<td class="text-center">
								<a href="book_category_update/<?php echo $post->id; ?>" class='btn btn-info btn-xs'>
									<span class="glyphicon glyphicon-edit"></span> Edit
								</a> 
								<a href="book_category_delete/<?php echo $post->id; ?>" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-remove"></span> Del
								</a>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>

	</body>	
</html>