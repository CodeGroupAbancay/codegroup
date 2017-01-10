
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?= $titulo ?>
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url('home/index')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?=base_url('menu/index')?>"><i class="fa fa-tasks"></i> Opciones de menú</a></li>
            <li class="active"> Permisos</li>
          </ol>
        </section>

        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-5 col-sm-push-1">
              <div class="box box-primary">
                <div class="box-header ">
                    <h4>No asignados</h4>  
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                <table class="table table-condensed table-striped table-bordered table-striped table-hover">
                    <thead >
                        <tr>                       
                           
                            <th> Perfil </th>
                             <th></th>
                        </tr>    
                    </thead>
                    <tbody>
                        <?php foreach ($query_izq as $registro): ?>
                        <tr>
                           
                                <td> <?=$registro[1]; ?> </td>
                                <td> <?= anchor('menu/mp_asig/'.$registro[0].'/'.$registro[2], '<i class="fa fa-arrow-right"></i>' ,'class="label label-default"'); ?> </td>
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
                    <h4>Asignados</h4>    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table class="table table-condensed table-bordered table-striped table-hover" >
                        <thead >
                            <tr >
                                <th> </th>
                               
                                <th> Perfil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query_der as $registro): ?>
                            <tr>
                                <td> <?= anchor('menu/mp_noasig/'.$registro[0].'/'.$registro[2], '<i class="fa fa-arrow-left"></i>','class="label label-default"'); ?> </td>
                               
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
                    <a href="<?=base_url('menu/index')?>" class="btn btn-default" data-toggle="modal"><i class="fa fa-reply"></i>
                       <span class="hidden-sm hidden-xs">Volver</span></a>
                         
                <?php echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';?>       
                </div>
            </div>    
        </div> 
    </section><!-- /.content -->