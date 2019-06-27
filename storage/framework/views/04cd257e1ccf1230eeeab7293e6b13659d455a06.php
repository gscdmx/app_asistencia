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

   <div class="col-sm-12"  id="file_mapa" style="height: 500px">
                              
                              <br>
                              
                              
                                        <?php echo $__env->make('mapas_externos.Mapa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                           
                          </div>
 
 
 
</div>

 <div class=“row”>
    <div class="col-sm-6 ">
        <H1>Robo a Conductor Pasajero con Violencia</H1>
         <a class="btn btn-primary" href="<?php echo e(url('/uploads/GSCYPJ/Mapa%20Robo%20a%20Conductor%20Metodología.pdf')); ?>" role="button">Metodología</a>
                            
                            <br>
                            
                            <!--aqui ya metes lo que tengas que guardar o mostrar -->
                            
                            
                            <text>



<label>En este mapa encontrarás:<br><br>

	"Una capa con las Coordinaciones Territoriales, que muestran los delitos:<br>
    "Robo a conductor/pasajero de vehículo con violencia"<br>
    "Robo de vehículo con violencia"<br><br>

   Un análisis del entorno: <br>
   En el que se muestran los delitos de alto impacto que más se cometen en los alrededores, en una ventana emergente a la que se puede acceder tocando los círculos rojos (que contienen una mayor cantidad de eventos).
</label>

                            </text>



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