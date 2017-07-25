<?php
	if(!$_SESSION['status']) {
    header("location:index");
}
?>
	
<!DOCTYPE html>
    <html>
        <head>
            <title>Sewakan Rumah Tinggal</title>
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/pemilik/css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/pemilik/css/bs.css">
			<link rel="stylesheet" href="<?php echo base_url() ?>assets/pemilik/css/style.css">
			<script src="<?php echo base_url() ?>assets/pemilik/js/bootstrap.js"></script>
			<script src="<?php echo base_url() ?>assets/pemilik/js/jquery.js"></script>
			<script>
				function logout() {
					if (confirm ("Apakah anda yakin akan logout ?")){
					return true;
					}else{
					return false;
					}
				}
				function hapus() {
					if (confirm ("Apakah anda yakin akan menghapus data ini ?")){
					return true;
					}else{
					return false;
					}
				}
				function update() {
					if (confirm ("Apakah anda yakin akan mengubah data ini?")){
					return true;
					}else{
					return false;
					}
				}
			</script>
			<style>
			.datepicker{z-index:1151;}
			</style>
			<script>
			$(function(){
				$("#tanggal").datepicker({
				format:'yyyy/dd/mm'
				});
					});
			</script>
		</head>
        <body>
			<a href="<?php echo base_url('index.php/login/logout'); ?>" onClick='return logout()'><div class="pojok">Sign Out</div></a>
			<a href="<?php echo base_url('index.php/login/indexlogin'); ?>"<div class="pojok1">Kembali</div></a>
			<a href="?hal=daftar_rumah&id=<?php=$_SESSION['id'] ?>"><div class="pojok2">Lihat Daftar</div></a>
			<div class="coklat">
			<?php
				$hal=isset($_GET['hal'])?$_GET['hal']:"";
				if($hal){
					require_once ($hal.".php");
				}else{
					require_once ("welomelokasi.php");
				}
			?>
			</div>
			
            
            <!--javascript here-->
            <script src="<?php echo base_url() ?>assets/pemilik/js/bootstrap-modal.js"></script>
            <script src="<?php echo base_url() ?>assets/pemilik/js/bootstrap-transition.js"></script>
            <script src="<?php echo base_url() ?>assets/pemilik/js/bootstrap-datepicker.js"></script>
        </body>
    </html>
<?php
//	}
?>