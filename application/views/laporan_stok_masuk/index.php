	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Laporan</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Laporan</a></li>
								<li class="breadcrumb-item active" aria-current="page">Stok Masuk</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-10">
					<form action="<?= base_url('Laporan_stok_masuk'); ?>" method="POST">
						<div class="row col-md-12">
							<div class="col-sm-8"><label><b>Periode</b></label></div>
						</div>
						<div class="row col-md-12">
							<div class="col-md-2">
								<input type="text" id="tanggalawal" name="tanggalawal" autocomplete="off" class="form-control" value="<?= $tanggalawal ?>">
							</div>
							<div class="col-md-1">
								<input type="text" readonly placeholder="S/D" class="form-control">
							</div>
							<div class="col-md-2">
								<input type="text" id="tanggalakhir" name="tanggalakhir" autocomplete="off" class="form-control" value="<?= $tanggalakhir ?>">
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-success">Tampilkan</button>
								<a href="<?= base_url('Laporan_stok_masuk/cetak?tglawal=') . $tanggalawal . '&tglakhir=' . $tanggalakhir; ?>" name="cetak" class="btn btn-danger btn-col-1" target="_blank" role="button" aria-disabled="true"><i class="icon-copy dw dw-print"></i> Cetak</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="card-box mb-30">
				<div class="pd-20">
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
		</div>
		<!-- Simple Datatable End -->
	</div>

	<?php $this->load->view('templates/footer'); ?>
	<script>
		$(document).ready(function() {
			$('#tanggalawal').datetimepicker({
				format: 'Y-m-d',
				timepicker: false
			});
		});
		$(document).ready(function() {
			$('#tanggalakhir').datetimepicker({
				format: 'Y-m-d',
				timepicker: false
			});
		});
	</script>