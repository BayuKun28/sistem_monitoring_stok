	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Pengguna</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Pengaturan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Pengguna</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modaltambah" type="button">Tambah</a>

					<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myLargeModalLabel">Tambah Pengguna</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<form id="addpengguna" action="<?= base_url('Auth/validasi'); ?>"  method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label>Nama</label>
											<input id="nama" name="nama" class="form-control" type="text" required>
										</div>
										<div class="form-group">
											<label>Username</label>
											<input id="username" name="username" class="form-control" type="text" required>
										</div>
										<div class="form-group">
											<label>Hak Akses</label>
											<select class="form-control" name="role" id="role" required>
												<option class="form-control" value="1">Admin</option>
												<option class="form-control" value="2">Pimpinan</option>
											</select>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input id="password" name="password" class="form-control" type="password" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button id="btn-tambah" role="status" name="btn-tambah" type="submit" class="btn btn-primary">Tambah</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Hak Akses</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($pengguna as $s) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $s['nama']; ?></td>
									<td><?= $s['username']; ?></td>
									<td><?php
									if ($s['role'] == 1 ) {
										echo "Admin";
									}else{
										echo "Pimpinan";
									} ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="#" name="editpengguna" id="editpengguna" class="dropdown-item" data-toggle="modal" data-target="#modaledit" data-idedit="<?= $s['id']; ?>" data-namaedit="<?= $s['nama']; ?>"
													data-usernameedit="<?= $s['username']; ?>" data-roleedit="<?= $s['role']; ?>" ><i class="dw dw-edit2"></i> Edit</a>
													<a data-kode="<?= $s['id']; ?>" href='javascript:void(0)' class="del dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
			<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Edit Pengguna</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<form action="<?= base_url('Auth/edit') ?>"  method="POST">
							<div class="modal-body">
								<div class="form-group">
									<input id="idedit" name="idedit" class="form-control" type="hidden" required>
									<label>Nama</label>
									<input id="namaedit" name="namaedit" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input id="usernameedit" name="usernameedit" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Hak Akses</label>
									<select class="form-control" name="roleedit" id="roleedit" required>
										<option class="form-control" value="1">Admin</option>
										<option class="form-control" value="2">Pimpinan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input id="passwordedit" name="passwordedit" class="form-control" type="password" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<?php $this->load->view('templates/footer'); ?>

			<script type="text/javascript">

				$(document).ready(function(){
					$("#addpengguna").submit(function(e) {
						e.preventDefault()
						$.ajax({
							url: $(this).attr('action'),
							type: $(this).attr('method'),
							dataType: 'json',
							data: $(this).serialize(),
							beforeSend: function() {
								$("#btn-tambah").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>')
							},
							complete: function() {
								$("#btn-tambah").html('Tambah')
							},
							success: function(res) {
								if (res.status) {
									$("#modaltambah").modal("toggle")
									console.log(res);
									Swal.fire({
										position: 'center',
										icon: 'success',
										title: res.msg,
										showConfirmButton: false,
										timer: 1000
									})
									setTimeout(function() {
										location.reload();
									}, 1000);
								} else {
									$.each(res.errors, function(key, value) {
										$('[name="' + key + '"]').addClass('is-invalid')
										$('[name="' + key + '"]').next().text(value)
									})
								}
							}
						})

						$("#addpengguna input").on('keyup', function() {
							$(this).removeClass('is-valid is-invalid')
						})

					})
				});
				$(document).ready(function() {
					$(document).on('click', '#editpengguna', function() {
						var idedit = $(this).data('idedit');
						var namaedit = $(this).data('namaedit');
						var usernameedit = $(this).data('usernameedit');
						var roleedit = $(this).data('roleedit');
						$('#idedit').val(idedit);
						$('#namaedit').val(namaedit);
						$('#usernameedit').val(usernameedit);
						$('#roleedit').val(roleedit);
					})
				})

				$(document).on('click', '.del', function(event) {
					event.preventDefault();
					let kode = $(this).attr('data-kode');
					let delete_url = "<?= base_url(); ?>/Auth/delete/" + kode;

					Swal.fire({
						title: 'Hapus Data',
						text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Hapus',
						cancelButtonText: 'Batal'
					}).then(async (result) => {
						if (result.value) {
							window.location.href = delete_url;
						}
					});
				});

			</script>

			<?php
			if (!empty($this->session->flashdata('message'))) {
				$pesan = $this->session->flashdata('message');
				if ($pesan == "Berhasil Ditambah") {
					$script = "
					<script>
					Swal.fire({
						icon: 'success',
						title: 'Data',
						text: 'Data Berhasil Ditambah'
						}) 
						</script>
						";
					} elseif ($pesan == "Berhasil Dihapus") {
        // die($pesan);
						$script = "
						<script>
						Swal.fire({
							icon: 'success',
							title: 'Data',
							text: 'Berhasil Dihapus'
							}) 
							</script>
							";
						} elseif ($pesan == "Berhasil Di Update") {
        // die($pesan);
							$script = "
							<script>
							Swal.fire({
								icon: 'success',
								title: 'Data',
								text: 'Berhasil Di Update'
								}) 
								</script>
								";
							} else {
								$script =
								"
								<script>
								Swal.fire({
									icon: 'error',
									title: 'Data',
									text: 'Gagal'
									}) 

									</script>
									";
								}
							} else {
								$script = "";
							}
							echo $script;
							?>
