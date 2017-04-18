<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">&Aacute;reas de trabajo</h5>
			</div>
			<div class="panel-body">

				<a id="btnExport" class="btn btn-sm btn-primary">Exportar</a>
				<input type="button" class="btn btn-sm btn-default btn-new" value="Nuevo" id="btnNuevaArea">

				<table class="table table-striped table-area-manager" id="tblArea">
					<thead>
                    <th>id_empresa</th>
					<th>Raz&oacute;n Social</th>
                    <th>id_local</th>
					<th>Sede</th>
                    <th>id_area</th>
					<th>&Aacute;rea</th>
					<th>Acciones</th>
					</thead>
					<tbody>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-new-area">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Nueva &Aacute;rea</h4>
			</div>
			<div class="modal-body">

				<form id="FrmNewArea" class="form-horizontal form-area new" novalidate="">
					<div class="form-group">
						<label for="cmbRazonSocial" class="col-sm-2 control-label">Raz&oacute;n Social</label>
						<div class="col-sm-10">
							<select class="form-control required id_empresa" required name="id_empresa" id="id_empresa" style="width: 100%;">
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
						<label for="cmbLocal" class="col-sm-2 control-label">Sede</label>
						<div class="col-sm-10">
							<select class="form-control required id_local" required name="id_local" id="id_local" style="width: 100%;">
								<option value="">Seleccione</option>

							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombreArea" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control nombre" required name="nombre" id="nombre" id="txtNombreArea" placeholder="Nombre Area">
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-save">Registrar &Aacute;rea</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-area">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Actualizar &Aacute;rea</h4>
			</div>
			<div class="modal-body">

				<form action="" class="form-horizontal form-area edit" id="FrmEditArea">
					<div class="form-group">
						<label for="cmbRazonSocial" class="col-sm-2 control-label">Raz&oacute;n Social</label>
						<div class="col-sm-10">
							<select class="form-control required id_empresa" required name="id_empresa" id="id_empresa_edit" style="width: 100%;">
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
						<label for="cmbLocal" class="col-sm-2 control-label">Sede</label>
						<div class="col-sm-10">
							<select class="form-control required id_local" required name="id_local" id="id_local_edit" style="width: 100%;">
								<option value="">Seleccione</option>

							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombreArea" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control nombre" required name="nombre" id="nombre" id="txtNombreArea" placeholder="Nombre Area">
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-edit">Actualizar &Aacute;rea</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-delete-area" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title font-bold">Eliminar Area</h5>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el area?</p>
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
        var table_area_manager = $('.table-area-manager'),
            datatable_area_manager = null;

        var btn_new_area = $('.btn-new'),
            modal_new_area = $('#modal-new-area'),
            modal_edit_area = $('#modal-edit-area'),
            modal_delete_area = $('#modal-delete-area'),
            form_element = {
                id_empresa: 'id_empresa',
                id_local: 'id_local',
                nombre: 'nombre'
            };

        config_datatable_area_manager();
        config_event_btn_new();
        config_event_btn_edit();
        config_event_btn_delete();



        function config_datatable_area_manager() {
            datatable_area_manager = table_area_manager.DataTable({
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
                    "url": "<?php echo site_url('area/getAll'); ?>",
                    "type": "POST",
                    "dataType": 'json'
                },

                "dom": '<f<t>ip>',
                "sPaginationType": "full_numbers",
                "columns": [
                    {"data": "id_empresa"},
                    {"data": "razon_social"},
                    {"data": "id_local"},
                    {"data": "local"},
                    {"data": "id_area"},
                    {"data": "nombre"}

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
                        "targets": [4],
                        "visible": false
                    },
                    {
                        "targets": [6],
                        "data": null,
                        "defaultContent": '<button class="btn btn-warning btn-xs m-l-n m-r-n btn-edit">Editar</button>' +
                        '  <button class="btn btn-danger btn-xs m-l-n m-r-n btn-delete">Eliminar</button>'
                    }
                ]
            });
        }

        function config_event_hide_modal(modal) {
            modal.find('.form-area').parsley().reset();
            modal.find('.' + form_element.id_empresa).val('').trigger("change");
            modal.find('.' + form_element.id_local).val('').trigger("change");
            modal.find('.' + form_element.nombre).val('');

        }

