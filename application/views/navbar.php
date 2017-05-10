<?php if(isset($_SESSION['usuario'])){?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">GEORDI</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php $permisos = $_SESSION['permisos'];?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ingreso de Informaci&oacute;n <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu"><a href="#">Estructura de la Organizaci&oacute;n <span class="glyphicon glyphicon-chevron-right"></span></a>
				<ul class="dropdown-menu">
                    <?php if(array_key_exists('empresa',$permisos)){
                        if($permisos['empresa']['acceso'] == 1){
                        ?>
                        <li><a href="<?php echo site_url('empresa')?>">Empresa</a></li>
                        <?php }
                        } ?>
                    <?php if(array_key_exists('local',$permisos)){
                    if($permisos['local']['acceso'] == 1){
                    ?>
		            <li><a href="<?php echo site_url('local')?>">Sede</a></li>
                    <?php }
                    } ?>
                    <?php if(array_key_exists('area',$permisos)){
                    if($permisos['area']['acceso'] == 1){
                    ?>
		            <li><a href="<?php echo site_url('area')?>">&Aacute;rea est&aacute;ndar</a></li>
                    <?php }
                    } ?>
		          </ul>
            </li>
              <?php if(array_key_exists('puestos',$permisos)){
              if($permisos['puestos']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('puestos')?>">Puesto de Trabajo</a></li>
              <?php }
              } ?>
              <?php if(array_key_exists('personal',$permisos)){
              if($permisos['personal']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('personal')?>">Importar personal de SAP</a></li>
              <?php }
              } ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evaluaci&oacute;n <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <?php if(array_key_exists('evaerin',$permisos)){
              if($permisos['evaerin']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('evaerin')?>">EVA-ERIN</a></li>
              <?php }
              } ?>
              <?php if(array_key_exists('siso',$permisos)){
              if($permisos['siso']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('siso')?>">SISO</a></li>
              <?php }
              } ?>
              <?php if(array_key_exists('fedd',$permisos)){
              if($permisos['fedd']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('fedd')?>">FEDD</a></li>
              <?php }
              } ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
			  <?php
			  if(array_key_exists('reporte',$permisos)){
              	if($permisos['reporte']['acceso'] == 1){
              ?>
            	<li><a target="_blank" href="<?php echo site_url('reporte')?>">Reporte Interno</a></li>
              <?php
              	}
              }

			  if(array_key_exists('reporte/reportePuestos',$permisos)){
                 if($permisos['reporte/reportePuestos']['acceso'] == 1){
              ?>
              	<li><a href="<?php echo site_url('reporte/reportePuestos')?>">Reporte de puestos</a></li>
			  <?php
                 }
              }

			  if(array_key_exists('reporte/reporteLocal',$permisos)){
				  if($permisos['reporte/reporteLocal']['acceso'] == 1){
					  ?>
					  <li><a href="<?php echo site_url('reporte/reporteLocal')?>">Puestos por Empresa</a></li>
					  <?php
				  }
			  }
			  if(array_key_exists('reporte/reporteLocalArea',$permisos)){
				  if($permisos['reporte/reporteLocalArea']['acceso'] == 1){
					  ?>
					  <li><a href="<?php echo site_url('reporte/reporteLocalArea')?>">Puestos por Actividad</a></li>
					  <?php
				  }
			  }

			  if(array_key_exists('reporte/reporteFuncionalidad',$permisos)){
				  if($permisos['reporte/reporteFuncionalidad']['acceso'] == 1){
					  ?>
					  <li><a href="<?php echo site_url('reporte/reporteFuncionalidad')?>">Funcionalidad por Puesto</a></li>
					  <?php
				  }
			  }

			  if(array_key_exists('reporte/reporteProduccionArea',$permisos)){
				  if($permisos['reporte/reporteProduccionArea']['acceso'] == 1){
					  ?>
					  <li><a href="<?php echo site_url('reporte/reporteProduccionArea')?>">Riesgo por Sede</a></li>
					  <?php
				  }
			  }

              if(array_key_exists('reporte/reporteAptitud',$permisos)){
                  if($permisos['reporte/reporteAptitud']['acceso'] == 1){
              ?>
                      <li><a href="<?php echo site_url('reporte/reporteAptitud')?>">Aptitud de los Puestos</a></li>
              <?php }
              }

              if(array_key_exists('reporte/reporteContingencia',$permisos)){
                  if($permisos['reporte/reporteContingencia']['acceso'] == 1){
              ?>
                      <li><a href="<?php echo site_url('reporte/reporteContingencia')?>">Reducción de la Contingencia</a></li>
              <?php
                  }
              }
              ?>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <?php if(array_key_exists('siso/configuracion',$permisos)){
              if($permisos['siso/configuracion']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('siso/configuracion')?>">Cuestionario SISO</a></li>
              <?php }
              } ?>
            <li role="separator" class="divider"></li>
              <?php if(array_key_exists('usuario',$permisos)){
              if($permisos['usuario']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('usuario')?>">Usuarios</a></li>
              <?php }
              } ?>
              <?php if(array_key_exists('rol',$permisos)){
              if($permisos['rol']['acceso'] == 1){
              ?>
            <li><a href="<?php echo site_url('rol')?>">Roles</a></li>
              <?php }
              } ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="<?php echo base_url().'manual/manual_geordi.pdf'; ?>" target="_blank">Ayuda</a>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $this->session->userdata('empresa'); ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nombres').' '.$this->session->userdata('apellidos'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('login/logout'); ?>">Salir del Sistema</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php }else{
    redirect('login');
} ?>
