<!--                              -->
<!--                              -->
<!--      Belum dipakai !!!       -->
<!--                              -->
<!--                              -->

<?php
    include("configg.php");
    $id=$_GET['id'];
    $query=mysql_query("select * from lokasi where nomor='$id'") or die (mysql_error());
    $puasa=mysql_fetch_array($query);
?>
<html>
 
<head>
<title>Lat Long Picker</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/messages.js"></script>
<script src="if_gmap.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<center>
<body onload="if_gmap_init();"><p>
<form name="form" id="form" class="form" onsubmit="return validate(this)" action="edite.php" method="post" enctype="multipart/form-data">
 
        <div id="maparea" style="background-color: #E0E0E0;"></div>
        <div id="mapitems" style="width: 520px; height: 380px"></div>
        <p>
        <table align="">
        <tr>
           <td>LAT</td><td>:</td>
           <td><label>
              <input type="text" size="30" name="lat" id="x" value="<?php echo "$puasa[lat]"; ?>">
           </label></td>
       </tr>
       <tr>
           <td>LANG</td><td>:</td>
           <td><label>
              <input type="text" size="30" name="lng" id="y" value="<?php echo "$puasa[lng]"; ?>">
           </label></td>
       </tr>
        <tr>
           <td>NAMA</td><td>:</td>
           <td><label>
              <input type="text" size="30" name="nama" id="nama" value="<?php echo "$puasa[nama]"; ?>">
           </label></td>
       </tr>
       <tr>
            <td>DESKRIPSI</td><td>:</td>
            <td><label>
                 <textarea name="deskripsi" rows="2" cols="45" id="deskripsi" style="width: 40%" ><?php echo "$puasa[deskripsi]"; ?></textarea>
              </label></td>
       </tr>
       <tr><td>JENIS TEMPAT</td><td>:</td>
            <td><label><select name="jenis">
            <?php 
            if ($puasa['jenis'] == "piknik") 
            echo "<option value='piknik' selected>Rekreasi</option>";
            else echo "<option value='piknik'>Rekreasi</option>";
             
            if ($puasa['jenis'] == "restoran")
            echo "<option value='restoran' selected>Restoran</option>";
            else echo "<option value='restoran'>Restoran</option>";
             
            if ($puasa['jenis'] == "masjid")
            echo "<option value='masjid' selected>Masjid</option>";
            else echo "<option value='masjid'>Masjid</option>";
            ?>
            </label>
            </td>
        </tr><td></td><td></td>
       <td><input class="button" type="submit" name="edit" value="simpan"><input type=button onClick="location.href='index.php'" value='kembali'></td>
        <input type="hidden" name="nomor" value="<?php echo $_GET[id]; ?>" />
        </table>
        </form>
          <div class="cleaner"></div>
      </div>
</div>
</body>
</center>
</html>