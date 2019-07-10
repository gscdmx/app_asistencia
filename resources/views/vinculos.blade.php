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
<label>En esta sección encontrarás:<br><br>
Las páginas que necesitas para realizar tus diferentes tareas<br><br>  
</label>
</text>

   <label>      

          <a href="https://www.gabinetedeseguridad.cdmx.gob.mx/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Gabinete de Seguridad Ciudadana CDMX" ></a><br><br>


<a href="https://correo.cdmx.gob.mx/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Mi correo institucional" ></a><br><br>
<a href="https://analisisseguridad.cdmx.gob.mx/tablero/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Tablero: Reporte de Incidencia" ></a><br><br>
<a href="https://top5.cdmx.gob.mx/backend/backend/auth/signin"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Tablero: TOP-5"</a><br><br>
<a href="http://www.infodf.org.mx/ava/acceso/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="AVA: Cursos de Transparencia" ></a><br><br>
<a href="https://www.i4ch-capitalhumano.cdmx.gob.mx/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Capital Humano (Consulta tu recibo de nómina)" ></a><br><br>
<a href="https://declaraciones.cdmx.gob.mx/inicio.aspx"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Declaración Patrimonial CDMX" ></a><br><br>
<a href="https://oficinavirtual.issste.gob.mx/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="Oficina Virtual ISSSTE" ></a><br><br>
<a href="https://www.atencionciudadana.cdmx.gob.mx/"><img src={{('recursos/img/gscypj.png')}}   width="25" height="15"    alt="SUAC: Sistema Unificado de Atención Ciudadana" ></a><br><br>
</label>
            <!-- <a href="{{URL::to('/')}}"><img src={{asset('images/logo.png')}} alt="Logo"></a>-->
       <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->

         



          <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->
       <!-- <button type="submit"  img src="recursos/img/gscypj.png" >Gabinete de Seguridad Ciudadana CDMX</button>-->





        <!-- <a class="btn btn-primary" href="https://correo.cdmx.gob.mx/" role="button">Mi correo institucional</a>
         <a class="btn btn-primary" href="https://analisisseguridad.cdmx.gob.mx/tablero/" role="button">Mi correo institucional</a>
         <a class="btn btn-primary" href="https://top5.cdmx.gob.mx/backend/backend/auth/signin" role="button">Tablero: TOP-5</a>
         <a class="btn btn-primary" href="http://www.infodf.org.mx/ava/acceso/" role="button">AVA: Cursos de Transparencia</a>
         <a class="btn btn-primary" href="https://www.i4ch-capitalhumano.cdmx.gob.mx/" role="button">Capital Humano (Consulta tu recibo de nómina): </a>
         <a class="btn btn-primary" href="https://declaraciones.cdmx.gob.mx/inicio.aspx" role="button">Declaración Patrimonial CDMX</a>
         <a class="btn btn-primary" href="https://oficinavirtual.issste.gob.mx/" role="button">Oficina Virtual ISSSTE</a>
         <a class="btn btn-primary" href="https://www.atencionciudadana.cdmx.gob.mx/" role="button">SUAC: Sistema Unificado de Atención Ciudadana </a>-->



        
  

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