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
      <h4>MI PASE DE LISTA</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/getlistadolista') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif






        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>LISTADO </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="tabla_de_pasedelista_ssc">
                  <thead>
                    <tr>
                           

                     <th>Alcaldia:</th>
                     <th>Region:</th>                  
                     <th>Coordinación Territorial/Sector:</th>
                     <th>Id:</th>
                     <th>Turno:</th>
                     <th>Fecha del Hecho:</th>
                     <th>Hora de Inicio de la Formación:</th>
                     <th>Hora de Término de la Formación:</th>
                     <th>Dirección de la Formación:</th>
                     <th>Número de Elementos en formación:</th>
                     <th>Número de Patrullas en la formación:</th>
                     <th>¿Estuvo presente el Jefe de sector en la formación?:</th>
                     <th>Total de Jefes de Cuadrantes en la formación:</th>
                     <th>Imagen:</th>
                     
                     
                                        
                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($consultas as $consulta)
                    
                    <tr>
                        
                                          
                     <td>{{$consulta->delegacion}}</td>
                     <td>{{$consulta->region}}</td>                 
                     <td>{{$consulta->ct2}} {{$consulta->sector}}</td>
                     <td>{{$consulta->id}}</td>
                     <td>{{$consulta->turno}}</td>
                     <td>{{$consulta->fecha}}</td>
                     <td>{{$consulta->hora_i}}</td>
                     <td>{{$consulta->hora_f}}</td>
                     <td>{{$consulta->direccion}}</td>
                     <td>{{$consulta->num_elementos}}</td>
                     <td>{{$consulta->num_patrullas}}</td>
                     <td>{{$consulta->jefe_sector}}</td>
                     <td>{{$consulta->jefe_cuadrante}}</td>
                     

                     <td>

                       

                      
                        @if($consulta->archivo_imagen==null || $consulta->archivo_imagen=='')

                         SIN IMAGEN


                        @else

                      

                          <button type="button" class="btn btn-primary obtener_imagen" data-toggle="modal"  data-imagen="{{$consulta->archivo_imagen}}" data-target="#modal_imagen">
                           VER IMAGEN
                          </button>
                        @endif
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


<div class="modal fade" id="modal_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto: Pase de Lista SSC-CDMX</h5>
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

     var ruta ="{{url('uploads')}}"+"/"+imagen_nombre

     $("#imagen_dinamica").attr('src',ruta);


  //alert( ruta);
});


</script>




<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_pasedelista_ssc').DataTable();
} );

</script>



@endsection











