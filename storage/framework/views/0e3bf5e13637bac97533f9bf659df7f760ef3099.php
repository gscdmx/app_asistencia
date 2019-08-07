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
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/guardarUsuario')); ?>">

      <?php echo e(csrf_field()); ?>





      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>




        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Nombre:</label>
          <div class="col-sm-10">
           <input type="text" class="form-control" id="user" name="user">
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
            <?php if($errors->has('user')): ?> <p  style="color: red"><?php echo e($errors->first('user')); ?></p> <?php endif; ?>
          </div>
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">correo:</label>
          <div class="col-sm-10">
           <input type="text" class="form-control" id="email" name="email">
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
            <?php if($errors->has('email')): ?> <p  style="color: red"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
          </div>
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Clave:</label>
          <div class="col-sm-10">
           <input type="password" class="form-control" id="password" name="password">
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
            <?php if($errors->has('password')): ?> <p  style="color: red"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
          </div>
        </div>


         <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Confirmar clave:</label>
          <div class="col-sm-10">
           <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <?php if($errors->has('password_confirmation')): ?> <p  style="color: red"><?php echo e($errors->first('password_confirmation')); ?></p> <?php endif; ?>
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
          </div>
        </div>




       
          
        <!--  <br>
           <div class="form-group row">
          <label class="col-sm-2 form-control-label">Temas Relevantes:</label>
          <div class="col-sm-10">
            
            <textarea id="motivo" name="motivo" class="form-control" ></textarea>
          </div>
        </div>-->
        
        
          <!-- TABLA DE ROLES
                   ================================================-->
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="panel panel-default">
                                 <div class="panel-heading">
                                     Permisos 
                                 </div>
                                 <!-- /.panel-heading -->
                                 <div class="panel-body">
                                    <div class="table-responsive">
                                     <div class="dataTable_wrapper">

                                         <table  class="table table-bordered table-striped">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Permiso</th>
                                                     <th>Descripción</th>
                                                     <th><input name="select_all_app" id="select_all_app" type="checkbox" value="1"/> Todos</th>
                                                 </tr>
                                             </thead>

                                             <tbody>
                                              <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                               <td><?php echo e($permiso->id); ?></td>
                                               <td><?php echo e($permiso->permiso); ?></td>
                                                 <td><?php echo e($permiso->descripcion); ?></td>
                                                 <td>
                                                   <input  class="checkBoxClass_app" name="permisos[]" value="<?php echo e($permiso->id); ?>" type="checkbox" <?php if(in_array($permiso->id, old('permisos', []))): ?> checked <?php endif; ?> >
                                                 </td>
                                              </tr>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </tbody>


                                         </table>
                                     </div>
                                      </div>

                                     <!-- /.table-responsive -->
                             
                                 </div>
                                 <!-- /.panel-body -->
                             </div>
                             <!-- /.panel -->
                         </div>
                         <!-- /.col-lg-12 -->
                     </div>
                     <!-- /TABLA -->

         


        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-2">
            <!--<button type="submit" class="btn btn-secondary">Cancel</button>-->
            <button type="submit" class="btn btn-primary">Guardar</button>
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

$("#select_all").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
});

$("#select_all_app").click(function () {
    $(".checkBoxClass_app").prop('checked', $(this).prop('checked'));
});


</script>

<?php $__env->stopSection(); ?>









<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>