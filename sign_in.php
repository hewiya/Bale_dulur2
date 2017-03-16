<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style_i.css">

<button id="tombol">KLIK SAYA !!</button> 
	KLIK TOMBOL UNTUK MENAMPILKAN MODAL DIALOG
 
	<div id="bg"></div>
	<div id="modal-kotak">
		<div id="atas">
			Halo . ini adalah modal dialog | MalasNgoding.com
		</div>
		<div id="bawah">
			<button id="tombol-tutup">CLOSE</button>
		</div>
	</div>	
 
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tombol').click(function(){
				$('#modal-kotak , #bg').fadeIn("slow");
			});
			$('#tombol-tutup').click(function(){
				$('#modal-kotak , #bg').fadeOut("slow");
			});
		});
	</script>