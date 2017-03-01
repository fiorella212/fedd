<div class="container">

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="text-center">Importar Puestos de Trabajo</h5>
			</div>
			<div class="panel-body">
				<div class="modal-body">
					<div class="row" style="display:block">
						<div class="col-md-12">
							<form action="javascript:void(0);">
								<div class="row">
									<div class="form-group">
										<h4 class="text-center">Seleccione los puestos para importar en la Empresa: <strong><?php echo $this->session->userdata('empresa'); ?></strong></h4>
										<br><br>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Buscar el archivo:</label>
										<div class="col-lg-9">
											<input type="file" class="form-group"  style="width:100%;" name="archivo" id="archivo" accept=".csv"  />
											<input type="hidden" name="nombre_archivo"  id="nombre_archivo" />
										</div>
									</div>
									<div class="form-group logError" style="display: none">
										<label class="col-lg-3 control-label">Log de errores al importar:</label>
										<div class="col-lg-9"><a target="_blank" class="linkError" > [ Ver Fichero Log ]</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="boton_subir2"  type="button" class="btn btn-save btn-s-md btn-primary">Importar</button>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	$(document).ready(function(){
		function subirArchivos() {
			//validar archivo
			file= $("#archivo").val();

			if (file=="") {
				alert("no a seleccionado ningun archivo");
				return false;
			}
			extension = (file.substring(file.lastIndexOf("."))).toLowerCase();
			if (extension!==".csv") {
				alert("Archivo no Permitido");
				return false;
			}
			$( "body" ).isLoading({
				text:       "Cargando... ",
				position:   "overlay",
				'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="i i-spinner"></i></span>'
			});

			$("#archivo").upload('<?php echo site_url('puestos/upload_file');?>',
				function(res) {
			    console.log(res);
					//Subida finalizada.
					$( "body" ).isLoading('hide');
					if (res.status) {
						$('.logError').show();
						$('.linkError').attr('href', res.log + ".txt.txt");
						alert(res.result);

					} else {
						alert(res.result);
					}
					$("#archivo").val('');
				});
		}

		$("#boton_subir2").on('click', function() {
			subirArchivos();
		});
	});
</script>
