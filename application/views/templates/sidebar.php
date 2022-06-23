	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?= base_url('Dashboard'); ?>">
				<img src="<?= base_url('assets/'); ?>toko.png" alt="" height="72px" width="72px"> E-MONITOR
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<?php if ($this->session->userdata('role')  == 1) { ?>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="<?= base_url('Dashboard'); ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-edit2"></span><span class="mtext">Master</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url('Kategori_barang'); ?>">Kategori Barang</a></li>
								<li><a href="<?= base_url('Satuan_barang'); ?>">Satuan Barang</a></li>
								<li><a href="<?= base_url('Barang'); ?>">Barang</a></li>
								<li><a href="<?= base_url('Vendors'); ?>">Vendors</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-library"></span><span class="mtext">Stok</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url('Barang'); ?>">Monitor Stok</a></li>
								<li><a href="<?= base_url('Stok_masuk'); ?>">Stok Masuk</a></li>
								<li><a href="<?= base_url('Stok_keluar'); ?>">Stok Keluar</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-calendar1"></span><span class="mtext">Laporan</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url('Rekap_laporan'); ?>">Rekap Laporan</a></li>
								<li><a href="<?= base_url('Laporan_stok_masuk'); ?>">Laporan Stok Masuk</a></li>
								<li><a href="<?= base_url('Laporan_stok_keluar'); ?>">Laporan Stok Keluar</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-settings1"></span><span class="mtext">Pengaturan</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url('Toko'); ?>">Toko</a></li>
								<li><a href="<?= base_url('Auth/pengguna'); ?>">Pengguna</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		<?php }
		else { ?>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="<?= base_url('Dashboard'); ?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-calendar1"></span><span class="mtext">Laporan</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url('Rekap_laporan'); ?>">Rekap Laporan</a></li>
								<li><a href="<?= base_url('Laporan_stok_masuk'); ?>">Laporan Stok Masuk</a></li>
								<li><a href="<?= base_url('Laporan_stok_keluar'); ?>">Laporan Stok Keluar</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		<?php }; ?>
	</div>
	<div class="mobile-menu-overlay"></div>