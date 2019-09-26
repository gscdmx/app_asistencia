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
    <div class="card-header d-flex align-items-center">
      <h4>ASISTENCIA GABINETE MATUTINO DE SEGURIDAD CIUDADANA</h4><br><br> 

      <H1>Preguntas más frecuentes</H1>
         <a class="btn btn-primary" href="{{url('/uploads/GSCYPJ/preguntas.docx')}}" role="button">FAQ</a>


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








       
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Se realizó el Gabinete Matutino?</label>
          <div class="col-sm-10 mb-3">
            <select name="se_realizo_mesa" id="se_realizo_mesa" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             @if ($errors->has('se_realizo_mesa')) <p  style="color: red">{{ $errors->first('se_realizo_mesa') }}</p> @endif 
          </div>
        
        </div>
        
        
        
             <div class="line"></div>
      <div class="form-group row">
        <label class="col-sm-2 form-control-label">Fecha:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" ></input>
           @if ($errors->has('fecha')) <p  style="color: red">{{ $errors->first('fecha') }}</p> @endif 
        </div>


        <label class="col-sm-2 form-control-label">Hora de Inicio:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora1" name="hora1" class="form-control" ></input>
           @if ($errors->has('hora1')) <p  style="color: red">{{ $errors->first('hora1') }}</p> @endif
        </div>

         <label class="col-sm-2 form-control-label">Hora de Término:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora2" name="hora2" class="form-control" ></input>
           @if ($errors->has('hora2')) <p  style="color: red">{{ $errors->first('hora2') }}</p> @endif
        </div>


      </div>
         

     <div  style="display:none;" id="show_descripcion">



      
        
        
        
           
        <div class="line"></div>
        <div class="form-group row">
          
          
          <label class="col-sm-2 form-control-label">Reunión de Alcaldía con Jefa de Gobierno:</label>
          <div class="col-sm-10 mb-3">
          <input  type="checkbox" name="reunionjg"  value="Reunión con JG
"  style="width:5%; height:110%"       class="form-group row" />
          
          
          </div>
        </div>
  <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Describa el Motivo por el cual no se realizó el Gabinete Matutino: </label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="motivo" name="motivo" class="form-control" ></textarea>
          </div>
        </div>




      </div>


