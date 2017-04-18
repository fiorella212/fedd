<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Evaluaci&oacute;n FEDD</h5>
			</div>
			<div class="panel-body">

				<form action="<?php echo site_url('fedd/registrarEvaluacion'); ?>" class="form-horizontal" method="POST"
					  id="frmEvaluacionFedd">
					<div class="row"><strong class="col-sm-12 text-muted">Datos del Sector</strong></div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbLocal" class="col-md-4 control-label">Sede</label>
								<div class="col-md-8">
									<select name="cmbLocal" id="cmbLocal" class="form-control">
										<option value="">Seleccione Sede</option>
										<?php
										foreach ($locales as $value) {
											echo '<option value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbArea" class="col-md-4 control-label">&Aacute;rea de Trabajo</label>
								<div class="col-md-8">
									<select name="cmbArea" id="cmbArea" class="form-control">
										<option value="">Seleccione Area</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="" class="col-md-4 control-label">C&oacute;digo SABHA</label>
								<div class="col-md-8">
									<strong><p class="form-control-static codigosabha"></p></strong>
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
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="row"><strong class="col-sm-12 text-muted">Resultado de evaluaci&oacute;n
							FEDD</strong>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbResultado" class="col-md-4 control-label">Tipo de Funcionalidad</label>
								<div class="col-md-8">
                                  	<select name="cmbResultado" id="cmbResultado" class="form-control">
										<option value="">Seleccione</option>
										<option value="Sensorial_Visual" data-id="0" data-pregunta="<?php echo $preguntas[0]['valor_s_visual_preg']; ?>">Sensorial Visual</option>
										<option value="Sensorial_Auditivo" data-id="1" data-pregunta="<?php echo $preguntas[0]['valor_s_auditivo_preg']; ?>">Sensorial Auditivo</option>
										<option value="Ext_Superior" data-id="2" data-pregunta="<?php echo $preguntas[0]['valor_m_ext_superior_preg']; ?>">Ext. Superior</option>
										<option value="Ext_Inferior" data-id="3" data-pregunta="<?php echo $preguntas[0]['valor_m_ext_inferior_preg']; ?>">Ext. Inferior</option>
										<option value="Mental_Intelectual" data-id="4" data-pregunta="<?php echo $preguntas[0]['valor_m_intelectual_preg']; ?>">Mental Intelectual</option>
										<option value="Mental_Psicosocial" data-id="5" data-pregunta="<?php echo $preguntas[0]['valor_m_psicosocial_preg']; ?>">Mental Psicosocial</option>
									</select>
									<input type="hidden" id="txtPuestoTrabajoId" name="txtPuestoTrabajoId" value="">
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">

							<div class="panel panel-primary">
								<div class="panel-body">

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="col-lg-3 col-md-3 col-sm-3">
											<p>Pregunta: </p>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9">
                                            <span class="pregunta"></span>
										</div>

									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="col-lg-3 col-md-3 col-sm-3">
											<label for="txtActividadesRelacionadas" class="control-label">Actividades
												relacionadas</label>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9">
											<input type="text" id="txtActividadesRelacionadas"
												   name="txtActividadesRelacionadas" class="form-control" >
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="col-lg-3 col-md-3 col-sm-3">
											<label for="txtRequerimientoFuncional" class="control-label">Requerimiento
												Funcional</label>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9">
											<input type="text" id="txtRequerimientoFuncional"
												   name="txtRequerimientoFuncional" class="form-control" >
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="col-lg-3 col-md-3 col-sm-3">
											<label for="txtRestricciones" class="control-label">Restricciones</label>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9">
											<input type="text" id="txtRestricciones" name="txtRestricciones"
												   class="form-control" >
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado1" data-resultado="Sin Resultado"
													   value=""> Sin Resultado
											</label>
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado2" data-resultado="Sin Discapacidad"
													   value="0"> Sin Discapacidad
											</label>
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado3" value="1" data-resultado="Ligero">
												Ligero
											</label>
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado4" data-resultado="Moderado"
													   value="2">
												Moderado
											</label>
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado5" data-resultado="Importante"
													   value="3">
												Importante
											</label>
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado6" data-resultado="Severo" value="4">
												Severo
											</label>
											<label class="radio-inline">
												<input type="radio" class="rbResultado" name="rbResultado" id="rbResultado7" data-resultado="Grave" value="5">
												Grave
											</label>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
										<div class="form-group">
											<input type="button" class="btn btn-default btn-sm" value="Registrar"
												   id="btnRegistrar">
										</div>

									</div>

								</div>
							</div>


							<table class="table table-bordered">
								<thead>
								<tr class="active">
									<th>Tipo de Funcionalidad</th>
									<th class="text-center">Actividades realacionadas</th>
									<th class="text-center">Requerimiento funcional</th>
									<th class="text-center">Restricciones</th>
									<th class="text-center">Resultado</th>
									<th class="text-center">Acciones</th>
								</tr>

								</thead>
								<tbody>
								<tr>
									<td class="active"><strong>Sensorial Visual</strong></td>
									<td><span class="visual_0_actividad"></span></td>
									<td><span class="visual_1_requerimiento"></span></td>
									<td><span class="visual_2_restriccion"></span></td>
									<td><span class="visual_3_resultado"></span></td>
									<td class="text-center"><a href="" class="editar editar_visual">editar</a></td>
								</tr>
								<tr>
									<td class="active"><strong>Sensorial Auditivo</strong></td>
                                    <td><span class="auditivo_0_actividad"></span></td>
                                    <td><span class="auditivo_1_requerimiento"></span></td>
                                    <td><span class="auditivo_2_restriccion"></span></td>
                                    <td><span class="auditivo_3_resultado"></span></td>
									<td class="text-center"><a href="" class="editar editar_auditivo">editar</a></td>
								</tr>
								<tr>
									<td class="active"><strong>Ext. Superiores</strong></td>
                                    <td><span class="superiores_0_actividad"></span></td>
                                    <td><span class="superiores_1_requerimiento"></span></td>
                                    <td><span class="superiores_2_restriccion"></span></td>
                                    <td><span class="superiores_3_resultado"></span></td>
									<td class="text-center"><a href="" class="editar editar_superiores">editar</a></td>
								</tr>
								<tr>
									<td class="active"><strong>Ext. Inferiores</strong></td>
                                    <td><span class="inferiores_0_actividad"></span></td>
                                    <td><span class="inferiores_1_requerimiento"></span></td>
                                    <td><span class="inferiores_2_restriccion"></span></td>
                                    <td><span class="inferiores_3_resultado"></span></td>
									<td class="text-center"><a href="" class="editar editar_inferiores">editar</a></td>
								</tr>
								<tr>
									<td class="active"><strong>Mental Intelectual</strong></td>
                                    <td><span class="intelectual_0_actividad"></span></td>
                                    <td><span class="intelectual_1_requerimiento"></span></td>
                                    <td><span class="intelectual_2_restriccion"></span></td>
                                    <td><span class="intelectual_3_resultado"></span></td>
									<td class="text-center"><a href="" class="editar editar_intelectual">editar</a></td>
								</tr>
								<tr>
									<td class="active"><strong>Mental Psicosocial</strong></td>
                                    <td><span class="psicosocial_0_actividad"></span></td>
                                    <td><span class="psicosocial_1_requerimiento"></span></td>
                                    <td><span class="psicosocial_2_restriccion"></span></td>
                                    <td><span class="psicosocial_3_resultado"></span></td>
									<td class="text-center"><a href="" class="editar editar_psicosocial">editar</a></td>
								</tr>
								</tbody>
							</table>


						</div>
					</div>


					<div class="row"><strong class="col-sm-12 text-muted">Resultado de la Evaluaci&oacute;n
							Final </strong></div>
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<table class="table table-bordered">
								<thead>
								<tr class="active">
									<th>Tipo de Funcionalidad</th>
									<th class="text-center">FEDD</th>
									<th class="text-center">SISO</th>
									<th class="text-center">EVA-ERIN</th>
								</tr>

								</thead>
								<tbody>
								<tr>
									<td class="active"><strong>Visual</strong></td>
									<td><span class="visual_fedd"></td>
									<td><span class="visual_siso"></td>
									<td rowspan="6" class="text-center" style="vertical-align: middle;"><span class="evaerin"></span></td>
								</tr>
								<tr>
									<td class="active"><strong>Auditivo</strong></td>
									<td><span class="auditivo_fedd"></td>
									<td><span class="auditivo_siso"></td>

								</tr>
								<tr>
									<td class="active"><strong>Ext. Superiores</strong></td>
									<td><span class="superiores_fedd"></td>
									<td><span class="superiores_siso"></td>

								</tr>
								<tr>
									<td class="active"><strong>Ext. Inferiores</strong></td>
									<td><span class="inferiores_fedd"></td>
									<td><span class="inferiores_siso"></td>

								</tr>
								<tr>
									<td class="active"><strong>Intelectual</strong></td>
									<td><span class="intelectual_fedd"></td>
									<td><span class="intelectual_siso"></td>

								</tr>
								<tr>
									<td class="active"><strong>Psicosocial</strong></td>
									<td><span class="psicosocial_fedd"></td>
									<td><span class="psicosocial_siso"></td>

								</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="col-lg-3 col-md-3 col-sm-3">
								<strong>Evaluaci&oacute;n final:</strong>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<label for="cmbFeddVisual">
									Visual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="cmbFeddVisual" id="cmbFeddVisual" class="form-control evalFinal" disabled>
										<option value="">Seleccione</option>
										<option value="0">Sin Discapacidad</option>
										<option value="1">Ligero</option>
										<option value="2">Moderado</option>
										<option value="3">Importante</option>
										<option value="4">Severo</option>
										<option value="5">Grave</option>
									</select>
								</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<label for="cmbFeddAuditivo">
									Auditivo
									<select name="cmbFeddAuditivo" id="cmbFeddAuditivo" class="form-control evalFinal" disabled>
                                        <option value="">Seleccione</option>
                                        <option value="0">Sin Discapacidad</option>
                                        <option value="1">Ligero</option>
                                        <option value="2">Moderado</option>
                                        <option value="3">Importante</option>
                                        <option value="4">Severo</option>
                                        <option value="5">Grave</option>
									</select>
								</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<label for="cmbFeddExtSuperiores">
									Ext. Superiores
									<select name="cmbFeddExtSuperiores" id="cmbFeddExtSuperiores" class="form-control evalFinal"
											disabled>
                                        <option value="">Seleccione</option>
                                        <option value="0">Sin Discapacidad</option>
                                        <option value="1">Ligero</option>
                                        <option value="2">Moderado</option>
                                        <option value="3">Importante</option>
                                        <option value="4">Severo</option>
                                        <option value="5">Grave</option>
									</select>
								</label>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="col-lg-3 col-md-3 col-sm-3">

							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<label for="cmbFeddInferiores">
									Ext. Inferiores
									<select name="cmbFeddInferiores" id="cmbFeddInferiores" class="form-control evalFinal" disabled>
										<option value="">Seleccione</option>
                                        <option value="0">Sin Discapacidad</option>
                                        <option value="1">Ligero</option>
                                        <option value="2">Moderado</option>
                                        <option value="3">Importante</option>
                                        <option value="4">Severo</option>
                                        <option value="5">Grave</option>
									</select>
								</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<label for="cmbFeddIntelectual">
									Intelectual
									<select name="cmbFeddIntelectual" id="cmbFeddIntelectual" class="form-control evalFinal"
											disabled>
                                        <option value="">Seleccione</option>
                                        <option value="0">Sin Discapacidad</option>
                                        <option value="1">Ligero</option>
                                        <option value="2">Moderado</option>
                                        <option value="3">Importante</option>
                                        <option value="4">Severo</option>
                                        <option value="5">Grave</option>
									</select>
								</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<label for="cmbFeddPsicosocial">
									Psicosocial
									<select name="cmbFeddPsicosocial" id="cmbFeddPsicosocial" class="form-control evalFinal"
											disabled>
                                        <option value="">Seleccione</option>
                                        <option value="0">Sin Discapacidad</option>
                                        <option value="1">Ligero</option>
                                        <option value="2">Moderado</option>
                                        <option value="3">Importante</option>
                                        <option value="4">Severo</option>
                                        <option value="5">Grave</option>
									</select>
								</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="col-lg-3 col-md-3 col-sm-3">
								<strong>Apto/No Apto</strong>

							</div>
							<div class="col-lg-9 col-md-9 col-sm-9">
                                <span class="apto"></span>
                                <input type="hidden" id="apto">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="col-lg-3 col-md-3 col-sm-3">
								<strong >Observaciones de EvaErin</strong>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9">
								<span class="obs_evaerin"></span>
							</div>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="col-lg-3 col-md-3 col-sm-3">
								<strong>Aplica ajustes razonables</strong>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9">
								<textarea id="ajustes" name="" id="" cols="90" rows="3" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<input type="button" class="btn btn-primary" value="Registrar Evaluaci&oacute;n"
								   id="btnRegistrarEvaluacion">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function () {

        $('#cmbResultado').on('change',function(){
            $('.pregunta').html($('#cmbResultado').select2().find(":selected").data("pregunta"));
        });

		$('#cmbLocal').on('change', function () {

			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('fedd/getAreas'); ?>",
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

        $('.evalFinal').change(function(){
            if($('.evaerin').html() == 'AMARILLO'){
                if($('#cmbFeddVisual').val() >= 1 && $('#cmbFeddAuditivo').val() >= 1 && $('#cmbFeddExtSuperiores').val() >= 1
                    && $('#cmbFeddInferiores').val() >= 1 && $('#cmbFeddIntelectual').val() >= 1 && $('#cmbFeddPsicosocial').val() >= 1){
                    $('.apto').html('Apto con observaciones de evaluacion final');
                    $('#apto').val(1);

                }else{
                    $('.apto').html('No Apto');
                    $('#apto').val(0);
                }
            }
        });

        $('#btnRegistrarEvaluacion').on('click',function(e){
            e.preventDefault();
            var evaerin = $('.evaerin').html();
            var visual = $('#cmbFeddVisual').val();
            var auditivo = $('#cmbFeddAuditivo').val();
            var superiores = $('#cmbFeddExtSuperiores').val();
            var inferiores = $('#cmbFeddInferiores').val();
            var intelectual = $('#cmbFeddIntelectual').val();
            var psicosocial = $('#cmbFeddPsicosocial').val();
            var ajustes = $('#ajustes').val();
            var puestoId = $('#txtPuestoTrabajoId').val();

            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "<?php echo site_url('fedd/createEvalFinal'); ?>",
                data: {
                    evaerin: evaerin,
                    visual : visual,
                    auditivo : auditivo,
                    superiores : superiores,
                    inferiores : inferiores,
                    intelectual : intelectual,
                    psicosocial : psicosocial,
                    ajustes : ajustes,
                    puestoId : puestoId
                }
            }).done(function (msg) {
                if(msg.status) {
                    alert(msg.result);
                    window.location = '<?php echo site_url('fedd');?>';
                }else{
                    alert(msg.result);
                }
            });
        });

		$('#btnRegistrar').on('click',function(e){
            var resultadoId= $('#cmbResultado').find(':selected').data('id');
            var actividades = $('#txtActividadesRelacionadas').val();
            var requerimiento = $('#txtRequerimientoFuncional').val();
            var restricciones = $('#txtRestricciones').val();
            var puestoId = $('#txtPuestoTrabajoId').val();
            var resultado = $("input:radio[name=rbResultado]:checked").val();
            var resultado_data = $("input:radio[name=rbResultado]:checked").data('resultado');

          if(resultadoId >-1 && actividades != '' && requerimiento !='' && restricciones!='' && resultado_data!='' && puestoId !='') {
              $.ajax({
                  method: "POST",
                  dataType: 'json',
                  url: "<?php echo site_url('fedd/createEvalFedd'); ?>",
                  data: {resultadoId: resultadoId,
                      actividades : actividades,
                      requerimiento : requerimiento,
                      restricciones : restricciones,
                      resultado : resultado,
                      puestoId : puestoId
                  }
              }).done(function (msg) {
                if(msg.status){

                    if(resultadoId == 0){
                        $('.editar_visual').attr('href',actividades+'|'+requerimiento+'|'+restricciones+'|'+resultado_data);
                        $('.visual_0_actividad').html(actividades);
                        $('.visual_1_requerimiento').html(requerimiento);
                        $('.visual_2_restriccion').html(restricciones);
                        $('.visual_3_resultado').html(resultado_data);

                    }else if(resultadoId == 1) {
                        $('.editar_auditivo').attr('href',actividades+'|'+requerimiento+'|'+restricciones+'|'+resultado_data);
                        $('.auditivo_0_actividad').html(actividades);
                        $('.auditivo_1_requerimiento').html(requerimiento);
                        $('.auditivo_2_restriccion').html(restricciones);
                        $('.auditivo_3_resultado').html(resultado_data);

                    }else if(resultadoId == 2) {
                        $('.editar_superiores').attr('href',actividades+'|'+requerimiento+'|'+restricciones+'|'+resultado_data);
                        $('.superiores_0_actividad').html(actividades);
                        $('.superiores_1_requerimiento').html(requerimiento);
                        $('.superiores_2_restriccion').html(restricciones);
                        $('.superiores_3_resultado').html(resultado_data);

                    }else if(resultadoId == 3) {
                        $('.editar_inferiores').attr('href',actividades+'|'+requerimiento+'|'+restricciones+'|'+resultado_data);
                        $('.inferiores_0_actividad').html(actividades);
                        $('.inferiores_1_requerimiento').html(requerimiento);
                        $('.inferiores_2_restriccion').html(restricciones);
                        $('.inferiores_3_resultado').html(resultado_data);

                    }else if(resultadoId == 4) {
                        $('.editar_intelectual').attr('href',actividades+'|'+requerimiento+'|'+restricciones+'|'+resultado_data);
                        $('.intelectual_0_actividad').html(actividades);
                        $('.intelectual_1_requerimiento').html(requerimiento);
                        $('.intelectual_2_restriccion').html(restricciones);
                        $('.intelectual_3_resultado').html(resultado_data);

                    }else if(resultadoId == 5) {
                        $('.editar_psicosocial').attr('href',actividades+'|'+requerimiento+'|'+restricciones+'|'+resultado_data);
                        $('.psicosocial_0_actividad').html(actividades);
                        $('.psicosocial_1_requerimiento').html(requerimiento);
                        $('.psicosocial_2_restriccion').html(restricciones);
                        $('.psicosocial_3_resultado').html(resultado_data);
                     }
                    // no borrar este console log
					console.log(1);

					if($('.psicosocial_3_resultado').html()!='' && $('.intelectual_3_resultado').html()!='' && $('.inferiores_3_resultado').html()!=''
                     && $('.superiores_3_resultado').html()!='' && $('.auditivo_3_resultado').html() != '' && $('.visual_3_resultado').html() !=''){
                        $('.visual_fedd').html($('.visual_3_resultado').html());
                        $('.auditivo_fedd').html($('.auditivo_3_resultado').html());
                        $('.superiores_fedd').html($('.superiores_3_resultado').html());
                        $('.inferiores_fedd').html($('.inferiores_3_resultado').html());
                        $('.intelectual_fedd').html($('.intelectual_3_resultado').html());
                        $('.psicosocial_fedd').html($('.psicosocial_3_resultado').html());

                        if($('.psicosocial_3_resultado').html()!='' && $('.intelectual_3_resultado').html()!='' && $('.inferiores_3_resultado').html()!=''
                            && $('.superiores_3_resultado').html()!='' && $('.auditivo_3_resultado').html() != '' && $('.visual_3_resultado').html() !=''
                            &&  $('.visual_siso').html()!='' && $('.auditivo_siso').html() !='' && $('.superiores_siso').html() !='' && $('.inferiores_siso').html()!=''
                            && $('.intelectual_siso').html()!='' && $('.psicosocial_siso').html()!='' && $('.evaerin').html()!=''){

                            if($('.evaerin').html() == 'VERDE'){
                                $('.apto').html('Apto con observaciones de evaluacion final ');
                                $('#apto').val(1);

                                $('#cmbFeddVisual').val(msg.puesto.resultado_pt_s_visual).trigger("change");
                                $('#cmbFeddAuditivo').val(msg.puesto.resultado_pt_s_auditivo).trigger("change");
                                $('#cmbFeddExtSuperiores').val(msg.puesto.resultado_pt_m_ext_sup).trigger("change");
                                $('#cmbFeddInferiores').val(msg.puesto.resultado_pt_m_ext_inf).trigger("change");
                                $('#cmbFeddIntelectual').val(msg.puesto.resultado_pt_m_intelectual).trigger("change");
                                $('#cmbFeddPsicosocial').val(msg.puesto.resultado_pt_m_psicosocial).trigger("change");

                                $('#cmbFeddVisual').attr('disabled',true);
                                $('#cmbFeddAuditivo').attr('disabled',true);
                                $('#cmbFeddExtSuperiores').attr('disabled',true);
                                $('#cmbFeddInferiores').attr('disabled',true);
                                $('#cmbFeddIntelectual').attr('disabled',true);
                                $('#cmbFeddPsicosocial').attr('disabled',true);

                            }else if($('.evaerin').html() == 'ROJO'){
                                $('.apto').html('No Apto');
                                $('#apto').val(0);

                                $('#cmbFeddVisual').val(0).trigger("change");
                                $('#cmbFeddAuditivo').val(0).trigger("change");
                                $('#cmbFeddExtSuperiores').val(0).trigger("change");
                                $('#cmbFeddInferiores').val(0).trigger("change");
                                $('#cmbFeddIntelectual').val(0).trigger("change");
                                $('#cmbFeddPsicosocial').val(0).trigger("change");

                                $('#cmbFeddVisual').attr('disabled',true);
                                $('#cmbFeddAuditivo').attr('disabled',true);
                                $('#cmbFeddExtSuperiores').attr('disabled',true);
                                $('#cmbFeddInferiores').attr('disabled',true);
                                $('#cmbFeddIntelectual').attr('disabled',true);
                                $('#cmbFeddPsicosocial').attr('disabled',true);

                            }else if($('.evaerin').html() == 'AMARILLO'){
                                $('#cmbFeddVisual').val(msg.puesto.resultado_pt_s_visual).trigger("change");
                                $('#cmbFeddAuditivo').val(msg.puesto.resultado_pt_s_auditivo).trigger("change");
                                $('#cmbFeddExtSuperiores').val(msg.puesto.resultado_pt_m_ext_sup).trigger("change");
                                $('#cmbFeddInferiores').val(msg.puesto.resultado_pt_m_ext_inf).trigger("change");
                                $('#cmbFeddIntelectual').val(msg.puesto.resultado_pt_m_intelectual).trigger("change");
                                $('#cmbFeddPsicosocial').val(msg.puesto.resultado_pt_m_psicosocial).trigger("change");
								if(msg.puesto.resultado_pt_s_visual >= 1 && msg.puesto.resultado_pt_s_auditivo >= 1 && msg.puesto.resultado_pt_m_ext_sup >= 1
								  && msg.puesto.resultado_pt_m_ext_inf >= 1 && msg.puesto.resultado_pt_m_intelectual >= 1 && msg.puesto.resultado_pt_m_psicosocial >= 1){
                                    $('.apto').html('Apto con observaciones de evaluacion final');
                                    $('#apto').val(1);

								}else{
                                    $('.apto').html('No Apto');
                                    $('#apto').val(0);
								}
                                $('#cmbFeddAuditivo').attr('disabled',false);
                                $('#cmbFeddExtSuperiores').attr('disabled',false);
                                $('#cmbFeddInferiores').attr('disabled',false);
                                $('#cmbFeddIntelectual').attr('disabled',false);
                                $('#cmbFeddPsicosocial').attr('disabled',false);

                            }
                        }
                    }

					$('#txtActividadesRelacionadas').val('');
					$('#txtRequerimientoFuncional').val('');
					$('#txtRestricciones').val('');
					$(".rbResultado").prop('checked',false);
					$('.pregunta').html('');
					$('#cmbResultado').val('').trigger("change");
				}else{
                    alert(msg.result);
                }
              });
          }else{
              alert('Debe seleccionar los campos requeridos');
          }

        });

		$('#cmbArea').on('change', function () {

			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('fedd/getSabha'); ?>",
				data: {idArea: $(this).val()}
			}).done(function (msg) {
//				console.log(msg);
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
            if (typeof dataSabha !== 'undefined'){
                var id = $(this).val();
                $('.codigosabha').text(dataSabha.codigoSabha);
                $('#txtPuestoTrabajoId').val(id);
                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "<?php echo site_url('fedd/getFedd'); ?>",
                    data: {id: $(this).val()}
                }).done(function (msg) {
//                console.log(msg);
                    limpiarResultados();
                    $('.visual_0_actividad').html(msg.s_visual_actividad);
                    $('.visual_1_requerimiento').html(msg.s_visual_requerimiento);
                    $('.visual_2_restriccion').html(msg.s_visual_restriccion);
                    $('.visual_3_resultado').html(msg.s_visual_pre_eval);

                    $('.auditivo_0_actividad').html(msg.s_auditivo_actividad);
                    $('.auditivo_1_requerimiento').html(msg.s_auditivo_requerimiento);
                    $('.auditivo_2_restriccion').html(msg.s_auditivo_restriccion);
                    $('.auditivo_3_resultado').html(msg.s_auditivo_pre_eval);

                    $('.superiores_0_actividad').html(msg.m_ext_sup_actividad);
                    $('.superiores_1_requerimiento').html(msg.m_ext_sup_requerimiento);
                    $('.superiores_2_restriccion').html(msg.m_ext_sup_restriccion);
                    $('.superiores_3_resultado').html(msg.m_ext_sup_pre_eval);

                    $('.inferiores_0_actividad').html(msg.m_ext_inf_actividad);
                    $('.inferiores_1_requerimiento').html(msg.m_ext_inf_requerimiento);
                    $('.inferiores_2_restriccion').html(msg.m_ext_inf_restriccion);
                    $('.inferiores_3_resultado').html(msg.m_ext_inf_pre_eval);

                    $('.intelectual_0_actividad').html(msg.m_intelectual_actividad);
                    $('.intelectual_1_requerimiento').html(msg.m_intelectual_requerimiento);
                    $('.intelectual_2_restriccion').html(msg.m_intelectual_restriccion);
                    $('.intelectual_3_resultado').html(msg.m_intelectual_pre_eval);

                    $('.psicosocial_0_actividad').html(msg.m_psicosocial_actividad);
                    $('.psicosocial_1_requerimiento').html(msg.m_psicosocial_requerimiento);
                    $('.psicosocial_2_restriccion').html(msg.m_psicosocial_restriccion);
                    $('.psicosocial_3_resultado').html(msg.m_psicosocial_pre_eval);

                    if(msg.s_visual_pre_eval !='' && msg.s_auditivo_pre_eval !='' && msg.m_ext_sup_pre_eval !='' && msg.m_ext_inf_pre_eval !=''
                        && msg.m_intelectual_pre_eval !='' && msg.m_psicosocial_pre_eval !=''){
                        //fedd
                        $('.visual_fedd').html(msg.s_visual_pre_eval);
                        $('.auditivo_fedd').html(msg.s_auditivo_pre_eval);
                        $('.superiores_fedd').html(msg.m_ext_sup_pre_eval);
                        $('.inferiores_fedd').html(msg.m_ext_inf_pre_eval);
                        $('.intelectual_fedd').html(msg.m_intelectual_pre_eval);
                        $('.psicosocial_fedd').html(msg.m_psicosocial_pre_eval);
                    }
                    //siso
                    $('.visual_siso').html(msg.siso_s_visual);
                    $('.auditivo_siso').html(msg.siso_s_auditivo);
                    $('.superiores_siso').html(msg.siso_m_ext_superior);
                    $('.inferiores_siso').html(msg.siso_m_ext_inferior);
                    $('.intelectual_siso').html(msg.siso_m_intelectual);
                    $('.psicosocial_siso').html(msg.siso_m_psicosocial);

                    //evaerin
                    $('.obs_evaerin').html(msg.eva_erin_observaciones);
                    $('.evaerin').html(msg.eva_erin_resultado);


                    $('#cmbFeddVisual').attr('disabled',true);
                    $('#cmbFeddAuditivo').attr('disabled',true);
                    $('#cmbFeddExtSuperiores').attr('disabled',true);
                    $('#cmbFeddInferiores').attr('disabled',true);
                    $('#cmbFeddIntelectual').attr('disabled',true);
                    $('#cmbFeddPsicosocial').attr('disabled',true);

                    $('.apto').html('');

                    if(msg.s_visual_pre_eval !='' && msg.s_auditivo_pre_eval !='' && msg.m_ext_sup_pre_eval !='' && msg.m_ext_inf_pre_eval !=''
                        && msg.m_intelectual_pre_eval !='' && msg.m_psicosocial_pre_eval !='' && msg.siso_s_visual!='' && msg.siso_s_auditivo!=''
                        && msg.siso_m_ext_superior!='' && msg.siso_m_ext_inferior!='' && msg.siso_m_intelectual!='' && msg.siso_m_psicosocial !=''
                        && msg.eva_erin_resultado != ''){

                        $('#cmbFeddVisual').val('').trigger("change");
                        $('#cmbFeddAuditivo').val('').trigger("change");
                        $('#cmbFeddExtSuperiores').val('').trigger("change");
                        $('#cmbFeddInferiores').val('').trigger("change");
                        $('#cmbFeddIntelectual').val('').trigger("change");
                        $('#cmbFeddPsicosocial').val('').trigger("change");

                        if(msg.eva_erin_resultado == 'VERDE'){
                            if(msg.es_apto == 1 && msg.es_apto!= null){
                                $('.apto').html('Apto con observaciones de evaluacion final ');
                                $('#apto').val(msg.es_apto);
                            }else if (msg.es_apto == 0 && msg.es_apto!= null){
                                $('.apto').html('No Apto');
                                $('#apto').val(msg.es_apto);
                            } else {
                                $('.apto').html('');
                                $('#apto').val(msg.es_apto);
                            }

                            $('#cmbFeddVisual').attr('disabled',true);
                            $('#cmbFeddAuditivo').attr('disabled',true);
                            $('#cmbFeddExtSuperiores').attr('disabled',true);
                            $('#cmbFeddInferiores').attr('disabled',true);
                            $('#cmbFeddIntelectual').attr('disabled',true);
                            $('#cmbFeddPsicosocial').attr('disabled',true);

                        }else if(msg.eva_erin_resultado == 'ROJO'){
                            if(msg.es_apto == 1 && msg.es_apto!= null){
                                $('.apto').html('Apto con observaciones de evaluacion final ');
                                $('#apto').val(msg.es_apto);
                            }else if (msg.es_apto == 0 && msg.es_apto!= null){
                                $('.apto').html('No Apto');
                                $('#apto').val(msg.es_apto);
                            } else {
                                $('.apto').html('');
                                $('#apto').val(msg.es_apto);
                            }

                            $('#cmbFeddVisual').attr('disabled',true);
                            $('#cmbFeddAuditivo').attr('disabled',true);
                            $('#cmbFeddExtSuperiores').attr('disabled',true);
                            $('#cmbFeddInferiores').attr('disabled',true);
                            $('#cmbFeddIntelectual').attr('disabled',true);
                            $('#cmbFeddPsicosocial').attr('disabled',true);

                        }else if(msg.eva_erin_resultado == 'AMARILLO'){
                            if(msg.es_apto == 1 && msg.es_apto!= null){
                                $('.apto').html('Apto con observaciones de evaluacion final ');
                                $('#apto').val(msg.es_apto);
                            }else if (msg.es_apto == 0 && msg.es_apto!= null){
                                $('.apto').html('No Apto');
                                $('#apto').val(msg.es_apto);
                            } else {
                                $('.apto').html('');
                                $('#apto').val(msg.es_apto);
                            }

                            $('#cmbFeddVisual').attr('disabled',false);
                            $('#cmbFeddAuditivo').attr('disabled',false);
                            $('#cmbFeddExtSuperiores').attr('disabled',false);
                            $('#cmbFeddInferiores').attr('disabled',false);
                            $('#cmbFeddIntelectual').attr('disabled',false);
                            $('#cmbFeddPsicosocial').attr('disabled',false);

							if(msg.resultado_final_s_visual >= 1 && msg.resultado_final_s_auditivo >= 1 && msg.resultado_final_m_ext_sup >= 1
								&& msg.resultado_final_m_ext_inf >= 1 && msg.resultado_final_m_intelectual >= 1 && msg.resultado_final_m_psicosocial >= 1){
                                $('.apto').html('Apto con observaciones de evaluacion final');
                                $('#apto').val(1);

							}else{
                                $('.apto').html('No Apto');
                                $('#apto').val(0);
							}

//                            $('#cmbFeddVisual').val(msg.resultado_final_s_visual).trigger("change");
//                            $('#cmbFeddAuditivo').val(msg.resultado_final_s_auditivo).trigger("change");
//                            $('#cmbFeddExtSuperiores').val(msg.resultado_final_m_ext_sup).trigger("change");
//                            $('#cmbFeddInferiores').val(msg.resultado_final_m_ext_inf).trigger("change");
//                            $('#cmbFeddIntelectual').val(msg.resultado_final_m_intelectual).trigger("change");
//                            $('#cmbFeddPsicosocial').val(msg.resultado_final_m_psicosocial).trigger("change");
                        }


                        $('#cmbFeddVisual').val(msg.resultado_final_s_visual).trigger("change");
                        $('#cmbFeddAuditivo').val(msg.resultado_final_s_auditivo).trigger("change");
                        $('#cmbFeddExtSuperiores').val(msg.resultado_final_m_ext_sup).trigger("change");
                        $('#cmbFeddInferiores').val(msg.resultado_final_m_ext_inf).trigger("change");
                        $('#cmbFeddIntelectual').val(msg.resultado_final_m_intelectual).trigger("change");
                        $('#cmbFeddPsicosocial').val(msg.resultado_final_m_psicosocial).trigger("change");

                        $('#ajustes').html(msg.aplica_ajutes);
                    }

                    //editar
                    $('.editar_visual').attr('href',msg.s_visual_actividad+'|'+msg.s_visual_requerimiento+'|'+msg.s_visual_restriccion+'|'+msg.s_visual_pre_eval);
                    $('.editar_auditivo').attr('href',msg.s_auditivo_actividad+'|'+msg.s_auditivo_requerimiento+'|'+msg.s_auditivo_restriccion+'|'+msg.s_auditivo_pre_eval);
                    $('.editar_superiores').attr('href',msg.m_ext_sup_actividad+'|'+msg.m_ext_sup_requerimiento+'|'+msg.m_ext_sup_restriccion+'|'+msg.m_ext_sup_pre_eval);
                    $('.editar_inferiores').attr('href',msg.m_ext_inf_actividad+'|'+msg.m_ext_inf_requerimiento+'|'+msg.m_ext_inf_restriccion+'|'+msg.m_ext_inf_pre_eval);
                    $('.editar_intelectual').attr('href',msg.m_intelectual_actividad+'|'+msg.m_intelectual_requerimiento+'|'+msg.m_intelectual_restriccion+'|'+msg.m_intelectual_pre_eval);
                    $('.editar_psicosocial').attr('href',msg.m_psicosocial_actividad+'|'+msg.m_psicosocial_requerimiento+'|'+msg.m_psicosocial_restriccion+'|'+msg.m_psicosocial_pre_eval);



                });
            }

		});


        function limpiarResultados() {

        // tabla feddd
            $('.visual_0_actividad').html('');
            $('.visual_1_requerimiento').html('');
            $('.visual_2_restriccion').html('');
            $('.visual_3_resultado').html('');

            $('.auditivo_0_actividad').html('');
            $('.auditivo_1_requerimiento').html('');
            $('.auditivo_2_restriccion').html('');
            $('.auditivo_3_resultado').html('');

            $('.superiores_0_actividad').html('');
            $('.superiores_1_requerimiento').html('');
            $('.superiores_2_restriccion').html('');
            $('.superiores_3_resultado').html('');

            $('.inferiores_0_actividad').html('');
            $('.inferiores_1_requerimiento').html('');
            $('.inferiores_2_restriccion').html('');
            $('.inferiores_3_resultado').html('');

            $('.intelectual_0_actividad').html('');
            $('.intelectual_1_requerimiento').html('');
            $('.intelectual_2_restriccion').html('');
            $('.intelectual_3_resultado').html('');

            $('.psicosocial_0_actividad').html('');
            $('.psicosocial_1_requerimiento').html('');
            $('.psicosocial_2_restriccion').html('');
            $('.psicosocial_3_resultado').html('');

            // tabla eval final
            $('.visual_fedd').html('');
            $('.auditivo_fedd').html('');
            $('.superiores_fedd').html('');
            $('.inferiores_fedd').html('');
            $('.intelectual_fedd').html('');
            $('.psicosocial_fedd').html('');

            $('.visual_siso').html('');
            $('.auditivo_siso').html('');
            $('.superiores_siso').html('');
            $('.inferiores_siso').html('');
            $('.intelectual_siso').html('');
            $('.psicosocial_siso').html('');
            $('.evaerin').html('');

            $('#cmbFeddVisual').val('').trigger("change");
            $('#cmbFeddAuditivo').val('').trigger("change");
            $('#cmbFeddExtSuperiores').val('').trigger("change");
            $('#cmbFeddInferiores').val('').trigger("change");
            $('#cmbFeddIntelectual').val('').trigger("change");
            $('#cmbFeddPsicosocial').val('').trigger("change");

            //FINAL
            $('.obs_evaerin').html('');
            $('.apto').html('');
            $('#apto').val('');
            $('#ajustes').html('');
            //evaluacion fedd
            $('#txtActividadesRelacionadas').val('');
            $('#txtRequerimientoFuncional').val('');
            $('#txtRestricciones').val('');
            $(".rbResultado").prop('checked',false);
            $('.pregunta').html('');

        }

        $('.editar').on('click',function(e){
            e.preventDefault();
            var data = $(this).attr('href').split('|');
            console.log(data);

            //$('#cmbResultado').val('');
            $('#txtActividadesRelacionadas').val(data[0]);
            $('#txtRequerimientoFuncional').val(data[1]);
            $('#txtRestricciones').val(data[2]);
            $(".rbResultado").prop('checked',false);
            if(data[3] == 'Sin Resultado'){
                $("#rbResultado1").prop('checked',true);
            }else if(data[3] == 'Sin Discapacidad'){
                $("#rbResultado2").prop('checked',true);
            }else if(data[3] == 'Ligero'){
                $("#rbResultado3").prop('checked',true);
            }else if(data[3] == 'Moderado'){
                $("#rbResultado4").prop('checked',true);
            }else if(data[3] == 'Importante'){
                $("#rbResultado5").prop('checked',true);
            }else if(data[3] == 'Severo'){
                $("#rbResultado6").prop('checked',true);
            }else if(data[3] == 'Grave'){
                $("#rbResultado7").prop('checked',true);
            }


			if($(this).hasClass('editar_visual')){
				$('#cmbResultado').val('Sensorial_Visual').trigger("change");
			}else if($(this).hasClass('editar_auditivo')){
				$('#cmbResultado').val('Sensorial_Auditivo').trigger("change");
			}else if($(this).hasClass('editar_superiores')){
				$('#cmbResultado').val('Ext_Superior').trigger("change");
			}else if($(this).hasClass('editar_inferiores')){
				$('#cmbResultado').val('Ext_Inferior').trigger("change");
			}else if($(this).hasClass('editar_intelectual')){
				$('#cmbResultado').val('Mental_Intelectual').trigger("change");
			}else if($(this).hasClass('editar_psicosocial')){
				$('#cmbResultado').val('Mental_Psicosocial').trigger("change");
			}


            e.stopPropagation();
        });
	});
</script>
