
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Perfiles <small>mantenimiento</small></h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url('home/index')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-suitcase"></i> Perfiles</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-push-1">
            
              <div class="box box-primary">
                <div class="box-header">
                  
                  <div > <a href="<?=base_url('perfil/create')?>" class="btn btn-primary " data-toggle="modal"><i class="fa fa-plus-square "></i>
                  <span class="hidden-sm ">Nuevo Perfíl</span></a></div>

                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
              
                <?php echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';?>
                                    <table class="table table-condensed table-bordered table-striped table-hover" >
                                        <thead >
                                            <tr >
                                               
                                               
                                                <th>Perfil</th>                                        
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($query as $registro): ?>
                                                <tr>
                                                    <!--td> <?= anchor('usuario/edit/'.$registro->id, $registro->id); ?> </td-->
                                                    
                                                    <td> <?= $registro->nombre ?> </td>
                                                                                                      
                                                    <td>
                                                      <?php if ($registro->id=='1' OR $registro->id=='2'): ?>
                                                      
                                                      <?php else: ?>
                                                        
                                                        <?php echo anchor('perfil/edit/'.$registro->id, '<i class="fa fa-edit "></i> Editar',array('class'=>'mitooltip','title'=>'editar') ); ?>
                                                         <?php echo anchor('perfil/delete/'.$registro->id, '<i class="fa fa-edit "></i> eliminar',array('class'=>'mitooltip','title'=>'eliminar') ); ?>
                                                      

                                                      <?php endif ?>
                                                     
                                                          
                                                    </td>
                                                    </tr>
                                            <?php endforeach; ?>
                                                                                     
                                        </tbody>
                                    </table>
                      
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
            
        </section><!-- /.content -->
      