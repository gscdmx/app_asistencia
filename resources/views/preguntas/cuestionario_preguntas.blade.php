@extends('template.header')

@section('content')

<!--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

<style>
      #map {
        height: 100%;
       /* z-index: -1000;*/
      }
</style>-->
  <section class="forms">
        <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
          <div class="row"> 
<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>CGGSCyPJ CDMX </h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>FORMATO DE RED DE CONTACTO CIUDADANO</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/guardar_cuestionario_Preguntas') }}">




          <div id="map"></div>
         




      {{ csrf_field() }}

      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif



 
      <!--<div class="form-group row">
        <div class="col-sm-6 offset-sm-6">
          <button type="button" id="ubicarme" class="btn btn-primary"> UBICARME </button>
        </div>
      </div>-->





         <div class="line"></div>
      <div class="form-group row">
        <label class="col-sm-2 form-control-label">Fecha:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" required></input>
           @if ($errors->has('fecha')) <p  style="color: red">{{ $errors->first('fecha') }}</p> @endif 
        </div>

        <label class="col-sm-2 form-control-label">Hora de Inicio de Entrevista:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_i" name="hora_i" class="form-control" required></input>
           @if ($errors->has('hora_i')) <p  style="color: red">{{ $errors->first('hora_i') }}</p> @endif
        </div>

         <label class="col-sm-2 form-control-label">Hora de Término de Entrevista:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_f" name="hora_f" class="form-control" required></input>
           @if ($errors->has('hora_f')) <p  style="color: red">{{ $errors->first('hora_f') }}</p> @endif
        </div>


      </div>

 <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">1.- Nombre del Ciudadano Entrevistado:</label>
          <div class="col-sm-9 mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre del vecino"required></input>
            
               @if ($errors->has('nombre')) <p  style="color: red">{{ $errors->first('nombre') }}</p> @endif 
                  </div>
        
             </div>



 <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">2.- Télefono:</label>
          <div class="col-sm-9 mb-3">
            <input type="text" class="form-control" id="telefono" name="telefono"  placeholder="telefono" required></input>
            
               @if ($errors->has('telefono')) <p  style="color: red">{{ $errors->first('telefono') }}</p> @endif 
                  </div>
        
             </div>


 <div class="line"></div>
       <div class="form-group row">
          <label class="col-sm-3 form-control-label">3.- Calle:</label>
          <div class="col-sm-9 mb-3">
           <input type="text" class="form-control" id="calle" name="calle" placeholder="calle"    required></input>
            
               @if ($errors->has('calle')) <p  style="color: red">{{ $errors->first('calle') }}</p> @endif 
                  </div>
        
             </div>

          
         <div class="line"></div>
          <div class="form-group row">
          <label class="col-sm-3 form-control-label">4.- Número:</label>
          <div class="col-sm-9 mb-3">
            <input type="text" class="form-control" id="numero" name="numero"    placeholder="número"      required></input>
            
               @if ($errors->has('numero')) <p  style="color: red">{{ $errors->first('numero') }}</p> @endif 
                  </div>
        
             </div>

           
            <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">5.- Colonia o Barrio:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="colonia" name="colonia"   placeholder="colonia"   required></input>
            
               @if ($errors->has('colonia')) <p  style="color: red">{{ $errors->first('colonia') }}</p> @endif 
                  </div>
        
             </div>



     <div class="form-group row">
        <label class="col-sm-3 form-control-label">6.- Cuadrante: </label>
        <div class="col-sm-9 mb-3">
          <select name="id_cuadrante" id="id_cuadrante" class="form-control" required>
            <option value="">Selecciona...</option>
            @foreach($mis_cuadrantes as $mi_cuadrante)
            <option value="{{$mi_cuadrante->id}}">{{$mi_cuadrante->cuadrante}}</option>
            @endforeach
          
          </select>
          
           @if ($errors->has('id_cuadrante')) <p  style="color: red">{{ $errors->first('id_cuadrante') }}</p> @endif 
        </div>
      
      </div> 


     
      

        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">7.- Nombre Representante de Jefatura de Gobierno:</label>
          <div class="col-sm-9 mb-3">
           <input type="text" class="form-control" id="nombre_rjg" name="nombre_rjg" placeholder="Nombre RJG"    required></input>
            
               @if ($errors->has('nombre_rjg')) <p  style="color: red">{{ $errors->first('nombre_rjg') }}</p> @endif 
                  </div>
        
             </div>
  
       
     

    
          <div class="line"></div>
           <div class="form-group row">
             <label class="col-sm-3 form-control-label">8.- ¿Alguna vez ha solicitado el apoyo de la policía?:</label>
             <div class="col-sm-9 mb-3">
              <select name="servicio_policia" id="servicio_policia" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             @if ($errors->has('servicio_policia')) <p  style="color: red">{{ $errors->first('servicio_policia') }}</p> @endif 
          </div>
        
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">9.- ¿Acudió?:</label>
          <div class="col-sm-9 mb-3">

             <select name="acudio" id="acudio" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
              <option value="no">NO APLICA</option>
            </select>
            <!--<textarea class="form-control" id="acudio" name="acudio"></textarea>-->
            
             @if ($errors->has('acudio')) <p  style="color: red">{{ $errors->first('acudio') }}</p> @endif 
          </div>
        
        </div>



        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">10.- ¿Conoce a su Jefe de Cuadrante?:</label>
          <div class="col-sm-9 mb-3">
            <select name="conoce_jc" id="conoce_jc" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             @if ($errors->has('conoce_jc')) <p  style="color: red">{{ $errors->first('conoce_jc') }}</p> @endif 
          </div>
        
        </div>


        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">11.- ¿Conoce la App mi Policía?:</label>
          <div class="col-sm-9 mb-3">
            <select name="conoce_app" id="conoce_app" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             @if ($errors->has('conoce_app')) <p  style="color: red">{{ $errors->first('conoce_app') }}</p> @endif 
          </div>
        
        </div>
                
           
        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">12.- Al llamar al Jefe de Cuadrante en tiempo real, ¿respondió?:</label>
          <div class="col-sm-9 mb-3">
            <select name="llamarjefe_respondio" id="llamarjefe_respondio" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
              <option value="no">NO SE LLAMÓ</option>
              
            </select>
            
             @if ($errors->has('llamarjefe_respondio')) <p  style="color: red">{{ $errors->first('llamarjefe_respondio') }}</p> @endif 
          </div>
        
        </div>


        <div class="line"></div>
          <div class="form-group row">
          <label class="col-sm-3 form-control-label">13.- ¿Acudio Jefe de Cuadrante?:</label>
          <div class="col-sm-9 mb-3">
            <select name="acudio_jefe" id="acudio_jefe" class="form-control" required>
               <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
              <option value="no">NO APLICA</option>
              
            </select>
            
             @if ($errors->has('acudio_jefe')) <p  style="color: red">{{ $errors->first('acudio_jefe') }}</p> @endif 
          </div>
        
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-3 form-control-label">14.- ¿En cuánto tiempo acudió(minutos)?:</label>
          <div class="col-sm-9 mb-3">
             <input type="number" class="form-control" id="tiempo_acudio" name="tiempo_acudio" placeholder="minutos" required></input>
            
             @if ($errors->has('tiempo_acudio')) <p  style="color: red">{{ $errors->first('tiempo_acudio') }}</p> @endif 
          </div>
        
        </div>
       
       
     
        
        <!-- <div class="form-group row">
          <label class="col-sm-3 form-control-label">14 - Si su respuesta en la pregunta 3 fue un "delito", responde lo siguiente, ¿Realizó su denuncia?</label>
          <div class="col-sm-9 mb-3">
            <select name="realizo_denuncia" id="realizo_denuncia" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             @if ($errors->has('realizo_denuncia')) <p  style="color: red">{{ $errors->first('realizo_denuncia') }}</p> @endif 
          </div>
        
        </div>
        
        <div  style="display:none;" id="show_delito">
        
        <div class="form-group row">
          <label class="col-sm-3 form-control-label" id="texto_delito"></label>
          <div class="col-sm-9 mb-3">
            <textarea class="form-control" id="descripcion_denuncia" name="descripcion_denuncia"></textarea>
            
             @if ($errors->has('descripcion_denuncia')) <p  style="color: red">{{ $errors->first('descripcion_denuncia') }}</p> @endif 
          </div>
        
        </div>
        
        </div>-->
       


         <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">15.- ¿El ciudadano acepta ser parte de la Red Vecinal?:</label>
          <div class="col-sm-9 mb-3">
          <select name="firma" id="firma" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             @if ($errors->has('firma')) <p  style="color: red">{{ $errors->first('firma') }}</p> @endif 
          </div>
        
        </div>

        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-6 offset-sm-6">
            <button type="submit" class="btn btn-primary"> Registrar </button>
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



<!--@section('js')  -->

 <!--  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
       integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
       crossorigin=""></script>-->
 

<!--@endsection-->





<!--@section('customjs')-->

<!--<script  type="text/javascript">



  

  var map = L.map('map').setView([19.432663, -99.133277], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([19.432663, -99.133277]).addTo(map)
      .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
      .openPopup();




      function getlatlong(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                console.log(position);
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                console.log(lat+" "+lng);
            });
        }
      }


      $( "#ubicarme" ).click(function(event) {
         event.preventDefault();
        getlatlong();
      });



    </script>-->




    <!-- <script type="text/javascript">



      $('#realizo_denuncia').change(function(evento){
         valor = $(this).val();



         if (valor=="si") {
          $('#show_delito').show();
          $('#texto_delito').text('¿Cómo fue la atención en el Ministerio Público?');
          
         }else if(valor=="no"){
           $('#show_delito').show();
           $('#texto_delito').text('¿Por qué?');

         }else{

          $('#show_delito').hide();
            $('#show_delito').hide();

         }

      });

       </script>-->

<!--@endsection-->

