<?php
require_once('Connections/koneksi.php');

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tabel_seq_bel ORDER BY jam ASC";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jadwal Bel</title>
<script>
$( "input[type=submit],input[type=button], button" ).button();

	function callback() {
			setTimeout(function() {
				$( "#info" ).fadeOut();
				var dest = "show_jadwal.php";
				$('#hasil').load(dest).fadeIn(1000);
			}, 100 );
	};
	function kirim(var_id,var_kolom,var_kon)
	{
		var dest = "update_jadwal.php";
		var val_kolom = var_kolom;
		var val_kon = "#"+var_kon;
		var val_id = var_id;

		if((val_kolom=="jam")||(val_kolom=="keterangan"))
		{
			var val_isi = $(val_kon).val();
		}else{
			var val_isi = $(val_kon).prop("checked");
		}

		$.post(dest, {
			isi: val_isi,
			kolom: val_kolom,
			id: val_id
		}).done(function( data ){
    			$('#info').text(data).fadeIn(callback);
  		});		

		//alert(data);
		event.preventDefault();
	}

	$('#simpan').click(function(event) {
		var valjam = $('#jam').val();
		var valsenin = $('#senin').prop("checked");
		var valselasa = $('#selasa').prop("checked");
		var valrabu = $('#rabu').prop("checked");
		var valkamis = $('#kamis').prop("checked");
		var valjumat = $('#jumat').prop("checked");
		var valsabtu = $('#sabtu').prop("checked");
		var valminggu = $('#minggu').prop("checked");
		var valketerangan = $('#keterangan').val();

		$.post("add_jadwal.php",{
			jam: valjam ,
			senin: valsenin ,
			selasa: valselasa ,
			rabu: valrabu ,
			kamis: valkamis ,
			jumat: valjumat ,
			sabtu: valsabtu ,
			minggu: valminggu ,
			keterangan: valketerangan
		}).done(function( data ){
    			$('#info').text(data).fadeIn(callback);
			//alert(data);  		
		});

		event.preventDefault();
	});
</script>
</head>

<body>
<h1 align="center">JADWAL BEL PERUSAHAAN</h1>
<p align="center">
	<form id="form1" action="">
	<table id="table1" width="85%" align="center" border=1>
		<tr align="center" bgcolor="#00afff">
			<td><b>NO</b></td>
			<td><b>JAM</b></td>
			<td><b>SENIN</b></td>
			<td><b>SELASA</b></td>
			<td><b>RABU</b></td>
			<td><b>KAMIS</b></td>
			<td><b>JUMAT</b></td>
			<td><b>SABTU</b></td>
			<td><b>MINGGU</b></td>
			<td><b>KETERANGAN</b></td>
			<td><b>ACTION</b></td>
		</tr>
		<tr align="center">
			<td>#</td>
			<td><input type="text" id="jam" name="jam" size="8"></td>
			<td><input type="checkbox" id="senin" name="senin"></td>
			<td><input type="checkbox" id="selasa" name="selasa"></td>
			<td><input type="checkbox" id="rabu" name="rabu"></td>
			<td><input type="checkbox" id="kamis" name="kamis"></td>
			<td><input type="checkbox" id="jumat" name="jumat"></td>
			<td><input type="checkbox" id="sabtu" name="sabtu"></td>
			<td><input type="checkbox" id="minggu" name="minggu"></td>
			<td><textarea id="keterangan" rows="1" cols="50"></textarea></td>
			<td><button id="simpan">Simpan</button></td>
		</tr>
