<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Evaluaci&oacute;n EVA-ERIN</h5>
			</div>
			<div class="panel-body">

				<form action="" class="form-horizontal" method="POST" id="frmEvaluacionEvaerin">
					<div class="row"><strong class="col-sm-12 text-muted">Datos del Sector</strong></div>
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
								<label for="cmbArea" class="col-sm-4 control-label">&Aacute;rea de Trabajo</label>
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

					<div class="row"><strong class="col-sm-12 text-muted">Resultado de la evaluaci&oacute;n</strong>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label for="cmbResultado" class="col-md-4 control-label">Resultado</label>
								<div class="col-md-8">
									<select name="cmbResultado" id="cmbResultado" class="form-control">
										<option value="">Selecione</option>
										<option value="ROJO">ROJO</option>
										<option value="AMARILLO">AMARILLO</option>
										<option value="VERDE">VERDE</option>
									</select>
									<input type="hidden" id="txtPuestoTrabajoId" name="txtPuestoTrabajoId" value="">
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="txtObservaciones" class="col-md-2 control-label">Observaciones</label>
								<div class="col-md-8">
									<textarea class="form-control" id="txtObservaciones" name="txtObservaciones"
											  rows="3"></textarea>
								</div>
							</div>
						</div>
					</div>

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

	    $('#btnRegistrarEvaluacion').on('click', function (e) {
			e.preventDefault();

			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('evaerin/registrarEvaluacion'); ?>",
				data: {
				    idPuesto: $('#cmbDenominacionSabha').val(),
					cmbResultado: $('#cmbResultado').val(),
					txtObservaciones: $('#txtObservaciones').val()
				}
			}).done(function (response) {
			    if (response.status) {
			        alert(response.result);
			        window.location.href = '<?php echo site_url('evaerin'); ?>';
				} else {
			        alert(response.result);
				}
			});

		});



		$('#cmbLocal').on('change', function () {
            $('#txtObservaciones').val('');
            $('#cmbResultado').val('').trigger("change");
            var denominacion = $('#cmbDenominacionSabha');
            denominacion.find('option').remove();
            $('#cmbDenominacionSabha').val('').trigger("change");
            $('.codigosabha').text('');
			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('evaerin/getAreas'); ?>",
				data: {idLocal: $(this).val()}
			}).done(function (msg) {

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
            $('#txtObservaciones').val('');
            $('#cmbResultado').val('').trigger("change");
            $('.codigosabha').text('');
			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('evaerin/getSabha'); ?>",
				data: {idArea: $(this).val()}
			}).done(function (msg) {
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
            $('#txtObservaciones').val('');
            $('#cmbResultado').val('').trigger("change");
            $('.codigosabha').text('');
			var dataSabha = $(this).find(':selected').data();
            if (typeof dataSabha !== 'undefined'){
                $('.codigosabha').text(dataSabha.codigoSabha);

                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "<?php echo site_url('evaerin/getEvaerin'); ?>",
                    data: {
                        idPuesto: $(this).val()
                    }
                }).done(function (response) {
                    if (!$.isEmptyObject(response[0])) {
                        $('#cmbResultado').val(response[0].eva_erin_resultado).trigger("change");
                        $('#txtObservaciones').val(response[0].eva_erin_observaciones);
                    }
                });
            }



		});
	});
</script>
