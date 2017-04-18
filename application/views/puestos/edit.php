<?php
//echo '<pre>', print_r($puesto->toArray()), '</pre>';die();

$array = array(
	'sensorial_visual' => array(0 => 'Sin Discapacidad',
		1 => 'Ligero',
		2 => 'Moderado',
		3 => 'Importante',
		4 => 'Severo',
		5 => 'Grave'),
	'sensorial_auditivo' => array(0 => 'Sin Discapacidad',
		1 => 'Ligero',
		2 => 'Moderado',
		3 => 'Importante',
		4 => 'Severo',
		5 => 'Grave'),
	'ext_inferiores' => array(0 => 'Sin Discapacidad',
		1 => 'Ligero',
		2 => 'Moderado',
		3 => 'Importante',
		4 => 'Severo',
		5 => 'Grave'),
	'ext_superiores' => array(0 => 'Sin Discapacidad',
		1 => 'Ligero',
		2 => 'Moderado',
		3 => 'Importante',
		4 => 'Severo',
		5 => 'Grave'),
	'intelectual' => array(0 => 'Sin Discapacidad',
		1 => 'Ligero',
		2 => 'Moderado',
		3 => 'Importante',
		4 => 'Severo',
		5 => 'Grave'),
	'psicosocial' => array(0 => 'Sin Discapacidad',
		1 => 'Ligero',
		2 => 'Moderado',
		3 => 'Importante',
		4 => 'Severo',
		5 => 'Grave')

);

?>

