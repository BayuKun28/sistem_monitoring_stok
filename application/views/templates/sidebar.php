	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="<?= base_url('assets/deskapp/'); ?>vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?= base_url('assets/deskapp/'); ?>vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="calendar.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext">Master</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= base_url('Kategori_barang'); ?>">Kategori Barang</a></li>
							<li><a href="<?= base_url('Barang'); ?>">Barang</a></li>
							<li><a href="<?= base_url('Vendor'); ?>">Vendor</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Stok</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= base_url('Stok_masuk'); ?>">Monitor Stok</a></li>
							<li><a href="<?= base_url('Stok_masuk'); ?>">Stok Masuk</a></li>
							<li><a href="<?= base_url('Stok_keluar'); ?>">Stok Keluar</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Laporan</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= base_url('Stok_masuk'); ?>">Rekap Laporan</a></li>
							<li><a href="<?= base_url('Stok_masuk'); ?>">Laporan Stok Masuk</a></li>
							<li><a href="<?= base_url('Stok_keluar'); ?>">Laporan Stok Keluar</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings1"></span><span class="mtext">Pengaturan</span>
						</a>
						<ul class="submenu">
							<li><a href="ui-buttons.html">Toko</a></li>
							<li><a href="ui-cards.html">Pengguna</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>