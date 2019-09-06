@extends('template.header')

@section('content')


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






        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>LISTADO DE MIS ACTIVIDADES SEMANALES</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
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




@endsection











