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
<div>
    
      
       
        
        
        <div class="line"></div>
      <div class="form-group row">
          
          
          
         <label class="col-sm-1 form-control-label">Alcaldía:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <select id="alcaldia" name="alcaldia" class="form-control">
              <option value="">Selecciona...</option>
              <?php $__currentLoopData = $alcaldias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alcaldia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($alcaldia->delegacion); ?>"><?php echo e($alcaldia->delegacion); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
           <?php if($errors->has('alcaldia')): ?> <p  style="color: red"><?php echo e($errors->first('alcaldia')); ?></p> <?php endif; ?> 
        </div>
        
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


  
        <div class="col-sm-1">
          <!--<input type="text" class="form-control">-->
        <button id="consultar" class="btn btn-primary">Consultar Gráfica</button>
        </div>
        
</div>
      


 
<div id="container" style="min-width: 810px; height: 400px; margin: 0 auto"></div>
       

         

    </div>
  </div>
</div>




 </div>
          </div>
  </section>





<?php $__env->stopSection(); ?>





<?php $__env->startSection('js'); ?>  


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>




 
<?php $__env->stopSection(); ?>





<?php $__env->startSection('customjs'); ?>


<script>

var fecha1='2019-01-01';
var fecha2='2019-01-01';
var alc;



$( "#consultar" ).click(function() {

   fecha1=$("#fecha" ).val();
   fecha2=$("#fecha2" ).val();
   alc=$("#alcaldia" ).val();
   ajax_datos_grafica(fecha1,fecha2,alc);
});



           ajax_datos_grafica(fecha1,fecha2,alc);

           function ajax_datos_grafica(fecha1,fecha2,alc){


                     var url = "<?php echo e(url('/datosgraficasalc_miercoles')); ?>"+'/'+fecha1+'/'+fecha2+'/'+alc;
                     var request = $.ajax({
                       url: url,
                       method: 'GET',
                       dataType: 'json'
                     });
                     request.done(function( msg ) {
                     
                     console.log(msg);
                     
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Estadística de Asistencia Miercoles'
    },
    subtitle: {
        text: 'CGSCPJ'
    },
    xAxis: {
        categories: msg[1],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Días'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
    series: [{
        name: 'Jefa de Gobierno',
        data: msg[0][0]

    }, {
        name: 'Ministerio Público',
        data: msg[0][1]

    }, {
        name: 'Jefe de la Policía',
        data: msg[0][2]

    },
    {
        name: 'Policía de Investigación',
        data: msg[0][3]

    },
    {
        name: 'Juzgado Cívico',
        data: msg[0][4]

    },
     {
        name: 'Médico Legista',
        data: msg[0][5]

    },
    {
        name: 'Representante de Alcaldía',
        data: msg[0][6]

    },  
    {   
        name: 'Inteligencia Social',
        data: msg[0][7]
    }    
    
    
    
    
    ]
});


                     
                       });
                     request.fail(function( jqXHR, textStatus ) {
                      // alert( "Error: " + textStatus );
                      // $('#'+elemento).empty();

                     });


            }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>