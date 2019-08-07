<?php $__env->startSection('content'); ?>


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
      <h4>CGGSCYPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>MIS VISITAS DOMICILIARIAS CDMX</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/getlistadopreguntas')); ?>">

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
              <h4>LISTADO DE RED PARA CONTACTO CIUDADANO</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                           

                     <th>Alcaldia:</th>
                     <th>Region:</th>                  
                     <th>Coordinación Territorial/Sector:</th>
                     <th>Cuadrante:</th>
                     <th>Id</th>
                     <th>Nombre de RJG:</th>
                     <th>Fecha de alta:</th>
                     <th>Hora de inicio de entrevista:</th>
                     <th>Hora de término de entrevista:</th>
                     <th>Calle:</th>
                     <th>Número:</th>
                     <th>Colonia:</th>
                     <th>¿Alguna vez ha solicitado el servicio de la policía?:</th>
                     <th>¿Acudio el policía?:</th>
                     <th>¿Conoce a su jefe de cuadrante?:</th>
                     <th>¿Conoce la APP Mi Policía?:</th>
                     <th>¿Al llamar al jefe de cuadrante en tiempo real, respondió?:</th>
                     <th>¿Acudió jefe de cuadrante?:</th>
                     <th>¿En cuánto tiempo acudió?:</th>
                     <th>Nombre del vecino entrevistado:</th>
                     <th>Télefono del vecino entrevistado:</th>
                     <th>>¿El vecino acepto ser parte de la red vecinal?:</th>
                     
                                        
                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $consultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                                          
                     <td><?php echo e($consulta->delegacion); ?></td>
                     <td><?php echo e($consulta->region); ?></td>                 
                     <td><?php echo e($consulta->ct2); ?> <?php echo e($consulta->sector); ?></td>
                     <td><?php echo e($consulta->cuadrante); ?></td>
                     <td><?php echo e($consulta->id); ?></td>
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