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
      <h4>ENTREVISTA EN LA AGENCIA DEL MINISTERIO PÚBLICO</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/guardar_cuestionario_Entrevistas') }}">




          <div id="map"></div>
         




      {{ csrf_field() }}

      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif



 
     


     <div class="line"></div>
           <div class="form-group row">
             <label class="col-sm-3 form-control-label">1.- Elige la Agencia del Ministerio Público a Visitar:</label>
             <div class="col-sm-9 mb-3">
              <select name="mp_visitado" id="mp_visitado" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="AOB-1">AOB-1</option>
              <option value="AOB-2">AOB-2</option>
              <option value="AOB-3">AOB-3</option>
              <option value="AOB-4">AOB-4</option>
              <option value="AZC-1">AZC-1</option>
              <option value="AZC-2">AZC-2</option>
              <option value="AZC-3">AZC-3</option>
              <option value="AZC-4">AZC-4</option>
              <option value="BJU-1">BJU-1</option>
              <option value="BJU-2">BJU-2</option>
              <option value="BJU-3">BJU-3</option>
              <option value="BJU-4">BJU-4</option>
              <option value="BJU-5">BJU-5</option>
              <option value="COY-1">COY-1</option>
              <option value="COY-2">COY-2</option>
              <option value="COY-3">COY-3</option>
              <option value="COY-4">COY-4</option>
              <option value="COY-5">COY-5</option>
              <option value="CUJ-1">CUJ-1</option>
              <option value="CUJ-2">CUJ-2</option>
              <option value="CUH-1">CUH-1</option>
              <option value="CUH-2">CUH-2</option>
              <option value="CUH-3">CUH-3</option>
              <option value="CUH-4">CUH-4</option>
              <option value="CUH-5">CUH-5</option>
              <option value="CUH-6">CUH-6</option>
              <option value="CUH-7">CUH-7</option>
              <option value="CUH-8">CUH-8</option>
              <option value="GAM-1">GAM-1</option>
              <option value="GAM-2">GAM-2</option>
              <option value="GAM-3">GAM-3</option>
              <option value="GAM-4">GAM-4</option>
              <option value="GAM-5">GAM-5</option>
              <option value="GAM-6">GAM-6</option>
              <option value="GAM-7">GAM-7</option>
              <option value="GAM-8">GAM-8</option>
              <option value="IZC-1">IZC-1</option>
              <option value="IZC-2">IZC-2</option>
              <option value="IZC-3">IZC-3</option>
              <option value="IZP-1">IZP-1</option>
              <option value="IZP-2">IZP-2</option>
              <option value="IZP-4">IZP-4</option>
              <option value="IZP-5">IZP-5</option>
              <option value="IZP-6">IZP-6</option>
              <option value="IZP-7">IZP-7</option>
              <option value="IZP-8">IZP-8</option>
              <option value="IZP-9">IZP-9</option>
              <option value="IZP-10">IZP-10</option>
              <option value="MAC-1">MAC-1</option>
              <option value="MAC-2">MAC-2</option>
              <option value="MIH-1">MIH-1</option>
              <option value="MIH-2">MIH-2</option>
              <option value="MIH-3">MIH-3</option>
              <option value="MIH-4">MIH-4</option>
              <option value="MIH-5">MIH-5</option>
              <option value="MIL-1">MIL-1</option>
              <option value="MIL-2">MIL-2</option>
              <option value="TLH-1">TLH-1</option>
              <option value="TLH-2">TLH-2</option>
              <option value="TLP-1">TLP-1</option>
              <option value="TLP-2">TLP-2</option>
              <option value="TLP-3">TLP-3</option>
              <option value="TLP-4">TLP-4</option>
              <option value="VCA-1">VCA-1</option>
              <option value="VCA-2">VCA-2</option>
              <option value="VCA-3">VCA-3</option>
              <option value="VCA-4">VCA-4</option>
              <option value="VCA-5">VCA-5</option>
              <option value="XOC-1">XOC-1</option>
              <option value="XOC-1">XOC-2</option>

            </select>
            
             @if ($errors->has('mp_visitado')) <p  style="color: red">{{ $errors->first('mp_visitado') }}</p> @endif 
          </div>
        
        </div>
 


  

         <div class="line"></div>
      <div class="form-group row">
        <label class="col-sm-2 form-control-label">Fecha:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" required></input>
           @if ($errors->has('fecha')) <p  style="color: red">{{ $errors->first('fecha') }}</p> @endif 
        </div>

        <label class="col-sm-2 form-control-label">Hora de Inicio de Entrevista MP:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_i" name="hora_i" class="form-control" required></input>
           @if ($errors->has('hora_i')) <p  style="color: red">{{ $errors->first('hora_i') }}</p> @endif
        </div>

         <label class="col-sm-2 form-control-label">Hora de Término de Entrevista MP:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_f" name="hora_f" class="form-control" required></input>
           @if ($errors->has('hora_f')) <p  style="color: red">{{ $errors->first('hora_f') }}</p> @endif
        </div>


      </div>

        


          <div class="line"></div>
           <div class="form-group row">
             <label class="col-sm-3 form-control-label">2.- ¿Hay ciudadanos esperando ser atendidos?:</label>
             <div class="col-sm-9 mb-3">
              <select name="ciudadanos_esperando" id="ciudadanos_esperando" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
            
             @if ($errors->has('ciudadanos_esperando')) <p  style="color: red">{{ $errors->first('ciudadanos_esperando') }}</p> @endif 
          </div>
        
        </div>




        <div class="form-group row">
          <label class="col-sm-3 form-control-label">3.- ¿Cuántos?</label>
          <div class="col-sm-9 mb-3">
            <select name="cuantos" id="cuantos" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4 o más">4 o más</option>
              <option value="NO APLICA">NO APLICA</option>
            </select>
            
             @if ($errors->has('cuantos')) <p  style="color: red">{{ $errors->first('cuantos') }}</p> @endif 
          </div>
        
        </div>





          
         <div class="line"></div>
          <div class="form-group row">
          <label class="col-sm-3 form-control-label">4.- ¿Cuánto tiempo ha esperado cada ciudadano en ser atendido?</label>
          <div class="col-sm-9 mb-3">
            <input type="text" class="form-control" id="tiempo" name="tiempo"   required></input>
            
               @if ($errors->has('tiempo')) <p  style="color: red">{{ $errors->first('tiempo') }}</p> @endif 
                  </div>
        
             </div>

           

    
          <div class="line"></div>
           <div class="form-group row">
             <label class="col-sm-3 form-control-label">5.- ¿Te percataste si había policía imaginaria desalentando la denuncia?</label>
             <div class="col-sm-9 mb-3">
              <select name="desalentando_policia" id="desalentando_policia" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
              <option value="NO APLICA">NO APLICA</option>
            </select>
            
             @if ($errors->has('desalentando_policia')) <p  style="color: red">{{ $errors->first('desalentando_policia') }}</p> @endif 
          </div>
        
        </div>




        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">6.- ¿Te percataste si alguna persona o servidor público desalentó la denuncia de los ciudadanos?</label>
          <div class="col-sm-9 mb-3">
            <select name="desalentado_servidor" id="desalentado_servidor" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="MP">MP</option>
              <option value="SSC">SSC</option>
              <option value="PA">PA</option>
              <option value="PDI">PDI</option>
              <option value="PARTICULAR">PARTICULAR</option>
              <option value="NO APLICA">NO APLICA</option>

            </select>
            
             @if ($errors->has('desalentado_servidor')) <p  style="color: red">{{ $errors->first('desalentado_servidor') }}</p> @endif 
          </div>
        
        </div>
                
           
        <div class="line"></div>
         <div class="form-group row">
          <label class="col-sm-3 form-control-label">7.- Según tu visita, ¿el trato a los ciudadanos es?:</label>
          <div class="col-sm-9 mb-3">
            <select name="trato" id="trato" class="form-control" required>
              <option value="">Selecciona...</option>
              <option value="BUENO">BUENO</option>
              <option value="REGULAR">REGULAR</option>
              <option value="MALO">MALO</option>
              <option value="NO APLICA">NO APLICA</option>
              
            </select>
            
             @if ($errors->has('trato')) <p  style="color: red">{{ $errors->first('trato') }}</p> @endif 
          </div>
        
        </div>

      



        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-6 offset-sm-6">
            <button type="submit" class="btn btn-primary">Registrar</button>
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

