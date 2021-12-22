<?php if($pembayaran_obat->num_rows() > 0) { ?>

<table border="1" class="table">
    <thead class='thead-dark'>
        <tr align='center'>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total Pembayaran Obat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $total_pembayaran = 0;
        foreach($pembayaran_obat->result() as $p)
        {
            echo "
                <tr align='center'>
                    <td>".$no."</td>
                    <td>".date('d F Y', strtotime($p->tanggal_transaksi))."</td>
                    <td>Rp. ".str_replace(",", ".", number_format($p->total_pembayaran))."</td>
                </tr>
            ";

            $total_pembayaran = $total_pembayaran + $p->total_pembayaran;
            $no++;
        }

        echo "
            <table border='1' class='table'>
            <tr align='center'>
                <td colspan='2'><b>Total Seluruh Pembayaran</b></td>
                <td><b>Rp. ".str_replace(",", ".", number_format($total_pembayaran))."</b></td>
            </tr>
        ";
        ?>
    </tbody>
</table>

<p>
    <?php
    $from 	= date('Y-m-d', strtotime($from));
    $to		= date('Y-m-d', strtotime($to));
    ?>
    <br><a href="<?php echo site_url('laporan_pembayaran/pdf/'.$from.'/'.$to); ?>" target='blank' class='btn btn-primary btn-lg active'>Export PDF</a>
    <a href="<?php echo site_url('laporan_pembayaran/excel/'.$from.'/'.$to); ?>" target='blank' class='btn btn-success btn-lg active'>Export Excel</a>
</p>
<br />
<?php } ?>

<?php if($pembayaran_obat->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>