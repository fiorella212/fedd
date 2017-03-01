<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">Evaluaci&oacute;n SISO</h5>
            </div>
            <div class="panel-body">

                <form action="" class="form-horizontal">
                    <div class="row"><strong class="col-sm-12 text-muted">Datos del Puesto de Trabajo</strong></div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="cmbLocal" class="col-md-4 control-label">Local</label>
                                <div class="col-md-8">
                                    <select name="cmbLocal" id="cmbLocal" class="form-control">
                                        <option value="">Seleccione Local</option>
                                        <?php
                                        foreach ($locales as $value) {
                                            $select = '';
                                            if($value['id'] == $puesto['id_local']){
                                                $select = 'selected';
                                            }
                                            echo '<option '.$select.' value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="cmbArea" class="col-sm-4 control-label">&Aacute;rea de Trabajo</label>
                                <div class="col-md-8">
                                    <select name="cmbArea" id="cmbArea" class="form-control">
                                        <option value="">Seleccione Area</option>
                                        <?php
                                        foreach ($areas as $value) {
                                            $select = '';
                                            if($value['id'] == $puesto['id_area']){
                                                $select = 'selected';
                                            }
                                            echo '<option '.$select.' value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">C&oacute;digo SABHA</label>
                                <div class="col-md-8">
                                    <strong><p class="form-control-static codigosabha"><?php echo $puesto['codigo_sabha'];?></p></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="cmbDenominacionSabha" class="col-md-4 control-label">Denominaci&oacute;n
                                    SABHA</label>
                                <div class="col-md-8">
                                    <select name="cmbDenominacionSabha" id="cmbDenominacionSabha" class="form-control">
                                        <option value="">Seleccione Sabha</option>
                                        <?php
                                        foreach ($puestos_trabajo as $value) {
                                            $select = '';
                                            if($value['id'] == $puesto['id']){
                                                $select = 'selected';
                                            }
                                            echo '<option data-codigo-sabha="'.$puesto['codigo_sabha'].'" '.$select.' value="' . $value['id'] . '">' . $value['denominacion_sabha'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row"><strong class="col-sm-12 text-muted">Resultado de la evaluaci&oacute;n</strong>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <strong>Cuestionario : </strong>
                            <a id="view_question" href="">Ver cuestionario</a>
                            <table class="table table-striped table-bordered" id="tblEvaluacionSiso">
                                <thead>
                                <th>Tipo de Funcionalidad</th>
                                <th>SISO</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Visual</td>
                                    <td><span class="visual"><?php echo $siso_s_visual;?></span></td>
                                </tr>
                                <tr>
                                    <td>Auditivo</td>
                                    <td><span class="auditivo"><?php echo $siso_s_auditivo;?></span></td>
                                </tr>
                                <tr>
                                    <td>Ext. Superiores</td>
                                    <td><span class="superior"><?php echo $siso_m_ext_superior;?></span></td>
                                </tr>
                                <tr>
                                    <td>Ext. Inferiores</td>
                                    <td><span class="inferior"><?php echo $siso_m_ext_inferior;?></span></td>
                                </tr>
                                <tr>
                                    <td>Intelectual</td>
                                    <td><span class="intelectual"><?php echo $siso_m_intelectual;?></span></td>
                                </tr>
                                <tr>
                                    <td>Psicosocial</td>
                                    <td><span class="psicosocial"><?php echo $siso_m_psicosocial;?></span></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('#cmbLocal').on('change', function () {
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "<?php echo site_url('siso/getAreas'); ?>",
                data: {idLocal: $(this).val()}
            }).done(function (msg) {
                limpiarResultados();
                $('.codigosabha').text('');
                $('#cmbDenominacionSabha').find('option').remove();
                var area = $('#cmbArea');
                area.find('option').remove();
                if (!$.isEmptyObject(msg.areas)) {
                    area.html('<option>Seleccione Area</option>');
                    $.each(msg.areas, function (index, value) {
                        $('<option>').attr({'value': value.id}).text(value.nombre).appendTo('#cmbArea');
                    });
                } else {
                    area.html('<option disabled>El Local no tiene Areas</option>');
                }
            });
        });

        $('#cmbArea').on('change', function () {
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "<?php echo site_url('siso/getSabha'); ?>",
                data: {idArea: $(this).val()}
            }).done(function (msg) {
                limpiarResultados();
                $('.codigosabha').text('');
                var sabha = $('#cmbDenominacionSabha');
                sabha.find('option').remove();
                if (!$.isEmptyObject(msg.puesto_trabajo)) {
                    sabha.html('<option value="">Seleccione Sabha</option>');
                    $.each(msg.puesto_trabajo, function (index, value) {
                        $('<option>').data({'codigo-sabha': value.codigo_sabha})
                            .attr({'value': value.id, 'data-codigo-sabha': value.codigo_sabha})
                            .text(value.denominacion_sabha).appendTo('#cmbDenominacionSabha');
                    });
                } else {
                    sabha.html('<option disabled>No tiene Denominaciones</option>');
                }

            });
        });

        $('#cmbDenominacionSabha').on('change', function () {
            var dataSabha = $(this).find(':selected').data();
            $('.codigosabha').text(dataSabha.codigoSabha);
            limpiarResultados();
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "<?php echo site_url('siso/getSiso'); ?>",
                data: {id: $(this).val()}
            }).done(function (msg) {
                $('.visual').html(msg.siso_s_visual);
                $('.auditivo').html(msg.siso_s_auditivo);
                $('.inferior').html(msg.siso_m_ext_inferior);
                $('.superior').html(msg.siso_m_ext_superior);
                $('.intelectual').html(msg.siso_m_intelectual);
                $('.psicosocial').html(msg.siso_m_psicosocial);
            });

        });

        $('#view_question').on('click', function (e) {
            e.preventDefault();
            var id_sabha = $('#cmbDenominacionSabha').val();
            var codigo_sabha = $('#cmbDenominacionSabha option:selected').data('codigo-sabha');
            var denomicacion_sabha = $('#cmbDenominacionSabha option:selected').text();
            var area = $('#cmbArea option:selected').text();
            var local = $('#cmbLocal option:selected').text();
            if (id_sabha != '' && codigo_sabha != '' && denomicacion_sabha != '' && area != '' && local != '') {
                window.location = '<?php echo site_url('siso/cuestionario'); ?>/' + id_sabha + '/' + codigo_sabha + '/' + denomicacion_sabha + '/' + area + '/' + local;
            } else {
                alert('Debe seleccionar los campos requeridos');
            }

        });

        function limpiarResultados() {
            $('.visual').html('');
            $('.auditivo').html('');
            $('.inferior').html('');
            $('.superior').html('');
            $('.intelectual').html('');
            $('.psicosocial').html('');
        }
    });
</script>
