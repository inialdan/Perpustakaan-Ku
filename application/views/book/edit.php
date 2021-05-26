<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/css.css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
		body {
			font-family: 'Varela Round', sans-serif;
		}
		.modal-login {
			color: #636363;
			width: 350px;
		}
		.modal-login .modal-content {
			padding: 20px;
			border-radius: 5px;
			border: none;
		}
		.modal-login .modal-header {
			border-bottom: none;
			position: relative;
			justify-content: center;
		}
		.modal-login h4 {
			text-align: center;
			font-size: 26px;
		}
		.modal-login  .form-group {
			position: relative;
		}
		.modal-login i {
			position: absolute;
			left: 13px;
			top: 11px;
			font-size: 18px;
		}
		.modal-login .form-control {
			padding-left: 40px;
		}
		.modal-login .form-control:focus {
			border-color: #00ce81;
		}
		.modal-login .form-control, .modal-login .btn {
			min-height: 40px;
			border-radius: 3px; 
		}
		.modal-login .hint-text {
			text-align: center;
			padding-top: 10px;
		}
		.modal-login .close {
			position: absolute;
			top: -5px;
			right: -5px;
		}
		.modal-login .btn, .modal-login .btn:active {	
			border: none;
			background: #00ce81 !important;
			line-height: normal;
		}
		.modal-login .btn:hover, .modal-login .btn:focus {
			background: #00bf78 !important;
		}
		.modal-login .modal-footer {
			background: #ecf0f1;
			border-color: #dee4e7;
			text-align: center;
			margin: 0 -20px -20px;
			border-radius: 5px;
			font-size: 13px;
			justify-content: center;
		}
		.modal-login .modal-footer a {
			color: #999;
		}
		.trigger-btn {
			display: inline-block;
			margin: 100px auto;
		}
		</style>

	</head>
	<body>
		<!-- Modal HTML -->
		<div>
			<div class="modal-dialog modal-login" style="margin-top: 10%">
				<div class="modal-content">
					<div class="modal-header">				
						<h4 class="modal-title">Input Data Buku</h4>
					</div>
					<div class="modal-body">
						<form action="<?= base_url() ?>/book_update_data" role="form" method="post" enctype="multipart/form-data">
							<input value="<?= $book->id; ?>" type="hidden" name="id">
							<input value="<?= $book->cover; ?>" type="hidden" name="old_cover">
							<div class="form-group">
								<center>
									<?php if($book->cover != null) : ?>
										<img src="<?= base_url(); ?>pictures/<?= $book->cover; ?>" alt="Rounded image" class="img-fluid rounded shadow" width="125">
									<?php else : ?>
										<img src="<?= base_url(); ?>pictures/default_book.png" alt="Rounded image" class="img-fluid rounded shadow"width="125">
									<?php endif; ?>
								</center>
							</div>
							<div class="form-group">
								<i class="fa fa-book"></i>
								<input type="text" class="form-control" name="nama_buku" placeholder="Nama Buku" value="<?= $book->nama_buku ?>" required="required">
							</div>
							<div class="form-group">
								<i class="fa fa-list"></i>
								<input type="text" class="form-control" name="jenis_buku" placeholder="Jenis Buku" value="<?= $book->jenis_buku ?>" required="required">					
							</div>
							<div class="form-group">
								<label for="customFile">Pilih Gambar :</label>
								<input type="file" id="customFile" name="new_cover" accept="image/x-png,image/gif,image/jpeg">
							</div>
							<div class="form-group">
								<input type="submit" name="book_create" class="btn btn-primary btn-block btn-lg" value="Simpan">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="<?= base_url() ?>book">Lihat Data</a>
					</div>
				</div>
			</div>
		</div>   

	</body>	
</html>