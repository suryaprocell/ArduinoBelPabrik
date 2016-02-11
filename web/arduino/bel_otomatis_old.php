<?php
require_once('Connections/koneksi.php');

date_default_timezone_set('Asia/Jakarta');
$hr = date("N");
$jam = date("H:i:s");

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tabel_seq_bel WHERE hari = '$hr' AND jam >= '$jam' ORDER BY jam ASC";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if($row_Recordset1)
{
	$delay = strtotime($row_Recordset1['jam'])-strtotime($jam); // selisih jam sekarang dan jam bel berikutnya dalam detik
	//if($delay>60)
	//{
	//	echo "xdata0x";
	//}
	//else
	//{
		echo "xdata".$delay."x";
	//}
}
else
{
	echo "xdata0x";
}

mysql_free_result($Recordset1);
?>
