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
    <div class="col-sm-12 ">
        <H1>Mis Vinculos</H1>


<text>
<label>En esta sección encontrarás:<br><br>
Las páginas que necesitas para realizar tus diferentes tareas<br><br>  
</label>
</text>

         <div class="btn-group-vertical" href="https://www.gabinetedeseguridad.cdmx.gob.mx/" role="button">Gabinete de Seguridad Ciudadana CDMX</div>
         <div class="btn-group-vertical" href="https://correo.cdmx.gob.mx/" role="button">Mi correo institucional</div>
         <div class="btn-group-vertical" href="https://analisisseguridad.cdmx.gob.mx/tablero/" role="button">Tablero: Reporte de Incidencia</div>
         <div class="btn-group-vertical" href="https://top5.cdmx.gob.mx/backend/backend/auth/signin" role="button">Tablero: TOP-5</div>
         <div class="btn-group-vertical" href="http://www.infodf.org.mx/ava/acceso/" role="button">AVA: Cursos de Transparencia</div>
         <div class="btn-group-vertical" href="https://www.i4ch-capitalhumano.cdmx.gob.mx/" role="button">Capital Humano (Consulta tu recibo de nómina): </div>
         <div class="btn-group-vertical" href="https://declaraciones.cdmx.gob.mx/inicio.aspx" role="button">Declaración Patrimonial CDMX</div>
         <div class="btn-group-vertical" href="https://oficinavirtual.issste.gob.mx/" role="button">Oficina Virtual ISSSTE</div>
         <div class="btn-group-vertical" href="https://www.atencionciudadana.cdmx.gob.mx/" role="button">SUAC: Sistema Unificado de Atención Ciudadana</div>

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