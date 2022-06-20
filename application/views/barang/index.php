	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Barang</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Barang</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modaltambah" type="button">Tambah</a>

					<div class="modal fade bs-example-modal-lg" id="modaltambah"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<form action="<?= base_url('Barang/tambah') ?>" method="POST" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Kode Barang</label>
													<input type="text" id="kode_barang" name="kode_barang" class="form-control" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Nama Barang</label>
													<input type="text" id="nama_barang" name="nama_barang" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Kategori Barang</label>
													<select class="form-control itemKategori" id="kategori" name="kategori" required>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Satuan Barang</label>
													<select class="form-control itemSatuan" id="satuan" name="satuan" required>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Harga</label>
													<input type="number" id="harga" name="harga" class="form-control" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Stok</label>
													<input type="number" id="stok" name="stok" class="form-control" value="0" readonly="true">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Gambar</label>
													<input type="file" id="file" name="file" accept=".jpg, .png" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Deskripsi / Keterangan</label>
													<textarea class="form-control" name="keterangan" id="keterangan" cols="20" rows="2" placeholder="Ketik Keterangan" required></textarea>
												</div>
											</div>
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
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Kategori</th>
								<th>Satuan</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Gambar</th>
								<th>Keterangan</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($barang as $s) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $s['kode_barang']; ?></td>
									<td><?= $s['nama_barang']; ?></td>
									<td><?= $s['nama_kategori']; ?></td>
									<td><?= $s['nama_satuan']; ?></td>
									<td><?= number_format($s['harga']);  ?></td>
									<td><?= $s['stok']; ?></td>
									<td> <img src="<?= base_url('upload/barang/'). $s['gambar']; ?> " width="72px" height="72px"> </td>
									<td><?= $s['keterangan']; ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="#" name="editbarang" id="editbarang" class="dropdown-item" data-toggle="modal" data-target="#modaledit" data-idedit="<?= $s['id']; ?>"
													data-kode_barangedit="<?= $s['kode_barang']; ?>"
													data-nama_barangedit="<?= $s['nama_barang']; ?>"
													data-kdkategoriedit="<?= $s['kdkategori']; ?>"
													data-kategoriedit="<?= $s['nama_kategori']; ?>"
													data-kdsatuanedit="<?= $s['kdsatuan']; ?>"
													data-satuanedit="<?= $s['nama_satuan']; ?>"
													data-hargaedit="<?= $s['harga']; ?>"
													data-satuanedit="<?= $s['nama_satuan']; ?>"
													data-stokedit="<?= $s['stok']; ?>"
													data-keteranganedit="<?= $s['keterangan']; ?>"
													><i class="dw dw-edit2"></i> Edit</a>
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
			<div class="modal fade bs-example-modal-lg" id="modaledit"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<form action="<?= base_url('Barang/edit') ?>" method="POST" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Kode Barang</label>
											<input type="hidden" id="idedit" name="idedit" class="form-control">
											<input type="text" id="kode_barangedit" name="kode_barangedit" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Nama Barang</label>
											<input type="text" id="nama_barangedit" name="nama_barangedit" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Kategori Barang</label>
											<select class="form-control itemKategori" id="kategoriedit" name="kategoriedit" required>
											</select>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Satuan Barang</label>
											<select class="form-control itemSatuan" id="satuanedit" name="satuanedit" required>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Harga</label>
											<input type="number" id="hargaedit" name="hargaedit" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Stok</label>
											<input type="number" id="stokedit" name="stokedit" class="form-control" value="0" readonly="true">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Gambar</label>
											<p>Biarkan Jika tidak Update Gambar</p>
											<input type="file" id="fileedit" name="fileedit" accept=".jpg, .png">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Deskripsi / Keterangan</label>
											<textarea class="form-control" name="keteranganedit" id="keteranganedit" cols="20" rows="2" placeholder="Ketik Keterangan" required></textarea>
										</div>
									</div>
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

			<?php $this->load->view('templates/footer'); ?>

			<script type="text/javascript">


				$(document).ready(function() {
					$(document).on('click', '#editkategori', function() {
						var idedit = $(this).data('idedit');
						var nama_kategoriedit = $(this).data('nama_kategoriedit');
						$('#idedit').val(idedit);
						$('#nama_kategoriedit').val(nama_kategoriedit);
					})
				})


				$('.itemSatuan').select2({
					width: '100%',
					ajax: {
						url: "<?= base_url(); ?>/Satuan_barang/getdatasatuan",
						dataType: "json",
						delay: 250,
						data: function(params) {
							return {
								sat: params.term
							};
						},
						processResults: function(data) {
							var results = [];
							$.each(data, function(index, item) {
								results.push({
									id: item.id,
									text: item.nama_satuan
								});
							});
							return {
								results: results
							}
						}
					}
				});

				$('.itemKategori').select2({
					width: '100%',
					ajax: {
						url: "<?= base_url(); ?>/Kategori_barang/getdatakategori",
						dataType: "json",
						delay: 250,
						data: function(params) {
							return {
								kat: params.term
							};
						},
						processResults: function(data) {
							var results = [];
							$.each(data, function(index, item) {
								results.push({
									id: item.id,
									text: item.nama_kategori
								});
							});
							return {
								results: results
							}
						}
					}
				});

				$(document).on('click', '.del', function(event) {
					event.preventDefault();
					let kode = $(this).attr('data-kode');
					let delete_url = "<?= base_url(); ?>/Barang/delete/" + kode;

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

				$(document).ready(function() {
					$(document).on('click', '#editbarang', function() {
						var idedit = $(this).data('idedit');
						var kode_barangedit = $(this).data('kode_barangedit');
						var nama_barangedit = $(this).data('nama_barangedit');
						var kdsatuanedit = $(this).data('kdsatuanedit');
						var satuanedit = $(this).data('satuanedit');
						var kdkategoriedit = $(this).data('kdkategoriedit');
						var kategoriedit = $(this).data('kategoriedit');
						var hargaedit = $(this).data('hargaedit');
						var stokedit = $(this).data('stokedit');
						var keteranganedit = $(this).data('keteranganedit');

						$('#idedit').val(idedit);
						$('#kode_barangedit').val(kode_barangedit);
						$('#nama_barangedit').val(nama_barangedit);
						$('#hargaedit').val(hargaedit);
						$('#stokedit').val(stokedit);
						$('#keteranganedit').val(keteranganedit);

						var $hasilsatuan = $("<option selected='selected'></option>").val(kdsatuanedit).text(satuanedit)
						$("#satuanedit").append($hasilsatuan).trigger('change');

						var $hasilkategori = $("<option selected='selected'></option>").val(kdkategoriedit).text(kategoriedit)
						$("#kategoriedit").append($hasilkategori).trigger('change');

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
