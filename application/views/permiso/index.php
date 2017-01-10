

<!-- Content Header (Page header) -->
      

        <!-- Main content -->
        <section class="content">
          <div class="row">
           <h1>Permisos por perfil</h1>
            <div class="col-xs-12 col-lg-10 col-lg-push-1">
            
              <div class="box box-primary">
                <div class="box-header">
                  
                 

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
                                                     
                                                        
                                                        <?php echo anchor('permiso/administrar/'.$registro->id, '<i class="fa fa-edit "></i> Ver permisos',array('class'=>'mitooltip','title'=>'Ver permisos') ); ?>
                                                         
                                                      

                                                     
                                                     
                                                          
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
      