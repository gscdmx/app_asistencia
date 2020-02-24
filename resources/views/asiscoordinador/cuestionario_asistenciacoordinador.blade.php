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
      <h4>VISITAS EN COORDINACIÓN GENERAL DEL GABINETE DE SEGURIDAD CIUDADANA Y PROCURACIÓN DE JUSTICIADEL CDMX</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="{{ url('/guardar_cuestionario_visitas_coordinador') }}">




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
        <label class="col-sm-2 form-control-label">Fecha:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control" required></input>
           @if ($errors->has('fecha')) <p  style="color: red">{{ $errors->first('fecha') }}</p> @endif 
        </div>

        <label class="col-sm-2 form-control-label">Hora de Visita:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="time" id="hora_i" name="hora_i" class="form-control" required></input>
           @if ($errors->has('hora_i')) <p  style="color: red">{{ $errors->first('hora_i') }}</p> @endif
        </div>     
        

      </div>
           


            <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">1.- Nombre del Visitante:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="nombre" name="nombre"   placeholder="Escribe el nombre del Visitante"></input>
            
               @if ($errors->has('nombre')) <p  style="color: red">{{ $errors->first('nombre') }}</p> @endif 
                  </div>
        
             </div>

       


        <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">2.- Procedencia:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="procedencia" name="procedencia"   placeholder="Procedencia"  ></input>
            
               @if ($errors->has('procedencia')) <p  style="color: red">{{ $errors->first('procedencia') }}</p> @endif 
                  </div>
        
             </div>


          <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">3.- Asunto:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="asunto" name="asunto"   placeholder="Escribe el asunto"   ></input>
            
               @if ($errors->has('asunto')) <p  style="color: red">{{ $errors->first('asunto') }}</p> @endif 
                  </div>
        
             </div>



          <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">4.- Teléfono:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="telefono" name="telefono"   placeholder="Teléfono"   ></input>
            
               @if ($errors->has('telefono')) <p  style="color: red">{{ $errors->first('telefono') }}</p> @endif 
                  </div>
        
             </div>




          <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">5.- Dirección:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="direccion" name="direccion"   placeholder="Dirección"   ></input>
            
               @if ($errors->has('direccion')) <p  style="color: red">{{ $errors->first('direccion') }}</p> @endif 
                  </div>
        
             </div>




          <div class="line"></div>
             <div class="form-group row">
               <label class="col-sm-3 form-control-label">6.- Correo Electrónico:</label>
               <div class="col-sm-9 mb-3">
               <input type="text" class="form-control" id="correo" name="correo"   placeholder="Email@"   ></input>
            
               @if ($errors->has('correo')) <p  style="color: red">{{ $errors->first('correo') }}</p> @endif 
                  </div>
        
             </div>


              
       
                         

        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-6 offset-sm-6">
            <button type="submit" class="btn btn-primary"> Registrar Visita</button>
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

