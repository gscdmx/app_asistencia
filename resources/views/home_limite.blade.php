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
      <h4>CGGSCyPJ CDMX</h4>
       <H1>Preguntas más frecuentes (AYUDAS)</H1>
         <a class="btn btn-primary" href="{{url('/uploads/GSCYPJ/preguntas.docx')}}" role="button">F A Q</a><br><br>

    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="">

      {{ csrf_field() }}


              


                   <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       ¡SE REGISTRO LA ASISTENCIA DEL DÍA DE HOY!
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