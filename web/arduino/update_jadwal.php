<?php
require_once('Connections/koneksi.php');

$kolom = $_POST['kolom'];
$isi = $_POST['isi'];
$id = $_POST['id'];

mysql_select_db($database_koneksi, $koneksi);
if(($kolom=="jam")||($kolom=="keterangan"))
{
	$query_Recordset1 = "UPDATE tabel_seq_bel SET $kolom = '$isi' WHERE id= $id";
}
else 
{
	$query_Recordset1 = "UPDATE tabel_seq_bel SET $kolom = $isi WHERE id= $id";
}
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysql_num_rows($Recordset1);

echo "update berhasil";

//echo $kolom." - ".$isi." - ".$id;
?>
