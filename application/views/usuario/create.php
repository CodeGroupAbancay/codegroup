 <!-- Content Header (Page header) -->

 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-5 col-md-push-3">
              <!-- general form elements -->
              <div >
                <div >
                  <h3 ><?= $titulo ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
<?php echo form_open('usuario/'.$accion.'', array('class'=>'')); ?>
 
          <div >
             <?= form_hidden('id',@$registro->id); ?>
              <div class="form-group-feedback">
                <label for="dni" class="">Dni</label>

                <?php $dni=array(
                    'type'=>'text', 
                    'name'=>'dni', 
                    'id'=>'dni',
                     'maxlength'=>'8',
                    'class'=>'form-control',
                    'placeholder'=>'dni ',
                    'value'=>set_value('dni',@$registro->dni),
                    'required'=>'required');
                    echo form_input($dni);                               
                    echo '<small><div class=" alert-danger text-center">'.form_error('dni').'</div></small>';
                ?>
            </div>
            <div class="form-group-feedback">
                <label for="nombres"  class="">Nombres</label>
                <?php $nombre=array(
                    'type'=>'text', 
                    'name'=>'nombre',
                     'id'=>'nombre',
                     'maxlength'=>'50',
                     'class'=>'form-control',
                     'placeholder'=>'digite su nombre',
                     'value'=>set_value('nombre',@$registro->nombre),
                     'required'=>'required',
                      'autofocus'=>'autofocus');
                    echo form_input($nombre);
                    echo '<small><div class=" alert-danger text-center">'.form_error('nombre').'</div></small>';
                 ?>
                 
            </div>
            <div class="form-group-feedback">
                <label for="apellidos"  class="">Apellidos</label>
                <?php $apellido=array(
                    'type'=>'text', 
                    'name'=>'apellido',
                    'id'=>'apellido',
                     'maxlength'=>'50',
                    'class'=>'form-control',
                    'placeholder'=>'digite su  apellidos',
                    'value'=>set_value('apellido',@$registro->apellido),
                    'required'=>'required');
                    echo form_input($apellido);                                       
                    echo '<small><div class=" alert-danger text-center">'.form_error('apellido').'</div></small>';
                    ?>
            </div>
            <div class="form-group-feedback">
                <label for="email" class="">Email</label>

                <?php $email=array(
                    'type'=>'email',
                    'name'=>'email', 
                    'id'=>'email',
                     'maxlength'=>'50',
                    'class'=>'form-control',
                    'placeholder'=>'correo electronico',
                    'value'=>set_value('email',@$registro->email),
                    'required'=>'required');
                    echo form_input($email);                               
                    echo '<small><div class=" alert-danger text-center">'.form_error('email').'</div></small>';
                ?>
            </div>
           
           
            <div class="form-group">
                <label for="perfil" >Perfil</label> 
                <?= form_dropdown('perfil_id', $perfiles,@$registro->perfil_id,"id='perfil'"); ?>                                   
            </div>
             <div class="form-group">
                <label for="estado" >Estado</label> 
                <?php $options= array('1'=>'Activo','0'=>'Bloqueado')?>
                <?= form_dropdown('estado',$options,@$registro->estado,"id='estado' "); ?>                                   
            </div>
           
        </div>
             <div >
            
            <?= anchor('usuario/index','Volver', array('class'=>'btn btn-default btn-sm')); ?>
            
            <button class="btn btn-sm btn-primary" type="submit"> Guardar</button>
           
            </div>     
       
    <?php echo form_close(); ?>
    </div><!-- /.box -->
            <!-- right column -->
    </div>   <!-- /.row -->
</section><!-- /.content -->