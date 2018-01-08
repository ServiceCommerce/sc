<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small> - Editar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados Cadastrais</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">
                            <form action="<?php echo current_url(); ?>" id="editar_usuario" method="post" class="form-horizontal">

                                <table class="table">
                                    <thead>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label for="nome" class="control-label">Nome: <span class="required"></span></label></td>
                                            <td><input type="text" class="form-control" id="nome"  name="nome" value="<?php echo $usuario->nome; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for="email" class="control-label">Email<span class="required"></span></label></td>
                                            <td><input class="form-control" id="email" type="email" name="email" value="<?php echo $usuario->email; ?>" /></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="form-actions text-center">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <a href="<?php echo base_url() ?>index.php/usuarios" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-edit" ></i>Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </form> <!-- /. Form-->
                            <br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Imagem do perfil</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row"  style="padding-left: 10px">
                                <div class="col-md-3 btn btn-primary">
                                    <?php  echo form_open_multipart(base_url().'index.php/mapos/addProfile');?>
                                    <img src="<?php echo $this->session->userdata('profile') ?>" class="img-circle" style="max-height: 200px; max-width: 200px;" alt="User Image"/>

                                    <input type="file" class="upload" name="imgfile" id="imgfile">
                                    <input name="img" type="submit" class="btn btn-success">


                                    </form>

                                </div><!-- /.col -->
                                <!--<div class="col-md-8 ">
                                    <form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal">

                                        <table class="table">
                                            <thead>
                                            <th></th>
                                            <th></th>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td><label for="email" class="control-label">Email<span class="required"></span></label></td>
                                                <td><input class="form-control" id="email" type="email" name="email" value="<?php echo $usuario->email; ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td><label for="telefone" class="control-label">Telefone<span class="required"></span></label></td>
                                                <td><input class="form-control" id="telefone" type="text" name="telefone" value="<?php echo @$contato->telefone; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td><label for="celular" class="control-label">Celular</label></td>
                                                <td><input class="form-control" id="celular" type="text" name="celular" value="<?php  ?>" /></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="form-actions text-center">
                                            <div class="span12">
                                                <div class="span6 offset3">
                                                    <a href="<?php echo base_url() ?>index.php/usuarios" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                                    <button type="submit" class="btn btn-success" disabled><i class="fa fa-edit" ></i>Editar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form> <!-- /. Form-->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- ./box-body -->

                    </div><!-- /.box -->
                </div><!-- /.col -->

            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Senha</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">
                            <form action="<?php echo base_url().'index.php/core/alterarSenha'; ?>" id="editar_senha" method="post" class="form-horizontal">

                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><label for="nome" class="control-label">Senha Atual: <span class="required"></span></label></td>
                                        <td><input type="password" class="form-control" id="oldSenha"  name="oldSenha" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Nova Senha<span class="required"></span></label></td>
                                        <td><input class="form-control" id="novaSenha" type="password" name="novaSenha" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="senha" class="control-label">Confirmação de senha<span class="required"></span></label></td>
                                        <td><input class="form-control" id="novaSenha2" type="password" name="novaSenha2" /></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-actions text-center">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <a href="<?php echo base_url() ?>index.php/usuarios" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-edit" ></i>Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </form> <!-- /. Form-->
                            <br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div><!-- /.row -->

            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url();?>assets/AdminLTE/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url();?>assets/AdminLTE/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/pages/dashboard2.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/demo.js" type="text/javascript"></script>