<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">

		<div class="panel panel-default">
			<div class="panel-heading text-center">Puesto de Trabajo</div>
			<div class="panel-body">

				<form id="frmPuestos" name="frmPuestos" class="form-horizontal" method="POST">
					<div class="row"><strong class="col-sm-12 text-muted">Datos de la Empresa</strong></div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbLocal" class="col-md-2 control-label">Sede</label>
								<div class="col-md-10">
									<select name="cmbLocal" id="cmbLocal" class="form-control" required>
										<option value="">Seleccione Sede</option>
										<?php
										foreach ($locales as $value) {

											$select = (($puesto[0]['id_local']) == $value['id']) ? 'selected' : '';

											echo '<option ', $select, ' value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
										}
										?>
									</select>
									<input type="hidden" id="txtEmpresaId" name="txtEmpresaId"
										   value="<?php echo $this->session->id_empresa; ?>">
									<input type="hidden" id="txtPuestoId" name="txtPuestoId"
										   value="<?php echo (int)$this->uri->segment(3); ?>">
								</div>
							</div>

						</div>
					</div>

					<div class="row"><strong class="col-sm-12 text-muted">Datos del Entrevistado </strong></div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtNombreEntrevistado" class="col-md-2 control-label">Nombre</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtNombreEntrevistado"
										   value="<?php echo isset($puesto[0]['entrevistado_nombre']) ? $puesto[0]['entrevistado_nombre'] : ''; ?>"
										   name="txtNombreEntrevistado" placeholder="Nombre Entrevistado" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtPuestoEntrevistado" class="col-md-2 control-label">Puesto</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtPuestoEntrevistado"
										   value="<?php echo isset($puesto[0]['entrevistado_puesto']) ? $puesto[0]['entrevistado_puesto'] : ''; ?>"
										   name="txtPuestoEntrevistado" placeholder="Puesto Entrevistado" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtTelefonoEntrevistado"
									   class="col-md-2 control-label">Tel&eacute;fono</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtTelefonoEntrevistado"
										   value="<?php echo isset($puesto[0]['entrevistado_telefono']) ? $puesto[0]['entrevistado_telefono'] : ''; ?>"
										   name="txtTelefonoEntrevistado" placeholder="Telefono Entrevistado" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtEmailEntrevistado" class="col-md-2 control-label">Email</label>
								<div class="col-md-10">
									<input type="email" class="form-control" id="txtEmailEntrevistado"
										   value="<?php echo isset($puesto[0]['entrevistado_email']) ? $puesto[0]['entrevistado_email'] : ''; ?>"
										   name="txtEmailEntrevistado" placeholder="Email Entrevistado" required>
								</div>
							</div>
						</div>
					</div>

					<div class="row"><strong class="col-sm-12 text-muted">Datos del Puesto de trabajo </strong></div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtCodigoSabha" class="col-md-2 control-label">C&oacute;digo SABHA</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtCodigoSabha"
										   value="<?php echo isset($puesto[0]['codigo_sabha']) ? $puesto[0]['codigo_sabha'] : ''; ?>"
										   name="txtCodigoSabha" placeholder="Codigo SABHA">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtDenominacionSabha" class="col-md-2 control-label">Denominaci&oacute;n
									SABHA</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtDenominacionSabha"
										   value="<?php echo isset($puesto[0]['denominacion_sabha']) ? $puesto[0]['denominacion_sabha'] : ''; ?>"
										   name="txtDenominacionSabha" placeholder="Denominacion SABHA" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtCodigoMof" class="col-md-2 control-label">C&oacute;digo MOF</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtCodigoMof"
										   value="<?php echo isset($puesto[0]['codigo_mof']) ? $puesto[0]['codigo_mof'] : ''; ?>"
										   name="txtCodigoMof" placeholder="Codigo MOF">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtDenominacionMof" class="col-md-2 control-label">Denominaci&oacute;n
									MOF</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtDenominacionMof"
										   value="<?php echo isset($puesto[0]['denominacion_mof']) ? $puesto[0]['denominacion_mof'] : ''; ?>"
										   name="txtDenominacionMof" placeholder="Denominacion MOF">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtCodigoSap" class="col-md-2 control-label">C&oacute;digo SAP</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtCodigoSap"
										   value="<?php echo isset($puesto[0]['codigo_sap']) ? $puesto[0]['codigo_sap'] : ''; ?>"
										   name="txtCodigoSap" placeholder="Codigo SAP">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtDenominacionSap" class="col-md-2 control-label">Denominaci&oacute;n
									SAP</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtDenominacionSap"
										   value="<?php echo isset($puesto[0]['denominacion_sap']) ? $puesto[0]['denominacion_sap'] : ''; ?>"
										   name="txtDenominacionSap" placeholder="Denominacion MOF">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtOtraDenominacion" class="col-md-7 control-label">Otra denominaci&oacute;n
									del puesto de trabajo</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="txtOtraDenominacion"
									   value="<?php echo isset($puesto[0]['otra_denominacion']) ? $puesto[0]['otra_denominacion'] : ''; ?>"
									   name="txtOtraDenominacion"
									   placeholder="Otra denominacion">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbArea" class="control-label col-md-7">&Aacute;rea estandar</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<select name="cmbArea" id="cmbArea" class="form-control">
									<option value="">Seleccione Area</option>
									<?php
									foreach ($area as $value) {

										$select = (($puesto[0]['id_area']) == $value['id']) ? 'selected' : '';

										echo '<option ', $select, ' value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbAreaPuesto" class="control-label col-md-7">&Aacute;rea a la que pertenece el
									puesto de trabajo</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<input type="text" id="cmbAreaPuesto" name="cmbAreaPuesto" class="form-control"
									   value="<?php echo isset($puesto[0]['area_puesto']) ? $puesto[0]['area_puesto'] : ''; ?>"
									   placeholder="Ingrese Area de Puesto de Trabajo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtFuncionPuesto" class="control-label col-md-7">Funci&oacute;n principal
									del puesto evaluado</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<input type="text" id="txtFuncionPuesto" name="txtFuncionPuesto" class="form-control"
									   value="<?php echo isset($puesto[0]['funcion_principal']) ? $puesto[0]['funcion_principal'] : ''; ?>"
									   placeholder="Ingrese funci&oacute;n de puesto">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbTipoPuesto" class="control-label col-md-7">Tipo de Puesto de Trabajo</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<select name="cmbTipoPuesto" id="cmbTipoPuesto" class="form-control">
									<option <?php echo ($puesto[0]['tipo_puesto'] == "CORE") ? 'selected' : ''; ?> value="CORE">CORE</option>
									<option <?php echo ($puesto[0]['tipo_puesto'] == "SOPORTE") ? 'selected' : ''; ?> value="SOPORTE">SOPORTE</option>
								</select>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtCodigoUnificado" class="control-label col-md-7">Codigo UNIFICADO</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<input type="text" id="txtCodigoUnificado" name="txtCodigoUnificado" class="form-control"
									   value="<?php echo isset($puesto[0]['codigo_unificado']) ? $puesto[0]['codigo_unificado'] : ''; ?>"
									   placeholder="Codigo Unificado">
							</div>
						</div>

					</div>

					<div class="row"><strong class="col-sm-12 text-muted">Datos de registro </strong></div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtEstado" class="col-md-2 control-label">Estado</label>
								<div class="col-md-10">
									<select name="txtEstado" id="txtEstado" class="form-control">
										<option <?php echo ($puesto[0]['estado_registro'] == "EN_PROCESO") ? 'selected' : ''; ?>
											value="EN_PROCESO">EN PROCESO
										</option>
										<option <?php echo ($puesto[0]['estado_registro'] == "OBSERVADO") ? 'selected' : ''; ?>
											value="OBSERVADO">OBSERVADO
										</option>
										<option <?php echo ($puesto[0]['estado_registro'] == "CORREGIDO") ? 'selected' : ''; ?>
											value="CORREGIDO">CORREGIDO
										</option>
										<option <?php echo ($puesto[0]['estado_registro'] == "CONCLUIDO") ? 'selected' : ''; ?>
											value="CONCLUIDO">CONCLUIDO
										</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="txtNotas" class="col-md-1 control-label">Notas</label>
								<div class="col-md-11">
									<textarea class="form-control" id="txtNotas" name="txtNotas"
											  rows="3"><?php echo isset($puesto[0]['notas']) ? $puesto[0]['notas'] : ''; ?></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<input type="button" class="btn btn-primary" id="btnSave" name="btnSave" value="Actualizar Puesto de Trabajo">
						</div>

					</div>
					<br>
					<br>
					<br>
					<div class="row"><strong class="col-sm-12 text-muted">Resultado de la Evaluacion </strong></div>
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
									<th class="text-center">Evaluaci&oacute;n Final</th>
								</tr>

								</thead>
								<tbody>
								<tr>
									<?php
                                    $fedd_visual = '';
                                    $fedd_auditivo = '';
                                    $fedd_superiores = '';
                                    $fedd_inferiores = '';
                                    $fedd_intelectual = '';
                                    $fedd_psicosocial = '';
                                    if(isset($puesto[0]['s_visual_pre_eval']) && isset($puesto[0]['s_auditivo_pre_eval']) &&  isset($puesto[0]['m_ext_sup_pre_eval'])
                                      && isset($puesto[0]['m_ext_inf_pre_eval']) && isset($puesto[0]['m_intelectual_pre_eval']) && isset($puesto[0]['m_psicosocial_pre_eval'])){
                                        $fedd_visual = $array['sensorial_visual'][$puesto[0]['s_visual_pre_eval']];
                                        $fedd_auditivo = $array['sensorial_visual'][$puesto[0]['s_auditivo_pre_eval']];
                                        $fedd_superiores = $array['sensorial_visual'][$puesto[0]['m_ext_sup_pre_eval']];
                                        $fedd_inferiores = $array['sensorial_visual'][$puesto[0]['m_ext_inf_pre_eval']];
                                        $fedd_intelectual = $array['sensorial_visual'][$puesto[0]['m_intelectual_pre_eval']];
                                        $fedd_psicosocial = $array['sensorial_visual'][$puesto[0]['m_psicosocial_pre_eval']];
                                    }
                                    ?>
									<td class="active"><strong>Visual</strong></td>
									<td><?php echo $fedd_visual; ?></td>
									<td><?php echo isset($puesto[0]['siso_s_visual']) ? $array['sensorial_visual'][$puesto[0]['siso_s_visual']] : ''; ?></td>
									<td rowspan="6" class="text-center"
										style="vertical-align: middle;"><?php echo isset($puesto[0]['eva_erin_resultado']) ? $puesto[0]['eva_erin_resultado'] : 'SIN EVALUAR'; ?></td>
									<td><?php echo isset($puesto[0]['resultado_final_s_visual']) ? $array['sensorial_visual'][$puesto[0]['resultado_final_s_visual']] : ''; ?></td>
								</tr>
								<tr>
									<td class="active"><strong>Auditivo</strong></td>
									<td><?php echo $fedd_auditivo; ?></td>
									<td><?php echo isset($puesto[0]['siso_s_auditivo']) ? $array['sensorial_auditivo'][$puesto[0]['siso_s_auditivo']] : ''; ?></td>
									<td><?php echo isset($puesto[0]['resultado_final_s_auditivo']) ? $array['sensorial_visual'][$puesto[0]['resultado_final_s_auditivo']] : ''; ?></td>
								</tr>
								<tr>
									<td class="active"><strong>Ext. Superiores</strong></td>
									<td><?php echo $fedd_superiores; ?></td>
									<td><?php echo isset($puesto[0]['siso_m_ext_superior']) ? $array['ext_superiores'][$puesto[0]['siso_m_ext_superior']] : ''; ?></td>
									<td><?php echo isset($puesto[0]['resultado_final_m_ext_sup']) ? $array['sensorial_visual'][$puesto[0]['resultado_final_m_ext_sup']] : ''; ?></td>
								</tr>
								<tr>
									<td class="active"><strong>Ext. Inferiores</strong></td>
									<td><?php echo $fedd_inferiores; ?></td>
									<td><?php echo isset($puesto[0]['siso_m_ext_inferior']) ? $array['ext_inferiores'][$puesto[0]['siso_m_ext_inferior']] : ''; ?></td>
									<td><?php echo isset($puesto[0]['resultado_final_m_ext_inf']) ? $array['sensorial_visual'][$puesto[0]['resultado_final_m_ext_inf']] : ''; ?></td>
								</tr>
								<tr>
									<td class="active"><strong>Intelectual</strong></td>
									<td><?php echo $fedd_intelectual; ?></td>
									<td><?php echo isset($puesto[0]['siso_m_intelectual']) ? $array['intelectual'][$puesto[0]['siso_m_intelectual']] : ''; ?></td>
									<td><?php echo isset($puesto[0]['resultado_final_m_intelectual']) ? $array['sensorial_visual'][$puesto[0]['resultado_final_m_intelectual']] : ''; ?></td>
								</tr>
								<tr>
									<td class="active"><strong>Psicosocial</strong></td>
									<td><?php echo $fedd_psicosocial; ?></td>
									<td><?php echo isset($puesto[0]['siso_m_psicosocial']) ? $array['psicosocial'][$puesto[0]['siso_m_psicosocial']] : ''; ?></td>
									<td><?php echo isset($puesto[0]['resultado_final_m_psicosocial']) ? $array['sensorial_visual'][$puesto[0]['resultado_final_m_psicosocial']] : ''; ?></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							Apto / No Apto
						</div>
						<div class="col-lg-8 col-md-6 col-sm-6" id="msgApto">
							<strong><?php
								if (isset($puesto[0]['resultado_final_m_psicosocial'])) {
									if (isset($puesto[0]['es_apto'])) {
										if ($puesto[0]['es_apto'] == 'APTO') {
											echo 'Apto con observaciones de evaluacion final';
										} else if ($puesto[0]['es_apto'] == 'NO APTO'){
											echo 'No Apto';
										}
									}
								}
								 ?>
						</div>
						</strong>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							Aplica ajustes razonables
						</div>
						<div class="col-lg-8 col-md-6 col-sm-6" id="msgAjustes">
                            <strong><?php echo isset($puesto[0]['aplica_ajutes']) ? $puesto[0]['aplica_ajutes'] : ''; ?></strong>
						</div>
					</div>
					<br><br>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {

		$('#btnSave').on('click', function () {

			if ($('#frmPuestos').parsley().validate()) {
				$.ajax({
					method: "POST",
					dataType: 'json',
					url: "<?php echo site_url('puestos/actualizarPuesto'); ?>",
					data: $('#frmPuestos').serialize()
				}).done(function (response) {
					if (response.status) {
						alert(response.result);
						window.location.href = "<?php echo site_url('puestos'); ?>";
					} else {
						alert(response.result);
					}
				});
			}
		});


		$('#cmbLocal').on('change', function () {
		    $('#txtCodigoSabha').val('');
			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('puestos/getAreas'); ?>",
				data: {idLocal: $(this).val()}
			}).done(function (msg) {
				var area = $('#cmbArea');
				area.find('option').remove();
				if (!$.isEmptyObject(msg.areas)) {
					area.html('<option>Seleccione Area</option>');
					$.each(msg.areas, function (index, value) {
						$('<option>')
							.attr({
								'value': value.id
							})
							.text(value.nombre)
							.appendTo('#cmbArea');
					});
				} else {
					area.html('<option disabled>El Local no tiene Areas</option>');
				}
			});
		});

		$('#cmbArea').on('change', function (e) {
			e.preventDefault();
			var str = $('#txtEmpresaId').val();
			var pad = "00";
			var ans = pad.substring(str.length) + str
			var area = $("#cmbArea option:selected").text();

			var cod_sabha = ans + area.substring(0, 4).toUpperCase();
//			console.log(cod_sabha);
			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('puestos/getCodSabha'); ?>",
				data: {
					idLocal: $('#cmbLocal').val(),
					idArea: $('#cmbArea').val()
				}
			}).done(function (response) {
				var contador = parseInt(response) + 1 + "";
				var anscon = pad.substring(contador.length) + contador;
				$('#txtCodigoSabha').val(cod_sabha + anscon );
			});
		});

	});
</script>
