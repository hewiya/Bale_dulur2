<!-- 										-->
<!-- 										-->
<!-- 			Belum dipakai !!!			-->
<!-- 										-->
<!-- 										-->

<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
<a href="<?php echo base_url('index.php/user/edit_profil'); ?>" class="btn btn-primary">Kembali</a>

</body>
</html>