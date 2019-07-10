@extends('template.header')

@section('content')


  <section class="forms">
        <div class="container-fluid">
          <div class="row">
         
    <style>
    #scroll{
        border:1px solid;
        height:100px;
        width:300px;
        overflow-y:scroll;
        overflow-x:hidden;
    }
    </style>


<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>Coordinación General del Gabinete de Seguridad Ciudadana y Procuración de Justicia CDMX</h4>
    </div>
    <div class="card-body">
        
        
     <div class=“row”>

   
 
 
</div>


 
        <H1>Mis Vínculos</H1>


<text>
<label>En esta sección encontrarás:<br>
Las páginas que necesitas para realizar tus diferentes tareas.<br><br>  
</label>
</text><br><br> 

      



       

<a href="https://www.gabinetedeseguridad.cdmx.gob.mx/"><img src= "img/gabinete.JPG"   alt="Gabinete de Seguridad Ciudadana CDMX" ></a><br><br>
<a href="https://correo.cdmx.gob.mx/"><img src=  "img/gabinete.JPG"     alt="Mi correo institucional" ></a><br><br>
<a href="https://analisisseguridad.cdmx.gob.mx/tablero/"><img src=  "img/gabinete.JPG"     alt="Tablero: Reporte de Incidencia" ></a><br><br>
<a href="https://top5.cdmx.gob.mx/backend/backend/auth/signin"><img src= "img/gabinete.JPG"      alt="Tablero: TOP-5"></a><br><br>
<a href="http://www.infodf.org.mx/ava/acceso/"><img src= "img/gabinete.JPG"    alt="AVA: Cursos de Transparencia" ></a><br><br>
<a href="https://www.i4ch-capitalhumano.cdmx.gob.mx/"><img src= "img/gabinete.JPG"     alt="Consulta tu recibo de nómina" ></a><br><br>
<a href="https://declaraciones.cdmx.gob.mx/inicio.aspx"><img src= "img/gabinete.JPG"    alt="Declaración Patrimonial CDMX" ></a><br><br>
<a href="https://oficinavirtual.issste.gob.mx/"><img src= "img/gabinete.JPG"   alt="Oficina Virtual ISSSTE" ></a><br><br>
<a href="https://www.atencionciudadana.cdmx.gob.mx/"><img src= "img/gabinete.JPG"      alt="Sistema Unificado de Atención Ciudadana" ></a><br><br>

            <!-- <a href="{{URL::to('/')}}"><img src={{asset('images/logo.png')}} alt="Logo"></a>-->
       <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->

         



          <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->
       <!-- <button type="submit"  img src="recursos/img/gscypj.png" >Gabinete de Seguridad Ciudadana CDMX</button>-->






        
  

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


<script>

     $.ajax({
                type: "GET",
                //url: "{{url('/get_mapa')}}",
                dataType: "html",
                success: function(result) {
                
               // console.log(result);
               
                
                
               // $('#file_mapa').html(result);
                   
                },
                error: function(result) {
                    alert("Data not found");
                }
            });
    
  
  
  
</script>


@endsection