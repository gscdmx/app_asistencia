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
      <h4>Visitas en CGGSCyPJ</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/getlistadovisitas_coordinador') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif

<div class="col-sm-4 offset-sm-2">
           
            <a href="{{ url('/getexcel_visitas_coordinador') }}" class="btn btn-primary">Descargar Visitas CGGSCyPJ</a>
</div>




        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>LISTADO DE VISITAS EN CGGSCyPJ</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="tabla_de_visitas_coordinador">
                  <thead>
                    <tr>
                     
                     <th>Id</th>
                     <th>Fecha de la Visita:</th>
                     <th>Hora:</th>
                     <th>Nombre:</th>
                     <th>Procedencia:</th>
                     <th>Asunto:</th>
                     <th>Teléfono:</th>
                     <th>Dirección:</th>
                     <th>Correo/Electrónico:</th>                
                             
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($visitas as $visita)
                    
                    <tr>
                        
                                          
                     
                     <td>{{$visita->id}}</td>
                     <td>{{$visita->fecha}}</td>
                     <td>{{$visita->hora_i}}</td>
                     <td>{{$visita->nombre}}</td>
                     <td>{{$visita->procedencia}}</td>
                     <td>{{$visita->asunto}}</td>
                     <td>{{$visita->telefono}}</td>
                     <td>{{$visita->direccion}}</td>
                     <td>{{$visita->correo}}</td>
                     
                     

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



                        



@endsection





@section('js')  
 
@endsection





@section('customjs')


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_visitas_coordinador').DataTable();
} );

</script>

@endsection