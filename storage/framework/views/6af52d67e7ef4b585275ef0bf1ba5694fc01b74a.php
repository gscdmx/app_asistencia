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
      <h4>CGGSCyPJ CDMX</h4>
    </div>
    <div class="card-body">
  

   <div class="row">
     <div class="col-sm-6 ">

      <text>
<label>En esta sección encontrarás:<br>
Los mapas de red vecinal e incidencia delictiva con su respectiva descripción.<br><br>
</label>
</text>

              <H4>Metodologías.</H1><br>
                <li><a href="<?php echo e(url('/uploads/GSCYPJ/mapasred.pdf')); ?>"><i class="icon-list"></i> Metodología MAPA -RED VECINAL</a></li> <br>
                <li><a href="<?php echo e(url('/uploads/GSCYPJ/mapascrimen.pdf')); ?>"><i class="icon-list"></i> Metodología MAPA -ANÁLISIS DEL CRIMEN</a></li>  <br>
             <!-- <H4>Mapas.</H1><br>-->
                                        
                                  
                                
                                  
     <!-- <text>



      <label>En este mapa es encontrarás:<br><br>

        Los mapas que te son proporcionados son una ayuda visual que te será útil para ubicar dónde se encuentran tus contactos que ya integran la red ciudadana, para saber en qué cuadrantes hace falta localizar a algún contacto y para conocer las zonas donde es recomendable que te acerques para localizar vecinos para la red.<br><br>
        
        Los mapas tienen 3 elementos:<br><br>

      1.- Se muestran puntos que marcan la localización de los vecinos que ya presentaste con anterioridad.<br>
      2.- La división por cuadrantes de la coordinación territorial.<br>
      3.- Una capa con divisiones; estructurada con la distribución de los delitos que han ocurrido en la Coordinación Territorial durante el 2019.<br><br>
          

         Para entender estos mapas debes tomar en cuanta sus características:<br><br>
         Divisiones<br>

      Se tomaron en cuenta diferentes factores, como la cantidad de delitos, su distribución geográfica y el número de vecinos que se pretende incluir en cada red. Esto nos permitió establecer una estructura matemáticamente óptima de divisiones.<br><br>

      Color<br>

      Los polígonos se colorean con respecto a la cantidad de delitos por kilómetro cuadrado y ésta coloración va de azul claro a morado, asignando a cada polígono un nivel de atención diferente. 
      Esto se resume de la siguiente manera: Un color más oscuro representa una zona más peligrosa (estadísticamente hablando).<br>

      Debes tener en cuenta que esta información es sólo una sugerencia de búsqueda, pues habrá lugares en las que se podrá asignar más de un vecino. De manera análoga, el proceso realizado por la computadora podría no elegir a más de un vecino en aquellas zonas sin incidencia delictiva.<br>

      Una observación a considerar ocurre en algunas Coordinaciones específicas; se forman “polígonos largos”. Esto se debe a que se trata de zonas poco habitadas o con una presencia casi nula (o nula) de incidencia delictiva.<br>

      Tampoco debe localizarse forzosamente un contacto dentro de la zonas más conflictivas, la búsqueda puede realizarse en la periferia de las mismas, pues nadie mejor que tú conoce el territorio por lo que eres consciente de los riesgos que representan determinados puntos.



      </label>-->
       
     </div>

     <div cclass="col-sm-6 ">


      <?php $__currentLoopData = $coord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


     <?php if(Auth::user()->name==$cor->ct2): ?>
      <div class=“row”>
         <div class="col-sm-6 ">
           <H4>Mapa Guía para la Red Vecinal 2019.</H1><br>
                                        
             
             <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ').'/'.$cor->ct2.'_REDVEC_2019-07-21.html'); ?>" role="button"> MAPA -RED VECINAL <?php echo e($cor->ct2); ?></a><br><br>
         </div>

         <div class="col-sm-6 ">
             <H4>Mapa Análisis del Crimen 5 de Diciembre 2018 al 04 de Agosto 2019.</H1><br>
             <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ').'/'.$cor->ct2.'_2019-01-012019-08-04.html'); ?>" role="button"> MAPA -ANÁLISIS DEL CRIMEN <?php echo e($cor->ct2); ?></a><br><br>
         </div>

         </div>

       <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       

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



