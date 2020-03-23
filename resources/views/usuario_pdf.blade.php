@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>

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
              <h4>Listado de Incidencias Delictivas </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-striped" id="tabla_de_incidenciadelictiva_pdfs">
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
                      <td><a href="{{url('/uploads').'/'.$pdf->archivo_pdf}}" class="btn btn-primary" role="button">Descargar</a></td>
                    
                      

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


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#tabla_de_incidenciadelictiva_pdfs').DataTable();
} );

</script>




@endsection

