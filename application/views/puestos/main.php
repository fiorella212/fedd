<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Puestos de Trabajo</h5>
			</div>
			<div class="panel-body">

				<a href="<?php echo site_url('puestos/importar'); ?>"
				   class="btn btn-sm btn-primary" id="btnExportarPuesto">Importar</a>
				<a href="<?php echo site_url('puestos/exportar'); ?>" target="_blank"
				   class="btn btn-sm btn-primary" id="btnExportarPuesto">Exportar</a>
				<a href="<?php echo site_url('puestos/nuevo'); ?>" class="btn btn-sm btn-default" id="btnNuevoPuesto">Nuevo</a>
				<div class="table-responsive">

					<table class="table table-striped table-responsive table_puestos_manager" id="tblPuestos">
						<thead>
						<th>ID</th>
						<th>Denominaci&oacute;n Sabha</th>
						<!--					<th>&Aacute;rea de Trabajo</th>-->
						<th>Entrevistado</th>
						<th>Apto / No Apto</th>
						<th>Estado</th>
						<th>Acciones</th>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>


			</div>
		</div>
	</div>

</div>
<div class="modal fade" tabindex="-1" role="dialog" id="importPuestosModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Importar Puestos de Trabajo</h4>
			</div>
			<div class="modal-body">
				<p>Seleccionar fichero a importar</p>

				<?php echo form_open_multipart('upload/do_upload'); ?>
				<div class="col-lg-12">
					<select name="cmbArea" id="cmbArea" class="control-form">
						<option>Area</option>
					</select>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-4"><input type="file" name="importFile" id="importFile" size="20"/></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-4"><input type="button" value="Importar"
												 class="btn btn-primary btnImportarPuestosFile"/></div>
				</div>


				<br/><br/>

				</form>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-delete-puestos" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title font-bold">Eliminar Puesto</h5>
			</div>
			<div class="modal-body">
				<p>¿Desea eliminar el puesto de trabajo?</p>
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

		var table_puestos_manager = $('.table_puestos_manager'),
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
					"url": "<?php echo site_url('puestos/getAll'); ?>",
					"type": "POST",
					"dataType": 'json'
				},
				"dom": '<f<t>ip>',
				"sPaginationType": "full_numbers",
				"columns": [
					{"data": "id"},
					{"data": "denominacion_sabha"},
					{"data": "entrevistado_nombre"},
					{"data": "es_apto"},
					{"data": "estado_registro"}
				]
				,
				"columnDefs": [
					{
						"targets": [0],
						"visible": false
					},
					{
						"targets": [5],
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
				window.location.href = '<?php echo site_url("puestos/edit/")?>' + puestos_data.id;
			});
		}

		function config_event_btn_delete() {
			table_puestos_manager.find('tbody').on('click', 'tr .btn-delete', function () {
				var puestos_data = datatable_puestos_manager.row($(this).parent().parent()).data();
				$('#modal-delete-puestos').modal('show');

				config_btn_delete_usuario(puestos_data)


			});
		}

		function config_btn_delete_usuario(usuario_data) {
			var btn_delete = $('#modal-delete-puestos').find('.btn-delete');
			btn_delete.unbind();
			btn_delete.click(function () {

				$.ajax({
					url:"<?php echo site_url("puestos/eliminar")?>",
					dataType: 'json',
					method: 'POST',
					data: {
						txtPuestoId: usuario_data.id
					}
				}).done(function (response) {
					if (response.status) {
						alert(response.result);
						datatable_puestos_manager.ajax.reload();
						$('#modal-delete-puestos').modal('hide');
					} else {
						alert(response.result);
					}
				});



//				var url = "<?php //echo site_url('usuario/delete'); ?>//",
//					data_type = 'json',
//					data = {'id': usuario_data.id};
//				var response_delete = get_ajax_response(url, data_type, data);
//				response_delete.done(function (response) {
//					modal_delete_usuario.modal('hide');
//					alert(response.result);
//					datatable_usuario_manager.ajax.reload();
//
//				});
//				response_delete.fail(function (jqXHR, textStatus, errorThrown) {
//					modal_delete_usuario.modal('hide');
//					alert(jqXHR.status + ' (' + errorThrown + ')');
//				});
			});

		}


		$('#btnImportarPuesto').on('click', function (e) {
			e.preventDefault();
			$('#importPuestosModal').modal('show');
		});


		$(".btnImportarPuestosFile").on('click', function (e) {
			e.preventDefault();


			var file_data = $('#importFile').prop('files')[0];
			var form_data = new FormData();
			form_data.append('file', file_data);
			$.ajax({
				url: "<?php echo site_url('puestos/upload_file'); ?>", // point to server-side controller method
				dataType: 'text', // what to expect back from the server
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: function (response) {

				    alert(response);
				},
				error: function (response) {
					alert(response);
				}
			});

		});


	});
</script>
