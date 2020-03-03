@extends('template.header')

@section('content')

 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

<style>
     #mapid { height: 300px; }
</style>



  <section class="forms">
        <div class="container-fluid">
          <div class="row">
         

 

<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>Lugares donde se realiza el Gabinete Matutino</h4>
        </div>
             <div class="card-body">
             


             <div class="row">
             <div class="col-sm-6 ">

                  <text>
                      <label>En esta sección tendras que darle chick cada día al botón ubicarme para saber tu lugar fecha y hora donde realizaste el Gabiente Matutino<br></label>
                  </text>

               <div class="form-group row">
               <div class="col-sm-6 offset-sm-6">
               <button type="button" id="ubicarme" class="btn btn-primary"> UBICARME </button>
               </div>
               </div>
       
               </div>
            </div>





            <div id="mapid"></div>




          </div>
        </div>
     </div>
   </div>
</div>
</section>



@endsection


@section('js') 

 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
 

@endsection





@section('customjs')

<script  type="text/javascript">









      //funcion para obtener coordenadas 
      function getlatlong(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                console.log(position);
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                console.log(lat+" "+lng);

                pintar_mapa(lat,lng);
            });
        }
      }

      //accion al dar clik en ubicarme
      $( "#ubicarme" ).click(function(event) {
         event.preventDefault();
        getlatlong();
      });




        if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(coords);
        }else{
                // El navegador no soporta la geolicalización
        }
        


        //funcion que se ejecuta al ingresar a la pagina (obtener coordenadas por default)
        function coords(position){
               // alert("Latitud: "   +position.coords.latitude);
               // alert("Longitud: "   +position.coords.longitude);


                pintar_mapa(position.coords.latitude,position.coords.longitude);
        }



        
        //funcion para puintar mapa(pasando parametros de latitud y longitud)
        function pintar_mapa(lat,long){  

          var map = L.map('mapid').setView([lat, long], 18);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          L.marker([lat, long]).addTo(map)
              .bindPopup('EStas aqui.')
              .openPopup();
        }




</script>




@endsection

