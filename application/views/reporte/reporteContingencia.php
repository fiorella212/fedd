<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">Reporte nro. 7 Reducción de contingencia de la ley</h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('reporte/exportContingencia'); ?>">
                    <div class="row">
<!--                        <label for="cmbLocal" class="col-md-3 control-label">Sedes</label>-->
<!--                        <div class="col-md-3">-->
<!--                            <select name="cmbLocal" id="cmbLocal" class="form-control">-->
<!--                                <option value="">-- Todos --</option>-->
<!--                                --><?php
//                                foreach ($locales as $value) {
//                                    echo '<option value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </div>-->
                        <div class="col-md-3 pull-right">
                            <a class="btn btn-sm btn-default" id="btnSearch">Buscar</a>
                            <input type="submit" class="btn btn-sm btn-primary" value="Exportar" id="btnExportar"/>
                        </div>
                    </div>
                </form>
                <br/>
                <div class="table-responsive" id="table">
                    <table class="table" style="width: 100%; solid:1px" id="tblPuestos">
                        <thead style=" !important ;background: #2C3A63; color: white">
                        <th  style="text-align:center; width: 33.33%;" ><span class="empresa"></span></th>
                        <th style="text-align:center; width: 33.33%;" >NRO. PUESTOS</th>
                        <th style="text-align:center; width: 33.33%;" >TOTAL TRABAJADORES</th>
                        </thead>
                        <tbody>

                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">TOTAL</td>
                            <td style="text-align:right; width: 33.33%;"><span class="nro_puestos"></span></td>
                            <td style="text-align:right; width: 33.33%;"><span class="nro_trabajadores"></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">CONTINGENCIA</td>
                            <td style="text-align:right; width: 33.33%;">3%</td>
                            <td style="text-align:right; width: 33.33%;"><span class="contingencia1"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" id="table">
                    <table class="table" style="width: 100%; solid:1px" id="tblPuestos2">
                        <thead style=" !important ;background: #2C3A63; color: white">
                        <th style="text-align:center;" colspan="3">EVALUACION SABHA</th>
                        </thead>
                        <tbody>

                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">PUESTOS EVALUADOS</td>
                            <td style="text-align:right; width: 33.33%;"><span class="puestos_evaluados"></span></td>
                            <td style="text-align:right; width: 33.33%;"><span class="trabajadores_evaluados"></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">CONTINGENCIA</td>
                            <td style="text-align:right; width: 33.33%;">3%</td>
                            <td style="text-align:right; width: 33.33%;"><span class="contingencia2"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive" id="table">
                    <table class="table" style="width: 100%; solid:1px" id="tblPuestos3">
                        <thead style=" !important ;background: #2C3A63; color: white">
                        <th style="text-align:center;" colspan="3" >IMPLEMENTACIÓN DE GEORDI</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">PUESTOS NO APTOS</td>
                            <td style="text-align:right; width: 33.33%;"><span class="puestos_no_aptos"></span></td>
                            <td style="text-align:right; width: 33.33%;"><span class="trabajadores_no_aptos"></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">PUESTOS APTOS</td>
                            <td style="text-align:right; width: 33.33%;"><span class="puestos_aptos"></span></td>
                            <td style="text-align:right; width: 33.33%;"><span class="trabajadores_aptos"></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">CONTINGENCIA</td>
                            <td style="text-align:right; width: 33.33%;">3%</td>
                            <td style="text-align:right; width: 33.33%;"><span class="contingencia3"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive" id="table">
                    <table class="table" style="width: 100%; solid:1px" id="tblPuestos4">
                        <tbody style="!important ;background: #848484; color: white">
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">CONTINGENCIA</td>
                            <td style="text-align:right;width: 33.33%; ">3%</td>
                            <td style="text-align:right; width: 33.33%;"><span class="contingencia4"></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:LEFT; width: 33.33%;">REDUCCIÓN DE CONTINGENCIA</td>
                            <td style="text-align:right; width: 33.33%;"></td>
                            <td style="text-align:right; width: 33.33%;"><span class="reduccion_contingencia"></span></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        var RequestgetAll = function() {
            return $.ajax({
                url: "<?php echo site_url('reporte/getAllContingencia'); ?>",
                type: 'post',
                dataType: 'json'
            }).promise();
        };

        $('#btnSearch').on('click', function (event) {
            event.preventDefault();
			$( "body" ).isLoading({
				text:       "Cargando... ",
				position:   "overlay",
				'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
			});

            $.when(RequestgetAll()).done(function(res){
				$( "body" ).isLoading('hide');

                    $('.empresa').html(res.reporte[0].razon_social);
                    $('.nro_puestos').html(res.reporte[0].nro_puestos);
                    $('.nro_trabajadores').html(res.reporte[0].nro_trabajadores);
                    $('.contingencia1').html(res.reporte[0].contingencia1);
                    $('.puestos_evaluados').html(res.reporte[0].puestos_evaluados);
                    $('.trabajadores_evaluados').html(res.reporte[0].trabajadores_evaluados);
                    $('.contingencia2').html(res.reporte[0].contingencia2);
                    $('.puestos_no_aptos').html(res.reporte[0].puestos_no_apto);
                    $('.trabajadores_no_aptos').html(res.reporte[0].trabajadores_no_apto);
                    $('.puestos_aptos').html(res.reporte[0].puestos_apto);
                    $('.trabajadores_aptos').html(res.reporte[0].trabajadores_apto);
                    $('.contingencia3').html(res.reporte[0].contingencia3);
                    $('.contingencia4').html(res.reporte[0].contingencia4);
                    $('.reduccion_contingencia').html(res.reporte[0].reduccion_contingencia);


            });

        });

    });
</script>
