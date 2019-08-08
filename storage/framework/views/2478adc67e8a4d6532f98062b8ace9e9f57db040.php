<!DOCTYPE html>

<?php 

$array_permisos = array("0");

if (isset(\Auth::user()->permisos)) {
 if(\Auth::user()->permisos!='N;'){
     $array_permisos =  unserialize(\Auth::user()->permisos);
  }
   
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APP ASISTENCIA CGGSCYPJ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo e(url('/recursos')); ?>/css/custom.css">
    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="img/favicon.ico">-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->




  </head>
  <body>
    
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo e(url('/recursos')); ?>/img/user.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo e(Auth::user()->name); ?></h2><!--<span>Web Developer</span>-->
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="<?php echo e(url('/home')); ?>" class="brand-small text-center"> <strong>CD</strong><strong class="text-primary">MX</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
          <div class="main-menu">
          <h5 class="sidenav-heading">MENÚ</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">  
          
            <li><a href="<?php echo e(url('/home')); ?>"> <i class="icon-padnote"></i>°INICIO</a></li>
            <li><a href="<?php echo e(url('/getlistadoasistencias')); ?>"> <i class="icon-list"></i>MIS ASISTENCIAS DIARIAS</a></li>
            <li><a href="<?php echo e(url('/getlistadoasistencias_miercoles')); ?>"> <i class="icon-list"></i>MIS ASISTENCIAS VESPERTINAS</a></li>
            
            <!--<li><a href="<?php echo e(url('/cuestionario')); ?>"> <i class="icon-list"></i>MIS VISITAS</a></li>-->
            <li><a href="<?php echo e(url('/preguntas')); ?>"> <i class="icon-list"></i>MI RED DE CONTACTO CIUDADANO</a></li>
            <li><a href="<?php echo e(url('/getlistadopreguntas')); ?>"> <i class="icon-list"></i>VER MI FORMATO DE RED DE CONTACTO CIUDADANO</a></li>
             
            <li><a href="<?php echo e(url('/usuariopdfView')); ?>"> <i class="icon-list"></i>MIS PDF'S</a></li>
            <li><a href="<?php echo e(url('/vinculosView')); ?>"> <i class="icon-list"></i>MIS VÍNCULOS</a></li>
           <li><a href="<?php echo e(url('/entrevistas')); ?>"> <i class="icon-list"></i>MI ENTREVISTA MP</a></li>
              
              
           <?php if(in_array(11, $array_permisos)):?>
              <li><a href="<?php echo e(url('/entrevistas')); ?>"> <i class="icon-list"></i>MI ENTREVISTA MP</a></li>
               <?php endif?>


              
          
             <?php if(in_array(1, $array_permisos)):?>
             <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Usuarios </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/nuevoUsuario')); ?>">Nuevo usuario</a></li>
                <li><a href="<?php echo e(url('/listadosUsuarios')); ?>">Listado de usuarios</a></li>
                
              </ul>
            </li>
             <?php endif?>
             
               
             
             
              <?php if(in_array(4, $array_permisos)):?>
            <li><a href="<?php echo e(url('/reporte_fecha')); ?>"> <i class="icon-list"></i>Reporte de Asistencia por Día</a></li>
             <?php endif?>
             
             <?php if(in_array(5, $array_permisos)):?>
             <li><a href="<?php echo e(url('/faltantesView')); ?>"> <i class="icon-list"></i>Faltantes por Fecha</a></li>
             <?php endif?>
             
             <?php if(in_array(6, $array_permisos)):?>
             <li><a href="<?php echo e(url('/reportesExcel')); ?>"> <i class="icon-list"></i>Reportes por Fecha</a></li>
             <?php endif?>
             
              <?php if(in_array(7, $array_permisos)):?>
             <li><a href="<?php echo e(url('/adminpdfView')); ?>"> <i class="icon-list"></i>Administrador PDF</a></li>
              <?php endif?>
             
               <?php if(in_array(8, $array_permisos)):?>
              <li><a href="<?php echo e(url('/usuariopdfView')); ?>"> <i class="icon-list"></i>Usuario PDF</a></li>
               <?php endif?>
              
              
               <?php if(in_array(9, $array_permisos)):?>
              <li><a href="<?php echo e(url('/mapaView')); ?>"> <i class="icon-list"></i>Mapas</a></li>
               <?php endif?>
               
              
           
             
             <!--MODULO REPORTES DIARIOS-->
             <?php if(in_array(2, $array_permisos)):?>
             
               <li><a href="#exampledropdownDropdown_DIARIO" aria-expanded="false" data-toggle="collapse"> <i class="icon-list"></i>Reporte Diario </a>
              <ul id="exampledropdownDropdown_DIARIO" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/reportesExcel')); ?>"> <i class="icon-list"></i>Reportes por Fecha</a></li>
               
               <!--<li><a href="<?php echo e(url('/faltantesView_miercoles')); ?>"><i class="icon-list"></i>Faltantes por Fecha Miércoles</a></li>-->
                <li><a href="<?php echo e(url('/reporteGrafica')); ?>"> <i class="fa fa-bar-chart"></i>Gráfica de Asistencia</a></li>
                <li><a href="<?php echo e(url('/alcaldiasGrafica')); ?>"> <i class="fa fa-bar-chart"></i>Gráfica de Alcaldía</a></li>
                
                <li><a href="<?php echo e(url('/excel_cuestionario_seguridad')); ?>"> <i class="icon-list"></i>Reporte Visitas</a></li>
                <li><a href="<?php echo e(url('/excel_cuestionario_preguntas')); ?>"> <i class="icon-list"></i>Reporte Red De Contacto Ciudadano</a></li>
                <li><a href="<?php echo e(url('/excel_cuestionario_entrevistas')); ?>"> <i class="icon-list"></i>Reporte Entrevista en MP</a></li>
              </ul>
            </li>
             <?php endif?>
             
             
             <!--MODULO MAPAS-->
             
             
        
        
             
             
             
          
             
              <!--MODULO REPORTE MIERCOLES-->
             <?php if(in_array(3, $array_permisos)):?>
             
               <li><a href="#exampledropdownDropdown_MIERCOLES" aria-expanded="false" data-toggle="collapse"> <i class="icon-list"></i>Reportes Miercoles </a>
              <ul id="exampledropdownDropdown_MIERCOLES" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/reportesExcel_miercoles')); ?>"><i class="icon-list"></i>Reportes por Fecha Miércoles</a></li>
              <li><a href="<?php echo e(url('/faltantesView_miercoles')); ?>"><i class="icon-list"></i>Faltantes por Fecha Miércoles</a></li>
                <li><a href="<?php echo e(url('/reporteGrafica_miercoles')); ?>"><i class="fa fa-bar-chart"></i>Gráfica de Asistencia Miércoles</a></li>
                <li><a href="<?php echo e(url('/alcaldiasGrafica_miercoles')); ?>"><i class="fa fa-bar-chart"></i>Gráfica de Alcaldía Miércoles</a></li>
                <li><a href="<?php echo e(url('/alcaldiasGrafica_miercoles_vecino')); ?>"><i class="fa fa-bar-chart"></i>Gráfica de Alcaldía Vecinos Miércoles</a></li>
              </ul>
            </li>
            
             <?php endif?>
             
             
             <?php   $dia= date("w");
            if($dia==4){?>
             <li><a href="<?php echo e(url('/asistencia_miercoles')); ?>"> <i class="icon-padnote"></i>Asistencia Miércoles</a></li>
            <?php } ?>
          
          
        
       
        
        
      
          </ul>
        </div>
        
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>CGGSCYPJ</span><strong class="text-primary">CDMX</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                
                <!-- Log out-->
                <li class="nav-item"><a href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link logout"> <span class="d-none d-sm-inline-block">Salir</span><i class="fa fa-sign-out"></i></a>
                                                   
                                                   <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                       <?php echo e(csrf_field()); ?>

                                                   </form>


                                                   </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
   
      <!-- Header Section-->

      <!-- Statistics Section-->

      <!-- Updates Section -->


      <?php echo $__env->yieldContent('content'); ?>

<!--<center>
    <font id="font_footer"><strong>Jefatura de Gobierno Coordinación General del Gabinete de Seguridad Ciudadana y Procuración de Justicia   <?php echo date('Y');?> <br />
      Plaza de la Constitución No. 2 &bull; Colonia Centro &bull; Delegación Cuauhtémoc &bull; C.P.   06068 &bull; México, CDMX  &bull; Conmutador: (55) 53458026</strong></font>
  </center>-->





       <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
           <div class="col-sm-15">
            <center> <p>Jefatura de Gobierno Coordinación General del Gabinete de Seguridad Ciudadana y Procuración de Justicia   <?php echo date('Y');?></p></center>
              <center><p>Plaza de la Constitución No. 2 &bull; Colonia Centro &bull; Delegación Cuauhtémoc &bull; C.P.   06068 &bull; México, CDMX  &bull; Conmutador: (55) 53458026</p></center>
            </div>
            <div class="col-sm-15 text-right">
              <p><a href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="external">CDMX</a></p>
        </div>
      </footer>
    </div>

     <?php echo $__env->yieldContent('js'); ?>

   


    <!-- JavaScript files-->
    <script src="<?php echo e(url('/recursos')); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo e(url('/recursos')); ?>/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo e(url('/recursos')); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo e(url('/recursos')); ?>/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?php echo e(url('/recursos')); ?>/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo e(url('/recursos')); ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo e(url('/recursos')); ?>/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo e(url('/recursos')); ?>/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo e(url('/recursos')); ?>/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="<?php echo e(url('/recursos')); ?>/js/front.js"></script>

    <script src="<?php echo e(url('/recursos')); ?>/js/charts-custom.js"></script>


     <?php echo $__env->yieldContent('customjs'); ?>

  </body>
</html>