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
      <form class="form-horizontal" method="POST" action="{{ url('/guardar_asistencia_miercoles') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif


                      

<div class="col-sm-4 offset-sm-2">
           
            <a href="{{ url('/getexcelmiercoles') }}" class="btn btn-primary">Descargar Excel</a>
            
            
            
</div>     

        


        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Asistencias Vespertino (Miercoles)</h4>
            </div>
            
            
            
            
            
            
            
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Fecha de Captura</th>
                      <th>Hora de Inicio</th>
                      <th>Hora de Término</th>
                      <th>Coordinación Territorial</th>
                      <th>Se realizó</th>
                      <th>Motivo por el que no se realizo</th>
                      <th>Jefa de Gobierno</th>
                      <th>Ministerio Público</th>
                      <th>Jefe de la Policía</th>
                      <th>Policía Investigación</th>
                      <th>Juez Cívico</th>
                      <th>Médico Legista</th>
                      <th>Inteligencia Social</th>
                      <th>Representante Alcaldia</th>
                      <th>Vecinos</th>
                      <th>Imagen</th>

                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($asistencias as $asistencia)
                    
                    <tr>
                      
                      <td>{{$asistencia->fecha}}</td>
                      <td>{{$asistencia->hora_i}}</td>
                      <td>{{$asistencia->hora_f}}</td>
                      <td>{{$asistencia->ct2}} {{$asistencia->sector}}</td>
                      <td>{{$asistencia->se_realizo}}</td>
                      <td>{{$asistencia->no_motivo}}</td>
                      <td>{{$asistencia->jg}}</td>
                      <td>{{$asistencia->mp}}</td>
                      <td>{{$asistencia->jsp}}</td>
                      <td>{{$asistencia->jspi}}</td>
                      <td>{{$asistencia->jc}}</td>
                      <td>{{$asistencia->ml}}</td>
                      <td>{{$asistencia->ins}}</td>
                      <td>{{$asistencia->representante_alcaldia}}</td>
                      <td>{{$asistencia->vecino}}</td>
                      
                  
                       <td>

                       

                      
                        @if($asistencia->archivo_imagen==null || $asistencia->archivo_imagen=='')

                         SIN IMAGEN


                        @else

                         <!-- <a href="{{url('/uploads/imagenes_alcaldias').'/'.$asistencia->archivo_imagen}}" class="btn btn-primary" role="button">VER IMAGEN</a>

                          <br>-->

                          <button type="button" class="btn btn-primary obtener_imagen" data-toggle="modal"  data-imagen="{{$asistencia->archivo_imagen}}" data-target="#modal_imagen">
                           VER IMAGEN
                          </button>
                        @endif
                      </td>           
                    </tr>
                    @endforeach                  
                   <tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

 </div>
 </div>
  </section>
  <!-- Modal -->
<div class="modal fade" id="modal_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Imagen Gabinete Vespertino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <div style="width: 800px; height: 500px;">
      <img src="" id="imagen_dinamica"  style="width: 480px; height: 500px;"  >
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>

@endsection


@section('js')  
 
@endsection

@section('customjs')


<script    type="text/javascript">
  

  $( ".obtener_imagen" ).click(function() {

    
     var imagen_nombre = $(this).attr('data-imagen');

     var ruta ="{{url('alcaldias')}}"+"/"+imagen_nombre

     $("#imagen_dinamica").attr('src',ruta);


  //alert( ruta);
});


</script>




@endsection


