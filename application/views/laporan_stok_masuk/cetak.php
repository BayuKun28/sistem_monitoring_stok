<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak</title>
</head>

<body>
    <div style="width:auto; margin: auto;">
        <center>
            <h3>Laporan Stok Masuk </h3>
            <h4><?= $toko['nama_toko']; ?></h4>
            <h4> <?= $tanggalawal; ?> s/d <?= $tanggalakhir; ?></h4>
            <table border="1" width="100%" style="border-collapse:collapse;">
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
        </center>
        <br>
        <div style="width: 35%; text-align: left; float: right;"><center>Mengetahui, <?= $hariini; ?></center> <br>
            <br> <br> <br> <br>
            <center> <?= $user['nama']; ?></center>
        </div>
    </div>
</body>

</html>