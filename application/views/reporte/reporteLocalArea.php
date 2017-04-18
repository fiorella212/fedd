<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">Nro. 3 Distribución de puestos de trabajo por unidad de producción y área</h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('reporte/exportLocalArea'); ?>">
                    <div class="row">
                        <label for="cmbLocal" class="col-md-3 control-label">Sedes</label>
                        <div class="col-md-3">
                            <select name="cmbLocal" id="cmbLocal" class="form-control">
                                <option value="">-- Todos --</option>
                                <?php
                                foreach ($locales as $value) {
                                    echo '<option value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 pull-right">
                            <a href="" class="btn btn-sm btn-default" id="btnSearch">Buscar</a>
                            <input type="submit" class="btn btn-sm btn-primary" value="Exportar" id="btnExportar"/>
                        </div>
                    </div>
                </form>
                <br/>
                <div class="table-responsive" id="table">
                    <table class="table" style="width: 100%; solid:1px" id="tblPuestos">
                        <thead style=" !important ;background: #3B5A66; color: white">
                        <th style="text-align:center;" rowspan="3">SEDES</th>
                        <th style="text-align:center;" rowspan="3">NRO. AREAS EVALUADAS</th>
                        <th style="text-align:center;" colspan="6">TIPO PUESTO</th>
                        <th style="text-align:center;" colspan="3" rowspan="2">TOTAL</th>
                        </thead>
                        <thead style="text-align:center !important; background: #3B5A66; color: white">
                        <th></th>
                        <th></th>
                        <th style="text-align:center;" colspan="3">CORE</th>
                        <th style="text-align:center;" colspan="3">SOPORTE</th>
                        <th style="text-align:center;" ></th>
                        <th style="text-align:center;"></th>
                        <th style="text-align:center;"></th>
                        </thead>
                        <thead style="text-align:center !important; background: #3B5A66; color: white">
                        <th></th>
                        <th></th>
                        <th style="text-align:center;" >PUESTOS</th>
                        <th style="text-align:center;" colspan="2">NRO. TRABAJADORES</th>
                        <th style="text-align:center;" >PUESTOS</th>
                        <th style="text-align:center;" colspan="2">NRO. TRABAJADORES</th>
                       <th style="text-align:center;" >PUESTOS</th>
                        <th style="text-align:center;" colspan="2">NRO. TRABAJADORES</th>
                       </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {

        var RequestgetAll = function(idLocal) {
            return $.ajax({
                url: "<?php echo site_url('reporte/getAllLocalArea'); ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id_local: idLocal
                }
            }).promise();
        };

        $('#btnSearch').on('click', function (event) {
            event.preventDefault();
			$( "body" ).isLoading({
				text:       "Cargando... ",
				position:   "overlay",
				'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
			});

            $.when(RequestgetAll($('#cmbLocal').val())).done(function(res){
				$( "body" ).isLoading('hide');
                $('#tblPuestos tbody').html("");
                if(res.reporte.length>0){
                    $.each(res.reporte, function (index, val) {
                        $('#tblPuestos tbody').append("<tr>" +
                            "<td>"+val.nombre_local+"</td>"+
                            "<td style='text-align:center;'> "+val.areas+"</td>"+
                            "<td style='text-align:right;' >"+val.puestos_core+"</td>"+
                            "<td style='text-align:right;' >"+val.trabajadores_core+"</td>"+
                            "<td style='text-align:right;'>"+val.porcentaje_core+"%</td>"+
                            "<td style='text-align:right;' >"+val.puestos_soporte+"</td>"+
                            "<td style='text-align:right;'>"+val.trabajadores_soporte+"</td>"+
                            "<td style='text-align:right;'>"+val.porcentaje_soporte+"%</td>"+
                            "<td style='text-align:right;'>"+val.total_puestos+"</td>"+
                            "<td style='text-align:right;'>"+val.total_trabajadores+"</td>"+
                            "<td style='text-align:right;' >"+val.total_porcentaje+"%</td><tr>");
                    });

                }else{
                    $('#tblPuestos tbody').append("<tr>" +
                        "<td style='text-align:center;' colspan='10'>No se encontraron resultados</td>"+
                        "<tr>");
                }
            });
        });

    });
</script>
