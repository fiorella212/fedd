<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">Reporte nro. 1 Distribución de puestos por empresa (SAP – Puestos Evaluados)
                    </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('reporte/exportLocal'); ?>">
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
                        <thead style=" !important ;background: #2C3A63; color: white">
                        <th style="text-align:center;" >EMPRESA</th>
                        <th style="text-align:center;" >SEDE</th>
                        <th style="text-align:center;" colspan="2">PUESTOS SAP</th>
                        <th style="text-align:center;" colspan="2">NRO TRABAJADORES</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" id="table">
                    <table class="table" style="width: 100%; solid:1px" id="tblPuestos2">
                        <thead style=" !important ;background: #2C3A63; color: white">
                        <th style="text-align:center;" >EMPRESA</th>
                        <th style="text-align:center;" >SEDE</th>
                        <th >ÁREAS EVALUADAS</th>
                        <th style="text-align:center;" colspan="2">PUESTOS EVALUADOS</th>
                        <th style="text-align:center;" colspan="2">NRO TRABAJADORES</th>
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
                url: "<?php echo site_url('reporte/getAllLocal'); ?>",
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
                $('#tblPuestos2 tbody').html("");
                if(res.reporte.length>0){
                    $.each(res.reporte, function (index, val) {
                        $('#tblPuestos tbody').append("<tr>" +
                            "<td>"+val.nombre_empresa+"</td>"+
                            "<td> "+val.nombre_local+"</td>"+
                            "<td style='text-align:right;' >"+val.puestos_sap+"</td>"+
                            "<td style='text-align:right;' >"+val.porcentaje_puestos+"%</td>"+
                            "<td style='text-align:right;'>"+val.trabajadores+"</td>"+
                            "<td style='text-align:right;' >"+val.porcentaje_trabajadores+"%</td><tr>");
                    });

                }else{
                    $('#tblPuestos tbody').append("<tr>" +
                        "<td style='text-align:center;' colspan='6'>No se encontraron resultados</td>"+
                        "<tr>");
                }

                if(res.reporte2.length>0){
                    $.each(res.reporte2, function (index, val) {
                        $('#tblPuestos2 tbody').append("<tr>" +
                            "<td>"+val.nombre_empresa+"</td>"+
                            "<td> "+val.nombre_local+"</td>"+
                            "<td> "+val.areas+"</td>"+
                            "<td style='text-align:right;' >"+val.puestos+"</td>"+
                            "<td style='text-align:right;' >"+val.porcentaje_puestos+"%</td>"+
                            "<td style='text-align:right;'>"+val.trabajadores+"</td>"+
                            "<td style='text-align:right;' >"+val.porcentaje_trabajadores+"%</td><tr>");
                    });

                }else{
                    $('#tblPuestos2 tbody').append("<tr>" +
                        "<td style='text-align:center;' colspan='7'>No se encontraron resultados</td>"+
                        "<tr>");
                }
            });
        });

    });
</script>
