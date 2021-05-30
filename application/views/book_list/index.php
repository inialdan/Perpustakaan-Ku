<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Data Buku Perpustakaan Ku</title>
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/css.css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	</head>
	<body>
		<!-- Modal HTML -->
		<div class="container" style="margin-top: 2%;">
			<div class="row">
				<div class="col-md-12">
					<center>
							<h4 class="modal-title">Data Buku Perpustakaan Ku</h4>
					</center>
				</div>
			</div>
			<br><br>
			<br>
			<div class="row col-md-12 col-md-offset-2 custyle">
				<div class="col-md-12">
					<a href="<?= base_url() ?>logout" class="btn btn-danger btn-xs pull-right">Logout</a>
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
						</tr>
					</thead>
					<?php foreach($posts as $post) : ?>
						<tr>
							<td><?= $post->id; ?></td>
							<td>
								<?php if($post->cover != null) : ?>
									<img src="<?= base_url(); ?>pictures/<?= $post->cover; ?>" alt="Rounded image" class="img-fluid rounded shadow" width="100">
								<?php else : ?>
									<img src="<?= base_url(); ?>pictures/default_book.png" alt="Rounded image" class="img-fluid rounded shadow"width="100">
								<?php endif; ?>
							</td>
							<td><?= $post->nama_buku; ?></td>
							<td><?= $post->jenis; ?></td>
							<td><?= $post->created_by; ?></td>
							<td><?= $post->created_on; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>

	</body>	
</html>