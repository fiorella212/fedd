<?php
//echo '<pre>', print_r($locales),'</pre>';
?>

<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">


		<div class="panel panel-default">
			<div class="panel-heading text-center">Puesto de Trabajo</div>
			<div class="panel-body">

				<form action="" id="frmPuestos" name="frmPuestos" class="form-horizontal" method="POST">
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
											echo '<option value="' . $value['id'] . '">' . $value['nombre'] . '</option>';
										}
										?>
									</select>
									<input type="hidden" id="txtEmpresaId" name="txtEmpresaId"
										   value="<?php echo $this->session->id_empresa ?>">
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
										   name="txtNombreEntrevistado" placeholder="Nombre Entrevistado" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtPuestoEntrevistado" class="col-md-2 control-label">Puesto</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtPuestoEntrevistado"
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
										   name="txtTelefonoEntrevistado" placeholder="Telefono Entrevistado" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtEmailEntrevistado" class="col-md-2 control-label">Email</label>
								<div class="col-md-10">
									<input type="email" class="form-control" id="txtEmailEntrevistado"
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
									<input type="text" class="form-control" id="txtCodigoSabha" required
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
										   name="txtDenominacionSabha" placeholder="Denominacion SABHA" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtCodigoMof" class="col-md-2 control-label">C&oacute;digo MOF</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtCodigoMof"
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
										   name="txtDenominacionMof" placeholder="Denominacion MOF">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="txtCodigoSap" class="col-md-2 control-label">C&oacute;digo SAP</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtCodigoSap"
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
								<select name="cmbArea" id="cmbArea" class="form-control" required>
									<option value="">Seleccione Area</option>
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
									<option value="CORE">CORE</option>
									<option value="SOPORTE">SOPORTE</option>
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
										<option value="EN_PROCESO">EN PROCESO</option>
										<option value="OBSERVADO">OBSERVADO</option>
										<option value="CORREGIDO">CORREGIDO</option>
										<option value="CONCLUIDO">CONCLUIDO</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="txtNotas" class="col-md-1 control-label">Notas</label>
								<div class="col-md-11">
									<textarea class="form-control" id="txtNotas" name="txtNotas" rows="3"></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<input type="button" class="btn btn-primary" id="btnSave" name="btnSave" value="Resgistrar puesto de trabajo">
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
									<td class="active"><strong>Visual</strong></td>
									<td></td>
									<td></td>
									<td rowspan="6"></td>
									<td></td>
								</tr>
								<tr>
									<td class="active"><strong>Auditivo</strong></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class="active"><strong>Ext. Superiores</strong></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class="active"><strong>Ext. Inferiores</strong></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class="active"><strong>Intelectual</strong></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class="active"><strong>Psicosocial</strong></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							Apto / No Apto
						</div>
						<div class="col-lg-8 col-md-6 col-sm-6" id="msgApto"></div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							Aplica ajustes razonables
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6" id="msgAjustes"></div>
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
					url: "<?php echo site_url('puestos/registrarPuesto'); ?>",
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
</script>@
