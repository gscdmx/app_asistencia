@extends('template.header')

@section('content')



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
              @foreach($alcaldias as $alcaldia)
               <option value="{{$alcaldia->delegacion}}">{{$alcaldia->delegacion}}</option>
              @endforeach
            </select>
            
           @if ($errors->has('alcaldia')) <p  style="color: red">{{ $errors->first('alcaldia') }}</p> @endif 
        </div>
        
        <label class="col-sm-1 form-control-label">Fecha 1:</label>
        <div class="col-sm-3">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" ></input>
           @if ($errors->has('fecha')) <p  style="color: red">{{ $errors->first('fecha') }}</p> @endif 
        </div>


          <label class="col-sm-1 form-control-label">Fecha 2:</label>
        <div class="col-sm-3">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha2" name="fecha2" class="form-control" ></input>
           @if ($errors->has('fecha2 ')) <p  style="color: red">{{ $errors->first('fecha2 ') }}</p> @endif 
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





@endsection





@section('js')  


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>




 
@endsection





@section('customjs')


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


                     var url = "{{ url('/query')}}"+'/'+fecha1+'/'+fecha2+'/'+alc;
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
        text: 'Estadística de Asistencia Miercoles para Vecinos'
    },
    subtitle: {
        text: 'CGSCPJ'
    },
    xAxis: {
       
        categories: msg[0],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Número'
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
 
        
        name: 'Vecino',
        data: msg[1]
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

@endsection