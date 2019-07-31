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
      <h4>CGGSCYPJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>MIS VISTAS DOMICILIARIAS</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/save_cuestionario_preguntas') }}">

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
              <h4>LISTADO DE RED DE CONTACTO CIUDADANO</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     
                          <th>ID</th>
                          <th>ALCALDIA</th>
                          <th>CUADRANTE</th>
                          <th>REGION</th>
                          <th>NOMBRE DE RJG</th>
                          <th>FECHA CAPTURA</th>
                          <th>HORA DE INICIO</th>
                          <th>HORA DE TERMINO</th>                
                          <th>CALLE </th>
                          <th>NÚMERO</th>
                          <th>COLONIA</th>
                          <th>¿ALGUNA VEZ HA SOLICITADO EL SERVICIO DE LA POLICÍA? </th>
                          <th>¿ACUDIO? </th>
                          <th>¿CONOCE A SU JEFE DE CUADRANTE? </th>
                          <th>¿CONOCE LA APP MI POLICÍA? </th>
                          <th>¿AL LLAMAR AL JEFE DE CUADRANTE EN TIEMPO REAL, ¿RESPONDIÓ?  </th>
                          <th>¿ACUDIO JEFE DE CUADRANTE?</th>
                          <th>¿EN CUÁNTO TIEMPO ACUDIÓ?</th>
                          <th> NOMBRE</th>
                          <th>NÚMERO DE TELEFONO</th>
                          <th>VECINO ACEPTO SER PARTE DE RED VECINAL?</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($consultas as $consulta)
                    
                    <tr>
                        
                                          
            <td>{{$consulta->id}}</td>
            <td>{{$consulta->id_user}}</td>
            <td>{{$consulta->id_cuadrante}}</td>
            <td>{{$consulta->region}}</td>
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




@endsection











