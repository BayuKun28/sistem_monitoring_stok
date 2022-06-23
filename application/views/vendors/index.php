	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Vendors</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Master</a></li>
								<li class="breadcrumb-item active" aria-current="page">Vendors</li>
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
									<h4 class="modal-title" id="myLargeModalLabel">Tambah Vendor</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<form action="<?= base_url('Vendors/tambah') ?>"  method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Vendor</label>
											<input id="nama_vendor" name="nama_vendor" class="form-control" type="text" placeholder="Ketik Nama Vendor" required>
										</div>
										<div class="form-group">
											<label>Alamat Vendor</label>
											<input id="alamat" name="alamat" class="form-control" type="text" placeholder="Ketik Alamat" required>
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
								<th>Nama Vendor</th>
								<th>Alamat</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($vendors as $s) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $s['nama_vendor']; ?></td>
									<td><?= $s['alamat']; ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="#" name="editvendor" id="editvendor" class="dropdown-item" data-toggle="modal" data-target="#modaledit" data-idedit="<?= $s['id']; ?>" data-nama_vendoredit="<?= $s['nama_vendor']; ?>"
												data-alamatedit="<?= $s['alamat']; ?>" ><i class="dw dw-edit2"></i> Edit</a>
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
						<h4 class="modal-title" id="myLargeModalLabel">Edit Vendor</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="<?= base_url('Vendors/edit') ?>"  method="POST">
						<div class="modal-body">
							<div class="form-group">
								<input id="idedit" name="idedit" class="form-control" type="hidden">
								<label>Nama Vendor</label>
								<input id="nama_vendoredit" name="nama_vendoredit" class="form-control" type="text" placeholder="Ketik Nama Vendor" required>
							</div>
							<div class="form-group">
								<label>Alamat Vendor</label>
								<input id="alamatedit" name="alamatedit" class="form-control" type="text" placeholder="Ketik Alamat" required>
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
        $(document).on('click', '#editvendor', function() {
            var idedit = $(this).data('idedit');
            var nama_vendoredit = $(this).data('nama_vendoredit');
            var alamatedit = $(this).data('alamatedit');
            $('#idedit').val(idedit);
            $('#nama_vendoredit').val(nama_vendoredit);
            $('#alamatedit').val(alamatedit);
        })
    })

    $(document).on('click', '.del', function(event) {
        event.preventDefault();
        let kode = $(this).attr('data-kode');
        let delete_url = "<?= base_url(); ?>/Vendors/delete/" + kode;

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
