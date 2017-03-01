<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Configuraci&oacute;n de Roles</h5>
			</div>
			<div class="panel-body">

<!--				<input type="button"  value="Exportar" id="btnExportarRol">-->
                <a id="btnExport" class="btn btn-primary btn-sm btnExport">Exportar</a>
				<input type="button" class="btn btn-sm btn-default btn-new" value="Nuevo" id="btnNuevoRol">

				<table class="table table-striped table-rol-manager" id="tblRol">
					<thead>
					<th>id</th>
					<th>Perfil</th>
					<th>Acciones</th>
					</thead>
					<tbody>

					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-new-rol">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Configuraci&oacute;n de Roles - Rol</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal form-rol" id="frmNewProfile">

					<div class="row"><strong class="col-sm-12 text-muted">Datos del Rol</strong>
					</div>

					<div class="form-group">
						<label for="txtNombreRol" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control nombre" id="txtNombreRol required" name="txtNombreRol"
								   placeholder="Nombre del Rol" required>
						</div>
					</div>

                    <section class="panel panel-default">
<!--                        <header class="panel-heading font-bold">-->
<!--                            <span class="hidden-sm">Permisos</span>-->
<!--                        </header>-->
<!--                        <div id="menu" class="tab-pane active">-->
                                <div class="panel-body">
                                    <table id="tblPermissionsMenu" class="table table-striped b-t b-b b-l b-r b-light">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acceso</th>
                                            <th>Agregar</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Exportar</th>
                                            <th>Importar</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($permisos as $value){?>
                                            <tr data-id="<?php echo $value['id'];?>">
                                                <td><?php echo $value['nombre']; ?></td>
                                                <td><label class="checkbox i-checks"><input name="chkAcceso" id="chkAcceso<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></label></td>
                                                <?php if($value['nombre'] != 'Evaluacion EVA-ERIN' && $value['nombre'] != 'Evaluacion Siso' && $value['nombre'] != 'Evaluacion Fedd'
                                                    && $value['nombre'] != 'Importar personal SAP' && $value['nombre'] != 'Reporte interno'){?>
                                                    <td><label class="checkbox i-checks"><input name="chkAgregar" id="chkAgregar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                    <td><label class="checkbox i-checks"><input name="chkEditar" id="chkEditar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                    <td><label class="checkbox i-checks"><input name="chkEliminar" id="chkEliminar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                    <td><label class="checkbox i-checks"><input name="chkExportar" id="chkExportar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                <?php if($value['nombre'] != 'Mant. Empresa' && $value['nombre'] != 'Mant. Local' && $value['nombre'] != 'Mant. Area'
                                                    && $value['nombre'] != 'Mant. Roles' && $value['nombre'] != 'Mant. Usuario' && $value['nombre'] != 'Configuracion Siso'){?>
                                                    <td><label class="checkbox i-checks"><input name="chkImportar" id="chkImportar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                    <?php }else{ ?>
                                                        <td></td>
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php } ?>
                                            </tr>
                                        <?php
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
<!--                            </div>-->
                        </section>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary btn-save">Registrar Rol</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-rol">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Configuraci&oacute;n de Roles - Rol</h4>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal form-rol" id="frmEditRol">

                    <div class="row"><strong class="col-sm-12 text-muted">Datos del Rol</strong>
                    </div>

                    <div class="form-group">
                        <label for="txtNombreRol" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control nombre" id="txtNombreRol required" name="txtNombreRol"
                                   placeholder="Nombre del Rol" required>
                        </div>
                    </div>

                    <section class="panel panel-default">

<!--                        <div id="menu" class="tab-pane active">-->
                            <div class="panel-body" >
                                <table id="tblPermissionsMenu" class="table table-striped b-t b-b b-l b-r b-light">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acceso</th>
                                        <th>Agregar</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        <th>Exportar</th>
                                        <th>Importar</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($permisos as $value){?>
                                        <tr data-id="<?php echo $value['id'];?>">
                                            <td><?php echo $value['nombre']; ?></td>
                                            <td style="text-align: center;"><label class="checkbox i-checks"><input name="chkAcceso" id="chkAcceso<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></label></td>
                                            <?php if($value['nombre'] != 'Evaluacion EVA-ERIN' && $value['nombre'] != 'Evaluacion Siso' && $value['nombre'] != 'Evaluacion Fedd'
                                                      && $value['nombre'] != 'Importar personal SAP' && $value['nombre'] != 'Reporte interno'){?>
                                                <td style="text-align: center;"><label class="checkbox i-checks"><input name="chkAgregar" id="chkAgregar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                <td style="text-align: center;"><label class="checkbox i-checks"><input name="chkEditar" id="chkEditar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                <td style="text-align: center;"><label class="checkbox i-checks"><input name="chkEliminar" id="chkEliminar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                <td style="text-align: center;"><label class="checkbox i-checks"><input name="chkExportar" id="chkExportar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                            <?php if($value['nombre'] != 'Mant. Empresa' && $value['nombre'] != 'Mant. Local' && $value['nombre'] != 'Mant. Area'
                                                && $value['nombre'] != 'Mant. Roles' && $value['nombre'] != 'Mant. Usuario' && $value['nombre'] != 'Configuracion Siso'){?>
                                                <td style="text-align: center;"><label class="checkbox i-checks"><input name="chkImportar" id="chkImportar<?php echo $value['id']; ?>" value="1" type="checkbox" ><i></i></td>
                                                <?php }else{ ?>
                                                    <td></td>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php } ?>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
<!--                        </div>-->
                    </section>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-edit">Actualizar Rol</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-delete-rol" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title font-bold">Eliminar Rol</h5>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el rol?</p>
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
        var table_rol_manager = $('.table-rol-manager'),
            datatable_rol_manager = null;

        var btn_new_rol = $('.btn-new'),
            modal_new_rol = $('#modal-new-rol'),
            modal_edit_rol = $('#modal-edit-rol'),
            modal_delete_rol = $('#modal-delete-rol'),
            form_element = {
                nombre: 'nombre'
            };

        config_datatable_rol_manager();
        config_event_btn_new();
        config_event_btn_edit();
        config_event_btn_delete();

        function config_datatable_rol_manager() {
            datatable_rol_manager = table_rol_manager.DataTable({
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
                    "url": "<?php echo site_url('rol/getAll'); ?>",
                    "type": "POST",
                    "dataType": 'json'
                },

                "dom": '<f<t>ip>',
                "sPaginationType": "full_numbers",
                "columns": [
                    {"data": "id"},
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
                        "data": null,
                        "defaultContent": '<button class="btn btn-warning btn-xs m-l-n m-r-n btn-edit">Editar</button>' +
                        '  <button class="btn btn-danger btn-xs m-l-n m-r-n btn-delete">Eliminar</button>'
                    }
                ]
            });
        }

        function config_event_hide_modal(modal) {
            modal.find('.form-rol').parsley().reset();
            modal.find('.' + form_element.nombre).val('');
        }

        function config_event_btn_new() {
            btn_new_rol.unbind();
            btn_new_rol.click(function () {

                $("input:checkbox[name=chkAcceso]:checked").prop('checked',false);
                $("input:checkbox[name=chkAgregar]:checked").prop('checked',false);
                $("input:checkbox[name=chkEditar]:checked").prop('checked',false);
                $("input:checkbox[name=chkEliminar]:checked").prop('checked',false);
                $("input:checkbox[name=chkExportar]:checked").prop('checked',false);
                $("input:checkbox[name=chkImportar]:checked").prop('checked',false);

                config_event_hide_modal(modal_new_rol);
                modal_new_rol.modal('show');
            });

            var btn_save_new_rol = modal_new_rol.find('.btn-save');
            btn_save_new_rol.click(function () {
                if ($('#frmNewProfile').parsley().validate()) {


                    var url = "<?php echo site_url('rol/insert'); ?>",
                        data_type = 'json',
                        data = get_form_values_(modal_new_rol.find('.form-rol'));

                    var response_save = get_ajax_response(url, data_type, data);
                    response_save.done(function (response) {
                        if(response.status) {
                            modal_new_rol.modal('hide');
                            alert(response.result);
                            datatable_rol_manager.ajax.reload();
                        }else{
//                            modal_new_rol.modal('hide');
                            alert(response.result);
                        }
                    });
                    response_save.fail(function (jqXHR, textStatus, errorThrown) {
                        modal_new_rol.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
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

        function get_form_values_edit(form) {
            var permisos = [];

            $('#modal-edit-rol #tblPermissionsMenu tbody tr').each(function(){
                var acceso = 0;
                var agregar = 0;
                var editar = 0;
                var eliminar = 0;
                var exportar = 0;
                var importar = 0;
                var cant = 0;

                var id = $(this).data('id');
                var chk_acceso = $("td:eq(1) input[type=checkbox]", this);
                var chk_agregar = $("td:eq(2) input[type=checkbox]", this);
                var chk_editar = $("td:eq(3) input[type=checkbox]", this);
                var chk_eliminar = $("td:eq(4) input[type=checkbox]", this);
                var chk_exportar = $("td:eq(5) input[type=checkbox]", this);
                var chk_importar = $("td:eq(6) input[type=checkbox]", this);

                if(chk_acceso.prop('checked')){
                    acceso = parseFloat(chk_acceso.val());
                    cant++;
                }
                if(chk_agregar.prop('checked')){
                    agregar = parseFloat(chk_agregar.val());
                    cant++;
                }
                if(chk_editar.prop('checked')){
                    editar = parseFloat(chk_editar.val());
                    cant++;
                }
                if(chk_eliminar.prop('checked')){
                    eliminar = parseFloat(chk_eliminar.val());
                    cant++;
                }
                if(chk_exportar.prop('checked')){
                    exportar = parseFloat(chk_exportar.val());
                    cant++;
                }
                if(chk_importar.prop('checked')){
                    importar = parseFloat(chk_importar.val());
                    cant++;
                }
                if(cant>0){
                    permisos.push({
                        id: id,
                        acceso: acceso,
                        agregar: agregar,
                        editar: editar,
                        eliminar: eliminar,
                        exportar: exportar,
                        importar: importar
                    });
                }

            });


            return {
                nombre: form.find('.' + form_element.nombre).val(),
                permisos :permisos
            };
        }

        function get_form_values_(form) {
            var permisos = [];

            $('#modal-new-rol #tblPermissionsMenu tbody tr').each(function(){
                var acceso = 0;
                var agregar = 0;
                var editar = 0;
                var eliminar = 0;
                var exportar = 0;
                var importar = 0;
                var cant = 0;

                var id = $(this).data('id');
                var chk_acceso = $("td:eq(1) input[type=checkbox]", this);
                var chk_agregar = $("td:eq(2) input[type=checkbox]", this);
                var chk_editar = $("td:eq(3) input[type=checkbox]", this);
                var chk_eliminar = $("td:eq(4) input[type=checkbox]", this);
                var chk_exportar = $("td:eq(5) input[type=checkbox]", this);
                var chk_importar = $("td:eq(6) input[type=checkbox]", this);

                if(chk_acceso.prop('checked')){
                    acceso = parseFloat(chk_acceso.val());
                    cant++;
                }
                if(chk_agregar.prop('checked')){
                    agregar = parseFloat(chk_agregar.val());
                    cant++;
                }
                if(chk_editar.prop('checked')){
                    editar = parseFloat(chk_editar.val());
                    cant++;
                }
                if(chk_eliminar.prop('checked')){
                    eliminar = parseFloat(chk_eliminar.val());
                    cant++;
                }
                if(chk_exportar.prop('checked')){
                    exportar = parseFloat(chk_exportar.val());
                    cant++;
                }
                if(chk_importar.prop('checked')){
                    importar = parseFloat(chk_importar.val());
                    cant++;
                }
                if(cant>0){
                    permisos.push({
                        id: id,
                        acceso: acceso,
                        agregar: agregar,
                        editar: editar,
                        eliminar: eliminar,
                        exportar: exportar,
                        importar: importar
                    });
                }

            });


            return {
                nombre: form.find('.' + form_element.nombre).val(),
                permisos :permisos
            };
        }

        var RequestgetPermissionsByProfile = function(id) {
            return $.ajax({
                url:"<?php echo site_url('rol/getPermisos')?>",
                type: 'post',
                dataType: 'json',
                data: {
                    rol_id: id
                }
            }).promise();
        };

        function config_event_btn_edit() {
            table_rol_manager.find('tbody').on('click', 'tr .btn-edit', function () {
                config_event_hide_modal(modal_edit_rol);
                var rol_data = datatable_rol_manager.row($(this).parent().parent()).data();
                $("#modal-edit-rol #tblPermissionsMenu input:checkbox[name=chkAcceso]:checked").prop('checked',false);
                $("#modal-edit-rol #tblPermissionsMenu input:checkbox[name=chkAgregar]:checked").prop('checked',false);
                $("#modal-edit-rol #tblPermissionsMenu input:checkbox[name=chkEditar]:checked").prop('checked',false);
                $("#modal-edit-rol #tblPermissionsMenu input:checkbox[name=chkEliminar]:checked").prop('checked',false);
                $("#modal-edit-rol #tblPermissionsMenu input:checkbox[name=chkExportar]:checked").prop('checked',false);
                $("#modal-edit-rol #tblPermissionsMenu input:checkbox[name=chkEliminar]:checked").prop('checked',false);

                $.when(RequestgetPermissionsByProfile(rol_data.id)).done(function(res) {
                    $.each(res,function(i, item){
                        $('#modal-edit-rol #tblPermissionsMenu tbody tr').each(function(){
                            if(item.id_permiso == $(this).data('id')){
                                if(item.acceso == 1){
                                    $('td:eq(1) input[type=checkbox]', this).prop('checked',true);
                                }else{
                                    $('td:eq(1) input[type=checkbox]', this).prop('checked',false);
                                }
                                if(item.agregar == 1){
                                    $('td:eq(2) input[type=checkbox]', this).prop('checked',true);
                                }else{
                                    $('td:eq(2) input[type=checkbox]', this).prop('checked',false);
                                }
                                if(item.editar == 1){
                                    $('td:eq(3) input[type=checkbox]', this).prop('checked',true);
                                }else{
                                    $('td:eq(3) input[type=checkbox]', this).prop('checked',false);
                                }
                                if(item.eliminar == 1){
                                    $('td:eq(4) input[type=checkbox]', this).prop('checked',true);
                                }else{
                                    $('td:eq(4) input[type=checkbox]', this).prop('checked',false);
                                }
                                if(item.exportar == 1){
                                    $('td:eq(5) input[type=checkbox]', this).prop('checked',true);
                                }else{
                                    $('td:eq(5) input[type=checkbox]', this).prop('checked',false);
                                }
                                if(item.importar == 1){
                                    $('td:eq(6) input[type=checkbox]', this).prop('checked',true);
                                }else{
                                    $('td:eq(6) input[type=checkbox]', this).prop('checked',false);
                                }
                            }
                        });
                    });
                });

                modal_edit_rol.modal('show');
                modal_edit_rol.find('.' + form_element.nombre).val(rol_data.nombre);
                config_btn_edit_rol(rol_data);
            });
        }

        function config_btn_edit_rol(rol_data) {
            var btn_edit = modal_edit_rol.find('.btn-edit');
            btn_edit.unbind();
            btn_edit.click(function () {

                if ($('#frmEditRol').parsley().validate()) {
                    var url = "<?php echo site_url('rol/update'); ?>",
                        data_type = 'json',
                        data = get_form_values_edit(modal_edit_rol.find('.form-rol'));
                    data.id = rol_data.id;
                    var response_edit = get_ajax_response(url, data_type, data);
                    response_edit.done(function (response) {
                        modal_edit_rol.modal('hide');
                        alert(response.result);
                        datatable_rol_manager.ajax.reload();
                    });
                    response_edit.fail(function (jqXHR, textStatus, errorThrown) {
//                        modal_edit_rol.modal('hide');
                        alert(jqXHR.status + ' (' + errorThrown + ')');
                    });
                }
            });
        }

        function config_event_btn_delete() {
            table_rol_manager.find('tbody').on('click', 'tr .btn-delete', function () {
                var rol_data = datatable_rol_manager.row($(this).parent().parent()).data();
                modal_delete_rol.modal('show');
                config_btn_delete_rol(rol_data);
            });
        }


        function config_btn_delete_rol(rol_data) {
            var btn_delete = modal_delete_rol.find('.btn-delete');
            btn_delete.unbind();
            btn_delete.click(function () {
                var url = "<?php echo site_url('rol/delete'); ?>",
                    data_type = 'json',
                    data = {'id': rol_data.id};
                var response_delete = get_ajax_response(url, data_type, data);
                response_delete.done(function (response) {
                    modal_delete_rol.modal('hide');
                    if(response.status){
                        alert(response.result);
                    }else{
                        alert(response.result);
                    }
                    datatable_rol_manager.ajax.reload();

                });
                response_delete.fail(function (jqXHR, textStatus, errorThrown) {
                    modal_delete_rol.modal('hide');
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
                url: "<?php echo site_url('rol/exportar'); ?>",
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