//		modal.on('hide.bs.modal', function (e) {
//			config_event_hide_modal(modal);
//		})


		function get_form_values_(form) {
            return {
                id_empresa: form.find('.' + form_element.id_empresa).val(),
                id_local: form.find('.' + form_element.id_local).val(),
                nombre: form.find('.' + form_element.nombre).val()
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
            btn_new_area.unbind();
            btn_new_area.click(function () {
                config_event_hide_modal(modal_new_area);
                modal_new_area.modal('show');
            });

            var btn_save_new_area = modal_new_area.find('.btn-save');
            btn_save_new_area.click(function () {
                if (modal_new_area.find('.new').parsley().validate()) {
                    var url = "<?php echo site_url('area/insert'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_new_area.find('.form-area'));

                    var response_save = get_ajax_response(url, data_type, data);
                    response_save.done(function (response) {
                        if(response.status) {
                            modal_new_area.modal('hide');
                            alert(response.result);
                            datatable_area_manager.ajax.reload();
                        }else{
//                            modal_new_area.modal('hide');
                            alert(response.result);
                        }
                    });
                    response_save.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_new_area.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_edit() {
            table_area_manager.find('tbody').on('click', 'tr .btn-edit', function () {
                var area_data = datatable_area_manager.row($(this).parent().parent()).data();
                modal_edit_area.modal('show');
                modal_edit_area.find('.' + form_element.id_empresa).val(area_data.id_empresa).trigger("change");
                $.when(RequestgetLocalByEmpresaId(area_data.id_empresa)).done(function(res){
                    $('#id_local_edit').find('option').remove();
                    $('<option value=""> Seleccione</option>').appendTo('#id_local_edit');
                    $.each(res, function (index, val) {
                        $('<option>').attr({
                            value: val.id,
                        }).text(val.nombre).appendTo('#id_local_edit');
                    });
					modal_edit_area.find('.' + form_element.id_local).val(area_data.id_local).trigger("change");
					modal_edit_area.find('.' + form_element.nombre).val(area_data.nombre);
                });
                config_btn_edit_area(area_data);
            });
        }

        function config_btn_edit_area(data_area) {
            var btn_edit = modal_edit_area.find('.btn-edit');
            btn_edit.unbind();
            btn_edit.click(function () {
                if (modal_edit_area.find('.edit').parsley().validate()){
                    var url = "<?php echo site_url('area/update'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_edit_area.find('.form-area'));
                    data.id = data_area.id_area;
                    var response_edit = get_ajax_response(url, data_type, data);
                    response_edit.done(function (response) {
                        modal_edit_area.modal('hide');
                        alert(response.result);
                        datatable_area_manager.ajax.reload();
                    });
                    response_edit.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_edit_area.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_delete() {
            table_area_manager.find('tbody').on('click', 'tr .btn-delete', function () {
                var area_data = datatable_area_manager.row($(this).parent().parent()).data();
                modal_delete_area.modal('show');
                config_btn_delete_area(area_data);
            });
        }


        function config_btn_delete_area(area_data) {
            var btn_delete = modal_delete_area.find('.btn-delete');
            btn_delete.unbind();
            btn_delete.click(function () {
                var url = "<?php echo site_url('area/delete'); ?>",
                    data_type = 'json',
                    data = {'id': area_data.id_area};
                var response_delete = get_ajax_response(url, data_type, data);
                response_delete.done(function (response) {
                    modal_delete_area.modal('hide');
                    alert(response.result);
                    datatable_area_manager.ajax.reload();

                });
                response_delete.fail(function (jqXHR, textStatus, errorThrown) {
                    modal_delete_area.modal('hide');
                    alert(jqXHR.status + ' (' + errorThrown + ')');
                });
            });

        }


		$("#btnExport").on('click',function(e){
			e.preventDefault();
			$("body").isLoading({
				text: "Cargando... ",
				position: "overlay",
				'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
			});

			$.ajax({
				url: "<?php echo site_url('area/exportar'); ?>",
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


        var RequestgetLocalByEmpresaId = function(idEmpresa) {
            return $.ajax({
                url:"<?php echo site_url('area/getLocalByEmpresaId'); ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id_empresa: idEmpresa
                }
            }).promise();
        };

        $('#id_empresa').change(function(){
            var empresaId = $(this).val();

            $.when(RequestgetLocalByEmpresaId(empresaId)).done(function(res){

                $('#id_local').find('option').remove();
                $('<option value=""> Seleccione</option>').appendTo('#id_local');
                $.each(res, function (index, val) {
                    $('<option>').attr({
                        value: val.id,
                    }).text(val.nombre).appendTo('#id_local');
                });


            });
        });

        $('#id_empresa_edit').change(function(){
            var empresaId = $(this).val();

            $.when(RequestgetLocalByEmpresaId(empresaId)).done(function(res){

                $('#id_local_edit').find('option').remove();
                $('<option value=""> Seleccione</option>').appendTo('#id_local_edit');
                $.each(res, function (index, val) {
                    $('<option>').attr({
                        value: val.id,
                    }).text(val.nombre).appendTo('#id_local_edit');
                });

            });
        });

    });
</script>
