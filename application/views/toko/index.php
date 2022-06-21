	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Pengaturan</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Pengaturan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Toko</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<div class="profile-photo">
							<a href="#" name="edit" id="edit" data-toggle="modal" data-target="#modaledit" data-idedit="<?= $detail['id']; ?>" 
							data-nama_toko="<?= $detail['nama_toko']; ?>" data-alamat="<?= $detail['alamat']; ?>"
							class="edit-avatar"><i class="fa fa-pencil"></i></a>
							<img src="<?= base_url('assets/toko.png');  ?>" alt="" class="avatar-photo">
						</div>
						<h5 class="text-center h5 mb-0"><?= $detail['nama_toko']; ?></h5>
						<p class="text-center text-muted font-14"><?= $detail['alamat']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bs-example-modal" id="modaledit"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Profil Toko</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="<?= base_url('Toko/simpan') ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Toko</label>
						<input type="hidden" id="idedit" name="idedit" class="form-control">
						<input type="text" id="nama_toko" name="nama_toko" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" id="alamat" required></textarea>
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

<script>
	
	$(document).ready(function() {
        $(document).on('click', '#edit', function() {
            var idedit = $(this).data('idedit');
            var nama_toko = $(this).data('nama_toko');
            var alamat = $(this).data('alamat');

            $('#idedit').val(idedit);
            $('#nama_toko').val(nama_toko);
            $('#alamat').val(alamat);

        })
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
