
 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-5 col-md-push-3">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header ">
                  <h3 class="box-title"><?= $titulo ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?= form_open('usuario/updatepassword', array('class'=>'')); ?>
	
                 <?= form_hidden('id',$registro->id); ?>
                <div class="box-body">
	               <?php echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';?>
                  <?= validation_errors(); ?>
            		
                	<div class="form-group">
                   	 		<label for="password">Contraseña nueva</label>
                    		<?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password','class'=>'form-control','placeholder'=>'Digite contraseña nueva', 'maxlength'=>'50')); ?>                             
                	</div>
                	<div class="form-group">
                    		<label for="password2">Repita contraseña</label>
                    		<?= form_input(array('type'=>'password', 'name'=>'password_rep', 'id'=>'password_rep','class'=>'form-control','required'=>'required','placeholder'=>'Repita contraseña nueva','maxlength'=>'50')); ?>                             
                	</div>
                </div>
               
                <div class="box-footer">
                     <?= anchor('usuario/index','<i class="fa fa-reply"></i> Volver', array('class'=>'btn btn-default')); ?>
                       <input type="submit" class="btn btn-primary" value="Guardar cambio">   
                </div> 	
            <?= form_close(); ?>
             </div><!-- /.box -->
            <!-- right column -->
          </div>   <!-- /.row -->
</section><!-- /.content -->