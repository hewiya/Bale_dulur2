<?php
//error_reporting(0);



include 'lib/koneksi.php';
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$token = md5(time());
if (!isset($f_name)) {
echo "Lengkap form";
}
elseif (!isset($email)) {
	echo "Lengkapi form";
} 
else {

	// cek apakah email sudah terdaftar
	$query = "SELECT email FROM user WHERE email='$email'";
	$find = mysql_query($query);

	if ($find && mysql_num_rows($find) > 0) {
		echo "user telah terdaftar";
	}
	else {
		$add = "insert into user (nama, nama_belakang, email, password, confirm, token) values ('$f_name','$l_name','$email','$password','no', '$token')";
		$set = mysql_query($add);
		if ($set) {

		} else {
			die();
		}
		require_once('library/class.smtp.php'); //menginclude librari phpmailer
		require_once('library/class.phpmailer.php'); //menginclude librari phpmailer

		$mail             = new PHPMailer();
		$body             = 
		"<body style='margin: 10px;'>
		<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
		<br>
		<strong>Terima Kasih Telah Mendaftar Sebagai Member BALE DULUR</strong><br>
		<b>Nama Anda : </b>".$f_name."".$l_name."<br>
		<b>Email : </b>".$email."<br>
		<b>Klik </b> <a href='http://localhost/bale_dulur/activasi.php?token=$token'>Konfirmasi</a> untuk mengaktifkan email anda<br>
		</div>
		</body>";
		$body             = eregi_replace("[\]",'',$body);
		$mail->IsSMTP(); 	// menggunakan SMTP
		//$mail->SMTPDebug  = 1;   // mengaktifkan debug SMTP

		$mail->SMTPAuth   = true;   // mengaktifkan Autentifikasi SMTP
		$mail->Host 	= 'in-v3.mailjet.com'; // Gunakan Ip Shared Address Hosting Anda
		$mail->Port       = 587;  // post gunakan port 25
		$mail->Username   = "4fa65dde853ac738dec3576784b3cc12"; // username email akun
		$mail->Password   = "07f919fd98012389b3e0dcba56b4535a";        // password akun

		$mail->SetFrom('nduk.dina@gmail.com', 'Bale Dulur');

		$mail->Subject    = "Hello";
		$mail->MsgHTML($body);

		$address = $email; //email tujuan
		$mail->AddAddress($address, "Hello (Reciever name)");

		if(!$mail->Send()) {
			echo "Oops, Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Mail Sukses";
		}
	}

}

?>