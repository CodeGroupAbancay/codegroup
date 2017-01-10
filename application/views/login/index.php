 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Ingresar</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php echo link_tag('plugins/bootstrap/css/bootstrap.css'); ?>
    <?php echo link_tag('plugins/node-waves/waves.css'); ?>
    <?php echo link_tag('plugins/animate-css/animate.css'); ?>
    <?php echo link_tag('css/style.css'); ?>

    
</head>

<body class="login-page" >
    <div class="login-box">
        <div class="logo">
            
        </div>
        <div class="card">
            <div class="body">
                
                <?php $atributos = array('id'=>'sign_in'); ?> 
                <?php echo form_open('login/ingresar',$atributos); ?>
                    <div class="msg"><center><img src="<?=base_url('images/unamba2.png')?>" width="70%" height="70%"></center></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons"></i>Email
                        </span>
                        <div class="form-line">
                            <?= form_input(array('type'=>'email','name'=>'email','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','placeholder'=>'Correo Electrónico','value'=>set_value('email'))); ?>                               
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons"></i>Password
                        </span>
                        <div class="form-line">
                           
                             <?= form_input(array('type'=>'password', 'name'=>'password','class'=>'form-control','required'=>'required','placeholder'=>'Contraseña','value'=>set_value('password'))); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-indigo">
                            <label for="rememberme">Recordarme</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">Ingresar</button>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12"> <?php  echo '<small><div class=" alert-danger text-center">'.form_error('email').'</div></small>'?>
                         <?php echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';?>
                            
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url("home");?>">Registrate!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Olvidaste tu contraseña?</a>
                            

                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= BASE_URL('plugins/jquery/jquery.min.js')?>"></script>
    <script src="<?= BASE_URL('plugins/bootstrap/js/bootstrap.js')?>"></script>
    <script src="<?= BASE_URL('plugins/node-waves/waves.js')?>"></script>
    <script src="<?= BASE_URL('plugins/jquery-validation/jquery.validate.js')?>"></script>
    <script src="<?= BASE_URL('js/admin.js')?>"></script>
    <script src="<?= BASE_URL('js/pages/examples/sign-in.js')?>"></script>
</body>
</html>