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

 <div class=“row”>
    <div class="col-sm-6 ">
        <H1>Mis Vínculos</H1>


<text>
<label>En esta sección encontrarás:<br><br>
Las páginas que necesitas para realizar tus diferentes tareas<br><br>  
</label>
</text>

         

         <a href="https://www.gabinetedeseguridad.cdmx.gob.mx/"><img src="recursos/img/gscypj.png" ></a>





       <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->

         



          <!-- <img src="recursos/img/gscypj.png" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="btn btn-primary"  role="button">-->
       <!-- <button type="submit"  img src="recursos/img/gscypj.png" >Gabinete de Seguridad Ciudadana CDMX</button>-->





        <!-- <a class="btn btn-primary" href="https://correo.cdmx.gob.mx/" role="button">Mi correo institucional</a>
         <a class="btn btn-primary" href="https://analisisseguridad.cdmx.gob.mx/tablero/" role="button">Tablero: Reporte de Incidencia</a>
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