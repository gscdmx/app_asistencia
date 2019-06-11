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
      <h4>CGSCPJ CDMX</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/faltantes_miercoles')); ?>">
          
          <?php echo e(csrf_field()); ?>


          
          
               
    <div class="line"></div>
      <div class="form-group row">
        <label class="col-sm-1 form-control-label">Fecha 1:</label>
        <div class="col-sm-3">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" ></input>
           <?php if($errors->has('fecha')): ?> <p  style="color: red"><?php echo e($errors->first('fecha')); ?></p> <?php endif; ?> 
        </div>


          <label class="col-sm-1 form-control-label">Fecha 2:</label>
        <div class="col-sm-3">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha2" name="fecha2" class="form-control" ></input>
           <?php if($errors->has('fecha2 ')): ?> <p  style="color: red"><?php echo e($errors->first('fecha2 ')); ?></p> <?php endif; ?> 
        </div>


  
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
        <button type="submit" class="btn btn-primary">Descargar Excel Faltantes Miercoles</button>
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