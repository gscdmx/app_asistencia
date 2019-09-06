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
    <div class="card-body">
     
      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>
      
      
      
      
       <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Incidencias Delictivas </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Archivo</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pdfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                      
                      <td><?php echo e($pdf->descripcion); ?></td>
                      <td><a href="<?php echo e(url('/uploads').'/'.$pdf->archivo_pdf); ?>" class="btn btn-primary" download>Descargar</a></td>
                    
                      

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


       






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