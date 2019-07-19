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
      <h4>Formato de Visitas</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/guardar_cuestionario_Preguntas')); ?>">

      <?php echo e(csrf_field()); ?>


      <?php if( Session::has('mensaje') ): ?>
                   <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo e(Session::get('mensaje')['mensaje']); ?>

                   </div>
      <?php endif; ?>
      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Cuadrante: </label>
        <div class="col-sm-9 mb-3">
          <select name="id_cuadrante" id="id_cuadrante" class="form-control">
            <option value="">Selecciona...</option>
            <?php $__currentLoopData = $mis_cuadrantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mi_cuadrante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($mi_cuadrante->id); ?>"><?php echo e($mi_cuadrante->cuadrante); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          </select>
          
           <?php if($errors->has('id_cuadrante')): ?> <p  style="color: red"><?php echo e($errors->first('id_cuadrante')); ?></p> <?php endif; ?> 
        </div>
      
      </div>

         <div class="line"></div>
      <div class="form-group row">
        <label class="col-sm-2 form-control-label">Fecha:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" ></input>
           <?php if($errors->has('fecha')): ?> <p  style="color: red"><?php echo e($errors->first('fecha')); ?></p> <?php endif; ?> 
        </div>
        <label class="col-sm-2 form-control-label">Hora de Inicio:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_i" name="hora_i" class="form-control" ></input>
           <?php if($errors->has('hora_i')): ?> <p  style="color: red"><?php echo e($errors->first('hora_i')); ?></p> <?php endif; ?>
        </div>

         <label class="col-sm-2 form-control-label">Hora de Término:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_f" name="hora_f" class="form-control" ></input>
           <?php if($errors->has('hora_f')): ?> <p  style="color: red"><?php echo e($errors->first('hora_f')); ?></p> <?php endif; ?>
        </div>


      </div>

        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nombre de la Representante de Jefatura de Gob:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="nombre_rjg" name="nombre_rjg"></textarea>
            
             <?php if($errors->has('nombre_rjg')): ?> <p  style="color: red"><?php echo e($errors->first('nombre_rjg')); ?></p> <?php endif; ?> 
          </div>
        
        </div> 
  
       
      <div class="line"></div>
       <div class="form-group row">
          <label class="col-sm-3 form-control-label">Calle:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="calle" name="calle"></textarea>
            
             <?php if($errors->has('calle')): ?> <p  style="color: red"><?php echo e($errors->first('calle')); ?></p> <?php endif; ?> 
          </div>
        
        </div>

          
         <div class="line"></div>
          <div class="form-group row">
          <label class="col-sm-3 form-control-label">Numero:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="numero" name="numero"></textarea>
            
             <?php if($errors->has('numero')): ?> <p  style="color: red"><?php echo e($errors->first('numero')); ?></p> <?php endif; ?> 
          </div>
        
        </div>

           
            <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Colonia:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="colonia" name="colonia"></input>
            
               <?php if($errors->has('colonia')): ?> <p  style="color: red"><?php echo e($errors->first('colonia')); ?></p> <?php endif; ?> 
                  </div>
        
             </div>

    
          <div class="line"></div>
           <div class="form-group row">
             <label class="col-sm-3 form-control-label">¿Alguna vez ha solicitado el apoyo de la policía?:</label>
             <div class="col-sm-9 mb-3">
              <select name="servicio_policia" id="servicio_policia" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('servicio_policia')): ?> <p  style="color: red"><?php echo e($errors->first('servicio_policia')); ?></p> <?php endif; ?> 
          </div>
        
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">¿Acudio?:</label>
          <div class="col-sm-9 mb-3">

             <select name="acudio" id="acudio" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            <!--<textarea class="form-control" id="acudio" name="acudio"></textarea>-->
            
             <?php if($errors->has('acudio')): ?> <p  style="color: red"><?php echo e($errors->first('acudio')); ?></p> <?php endif; ?> 
          </div>
        
        </div>



        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">¿Conoce a su Jefe de Cuadrante?:</label>
          <div class="col-sm-9 mb-3">
            <select name="conoce_jc" id="conoce_jc" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('conoce_jc')): ?> <p  style="color: red"><?php echo e($errors->first('conoce_jc')); ?></p> <?php endif; ?> 
          </div>
        
        </div>


        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">¿Conoce la App mi Policía?</label>
          <div class="col-sm-9 mb-3">
            <select name="conoce_app" id="conoce_app" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('conoce_app')): ?> <p  style="color: red"><?php echo e($errors->first('conoce_app')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
                
           
        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">Al llamar al jefe de cuadrante en tiempo real, ¿respondió?</label>
          <div class="col-sm-9 mb-3">
            <select name="llamarjefe_respondio" id="llamarjefe_respondio" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
              
            </select>
            
             <?php if($errors->has('llamarjefe_respondio')): ?> <p  style="color: red"><?php echo e($errors->first('llamarjefe_respondio')); ?></p> <?php endif; ?> 
          </div>
        
        </div>


        <div class="line"></div>
          <div class="form-group row">
          <label class="col-sm-3 form-control-label">¿Acudio jefe de cuadrante?</label>
          <div class="col-sm-9 mb-3">
            <select name="acudio_jefe" id="acudio_jefe" class="form-control">
               <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
              
            </select>
            
             <?php if($errors->has('acudio_jefe')): ?> <p  style="color: red"><?php echo e($errors->first('acudio_jefe')); ?></p> <?php endif; ?> 
          </div>
        
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">¿En cuánto tiempo acudió(minutos)?:</label>
          <div class="col-sm-9 mb-3">
             <input type="number" class="form-control" id="tiempo_acudio" name="tiempo_acudio"></input>
            
             <?php if($errors->has('tiempo_acudio')): ?> <p  style="color: red"><?php echo e($errors->first('tiempo_acudio')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
       
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nombre:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="nombre" name="nombre"></textarea>
            
             <?php if($errors->has('nombre')): ?> <p  style="color: red"><?php echo e($errors->first('nombre')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
     
        
        <!-- <div class="form-group row">
          <label class="col-sm-3 form-control-label">14 - Si su respuesta en la pregunta 3 fue un "delito", responde lo siguiente, ¿Realizó su denuncia?</label>
          <div class="col-sm-9 mb-3">
            <select name="realizo_denuncia" id="realizo_denuncia" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('realizo_denuncia')): ?> <p  style="color: red"><?php echo e($errors->first('realizo_denuncia')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
        <div  style="display:none;" id="show_delito">
        
        <div class="form-group row">
          <label class="col-sm-3 form-control-label" id="texto_delito"></label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="descripcion_denuncia" name="descripcion_denuncia"></textarea>
            
             <?php if($errors->has('descripcion_denuncia')): ?> <p  style="color: red"><?php echo e($errors->first('descripcion_denuncia')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
        </div>-->
        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">TELEFONO:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="telefono" name="telefono"></textarea>
            
             <?php if($errors->has('telefono')): ?> <p  style="color: red"><?php echo e($errors->first('telefono')); ?></p> <?php endif; ?> 
          </div>
        
        </div>


         <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">FIRMA:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="firma" name="firma"></textarea>
            
             <?php if($errors->has('firma')): ?> <p  style="color: red"><?php echo e($errors->first('firma')); ?></p> <?php endif; ?> 
          </div>
        
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-6 offset-sm-6">
            <button type="submit" class="btn btn-primary">Registrar</button>
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





<!--<?php $__env->startSection('customjs'); ?>


    <!-- <script type="text/javascript">



      $('#realizo_denuncia').change(function(evento){
         valor = $(this).val();



         if (valor=="si") {
          $('#show_delito').show();
          $('#texto_delito').text('¿Cómo fue la atención en el Ministerio Público?');
          
         }else if(valor=="no"){
           $('#show_delito').show();
           $('#texto_delito').text('¿Por qué?');

         }else{

          $('#show_delito').hide();
            $('#show_delito').hide();

         }

      });

       </script>

<?php $__env->stopSection(); ?>-->


<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>