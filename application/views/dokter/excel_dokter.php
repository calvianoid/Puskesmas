<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xlsx");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>KODE DOKTER</th>

 <th>NAMA DOKTER</th>

 <th>JENIS KELAMIN</th>

 <th>NOMOR INDUK DOKTERT</th>

 <th>TEMPAT LAHIR</th>

 <th>TANGGAL LAHIR</th>

 <th>ALAMAT</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($dokter as $row) { ?>

<tr>

 <td><?php echo $row->kode_dokter ?></td>

 <td><?php echo $row->nama_dokter ?></td>

 <td><?php echo $row->jenis_kelamin ?></td>

 <td><?php echo $row->nomor_induk_dokter ?></td>

 <td><?php echo $row->tempat_lahir ?></td>

 <td><?php echo $row->tgl_lahir ?></td>

 <td><?php echo $row->alamat ?></td>

 </tr>

<?php $i++; }?>

</tbody>

</table>
