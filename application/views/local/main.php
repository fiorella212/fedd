<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Sedes</h5>
			</div>
			<div class="panel-body">

				<a id="btnExport" class="btn btn-sm btn-primary">Exportar</a>
<!--				<input type="button" class="button btn" value="Exportar" id="btnExportarLocal">-->
				<input type="button" class="btn btn-sm btn-default btn-new" value="Nuevo" id="btnNuevoLocal">

				<table class="table table-striped table-local-manager" id="tblLocales">
					<thead>
					<th>id_empresa</th>
					<th>Raz&oacute;n Social</th>
                    <th>id_local</th>
					<th>Sede</th>
					<th>Direcci&oacute;n</th>
					<th>Ubicaci&oacute;n</th>
					<th>Encargado</th>
					<th>Tel&eacute;fono</th>
					<th>Email</th>
					<th>Acciones</th>
					</thead>
					<tbody>

					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-new-local">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Nueva Sede</h4>
			</div>
			<div class="modal-body">

				<form action="" class="form-horizontal form-local" id="frmNewLocal">
					<div class="form-group">
						<label for="cmbRazonSocial" class="col-sm-2 control-label">Raz&oacute;n Social</label>
						<div class="col-sm-10">
							<select class="form-control required id_empresa" required name="id_empresa" id="CbxEmpresa" style="width: 100%;">
								<option value="">Seleccione</option>
								<?php
								foreach($empresas as $value){
									echo '<option value="'.$value['id'].'">'.$value['razon_social'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombreLocal" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required nombre" required id="txtNombreLocal" placeholder="Nombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDireccionLocal" class="col-sm-2 control-label">Direcci&oacute;n</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required direccion" required id="txtDireccionLocal" placeholder="Direccion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtUbicacionLocal" class="col-sm-2 control-label">Ubicaci&oacute;n</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required ubicacion" required id="txtUbicacionLocal" placeholder="Ubicacion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEncargadoLocal" class="col-sm-2 control-label">Encargado</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required encargado" required id="txtEncargadoLocal" placeholder="Encargado">
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefonoLocal" class="col-sm-2 control-label">Tel&eacute;fono</label>
						<div class="col-sm-10">
							<input type="text" class="form-control telefono" id="txtTelefonoLocal" placeholder="Telefono">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmailLocal" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control email" id="txtEmailLocal" placeholder="Email">
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-save">Registrar Sede</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-local">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Actualizar Sede</h4>
            </div>
            <div class="modal-body">

                <form action="" class="form-horizontal form-local" id="frmEditLocal">
                    <div class="form-group">
                        <label for="cmbRazonSocial" class="col-sm-2 control-label">Raz&oacute;n Social</label>
                        <div class="col-sm-10">
                            <select class="form-control required id_empresa" required name="id_empresa" id="CbxEmpresa" style="width: 100%;">
                                <option value="">Seleccione</option>
                                <?php
                                foreach($empresas as $value){
                                    echo '<option value="'.$value['id'].'">'.$value['razon_social'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtNombreLocal" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control required nombre" required id="txtNombreLocal" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtDireccionLocal" class="col-sm-2 control-label">Direcci&oacute;n</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control required direccion" required id="txtDireccionLocal" placeholder="Direccion">
                        </div>
                    </div>
					<div class="form-group">
						<label for="txtUbicacionLocal" class="col-sm-2 control-label">Ubicaci&oacute;n</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required ubicacion" required id="txtUbicacionLocal" placeholder="Ubicacion">
						</div>
					</div>
                    <div class="form-group">
                        <label for="txtEncargadoLocal" class="col-sm-2 control-label">Encargado</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control required encargado" required id="txtEncargadoLocal" placeholder="Encargado">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtTelefonoLocal" class="col-sm-2 control-label">Tel&eacute;fono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control telefono" id="txtTelefonoLocal" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtEmailLocal" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control email" id="txtEmailLocal" placeholder="Email">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-edit">Actualizar Sede</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-delete-local" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title font-bold">Eliminar Sede</h5>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar sede?</p>
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
		var table_local_manager = $('.table-local-manager'),
			datatable_local_manager = null;

        var btn_new_local = $('.btn-new'),
            modal_new_local = $('#modal-new-local'),
            modal_edit_local = $('#modal-edit-local'),
            modal_delete_local = $('#modal-delete-local'),
            form_element = {
                id_empresa: 'id_empresa',
                nombre: 'nombre',
                direccion: 'direccion',
                ubicacion: 'ubicacion',
                encargado: 'encargado',
                telefono: 'telefono',
                email: 'email'
            };

        config_datatable_local_manager();
        config_event_btn_new();
        config_event_btn_edit();
        config_event_btn_delete();



        function config_datatable_local_manager() {
            datatable_local_manager = table_local_manager.DataTable({
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
                    "url": "<?php echo site_url('local/getAll'); ?>",
                    "type": "POST",
                    "dataType": 'json'
                },

                "dom": '<f<t>ip>',
                "sPaginationType": "full_numbers",
                "columns": [
                    {"data": "id_empresa"},
                    {"data": "razon_social"},
                    {"data": "id_local"},
                    {"data": "nombre"},
                    {"data": "direccion"},
                    {"data": "ubicacion"},
                    {"data": "encargado"},
                    {"data": "telefono"},
                    {"data": "email"}

                ]
                ,
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false
                    },
                    {
                        "targets": [2],
                        "visible": false
                    },
                    {
                        "targets": [7],
                        "visible": false
                    },
                    {
                        "targets": [9],
                        "data": null,
                        "defaultContent": '<button class="btn btn-warning btn-xs m-l-n m-r-n btn-edit">Editar</button>' +
                        '  <button class="btn btn-danger btn-xs m-l-n m-r-n btn-delete">Eliminar</button>'
                    }
                ]
            });
        }

        function config_event_hide_modal(modal) {
            modal.find('.form-local').parsley().reset();
            modal.find('.' + form_element.id_empresa).val('').trigger("change");
            modal.find('.' + form_element.nombre).val('');
            modal.find('.' + form_element.direccion).val('');
            modal.find('.' + form_element.ubicacion).val('');
            modal.find('.' + form_element.encargado).val('');
            modal.find('.' + form_element.telefono).val('');
            modal.find('.' + form_element.email).val('');
        }
        function get_form_values_(form) {
            return {
                id_empresa: form.find('.' + form_element.id_empresa).val(),
                nombre: form.find('.' + form_element.nombre).val(),
                direccion: form.find('.' + form_element.direccion).val(),
                ubicacion: form.find('.' + form_element.ubicacion).val(),
                encargado: form.find('.' + form_element.encargado).val(),
                telefono: form.find('.' + form_element.telefono).val(),
                email: form.find('.' + form_element.email).val(),
            };
        }

        function get_ajax_response(url, data_type, data) {
            return $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: data_type
            });
        }

        function config_event_btn_new() {
            btn_new_local.unbind();
            btn_new_local.click(function () {
                config_event_hide_modal(modal_new_local);
                modal_new_local.modal('show');
            });

            var btn_save_new_local = modal_new_local.find('.btn-save');
            btn_save_new_local.click(function () {
                if ($('#frmNewLocal').parsley().validate()) {
                    var url = "<?php echo site_url('local/insert'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_new_local.find('.form-local'));

                    var response_save = get_ajax_response(url, data_type, data);
                    response_save.done(function (response) {
                        if(response.status) {
                            modal_new_local.modal('hide');
                            alert(response.result);
                            datatable_local_manager.ajax.reload();
                        }else{
//                            modal_new_local.modal('hide');
                            alert(response.result);
                        }
                    });
                    response_save.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_new_local.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_edit() {
            table_local_manager.find('tbody').on('click', 'tr .btn-edit', function () {
                config_event_hide_modal(modal_edit_local);
                var local_data = datatable_local_manager.row($(this).parent().parent()).data();
                modal_edit_local.modal('show');
                modal_edit_local.find('.' + form_element.id_empresa).val(local_data.id_empresa).trigger("change");;
                modal_edit_local.find('.' + form_element.nombre).val(local_data.nombre);
                modal_edit_local.find('.' + form_element.direccion).val(local_data.direccion);
                modal_edit_local.find('.' + form_element.ubicacion).val(local_data.ubicacion);
                modal_edit_local.find('.' + form_element.encargado).val(local_data.encargado);
                modal_edit_local.find('.' + form_element.telefono).val(local_data.telefono);
                modal_edit_local.find('.' + form_element.email).val(local_data.email);
                config_btn_edit_local(local_data);
            });
        }

        function config_btn_edit_local(data_local) {
            var btn_edit = modal_edit_local.find('.btn-edit');
            btn_edit.unbind();
            btn_edit.click(function () {
                if ($('#frmEditLocal').parsley().validate()) {
                    var url = "<?php echo site_url('local/update'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_edit_local.find('.form-local'));
                    data.id = data_local.id_local;
                    var response_edit = get_ajax_response(url, data_type, data);
                    response_edit.done(function (response) {
                        modal_edit_local.modal('hide');
                        alert(response.result);
                        datatable_local_manager.ajax.reload();
                    });
                    response_edit.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_edit_local.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_delete() {
            table_local_manager.find('tbody').on('click', 'tr .btn-delete', function () {
                var local_data = datatable_local_manager.row($(this).parent().parent()).data();
                modal_delete_local.modal('show');
                config_btn_delete_local(local_data);
            });
        }


        function config_btn_delete_local(local_data) {
            var btn_delete = modal_delete_local.find('.btn-delete');
            btn_delete.unbind();
            btn_delete.click(function () {
                var url = "<?php echo site_url('local/delete'); ?>",
                    data_type = 'json',
                    data = {'id': local_data.id_local};
                var response_delete = get_ajax_response(url, data_type, data);
                response_delete.done(function (response) {
                    modal_delete_local.modal('hide');
                    alert(response.result);
                    datatable_local_manager.ajax.reload();

                });
                response_delete.fail(function (jqXHR, textStatus, errorThrown) {
                    modal_delete_local.modal('hide');
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
				url: "<?php echo site_url('local/exportar'); ?>",
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
