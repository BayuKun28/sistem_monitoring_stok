	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<div class="row">
								<div class="col-md-8"><h4>Dashboard</h4></div>
							</div>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="<?= base_url('assets/deskapp/') ?>vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Selamat Datang Kembali ! <div class="weight-600 font-30 text-blue"><?= $user['nama']; ?></div>
						</h4>
						<p class="font-18 max-width-600">Aplikasi Monitoring Stok <?= $toko['nama_toko']; ?></p>
					</div>
				</div>
			</div>
	</div>