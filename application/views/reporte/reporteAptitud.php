<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">Nro. 6 Determinación de la aptitud de puestos disponibles para incorporar personas con discapacidad</h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('reporte/reporte5Excel'); ?>">
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
                        <th style="text-align:center;" rowspan="2">SEDES</th>
                        <th style="text-align:center;" colspan="2">Nro. AREAS</th>
                        <th style="text-align:center;" colspan="2">APTO</th>
                        <th style="text-align:center;" colspan="2">NO APTO</th>
                        <th style="text-align:center;" >TOTAL </th>
                        </thead>
                        <thead style="text-align:center !important; background: #3B5A66; color: white">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="text-align:center;">CORE</th>
                        <th style="text-align:center;">SOPORTE</th>
                        <th style="text-align:center;">CORE</th>
                        <th style="text-align:center;">SOPORTE</th>
                        <th style="text-align:center;">GENERAL</th>
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
                url: "<?php echo site_url('reporte/getAll5'); ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id_local: idLocal
                }
            }).promise();
        };

//        $('#btnExportar').on('click',function(event){
//            event.preventDefault();
//
//            $("body").isLoading({
//                text: "Cargando... ",
//                position: "overlay",
//                'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
//            });
//
//            $.ajax({
//                url: "<?php //echo site_url('Reporte/exportar'); ?>//",
//                dataType: 'json',
//                data: {
//                    id_local: $('#cmbLocal').val()
//                },
//                method: 'POST'
//
//            }).done(function (res) {
//                $("body").isLoading('hide');
//                if(res.status){
//                    window.open(res.result.file_url);
//                }else{
//                    alert(res.result);
//                }
//
//            });
//        });

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
                            "<td>"+val.areas+"</td>"+
                            "<td>"+val.desc+"</td>"+
							"<td style='text-align:center;'>"+val.apto_core+"</td>"+
                            "<td style='text-align:center;' >"+val.apto_soporte+"</td>"+
							"<td style='text-align:center;'>"+val.no_apto_core+"</td>"+
							"<td style='text-align:center;' >"+val.no_apto_soporte+"</td>"+
                            "<td style='text-align:center;' >"+val.total+"</td><tr>");
                    });

                }else{
                    $('#tblPuestos tbody').append("<tr>" +
                        "<td style='text-align:center;' colspan='8'>No se encontraron resultados</td>"+
                        "<tr>");
                }
            });
        });

    });
</script>
