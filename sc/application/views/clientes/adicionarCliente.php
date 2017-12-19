<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clientes
        <small> - Adicionar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Clientes</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">
                            <form action="<?php echo current_url(); ?>" id="clientes" method="post" class="form-horizontal">

                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><label for="nome" class="control-label">Nome<span class="required"></span></label></td>
                                        <td><input type="text" class="form-control" id="nomeCliente"  name="nomeCliente" value="<?php echo @$nomeCliente; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">CPF/CNPJ<span class="required"></span></label></td>
                                        <td><input class="form-control" id="documento" type="number" name="documento" value="<?php echo @$documento; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nome" class="control-label">E-mail:<span class="required"></span></label></td>
                                        <td><input type="text" class="form-control" id="email"  name="email" value="<?php echo @$email; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Telefone:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="telefone" type="number" name="telefone" value="<?php echo @telefone; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Celular:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="celular" type="number" name="celular" value="<?php echo @$celular; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Rua:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="rua" type="text" name="rua" value="<?php echo @$rua; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Numero:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="numero" type="number" name="numero" value="<?php echo @$numero; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Bairro:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="bairro" type="text" name="bairro" value="<?php echo @$bairro; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">CEP.:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="cep" type="number" name="cep" value="<?php echo @$bairro; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Cidade:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="cidade" type="text" name="cidade" value="<?php echo @$cidade; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Estado:<span class="required"></span></label></td>
                                        <td><input class="form-control" id="estado" type="text" name="estado" value="<?php echo @$estado; ?>"/></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-actions text-center">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <a href="<?php echo base_url() ?>index.php/usuarios" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-edit" ></i>Adicionar</button>
                                        </div>
                                    </div>
                                </div>
                            </form> <!-- /. Form-->
                            <br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->

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
</body>
</html>