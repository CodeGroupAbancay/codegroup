
<!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>Usuarios <small>Mantenimiento de registros</small></h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url('home/index')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Usuarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            
              <div >
                <div >
                 <a href="<?=base_url('usuario/create')?>" class="btn btn-primary" ><span>Registrar usuario</span></a>

                </div><!-- /.box-header -->
                <div class=" table-responsive ">
              
                <?php echo $this->session->flashdata('msg');?>
               
                                    <table class=" table table-condensed table-bordered table-striped table-hover"  >
                                        <thead>
                                            <tr class="">
                                                <th>NOMBRES</th>
                                                <th>APELLIDOS</th>
                                                <th>EMAIL</th>
                                              
                                                <th>PERFIL</th>
                                                
                                                <th>ESTADO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                           
                                        </thead> 
                                        <tbody>
                                            <?php foreach ($query as $registro): ?>
                                                <tr>
                                                   
                                                    <td> <?= $registro->nombre ?> </td>
                                                    <td> <?= $registro->apellido ?> </td>
                                                    <td> <?= $registro->email ?> </td>
                                                
                                                    <td> <?= $registro->perfil_name ?> </td>
                                                    
                                                     <?php if ($registro->estado=='0' ){
                                                         echo '<td><div class="label label-default">Bloqueado</div></td>';       
                                                      }
                                                      elseif($registro->estado=='1' ){
                                                         echo '<td><div class="label label-primary">Activo</div> </td>';  
                                                      }
                              
                                                      ?>
                                                    
                                                    <td>
                                                        <a  class=" btn btn-default btn-xs"  href="<?=base_url('usuario/edit')?>/<?= $registro->id ?>"  >Editar</a>
                                                         <a  class=" btn btn-xs btn-default "  href="<?=base_url('usuario/editpassword')?>/<?= $registro->id ?>"  >Cambiar password</a>    
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