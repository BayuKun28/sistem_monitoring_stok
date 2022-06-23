	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Stok Keluar</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Stok</a></li>
								<li class="breadcrumb-item active" aria-current="page">Stok Keluar</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modaltambah" type="button">Tambah</a>

					<div class="modal fade" id="modaltambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myLargeModalLabel">Tambah Stok Keluar</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<form action="<?= base_url('Stok_keluar/tambah') ?>"  method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label>Tanggal</label>
											<input id="tanggal" name="tanggal" class="form-control datetimepicker" type="text" autocomplete="off" required>
										</div>
										<div class="form-group">
											<label>Kode Barang</label>
											<select class="form-control itemKodebarang" id="kode_barang" name="kode_barang" required>
											</select>
										</div>
										<div class="form-group">
											<label>Jumlah</label>
											<input type="number" class="form-control" name="jumlah" id="jumlah" autocomplete="off" required>
										</div>
										<div class="form-group">
											<label>Keterangan</label>
											<select class="form-control" id="keterangan" name="keterangan" required>
												<option value="Rusak">Rusak</option>
												<option value="Terjual">Terjual</option>
												<option value="Lainnya">Lainnya</option>
											</select>
										</div>
										<div class="form-group">
											<label>Vendor</label>
											<select class="form-control itemVendor" id="vendor" name="vendor" required>
											</select>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Tambah</button>
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
								<th>Tanggal</th>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Jumlah</th>
								<th>Vendor</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($stok as $s) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $s['tanggal']; ?></td>
									<td><?= $s['kode_barang']; ?></td>
									<td><?= $s['nama_barang']; ?></td>
									<td><?= $s['jumlah']; ?></td>
									<td><?= $s['nama_vendor']; ?></td>
									<td><?= $s['keterangan']; ?></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->
		</div>

		<?php $this->load->view('templates/footer'); ?>

		<script type="text/javascript">


			$('.itemKodebarang').select2({
				width: '100%',
				ajax: {
					url: "<?= base_url(); ?>/Stok_masuk/getkodebarang",
					dataType: "json",
					delay: 250,
					data: function(params) {
						return {
							kod: params.term
						};
					},
					processResults: function(data) {
						var results = [];
						$.each(data, function(index, item) {
							results.push({
								id: item.kode_barang,
								text: item.kode_barang
							});
						});
						return {
							results: results
						}
					}
				}
			});

			$('.itemVendor').select2({
				width: '100%',
				ajax: {
					url: "<?= base_url(); ?>/Stok_masuk/getvendor",
					dataType: "json",
					delay: 250,
					data: function(params) {
						return {
							ven: params.term
						};
					},
					processResults: function(data) {
						var results = [];
						$.each(data, function(index, item) {
							results.push({
								id: item.id,
								text: item.nama_vendor
							});
						});
						return {
							results: results
						}
					}
				}
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
