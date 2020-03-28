<!DOCTYPE html>
<html>
<head>
	<title>Daftar Kamar Tamu/Siswa</title>
	<link href="<?php echo base_url("/assets/"); ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url("/assets/"); ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
</head>
<body id="printThis" class="mx-auto">
<div class="container">
<table class="table table-border table-bordered table-stripped">

  <tbody>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?= $guest['name']; ?></td>
    </tr><tr>
      <td>Telpon</td>
      <td>:</td>
      <td><?= $guest['telpon']; ?></td>
    </tr><tr>
      <td>Nomor Kamar</td>
      <td>:</td>
      <td><?= $guest['ruangan']; ?></td>
    </tr><tr>
      <td>Jumlah Orang</td>
      <td>:</td>
      <td><?= $guest['total_people']; ?></td>
    </tr><tr>
      <td>Lama</td>
      <td>:</td>
      <td><?= $guest['range_day']; ?>  Hari</td>
    </tr><tr>
      <td>Check In</td>
      <td>:</td>
      <td><?= $guest['check_in']; ?></td>
    </tr><tr>
      <td>Check Out</td>
      <td>:</td>
      <td><?= $guest['check_out']; ?></td>
    </tr><tr>
      </tr><tr>
      <td>Harga</td>
      <td>:</td>
      <td><?= $guest['cost']; ?></td>
    </tr><tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><?= $guest['deskripsi']; ?></td>
    </tr>
  </tbody>
</table>
</div>
	<script src="<?php echo base_url("/assets/"); ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url("/assets/"); ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>js/printThis.js"></script>
    <script type="text/javascript">
    	
    	$(document).ready(function () {
    		$('#printThis').printThis(
    			{
			    debug: false,               // show the iframe for debugging
			    importCSS: true,            // import parent page css
			    importStyle: false,         // import style tags
			    printContainer: true,       // print outer container/$.selector
			    loadCSS: "<?php echo base_url('/assets/'); ?>vendor/bootstrap-4.1/bootstrap.min.css",                // path to additional css file - use an array [] for multiple
			    pageTitle: "",              // add title to print page
			    removeInline: false,        // remove inline styles from print elements
			    removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
			    printDelay: 333,            // variable print delay
			    header: "<h1 class='text-center mb-5'>Daftar Kamar Tamu/Siswa</h1>",               // prefix to html
			    footer: null,               // postfix to html
			    base: false,                // preserve the BASE tag or accept a string for the URL
			    formValues: true,           // preserve input/form values
			    canvas: false,              // copy canvas content
			    doctypeString: '<!DOCTYPE html>',       // enter a different doctype for older markup
			    removeScripts: false,       // remove script tags from print content
			    copyTagClasses: false,      // copy classes from the html & body tag
			    beforePrintEvent: null,     // function for printEvent in iframe
			    beforePrint: null,          // function called before iframe is filled
			    afterPrint: null            // function called before iframe is removed
			});
    	});
    </script>
</body>
</html>