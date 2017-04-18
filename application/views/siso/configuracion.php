<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Configuraci&oacute;n de Cuestionario SISO</h5>
			</div>
			<div class="panel-body">

				<a class="btn btn-sm btn-primary" id="btnExport">Exportar</a>
				<a href="<?php echo site_url('siso/pregunta'); ?>"class="btn btn-sm btn-default" id="btnNuevaPregunta">Nuevo</a>

				<table class="table table-striped table-empresa-manager" id="tblEmpresas">
					<thead>
					<th>Id</th>
					<th>Preguntas</th>
					<th>Grupo</th>
					<th>Tipo Riesgo</th>
					<th>Acciones</th>
					</thead>
					<tbody>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>


<div id="modal-delete-pregunta" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title font-bold">Eliminar Pregunta</h5>
			</div>
			<div class="modal-body">
				<p>¿Desea eliminar la pregunta?</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button class="btn btn-danger btn-delete">Eliminar</button>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function () {

		var table_puestos_manager = $('.table-empresa-manager'),
			datatable_puestos_manager = null;

		config_datatable_empresa_manager();
		config_event_btn_edit();
		config_event_btn_delete();

		function config_datatable_empresa_manager() {
			datatable_puestos_manager = table_puestos_manager.DataTable({
				"language": {
					"sProcessing":    "Procesando...",
					"sLengthMenu":    "Mostrar _MENU_ registros",
					"sZeroRecords":   "No se encontraron resultados",
					"sEmptyTable":    "Ningún dato disponible en esta tabla",
					"sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":   "",
					"sSearch":        "Buscar:",
					"sUrl":           "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":    "Último",
						"sNext":    "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},
				"processing": true,
				"serverSide": false,
				"ajax": {
					"url": "<?php echo site_url('siso/getPreguntasAll'); ?>",
					"type": "POST",
					"dataType": 'json'
				},
				"dom": '<f<t>ip>',
				"sPaginationType": "full_numbers",
				"columns": [
					{"data": "id"},
					{"data": "pregunuta"},
					{"data": "grupo"},
					{"data": "tipo_riesgo"}

				]
				,
				"columnDefs": [
					{
						"targets": [0],
						"visible": false
					},
					{
						"targets": [4],
						"data": null,
						"defaultContent": '<a class="btn btn-warning btn-xs m-l-n m-r-n btn-edit">Editar</a>' +
						'  <a class="btn btn-danger btn-xs m-l-n m-r-n btn-delete">Eliminar</a>'
					}
				]
			});
		}

		function config_event_btn_edit() {
			table_puestos_manager.find('tbody').on('click', 'tr .btn-edit', function () {
				var puestos_data = datatable_puestos_manager.row($(this).parent().parent()).data();
				window.location.href = '<?php echo site_url("siso/editarPregunta/")?>' + puestos_data.id;
			});
		}

		function config_event_btn_delete() {
			table_puestos_manager.find('tbody').on('click', 'tr .btn-delete', function () {
				var puestos_data = datatable_puestos_manager.row($(this).parent().parent()).data();
				$('#modal-delete-pregunta').modal('show');
				config_btn_delete_pregunta(puestos_data);
			});
		}

		function get_ajax_response(url, data_type, data) {
			return $.ajax({
				url: url,
				type: 'POST',
				data: data,
				dataType: data_type
			});
		}

		function config_btn_delete_pregunta(puestos_data) {
			var btn_delete = $('#modal-delete-pregunta').find('.btn-delete');
			btn_delete.unbind();
			btn_delete.click(function () {
				var url = "<?php echo site_url('siso/deletePregunta'); ?>",
					data_type = 'json',
					data = {'id': puestos_data.id};
				var response_delete = get_ajax_response(url, data_type, data);
				response_delete.done(function (response) {
					$('#modal-delete-pregunta').modal('hide');
					alert(response.result);
					datatable_puestos_manager.ajax.reload();

				});
				response_delete.fail(function (jqXHR, textStatus, errorThrown) {
					$('#modal-delete-pregunta').modal('hide');
					alert(jqXHR.status + ' (' + errorThrown + ')');
				});
			});

		}

		$('#btnExport').on('click',function(e){
			e.preventDefault();
			$("body").isLoading({
				text: "Cargando... ",
				position: "overlay",
				'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
			});

			$.ajax({
				url: "<?php echo site_url('siso/exportar'); ?>",
				dataType: 'json',
				method: 'POST'

			}).done(function (res) {
				$("body").isLoading('hide');
				if(res.status){
					window.open(res.result.file_url);
				}else{
					alert(res.result);
				}

			});


		});

	});
</script>
