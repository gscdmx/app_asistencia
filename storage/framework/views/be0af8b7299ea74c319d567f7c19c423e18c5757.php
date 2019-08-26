<?php $__env->startSection('content'); ?>


  <section class="forms">
        <div class="container-fluid">
          <div class="row">
         
    <style>
    #scroll{
        border:1px solid;
        height:100px;
        width:300px;
        overflow-y:scroll;
        overflow-x:hidden;
    }
    </style>


<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>Coordinación General del Gabinete de Seguridad Ciudadana y Procuración de Justicia CDMX</h4>
    </div>
    <div class="card-body">
        
        
     <div class=“row”>

   
 
 
</div>


 
        <H1>Mis Vínculos</H1>


<text>
<label>En esta sección encontrarás:<br>
Las páginas que necesitas para realizar tus diferentes tareas.<br><br>  
</label>
</text><br><br> 

      



       

<li><a href="https://www.gabinetedeseguridad.cdmx.gob.mx/"><i class="icon-list"></i>       Gabinete de Seguridad Ciudadana CDMX </a></li> <br>
<li><a href="https://correo.cdmx.gob.mx/"><i class="icon-list"></i>       Mi correo institucional ZIMBRA CDMX</a></li> <br>
<li><a href="https://analisisseguridad.cdmx.gob.mx/tablero/"><i class="icon-list"></i>      Tablero: Reporte de Incidencia CDMX</a></li> <br>
<li><a href="https://top5.cdmx.gob.mx/backend/backend/auth/signin"><i class="icon-list"></i>      Tablero: TOP-5 CDMX</a></li> <br>
<li><a href="http://www.infodf.org.mx/ava/acceso/"><i class="icon-list"></i>       AVA: Cursos de Transparencia CDMX</a></li> <br>
<li><a href="https://www.i4ch-capitalhumano.cdmx.gob.mx/"><i class="icon-list"></i>        Consulta tu recibo de nómina CDMX</a></li> <br>
<li><a href="https://declaraciones.cdmx.gob.mx/inicio.aspx"><i class="icon-list"></i>        Declaración Patrimonial CDMX</a></li> <br>
<li><a href="https://oficinavirtual.issste.gob.mx/"><i class="icon-list"></i>        Oficina Virtual ISSSTE CDMX</a></li> <br>
<li><a href="https://www.atencionciudadana.cdmx.gob.mx/"><i class="icon-list"></i>        Sistema Unificado de Atención Ciudadana CDMX</a></li> <br>

           








            <!-- <a href="<?php echo e(URL::to('/')); ?>"><img src=<?php echo e(asset('images/logo.png')); ?> alt="Logo"></a>-->
       <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->

         



          <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->
       <!-- <button type="submit"  img src="recursos/img/gscypj.png" >Gabinete de Seguridad Ciudadana CDMX</button>-->






        
  

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


<script>

     $.ajax({
                type: "GET",
                //url: "<?php echo e(url('/get_mapa')); ?>",
                dataType: "html",
                success: function(result) {
                
               // console.log(result);
               
                
                
               // $('#file_mapa').html(result);
                   
                },
                error: function(result) {
                    alert("Data not found");
                }
            });
    
  
  
  
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>