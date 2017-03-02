<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Configuraci&oacute;n de Usuarios</h5>
			</div>
			<div class="panel-body">

				<a href="#" id="btnExport" class="btn btn-sm btn-primary">Exportar</a>
				<input type="button" class="btn btn-sm btn-default btn-new" value="Nuevo" id="btnNuevoUsuario">

				<table class="table table-striped table-usuario-manager" id="tblUsuario">
					<thead>
					<th>id</th>
					<th>Nombres</th>
					<th>nombres</th>
					<th>Apellidos</th>
					<th>Tel&eacute;fono</th>
					<th>E-mail</th>
					<th>id_rol</th>
					<th>Rol</th>
					<th>Usuario</th>
					<th>contrasena</th>
					<th>Acciones</th>
					</thead>
					<tbody>

					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-new-usuario">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal form-usuario" id="frmNewUsuario">

					<div class="form-group">
						<label for="txtNombreUsuario" class="col-sm-2 control-label">Nombres</label>
						<div class="col-sm-10">
							<input type="text" class="form-control nombres" id="txtNombreUsuario"
								   name="txtNombreUsuario"
								   placeholder="Nombre del nombres" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtApellidosUsuario" class="col-sm-2 control-label">Apellidos</label>
						<div class="col-sm-10">
							<input type="text" class="form-control apellidos" id="txtApellidosUsuario"
								   name="txtApellidosUsuario"
								   placeholder="Apellidos del apellidos" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefonoUsuario" class="col-sm-2 control-label">Tel&eacute;fono</label>
						<div class="col-sm-10">
							<input type="text" class="form-control telefono" id="txtTelefonoUsuario"
								   name="txtTelefonoUsuario"
								   placeholder="Telefono de Usuario">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmailUsuario" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" class="form-control email" id="txtEmailUsuario" name="txtEmailUsuario"
								   placeholder="Email de Usuario" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cmbRolUsuario" class="col-sm-2 control-label">Rol</label>
						<div class="col-sm-10">
							<select class="form-control id_rol" required name="cmbRolUsuario" id="cmbRolUsuario" style="width: 100%;">
								<option value="">Seleccione</option>
								<?php
								foreach ($roles as $value) {
									echo '<option value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtUsuario" class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10">
							<input type="text" class="form-control usuario" id="txtUsuario" name="txtUsuario"
								   placeholder="Ingrese Usuario" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPassword" class="col-sm-2 control-label">Contrase&ntilde;a</label>
						<div class="col-sm-10">
							<input type="password" class="form-control contrasena" id="txtPassword" name="txtPassword"
								   placeholder="Ingrese una Contrase&ntilde;a" required>
						</div>
					</div>

				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-save">Registrar Usuario</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-usuario">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Actualizar Usuario</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal form-usuario" id="frmEditUsuario">

					<div class="form-group">
						<label for="txtNombreUsuario" class="col-sm-2 control-label">Nombres</label>
						<div class="col-sm-10">
							<input type="text" class="form-control nombres" id="txtNombreUsuario"
								   name="txtNombreUsuario"
								   placeholder="Nombre del nombres" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtApellidosUsuario" class="col-sm-2 control-label">Apellidos</label>
						<div class="col-sm-10">
							<input type="text" class="form-control apellidos" id="txtApellidosUsuario"
								   name="txtApellidosUsuario"
								   placeholder="Apellidos del apellidos" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefonoUsuario" class="col-sm-2 control-label">Tel&eacute;fono</label>
						<div class="col-sm-10">
							<input type="text" class="form-control telefono" id="txtTelefonoUsuario"
								   name="txtTelefonoUsuario"
								   placeholder="Telefono de Usuario">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmailUsuario" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" class="form-control email" id="txtEmailUsuario" name="txtEmailUsuario"
								   placeholder="Email de Usuario" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cmbRolUsuario" class="col-sm-2 control-label">Rol</label>
						<div class="col-sm-10">
							<select class="form-control id_rol" required name="cmbRolUsuario" id="cmbRolUsuario" style="width: 100%;">
								<option value="">Seleccione</option>
								<?php
								foreach ($roles as $value) {
									echo '<option value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtUsuario" class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10">
							<input type="text" class="form-control usuario" id="txtUsuario" name="txtUsuario"
								   placeholder="Ingrese Usuario" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPassword" class="col-sm-2 control-label">Contrase&ntilde;a</label>
						<div class="col-sm-10">
							<input type="password" class="form-control contrasena" id="txtPassword" name="txtPassword"
								   placeholder="Ingrese una Contrase&ntilde;a" required>
						</div>
					</div>

				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-edit">Actualizar Usuario</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-delete-usuario" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title font-bold">Eliminar Usuario</h5>
			</div>
			<div class="modal-body">
				<p>¿Desea eliminar el usuario?</p>
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
		var table_usuario_manager = $('.table-usuario-manager'),
			datatable_usuario_manager = null;

		var btn_new_usuario = $('.btn-new'),
			modal_new_usuario = $('#modal-new-usuario'),
			modal_edit_usuario = $('#modal-edit-usuario'),
			modal_delete_usuario = $('#modal-delete-usuario'),
			form_element = {
				nombres: 'nombres',
				apellidos: 'apellidos',
				telefono: 'telefono',
				email: 'email',
				usuario: 'usuario',
				contrasena: 'contrasena',
				id_rol: 'id_rol'
			};

		config_datatable_usuario_manager();
		config_event_btn_new();
		config_event_btn_edit();
		config_event_btn_delete();

		function config_datatable_usuario_manager() {
			datatable_usuario_manager = table_usuario_manager.DataTable({
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
					"url": "<?php echo site_url('usuario/getAll'); ?>",
					"type": "POST",
					"dataType": 'json'
				},

				"dom": '<f<t>ip>',
				"sPaginationType": "full_numbers",
				"columns": [
					{"data": "id"},
					{"data": "nombre_completo"},
					{"data": "nombres"},
					{"data": "apellidos"},
					{"data": "telefono"},
					{"data": "email"},
					{"data": "id_rol"},
					{"data": "rol"},
					{"data": "usuario"},
					{"data": "contrasena"}

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
                        "targets": [3],
                        "visible": false
                    },
					{
						"targets": [6],
						"visible": false
					},
                    {
                        "targets": [9],
                        "visible": false
                    },
					{
						"targets": [10],
						"data": null,
						"defaultContent": '<button class="btn btn-warning btn-xs m-l-n m-r-n btn-edit">Editar</button>' +
						'  <button class="btn btn-danger btn-xs m-l-n m-r-n btn-delete">Eliminar</button>'
					}
				]
			});
		}

		function config_event_hide_modal(modal) {
			modal.find('.form-usuario').parsley().reset();
			modal.find('.' + form_element.nombres).val('');
			modal.find('.' + form_element.apellidos).val('');
			modal.find('.' + form_element.telefono).val('');
			modal.find('.' + form_element.email).val('');
			modal.find('.' + form_element.usuario).val('');
			modal.find('.' + form_element.contrasena).val('');
			modal.find('.' + form_element.id_rol).val('');

		}

		function get_form_values_(form) {
			return {
				nombres: form.find('.' + form_element.nombres).val(),
				apellidos: form.find('.' + form_element.apellidos).val(),
				telefono: form.find('.' + form_element.telefono).val(),
				email: form.find('.' + form_element.email).val(),
				usuario: form.find('.' + form_element.usuario).val(),
				contrasena: form.find('.' + form_element.contrasena).val(),
				id_rol: form.find('.' + form_element.id_rol).val()
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
			btn_new_usuario.unbind();
			btn_new_usuario.click(function () {
				config_event_hide_modal(modal_new_usuario);
				modal_new_usuario.modal('show');
			});

			var btn_save_new_usuario = modal_new_usuario.find('.btn-save');
			btn_save_new_usuario.click(function () {
				if ($('#frmNewUsuario').parsley().validate()) {
					var url = "<?php echo site_url('usuario/insert'); ?>",
						data_type = 'json',
						data = get_form_values_(modal_new_usuario.find('.form-usuario'));

					var response_save = get_ajax_response(url, data_type, data);
					response_save.done(function (response) {
						if (response.status) {
							modal_new_usuario.modal('hide');
							alert(response.result);
							datatable_usuario_manager.ajax.reload();
						} else {
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
			table_usuario_manager.find('tbody').on('click', 'tr .btn-edit', function () {
				config_event_hide_modal(modal_edit_usuario);
				var usuario_data = datatable_usuario_manager.row($(this).parent().parent()).data();
				modal_edit_usuario.modal('show');
				modal_edit_usuario.find('.' + form_element.nombres).val(usuario_data.nombres);
				modal_edit_usuario.find('.' + form_element.apellidos).val(usuario_data.apellidos);
				modal_edit_usuario.find('.' + form_element.telefono).val(usuario_data.telefono);
				modal_edit_usuario.find('.' + form_element.email).val(usuario_data.email);
				modal_edit_usuario.find('.' + form_element.usuario).val(usuario_data.usuario);
				modal_edit_usuario.find('.' + form_element.contrasena).val(usuario_data.contrasena);
				modal_edit_usuario.find('.' + form_element.id_rol).val(usuario_data.id_rol).trigger("change");;

				config_btn_edit_usuario(usuario_data);
			});
		}

		function config_btn_edit_usuario(data_usuario) {
			var btn_edit = modal_edit_usuario.find('.btn-edit');
			btn_edit.unbind();
			btn_edit.click(function () {
				if ($('#frmEditUsuario').parsley().validate()) {
					var url = "<?php echo site_url('usuario/update'); ?>",
						data_type = 'json',
						data = get_form_values_(modal_edit_usuario.find('.form-usuario'));
					data.id = data_usuario.id;
					var response_edit = get_ajax_response(url, data_type, data);
					response_edit.done(function (response) {
						if(response.status){
                            modal_edit_usuario.modal('hide');
                            alert(response.result);
                            datatable_usuario_manager.ajax.reload();
                        }else{
                            alert(response.result)
                        }

					});
					response_edit.fail(function (jqXHR, textStatus, errorThrown) {
						alert(jqXHR.status + ' (' + errorThrown + ')');
					});
				}
			});
		}

		function config_event_btn_delete() {
			table_usuario_manager.find('tbody').on('click', 'tr .btn-delete', function () {
				var usuario_data = datatable_usuario_manager.row($(this).parent().parent()).data();
				modal_delete_usuario.modal('show');
				config_btn_delete_usuario(usuario_data);
			});
		}


		function config_btn_delete_usuario(usuario_data) {
			var btn_delete = modal_delete_usuario.find('.btn-delete');
			btn_delete.unbind();
			btn_delete.click(function () {
				var url = "<?php echo site_url('usuario/delete'); ?>",
					data_type = 'json',
					data = {'id': usuario_data.id};
				var response_delete = get_ajax_response(url, data_type, data);
				response_delete.done(function (response) {
					modal_delete_usuario.modal('hide');
					alert(response.result);
					datatable_usuario_manager.ajax.reload();

				});
				response_delete.fail(function (jqXHR, textStatus, errorThrown) {
					modal_delete_usuario.modal('hide');
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
                    url: "<?php echo site_url('usuario/exportar'); ?>",
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
