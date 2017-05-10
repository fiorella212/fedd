<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">Reporte nro. 4 Magnitud del riesgo por sede
                    </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('reporte/exportProduccionArea'); ?>">
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
						<tr>
							<th style="text-align:center; vertical-align: middle;" rowspan="2">SEDES</th>
							<th style="text-align:center; vertical-align: middle;" rowspan="2">&Aacute;REAS</th>
							<th style="text-align:center; vertical-align: middle;" rowspan="2">EVALUACIÓN EVA/ERIN</th>
							<th style="text-align:center; vertical-align: middle;" rowspan="2">VALORES</th>
							<th style="text-align:center; vertical-align: middle;" colspan="2">TIPO PUESTO</th>
							<th style="text-align:center; vertical-align: middle;" rowspan="2">TOTAL</th>
						</tr>
						<tr>
							<th style="text-align:center; vertical-align: middle;" colspan="">CORE</th>
							<th style="text-align:center; vertical-align: middle;" colspan="">SOPORTE</th>
						</tr>
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
                url: "<?php echo site_url('reporte/getAllProduccionArea'); ?>",
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
//                console.log(res);
//                return false;

                $('#tblPuestos tbody').html("");
                if(res.reporte.length>0){
                    $.each(res.reporte, function (index, val) {
                        $('#tblPuestos tbody').append("<tr>" +
                            "<td>"+val.nombre_local+"</td>"+
                            "<td style='text-align:center;'> "+val.areas+"</td>"+
                            "<td style='text-align:center;' >"+val.evaerin+"</td>"+
                            "<td style='text-align:left;' >"+val.desc+"</td>"+
                            "<td style='text-align:center;' >"+val.puestos_core+"</td>"+
                            "<td style='text-align:center;'>"+val.puestos_soporte+"</td>"+
                            "<td style='text-align:center;'>"+val.total+"</td>"+
                            "</tr>");
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
