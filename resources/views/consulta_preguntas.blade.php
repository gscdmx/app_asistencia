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
      <form class="form-horizontal" method="POST" action="{{ url('/guardar_asistencia') }}">

      {{ csrf_field() }}


      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif



<div class="col-sm-4 offset-sm-2">
           
            <a href="{{ url('/getexcel') }}" class="btn btn-primary">Descargar Excel</a>
</div>



        <div class="col-lg-20">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Asistencias</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Fecha de Captura</th>
                      <th>Hora de Inicio</th>
                      <th>Hora de Término</th>
                      <th>Coordinación</th>
                      <th>Se realizó Gabinte</th>
                      <th>Motivo por el que no se realizo</th>
                      <th>Jefa de Gobierno</th>
                      <th>Ministerio Público</th>
                      <th>Jefe de la Policía</th>
                      <th>Policía Investigación</th>
                      <th>Juez Cívico</th>
                      <th>Médico Legista</th>
                      <th>PDI Inteligencia Social</th>
                      <th>Representante de Alcaldia</th>
                      <th>Reunion con JG</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($asistencias as $asistencia)
                    
                    <tr>
                        
                                          <td>{{$asistencia->id}}</td>
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
                                          <td>{{$asistencia->reunionjg}}</td>
     
                     
                      
                      

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








