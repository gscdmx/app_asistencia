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
      <h4>CGGSCYPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>MIS VISTAS DOMICILIARIAS</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/save_cuestionario_preguntas')); ?>">

      <?php echo e(csrf_field()); ?>



      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>






        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>LISTADO DE RED DE CONTACTO CIUDADANO</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     
                          <th>ID</th>
                          <th>ALCALDIA</th>
                          <th>CUADRANTE</th>
                          <th>REGION</th>
                          <th>NOMBRE DE RJG</th>
                          <th>FECHA CAPTURA</th>
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
                          <th>VECINO ACEPTO SER PARTE DE RED VECINAL?</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $consultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                                          
            <td><?php echo e($consulta->id); ?></td>
            <td><?php echo e($consulta->id_user); ?></td>
            <td><?php echo e($consulta->id_cuadrante); ?></td>
            <td><?php echo e($consulta->region); ?></td>
            <td><?php echo e($consulta->nombre_rjg); ?></td>
            <td><?php echo e($consulta->fecha); ?></td>
            <td><?php echo e($consulta->hora_i); ?></td>
            <td><?php echo e($consulta->hora_f); ?></td>
            <td><?php echo e($consulta->calle); ?></td>
            <td><?php echo e($consulta->numero); ?></td>
            <td><?php echo e($consulta->colonia); ?></td> 
            <td><?php echo e($consulta->servicio_policia); ?></td>
            <td><?php echo e($consulta->acudio); ?></td>
            <td><?php echo e($consulta->conoce_jc); ?></td>
            <td><?php echo e($consulta->conoce_app); ?></td>         
            <td><?php echo e($consulta->llamarjefe_respondio); ?></td>
            <td><?php echo e($consulta->acudio_jefe); ?></td>
            <td><?php echo e($consulta->tiempo_acudio); ?></td>
            <td><?php echo e($consulta->nombre); ?></td>
            <td><?php echo e($consulta->telefono); ?></td>
            <td><?php echo e($consulta->firma); ?></td>    

           
          
                      
                      

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