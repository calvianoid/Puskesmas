<?php if($pengadaan_obat->num_rows() > 0) { ?>

<table border="1" class="table">
    <thead class='thead-dark'>
        <tr align='center'>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total Pengadaan Obat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $total_pengadaan = 0;
        foreach($pengadaan_obat->result() as $p)
        {
            echo "
                <tr align='center'>
                    <td>".$no."</td>
                    <td>".date('d F Y', strtotime($p->tgl_transaksi))."</td>
                    <td>Rp. ".str_replace(",", ".", number_format($p->total_pengadaan))."</td>
                </tr>
            ";

            $total_pengadaan = $total_pengadaan + $p->total_pengadaan;
            $no++;
        }

        echo "
            <table border='1' class='table'>
            <tr align='center'>
                <td colspan='2'><b>Total Seluruh Pengadaan</b></td>
                <td><b>Rp. ".str_replace(",", ".", number_format($total_pengadaan))."</b></td>
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
    <br><a href="<?php echo site_url('laporan_pengadaan/pdf/'.$from.'/'.$to); ?>" target='blank' class='btn btn-primary btn-lg active'>Export PDF</a>
    <a href="<?php echo site_url('laporan_pengadaan/excel/'.$from.'/'.$to); ?>" target='blank' class='btn btn-success btn-lg active'>Export Excel</a>
</p>
<br />
<?php } ?>

<?php if($pengadaan_obat->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>