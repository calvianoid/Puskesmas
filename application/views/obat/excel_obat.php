<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>KODE OBAT</th>

 <th>NAMA OBAT</th>

 <th>JENIS OBAT</th>

 <th>DOSIS ATURAN OBAT</th>

 <th>SATUAN</th>

 <th>HARGA OBAT</th>

 <th>JUMLAH OBAT</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($obat as $row) { ?>

<tr>

 <td><?php echo $row->kode_obat ?></td>

 <td><?php echo $row->nama_obat ?></td>

 <td><?php echo $row->jenis_obat ?></td>

 <td><?php echo $row->dosis_aturan_obat ?></td>

 <td><?php echo $row->satuan ?></td>

 <td><?php echo $row->harga_obat ?></td>

 <td><?php echo $row->jumlah_obat ?></td>

 </tr>

<?php $i++; }?>

</tbody>

</table>
