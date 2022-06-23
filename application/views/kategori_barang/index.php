	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
							<div class="col-md-8"><h4>Kategori Barang</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Kategori Barang</li>
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
									<h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<form action="<?= base_url('Kategori_barang/tambah') ?>"  method="POST">
									<div class="modal-body">
										<div class="form-group">
											<input id="nama_kategori" name="nama_kategori" class="form-control" type="text" placeholder="Ketik Nama Kategori" required>
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
								<th>Nama Kategori</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($kategori_barang as $s) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $s['nama_kategori']; ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="#" name="editkategori" id="editkategori" class="dropdown-item" data-toggle="modal" data-target="#modaledit" data-idedit="<?= $s['id']; ?>" data-nama_kategoriedit="<?= $s['nama_kategori']; ?>" ><i class="dw dw-edit2"></i> Edit</a>
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
						<h4 class="modal-title" id="myLargeModalLabel">Edit Kategori Barang</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="<?= base_url('Kategori_barang/edit') ?>"  method="POST">
						<div class="modal-body">
							<div class="form-group">
								<input id="idedit" name="idedit" class="form-control" type="hidden">
								<input id="nama_kategoriedit" name="nama_kategoriedit" class="form-control" type="text" placeholder="Ketik Nama Kategori" required>
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
	

	$(document).ready(function() {
        $(document).on('click', '#editkategori', function() {
            var idedit = $(this).data('idedit');
            var nama_kategoriedit = $(this).data('nama_kategoriedit');
            $('#idedit').val(idedit);
            $('#nama_kategoriedit').val(nama_kategoriedit);
        })
    })

    $(document).on('click', '.del', function(event) {
        event.preventDefault();
        let kode = $(this).attr('data-kode');
        let delete_url = "<?= base_url(); ?>/Kategori_barang/delete/" + kode;

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
