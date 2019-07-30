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
      <h4>CGGSCYPJ CDMX MI FORMATO DE VISITAS</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>MI FORMATO DE VISITAS</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/guardar_cuestionario_Preguntas') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif



<!--<div class="col-sm-4 offset-sm-2">
           
            <a href="{{ url('/getexcel') }}" class="btn btn-primary">Descargar Excel Formato de Visitas</a>
</div>-->
        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Vistas</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>         
                          <th>ALCALDIA</th>
                          <th>REGION</th>
                         <!-- <th>SECTOR</th>-->
                          <th>COORDINACIÓN TERRITORIAL</th>
                          <th>CUADRANTE</th>
                          <th>ID</th>
                          <th>NOMBRE DE RJG</th>
                          <th>FECHA DE ALTA</th>
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
                    @foreach($pregunts as $pregunta)
                    
                    <tr>
                        
                                          <td>{{$pregunta->id_user}}</td>
                                          <td>{{$pregunta->region}</td>
                                          <td>{{$pregunta->ct2}} {{$pregunta->sector}}</td>
                                          <td>{{$pregunta->id_cuadrante}}</td>
                                          <td>{{$pregunta->id}}</td>
                                          <td>{{$pregunta->nombre_rjg}}</td>
                                          <td>{{$pregunta->fecha}}</td>
                                          <td>{{$pregunta->hora_i}}</td>
                                          <td>{{$pregunta->hora_f}}</td>
                                          <td>{{$pregunta->calle}}</td>
                                          <td>{{$pregunta->numero}}</td>
                                          <td>{{$pregunta->colonia}}</td>
                                          <td>{{$pregunta->servicio_policia}}</td>
                                          <td>{{$pregunta->acudio}}</td>
                                          <td>{{$pregunta->conoce_jc}}</td>
                                          <td>{{$pregunta->conoce_app}}</td>
                                          <td>{{$pregunta->llamarjefe_respondio}}</td>
                                          <td>{{$pregunta->acudio_jefe}}</td>
                                          <td>{{$pregunta->tiempo_acudio}}</td>
                                          <td>{{$pregunta->nombre}}</td>
                                          <td>{{$pregunta->telefono}}</td>
                                          <td>{{$pregunta->firma}}</td>
                                                   

                 
                     
                      
                      

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








