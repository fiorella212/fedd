<style type="text/css">
	body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #153072;
		color: #333;
	}
</style>
<div class="container">


	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default" style="border: #ff0017 2px solid;">
			<div class="panel-body">
				<div class="col-lg-8 col-lg-offset-2">

				<?php
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmLogin', 'autocomplete' => 'off');
				echo form_open('login/valid', $attributes);
				?>
				<h2 class="text-center">FEDD</h2>
					<hr>
				<div class="form-group">
					<label for="txtEmpresa" class="col-sm-3 control-label">Empresa</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name='empresa' id="txtEmpresa" value="<?php echo set_value('empresa'); ?>"
							   placeholder="Codigo de Empresa" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label for="txtUsuario" class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-9">
						<input type="text" name='usuario' class="form-control" id="txtUsuario" value="<?php echo set_value('usuario'); ?>"
							   placeholder="Ingrese su Usuario" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Contrase&ntilde;a</label>
					<div class="col-sm-9">
						<input type="password" name='password' class="form-control" id="txtPassword" value="<?php echo set_value('password'); ?>"
							   placeholder="Ingrese su contrase&ntilde;a">
					</div>
				</div>
				<div id="error" class="text-center"><p class="text-error"
													   style="color:#ff0000"><?php echo isset($error) ? $error : ""; ?></p>
				</div>
				<?php if (validation_errors()) { ?>
					<div class="alert alert-warning">
						<?php echo validation_errors(); ?>
					</div>
				<?php } ?>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-primary">Ingresar al Sistema</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<a href="#" class="btnRecuperarClave">¿Olvido su contrase&ntilde;a?</a>
					</div>
				</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="recuperarClaveModal">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Recuperar Contrase&ntilde;a</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal form-contrasena">

					<div class="form-group">
						<label for="txtEMailUser" class="col-lg-4">Ingrese su correo:</label>
						<div class="col-lg-8">
							<input type="email" required class="form-control required txtEMailUser" id="txtEMailUser" name="txtEMailUser">
						</div>
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-primary btnRecuperar" value="Recuperar">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function () {
		$('.btnRecuperarClave').on('click', function (e) {
			e.preventDefault();
            config_event_hide_modal();
			$('#recuperarClaveModal').modal('show');
		});

		$('.btnRecuperar').on('click', function (e) {
			e.preventDefault();
            if ($('#recuperarClaveModal').find('.form-contrasena').parsley().validate()) {
                $.ajax({
                    url: "<?php echo site_url('usuario/recuperar'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: $('#txtEMailUser').val()
                    }
                }).done(function (response) {
                    if (response.status) {
                        alert(response.result);
						$('#recuperarClaveModal').modal('hide');
                    } else {
                        alert(response.result);
                    }
                });
            }
		});

        function config_event_hide_modal() {
            $('#recuperarClaveModal').find('.form-contrasena').parsley().reset();
            $('#recuperarClaveModal').find('.txtEMailUser').val('');
        }
	});
</script>
