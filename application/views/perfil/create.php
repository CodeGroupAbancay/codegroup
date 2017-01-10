 <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
            Perfiles
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url('home/index')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?=base_url('perfil/index')?>"><i class="fa fa-tasks"></i> Perfíles</a></li>
            <li class="active"> Crear/Editar</li>
          </ol>
        </section>
 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-5 col-md-push-3">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= $titulo ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
<?php echo form_open('perfil/'.$accion, array('class'=>'')); ?>
  
  
        <div class="box-body">
            
             <?= form_hidden('id',@$registro->id); ?>

            <div class="form-group">
                <label for="nombres" >Nombre</label>
                <?php $nombre=array(
                    'type'=>'text',
                    'name'=>'nombre',
                    'id'=>'nombre',
                     'maxlength'=>'100',
                    'class'=>'form-control',
                    'placeholder'=>'aqui nombre del perfil',
                     'required'=>'required',
                      'autofocus'=>'autofocus',
                    'value'=>set_value('nombre',@$registro->nombre));
                 echo form_input($nombre); 
                 echo '<small><div class=" alert-danger text-center">'.form_error('nombre').'</div></small>';
                ?> 
            </div>
                      
     </div>
             <div class="box-footer">
            
          <?= anchor('perfil/index','<i class="fa fa-reply"></i> Volver', array('class'=>'btn btn-default')); ?>
         <!--button type="submit" class="btn btn-success">Guardar</button-->
            <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
            
    
<?php echo form_close(); ?>
    </div><!-- /.box -->
            <!-- right column -->
    </div>   <!-- /.row -->
</section><!-- /.content -->