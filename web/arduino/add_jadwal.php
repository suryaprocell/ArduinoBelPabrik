<?php
require_once('Connections/koneksi.php');

$jam = $_POST['jam'];
$senin = $_POST['senin'];
$selasa = $_POST['selasa'];
$rabu = $_POST['rabu'];
$kamis = $_POST['kamis'];
$jumat = $_POST['jumat'];
$sabtu = $_POST['sabtu'];
$minggu = $_POST['minggu'];
$keterangan = $_POST['keterangan'];

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "INSERT INTO tabel_seq_bel (`jam`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`, `keterangan`) VALUES ('$jam', $senin, $selasa, $rabu, $kamis, $jumat, $sabtu, $minggu, '$keterangan')";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
//$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysql_num_rows($Recordset1);

echo "Berhasil Menambah Jadwal";

/*
echo $jam."</br>";
echo $senin."</br>";
echo $selasa."</br>";
echo $rabu."</br>";
echo $kamis."</br>";
echo $jumat."</br>";
echo $sabtu."</br>";
echo $minggu."</br>";
echo $keterangan."</br>";
*/
?>
