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
      <h4>Lugares donde se realizá el Gabinete Matutino</h4>
        </div>
             <div class="card-body">
             


             <div class="row">
             <div class="col-sm-6 ">

                  <text>
                      <label>En esta sección tendras que darle clic cada día al botón ubicarme en cuanto llegues a tu Gabienete Matutino correspondiente; para saber tu lugar, fecha y hora exactos en donde lo realizaste.<br><br></label>
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

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 

@endsection



@section('customjs')

<script  type="text/javascript">


var map = new L.map('mapid');  
      //funcion para obtener coordenadas 
      function getlatlong(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                console.log(position);
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                console.log(lat+" "+lng);


               


                pintar_mapa(lat,lng);

                guardar_por_ajax(lat,lng);

            });
        }
      }

      
      $( "#ubicarme" ).click(function(event) {
         event.preventDefault();
        getlatlong();


      });

     
        
        //funcion para puintar mapa(pasando parametros de latitud y longitud)
        function pintar_mapa(lat,long){  

          
           map.setView([lat, long], 18); 

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          L.marker([lat, long]).addTo(map)
              .bindPopup('Estas aquí.')
              .openPopup();
        }


        function guardar_por_ajax(latitud,longitud){

                var currentdate = new Date(); 
                var timestampt_jquery=currentdate.getFullYear()+'-'+(currentdate.getMonth()+1)+'-'+currentdate.getDate()+' '+ currentdate.getHours() + ":"+ currentdate.getMinutes() + ":" + currentdate.getSeconds();

               
                $.ajax({
                  url: "{{url('/guardar_mapa_asistencia')}}",
                  method: "POST",
                  data: {
                        "_token": "{{ csrf_token() }}",
                        "lat": latitud,
                        "long":longitud,
                        "fecha":timestampt_jquery
                        },
                }).done(function(result) {

                  //alert(result);

                  if(result=="1"){

                    swal("Gracias", "Tú ubicación ha sido guardada", "success");
                  }


                });
        }

</script>

@endsection

