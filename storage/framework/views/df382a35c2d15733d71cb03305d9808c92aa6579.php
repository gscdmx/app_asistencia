<?php $__env->startSection('content'); ?>



  <section class="forms">
        <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
          <div class="row">
         



<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>CGGSCPYJ CDMX</h4>
    </div>
    <div class="card-header d-flex align-items-center">
      <h4>ASISTENCIA GABINETE VESPERTINO DE SEGURIDAD CIUDADANA Y PROCURACIÓN DE JUSTICIA </h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal"  enctype="multipart/form-data"  method="POST" action="<?php echo e(url('/guardar_asistenciaMiercoles')); ?>">
         <!-- enctype="multipart/form-data"-->

      <?php echo e(csrf_field()); ?>



 <?php if( Session::has('mensaje') ): ?>
                <div class="alert alert-<?php echo e(Session::get('mensaje')['color']); ?> alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e(Session::get('mensaje')['mensaje']); ?>

                  </div>
      <?php endif; ?>


       
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿Se realizó el Gabinete Vespertino?</label>
          <div class="col-sm-10 mb-3">
            <select name="se_realizo_mesa" id="se_realizo_mesa" class="form-control">
              <option value="">Selecciona...</option>
              <option value="si">SI</option>
              <option value="no">NO</option>
            </select>
            
             <?php if($errors->has('se_realizo_mesa')): ?> <p  style="color: red"><?php echo e($errors->first('se_realizo_mesa')); ?></p> <?php endif; ?> 
          </div>
        
        </div>
        
        
        
             <div class="line"></div>
      <div class="form-group row">
        <label class="col-sm-2 form-control-label">Fecha:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          <input type="date" id="fecha" name="fecha" class="form-control"  ></input>
           <?php if($errors->has('fecha')): ?> <p  style="color: red"><?php echo e($errors->first('fecha')); ?></p> <?php endif; ?> 
        </div>




        <label class="col-sm-2 form-control-label">Hora de Inicio:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          
           <select name="hora_inicio" id="hora_inicio" class="form-control">
              <option value="">Selecciona Hora...</option>
              <option value="5">5</option>
              <option value="6">6</option>
              

            </select>
            
             <?php if($errors->has('hora_inicio')): ?> <p  style="color: red"><?php echo e($errors->first('hora_inicio')); ?></p> <?php endif; ?> 


              <select name="minutos_i" id="minutos_i" class="form-control">
              <option value="">Selecciona Minutos...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>

              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>

              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>

              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="52">52</option>
              <option value="53">53</option>
              <option value="54">54</option>

              <option value="55">55</option>
              <option value="56">56</option>
              <option value="57">57</option>
              <option value="58">58</option>
              <option value="59">59</option>
              

             
            </select>
            
             <?php if($errors->has('minutos_i')): ?> <p  style="color: red"><?php echo e($errors->first('minutos_i')); ?></p> <?php endif; ?> 



        </div>

         <label class="col-sm-2 form-control-label">Hora de Término:</label>
        <div class="col-sm-2">
          <!--<input type="text" class="form-control">-->
          

              <select name="hora_termino" id="hora_termino" class="form-control">
              <option value="">Selecciona Hora...</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
             
              </select>
            
             <?php if($errors->has('hora_termino')): ?> <p  style="color: red"><?php echo e($errors->first('hora_termino')); ?></p> <?php endif; ?> 


              <select name="minutos_t" id="minutos_t" class="form-control">
              <option value="">Selecciona Minutos...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>

              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>

              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>

              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="52">52</option>
              <option value="53">53</option>
              <option value="54">54</option>

              <option value="55">55</option>
              <option value="56">56</option>
              <option value="57">57</option>
              <option value="58">58</option>
              <option value="59">59</option>
              

            </select>
            
             <?php if($errors->has('minutos_t')): ?> <p  style="color: red"><?php echo e($errors->first('minutos_t')); ?></p> <?php endif; ?> 


        </div>


      </div>
         

     <div  style="display:none;" id="show_descripcion">















        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Describe el motivo por el cuál no se realizó el Gabinete Vespertino:</label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="motivo" name="motivo" class="form-control" ></textarea>
          </div>
        </div>

         
 









      </div>


<div  style="display:none;" id="show_asistencia">



 

    






       <div class="line"></div>


        <div class="form-group row">
         <label class="col-sm-2 form-control-label">¿Asistió la Representante de Jefatura de Gobierno?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió de la Agencia del Ministerio Público?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió del Jefe de Sector de la Policía?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió de Policía de Investigación?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió del Juzgado Cívico?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió del Médico Legista?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió del Representante de Alcaldía?</label>
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
          <label class="col-sm-2 form-control-label">¿Quién asistió de PDI Inteligencia Social?</label>
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
          <label class="col-sm-2 form-control-label">¿Cuántos vecinos asistieron? </label>
          <div class="col-sm-10 mb-3">
 
       <input type="number" name="vecino" class="form-group row"  />

          </div>
        
        </div>





       <!-- <div class="line"></div>
          <div class="form-group row">         
          <label class="col-sm-2 form-control-label">Reunión de Alcaldía con Jefa de Gobierno:</label>
          <div class="col-sm-10 mb-3">
          <input  type="checkbox" name="reunionjg"  value="Reunión con JG"  style="width:5%; height:110%"  class="form-group row" />    
          </div>
        </div>-->


       <div class="line"></div>


          <div class="form-group row">
          <label class="col-sm-2 form-control-label">¿La reunión fue del programa Mi C911e?</label>
          <div class="col-sm-10 mb-3">
           

            

            <input id="checkboxCustom00000011" type="checkbox" name="calle" value="SI" style="width:15%; height:110%" class="form-control-custom">
            <label for="checkboxCustom00000011">SI</label>


             <input id="checkboxCustom00000012" type="checkbox" name="calle" value="NO" style="width:15%; height:110%" class="form-control-custom">
            <label for="checkboxCustom00000012">N0</label>


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
 


        <div class="line"></div>


          <div class="form-group row">
          <label class="col-sm-2 form-control-label">POR MOTIVOS DE SEGURIDAD RECUERDA QUE LA FOTO QUE SUBAS DEBERA MOSTRAR A LOS VECINOS DE ESPALDA</label>
        
        </div>

         <div class="line"></div>

         <div class="line"></div>

          <div class="form-group row">
          <label class="col-sm-2 form-control-label">Captura o Busca en GalerÍa</label>
          <div class="col-sm-10 mb-3">
   
       <input type="file" name="archivo" accept="image/x-png,image/gif,image/jpeg" class="form-group row"  />
      
          </div>
        
        </div>








       

        </div>


       
      
         
        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-2">
            <!--<button type="submit" class="btn btn-secondary">Cancel</button>-->
            <button type="submit" class="btn btn-primary">Guardar Asistencia Vespertina</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


 </div>
          </div>
  </section>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>  
 
<?php $__env->stopSection(); ?>



<?php $__env->startSection('customjs'); ?>


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
      var url = "<?php echo e(url('/get_ct_x_alcaldia')); ?>"+"/"+id;
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

<?php $__env->stopSection(); ?>









<?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>