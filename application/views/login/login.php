<style type="text/css">
	body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #ff0017;
		color: #333;
		background-image: url("<?php echo base_url("/public/images/fondo.png"); ?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}
	.logosabha {
		position: absolute;
		right: 13%;
		top: 80%;
	}
	.logoempresa {
		position: absolute;
		right: 13%;
		top: 10%;
	}
	.formulario_color label {
		color: #153072;
	}
	.titulologo {
		color: #ffffff;
		font-size: 70px;

		font-family: Verdana, Arial, sans-serif;
	}
	.logogiordi {
		color: #ffffff;
	}

</style>
<div class="container-fluid" >

	<div class="row">
	<div class="col-sm-12">
	<div class="logogiordi col-sm-6">
		<div class="titulologo col-sm-12"><strong>GEORDI</strong></div>
		<div class="col-sm-12"><span style="font-size: 15px">Gesti&oacute;n Organizacional Discapacitados</span></div>
	</div>
	
	<div class="col-sm-6">
		<img class="pull-right" src="<?php echo base_url("public/images/logo_cliente.png"); ?>">
	</div>
	</div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<br>
	<br>
	<br>
	<br>
	<div class="col-lg-3 col-sm-3 col-lg-offset-9 col-sm-offset-9">
		<div class="col-lg-12 col-sm-12">
			<?php
			$attributes = array('class' => 'form-horizontal formulario_color', 'id' => 'frmLogin', 'autocomplete' => 'off');
			echo form_open('login/valid', $attributes);
			?>
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
					<button type="submit" class="btn btn-primary form-control" style="background-color: #153072">Ingresar al Sistema</button>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<a href="#" class="btnRecuperarClave">¿Olvido su contrase&ntilde;a?</a>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>

<!--		-->
<!--		<div class="panel">-->
<!--			<div class="panel-body">-->
<!---->
<!--			</div>-->
<!--		</div>-->
	</div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

		<div class="col-sm-3 col-sm-offset-9">
			<img src="<?php echo base_url("public/images/logo_sabha.jpg"); ?>" alt="">
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

                    <div class="form-group contrasena" style="display: none">
                        <label for="pass1" class="col-lg-4">Usuario</label>
                        <div class="col-lg-8">
                            <input type="text" disabled class="form-control usuario" id="usuario" name="usuario">
                        </div>
                    </div>

                    <div class="form-group contrasena" style="display: none">
                        <label for="pass1" class="col-lg-4">Nueva contrase&ntilde;a</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control pass1" id="pass1" name="pass1">
                        </div>
                    </div>

                    <div class="form-group contrasena" style="display: none">
                        <label for="pass2" class="col-lg-4">Confirmar contrase&ntilde;a</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control pass2" id="pass2" name="pass2">
                        </div>
                    </div>

				</form>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-primary btnRecuperar" value="Verificar">
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
            if($('.btnRecuperar').val() == 'Verificar'){
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
                            $('#txtEMailUser').attr('disabled',true);
                            $('#usuario').val(response.usuario);
                            $('.contrasena').show();
                            $('.btnRecuperar').val('Actualizar');
                        } else {
                            alert(response.result);
                            $('#recuperarClaveModal').modal('hide');
                        }

                    });
                }
            }else{
                if($('.pass1').val() == $('.pass2').val()){
                    $.ajax({
                        url: "<?php echo site_url('usuario/actualizarcontrasena'); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            email: $('#txtEMailUser').val(),
                            password: $('.pass1').val()
                        }
                    }).done(function (response) {
                        if (response.status) {
                            alert(response.result);
                            $('#txtEMailUser').attr('disabled',false);
                            $('.contrasena').hide();
                            $('.btnRecuperar').val('Verificar');
                            $('.pass1').val('');
                            $('.pass2').val('');
                            $('#usuario').val('');
                        } else {
                            alert(response.result);
                        }
                        $('#recuperarClaveModal').modal('hide');
                    });
                }else{
                    alert('Las contraseñas no coinciden');
                }
            }

		});

        function config_event_hide_modal() {
            $('#recuperarClaveModal').find('.form-contrasena').parsley().reset();
            $('#recuperarClaveModal').find('.txtEMailUser').val('');
        }
	});
</script>
