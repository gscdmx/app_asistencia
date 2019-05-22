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
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/guardar_admin_pdf')); ?>">

      <?php echo e(csrf_field()); ?>





      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>
      
         <div class="form-group row">
          <label class="col-sm-2 form-control-label">Enviar PDF a:</label>
          <div class="col-sm-10 mb-3">
            <select name="elegir_user" id="elegir_user" class="form-control">
              <option value="">Selecciona...</option>
              <option value="1">Alcaldia</option>
              <option value="2">Usuario</option>
            </select>
            
             <?php if($errors->has('elegir_user')): ?> <p  style="color: red"><?php echo e($errors->first('elegir_user')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
      
      
      <div  style="display:none;" id="show_alc">
          
       <div class="form-group row">
          <label class="col-sm-2 form-control-label">Selecciona la Alcaldía para quien va el PDF:</label>
          <div class="col-sm-10 mb-3">
            <select id="alcaldia" name="alcaldia" class="form-control">

              <option value="">Selecciona...</option>
              <?php $__currentLoopData = $alcaldias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alcaldia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($alcaldia->id); ?>"><?php echo e($alcaldia->delegacion); ?></option>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </select>

             <?php if($errors->has('alcaldia')): ?> <p  style="color: red"><?php echo e($errors->first('alcaldia')); ?></p> 
             <?php endif; ?>
           

          </div>
        
        </div>
         </div>

        <div  style="display:none;" id="show_user">
         <div class="form-group row">
          <label class="col-sm-2 form-control-label">Selecciona Usuario para quien va el PDF:</label>
          <div class="col-sm-10 mb-3">
            <select id="user" name="user" class="form-control"> 
            
            <option value="">Selecciona...</option>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></option>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
            </select>
            
            

             <?php if($errors->has('user')): ?> <p  style="color: red"><?php echo e($errors->first('user')); ?></p> <?php endif; ?> 


          </div>
        
        </div>
         </div>



       
      
        
        
       
         

     



        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Descripción del Archivo:</label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="descripcion" name="descripcion" class="form-control" ></textarea>
          </div>
        </div>

   





        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">subir archivo</label>
          <div class="col-sm-10">
        <input type="file" id="archivo" name="archivo" accept="application/pdf"> 
        <!--este es el mensaje de validacion-->
            <?php if($errors->has('archivo')): ?> <p  style="color: red"><?php echo e($errors->first('archivo')); ?></p> <?php endif; ?>

          </div>
        </div>





    



        
        </div>


       <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-2">
            <!--<button type="submit" class="btn btn-secondary">Cancel</button>-->
            <button type="submit" class="btn btn-primary">Enviar</button>
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


<script type="text/javascript">


 $('#elegir_user').change(function(evento){
         valor = $(this).val();
         

         if (valor =='1') {
         
          $('#show_alc').show();
           $('#show_user').hide();
         }else if(valor=='2'){
          $('#show_user').show();
           $('#show_alc').hide();

         }else{

            $('#show_alc').hide();
            $('#show_user').hide();

         }

});

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>