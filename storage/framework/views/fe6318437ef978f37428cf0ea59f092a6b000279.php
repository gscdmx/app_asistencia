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
      <h4>CGGSCYPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>Visitas en CGGSCyPJ</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/getlistadovisitas_coordinador')); ?>">

      <?php echo e(csrf_field()); ?>



      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>

<div class="col-sm-4 offset-sm-2">
           
            <a href="<?php echo e(url('/getexcel_visitas_coordinador')); ?>" class="btn btn-primary">Descargar Visitas CGGSCyPJ</a>
</div>




        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>LISTADO DE VISITAS EN CGGSCyPJ</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="tabla_de_visitas_coordinador">
                  <thead>
                    <tr>
                     
                     <th>Id</th>
                     <th>Fecha de la Visita:</th>
                     <th>Hora:</th>
                     <th>Nombre:</th>
                     <th>Procedencia:</th>
                     <th>Asunto:</th>
                     <th>Teléfono:</th>
                     <th>Dirección:</th>
                     <th>Correo/Electrónico:</th>                
                             
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $visitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                                          
                     
                     <td><?php echo e($visita->id); ?></td>
                     <td><?php echo e($visita->fecha); ?></td>
                     <td><?php echo e($visita->hora_i); ?></td>
                     <td><?php echo e($visita->nombre); ?></td>
                     <td><?php echo e($visita->procedencia); ?></td>
                     <td><?php echo e($visita->asunto); ?></td>
                     <td><?php echo e($visita->telefono); ?></td>
                     <td><?php echo e($visita->direccion); ?></td>
                     <td><?php echo e($visita->correo); ?></td>
                     
                     

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


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_visitas_coordinador').DataTable();
} );

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>