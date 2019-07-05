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
    <div class="card-body">
     
      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif
      
      
      
      
       <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>CGGSCYPJ  Listado de Incidencias Delictivas PDF'S</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Archivo</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pdfs as $pdf)
                    
                    <tr>
                      
                      <td>{{$pdf->descripcion}}</td>
                      <td><a href="{{url('/uploads').'/'.$pdf->archivo_pdf}}" class="btn btn-primary" download>Descargar</a></td>
                      <td><a href="{{url('/uploads').'/'.$pdf->archivo_pdf}}" class="btn btn-primary"  role="button">Ver</a></td>
                      

                    </tr>

                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


       






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

