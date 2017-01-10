

        <!-- Main content -->
    <section class="content">
        <div class="row">
        <h1><?= $titulo?></h1>
            <div class="col-sm-5 col-sm-push-1">
              <div class="box box-primary">
                <div class="box-header ">
                    <h4>ACCESO RESTRINGIDO A</h4>  
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                <table class="table table-condensed table-striped table-bordered table-striped table-hover">
                    <thead >
                        <tr>                       
                           
                            <th> opcion de menú</th>
                             <th></th>
                        </tr>    
                    </thead>
                    <tbody>
                        <?php foreach ($query_izq as $registro): ?>
                        <tr>
                           
                                <td> <?=$registro[1]; ?> </td>
                                <td> <?= anchor('permiso/mp_asig/'.$registro[0].'/'.$registro[2], '<i class="fa fa-arrow-right"></i> asignar' ,'class="label label-success"'); ?> </td>
                        </tr>
                        <?php endforeach; ?>                                                             
                    </tbody>
                </table>
                                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col --> 
            <div class="col-sm-5 col-md-push-1">
                <div class="box box-primary">
                <div class="box-header ">
                    <h4>ACCESO PERMITIDO A</h4>    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table class="table table-condensed table-bordered table-striped table-hover" >
                        <thead >
                            <tr >
                                <th> </th>
                               
                                <th> Opcion de menú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query_der as $registro): ?>
                            <tr>
                                <td> <?= anchor('permiso/mp_noasig/'.$registro[0].'/'.$registro[2], '<i class="fa fa-arrow-left"></i> quitar','class="label label-primary"'); ?> </td>
                               
                                <td> <?=$registro[1]; ?> </td>
                            </tr>
                            <?php endforeach; ?>                                                         
                        </tbody>
                    </table>
                                        
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        <div class="row"> 
            <div class="col-sm-10 col-md-push-1">      
                <div class="box-footer text-center">
                    <a href="<?=base_url('permiso/index')?>" class="btn btn-default">
                       <span >Volver</span></a>
                         
                <?php echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';?>       
                </div>
            </div>    
        </div> 
    </section><!-- /.content -->