<div  style="display:none;" id="show_asistencia">


       <div class="line"></div>


        <div class="form-group row">
         <label class="col-sm-2 form-control-label">¿Asistió la Representante de Jefatura de Gobierno?:</label>
         <div class="col-sm-10 mb-3">
           <!--<select name="account" class="form-control">
             <option value="">Selecciona...</option>
             <option value="titular">Titular</option>
             <option value="suplente">Suplente</option>
           </select>-->

           <input id="checkboxCustom0" type="checkbox" name="jg[]"  value="titular" class="form-control-custom">
           <label for="checkboxCustom0">Titular</label>


           <input id="checkboxCustom00" type="checkbox" name="jg[]" value="suplente" class="form-control-custom">
           <label for="checkboxCustom00">Suplente</label>


           <input id="checkboxCustom000" type="checkbox" name="jg[]" value="No asistió" class="form-control-custom">
           <label for="checkboxCustom000">No asistió</label>


         </div>
       
       </div>


        <div class="line"></div>


         <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió de la Agencia del Ministerio Público?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom1" type="checkbox" name="mp[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom1">Titular</label>


            <input id="checkboxCustom2" type="checkbox" name="mp[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom2">Suplente</label>


            <input id="checkboxCustom21" type="checkbox" name="mp[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom21">No asistió</label>



          </div>
        
        </div>
         <div class="line"></div>

         <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió del Jefe de Sector de la Policía?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom3" type="checkbox" name="jsp[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom3">Titular</label>


            <input id="checkboxCustom4" type="checkbox" name="jsp[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom4">Suplente</label>


            <input id="checkboxCustom41" type="checkbox" name="jsp[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom41">No asistió</label>


          </div>
        
        </div>
         <div class="line"></div>


          <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió de la Policía de Investigación?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom5" type="checkbox" name="jspi[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom5">Titular</label>


            <input id="checkboxCustom6" type="checkbox" name="jspi[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom6">Suplente</label>



            <input id="checkboxCustom61" type="checkbox" name="jspi[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom61">No asistió</label>




          </div>
        
        </div>
         <div class="line"></div>


         <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió del Juzgado Cívico?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom7" type="checkbox" name="jc[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom7">Titular</label>


            <input id="checkboxCustom8" type="checkbox" name="jc[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom8">Suplente</label>


             <input id="checkboxCustom81" type="checkbox" name="jc[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom81">No asistió</label>

          </div>
        
        </div>
         <div class="line"></div>


          <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió del Médico Legista?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom9" type="checkbox" name="ml[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom9">Titular</label>


            <input id="checkboxCustom10" type="checkbox" name="ml[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom10">Suplente</label>


             <input id="checkboxCustom101" type="checkbox" name="ml[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom101">No asistió</label>


          </div>
        
        </div>
        
        
         <div class="line"></div>


          <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió del Representante de Alcaldía?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom0000000" type="checkbox" name="representante_alcaldia[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom0000000">Titular</label>


            <input id="checkboxCustom00000001" type="checkbox" name="representante_alcaldia[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom00000001">Suplente</label>


             <input id="checkboxCustom00000002" type="checkbox" name="representante_alcaldia[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom00000002">No asistió</label>


          </div>
        
        </div>


<div class="line"></div>


          <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Quién asistió de PDI Inteligencia Social?:</label>
          <div class="col-sm-10 mb-3">
            <!--<select name="account" class="form-control">
              <option value="">Selecciona...</option>
              <option value="titular">Titular</option>
              <option value="suplente">Suplente</option>
            </select>-->

            <input id="checkboxCustom0000003" type="checkbox" name="ins[]" value="titular" class="form-control-custom">
            <label for="checkboxCustom0000003">Titular</label>


            <input id="checkboxCustom00000004" type="checkbox" name="ins[]" value="suplente" class="form-control-custom">
            <label for="checkboxCustom00000004">Suplente</label>


             <input id="checkboxCustom00000005" type="checkbox" name="ins[]" value="No asistió" class="form-control-custom">
            <label for="checkboxCustom00000005">No asistió</label>


          </div>
        
        </div>




       





        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Otro Asistente:</label>
          <div class="col-sm-10">
           <div class="table-responsive">  
              <table class="table table-bordered" id="dynamic_field">  
                   <tr>  
                       <td><input type="text" name="otros[]" placeholder="Escribe aqui" class="form-control name_list" /></td>  
                       <td><button type="button" name="add" id="add" class="btn btn-success">Agregar Mas Asistentes</button></td>  
                   </tr>  
               </table>  
               
           </div> 

          </div>
        </div>





    



        
        </div>


       
         

      

        
        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-2">
            <!--<button type="submit" class="btn btn-secondary">Cancel</button>-->
            <button type="submit" class="btn btn-primary">Guardar Asistencia </button>
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



 $('#se_realizo_mesa').change(function(evento){
         valor = $(this).val();



         if (valor=="si") {
          $('#show_asistencia').show();
          $('#show_descripcion').hide();
         }else if(valor=="no"){
           $('#show_descripcion').show();
            $('#show_asistencia').hide();

         }else{

          $('#show_asistencia').hide();
            $('#show_descripcion').hide();

         }

});




  $('#alcaldia').change(function(evento){
          id_alcaldia = $(this).val();

          selected_dependiente('ct',id_alcaldia);

 });




  function selected_dependiente(elemento, id){
      var url = "{{ url('/get_ct_x_alcaldia')}}"+"/"+id;
      var request = $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json'
      });
      request.done(function( msg ) {
      

      $('#'+elemento).empty();     
      $('#'+elemento).append("<option value=''>Seleccione...</option>");

      for (var i=0; i<msg.length; i++) {
       $('#'+elemento).append("<option value='"+msg[i].id+"'>"+msg[i].ct2+" "+msg[i].sector+"</option>");
        }
        });
      request.fail(function( jqXHR, textStatus ) {
       // alert( "Request failed: " + textStatus );

      });

    }

var i=1; 

    $('#add').click(function(){  
              i++;  
              $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="otros[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         });  


         $(document).on('click', '.btn_remove', function(){  
              var button_id = $(this).attr("id");   
              $('#row'+button_id+'').remove();  
         }); 






</script>

@endsection