<!--

          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AOB-1_REDVEC_2019-07-21.html')); ?>" role="button">AOB-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AOB-2_REDVEC_2019-07-21.html')); ?>" role="button">AOB-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AOB-3_REDVEC_2019-07-21.html')); ?>" role="button">AOB-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AOB-4_REDVEC_2019-07-21.html')); ?>" role="button">AOB-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AZC-1_REDVEC_2019-07-21.html')); ?>" role="button">AZC-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AZC-2_REDVEC_2019-07-21.html')); ?>" role="button">AZC-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AZC-3_REDVEC_2019-07-21.html')); ?>" role="button">AZC-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/AZC-4_REDVEC_2019-07-21.html')); ?>" role="button">AZC-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/BJU-1_REDVEC_2019-07-21.html')); ?>" role="button">BJU-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/BJU-2_REDVEC_2019-07-21.html')); ?>" role="button">BJU-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/BJU-3_REDVEC_2019-07-21.html')); ?>" role="button">BJU-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/BJU-4_REDVEC_2019-07-21.html')); ?>" role="button">BJU-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/BJU-5_REDVEC_2019-07-21.html')); ?>" role="button">BJU-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/COY-1_REDVEC_2019-07-21.html')); ?>" role="button">COY-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/COY-2_REDVEC_2019-07-21.html')); ?>" role="button">COY-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/COY-3_REDVEC_2019-07-21.html')); ?>" role="button">COY-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/COY-4_REDVEC_2019-07-21.html')); ?>" role="button">COY-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/COY-5_REDVEC_2019-07-21.html')); ?>" role="button">COY-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-1_REDVEC_2019-07-21.html')); ?>" role="button">CUH-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-2_REDVEC_2019-07-21.html')); ?>" role="button">CUH-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-3_REDVEC_2019-07-21.html')); ?>" role="button">CUH-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-4_REDVEC_2019-07-21.html')); ?>" role="button">CUH-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-5_REDVEC_2019-07-21.html')); ?>" role="button">CUH-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-6_REDVEC_2019-07-21.html')); ?>" role="button">CUH-6 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-7_REDVEC_2019-07-21.html')); ?>" role="button">CUH-7 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUH-8_REDVEC_2019-07-21.html')); ?>" role="button">CUH-8 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUJ-1_REDVEC_2019-07-21.html')); ?>" role="button">CUJ-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/CUJ-2_REDVEC_2019-07-21.html')); ?>" role="button">CUJ-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-1_REDVEC_2019-07-21.html')); ?>" role="button">GAM-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-2_REDVEC_2019-07-21.html')); ?>" role="button">GAM-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-3_REDVEC_2019-07-21.html')); ?>" role="button">GAM-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-4_REDVEC_2019-07-21.html')); ?>" role="button">GAM-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-5_REDVEC_2019-07-21.html')); ?>" role="button">GAM-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-6_REDVEC_2019-07-21.html')); ?>" role="button">GAM-6 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-7_REDVEC_2019-07-21.html')); ?>" role="button">GAM-7 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/GAM-8_REDVEC_2019-07-21.html')); ?>" role="button">GAM-8 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZC-1_REDVEC_2019-07-21.html')); ?>" role="button">IZC-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZC-2_REDVEC_2019-07-21.html')); ?>" role="button">IZC-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZC-3_REDVEC_2019-07-21.html')); ?>" role="button">IZC-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-1_REDVEC_2019-07-21.html')); ?>" role="button">IZP-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-2_REDVEC_2019-07-21.html')); ?>" role="button">IZP-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-4_REDVEC_2019-07-21.html')); ?>" role="button">IZP-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-5_REDVEC_2019-07-21.html')); ?>" role="button">IZP-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-6_REDVEC_2019-07-21.html')); ?>" role="button">IZP-6 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-7_REDVEC_2019-07-21.html')); ?>" role="button">IZP-7 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-8_REDVEC_2019-07-21.html')); ?>" role="button">IZP-8 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-9_REDVEC_2019-07-21.html')); ?>" role="button">IZP-9 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/IZP-10_REDVEC_2019-07-21.html')); ?>" role="button">IZP-10 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MAC-1_REDVEC_2019-07-21.html')); ?>" role="button">MAC-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MAC-2_REDVEC_2019-07-21.html')); ?>" role="button">MAC-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIH-1_REDVEC_2019-07-21.html')); ?>" role="button">MIH-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIH-2_REDVEC_2019-07-21.html')); ?>" role="button">MIH-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIH-3_REDVEC_2019-07-21.html')); ?>" role="button">MIH-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIH-4_REDVEC_2019-07-21.html')); ?>" role="button">MIH-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIH-5_REDVEC_2019-07-21.html')); ?>" role="button">MIH-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIL-1_REDVEC_2019-07-21.html')); ?>" role="button">MIL-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/MIL-2_REDVEC_2019-07-21.html')); ?>" role="button">MIL-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/TLH-1_REDVEC_2019-07-21.html')); ?>" role="button">TLH-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/TLH-2_REDVEC_2019-07-21.html')); ?>" role="button">TLH-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/TLP-1_REDVEC_2019-07-21.html')); ?>" role="button">TLP-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/TLP-2_REDVEC_2019-07-21.html')); ?>" role="button">TLP-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/TLP-3_REDVEC_2019-07-21.html')); ?>" role="button">TLP-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/TLP-4_REDVEC_2019-07-21.html')); ?>" role="button">TLP-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/VCA-1_REDVEC_2019-07-21.html')); ?>" role="button">VCA-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/VCA-2_REDVEC_2019-07-21.html')); ?>" role="button">VCA-2 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/VCA-3_REDVEC_2019-07-21.html')); ?>" role="button">VCA-3 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/VCA-4_REDVEC_2019-07-21.html')); ?>" role="button">VCA-4 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/VCA-5_REDVEC_2019-07-21.html')); ?>" role="button">VCA-5 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/XOC-1_REDVEC_2019-07-21.html')); ?>" role="button">XOC-1 RED VECINAL</a><br><br>
          <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/XOC-2_REDVEC_2019-07-21.html')); ?>" role="button">XOC-2 RED VECINAL</a><br><br>



-->
          

<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>