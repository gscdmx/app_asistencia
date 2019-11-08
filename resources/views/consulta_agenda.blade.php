@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>


<style>
thead {color:green;}
tbody {color:blue;}
tfoot {color:red;}

table, th, td {
  border: 1px solid black;
}
</style>





  <section class="forms">
        <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
          <div class="row">
         



<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>CGGSCYPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>ACTIVIDADES SEMANALES</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/getlistadoagenda') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif

<div class="col-sm-4 offset-sm-2">
           
            <a href="{{ url('/getexcel_agenda') }}" class="btn btn-primary">Descargar Agenda</a>
</div>




        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>LISTADO DE MIS ACTIVIDADES SEMANALES</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="tabla_de_agenda">
                  <thead>
                    <tr>
                           

                     <th>Alcaldia:</th>
                     <th>Region:</th>                  
                     <th>Coordinación Territorial/Sector:</th>
                     <th>Cuadrante:</th>
                     <th>Id</th>
                     <th>Fecha de Mi Actividad o Evento:</th>
                     <th>Hora de inicio de la Actividad o Evento:</th>
                     <th>Hora de término de la Actividad o Evento:</th>
                     <th>Duración Estimada</th>
                     <th>Actividad o Evento realizado</th>
                     <th>Cancelación del registro</th>
                     
                     
                             
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($consultas as $consulta)
                    
                    <tr>
                        
                                          
                     <td>{{$consulta->delegacion}}</td>
                     <td>{{$consulta->region}}</td>                 
                     <td>{{$consulta->ct2}} {{$consulta->sector}}</td>
                     <td>{{$consulta->cuadrante}}</td>
                     <td>{{$consulta->id}}</td>
                     <td>{{$consulta->fecha}}</td>
                     <td>{{$consulta->hora_i}}</td>
                     <td>{{$consulta->hora_f}}</td>
                     <td>{{$consulta->duracion}}</td>
                     <td>{{$consulta->nombre_activad}}</td>
                     
                     <td>

                    
                    <button type="button" class="btn btn-primary accion_modal"     data-toggle="modal" data-id="{{$consulta->id}}" data-target="#exampleModal">Cancelar Registro</button>
                    
                     


                     </td>

                    </tr>

                    @endforeach
                   
                  </tbody>
                  
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



                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <form method="POST" action="{{ url('/elimiar_registro_agenda') }}">
                                      {{ csrf_field() }}

                                    <div class="modal-body">
                                      Esta seguro que desea cancelar el registro?

                                      <input type="hidden" name="id_registro" id="id_registro">
                                    </div>
                                      <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      <button type="submit"  class="btn btn-primary">Aceptar</button>
                                     <!--<a  id="urleliminar" href="" class="btn btn-secondary"  >Aceptar</a>-->
                                      </div>
                                    </form>
                                  </div>
                            </div>
                        </div>



@endsection





@section('js')  
 
@endsection





@section('customjs')


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_agenda').DataTable();
} );




  $( ".accion_modal" ).click(function() {
   
      var id = $(this).data('id'); 



     //1 (post)
       $('#id_registro').val(id);


      //2 (get)
      /*
       var url="{{url('/elimiar_registro_agenda2daopcion')}}"+'/'+id
       $("#urleliminar").attr('href', url);
      */


  });

</script>

@endsection