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
      <h4>CGGSCyPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>SENDERO SEGURO EN CDMX</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/getlistadosendero') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif

                     

<div class="col-sm-4 offset-sm-2">
           
            <a href="{{ url('/getexcel_sendero') }}" class="btn btn-primary">Descargar Sendero Seguro CDMX</a>
        
            
</div>     

        


        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Senderos Seguros en CDMX</h4>
            </div>
                    
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="tabla_de_senderos">
                  <thead>
                    <tr>
                      <th>Fecha Real de captura del Registro</th>
                      <th>ID</th>
                      <th>Fecha de la Reunión</th>
                      <th>Hora de Inicio</th>
                      <th>Hora de Término</th>
                      <th>Coordinación Territorial</th>
                      <th>Se realizó Sendero Seguro</th>
                      <th>Motivo por el que no se realizo</th>
                      <th>Jefa de Gobierno</th>
                      <th>Ministerio Público</th>
                      <th>Jefe de la Policía</th>
                      <th>Policía Investigación</th>
                      <th>Juez Cívico</th>
                      <th>Médico Legista</th>
                      <th>Inteligencia Social</th>
                      <th>Representante Alcaldia</th>
                      <th>Escuelas Participantes</th>
                      <th>Imagen del Gabinete Sendero Seguro</th>
                      

                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($senderos as $sendero)
                    
                    <tr>
                      <td>{{$consulta->created_at}}</td>  
                      <td>{{$sendero->id}}</td>
                      <td>{{$sendero->fecha}}</td>
                      <td>{{$sendero->hora_i}}</td>
                      <td>{{$sendero->hora_f}}</td>
                      <td>{{$sendero->ct2}} {{$sendero->sector}}</td>
                      <td>{{$sendero->se_realizo}}</td>
                      <td>{{$sendero->no_motivo}}</td>
                      <td>{{$sendero->jg}}</td>
                      <td>{{$sendero->mp}}</td>
                      <td>{{$sendero->jsp}}</td>
                      <td>{{$sendero->jspi}}</td>
                      <td>{{$sendero->jc}}</td>
                      <td>{{$sendero->ml}}</td>
                      <td>{{$sendero->ins}}</td>
                      <td>{{$sendero->representante_alcaldia}}</td>
                      <td>{{$sendero->otro}}</td>
                     
                      
                  
                       <td>

                       

                      
                        @if($sendero->archivo_imagen==null || $sendero->archivo_imagen=='')

                         SIN IMAGEN


                        @else

                         <!-- <a href="{{url('/uploads/imagenes_alcaldias').'/'.$sendero->archivo_imagen}}" class="btn btn-primary" role="button">VER IMAGEN</a>

                          <br>-->

                          <button type="button" class="btn btn-primary obtener_imagen" data-toggle="modal"  data-imagen="{{$sendero->archivo_imagen}}" data-target="#modal_imagen">
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
        <h5 class="modal-title" id="exampleModalLabel">Foto: Sendero Seguro CDMX</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <div style="width: 500px; height: 400px;">
      <img src="" id="imagen_dinamica"  style="width: 480px; height: 380px;"  >
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


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_senderos').DataTable();
} );

</script>




@endsection


