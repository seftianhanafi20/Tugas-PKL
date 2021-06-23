<?php 
require_once "../../_config/config.php";
 
$data = $_POST['data'];
$id = $_POST['id'];
 
// $n=strlen($id);
// $m=($n==2?5:($n==5?8:13));
// $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));
?>
<?php 
if($data == "tt"){
	?>
	Transmisi Trafo
	<select id="form_tt">
		<option value="">Pilih Transmisi Trafo</option>
		<?php 
		$sql_tt = mysqli_query($con,"SELECT * FROM transmisi_trafo WHERE id_ultg ='$id' ORDER BY nama_tt");
 
		while($row = mysqli_fetch_array($sql_tt)){
			?>
			<option value="<?php echo $row['id_tt']; ?>"><?php echo $row['nama_tt']; ?>/<?php echo $row['kode']; ?></option>
			<?php 
		}
		?>
	</select>
 
	<?php 
}
	?>

