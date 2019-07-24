<?php $__env->startSection('content'); ?>



  <section class="forms">
        <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
          <div class="row">
         



<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>CGGSCYPJ CDMX MI FORMATO DE VISITAS</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>MI FORMATO DE VISITAS</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/guardar_asistencia')); ?>">

      <?php echo e(csrf_field()); ?>



      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>



<div class="col-sm-4 offset-sm-2">
           
            <a href="<?php echo e(url('/getexcel')); ?>" class="btn btn-primary">Descargar Excel Formato de Visitas</a>
</div>



        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Vistas</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      
                          <th>ALCALDIA</th>
                          <th>REGION</th>
                          <th>SECTOR</th>
                          <th>COORDINACIÓN TERRITORIAL</th>
                          <th>CUADRANTE</th>
                          <th>ID</th>
                          <th>NOMBRE DE RJG</th>
                          <th>FECHA DE ALTA</th>
                          <th>HORA DE INICIO</th>
                          <th>HORA DE TERMINO</th>                
                          <th>CALLE </th>
                          <th>NÚMERO</th>
                          <th>COLONIA</th>
                          <th>¿ALGUNA VEZ HA SOLICITADO EL SERVICIO DE LA POLICÍA? </th>
                          <th>¿ACUDIO? </th>
                          <th>¿CONOCE A SU JEFE DE CUADRANTE? </th>
                          <th>¿CONOCE LA APP MI POLICÍA? </th>
                          <th>¿AL LLAMAR AL JEFE DE CUADRANTE EN TIEMPO REAL, ¿RESPONDIÓ?  </th>
                          <th>¿ACUDIO JEFE DE CUADRANTE?</th>
                          <th>¿EN CUÁNTO TIEMPO ACUDIÓ?</th>
                          <th> NOMBRE</th>
                          <th>NÚMERO DE TELEFONO</th>
                          <th>FIRMA</th>
                          <th>FECHA DE CAPTURA</th>
                          <th>FECHA DE ACTUALIZACIÓN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pregunta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preguntas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                                          <td><?php echo e($preguntas->delegacion); ?></td>
                                          <td><?php echo e($preguntas->}</td>
                                          <td>{{$preguntas->); ?></td>
                                          <td><?php echo e($preguntas->); ?></td>
                                          <td><?php echo e($preguntas->); ?></td>
                                           <td><?php echo e($preguntas->); ?></td>
                                            <td><?php echo e($preguntas->); ?></td>
                                             <td><?php echo e($preguntas->); ?></td>
                                              <td><?php echo e($preguntas->); ?></td>
                                               <td><?php echo e($preguntas->); ?></td>
                                                <td><?php echo e($preguntas->); ?></td>
                                                 <td><?php echo e($preguntas->); ?></td>
                                                  <td><?php echo e($preguntas->); ?></td>
                                                   <td><?php echo e($preguntas->); ?></td>
                                                    <td><?php echo e($preguntas->); ?></td>
                                                     <td><?php echo e($preguntas->); ?></td>
                                                      <td><?php echo e($preguntas->); ?></td>
                                                       <td><?php echo e($preguntas->); ?></td>
                                                        <td><?php echo e($preguntas->); ?></td>
                                                         <td><?php echo e($preguntas->); ?></td>
                                                          <td><?php echo e($preguntas->); ?></td>
                                                           <td><?php echo e($preguntas->); ?></td>
                                                            <td><?php echo e($preguntas->); ?></td>
                                                             <td><?php echo e($preguntas->); ?></td>
                                                              <td><?php echo e($preguntas->); ?></td>

                                          
                     






                                          <td><?php echo e($preguntas->id); ?></td>
                                          <td><?php echo e($preguntas->fecha); ?></td>
                                          <td><?php echo e($preguntas->hora_i); ?></td>
                                          <td><?php echo e($preguntas->hora_f); ?></td>
                                          <td><?php echo e($preguntas->ct2); ?> <?php echo e($preguntas->sector); ?></td>//coordinacion para el de cooordinacion
                                          <td><?php echo e($preguntas->se_realizo); ?></td>
                                          <td><?php echo e($preguntas->no_motivo); ?></td>
                                          <td><?php echo e($preguntas->jg); ?></td>
                                          <td><?php echo e($preguntas->mp); ?></td>
                                          <td><?php echo e($preguntas->jsp); ?></td>
                                          <td><?php echo e($preguntas->jspi); ?></td>
                                          <td><?php echo e($preguntas->jc); ?></td>
                                          <td><?php echo e($preguntas->ml); ?></td>
                                          <td><?php echo e($preguntas->ins); ?></td>
                                          <td><?php echo e($preguntas->representante_alcaldia); ?></td>
                                          <td><?php echo e($preguntas->reunionjg); ?></td>
     
                      
                      

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                  </tbody>
                  
                  
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





<?php $__env->stopSection(); ?>





<?php $__env->startSection('js'); ?>  
 
<?php $__env->stopSection(); ?>





<?php $__env->startSection('customjs'); ?>




<?php $__env->stopSection(); ?>









<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>