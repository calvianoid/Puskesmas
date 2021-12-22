<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>KODE ANTRIAN</th>

 <th>TANGGAL PENDAFTARAN</th>

 <th>NAMA PASIEN</th>

 <th>POLI TUJUAN</th>

 <th>NAMA DOKTER</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($pendaftaran as $row) { ?>

<tr>

 <td><?php echo $row->kode_antrian ?></td>

 <td><?php echo $row->tanggal_pendaftaran ?></td>

 <td><?php echo $row->nama_pasien ?></td>

 <td><?php echo $row->nama_poli ?></td>

 <td><?php echo $row->nama_dokter ?></td>

 </tr>

<?php $i++; }?>

</tbody>

</table>
