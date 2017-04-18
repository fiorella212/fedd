<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">

		<h4 class="text-center">Cuestionario SISO</h4>

		<div class="panel panel-default">
			<div class="panel-body">

				<form action="" class="form-horizontal">
					<div class="row"><strong class="col-sm-12 text-muted">Datos del Puesto de Trabajo</strong></div>
					<div class="row">
						<strong class="col-sm-6 text">Sede: &nbsp;&nbsp; <?php echo $local; ?></strong>
						<strong class="col-sm-6 text">&Aacute;rea de trabajo: &nbsp;&nbsp; <?php echo $area; ?></strong>
						<strong class="col-sm-6 text">&Aacute;rea de trabajo:
							&nbsp;&nbsp; <?php echo urldecode($codigo_sabha); ?></strong>
						<strong class="col-sm-6 text">Denomicaci&oacute;n Sabha:
							&nbsp;&nbsp;<?php echo urldecode($denominacion_sabha); ?></strong>
					</div>

				</form>
			</div>

		</div>
        <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="row"><strong class="col-sm-12 text-muted">Cuestionario</strong></div>

				<table class="table table-striped table-bordered" id="tblCuestionario">
					<thead>
					<th></th>
					<th>Aspecto</th>
					<th>El &Aacute;rea o Ambiente donde se ubica el puesto de trabajo:</th>
					<th>S&iacute;</th>
					<th>No</th>
					</thead>
					<tbody>
					<?php
					$table = '';
					$i = 0;
					$checked_si = '';
					$checked_no = '';
					foreach ($preguntas as $value) {
                        $checked_si = '';
                        $checked_no = '';
                            if (count($cuestionario) > 0) {
                                foreach ($cuestionario as $val) {
                                    if ($val['id_pregunta_siso'] == $value['id']) {
                                        if (!is_null($val['respuesta'])) {
                                            if ($val['respuesta'] == 1) {
                                                $checked_si = 'checked="checked"';
                                                $checked_no = '';
                                            } else if ($val['respuesta'] == 0) {
                                                $checked_si = '';
                                                $checked_no = 'checked="checked"';
                                            }
                                        }
                                    }
                                }
                            }
						$table .= '<tr data-id="' . $value['id'] . '">';
						$table .= '<td>' . $value['grupo'] . '</td>';
						$table .= '<td>' . $value['tipo_riesgo'] . '</td>';
						$table .= '<td>' . $value['pregunuta'] . '</td>';
						$table .= '<td style="vertical-align: middle;">' . '<input class="fieldoption" data-id="' . $value['id'] . '"  ' . $checked_si . ' name="radiooption' . $value['id'] . '" type="radio" value="1">' . '</td>';
						$table .= '<td style="vertical-align: middle;">' . '<input class="fieldoption" data-id="' . $value['id'] . '" ' . $checked_no . ' name="radiooption' . $value['id'] . '" type="radio" value="0">' . '</td>';
						$table .= '</tr>';
						$i++;
					}
					echo $table;
					?>

					</tbody>
				</table>

			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 text-center">
				<a href="<?php echo site_url("main"); ?>" class="btn btn-danger" >Cancelar</a>
				<input type="button" class="btn btn-primary" data-puesto="<?php echo $id_puesto_trabajo; ?>"
					   value="Registrar Cuestionario"
					   id="btnRegistrarEvaluacion">
				<br><br><br><br>
			</div>

		</div>
	</div>
	<br><br>
</div>
<script>
	$(document).ready(function () {
//		groupTable($('#tblCuestionario tr:has(td)'), 0, 3);
		$('#tblCuestionario .deleted').remove();

		$('#btnRegistrarEvaluacion').on('click', function () {
			var id_puesto = $(this).data('puesto');
			var cuestionario = [];
            $( "body" ).isLoading({
                text:       "Guardando... ",
                position:   "overlay",
                'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
            });
			$('#tblCuestionario tbody tr').each(function () {
				cuestionario.push({
					id: $(this).data('id'),
					respuesta: $("input:radio[name=radiooption" + $(this).data('id') + "]:checked").val(),
					id_puesto: id_puesto
				});
			});

			$.ajax({
				method: "POST",
				dataType: 'json',
				url: "<?php echo site_url('siso/insertCuestionario'); ?>",
				data: {
					cuestionario: cuestionario,
					id_puesto: id_puesto
				}
			}).done(function (msg) {
                $( "body" ).isLoading('hide');
				if (msg.status) {
					alert(msg.result);
					window.location = '<?php echo site_url('siso/index/');?>'+id_puesto;
				} else {
					alert(msg.result);
				}

			});

		});
	});
</script>
