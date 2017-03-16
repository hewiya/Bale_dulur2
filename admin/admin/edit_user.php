<?php
	include "configg.php";
	if(isset($_GET['id'])){
		$id=isset($_GET['id'])?$_GET['id']:"";
		$query="select * from user where id='$id'";
		$ada=mysql_query($query)or die(mysql_error());
		$temu=mysql_fetch_array($ada);
		}
?>
<?php
	switch ($temu['privileges'])
	{
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
	<link rel="stylesheet" href="css/tabel.css" media="screen">
</head>
<body>
<form class="table_li" action="edit_user.php" method="get" name="frmedit">
	<center><h2>Edit user</h2>
	<table frame="hsides">
	<tr>
		<td>Kode user</td>
		<td>:</td>
		<td><input type="text" name="id" value="<?=$temu['id']?>"/></td>
	</tr>
	<tr>
		<td>Nama User</td>
		<td>:</td>
		<td><input type="text" name="nama" value="<?=$temu['nama']?>"/></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" value="<?=$temu['email']?>"/></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="text" name="password" value="<?=$temu['password']?>"/></td>
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
		<td><input class="submit" type="submit" name="edit" value="Edit"></td>
	</tr>
</table>
</center>
</form>
</body>
</html>
<?php
	if(isset($_GET['edit'])){
	$id=$_GET['id'];
	$nama=$_GET['nama'];
	$email=$_GET['email'];
	$password=$_GET['password'];
	$privileges=$_GET['privileges'];
	$ganti="update user set
		nama='$nama', email='$email', password='$password', privileges='$privileges' where id='$id'";
	$hasil=mysql_query($ganti)or die(mysql_error());
	if($hasil>0)
	{
		echo"<script>
			alert('Data Update');
			location.href='index.php?hal=tbl_user';
		</script>";
	}
	else
		{
		echo 
		"<script>
				alert('Data gagal Update');
				location.href='index.php?hal=edit_user';
		</script>";
	
	}
	}
?>
