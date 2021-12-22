<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>ID PASIEN</th>

 <th>NAMA PASIEN</th>

 <th>JENIS KELAMIN</th>

 <th>TEMPAT LAHIR</th>

 <th>TANGGAL LAHIR</th>

 <th>ALAMAT</th>

 <th>NO. TELP</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($pasien as $row) { ?>

<tr>

 <td><?php echo $row->id_pasien ?></td>

 <td><?php echo $row->nama_pasien ?></td>

 <td><?php echo $row->jk?></td>

 <td><?php echo $row->tempat_lahir ?></td>

 <td><?php echo $row->tanggal_lahir ?></td>

 <td><?php echo $row->alamat ?></td>

 <td><?php echo $row->no_telp ?></td>

 </tr>

<?php $i++; }?>

</tbody>

</table>
