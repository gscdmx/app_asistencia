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
            <li><a href="<?php echo e(url('/mapasView_asistencia')); ?>"> <i class="icon-list"></i>MI UBICACION EN LA C.T GABINETE MATUTINO</a></li>
            <li><a href="<?php echo e(url('/getlistadoasistencias')); ?>"> <i class="icon-list"></i>MIS ASISTENCIAS DIARIAS</a></li>
            <li><a href="<?php echo e(url('/getlistadoasistencias_miercoles')); ?>"> <i class="icon-list"></i>MIS ASISTENCIAS VESPERTINAS</a></li>
            
            <!--<li><a href="<?php echo e(url('/cuestionario')); ?>"> <i class="icon-list"></i>MIS VISITAS</a></li>-->
            <li><a href="<?php echo e(url('/preguntas')); ?>"> <i class="icon-list"></i>RED DE CONTACTO CIUDADANO</a></li>
            <li><a href="<?php echo e(url('/getlistadopreguntas')); ?>"> <i class="icon-list"></i>VER MI RED DE CONTACTO CIUDADANO</a></li>
             
            <li><a href="<?php echo e(url('/usuariopdfView')); ?>"> <i class="icon-list"></i>MIS PDF'S</a></li>
            <li><a href="<?php echo e(url('/vinculosView')); ?>"> <i class="icon-list"></i>MIS VÍNCULOS</a></li>
            <!--<li><a href="<?php echo e(url('/entrevistas')); ?>"> <i class="icon-list"></i>MI ENTREVISTA MP</a></li>-->
            <li><a href="<?php echo e(url('/mapasView')); ?>"> <i class="icon-list"></i>MIS MAPAS INCIDENCIA DELICTIVA Y RED VECINAL</a></li>
            <li><a href="<?php echo e(url('/agenda')); ?>"> <i class="icon-list"></i>MI AGENDA</a></li>
            <li><a href="<?php echo e(url('/getlistadoagenda')); ?>"> <i class="icon-list"></i>VER MI AGENDA SEMANAL</a></li>
            <!--<li><a href="<?php echo e(url('/lista')); ?>"> <i class="icon-list"></i>MI PASE DE LISTA-SSC</a></li>-->
            <li><a href="<?php echo e(url('/getlistadolista')); ?>"> <i class="icon-list"></i>VER MI PASE DE LISTA-SSC</a></li>

            <li><a href="<?php echo e(url('/sendero')); ?>"> <i class="icon-list"></i>ASISTENCIA SENDERO SEGURO</a></li>
            <li><a href="<?php echo e(url('/getlistadosendero')); ?>"> <i class="icon-list"></i>VER MI ASISTENCIA SENDERO SEGURO</a></li>
            
          


              
          
             <?php if(in_array(1, $array_permisos)):?>
             <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Usuarios </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/nuevoUsuario')); ?>">Nuevo usuario</a></li>
                <li><a href="<?php echo e(url('/listadosUsuarios')); ?>">Listado de usuarios</a></li>
                
              </ul>
            </li>
             <?php endif?>
             
               
             
             
              <?php if(in_array(4, $array_permisos)):?>
            <li><a href="<?php echo e(url('/reporte_fecha')); ?>"> <i class="icon-list"></i>Reporte Asistencia Diario GM</a></li>
             <?php endif?>
             
             <?php if(in_array(5, $array_permisos)):?>
             <li><a href="<?php echo e(url('/faltantesView')); ?>"> <i class="icon-list"></i>Reporte Faltantes GM</a></li>
             <?php endif?>
             
             <?php if(in_array(6, $array_permisos)):?>
             <li><a href="<?php echo e(url('/reportesExcel')); ?>"> <i class="icon-list"></i>Reporte por Periódo GM</a></li>
             <?php endif?>
             
              <?php if(in_array(7, $array_permisos)):?>
             <li><a href="<?php echo e(url('/adminpdfView')); ?>"> <i class="icon-list"></i>Administrador de PDF´S</a></li>
              <?php endif?>
             
               <?php if(in_array(8, $array_permisos)):?>
              <li><a href="<?php echo e(url('/usuariopdfView')); ?>"> <i class="icon-list"></i>Usuario PDF</a></li>
               <?php endif?>
              
              
               <?php if(in_array(9, $array_permisos)):?>
              <li><a href="<?php echo e(url('/mapaView')); ?>"> <i class="icon-list"></i>Mapas</a></li>
               <?php endif?>
               
              
               
           <?php if(in_array(11, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_cuestionario_seguridad')); ?>"> <i class="icon-list"></i>Reporte de Visitas</a></li>
               <?php endif?>

            

             <?php if(in_array(12, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_cuestionario_lista')); ?>"> <i class="icon-list"></i>Reporte Pase de Lista-SSC</a></li>
               <?php endif?>
             

              <?php if(in_array(13, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_cuestionario_preguntas')); ?>"> <i class="icon-list"></i>Reporte Red De Contacto Ciudadano</a></li>
               <?php endif?>
              

              <?php if(in_array(14, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_cuestionario_agenda')); ?>"> <i class="icon-list"></i>Reporte de Agenda RJG</a></li>
               <?php endif?>
             

              <?php if(in_array(15, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_cuestionario_entrevistas')); ?>"> <i class="icon-list"></i>Reporte Entrevista MP</a></li>
               <?php endif?>
              
               <!--<?php if(in_array(16, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_cuestionario_sendero')); ?>"> <i class="icon-list"></i>Reporte de Sendero Seguro</a></li>
               <?php endif?>-->

              
               <!--<?php if(in_array(18, $array_permisos)):?>
              <li><a href="<?php echo e(url('/excel_mapgm')); ?>"> <i class="icon-list"></i>Reporte de ubicaciones Gabinetes Matutinos</a></li>
               <?php endif?>-->
               




             <!--MODULO REPORTES DIARIOS-->
             <?php if(in_array(2, $array_permisos)):?>
             
               <li><a href="#exampledropdownDropdown_DIARIO" aria-expanded="false" data-toggle="collapse"> <i class="icon-list"></i>Reporte Diario </a>
               <ul id="exampledropdownDropdown_DIARIO" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/reportesExcel')); ?>"> <i class="icon-list"></i>Reportes por Periódo GM</a></li>
               
               <!--<li><a href="<?php echo e(url('/faltantesView_miercoles')); ?>"><i class="icon-list"></i>Faltantes por Fecha Miércoles</a></li>-->
                <li><a href="<?php echo e(url('/reporteGrafica')); ?>"> <i class="fa fa-bar-chart"></i>Gráfica de Asistencia</a></li>
                <li><a href="<?php echo e(url('/alcaldiasGrafica')); ?>"> <i class="fa fa-bar-chart"></i>Gráfica de Alcaldía</a></li>
      
                
                
              </ul>
              </li>
             <?php endif?>
             
             
            <?php if(in_array(17, $array_permisos)):?>
             <li><a href="#exampledropdownDropdown_visitas" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>COORDINACIÓN GENERAL</a>
              <ul id="exampledropdownDropdown_visitas" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/visitas_coordinador')); ?>">Visitas Coordinación General CDMX</a></li>
                <li><a href="<?php echo e(url('/getlistadovisitas_coordinador')); ?>"> <i class="icon-list"></i>Ver las visitas</a></li>
                <li><a href="<?php echo e(url('/getexcel_visitas_coordinador')); ?>">Descarga Excel de Visitas</a></li>
                
              </ul>
            </li>
             <?php endif?>
             
        
        
             
             
             
          
             
              <!--MODULO REPORTE MIERCOLES-->
             <?php if(in_array(3, $array_permisos)):?>
             
               <li><a href="#exampledropdownDropdown_MIERCOLES" aria-expanded="false" data-toggle="collapse"> <i class="icon-list"></i>Reportes Miercoles </a>
              <ul id="exampledropdownDropdown_MIERCOLES" class="collapse list-unstyled ">
                <li><a href="<?php echo e(url('/reportesExcel_miercoles')); ?>"><i class="icon-list"></i>Reportes por Periódo Miércoles</a></li>
              <li><a href="<?php echo e(url('/faltantesView_miercoles')); ?>"><i class="icon-list"></i>Reporte Faltantes Miércoles GV</a></li>
                <li><a href="<?php echo e(url('/reporteGrafica_miercoles')); ?>"><i class="fa fa-bar-chart"></i>Gráfica de Asistencia Miércoles</a></li>
                <li><a href="<?php echo e(url('/alcaldiasGrafica_miercoles')); ?>"><i class="fa fa-bar-chart"></i>Gráfica de Alcaldía Miércoles</a></li>
                <li><a href="<?php echo e(url('/alcaldiasGrafica_miercoles_vecino')); ?>"><i class="fa fa-bar-chart"></i>Gráfica de Alcaldía Vecinos Miércoles</a></li>
              </ul>
            </li>
            
             <?php endif?>
             
             
             <?php   $dia= date("w");
            if($dia==4){?>
             <li><a href="<?php echo e(url('/asistencia_miercoles')); ?>"> <i class="icon-padnote"></i>ASISTENCIA VESPERTINA</a></li>

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
                
                




      
                  <!-- <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/preguntas.docx')); ?>" role="button">AYUDAS</a>-->


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
 AYUDAS
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">PREGUNTAS FRECUENTES </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <h5 align="center">FAQ</h5><br>

<h5>¿Debo registrar Mi Asistencia Vespertina si no acuden vecinos?</h5><br>
Si, la asistencia que registras es la de los servidores públicos. En caso de que se instale el gabinete, deberás tomar la asistencia de los miembros y en la parte de vecinos deberás colocar 0 (cero).<br>


<h5>¿Por qué mi registro no aparece?</h5><br>

Los registros no se guardan como un consecutivo, por lo que deberás buscarlo en todo el listado o en su caso, descargar el archivo Excel y buscarlo con la función ctrl + b o bien, ordenando el archivo según las fechas. <br>


<h5>¿Puedo descargar mis bases en Excel?</h5><br>

Si, puedes descargar las bases de todos los módulos que tengan la opción a excepción de los módulos que aparecen según la actividad encomendada como VISITAS AL MP y la de VISITAS/RED DE VECINOS.<br>

<h5>¿En dónde puedo encontrar mis Informes?</h5><br>

La aplicación tiene un módulo llamado “MIS PDF’S” en el cual se subirán los informes correspondientes a tu coordinación o alcaldía.<br>

<h5>¿Qué debo hacer en caso de requerir altas, modificaciones o eliminar alguno de mis registros en la APP de Asistencia?</h5><br>

1.  Enviar un correo electrónico a maria.rosas@cdmx.gob.mx con el asunto “APP Asistencia” en el que se deberá especificar lo siguiente:<br>
a)  Nombre y CT: Especificar nombre completo de la RJG y la Coordinación Territorial a la que pertenece.<br>
b)  Módulo: el módulo del cual se está solicitando la modificación del registro (ejemplo: Asistencia Matutina, Asistencia Vespertina, Agenda, etc.)<br>
c)  Tipo de Solicitud: especificar según sea el caso: <br>
1.  Alta (cuando se quiere realizar un registro nuevo, sólo para módulos de asistencia).<br>
2.  Modificación (si un registro ya realizado requiere de un cambio).<br>
3.  Eliminación (para registros duplicados o mal capturados).<br>
4.  Contraseña (cambio o asignación de clave de acceso, este se validará con su superior jerárquico antes de realizarse).<br>
d)  ID: en caso de modificaciones o eliminaciones, para proceder al registro, deberán proporcionar el folio asignado por el sistema (identificador ID).<br>
e)  Fecha: en caso de modificaciones o eliminaciones, para proceder al registro, deberán proporcionar la fecha en que se realizó el registro.<br>
f)  Descripción: detallar el cambio solicitado, ejemplo si se requiere la captura de alguna asistencia, deberán especificar si es Titular, suplente, etc., sin poner nombres de los funcionarios, en el caso del campo “Otros”, se deberá especificar nombre y cargo. Si es una modificación, especificar como aparece y como debería aparecer, ejemplo: en el campo colonia dice: EL PEDREGAL, debe decir: EL PEDREGAL SAN ÁNGEL.<br>
g)  Anexos: Si incluye anexos que deberán adjuntarse al registro, como documentos, fotografías, etc.<br>
2.  Una vez recibida la solicitud, les será asignado un número de folio, que les será enviado por correo electrónico una vez que esté realizado.<br>



3.  En caso de que su cambio no haya sido realizado, podrán darle seguimiento con este número.<br>
4.  Las solicitudes que no se reciban por el medio especificado o bien, carezcan de alguno de los elementos requeridos, no serán atendidos.<br>



<h5>¿Qué debo hacer en caso de que un vecino registrado en la RED DE VECINOS ya no quiera formar parte del programa?</h5><br>

1.  Enviar un correo electrónico a maria.rosas@cdmx.gob.mx con el asunto “BAJA RED VECINAL”, en el que se deberá especificar lo siguiente:<br>
a)  Nombre y CT: Especificar nombre completo de la RJG y la Coordinación Territorial a la que pertenece.<br>
b)  ID: proporcionar el folio asignado por el sistema (identificador ID).<br>
c)  Nombre del Vecino: para corroborar que corresponde al ID.<br>
2.  Es importante mencionar que este cambio deberá ser validado previamente por el área de Evaluación y Seguimiento, quien, en caso de ser necesario, se comunicará con la representante antes de autorizar la eliminación.<br>
3.  Una vez autorizado, se procederá a la eliminación del registro y se enviará por correo electrónico el ticket correspondiente.<br>


Dudas y comentarios, enviar un mensaje via TELEGRAM al siguiente grupo: <li><a href="https://t.me/joinchat/AAAAAFHI8FMMsNwLycJy8g"> <p style="color:#0096d2";>(darle click y en automático te redirigirá al canal) TICKETS CGGSCyPJ.</p></a></li> 
  <br>

Cabe hacer mención que ese grupo es únicamente para seguimiento de TICKETS y todas aquellas preguntas que no estén relacionadas a ello serán borradas sin excepción.
<br>

<h5>**NOTA** Se irán añadiendo más preguntas y respuestas conforme sea necesario.</h5>


      </div>
     
    </div>
  </div>
</div>



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