<!DOCTYPE html>
<html>
<head>
	<title>:: Puestos de Trabajo ::</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/components/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/components/parsleyjs/src/parsley.css" type="text/css"/>


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/custom.css">
    <link el="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/components/jquery-multiselect/jquery.multiselect.css"/>

	<script type="text/javascript" src="<?php echo base_url(); ?>public/components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/components/datatables/media/js/dataTables.bootstrap.min.js"></script>
<!--	<script type="text/javascript" src="--><?php //echo base_url(); ?><!--public/components/jspdf/dist/jspdf.debug.js"></script>-->
<!--	<script type="text/javascript" src="--><?php //echo base_url(); ?><!--public/components/jspdf/libs/html2pdf.js"></script>-->
    <script src="<?php echo base_url(); ?>public/components/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>public/components/parsleyjs/dist/i18n/es.js"></script>


	<script type="text/javascript" src="<?php echo base_url(); ?>public/components/select2/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/components/jquery-multiselect/jquery.multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/uploadjs.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/isloading/jquery.isloading.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/js/isloading/isloading.css">
	<style>
		body {
			font-family: "Verdana";
			font-size: 12px;
		}
		.form-horizontal .control-label{
			text-align: left;
		}
	</style>
	<script>
		function groupTable($rows, startIndex, total) {
			if (total === 0) {
				return;
			}
			var i, currentIndex = startIndex, count = 1, lst = [];
			var tds = $rows.find('td:eq(' + currentIndex + ')');
			var ctrl = $(tds[0]);
			lst.push($rows[0]);
			for (i = 1; i <= tds.length; i++) {
				if (ctrl.text() == $(tds[i]).text()) {
					count++;
					$(tds[i]).addClass('deleted');
					lst.push($rows[i]);
				}
				else {
					if (count > 1) {
						ctrl.attr('rowspan', count);
						ctrl.css('vertical-align', 'middle');

						groupTable($(lst), startIndex + 1, total - 1)
					}
					count = 1;
					lst = [];
					ctrl = $(tds[i]);
					lst.push($rows[i]);
				}
			}
		}
		$(document).ready(function() {
			$("select").select2();
		});
	</script>

</head>
<body>

