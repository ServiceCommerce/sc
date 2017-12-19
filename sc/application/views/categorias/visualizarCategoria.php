<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categoria
        <small> - Visualizar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Visualizar Categoria</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">

                            <table class="table">
                                <thead>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="nome" class="control-label">Nome<span class="required"></span></label></td>
                                        <td><input type="text" class="form-control" id="nome" placeholder="Insira o nome da categoria" name="nome" value="<?php echo @$result->nome; ?>" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Descrição<span class="required"></span></label></td>
                                        <td><textarea class="textarea" id="descricao" name="descricao" placeholder="Insira uma descrição" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled><?php echo @$result->descricao; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Exibir categoria no site<span class="required"></span></label></td>
                                        <td><INPUT TYPE="checkbox" <?php if($result->exibir == 1){echo 'checked="checked"';}?> NAME="exibirNoSite" VALUE="1" disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-actions text-center">
                                <div class="span12">
                                    <div class="span6 offset3">
                                        <a href="<?php echo base_url('index.php/categorias') ?>" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                        <?php
                                        if($this->permission->checkPermission($this->session->userdata('permissao'),'eCategoria')){?>
                                            <a type="submit" href="<?php echo base_url('index.php/categorias/editar\/'). $result->idCategoria_prod ?>" class="btn btn-success"><i class="fa fa-edit" ></i>Editar</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <BR>
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