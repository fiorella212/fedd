<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Empresas</h5>
			</div>
			<div class="panel-body">

				<a id="btnExport" class="btn btn-primary btn-sm btnExport">Exportar</a>
<!--				<input type="button" class="button btn" value="Exportar" id="btnExportarEmpresa">-->
				<input type="button" class="btn btn-default btn-sm btn-new" value="Nuevo" id="btnNuevaEmpresa">

				<table class="table table-striped table-empresa-manager" id="tblEmpresas">
					<thead>
					<th>Id</th>
					<th>C&oacute;digo</th>
					<th>Raz&oacute;n Social</th>
					<th>RUC</th>
					<th>RUBRO</th>
					<th>Direcci&oacute;n</th>
					<th>Tel&eacute;fono</th>
					<th>Acciones</th>
					</thead>
					<tbody>
<!--					<tr>-->
<!--						<td>asdf</td>-->
<!--						<td>asdf</td>-->
<!--						<td>asdf</td>-->
<!--						<td>asdf</td>-->
<!--						<td>-->
<!--							<div class="btn-group" role="group" aria-label="...">-->
<!--								<a class="">editar</a>-->
<!--								<a class="">eliminar</a>-->
<!--							</div>-->
<!--						</td>-->
<!--					</tr>-->
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-new-empresa">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Nueva Empresa</h4>
			</div>
			<div class="modal-body">

				<form action="" class="form-horizontal form-empresa" id="frmNewEmpresa">
					<div class="form-group">
						<label for="txtCodigoEmpresa" class="col-sm-2 control-label">Codigo de Empresa</label>
						<div class="col-sm-10">
							<input type="text" class="form-control codigo required" required data-required="true" id="txtCodigoEmpresa" placeholder="Codigo de Empresa">
						</div>
					</div>
					<div class="form-group">
						<label for="txtRazonSocial" class="col-sm-2 control-label">Raz&oacute;n Social</label>
						<div class="col-sm-10">
							<input type="text" class="form-control razon_social required" required data-required="true" id="txtRazonSocial" placeholder="Razon Social">
						</div>
					</div>
					<div class="form-group">
						<label for="txtRuc" class="col-sm-2 control-label">RUC</label>
						<div class="col-sm-10">
							<input type="text" class="form-control ruc required" pattern="^\d{11}$" title = "valor numérico de 11 digitos" data-required="true" id="txtRuc" placeholder="RUC">
						</div>
					</div>
					<div class="form-group">
						<label for="txtRuc" class="col-sm-2 control-label">Rubro</label>
						<div class="col-sm-10">
							<input type="text" class="form-control rubro required" data-required="true" id="txtRubro" placeholder="Rubro">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDireccion" class="col-sm-2 control-label">Direcci&oacute;n</label>
						<div class="col-sm-10">
							<input type="text" class="form-control direccion required" required data-required="true"  id="txtDireccion" placeholder="Direccion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefono" class="col-sm-2 control-label">Tel&eacute;fono</label>
						<div class="col-sm-10">
							<input type="text" class="form-control telefono" id="txtTelefono" placeholder="Telefono">
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-save">Registrar empresa</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-empresa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Actualizar Empresa</h4>
            </div>
            <div class="modal-body">

                <form action="" class="form-horizontal form-empresa" id="frmEditEmpresa">
                    <div class="form-group">
                        <label for="txtCodigoEmpresa" class="col-sm-2 control-label">Codigo de Empresa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control codigo required" required data-required="true" id="txtCodigoEmpresa" placeholder="Codigo de Empresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtRazonSocial" class="col-sm-2 control-label">Raz&oacute;n Social</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control razon_social required" required data-required="true" id="txtRazonSocial" placeholder="Razon Social">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtRuc" class="col-sm-2 control-label">RUC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control ruc required" pattern="^\d{11}$" title = "valor numérico de 11 digitos" data-required="true" id="txtRuc" placeholder="RUC">
                        </div>
                    </div>
					<div class="form-group">
						<label for="txtRuc" class="col-sm-2 control-label">Rubro</label>
						<div class="col-sm-10">
							<input type="text" class="form-control rubro required" data-required="true" id="txtRubro" placeholder="Rubro">
						</div>
					</div>
                    <div class="form-group">
                        <label for="txtDireccion" class="col-sm-2 control-label">Direcci&oacute;n</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control direccion required" required data-required="true"  id="txtDireccion" placeholder="Direccion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtTelefono" class="col-sm-2 control-label">Tel&eacute;fono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control telefono" id="txtTelefono" placeholder="Telefono">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-edit">Actualizar empresa</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-delete-empresa" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title font-bold">Eliminar Empresa</h5>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar la empresa?</p>
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
        var table_empresa_manager = $('.table-empresa-manager'),
            datatable_empresa_manager = null;

        var btn_new_empresa = $('.btn-new'),
            modal_new_empresa = $('#modal-new-empresa'),
            modal_edit_empresa = $('#modal-edit-empresa'),
            modal_delete_empresa = $('#modal-delete-empresa'),
            form_element = {
                codigo: 'codigo',
                razon_social: 'razon_social',
                ruc: 'ruc',
                rubro: 'rubro',
                direccion: 'direccion',
                telefono: 'telefono'
            };

        config_datatable_empresa_manager();
        config_event_btn_new();
        config_event_btn_edit();
        config_event_btn_delete();

        function config_datatable_empresa_manager() {
            datatable_empresa_manager = table_empresa_manager.DataTable({
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
                    "url": "<?php echo site_url('empresa/getAll'); ?>",
                    "type": "POST",
                    "dataType": 'json'
                },

                "dom": '<f<t>ip>',
                "sPaginationType": "full_numbers",
                "columns": [
                    {"data": "id"},
                    {"data": "codigo"},
                    {"data": "razon_social"},
                    {"data": "ruc"},
                    {"data": "rubro"},
                    {"data": "direccion"},
                    {"data": "telefono"}

                ]
                ,
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false
                    },
                    {
                        "targets": [7],
                        "data": null,
                        "defaultContent": '<button class="btn btn-warning btn-xs m-l-n m-r-n btn-edit">Editar</button>' +
                        '  <button class="btn btn-danger btn-xs m-l-n m-r-n btn-delete">Eliminar</button>'
                    }
                ]
            });
        }

        function config_event_hide_modal(modal) {
            modal.find('.form-empresa').parsley().reset();
            modal.find('.' + form_element.codigo).val('');
            modal.find('.' + form_element.razon_social).val('');
            modal.find('.' + form_element.ruc).val('');
            modal.find('.' + form_element.rubro).val('');
            modal.find('.' + form_element.direccion).val('');
            modal.find('.' + form_element.telefono).val('');
        }
        function get_form_values_(form) {
            return {
                codigo: form.find('.' + form_element.codigo).val(),
                razon_social: form.find('.' + form_element.razon_social).val(),
                ruc: form.find('.' + form_element.ruc).val(),
                rubro: form.find('.' + form_element.rubro).val(),
                direccion: form.find('.' + form_element.direccion).val(),
                telefono: form.find('.' + form_element.telefono).val()
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
            btn_new_empresa.unbind();
            btn_new_empresa.click(function () {
                config_event_hide_modal(modal_new_empresa);
                modal_new_empresa.modal('show');
            });

            var btn_save_new_empresa = modal_new_empresa.find('.btn-save');
            btn_save_new_empresa.click(function () {
                if ($('#frmNewEmpresa').parsley().validate()) {
                    var url = "<?php echo site_url('empresa/insert'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_new_empresa.find('.form-empresa'));

                    var response_save = get_ajax_response(url, data_type, data);
                    response_save.done(function (response) {
                        if(response.status) {
                            modal_new_empresa.modal('hide');
                            alert(response.result);
                            datatable_empresa_manager.ajax.reload();
                        }else{
//                            modal_new_empresa.modal('hide');
                            alert(response.result);
                        }
                    });
                    response_save.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_new_empresa.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_edit() {
            table_empresa_manager.find('tbody').on('click', 'tr .btn-edit', function () {
                config_event_hide_modal(modal_edit_empresa);
                var empresa_data = datatable_empresa_manager.row($(this).parent().parent()).data();
                modal_edit_empresa.modal('show');
                modal_edit_empresa.find('.' + form_element.codigo).val(empresa_data.codigo);
                modal_edit_empresa.find('.' + form_element.razon_social).val(empresa_data.razon_social);
                modal_edit_empresa.find('.' + form_element.ruc).val(empresa_data.ruc);
                modal_edit_empresa.find('.' + form_element.rubro).val(empresa_data.rubro);
                modal_edit_empresa.find('.' + form_element.direccion).val(empresa_data.direccion);
                modal_edit_empresa.find('.' + form_element.telefono).val(empresa_data.telefono);
                config_btn_edit_empresa(empresa_data);
            });
        }

        function config_btn_edit_empresa(data_empresa) {
            var btn_edit = modal_edit_empresa.find('.btn-edit');
            btn_edit.unbind();
            btn_edit.click(function () {
                if ($('#frmEditEmpresa').parsley().validate()) {
                    var url = "<?php echo site_url('empresa/update'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_edit_empresa.find('.form-empresa'));
                    data.id = data_empresa.id;
                    var response_edit = get_ajax_response(url, data_type, data);
                    response_edit.done(function (response) {
                        modal_edit_empresa.modal('hide');
                        alert(response.result);
                        datatable_empresa_manager.ajax.reload();
                    });
                    response_edit.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_edit_empresa.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_delete() {
            table_empresa_manager.find('tbody').on('click', 'tr .btn-delete', function () {
                var empresa_data = datatable_empresa_manager.row($(this).parent().parent()).data();
                modal_delete_empresa.modal('show');
                config_btn_delete_empresa(empresa_data);
            });
        }


        function config_btn_delete_empresa(empresa_data) {
            var btn_delete = modal_delete_empresa.find('.btn-delete');
            btn_delete.unbind();
            btn_delete.click(function () {
                var url = "<?php echo site_url('empresa/delete'); ?>",
                    data_type = 'json',
                    data = {'id': empresa_data.id};
                var response_delete = get_ajax_response(url, data_type, data);
                response_delete.done(function (response) {
                    modal_delete_empresa.modal('hide');
                    alert(response.result);
                    datatable_empresa_manager.ajax.reload();

                });
                response_delete.fail(function (jqXHR, textStatus, errorThrown) {
                    modal_delete_empresa.modal('hide');
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
				url: "<?php echo site_url('empresa/exportar'); ?>",
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
