<?php
require_once('Connections/koneksi.php');

$id = $_GET['id'];

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "DELETE FROM tabel_seq_bel WHERE id = $id";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());

echo "Berhasil Menghapus jadwal";
?>
