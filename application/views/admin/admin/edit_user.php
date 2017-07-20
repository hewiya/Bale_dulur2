<?php
	//include "configg.php";
	$link = mysqli_connect("localhost", "root", "", "bale");
	//if(isset($_GET['id_user'])){
	if(isset($_SESSION['tampung'])){
		//$id=isset($_GET['id_user'])?$_GET['id_user']:"";
		//$id=$_GET['id_user'];

		//echo $id_user;
		//$id = $id_user;

		//echo $_SESSION['tampung'];
		$id = $_SESSION['tampung'];
	} else {
		die("Error No Id selected");
	}
	$query="select * from user where id='$id'";
	$ada=mysqli_query($link,$query);//or die(mysqli_error());
	//echo $ada;
	$rows=mysqli_fetch_array($ada);
	//echo $temu;

	switch ($rows['privileges']){
		case 1:	
			$privileges='Pemilik';
		break;
		case 2:
			$privileges='Penyewa';
		break;
		
	}
?>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/table.css">
</head>
<body>
<form class="table_li" action="<?php echo base_url('index.php/controler2/update_user'); ?>" method="get" name="frmedit">
	<center><h2>Edit user</h2>
	<table frame="hsides">
	<tr>
		<td>Kode user</td>
		<td>:</td>
		<td><input type="text" name="id" value="<?=$rows['id']?>"/></td>
	</tr>
	<tr>
		<td>Nama User</td>
		<td>:</td>
		<td><input type="text" name="nama" value="<?=$rows['nama']?>"/></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" value="<?=$rows['email']?>"/></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="text" name="password" value="<?=$rows['password']?>"/></td>
	</tr>
	<tr>
		<td>privileges</td>
		<td>:</td>
		<td><select name="privileges">
					<option selected="selected" value="1">Pemilik</option>
					<option selected="selected" value="2">Penyewa</option>			
		</select></td>
	</tr>
</table>
<table>
	<tr>
		<td><input class="submit" type="submit" name="edit" value="Edit" align="center"></td>
	</tr>
</table>
</center>
</form>
<button class="button" id="button"><a href="<?php echo base_url('index.php/controler/set_hal_user'); ?>">Cancel</button>
</body>
</html>
<?php
	// if(isset($_GET['edit'])){
	// $id=$_GET['id_user'];
	// $nama=$_GET['nama'];
	// $email=$_GET['email'];
	// $password=$_GET['password'];
	// $privileges=$_GET['privileges'];
	// $ganti="update user set
	// 	nama='$nama', email='$email', password='$password', privileges='$privileges' where id='$id'";
	// $hasil=mysqli_query($link,$ganti)or die(mysqli_error());
	// if($hasil>0)
	// {
	// 	echo"<script>
	// 		alert('Data Update');
	// 		location.href='index.php?hal=tbl_user';
	// 	</script>";
	// }
	// else
	// 	{
	// 	echo 
	// 	"<script>
	// 			alert('Data gagal Update');
	// 			location.href='index.php?hal=edit_user';
	// 	</script>";
	
	// }
	// }
?>
