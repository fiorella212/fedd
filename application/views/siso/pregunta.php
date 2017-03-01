<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Configuraci&oacute;n de Cuestionario SISO - Nueva Pregunta</h5>
			</div>
			<div class="panel-body">

				<form action="" class="form-horizontal" method="POST"
					  id="frmPreguntaSiso" name="frmPreguntaSiso">

					<div class="row"><strong class="col-sm-12 text-muted">Datos de la Pregunta </strong></div>
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="txtPregunta" class="col-md-2 control-label">Pregunta</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="txtPregunta"
										   name="txtPregunta" placeholder="Ingrese Pregunta" required>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="txtGrupo" class="col-md-2 control-label">Grupo</label>
								<div class="col-md-8">
									<select name="txtGrupo" id="txtGrupo" class="form-control">
										<option value="Seguridad en el Puesto de trabajo">Seguridad en el Puesto de
											Trabajo
										</option>
										<option value="Seguridad en el Proceso">Seguridad en el Proceso</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="txtTipoRiesgo" class="col-md-2 control-label">Tipo de Riesgo
									analizado</label>
								<div class="col-md-8">
									<select name="txtTipoRiesgo" id="txtTipoRiesgo" class="form-control">
										<option value="Entorno">Entorno</option>
										<option value="Equipos y Herramientas">Equipos y Herramientas</option>
										<option value="Materiales">Materiales</option>
										<option value="Proceso">Proceso</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row"><strong class="col-sm-12 text-muted">Valoraci&oacute;n si la respuesta a esta
							pregunta es "SI" </strong></div>
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label for="txtValorSensorialVisual" class="col-md-6 control-label">Sensorial
										Visual</label>
									<div class="col-md-6">
										<input type="text" class="form-control text-center valorPregunta"
											   id="txtValorSensorialVisual"
											   name="txtValorSensorialVisual" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="txtValorSensorialAuditivo" class="col-md-6 control-label">Sensorial
										Auditivo</label>
									<div class="col-md-6">
										<input type="text" class="form-control text-center valorPregunta"
											   id="txtValorSensorialAuditivo"
											   name="txtValorSensorialAuditivo" placeholder="">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label for="txtValorMotrizInferior" class="col-md-6 control-label">Motriz ext.
										Inferior</label>
									<div class="col-md-6">
										<input type="text" class="form-control text-center valorPregunta"
											   id="txtValorMotrizInferior"
											   name="txtValorMotrizInferior" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="txtValorMotrizSuperior" class="col-md-6 control-label">Motriz ext.
										Superior</label>
									<div class="col-md-6">
										<input type="text" class="form-control text-center valorPregunta"
											   id="txtValorMotrizSuperior"
											   name="txtValorMotrizSuperior" placeholder="">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="form-group">
									<label for="txtValorMentalIntelectual" class="col-md-6 control-label">Mental
										Intelectual</label>
									<div class="col-md-6">
										<input type="text" class="form-control text-center valorPregunta"
											   id="txtValorMentalIntelectual"
											   name="txtValorMentalIntelectual" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="txtValorMentalPsicosocial" class="col-md-6 control-label">Mental
										Psicosocial</label>
									<div class="col-md-6">
										<input type="text" class="form-control text-center valorPregunta"
											   id="txtValorMentalPsicosocial"
											   name="txtValorMentalPsicosocial" placeholder="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<input type="button" class="btn btn-primary btnSave" value="Resgistrar Pregunta">
						</div>

					</div>
					<br>

				</form>


			</div>
		</div>
	</div>

</div>
<script>
	$(document).ready(function () {

	    $('.btnSave').on('click', function (e) {
			e.preventDefault();

			if ($('#frmPreguntaSiso').parsley().validate()) {
				$.ajax({
					method: "POST",
					dataType: 'json',
					url: "<?php echo site_url('siso/registrarPregunta'); ?>",
					data: $('#frmPreguntaSiso').serialize()
				}).done(function (response) {
					if (response.status) {
						alert(response.result);
						window.location.href = "<?php echo site_url('siso/configuracion'); ?>";
					} else {
						alert(response.result);
					}
				});
			}

		});

		$('.valorPregunta').on('change', function (e) {
			e.preventDefault();
			var l = $(this).val().length;
			if (l == 0) {
				$(this).removeAttr("required");
				$(this).removeAttr("pattern");
			} else {
			    $(this).attr("required");
			    $(this).attr("pattern", "^[0-5]");
			}
		});
	});
</script>
