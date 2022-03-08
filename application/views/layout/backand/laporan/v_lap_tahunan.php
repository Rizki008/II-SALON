<!DOCTYPE html>
<html>

<head>
    <title>Struktur Table</title>
</head>

<body>
    <i class="fa fa-shopping-cart"></i> <?= $title ?>
    <small class="float-right">Tahun: <?= $tahun ?></small>
    <table border="1" width="700">
        <caption>LAPORAN PEMESANAN PAKET II-SALON</caption>
        <thead>
            <tr>
                <td>No</td>
                <td>Paket</td>
                <td>No Transaksi</td>
                <td>Tanggal</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $grand_total = 0;
            foreach ($laporan as $key => $value) {
                $grand_total = $grand_total + $value->grand_total;
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama_paket ?></td>
                    <td><?= $value->no_order ?></td>
                    <td><?= $value->tgl_order ?></td>
                    <td><?= $value->harga ?></td>
                    <td>Rp.<?= number_format($value->grand_total, 0) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h3>Grand Total : Rp. <?= number_format($grand_total, 0) ?> </h3>
    <div class="row no-print">
        <div class="col-12">
            <button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</body>

</html>