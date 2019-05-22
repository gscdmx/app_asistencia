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
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/guardar_admin_pdf') }}">

      {{ csrf_field() }}




      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif
      
         <div class="form-group row">
          <label class="col-sm-2 form-control-label">Enviar PDF a:</label>
          <div class="col-sm-10 mb-3">
            <select name="elegir_user" id="elegir_user" class="form-control">
              <option value="">Selecciona...</option>
              <option value="1">Alcaldia</option>
              <option value="2">Usuario</option>
            </select>
            
             @if ($errors->has('elegir_user')) <p  style="color: red">{{ $errors->first('elegir_user') }}</p> @endif 
          </div>
        
        </div>
      
      
      <div  style="display:none;" id="show_alc">
          
       <div class="form-group row">
          <label class="col-sm-2 form-control-label">Selecciona la Alcaldía para quien va el PDF:</label>
          <div class="col-sm-10 mb-3">
            <select id="alcaldia" name="alcaldia" class="form-control">

              <option value="">Selecciona...</option>
              @foreach($alcaldias as $alcaldia)
               <option value="{{$alcaldia->id}}">{{$alcaldia->delegacion}}</option>

              @endforeach
              
            </select>

             @if ($errors->has('alcaldia')) <p  style="color: red">{{ $errors->first('alcaldia') }}</p> 
             @endif
           

          </div>
        
        </div>
         </div>

        <div  style="display:none;" id="show_user">
         <div class="form-group row">
          <label class="col-sm-2 form-control-label">Selecciona Usuario para quien va el PDF:</label>
          <div class="col-sm-10 mb-3">
            <select id="user" name="user" class="form-control"> 
            
            <option value="">Selecciona...</option>
              @foreach($users as $user)
               <option value="{{$user->id}}">{{$user->email}}</option>

              @endforeach
              
              
            </select>
            
            

             @if ($errors->has('user')) <p  style="color: red">{{ $errors->first('user') }}</p> @endif 


          </div>
        
        </div>
         </div>



       
      
        
        
       
         

     



        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Descripción del Archivo:</label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="descripcion" name="descripcion" class="form-control" ></textarea>
          </div>
        </div>

   





        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">subir archivo</label>
          <div class="col-sm-10">
        <input type="file" id="archivo" name="archivo" accept="application/pdf"> 
        <!--este es el mensaje de validacion-->
            @if ($errors->has('archivo')) <p  style="color: red">{{ $errors->first('archivo') }}</p> @endif

          </div>
        </div>





    



        
        </div>


       <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-2">
            <!--<button type="submit" class="btn btn-secondary">Cancel</button>-->
            <button type="submit" class="btn btn-primary">Enviar</button>
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


<script type="text/javascript">


 $('#elegir_user').change(function(evento){
         valor = $(this).val();
         

         if (valor =='1') {
         
          $('#show_alc').show();
           $('#show_user').hide();
         }else if(valor=='2'){
          $('#show_user').show();
           $('#show_alc').hide();

         }else{

            $('#show_alc').hide();
            $('#show_user').hide();

         }

});

</script>

@endsection