<?php
$i=0;
do { 
$i=$i+1;
?>

<script>
	$('#jam<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","jam","jam<?php echo $i; ?>");
	});
	$('#senin<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","senin","senin<?php echo $i; ?>");
	});
	$('#selasa<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","selasa","selasa<?php echo $i; ?>");
	});
	$('#rabu<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","rabu","rabu<?php echo $i; ?>");
	});
	$('#kamis<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","kamis","kamis<?php echo $i; ?>");
	});
	$('#jumat<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","jumat","jumat<?php echo $i; ?>");
	});
	$('#sabtu<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","sabtu","sabtu<?php echo $i; ?>");
	});
	$('#minggu<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","minggu","minggu<?php echo $i; ?>");
	});
	$('#keterangan<?php echo $i; ?>').change(function(event) {
 		kirim("<?php echo $row_Recordset1['id'] ?>","keterangan","keterangan<?php echo $i; ?>");
	});
	
	$('#hapus<?php echo $i; ?>').click(function(event) {
		$('#info').load('del_jadwal.php', "id=<?php echo $row_Recordset1['id'] ?>").fadeIn(callback);
		event.preventDefault();
	});
	
</script>

		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><input type="text" id="jam<?php echo $i; ?>" name="jam<?php echo $i; ?>" size="8" value="<?php echo $row_Recordset1['jam']; ?>"></td>
			<td bgcolor="<?php if($row_Recordset1['senin']==1){echo '#80ff80';} ?>"><input type="checkbox" id="senin<?php echo $i; ?>" name="senin<?php echo $i; ?>" value="<?php echo $row_Recordset1['senin']; ?>" <?php if($row_Recordset1['senin']==1){echo "checked";} ?>></td>
			<td bgcolor="<?php if($row_Recordset1['selasa']==1){echo '#80ff80';} ?>"><input type="checkbox" id="selasa<?php echo $i; ?>" name="selasa<?php echo $i; ?>" value="<?php echo $row_Recordset1['selasa']; ?>" <?php if($row_Recordset1['selasa']==1){echo "checked";} ?>></td>
			<td bgcolor="<?php if($row_Recordset1['rabu']==1){echo '#80ff80';} ?>"><input type="checkbox" id="rabu<?php echo $i; ?>" name="rabu<?php echo $i; ?>" value="<?php echo $row_Recordset1['rabu']; ?>" <?php if($row_Recordset1['rabu']==1){echo "checked";} ?>></td>
			<td bgcolor="<?php if($row_Recordset1['kamis']==1){echo '#80ff80';} ?>"><input type="checkbox" id="kamis<?php echo $i; ?>" name="kamis<?php echo $i; ?>" value="<?php echo $row_Recordset1['kamis']; ?>" <?php if($row_Recordset1['kamis']==1){echo "checked";} ?>></td>
			<td bgcolor="<?php if($row_Recordset1['jumat']==1){echo '#80ff80';} ?>"><input type="checkbox" id="jumat<?php echo $i; ?>" name="jumat<?php echo $i; ?>" value="<?php echo $row_Recordset1['jumat']; ?>" <?php if($row_Recordset1['jumat']==1){echo "checked";} ?>></td>
			<td bgcolor="<?php if($row_Recordset1['sabtu']==1){echo '#80ff80';} ?>"><input type="checkbox" id="sabtu<?php echo $i; ?>" name="sabtu<?php echo $i; ?>" value="<?php echo $row_Recordset1['sabtu']; ?>" <?php if($row_Recordset1['sabtu']==1){echo "checked";} ?>></td>
			<td bgcolor="<?php if($row_Recordset1['minggu']==1){echo '#80ff80';} ?>"><input type="checkbox" id="minggu<?php echo $i; ?>" name="minggu<?php echo $i; ?>" value="<?php echo $row_Recordset1['minggu']; ?>" <?php if($row_Recordset1['minggu']==1){echo "checked";} ?>></td>
			<td><textarea id="keterangan<?php echo $i; ?>" rows="1" cols="50"><?php echo $row_Recordset1['keterangan']; ?></textarea></td>
			<td><button id="hapus<?php echo $i; ?>">Hapus</button></td>
		</tr>
<?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
?>
	</table>
	</form>
</p>
</body>

</html>
