<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>

<style>
thead {color:green;}
tbody {color:blue;}
tfoot {color:red;}

table, th, td {
  border: 1px solid black;
}
</style>


  <section class="forms">
        <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
          <div class="row">
         



<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>CGGSCyPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>GABINETE VESPERTINO DE SEGURIDAD CIUDADANA CDMX</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/guardar_asistencia_miercoles')); ?>">

      <?php echo e(csrf_field()); ?>



      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>


                      

<div class="col-sm-4 offset-sm-2">
           
            <a href="<?php echo e(url('/getexcelmiercoles')); ?>" class="btn btn-primary">Descargar Excel Asistencias Miércoles</a>
            
            
            
</div>     

        


        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Asistencias en Gabinetes Vespertinos</h4>
            </div>
            
            
            
            
            
            
            
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="tabla_de_asistenciagv">
                  <thead>
                    <tr>
                      <th>Fecha de Captura</th>
                      <th>Hora de Inicio</th>
                      <th>Hora de Término</th>
                      <th>Coordinación Territorial</th>
                      <th>Se realizó</th>
                      <th>Motivo por el que no se realizo</th>
                      <th>Jefa de Gobierno</th>
                      <th>Ministerio Público</th>
                      <th>Jefe de la Policía</th>
                      <th>Policía Investigación</th>
                      <th>Juez Cívico</th>
                      <th>Médico Legista</th>
                      <th>Inteligencia Social</th>
                      <th>Representante Alcaldia</th>
                      <th>Vecinos</th>
                      <th>Programa Mi C911e</th>
                      <th>Imagen del Gabinete Vespertino</th>
                      

                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $asistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                      
                      <td><?php echo e($asistencia->fecha); ?></td>
                      <td><?php echo e($asistencia->hora_i); ?></td>
                      <td><?php echo e($asistencia->hora_f); ?></td>
                      <td><?php echo e($asistencia->ct2); ?> <?php echo e($asistencia->sector); ?></td>
                      <td><?php echo e($asistencia->se_realizo); ?></td>
                      <td><?php echo e($asistencia->no_motivo); ?></td>
                      <td><?php echo e($asistencia->jg); ?></td>
                      <td><?php echo e($asistencia->mp); ?></td>
                      <td><?php echo e($asistencia->jsp); ?></td>
                      <td><?php echo e($asistencia->jspi); ?></td>
                      <td><?php echo e($asistencia->jc); ?></td>
                      <td><?php echo e($asistencia->ml); ?></td>
                      <td><?php echo e($asistencia->ins); ?></td>
                      <td><?php echo e($asistencia->representante_alcaldia); ?></td>
                      <td><?php echo e($asistencia->vecino); ?></td>
                      <td><?php echo e($asistencia->calle); ?></td>
                      
                  
                       <td>

                       

                      
                        <?php if($asistencia->archivo_imagen==null || $asistencia->archivo_imagen==''): ?>

                         SIN IMAGEN


                        <?php else: ?>

                         <!-- <a href="<?php echo e(url('/uploads/imagenes_alcaldias').'/'.$asistencia->archivo_imagen); ?>" class="btn btn-primary" role="button">VER IMAGEN</a>

                          <br>-->

                          <button type="button" class="btn btn-primary obtener_imagen" data-toggle="modal"  data-imagen="<?php echo e($asistencia->archivo_imagen); ?>" data-target="#modal_imagen">
                           VER IMAGEN
                          </button>
                        <?php endif; ?>
                      </td>           
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                   <tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

 </div>
 </div>
  </section>
  <!-- Modal -->
<div class="modal fade" id="modal_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto: Gabinete de Seguridad Vespertino CDMX</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <div style="width: 500px; height: 400px;">
      <img src="" id="imagen_dinamica"  style="width: 480px; height: 380px;"  >
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>  
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customjs'); ?>


<script    type="text/javascript">
  

  $( ".obtener_imagen" ).click(function() {

    
     var imagen_nombre = $(this).attr('data-imagen');

     var ruta ="<?php echo e(url('alcaldias')); ?>"+"/"+imagen_nombre

     $("#imagen_dinamica").attr('src',ruta);


  //alert( ruta);
});


</script>


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_asistenciagv').DataTable();
} );

</script>




<?php $__env->stopSection(); ?>



<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>