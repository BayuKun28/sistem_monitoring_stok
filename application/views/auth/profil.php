	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Profil</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Pengguna</a></li>
								<li class="breadcrumb-item active" aria-current="page">Profil</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
				</div>
				<div class="pb-20">
					<form class="col-sm-12" action="<?= base_url('Auth/simpanprofil') ?>"  method="POST">
						<div class="form-group">
							<label>Nama</label>
							<input class="form-control" type="hidden" name="idedit" id="idedit" value="<?= $profil['id']; ?>" required>
							<input id="nama" name="nama" class="form-control" type="text" value="<?= $profil['nama']; ?>" required>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input id="username" name="username" class="form-control" type="text" value="<?= $profil['username']; ?>" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input id="password" name="password" class="form-control" type="password" required>
						</div>
						<div class="form-group">
							<label>Hak Akses /Role</label>
							<select id="role" name="role" class="form-control" required>
								<option value="1">Admin</option>
								<option value="2">Pimpinan</option>
							</select>
						</div>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
			<!-- Simple Datatable End -->
		</div>

		<?php $this->load->view('templates/footer'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
					var role = <?= $profil['role']; ?>;
					$('#role').val(role);
			})
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
