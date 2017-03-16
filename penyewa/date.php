    <!DOCTYPE html>
    <html>
    <head>
    <title>Menampilkan Datepicker di Modal Bootstrap</title>
	    <style>

    .datepicker{z-index:1151;}

    </style>
    <link rel=”stylesheet” href=”css/bootstrap.css”>
    <link rel=”stylesheet” href=”css/datepicker.css”>
    <script src=”js/bootstrap.js”></script>
    <script src=”js/jquery.js”></script>
    <style>
    .datepicker{z-index:1151;}
    </style>
    <script>
    $(function(){
    $(“#tanggal”).datepicker({
    format:’yyyy/dd/mm’
    });
    });
    </script>
    </head>
    <body>
    <div>
    <a href=”#myModal” role=”button” data-toggle=”modal”>Tampilkan Modal</a>

    <!– modal–>
    <div id=”myModal” tabindex=”-1? role=”dialog” aria-labelledby=”myModalLabel” aria-hidden=”true”>
    <div>
    <button type=”button” data-dismiss=”modal” aria-hidden=”true”>&times;</button>
    <h3>Belajar Datepicker</h3>
    </div>
    <div>
    <label>Tanggal</label>
    <input type=”text” id=”tanggal”>
    </div>
    </div>
    </div>

    <!–javascript here–>
    <script src=”js/bootstrap-modal.js”></script>
    <script src=”js/bootstrap-transition.js”></script>
    <script src=”js/bootstrap-datepicker.js”></script>
    </body>
    </html>