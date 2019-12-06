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
      <!--<h4>RED DE CONTACTO CIUDADANO CDMX</h4>-->
      <h4>POR EL MOMENTO NO ESTAN DISPONIBLES, PUEDES SEGUIR CAPTURANDO</h4>
    </div>
    <div class="card-body">
       <form class="form-horizontal" method="POST" action="{{ url('/getlistadopreguntas') }}">

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
              <h4>LISTADO DE RED PARA CONTACTO CIUDADANO</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-striped" id="tabla_de_red_ciudadana">
                  <thead>
                    <tr>
                           

                     <th>Alcaldia:</th>
                     <th>Region:</th>                  
                     <th>Coordinación Territorial/Sector:</th>
                     <th>Cuadrante:</th>
                     <th>Id</th>
                     <th>Nombre de RJG:</th>
                     <th>Fecha de alta:</th>
                     <th>Hora de inicio de entrevista:</th>
                     <th>Hora de término de entrevista:</th>
                     <th>Calle:</th>
                     <th>Número:</th>
                     <th>Colonia:</th>
                     <th>¿Alguna vez ha solicitado el servicio de la policía?:</th>
                     <th>¿Acudio el policía?:</th>
                     <th>¿Conoce a su jefe de cuadrante?:</th>
                     <th>¿Conoce la APP Mi Policía?:</th>
                     <th>¿Al llamar al jefe de cuadrante en tiempo real, respondió?:</th>
                     <th>¿Acudió jefe de cuadrante?:</th>
                     <th>¿En cuánto tiempo acudió?:</th>
                     <th>Nombre del vecino entrevistado:</th>
                     <th>Télefono del vecino entrevistado:</th>
                     <th>¿El vecino acepto ser parte de la red vecinal?:</th>
                     
                                        
                        
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
                     <td>{{$consulta->nombre_rjg}}</td>
                     <td>{{$consulta->fecha}}</td>
                     <td>{{$consulta->hora_i}}</td>
                     <td>{{$consulta->hora_f}}</td>
                     <td>{{$consulta->calle}}</td>
                     <td>{{$consulta->numero}}</td>
                     <td>{{$consulta->colonia}}</td>
                     <td>{{$consulta->servicio_policia}}</td>
                     <td>{{$consulta->acudio}}</td>
                     <td>{{$consulta->conoce_jc}}</td>
                     <td>{{$consulta->conoce_app}}</td>
                     <td>{{$consulta->llamarjefe_respondio}}</td>
                     <td>{{$consulta->acudio_jefe}}</td>
                     <td>{{$consulta->tiempo_acudio}}</td>
                     <td>{{$consulta->nombre}}</td>
                     <td>{{$consulta->telefono}}</td>
                     <td>{{$consulta->firma}}</td> 

          
       

                      

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
    $('#tabla_de_red_ciudadana').DataTable();
} );

</script>



@endsection











