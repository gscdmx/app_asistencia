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
      <h4>Mis visitas </h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="<?php echo e(url('/guardar_cuestionario_Seguridad')); ?>">

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
     
      <div class="form-group row">
          <label class="col-sm-3 form-control-label">Nombre:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="nombre" name="nombre"></textarea>
            
             <?php if($errors->has('nombre')): ?> <p  style="color: red"><?php echo e($errors->first('nombre')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
     
      
       <div class="form-group row">
          <label class="col-sm-3 form-control-label">Domicilio:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="direccion" name="direccion"></textarea>
            
             <?php if($errors->has('direccion')): ?> <p  style="color: red"><?php echo e($errors->first('direccion')); ?></p> <?php endif; ?> 
          </div>
        
        </div>

         <div class="form-group row">
          <label class="col-sm-3 form-control-label">Colonia:</label>
          <div class="col-sm-9 mb-3">
             <input type="text" class="form-control" id="colonia" name="colonia"></input>
            
             <?php if($errors->has('colonia')): ?> <p  style="color: red"><?php echo e($errors->first('colonia')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
     
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">1 - ¿Ha solicitado los servicios de la policía?</label>
          <div class="col-sm-9 mb-3">
            <select name="servicio_policia" id="servicio_policia" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('servicio_policia')): ?> <p  style="color: red"><?php echo e($errors->first('servicio_policia')); ?></p> <?php endif; ?> 
          </div>
        
        </div>

        <div class="form-group row">
          <label class="col-sm-3 form-control-label">2 - ¿Hace cuánto?:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="hace_cuanto" name="hace_cuanto"></textarea>
            
             <?php if($errors->has('hace_cuanto')): ?> <p  style="color: red"><?php echo e($errors->first('hace_cuanto')); ?></p> <?php endif; ?> 
          </div>
        
        </div>

        <div class="form-group row">
          <label class="col-sm-3 form-control-label">3 - ¿Por que motivo?:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="motivo" name="motivo"></textarea>
            
             <?php if($errors->has('motivo')): ?> <p  style="color: red"><?php echo e($errors->first('motivo')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
      
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">4 - ¿Por qué medio llamaste a la policía?</label>
          <div class="col-sm-9 mb-3">
            <select name="medio_llamo_policia" id="medio_llamo_policia" class="form-control">
              <option value="">Selecciona...</option>
              <option value="911">911</option>
              <option value="App Mi Policia">App Mi Policia</option>
              <option value="Botón de Auxilio">Botón de Auxilio</option>
              <option value="Otra">Otra</option>
            </select>
            
             <?php if($errors->has('medio_llamo_policia')): ?> <p  style="color: red"><?php echo e($errors->first('medio_llamo_policia')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
       
        
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">5 - ¿Te contestarón?</label>
          <div class="col-sm-9 mb-3">
            <select name="contestaron" id="contestaron" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('contestaron')): ?> <p  style="color: red"><?php echo e($errors->first('contestaron')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
   
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">6 - ¿Cuántas veces  tuviste que llamar para que te contestaran?</label>
          <div class="col-sm-9 mb-3">
            <select name="veces_en_llamar" id="veces_en_llamar" class="form-control">
              <option value="">Selecciona...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="mas de 5 veces">más de 5 veces</option>
            </select>
            
             <?php if($errors->has('veces_en_llamar')): ?> <p  style="color: red"><?php echo e($errors->first('veces_en_llamar')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
     
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">7 - ¿Cuánto tiempo se tardarón en contestar?(minutos):</label>
          <div class="col-sm-9 mb-3">
             <input type="number" class="form-control" id="tiempo_contestar" name="tiempo_contestar"></input>
            
             <?php if($errors->has('tiempo_contestar')): ?> <p  style="color: red"><?php echo e($errors->first('tiempo_contestar')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">8 - ¿Cuánto tiempo llegó la policía?:</label>
          <div class="col-sm-9 mb-3">
             <input type="text" class="form-control" id="tiempo_llegada" name="tiempo_llegada"></input>
            
             <?php if($errors->has('tiempo_llegada')): ?> <p  style="color: red"><?php echo e($errors->first('tiempo_llegada')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">9 - ¿La atención que recibiste fue?</label>
          <div class="col-sm-9 mb-3">
            <select name="atencion" id="atencion" class="form-control">
              <option value="">Selecciona...</option>
              <option value="Muy Buena">Muy Buena</option>
              <option value="Buena">Buena</option>
              <option value="Regular">Regular</option>
              <option value="Mala">Mala</option>
              <option value="Muy mala">Muy mala</option>
              
            </select>
            
             <?php if($errors->has('atencion')): ?> <p  style="color: red"><?php echo e($errors->first('atencion')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
       
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">10 - ¿Resolvió el problema o la urgencia qué se presentó?:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="resolvio_problema" name="resolvio_problema"></textarea>
            
             <?php if($errors->has('resolvio_problema')): ?> <p  style="color: red"><?php echo e($errors->first('resolvio_problema')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
      
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">11 - ¿Conoce el programa de cuadrantes?</label>
          <div class="col-sm-9 mb-3">
            <select name="conoce_cuadrante" id="conoce_cuadrante" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('conoce_cuadrante')): ?> <p  style="color: red"><?php echo e($errors->first('conoce_cuadrante')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">12 - ¿Conoce al jefe de cuadrante?</label>
          <div class="col-sm-9 mb-3">
            <select name="conoce_jc" id="conoce_jc" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('conoce_jc')): ?> <p  style="color: red"><?php echo e($errors->first('conoce_jc')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
       
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">13 - ¿Cómo califica la seguridad entorno a su calle?:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="califica_seguridad_calle" name="califica_seguridad_calle"></textarea>
            
             <?php if($errors->has('califica_seguridad_calle')): ?> <p  style="color: red"><?php echo e($errors->first('califica_seguridad_calle')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
         <div class="form-group row">
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
        
        </div>
       
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">15 - Comentarios:</label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
            
             <?php if($errors->has('comentarios')): ?> <p  style="color: red"><?php echo e($errors->first('comentarios')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
    
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





<?php $__env->startSection('customjs'); ?>


<script type="text/javascript">



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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>